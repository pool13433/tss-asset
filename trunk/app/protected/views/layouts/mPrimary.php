<?php

$this->widget('booster.widgets.TbMenu', array(
    'type' => 'list',
    'items' => array(
        array(
            'label' => 'ตารางหลักทั้งหมด',
            'itemOptions' => array('class' => 'nav-header')
        ),
        array('label' => 'กลุ่มของอุปกรณ์[Groups]',
            'url' => Yii::app()->createUrl('Group/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        array('label' => 'แผนก[Department]',
            'url' => Yii::app()->createUrl('itemDepartment/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        array('label' => 'ชนิดอุปกรณ์[Type]',
            'url' => Yii::app()->createUrl('ItemType/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        array('label' => 'อุปกรณ์[Item]',
            'url' => Yii::app()->createUrl('Item/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        //array('label' => 'Applications', 'url' => '#'),
        array(
            'label' => 'อื่น ',
            'itemOptions' => array('class' => 'nav-header')
        ),
        array('label' => 'สี[Color]',
            'url' => Yii::app()->createUrl('Color/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        array('label' => 'รูปแบบ ขนาด[SizeType]',
            'url' => Yii::app()->createUrl('SizeType/Index'),
            'itemOptions' => array('class' => 'active')
        ),
        array('label' => 'ขนาด[Size]',
            'url' => Yii::app()->createUrl('Size/Index'),
            'itemOptions' => array('class' => 'active')
        ),
//        array('label' => 'Profile', 'url' => '#'),
//        array('label' => 'Settings', 'url' => '#'),
//        '',
//        array('label' => 'Help', 'url' => '#'),
    )
        )
);
?>
