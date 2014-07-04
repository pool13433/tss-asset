<?php

class MemberStatusController extends Controller {

    public function actionIndex() {
        $model = new CActiveDataProvider('MemberStatus', array(
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/memberStatus_list', array(
            'model' => $model,
        ));
    }

}