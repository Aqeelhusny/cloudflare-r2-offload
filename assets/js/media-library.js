/* global R2Offload, jQuery */
/* Media Library list: per-row "Restore from R2" / "Delete local file" actions. */
(function ($) {
    'use strict';

    // =========================================================================
    // Media Library row actions — restore / delete local (inline AJAX)
    // =========================================================================

    // Single attachment restore (row action link).
    $(document).on('click', '.r2-row-restore', function (e) {
        e.preventDefault();
        if (!confirm(R2Offload.i18n.confirmRestoreSingle)) return;
        var $link = $(this);
        var id    = $link.data('id');
        var nonce = $link.data('nonce');
        $link.text(R2Offload.i18n.restoring);

        $.post(R2Offload.ajaxUrl, {
            action:        'r2_offload_restore_attachment',
            nonce:         nonce,
            attachment_id: id
        }, function (res) {
            if (res.success) {
                // Update the R2 Status cell without a full page reload.
                $link.closest('tr').find('.r2_offload_status')
                    .html('<span class="r2-badge r2-badge--synced">' + R2Offload.i18n.statusSynced + '</span>');
                $link.remove();
            } else {
                $link.text(R2Offload.i18n.restoreFailed);
                alert((res.data && res.data.message) || 'Error');
            }
        });
    });

    // Single attachment delete local (row action link).
    $(document).on('click', '.r2-row-delete-local', function (e) {
        e.preventDefault();
        if (!confirm(R2Offload.i18n.confirmDeleteLocal)) return;
        var $link = $(this);
        var id    = $link.data('id');
        var nonce = $link.data('nonce');
        $link.text('…');

        $.post(R2Offload.ajaxUrl, {
            action:        'r2_offload_delete_local_single',
            nonce:         nonce,
            attachment_id: id
        }, function (res) {
            if (res.success) {
                $link.closest('tr').find('.r2_offload_status')
                    .html('<span class="r2-badge r2-badge--r2only">' + R2Offload.i18n.statusR2Only + '</span>');
                $link.replaceWith(
                    '<a href="#" class="r2-row-restore" data-id="' + id + '" data-nonce="' + nonce + '">'
                    + R2Offload.i18n.restoreFromR2 + '</a>'
                );
            } else {
                $link.text(R2Offload.i18n.deleteFailed);
                alert((res.data && res.data.message) || 'Error');
            }
        });
    });


})(jQuery);
