<div class="panel panel-info">
    <div class="panel-heading">
        <span class="alert-success alert">
            <i class="glyphicon glyphicon-registration-mark"> รายละเอียด</i>
        </span>     
    </div>
    <div class="panel-body">
        <div class="col-md-10">
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo Yii::app()->createUrl('Schedule/Index') ?>">
                        <I class="glyphicon glyphicon-calendar"></I> ปฏิทินหลัก
                    </a>
                </li>                
                <li class="active"><i class="glyphicon glyphicon-align-center"> รายละเอียดทรัพย์สิน </i></li>
            </ol>
        </div>
    </div>
    <div class="panel-body">
        <div class="panel-default alert">
            <div class="row">
                <div class="col-sm-3">ชื่อ</div>
                <div class="col-sm-9"><?php echo $calendar->b_code ?></div>
            </div>
            <div class="row">
                <div class="col-sm-3">รายละเอียด</div>
                <div class="col-sm-9"><?php echo $calendar->m_id ?></div>
            </div>
            <div class="row">
                <div class="col-sm-3">วันที่เริ่ม ยืม</div>
                <div class="col-sm-9"><?php echo $calendar->b_startdate ?></div>
            </div>
            <div class="row">
                <div class="col-sm-3">วันที่ สิ้นสุด</div>
                <div class="col-sm-9"><?php echo $calendar->b_stopdate ?></div>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <a class="btn btn-primary" href="<?php echo Yii::app()->createUrl('Schedule/Index') ?>">
            <i class="glyphicon glyphicon-arrow-left"></i>
            <i class="glyphicon glyphicon-calendar"></i> กลับไป หน้า ปฏิทิน
        </a>
    </div>
</div>

<?php
$this->beginWidget('booster.widgets.TbModal', array('id' => 'myModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4 id="myModalHeader">Modal header</h4>
</div>

<div class="modal-body" id="myModalBody">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>ชื่อ</td>
                <td><?php ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal-footer">
    <?php
    $this->widget(
            'booster.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array(
            'data-dismiss' => 'modal',
            'class' => 'btn btn-danger'),
            )
    );
    ?>
</div>

<?php $this->endWidget(); ?>
