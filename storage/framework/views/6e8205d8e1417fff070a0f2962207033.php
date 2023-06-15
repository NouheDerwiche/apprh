<?php $__env->startSection('content'); ?><div>
    <canvas id="userChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var data = {
            labels: <?php echo $chart->labels(); ?>,
            datasets: [{
                label: "<?php echo $chart->elementLabel(); ?>",
                data: <?php echo $chart->dataset(0); ?>,
                backgroundColor: <?php echo $chart->colors(); ?>,
                borderWidth: 1
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: false
        };

        var ctx = document.getElementById('userChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>

    <?php $__env->stopSection(); ?>

<?php echo $__env->make('test.index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\derwiche\apprh\resources\views/chartjs.blade.php ENDPATH**/ ?>