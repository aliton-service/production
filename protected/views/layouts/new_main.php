<!DOCTYPE html>
<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/new_main.css">
        
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
        
        <?php Yii::app()->clientScript->registerPackage('jquery_js'); ?>
        <?php Yii::app()->clientScript->registerPackage('jquery_ui_css'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets_css'); ?>
        <?php Yii::app()->clientScript->registerPackage('graj'); ?>
    </head>
    <?php
        $FIO = '';
        if (!Yii::app()->user->isGuest)
            $FIO = Yii::app()->user->fullname.' ('.Yii::app()->user->getRole('').')';
        
    ?>
    <body>
        <div class="page">
            <div class="page_header" id="page_header">
                <div class="page_header_logo" id="logo">
                    <div class="toggler-navbar">Меню</div>
                </div>
            </div><!-- header -->
            <div class="page_container" id="page_container">
                <div class="nav" id="container_menu" style="display: none">
                    <div class="mainmenu">
                            <?php $this->widget('zii.widgets.CMenu',array(
                                'items'=>array(
                                    array('label'=>'Главная', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>'Объекты', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('UserObjects'), 'items'=>array(
                                        array('label'=>'Список объектов', 'url'=>array('/Object/index'), 'visible'=>Yii::app()->user->checkAccess('UserObjects')),
                                        array('label'=>'Подъезды и оборудование', 'url'=>array('/ObjectsAndEquips/view')),
                                    )),
                                    array('label'=>'Справочники', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/reference/index'),
                                        'items' => array(
                                            array('label'=>'Объекты', 'url'=>'#', 'items'=>array(
                                                array('label'=>'Регионы', 'url'=>array('/regions/index')),
                                                array('label'=>'Районы', 'url'=>array('/areas/index')),
                                                array('label'=>'Улицы', 'url'=>array('/streets/index')),
                                                array('label'=>'Типы улиц', 'url'=>array('/streetTypes/index')),
                                                array('label'=>'Должности', 'url'=>array('/customers/index')),
                                                array('label'=>'Организации', 'url'=>array('/propForms/index')),
                                                array('label'=>'Типы организаций', 'url'=>array('/FormsOfOwnership/index')),
                                                array('label'=>'Причина просрочки', 'url'=>array('/delayReasons/index')),
                                                array('label'=>'Причина перемещения', 'url'=>array('/transferReasons/index')),
                                                array('label'=>'Тип системы', 'url'=>array('/systemTypes/index')),
                                                array('label'=>'Удовлетворенность клиента', 'url'=>array('/loyaltyTypes/index')),
                                                array('label'=>'Виды работ', 'url'=>array('/jobTypes/index')),
                                                array('label'=>'Виды объектов', 'url'=>array('/objectTypes/index')),
                                                array('label'=>'Статус клиента', 'url'=>array('/complexityTypes/index')),
                                                array('label'=>'Конкуренты', 'url'=>array('/competitors/index')),
                                                array('label'=>'Наличие систем', 'url'=>array('/systemAvailabilitys/index')),
                                                array('label'=>'Возражения клиентов', 'url'=>array('/negatives/index')),
                                            ),
                                            ),
                                            array('label'=>'Склад', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                                array('label'=>'Подтверждение отмены накладной', 'url'=>array('/confirmCancels/index')),
                                                array('label'=>'Склад', 'url'=>array('/storages/index')),
                                                array('label'=>'Тип работ', 'url'=>array('/workTypes/index')),
                                                array('label'=>'Основания для получения', 'url'=>array('/receiptReasons/index')),
                                                array('label'=>'Адресная система', 'url'=>array('/addressSystems/index')),
                                            ),
                                            ),
                                            array('label'=>'Контакты', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                                array('label'=>'Причина долга', 'url'=>array('/debtReasons/index')),
                                                array('label'=>'Тип совершенного контакта', 'url'=>array('/contactTypes/index')),
                                                array('label'=>'Результат контакта', 'url'=>array('/results/index')),
                                                array('label'=>'Тема контакта', 'url'=>array('/contactKinds/index')),
                                            ),
                                            ),
                                            array('label'=>'Договоры', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                                array('label'=>'Юридические лица', 'url'=>array('/juridicals/index')),
                                                array('label'=>'Типы тарифов', 'url'=>array('/ServiceTypes/index')),
                                                array('label'=>'Типы документов', 'url'=>array('/DocTypes/index')),
                                                array('label'=>'Банки', 'url'=>array('/banks/index')),
                                                array('label'=>'Типы заявок', 'url'=>array('/demandTypes/index')),
                                                array('label'=>'Приоритет заявок', 'url'=>array('/demandPriors/index')),
                                                array('label'=>'Причина смены тарифа', 'url'=>array('/priceChangeReasons/index')),
                                                array('label'=>'Виды оплат', 'url'=>array('/paymentTypes/index')),
                                            ),
                                            ),
                                            array('label'=>'Оборудование', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                                array('label'=>'EquipGroups', 'url'=>array('/equipGroups/index')),
                                                array('label'=>'EqipGroups', 'url'=>array('/eqipGroups/index')),
                                                array('label'=>'EquipAnalog', 'url'=>array('/equipAnalog/index')),
                                                array('label'=>'EquipCategory', 'url'=>array('/equipCategory/index')),
                                                array('label'=>'EquipDetails', 'url'=>array('/equipDetails/index')),
                                                array('label'=>'EquipRateDetails', 'url'=>array('/equipRateDetails/index')),
                                                array('label'=>'EquipRates', 'url'=>array('/equipRates/index')),
                                                array('label'=>'Equips', 'url'=>array('/equips/index')),
                                                array('label'=>'EquipsHistory', 'url'=>array('/equipsHistory/index')),
                                                array('label'=>'EquipsRate', 'url'=>array('/equipsRate/index')),
                                                array('label'=>'EquipSubgroups', 'url'=>array('/equipSubgroups/index')),
                                                array('label'=>'EquipTypes', 'url'=>array('/equipTypes/index')),



                                            ),
                                            ),
                                        ),
                                    ),

                                    array('label'=>'Заявки', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('DemandsView'), 'items'=>array(
                                        array('label'=>'Просмотр заявок', 'url'=>array('/demands&status[nofinish]=on')),
                                        array('label'=>'Отчеты', 'url'=>'#', 'items'=>array(
                                            array('label'=>'Заявки (общий отчет)', 'url'=>array('/demands/repGeneral')),
                                        )
                                        )
                                    )
                                    ),
                                    array('label'=>'Ремонт', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ViewRepair'), 'items'=>array(
                                        array('label'=>'Реестр оборудования', 'url'=>array('/repair')),
                                    )
                                    ),
                                    array('label'=>'Склад', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('WHDocumentsView'), 'items'=>array(
                                        array('label'=>'Реестр документов', 'url'=>array('/storage')),
                                    )
                                    ),
                                    array('label'=>'Заявки на доставку', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('UserDeliveryDemands'), 'items'=>array(
                                        array('label'=>'Просмотр и создание заявок', 'url'=>array('/delivery/index')),
                                        array('label'=>'Отчеты', 'url'=>'#', 'items'=>array(
                                            array('label'=>'Заявки на доставку', 'url'=>array('/delivery/repDelivery')),
                                            array('label'=>'Нарушение сроков выполнения', 'url'=>array('/delivery/repDeliveryReason')),
                                        )
                                        )
                                    )
                                    ),
                                    /*
                                                                array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
                                array('label'=>'Contact', 'url'=>array('/site/contact')),
                                                                */
                                    array('label'=>'Авторизация', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>'Выход ('.$FIO.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>'Администрирование', 'url'=>array('/admin'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
                                    array('label'=>'Тестирование', 'url'=>array('test/index'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),

                                ),
                            )); ?>

                        </div><!-- mainmenu -->
                </div>
                <div class="container_body" id="container_body">
                    <?php echo $content; ?>
                </div>
            </div>
        </div><!--page-->
    </body>
</html>

