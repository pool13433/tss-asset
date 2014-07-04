<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>จัดการ Item</h3>
        <a class="btn btn-default" href="<?= Yii::app()->createUrl('Item/Create') ?>">เพิ่ม Item</a>
        <?php
        $this->widget(
                'booster.widgets.TbButton', array(
            'label' => 'Click me',
            'context' => 'primary',
            'htmlOptions' => array(
                'onclick' => 'js:bootbox.alert("Hello, World!")'
            ),
                )
        );
        ?>
    </div>    
    <div class="panel-body">
        <?php
        $this->widget('booster.widgets.TbGridView', array(
            'dataProvider' => $model,
            'type' => 'striped bordered',
            'summaryText' => 'Displaying {start}-{end} of {count} results.',
            //'pagerCssClass' => 'pagination',
            //'rowCssClass' => 'pagination',
            'responsiveTable' => true,
            'enablePagination' => true,
            'template' => '{pager}{summary}{items}{pager}',
            'columns' => array(
                'i_id',
                'i_nameth',
                'i_nameen',
                array(
                    'name' => 'group.g_name',
                    'header' => 'ชื่อ กลุ่ม'
                ),
                array(
                    'name' => 'item_type.it_name',
                    'header' => 'ชื่อ ชนิด'
                ),
                array(
                    'name' => 'i_detail',
                    'header' => 'รายละเอียด'
                ),
                'color.c_nameth',
                'i_createdate',
                array(
                    'name' => 'i_status',
                    'header' => 'สถานะ',
                    'class' => 'booster.widgets.TbEditableColumn',
                    'headerHtmlOptions' => array('style' => 'width:200px'),
                    'editable' => array(
                        //'type' => 'text',
                        'type' => 'select2',
                        'source' => array(0 => 'ปกติ', 1 => 'ชำรุด', 2 => 'หาย'),
                        'url' => Yii::app()->createUrl('Item/UpdateStatus'),
                    )
                ),
                array(
                    'header' => 'action',
                    'htmlOptions' => array('nowrap' => 'nowrap'),
                    'class' => 'booster.widgets.TbButtonColumn',
                    'template' => '{update}{delete}', //{view}
                    'buttons' => array(
                        'view' => array(
                            'htmlOptions' => array(
                                'onclick' => 'js:bootbox.alert("Hello, World!")'
                            ),
                        ),
                    ),
//                    'updateButtonUrl' => null,
//                    'deleteButtonUrl' => null,
                ),
            ),
                )
        );
        ?>
    </div>
</div>