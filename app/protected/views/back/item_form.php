
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>เพิ่มกลุ่ม ItemType</h3>
    </div>
    <div class="panel-body">
        <?php
        /** @var TbActiveForm $form */
        $form = $this->beginWidget(
                'booster.widgets.TbActiveForm', array(
            'id' => 'verticalForm',
            'type' => 'horizontal',
            'htmlOptions' => array(
                'class' => 'well',
                'enctype' => 'multipart/form-data'), // for inset effect
                )
        );
        echo $form->hiddenField($model, 'i_id');
        echo $form->textFieldGroup(
                $model, 'i_code', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',                
            ),
                )
        );
        echo $form->textFieldGroup(
                $model, 'i_nameth', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'hint' => 'กรอก ชื่อ อุปกรณ์'
                )
        );
        echo $form->textFieldGroup(
                $model, 'i_nameen', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'hint' => 'กรอก ชื่อ อุปกรณ์'
                )
        );
        echo $form->dropDownListGroup(
                $model, 'it_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(ItemType::model()->findAll(), 'it_id', 'it_name'),
                'htmlOptions' => array(),
            ),
            'hint' => 'เลือก แผนก ของ อุปกรณ์'
                )
        );
        echo $form->dropDownListGroup(
                $model, 'c_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(Color::model()->findAll(), 'c_id', 'c_nameth'),
                'htmlOptions' => array(),
            ),
            'hint' => 'เลือก สี'
                )
        );
        echo "<div class='form-group' style=''>";
        echo "<label class='col-sm-3' style='text-align:right;'>กลุ่ม</label>";
        $form->widget(
                'booster.widgets.TbSelect2', array(
            'name' => 'g_id',
            'data' => CHtml::listData(Group::model()->findAll(), 'g_id', 'g_name'),
            'htmlOptions' => array(
                'name' => 'g_id',
                'placeholder' => 'select group',
                'class' => 'col-sm-8',
                'multiple' => true,
                'width' => '40%',
            //'tokenSeparators' => array(',', ' ')
            ),
                )
        );
        echo "</div>";
        echo $form->dropDownListGroup(
                $model, 's_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(Size::model()->findAll(), 's_id', 's_name'),
                'htmlOptions' => array(),
            ),
            'hint' => 'เลือก ขนาด ของ อุปกรณ์'
                )
        );

        echo $form->textAreaGroup(
                $model, 'i_detail', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-8',
            ),
            'widgetOptions' => array(
                'htmlOptions' => array('rows' => 5),
            )
                )
        );
        echo $form->dropDownListGroup(
                $model, 'i_status', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ),
            'widgetOptions' => array(
                'data' => array(
                    '0' => 'ปกติ',
                    '1' => 'ชำรุด',
                    '2' => 'หาย',
                ),
                'htmlOptions' => array(),
            ),
            'hint' => 'เลือก แผนก ของ อุปกรณ์'
                )
        );
        echo $form->textFieldGroup(
                $model, 'i_num', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'hint' => 'กรอก ชื่อ อุปกรณ์'
                )
        );
        echo $form->fileFieldGroup($model, 'i_img', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5 alert-warning alert',
            ),
                )
        );
        $this->widget(
                'booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'label' => 'Save',
            'context' => 'success',
            'size' => 'large'
                )
        );

        $this->endWidget();
        unset($form);
        ?>
    </div>
</div>


