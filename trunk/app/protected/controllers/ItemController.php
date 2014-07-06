<?php

class ItemController extends Controller {

    public function actionIndex() {
        $model = new CActiveDataProvider('Item', array(
            'pagination' => array(
                'pageSize' => 5,
            )
        ));
        $this->render('//back/item_list', array(
            'model' => $model,
            'height' => 100,
            'width' => 100,
            'assetsDir' => CommonApp::$PATH_SAVE_FILE,
        ));
    }

    public function actionCreate() {
        $item = new Item();
        $commonApp = new CommonApp();
        $item->i_code = $commonApp->getRunCodeItem('item');
        $group = CHtml::listData(Group::model()->findAll(), 'g_id', 'g_name');
        //$arrayGroup = $group->attributes;
        if (!empty($_POST)) {
            $item->it_id = $_POST["Item"]["it_id"];
            $item->i_code = $_POST["Item"]["i_code"];
            $item->i_nameen = $_POST["Item"]["i_nameen"];
            $item->i_detail = $_POST["Item"]["i_detail"];
            $item->i_status = $_POST["Item"]["i_status"];
            ; // 0 = ปกติ
            $item->i_nameth = $_POST["Item"]["i_nameth"];
            $item->c_id = $_POST["Item"]["c_id"];

            if (!empty($_POST['g_id'])) {
                $item->g_id = $_POST["g_id"];
            }

            $item->s_id = $_POST["Item"]["s_id"];
            $item->i_createdate = new CDbExpression('NOW()');
            $item->i_num = $_POST["Item"]["i_num"];
            $item->i_img = CUploadedFile::getInstance($item, 'i_img');
            //$item->i_img = (String)rand(1, 987699) . '-' . $item->i_img;
            if ($item->save()) {
                //Yii::getPathOfAlias('webroot') . "/images/uploads/"
                $item->i_img->saveAs(Yii::getPathOfAlias('webroot') . "/images/items/" . $item->i_img);
                // redirect to success page

                CommonApp::updateSEQ_('item');

                $this->redirect(array('Index'));
            }
        }
        $this->render("//back/item_form", array(
            'model' => $item,
            'commonApp' => $commonApp,
            //'arrayGroup' => $arrayGroup,
            'group' => $group,
        ));
    }

    public function actionUpdate($id) {
        if (!empty($id)) {
            $item = Item::model()->findByPk($id);
            if (!empty($_POST["Item"]["i_id"])) {
                $item->it_id = $_POST["Item"]["it_id"];
                $item->i_nameen = $_POST["Item"]["i_nameen"];
                $item->i_detail = $_POST["Item"]["i_detail"];
                $item->i_status = $_POST["Item"]["i_status"];
                ; // 0 = ปกติ
                $item->i_nameth = $_POST["Item"]["i_nameth"];
                $item->c_id = $_POST["Item"]["c_id"];
                $item->g_id = $_POST["Item"]["g_id"];
                $item->s_id = $_POST["Item"]["s_id"];
                $item->i_num = $_POST["Item"]["i_num"];
                $item->i_createdate = new CDbExpression('NOW()');
                if ($item->save()) {
                    $this->redirect(array('Index'));
                }
            }
            $commonApp = new CommonApp();
            $this->render("//back/item_form", array(
                'model' => $item,
                'commonApp' => $commonApp,
            ));
        }
    }

    public function actionDelete($id) {
        if (isset($id)) {
            if (Item::model()->deleteByPk($id)) {
                $this->redirect(array('index'));
            }
        }
    }

    public function actionUpdateStatus() {
        if (!empty($_POST)) {
            $id = $_POST['pk'];
            $value = $_POST['value'];
            Item::model()->updateByPk($id, array('i_status' => $value));
        }
    }

    public function actionItemSearchForm() {
        $this->render("//item_search");
    }

    public function actionSearchItem() {
        $criteria = new CDbCriteria();
        if (!empty($_POST)) {
            $criteria->compare('i_code', $_POST['searchval_'], true, 'OR');
            $criteria->compare('i_nameth', $_POST['searchval_'], true, 'OR');
            //$criteria->compare('i_nameen', $_POST['searchval_'], true, 'OR');
            //$criteria->compare('i_detail', $_POST['searchval_'], true, 'OR');
        }
        $criteria->compare('i_status', 0);
        $item = Item::model()->findAll($criteria);
        $count = count($item);
        $this->renderPartial("//load_datasearch", array(
            'item' => $item,
            'count' => $count,
        ));
    }

}