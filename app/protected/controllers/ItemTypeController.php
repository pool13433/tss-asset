<?php

class ItemTypeController extends Controller {

    public function actionIndex() {

        $model = new CActiveDataProvider('ItemType', array(
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/itemType_list', array(
            'model' => $model,
        ));
    }

    public function actionCreate() {
        $itemType = new ItemType();
        if (!empty($_POST)) {
            $itemType->it_name = $_POST["ItemType"]["it_name"];
            $itemType->id_id = $_POST["ItemType"]["id_id"];
            $itemType->it_createdate = new CDbExpression('NOW()');
            if ($itemType->save()) {
                $this->redirect(array('Index'));
            }
        }
        $this->render("//back/itemType_form", array(
            'model' => $itemType,            
        ));
    }

    public function actionUpdate($id) {
        if (!empty($id)) {
            $itemType = ItemType::model()->findByPk($id);
            if (!empty($_POST["ItemType"]["it_id"])) {
                $itemType->it_name = $_POST["ItemType"]["it_name"];
                $itemType->id_id = $_POST["ItemType"]["id_id"];
                $itemType->it_createdate = new CDbExpression('NOW()');
                if ($itemType->save()) {
                    $this->redirect(array('Index'));
                }
            }
            $this->render("//back/itemType_form", array(
                'model' => $itemType,
            ));
        }
    }

    public function actionDelete($id) {
        if (isset($id)) {
            if (ItemType::model()->deleteByPk($id)) {
                $this->redirect(array('index'));
            }
        }
    }

}