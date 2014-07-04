<?php

class MemberController extends Controller {

    public function actionIndex() {
        $criteria = new CDbCriteria();
        $criteria->alias = 'm';
        $criteria->join = 'JOIN m_status s ON (s.s_id=m.m_status)';
        $members = new CActiveDataProvider('Member', array(
            //  'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 10,
            )
        ));
        $this->render('//back/member_list', array(
            'members' => $members,
        ));
    }

    public function actionCreate() {
        $member = new Member();
        if (!empty($_POST)) {
            $member->m_nameen = $_POST["Member"]["m_fname"];
            $member->m_nameth = $_POST["Member"]["m_lname"];
            $member->m_username = $_POST["Member"]["m_username"];
            $member->m_password = $_POST["Member"]["m_password"];
            $member->m_birthday = $_POST["Member"]["m_birthday"];
            $member->m_pid = $_POST["Member"]["m_pid"];
            $member->m_address = $_POST["Member"]["m_address"];
            $member->m_tel = $_POST["Member"]["m_tel"];
            // $member->m_img   = $_POST["Member"]["m_img"];
            $member->m_email = $_POST["Member"]["m_email"];
            $member->m_career = $_POST["Member"]["m_career"];
            $member->s_id = 2; // 1= admin ,2 = user,3 = employee, 4 = borrow
            $member->m_createdate = new CDbExpression('NOW()');
            if ($member->save()) {
                $this->redirect(array('Index'));
            }
        }
        $this->render("//back/member_form", array(
            'model' => $member,
        ));
    }

    public function actionUpdate($id) {
        if (!empty($id)) {
            $member = Member::model()->findByPk($id);
            if (!empty($_POST["Member"]["m_id"])) {
                $member->m_nameen = $_POST["Member"]["m_fname"];
                $member->m_nameth = $_POST["Member"]["m_lname"];
                $member->m_username = $_POST["Member"]["m_username"];
                $member->m_password = $_POST["Member"]["m_password"];
                $member->m_birthday = $_POST["Member"]["m_birthday"];
                $member->m_pid = $_POST["Member"]["m_pid"];
                $member->m_address = $_POST["Member"]["m_address"];
                $member->m_tel = $_POST["Member"]["m_tel"];
                // $member->m_img   = $_POST["Member"]["m_img"];
                $member->m_email = $_POST["Member"]["m_email"];
                $member->m_career = $_POST["Member"]["m_career"];
                $member->s_id = 2; // 1= admin ,2 = user,3 = employee, 4 = borrow
                $member->m_createdate = new CDbExpression('NOW()');
                if ($member->save()) {
                    $this->redirect(array('Index'));
                }
            }
            $this->render("//back/member_form", array(
                'model' => $member,
            ));
        }
    }

    public function actionUpdateStatus() {
        if (!empty($_POST)) {
            $id = $_POST['pk'];
            $value = $_POST['value'];
            if (Member::model()->updateByPk($id, array('s_id' => $value))) {
                $this->redirect(array('Index'));
            }
        }
    }

    public function actionCheckPid() {
        $member = new Member();
        if (!empty($_POST)) {
            $criteria = new CDbCriteria();
            $criteria->compare('m_pid', $_POST['pid_']);
            $member = Member::model()->find($criteria);
           
        }
         echo CJSON::encode($member);
    }

}