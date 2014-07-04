<div class="panel panel-primary">
    <div class="panel-heading" >
        <h4><i class="glyphicon glyphicon-th-large"></i> เมนู เครื่องมือ</h4>
    </div>
    <div class="panel-body">
        <div class="well-sm">
            <?php
            $this->widget('zii.widgets.jui.CJuiAccordion', array(
                'panels' => array(
                    'ข้อมูลหลัก' => $this->renderPartial('//layouts/mPrimary', null, true),
                    'ตั้งค่า' => $this->renderPartial('//layouts/mSetting', null, true),
                // panel 3 contains the content rendered by a partial view
                //'panel 3' => $this->renderPartial('//back/member_form', null, true),
                ),
                // additional javascript options for the accordion plugin
                'options' => array(
                    //'animated' => 'bounceslide',
                    'animated' => 'slide',
//                                        'autoHeight' => false,
//                                        'cookieOptions' => array('path' => "/"),
//                                        'cookieName' => 'accordion',
                    'collapsible' => true,
                    'icons' => array(
                        "header" => "ui-icon-plus", //ui-icon-circle-arrow-e
                        "headerSelected" => "ui-icon-circle-arrow-s", //ui-icon-circle-arrow-s, ui-icon-minus
                    ),
                ),
            ));
            ?>
        </div>
    </div>
</div>

