
<?php $__env->startPush('css'); ?>
    <style>
        .bold-right {
            text-align: right;
        }

        .bold-no-border {
            /* width: 46.25pt; */
            border-top: none;
            border-bottom: none;
            border-left: 1pt solid black;
            border-image: initial;
            border-right: 1pt solid black;
            padding: 0mm;
            height: 12.6pt;
            vertical-align: bottom;
            margin: 0mm;
            font-size: 15px;
            font-family: "Calibri", sans-serif;
            margin-top: 1.15pt;
            text-indent: 5.0pt;
            text-align: right;
            /* padding-right: 8pt; */
        }

        .bold-border {
            /* width: 76.05pt; */
            border-top: none;
            border-left: none;
            border-bottom: 1pt solid black;
            border-right: 1pt solid black;
            padding: 0mm;
            height: 12.6pt;
            vertical-align: bottom;
            margin: 0mm;
            font-size: 15px;
            font-family: "Calibri", sans-serif;
            margin-top: 1.15pt;
            margin-right: 2.8pt;
            margin-bottom: .0001pt;
            margin-left: 0mm;
            text-align: right;
        }

        .pd-xs {
            white-space: nowrap;
            font-family: "Calibri", sans-serif;
            padding-left: 5pt;
            padding-right: 5pt;
            margin-right: 3pt;
            font-size: 9px;
        }

        .pd-small {
            white-space: nowrap;
            font-family: "Calibri", sans-serif;
            padding-left: 5pt;
            padding-right: 5pt;
            font-size: 10px;
        }

        .pd-big {
            white-space: nowrap;
            font-family: "Calibri", sans-serif;
            padding-left: 5pt;
            padding-right: 5pt;
            font-size: 11px;
        }

        .pd-header {
            white-space: nowrap;
            padding-left: 60px;
            padding-right: 1pt;
            font-size: 19px;
            margin: 0;
            margin-top: 0;
            padding-top: 0;
            font-weight: bold;
            margin-bottom: 15pt;
            margin-right: 5pt;
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
                            <h4 class="card-title">Tindakan</h4>
                        </div>
                    </div>
                    <div class="card-body text-center">

                        <?php if($data->status_id == 1 && auth()->user()->role == 'supervisor'): ?>
                            <button class="btn btn-warning btn-round" data-toggle="modal" data-target="#exampleModal">
                                <i class="fas fa-thumbs-up mr-1"></i>Ubah Status</button>
                        <?php endif; ?>

                        <?php if(
                            $data->status_id == 2 &&
                                $data->status_id != 4 &&
                                (auth()->user()->role == 'admin' || auth()->user()->role == 'user')): ?>
                            <button id="set_paid" class="btn btn-success btn-round" data-toggle="modal"
                                data-target="#exampleModal3">
                                <i class="fas fa-thumbs-up mr-1"></i>Atur Jumlah Dibayar</button>
                        <?php endif; ?>

                        <?php if($data->status_id == 4): ?>
                            <a href="<?php echo e(route('payment.download', $data->id)); ?>" class="btn btn-primary btn-round ml-2"
                                target="_blank">
                                <i class="fas fa-file-pdf mr-1"></i>Unduh
                            </a>
                        <?php endif; ?>
                        <?php if(auth()->user()->role != 'supervisor' && $data->status_id != 4): ?>
                            <a href="<?php echo e(route('payment.edit', $data->id)); ?>" class="btn btn-secondary btn-round ml-2">
                                <i class="fas fa-edit mr-1"></i>Edit
                            </a>
                            
                        <?php endif; ?>
                    </div>
                </div>

                <?php if(!empty($data->note)): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo e($data->note); ?>

                    </div>
                <?php endif; ?>

                

                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">
                                Detail <?php echo e($title); ?> <?php echo e($data->no_pr); ?> <span class="badge ml-2"
                                    style="background-color: <?php echo e($data->status->color); ?>;">
                                    <font color="white"><i class="fas fa-circle mr-1"></i><?php echo e($data->status->name); ?></font>
                                </span>
                            </h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table style="border-collapse:collapse;border:none; margin-left: auto;margin-right: auto;">
                                <?php echo $__env->make('payment_request.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if($data->status_id != 4): ?>
        <form method="POST" action="<?php echo e(route('payment.status', $data->id)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ubah Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Status</label>
                                <div class="form-inline">

                                    <?php if(auth()->user()->role == 'supervisor'): ?>
                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" name="status" id="status2"
                                                value="2" <?php echo e($data->status_id == 2 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="status2">Diterima</label>
                                        </div>

                                        <div class="form-check mr-3">
                                            <input class="form-check-input" type="radio" name="status" id="status3"
                                                value="3" <?php echo e($data->status_id == 3 ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="status3">Ditolak</label>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="note">Catatan</label>
                                <textarea class="form-control" name="note" id="note" rows="3" maxlength="150"><?php echo e($data->note); ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>

    



    <?php if(
        $data->status_id == 2 &&
            $data->status_id != 4 &&
            (auth()->user()->role == 'admin' || auth()->user()->role == 'user')): ?>
        <form method="POST" action="<?php echo e(route('payment.set.paid', $data->id)); ?>">
            <?php echo csrf_field(); ?>
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModal3Label">Ubah Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Dibayar</label>
                                <input type="date" class="form-control" name="date" id="" required>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php endif; ?>

    <form id="form_set_paid" action="<?php echo e(route('payment.set.paid', $data->id)); ?>" method="POST">
        <?php echo csrf_field(); ?>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
    <script>
        bsCustomFileInput.init();

        // $('#set_paid').click(function() {
        //     swal({
        //         title: 'Set Paid?',
        //         icon: "warning",
        //         buttons: {
        //             confirm: {
        //                 text: 'Yes',
        //                 className: 'btn btn-success'
        //             },
        //             cancel: {
        //                 visible: true,
        //                 className: 'btn btn-danger'
        //             }
        //         }
        //     }).then((value) => {
        //         if (value) {
        //             $('#form_set_paid').submit();
        //         } else {
        //             swal.close();
        //         }
        //     });
        // })

        function deleteData(idform) {
            swal({
                title: 'Delete File?',
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

    <?php if($errors->has('file')): ?>
        <script>
            $(document).ready(function() {
                $('#exampleModal2').modal('show');
            });
        </script>
    <?php endif; ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/payment_request/detail.blade.php ENDPATH**/ ?>