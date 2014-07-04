<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการ สถานะ</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('Member/Create') ?>">เพิ่ม สถานะ</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'columns' => array(
                's_id',
                's_name',
                's_date',
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