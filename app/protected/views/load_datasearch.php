<script type="text/javascript">
    function checkNumber(limit, value) {
        if (Number(value)) {
            if (limit < value) {
                notyMessageClick('ท่านใส่ จำนวน เกิน ที่มีอยู่', 'center', 'error');
                $('#amount').val("");
            }
        } else {
            notyMessageClick('กรุณากรอกตัวเลขเท่านั้น', 'center', 'error');
            $('#amount').val("");
        }
    }
    function addItemToCart(id) {
        var item = id;
        var amount = $('input[name=amount' + id + ']').val();
        if (amount == "") {
            notyMessageClick('กรุณากรอก จำนวนก่อน', 'center', 'warning');
        } else {
            $.ajax({
                url: '<?php echo Yii::app()->createUrl('BorrowDetail/AddItemToCart') ?>',
                type: 'POST',
                data: {
                    amount: amount,
                    item_id: item,
                },
                success: function(data) {
                    //alert(data);
                    if (data == 'success') {
                        window.location = '<?php echo Yii::app()->createUrl('Borrow/Step1') ?>';
                    } else {
                        notyMessageClick('เพิ่มสินค้าไม่ได้', 'center', 'error');
                    }

                },
            });
        }
    }
</script>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>รหัส ของ</th>
            <th>ชื่อ</th>
            <th>จำนวนที่มี</th>
            <th>เลือก</th>
        </tr>
    </thead>
    <tbody>
        <?php if (is_array($item)): ?>
            <?php foreach ($item as $i): ?>
                <tr>
                    <td><?= $i['i_code'] ?></td>
                    <td><?= $i['i_nameth'] ?></td>
                    <td><?= $i['i_num'] ?></td>
                    <td>
                        <form class="form-horizontal"  name="select-form<?= $i['i_id'] ?>">
                            <div class="col-sm-6">                                
                                <input type="tel" class="form-control" name="amount<?= $i['i_id'] ?>" id="amount" onchange="checkNumber(<?= $i['i_num'] ?>, this.value)"/>
                            </div>
                            <div class="col-sm-6">
                                <button type="button" class="btn btn-success" onclick="addItemToCart(<?= $i['i_id'] ?>);">
                                    <i class="glyphicon glyphicon-shopping-cart"></i> ใส่ตะกร้า</button>
                            </div>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="3"></th>
            <th>ค้นเจอ <?= $count ?> รายการ</th>
        </tr>
    </tfoot>
</table>

