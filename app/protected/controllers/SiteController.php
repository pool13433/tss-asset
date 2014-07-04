<?php

class SiteController extends CController {

    public function actionIndex() {
        $this->render("//index");
    }

    public function actionCheckLogin() {
        if (!empty($_POST)) {
            $attribute = array(
                'm_username' => $_POST['user'],
                'm_password' => $_POST['pass']
            );
            $model = Member::model()->findByAttributes($attribute);
            if (isset($model)) {
                Yii::app()->session['member'] = $model;
                Yii::app()->session['id'] = $model->m_id;
                $Json = array(
                    'status' => 'success',
                    'group' => (int) $model->s_id,
                );
                echo CJSON::encode($Json);
            } else {
                $Json = array(
                    'status' => 'false',
                    'group' => null,
                );
                echo CJSON::encode($Json);
            }
        }
    }

    public function actionLogout() {
        Yii::app()->session['member'] = null;
        Yii::app()->session['id'] = null;
        $this->redirect(array('../index.php'));
    }

}
