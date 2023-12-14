

<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group row">
                    
                    <div class="col-sm-4">
                        <input type="text" class="form-control <?php $__errorArgs = ['from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="range"
                            placeholder="YYYY-MM-DD" autocomplete="off">
                    </div>
                    <div class="col-sm-4">
                        <select id="status" class="form-control">
                            <option <?php echo e(request('status') == 'paid' ? 'selected' : ''); ?> value="paid">Dibayar</option>
                            <option <?php echo e(request('status') == 'unpaid' ? 'selected' : ''); ?> value="unpaid">Belum Dibayar</option>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <button class="btn btn-primary btn-block" id="apply">Terapkan</button>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?php echo e($title); ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(count($data ?? []) > 0): ?>
                            <div class="table-responsive">
                                <table id="table" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No. Permintaan Pembayaran</th>
                                            <th class="text-center">Voucher Permintaan Pembayaran</th>
                                            <th class="text-center">Tanggal Dibayar</th>
                                            <th class="text-center">Nama Penerima</th>
                                            <th class="text-center">Bank A/C</th>
                                            <th class="text-center">Untuk</th>
                                            <th class="text-center">Jumlah Harga</th>
                                            <th class="text-center">PPN</th>
                                            <th class="text-center">WHT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $vat_value = 0;
                                                $wht_value = 0;
                                                $total = 0;
                                                $grand_total = 0;
                                                if ($item->vat > 0) {
                                                    $vat_value = ($item->totalreg * $item->vat) / 100;
                                                }
                                                if ($item->wht) {
                                                    $wht_value = ($item->totalreg * $item->wht->value) / 100;
                                                }
                                                $total = $item->total + $vat_value - $wht_value;
                                                $grand_total = $item->total + $item->bank_charge + $vat_value - $wht_value;
                                            ?>

                                            <tr>
                                                <td class="text-center"><?php echo e($item->no_pr); ?></td>
                                                <td class="text-center"><?php echo e(date('d-M-Y', strtotime($item->date_pr))); ?></td>
                                                <td class="text-center">
                                                    <?php if($item->status_id != 4): ?>
                                                        <?php echo e($item->status->name); ?>

                                                    <?php else: ?>
                                                        <?php echo e(date('d-M-Y', strtotime($item->paid_date))); ?>

                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center"><?php echo e($item->vendor->beneficary); ?></td>
                                                <td class="text-center"><?php echo e(substr($item->vendor->bank, 0, 30)); ?></td>
                                                <td class="text-center"><?php echo e($item->for); ?></td>
                                                <td class="text-center">
                                                    <?php echo e($grand_total > 0 ? number_format($grand_total, 0, ',', ',') : 0); ?>

                                                </td>
                                                <td class="text-center">
                                                    <?php echo e($vat_value > 0 ? number_format($vat_value, 0, ',', ',') : 0); ?></td>
                                                <td class="text-center">
                                                    <?php echo e($wht_value > 0 ? number_format($wht_value, 0, ',', ',') : 0); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <strong>Data tidak ditemukan!</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="GET" id="form_get_data">
        <input type="hidden" name="from" id="input_from">
        <input type="hidden" name="to" id="input_to">
        <input type="hidden" name="status" id="input_status">
    </form>

    <?php $__errorArgs = ['from'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <script>
            alert('from')
        </script>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

    <?php $__errorArgs = ['to'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <script>
            alert('to')
        </script>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>

    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>

    <?php
        $fromDate = request('from') ?? now()->startOfMonth();
        $toDate = request('to') ?? now();
        $formattedFromDate = \Carbon\Carbon::parse($fromDate)->format('Y-m-d');
        $formattedToDate = \Carbon\Carbon::parse($toDate)->format('Y-m-d');
    ?>
    <script>
        $(document).ready(function() {

            // document.title =
            //     "<?php echo e($title); ?> <?php echo e($formattedFromDate); ?> - <?php echo e($formattedToDate); ?>"

            if ($("#range").length) {
                $('#range').daterangepicker({
                    locale: {
                        format: 'YYYY-MM-DD'
                    },
                    maxSpan: {
                        days: 31
                    },
                    ranges: {
                        'Today': [moment(), moment()],
                        'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                        'Last 7 Days': [moment().subtract(6, 'days').startOf('day'), moment().endOf('day')],
                        'Last 31 Days': [moment().subtract(30, 'days'), moment()],
                        'This Month': [moment().startOf('month'), moment()],
                        'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1,
                                'month')
                            .endOf('month')
                        ],
                    },
                    showDropdowns: true,
                    startDate: "<?php echo e(request('from') ?: now()->startOfMonth()); ?>",
                    endDate: "<?php echo e(request('to') ?: now()); ?>",
                    maxDate: moment(),
                });
            }

            $('#apply').click(function() {
                let from = $('#range').data('daterangepicker').startDate.format('YYYY-MM-DD');
                let to = $('#range').data('daterangepicker').endDate.format('YYYY-MM-DD');

                let status = $('#status').val();

                $('#input_from').val(from)
                $('#input_to').val(to)
                $('#input_status').val(status)
                $('#form_get_data').submit()
            })

            if ($("#table").length) {
                $("#table").DataTable({
                    paging: false,
                    lengthChange: false,
                    searching: false,
                    ordering: false,
                    info: false,
                    autoWidth: false,
                    responsive: true,
                    // order: [[1, 'asc']],
                    buttons: ["csv", "excel", {
                        extend: 'pdf',
                        orientation: 'landscape',
                        title: `Report Payment Request
                                    <?php echo e($formattedFromDate); ?> - <?php echo e($formattedToDate); ?>`,
                        pageSize: 'A4',
                        customize: function(doc) {
                            doc.content[1].table.widths =
                                Array(doc.content[1].table.body[0].length + 1).join('*').split(
                                    '');
                            doc.styles.tableBodyEven.alignment = 'center';
                            doc.styles.tableBodyOdd.alignment = 'center';
                            doc.defaultStyle.fontSize = 8
                            doc.styles.tableHeader.fillColor = '#ffffff';
                            // Mengubah warna teks header menjadi putih (#ffffff)
                            doc.styles.tableHeader.color = '#000000';

                        },
                    }, {
                        extend: "print",
                        text: 'Print',
                        title: '',
                        customize: function(doc) {
                            doc.defaultStyle.fontSize = 8
                        },
                        messageTop: function() {
                            return `Report Payment Request
                                    <?php echo e($formattedFromDate); ?> - <?php echo e($formattedToDate); ?>`
                        },
                    }]
                }).buttons().container().appendTo('.col-md-6:eq(0)');

            }

        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/report/payment.blade.php ENDPATH**/ ?>