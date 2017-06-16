<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <!-- Подключаем таблицу стилей -->

    
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dx/dx.spa.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dx/dx.common.css" />
    <link rel="dx-theme" data-theme="generic.light" href="<?php echo Yii::app()->request->baseUrl; ?>/css/dx/dx.light.css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/css/dx/dx.all.js"></script>
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>


<body>
    
    
<?php echo $content; ?>

           
</body>
</html>
