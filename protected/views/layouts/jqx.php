<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <!-- Подключаем таблицу стилей -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.fresh2.css" type="text/css" />
    <!--<link href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=cyrillic" rel="stylesheet">-->
    <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.base.css" type="text/css" />
    
    <?php Yii::app()->clientScript->registerPackage('jquery_js'); ?>
    <?php Yii::app()->clientScript->registerPackage('widgets'); ?>
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>


<body>
    
<!--    <header id="page-header">
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
        <div class="page-header__logout">
            <a href="/index.php?r=site/logout"></a>
        </div>
        
    </header>-->
    <div id='main-content'>
        
<!--        <div class="main-content__header">

            <div class="menu-btn">
                <div class="menu-text">
                    Меню
                </div>
            </div>
            
            <div class="search-form">
                <input type="text" placeholder="ПОИСК...">
            </div>
            <div class="search-btn"></div>
            
            <div class="filter-btn__wrapper">
                <input type="button" class="filter-btn" value="Фильтр" />
            </div>
        </div>-->
        
        
        <div class="page-content__wrapper">
            

            
            <div id='page-content'>
                <?php echo $content; ?>

            </div>
            <div class="page-content__filters">
                <?php
                    if (isset($this->gridFilters))
                        if (isset($this->filterDefaultValues))
                            $this->renderPartial($this->gridFilters, array(
                                'filterDefaultValues' => $this->filterDefaultValues
                            ), false, true);
                        else
                            $this->renderPartial($this->gridFilters, null, false, true);
                ?>
            </div>
        </div>
        
    </div>
    
    
    <!-- Диалоговое окно -->
    <div id="MainDialog" style="display: none;">
        <div id="MainDialogHeader">
            <span id="MainDialogHeaderText">Вставка\Редактирование записи</span>
        </div>
        <div style="padding: 10px;" id="DialogMainContent">
            <!-- <div style="" id="BodyMainDialog"></div> -->
            <textarea id="BodyMainDialog"></textarea>
            <div style="margin-top: 10px;"><input type="button" value="Закрыть" id='MainDialogBtnClose'/></div>
        </div>
    </div>
    
    
<!--    <script type="text/javascript">
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
    </script>-->
    
</body>
</html>
