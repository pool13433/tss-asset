<?php

class BorrowDetailController extends Controller {

    public function actionIndex() {
        $this->render('index');
    }

    public function actionDelItemFromCart($id) {
        if (!empty($id)) {
            BorrowDetail::model()->deleteByPk($id);
            //$this->redirect(array('Borrow/Index'));
            echo 'success';
        }
    }

    public function actionAddItemToCart() {
        //echo "addtocart";
        if (!empty($_POST)) {
            $borrowId = Yii::app()->session['bor_id'];
            $borrowDetail = new BorrowDetail();
            $borrowDetail->b_id = (int) $borrowId;
            $borrowDetail->i_amount = (int) $_POST['amount'];
            $borrowDetail->i_id = (int) $_POST['item_id'];
            $borrowDetail->bd_createdate = new CDbExpression('NOW()');
            if ($borrowDetail->save()) {
                echo 'success';
            }
        }
//        var_dump(Yii::app()->session['cart']);
//        if (empty(Yii::app()->session['cart'])) {
//            Yii::app()->session['cart'];
//        }
//        $arrayCart = array(
//            'item' => 1,
//        );
//        var_dump($arrayCart);
//        $borrowId = Yii::app()->session['bor_id'];
//
//        $borrow = new BorrowDetail();
////        $borrow->i_amount = $_POST['amount'];
////        $borrow->i_id = $_POST['item_id'];
////        $borrow->b_id = $borrowId;
    }

}