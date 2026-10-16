/* global R2Offload, jQuery */
/* Migration screen: storage overview, the offload job, activity log, tools and danger zone. */
(function ($) {
    'use strict';

    var $page = $('.r2ui--migration');
    if (!$page.length) return;

    var t       = R2Offload.i18n;
    var FAST_KEY = 'r2m-fast';
    var fmt     = function (n) { return (parseInt(n, 10) || 0).toLocaleString(); };

    function post(action, data) {
        return $.post(R2Offload.ajaxUrl, $.extend({ action: action, nonce: R2Offload.nonce }, data || {}));
    }
    function errMsg(res) { return (res && res.data && res.data.message) || t.requestFailed; }

    function message(text, type) {
        $('#r2m-message').attr('class', 'r2ui-message is-' + (type || 'info')).text(text).prop('hidden', !text);
    }

    // =====================================================================
    // Overview + offload state (driven by r2_offload_migration_status)
    // =====================================================================
    var state   = { phase: 'idle', pending: 0, total: 0, complete: 0 };
    var samples = [];          // [ms, complete] for the rate / ETA estimate
    var looping = false;       // "go faster" batch loop running in this tab
    var justStarted = false;   // a start/resume/retry was just sent (it may finish before we ever see 'running')

    function render(d) {
        var all     = parseInt(d.all_attachments, 10) || 0;
        var synced  = parseInt(d.synced, 10) || 0;
        var r2only  = parseInt(d.r2_only, 10) || 0;
        var failed  = parseInt(d.failed, 10) || 0;
        var pending = (parseInt(d.pending, 10) || 0) + (parseInt(d.processing, 10) || 0);
        var both    = Math.max(0, synced - r2only);
        var local   = Math.max(0, all - synced - failed);
        var pct     = function (n) { return all ? (100 * n / all) + '%' : '0'; };

        $page.find('[data-stat="total"]').text(fmt(all));
        $page.find('[data-stat="both"]').text(fmt(both));
        $page.find('[data-stat="r2"]').text(fmt(r2only));
        $page.find('[data-stat="local"]').text(fmt(local));
        $page.find('[data-stat="failed"]').text(fmt(failed));
        $page.find('[data-stat="synced"]').text(fmt(synced));
        $('[data-seg="both"]').css('width', pct(both));
        $('[data-seg="r2"]').css('width', pct(r2only));
        $('[data-seg="fail"]').css('width', pct(failed));
        $('#r2m-bar').attr('aria-label', t.barLabel
            .replace('%1$s', fmt(both)).replace('%2$s', fmt(r2only)).replace('%3$s', fmt(local)).replace('%4$s', fmt(failed)));

        state.total    = parseInt(d.total, 10) || 0;
        state.complete = parseInt(d.complete, 10) || 0;
        state.pending  = pending;
        state.local    = local;
        var was        = state.phase;
        state.phase    = pending > 0 ? (d.paused ? 'paused' : 'running') : (state.total > 0 ? 'done' : 'idle');
        // Job finished (by this tab's loop, WP-Cron or another worker): say so and show what happened.
        if ((was === 'running' || was === 'paused' || justStarted) && pending === 0) {
            justStarted = false;
            message(failed ? t.jobDoneFailed.replace('%s', fmt(failed)) : t.complete, failed ? 'warning' : 'success');
        }

        $('#r2m-failed').prop('hidden', failed === 0);
        renderOffload();
    }

    function renderOffload() {
        var p = state.phase, running = p === 'running', paused = p === 'paused';
        $('#r2m-offload').attr('data-state', p);

        $('#r2m-start').prop('hidden', running || paused)
            .text(p === 'done' && !state.local ? t.checkNew : (state.local === 1 ? t.offloadOne : (state.local ? t.offloadN.replace('%s', fmt(state.local)) : t.checkNew)));
        $('#r2m-pause').prop('hidden', !running);
        $('#r2m-resume').prop('hidden', !paused);
        $('#r2m-cancel').prop('hidden', !(running || paused));

        $('#r2m-off-help').text(
            running || paused ? t.helpRunning
                : (state.local ? (state.local === 1 ? t.helpLocalOne : t.helpLocal.replace('%s', fmt(state.local))) : (p === 'done' ? t.helpDone : t.helpAllOn)));

        var $prog = $('#r2m-progress');
        $prog.prop('hidden', p === 'idle');
        var pct = state.total ? Math.round(100 * state.complete / state.total) : 0;
        $prog.find('.r2ui-progress-fill').css('width', pct + '%');
        $prog.find('[role="progressbar"]').attr('aria-valuenow', pct);
        $prog.find('[data-progress="count"]').text(t.progressCount.replace('%1$s', fmt(state.complete)).replace('%2$s', fmt(state.total)).replace('%3$s', pct).replace('%%', '%'));
        $prog.find('[data-progress="eta"]').text(running ? eta() : (paused ? t.pausedNote : (p === 'done' ? t.finished : '')));
    }

    function eta() {
        samples.push([Date.now(), state.complete]);
        samples = samples.filter(function (s) { return Date.now() - s[0] < 60000; });
        if (samples.length < 2) return t.estimating;
        var a = samples[0], b = samples[samples.length - 1];
        var rate = (b[1] - a[1]) / ((b[0] - a[0]) / 1000);
        if (rate <= 0) return t.estimating;
        var left = Math.ceil(state.pending / rate);
        var span = left < 90 ? t.seconds.replace('%s', left) : t.minutes.replace('%s', Math.ceil(left / 60));
        return t.rate.replace('%1$s', rate < 10 ? rate.toFixed(1) : Math.round(rate)).replace('%2$s', span);
    }

    function refresh() {
        return post('r2_offload_migration_status').done(function (res) {
            if (!res.success) return;
            render(res.data);
            if (state.phase === 'running' && fast() && !looping) loop();
        });
    }

    // ---------------------------------------------------------------- "go faster" loop
    function fast() { return $('#r2m-fast').prop('checked'); }

    function loop() {
        if (looping) return;
        looping = true;
        (function next() {
            if (!fast() || state.phase !== 'running') { looping = false; return; }
            post('r2_offload_run_batch_now').done(function (res) {
                if (!res.success) { looping = false; message(errMsg(res), 'error'); return; }
                refresh().always(function () {
                    if (state.phase === 'running') setTimeout(next, 300);
                    else { looping = false; }
                });
            }).fail(function () { looping = false; message(t.requestFailed, 'error'); });
        })();
    }

    try { $('#r2m-fast').prop('checked', localStorage.getItem(FAST_KEY) !== '0'); } catch (e) { /* storage blocked */ }
    $('#r2m-fast').on('change', function () {
        try { localStorage.setItem(FAST_KEY, this.checked ? '1' : '0'); } catch (e) { /* storage blocked */ }
        if (this.checked && state.phase === 'running') loop();
    });

    // ---------------------------------------------------------------- offload controls
    function act(action, $btn, after) {
        $btn.prop('disabled', true);
        post(action).done(function (res) {
            if (!res.success) { message(errMsg(res), 'error'); return; }
            if (res.data && res.data.message) message(res.data.message, 'success');
            samples = [];
            justStarted = action !== 'r2_offload_pause_migration' && action !== 'r2_offload_cancel_migration'
                && !(res.data && res.data.total === 0);   // "nothing to migrate" must keep its own message
            refresh();
            if (after) after(res.data || {});
        }).fail(function () { message(t.requestFailed, 'error'); })
          .always(function () { $btn.prop('disabled', false); });
    }

    $('#r2m-start').on('click', function () { act('r2_offload_start_migration', $(this)); });
    $('#r2m-pause').on('click', function () { looping = false; act('r2_offload_pause_migration', $(this)); });
    $('#r2m-resume').on('click', function () { act('r2_offload_resume_migration', $(this)); });
    $('#r2m-retry').on('click', function () { act('r2_offload_retry_failed', $(this)); });
    $('#r2m-cancel').on('click', function () {
        if (!confirm(t.confirmCancel)) return;
        looping = false;
        act('r2_offload_cancel_migration', $(this));
    });

    // =====================================================================
    // Tools + danger zone: bulk jobs share one start → poll → finish flow
    // =====================================================================
    var JOBS = {
        validate:     { start: 'r2_offload_start_validate',     status: 'r2_offload_validate_status',     btn: '#r2m-validate' },
        restore:      { start: 'r2_offload_start_restore_all',  status: 'r2_offload_restore_status',      btn: '#r2m-restore',      confirm: 'confirmRestore' },
        local_delete: { start: 'r2_offload_start_local_delete', status: 'r2_offload_local_delete_status', btn: '#r2m-local-delete', confirm: 'confirmLocalDelete' },
        desync:       { start: 'r2_offload_start_desync',       status: 'r2_offload_desync_status',       btn: '#r2m-desync' }
    };

    function jobStatus(name, text, type) {
        $('[data-job="' + name + '"] [data-job-status]').attr('class', 'r2ui-job is-' + (type || 'info')).text(text).prop('hidden', !text);
    }

    function pollJob(name, knownTotal) {
        var job = JOBS[name];
        post(job.status).done(function (res) {
            if (!res.success) return;
            var d = res.data, total = d.total || 0, done = (d.done || 0) + (d.failed || 0);
            if (!total && !knownTotal) return;                                  // nothing running
            var finished = (total && done >= total) || (!total && knownTotal);   // finished: counts reached or queue cleared
            if (!finished) {
                jobStatus(name, t.jobProgress.replace('%1$s', fmt(done)).replace('%2$s', fmt(total)), 'info');
                $(job.btn).prop('disabled', true);
                if (name === 'validate') $('#r2m-validate-cancel').prop('hidden', false);
                setTimeout(function () { pollJob(name, total || knownTotal); }, 3000);
                return;
            }
            $(job.btn).prop('disabled', name === 'desync');
            $('#r2m-validate-cancel').prop('hidden', true);
            jobStatus(name, d.failed ? t.jobDoneFailed.replace('%s', fmt(d.failed)) : t.jobDone, d.failed ? 'warning' : 'success');
            refresh();
        });
    }

    function startJob(name, data) {
        var job = JOBS[name];
        if (job.confirm && !confirm(t[job.confirm])) return;
        $(job.btn).prop('disabled', true);
        post(job.start, data).done(function (res) {
            if (!res.success) { $(job.btn).prop('disabled', false); jobStatus(name, errMsg(res), 'error'); return; }
            if (!res.data.total) { $(job.btn).prop('disabled', name === 'desync'); jobStatus(name, res.data.message, 'success'); return; }
            jobStatus(name, res.data.message, 'info');
            pollJob(name, res.data.total);
        }).fail(function () { $(job.btn).prop('disabled', false); jobStatus(name, t.requestFailed, 'error'); });
    }

    $('#r2m-validate').on('click', function () { startJob('validate'); });
    $('#r2m-restore').on('click', function () { startJob('restore', { only_missing: $('input[name="r2m_restore"]:checked').val() }); });
    $('#r2m-local-delete').on('click', function () { startJob('local_delete'); });
    $('#r2m-validate-cancel').on('click', function () {
        post('r2_offload_cancel_validate').done(function (res) {
            jobStatus('validate', res.success ? res.data.message : errMsg(res), 'warning');
            $('#r2m-validate-cancel').prop('hidden', true);
            $('#r2m-validate').prop('disabled', false);
        });
    });

    // "Check one item first" — explains what the plugin will look for in the bucket.
    $('#r2m-diagnose').on('click', function () {
        var $btn = $(this).prop('disabled', true), $out = $('#r2m-diagnose-out').prop('hidden', false).text(t.checking);
        post('r2_offload_validate_diagnose').done(function (res) {
            if (!res.success) { $out.text(errMsg(res)); return; }
            var d = res.data;
            if (d.message) { $out.text(d.message); return; }
            var lines = [t.diagItem + ' #' + d.attachment_id + '  (' + d.wp_file + ')', t.diagPrefix + ' ' + d.r2_list_prefix, ''];
            $.each(d.keys || [], function (_, k) { lines.push((k.exists ? '✓ ' : '✗ ') + k.key); });
            if (d.hint) lines.push('', d.hint);
            $out.text(lines.join('\n'));
        }).fail(function () { $out.text(t.requestFailed); })
          .always(function () { $btn.prop('disabled', false); });
    });

    // Danger zone: typed bucket name unlocks the final button.
    var bucket = String($page.data('bucket') || '');
    $('#r2m-dz-open').on('click', function () {
        var open = this.getAttribute('aria-expanded') !== 'true';
        this.setAttribute('aria-expanded', open ? 'true' : 'false');
        $('#r2m-dz-confirm').prop('hidden', !open);
        if (open) $('#r2m-dz-input').val('').trigger('focus');
    });
    $('#r2m-dz-close').on('click', function () {
        $('#r2m-dz-open').attr('aria-expanded', 'false').trigger('focus');
        $('#r2m-dz-confirm').prop('hidden', true);
        $('#r2m-desync').prop('disabled', true);
    });
    $('#r2m-dz-input').on('input', function () { $('#r2m-desync').prop('disabled', !bucket || this.value !== bucket); });
    $('#r2m-desync').on('click', function () {
        if ($('#r2m-dz-input').val() !== bucket) return;
        startJob('desync');
    });

    // =====================================================================
    // Boot: current numbers, any job already running (e.g. after a reload), log.
    // =====================================================================
    refresh();
    $.each(JOBS, function (name) { pollJob(name, 0); });
    setInterval(function () {
        if (document.hidden || looping) return;
        refresh();
    }, 5000);
})(jQuery);
