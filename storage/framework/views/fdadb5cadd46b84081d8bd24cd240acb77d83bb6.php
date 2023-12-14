

<?php $__env->startSection('content'); ?>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title"><?php echo e($title); ?></h4>
                            <a href="<?php echo e(route('user.create')); ?>" class="btn btn-primary btn-round ml-auto">
                                <i class="fa fa-plus mr-2"></i>Tambah
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 30px;">No.</th>
                                        <th class="text-center">Nama</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Peran</th>
                                        <th class="text-center">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td class="text-center"> <?php echo e($key + 1); ?> </td>
                                            <td class="text-center"><?php echo e($item->name); ?></td>
                                            <td class="text-center"><?php echo e($item->email); ?></td>
                                            <td class="text-center"><?php echo e($item->role); ?></td>
                                            <td class="text-center">
                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                    <a href="<?php echo e(route('user.edit', $item->id)); ?>"
                                                        class="btn btn-sm btn-warning" title="Edit"><i
                                                            class="fas fa-edit"></i></a>
                                                    <form id="form<?php echo e($item->id); ?>"
                                                        action="<?php echo e(route('user.destroy', $item->id)); ?>" method="POST">
                                                        <?php echo csrf_field(); ?>
                                                        <?php echo method_field('DELETE'); ?>
                                                        <button type="button" onclick="deleteData('<?php echo e($item->id); ?>');"
                                                            class="btn btn-sm btn-danger" title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
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
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                "columnDefs": [{
                        "orderable": false,
                        "targets": [4]
                    },
                    {
                        "searchable": false,
                        "targets": [4]
                    },
                ]
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

<?php echo $__env->make('components.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/user/index.blade.php ENDPATH**/ ?>