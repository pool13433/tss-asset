<?php

class ScheduleController extends Controller {

    public function actionIndex() {
        $this->render('//scheduleCelendar');
    }

    public function actionCalendarEvents() {
        $items = array();
        $model = BorrowCalendar::model()->findAll();
        foreach ($model as $value) {
            $items[] = array(
                'id' => $value->cal_id,
                'title' => $value->cal_name,
                'start' => $value->cal_start,
                'end' => date('Y-m-d', strtotime('+1 day', strtotime($value->cal_finish))),
                'color' => $value->cal_color,
                //'allDay'=>true,
                'url' => Yii::app()->createUrl('Schedule/PageView',array('id'=>$value->cal_id)),
            );
        }
        echo CJSON::encode($items);
        Yii::app()->end();
    }
    public function actionPageView($id){
        if(!empty($id)){
            $calendar = BorrowCalendar::model()->findByPk($id);
            $this->render('//scheduleView',array(
                        'calendar' => $calendar,
            ));
        }
    }
    public function actionView($id) {

        if (@$_GET['asModal'] == true) {
            $this->renderPartial('scheduleView', array(
                'model' => $this->loadModel($id),
                    ), false, true
            );
        } else {
            $this->layout = 'column2';
            $this->render('scheduleView', array(
                'model' => $this->loadModel($id),
            ));
        }
    }

    public function actionCalendar() {
        $model = new BorrowCalendar('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BorrowCalendar']))
            $model->attributes = $_GET['BorrowCalendar'];
        $this->render('scheduleCelendar', array(
            'model' => $model,
        ));
    }

    /* public function actionCalendarEvents() {
      $items[] = array(
      'title' => 'Meeting',
      'start' => '2012-11-23',
      'color' => '#CC0000',
      'allDay' => true,
      'url' => 'http://anyurl.com'
      );
      $items[] = array(
      'title' => 'Meeting reminder',
      'start' => '2012-11-19',
      'end' => '2012-11-22',
      // can pass unix timestamp too
      // 'start'=>time()
      'color' => 'blue',
      );

      echo CJSON::encode($items);
      Yii::app()->end();
      } */
}
