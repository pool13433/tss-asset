<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการ ItemType</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('ItemType/Create') ?>">เพิ่ม ItemType</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'columns' => array(
                'it_id',
                'it_name',
                'item_department.id_name',
                'it_createdate',
                array(
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{update}{delete}',
//                    'viewButtonUrl' => null,
//                    'updateButtonUrl' => null,
//                    'deleteButtonUrl' => null,
                )
            ),
                )
        );
        ?>
    </div>
</div>