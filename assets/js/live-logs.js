/* global R2Offload, jQuery */
/*
 * Live logs panel (Stats + Migration). Nothing is stored: ON opens a temporary server
 * buffer and streams it here; OFF deletes the buffer and clears what was shown. Leaving
 * the page also stops the session (beacon), and the server expires it after 30 s anyway.
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
        var entries = [], offset = 0, filter = 'all', timer = null, on = false;

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
                $('<span class="r2ui-log-level"></span>').text({ error: '!', warning: '▲', debug: '·' }[e.level] || '•').attr('aria-label', e.level).appendTo($li);
                $('<span class="r2ui-log-text"></span>').text(e.message + (ctx ? ' — ' + ctx : '')).appendTo($li);
                $list.append($li);
            });
            if (stick) $list.scrollTop($list[0].scrollHeight);   // follow new lines unless the user scrolled up
            $status.html('').append($('<span class="r2ui-dot is-ok" aria-hidden="true"></span>'),
                document.createTextNode(' ' + t.liveCount.replace('%s', entries.length)));
        }

        function take(res) {
            if (!res || !res.success) return;
            if (!res.data.live) { stop(false); return; }          // expired or stopped from another tab
            if (res.data.reset) entries = [];
            entries = entries.concat(res.data.entries || []).slice(-300);
            offset  = res.data.next_offset || offset;
            render();
        }

        function poll() {
            if (!on || document.hidden) return;
            post('r2_offload_live_logs_poll', { offset: offset }).done(take);
        }

        function start() {
            on = true; entries = []; offset = 0;
            $body.prop('hidden', false);
            $status.text(t.liveStarting);
            post('r2_offload_live_logs_start').done(function (res) {
                take(res);
                timer = setInterval(poll, 2000);
            }).fail(function () { $toggle.prop('checked', false); stop(false); $status.text(t.requestFailed); });
        }

        // OFF: stop the server session (deletes the buffer) and clear everything shown.
        function stop(tellServer) {
            on = false;
            clearInterval(timer); timer = null;
            if (tellServer !== false) post('r2_offload_live_logs_stop');
            entries = []; offset = 0;
            $list.empty();
            $body.prop('hidden', true);
            $toggle.prop('checked', false);
        }

        $toggle.on('change', function () { if (this.checked) start(); else stop(); });

        $panel.find('.r2ui-pill').on('click', function () {
            filter = this.getAttribute('data-filter');
            $panel.find('.r2ui-pill').attr('aria-selected', 'false');
            this.setAttribute('aria-selected', 'true');
            render();
        });

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
