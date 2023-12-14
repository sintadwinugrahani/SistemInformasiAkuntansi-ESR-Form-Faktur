
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2/css/select2.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Tambah <?php echo e($title); ?></h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo e(route('payment.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_division">Nama Divisi <font style="color: red;">*</font></label>
                                    <select class="form-control <?php $__errorArgs = ['id_division'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="id_division"
                                        name="id_division" required>
                                        <option value="">Pilih Divisi</option>
                                        <?php $__currentLoopData = $division; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('id_division') == $item->id ? 'selected' : ''); ?>

                                                value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['id_division'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="beneficiary_bank">Bank <font style="color: red;">*</font></label>
                                    <select name="beneficiary_bank" id="beneficiary_bank"
                                        class="form-control <?php $__errorArgs = ['beneficiary_bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                                        <option value="">Pilih Bank</option>
                                        <?php $__currentLoopData = $bank; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option <?php echo e(old('beneficiary_bank') == $item->id ? 'selected' : ''); ?>

                                                value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?>

                                                <?php echo e($item->division->name); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['beneficiary_bank'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="invoice_date">Tanggal Faktur <font style="color: red;">*</font></label>
                                    <input type="date" id="invoice_date" name="invoice_date"
                                        class="form-control <?php $__errorArgs = ['invoice_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('invoice_date')); ?>" required>
                                    <?php $__errorArgs = ['invoice_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="due_date">Tenggat Waktu</label>
                                    <input type="number" id="due_date" name="due_date"
                                        class="form-control <?php $__errorArgs = ['due_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('due_date', 0)); ?>" min="0" required>
                                    <?php $__errorArgs = ['due_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="deadline">Batas Waktu</label>
                                    <input type="date" id="deadline" name="deadline"
                                        class="form-control <?php $__errorArgs = ['deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('deadline', date('Y-m-d'))); ?>" required readonly>
                                    <?php $__errorArgs = ['deadline'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="received_date">Tanggal Diterima <font style="color: red;">*</font></label>
                                    <input type="date" id="received_date" name="received_date"
                                        class="form-control <?php $__errorArgs = ['received_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('received_date')); ?>" required>
                                    <?php $__errorArgs = ['received_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="date_pr">Tanggal Voucher Permintaan Pembayaran <font style="color: red;">*</font></label>
                                    <input type="date" id="date_pr" name="date_pr"
                                        class="form-control <?php $__errorArgs = ['date_pr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('date_pr')); ?>" required>
                                    <?php $__errorArgs = ['date_pr'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="contract">Kontrak</label>
                                    <input type="text" id="contract" name="contract"
                                        class="form-control <?php $__errorArgs = ['contract'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('contract')); ?>">
                                    <?php $__errorArgs = ['contract'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                
                                <div class="form-group col-md-6">
                                    <label for="beneficiary">Nama Penerima <font style="color: red;">*</font></label>
                                    <select class="form-control select2 <?php $__errorArgs = ['beneficiary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        id="beneficiary" name="beneficiary" style="width: 100%;" required>
                                        <option value="">Pilih Penerima</option>
                                        <?php $__currentLoopData = $vendor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-bank="<?php echo e($item->bank); ?>" value="<?php echo e($item->id); ?>">
                                                <?php echo e($item->beneficary); ?> (<?php echo e($item->detail); ?>)</option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['beneficiary'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bank_account">Bank A/C <font style="color: red;">*</font></label>
                                    <textarea class="form-control <?php $__errorArgs = ['bank_account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="bank_account" id="bank_account"
                                        disabled readonly required><?php echo e(old('bank_account')); ?></textarea>
                                    <?php $__errorArgs = ['bank_account'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="for">Untuk <font style="color: red;">*</font></label>
                                    <input type="text" id="for" name="for"
                                        class="form-control <?php $__errorArgs = ['for'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('for')); ?>" maxlength="120" required>
                                    <?php $__errorArgs = ['for'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="currency">Type Currency <font style="color: red;">*</font></label>
                                    <select class="form-control <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="currency"
                                        name="currency" required>
                                        <option <?php echo e(old('currency') == 'idrtoidr' ? 'selected' : ''); ?> value="idrtoidr">IDR
                                            to IDR
                                        </option>
                                        <option <?php echo e(old('currency') == 'idrtosgd' ? 'selected' : ''); ?> value="idrtosgd">IDR
                                            to SGD
                                        </option>
                                        <option <?php echo e(old('currency') == 'idrtousd' ? 'selected' : ''); ?> value="idrtousd">IDR
                                            to USD
                                        </option>
                                        <option <?php echo e(old('currency') == 'usdtousd' ? 'selected' : ''); ?> value="usdtousd">USD
                                            to USD
                                        </option>
                                    </select>
                                    <?php $__errorArgs = ['currency'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row" id="add_desc_form">
                                <div class="form-group col-md-6 desc_form">
                                    <label>Deskripsi <font style="color: red;">*</font></label>
                                    <input type="text" name="description[]" class="form-control" maxlength="120"
                                        required>
                                </div>
                                <div class="form-group col-md-6 price_form">
                                    <label>Harga <font style="color: red;">*</font></label>
                                    <input type="text" name="price[]" class="form-control mask-angka" required>
                                </div>
                                <div class="form-group col-md-12" id="before">
                                    <a id="add_form_desc" onclick="addDesc()"
                                        class="btn btn-sm btn-success float-right mt-2" style="color: white;">Tambah
                                        Deskripsi</a>
                                    <a id="remove_form_desc" onclick="removeDesc()"
                                        class="btn btn-sm btn-danger float-right mt-2 mr-1" style="color: white;">Hapus
                                        Deskripsi</a>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>PPN <font style="color: red;">*</font></label><br>
                                    <div class="form-check form-check-inline">
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="vat" value="yes"
                                                checked>
                                            <span class="form-radio-sign">Ya</span>
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <label class="form-radio-label">
                                            <input class="form-radio-input" type="radio" name="vat"
                                                value="no">
                                            <span class="form-radio-sign">Tidak</span>
                                        </label>
                                    </div>
                                    <?php $__errorArgs = ['vat'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="wht">WHT</label>
                                    <select class="custom-select <?php $__errorArgs = ['wht'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="wht"
                                        name="wht">
                                        <option value="">Pilih WHT</option>
                                        <?php $__currentLoopData = $wht; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <?php $__errorArgs = ['wht'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="bank_charge">Biaya Bank <font style="color: red;">*</font></label>
                                    <input type="text" id="bank_charge" name="bank_charge"
                                        class="form-control mask-angka <?php $__errorArgs = ['bank_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                        value="<?php echo e(old('bank_charge', 0)); ?>" min="0" required>
                                    <?php $__errorArgs = ['bank_charge'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <div class="invalid-feedback">
                                            <?php echo e($message); ?>

                                        </div>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            </div>
                            <div class="form-row" id="add_desc_form_add" style="display: none">

                            </div>
                            <div class="text-right mt-2">
                                <button type="button" id="btn_add" class="btn btn-primary">Lihat Penambahan</button>
                                <a href="<?php echo e(route('payment.index')); ?>" class="btn btn-md btn-secondary ml-auto mr-2"><i
                                        class="fas fa-backward mr-1"></i>Kembali</a>
                                <button type="submit" class="btn btn-md btn-primary float-right"><i
                                        class="fab fa-telegram-plane mr-1"></i>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('assets/plugins/select2/js/select2.full.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/inputmask/jquery.inputmask.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/moment/moment.min.js')); ?>"></script>

    <script>
        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            $('input[type=date]').val(today);

            mask_angka();

            $('#beneficiary').change(function() {
                var selectedOption = $(this).find(':selected');
                var bankValue = selectedOption.data('bank');
                $('#bank_account').val(bankValue)
            })

            $('.select2').select2({
                theme: 'bootstrap4'
            })

            $('#received_date').change(function() {
                set_deadline()
            })

            $('#due_date').change(function() {
                set_deadline()
            })

            var show = false

            $('#btn_add').click(function() {
                let html = element_form()
                if (show) {
                    $('#add_desc_form_add').html('')
                    $('#add_desc_form_add').hide()
                    show = false
                    $(this).text('Show Additonal')
                } else {
                    $('#add_desc_form_add').html(html)
                    $('#add_desc_form_add').show()
                    show = true
                    $(this).text('Hide Additonal')
                }
                mask_angka()
                cek_desc()
            })
        });

        function element_form() {
            return `<div class="form-group col-md-6 desc_form_add">
                        <label>Description <font style="color: red;">*</font></label>
                        <input type="text" name="description_add[]" class="form-control" maxlength="120"
                            required>
                    </div>
                    <div class="form-group col-md-6 price_form">
                        <label>Price <font style="color: red;">*</font></label>
                        <input type="text" name="price_add[]" class="form-control mask-angka" required>
                    </div>
                    <div class="form-group col-md-12" id="before_add">
                        <a id="add_form_desc_add" onclick="addDesc_add()"
                            class="btn btn-sm btn-success float-right mt-2" style="color: white;">Add
                            Description</a>
                        <a id="remove_form_desc_add" onclick="removeDesc_add()"
                            class="btn btn-sm btn-danger float-right mt-2 mr-1" style="color: white;">Remove
                            Description</a>
                    </div>`
        }


        function set_deadline() {
            var received_date = moment($('#received_date').val());
            var dueDate = parseInt($('#due_date').val())
            var deadline = received_date.clone().add(dueDate, 'days');
            $('#deadline').val(deadline.format('YYYY-MM-DD'));
        }

        var desc = 0
        var desc_add = 0

        function addDesc(count) {
            let totalDesc = desc + desc_add
            if (totalDesc < 15) {
                var form = $(`
                            <div class="form-group col-md-6 desc_form">
                                <label>Description <font style="color: red;">*</font></label>
                                <input type="text" name="description[]" class="form-control" maxlength="120" required>
                            </div>
                            <div class="form-group col-md-6 price_form">
                                <label>Price <font style="color: red;">*</font></label>
                                <input type="text" name="price[]" class="form-control mask-angka" required>
                            </div>
            `);
                $('#before').before(form);
                mask_angka()
            } else {
                alert('input description can not be more than 15');
            }
            cek_desc()
        }

        function removeDesc() {
            if (desc > 1) {
                $('#add_desc_form').find('.desc_form').last().remove()
                $('#add_desc_form').find('.price_form').last().remove()
            }
            cek_desc()
        }

        function addDesc_add(count) {
            let totalDesc = desc + desc_add
            if (totalDesc < 15) {
                var form = $(`
                            <div class="form-group col-md-6 desc_form_add">
                                <label>Description <font style="color: red;">*</font></label>
                                <input type="text" name="description_add[]" class="form-control" maxlength="120" required>
                            </div>
                            <div class="form-group col-md-6 price_form_add">
                                <label>Price <font style="color: red;">*</font></label>
                                <input type="text" name="price_add[]" class="form-control mask-angka" required>
                            </div>
                        `);
                $('#before_add').before(form);
                mask_angka()
            } else {
                alert('input description can not be more than 15');
            }
            cek_desc()
        }

        function removeDesc_add() {
            if (desc_add > 1) {
                $('#add_desc_form_add').find('.desc_form_add').last().remove()
                $('#add_desc_form_add').find('.price_form_add').last().remove()
            }
            cek_desc()
        }

        function cek_desc() {
            desc = $('.desc_form').length ?? 0
            desc_add = $('.desc_form_add').length ?? 0
            // console.log(desc, desc_add);
        }

        function mask_angka() {
            $('.mask-angka').inputmask({
                alias: 'numeric',
                groupSeparator: '.',
                autoGroup: true,
                digits: 0,
                rightAlign: false,
                removeMaskOnSubmit: true,
            });
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('components.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/payment_request/add.blade.php ENDPATH**/ ?>