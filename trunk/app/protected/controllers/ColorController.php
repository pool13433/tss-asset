<?php

class ColorController extends Controller {

    public function actionIndex() {
        $model = new CActiveDataProvider('Color', array(
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/color_list', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $color = new Color();
        if (!empty($_POST)) {
            $color->c_nameth = $_POST["Color"]["c_nameth"];
            $color->c_nameen = $_POST["Color"]["c_nameen"];
            $color->c_createdate = new CDbExpression('NOW()');
            if ($color->save()) {
                $this->redirect(array('Index'));
            }
        }
        $this->render("//back/color_form", array(
            'model' => $color,
        ));
    }

    public function actionUpdate($id) {
        if (!empty($id)) {
            $color = Color::model()->findByPk($id);
            if (!empty($_POST["Color"]["c_id"])) {
                $color->c_nameth = $_POST["Color"]["c_nameth"];
                $color->c_nameen = $_POST["Color"]["c_nameen"];
                $color->c_createdate = new CDbExpression('NOW()');
                if ($color->save()) {
                    $this->redirect(array('Index'));
                }
            }
            $this->render("//back/color_form", array(
                'model' => $color,
            ));
        }
    }

    public function actionDelete($id) {
        if (isset($id)) {
            if (Member::model()->deleteByPk($id)) {
                $this->redirect(array('index'));
            }
        }
    }

}