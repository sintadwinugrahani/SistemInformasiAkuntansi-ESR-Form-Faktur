

<?php $__env->startSection('content'); ?>
    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    
                </div>
                
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Data Statistik Keseluruhan</div>
                        <div class="card-category">Data Statistik Bulan Ini</div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"></div>
                                <h6 class="fw-bold mt-3 mb-0">Permintaan Pembayaran</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2"></div>
                                <h6 class="fw-bold mt-3 mb-0">Nota Debit</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Data Statistik Tahun Ini</div>
                        <div class="row py-3">
                            <div class="col-md-12">
                                <div id="chart-container">
                                    <canvas id="totalIncomeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <!-- Chart JS -->
    <script src="<?php echo e(asset('assets/js/plugin/chart.js/chart.min.js')); ?>"></script>

    <!-- Chart Circle -->
    <script src="<?php echo e(asset('assets/js/plugin/chart-circle/circles.min.js')); ?>"></script>

    <script>
        Circles.create({
            id: 'circles-1',
            radius: 45,
            value: "<?php echo e($data['payment_month']); ?>",
            maxValue: "<?php echo e($data['debit_all']); ?>" + "<?php echo e($data['payment_all']); ?>",
            width: 7,
            text: "<?php echo e($data['payment_month']); ?>",
            colors: ['#f1f1f1', '#FF9E27'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        Circles.create({
            id: 'circles-2',
            radius: 45,
            value: "<?php echo e($data['debit_month']); ?>",
            maxValue: "<?php echo e($data['debit_all']); ?>" + "<?php echo e($data['payment_all']); ?>",
            width: 7,
            text: "<?php echo e($data['debit_month']); ?>",
            colors: ['#f1f1f1', '#2BB930'],
            duration: 400,
            wrpClass: 'circles-wrp',
            textClass: 'circles-text',
            styleWrapper: true,
            styleText: true
        })

        var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

        var mytotalIncomeChart = new Chart(totalIncomeChart, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($data['label'], 15, 512) ?>,
                datasets: [{
                    label: "Payment Request",
                    backgroundColor: '#ff9e27',
                    borderColor: 'rgb(23, 125, 255)',
                    data: <?php echo json_encode($data['payment']['value'], 15, 512) ?>,
                }, {
                    label: "Debit Note",
                    backgroundColor: '#AAFF00',
                    borderColor: 'rgb(170, 255, 0)',
                    data: <?php echo json_encode($data['debit']['value'], 15, 512) ?>,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                legend: {
                    display: false,
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            drawBorder: false,
                            display: false
                        }
                    }]
                },
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/home.blade.php ENDPATH**/ ?>