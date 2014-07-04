<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการกลุ่ม Item</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('Group/Create') ?>">เพิ่มกลุ่ม</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'responsiveTable' => true,
            'columns' => array(
                'g_id',
                'g_name',
                'g_createdate',
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
<pre class="panel-default"> 
    <?php
    //echo var_dump($gridColumns)       
    ?>

</pre>
