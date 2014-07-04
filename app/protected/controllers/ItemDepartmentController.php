<?php

class ItemDepartmentController extends Controller {

    public function actionIndex() {
        $model = new CActiveDataProvider('ItemDepartment', array(
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/itemDep_list', array(
            'model' => $model,
        ));
    }
    public function actionCreate(){
        $itemDep = new ItemDepartment();
        if (!empty($_POST)) {            
            $itemDep->id_name = $_POST["ItemDepartment"]["id_name"];
            $itemDep->id_createdate = new CDbExpression('NOW()');
            if ($itemDep->save()) {
                $this->redirect(array('Index'));
            }
        }
        $this->render("//back/itemDep_form", array(
                    'model' => $itemDep,
        ));
    }
    public function actionUpdate($id){
        if (isset($id)) {
            $itemDep = ItemDepartment::model()->findByPk($id);            
            if (!empty($_POST["ItemDepartment"]["id_id"])) {
                $itemDep->id_name = $_POST["ItemDepartment"]["id_name"];
                if ($itemDep->save()){
                    $this->redirect(array('Index'));
                }
            }            
            $this->render("//back/itemDep_form",array(
                            'model' => $itemDep,
            ));
        }
    }
    public function actionDelete($id){
        if (isset($id)) {
            if (ItemDepartment::model()->deleteByPk($id)) {
                $this->redirect(array('Index'));
            }
        }
    }

}