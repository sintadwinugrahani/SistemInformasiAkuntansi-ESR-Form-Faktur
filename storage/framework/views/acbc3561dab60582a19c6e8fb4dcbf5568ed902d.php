<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title><?php echo e($title); ?></title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo e(asset('logo-tab.png')); ?>" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?php echo e(asset('assets/js/plugin/webfont/webfont.min.js')); ?>"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands",
                    "simple-line-icons"
                ],
                urls: ["<?php echo e(asset('assets/css/fonts.min.css')); ?>"]
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/atlantis.min.css')); ?>">
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/demo.css')); ?>">
    <?php echo $__env->yieldPushContent('css'); ?>
</head>

<body>
    <div class="wrapper">
        <div class="main-header">
            <?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Navbar Header -->
            <?php echo $__env->make('layouts.nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <!-- End Navbar -->
        </div>
        <!-- Sidebar -->
        <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-panel">
            <div class="content">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <form action="<?php echo e(route('logout')); ?>" method="POST" id="form_logout" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
    <!--   Core JS Files   -->
    <script src="<?php echo e(asset('assets/js/core/jquery.3.2.1.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/popper.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/core/bootstrap.min.js')); ?>"></script>
    <!-- jQuery UI -->
    <script src="<?php echo e(asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')); ?>"></script>


    <script src="<?php echo e(asset('assets/js/plugin/sweetalert/sweetalert.min.js')); ?>"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo e(asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')); ?>"></script>
    <!-- Datatables -->
    <script src="<?php echo e(asset('assets/js/plugin/datatables/datatables.min.js')); ?>"></script>
    <!-- Atlantis JS -->
    <script src="<?php echo e(asset('assets/js/atlantis.min.js')); ?>"></script>

    <script>
        function logout_() {
            swal({
                title: 'Logout?',
                icon: "warning",
                type: 'warning',
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
                    $('#form_logout').submit();
                } else {
                    swal.close();
                }
            });
        }
    </script>

    <?php if(session()->has('success')): ?>
        <script>
            swal("Success!", "<?php echo e(session('success')); ?>", {
                icon: "success",
                buttons: {
                    confirm: {
                        className: 'btn btn-success'
                    }
                },
            });
        </script>
    <?php elseif(session()->has('error')): ?>
        <script>
            swal("Error!", "<?php echo e(session('error')); ?>", {
                icon: "error",
                buttons: {
                    confirm: {
                        className: 'btn btn-danger'
                    }
                },
            });
        </script>
    <?php endif; ?>

    <?php echo $__env->yieldPushContent('js'); ?>
</body>

</html>
<?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/components/template.blade.php ENDPATH**/ ?>