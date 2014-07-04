
<div class="panel panel-primary">
    <div class="panel-heading">
        <h3>เพิ่ม ผู้ใช้งาน</h3>
    </div>
    <div class="panel-body">
        <?php
        /** @var TbActiveForm $form */
        $form = $this->beginWidget(
                'booster.widgets.TbActiveForm', array(
            'id' => 'memberForm',
            'type' => 'horizontal',
            'htmlOptions' => array('class' => 'well'), // for inset effect
                )
        );
        echo $form->hiddenField($model, 'm_id');
        echo $form->textFieldGroup(
                $model, 'm_username', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
                )
        );
        echo $form->passwordFieldGroup(
                $model, 'm_password', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
                )
        );
        echo $form->passwordFieldGroup(
                $model, 'm_password', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
                )
        );
        echo $form->textFieldGroup(
                $model, 'm_fname', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                //'hint' => 'In addition to freeform text, any HTML5 text-based input appears like so.'
                )
        );
        echo $form->textFieldGroup(
                $model, 'm_lname', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                )
        );
        echo $form->datePickerGroup(
                $model, 'm_birthday', array(
            'widgetOptions' => array(
                'options' => array(
                    'language' => 'th',
                ),
            ),
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
            //'hint' => 'เลือกวันเกิด',
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>'
                )
        );
        echo $form->textFieldGroup(
                $model, 'm_pid', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                )
        );
        echo $form->textFieldGroup(
                $model, 'm_tel', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                )
        );
        echo $form->textFieldGroup(
                $model, 'm_email', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                )
        );
        echo $form->textFieldGroup(
                $model, 'm_career', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
                )
        );
        echo $form->textAreaGroup(
                $model, 'm_address', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-8',
            ),
            'widgetOptions' => array(
                'htmlOptions' => array('rows' => 4),
            )
                )
        );
        echo $form->fileFieldGroup(
                $model, 'm_img', array(
            'wrapperHtmlOptions' => array(
                'class' => 'col-sm-5',
            ),
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


