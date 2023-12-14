<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo e(asset('logo-tab.png')); ?>" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template-login')); ?>/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('template-login')); ?>/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template-login')); ?>/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="<?php echo e(asset('template-login')); ?>/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template-login')); ?>/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template-login')); ?>/css/util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('template-login')); ?>/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    
                    <img class="mt-5"
                        src="https://esrassets.s3.ap-southeast-1.amazonaws.com/esr_dev/uploads/2022/10/30033145/esr-logo.png"
                        alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="<?php echo e(route('password.email')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php if(session('status')): ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <span class="login100-form-title">
                        Password Reset
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" id="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>

                    </div>

                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p style="color: red"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Send Password Reset Link
                        </button>
                        <a class="mt-5" href="<?php echo e(route('login')); ?>">Back Login</a>
                    </div>

                    <div class="text-center p-t-136">
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="<?php echo e(asset('template-login')); ?>/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('template-login')); ?>/vendor/bootstrap/js/popper.js"></script>
    <script src="<?php echo e(asset('template-login')); ?>/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('template-login')); ?>/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('template-login')); ?>/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
    <!--===============================================================================================-->
    <script src="<?php echo e(asset('template-login')); ?>/js/main.js"></script>

</body>

</html>
<?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/auth/passwords/email.blade.php ENDPATH**/ ?>