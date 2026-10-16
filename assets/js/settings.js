/* global R2Offload, jQuery */
/* Settings screen: tabs, unsaved-changes bar, upload mode, secret replace, MIME chips, URL preview, connection test. */
(function ($) {
    'use strict';

    var t     = R2Offload.i18n;
    var $form = $('#r2ui-form');
    if (!$form.length) return;

    // ---------------------------------------------------------------- tabs
    var $tabs   = $('.r2ui-tab');
    var TAB_KEY = 'r2ui-settings-tab';

    function showTab(id, focus) {
        $tabs.each(function () {
            var on = this.getAttribute('data-tab') === id;
            this.setAttribute('aria-selected', on ? 'true' : 'false');
            this.tabIndex = on ? 0 : -1;
            if (on && focus) this.focus();
        });
        $('.r2ui-panel').each(function () { this.hidden = this.id !== 'r2ui-panel-' + id; });
        try { sessionStorage.setItem(TAB_KEY, id); } catch (e) { /* storage blocked */ }
    }

    $tabs.on('click', function () { showTab(this.getAttribute('data-tab')); });
    $tabs.on('keydown', function (e) {
        var i = $tabs.index(this), n = $tabs.length, j = null;
        if (e.key === 'ArrowRight') j = (i + 1) % n;
        else if (e.key === 'ArrowLeft') j = (i - 1 + n) % n;
        else if (e.key === 'Home') j = 0;
        else if (e.key === 'End') j = n - 1;
        if (j === null) return;
        e.preventDefault();
        showTab($tabs.eq(j).attr('data-tab'), true);
    });

    var startTab = (location.hash || '').replace('#', '');
    try { startTab = startTab || sessionStorage.getItem(TAB_KEY) || ''; } catch (e) { /* storage blocked */ }
    showTab($('.r2ui-tab[data-tab="' + startTab + '"]').length ? startTab : 'connection');

    // ---------------------------------------------------------------- upload mode → the two real options
    function syncMode() {
        var mode = $('input[name="r2ui_upload_mode"]:checked').val() || 'now';
        $('#r2ui-on-save').val(mode === 'off' ? '0' : '1');
        $('#r2ui-background').val(mode === 'queue' ? '1' : '0');
        $('.r2ui-choice').each(function () {
            $(this).toggleClass('is-selected', $(this).find('input').prop('checked'));
        });
    }
    $('input[name="r2ui_upload_mode"]').on('change', syncMode);
    syncMode();

    // ---------------------------------------------------------------- delete-local danger styling
    function syncDelete() { $('#r2ui-delete-box').toggleClass('is-on', $('#r2ui-delete').prop('checked')); }
    $('#r2ui-delete').on('change', syncDelete);
    syncDelete();

    // ---------------------------------------------------------------- secret replace
    $('#r2ui-secret-replace').on('click', function () {
        $('#r2ui-secret-saved').prop('hidden', true);
        $('#r2ui-secret-keep').prop('disabled', true);
        $('#r2ui-secret-input').prop({ disabled: false, hidden: false }).trigger('focus');
        markDirty();
    });

    // ---------------------------------------------------------------- delivery: preview + serve switch
    function syncDelivery() {
        var domain = $.trim($('#r2ui-domain').val());
        var prefix = $.trim($('#r2ui-prefix').val()).replace(/^\/+|\/+$/g, '');
        var scheme = $('#r2ui-scheme').val() || 'https';
        $('#r2ui-preview-url').text(scheme + '://' + (domain || 'cdn.example.com') + '/' + (prefix ? prefix + '/' : '') + '2026/10/photo-600x400.jpg');

        // No domain = nothing to serve from: disable (so it posts as off), but remember the
        // user's choice and restore it when a domain is typed back in.
        var $serve = $('#r2ui-serve');
        if (!domain && !$serve.prop('disabled')) $serve.data('wanted', $serve.prop('checked')).prop('checked', false);
        if (domain && $serve.prop('disabled')) $serve.prop('checked', !!$serve.data('wanted'));
        $serve.prop('disabled', !domain);
        $('#r2ui-serve-help').text(domain ? t.serveHelpOn : t.serveHelpOff);
    }
    $('#r2ui-domain, #r2ui-prefix, #r2ui-scheme').on('input change', syncDelivery);
    syncDelivery();

    // ---------------------------------------------------------------- excluded MIME types as chips
    var $mime  = $('#r2ui-mime');
    var $input = $('#r2ui-chip-input');

    function mimes() { return $.grep($mime.val().split(/\n+/), function (m) { return $.trim(m) !== ''; }); }

    function renderChips() {
        $('#r2ui-chips .r2ui-chip').remove();
        $.each(mimes(), function (_, m) {
            var $chip = $('<span class="r2ui-chip"></span>').text(m);
            $('<button type="button" class="r2ui-chip-x">×</button>')
                .attr('aria-label', t.removeType.replace('%s', m))
                .on('click', function () {
                    $mime.val($.grep(mimes(), function (x) { return x !== m; }).join('\n'));
                    renderChips(); markDirty(); $input.trigger('focus');
                })
                .appendTo($chip);
            $chip.insertBefore($input);
        });
    }

    function addChip() {
        var v = $.trim($input.val()).toLowerCase();
        if (!v) return;
        if (!/^[a-z0-9.+-]+\/[a-z0-9.+*-]+$/.test(v)) {
            $input.attr({ 'aria-invalid': 'true', 'aria-describedby': 'r2ui-chip-error' });
            $('#r2ui-chip-error').text(t.mimeInvalid).prop('hidden', false);
            return;
        }
        $input.removeAttr('aria-invalid').val('');
        $('#r2ui-chip-error').prop('hidden', true);
        if ($.inArray(v, mimes()) === -1) { $mime.val(mimes().concat(v).join('\n')); renderChips(); markDirty(); }
    }

    $input.on('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ',') { e.preventDefault(); addChip(); }
        else if (e.key === 'Backspace' && !this.value) {
            var list = mimes(); list.pop(); $mime.val(list.join('\n')); renderChips(); markDirty();
        }
    }).on('blur', addChip).on('input', function () {
        if (!this.value) { $input.removeAttr('aria-invalid'); $('#r2ui-chip-error').prop('hidden', true); }
    });
    renderChips();

    // ---------------------------------------------------------------- unsaved changes
    var initial = $form.serialize();
    var dirty   = false;
    var connInitial = connValues();

    function connValues() {
        return $('[data-conn-field] input:enabled').map(function () { return this.name + '=' + this.value; }).get().join('&');
    }

    function markDirty() {
        dirty = $form.serialize() !== initial || !$('#r2ui-secret-input').prop('hidden') && $('#r2ui-secret-input').length > 0;
        $('#r2ui-dirty').text(dirty ? t.unsaved : t.allSaved).toggleClass('is-dirty', dirty);
        $('.r2ui-savebar').toggleClass('is-dirty', dirty);
        var connDirty = connValues() !== connInitial;
        $('#r2-test-connection').prop('disabled', connDirty);
        if (connDirty) $('#r2-connection-result').attr('class', 'r2ui-result').text(t.saveToTest);
        else if ($('#r2-connection-result').text() === t.saveToTest) $('#r2-connection-result').text('');
    }

    $form.on('input change', 'input, select, textarea', markDirty);
    $('#r2ui-discard').on('click', function () { dirty = false; location.reload(); });
    $form.on('submit', function (e) {
        addChip();   // a typed-but-unconfirmed type is saved, not silently dropped
        if ($input.attr('aria-invalid') === 'true') {
            e.preventDefault();
            showTab('advanced');
            $input.trigger('focus');
            return;
        }
        dirty = false;
        $('#r2ui-save').prop('disabled', true).text(t.saving);
    });
    $(window).on('beforeunload', function () { if (dirty) return t.unsaved; });

    // ---------------------------------------------------------------- connection test (saved credentials)
    $('#r2-test-connection').on('click', function () {
        var $btn = $(this), $out = $('#r2-connection-result');
        $btn.prop('disabled', true);
        $out.attr('class', 'r2ui-result').text(t.testing);
        $.post(R2Offload.ajaxUrl, { action: 'r2_offload_test_connection', nonce: R2Offload.nonce }, function (res) {
            var ok  = !!res.success;
            var msg = (res.data && res.data.message) || (ok ? t.connected : t.requestFailed);
            $out.attr('class', 'r2ui-result ' + (ok ? 'is-ok' : 'is-err')).text(msg);
            $('#r2ui-conn-state .r2ui-dot').attr('class', 'r2ui-dot ' + (ok ? 'is-ok' : 'is-err'));
            $('#r2ui-conn-state span:last').text(ok ? t.connected : t.connFailed);
            $('#r2ui-conn-sub').text(ok ? t.testedNow : msg);
        }).fail(function () {
            $out.attr('class', 'r2ui-result is-err').text(t.requestFailed);
        }).always(function () { $btn.prop('disabled', false); });
    });
})(jQuery);
