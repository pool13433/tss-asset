<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการ SizeType</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('SizeType/Create') ?>">เพิ่ม รูปแบบขนาด</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'responsiveTable' => true,
            'columns' => array(
                'st_id',
                'st_name',
                'st_createdate',
                array(
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{update}{delete}',
//                    'viewButtonUrl' => null,
//                    'updateButtonUrl' => null,
//                    'deleteButtonUrl' => null,
                ),
            )
                )
        );
        ?>
    </div>
</div>
