<script type="text/javascript">
    $(function() {
        itemSearch();
    });
    function itemSearch() {
        $.ajax({
            url: '<?php echo Yii::app()->createUrl('Item/SearchItem') ?>',
            //dataType: 'json',
            type: 'POST',
            data: $("#searchitem-form").serialize(),
            success: function(data) {
                $('#loadItemSearch').html(data);
            },
        });
    }
</script>
<div class="panel panel-info">
    <div class="panel-heading">
        <span class="alert-success alert">
            <i class="glyphicon glyphicon-search"> ค้นหา ของที่จะยืม</i>    
        </span>
    </div>
    <div class="panel-body">
        <div class="col-md-10">
            <ol class="breadcrumb">
                <li><a href="<?php echo Yii::app()->createUrl('Site/Index') ?>"><I class="glyphicon glyphicon-home"></I>Home</a></li>
                <li><a href="<?php echo Yii::app()->createUrl('Borrow/Step1') ?>"><i class="glyphicon glyphicon-shopping-cart"> </i>ทรัพย์สินที่ยืม</a></li>
                <li class="active"><i class="glyphicon glyphicon-search"> เลือกสิ่งของ </i></li>
            </ol>
        </div>
    </div>
    <div class="panel-body">
        <form class="form-horizontal" name="searchitem-form" id="searchitem-form">
            <div class="form-group">
                <label class="col-sm-2" style="text-align: right;">คำ ค้นหา</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" id="searchval_" name="searchval_"/>
                </div>
                <div class="col-sm-3">
                    <button class="btn btn-primary" type="button" onclick="itemSearch();">ค้นหา</button>
                </div>
            </div>
        </form>
    </div>
    <div class="panel-body">
        <div id="loadItemSearch"></div>
    </div>
</div>
<pre>
    <?php
    var_dump(Yii::app()->session['bor_id']);
    ?>
</pre>