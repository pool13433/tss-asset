
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>เพิ่มกลุ่ม Item</h3>
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
        echo $form->hiddenField($model, 'g_id');
        echo $form->textFieldGroup(
        $model, 'g_name', array(
    'wrapperHtmlOptions' => array(
        'class' => 'col-sm-5',
    ),
    'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
        )
);
//        echo $form->select2Group(
//                $model, 'g_name', array(
//            'wrapperHtmlOptions' => array(
//                'class' => 'col-sm-5',
//            ),
//            'widgetOptions' => array(
//                'asDropDownList' => false,
//                'options' => array(
//                    //'tags' => array('clever', 'is', 'better', 'clevertech'),
//                    'tags' =>  Item::model()->findAll(),
//                    'placeholder' => 'type clever, or is, or just type!',
//                    /* 'width' => '40%', */
//                    'tokenSeparators' => array(',', ' ')
//                )
//            )
//                )
//        );
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
<pre>
    <?php
           // var_dump(CHtml::listData(Item::model()->findAll(), 'i_id', 'i_nameth'));
    ?>
</pre>


