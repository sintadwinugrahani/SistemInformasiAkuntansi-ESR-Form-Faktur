<?php
    $vat_value = 0;
    $wht_value = 0;
    $total = 0;
    $grand_total = 0;
    if ($data->vat > 0) {
        $vat_value = ($data->totalreg * $data->vat) / 100;
    }
    if ($data->wht) {
        $wht_value = ($data->totalreg * $data->wht->value) / 100;
    }
    $total = $data->total + $vat_value - $wht_value;
    $grand_total = $data->total + $data->bank_charge + $vat_value - $wht_value;
    
    function breakTextIntoLines($text, $maxCharactersPerLine = 50)
    {
        $words = explode(' ', $text);
        $lines = [];
        $currentLine = '';
    
        foreach ($words as $word) {
            $newLine = $currentLine . ' ' . $word;
            $newLineLength = strlen($newLine);
    
            if ($newLineLength <= $maxCharactersPerLine) {
                $currentLine = $newLine;
            } else {
                $lines[] = trim($currentLine);
                $currentLine = $word;
            }
        }
    
        $lines[] = trim($currentLine);
    
        return $lines;
    }
    
    $text = $data->vendor->bank;
    
    $lines = breakTextIntoLines($text, 50);
    
?>

<tbody>
    <tr>
        <td colspan="9"
            style="border-top: 1pt solid black;border-right: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-bottom: none;padding: 0mm;height: 70pt;vertical-align: middle;">
            <div style="margin: 0px;padding: 0px;width: 100%;"><img src="<?php echo e($path_logo); ?>" width="114" height="45"
                    style="margin-left: 8pt;margin-top: 0;">
                <?php if($data->status_id == 4): ?>
                    
                    <span class="pd-header" style="font-family:'Calibri', sans-serif;float: right;"> Tanggal Dibayar :
                        <?php echo e(date('d-M-y', strtotime($data->paid_date))); ?></span>
                <?php endif; ?>
            </div>
            <div class="pd-header">
                <span style="font-family:'Calibri', sans-serif;float: left;">
                    <?php echo e($data->division->name); ?>

                </span>
                <span style="font-family:'Times New Roman', serif;float: right;margin-right: 5pt;">Permintaan
                    Pembayaran</span>
            </div>
        </td>
    </tr>
    <tr>
        <td colspan="7"
            style="border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
            <strong><span class="pd-small">Dibayar Kepada :</span></strong>
        </td>
        <td
            style="border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
            <span class="pd-small">NO</span>
        </td>
        <td
            style="text-align: right;border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0mm;height: 13pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e($data->no_pr); ?></span>
        </td>
    </tr>
    <tr>
        <td colspan="7"
            style="border-top: none;border-right: none;border-bottom: none;border-image: initial;border-left: 1pt solid black;padding: 0mm;height: 3pt;vertical-align: middle;">
            <strong><span class="pd-small"><?php echo e($data->vendor->beneficary); ?></span></strong>
        </td>

        <td
            style="border-top: none;border-left: 1pt solid black;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 3pt;vertical-align: middle;">
            <span class="pd-small">Tanggal</span>
        </td>
        <td
            style="text-align: right;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 3pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e(date('d-M-y', strtotime($data->date_pr))); ?></span>
        </td>
    </tr>
    <tr>
        <td colspan="9"
            style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
            <strong><span class="pd-small">Untuk : <?php echo e($data->for); ?></span></strong>
        </td>
    </tr>
    <tr>
        <td colspan="8"
            style="text-align: center;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
            <strong><span class="pd-small">Deskripsi</span></strong>
        </td>
        <td
            style="text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
            <strong><span class="pd-small">Jumlah</span></strong>
        </td>
    </tr>
    <tr>
        <td colspan="9"
            style="border-top: none;border-left: 1pt solid black;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 1pt;vertical-align: middle;">
        </td>
    </tr>
    <?php
        $sisa = 21 - count($data->desc ?? []);
    ?>
    <?php $__currentLoopData = $data->desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->type == 'reg'): ?>
            <tr>
                <td colspan="8"
                    style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
                    <span class="pd-small"><?php echo e($item->value); ?></span>
                </td>
                <td
                    style="text-align: right;width: 82pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
                    <span
                        class="pd-small"><?php echo e($item->price < 0 ? '(' . number_format(abs($item->price), $data->currency != 'idrtoidr' ? 2 : 0, ',', ',') . ')' : number_format($item->price, $data->currency != 'idrtoidr' ? 2 : 0, ',', ',')); ?>

                    </span>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if($vat_value > 0): ?>
        <?php
            $sisa = $sisa - 1;
        ?>
        <tr>
            <td colspan="8"
                style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
                <span class="pd-small">PPN <?php echo e($data->vat); ?>%</span>
            </td>
            <td
                style="text-align: right;width: 82pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
                <span
                    class="pd-small"><?php echo e(number_format($vat_value, $data->currency != 'idrtoidr' ? 2 : 0, ',', ',')); ?></span>

            </td>
        </tr>
    <?php endif; ?>
    <?php if($wht_value > 0): ?>
        <?php
            $sisa = $sisa - 1;
        ?>
        <tr>
            <td colspan="8"
                style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
                <span class="pd-small"><?php echo e($data->wht->name); ?></span>
            </td>
            <td
                style="text-align: right;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
                <span class="pd-small">(
                    <?php echo e(number_format($wht_value, $data->currency != 'idrtoidr' ? 2 : 0, ',', ',')); ?>

                    )</span>

            </td>
        </tr>
    <?php endif; ?>
    <?php
        $sisa = $sisa - 1;
    ?>
    <tr>
        <td colspan="8"
            style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
            <span class="pd-small"></span>
        </td>
        <td
            style="border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
            <span class="pd-small"></span>
        </td>
    </tr>

    <?php $__currentLoopData = $data->desc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($item->type == 'add'): ?>
            <tr>
                <td colspan="8"
                    style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
                    <span class="pd-small"><?php echo e($item->value); ?></span>
                </td>
                <td
                    style="text-align: right;width: 82pt;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
                    <span
                        class="pd-small"><?php echo e($item->price < 0 ? '(' . number_format(abs($item->price), $data->currency != 'idrtoidr' ? 2 : 0, ',', ',') . ')' : number_format($item->price, $data->currency != 'idrtoidr' ? 2 : 0, ',', ',')); ?>

                    </span>
                </td>
            </tr>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php for($i = 0; $i < $sisa; $i++): ?>
        <tr>
            <td colspan="8"
                style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13pt;vertical-align: middle;">
                <span class="pd-small"></span>
            </td>
            <td
                style="border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13pt;vertical-align: middle;">
                <span class="pd-small"></span>
            </td>
        </tr>
    <?php endfor; ?>
    <tr>
        <td colspan="8"
            style="border-top: none;border-left: 1pt solid black;border-bottom: 1.5pt solid black;border-right: 1pt solid black;padding: 0mm;height: 12.85pt;vertical-align: middle;">
            <span class="pd-small"></span>
        </td>
        <td
            style="border-top: none;border-left: none;border-bottom: 1.5pt solid black;border-right: 1pt solid black;padding: 0mm;height: 12.85pt;vertical-align: middle;">
            <span class="pd-small"></span>
        </td>
    </tr>
    <tr>
        <td colspan="8" class="bold-no-border">
            <strong><span class="pd-small">Untuk Dibayar
                    <?php if($data->currency == 'idrtoidr'): ?>
                        Rp
                    <?php elseif($data->currency == 'idrtosgd'): ?>
                        SGD
                    <?php else: ?>
                        USD
                    <?php endif; ?>
                </span></strong>
        </td>
        <td class="bold-border">
            <strong><span
                    class="pd-small"><?php echo e(number_format($total, $data->currency != 'idrtoidr' ? 2 : 0, ',', ',')); ?></span></strong>
        </td>
    </tr>
    <tr>
        <td colspan="8" class="bold-no-border">
            <strong><span class="pd-small">Valuta Asing di</span></strong>
        </td>
        <td class="bold-border">
            <strong><span class="pd-small"></span></strong>
        </td>
    </tr>

    <tr>
        <td colspan="8" class="bold-no-border">
            <strong><span class="pd-small">Konversi ke Rp
                    
                </span></strong>
        </td>
        <td class="bold-border">
            <strong><span class="pd-small"></span></strong>
        </td>
    </tr>
    <tr>
        <td colspan="8" class="bold-no-border">
            <strong><span class="pd-small">Biaya Bank
                    <?php if($data->currency != 'usdtousd'): ?>
                        Rp
                    <?php else: ?>
                        USD
                    <?php endif; ?>
                </span></strong>
        </td>
        <td class="bold-border">
            <strong><span
                    class="pd-small"><?php echo e($data->bank_charge > 0 ? number_format($data->bank_charge, $data->currency != 'idrtoidr' ? 2 : 0, ',', ',') : ''); ?></span></strong>
        </td>
    </tr>
    <tr>
        <td colspan="8" class="bold-no-border" style="border-bottom: 3pt solid black;border-top: 1pt solid black">
            <strong><span class="pd-small">Jumlah
                    <?php if($data->currency == 'idrtoidr'): ?>
                        Diterima Rp
                    <?php elseif($data->currency == 'idrtosgd'): ?>
                        Rp
                    <?php elseif($data->currency == 'idrtousd'): ?>
                        Rp
                    <?php else: ?>
                        USD
                    <?php endif; ?>
                </span></strong>
        </td>
        <td class="bold-border" style="border-bottom: 3pt solid black">
            <strong><span class="pd-small">
                    <?php if($data->currency == 'idrtoidr'): ?>
                        <?php echo e(number_format($grand_total, $data->currency != 'idrtoidr' ? 2 : 0, ',', ',')); ?>

                    <?php endif; ?>
                </span></strong>
        </td>
    </tr>

    <tr>
        <td colspan="9"
            style="border-top: none;border-left: 1pt solid black;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.6pt;vertical-align: middle;">
            <span class="pd-xs"></span>
        </td>
    </tr>
    <tr>
        <td colspan="9"
            style="border-top: none;border-left: 1pt solid black;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 1pt;vertical-align: middle;">
        </td>
    </tr>
    <tr>
        <td colspan="3"
            style="border-top: none;border-left: 1pt solid black;border-bottom: none;border-right: 1pt solid black;padding: 0mm;height: 11.6pt;vertical-align: middle;">
            <strong><u><span class="pd-small">Akun Bank dari :</span></u></strong>

        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 11.6pt;vertical-align: middle;">
            <strong><u><span class="pd-small">Transfer ke Akun Bank
                        :</span></u></strong>
        </td>
        <td colspan="3"
            style="border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 11.6pt;vertical-align: middle;">
            <strong><span class="pd-small">Cek Dokumen Pendukung</span></strong>
        </td>
    </tr>
    <tr>
        <td colspan="3"
            style="border-top: none;border-left: 1pt solid black;border-bottom: none;border-right: 1pt solid black;padding: 0mm;height: 9.55pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e($data->bank->name); ?></span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 9.55pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e($data->vendor->beneficary); ?></span>
        </td>
        <td colspan="2"
            style="border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 8.6pt;vertical-align: middle;">
            
            <p
                style='margin:0mm;margin-top:1.9pt;margin-right:0mm;margin-bottom:.0001pt;margin-left:1.55pt;line-height:8.7pt;'>
                <strong><span class="pd-small">Kontrak / PO No</span></strong>
            </p>
        </td>
        <td
            style="border-top: 1pt solid black;border-right: 1pt solid black;border-bottom: 1pt solid black;border-image: initial;border-left: none;padding: 0mm;height: 8.6pt;vertical-align: middle;">
            <span class="pd-small">&nbsp;<?php echo e($data->contract); ?></span>
        </td>
    </tr>
    <tr>
        <td colspan="3"
            style="white-space: nowrap;border-top: none;border-left: 1pt solid black;border-bottom: none;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e($data->division->name); ?></span>
        </td>
        <td colspan="3" style="white-space: nowrap;border: none;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-small">
                <?php if(count($lines) < 2): ?>
                    <?php echo e($data->vendor->bank); ?>

                <?php elseif(count($lines) > 1): ?>
                    <?php echo e($lines[0]); ?>

                <?php endif; ?>
            </span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: 1pt solid black;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] FAKTUR ASLI + MATERAI</span>
        </td>
    </tr>
    <tr>
        <td colspan="3"
            style="border-top: none;border-left: 1pt solid black;border-bottom: none;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <p style='margin:0mm;text-indent:8.0pt;line-height:8.6pt;'>
                <span class="pd-small"></span>
            </p>
        </td>
        <td colspan="3" style="white-space: nowrap;border: none;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-small">
                <?php if(count($lines) >= 2): ?>
                    <?php echo e($lines[1]); ?>

                <?php endif; ?>
            </span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: 1pt solid black;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] FAKTUR PAJAK ASLI</span>
        </td>
    </tr>
    <tr>
        <td colspan="3"
            style="border-top: none;border-left: 1pt solid black;border-bottom: none;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <p style='margin:0mm;text-indent:8.0pt;line-height:8.6pt;'>
                <span class="pd-small"></span>
            </p>
        </td>
        <td colspan="3" style="white-space: nowrap;border: none;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-small">
                <?php if(count($lines) >= 3): ?>
                    <?php echo e($lines[2]); ?>

                <?php endif; ?>
            </span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: 1pt solid black;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] FORM DGT-1 WP LN ( Konsultan
                Luar Negeri
                )</span>
        </td>
    </tr>
    <tr>
        <td colspan="3"
            style="border-top: none;border-left: 1pt solid black;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <p style='margin:0mm;text-indent:8.0pt;line-height:8.6pt;'>
                <span class="pd-small"></span>
            </p>
        </td>
        <td colspan="3"
            style="border: none;border-bottom: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-small">
                <?php if(count($lines) >= 4): ?>
                    <?php echo e($lines[3]); ?>

                <?php endif; ?>
            </span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: 1pt solid black;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 11pt;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] SALINAN NPWP</span>
        </td>
    </tr>
    <tr>
        <td
            style="border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 9.55pt;vertical-align: middle;">
            <span class="pd-small">Dibayar Oleh</span>
        </td>
        <td colspan="2"
            style="white-space: nowrap;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.55pt;vertical-align: middle;">
            <span class="pd-small">Internet Banking</span>
        </td>
        <td colspan="2"
            style="border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.55pt;vertical-align: middle;">
            <span class="pd-small">Tanggal Faktur</span>
        </td>
        <td
            style="text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.55pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e(date('d-M-y', strtotime($data->invoice_date))); ?></span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 9.55pt;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] SALINAN PENAWARAN PENJUAL</span>
        </td>
    </tr>
    <tr>
        <td
            style="white-space: nowrap;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 9.6pt;vertical-align: middle;">
            <span class="pd-small">Tenggat Waktu (days)</span>
        </td>
        <td
            style="width: 30px;text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.6pt;vertical-align: middle;">
            <span class="pd-small" style="color: red"><?php echo e($data->due_date); ?>

            </span>
        </td>
        <td
            style="text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.6pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e($data->deadline); ?></span>
        </td>
        <td colspan="2"
            style="border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.6pt;vertical-align: middle;">
            <span class="pd-small">PENERIMAAN FAKTUR</span>
        </td>
        <td
            style="text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 9.6pt;vertical-align: middle;">
            <span class="pd-small"><?php echo e(date('d-M-y', strtotime($data->received_date))); ?></span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 9.6pt;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] SALINAN PESANAN PEMBELIAN</span>
        </td>
    </tr>
    
    <tr>
        <td colspan="2"
            style="text-align: center;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;padding: 0mm;height: 13.4pt;vertical-align: middle;">
            <span class="pd-small">DISIAPKAN OLEH</span>
        </td>
        <td
            style="text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13.4pt;vertical-align: middle;">
            <span class="pd-small">DICEK OLEH</span>
        </td>
        <td colspan="2"
            style="border-top: none;border-left: none;border-bottom: none;border-right: 1pt solid black;padding: 0mm;height: 13.4pt;vertical-align: middle;">
            <span class="pd-small"></span>
        </td>
        <td
            style="text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;padding: 0mm;height: 13.4pt;vertical-align: middle;">
            <span class="pd-small">DISETUJUI OLEH</span>

        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: none;border-left: none;border-image: initial;border-right: 1pt solid black;padding: 0mm;height: 13.4pt;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] SALINAN DOKUMEN KONTRAK</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="2"></td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="3" style="border-left: 1pt solid black;border-right: 1pt solid black;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] SALINAN SURAT PENUNJUKKAN
                REKANAN</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="2"></td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="3" style="border-left: 1pt solid black;border-right: 1pt solid black;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] GARANSI BANK ASLI (Uang
                Muka)</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="2"></td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="3" style="border-left: 1pt solid black;border-right: 1pt solid black;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] PENYERAHAN DOKUMEN ASLI /
                BAST</span>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="2"></td>
        <td colspan="1" style="border-left: 1pt solid black;border-right: 1pt solid black;">
        </td>
        <td colspan="3" style="border-left: 1pt solid black;border-right: 1pt solid black;vertical-align: middle;">
            <span class="pd-xs">[ &nbsp; &nbsp; &nbsp;] GARANSI BANK ASLI (Uang
                Muka)</span>
        </td>
    </tr>
    <tr>
        <td colspan="2"
            style="text-align: center;border-right: 1pt solid black;border-bottom: 1pt solid black;border-left: 1pt solid black;border-image: initial;border-top: none;vertical-align: middle;">
            <span class="pd-small">Vivi Lie</span>
        </td>
        <td
            style="text-align: center;border-top: none;border-left: none;border-bottom: 1pt solid black;border-right: 1pt solid black;vertical-align: middle;">
            <span class="pd-small">Djajadi</span>
        </td>
        <td colspan="2" style="border-bottom:  1pt solid black;"></td>
        <td
            style="text-align: center;width: 76.05pt;border-top: none;border-left: 1pt solid black;;border-bottom: 1pt solid black;border-right: 1pt solid black;vertical-align: middle;">
            <span class="pd-small">Darren Chan</span>
        </td>
        <td colspan="3"
            style="border-top: none;border-bottom: 1pt solid black;;border-left: none;border-image: initial;border-right: 1pt solid black;vertical-align: middle;">
            
        </td>
    </tr>

</tbody>
<?php /**PATH C:\Users\ASUS\Documents\SIA\laravel-finance-form\resources\views/payment_request/content.blade.php ENDPATH**/ ?>