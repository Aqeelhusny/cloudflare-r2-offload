/* global R2Offload, jQuery, Chart */
/* Stats screen: KPI cards + daily chart with a 7 / 30-day range. Live logs: live-logs.js. */
(function ($) {
    'use strict';

    var t    = R2Offload.i18n;
    var node = document.getElementById('r2s-data');
    if (!node) return;

    var days  = JSON.parse(node.textContent || '[]');
    var range = 30, chart = null;

    function bytes(n) {
        var u = ['B', 'KB', 'MB', 'GB', 'TB'], i = 0;
        while (n >= 1024 && i < u.length - 1) { n /= 1024; i++; }
        return (i ? n.toFixed(n < 10 ? 2 : 1) : n) + ' ' + u[i];
    }
    function sum(rows, k) { return rows.reduce(function (a, r) { return a + (r[k] || 0); }, 0); }

    function draw() {
        var rows = days.slice(-range);
        $('[data-kpi="uploads"]').text(sum(rows, 'uploads').toLocaleString());
        $('[data-kpi="bytes"]').text(bytes(sum(rows, 'bytes')));
        $('[data-kpi="failures"]').text(sum(rows, 'failures').toLocaleString());
        $('[data-kpi-range]').text(t.lastNDays.replace('%s', range));
        $('.r2ui-seg-btn').each(function () { this.setAttribute('aria-checked', String(+this.getAttribute('data-range') === range)); });

        var empty = !sum(rows, 'uploads') && !sum(rows, 'failures');
        $('#r2s-empty').prop('hidden', !empty);
        $('#r2s-chart').attr('aria-label', t.chartLabel.replace('%1$s', range).replace('%2$s', sum(rows, 'uploads')).replace('%3$s', sum(rows, 'failures')));

        if (typeof Chart === 'undefined') return;
        var labels = rows.map(function (r) {
            return new Date(r.date + 'T00:00:00').toLocaleDateString(undefined, { month: 'short', day: 'numeric' });
        });
        var data = {
            labels: labels,
            datasets: [
                { label: t.filesUploaded, data: rows.map(function (r) { return r.uploads; }), backgroundColor: '#2271b1', borderRadius: 3, maxBarThickness: 28 },
                { label: t.failedSyncs, data: rows.map(function (r) { return r.failures; }), backgroundColor: '#d63638', borderRadius: 3, maxBarThickness: 28 }
            ]
        };
        if (chart) { chart.data = data; chart.update(); return; }
        chart = new Chart(document.getElementById('r2s-chart'), {
            type: 'bar',
            data: data,
            options: {
                responsive: true, maintainAspectRatio: false, animation: { duration: 200 },
                plugins: { legend: { display: false }, tooltip: { mode: 'index', intersect: false } },
                scales: {
                    x: { grid: { display: false }, ticks: { color: '#50575e', maxRotation: 0, autoSkip: true, maxTicksLimit: 10 } },
                    y: { beginAtZero: true, ticks: { color: '#50575e', precision: 0 }, grid: { color: '#f0f0f1' } }
                }
            }
        });
    }

    $('.r2ui-seg-btn').on('click', function () { range = +this.getAttribute('data-range'); draw(); });
    draw();
})(jQuery);
