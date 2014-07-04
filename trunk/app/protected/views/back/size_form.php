
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>เพิ่ม Size</h3>
    </div>
    <div class="panel-body">
        <?php
        /** @var TbActiveForm $form */
        $form = $this->beginWidget(
                'booster.widgets.TbActiveForm', array(
            'id' => 'colorForm',
            'type' => 'horizontal',
            'htmlOptions' => array('class' => 'well'), // for inset effect
                )
        );
        echo $form->hiddenField($model, 's_id');
        echo $form->textFieldGroup(
                $model, 's_name', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
                )
        );
        echo $form->dropDownListGroup(
                $model, 'st_id', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-4',
            ),
            'widgetOptions' => array(
                'data' => CHtml::listData(SizeType::model()->findAll(), 'st_id', 'st_name'),
                'htmlOptions' => array(),
            ),
            'hint' => 'เลือก รูปแบบ'
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


