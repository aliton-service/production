<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <!-- Подключаем таблицу стилей -->

    <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.11.3.min.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqwidgets/localization.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jqwidgets/jqx-all.js"></script>
    <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/aliton-settings-17.05.22.01.js"></script>
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>


<body>
    
        <header id="page-header">
        <div class="page-header__logo logo"><a href="/index.php?r=site/index"></a></div>
        <div class="page-header__description">
            Круглосуточный сервисный центр №1
        </div>
        <div class="page-header__time">
            <div class="clock-icon"></div>
            <div class="time"></div>
            <div class="flag"></div>
            <div class="count">1</div>
            <div class="arrows">
                <div class="arrow_up"></div>
                <div class="arrow_down"></div>
            </div>
        </div>
        <div class="page-header__user-name">
            <div class="user-name"><?php 
                if (!Yii::app()->user->isGuest) {
                    $empl = new Employees; $empl->getModelPk(Yii::app()->user->Employee_id); echo($empl['EmployeeName'] );
                } else {
                    echo 'Гость';
                }
            ?></div>
            <div class="user-position"><?php if (!Yii::app()->user->isGuest) {$empl = new Employees; $empl->getModelPk(Yii::app()->user->Employee_id); echo($empl['PositionName'] );} ?></div>
        </div>
<!--        <div class="page-header__logout">
            <a href="/index.php?r=site/logout"></a>
        </div>-->
        <!--<div style="display: float"></div>-->
    </header>
    
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

    <script type="text/javascript">
        $(document).ready(function () {
            
            (function(){
                var date = new Date();
                var hours = date.getHours() < 10 ? '0' + date.getHours() : date.getHours();
                var minutes = date.getMinutes() < 10 ? '0' + date.getMinutes() : date.getMinutes();
                var time = hours + ':' + minutes;
                $('.time').html(time);
                window.setTimeout(arguments.callee, 5000);
            })();
            
            $('.main-menu >ul>li>ul>li').hover(
                function() {
                    $(this).parent().prev().addClass('active-li');
                },
                function() {
                    $(this).parent().prev().removeClass('active-li');
                }
            );
            $('.main-menu >ul>li>ul>li>ul>li').hover(
                function() {
                    $(this).parent().parent().addClass('active-li');
                },
                function() {
                    $(this).parent().parent().removeClass('active-li');
                }
            );
    
            $(".menu-btn").on("click", function () {
                $(".main-menu").toggle(100, function(){$(window).resize();});
            });

            $(".filter-btn__wrapper").on("click", function () {
                $(".page-content__filters").toggle(100, function(){$(window).resize();});
            });
        });
    </script>
</body>
</html>
