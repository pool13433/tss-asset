
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
            'htmlOptions' => array('class' => 'well'), // for inset effect
                )
        );
        echo $form->hiddenField($model, 'it_id');
        echo $form->textFieldGroup(
                $model, 'it_name', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            'hint' => 'กรอก ชื่อ อุปกรณ์'
                )
        );
        echo $form->dropDownListGroup(
                $model, 'id_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',                
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(ItemDepartment::model()->findAll(), 'id_id', 'id_name'),
                'htmlOptions' => array(),
            ),
            'hint' => 'เลือก แผนก ของ อุปกรณ์'
                )
        );
        $this->widget(
                'booster.widgets.TbButton', array(
            'buttonType' => 'submit',
            'label' => 'Save',
            'context' => 'success',
                )
        );

        $this->endWidget();
        unset($form);
        ?>
    </div>
</div>


