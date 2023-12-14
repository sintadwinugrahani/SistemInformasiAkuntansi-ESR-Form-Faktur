<div class="sidebar sidebar-style-2">

    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="<?php echo e(asset('assets/img/profile.jpg')); ?>" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a href="<?php echo e(route('user.profile')); ?>">
                        <span>
                            <?php echo e(auth()->user()->name); ?>

                            <span class="user-level"><?php echo e(auth()->user()->email); ?></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-item <?php echo e($title == 'Dashboard' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('home')); ?>">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Transaksi</h4>
                </li>
                <li class="nav-item <?php echo e($title == 'Payment Request' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('payment.index')); ?>">
                        <i class="fas fa-money-bill"></i>
                        <p>Permintaan Pembayaran</p>
                    </a>
                </li>
                <li class="nav-item <?php echo e($title == 'Debit Note' ? 'active' : ''); ?>">
                    <a href="<?php echo e(route('debit.index')); ?>">
                        <i class="far fa-credit-card"></i>
                        <p>Nota Debit</p>
                    </a>
                </li>
                <?php if(auth()->user()->role == 'admin'): ?>
                    <li class="nav-section">
                        <span class="sidebar-mini-icon">
                            <i class="fa fa-ellipsis-h"></i>
                        </span>
                        <h4 class="text-section">Komponen</h4>
                    </li>
                    <li class="nav-item <?php echo e($title == 'Division' || $title == 'Bank' ? 'active submenu' : ''); ?>">
                        <a data-toggle="collapse" href="#division_menu" class="collapsed" aria-expanded="false">
                            <i class="far fa-building"></i>
                            <p>Divisi</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php echo e($title == 'Division' || $title == 'Bank' ? 'show' : ''); ?>"
                            id="division_menu">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e($title == 'Division' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('division.index')); ?>">
                                        <span class="sub-item">Nama Divisi</span>
                                    </a>
                                </li>
                                <li class="<?php echo e($title == 'Bank' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('bank.index')); ?>">
                                        <span class="sub-item">Bank Divisi</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?php echo e($title == 'WHT' || $title == 'VAT' ? 'active submenu' : ''); ?>">
                        <a data-toggle="collapse" href="#tax_menu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-percent"></i>
                            <p>PAJAK</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php echo e($title == 'WHT' || $title == 'VAT' ? 'show' : ''); ?>" id="tax_menu">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e($title == 'WHT' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('wht.index')); ?>">
                                        <span class="sub-item">WHT</span>
                                    </a>
                                </li>
                                <li class="<?php echo e($title == 'VAT' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('vat.index')); ?>">
                                        <span class="sub-item">PPN</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item <?php echo e($title == 'Beneficiary' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('vendor.index')); ?>">
                            <i class="fas fa-store"></i>
                            <p>Penjual</p>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e($title == 'Role Management' ? 'active' : ''); ?>">
                        <a href="<?php echo e(route('user.index')); ?>">
                            <i class="fas fa-user-alt"></i>
                            <p>Akun Pengguna</p>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if(auth()->user()->role != 'supervisor'): ?>
                    <li
                        class="nav-item <?php echo e($title == 'Report Payment Request' || $title == 'Report Debit Note' ? 'active submenu' : ''); ?>">
                        <a data-toggle="collapse" href="#report_menu" class="collapsed" aria-expanded="false">
                            <i class="fas fa-book"></i>
                            <p>Laporan</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse <?php echo e($title == 'Report Payment Request' || $title == 'Report Debit Note' ? 'show' : ''); ?>"
                            id="report_menu">
                            <ul class="nav nav-collapse">
                                <li class="<?php echo e($title == 'Report Payment Request' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('report.payment.index')); ?>">
                                        <span class="sub-item">Permintaan Pembayaran</span>
                                    </a>
                                </li>
                                <li class="<?php echo e($title == 'Report Debit Note' ? 'active' : ''); ?>">
                                    <a href="<?php echo e(route('report.debit.index')); ?>">
                                        <span class="sub-item">Nota Debit</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>