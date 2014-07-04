<?php

class BorrowController extends Controller {

    public function actionStep1() {

        $commonApp = new CommonApp();
        // gen itemcode
        $lastId = $commonApp->getLastSEQ_('borrow');
        // session borrow id
        Yii::app()->session['bor_id'] = $lastId;

        $criteria = new CDbCriteria();
        $criteria->compare('b_id', Yii::app()->session['bor_id']);
        $criteria->alias = "bd";
        $criteria->compare('bd_createdate', date('Y-m-d'));
        $criteria->join = "JOIN item i ON (bd.i_id = i.i_id)";
        $item = BorrowDetail::model()->findAll($criteria);


        $count = count($item);

        $this->render('//borrow_main', array(
            'item' => $item,
            'count' => $count,
        ));
    }

    public function actionNextStep2() {
        // gen itemcode
        $commonApp = new CommonApp();
        $lastId = $commonApp->getLastSEQ_('borrow');
        $genCode = $commonApp->genCodeItem($lastId);

        $this->render('//borrow_profile', array(
            'code' => $genCode,
        ));
    }

    public function actionSaveBorrow() {
        if (!empty($_POST)) {
            $m_id = "";
            // 1. insert new user
            // 2. 
            if (empty($_POST['mid'])) { // insert New Member
                $member = new Member();
                $member->m_fname = $_POST[''];
                $member->m_lname = $_POST[''];
                $member->m_address = $_POST[''];
                $member->m_birthday = $_POST[''];
                $member->m_career = $_POST[''];
                $member->m_createdate = $_POST[''];
                $member->m_email = $_POST[''];
                $member->m_img = $_POST[''];
                $member->m_password = $_POST[''];
                $member->m_pid = $_POST[''];
                $member->m_tel = $_POST[''];
                $member->m_username = $_POST[''];
                $member->save();
                $m_id = $member->m_id;
            } else {
                $m_id = $_POST['mid'];
            }
            $borrow = new Borrow();
            $borrow->b_createdate = new CDbExpression('NOW()');
            $borrow->b_startdate = $_POST['startdate'];
            $borrow->b_stopdate = $_POST['enddate'];
            $borrow->m_id = $m_id;
            $borrow->b_code = $_POST['code'];
            $borrow->b_status = 1;
            if ($borrow->save()) {
                echo 'success';
            }
        }
    }

}