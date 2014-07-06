<script type="text/javascript">
    function searchCode() {
        var code = $('#borrow_code').val();
        if (code === "") {
            notyMessageClick('กรุณากรอก รหัสใบยืม', 'center', 'error');
            return false;
        } else {
            $.ajax({
                url: '<?php Yii::app()->createUrl("Borrow/ReturnMain") ?>',
                type: 'POST',
                //dataType: 'html',
                data: {
                    code: code
                },
                success: function(data) {
                    $('#borrow_result').html(data);
                }
            });
        }
        return false;
    }
</script>
<div class="panel panel-primary">
    <div class="panel-heading">
        <span class="alert-success alert">
            <i class="glyphicon glyphicon-shopping-cart"> คืนทรัพย์สิน </i>
        </span>
    </div>
    <div class="panel-body">
        <label class="col-sm-2">รหัส ใบยืม</label>
        <div class="col-sm-4 input-group">
            <input class="form-control" name="borrow_code" id="borrow_code"/>
            <span class="input-group-addon" onclick="searchCode()">
                <i class="glyphicon glyphicon-search"></i>
            </span>                
        </div>
    </div>
    <div class="panel-body">
        <div id="borrow_result">

        </div>
    </div>
    <div class="panel-footer">

    </div>
</div>
