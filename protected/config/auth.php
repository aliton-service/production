<?php
return array_merge(
    
    include(dirname(__FILE__).'/security/ObjectsGroupSecurity.php'),
    include(dirname(__FILE__).'/security/regionsSecurity.php'),
    include(dirname(__FILE__).'/security/territorySecurity.php'),
    include(dirname(__FILE__).'/security/systemComplexitysSecurity.php'),
    include(dirname(__FILE__).'/security/systemStatementsSecurity.php'),
    include(dirname(__FILE__).'/security/priceMonitoringSecurity.php'),
    include(dirname(__FILE__).'/security/customersSecurity.php'),
    include(dirname(__FILE__).'/security/banksSecurity.php'),
    include(dirname(__FILE__).'/security/areasSecurity.php'),
    include(dirname(__FILE__).'/security/juridicalsSecurity.php'),
    include(dirname(__FILE__).'/security/streetsSecurity.php'),
    include(dirname(__FILE__).'/security/streetTypesSecurity.php'),
    include(dirname(__FILE__).'/security/serviceTypesSecurity.php'),
    include(dirname(__FILE__).'/security/docTypesSecurity.php'),
    include(dirname(__FILE__).'/security/DemandTypesSecurity.php'),
    include(dirname(__FILE__).'/security/DemandPriorsSecurity.php'),
    include(dirname(__FILE__).'/security/DelayReasonsSecurity.php'),
    include(dirname(__FILE__).'/security/TransferReasonsSecurity.php'),
    include(dirname(__FILE__).'/security/SystemTypesSecurity.php'),
    include(dirname(__FILE__).'/security/LoyaltyTypesSecurity.php'),
    include(dirname(__FILE__).'/security/PaymentTypesSecurity.php'),
    include(dirname(__FILE__).'/security/PriceChangeReasonsSecurity.php'),
    include(dirname(__FILE__).'/security/JobTypesSecurity.php'),
    include(dirname(__FILE__).'/security/ConfirmCancelsSecurity.php'),
    include(dirname(__FILE__).'/security/StoragesSecurity.php'),
    include(dirname(__FILE__).'/security/WorkTypesSecurity.php'),
    include(dirname(__FILE__).'/security/ReceiptReasonsSecurity.php'),
    include(dirname(__FILE__).'/security/DebtReasonsSecurity.php'),
    include(dirname(__FILE__).'/security/ResultsSecurity.php'),
    include(dirname(__FILE__).'/security/ContactKindsSecurity.php'),
    include(dirname(__FILE__).'/security/ContactTypesSecurity.php'),
    include(dirname(__FILE__).'/security/AddressSystemsSecurity.php'),
    include(dirname(__FILE__).'/security/CompetitorsSecurity.php'),
    include(dirname(__FILE__).'/security/ComplexityTypesSecurit.php'),
    include(dirname(__FILE__).'/security/EquipGroupsSecurity.php'),
    include(dirname(__FILE__).'/security/NegativesSecurity.php'),
    include(dirname(__FILE__).'/security/ObjectTypesSecurity.php'),
    include(dirname(__FILE__).'/security/SystemAvailabilitysSecurity.php'),
    include(dirname(__FILE__).'/security/FormsOfOwnershipSecurity.php'),
    include(dirname(__FILE__).'/security/PropFormsSecurity.php'),
    include(dirname(__FILE__).'/security/EqipGroupsSecurity.php'),
    include(dirname(__FILE__).'/security/EquipAnalogSecurity.php'),
    include(dirname(__FILE__).'/security/EquipCategorySecurity.php'),
    include(dirname(__FILE__).'/security/EquipDetailsSecurity.php'),
    include(dirname(__FILE__).'/security/EquipRateDetailsSecurity.php'),
    include(dirname(__FILE__).'/security/EquipRatesSecurity.php'),
    
    include(dirname(__FILE__).'/security/EquipsSecurity.php'),
    include(dirname(__FILE__).'/security/AddressedStorageSecurity.php'),
        
        
    include(dirname(__FILE__).'/security/EquipsHistorySecurity.php'),
    include(dirname(__FILE__).'/security/EquipsRateSecurity.php'),
    include(dirname(__FILE__).'/security/EquipSubgroupsSecurity.php'),
    include(dirname(__FILE__).'/security/EquipTypesSecurity.php'),
    include(dirname(__FILE__).'/security/MalfunctionsSecurity.php'),
    include(dirname(__FILE__).'/security/DeliveryTypesSecurity.php'),
    // Приоритеты заявок
    include(dirname(__FILE__).'/security/DemandsExecTimeSecurity.php'),
        
    include(dirname(__FILE__).'/security/referenceSecurity.php'),
    include(dirname(__FILE__).'/security/ContactsSecurity.php'),
    include(dirname(__FILE__).'/security/EquipForMDDetailsSecurity.php'),
    
    /* Раздел Ремонт */ 
    include(dirname(__FILE__).'/security/RepairsSecurity.php'),
    include(dirname(__FILE__).'/security/RepairActDefectationsSecurity.php'),
        
    include(dirname(__FILE__).'/security/ObjectsSecurity.php'),
    include(dirname(__FILE__).'/security/WHDocumentsSecurity.php'),
    include(dirname(__FILE__).'/security/DocmAchsDetailsSecurity.php'),
    /* Заявки на доставку */
    include(dirname(__FILE__).'/security/DeliveryDemandsSecurity.php'),
    include(dirname(__FILE__).'/security/DemandsSecurity.php'),
    include(dirname(__FILE__).'/security/ExecuteReports.php'),
    /* Контактные лица */
    include(dirname(__FILE__).'/security/ContactInfoSecurity.php'),    
    /* Системы */
    include(dirname(__FILE__).'/security/ObjectsGroupSystemsSecurity.php'),
    /* Акты списания */
    include(dirname(__FILE__).'/security/WhActsSecurity.php'),
    /* Оборудование в актах списания */
    include(dirname(__FILE__).'/security/ActEquipsSecurity.php'),
    /* Поиск требований */
    include(dirname(__FILE__).'/security/WHDocumentsFindSecurity.php'),
    /* Мониторинг цен */
    include(dirname(__FILE__).'/security/PriceMonitoring.php'),
    /* Категории ТМЦ */
    include(dirname(__FILE__).'/security/categoriesSecurity.php'),
    /* Поставщики\Производители*/
    include(dirname(__FILE__).'/security/SuppliersSecurity.php'),    

    /* Кадры - должности */
    include(dirname(__FILE__).'/security/PositionsSecurity.php'),
    /* Кадры - отделы */
    include(dirname(__FILE__).'/security/DepartmentsSecurity.php'),
    /* Кадры - подразделения */
    include(dirname(__FILE__).'/security/SectionsSecurity.php'),
    /* Кадры - дети */
    include(dirname(__FILE__).'/security/ChildrensSecurity.php'),
    /* Кадры - праздники */
    include(dirname(__FILE__).'/security/SpecialDaysSecurity.php'),

    /* Кадры -> сотрудники */
    include(dirname(__FILE__).'/security/EmployeesSecurity.php'),
    /* Кадры -> инструктаж */
    include(dirname(__FILE__).'/security/InstructingsSecurity.php'),
        
    /* Контроль контактов */
    include(dirname(__FILE__).'/security/ControlContactsSecurity.php'),

    /* Поиск счетов */
    include(dirname(__FILE__).'/security/ContractsSSecurity.php'),
    include(dirname(__FILE__).'/security/ContractsDetails_vSecurity.php'),
    include(dirname(__FILE__).'/security/DocumentsSecurity.php'),

    /* Перевод мастеров */
    include(dirname(__FILE__).'/security/ReplaceMasterSecurity.php  '),

    /* Причины долга */
    include(dirname(__FILE__).'/security/RepDebtReasonsSecurity.php  '),

    /* Причины долга (детально) */
    include(dirname(__FILE__).'/security/RepDebtReasonDetailsSecurity.php  '),

    /* Графики */
    include(dirname(__FILE__).'/security/EventsSecurity.php  '),

    /* Карточка события */
    include(dirname(__FILE__).'/security/EventOffersSecurity.php  '),

    /* Задачи */
    include(dirname(__FILE__).'/security/TasksSecurity.php  '),

    /* Задачи (ход работ) */
    include(dirname(__FILE__).'/security/TaskNotesSecurity.php  '),

    /* Задачи (соисполнители) */
    include(dirname(__FILE__).'/security/TaskExecutorsSecurity.php  '),

    /* Ремонт (материалы) */
    include(dirname(__FILE__).'/security/RepairMaterialsSecurity.php  '),
        
    include(dirname(__FILE__).'/security/RepairDetailsSecurity.php  '),
        
    /* Ремонт (сопроводительная накладная) */
    include(dirname(__FILE__).'/security/RepairSRMSecurity.php'),
        
    /* Ремонт (гарантийные талоны) */
    include(dirname(__FILE__).'/security/RepairWarrantysSecurity.php'),
        
    /* Ремонт (акт утилизации) */
    include(dirname(__FILE__).'/security/RepairActUtilizationsSecurity.php'),
        
    /* Ремонт (СРМ и ПРЦ) */
    include(dirname(__FILE__).'/security/RepairDocsSecurity.php'),

    /* Ремонт (ход работы) */
    include(dirname(__FILE__).'/security/RepairCommentsSecurity.php'),
        
    /* Отчеты */
    include(dirname(__FILE__).'/security/ReportsSecurity.php'),
        
    /* Структура организации*/
    include(dirname(__FILE__).'/security/OrganizationStructureSecurity.php'),
        
    /* Комментарии */
    include(dirname(__FILE__).'/security/DeliveryCommentsSecurity.php'),
        
    /* Привязка мастера к договору */
    include(dirname(__FILE__).'/security/ContractMasterHistorySecurity.php'),
        
    /* Привязка оборудования к договору */
    include(dirname(__FILE__).'/security/ContractEquipsSecurity.php'),
        
    /* Типы обслуживаемых подсистем для договора */
    include(dirname(__FILE__).'/security/ContractSystemsSecurity.php'),
        
    /* История изменения расценок для договора */
    include(dirname(__FILE__).'/security/ContractPriceHistorySecurity.php'),
        
    /* История платежей для договора */
    include(dirname(__FILE__).'/security/PaymentHistorySecurity.php'),
        
    /* Заявки на мониторинг */
    include(dirname(__FILE__).'/security/MonitoringDemandsSecurity.php'),
    include(dirname(__FILE__).'/security/MonitoringDemandDetailsSecurity.php'),
        
    /* Реестр остатков на складе */
    include(dirname(__FILE__).'/security/InventoriesSecurity.php'),
        
    /* Остатки на складе */
    include(dirname(__FILE__).'/security/InventoryDetailsSecurity.php'),
        
    /* Наценки */
    include(dirname(__FILE__).'/security/PriceMarkupsSecurity.php'),
        
    /* Наценки Details */
    include(dirname(__FILE__).'/security/PriceMarkupDetailsSecurity.php'),
        
    /* Прайс-лист */
    include(dirname(__FILE__).'/security/PriceListSecurity.php'),
    include(dirname(__FILE__).'/security/PriceListDetailsSecurity.php'),
    
    /* Серийники */
    include(dirname(__FILE__).'/security/SerialNumbersSecurity.php'),
    /* Обсл. орг. у систем */
    include(dirname(__FILE__).'/security/SystemCompetitorsSecurity.php'),
    /* Сложность системы */
    include(dirname(__FILE__).'/security/ObjectsGroupSystemComplexitysSecurity.php'),
    /* Подъезды и оборудование */
    include(dirname(__FILE__).'/security/ObjectEquipsSecurity.php'),
        
    /* Коммерческие предложения и сметы */
    include(dirname(__FILE__).'/security/ObjectsGroupCostCalculationsSecurity.php'),
    include(dirname(__FILE__).'/security/CostCalculationsSecurity.php'),
    include(dirname(__FILE__).'/security/CostCalcEquipsSecurity.php'),
    include(dirname(__FILE__).'/security/CostCalcWorksSecurity.php'),
    include(dirname(__FILE__).'/security/CostCalcSalarysSecurity.php'),
    include(dirname(__FILE__).'/security/CostCalcDocumentsSecurity.php'),
        
    /* Бухгалтерский акт */
    include(dirname(__FILE__).'/security/WHBuhActsSecurity.php'),
        
    /* Добавление заявки к приложению */
    include(dirname(__FILE__).'/security/OfferDemandsSecurity.php'),
        
    /* Контроль возвратов */
    include(dirname(__FILE__).'/security/ControlWHDocumentsSecurity.php'),
        
    /* Цены за площадь*/
    include(dirname(__FILE__).'/security/AreaPricesSecurity.php'),
    /* Цены за площадь*/
    include(dirname(__FILE__).'/security/AreaObjectPricesSecurity.php'),
        
    /* Реестр клиентов */
    include(dirname(__FILE__).'/security/SalesDepClientsSecurity.php'),
        
    array(    
        'guest' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Guest',
            'bizRule' => null,
            'data' => null
        ),
        
        'Storekeeper' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Кладовщик',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ManagerWhActs',
                'AdminActEquips',
                'FindTreb',
                'FindWHDoc1',
            ),
        ),
        
        'Clerk' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Делопроизводитель',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'UserObjects',
                'UserObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'UserObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'UserDeliveryDemands',
                'MSWHDocuments',
                'AdminSerialNumbers',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'LogDeliveryDemands',
                'WhActsView',
                'WHDocumentsReportAll',
                'WHDocuments1Report',
                'WHActsAll',
                'WHActs3Report',
                'AdminEmployees',
                'AdminOrganizationStructure',
                
                'EmployeesReportAll',
                'Employee1Report',
                'Employee2Report',
                'Employee3Report',
            ),
        ),
        
        'SeniorDispatcher' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Старший диспетчер',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'UserObjects',
                'ManagerObjectsGroup',
                'SeniorDemands',
                'AdminExecuteReports',
                'ManagerContactInfo',
                'ManagerObjectsGroupSystems',
                'UserDeliveryDemands',
                'ManagerContacts',
                'UserContractsS',
                'ManagerEvents',
                'AdminEventOffers',
                'AdminOfferDemands',
                'AllLoadObjects',
            ),
        ),
        
        'AdministartorDispatchers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Администратор диспетчерской службы',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'UserObjects',
                'ManagerObjectsGroup',
                'SeniorDemands',
                'AdminExecuteReports',
                'ManagerContactInfo',
                'ManagerObjectsGroupSystems',
                'UserDeliveryDemands',
                'ChangeType',
                'ManagerContacts',
                'UserContractsS',
                'AllLoadObjects',
                /* Отчеты*/
                'Demand1Report',
            ),
        ),
        
        'Dispatcher' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Диспетчер',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'UserObjects',
                'ManagerObjectsGroup',
                'ManagerDemands',
                'AdminExecuteReports',
                'ManagerContactInfo',
                'ManagerObjectsGroupSystems',
                'UserDeliveryDemands',
                'ManagerContacts',
                'UserContractsS',
                'AllLoadObjects',
            ),
        ),

        'SeniorRSO' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель РСО',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'Dispatcher',
                'AdminEvents',
                'AdminEventOffers',
                'AdministartorDispatchers',
                'AdminSystemComplexitys',
                'AdminSystemStatements',
            ),
        ),
        
        'Administrator' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Administrator',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                //'SeniorDispatcher',
                'AdminDemands',
                'Storekeeper',
                'AdminObjects',
                'AdminObjectsGroup',
                'AdminWhActs',
                'AdminPriceMonitoring',
                'AdminWHDocuments',
                'AdminBanks',
                'AdminAddressSystems',
                'AdminEquips',
                'AdminAddressedStorage',
                'AdminEqipGroups',
                'AdminCategories',
                'AdminEquipGroups',
                'AdminEquipSubgroups',
                'AdminStreets',
                'AdminAddressSystems',
                'AdminPropForms',
                'AdminSuppliers',
                'AdminServiceTypes',
                'AdminPositions',
                'AdminSpecialDays',
                'AdminDepartments',
                'AdminSections',
                'AdminChildrens',
                'AdminEmployees',
                'AdminInstructings',
                'AdminControlContacts',
                'AdminContractsS',
                'AdminReplaceMaster',
                'AdminRepairs',
                'AdminExecuteReports',
                'AdminRepDebtReasons',
                'AdminRepDebtReasonDetails',
                'AdminEvents',
                'AdminEventOffers',
                'AdminEquipDetails',
                'AdminTasks',
                'AdminTaskNotes',
                'AdminTaskExecutors',
                'AdminRepairMaterials',
                'AdminRepairComments',
                'AdminRepairActDefectations',
                'AdminRepairSRM',
                'AdminRepairWarrantys',
                'AdminRepairActUtilizations',
                'AdminRegions',
                'AdminTerritory',
                'AdminSystemComplexitys',
                'AdminSystemStatements',
                'AdminPriceMonitoring',
                'AdminOrganizationStructure',
                'AdminObjectsGroupSystems',
                'AdminContacts',
                'AdminDeliveryDemands',
                'AdminDocuments',
                'AdminContractsDetails_v',
                'AdminDeliveryComments',
                'AdminContractMasterHistory',
                'AdminContractEquips',
                'AdminContractSystems',
                'AdminContractPriceHistory',
                'AdminPaymentHistory',
                'AdminMonitoringDemands',
                'AdminMonitoringDemandDetails',
                'AdminEquipForMDDetails',
                'AdminEquipTypes',
                'AdminMalfunctions',
                'AdminDemandTypes',
                'AdminWHDocuments',
                'AdminDeliveryTypes',
                'AdminInventories',
                'AdminInventoryDetails',
                'AdminPriceMarkups',
                'AdminPriceMarkupDetails',
                'AdminDocmAchsDetails',
                'AdminPriceList',
                'AdminPriceListDetails',
                'AdminSerialNumbers',
                'AdminObjectsGroupCostCalculations',
                'AdminCostCalculations',
                'AdminCostCalcEquips',
                'AdminCostCalcWorks',
                'AdminCostCalcSalarys',
                'AdminCostCalcDocuments',
                'AdminWHBuhActs',
                'AdminRepairDocs',
                'AdminObjectsGroupSystemComplexitys',
                'AdminOfferDemands',
                'AdminControlWHDocuments',
                'HeadLogistics',
                'AdminAreaPrices',
                'AdminAreaObjectPrices',
                /* Отчеты */
                'Demand1Report',
                'Demand2Report',
                
                'WHActsAll',
                'WHActs1Report',
                'WHActs2Report',
                'WHActs3Report',
                'WHActs4Report',
                
                'Employee1Report',
                'Employee2Report',
                'Employee3Report',
                'ContactsReport',
                'ObjectsMasterReport',
                'ObjectServiceTypeReport',
                'ObjectServiceTypeEquipsReport',
                'PricesIncreaseReport',
                'DepartedCustomersReport',
                'AdminDemandsExecTime',
                'DemandsObjectsReport',
                'DemandsMastersReport',
                'DemandsListDetailsReport',
                'DemandsListReport',
                'DemandsListBrokenDeadlinesReport',
                'DemandsListBrokenDeadlinesDetailsReport',
                'Contract1Report',
                'ObjectsSystemsReport',
                'DemandsBrokenDeadlinesReport',
                'DemandsBrokenDeadlinesDetailsReport',
                'DemandsSubmittedTooLateReport',
                'DemandsForUpgradesReport',
                'DemandsUniversalReport',
                'ObjectEquipsReport',
                'ObjectEquipsReport2',
                'Equips1',
                'DemandsDateMaster',
                'FormObjects',
                'Contacts2',
                'AdminRepairDetails',
                'AdminSystemCompetitors',
                
                'ObjectReportAll',
                'ObjectReport1',
                'ObjectReport2',
                'ObjectReport3',
                'ObjectReport4',
                'ObjectReport5',
                
                'DeliveryDemandsReportAll',
                'DeliveryDemandsReport',
                'DeliveryDemandsBrokenDeadlinesReport',
                
                'WHDocumentsReportAll',
                'WHDocuments1Report',
                'WHDocuments2Report',
                'WHDocuments3Report',
                'WHDocuments4Report',
                'WHDocuments5Report',
                'WHDocuments6Report',
                'WHDocuments7Report',
                'WHDocuments8Report',
                'WHDocuments9Report',
                'WHDocuments10Report',
                'WHDocuments11Report',
                
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
                
                'DebtorsReportAll',
                'Debt1Report',
                'Debt2Report',
                ),
        ),
        
        'PersonalManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Administrator',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'employees/index',
            'children' => array(
                'AdminPositions',
                'AdminDepartments',
                'AdminSections',
                'AdminChildrens',
                'AdminEmployees',
                'AdminInstructings',
                'AdminOrganizationStructure',
                
                'Employee1Report',
                ),
        ),
        
        /* Руководитель СЦ*/
        'HeadServiceCentr' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель СЦ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'UserObjects',
                'UserObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'UserObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'UserDeliveryDemands',
                'MSWHDocuments',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
            ),
        ),
        
        /* МС */
        'StaffManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель СЦ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ManagerObjects','UserObjectsGroup',
                'UpdateObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'UserEquips',
                'UserObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'ManagerContractMasterHistory',
                'ManagerContractsDetails_v',
                'AdminContractEquips',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'ManagerRepairComments',
                'UserDeliveryDemands',
                'ManagerDeliveryComments',
                'MSWHDocuments',
                'AdminSerialNumbers',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemandDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'LogDeliveryDemands',
                'WhActsView',
                'ManagerWHBuhActs',
                'FindTreb',
                'FindWHDoc1',
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
                
                'EquipsReportAll',
                'ObjectEquipsReport',
                'ObjectEquipsReport2'
            ),
        ),
        
        'StaffManagerSouth' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель СЦ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'ManagerWHDocuments',
                'FindTreb',
                'FindWHDoc1',
                'ObjectReportAll',
                'ObjectReport1',
                'ObjectReport2',
                'ObjectReport3',
                'ObjectReport4',
                'ObjectReport5',
            ),
        ),
        
        
        
        /* ПМ */
        'AccountManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель СЦ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ManagerObjects',
                'ManagerObjectsGroup',
                'ManagerOfficeObjectsGroup',
                'ManagerContactInfo',
                'ManagerObjectsGroupSystems',
                'DeleteDocmAchsDetails',
                'ManagerSystemCompetitors',
                'ManagerObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'ManagerContractMasterHistory',
                'ManagerContractsDetails_v',
                'AdminContractEquips',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'ManagerRepairComments',
                'UserDeliveryDemands',
                'ManagerDeliveryComments',
                'MSWHDocuments',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'AdminEvents',
                'ManagerEventOffers',
                'ManagerOfferDemands',
                'WhActsView',
                'ManagerWHBuhActs',
                'ManagerPropForms',
                'ManagerBanks',
                'ManagerObjectsGroupSystems',
                'ManagerSystemCompetitors',
                
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
            ),
        ),
        
        /* Офис менеджер */
        'OfficeManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Офис менеджер',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ManagerObjects',
                'ManagerObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'ManagerObjectEquips',
                'ManagerContractsS',
                'ManagerContractMasterHistory',
                'ManagerContractsDetails_v',
                'ManagerDocuments',
                'ManagerContacts',
                'AdminContractEquips',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'ManagerRepairComments',
                'ManagerDeliveryComments',
                'UserDeliveryDemands',
                'MSWHDocuments',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'WhActsView',
                'ManagerControlContacts',
                'ManagerWHBuhActs',
                'UserPropForms',
                'ManagerObjectsGroupSystems',
                'ManagerSystemCompetitors',
                
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
                'DebtorsReportAll',
                'Debt1Report',
                'Debt2Report',
            ),
        ),
        
        /* Офис менеджер - ЮГ */
        'OfficeManagerSouth' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель СЦ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ManagerObjects',
                'ManagerObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'ManagerObjectEquips',
                'ManagerContractsS',
                'ManagerContractMasterHistory',
                'ManagerContractsDetails_v',
                'ManagerDocuments',
                'ManagerContacts',
                'AdminContractEquips',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'ManagerRepairComments',
                'AdminDeliveryDemands',
                'ManagerDeliveryComments',
                'MSWHDocuments',
                'AdminSerialNumbers',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'WhActsView',
                'ManagerControlContacts',
                'ManagerWHBuhActs',
                'ManagerInventories',
                'UserInventoryDetails',
                'ManagerEquips',
                'UserPropForms',
                'ManagerObjectsGroupSystems',
                'ManagerSystemCompetitors',
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
                'DebtorsReportAll',
                'Debt1Report',
                'Debt2Report',
                
                'ObjectReportAll',
                'ObjectReport1',
                'ObjectReport2',
                'ObjectReport3',
                'ObjectReport4',
                'ObjectReport5',
                'ObjectReport6',
                
            ),
        ),
        
        /* Ведущий инженер */
        'LeadEngineer' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель СЦ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'UserObjects',
                'UserObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'UserObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'UserDeliveryDemands',
                'MSWHDocuments',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'ManagerWHBuhActs',
                'ManagerEventOffers',
                'ManagerOfferDemands',
                
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
                
                'ObjectReportAll',
                'ObjectReport1',
                'ObjectReport2',
                'ObjectReport3',
                'ObjectReport4',
                'ObjectReport5',
                
            ),
        ),
        
        /* Офис менеджер ОПР*/
        'OfficeManagerSalesDepartment' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Офис-менеджер отдела продаж',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ManagerObjects',
                'ManagerOfficeObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'ManagerObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'ManagerEquips',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'UserDeliveryDemands',
                'MSWHDocuments',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'WhActsView',
                'ManagerControlContacts',
                'ManagerPropForms',
                'ManagerBanks',
                'ManagerStreets',
                'ManagerRegions',
                'ManagerObjects',
                'ManagerWHBuhActs',
                'UserPropForms',
                /**/
                'ManagerSalesDepClients',
                
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
                'DebtorsReportAll',
                'Debt1Report',
                'Debt2Report',
            ),
        ),
        
        /* Менеджер по прождажам */
        'SalesManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Менеджер по прождажам',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ManagerObjects',
                'ManagerOfficeObjectsGroup',
                'UserObjectsGroup',
                'ManagerContactInfo',
                'ManagerObjectsGroupSystems',
                'UserObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'ManagerObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'UserDeliveryDemands',
                'MSWHDocuments',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'LogDeliveryDemands',
                'WhActsView',
                'ManagerWHBuhActs',
                
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
            ),
        ),
        
        /* Руководитель ОПР */
        'HeadSalesDepartment' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель ОПР',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'UserObjects',
                'UserObjectsGroup',
                'ManagerContactInfo',
                'UserObjectsGroupSystems',
                'UserObjectEquips',
                'ManagerContractsS',
                'ManagerDocuments',
                'ManagerContacts',
                'UserObjectsGroupCostCalculations',
                'ManagerCostCalculations',
                'ManagerCostCalcDocuments',
                'ManagerCostCalcEquips',
                'ManagerCostCalcWorks',
                'ManagerDemands',
                'ManagerExecuteReports',
                'UserRepairs',
                'ManagerDeliveryComments',
                'UserDeliveryDemands',
                'MSWHDocuments',
                'ManagerDocmAchsDetails',
                'ManagerMonitoringDemands',
                'ManagerEvents',
                'LogDeliveryDemands',
                'WhActsView',
                'ManagerWHBuhActs',
                'SalesManager',
                
                /* Отчеты */
                'DemandsReportAll',
                'DemandsReport1',
                'DemandsReport2',
                'DemandsReport3',
                'DemandsReport4',
                'DemandsReport5',
                'DemandsReport6',
                'DemandsReport7',
                'DemandsReport8',
                'DemandsReport9',
                'DemandsReport10',
                'DemandsReport11',
                'DemandsReport12',
            ),
        ),
        
        /* Руководитель ОМТО */
        'HeadMaterialLogistics' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель ОПР',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ProjectManager',
                'ManagerMaterialLogistics',
                'EngineerPRC',
                'HeadLogistics',
            ),
        ),
        
        /* Руководитель направления ПБ и ИТП*/
        'HeadAPPZ' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель направления ПБ и ИТП',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'ProjectManager',
                'AdminObjectsGroupSystems',
                'AdminObjectsGroupSystemComplexitys',
            ),
        ),
        
        /* Менеджер проектов */
        'ProjectManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Менеджер проектов',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'ManagerObjectEquips',
                'ManagerObjects',
                'AdminContractEquips',
                'AdminContractsDetails_v',
                
            ),
        ),
        
        /* Менеджер ОМТО */
        'ManagerMaterialLogistics' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Менеджер ОМТО',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'AdminRepairs',
                'AdminWhActs',
                'AdminRepairDocs',
            ),
        ),
        
        /* Инженер ПРЦ */
        'EngineerPRC' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Инженер ПРЦ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'AdminRepairs',
            ),
        ),
        
        /* Руководитель логистики */
        'HeadLogistics' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель логистики',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'LogisticsManager',
                'Storeman',
                'ManagerInventoryDetails',
                'AdminInventories',
                'ManagerMaterialLogistics',
            ),
        ),
        
        /* Менеджер по логиcтике */
        'LogisticsManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Менеджер по логитике',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'ManagerWHDocuments',
                'ManagerDeliveryDemands',
                'ManagerDeliveryComments', 
                'ManagerMonitoringDemands',
                'ManagerMonitoringDemandDetails',
                'ManagerPriceMonitoring',
                'ManagerEquips',
                'AdminAddressedStorage',
                'ManagerSuppliers',
                'ManagerAddressSystems',
                'ManagerInventories',
                'UserInventoryDetails',
                'UserPriceList',
                'UserPriceListDetails',
                'ManagerControlWHDocuments',
                'UserPriceList',
                'UserPriceListDetails',
                
                /* Отчеты */
                'DeliveryDemandsReportAll',
                'DeliveryDemandsReport',
                'DeliveryDemandsBrokenDeadlinesReport',
                
                'WHDocumentsReportAll',
                'WHDocuments1Report',
                'WHDocuments2Report',
                'WHDocuments3Report',
                'WHDocuments4Report',
                'WHDocuments5Report',
                'WHDocuments6Report',
                'WHDocuments7Report',
                'WHDocuments8Report',
                'WHDocuments9Report',
                'WHDocuments10Report',
                'WHDocuments11Report',
                
                'WHActsAll',
                'WHActs1Report',
                'WHActs2Report',
                'WHActs3Report',
                'WHActs4Report',
                
                
            ),
        ),
        
        /* Кладовщик */
        'Storeman' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Кладовщик',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'ManagerWHDocuments',
                'ManagerEquips',
                'ManagerSuppliers',
                'ManagerAddressSystems',
                'ManagerInventories',
                'UserInventoryDetails',
                'AdminDocmAchsDetails',
                
                'WHActsAll',
                'WHActs1Report',
                'WHActs2Report',
                'WHActs3Report',
                'WHActs4Report',
            ),
        ),
        
        /* Главный бухгалтер */
        'AccountantGeneral' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Главный бухгалтер',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'ManagerPaymentHistory',
                'AdminContractsDetails_v',
                'UserContractEquips',
            ),
        ),
        
        /* Бухгалтер */
        'Accountant' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Бухгалтер',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'ManagerPaymentHistory',
                'AdminContractsDetails_v',
                'UserContractEquips',
            ),
        ),
        
        /* Экономист-бухгалтер */
        'EconomistAccountant' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Экономист-бухгалтер',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'ManagerPaymentHistory',
                'AdminContractsDetails_v',
                'UserContractEquips',
            ),
        ),
        
        
        
        /* Руководитель отдела маркетинга */
        'HeadMarketing' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Руководитель отдела маркетинга',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'SeniorDispatcher',
                'AdministartorDispatchers',
            ),
        ),
        
        /* Менеджер по маркетингу */
        'MarketingManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Менеджер по маркетингу',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
            ),
        ),
        
        /* Интернет-маркетолог */
        'InternetMarketer' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Интернет-маркетолог',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
            ),
        ),
        
        /* Старший экономист */
        'SeniorEconomist' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Старший экономист',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'StaffManager',
                'SeniorDispatcher',
                'EconomistAccountant',
                'OfficeManagerSalesDepartment',
                'AccountManager',
                'ManagerWhActs',
                'ManagerContractPriceHistory',
                'AdminSystemComplexitys',
                'AdminSystemStatements',
                'AdminDocuments',
                'AdminWHBuhActs',
                'AdminContractMasterHistory',
                'AdminDemands',
                'AdminCostCalcSalarys',
                'AdminContactInfo',
                'AdminObjectsGroupSystems',
                'AdminObjectsGroupSystemComplexitys',
                'AdminSystemCompetitors',
                'AdminContractsS',
                
            ),
        ),
        
        /* Менеджер по финансам */
        'FinanceManager' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Менеджер по финансам',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'SeniorEconomist',
            ),
        ),
        
        
    )
);

?>
