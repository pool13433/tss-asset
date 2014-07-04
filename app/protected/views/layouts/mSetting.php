<?php

$this->widget('booster.widgets.TbMenu', array(
    'type' => 'list',
    'items' => array(
        array(
            'label' => 'ผู้ใช้งาน',
            'itemOptions' => array('class' => 'nav-header')
        ),
        array(
            'label' => 'ข้อมูลผ้ใช้งาน',
            'url' => Yii::app()->createUrl('Member/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        array('label' => 'สถานะ[Status]',
            'url' => Yii::app()->createUrl('MemberStatus/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        array('label' => 'Applications', 'url' => '#'),
        array(
            'label' => 'Another list header',
            'itemOptions' => array('class' => 'nav-header')
        ),
        array('label' => 'Profile', 'url' => '#'),
        array('label' => 'Settings', 'url' => '#'),
        '',
        array('label' => 'Help', 'url' => '#'),
    )
        )
);
?>
