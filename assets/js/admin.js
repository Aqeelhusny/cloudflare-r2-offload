/* global R2Offload, jQuery */
(function ($) {
    'use strict';

    var pollInterval = null;
    var POLL_MS = 3000;

    // =========================================================================
    // Migration controls
    // =========================================================================

    function updateProgress(data) {
        var total    = parseInt(data.total, 10)    || 0;
        var complete = parseInt(data.complete, 10) || 0;
        var failed   = parseInt(data.failed, 10)   || 0;
        var pending  = parseInt(data.pending, 10) + parseInt(data.processing || 0, 10);
        var pct      = total > 0 ? Math.round(complete / total * 100) : 0;

        // Queue progress bar.
        $('#r2-progress-fill').css('width', pct + '%');
        $('#r2-progress-text').text(complete + ' / ' + total);
        $('#r2-progress-pct').text(pct + '%');

        // Stats bar — all four cards updated live.
        $('#r2-stat-pending').text(pending);
        $('#r2-stat-failed').text(failed);
        if (data.synced !== undefined) {
            $('#r2-stat-synced').text(data.synced);
        }
        if (data.all_attachments !== undefined) {
            $('#r2-stat-total-attachments').text(data.all_attachments);
        }

        if (total > 0) {
            $('#r2-progress-wrap').show();
        }

        if (pending === 0 && total > 0 && !data.paused) {
            stopPolling();
            showMessage(R2Offload.i18n.complete, 'success');
            $('#r2-btn-pause').hide();
            $('#r2-btn-run-now').hide();
        }
    }

    function startPolling() {
        if (pollInterval) return;
        pollInterval = setInterval(function () {
            $.post(R2Offload.ajaxUrl, {
                action: 'r2_offload_migration_status',
                nonce:  R2Offload.nonce
            }, function (res) {
                if (res.success) updateProgress(res.data);
            });
        }, POLL_MS);
    }

    function stopPolling() {
        if (pollInterval) {
            clearInterval(pollInterval);
            pollInterval = null;
        }
    }

    function showMessage(msg, type) {
        $('#r2-migration-message')
            .removeClass('notice-success notice-error notice-warning')
            .addClass('notice notice-' + (type || 'info'))
            .text(msg)
            .show();
    }

    function ajaxAction(action, btnId, loadingText, onSuccess) {
        var $btn = $(btnId);
        var originalText = $btn.text();
        $btn.prop('disabled', true).text(loadingText);

        $.post(R2Offload.ajaxUrl, {
            action: action,
            nonce:  R2Offload.nonce
        }, function (res) {
            $btn.prop('disabled', false).text(originalText);
            if (res.success) {
                if (onSuccess) onSuccess(res.data);
            } else {
                showMessage((res.data && res.data.message) || 'Error', 'error');
            }
        }).fail(function () {
            $btn.prop('disabled', false).text(originalText);
            showMessage('Request failed.', 'error');
        });
    }

    $('#r2-btn-start').on('click', function () {
        showMessage(R2Offload.i18n.starting, 'info');
        ajaxAction('r2_offload_start_migration', '#r2-btn-start', R2Offload.i18n.starting, function (data) {
            showMessage(data.message, 'success');
            $('#r2-progress-fill').css('width', '0%');
            $('#r2-progress-text').text('0 / ' + (data.total || 0));
            $('#r2-progress-pct').text('0%');
            $('#r2-btn-pause').show();
            $('#r2-btn-run-now').show();
            $('#r2-btn-cancel').show();
            $('#r2-progress-wrap').show();
            startPolling();
        });
    });

    $('#r2-btn-run-now').on('click', function () {
        var $btn = $(this);
        $btn.prop('disabled', true).text('Processing…');
        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_run_batch_now',
            nonce:  R2Offload.nonce
        }, function (res) {
            $btn.prop('disabled', false).text('Process Batch Now');
            if (res.success) {
                showMessage(res.data.message, 'success');
                updateProgress(res.data);
                if (res.data.pending === 0 && res.data.processing === 0) {
                    $('#r2-btn-run-now').hide();
                    stopPolling();
                }
            } else {
                showMessage((res.data && res.data.message) || 'Batch failed.', 'error');
            }
        }).fail(function () {
            $btn.prop('disabled', false).text('Process Batch Now');
            showMessage('Request failed.', 'error');
        });
    });

    $('#r2-btn-pause').on('click', function () {
        stopPolling();
        ajaxAction('r2_offload_pause_migration', '#r2-btn-pause', R2Offload.i18n.pausing, function (data) {
            showMessage(data.message, 'info');
            $('#r2-btn-pause').hide();
            $('#r2-btn-resume').show();
        });
    });

    $('#r2-btn-resume').on('click', function () {
        ajaxAction('r2_offload_resume_migration', '#r2-btn-resume', R2Offload.i18n.resuming, function (data) {
            showMessage(data.message, 'success');
            $('#r2-btn-resume').hide();
            $('#r2-btn-pause').show();
            startPolling();
        });
    });

    $('#r2-btn-cancel').on('click', function () {
        if (!confirm(R2Offload.i18n.confirmCancel)) return;
        stopPolling();
        ajaxAction('r2_offload_cancel_migration', '#r2-btn-cancel', R2Offload.i18n.cancelling, function (data) {
            showMessage(data.message, 'warning');
            $('#r2-btn-pause').hide();
            $('#r2-btn-resume').hide();
            $('#r2-btn-run-now').hide();
            $('#r2-btn-cancel').hide();
            $('#r2-progress-fill').css('width', '0%');
            $('#r2-progress-text').text('0 / 0');
            $('#r2-progress-pct').text('0%');
            $('#r2-progress-wrap').hide();
        });
    });

    $('#r2-btn-retry').on('click', function () {
        ajaxAction('r2_offload_retry_failed', '#r2-btn-retry', '…', function (data) {
            showMessage(data.message, 'success');
            startPolling();
        });
    });

    // =========================================================================
    // Restore from R2 → server
    // =========================================================================

    var restorePollInterval = null;

    function updateRestoreProgress(done, total) {
        var pct = total > 0 ? Math.round(done / total * 100) : 0;
        $('#r2-restore-fill').css('width', pct + '%');
        $('#r2-restore-text').text(done + ' / ' + total);
        $('#r2-restore-pct').text(pct + '%');
        $('#r2-restore-progress-wrap').show();
    }

    function showRestoreMessage(msg, type) {
        $('#r2-restore-message').removeClass('notice-success notice-error notice-warning notice-info')
            .addClass('notice notice-' + (type || 'info')).text(msg).show();
    }

    function startRestorePolling(total) {
        if (restorePollInterval) return;
        restorePollInterval = setInterval(function () {
            $.post(R2Offload.ajaxUrl, {
                action: 'r2_offload_restore_status',
                nonce:  R2Offload.nonce
            }, function (res) {
                if (!res.success) return;
                var d = res.data;
                var t = d.total || total;
                if (d.total === 0 && d.done === 0 && total > 0) {
                    clearInterval(restorePollInterval);
                    restorePollInterval = null;
                    updateRestoreProgress(total, total);
                    showRestoreMessage(R2Offload.i18n.restoreComplete, 'success');
                    $('#r2-btn-restore-missing, #r2-btn-restore-all').prop('disabled', false);
                    return;
                }
                updateRestoreProgress(d.done, t);
                if (d.done >= t && t > 0) {
                    clearInterval(restorePollInterval);
                    restorePollInterval = null;
                    showRestoreMessage(R2Offload.i18n.restoreComplete, 'success');
                    $('#r2-btn-restore-missing, #r2-btn-restore-all').prop('disabled', false);
                }
            });
        }, 3000);
    }

    $('#r2-btn-restore-missing').on('click', function () {
        if (!confirm(R2Offload.i18n.confirmRestoreMissing)) return;
        var $btn = $(this);
        $btn.prop('disabled', true);
        showRestoreMessage(R2Offload.i18n.restoreStarting, 'info');

        $.post(R2Offload.ajaxUrl, {
            action:       'r2_offload_start_restore_all',
            nonce:        R2Offload.nonce,
            only_missing: 1
        }, function (res) {
            if (res.success) {
                showRestoreMessage(res.data.message, 'success');
                updateRestoreProgress(0, res.data.total);
                startRestorePolling(res.data.total);
            } else {
                $btn.prop('disabled', false);
                showRestoreMessage((res.data && res.data.message) || 'Error.', 'error');
            }
        });
    });

    $('#r2-btn-restore-all').on('click', function () {
        if (!confirm(R2Offload.i18n.confirmRestoreAll)) return;
        var $btn = $(this);
        $btn.prop('disabled', true);
        showRestoreMessage(R2Offload.i18n.restoreStarting, 'info');

        $.post(R2Offload.ajaxUrl, {
            action:       'r2_offload_start_restore_all',
            nonce:        R2Offload.nonce,
            only_missing: 0
        }, function (res) {
            if (res.success) {
                showRestoreMessage(res.data.message, 'success');
                updateRestoreProgress(0, res.data.total);
                startRestorePolling(res.data.total);
            } else {
                $btn.prop('disabled', false);
                showRestoreMessage((res.data && res.data.message) || 'Error.', 'error');
            }
        });
    });

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

    // =========================================================================
    // Bulk auto-delete local files
    // =========================================================================

    var localDelPollInterval = null;

    function updateLocalDelProgress(done, total) {
        var pct = total > 0 ? Math.round(done / total * 100) : 0;
        $('#r2-local-del-fill').css('width', pct + '%');
        $('#r2-local-del-text').text(done + ' / ' + total);
        $('#r2-local-del-pct').text(pct + '%');
        $('#r2-local-del-progress-wrap').show();
    }

    function showLocalDelMessage(msg, type) {
        $('#r2-local-del-message').removeClass('notice-success notice-error notice-warning notice-info')
            .addClass('notice notice-' + (type || 'info')).text(msg).show();
    }

    function startLocalDelPolling(total) {
        if (localDelPollInterval) return;
        localDelPollInterval = setInterval(function () {
            $.post(R2Offload.ajaxUrl, {
                action: 'r2_offload_local_delete_status',
                nonce:  R2Offload.nonce
            }, function (res) {
                if (!res.success) return;
                var d = res.data;
                var t = d.total || total;
                if (d.total === 0 && d.done === 0 && total > 0) {
                    clearInterval(localDelPollInterval);
                    localDelPollInterval = null;
                    updateLocalDelProgress(total, total);
                    showLocalDelMessage(R2Offload.i18n.localDeleteComplete, 'success');
                    $('#r2-btn-local-delete').prop('disabled', false);
                    return;
                }
                updateLocalDelProgress(d.done, t);
                if (d.done >= t && t > 0) {
                    clearInterval(localDelPollInterval);
                    localDelPollInterval = null;
                    showLocalDelMessage(R2Offload.i18n.localDeleteComplete, 'success');
                    $('#r2-btn-local-delete').prop('disabled', false);
                }
            });
        }, 3000);
    }

    $('#r2-btn-local-delete').on('click', function () {
        if (!confirm(R2Offload.i18n.confirmLocalDelete)) return;
        var $btn = $(this);
        $btn.prop('disabled', true);
        showLocalDelMessage(R2Offload.i18n.localDeleteStarting, 'info');

        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_start_local_delete',
            nonce:  R2Offload.nonce
        }, function (res) {
            if (res.success) {
                showLocalDelMessage(res.data.message, 'success');
                updateLocalDelProgress(0, res.data.total);
                startLocalDelPolling(res.data.total);
            } else {
                $btn.prop('disabled', false);
                showLocalDelMessage((res.data && res.data.message) || 'Error.', 'error');
            }
        });
    });

    // =========================================================================
    // Save credentials (AJAX — submits only the R2 Connection fields)
    // =========================================================================

    $('#r2-save-credentials').on('click', function () {
        var $btn    = $(this);
        var $result = $('#r2-connection-result');
        var origText = $btn.text();

        $btn.prop('disabled', true).text(R2Offload.i18n.saving || 'Saving…');
        $result.text('').removeClass('r2-ok r2-fail');

        $.post(R2Offload.ajaxUrl, {
            action:                      'r2_offload_save_credentials',
            nonce:                       R2Offload.nonce,
            r2_offload_account_id:       $('#r2_account_id').val(),
            r2_offload_access_key_id:    $('#r2_access_key_id').val(),
            r2_offload_secret_access_key: $('#r2_secret_key').val(),
            r2_offload_bucket:           $('#r2_bucket').val()
        }, function (res) {
            $btn.prop('disabled', false).text(origText);
            if (res.success) {
                $result.text('✓ ' + (res.data && res.data.message || 'Credentials saved.')).addClass('r2-ok');
            } else {
                $result.text('✗ ' + (res.data && res.data.message || 'Save failed.')).addClass('r2-fail');
            }
        }).fail(function () {
            $btn.prop('disabled', false).text(origText);
            $result.text('Request failed.').addClass('r2-fail');
        });
    });

    // =========================================================================
    // Connection test
    // =========================================================================

    $('#r2-test-connection').on('click', function () {
        var $btn = $(this);
        var $result = $('#r2-connection-result');
        $btn.prop('disabled', true);
        $result.text('Testing…').removeClass('r2-ok r2-fail');

        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_test_connection',
            nonce:  R2Offload.nonce
        }, function (res) {
            $btn.prop('disabled', false);
            if (res.success) {
                $result.text('✓ ' + res.data.message).addClass('r2-ok');
            } else {
                var msg = '✗ ' + (res.data && res.data.message || 'Error');
                if (res.data && res.data.debug) {
                    var d = res.data.debug;
                    msg += '\n[account_id: ' + d.account_id +
                           ' | key_id: ' + d.access_key_id +
                           ' | secret: ' + d.secret_start + ' (' + d.secret_length + ' chars)' +
                           ' | bucket: ' + d.bucket + ']';
                }
                $result.text(msg).addClass('r2-fail').css('white-space', 'pre-wrap');
            }
        }).fail(function () {
            $btn.prop('disabled', false);
            $result.text('Request failed.').addClass('r2-fail');
        });
    });

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

    // =========================================================================
    // Delete logs button
    // =========================================================================

    $('#r2-btn-delete-logs').on('click', function () {
        if (!confirm(R2Offload.i18n.confirmDelete)) return;
        var $btn    = $(this);
        var $result = $('#r2-delete-logs-result');
        $btn.prop('disabled', true);
        $result.text('Deleting…');

        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_delete_logs',
            nonce:  R2Offload.nonce
        }, function (res) {
            $btn.prop('disabled', false);
            if (res.success) {
                $result.text('✓ ' + res.data.message).css('color', '#008000');
                // Clear visible log rows.
                $('.r2-logs-section tbody tr').fadeOut();
            } else {
                $result.text('✗ Error').css('color', '#d63638');
            }
        });
    });

})(jQuery);
