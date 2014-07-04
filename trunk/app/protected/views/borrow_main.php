<script type="text/javascript">
    function delItem(id) {
        if (confirm('ยืนยันการลบ ชิ้น นี้')) {
            $.ajax({
                url: '<?php echo Yii::app()->createUrl('BorrowDetail/DelItemFromCart') ?>',
                data: {
                    id: id,
                },
                success: function(data) {
                    if (data == 'success') {
                        window.location = '<?php echo Yii::app()->createUrl('Borrow/Step1') ?>';
                    } else {
                        notyMessageClick('Delete Faile', 'center', 'error');
                    }
                },
            });
        }
        return false;
    }
    function nextStep(itemsize) {
        if (itemsize > 0) {
            window.location = '<?php echo Yii::app()->createUrl('Borrow/NextStep2') ?>';
        } else {
            notyMessageClick('ท่านยังไม่ได้เลือกของที่จะยืมเลย กรุณาเลือกของ', 'center', 'warning');
        }
    }
</script>
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="alert-success alert">
            <i class="glyphicon glyphicon-shopping-cart"> ทรัพย์สิน ที่เลือกยืม</i>
        </span>
    </div>
    <div class="panel-body">
        <div class="col-md-10">
            <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->createUrl('Site/Index') ?>"><I class="glyphicon glyphicon-home"></I>Home</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('Item/ItemSearchForm') ?>"><i class="glyphicon glyphicon-search"></i> เลือกสิ่งของ</a></li>
                <li class="active"><i class="glyphicon glyphicon-shopping-cart"> ทรัพย์สินที่ยืม </i></li>
            </ol>
        </div>
        <div class="col-md-2" style="text-align: right;">
            <button class="btn btn-primary" onclick="nextStep(<?php echo$count; ?>)">
                <i class="glyphicon glyphicon-arrow-right"></i> เลือกของเสร็จสิ้น
            </button>
        </div>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label class="col-sm-2" style="text-align: right;">รหัสใบยืม</label>
            <div class="col-sm-3">

            </div>            
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>จำนวน</th>
                    <th>ลบ</th>
                </tr>
            </thead>
            <tbody>
                <?php if (is_array($item)): ?>
                    <?php foreach ($item as $it): ?>
                        <tr>
                            <td><?= $it['bd_id'] ?></td>
                            <td><?= $it['item']['i_nameen'] ?></td>
                            <td><?= $it['i_amount'] ?></td>
                            <td>
                                <button class="btn btn-danger" onclick="delItem(<?= $it['bd_id'] ?>)">
                                    <i class="glyphicon glyphicon-trash"></i> ลบ
                                </button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3"></th>
                    <th>รวม <?= $count ?> รายการ</th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
<pre>
    <?php
    var_dump(Yii::app()->session['bor_id']);
    ?>
</pre>