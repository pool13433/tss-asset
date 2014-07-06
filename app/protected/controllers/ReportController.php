<?php

class ReportController extends Controller {

    public function actionReport() {
        $this->renderPartial("//report/borrow_");
    }

    public function actionMpdf() {
        # mPDF
        //$mPDF1 = Yii::app()->ePdf->mpdf();
        # You can easily override default constructor's params
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'A4');

        # render (full page)
        //$mPDF1->WriteHTML($this->render('//report/index', array(), true));
        # Load a stylesheet
        $stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
        $mPDF1->WriteHTML($stylesheet, 1);

        # renderPartial (only 'view' of current controller)
        //$mPDF1->WriteHTML($this->renderPartial('//report/index', array(), true));
        $mPDF1->writeHTML('<table><tr>Hello World</tr></table>');

        # Renders image
        $mPDF1->WriteHTML(CHtml::image(Yii::getPathOfAlias('webroot.css') . '/bg.gif'));

        # Outputs ready PDF
        $mPDF1->Output();
    }

    public function actionHtml2($id = null) {
        # HTML2PDF has very similar syntax
        $member = Member::model()->findByPk(1);

        $criteria0 = new CDbCriteria();
        $criteria0->compare('m_id', $member->m_id);
        $criteria0->compare('b_createdate', date('Y-m-d'));
        $borrow = Borrow::model()->model()->find($criteria0);

        $criteria1 = new CDbCriteria();
        $criteria1->compare('b_id', $borrow->b_id);
        $borrow_detail = BorrowDetail::model()->findAll($criteria1);

        $html2pdf = Yii::app()->ePdf->HTML2PDF();
        
        $html2pdf->WriteHTML($this->renderPartial('//report/borrow_', array(
                    'member' => $member,
                    'borrow' => $borrow,
                    'borrow_detail' => $borrow_detail
                        ), true));
        
        $html2pdf->Output();
    }

}
