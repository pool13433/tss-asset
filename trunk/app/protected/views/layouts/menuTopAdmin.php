<?php

$this->widget('booster.widgets.TbNavbar', array(
    'brand' => 'HOME',
    'fixed' => true,
    'fluid' => true,
    'items' => array(
        array(
            'class' => 'booster.widgets.TbMenu',
            'type' => 'navbar',
            'items' => array(
                //array('label' => 'Home', 'url' => '#', 'active' => true),                
            )
        ),
        '<div class="navbar-form navbar-right">
            <a id="btn-logout" href="' . Yii::app()->createUrl('Site/Logout') . '" class="btn btn-danger">
            <i class="glyphicon glyphicon-log-out"></i>    
            ออกระบบ</a>
         </div>       '
    )
        )
);
?>