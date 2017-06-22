<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <!-- Подключаем таблицу стилей -->

    <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqwidgets/localization.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqwidgets/jqx-all.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/aliton-settings-17.05.22.01.js"></script>
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>


<body>
        <div id='page-content'>
                <?php
                    if(isset($this->title) && isset($this->breadcrumbs)) {
                ?>
                <div class="page-content__header">
                    <div class="page-title">
                        <h1><?= isset($this->title) ? $this->title : ""?></h1>
                    </div>
                </div>
                
                <?php } echo $content; ?>

            </div>
</body>
</html>