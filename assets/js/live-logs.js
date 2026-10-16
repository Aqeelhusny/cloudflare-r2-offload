/* global R2Offload, jQuery */
/*
 * Live logs panel (Stats + Migration). Nothing is stored: ON opens a temporary server
 * buffer and streams it here; OFF deletes the buffer and clears what was shown. Leaving
 * the page also stops the session (beacon), and the server expires it after 2 min anyway.
 * The session is site-wide: another admin switching ON/OFF affects every open viewer.
 */
(function ($) {
    'use strict';

    var t = R2Offload.i18n;

    function post(action, data) {
        return $.post(R2Offload.ajaxUrl, $.extend({ action: action, nonce: R2Offload.nonce }, data || {}));
    }

    $('[data-live-logs]').each(function () {
        var $panel  = $(this);
        var $toggle = $panel.find('[data-live-toggle]');
        var $body   = $panel.find('[data-live-body]');
        var $list   = $panel.find('[data-live-list]');
        var $status = $panel.find('[data-live-status]');
        var entries = [], offset = 0, gen = 0, filter = 'all', timer = null, on = false, shown = '';

        // Status line: only touch the live region when the text really changes (no 2 s re-announcements).
        function status(text, ok) {
            if (text === shown) return;
            shown = text;
            $status.empty();
            if (ok) $status.append($('<span class="r2ui-dot is-ok" aria-hidden="true"></span>'), ' ');
            $status.append(document.createTextNode(text));
        }

        function render() {
            var rows = $.grep(entries, function (e) { return filter === 'all' || e.level === filter; });
            var stick = $list[0].scrollTop + $list[0].clientHeight >= $list[0].scrollHeight - 24;
            $list.empty();
            if (!rows.length) {
                $('<li class="r2ui-log-empty"></li>').text(entries.length ? t.noMatches : t.liveWaiting).appendTo($list);
            }
            $.each(rows, function (_, e) {
                var ctx = e.context && (e.context.file || e.context.key || e.context.attachment_id);
                var $li = $('<li class="r2ui-log-row"></li>').addClass('is-' + e.level);
                $('<time></time>').attr('datetime', e.timestamp).text(String(e.timestamp || '').slice(11, 19)).appendTo($li);
                $('<span class="r2ui-log-level" aria-hidden="true"></span>').text({ error: '!', warning: '▲', debug: '·' }[e.level] || '•').appendTo($li);
                $('<span class="screen-reader-text"></span>').text((t['level_' + e.level] || e.level) + ': ').appendTo($li);
                $('<span class="r2ui-log-text"></span>').text(e.message + (ctx ? ' — ' + ctx : '')).appendTo($li);
                $list.append($li);
            });
            if (stick) $list.scrollTop($list[0].scrollHeight);   // follow new lines unless the user scrolled up
            status(t.liveCount.replace('%s', entries.length), true);
        }

        function take(res) {
            if (!res || !res.success) return;
            if (!res.data.live) { stop(false, t.liveEnded); return; }  // expired, or switched off in another tab
            if (res.data.reset) entries = [];
            entries = entries.concat(res.data.entries || []).slice(-300);
            offset  = res.data.next_offset || 0;
            gen     = res.data.gen || 0;
            render();
        }

        // Keep polling in background tabs too: the poll is the heartbeat that keeps the session open.
        function poll() {
            if (!on) return;
            post('r2_offload_live_logs_poll', { offset: offset, gen: gen }).done(take);
        }

        function start() {
            on = true; entries = []; offset = 0; gen = 0;
            $body.prop('hidden', false);
            status(t.liveStarting, false);
            post('r2_offload_live_logs_start').done(function (res) {
                if (!res || !res.success) { stop(false, (res && res.data && res.data.message) || t.requestFailed); return; }
                take(res);
                timer = setInterval(poll, 2000);
            }).fail(function () { stop(false, t.requestFailed); });
        }

        // OFF: stop the server session (deletes the buffer) and clear everything shown.
        // `why` (not switched off by the user) keeps a one-line explanation visible.
        function stop(tellServer, why) {
            on = false;
            clearInterval(timer); timer = null;
            if (tellServer !== false) post('r2_offload_live_logs_stop');
            entries = []; offset = 0; gen = 0;
            $list.empty();
            $toggle.prop('checked', false);
            if (why) { $body.prop('hidden', false); status(why, false); }
            else { $body.prop('hidden', true); status('', false); }
        }

        $toggle.on('change', function () { if (this.checked) start(); else stop(); });

        $panel.find('.r2ui-pill').on('click', function () {
            filter = this.getAttribute('data-filter');
            $panel.find('.r2ui-pill').attr('aria-pressed', 'false');
            this.setAttribute('aria-pressed', 'true');
            render();
        });

        // Coming back to a background tab: catch up immediately instead of waiting for the timer.
        $(document).on('visibilitychange', function () { if (!document.hidden) poll(); });

        // Leaving the page while ON: stop the session so nothing lingers on the server.
        $(window).on('pagehide', function () {
            if (!on || !navigator.sendBeacon) return;
            var fd = new FormData();
            fd.append('action', 'r2_offload_live_logs_stop');
            fd.append('nonce', R2Offload.nonce);
            navigator.sendBeacon(R2Offload.ajaxUrl, fd);
        });
    });
})(jQuery);
