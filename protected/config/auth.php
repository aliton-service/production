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
    include(dirname(__FILE__).'/security/EquipsHistorySecurity.php'),
    include(dirname(__FILE__).'/security/EquipsRateSecurity.php'),
    include(dirname(__FILE__).'/security/EquipSubgroupsSecurity.php'),
    include(dirname(__FILE__).'/security/EquipTypesSecurity.php'),
    include(dirname(__FILE__).'/security/referenceSecurity.php'),
    
    /* Раздел Ремонт */ 
    include(dirname(__FILE__).'/security/RepairsSecurity.php'),
    include(dirname(__FILE__).'/security/RepairActDefectationsSecurity.php'),
        
    include(dirname(__FILE__).'/security/ObjectsSecurity.php'),
    include(dirname(__FILE__).'/security/WHDocumentsSecurity.php'),
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
    include(dirname(__FILE__).'/security/WHDocumentsFindTrebSecurity.php'),
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

    /* Кадры -> сотрудники */
    include(dirname(__FILE__).'/security/EmployeesSecurity.php'),
    /* Кадры -> инструктаж */
    include(dirname(__FILE__).'/security/InstructingsSecurity.php'),
        
    /* Контроль контактов */
    include(dirname(__FILE__).'/security/ControlContactsSecurity.php'),

    /* Поиск счетов */
    include(dirname(__FILE__).'/security/ContractsSSecurity.php'),

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
        
    /* Ремонт (сопроводительная накладная) */
    include(dirname(__FILE__).'/security/RepairSRMSecurity.php'),
        
    /* Ремонт (гарантийные талоны) */
    include(dirname(__FILE__).'/security/RepairWarrantysSecurity.php'),
        
    /* Ремонт (акт утилизации) */
    include(dirname(__FILE__).'/security/RepairActUtilizationsSecurity.php'),

    /* Ремонт (ход работы) */
    include(dirname(__FILE__).'/security/RepairCommentsSecurity.php'),
        
    /* Отчеты */
    include(dirname(__FILE__).'/security/ReportsSecurity.php'),
        
    /* Структура организации*/
    include(dirname(__FILE__).'/security/OrganizationStructureSecurity.php'),
        
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
            ),
        ),

        'Administrator' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Administrator',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'object/index',
            'children' => array(
                'SeniorDispatcher',
                'AdminDemands',
                'Storekeeper',
                'AdminObjects',
                'AdminWhActs',
                'AdminPriceMonitoring',
                'AdminWHDocuments',
                'AdminBanks',
                'AdminAddressSystems',
                'AdminEquips',
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
                /* Отчеты*/
                'Demand1Report',
                'Demand2Report',
                'WHDocuments1Report',
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
                ),
        ),
    )
);

?>
