<?php

class SizeTypeController extends Controller {

    public function actionIndex() {
        $model = new CActiveDataProvider('SizeType', array(
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/sizeType_list', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $sizetype = new SizeType();
        if (!empty($_POST)) {
            $sizetype->st_name = $_POST["SizeType"]["st_name"];
            $sizetype->st_createdate = new CDbExpression('NOW()');
            if ($sizetype->save()) {
                $this->redirect(array('Index'));
            }
        }
        $this->render("//back/sizeType_form", array(
            'model' => $sizetype,
        ));
    }

    public function actionUpdate($id) {
        if (!empty($id)) {
            $sizetype = SizeType::model()->findByPk($id);
            if (!empty($_POST["SizeType"]["st_id"])) {
                $sizetype->st_name = $_POST["SizeType"]["st_name"];
                $sizetype->st_createdate = new CDbExpression('NOW()');
                if ($sizetype->save()) {
                    $this->redirect(array('Index'));
                }
            }
            $this->render("//back/sizeType_form", array(
                'model' => $sizetype,
            ));
        }
    }

    public function actionDelete($id) {
        if (isset($id)) {
            if (SizeType::model()->deleteByPk($id)) {
                $this->redirect(array('index'));
            }
        }
    }

}