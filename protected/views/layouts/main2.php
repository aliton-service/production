<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
        <link rel="stylesheet" href="/css/main.css" type="text/css" />
        <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.base.css" type="text/css" />
        <?php Yii::app()->clientScript->registerPackage('jquery_js'); ?>
        <?php Yii::app()->clientScript->registerPackage('jquery_ui_css'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets_css'); ?>
        <?php Yii::app()->clientScript->registerPackage('graj'); ?>
        <script type="text/javascript" src="/js/jqwidgets/localization.js"></script>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body>
    <?php
        $fullname = '';
        if (!Yii::app()->user->isGuest)
            $fullname = Yii::app()->user->fullname.' ('.Yii::app()->user->getRole('').')';
    ?>

    <div class="container" id="page">
        <div id='mainmenu' style="border: 0">
            <?php 
                $this->widget('zii.widgets.CMenu',array(
                    'items'=>array(
                        array('label'=>'Главная', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Кадры', 'url'=>'#', 'visible'=>true, 'visible'=>Yii::app()->user->checkAccess('ManagerEmployees'), 'items'=>array(
                            array('label'=>'Сотрудники', 'url'=>array('/employees/index'), 'visible'=>Yii::app()->user->checkAccess('ManagerEmployees')),
                            array('label'=>'Должности', 'url'=>array('/positions/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPositions')),
                            array('label'=>'Отделы', 'url'=>array('/departments/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDepartments')),
                            array('label'=>'Подразделения', 'url'=>array('/sections/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSections')),
                            array('label'=>'Структура организации', 'url'=>array('/organizationstructure/index'), 'visible'=>Yii::app()->user->checkAccess('ViewOrganizationStructure')),
                        )),
                        array('label'=>'Авторизация', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                        array('label'=>'Выход ('.$fullname.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                     ),
                ));
            ?>
        </div>
        <div id='page-content'>
            <?php echo $content; ?>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $("#mainmenu").jqxMenu({ width: '100%', mode: 'vertical'});
        $("#mainmenu").jqxMenu('minimize');
    });
</script>


