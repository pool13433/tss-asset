<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการ Size</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('Size/Create') ?>">เพิ่ม ขนาด</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'responsiveTable' => true,
            'columns' => array(
                's_id',
                array(
                    'name' => 'size_type.st_name',
                    'header' => 'ชื่อ รูปแบบ'
                ),
                's_name',
                's_createdate',
                array(
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{update}{delete}',
//                    'viewButtonUrl' => null,
//                    'updateButtonUrl' => null,
//                    'deleteButtonUrl' => null,
                )
            )
                )
        );
        ?>
    </div>
</div>
