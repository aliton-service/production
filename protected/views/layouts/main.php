<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="en">
    <!-- Подключаем таблицу стилей -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/header.css">
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&amp;subset=cyrillic" rel="stylesheet">
    <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <?php Yii::app()->clientScript->registerPackage('jquery_js'); ?>
    <?php Yii::app()->clientScript->registerPackage('widgets'); ?>
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
        <div class="page-header__logout">
            <a href="/index.php?r=site/logout"></a>
        </div>
        
    </header>
    <div id='main-content'>
        
        <div class="main-content__header">

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
        </div>
        
        <div class="page-content__wrapper">
            

            <div class="main-menu">
                    <?php
                    $this->widget('zii.widgets.CMenu',array(
                        'activeCssClass'=>'active',
                        'activateParents'=>true,
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
                                        array('label'=>'Типы оборудования', 'url'=>array('/EquipTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewEquipTypes')),
                                        array('label'=>'Неисправность', 'url'=>array('/Malfunctions/index'), 'visible'=>Yii::app()->user->checkAccess('ViewMalfunctions')),
                                        array('label'=>'Типы заявок', 'url'=>array('/DemandTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDemandTypes')),
                                        array('label'=>'Приоритеты заявок', 'url'=>array('/DemandsExecTime/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDemandsExecTime')),
                                    ),
                                    ),
                                    array('label'=>'Заявки на доставку', 'url'=>'#', 'items'=>array(
                                        array('label'=>'Виды заявок на доставку', 'url'=>array('/DeliveryTypes/index'), 'visible'=>Yii::app()->user->checkAccess('ViewDeliveryTypes')),
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
                                    array('label'=>'Реестр оборудования', 'url'=>array('/Repair')),
                                )
                            ),

                            array('label'=>'Склад', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('WHDocumentsView'), 'items'=>array(
                                array('label'=>'Остатки', 'url'=>array('/Inventories/index')),
                                array('label'=>'Реестр документов', 'url'=>array('/WHDocuments/index')),
                                array('label'=>'Наценки', 'url'=>array('/PriceMarkups/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPriceMarkups')),
                                array('label'=>'Заявки на мониторинг', 'url'=>array('/MonitoringDemands/index'), 'visible'=>Yii::app()->user->checkAccess('ViewMonitoringDemands')),
                                array('label'=>'Мониторинг цен', 'url'=>array('/priceMonitoring/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPriceMonitoring')),
                                array('label'=>'Прайс-лист', 'url'=>array('/PriceList/index'), 'visible'=>Yii::app()->user->checkAccess('ViewPriceList')),
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
                            array('label'=>'Графики', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ViewEvents'), 'items'=>array(
                                array('label'=>'Графики', 'url'=>array('/Events/index')),
                            ),
                            ),
                            array('label' => 'Списание оборудования', 'visible'=>Yii::app()->user->checkAccess('ViewWhActs'), 'url' => '#', 'items' => array(
                                array('label' => 'Реестр актов', 'url' => array('/whacts/index')),
                            )),

                            array('label' => 'Задачи', 'visible'=>Yii::app()->user->checkAccess('ViewTasks'), 'url' => '#', 'items' => array(
                                array('label' => 'Список задач', 'url' => array('/tasks')),
                            )),

                            array('label'=>'Авторизация', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Отчеты', 'url'=>'#', 'items' => array(
                                array('label'=>'Заявки', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('DemandsReportAll'), 'items'=>array(
                                    array('label' => 'Отчет по заявкам Call-центра', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Отчет по заявкам Call-центра', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport1')
                                        ),
                                    array('label' => 'Чужие и удаленные заявки СЦ', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Чужие и удаленные заявки СЦ', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport2')
                                        ),
                                    array('label' => 'Заявки по объектам', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Заявки по объектам', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport3')
                                        ),
                                    array('label' => 'Заявки по мастерам', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Заявки по мастерам', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport4')
                                        ),
                                    array('label' => 'Заявки (общий отчет)', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Заявки (общий отчет)', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport5')
                                        ),
                                    array('label' => 'Заявки (общий отчет) без хода работ', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Заявки (общий отчет) без хода работ', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport6')
                                        ),
                                    array('label' => 'Нарушение сроков выполнения', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Нарушение сроков выполнения', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport7')
                                        ),
                                    array('label' => 'Нарушение сроков выполнения (детальный)', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Нарушение сроков выполнения (детальный)', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport8')
                                        ),
                                    array('label' => 'Заявки, переданные не вовремя', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Заявки переданные не вовремя', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport9')
                                        ),
                                    array('label' => 'Отчет по модернизациям', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Отчет по модернизациям', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport10')
                                        ),
                                    array('label' => 'Универсальный отчет', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Универсальный отчет', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport11')
                                        ),
                                    array('label' => 'Заявки для передачи мастеру', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки/Заявки для передачи мастеру', 'Render' => 1)),
                                            'visible'=>Yii::app()->user->checkAccess('DemandsReport12')
                                        ),
                                )),
                                array('label'=>'Дебиторка', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('DebtorsReportAll'), 'items'=>array(
                                    array('label' => 'Дебиторка',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Дебиторка/Дебиторка', 'Render' => 1)),
                                        'visible'=>Yii::app()->user->checkAccess('Debt1Report')
                                    ),
                                    array('label' => 'Причина долга',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Дебиторка/Причина долга', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('Debt2Report')
                                    ),
                                )),
                                array('label'=>'Заявки на доставку', 'url'=>'#',  'visible'=>Yii::app()->user->checkAccess('DeliveryDemandsReportAll'), 'items'=>array(
                                    array('label' => 'Заявки на доставку',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки на доставку/Заявки на доставку', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('DeliveryDemandsReport')
                                    ),
                                    array('label' => 'Нарушение сроков выполнения',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Заявки на доставку/Нарушение сроков выполнения', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('DeliveryDemandsBrokenDeadlinesReport')
                                    ),
                                )),
                                array('label'=>'Склад', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('WHDocumentsReportAll'), 'items'=>array(
                                    array('label' => 'Выданное оборудование (детальный)',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Склад/Выданное оборудование (детальный)', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('WHDocuments1Report')
                                    ),
                                    array('label' => 'Оборудование сичлящееся за мастерами',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Склад/Оборудование числящееся за мастерами', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('WHDocuments1Report')
                                    ),
                                )),
                                array('label'=>'Кадры', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('EmployeesReportAll'), 'items'=>array(
                                    array('label' => 'Сотрудники',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Кадры/Сотрудники', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('Employee1Report')
                                    ),
                                    array('label' => 'Сотрудники (детальный)',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Кадры/Сотрудники (детальный)', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('Employee2Report')
                                    ),
                                    array('label' => 'Дни рождения',
                                        'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Кадры/Дни рождения', 'Render' => 0)),
                                        'visible'=>Yii::app()->user->checkAccess('Employee3Report')
                                    ),
                                )),
                                array('label'=>'Объекты', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ObjectReportAll'), 'items'=>array(
                                    array('label' => 'Объекты по мастерам', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Объекты по мастерам', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectReport1')
                                        ),
                                    array('label' => 'Объекты по тарифам', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Объекты по тарифам', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectReport2')
                                        ),
                                    array('label' => 'Объекты с тарифами и оборудованием', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Объекты по тарифам (Оборудование)', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectReport3')
                                        ),
                                    array('label' => 'Ушедшие клиенты', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Ушедшие клиенты', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectReport4')
                                        ),
                                    array('label' => 'Контактные лица', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Контактные лица', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectReport5')
                                        ),
                                    array('label' => 'Повышение расценок', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Повышение расценок', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectReport6')
                                        ),
                                    array('label' => 'Установленные системы на объектах', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Установленные системы', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectsSystemsReport')
                                        ),
                                    array('label' => 'Объекты по организациям', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Объекты по организациям', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('FormObjects')
                                        ),

                                )),
                                array('label'=>'Договора', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ContractsReportAll'), 'items'=>array(
                                    array('label' => 'Список договоров обслуживания', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Договора/Список договоров обслуживания', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('Contract1Report')
                                        ),
                                )),
                                array('label'=>'Оборудование', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('EquipsReportAll'), 'items'=>array(
                                    array('label' => 'Оборудование на объектах', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Оборудование на объектах', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectEquipsReport')
                                        ),
                                    array('label' => 'Оборудование на объектах (по оборудованию)', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Объекты/Оборудование на объектах (по оборудованию)', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('ObjectEquipsReport2')
                                        ),
                                    array('label' => 'Оборудование с аналогами', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Оборудование/Оборудование с аналогами', 'Render' => 1)),
                                            'visible'=>Yii::app()->user->checkAccess('Equips1')
                                        ),
                                )),
                                array('label'=>'Контакты', 'url'=>'#', 'visible'=>Yii::app()->user->checkAccess('ContactsReportAll'), 'items'=>array(
                                    array('label' => 'Отчет по контактам', 
                                            'url' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Контакты/Контакты', 'Render' => 0)),
                                            'visible'=>Yii::app()->user->checkAccess('Contacts2')
                                        ),
                                )),
                            )),
                            array('label'=>'О программе', 'url'=>array('/site/about')),
                        )
                    ));?>
                </div>

            
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
