<?php

class SizeController extends Controller {

    public function actionIndex() {
        $model = new CActiveDataProvider('Size', array(
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/size_list', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $size = new Size();
        if (!empty($_POST)) {
            $size->s_name = $_POST["Size"]["s_name"];
            $size->st_id = $_POST["Size"]["st_id"];
            $size->s_createdate = new CDbExpression('NOW()');
            if ($size->save()) {
                $this->redirect(array('Index'));
            }
        }
        $this->render("//back/size_form", array(
            'model' => $size,
        ));
    }

    public function actionUpdate($id) {
        if (!empty($id)) {
            $size = Size::model()->findByPk($id);
            if (!empty($_POST["Size"]["s_id"])) {
                $size->s_name = $_POST["Size"]["s_name"];
                $size->st_id = $_POST["Size"]["st_id"];
                $size->s_createdate = new CDbExpression('NOW()');
                if ($size->save()) {
                    $this->redirect(array('Index'));
                }
            }
            $this->render("//back/size_form", array(
                'model' => $size,
            ));
        }
    }

    public function actionDelete($id) {
        if (isset($id)) {
            if (Size::model()->deleteByPk($id)) {
                $this->redirect(array('index'));
            }
        }
    }

}