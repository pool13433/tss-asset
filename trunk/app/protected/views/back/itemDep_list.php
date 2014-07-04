<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการ ItemDepartment</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('ItemDepartment/Create') ?>">เพิ่ม Department</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'columns' => array(
                'id_id',
                'id_name',
                'id_createdate',
                array(
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{update}{delete}',
//                    'viewButtonUrl' => null,
//                    'updateButtonUrl' => null,
//                    'deleteButtonUrl' => null,
                ),
            ),
                )
        );
        ?>
    </div>
</div>