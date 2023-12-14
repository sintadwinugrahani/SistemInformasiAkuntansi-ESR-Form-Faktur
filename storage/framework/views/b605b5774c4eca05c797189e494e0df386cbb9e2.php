<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">

    <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
            <li class="nav-item dropdown hidden-caret">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                    <div class="avatar-sm">
                        <img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" alt="..."
                            class="avatar-img rounded-circle">
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-user animated fadeIn">
                    <div class="dropdown-user-scroll scrollbar-outer">
                        <li>
                            <div class="user-box">
                                <div class="avatar-lg"><img src="<?php echo e(asset('assets/img/profile.jpg')); ?>"
                                        alt="image profile" class="avatar-img rounded"></div>
                                <div class="u-text">
                                    <h4><?php echo e(auth()->user()->name); ?></h4>
                                    <p class="text-muted"><?php echo e(auth()->user()->email); ?></p><a
                                        href="<?php echo e(route('user.profile')); ?>" class="btn btn-xs btn-secondary btn-sm">Edit
                                        Profil</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="javascript:void(0);" onclick="logout_()">Keluar</a>
                        </li>
                    </div>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/layouts/nav.blade.php ENDPATH**/ ?>