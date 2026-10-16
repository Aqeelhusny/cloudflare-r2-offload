/* global R2Offload, jQuery */
(function ($) {
    'use strict';

    // Settings and Migration screens have their own scripts (settings.js, migration.js).

    // =========================================================================
    // File manager — folder tree toggle
    // =========================================================================

    $(document).on('click', '.r2-fm-folder-header, .r2-fm-image-header', function () {
        var $header = $(this);
        var $body   = $('#' + $header.data('target'));
        var $icon   = $header.find('.r2-fm-folder-toggle');
        $body.slideToggle(200);
        $icon.toggleClass('dashicons-arrow-right-alt2 dashicons-arrow-down-alt2');
    });

    // Expand All / Collapse All
    $(document).on('click', '#r2-fm-expand-all', function () {
        $('.r2-fm-folder-body, .r2-fm-image-body').slideDown(200);
        $('.r2-fm-folder-toggle').removeClass('dashicons-arrow-right-alt2').addClass('dashicons-arrow-down-alt2');
    });
    $(document).on('click', '#r2-fm-collapse-all', function () {
        $('.r2-fm-folder-body, .r2-fm-image-body').slideUp(200);
        $('.r2-fm-folder-toggle').removeClass('dashicons-arrow-down-alt2').addClass('dashicons-arrow-right-alt2');
    });

    // =========================================================================
    // File manager — copy URL
    // =========================================================================

    $(document).on('click', '.r2-fm-copy', function () {
        var url = $(this).data('url');
        if (navigator.clipboard) {
            navigator.clipboard.writeText(url);
        } else {
            var $temp = $('<input>').val(url).appendTo('body').select();
            document.execCommand('copy');
            $temp.remove();
        }
        var $btn = $(this);
        var orig = $btn.text();
        $btn.text(R2Offload.i18n.copied);
        setTimeout(function () { $btn.text(orig); }, 1500);
    });

    // =========================================================================
    // File manager — delete file
    // =========================================================================

    $(document).on('click', '.r2-fm-delete', function () {
        if (!confirm(R2Offload.i18n.confirmDeleteFile)) return;
        var $btn = $(this);
        var key  = $btn.data('key');
        $btn.prop('disabled', true);

        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_fm_delete_file',
            nonce:  R2Offload.nonce,
            key:    key
        }, function (res) {
            if (res.success) {
                $btn.closest('tr').fadeOut(300, function () { $(this).remove(); });
            } else {
                alert((res.data && res.data.message) || 'Error');
                $btn.prop('disabled', false);
            }
        });
    });

})(jQuery);
