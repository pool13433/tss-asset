
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
                array('label' => 'ตารางยืม', 'icon' => 'glyphicon glyphicon-calendar', 'url' => Yii::app()->createUrl('Schedule/Index'),),
                array('label' => 'ยืมของ', 'icon' => 'glyphicon glyphicon-shopping-cart', 'url' => Yii::app()->createUrl('Borrow/Step1'),),
                array('label' => 'ค้นหาของ', 'icon' => 'glyphicon glyphicon-search', 'url' => Yii::app()->createUrl('Item/ItemSearchForm')),
                array(
                    'label' => 'Dropdown',
                    'icon' => 'glyphicon glyphicon-shopping-cart',
                    'items' => array(
                        array('label' => 'Item1', 'url' => Yii::app()->createUrl(''))
                    )
                ),
            )
        ),
        '<form class="navbar-form navbar-right" action="" id="login-form">
                         <div class="form-group">
                            <input type="text" id="user" class="form-control" name="user" placeholder="username">
                            <input type="password" id="pass" class="form-control" name="pass" placeholder="password">
                            <button id="btn-login" type="button" class="btn btn-primary" >เข้าระบบ</button>
                         </div>
                         </form>'
    ,
    /* array(
      'class' => 'booster.widgets.TbMenu',
      'type' => 'navbar',
      'htmlOptions' => array('class' => 'pull-right'),
      'items' => array(
      array('label' => 'Link', 'url' => '#'),
      '---',
      array(
      'label' => 'Dropdown',
      'url' => '#',
      'items' => array(
      array('label' => 'Action', 'url' => '#'),
      array('label' => 'Another action', 'url' => '#'),
      array(
      'label' => 'Something else here',
      'url' => '#'
      ),
      '---',
      array('label' => 'Separated link', 'url' => '#'),
      ),
      ),
      ),
      ), */
    )
        )
);
?>
