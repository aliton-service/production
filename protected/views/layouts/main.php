<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/block.css">
        <!-- Подключаем таблицу стилей для шапки -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/header.css">
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/admin/main.css">
        <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.base.css" type="text/css" />
        <!--<script type="text/javascript" src="/protected/extensions/alitonwidgets/button/assets/js/albutton.js"></script>-->
        <?php Yii::app()->clientScript->registerPackage('jquery_js'); ?>
        <?php Yii::app()->clientScript->registerPackage('jquery_ui_css'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets_css'); ?>
        <?php Yii::app()->clientScript->registerPackage('graj'); ?>
        <?php //Yii::app()->clientScript->registerPackage('jqwidgets'); ?>
        <script type="text/javascript" src="/js/jqwidgets/localization.js"></script>
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
     
<div class="container" id="page">
    <div id="header">
        <div id="logo">
            <div class="toggler-navbar">Меню</div>
        </div>
    </div><!-- header -->
    
    <div class="content">
        <div class="nav">
            <div class="mainmenu">
                    <?php $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Главная', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Кадры', 'url'=>'#', 'visible'=>true, 'visible'=>Yii::app()->user->checkAccess('ManagerEmployees'), 'items'=>array(
                                            array('label'=>'Сотрудники', 'url'=>array('/employees/index'), 'visible'=>Yii::app()->user->checkAccess('ManagerEmployees')),
                                            array('label'=>'Должности', 'url'=>array('/positions/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPositions')),
                                            array('label'=>'Отделы', 'url'=>array('/departments/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDepartments')),
                                            array('label'=>'Подразделения', 'url'=>array('/sections/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSections')),
                                            array('label'=>'Праздничные, выходные, рабочие дни', 'url'=>array('/specialdays/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSpecialDays')),
                                            array('label'=>'Структура организации', 'url'=>array('/organizationstructure/index'), 'visible'=>Yii::app()->user->checkAccess('ViewOrganizationStructure')),
                                        )
                                    ),
                            array('label'=>'Объекты', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('UserObjects'), 'items'=>array(
                                array('label'=>'Список объектов', 'url'=>array('/Object/index'), 'visible'=>Yii::app()->user->checkAccess('UserObjects')),
                                array('label'=>'Подъезды и оборудование', 'url'=>array('/ObjectsAndEquips/view'), 'visible'=>false),
                                array('label'=>'Контроль контактов', 'url'=>array('/ControlContacts/index'), 'visible'=>Yii::app()->user->checkAccess('ViewControlContacts')),
                                array('label'=>'Перевод мастеров', 'url'=>array('/replaceMaster'), 'visible'=>Yii::app()->user->checkAccess('ViewReplaceMaster')),
                                array('label'=>'Поиск счетов', 'url'=>array('/contractss'), 'visible'=>Yii::app()->user->checkAccess('ViewContractsS')),
                            )),
                            array('label'=>'Справочники', 'visible'=>!Yii::app()->user->isGuest, 'url'=>array('/reference/index'),
                                'items' => array(
                                    array('label'=>'Объекты', 'url'=>'#', 'items'=>array(
                                        array('label'=>'Регионы', 'url'=>array('/regions/index'), 'visible'=>Yii::app()->user->checkAccess('ViewRegions')),
                                        array('label'=>'Районы', 'url'=>array('/areas/index'), 'visible' => false), // добавить права
                                        array('label'=>'Улицы', 'url'=>array('/streets/index'), 'visible'=>Yii::app()->user->checkAccess('ViewStreets')),
                                        array('label'=>'Участки', 'url'=>array('/territory/index'), 'visible'=>Yii::app()->user->checkAccess('ViewTerritory')),
                                        array('label'=>'Сложность системы', 'url'=>array('/systemComplexitys/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSystemComplexitys')),
                                        array('label'=>'Сосотояние системы', 'url'=>array('/systemStatements/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSystemStatements')),
                                        array('label'=>'Типы улиц', 'url'=>array('/streetTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewStreetTypes')),
                                        array('label'=>'Должности', 'url'=>array('/customers/index'), 'visible'=>Yii::app()->user->checkAccess('ViewCustomers')),
                                        array('label'=>'Организации', 'url'=>array('/propForms/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPropForms')),
                                        array('label'=>'Типы организаций', 'url'=>array('/FormsOfOwnership/index'), 'visible'=>Yii::app()->user->checkAccess('ViewFormsOfOwnership')),
                                        array('label'=>'Причина просрочки', 'url'=>array('/delayReasons/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDelayReasons')),
                                        array('label'=>'Причина перемещения', 'url'=>array('/transferReasons/index'), 'visible'=>Yii::app()->user->checkAccess('ViewTransferReasons')),
                                        array('label'=>'Тип системы', 'url'=>array('/systemTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSystemTypes')),
                                        array('label'=>'Удовлетворенность клиента', 'url'=>array('/loyaltyTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewLoyaltyTypes')),
                                        array('label'=>'Виды работ', 'url'=>array('/jobTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewJobTypes')),
                                        array('label'=>'Виды объектов', 'url'=>array('/objectTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewObjectTypes')),
                                        array('label'=>'Статус клиента', 'url'=>array('/complexityTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewComplexityTypes')),
                                        array('label'=>'Конкуренты', 'url'=>array('/competitors/index'), 'visible'=>Yii::app()->user->checkAccess('ViewCompetitors')),
                                        array('label'=>'Наличие систем', 'url'=>array('/systemAvailabilitys/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSystemAvailabilitys')),
                                        array('label'=>'Возражения клиентов', 'url'=>array('/negatives/index'), 'visible'=>Yii::app()->user->checkAccess('ViewNegatives')),
                                    ),
                                    ),
                                    array('label'=>'Склад', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                        array('label'=>'Подтверждение отмены накладной', 'url'=>array('/confirmCancels/index'), 'visible'=>Yii::app()->user->checkAccess('ViewConfirmCancels')),
                                        array('label'=>'Склад', 'url'=>array('/storages/index'), 'visible'=>Yii::app()->user->checkAccess('ViewStorages')),
                                        array('label'=>'Тип работ', 'url'=>array('/workTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewWorkTypes')),
                                        array('label'=>'Основания для получения', 'url'=>array('/receiptReasons/index'), 'visible'=>Yii::app()->user->checkAccess('ViewReceiptReasons')),
                                        array('label'=>'Адресная система', 'url'=>array('/addressSystems/index'), 'visible'=>Yii::app()->user->checkAccess('ViewAddressSystems')),
                                        array('label'=>'Поставщики/Производители', 'url'=>array('/suppliers/index'), 'visible'=>Yii::app()->user->checkAccess('ViewSuppliers')),
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
                                        array('label'=>'Юридические лица', 'url'=>array('/juridicals/index'), 'visible'=>Yii::app()->user->checkAccess('ViewJuridicals')),
                                        array('label'=>'Типы тарифов', 'url'=>array('/ServiceTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewServiceTypes')),
                                        array('label'=>'Типы документов', 'url'=>array('/DocTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDocTypes')),
                                        array('label'=>'Банки', 'url'=>array('/banks/index'), 'visible'=>Yii::app()->user->checkAccess('ViewBanks')),
                                        array('label'=>'Типы заявок', 'url'=>array('/demandTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDemandTypes')),
                                        array('label'=>'Приоритет заявок', 'url'=>array('/demandPriors/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDemandPriors')),
                                        array('label'=>'Причина смены тарифа', 'url'=>array('/priceChangeReasons/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPriceChangeReasons')),
                                        array('label'=>'Виды оплат', 'url'=>array('/paymentTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPaymentTypes')),
                                    ),
                                    ),
                                    array('label'=>'Оборудование', 'url'=>'#', 'visible'=>!Yii::app()->user->isGuest, 'items'=>array(
                                        array('label'=>'Категории ТМЦ', 'url'=>array('/categories/index'), 'visible'=>Yii::app()->user->checkAccess('ViewCategories')),
                                        array('label'=>'Группы ТМЦ', 'url'=>array('/equipGroups/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipGroups')),
                                        array('label'=>'Структурное дерево оборудования', 'url'=>array('/eqipGroups/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEqipGroups')),
                                        array('label'=>'EquipAnalog', 'url'=>array('/equipAnalog/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipAnalog')),
                                        array('label'=>'EquipCategory', 'url'=>array('/equipCategory/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipCategory')),
                                        array('label'=>'EquipDetails', 'url'=>array('/equipDetails/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipDetails')),
                                        array('label'=>'EquipRateDetails', 'url'=>array('/equipRateDetails/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipRateDetails')),
                                        array('label'=>'EquipRates', 'url'=>array('/equipRates/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipRates')),
                                        array('label'=>'Оборудование', 'url'=>array('/equips/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquips')),
                                        array('label'=>'EquipsHistory', 'url'=>array('/equipsHistory/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipsHistory')),
                                        array('label'=>'EquipsRate', 'url'=>array('/equipsRate/index'), 'visible'=>Yii::app()->user->checkAccess('View')),
                                        //array('label'=>'Подгруппы ТМЦ', 'url'=>array('/equipSubgroups/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipSubgroups')),
                                    ),
                                    ),
                                    array('label'=>'Заявки', 'url'=>'#', 'items'=>array(
                                        array('label'=>'Тип оборудования', 'url'=>array('/EquipTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipTypes')),
                                    ),
                                    ),


                                ),
                            ),

                            array('label'=>'Заявки', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ViewDemands'), 'items'=>array(
                                array('label'=>'Просмотр заявок', 'url'=>array('/demands&status[nofinish]=on')),
                                array('label'=>'Отчеты', 'url'=>'#', 'items'=>array(
                                    array('label'=>'Заявки (общий отчет)', 'url'=>array('/demands/repGeneral')),
                                )
                                )
                            )
                            ),
                            array('label'=>'Ремонт', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ViewRepairs'), 'items'=>array(
                                array('label'=>'Формы', 'url'=>'#', 'items'=>array(
                                    array('label'=>'Форма для менеджера по ремонту', 'url'=>array('/repair')),
                                    array('label'=>'Форма для инженера ПРЦ', 'url'=>array('/repair/RepaisForEngineer')),
                                    array('label'=>'Акты дефектации', 'url'=>array('/RepairActDefectations/Index')),
                                    array('label'=>'Сопроводительные накладные', 'url'=>array('/RepairSRM/Index')),
                                    array('label'=>'Гарантийные талоны', 'url'=>array('/RepairWarrantys/Index')),
                                    array('label'=>'Акт утилизации', 'url'=>array('/RepairActUtilizations/Index')),
                                    
                                    )
                                ),
                                array('label'=>'Справочники', 'url'=>'#', 'items'=>array(
                                    array('label'=>'Реестр оборудования', 'url'=>array('/repair')),
                                    )
                                ),
                                array('label'=>'Отчеты', 'url'=>'#', 'items'=>array(
                                    array('label'=>'Реестр оборудования', 'url'=>array('/repair')),
                                    )
                                )
                            )
                            ),
                            
                            array('label'=>'Склад', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('WHDocumentsView'), 'items'=>array(
                                array('label'=>'Реестр документов', 'url'=>array('/storage')),
                                array('label'=>'Заявки на мониторинг', 'url'=>array('/MonitoringDemands/index'), 'visible'=>Yii::app()->user->checkAccess('ViewMonitoringDemands')),
                                array('label'=>'Мониторинг цен', 'url'=>array('/priceMonitoring/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPriceMonitoring')),
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
                            array('label'=>'Дебиторка', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ViewRepDebtReasons'), 'items'=>array(
                                array('label'=>'Причина долга', 'url'=>array('/RepDebtReasons'), 'visible'=>Yii::app()->user->checkAccess('ViewRepDebtReasons')),
                            )
                            ),
                            array('label'=>'Графики', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ViewEvents'), 'items'=>array(
                                array('label'=>'Графики', 'url'=>array('/events')),
                            ),
                            ),
                            array('label' => 'Списание оборудования', 'visible'=>Yii::app()->user->checkAccess('ViewWhActs'), 'url' => '#', 'items' => array(
                                array('label' => 'Реестр актов', 'url' => array('/whacts/index')),
                            )),

                            array('label' => 'Задачи', 'visible'=>Yii::app()->user->checkAccess('ViewTasks'), 'url' => '#', 'items' => array(
                                array('label' => 'Список задач', 'url' => array('/tasks')),
                            )),
                            
                            array('label'=>'Авторизация', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Выход ('.$fullname.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                            array('label'=>'Администрирование', 'url'=>array('/admin'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
                            array('label'=>'Тестирование', 'url'=>array('test/index'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
                            array('label'=>'Отправка SMS', 'url'=>array('test/send'), 'visible'=>Yii::app()->user->checkAccess('Administrator')),
                            array('label'=>'Отчеты', 'url'=>'#', 'items' => array(
                                array('label'=>'Заявки', 'url'=>'#', 'items'=>array(
                                    array('label' => 'Отчет по заявкам Call-центра', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Отчет по заявкам Call-центра', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('Demand1Report')
                                        ),
                                    array('label' => 'Чужие и удаленные заявки СЦ', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Чужие и удаленные заявки СЦ', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('Demand2Report')
                                        ),
                                )),
                                array('label'=>'Склад', 'url'=>'#', 'items'=>array(
                                    array('label' => 'Выданное оборудование (детальный)',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Склад/Выданное оборудование (детальный)', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('WHDocuments1Report')
                                    ),
                                )),
                                array('label'=>'Кадры', 'url'=>'#', 'items'=>array(
                                    array('label' => 'Сотрудники',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Кадры/Сотрудники', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('Employee1Report')
                                    ),
                                )),
                                array('label'=>'Объекты', 'url'=>'#', 'items'=>array(
                                    array('label' => 'Объекты по мастерам', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Объекты по мастерам', 'Render' => 0)),
                                            'visible'=>true
                                        ),
                                    array('label' => 'Объекты по тарифам', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Объекты по тарифам', 'Render' => 0)),
                                            'visible'=>true
                                        ),
                                    array('label' => 'Объекты с тарифами и оборудованием', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Объекты по тарифам (Оборудование)', 'Render' => 0)),
                                            'visible'=>true
                                        ),
                                    array('label' => 'Ушедшие клиенты', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Ушедшие клиенты', 'Render' => 0)),
                                            'visible'=>true
                                        ),
                                    array('label' => 'Контактные лица', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Контактные лица', 'Render' => 0)),
                                            'visible'=>true
                                        ),
                                    array('label' => 'Повышение расценок', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Повышение расценок', 'Render' => 0)),
                                            'visible'=>true
                                        ),
                                )),
                            )),
                            array('label'=>'О программе', 'url'=>array('/site/about')),
                        ),
                    )); ?>

                </div><!-- mainmenu -->
            </div>

            <div id='page-content'>
                <?php
                if(isset($this->title) && isset($this->breadcrumbs)) {
                ?>
                <div style="margin:5px 0 10px 15px;border-top: 1px solid black; box-shadow: 0px 2px 4px rgba(0,0,0,0.5)">
                    <div class="page-header">
                        <h1><?= isset($this->title) ? $this->title : ""?></h1>
                    </div>

                    <?php if(isset($this->breadcrumbs)):?>
                    <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links'=>$this->breadcrumbs,
                    )); ?><!-- breadcrumbs -->
                     <?php endif?>

                    <div class="clearfix"></div>

                </div>

	            <?php } echo $content; ?>

        </div>
<!--	<div class="clear"></div>-->

	<?php 
            //print_r(PDO::getAvailableDrivers());
            //echo phpinfo();
        ?>
    </div>
<div class="clearfix"></div>
</div><!-- page -->

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


</body>
</html>


<script type="text/javascript">
    (function ($) {

            //$('#page .nav').css({'min-height':$('body').outerHeight()+'px'})
            $('body').on('click','.toggler-navbar', function(){
                //console.log("1");
                $nav = $('#page .nav')
                if ($nav.is(':hidden')) {
                    //console.log("2");
                    $nav.show(80);
                    $('#page #page-content').addClass('nav-open').css({'width':'85%'})
                    $('#sidebar>.portlet').addClass('nav-open')
                    $(this).addClass('active')
                }
                else {
                    //console.log("3");
                    $nav.hide(80);
                    $('#page #page-content').removeClass('nav-open').css({'width':'97%'})
                    $('#sidebar>.portlet').removeClass('nav-open')
                    $('.breadcrumbs').css({'left':'13%'})
                    $(this).removeClass('active')
                }
            })
        
    })(jQuery)

</script>
