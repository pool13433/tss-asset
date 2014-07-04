<div class="panel panel-info">
    <div class="panel-heading">
        <span class="alert-success alert">
            <i class="glyphicon glyphicon-calendar"> ปฏิทินการยืม ทรัพย์สิน</i>    
        </span>
    </div>
    <div class="panel-body">   
        <?php
        $this->widget('ext.fullcalendar.EFullCalendarHeart', array(
            //'themeCssFile'=>'cupertino/jquery-ui.min.css',
            'options' => array(
                'header' => array(
                    'left' => 'prev,next,today',
                    'center' => 'title',
                    'right' => 'month,agendaWeek,agendaDay',
                ),
                'events' => $this->createUrl('Schedule/CalendarEvents'), // URL to get event
//                'eventClick' => 'js:function(calEvent, jsEvent, view) {
//                            $("#myModalHeader").html(calEvent.title);
//                            $("#myModalBody").load("' . Yii::app()->createUrl("Schedule/view/id/") . '"+calEvent.id+"?asModal=true");
//                            $("#myModal").modal();
//        }',
        )));
        ?>
        
    </div>
</div>
