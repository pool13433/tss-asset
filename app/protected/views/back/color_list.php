<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการ Color</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('Color/Create') ?>">เพิ่ม สี</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'responsiveTable' => true,
            'columns' => array(
                'c_id',
                'c_nameth',
                'c_nameen',
                'c_createdate',
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
