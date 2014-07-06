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
            if (empty($_POST['mid'])) { // insert New Member
                $member = new Member();
            } else {
                $member = Member::model()->findByPk($_POST['mid']);
            }
            // save new user
            $member->m_fname = $_POST['fname'];
            $member->m_lname = $_POST['lname'];
            $member->m_address = $_POST['address'];
            $member->m_birthday = $_POST['birthdate'];
            //$member->m_career = $_POST[''];
            $member->m_createdate = new CDbExpression('NOW()');
            $member->m_email = $_POST['email'];
            // $member->m_img = $_POST[''];
            // $member->m_password = $_POST[''];
            $member->m_pid = $_POST['pid'];
            $member->m_tel = $_POST['phone'];
            // $member->m_username = $_POST[''];
            if ($member->save()) {
                $create = DateTime::createFromFormat('d/m/Y', $_POST['startdate']);
                $end = DateTime::createFromFormat('d/m/Y', $_POST['enddate']);
                $borrow = new Borrow();
                $borrow->b_createdate = new CDbExpression('NOW()');
                $borrow->b_startdate = $create->format('Y-m-d'); //$_POST['startdate'];
                $borrow->b_stopdate = $end->format('Y-m-d'); //$_POST['enddate'];
                $borrow->m_id = $member->m_id;
                $borrow->b_code = $_POST['code'];
                $borrow->b_status = 1;
                if ($borrow->save()) {
                    // cut stock
                    $criteria = new CDbCriteria();
                    $criteria->compare('b_id', Yii::app()->session['bor_id']);
                    $criteria->compare('bd_createdate', date('Y-m-d'));

                    $borrowDetail = BorrowDetail::model()->findAll($criteria);
                    // var_dump($borrowDetail);
                    if (isset($borrowDetail)) {
                        foreach ($borrowDetail as $borItem) {
                            $item = Item::model()->findByPk($borItem->i_id);
                            //var_dump($item);
                            //var_dump("amount: " . intval($borItem->i_amount));
                            //var_dump("num:" . intval($item->i_num));
                            $total = intval($item->i_num) - intval($borItem->i_amount);
                            //var_dump("total: " . intval($total));
                            $item->i_num = intval($total);
                            $item->update();
                        }
                    }

                    CommonApp::updateSEQ_('borrow');
                    unset(Yii::app()->session['bor_id']);
                    echo 'success';
                }
            } else {
                echo 'fail';
            }
        } else {
            echo 'not post';
        }
    }

    public function actionReturnsIndex() {
        $this->render('//back/return_main');
    }

    public function actionReturnMain($code = null) {
        if (!empty($code)) {
            $criteria = new CDbCriteria();
            $criteria->alias = 'br';
            $criteria->join = "JOIN member m ON (br.m_id = m.m_id)";
            $criteria->compare('b_code', $code);
            $borrow = Borrow::model()->find($criteria);

            echo 'helloworld';
        }
        $this->render('//back/return_result');
    }

}