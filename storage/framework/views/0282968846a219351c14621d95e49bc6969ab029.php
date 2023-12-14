

<?php $__env->startPush('css'); ?>
    <style>
        .track-line {
            height: 4px !important;
            background-color: #488978;
            opacity: 1;
        }

        .dot {
            height: 20px;
            width: 20px;
            margin-left: 3px;
            margin-right: 3px;
            margin-top: 0px;
            background-color: #488978;
            border-radius: 50%;
            display: inline-block
        }

        .big-dot {
            height: 25px;
            width: 25px;
            margin-left: 0px;
            margin-right: 0px;
            margin-top: 0px;
            background-color: #488978;
            border-radius: 50%;
            display: inline-block;
        }

        .big-dot i {
            font-size: 12px;
        }

        .card-stepper {
            z-index: 0
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?php echo e($title); ?></h4>
                            <?php if(auth()->user()->role != 'supervisor'): ?>
                                <a href="<?php echo e(route('debit.create')); ?>" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus mr-2"></i>Tambah
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if($reject > 0): ?>
                            <div class="alert alert-danger" role="alert">
                                Ada <b><?php echo e($reject); ?></b> Permintaan Pembayaran yang ditolak!
                            </div>
                        <?php endif; ?>

                        <div class="form-row mb-3">

                            <div class="card-body p-4">

                                <div
                                    class="d-flex flex-row justify-content-between align-items-center align-content-center">
                                    <span class="dot"></span>
                                    <hr class="flex-fill track-line"><span class="dot"></span>
                                    <hr class="flex-fill track-line"><span
                                        class="d-flex justify-content-center align-items-center big-dot dot">
                                        <i class="fa fa-check text-white"></i></span>
                                </div>

                                <div class="d-flex flex-row justify-content-between align-items-center">
                                    <div class="d-flex flex-column align-items-start">
                                        <span>Tertunda</span>
                                        <button class="btn btn-warning btn-sm mt-1" id="btn1">Tertunda</button>
                                    </div>
                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                        <span>Ditolak</span>
                                        <button class="btn btn-danger btn-sm mt-1" id="btn3">Ditolak</button>
                                    </div>
                                    <div class="d-flex flex-column align-items-end">
                                        <span>Dibayar</span>
                                        <button class="btn btn-success btn-sm mt-1" id="btn4">Dibayar</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="form-row mb-3">
                            <div class="col-md-4">
                                <select id="filter_division" class="form-control">
                                    <option value="">All</option>
                                </select>
                            </div>
                            
                            <div class="col-md-4">
                                <select id="filter_month" class="form-control">
                                    <option value="">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 30px;">No.</th>
                                        <th class="text-center">Divisi</th>
                                        <th class="text-center">Tanggal Faktur</th>
                                        <th class="text-center">No Nota Debit</th>
                                        <th class="text-center">Bank Penerima</th>
                                        <th class="text-center">Diterima Dari</th>
                                        <th class="text-center">Untuk</th>
                                        <th class="text-center">Status</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"> <?php echo e($key + 1); ?> </td>
                                            <td class="text-center"><?php echo e($item->division->name); ?></td>
                                            <td class="text-center"> <?php echo e(date('d-M-Y', strtotime($item->invoice_date))); ?>

                                            </td>
                                            <td class="text-center"><?php echo e($item->no_debit_note); ?></td>
                                            <td class="text-center"><?php echo e($item->bank->name); ?></td>
                                            <td class="text-center"><?php echo e($item->received_from); ?></td>
                                            <td class="text-center"><?php echo e($item->for); ?></td>
                                            <td class="text-center">
                                                <font color="<?php echo e($item->status->color); ?>"><?php echo e($item->status->name); ?>

                                                </font>
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <?php if($item->status_id != 3): ?>
                                                        <a href="<?php echo e(route('debit.download', $item->id)); ?>"
                                                            class="btn btn-sm btn-secondary" title="Download"
                                                            target="_blank"><i class="fas fa-file-pdf"></i></a>
                                                    <?php endif; ?>
                                                    <a href="<?php echo e(route('debit.show', $item->id)); ?>"
                                                        class="btn btn-sm btn-info" title="Detail"><i
                                                            class="fas fa-eye"></i></a>

                                                    <?php if(auth()->user()->role == 'admin'): ?>
                                                        <a href="<?php echo e(route('debit.edit', $item->id)); ?>"
                                                            class="btn btn-sm btn-warning" title="Edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <?php if($item->status_id != 2): ?>
                                                            <form id="form<?php echo e($item->id); ?>"
                                                                action="<?php echo e(route('debit.destroy', $item->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="button"
                                                                    onclick="deleteData('<?php echo e($item->id); ?>');"
                                                                    class="btn btn-sm btn-danger" title="Delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>
                                                    <?php endif; ?>

                                                    <?php if(auth()->user()->role == 'user'): ?>
                                                        <a href="<?php echo e(route('debit.edit', $item->id)); ?>"
                                                            class="btn btn-sm btn-warning" title="Edit"><i
                                                                class="fas fa-edit"></i></a>
                                                        <?php if($item->status_id == 3): ?>
                                                            <form id="form<?php echo e($item->id); ?>"
                                                                action="<?php echo e(route('debit.destroy', $item->id)); ?>"
                                                                method="POST">
                                                                <?php echo csrf_field(); ?>
                                                                <?php echo method_field('DELETE'); ?>
                                                                <button type="button"
                                                                    onclick="deleteData('<?php echo e($item->id); ?>');"
                                                                    class="btn btn-sm btn-danger" title="Delete">
                                                                    <i class="fas fa-trash-alt"></i>
                                                                </button>
                                                            </form>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/plugins/moment/moment.min.js')); ?>"></script>
    <script>
        $(document).ready(function() {
            var table = $('#table').DataTable({
                "columnDefs": [{
                        "orderable": false,
                        "targets": [8]
                    },
                    {
                        "searchable": false,
                        "targets": [8]
                    },
                ],
                "order": [
                    [0, "desc"]
                ]
            });

            $('#btn1').click(function() {
                table.column(7).search('Pending Approval').draw();
            });

            $('#btn3').click(function() {
                table.column(7).search('Reject').draw();
            });

            $('#btn4').click(function() {
                table.column(7).search('Paid').draw();
            });


            var uniqueDivisions = table.column(1).data().unique()
                .toArray();

            var selectFilterDivision = $('#filter_division');
            $.each(uniqueDivisions, function(index, value) {
                selectFilterDivision.append($('<option>', {
                    value: value,
                    text: value
                }));
            });

            selectFilterDivision.on('change', function() {
                var selectedDivision = $(this).val();
                table.column(1).search(selectedDivision)
                    .draw();
            });

            // var uniqueVendors = table.column(4).data().unique()
            //     .toArray();

            // var selectFilterVendor = $('#filter_vendor');
            // $.each(uniqueVendors, function(index, value) {
            //     selectFilterVendor.append($('<option>', {
            //         value: value,
            //         text: value
            //     }));
            // });

            // selectFilterVendor.on('change', function() {
            //     var selectedVendor = $(this).val();
            //     table.column(4).search(selectedVendor).draw();
            // });

            var allDates = table.column(2).data();

            var uniqueMonths = new Set();

            allDates.each(function(date) {
                var month = moment(date, 'DD-MMM-YYYY').format(
                    'MMM');
                uniqueMonths.add(month);
            });

            var sortedMonths = Array.from(uniqueMonths).sort();

            var monthFilter = $('#filter_month');
            sortedMonths.forEach(function(month) {
                monthFilter.append('<option value="' + month + '">' + month + '</option>');
            });

            $('#filter_month').on('change', function() {
                var monthValue = $(this).val();
                table.column(2).search(monthValue).draw();
            });
        });

        function deleteData(idform) {
            swal({
                title: 'Delete Data?',
                icon: "warning",
                buttons: {
                    confirm: {
                        text: 'Yes',
                        className: 'btn btn-success'
                    },
                    cancel: {
                        visible: true,
                        className: 'btn btn-danger'
                    }
                }
            }).then((value) => {
                if (value) {
                    $('#form' + idform).submit();
                } else {
                    swal.close();
                }
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/debit_note/index.blade.php ENDPATH**/ ?>