<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการผู้ใช้งาน</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('Member/Create') ?>">เพิ่มผู้ใช้งาน</a>
    </div>
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $members,
            //'filter'=>$members,
            'type' => 'striped bordered',
            'template'=>'{summary}{items}{pager}',
            'columns' => array(
                'm_id',
                'm_fname',
                'm_lname',
                'm_birthday',
                'm_pid' ,
                'm_tel' ,
                'm_email',
                'm_career',
                'm_address',
                'm_img',
                //'m_status.s_name',
                 array(
                    'name' => 's_id',
                    'header' => 'สถานะ',
                    'class' => 'booster.widgets.TbEditableColumn',
                    'headerHtmlOptions' => array('style' => 'width:200px'),
                    'editable' => array(
                        //'type' => 'text',
                        'type'     => 'select2',
                        'source'  => CHtml::listData(MemberStatus::model()->findAll(), 's_id', 's_name'),
                        'url' =>  Yii::app()->createUrl('Member/UpdateStatus'),
                    )
                ),
                array(
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{view}{update}{delete}',
//                    'viewButtonUrl' => null,
//                    'updateButtonUrl' => null,
//                    'deleteButtonUrl' => null,
                )
            ),
        ));
        ?>
    </div>
</div>
