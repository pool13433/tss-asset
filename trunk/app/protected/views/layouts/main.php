<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" />

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <?php // Yii::app()->bootstrap->register(); ?>
        <?php Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/script.js'); ?>
        <?php
        
        //ui
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-ui/js/jquery-ui-1.10.4.js');
        // end ui
        
        
         // validate ************************************
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-ui-1.10.3.custom.js');
            Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/jquery-validation/dist/jquery.validate.min.js');
            // validate ************************************
        
        // noty ***********
        //Yii::app()->clientScript->registerScriptFile('../noty/demo/jquery-1.7.2.min.js');
        //Yii::app()->clientScript->registerScriptFile('http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/jquery.noty.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/packaged/jquery.noty.packaged.min.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/top.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/topCenter.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/center.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/topLeft.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/topRight.js');

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/bottomCenter.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/bottomLeft.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/bottomRight.js');
        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/layouts/bottom.js');

        Yii::app()->clientScript->registerScriptFile(Yii::app()->baseUrl.'/js/noty/js/noty/themes/default.js');
        // noty ***********
        ?>
    </head>

    <body>
        <div class="page-container" 
             style="margin-top: 20px;margin-bottom: 20px;
             padding-left: 50px;padding-right: 50px;">            
             <?php
             if (empty(Yii::app()->session['id'])):
                 $this->renderPartial("//layouts/menuTopIndex");
             else:
                 $this->renderPartial("//layouts/menuTopAdmin");
             endif;
             ?>
            <div class="col-lg-3">               
                <?php
                if (empty(Yii::app()->session['id'])):
                    $this->renderPartial("//layouts/menuLeftIndex");
                else:
                    $this->renderPartial("//layouts/menuLeftAdmin");
                endif;
                ?>
            </div>
            <div class="col-lg-9">
                <div class="panel panel-primary">                    
                    <div class="panel-body">
                        <?php echo $content ?>
                    </div>
                </div>
            </div>
            <footer>
                Copylight
            </footer>
        </div>
    </body>
</html>
