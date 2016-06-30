<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/screen.css" media="screen, projection">
            <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print"> -->
        
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->
        
        
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css">
        <!-- 
            <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">
       -->
        
        
        <!-- Подключаем таблицу стилей для шапки -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/header.css">
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<?php
    $fullname = '';
    
    if (!Yii::app()->user->isGuest)
    {
        $fullname = Yii::app()->user->fullname.' ('.Yii::app()->user->getRole('').')';
    }
?>
    
<div id="page">
	<div id="header">
		<div id="logo">
                    <div id="logo_img"></div>
                </div>
            
            <div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/site/index'), 'itemOptions'=>array('id'=>'top_menu'),),
				array('label'=>'Пользователи', 'url'=>array('/admin/employees'), 'items'=>array(
                                    array('label'=>'Управление пользователями', 'url'=>array('/admin/employees')),
                                    array('label'=>'Создание пользователя', 'url'=>array('/admin/employees/create')),
                                ),
                                    'itemOptions'=>array('id'=>'top_menu')),
                                /*
                                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
                                */
				array('label'=>'Авторизация', 'url'=>array('/site/login'), 'itemOptions'=>array('id'=>'top_menu'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Выход ('.$fullname.')', 'url'=>array('/site/logout'), 'itemOptions'=>array('id'=>'top_menu'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'Администрирование', 'url'=>array('/admin'), 'itemOptions'=>array('id'=>'top_menu'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
                            
			),
		)); ?>
            </div><!-- mainmenu -->
        </div><!-- header -->

	<?php
            
        ?>
	
        <p>
        <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>
        
	<div class="clear"></div>

</div><!-- page -->

</body>
</html>
