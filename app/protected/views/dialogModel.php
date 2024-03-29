<?php
$this->beginWidget(
        'booster.widgets.TbModal', array('id' => 'myModal')
);
?>
<div class="modal-header">
    <a class="close" data-dismiss="modal">&times;</a>
    <h4>Modal header</h4>
</div>

<div class="modal-body">
    <p>One fine body...</p>
</div>

<div class="modal-footer">
    <?php
    $this->widget(
            'booster.widgets.TbButton', array(
        'context' => 'primary',
        'label' => 'Save changes',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
            )
    );
    ?>
    <?php
    $this->widget(
            'booster.widgets.TbButton', array(
        'label' => 'Close',
        'url' => '#',
        'htmlOptions' => array('data-dismiss' => 'modal'),
            )
    );
    ?>
</div>

<?php $this->endWidget(); ?>