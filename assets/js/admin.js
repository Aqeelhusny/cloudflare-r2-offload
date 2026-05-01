/* global R2Offload, jQuery */
(function ($) {
    'use strict';

    var pollInterval = null;
    var POLL_MS = 5000;

    // =========================================================================
    // Background page refresh — keeps stats and buttons in sync
    // =========================================================================

    var bgRefreshInterval = null;
    var BG_REFRESH_MS = 10000;

    function startBackgroundRefresh() {
        if (bgRefreshInterval) return;
        bgRefreshInterval = setInterval(function () {
            if (document.hidden) return;
            $.post(R2Offload.ajaxUrl, {
                action: 'r2_offload_migration_status',
                nonce:  R2Offload.nonce
            }, function (res) {
                if (!res.success) return;
                var d = res.data;
                var total   = parseInt(d.total, 10) || 0;
                var pending = parseInt(d.pending, 10) + parseInt(d.processing || 0, 10);
                var failed  = parseInt(d.failed, 10) || 0;

                // Stats cards.
                if (d.all_attachments !== undefined) $('#r2-stat-total-attachments').text(d.all_attachments);
                if (d.synced !== undefined) $('#r2-stat-synced').text(d.synced);
                $('#r2-stat-pending').text(pending);
                $('#r2-stat-failed').text(failed);

                // Button visibility when no active migration.
                if (total === 0) {
                    $('#r2-btn-pause, #r2-btn-resume, #r2-btn-run-now, #r2-btn-cancel').hide();
                    $('#r2-progress-wrap').hide();
                }
            });
        }, BG_REFRESH_MS);
    }

    startBackgroundRefresh();

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
            if (!data.total || data.total === 0) {
                showMessage(data.message, 'success');
                return;
            }
            showMessage(data.message, 'success');
            $('#r2-progress-fill').css('width', '0%');
            $('#r2-progress-text').text('0 / ' + data.total);
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
                if (!res.data.total || res.data.total === 0) {
                    $btn.prop('disabled', false);
                    return;
                }
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
                if (!res.data.total || res.data.total === 0) {
                    $btn.prop('disabled', false);
                    return;
                }
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
                if (!res.data.total || res.data.total === 0) {
                    $btn.prop('disabled', false);
                    return;
                }
                updateLocalDelProgress(0, res.data.total);
                startLocalDelPolling(res.data.total);
            } else {
                $btn.prop('disabled', false);
                showLocalDelMessage((res.data && res.data.message) || 'Error.', 'error');
            }
        });
    });

    // =========================================================================
    // Bulk restore & desync (restore from R2, verify, delete from R2)
    // =========================================================================

    var desyncPollInterval = null;

    function updateDesyncProgress(done, total) {
        var pct = total > 0 ? Math.round(done / total * 100) : 0;
        $('#r2-desync-fill').css('width', pct + '%');
        $('#r2-desync-text').text(done + ' / ' + total);
        $('#r2-desync-pct').text(pct + '%');
        $('#r2-desync-progress-wrap').show();
    }

    function showDesyncMessage(msg, type) {
        $('#r2-desync-message').removeClass('notice-success notice-error notice-warning notice-info')
            .addClass('notice notice-' + (type || 'info')).text(msg).show();
    }

    function startDesyncPolling(total) {
        if (desyncPollInterval) return;
        desyncPollInterval = setInterval(function () {
            $.post(R2Offload.ajaxUrl, {
                action: 'r2_offload_desync_status',
                nonce:  R2Offload.nonce
            }, function (res) {
                if (!res.success) return;
                var d = res.data;
                var t = d.total || total;
                if (d.total === 0 && d.done === 0 && total > 0) {
                    clearInterval(desyncPollInterval);
                    desyncPollInterval = null;
                    updateDesyncProgress(total, total);
                    showDesyncMessage(R2Offload.i18n.desyncComplete, 'success');
                    $('#r2-btn-desync').prop('disabled', false);
                    return;
                }
                updateDesyncProgress(d.done + d.failed, t);
                if ((d.done + d.failed) >= t && t > 0) {
                    clearInterval(desyncPollInterval);
                    desyncPollInterval = null;
                    if (d.failed > 0) {
                        showDesyncMessage(R2Offload.i18n.desyncCompleteFailed.replace('%d', d.failed), 'warning');
                    } else {
                        showDesyncMessage(R2Offload.i18n.desyncComplete, 'success');
                    }
                    $('#r2-btn-desync').prop('disabled', false);
                }
            });
        }, 3000);
    }

    $('#r2-btn-desync').on('click', function () {
        if (!confirm(R2Offload.i18n.confirmDesync)) return;
        var $btn = $(this);
        $btn.prop('disabled', true);
        showDesyncMessage(R2Offload.i18n.desyncStarting, 'info');

        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_start_desync',
            nonce:  R2Offload.nonce
        }, function (res) {
            if (res.success) {
                showDesyncMessage(res.data.message, 'success');
                if (!res.data.total || res.data.total === 0) {
                    $btn.prop('disabled', false);
                    return;
                }
                updateDesyncProgress(0, res.data.total);
                startDesyncPolling(res.data.total);
            } else {
                $btn.prop('disabled', false);
                showDesyncMessage((res.data && res.data.message) || 'Error.', 'error');
            }
        });
    });

    // =========================================================================
    // Background Offload Queue — polling and log refresh
    // =========================================================================

    var bgQueuePollInterval = null;
    var BG_QUEUE_POLL_MS = 5000;

    function startBgQueuePolling() {
        if (bgQueuePollInterval) return;
        if (!$('#r2-bg-queue-pending').length) return;

        bgQueuePollInterval = setInterval(function () {
            if (document.hidden) return;
            $.post(R2Offload.ajaxUrl, {
                action: 'r2_offload_background_queue_status',
                nonce:  R2Offload.nonce
            }, function (res) {
                if (!res.success) return;
                var d = res.data;
                $('#r2-bg-queue-pending').text(d.queue_pending || 0);
                $('#r2-bg-queue-synced').text(d.synced || 0);
                $('#r2-bg-queue-failed').text(d.queue_failed || 0);
                $('#r2-bg-queue-next-cron').text(d.next_cron || '—');

                // Also update the main stats cards.
                if (d.all_attachments !== undefined) $('#r2-stat-total-attachments').text(d.all_attachments);
                if (d.synced !== undefined) $('#r2-stat-synced').text(d.synced);
                $('#r2-stat-pending').text(d.queue_pending || 0);
                $('#r2-stat-failed').text(d.queue_failed || 0);
            });
        }, BG_QUEUE_POLL_MS);
    }

    if ($('#r2-bg-queue-pending').length) {
        startBgQueuePolling();
    }

    function refreshBgLogs() {
        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_background_queue_logs',
            nonce:  R2Offload.nonce,
            limit:  50
        }, function (res) {
            if (!res.success || !res.data.logs) return;
            var $tbody = $('#r2-bg-logs-body');
            $tbody.empty();
            if (res.data.logs.length === 0) {
                $tbody.append('<tr><td colspan="4">No log entries yet.</td></tr>');
                return;
            }
            $.each(res.data.logs, function (i, log) {
                var levelClass = '';
                if (log.level === 'error') levelClass = 'r2-log-error';
                else if (log.level === 'warning') levelClass = 'r2-log-warning';

                var badgeClass = 'r2-log-badge r2-log-badge--' + log.level;
                var ctx = JSON.stringify(log.context || {});

                $tbody.append(
                    '<tr class="' + levelClass + '">' +
                    '<td>' + escHtml(log.timestamp) + '</td>' +
                    '<td><span class="' + badgeClass + '">' + escHtml(log.level.toUpperCase()) + '</span></td>' +
                    '<td>' + escHtml(log.message) + '</td>' +
                    '<td><code style="font-size:11px;word-break:break-all;">' + escHtml(ctx) + '</code></td>' +
                    '</tr>'
                );
            });
        });
    }

    function escHtml(str) {
        if (!str) return '';
        return String(str).replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;').replace(/"/g,'&quot;');
    }

    $('#r2-bg-refresh-logs').on('click', function () {
        var $btn = $(this);
        $btn.prop('disabled', true).text('Refreshing…');
        refreshBgLogs();
        setTimeout(function () {
            $btn.prop('disabled', false).text('Refresh');
        }, 1000);
    });

    $('#r2-bg-clear-logs').on('click', function () {
        if (!confirm(R2Offload.i18n.confirmClearLogs || 'Clear all activity logs? This cannot be undone.')) return;
        var $btn = $(this);
        $btn.prop('disabled', true).text('Clearing…');
        $.post(R2Offload.ajaxUrl, {
            action: 'r2_offload_clear_activity_logs',
            nonce:  R2Offload.nonce
        }, function (res) {
            $btn.prop('disabled', false).text('Clear Logs');
            if (res.success) {
                $('#r2-bg-logs-body').empty().append('<tr><td colspan="4">No log entries yet.</td></tr>');
            } else {
                alert((res.data && res.data.message) || 'Failed to clear logs.');
            }
        }).fail(function () {
            $btn.prop('disabled', false).text('Clear Logs');
            alert('Request failed.');
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
