<?php

class GroupController extends Controller {

    public function actionIndex() {
        $columns = Yii::app()->db->schema->getTable('group')->columns;
        $model = new CActiveDataProvider('Group', array(           
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/group_list', array(
            'model' => $model,
            'gridColumns' => $columns,
        ));
    }
    public function actionCreate(){
            $group = new Group();
            if (!empty($_POST)) {
                $group->g_name = $_POST["Group"]["g_name"];
                $group->g_createdate = new CDbExpression('NOW()');
                if ($group->save()) {
                    $this->redirect(array('Index'));
                }
            }
            $this->render("//back/group_form", array(
                        'model' => $group,
            ));
    }
    public function actionUpdate($id){
        if (!empty($id)) {
            $group = Group::model()->findByPk($id);
            if (!empty($_POST["Group"]["g_id"])) {
                $group->g_name = $_POST["Group"]["g_name"];
                if ($group->save()){
                    $this->redirect(array('Index'));
                }
            }            
            $this->render("//back/group_form",array(
                            'model' => $group,
            ));
        }
    }
    public function actionDelete($id){
        if (isset($id)) {
            if ( Group::model()->deleteByPk($id)) {
                $this->redirect(array('index'));
            }
        }
    }

}