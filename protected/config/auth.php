<?php
return array (
  'ViewObjectsGroup' => 
  array (
    'type' => 0,
    'description' => 'Промостр карточки объектов',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjectsGroup' => 
  array (
    'type' => 0,
    'description' => 'Редактирование карточки (Общие данные)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateObjectsGroup' => 
  array (
    'type' => 0,
    'description' => 'Создание объекта',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjectsGroup' => 
  array (
    'type' => 0,
    'description' => 'Удаление объекта',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserObjectsGroup' => 
  array (
    'type' => 2,
    'description' => 'Промостр карточки объектов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroup',
    ),
  ),
  'ManagerObjectsGroup' => 
  array (
    'type' => 2,
    'description' => 'Промостр и редактирование карточки объекта',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroup',
      1 => 'UpdateObjectsGroup',
      2 => 'CreateObjectsGroup',
    ),
  ),
  'AdminObjectsGroup' => 
  array (
    'type' => 2,
    'description' => 'Все права по объекту',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroup',
      1 => 'UpdateObjectsGroup',
      2 => 'CreateObjectsGroup',
      3 => 'DeleteObjectsGroup',
    ),
  ),
  'ManagerOfficeObjectsGroup' => 
  array (
    'type' => 2,
    'description' => 'Все права по объекту',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroup',
      1 => 'UpdateObjectsGroup',
      2 => 'CreateObjectsGroup',
    ),
  ),
  'ManagerRegions' => 
  array (
    'type' => 2,
    'description' => 'ManagerRerions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRegions',
      1 => 'CreateRegions',
      2 => 'UpdateRegions',
    ),
  ),
  'UserRegions' => 
  array (
    'type' => 2,
    'description' => 'UserRegions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRegions',
    ),
  ),
  'AdminRegions' => 
  array (
    'type' => 2,
    'description' => 'AdminRegions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRegions',
      1 => 'CreateRegions',
      2 => 'UpdateRegions',
      3 => 'DeleteRegions',
    ),
  ),
  'ViewRegions' => 
  array (
    'type' => 0,
    'description' => 'ViewRegions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRegions' => 
  array (
    'type' => 0,
    'description' => 'CreateRegions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRegions' => 
  array (
    'type' => 0,
    'description' => 'UpdateRegions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRegions' => 
  array (
    'type' => 0,
    'description' => 'DeleteRegions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminTerritory' => 
  array (
    'type' => 2,
    'description' => 'AdminTerritory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTerritory',
      1 => 'UpdateTerritory',
      2 => 'CreateTerritory',
      3 => 'DeleteTerritory',
    ),
  ),
  'ManagerTerritory' => 
  array (
    'type' => 2,
    'description' => 'ManagerTerritory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTerritory',
      1 => 'UpdateTerritory',
      2 => 'CreateTerritory',
    ),
  ),
  'UserTerritory' => 
  array (
    'type' => 2,
    'description' => 'UserTerritory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTerritory',
    ),
  ),
  'ViewTerritory' => 
  array (
    'type' => 0,
    'description' => 'ViewTerritory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateTerritory' => 
  array (
    'type' => 0,
    'description' => 'UpdateTerritory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateTerritory' => 
  array (
    'type' => 0,
    'description' => 'CreateTerritory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteTerritory' => 
  array (
    'type' => 0,
    'description' => 'DeleteTerritory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminSystemComplexitys' => 
  array (
    'type' => 2,
    'description' => 'AdminSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemComplexitys',
      1 => 'UpdateSystemComplexitys',
      2 => 'CreateSystemComplexitys',
      3 => 'DeleteSystemComplexitys',
    ),
  ),
  'ManagerSystemComplexitys' => 
  array (
    'type' => 2,
    'description' => 'ManagerSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemComplexitys',
      1 => 'UpdateSystemComplexitys',
      2 => 'CreateSystemComplexitys',
    ),
  ),
  'UserSystemComplexitys' => 
  array (
    'type' => 2,
    'description' => 'UserSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemComplexitys',
    ),
  ),
  'ViewSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'ViewSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'UpdateSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'CreateSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'DeleteSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminSystemStatements' => 
  array (
    'type' => 2,
    'description' => 'AdminSystemStatements',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemStatements',
      1 => 'UpdateSystemStatements',
      2 => 'CreateSystemStatements',
      3 => 'DeleteSystemStatements',
    ),
  ),
  'ManagerSystemStatements' => 
  array (
    'type' => 2,
    'description' => 'ManagerSystemStatements',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemStatements',
      1 => 'UpdateSystemStatements',
      2 => 'CreateSystemStatements',
    ),
  ),
  'UserSystemStatements' => 
  array (
    'type' => 2,
    'description' => 'UserSystemStatements',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemStatements',
    ),
  ),
  'ViewSystemStatements' => 
  array (
    'type' => 0,
    'description' => 'ViewSystemStatements',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSystemStatements' => 
  array (
    'type' => 0,
    'description' => 'UpdateSystemStatements',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSystemStatements' => 
  array (
    'type' => 0,
    'description' => 'CreateSystemStatements',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSystemStatements' => 
  array (
    'type' => 0,
    'description' => 'DeleteSystemStatements',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminPriceMonitoring' => 
  array (
    'type' => 2,
    'description' => 'AdminPriceMonitoring',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMonitoring',
      1 => 'CreatePriceMonitoring',
      2 => 'UpdatePriceMonitoring',
      3 => 'DeletePriceMonitoring',
    ),
  ),
  'ManagerPriceMonitoring' => 
  array (
    'type' => 2,
    'description' => 'ManagerPriceMonitoring',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMonitoring',
      1 => 'CreatePriceMonitoring',
      2 => 'UpdatePriceMonitoring',
    ),
  ),
  'UserPriceMonitoring' => 
  array (
    'type' => 2,
    'description' => 'UserPriceMonitoring',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMonitoring',
    ),
  ),
  'ViewPriceMonitoring' => 
  array (
    'type' => 0,
    'description' => 'ViewPriceMonitoring',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePriceMonitoring' => 
  array (
    'type' => 0,
    'description' => 'UpdatePriceMonitoring',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePriceMonitoring' => 
  array (
    'type' => 0,
    'description' => 'CreatePriceMonitoring',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePriceMonitoring' => 
  array (
    'type' => 0,
    'description' => 'DeletePriceMonitoring',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCustomers' => 
  array (
    'type' => 2,
    'description' => 'ManagerCustomers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCustomers',
      1 => 'CreateCustomers',
      2 => 'UpdateCustomers',
    ),
  ),
  'UserCustomers' => 
  array (
    'type' => 2,
    'description' => 'UserCustomers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCustomers',
    ),
  ),
  'AdminCustomers' => 
  array (
    'type' => 2,
    'description' => 'AdminCustomers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCustomers',
      1 => 'CreateCustomers',
      2 => 'UpdateCustomers',
      3 => 'DeleteCustomers',
    ),
  ),
  'ViewCustomers' => 
  array (
    'type' => 0,
    'description' => 'ViewCustomers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateCustomers' => 
  array (
    'type' => 0,
    'description' => 'CreateCustomers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCustomers' => 
  array (
    'type' => 0,
    'description' => 'UpdateCustomers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCustomers' => 
  array (
    'type' => 0,
    'description' => 'DeleteCustomers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerBanks' => 
  array (
    'type' => 2,
    'description' => 'ManagerBanks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewBanks',
      1 => 'CreateBanks',
      2 => 'UpdateBanks',
    ),
  ),
  'UserBanks' => 
  array (
    'type' => 2,
    'description' => 'UserBanks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewBanks',
    ),
  ),
  'AdminBanks' => 
  array (
    'type' => 2,
    'description' => 'AdminBanks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewBanks',
      1 => 'CreateBanks',
      2 => 'UpdateBanks',
      3 => 'DeleteBanks',
    ),
  ),
  'ViewBanks' => 
  array (
    'type' => 0,
    'description' => 'ViewBanks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateBanks' => 
  array (
    'type' => 0,
    'description' => 'CreateBanks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateBanks' => 
  array (
    'type' => 0,
    'description' => 'UpdateBanks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteBanks' => 
  array (
    'type' => 0,
    'description' => 'DeleteBanks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerAreas' => 
  array (
    'type' => 2,
    'description' => 'ManagerAreas',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreas',
      1 => 'CreateAreas',
      2 => 'UpdateAreas',
    ),
  ),
  'UserAreas' => 
  array (
    'type' => 2,
    'description' => 'UserAreas',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreas',
    ),
  ),
  'AdminAreas' => 
  array (
    'type' => 2,
    'description' => 'AdminAreas',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreas',
      1 => 'CreateAreas',
      2 => 'UpdateAreas',
      3 => 'DeleteAreas',
    ),
  ),
  'ViewAreas' => 
  array (
    'type' => 0,
    'description' => 'ViewAreas',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateAreas' => 
  array (
    'type' => 0,
    'description' => 'CreateAreas',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateAreas' => 
  array (
    'type' => 0,
    'description' => 'UpdateAreas',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteAreas' => 
  array (
    'type' => 0,
    'description' => 'DeleteAreas',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerJuridicals' => 
  array (
    'type' => 2,
    'description' => 'ManagerJuridicals',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewJuridicals',
      1 => 'CreateJuridicals',
      2 => 'UpdateJuridicals',
    ),
  ),
  'AdminJuridicals' => 
  array (
    'type' => 2,
    'description' => 'AdminJuridicals',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewJuridicals',
      1 => 'CreateJuridicals',
      2 => 'UpdateJuridicals',
      3 => 'DeleteJuridicals',
    ),
  ),
  'UserJuridicals' => 
  array (
    'type' => 2,
    'description' => 'UserJuridicals',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewJuridicals',
    ),
  ),
  'ViewJuridicals' => 
  array (
    'type' => 0,
    'description' => 'ViewJuridicals',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateJuridicals' => 
  array (
    'type' => 0,
    'description' => 'CreateJuridicals',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateJuridicals' => 
  array (
    'type' => 0,
    'description' => 'UpdateJuridicals',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteJuridicals' => 
  array (
    'type' => 0,
    'description' => 'DeleteJuridicals',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerStreets' => 
  array (
    'type' => 2,
    'description' => 'ManagerStreets',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreets',
      1 => 'CreateStreets',
      2 => 'UpdateStreets',
    ),
  ),
  'AdminStreets' => 
  array (
    'type' => 2,
    'description' => 'AdminStreets',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreets',
      1 => 'CreateStreets',
      2 => 'UpdateStreets',
      3 => 'DeleteStreets',
    ),
  ),
  'UserStreets' => 
  array (
    'type' => 2,
    'description' => 'UserStreets',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreets',
    ),
  ),
  'ViewStreets' => 
  array (
    'type' => 0,
    'description' => 'ViewStreets',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateStreets' => 
  array (
    'type' => 0,
    'description' => 'CreateStreets',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateStreets' => 
  array (
    'type' => 0,
    'description' => 'UpdateStreets',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteStreets' => 
  array (
    'type' => 0,
    'description' => 'DeleteStreets',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerStreetTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerStreetTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreetTypes',
      1 => 'CreateStreetTypes',
      2 => 'UpdateStreetTypes',
    ),
  ),
  'AdminStreetTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminStreetTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreetTypes',
      1 => 'CreateStreetTypes',
      2 => 'UpdateStreetTypes',
      3 => 'DeleteStreetTypes',
    ),
  ),
  'UserStreetTypes' => 
  array (
    'type' => 2,
    'description' => 'UserStreetTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreetTypes',
    ),
  ),
  'ViewStreetTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewDeliveryComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateStreetTypes' => 
  array (
    'type' => 2,
    'description' => 'CreateStreetTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateStreetTypes' => 
  array (
    'type' => 2,
    'description' => 'UpdateStreetTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteStreetTypes' => 
  array (
    'type' => 2,
    'description' => 'DeleteStreetTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerServiceTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerServiceTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewServiceTypes',
      1 => 'CreateServiceTypes',
      2 => 'UpdateServiceTypes',
    ),
  ),
  'AdminServiceTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminServiceTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewServiceTypes',
      1 => 'CreateServiceTypes',
      2 => 'UpdateServiceTypes',
      3 => 'DeleteServiceTypes',
    ),
  ),
  'UserServiceTypes' => 
  array (
    'type' => 2,
    'description' => 'UserServiceTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewServiceTypes',
    ),
  ),
  'ViewServiceTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewServiceTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateServiceTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateServiceTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateServiceTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateServiceTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteServiceTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteServiceTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDocTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerDocTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocTypes',
      1 => 'CreateDocTypes',
      2 => 'UpdateDocTypes',
    ),
  ),
  'UserDocTypes' => 
  array (
    'type' => 2,
    'description' => 'UserDocTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocTypes',
    ),
  ),
  'AdminDocTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminDocTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocTypes',
      1 => 'CreateDocTypes',
      2 => 'UpdateDocTypes',
      3 => 'DeleteDocTypes',
    ),
  ),
  'ViewDocTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewDocTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDocTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateDocTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDocTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateDocTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDocTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteDocTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDemandTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerDemandTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandTypes',
      1 => 'CreateDemandTypes',
      2 => 'UpdateDemandTypes',
    ),
  ),
  'AdminDemandTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminDemandTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandTypes',
      1 => 'CreateDemandTypes',
      2 => 'UpdateDemandTypes',
      3 => 'DeleteDemandTypes',
    ),
  ),
  'UserDemandTypes' => 
  array (
    'type' => 2,
    'description' => 'UserDemandTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandTypes',
    ),
  ),
  'ViewDemandTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewDemandTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDemandTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateDemandTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDemandTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateDemandTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDemandTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteDemandTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDemandPriors' => 
  array (
    'type' => 2,
    'description' => 'ManagerDemandPriors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandPriors',
      1 => 'CreateDemandPriors',
      2 => 'UpdateDemandPriors',
    ),
  ),
  'AdminDemandPriors' => 
  array (
    'type' => 2,
    'description' => 'AdminDemandPriors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandPriors',
      1 => 'CreateDemandPriors',
      2 => 'UpdateDemandPriors',
      3 => 'DeleteDemandPriors',
    ),
  ),
  'UserDemandPriors' => 
  array (
    'type' => 2,
    'description' => 'UserDemandPriors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandPriors',
    ),
  ),
  'ViewDemandPriors' => 
  array (
    'type' => 0,
    'description' => 'ViewDemandPriors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDemandPriors' => 
  array (
    'type' => 0,
    'description' => 'CreateDemandPriors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDemandPriors' => 
  array (
    'type' => 0,
    'description' => 'UpdateDemandPriors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDemandPriors' => 
  array (
    'type' => 0,
    'description' => 'DeleteDemandPriors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDelayReasons' => 
  array (
    'type' => 2,
    'description' => 'ManagerDelayReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDelayReasons',
      1 => 'CreateDelayReasons',
      2 => 'UpdateDelayReasons',
    ),
  ),
  'AdminDelayReasons' => 
  array (
    'type' => 2,
    'description' => 'AdminDelayReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDelayReasons',
      1 => 'CreateDelayReasons',
      2 => 'UpdateDelayReasons',
      3 => 'DeleteDelayReasons',
    ),
  ),
  'UserDelayReasons' => 
  array (
    'type' => 2,
    'description' => 'UserDelayReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDelayReasons',
    ),
  ),
  'ViewDelayReasons' => 
  array (
    'type' => 0,
    'description' => 'ViewDelayReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDelayReasons' => 
  array (
    'type' => 0,
    'description' => 'CreateDelayReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDelayReasons' => 
  array (
    'type' => 0,
    'description' => 'UpdateDelayReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDelayReasons' => 
  array (
    'type' => 0,
    'description' => 'DeleteDelayReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerTransferReasons' => 
  array (
    'type' => 2,
    'description' => 'ManagerTransferReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTransferReasons',
      1 => 'CreateTransferReasons',
      2 => 'UpdateTransferReasons',
    ),
  ),
  'AdminTransferReasons' => 
  array (
    'type' => 2,
    'description' => 'AdminTransferReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTransferReasons',
      1 => 'CreateTransferReasons',
      2 => 'UpdateTransferReasons',
      3 => 'DeleteTransferReasons',
    ),
  ),
  'UserTransferReasons' => 
  array (
    'type' => 2,
    'description' => 'UserTransferReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTransferReasons',
    ),
  ),
  'ViewTransferReasons' => 
  array (
    'type' => 0,
    'description' => 'ViewTransferReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateTransferReasons' => 
  array (
    'type' => 0,
    'description' => 'CreateTransferReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateTransferReasons' => 
  array (
    'type' => 0,
    'description' => 'UpdateTransferReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteTransferReasons' => 
  array (
    'type' => 0,
    'description' => 'DeleteTransferReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerSystemTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerSystemTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemTypes',
      1 => 'CreateSystemTypes',
      2 => 'UpdateSystemTypes',
    ),
  ),
  'AdminSystemTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminSystemTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemTypes',
      1 => 'CreateSystemTypes',
      2 => 'UpdateSystemTypes',
      3 => 'DeleteSystemTypes',
    ),
  ),
  'UserSystemTypes' => 
  array (
    'type' => 2,
    'description' => 'UserSystemTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreetTypes',
    ),
  ),
  'ViewSystemTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewSystemTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSystemTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateSystemTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSystemTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateSystemTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSystemTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteSystemTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerLoyaltyTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerLoyaltyTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewLoyaltyTypes',
      1 => 'CreateLoyaltyTypes',
      2 => 'UpdateLoyaltyTypes',
    ),
  ),
  'AdminLoyaltyTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminLoyaltyTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewLoyaltyTypes',
      1 => 'CreateLoyaltyTypes',
      2 => 'UpdateLoyaltyTypes',
      3 => 'DeleteLoyaltyTypes',
    ),
  ),
  'UserLoyaltyTypes' => 
  array (
    'type' => 2,
    'description' => 'UserLoyaltyTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewLoyaltyTypes',
    ),
  ),
  'ViewLoyaltyTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewLoyaltyTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateLoyaltyTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateLoyaltyTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateLoyaltyTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateLoyaltyTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteLoyaltyTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteLoyaltyTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPaymentTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerPaymentTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPaymentTypes',
      1 => 'CreatePaymentTypes',
      2 => 'UpdatePaymentTypes',
    ),
  ),
  'AdminPaymentTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminPaymentTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPaymentTypes',
      1 => 'CreatePaymentTypes',
      2 => 'UpdatePaymentTypes',
      3 => 'DeletePaymentTypes',
    ),
  ),
  'UserPaymentTypes' => 
  array (
    'type' => 2,
    'description' => 'UserPaymentTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPaymentTypes',
    ),
  ),
  'ViewPaymentTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewPaymentTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePaymentTypes' => 
  array (
    'type' => 0,
    'description' => 'CreatePaymentTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePaymentTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdatePaymentTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePaymentTypes' => 
  array (
    'type' => 0,
    'description' => 'DeletePaymentTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPriceChangeReasons' => 
  array (
    'type' => 2,
    'description' => 'ManagerPriceChangeReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceChangeReasons',
      1 => 'CreatePriceChangeReasons',
      2 => 'UpdatePriceChangeReasons',
    ),
  ),
  'AdminPriceChangeReasons' => 
  array (
    'type' => 2,
    'description' => 'AdminPriceChangeReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceChangeReasons',
      1 => 'CreatePriceChangeReasons',
      2 => 'UpdatePriceChangeReasons',
      3 => 'DeletePriceChangeReasons',
    ),
  ),
  'UserPriceChangeReasons' => 
  array (
    'type' => 2,
    'description' => 'UserPriceChangeReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceChangeReasons',
    ),
  ),
  'ViewPriceChangeReasons' => 
  array (
    'type' => 0,
    'description' => 'ViewPriceChangeReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePriceChangeReasons' => 
  array (
    'type' => 0,
    'description' => 'CreatePriceChangeReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePriceChangeReasons' => 
  array (
    'type' => 0,
    'description' => 'UpdatePriceChangeReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePriceChangeReasons' => 
  array (
    'type' => 0,
    'description' => 'DeletePriceChangeReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerJobTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerJobTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'CreateJobTypes',
      1 => 'UpdateJobTypes',
    ),
  ),
  'AdminJobTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminJobTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'CreateJobTypes',
      1 => 'UpdateJobTypes',
      2 => 'DeleteJobTypes',
    ),
  ),
  'UserJobTypes' => 
  array (
    'type' => 2,
    'description' => 'UserJobTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateJobTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateJobTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateJobTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateJobTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteJobTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteJobTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerConfirmCancels' => 
  array (
    'type' => 2,
    'description' => 'ManagerConfirmCancels',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewConfirmCancels',
      1 => 'CreateConfirmCancels',
      2 => 'UpdateConfirmCancels',
    ),
  ),
  'AdminConfirmCancels' => 
  array (
    'type' => 2,
    'description' => 'AdminConfirmCancels',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewConfirmCancels',
      1 => 'CreateConfirmCancels',
      2 => 'UpdateConfirmCancels',
      3 => 'DeleteConfirmCancels',
    ),
  ),
  'UserConfirmCancels' => 
  array (
    'type' => 2,
    'description' => 'UserConfirmCancels',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewConfirmCancels',
    ),
  ),
  'ViewConfirmCancels' => 
  array (
    'type' => 0,
    'description' => 'ViewConfirmCancels',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateConfirmCancels' => 
  array (
    'type' => 0,
    'description' => 'CreateConfirmCancels',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateConfirmCancels' => 
  array (
    'type' => 0,
    'description' => 'UpdateConfirmCancels',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteConfirmCancels' => 
  array (
    'type' => 0,
    'description' => 'DeleteConfirmCancels',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerStorages' => 
  array (
    'type' => 2,
    'description' => 'ManagerStorages',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStorages',
      1 => 'CreateStorages',
      2 => 'UpdateStorages',
    ),
  ),
  'AdminStorages' => 
  array (
    'type' => 2,
    'description' => 'AdminStorages',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStorages',
      1 => 'CreateStorages',
      2 => 'UpdateStorages',
      3 => 'DeleteStorages',
    ),
  ),
  'UserStorages' => 
  array (
    'type' => 2,
    'description' => 'UserStorages',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStorages',
    ),
  ),
  'ViewStorages' => 
  array (
    'type' => 0,
    'description' => 'ViewStorages',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateStorages' => 
  array (
    'type' => 0,
    'description' => 'CreateStorages',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateStorages' => 
  array (
    'type' => 0,
    'description' => 'UpdateStorages',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteStorages' => 
  array (
    'type' => 0,
    'description' => 'DeleteStorages',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerWorkTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerWorkTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWorkTypes',
      1 => 'CreateWorkTypes',
      2 => 'UpdateWorkTypes',
    ),
  ),
  'AdminWorkTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminWorkTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWorkTypes',
      1 => 'CreateWorkTypes',
      2 => 'UpdateWorkTypes',
      3 => 'DeleteWorkTypes',
    ),
  ),
  'UserWorkTypes' => 
  array (
    'type' => 2,
    'description' => 'UserWorkTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWorkTypes',
    ),
  ),
  'ViewWorkTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewWorkTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateWorkTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateWorkTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateWorkTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateWorkTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteWorkTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteWorkTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerReceiptReasons' => 
  array (
    'type' => 2,
    'description' => 'ManagerReceiptReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewReceiptReasons',
      1 => 'CreateReceiptReasons',
      2 => 'UpdateReceiptReasons',
    ),
  ),
  'AdminReceiptReasons' => 
  array (
    'type' => 2,
    'description' => 'AdminReceiptReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewReceiptReasons',
      1 => 'CreateReceiptReasons',
      2 => 'UpdateReceiptReasons',
      3 => 'DeleteReceiptReasons',
    ),
  ),
  'UserReceiptReasons' => 
  array (
    'type' => 2,
    'description' => 'UserReceiptReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewStreetTypes',
    ),
  ),
  'ViewReceiptReasons' => 
  array (
    'type' => 0,
    'description' => 'ViewReceiptReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateReceiptReasons' => 
  array (
    'type' => 0,
    'description' => 'CreateReceiptReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateReceiptReasons' => 
  array (
    'type' => 0,
    'description' => 'UpdateReceiptReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteReceiptReasons' => 
  array (
    'type' => 0,
    'description' => 'DeleteReceiptReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDebtReasons' => 
  array (
    'type' => 2,
    'description' => 'ManagerDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDebtReasons',
      1 => 'CreateDebtReasons',
      2 => 'UpdateDebtReasons',
    ),
  ),
  'AdminDebtReasons' => 
  array (
    'type' => 2,
    'description' => 'AdminDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDebtReasons',
      1 => 'CreateDebtReasons',
      2 => 'UpdateDebtReasons',
      3 => 'DeleteDebtReasons',
    ),
  ),
  'UserDebtReasons' => 
  array (
    'type' => 2,
    'description' => 'UserDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDebtReasons',
    ),
  ),
  'ViewDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'ViewDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'CreateDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'UpdateDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'DeleteDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerResults' => 
  array (
    'type' => 2,
    'description' => 'ManagerResults',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewResults',
      1 => 'CreateResults',
      2 => 'UpdateResults',
    ),
  ),
  'AdminResults' => 
  array (
    'type' => 2,
    'description' => 'AdminResults',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewResults',
      1 => 'CreateResults',
      2 => 'UpdateResults',
      3 => 'DeleteResults',
    ),
  ),
  'UserResults' => 
  array (
    'type' => 2,
    'description' => 'UserResults',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewResults',
    ),
  ),
  'ViewResults' => 
  array (
    'type' => 0,
    'description' => 'ViewResults',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateResults' => 
  array (
    'type' => 0,
    'description' => 'CreateResults',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateResults' => 
  array (
    'type' => 0,
    'description' => 'UpdateResults',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteResults' => 
  array (
    'type' => 0,
    'description' => 'DeleteResults',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerContactKinds' => 
  array (
    'type' => 2,
    'description' => 'ManagerContactKinds',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactKinds',
      1 => 'CreateContactKinds',
      2 => 'UpdateContactKinds',
    ),
  ),
  'AdminContactKinds' => 
  array (
    'type' => 2,
    'description' => 'AdminContactKinds',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactKinds',
      1 => 'CreateContactKinds',
      2 => 'UpdateContactKinds',
      3 => 'DeleteContactKinds',
    ),
  ),
  'UserContactKinds' => 
  array (
    'type' => 2,
    'description' => 'UserContactKinds',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactKinds',
    ),
  ),
  'ViewContactKinds' => 
  array (
    'type' => 0,
    'description' => 'ViewContactKinds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateContactKinds' => 
  array (
    'type' => 0,
    'description' => 'CreateContactKinds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContactKinds' => 
  array (
    'type' => 0,
    'description' => 'UpdateContactKinds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContactKinds' => 
  array (
    'type' => 0,
    'description' => 'DeleteContactKinds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerContactTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerContactTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactTypes',
      1 => 'CreateContactTypes',
      2 => 'UpdateContactTypes',
    ),
  ),
  'AdminContactTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminContactTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactTypes',
      1 => 'CreateContactTypes',
      2 => 'UpdateContactTypes',
      3 => 'DeleteContactTypes',
    ),
  ),
  'UserContactTypes' => 
  array (
    'type' => 2,
    'description' => 'UserContactTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactTypes',
    ),
  ),
  'ViewContactTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewContactTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateContactTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateContactTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContactTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateContactTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContactTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteContactTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerAddressSystems' => 
  array (
    'type' => 2,
    'description' => 'ManagerAddressSystems',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAddressSystems',
      1 => 'CreateAddressSystems',
      2 => 'UpdateAddressSystems',
    ),
  ),
  'AdminAddressSystems' => 
  array (
    'type' => 2,
    'description' => 'AdminAddressSystems',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAddressSystems',
      1 => 'CreateAddressSystems',
      2 => 'UpdateAddressSystems',
      3 => 'DeleteAddressSystems',
    ),
  ),
  'UserAddressSystems' => 
  array (
    'type' => 2,
    'description' => 'UserAddressSystems',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAddressSystems',
    ),
  ),
  'ViewAddressSystems' => 
  array (
    'type' => 0,
    'description' => 'ViewAddressSystems',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateAddressSystems' => 
  array (
    'type' => 0,
    'description' => 'CreateAddressSystems',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateAddressSystems' => 
  array (
    'type' => 0,
    'description' => 'UpdateAddressSystems',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteAddressSystems' => 
  array (
    'type' => 0,
    'description' => 'DeleteAddressSystems',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCompetitors' => 
  array (
    'type' => 2,
    'description' => 'ManagerWCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCompetitors',
      1 => 'UpdateCompetitors',
    ),
  ),
  'AdminCompetitors' => 
  array (
    'type' => 2,
    'description' => 'AdminCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCompetitors',
      1 => 'UpdateCompetitors',
      2 => 'DeleteCompetitors',
    ),
  ),
  'UserCompetitors' => 
  array (
    'type' => 2,
    'description' => 'UserCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCompetitors',
    ),
  ),
  'ViewCompetitors' => 
  array (
    'type' => 0,
    'description' => 'ViewCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCompetitors' => 
  array (
    'type' => 0,
    'description' => 'UpdateCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCompetitors' => 
  array (
    'type' => 0,
    'description' => 'DeleteCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerComplexityTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerComplexityTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewComplexityTypes',
      1 => 'CreateComplexityTypes',
      2 => 'UpdateComplexityTypes',
    ),
  ),
  'AdminComplexityTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminComplexityTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewComplexityTypes',
      1 => 'CreateComplexityTypes',
      2 => 'UpdateComplexityTypes',
      3 => 'DeleteComplexityTypes',
    ),
  ),
  'UserComplexityTypes' => 
  array (
    'type' => 2,
    'description' => 'UserComplexityTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewComplexityTypes',
    ),
  ),
  'ViewComplexityTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewComplexityTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateComplexityTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateComplexityTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateComplexityTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateComplexityTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteComplexityTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteComplexityTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipGroups' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipGroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipGroups',
      1 => 'CreateEquipGroups',
      2 => 'UpdateEquipGroups',
    ),
  ),
  'AdminEquipGroups' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipGroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipGroups',
      1 => 'CreateEquipGroups',
      2 => 'UpdateEquipGroups',
      3 => 'DeleteEquipGroups',
    ),
  ),
  'UserEquipGroups' => 
  array (
    'type' => 2,
    'description' => 'UserEquipGroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipGroups',
    ),
  ),
  'ViewEquipGroups' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipGroups' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipGroups' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipGroups' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerNegatives' => 
  array (
    'type' => 2,
    'description' => 'ManagerNegatives',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewNegatives',
      1 => 'CreateNegatives',
      2 => 'UpdateNegatives',
    ),
  ),
  'AdminNegatives' => 
  array (
    'type' => 2,
    'description' => 'AdminNegatives',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewNegatives',
      1 => 'CreateNegatives',
      2 => 'UpdateNegatives',
      3 => 'DeleteNegatives',
    ),
  ),
  'UserNegatives' => 
  array (
    'type' => 2,
    'description' => 'UserNegatives',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewNegatives',
    ),
  ),
  'ViewNegatives' => 
  array (
    'type' => 0,
    'description' => 'ViewNegatives',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateNegatives' => 
  array (
    'type' => 0,
    'description' => 'CreateNegatives',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateNegatives' => 
  array (
    'type' => 0,
    'description' => 'UpdateNegatives',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteNegatives' => 
  array (
    'type' => 0,
    'description' => 'DeleteNegatives',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerObjectTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerObjectTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectTypes',
      1 => 'CreateObjectTypes',
      2 => 'UpdateObjectTypes',
    ),
  ),
  'AdminObjectTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminObjectTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectTypes',
      1 => 'CreateObjectTypes',
      2 => 'UpdateObjectTypes',
      3 => 'DeleteObjectTypes',
    ),
  ),
  'UserObjectTypes' => 
  array (
    'type' => 2,
    'description' => 'UserObjectTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectTypes',
    ),
  ),
  'ViewObjectTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewObjectTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateObjectTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateObjectTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjectTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateObjectTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjectTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteObjectTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerSystemAvailabilitys' => 
  array (
    'type' => 2,
    'description' => 'ManagerSystemAvailabilitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemAvailabilitys',
      1 => 'CreateSystemAvailabilitys',
      2 => 'UpdateSystemAvailabilitys',
    ),
  ),
  'AdminSystemAvailabilitys' => 
  array (
    'type' => 2,
    'description' => 'AdminSystemAvailabilitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemAvailabilitys',
      1 => 'CreateSystemAvailabilitys',
      2 => 'UpdateSystemAvailabilitys',
      3 => 'DeleteSystemAvailabilitys',
    ),
  ),
  'UserSystemAvailabilitys' => 
  array (
    'type' => 2,
    'description' => 'UserSystemAvailabilitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemAvailabilitys',
    ),
  ),
  'ViewSystemAvailabilitys' => 
  array (
    'type' => 0,
    'description' => 'ViewSystemAvailabilitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSystemAvailabilitys' => 
  array (
    'type' => 0,
    'description' => 'CreateSystemAvailabilitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSystemAvailabilitys' => 
  array (
    'type' => 0,
    'description' => 'UpdateSystemAvailabilitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSystemAvailabilitys' => 
  array (
    'type' => 0,
    'description' => 'DeleteSystemAvailabilitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerFormsOfOwnership' => 
  array (
    'type' => 2,
    'description' => 'ManagerFormsOfOwnership',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewFormsOfOwnership',
      1 => 'CreateFormsOfOwnership',
      2 => 'UpdateFormsOfOwnership',
    ),
  ),
  'AdminFormsOfOwnership' => 
  array (
    'type' => 2,
    'description' => 'AdminFormsOfOwnership',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewFormsOfOwnership',
      1 => 'CreateFormsOfOwnership',
      2 => 'UpdateFormsOfOwnership',
      3 => 'DeleteFormsOfOwnership',
    ),
  ),
  'UserFormsOfOwnership' => 
  array (
    'type' => 2,
    'description' => 'UserFormsOfOwnership',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewFormsOfOwnership',
    ),
  ),
  'ViewFormsOfOwnership' => 
  array (
    'type' => 0,
    'description' => 'ViewFormsOfOwnership',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateFormsOfOwnership' => 
  array (
    'type' => 0,
    'description' => 'CreateFormsOfOwnership',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateFormsOfOwnership' => 
  array (
    'type' => 0,
    'description' => 'UpdateFormsOfOwnership',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteFormsOfOwnership' => 
  array (
    'type' => 0,
    'description' => 'DeleteFormsOfOwnership',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPropForms' => 
  array (
    'type' => 2,
    'description' => 'ManagerPropForms',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPropForms',
      1 => 'CreatePropForms',
      2 => 'UpdatePropForms',
    ),
  ),
  'AdminPropForms' => 
  array (
    'type' => 2,
    'description' => 'AdminPropForms',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPropForms',
      1 => 'CreatePropForms',
      2 => 'UpdatePropForms',
      3 => 'DeletePropForms',
    ),
  ),
  'UserPropForms' => 
  array (
    'type' => 2,
    'description' => 'UserPropForms',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPropForms',
    ),
  ),
  'ViewPropForms' => 
  array (
    'type' => 0,
    'description' => 'ViewPropForms',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePropForms' => 
  array (
    'type' => 0,
    'description' => 'CreatePropForms',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePropForms' => 
  array (
    'type' => 0,
    'description' => 'UpdatePropForms',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePropForms' => 
  array (
    'type' => 0,
    'description' => 'DeletePropForms',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEqipGroups' => 
  array (
    'type' => 2,
    'description' => 'ManagerEqipGroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEqipGroups',
      1 => 'CreateEqipGroups',
      2 => 'UpdateEqipGroups',
    ),
  ),
  'AdminEqipGroups' => 
  array (
    'type' => 2,
    'description' => 'AdminEqipGroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEqipGroups',
      1 => 'CreateEqipGroups',
      2 => 'UpdateEqipGroups',
      3 => 'DeleteEqipGroups',
    ),
  ),
  'UserEqipGroups' => 
  array (
    'type' => 2,
    'description' => 'UserEqipGroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEqipGroups',
    ),
  ),
  'ViewEqipGroups' => 
  array (
    'type' => 0,
    'description' => 'ViewEqipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEqipGroups' => 
  array (
    'type' => 0,
    'description' => 'CreateEqipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEqipGroups' => 
  array (
    'type' => 0,
    'description' => 'UpdateEqipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEqipGroups' => 
  array (
    'type' => 0,
    'description' => 'DeleteEqipGroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipAnalog' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipAnalog',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipAnalog',
      1 => 'CreateEquipAnalog',
      2 => 'UpdateEquipAnalog',
    ),
  ),
  'AdminEquipAnalog' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipAnalog',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipAnalog',
      1 => 'CreateEquipAnalog',
      2 => 'UpdateEquipAnalog',
      3 => 'DeleteEquipAnalog',
    ),
  ),
  'UserEquipAnalog' => 
  array (
    'type' => 2,
    'description' => 'UserEquipAnalog',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipAnalog',
    ),
  ),
  'ViewEquipAnalog' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipAnalog',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipAnalog' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipAnalog',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipAnalog' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipAnalog',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipAnalog' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipAnalog',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipCategory' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipCategory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipCategory',
      1 => 'CreateEquipCategory',
      2 => 'UpdateEquipCategory',
    ),
  ),
  'AdminEquipCategory' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipCategory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipCategory',
      1 => 'CreateEquipCategory',
      2 => 'UpdateEquipCategory',
      3 => 'DeleteEquipCategory',
    ),
  ),
  'UserEquipCategory' => 
  array (
    'type' => 2,
    'description' => 'UserEquipCategory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWorkTypes',
    ),
  ),
  'ViewEquipCategory' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipCategory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipCategory' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipCategory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipCategory' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipCategory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipCategory' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipCategory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipDetails',
      1 => 'CreateEquipDetails',
      2 => 'UpdateEquipDetails',
    ),
  ),
  'AdminEquipDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipDetails',
      1 => 'CreateEquipDetails',
      2 => 'UpdateEquipDetails',
      3 => 'DeleteEquipDetails',
    ),
  ),
  'UserEquipDetails' => 
  array (
    'type' => 2,
    'description' => 'UserEquipDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipDetails',
    ),
  ),
  'ViewEquipDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipDetails' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipDetails' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipRateDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipRateDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipRateDetails',
      1 => 'CreateEquipRateDetails',
      2 => 'UpdateEquipRateDetails',
    ),
  ),
  'AdminEquipRateDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipRateDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipRateDetails',
      1 => 'CreateEquipRateDetails',
      2 => 'UpdateEquipRateDetails',
      3 => 'DeleteEquipRateDetails',
    ),
  ),
  'UserEquipRateDetails' => 
  array (
    'type' => 2,
    'description' => 'UserEquipRateDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipRateDetails',
    ),
  ),
  'ViewEquipRateDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipRateDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipRateDetails' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipRateDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipRateDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipRateDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipRateDetails' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipRateDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipRates' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipRates',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipRates',
      1 => 'CreateEquipRates',
      2 => 'UpdateEquipRates',
    ),
  ),
  'AdminEquipRates' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipRates',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipRates',
      1 => 'CreateEquipRates',
      2 => 'UpdateEquipRates',
      3 => 'DeleteEquipRates',
    ),
  ),
  'UserEquipRates' => 
  array (
    'type' => 2,
    'description' => 'UserEquipRates',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipRates',
    ),
  ),
  'ViewEquipRates' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipRates',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipRates' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipRates',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipRates' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipRates',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipRates' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipRates',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquips' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquips',
      1 => 'CreateEquips',
      2 => 'UpdateEquips',
      3 => 'DeleteEquips',
    ),
  ),
  'AdminEquips' => 
  array (
    'type' => 2,
    'description' => 'AdminEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquips',
      1 => 'CreateEquips',
      2 => 'UpdateEquips',
      3 => 'DeleteEquips',
    ),
  ),
  'UserEquips' => 
  array (
    'type' => 2,
    'description' => 'UserEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquips',
    ),
  ),
  'ViewEquips' => 
  array (
    'type' => 0,
    'description' => 'ViewEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquips' => 
  array (
    'type' => 0,
    'description' => 'CreateEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquips' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquips' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerAddressedStorage' => 
  array (
    'type' => 2,
    'description' => 'ManagerAddressedStorage',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAddressedStorage',
      1 => 'CreateAddressedStorage',
      2 => 'UpdateAddressedStorage',
    ),
  ),
  'AdminAddressedStorage' => 
  array (
    'type' => 2,
    'description' => 'AdminAddressedStorage',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAddressedStorage',
      1 => 'CreateAddressedStorage',
      2 => 'UpdateAddressedStorage',
      3 => 'DeleteAddressedStorage',
    ),
  ),
  'UserAddressedStorage' => 
  array (
    'type' => 2,
    'description' => 'UserAddressedStorage',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAddressedStorage',
    ),
  ),
  'ViewAddressedStorage' => 
  array (
    'type' => 0,
    'description' => 'ViewAddressedStorage',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateAddressedStorage' => 
  array (
    'type' => 0,
    'description' => 'CreateAddressedStorage',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateAddressedStorage' => 
  array (
    'type' => 0,
    'description' => 'UpdateAddressedStorage',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteAddressedStorage' => 
  array (
    'type' => 0,
    'description' => 'DeleteAddressedStorage',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipsHistory' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipsHistory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipsHistory',
      1 => 'CreateEquipsHistory',
      2 => 'UpdateEquipsHistory',
    ),
  ),
  'AdminEquipsHistory' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipsHistory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipsHistory',
      1 => 'CreateEquipsHistory',
      2 => 'UpdateEquipsHistory',
      3 => 'DeleteEquipsHistory',
    ),
  ),
  'UserEquipsHistory' => 
  array (
    'type' => 2,
    'description' => 'UserEquipsHistory',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipsHistory',
    ),
  ),
  'ViewEquipsHistory' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipsHistory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipsHistory' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipsHistory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipsHistory' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipsHistory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipsHistory' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipsHistory',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipsRate' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipsRate',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipsRate',
      1 => 'CreateEquipsRate',
      2 => 'UpdateEquipsRate',
    ),
  ),
  'AdminEquipsRate' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipsRate',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipsRate',
      1 => 'CreateEquipsRate',
      2 => 'UpdateEquipsRate',
      3 => 'DeleteEquipsRate',
    ),
  ),
  'UserEquipsRate' => 
  array (
    'type' => 2,
    'description' => 'UserEquipsRate',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipsRate',
    ),
  ),
  'ViewEquipsRate' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipsRate',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipsRate' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipsRate',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipsRate' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipsRate',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipsRate' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipsRate',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipSubgroups' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipSubgroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipSubgroups',
      1 => 'CreateEquipSubgroups',
      2 => 'UpdateEquipSubgroups',
    ),
  ),
  'AdminEquipSubgroups' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipSubgroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipSubgroups',
      1 => 'CreateEquipSubgroups',
      2 => 'UpdateEquipSubgroups',
      3 => 'DeleteEquipSubgroups',
    ),
  ),
  'UserEquipSubgroups' => 
  array (
    'type' => 2,
    'description' => 'UserEquipSubgroups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipSubgroups',
    ),
  ),
  'ViewEquipSubgroups' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipSubgroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipSubgroups' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipSubgroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipSubgroups' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipSubgroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipSubgroups' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipSubgroups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEquipTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerEquipTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipTypes',
      1 => 'CreateEquipTypes',
      2 => 'UpdateEquipTypes',
    ),
  ),
  'AdminEquipTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminEquipTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipTypes',
      1 => 'CreateEquipTypes',
      2 => 'UpdateEquipTypes',
      3 => 'DeleteEquipTypes',
    ),
  ),
  'UserEquipTypes' => 
  array (
    'type' => 2,
    'description' => 'UserEquipTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipTypes',
    ),
  ),
  'ViewEquipTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewEquipTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEquipTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateEquipTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateEquipTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteEquipTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerMalfunctions' => 
  array (
    'type' => 2,
    'description' => 'ManagerMalfunctions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMalfunctions',
      1 => 'CreateMalfunctions',
      2 => 'UpdateMalfunctions',
    ),
  ),
  'AdminMalfunctions' => 
  array (
    'type' => 2,
    'description' => 'AdminMalfunctions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMalfunctions',
      1 => 'CreateMalfunctions',
      2 => 'UpdateMalfunctions',
      3 => 'DeleteMalfunctions',
    ),
  ),
  'UserMalfunctions' => 
  array (
    'type' => 2,
    'description' => 'UserMalfunctions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMalfunctions',
    ),
  ),
  'ViewMalfunctions' => 
  array (
    'type' => 0,
    'description' => 'ViewMalfunctions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateMalfunctions' => 
  array (
    'type' => 0,
    'description' => 'CreateMalfunctions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateMalfunctions' => 
  array (
    'type' => 0,
    'description' => 'UpdateMalfunctions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteMalfunctions' => 
  array (
    'type' => 0,
    'description' => 'DeleteMalfunctions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDeliveryTypes' => 
  array (
    'type' => 2,
    'description' => 'ManagerDeliveryTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDeliveryTypes',
      1 => 'CreateDeliveryTypes',
      2 => 'UpdateDeliveryTypes',
    ),
  ),
  'AdminDeliveryTypes' => 
  array (
    'type' => 2,
    'description' => 'AdminDeliveryTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDeliveryTypes',
      1 => 'CreateDeliveryTypes',
      2 => 'UpdateDeliveryTypes',
      3 => 'DeleteDeliveryTypes',
    ),
  ),
  'UserDeliveryTypes' => 
  array (
    'type' => 2,
    'description' => 'UserDeliveryTypes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDeliveryTypes',
    ),
  ),
  'ViewDeliveryTypes' => 
  array (
    'type' => 0,
    'description' => 'ViewDeliveryTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDeliveryTypes' => 
  array (
    'type' => 0,
    'description' => 'CreateDeliveryTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDeliveryTypes' => 
  array (
    'type' => 0,
    'description' => 'UpdateDeliveryTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDeliveryTypes' => 
  array (
    'type' => 0,
    'description' => 'DeleteDeliveryTypes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDemandsExecTime' => 
  array (
    'type' => 2,
    'description' => 'ManagerDemandsExecTime',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandsExecTime',
      1 => 'CreateDemandsExecTime',
      2 => 'UpdateDemandsExecTime',
    ),
  ),
  'AdminDemandsExecTime' => 
  array (
    'type' => 2,
    'description' => 'AdminDemandsExecTime',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandsExecTime',
      1 => 'CreateDemandsExecTime',
      2 => 'UpdateDemandsExecTime',
      3 => 'DeleteDemandsExecTime',
    ),
  ),
  'UserDemandsExecTime' => 
  array (
    'type' => 2,
    'description' => 'UserDemandsExecTime',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemandsExecTime',
    ),
  ),
  'ViewDemandsExecTime' => 
  array (
    'type' => 0,
    'description' => 'ViewDemandsExecTime',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDemandsExecTime' => 
  array (
    'type' => 0,
    'description' => 'CreateDemandsExecTime',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDemandsExecTime' => 
  array (
    'type' => 0,
    'description' => 'UpdateDemandsExecTime',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDemandsExecTime' => 
  array (
    'type' => 0,
    'description' => 'DeleteDemandsExecTime',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerReference' => 
  array (
    'type' => 2,
    'description' => 'ManagerReference',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerStreets',
      1 => 'ManagerRegions',
      2 => 'ManagerJuridicals',
      3 => 'ManagerStreetTypes',
      4 => 'ManagerServiceTypes',
      5 => 'ManagerDocTypes',
      6 => 'ManagerAreas',
      7 => 'ManagerBanks',
      8 => 'ManagerCustomers',
      9 => 'ManagerDemandTypes',
      10 => 'ManagerDemandPriors',
      11 => 'ManagerDelayReasons',
      12 => 'ManagerTransferReasons',
      13 => 'ManagerSystemTypes',
      14 => 'ManagerLoyaltyTypes',
      15 => 'ManagerPaymentTypes',
      16 => 'ManagerPriceChangeReasons',
      17 => 'ManagerJobTypes',
      18 => 'ManagerConfirmCancels',
      19 => 'ManagerStorages',
      20 => 'ManagerWorkTypes',
      21 => 'ManagerReceiptReasons',
      22 => 'ManagerDebtReasons',
      23 => 'ManagerResults',
      24 => 'ManagerContactKinds',
      25 => 'ManagerContactTypes',
      26 => 'ManagerObjectTypes',
      27 => 'ManagerComplexityTypes',
      28 => 'ManagerCompetitors',
      29 => 'ManagerAddressSystems',
      30 => 'ManagerNegatives',
      31 => 'ManagerEquipGroups',
      32 => 'ManagerSystemAvailabilitys',
      33 => 'ManagerFormsOfOwnership',
      34 => 'ManagerPropForms',
      35 => 'ManagerEqipGroups',
      36 => 'ManagerEquipAnalog',
      37 => 'ManagerEquipCategory',
      38 => 'ManagerEquipDetails',
      39 => 'ManagerEquipRateDetails',
      40 => 'ManagerEquipRates',
      41 => 'ManagerEquips',
      42 => 'ManagerEquipsHistory',
      43 => 'ManagerEquipsRate',
      44 => 'ManagerEquipSubgroups',
      45 => 'ManagerEquipTypes',
    ),
  ),
  'AdminReference' => 
  array (
    'type' => 2,
    'description' => 'AdminReference',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'AdminStreets',
      1 => 'AdminRegions',
      2 => 'AdminJuridicals',
      3 => 'AdminStreetTypes',
      4 => 'AdminServiceTypes',
      5 => 'AdminDocTypes',
      6 => 'AdminAreas',
      7 => 'AdminBanks',
      8 => 'AdminCustomers',
      9 => 'AdminDemandTypes',
      10 => 'AdminDemandPriors',
      11 => 'AdminDelayReasons',
      12 => 'AdminTransferReasons',
      13 => 'AdminSystemTypes',
      14 => 'AdminLoyaltyTypes',
      15 => 'AdminPaymentTypes',
      16 => 'AdminPriceChangeReasons',
      17 => 'AdminJobTypes',
      18 => 'AdminConfirmCancels',
      19 => 'AdminStorages',
      20 => 'AdminWorkTypes',
      21 => 'AdminReceiptReasons',
      22 => 'AdminDebtReasons',
      23 => 'AdminResults',
      24 => 'AdminContactKinds',
      25 => 'AdminContactTypes',
      26 => 'AdminObjectTypes',
      27 => 'AdminComplexityTypes',
      28 => 'AdminCompetitors',
      29 => 'AdminAddressSystems',
      30 => 'AdminNegatives',
      31 => 'AdminEquipGroups',
      32 => 'AdminSystemAvailabilitys',
      33 => 'AdminFormsOfOwnership',
      34 => 'AdminPropForms',
      35 => 'AdminEqipGroups',
      36 => 'AdminEquipAnalog',
      37 => 'AdminEquipCategory',
      38 => 'AdminEquipDetails',
      39 => 'AdminEquipRateDetails',
      40 => 'AdminEquipRates',
      41 => 'AdminEquips',
      42 => 'AdminEquipsHistory',
      43 => 'AdminEquipsRate',
      44 => 'AdminEquipSubgroups',
      45 => 'AdminEquipTypes',
    ),
  ),
  'UserReference' => 
  array (
    'type' => 2,
    'description' => 'UserReference',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserContacts' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContacts',
    ),
  ),
  'ManagerContacts' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContacts',
      1 => 'InsretContacts',
      2 => 'UpdateContacts',
    ),
  ),
  'AdminContacts' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContacts',
      1 => 'InsretContacts',
      2 => 'UpdateContacts',
      3 => 'DeleteContacts',
    ),
  ),
  'ViewContacts' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretContacts' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContacts' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContacts' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserEquipForMDDetails' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipForMDDetails',
    ),
  ),
  'ManagerEquipForMDDetails' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipForMDDetails',
      1 => 'InsretEquipForMDDetails',
      2 => 'UpdateEquipForMDDetails',
    ),
  ),
  'AdminEquipForMDDetails' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEquipForMDDetails',
      1 => 'InsretEquipForMDDetails',
      2 => 'UpdateEquipForMDDetails',
      3 => 'DeleteEquipForMDDetails',
    ),
  ),
  'ViewEquipForMDDetails' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretEquipForMDDetails' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEquipForMDDetails' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEquipForMDDetails' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminRepairs' => 
  array (
    'type' => 2,
    'description' => 'Админ раздела ремонт',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairs',
      1 => 'UpdateRepairs',
      2 => 'CreateRepairs',
      3 => 'DeleteRepairs',
      4 => 'SetTask',
      5 => 'SortTask',
      6 => 'ViewRepairEngineerInformation',
      7 => 'AcceptRepairs',
      8 => 'UndoAcceptRepairs',
      9 => 'SendAgreeRepairs',
      10 => 'ReadyRepairs',
      11 => 'ReturnRepairs',
      12 => 'ExecRepairs',
      13 => 'AgreeRepairs',
      14 => 'NoAgreeRepairs',
    ),
  ),
  'UserRepairs' => 
  array (
    'type' => 2,
    'description' => 'Админ раздела ремонт',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairs',
      1 => 'UpdateRepairs',
      2 => 'CreateRepairs',
    ),
  ),
  'ViewRepairs' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairs' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairs' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairs' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'SetTask' => 
  array (
    'type' => 0,
    'description' => 'SetTask',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'SortTask' => 
  array (
    'type' => 0,
    'description' => 'SortTask',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ViewRepairEngineerInformation' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairEngineerInformation',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AcceptRepairs' => 
  array (
    'type' => 0,
    'description' => 'AcceptRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ReadyRepairs' => 
  array (
    'type' => 0,
    'description' => 'ReadyRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AgreeRepairs' => 
  array (
    'type' => 0,
    'description' => 'AgreeRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'NoAgreeRepairs' => 
  array (
    'type' => 0,
    'description' => 'AgreeRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ReturnRepairs' => 
  array (
    'type' => 0,
    'description' => 'ReturnRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ExecRepairs' => 
  array (
    'type' => 0,
    'description' => 'ExecRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'SendAgreeRepairs' => 
  array (
    'type' => 0,
    'description' => 'SendAgreeRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UndoAcceptRepairs' => 
  array (
    'type' => 0,
    'description' => 'UndoAcceptRepairs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminRepairActDefectations' => 
  array (
    'type' => 2,
    'description' => 'Админ раздела ремонт',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairActDefectations',
      1 => 'UpdateRepairActDefectations',
      2 => 'CreateRepairActDefectations',
      3 => 'DeleteRepairActDefectations',
      4 => 'AgreedRepairActDefectations',
    ),
  ),
  'ViewRepairActDefectations' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairActDefectations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AgreedRepairActDefectations' => 
  array (
    'type' => 0,
    'description' => 'AgreedRepairActDefectations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairActDefectations' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairActDefectations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairActDefectations' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairActDefectations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairActDefectations' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairActDefectations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserObjects' => 
  array (
    'type' => 2,
    'description' => 'Просмотр объектов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjects',
    ),
  ),
  'ManagerObjects' => 
  array (
    'type' => 2,
    'description' => 'Просмотр объектов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjects',
      1 => 'CreateObjects',
      2 => 'UpdateObjects',
    ),
  ),
  'AdminObjects' => 
  array (
    'type' => 2,
    'description' => 'Просмотр объектов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjects',
      1 => 'CreateObjects',
      2 => 'UpdateObjects',
      3 => 'DeleteObjects',
    ),
  ),
  'ViewObjects' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateObjects' => 
  array (
    'type' => 0,
    'description' => 'Создание',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjects' => 
  array (
    'type' => 0,
    'description' => 'Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjects' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AllLoadObjects' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerWHDocuments' => 
  array (
    'type' => 2,
    'description' => 'ManagerWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'WHDocumentsView',
      1 => 'CreateWHDocuments',
      2 => 'UpdateWHDocuments',
      3 => 'AuditEquipsWHDocuments',
      4 => 'Action1WHDocuments',
      5 => 'PurchaseWHDocuments',
      6 => 'Confirm1WHDocuments',
      7 => 'AddNoteWHDocuments',
      8 => 'ReadyWHDocuments',
      9 => 'UndoReadyWHDocuments',
    ),
  ),
  'AdminWHDocuments' => 
  array (
    'type' => 2,
    'description' => 'AdminWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'WHDocumentsView',
      1 => 'CreateWHDocuments',
      2 => 'UpdateWHDocuments',
      3 => 'DeleteWHDocuments',
      4 => 'AuditEquipsWHDocuments',
      5 => 'Action1WHDocuments',
      6 => 'PurchaseWHDocuments',
      7 => 'Confirm1WHDocuments',
      8 => 'AddNoteWHDocuments',
      9 => 'ReadyWHDocuments',
      10 => 'UndoReadyWHDocuments',
    ),
  ),
  'MSWHDocuments' => 
  array (
    'type' => 2,
    'description' => 'UserWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'WHDocumentsView',
      1 => 'CreateWHDocuments',
      2 => 'AddNoteWHDocuments',
      3 => 'UpdateWHDocuments',
    ),
  ),
  'UserWHDocuments' => 
  array (
    'type' => 2,
    'description' => 'UserWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'WHDocumentsView',
    ),
  ),
  'WHDocumentsView' => 
  array (
    'type' => 0,
    'description' => 'WHDocumentsView',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'CreateWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'UpdateWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'DeleteWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AuditEquipsWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'AuditEquipsWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Action1WHDocuments' => 
  array (
    'type' => 0,
    'description' => 'Action1WHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'PurchaseWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'PurchaseWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Confirm1WHDocuments' => 
  array (
    'type' => 0,
    'description' => 'Confirm1WHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AddNoteWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'AddNoteWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ReadyWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'ReadyWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UndoReadyWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'UndoReadyWHDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDocmAchsDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerDocmAchsDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocmAchsDetails',
      1 => 'CreateDocmAchsDetails',
      2 => 'UpdateDocmAchsDetails',
    ),
  ),
  'AdminDocmAchsDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminDocmAchsDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocmAchsDetails',
      1 => 'CreateDocmAchsDetails',
      2 => 'UpdateDocmAchsDetails',
      3 => 'DeleteDocmAchsDetails',
    ),
  ),
  'UserDocmAchsDetails' => 
  array (
    'type' => 2,
    'description' => 'UserDocmAchsDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocmAchsDetails',
    ),
  ),
  'ViewDocmAchsDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewDocmAchsDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDocmAchsDetails' => 
  array (
    'type' => 0,
    'description' => 'CreateDocmAchsDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDocmAchsDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdateDocmAchsDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDocmAchsDetails' => 
  array (
    'type' => 0,
    'description' => 'DeleteDocmAchsDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminDeliveryDemands' => 
  array (
    'type' => 2,
    'description' => 'Админ',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDeliveryDemands',
      1 => 'EditDeliveryDemands',
      2 => 'InsertDeliveryDemands',
      3 => 'DeleteDeliveryDemands',
      4 => 'LogDeliveryDemands',
      5 => 'ToLogistDeliveryDemands',
      6 => 'UndoExecDeliveryDemands',
    ),
  ),
  'UserDeliveryDemands' => 
  array (
    'type' => 2,
    'description' => 'Просмотр заявок на доставку',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDeliveryDemands',
      1 => 'InsertDeliveryDemands',
      2 => 'EditDeliveryDemands',
    ),
  ),
  'ManagerDeliveryDemands' => 
  array (
    'type' => 2,
    'description' => 'Просмотр заявок на доставку',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDeliveryDemands',
      1 => 'EditDeliveryDemands',
      2 => 'InsertDeliveryDemands',
      3 => 'LogDeliveryDemands',
      4 => 'ToLogistDeliveryDemands',
    ),
  ),
  'ViewDeliveryDemands' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'EditDeliveryDemands' => 
  array (
    'type' => 0,
    'description' => 'Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsertDeliveryDemands' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDeliveryDemands' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'LogDeliveryDemands' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'EditDeliveryDemands',
    ),
  ),
  'ToLogistDeliveryDemands' => 
  array (
    'type' => 0,
    'description' => 'Передать логисту',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UndoExecDeliveryDemands' => 
  array (
    'type' => 0,
    'description' => 'Отменить выполнение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDemands' => 
  array (
    'type' => 2,
    'description' => 'ManagerDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemands',
      1 => 'CreateDemands',
      2 => 'UpdateDemands',
      3 => 'WorkedOut',
    ),
  ),
  'ManagerDemands+' => 
  array (
    'type' => 2,
    'description' => 'ManagerDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemands',
      1 => 'CreateDemands',
      2 => 'UpdateDemands',
      3 => 'WorkedOut',
      4 => 'ChangeTypeCallback',
    ),
  ),
  'SeniorDemands' => 
  array (
    'type' => 2,
    'description' => 'ManagerDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemands',
      1 => 'CreateDemands',
      2 => 'UpdateDemands',
      3 => 'ChangeType',
      4 => 'WorkedOut',
    ),
  ),
  'AdminDemands' => 
  array (
    'type' => 2,
    'description' => 'AdminDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemands',
      1 => 'CreateDemands',
      2 => 'UpdateDemands',
      3 => 'DeleteDemands',
      4 => 'ChangeType',
      5 => 'WorkedOut',
      6 => 'UndoDemands',
    ),
  ),
  'UserDemands' => 
  array (
    'type' => 2,
    'description' => 'UserDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDemands',
    ),
  ),
  'ViewDemands' => 
  array (
    'type' => 0,
    'description' => 'ViewDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDemands' => 
  array (
    'type' => 0,
    'description' => 'CreateDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDemands' => 
  array (
    'type' => 0,
    'description' => 'UpdateDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDemands' => 
  array (
    'type' => 0,
    'description' => 'DeleteDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UndoDemands' => 
  array (
    'type' => 0,
    'description' => 'UndoDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ChangeType' => 
  array (
    'type' => 0,
    'description' => 'ChangeType',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ChangeTypeCallback' => 
  array (
    'type' => 0,
    'description' => 'ChangeTypeCallback',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WorkedOut' => 
  array (
    'type' => 0,
    'description' => 'WorkedOut',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerExecuteReports' => 
  array (
    'type' => 2,
    'description' => 'ManagerExecuteReports',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewExecuteReports',
      1 => 'CreateExecuteReports',
      2 => 'UpdateExecuteReports',
      3 => 'DeleteExecuteReports',
    ),
  ),
  'AdminExecuteReports' => 
  array (
    'type' => 2,
    'description' => 'AdminExecuteReports',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewExecuteReports',
      1 => 'CreateExecuteReports',
      2 => 'UpdateExecuteReports',
      3 => 'DeleteExecuteReports',
    ),
  ),
  'UserExecuteReports' => 
  array (
    'type' => 2,
    'description' => 'UserExecuteReports',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewExecuteReports',
    ),
  ),
  'ViewExecuteReports' => 
  array (
    'type' => 0,
    'description' => 'ViewExecuteReports',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateExecuteReports' => 
  array (
    'type' => 0,
    'description' => 'CreateExecuteReports',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateExecuteReports' => 
  array (
    'type' => 0,
    'description' => 'UpdateExecuteReports',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteExecuteReports' => 
  array (
    'type' => 0,
    'description' => 'DeleteExecuteReports',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserContactInfo' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactInfo',
    ),
  ),
  'ManagerContactInfo' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactInfo',
      1 => 'InsretContactInfo',
      2 => 'UpdateContactInfo',
    ),
  ),
  'AdminContactInfo' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContactInfo',
      1 => 'InsretContactInfo',
      2 => 'UpdateContactInfo',
      3 => 'DeleteContactInfo',
    ),
  ),
  'ViewContactInfo' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretContactInfo' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContactInfo' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContactInfo' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserObjectsGroupSystems' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupSystems',
    ),
  ),
  'ManagerObjectsGroupSystems' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupSystems',
      1 => 'InsretObjectsGroupSystems',
      2 => 'UpdateObjectsGroupSystems',
    ),
  ),
  'AdminObjectsGroupSystems' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupSystems',
      1 => 'InsretObjectsGroupSystems',
      2 => 'UpdateObjectsGroupSystems',
      3 => 'DeleteObjectsGroupSystems',
      4 => 'StateObjectsGroupSystems',
    ),
  ),
  'ViewObjectsGroupSystems' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretObjectsGroupSystems' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjectsGroupSystems' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjectsGroupSystems' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'StateObjectsGroupSystems' => 
  array (
    'type' => 0,
    'description' => 'Проставлять состояние системы',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WhActsView' => 
  array (
    'type' => 2,
    'description' => 'Реестр актов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWhActs',
    ),
  ),
  'UserWhActs' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWhActs',
      1 => 'InsertWhActs',
      2 => 'UpdateWhActs',
      3 => 'AddTrebWhActs',
    ),
  ),
  'ManagerWhActs' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWhActs',
      1 => 'InsertWhActs',
      2 => 'UpdateWhActs',
      3 => 'ConfirmWhActs',
      4 => 'AddTrebWhActs',
      5 => 'UndoWhActs',
    ),
  ),
  'AdminWhActs' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWhActs',
      1 => 'InsertWhActs',
      2 => 'UpdateWhActs',
      3 => 'ConfirmWhActs',
      4 => 'AddTrebWhActs',
      5 => 'DeleteWhActs',
      6 => 'UndoWhActs',
    ),
  ),
  'ViewWhActs' => 
  array (
    'type' => 0,
    'description' => 'Просмотр актов',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateWhActs' => 
  array (
    'type' => 0,
    'description' => 'Редактирование акта',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsertWhActs' => 
  array (
    'type' => 0,
    'description' => 'Создание акта',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteWhActs' => 
  array (
    'type' => 0,
    'description' => 'Удаление акта',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ConfirmWhActs' => 
  array (
    'type' => 0,
    'description' => 'Подтверждение акта',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UndoWhActs' => 
  array (
    'type' => 0,
    'description' => 'Подтверждение акта',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AddTrebWhActs' => 
  array (
    'type' => 0,
    'description' => 'Добавление требования к аткту',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserActEquips' => 
  array (
    'type' => 2,
    'description' => 'Реестр актов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewActEquips',
    ),
  ),
  'ManagerActEquips' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewActEquips',
      1 => 'InsertActEquips',
      2 => 'UpdateActEquips',
      3 => 'DeleteActEquips',
    ),
  ),
  'AdminActEquips' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewActEquips',
      1 => 'InsertActEquips',
      2 => 'UpdateActEquips',
      3 => 'DeleteActEquips',
    ),
  ),
  'ViewActEquips' => 
  array (
    'type' => 0,
    'description' => 'Просмотр позиций оборудования',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsertActEquips' => 
  array (
    'type' => 0,
    'description' => 'Добавления обрудования',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateActEquips' => 
  array (
    'type' => 0,
    'description' => 'Редактирования оборудования',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteActEquips' => 
  array (
    'type' => 0,
    'description' => 'Редактирования оборудования',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'FindTreb' => 
  array (
    'type' => 0,
    'description' => 'Поиск требования',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'FindWHDoc1' => 
  array (
    'type' => 0,
    'description' => 'Поиск накладной на приход',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCategories' => 
  array (
    'type' => 2,
    'description' => 'ManagerCategories',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCategories',
      1 => 'CreateCategories',
      2 => 'UpdateCategories',
    ),
  ),
  'UserCategories' => 
  array (
    'type' => 2,
    'description' => 'UserCategories',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCategories',
    ),
  ),
  'AdminCategories' => 
  array (
    'type' => 2,
    'description' => 'AdminCategories',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCategories',
      1 => 'CreateCategories',
      2 => 'UpdateCategories',
      3 => 'DeleteCategories',
    ),
  ),
  'ViewCategories' => 
  array (
    'type' => 0,
    'description' => 'ViewCategories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateCategories' => 
  array (
    'type' => 0,
    'description' => 'CreateCategories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCategories' => 
  array (
    'type' => 0,
    'description' => 'UpdateCategories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCategories' => 
  array (
    'type' => 0,
    'description' => 'DeleteCategories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserSuppliers' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSuppliers',
      1 => 'AssortmentSuppliers',
    ),
  ),
  'ManagerSuppliers' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSuppliers',
      1 => 'UpdateSuppliers',
      2 => 'InsertSuppliers',
      3 => 'AssortmentSuppliers',
    ),
  ),
  'AdminSuppliers' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование + Удаление',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSuppliers',
      1 => 'UpdateSuppliers',
      2 => 'InsertSuppliers',
      3 => 'DeleteSuppliers',
      4 => 'AssortmentSuppliers',
    ),
  ),
  'ViewSuppliers' => 
  array (
    'type' => 0,
    'description' => 'Просмотр поставщиков',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSuppliers' => 
  array (
    'type' => 0,
    'description' => 'Редактирование поставщиков',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsertSuppliers' => 
  array (
    'type' => 0,
    'description' => 'Создание поставщиков',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSuppliers' => 
  array (
    'type' => 0,
    'description' => 'Удаление поставщиков',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AssortmentSuppliers' => 
  array (
    'type' => 0,
    'description' => 'Ассортимент',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPositions' => 
  array (
    'type' => 2,
    'description' => 'ManagerPositions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPositions',
      1 => 'CreatePositions',
      2 => 'UpdatePositions',
    ),
  ),
  'AdminPositions' => 
  array (
    'type' => 2,
    'description' => 'AdminPositions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPositions',
      1 => 'CreatePositions',
      2 => 'UpdatePositions',
      3 => 'DeletePositions',
    ),
  ),
  'UserPositions' => 
  array (
    'type' => 2,
    'description' => 'UserPositions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPositions',
    ),
  ),
  'ViewPositions' => 
  array (
    'type' => 0,
    'description' => 'ViewPositions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePositions' => 
  array (
    'type' => 0,
    'description' => 'CreatePositions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePositions' => 
  array (
    'type' => 0,
    'description' => 'UpdatePositions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePositions' => 
  array (
    'type' => 0,
    'description' => 'DeletePositions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDepartments' => 
  array (
    'type' => 2,
    'description' => 'ManagerDepartments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDepartments',
      1 => 'CreateDepartments',
      2 => 'UpdateDepartments',
    ),
  ),
  'AdminDepartments' => 
  array (
    'type' => 2,
    'description' => 'AdminDepartments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDepartments',
      1 => 'CreateDepartments',
      2 => 'UpdateDepartments',
      3 => 'DeleteDepartments',
    ),
  ),
  'UserDepartments' => 
  array (
    'type' => 2,
    'description' => 'UserDepartments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDepartments',
    ),
  ),
  'ViewDepartments' => 
  array (
    'type' => 0,
    'description' => 'ViewDepartments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDepartments' => 
  array (
    'type' => 0,
    'description' => 'CreateDepartments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDepartments' => 
  array (
    'type' => 0,
    'description' => 'UpdateDepartments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDepartments' => 
  array (
    'type' => 0,
    'description' => 'DeleteDepartments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerSections' => 
  array (
    'type' => 2,
    'description' => 'ManagerSections',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSections',
      1 => 'CreateSections',
      2 => 'UpdateSections',
    ),
  ),
  'AdminSections' => 
  array (
    'type' => 2,
    'description' => 'AdminSections',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSections',
      1 => 'CreateSections',
      2 => 'UpdateSections',
      3 => 'DeleteSections',
    ),
  ),
  'UserSections' => 
  array (
    'type' => 2,
    'description' => 'UserSections',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSections',
    ),
  ),
  'ViewSections' => 
  array (
    'type' => 0,
    'description' => 'ViewSections',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSections' => 
  array (
    'type' => 0,
    'description' => 'CreateSections',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSections' => 
  array (
    'type' => 0,
    'description' => 'UpdateSections',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSections' => 
  array (
    'type' => 0,
    'description' => 'DeleteSections',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerChildrens' => 
  array (
    'type' => 2,
    'description' => 'ManagerChildrens',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewChildrens',
      1 => 'CreateChildrens',
      2 => 'UpdateChildrens',
    ),
  ),
  'AdminChildrens' => 
  array (
    'type' => 2,
    'description' => 'AdminChildrens',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewChildrens',
      1 => 'CreateChildrens',
      2 => 'UpdateChildrens',
      3 => 'DeleteChildrens',
    ),
  ),
  'UserChildrens' => 
  array (
    'type' => 2,
    'description' => 'UserChildrens',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewChildrens',
    ),
  ),
  'ViewChildrens' => 
  array (
    'type' => 0,
    'description' => 'ViewChildrens',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateChildrens' => 
  array (
    'type' => 0,
    'description' => 'CreateChildrens',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateChildrens' => 
  array (
    'type' => 0,
    'description' => 'UpdateChildrens',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteChildrens' => 
  array (
    'type' => 0,
    'description' => 'DeleteChildrens',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerSpecialDays' => 
  array (
    'type' => 2,
    'description' => 'ManagerSpecialDays',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSpecialDays',
      1 => 'CreateSpecialDays',
      2 => 'UpdateSpecialDays',
    ),
  ),
  'AdminSpecialDays' => 
  array (
    'type' => 2,
    'description' => 'AdminSpecialDays',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSpecialDays',
      1 => 'CreateSpecialDays',
      2 => 'UpdateSpecialDays',
      3 => 'DeleteSpecialDays',
    ),
  ),
  'UserSpecialDays' => 
  array (
    'type' => 2,
    'description' => 'UserSpecialDays',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSpecialDays',
    ),
  ),
  'ViewSpecialDays' => 
  array (
    'type' => 0,
    'description' => 'ViewSpecialDays',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSpecialDays' => 
  array (
    'type' => 0,
    'description' => 'CreateSpecialDays',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSpecialDays' => 
  array (
    'type' => 0,
    'description' => 'UpdateSpecialDays',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSpecialDays' => 
  array (
    'type' => 0,
    'description' => 'DeleteSpecialDays',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEmployees' => 
  array (
    'type' => 2,
    'description' => 'ManagerEmployees',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEmployees',
      1 => 'CreateEmployees',
      2 => 'UpdateEmployees',
    ),
  ),
  'AdminEmployees' => 
  array (
    'type' => 2,
    'description' => 'AdminEmployees',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEmployees',
      1 => 'CreateEmployees',
      2 => 'UpdateEmployees',
      3 => 'DeleteEmployees',
      4 => 'ManagerEmployees',
    ),
  ),
  'UserEmployees' => 
  array (
    'type' => 2,
    'description' => 'UserEmployees',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEmployees',
    ),
  ),
  'ViewEmployees' => 
  array (
    'type' => 0,
    'description' => 'ViewEmployees',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEmployees' => 
  array (
    'type' => 0,
    'description' => 'CreateEmployees',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEmployees' => 
  array (
    'type' => 0,
    'description' => 'UpdateEmployees',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEmployees' => 
  array (
    'type' => 0,
    'description' => 'DeleteEmployees',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInstructings' => 
  array (
    'type' => 2,
    'description' => 'ManagerInstructings',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInstructings',
      1 => 'CreateInstructings',
      2 => 'UpdateInstructings',
    ),
  ),
  'AdminInstructings' => 
  array (
    'type' => 2,
    'description' => 'AdminInstructings',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInstructings',
      1 => 'CreateInstructings',
      2 => 'UpdateInstructings',
      3 => 'DeleteInstructings',
    ),
  ),
  'UserInstructings' => 
  array (
    'type' => 2,
    'description' => 'UserInstructings',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInstructings',
    ),
  ),
  'ViewInstructings' => 
  array (
    'type' => 0,
    'description' => 'ViewInstructings',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInstructings' => 
  array (
    'type' => 0,
    'description' => 'CreateInstructings',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInstructings' => 
  array (
    'type' => 0,
    'description' => 'UpdateInstructings',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInstructings' => 
  array (
    'type' => 0,
    'description' => 'DeleteInstructings',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserControlContacts' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewControlContacts',
    ),
  ),
  'ManagerControlContacts' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewControlContacts',
      1 => 'InsretControlContacts',
      2 => 'UpdateControlContacts',
    ),
  ),
  'AdminControlContacts' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewControlContacts',
      1 => 'InsretControlContacts',
      2 => 'UpdateControlContacts',
      3 => 'DeleteControlContacts',
    ),
  ),
  'ViewControlContacts' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretControlContacts' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateControlContacts' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteControlContacts' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerContractsS' => 
  array (
    'type' => 2,
    'description' => 'ManagerContractsS',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractsS',
      1 => 'CreateContractsS',
      2 => 'UpdateContractsS',
    ),
  ),
  'AdminContractsS' => 
  array (
    'type' => 2,
    'description' => 'AdminContractsS',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractsS',
      1 => 'CreateContractsS',
      2 => 'UpdateContractsS',
      3 => 'DeleteContractsS',
    ),
  ),
  'UserContractsS' => 
  array (
    'type' => 2,
    'description' => 'UserContractsS',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractsS',
    ),
  ),
  'ViewContractsS' => 
  array (
    'type' => 0,
    'description' => 'ViewContractsS',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateContractsS' => 
  array (
    'type' => 0,
    'description' => 'CreateContractsS',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContractsS' => 
  array (
    'type' => 0,
    'description' => 'UpdateContractsS',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContractsS' => 
  array (
    'type' => 0,
    'description' => 'DeleteContractsS',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserContractsDetails_v' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractsDetails_v',
    ),
  ),
  'ManagerContractsDetails_v' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractsDetails_v',
      1 => 'InsretContractsDetails_v',
      2 => 'UpdateContractsDetails_v',
    ),
  ),
  'AdminContractsDetails_v' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractsDetails_v',
      1 => 'InsretContractsDetails_v',
      2 => 'UpdateContractsDetails_v',
      3 => 'DeleteContractsDetails_v',
    ),
  ),
  'ViewContractsDetails_v' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretContractsDetails_v' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContractsDetails_v' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContractsDetails_v' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminDocuments' => 
  array (
    'type' => 2,
    'description' => 'AdminDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocuments',
      1 => 'InsertDocuments',
      2 => 'UpdateDocuments',
      3 => 'DeleteDocuments',
      4 => 'CheckupDocuments',
    ),
  ),
  'ManagerDocuments' => 
  array (
    'type' => 2,
    'description' => 'ManagerDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocuments',
      1 => 'InsertDocuments',
      2 => 'UpdateDocuments',
    ),
  ),
  'UserDocuments' => 
  array (
    'type' => 2,
    'description' => 'UserDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDocuments',
    ),
  ),
  'ViewDocuments' => 
  array (
    'type' => 0,
    'description' => 'ViewDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsertDocuments' => 
  array (
    'type' => 0,
    'description' => 'InsertDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDocuments' => 
  array (
    'type' => 0,
    'description' => 'UpdateDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDocuments' => 
  array (
    'type' => 0,
    'description' => 'DeleteDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CheckupDocuments' => 
  array (
    'type' => 0,
    'description' => 'CheckupDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerReplaceMaster' => 
  array (
    'type' => 2,
    'description' => 'ManagerReplaceMaster',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewReplaceMaster',
      1 => 'CreateReplaceMaster',
      2 => 'UpdateReplaceMaster',
    ),
  ),
  'AdminReplaceMaster' => 
  array (
    'type' => 2,
    'description' => 'AdminReplaceMaster',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewReplaceMaster',
      1 => 'CreateReplaceMaster',
      2 => 'UpdateReplaceMaster',
      3 => 'DeleteReplaceMaster',
    ),
  ),
  'UserReplaceMaster' => 
  array (
    'type' => 2,
    'description' => 'UserReplaceMaster',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewReplaceMaster',
    ),
  ),
  'ViewReplaceMaster' => 
  array (
    'type' => 0,
    'description' => 'ViewReplaceMaster',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateReplaceMaster' => 
  array (
    'type' => 0,
    'description' => 'CreateReplaceMaster',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateReplaceMaster' => 
  array (
    'type' => 0,
    'description' => 'UpdateReplaceMaster',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteReplaceMaster' => 
  array (
    'type' => 0,
    'description' => 'DeleteReplaceMaster',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerRepDebtReasons' => 
  array (
    'type' => 2,
    'description' => 'ManagerRepDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepDebtReasons',
      1 => 'CreateRepDebtReasons',
      2 => 'UpdateRepDebtReasons',
    ),
  ),
  'AdminRepDebtReasons' => 
  array (
    'type' => 2,
    'description' => 'AdminRepDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepDebtReasons',
      1 => 'CreateRepDebtReasons',
      2 => 'UpdateRepDebtReasons',
      3 => 'DeleteRepDebtReasons',
    ),
  ),
  'UserRepDebtReasons' => 
  array (
    'type' => 2,
    'description' => 'UserRepDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepDebtReasons',
    ),
  ),
  'ViewRepDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'ViewRepDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'CreateRepDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepDebtReasons' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepDebtReasons',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerRepDebtReasonDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerRepDebtReasonDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepDebtReasonDetails',
      1 => 'CreateRepDebtReasonDetails',
      2 => 'UpdateRepDebtReasonDetails',
    ),
  ),
  'AdminRepDebtReasonDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminRepDebtReasonDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepDebtReasonDetails',
      1 => 'CreateRepDebtReasonDetails',
      2 => 'UpdateRepDebtReasonDetails',
      3 => 'DeleteRepDebtReasonDetails',
    ),
  ),
  'UserRepDebtReasonDetails' => 
  array (
    'type' => 2,
    'description' => 'UserRepDebtReasonDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepDebtReasonDetails',
    ),
  ),
  'ViewRepDebtReasonDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewRepDebtReasonDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepDebtReasonDetails' => 
  array (
    'type' => 0,
    'description' => 'CreateRepDebtReasonDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepDebtReasonDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepDebtReasonDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepDebtReasonDetails' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepDebtReasonDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEvents' => 
  array (
    'type' => 2,
    'description' => 'ManagerEvents',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEvents',
      1 => 'CreateEvents',
      2 => 'UpdateEvents',
    ),
  ),
  'AdminEvents' => 
  array (
    'type' => 2,
    'description' => 'AdminEvents',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEvents',
      1 => 'CreateEvents',
      2 => 'UpdateEvents',
      3 => 'DeleteEvents',
    ),
  ),
  'UserEvents' => 
  array (
    'type' => 2,
    'description' => 'UserEvents',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEvents',
    ),
  ),
  'ViewEvents' => 
  array (
    'type' => 0,
    'description' => 'ViewEvents',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEvents' => 
  array (
    'type' => 0,
    'description' => 'CreateEvents',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEvents' => 
  array (
    'type' => 0,
    'description' => 'UpdateEvents',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEvents' => 
  array (
    'type' => 0,
    'description' => 'DeleteEvents',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerEventOffers' => 
  array (
    'type' => 2,
    'description' => 'ManagerEventOffers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEventOffers',
      1 => 'CreateEventOffers',
      2 => 'UpdateEventOffers',
    ),
  ),
  'AdminEventOffers' => 
  array (
    'type' => 2,
    'description' => 'AdminEventOffers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEventOffers',
      1 => 'CreateEventOffers',
      2 => 'UpdateEventOffers',
      3 => 'DeleteEventOffers',
    ),
  ),
  'UserEventOffers' => 
  array (
    'type' => 2,
    'description' => 'UserEventOffers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewEventOffers',
    ),
  ),
  'ViewEventOffers' => 
  array (
    'type' => 0,
    'description' => 'ViewEventOffers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateEventOffers' => 
  array (
    'type' => 0,
    'description' => 'CreateEventOffers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateEventOffers' => 
  array (
    'type' => 0,
    'description' => 'UpdateEventOffers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteEventOffers' => 
  array (
    'type' => 0,
    'description' => 'DeleteEventOffers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerTasks' => 
  array (
    'type' => 2,
    'description' => 'ManagerTasks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTasks',
      1 => 'CreateTasks',
      2 => 'UpdateTasks',
    ),
  ),
  'AdminTasks' => 
  array (
    'type' => 2,
    'description' => 'AdminTasks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTasks',
      1 => 'CreateTasks',
      2 => 'UpdateTasks',
      3 => 'DeleteTasks',
    ),
  ),
  'UserTasks' => 
  array (
    'type' => 2,
    'description' => 'UserTasks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTasks',
    ),
  ),
  'ViewTasks' => 
  array (
    'type' => 0,
    'description' => 'ViewTasks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateTasks' => 
  array (
    'type' => 0,
    'description' => 'CreateTasks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateTasks' => 
  array (
    'type' => 0,
    'description' => 'UpdateTasks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteTasks' => 
  array (
    'type' => 0,
    'description' => 'DeleteTasks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerTaskNotes' => 
  array (
    'type' => 2,
    'description' => 'ManagerTaskNotes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTaskNotes',
      1 => 'CreateTaskNotes',
      2 => 'UpdateTaskNotes',
    ),
  ),
  'AdminTaskNotes' => 
  array (
    'type' => 2,
    'description' => 'AdminTaskNotes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTaskNotes',
      1 => 'CreateTaskNotes',
      2 => 'UpdateTaskNotes',
      3 => 'DeleteTaskNotes',
    ),
  ),
  'UserTaskNotes' => 
  array (
    'type' => 2,
    'description' => 'UserTaskNotes',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTaskNotes',
    ),
  ),
  'ViewTaskNotes' => 
  array (
    'type' => 0,
    'description' => 'ViewTaskNotes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateTaskNotes' => 
  array (
    'type' => 0,
    'description' => 'CreateTaskNotes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateTaskNotes' => 
  array (
    'type' => 0,
    'description' => 'UpdateTaskNotes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteTaskNotes' => 
  array (
    'type' => 0,
    'description' => 'DeleteTaskNotes',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerTaskExecutors' => 
  array (
    'type' => 2,
    'description' => 'ManagerTaskExecutors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTaskExecutors',
      1 => 'CreateTaskExecutors',
      2 => 'UpdateTaskExecutors',
    ),
  ),
  'AdminTaskExecutors' => 
  array (
    'type' => 2,
    'description' => 'AdminTaskExecutors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTaskExecutors',
      1 => 'CreateTaskExecutors',
      2 => 'UpdateTaskExecutors',
      3 => 'DeleteTaskExecutors',
    ),
  ),
  'UserTaskExecutors' => 
  array (
    'type' => 2,
    'description' => 'UserTaskExecutors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewTaskExecutors',
    ),
  ),
  'ViewTaskExecutors' => 
  array (
    'type' => 0,
    'description' => 'ViewTaskExecutors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateTaskExecutors' => 
  array (
    'type' => 0,
    'description' => 'CreateTaskExecutors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateTaskExecutors' => 
  array (
    'type' => 0,
    'description' => 'UpdateTaskExecutors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteTaskExecutors' => 
  array (
    'type' => 0,
    'description' => 'DeleteTaskExecutors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerRepairMaterials' => 
  array (
    'type' => 2,
    'description' => 'ManagerRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairDetails',
      1 => 'CreateRepairDetails',
      2 => 'UpdateRepairDetails',
    ),
  ),
  'AdminRepairMaterials' => 
  array (
    'type' => 2,
    'description' => 'AdminRepairMaterials',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairMaterials',
      1 => 'CreateRepairMaterials',
      2 => 'UpdateRepairMaterials',
      3 => 'DeleteRepairMaterials',
    ),
  ),
  'UserRepairMaterials' => 
  array (
    'type' => 2,
    'description' => 'UserRepairMaterials',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairMaterials',
    ),
  ),
  'ViewRepairMaterials' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairMaterials',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairMaterials' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairMaterials',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairMaterials' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairMaterials',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairMaterials' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairMaterials',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerRepairDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairDetails',
      1 => 'CreateRepairDetails',
      2 => 'UpdateRepairDetails',
    ),
  ),
  'AdminRepairDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairDetails',
      1 => 'CreateRepairDetails',
      2 => 'UpdateRepairDetails',
      3 => 'DeleteRepairDetails',
    ),
  ),
  'UserRepairDetails' => 
  array (
    'type' => 2,
    'description' => 'UserRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairDetails',
    ),
  ),
  'ViewRepairDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairDetails' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairDetails' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminRepairSRM' => 
  array (
    'type' => 2,
    'description' => 'Админ раздела ремонт',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairSRM',
      1 => 'UpdateRepairSRM',
      2 => 'CreateRepairSRM',
      3 => 'DeleteRepairSRM',
      4 => 'AgreedRepairSRM',
    ),
  ),
  'ViewRepairSRM' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairSRM',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AgreedRepairSRM' => 
  array (
    'type' => 0,
    'description' => 'AgreedRepairSRM',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairSRM' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairSRM',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairSRM' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairSRM',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairSRM' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairSRM',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminRepairWarrantys' => 
  array (
    'type' => 2,
    'description' => 'Админ раздела ремонт',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairWarrantys',
      1 => 'UpdateRepairWarrantys',
      2 => 'CreateRepairWarrantys',
      3 => 'DeleteRepairWarrantys',
      4 => 'AgreedRepairWarrantys',
    ),
  ),
  'ViewRepairWarrantys' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairWarrantys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AgreedRepairWarrantys' => 
  array (
    'type' => 0,
    'description' => 'AgreedRepairWarrantys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairWarrantys' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairWarrantys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairWarrantys' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairWarrantys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairWarrantys' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairWarrantys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AdminRepairActUtilizations' => 
  array (
    'type' => 2,
    'description' => 'Админ раздела ремонт',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairActUtilizations',
      1 => 'UpdateRepairActUtilizations',
      2 => 'CreateRepairActUtilizations',
      3 => 'DeleteRepairActUtilizations',
      4 => 'AgreedRepairActUtilizations',
    ),
  ),
  'ViewRepairActUtilizations' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairActUtilizations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AgreedRepairActUtilizations' => 
  array (
    'type' => 0,
    'description' => 'AgreedRepairActUtilizations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairActUtilizations' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairActUtilizations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairActUtilizations' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairActUtilizations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairActUtilizations' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairActUtilizations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerRepairDocs' => 
  array (
    'type' => 2,
    'description' => 'ManagerRepairDocs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairDocs',
      1 => 'CreateRepairDocs',
      2 => 'UpdateRepairDocs',
    ),
  ),
  'AdminRepairDocs' => 
  array (
    'type' => 2,
    'description' => 'AdminRepairDocs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairDocs',
      1 => 'CreateRepairDocs',
      2 => 'UpdateRepairDocs',
      3 => 'DeleteRepairDocs',
    ),
  ),
  'UserRepairDocs' => 
  array (
    'type' => 2,
    'description' => 'UserRepairDocs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairDocs',
    ),
  ),
  'ViewRepairDocs' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairDocs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairDocs' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairDocs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairDocs' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairDocs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairDocs' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairDocs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerRepairComments' => 
  array (
    'type' => 2,
    'description' => 'ManagerRepairComments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairComments',
      1 => 'CreateRepairComments',
      2 => 'UpdateRepairComments',
    ),
  ),
  'AdminRepairComments' => 
  array (
    'type' => 2,
    'description' => 'AdminRepairComments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairComments',
      1 => 'CreateRepairComments',
      2 => 'UpdateRepairComments',
      3 => 'DeleteRepairComments',
    ),
  ),
  'UserRepairComments' => 
  array (
    'type' => 2,
    'description' => 'UserRepairComments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewRepairComments',
    ),
  ),
  'ViewRepairComments' => 
  array (
    'type' => 0,
    'description' => 'ViewRepairComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateRepairComments' => 
  array (
    'type' => 0,
    'description' => 'CreateRepairComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateRepairComments' => 
  array (
    'type' => 0,
    'description' => 'UpdateRepairComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteRepairComments' => 
  array (
    'type' => 0,
    'description' => 'DeleteRepairComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReportAll' => 
  array (
    'type' => 0,
    'description' => 'Заявки',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport1' => 
  array (
    'type' => 0,
    'description' => 'Отчет по заявкам Call-центра',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport2' => 
  array (
    'type' => 0,
    'description' => 'Чужие и удаленные заявки СЦ',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport3' => 
  array (
    'type' => 0,
    'description' => 'Заявки по объектам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport4' => 
  array (
    'type' => 0,
    'description' => 'Заявки по мастерам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport5' => 
  array (
    'type' => 0,
    'description' => 'Заявки (общий отчет)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport6' => 
  array (
    'type' => 0,
    'description' => 'Заявки (общий отчет) без хода работ',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport7' => 
  array (
    'type' => 0,
    'description' => 'Нарушение сроков выполнения',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport8' => 
  array (
    'type' => 0,
    'description' => 'Нарушение сроков выполнения (детальный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport9' => 
  array (
    'type' => 0,
    'description' => 'Заявки переданные не вовремя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport10' => 
  array (
    'type' => 0,
    'description' => 'Отчет по модернизациям',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport11' => 
  array (
    'type' => 0,
    'description' => 'Универсальный отчет',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsReport12' => 
  array (
    'type' => 0,
    'description' => 'Заявки для передачи мастеру',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocumentsReportAll' => 
  array (
    'type' => 0,
    'description' => 'Склад',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments1Report' => 
  array (
    'type' => 0,
    'description' => 'Выданное оборудование (детальный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments3Report' => 
  array (
    'type' => 0,
    'description' => 'Приход на склад от поставщиков',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments4Report' => 
  array (
    'type' => 0,
    'description' => 'Приход на склад от поставщиков (детальный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments5Report' => 
  array (
    'type' => 0,
    'description' => 'Приход товара за период',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments6Report' => 
  array (
    'type' => 0,
    'description' => 'Расход товара за период',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments7Report' => 
  array (
    'type' => 0,
    'description' => 'Расход товара за период (суммарный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments8Report' => 
  array (
    'type' => 0,
    'description' => 'Возврат на склад от мастеров (суммарный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments9Report' => 
  array (
    'type' => 0,
    'description' => 'Возврат на склад от мастеров (детальный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments10Report' => 
  array (
    'type' => 0,
    'description' => 'Оборудование готовое к выдаче',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHDocuments11Report' => 
  array (
    'type' => 0,
    'description' => 'Нарушение сроков выполнения',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHActsAll' => 
  array (
    'type' => 0,
    'description' => 'Списание оборудования',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHActs1Report' => 
  array (
    'type' => 0,
    'description' => 'Отчет по списанию (детальный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHActs2Report' => 
  array (
    'type' => 0,
    'description' => 'Отчет по списанию (суммарный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHActs3Report' => 
  array (
    'type' => 0,
    'description' => 'Оборудование числящееся за мастерами',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'WHActs4Report' => 
  array (
    'type' => 0,
    'description' => 'Движение ТМЦ',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'EmployeesReportAll' => 
  array (
    'type' => 0,
    'description' => 'Кадры',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Employee1Report' => 
  array (
    'type' => 0,
    'description' => 'Сорудники',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Employee2Report' => 
  array (
    'type' => 0,
    'description' => 'Сорудники (детальный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Employee3Report' => 
  array (
    'type' => 0,
    'description' => 'Дни рождения',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ContactsReportAll' => 
  array (
    'type' => 0,
    'description' => 'Контакты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ContactsReport' => 
  array (
    'type' => 0,
    'description' => 'Контактные лица',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectsMasterReport' => 
  array (
    'type' => 0,
    'description' => 'Объекты по мастерам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectServiceTypeReport' => 
  array (
    'type' => 0,
    'description' => 'Объекты по тарифам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectServiceTypeEquipsReport' => 
  array (
    'type' => 0,
    'description' => 'Объекты по тарифам (Оборудование)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'PricesIncreaseReport' => 
  array (
    'type' => 0,
    'description' => 'Повышение расценок',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DepartedCustomersReport' => 
  array (
    'type' => 0,
    'description' => 'Ушедшие клиенты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsObjectsReport' => 
  array (
    'type' => 0,
    'description' => 'Заявки по объектам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsMastersReport' => 
  array (
    'type' => 0,
    'description' => 'Заявки по мастерам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsListDetailsReport' => 
  array (
    'type' => 0,
    'description' => 'Заявки (общий отчет)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsListReport' => 
  array (
    'type' => 0,
    'description' => 'Заявки (общий отчет) без хода работ',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsBrokenDeadlinesReport' => 
  array (
    'type' => 0,
    'description' => 'Нарушение сроков выполнения',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsBrokenDeadlinesDetailsReport' => 
  array (
    'type' => 0,
    'description' => 'Нарушение сроков выполнения (детальный)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DebtorsReportAll' => 
  array (
    'type' => 0,
    'description' => 'Дебиторка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Debt1Report' => 
  array (
    'type' => 0,
    'description' => 'Дебиторка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Debt2Report' => 
  array (
    'type' => 0,
    'description' => 'Дебиторка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ContractsReportAll' => 
  array (
    'type' => 0,
    'description' => 'Договора',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Contract1Report' => 
  array (
    'type' => 0,
    'description' => 'Список договоров на обслуживании',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectsSystemsReport' => 
  array (
    'type' => 0,
    'description' => 'Установленные системы на объектах',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsSubmittedTooLateReport' => 
  array (
    'type' => 0,
    'description' => 'Заявки, переданные не вовремя',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsForUpgradesReport' => 
  array (
    'type' => 0,
    'description' => 'Отчет по модернизациям',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsUniversalReport' => 
  array (
    'type' => 0,
    'description' => 'Универсальный отчет',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'EquipsReportAll' => 
  array (
    'type' => 0,
    'description' => 'Оборудование',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectEquipsReport' => 
  array (
    'type' => 0,
    'description' => 'Оборудование на объектах',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectEquipsReport2' => 
  array (
    'type' => 0,
    'description' => 'Оборудование на объектах (по оборудованию)',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Equips1' => 
  array (
    'type' => 0,
    'description' => 'Оборудование с аналогами',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DemandsDateMaster' => 
  array (
    'type' => 0,
    'description' => 'Заявки для передачи мастеру',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'FormObjects' => 
  array (
    'type' => 0,
    'description' => 'Объекты по организациям',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'Contacts2' => 
  array (
    'type' => 0,
    'description' => 'Отчет по контактам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeliveryDemandsReportAll' => 
  array (
    'type' => 0,
    'description' => 'Заявки на доставку',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeliveryDemandsReport' => 
  array (
    'type' => 0,
    'description' => 'Заявки на доставку',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeliveryDemandsBrokenDeadlinesReport' => 
  array (
    'type' => 0,
    'description' => 'Нарушение сроков выполнения',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectReportAll' => 
  array (
    'type' => 0,
    'description' => 'Объекты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectReport1' => 
  array (
    'type' => 0,
    'description' => 'Объекты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectReport2' => 
  array (
    'type' => 0,
    'description' => 'Объекты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectReport3' => 
  array (
    'type' => 0,
    'description' => 'Объекты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectReport4' => 
  array (
    'type' => 0,
    'description' => 'Объекты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ObjectReport5' => 
  array (
    'type' => 0,
    'description' => 'Объекты',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'TasksReportAll' => 
  array (
    'type' => 0,
    'description' => 'Задачи',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'TasksReport1' => 
  array (
    'type' => 0,
    'description' => 'Отчет по задачам',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CalcReportAll' => 
  array (
    'type' => 0,
    'description' => 'Сметы',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CalcReport1' => 
  array (
    'type' => 0,
    'description' => 'Модернизации',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerOrganizationStructure' => 
  array (
    'type' => 2,
    'description' => 'ManagerOrganizationStructure',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewOrganizationStructure',
      1 => 'CreateOrganizationStructure',
      2 => 'UpdateOrganizationStructure',
    ),
  ),
  'AdminOrganizationStructure' => 
  array (
    'type' => 2,
    'description' => 'AdminOrganizationStructure',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewOrganizationStructure',
      1 => 'CreateOrganizationStructure',
      2 => 'UpdateOrganizationStructure',
      3 => 'DeleteOrganizationStructure',
    ),
  ),
  'UserOrganizationStructure' => 
  array (
    'type' => 2,
    'description' => 'UserOrganizationStructure',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewOrganizationStructure',
    ),
  ),
  'ViewOrganizationStructure' => 
  array (
    'type' => 0,
    'description' => 'ViewOrganizationStructure',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateOrganizationStructure' => 
  array (
    'type' => 0,
    'description' => 'CreateOrganizationStructure',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateOrganizationStructure' => 
  array (
    'type' => 0,
    'description' => 'UpdateOrganizationStructure',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteOrganizationStructure' => 
  array (
    'type' => 0,
    'description' => 'DeleteOrganizationStructure',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerDeliveryComments' => 
  array (
    'type' => 2,
    'description' => 'ManagerDeliveryComments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'CreateDeliveryComments',
      1 => 'UpdateDeliveryComments',
    ),
  ),
  'AdminDeliveryComments' => 
  array (
    'type' => 2,
    'description' => 'AdminDeliveryComments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'CreateDeliveryComments',
      1 => 'UpdateDeliveryComments',
      2 => 'DeleteDeliveryComments',
    ),
  ),
  'UserDeliveryComments' => 
  array (
    'type' => 2,
    'description' => 'UserDeliveryComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateDeliveryComments' => 
  array (
    'type' => 0,
    'description' => 'CreateDeliveryComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateDeliveryComments' => 
  array (
    'type' => 0,
    'description' => 'UpdateDeliveryComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteDeliveryComments' => 
  array (
    'type' => 0,
    'description' => 'DeleteDeliveryComments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserContractMasterHistory' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractMasterHistory',
    ),
  ),
  'ManagerContractMasterHistory' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractMasterHistory',
      1 => 'InsretContractMasterHistory',
      2 => 'UpdateContractMasterHistory',
    ),
  ),
  'AdminContractMasterHistory' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractMasterHistory',
      1 => 'InsretContractMasterHistory',
      2 => 'UpdateContractMasterHistory',
      3 => 'DeleteContractMasterHistory',
    ),
  ),
  'ViewContractMasterHistory' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretContractMasterHistory' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContractMasterHistory' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContractMasterHistory' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserContractEquips' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractEquips',
    ),
  ),
  'ManagerContractEquips' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractEquips',
      1 => 'InsretContractEquips',
      2 => 'UpdateContractEquips',
    ),
  ),
  'AdminContractEquips' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractEquips',
      1 => 'InsretContractEquips',
      2 => 'UpdateContractEquips',
      3 => 'DeleteContractEquips',
    ),
  ),
  'ViewContractEquips' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretContractEquips' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContractEquips' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContractEquips' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserContractSystems' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractSystems',
    ),
  ),
  'ManagerContractSystems' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractSystems',
      1 => 'InsretContractSystems',
      2 => 'UpdateContractSystems',
    ),
  ),
  'AdminContractSystems' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractSystems',
      1 => 'InsretContractSystems',
      2 => 'UpdateContractSystems',
      3 => 'DeleteContractSystems',
    ),
  ),
  'ViewContractSystems' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretContractSystems' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContractSystems' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContractSystems' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserContractPriceHistory' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractPriceHistory',
    ),
  ),
  'ManagerContractPriceHistory' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractPriceHistory',
      1 => 'InsretContractPriceHistory',
      2 => 'UpdateContractPriceHistory',
    ),
  ),
  'AdminContractPriceHistory' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewContractPriceHistory',
      1 => 'InsretContractPriceHistory',
      2 => 'UpdateContractPriceHistory',
      3 => 'DeleteContractPriceHistory',
    ),
  ),
  'ViewContractPriceHistory' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretContractPriceHistory' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateContractPriceHistory' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteContractPriceHistory' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserPaymentHistory' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPaymentHistory',
    ),
  ),
  'ManagerPaymentHistory' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPaymentHistory',
      1 => 'InsretPaymentHistory',
      2 => 'UpdatePaymentHistory',
    ),
  ),
  'AdminPaymentHistory' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPaymentHistory',
      1 => 'InsretPaymentHistory',
      2 => 'UpdatePaymentHistory',
      3 => 'DeletePaymentHistory',
    ),
  ),
  'ViewPaymentHistory' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretPaymentHistory' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePaymentHistory' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePaymentHistory' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserMonitoringDemands' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMonitoringDemands',
    ),
  ),
  'ManagerMonitoringDemands' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMonitoringDemands',
      1 => 'InsretMonitoringDemands',
      2 => 'UpdateMonitoringDemands',
      3 => 'AcceptMonitoringDemands',
      4 => 'ExecuteMonitoringDemands',
      5 => 'CancelAcceptanceMonitoringDemands',
    ),
  ),
  'AdminMonitoringDemands' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMonitoringDemands',
      1 => 'InsretMonitoringDemands',
      2 => 'UpdateMonitoringDemands',
      3 => 'DeleteMonitoringDemands',
      4 => 'AcceptMonitoringDemands',
      5 => 'ExecuteMonitoringDemands',
      6 => 'CancelAcceptanceMonitoringDemands',
    ),
  ),
  'ViewMonitoringDemands' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretMonitoringDemands' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateMonitoringDemands' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteMonitoringDemands' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AcceptMonitoringDemands' => 
  array (
    'type' => 0,
    'description' => 'Принять',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CancelAcceptanceMonitoringDemands' => 
  array (
    'type' => 0,
    'description' => 'Отменить принятие',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ExecuteMonitoringDemands' => 
  array (
    'type' => 0,
    'description' => 'Выполнить',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserMonitoringDemandDetails' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMonitoringDemandDetails',
    ),
  ),
  'ManagerMonitoringDemandDetails' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMonitoringDemandDetails',
      1 => 'InsretMonitoringDemandDetails',
      2 => 'UpdateMonitoringDemandDetails',
    ),
  ),
  'AdminMonitoringDemandDetails' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewMonitoringDemandDetails',
      1 => 'InsretMonitoringDemandDetails',
      2 => 'UpdateMonitoringDemandDetails',
      3 => 'DeleteMonitoringDemandDetails',
    ),
  ),
  'ViewMonitoringDemandDetails' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretMonitoringDemandDetails' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateMonitoringDemandDetails' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteMonitoringDemandDetails' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInventories' => 
  array (
    'type' => 2,
    'description' => 'ManagerInventories',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInventories',
      1 => 'CreateInventories',
      2 => 'UpdateInventories',
    ),
  ),
  'AdminInventories' => 
  array (
    'type' => 2,
    'description' => 'AdminInventories',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInventories',
      1 => 'CreateInventories',
      2 => 'UpdateInventories',
      3 => 'DeleteInventories',
      4 => 'AcceptInventories',
    ),
  ),
  'UserInventories' => 
  array (
    'type' => 2,
    'description' => 'UserInventories',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInventories',
    ),
  ),
  'ViewInventories' => 
  array (
    'type' => 0,
    'description' => 'ViewInventories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInventories' => 
  array (
    'type' => 0,
    'description' => 'CreateInventories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInventories' => 
  array (
    'type' => 0,
    'description' => 'UpdateInventories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInventories' => 
  array (
    'type' => 0,
    'description' => 'DeleteInventories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AcceptInventories' => 
  array (
    'type' => 0,
    'description' => 'AcceptInventories',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInventoryDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerInventoryDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInventoryDetails',
      1 => 'CreateInventoryDetails',
      2 => 'UpdateInventoryDetails',
    ),
  ),
  'AdminInventoryDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminInventoryDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInventoryDetails',
      1 => 'CreateInventoryDetails',
      2 => 'UpdateInventoryDetails',
      3 => 'DeleteInventoryDetails',
    ),
  ),
  'UserInventoryDetails' => 
  array (
    'type' => 2,
    'description' => 'UserInventoryDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInventoryDetails',
    ),
  ),
  'ViewInventoryDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewInventoryDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInventoryDetails' => 
  array (
    'type' => 0,
    'description' => 'CreateInventoryDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInventoryDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdateInventoryDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInventoryDetails' => 
  array (
    'type' => 0,
    'description' => 'DeleteInventoryDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPriceMarkups' => 
  array (
    'type' => 2,
    'description' => 'ManagerPriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMarkups',
      1 => 'CreatePriceMarkups',
      2 => 'UpdatePriceMarkups',
    ),
  ),
  'AdminPriceMarkups' => 
  array (
    'type' => 2,
    'description' => 'AdminPriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMarkups',
      1 => 'CreatePriceMarkups',
      2 => 'UpdatePriceMarkups',
      3 => 'DeletePriceMarkups',
      4 => 'CopyPriceMarkups',
    ),
  ),
  'UserPriceMarkups' => 
  array (
    'type' => 2,
    'description' => 'UserPriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMarkups',
    ),
  ),
  'ViewPriceMarkups' => 
  array (
    'type' => 0,
    'description' => 'ViewPriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePriceMarkups' => 
  array (
    'type' => 0,
    'description' => 'CreatePriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePriceMarkups' => 
  array (
    'type' => 0,
    'description' => 'UpdatePriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePriceMarkups' => 
  array (
    'type' => 0,
    'description' => 'DeletePriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CopyPriceMarkups' => 
  array (
    'type' => 0,
    'description' => 'CopyPriceMarkups',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPriceMarkupDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerPriceMarkupDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMarkupDetails',
      1 => 'CreatePriceMarkupDetails',
      2 => 'UpdatePriceMarkupDetails',
    ),
  ),
  'AdminPriceMarkupDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminPriceMarkupDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMarkupDetails',
      1 => 'CreatePriceMarkupDetails',
      2 => 'UpdatePriceMarkupDetails',
      3 => 'DeletePriceMarkupDetails',
    ),
  ),
  'UserPriceMarkupDetails' => 
  array (
    'type' => 2,
    'description' => 'UserPriceMarkupDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceMarkupDetails',
    ),
  ),
  'ViewPriceMarkupDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewPriceMarkupDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePriceMarkupDetails' => 
  array (
    'type' => 0,
    'description' => 'CreatePriceMarkupDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePriceMarkupDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdatePriceMarkupDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePriceMarkupDetails' => 
  array (
    'type' => 0,
    'description' => 'DeletePriceMarkupDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPriceList' => 
  array (
    'type' => 2,
    'description' => 'ManagerPriceList',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceList',
      1 => 'CreatePriceList',
      2 => 'UpdatePriceList',
    ),
  ),
  'AdminPriceList' => 
  array (
    'type' => 2,
    'description' => 'AdminPriceList',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceList',
      1 => 'CreatePriceList',
      2 => 'UpdatePriceList',
      3 => 'DeletePriceList',
    ),
  ),
  'UserPriceList' => 
  array (
    'type' => 2,
    'description' => 'UserPriceList',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceList',
    ),
  ),
  'ViewPriceList' => 
  array (
    'type' => 0,
    'description' => 'ViewPriceList',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePriceList' => 
  array (
    'type' => 0,
    'description' => 'CreatePriceList',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePriceList' => 
  array (
    'type' => 0,
    'description' => 'UpdatePriceList',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePriceList' => 
  array (
    'type' => 0,
    'description' => 'DeletePriceList',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerPriceListDetails' => 
  array (
    'type' => 2,
    'description' => 'ManagerPriceListDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceListDetails',
      1 => 'CreatePriceListDetails',
      2 => 'UpdatePriceListDetails',
    ),
  ),
  'AdminPriceListDetails' => 
  array (
    'type' => 2,
    'description' => 'AdminPriceListDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceListDetails',
      1 => 'CreatePriceListDetails',
      2 => 'UpdatePriceListDetails',
      3 => 'DeletePriceListDetails',
    ),
  ),
  'UserPriceListDetails' => 
  array (
    'type' => 2,
    'description' => 'UserPriceListDetails',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewPriceListDetails',
    ),
  ),
  'ViewPriceListDetails' => 
  array (
    'type' => 0,
    'description' => 'ViewPriceListDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreatePriceListDetails' => 
  array (
    'type' => 0,
    'description' => 'CreatePriceListDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdatePriceListDetails' => 
  array (
    'type' => 0,
    'description' => 'UpdatePriceListDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeletePriceListDetails' => 
  array (
    'type' => 0,
    'description' => 'DeletePriceListDetails',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerSerialNumbers' => 
  array (
    'type' => 2,
    'description' => 'ManagerSerialNumbers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSerialNumbers',
      1 => 'CreateSerialNumbers',
      2 => 'UpdateSerialNumbers',
    ),
  ),
  'AdminSerialNumbers' => 
  array (
    'type' => 2,
    'description' => 'AdminSerialNumbers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSerialNumbers',
      1 => 'CreateSerialNumbers',
      2 => 'UpdateSerialNumbers',
      3 => 'DeleteSerialNumbers',
    ),
  ),
  'UserSerialNumbers' => 
  array (
    'type' => 2,
    'description' => 'UserSerialNumbers',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSerialNumbers',
    ),
  ),
  'ViewSerialNumbers' => 
  array (
    'type' => 0,
    'description' => 'ViewSerialNumbers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSerialNumbers' => 
  array (
    'type' => 0,
    'description' => 'CreateSerialNumbers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSerialNumbers' => 
  array (
    'type' => 0,
    'description' => 'UpdateSerialNumbers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSerialNumbers' => 
  array (
    'type' => 0,
    'description' => 'DeleteSerialNumbers',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerSystemCompetitors' => 
  array (
    'type' => 2,
    'description' => 'ManagerSystemCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemCompetitors',
      1 => 'CreateSystemCompetitors',
      2 => 'UpdateSystemCompetitors',
    ),
  ),
  'AdminSystemCompetitors' => 
  array (
    'type' => 2,
    'description' => 'AdminSystemCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemCompetitors',
      1 => 'CreateSystemCompetitors',
      2 => 'UpdateSystemCompetitors',
      3 => 'DeleteSystemCompetitors',
    ),
  ),
  'UserSystemCompetitors' => 
  array (
    'type' => 2,
    'description' => 'UserSystemCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSystemCompetitors',
    ),
  ),
  'ViewSystemCompetitors' => 
  array (
    'type' => 0,
    'description' => 'ViewSystemCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateSystemCompetitors' => 
  array (
    'type' => 0,
    'description' => 'CreateSystemCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateSystemCompetitors' => 
  array (
    'type' => 0,
    'description' => 'UpdateSystemCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteSystemCompetitors' => 
  array (
    'type' => 0,
    'description' => 'DeleteSystemCompetitors',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerObjectsGroupSystemComplexitys' => 
  array (
    'type' => 2,
    'description' => 'ManagerObjectsGroupSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupSystemComplexitys',
      1 => 'CreateObjectsGroupSystemComplexitys',
      2 => 'UpdateObjectsGroupSystemComplexitys',
    ),
  ),
  'AdminObjectsGroupSystemComplexitys' => 
  array (
    'type' => 2,
    'description' => 'AdminObjectsGroupSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupSystemComplexitys',
      1 => 'CreateObjectsGroupSystemComplexitys',
      2 => 'UpdateObjectsGroupSystemComplexitys',
      3 => 'DeleteObjectsGroupSystemComplexitys',
    ),
  ),
  'UserObjectsGroupSystemComplexitys' => 
  array (
    'type' => 2,
    'description' => 'UserObjectsGroupSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupSystemComplexitys',
    ),
  ),
  'ViewObjectsGroupSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'ViewObjectsGroupSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateObjectsGroupSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'CreateObjectsGroupSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjectsGroupSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'UpdateObjectsGroupSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjectsGroupSystemComplexitys' => 
  array (
    'type' => 0,
    'description' => 'DeleteObjectsGroupSystemComplexitys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerObjectEquips' => 
  array (
    'type' => 2,
    'description' => 'ManagerObjectEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectEquips',
      1 => 'CreateObjectEquips',
      2 => 'UpdateObjectEquips',
      3 => 'DeleteObjectEquips',
    ),
  ),
  'AdminObjectEquips' => 
  array (
    'type' => 2,
    'description' => 'AdminObjectEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectEquips',
      1 => 'CreateObjectEquips',
      2 => 'UpdateObjectEquips',
      3 => 'DeleteObjectEquips',
    ),
  ),
  'UserObjectEquips' => 
  array (
    'type' => 2,
    'description' => 'UserObjectEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectEquips',
    ),
  ),
  'ViewObjectEquips' => 
  array (
    'type' => 0,
    'description' => 'ViewObjectEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateObjectEquips' => 
  array (
    'type' => 0,
    'description' => 'CreateObjectEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjectEquips' => 
  array (
    'type' => 0,
    'description' => 'UpdateObjectEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjectEquips' => 
  array (
    'type' => 0,
    'description' => 'DeleteObjectEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerObjectsGroupCostCalculations' => 
  array (
    'type' => 2,
    'description' => 'ManagerObjectsGroupCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupCostCalculations',
      1 => 'CreateObjectsGroupCostCalculations',
      2 => 'UpdateObjectsGroupCostCalculations',
    ),
  ),
  'AdminObjectsGroupCostCalculations' => 
  array (
    'type' => 2,
    'description' => 'AdminObjectsGroupCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupCostCalculations',
      1 => 'CreateObjectsGroupCostCalculations',
      2 => 'UpdateObjectsGroupCostCalculations',
      3 => 'DeleteObjectsGroupCostCalculations',
    ),
  ),
  'UserObjectsGroupCostCalculations' => 
  array (
    'type' => 2,
    'description' => 'UserObjectsGroupCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectsGroupCostCalculations',
    ),
  ),
  'ViewObjectsGroupCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'ViewObjectsGroupCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateObjectsGroupCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'CreateObjectsGroupCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjectsGroupCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'UpdateObjectsGroupCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjectsGroupCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'DeleteObjectsGroupCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCostCalculations' => 
  array (
    'type' => 2,
    'description' => 'ManagerCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalculations',
      1 => 'CreateCostCalculations',
      2 => 'UpdateCostCalculations',
      3 => 'AgreedCostCalculations',
      4 => 'UndoAgreedCostCalculations',
      5 => 'ReadyCostCalculations',
      6 => 'UndoReadyCostCalculations',
      7 => 'CopyCostCalculations',
      8 => 'ReestrCostCalculations',
      9 => 'AnnulCostCalculations',
    ),
  ),
  'AdminCostCalculations' => 
  array (
    'type' => 2,
    'description' => 'AdminCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalculations',
      1 => 'CreateCostCalculations',
      2 => 'UpdateCostCalculations',
      3 => 'DeleteCostCalculations',
      4 => 'AgreedCostCalculations',
      5 => 'UndoAgreedCostCalculations',
      6 => 'ReadyCostCalculations',
      7 => 'UndoReadyCostCalculations',
      8 => 'CopyCostCalculations',
      9 => 'AnnulCostCalculations',
      10 => 'ReestrCostCalculations',
    ),
  ),
  'UserCostCalculations' => 
  array (
    'type' => 2,
    'description' => 'UserCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalculations',
    ),
  ),
  'ViewCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'ViewCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'CreateCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'UpdateCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'DeleteCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AgreedCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'AgreedCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UndoAgreedCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'UndoAgreedCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ReadyCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'ReadyCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UndoReadyCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'UndoReadyCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CopyCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'CopyCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AnnulCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'AnnulCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ReestrCostCalculations' => 
  array (
    'type' => 0,
    'description' => 'ReestrCostCalculations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCostCalcEquips' => 
  array (
    'type' => 2,
    'description' => 'ManagerCostCalcEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcEquips',
      1 => 'CreateCostCalcEquips',
      2 => 'UpdateCostCalcEquips',
      3 => 'DeleteCostCalcEquips',
    ),
  ),
  'AdminCostCalcEquips' => 
  array (
    'type' => 2,
    'description' => 'AdminCostCalcEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcEquips',
      1 => 'CreateCostCalcEquips',
      2 => 'UpdateCostCalcEquips',
      3 => 'DeleteCostCalcEquips',
    ),
  ),
  'UserCostCalcEquips' => 
  array (
    'type' => 2,
    'description' => 'UserCostCalcEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcEquips',
    ),
  ),
  'ViewCostCalcEquips' => 
  array (
    'type' => 0,
    'description' => 'ViewCostCalcEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateCostCalcEquips' => 
  array (
    'type' => 0,
    'description' => 'CreateCostCalcEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCostCalcEquips' => 
  array (
    'type' => 0,
    'description' => 'UpdateCostCalcEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCostCalcEquips' => 
  array (
    'type' => 0,
    'description' => 'DeleteCostCalcEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCostCalcWorks' => 
  array (
    'type' => 2,
    'description' => 'ManagerCostCalcWorks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcWorks',
      1 => 'CreateCostCalcWorks',
      2 => 'UpdateCostCalcWorks',
      3 => 'DeleteCostCalcWorks',
    ),
  ),
  'AdminCostCalcWorks' => 
  array (
    'type' => 2,
    'description' => 'AdminCostCalcWorks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcWorks',
      1 => 'CreateCostCalcWorks',
      2 => 'UpdateCostCalcWorks',
      3 => 'DeleteCostCalcWorks',
    ),
  ),
  'UserCostCalcWorks' => 
  array (
    'type' => 2,
    'description' => 'UserCostCalcWorks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcWorks',
    ),
  ),
  'ViewCostCalcWorks' => 
  array (
    'type' => 0,
    'description' => 'ViewCostCalcWorks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateCostCalcWorks' => 
  array (
    'type' => 0,
    'description' => 'CreateCostCalcWorks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCostCalcWorks' => 
  array (
    'type' => 0,
    'description' => 'UpdateCostCalcWorks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCostCalcWorks' => 
  array (
    'type' => 0,
    'description' => 'DeleteCostCalcWorks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCostCalcSalarys' => 
  array (
    'type' => 2,
    'description' => 'ManagerCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcSalarys',
      1 => 'CreateCostCalcSalarys',
      2 => 'UpdateCostCalcSalarys',
    ),
  ),
  'AdminCostCalcSalarys' => 
  array (
    'type' => 2,
    'description' => 'AdminCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcSalarys',
      1 => 'CreateCostCalcSalarys',
      2 => 'UpdateCostCalcSalarys',
      3 => 'DeleteCostCalcSalarys',
      4 => 'AcceptCostCalcSalarys',
    ),
  ),
  'UserCostCalcSalarys' => 
  array (
    'type' => 2,
    'description' => 'UserCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcSalarys',
    ),
  ),
  'ViewCostCalcSalarys' => 
  array (
    'type' => 0,
    'description' => 'ViewCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateCostCalcSalarys' => 
  array (
    'type' => 0,
    'description' => 'CreateCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCostCalcSalarys' => 
  array (
    'type' => 0,
    'description' => 'UpdateCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCostCalcSalarys' => 
  array (
    'type' => 0,
    'description' => 'DeleteCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AcceptCostCalcSalarys' => 
  array (
    'type' => 0,
    'description' => 'AcceptCostCalcSalarys',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerCostCalcDocuments' => 
  array (
    'type' => 2,
    'description' => 'ManagerCostCalcDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcDocuments',
      1 => 'CreateCostCalcDocuments',
      2 => 'UpdateCostCalcDocuments',
    ),
  ),
  'AdminCostCalcDocuments' => 
  array (
    'type' => 2,
    'description' => 'AdminCostCalcDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcDocuments',
      1 => 'CreateCostCalcDocuments',
      2 => 'UpdateCostCalcDocuments',
      3 => 'DeleteCostCalcDocuments',
    ),
  ),
  'UserCostCalcDocuments' => 
  array (
    'type' => 2,
    'description' => 'UserCostCalcDocuments',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewCostCalcDocuments',
    ),
  ),
  'ViewCostCalcDocuments' => 
  array (
    'type' => 0,
    'description' => 'ViewCostCalcDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateCostCalcDocuments' => 
  array (
    'type' => 0,
    'description' => 'CreateCostCalcDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateCostCalcDocuments' => 
  array (
    'type' => 0,
    'description' => 'UpdateCostCalcDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteCostCalcDocuments' => 
  array (
    'type' => 0,
    'description' => 'DeleteCostCalcDocuments',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerWHBuhActs' => 
  array (
    'type' => 2,
    'description' => 'ManagerWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWHBuhActs',
      1 => 'CreateWHBuhActs',
      2 => 'UpdateWHBuhActs',
    ),
  ),
  'AdminWHBuhActs' => 
  array (
    'type' => 2,
    'description' => 'AdminWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWHBuhActs',
      1 => 'CreateWHBuhActs',
      2 => 'UpdateWHBuhActs',
      3 => 'DeleteWHBuhActs',
      4 => 'AcceptWHBuhActs',
      5 => 'CancelAcceptWHBuhActs',
    ),
  ),
  'UserWHBuhActs' => 
  array (
    'type' => 2,
    'description' => 'UserWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewWHBuhActs',
    ),
  ),
  'ViewWHBuhActs' => 
  array (
    'type' => 0,
    'description' => 'ViewWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateWHBuhActs' => 
  array (
    'type' => 0,
    'description' => 'CreateWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateWHBuhActs' => 
  array (
    'type' => 0,
    'description' => 'UpdateWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteWHBuhActs' => 
  array (
    'type' => 0,
    'description' => 'DeleteWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AcceptWHBuhActs' => 
  array (
    'type' => 0,
    'description' => 'AcceptWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CancelAcceptWHBuhActs' => 
  array (
    'type' => 0,
    'description' => 'CancelAcceptWHBuhActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerOfferDemands' => 
  array (
    'type' => 2,
    'description' => 'ManagerOfferDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewOfferDemands',
      1 => 'CreateOfferDemands',
      2 => 'UpdateOfferDemands',
    ),
  ),
  'AdminOfferDemands' => 
  array (
    'type' => 2,
    'description' => 'AdminOfferDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewOfferDemands',
      1 => 'CreateOfferDemands',
      2 => 'UpdateOfferDemands',
      3 => 'DeleteOfferDemands',
    ),
  ),
  'UserOfferDemands' => 
  array (
    'type' => 2,
    'description' => 'UserOfferDemands',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewOfferDemands',
    ),
  ),
  'ViewOfferDemands' => 
  array (
    'type' => 0,
    'description' => 'ViewOfferDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateOfferDemands' => 
  array (
    'type' => 0,
    'description' => 'CreateOfferDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateOfferDemands' => 
  array (
    'type' => 0,
    'description' => 'UpdateOfferDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteOfferDemands' => 
  array (
    'type' => 0,
    'description' => 'DeleteOfferDemands',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserControlWHDocuments' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewControlWHDocuments',
    ),
  ),
  'ManagerControlWHDocuments' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewControlWHDocuments',
      1 => 'InsretControlWHDocuments',
      2 => 'UpdateControlWHDocuments',
    ),
  ),
  'AdminControlWHDocuments' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewControlWHDocuments',
      1 => 'InsretControlWHDocuments',
      2 => 'UpdateControlWHDocuments',
      3 => 'DeleteControlWHDocuments',
    ),
  ),
  'ViewControlWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretControlWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateControlWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteControlWHDocuments' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerAreaPrices' => 
  array (
    'type' => 2,
    'description' => 'ManagerAreaPrices',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreaPrices',
      1 => 'CreateAreaPrices',
      2 => 'UpdateAreaPrices',
    ),
  ),
  'AdminAreaPrices' => 
  array (
    'type' => 2,
    'description' => 'AdminAreaPrices',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreaPrices',
      1 => 'CreateAreaPrices',
      2 => 'UpdateAreaPrices',
      3 => 'DeleteAreaPrices',
    ),
  ),
  'UserAreaPrices' => 
  array (
    'type' => 2,
    'description' => 'UserAreaPrices',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreaPrices',
    ),
  ),
  'ViewAreaPrices' => 
  array (
    'type' => 0,
    'description' => 'ViewAreaPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateAreaPrices' => 
  array (
    'type' => 0,
    'description' => 'CreateAreaPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateAreaPrices' => 
  array (
    'type' => 0,
    'description' => 'UpdateAreaPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteAreaPrices' => 
  array (
    'type' => 0,
    'description' => 'DeleteAreaPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerAreaObjectPrices' => 
  array (
    'type' => 2,
    'description' => 'ManagerAreaObjectPrices',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreaObjectPrices',
      1 => 'CreateAreaObjectPrices',
      2 => 'UpdateAreaObjectPrices',
    ),
  ),
  'AdminAreaObjectPrices' => 
  array (
    'type' => 2,
    'description' => 'AdminAreaObjectPrices',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreaObjectPrices',
      1 => 'CreateAreaObjectPrices',
      2 => 'UpdateAreaObjectPrices',
      3 => 'DeleteAreaObjectPrices',
    ),
  ),
  'UserAreaObjectPrices' => 
  array (
    'type' => 2,
    'description' => 'UserAreaObjectPrices',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewAreaObjectPrices',
    ),
  ),
  'ViewAreaObjectPrices' => 
  array (
    'type' => 0,
    'description' => 'ViewAreaObjectPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateAreaObjectPrices' => 
  array (
    'type' => 0,
    'description' => 'CreateAreaObjectPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateAreaObjectPrices' => 
  array (
    'type' => 0,
    'description' => 'UpdateAreaObjectPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteAreaObjectPrices' => 
  array (
    'type' => 0,
    'description' => 'DeleteAreaObjectPrices',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerSalesDepClients' => 
  array (
    'type' => 2,
    'description' => 'ManagerSalesDepClients',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSalesDepClients',
      1 => 'SetSalesManager',
      2 => 'AttachObjects',
      3 => 'ViewDemands',
      4 => 'DiarySalesDepClients',
      5 => 'SelectObjects',
    ),
  ),
  'AdminSalesDepClients' => 
  array (
    'type' => 2,
    'description' => 'AdminSalesDepClients',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSalesDepClients',
      1 => 'SetSalesManager',
      2 => 'AttachObjects',
      3 => 'ViewDemands',
      4 => 'DiarySalesDepClients',
    ),
  ),
  'UserSalesDepClients' => 
  array (
    'type' => 2,
    'description' => 'UserSalesDepClients',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewSalesDepClients',
      1 => 'DiarySalesDepClients',
    ),
  ),
  'ViewSalesDepClients' => 
  array (
    'type' => 0,
    'description' => 'ViewSalesDepClients',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'SetSalesManager' => 
  array (
    'type' => 0,
    'description' => 'SetSalesManager',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'SelectObjects' => 
  array (
    'type' => 0,
    'description' => 'SelectObjects',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'AttachObjects' => 
  array (
    'type' => 0,
    'description' => 'AttachObjects',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DiarySalesDepClients' => 
  array (
    'type' => 0,
    'description' => 'DiarySalesDepClients',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInspectionActs' => 
  array (
    'type' => 2,
    'description' => 'ManagerInspectionActs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspectionActs',
      1 => 'CreateInspectionActs',
      2 => 'UpdateInspectionActs',
    ),
  ),
  'AdminInspectionActs' => 
  array (
    'type' => 2,
    'description' => 'AdminInspectionActs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspectionActs',
      1 => 'CreateInspectionActs',
      2 => 'UpdateInspectionActs',
      3 => 'DeleteInspectionActs',
    ),
  ),
  'UserInspectionActs' => 
  array (
    'type' => 2,
    'description' => 'UserInspectionActs',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspectionActs',
    ),
  ),
  'ViewInspectionActs' => 
  array (
    'type' => 0,
    'description' => 'ViewInspectionActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInspectionActs' => 
  array (
    'type' => 0,
    'description' => 'CreateInspectionActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInspectionActs' => 
  array (
    'type' => 0,
    'description' => 'UpdateInspectionActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInspectionActs' => 
  array (
    'type' => 0,
    'description' => 'DeleteInspectionActs',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInspectionActEquips' => 
  array (
    'type' => 2,
    'description' => 'ManagerInspectionActEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspectionActEquips',
      1 => 'CreateInspectionActEquips',
      2 => 'UpdateInspectionActEquips',
      3 => 'DeleteInspectionActEquips',
    ),
  ),
  'AdminInspectionActEquips' => 
  array (
    'type' => 2,
    'description' => 'AdminInspectionActEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspectionActEquips',
      1 => 'CreateInspectionActEquips',
      2 => 'UpdateInspectionActEquips',
      3 => 'DeleteInspectionActEquips',
    ),
  ),
  'UserInspectionActEquips' => 
  array (
    'type' => 2,
    'description' => 'UserInspectionActEquips',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspectionActEquips',
    ),
  ),
  'ViewInspectionActEquips' => 
  array (
    'type' => 0,
    'description' => 'ViewInspectionActEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInspectionActEquips' => 
  array (
    'type' => 0,
    'description' => 'CreateInspectionActEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInspectionActEquips' => 
  array (
    'type' => 0,
    'description' => 'UpdateInspectionActEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInspectionActEquips' => 
  array (
    'type' => 0,
    'description' => 'DeleteInspectionActEquips',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInspActEquipCharacteristics' => 
  array (
    'type' => 2,
    'description' => 'ManagerInspActEquipCharacteristics',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActEquipCharacteristics',
      1 => 'CreateInspActEquipCharacteristics',
      2 => 'UpdateInspActEquipCharacteristics',
      3 => 'DeleteInspActEquipCharacteristics',
    ),
  ),
  'AdminInspActEquipCharacteristics' => 
  array (
    'type' => 2,
    'description' => 'AdminInspActEquipCharacteristics',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActEquipCharacteristics',
      1 => 'CreateInspActEquipCharacteristics',
      2 => 'UpdateInspActEquipCharacteristics',
      3 => 'DeleteInspActEquipCharacteristics',
    ),
  ),
  'UserInspActEquipCharacteristics' => 
  array (
    'type' => 2,
    'description' => 'UserInspActEquipCharacteristics',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActEquipCharacteristics',
    ),
  ),
  'ViewInspActEquipCharacteristics' => 
  array (
    'type' => 0,
    'description' => 'ViewInspActEquipCharacteristics',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInspActEquipCharacteristics' => 
  array (
    'type' => 0,
    'description' => 'CreateInspActEquipCharacteristics',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInspActEquipCharacteristics' => 
  array (
    'type' => 0,
    'description' => 'UpdateInspActEquipCharacteristics',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInspActEquipCharacteristics' => 
  array (
    'type' => 0,
    'description' => 'DeleteInspActEquipCharacteristics',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInspActRemarks' => 
  array (
    'type' => 2,
    'description' => 'ManagerInspActRemarks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActRemarks',
      1 => 'CreateInspActRemarks',
      2 => 'UpdateInspActRemarks',
    ),
  ),
  'AdminInspActRemarks' => 
  array (
    'type' => 2,
    'description' => 'AdminInspActRemarks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActRemarks',
      1 => 'CreateInspActRemarks',
      2 => 'UpdateInspActRemarks',
      3 => 'DeleteInspActRemarks',
    ),
  ),
  'UserInspActRemarks' => 
  array (
    'type' => 2,
    'description' => 'UserInspActRemarks',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActRemarks',
    ),
  ),
  'ViewInspActRemarks' => 
  array (
    'type' => 0,
    'description' => 'ViewInspActRemarks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInspActRemarks' => 
  array (
    'type' => 0,
    'description' => 'CreateInspActRemarks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInspActRemarks' => 
  array (
    'type' => 0,
    'description' => 'UpdateInspActRemarks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInspActRemarks' => 
  array (
    'type' => 0,
    'description' => 'DeleteInspActRemarks',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInspActRecommendations' => 
  array (
    'type' => 2,
    'description' => 'ManagerInspActRecommendations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActRecommendations',
      1 => 'CreateInspActRecommendations',
      2 => 'UpdateInspActRecommendations',
    ),
  ),
  'AdminInspActRecommendations' => 
  array (
    'type' => 2,
    'description' => 'AdminInspActRecommendations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActRecommendations',
      1 => 'CreateInspActRecommendations',
      2 => 'UpdateInspActRecommendations',
      3 => 'DeleteInspActRecommendations',
    ),
  ),
  'UserInspActRecommendations' => 
  array (
    'type' => 2,
    'description' => 'UserInspActRecommendations',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActRecommendations',
    ),
  ),
  'ViewInspActRecommendations' => 
  array (
    'type' => 0,
    'description' => 'ViewInspActRecommendations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInspActRecommendations' => 
  array (
    'type' => 0,
    'description' => 'CreateInspActRecommendations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInspActRecommendations' => 
  array (
    'type' => 0,
    'description' => 'UpdateInspActRecommendations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInspActRecommendations' => 
  array (
    'type' => 0,
    'description' => 'DeleteInspActRecommendations',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerInspActOptions' => 
  array (
    'type' => 2,
    'description' => 'ManagerInspActOptions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActOptions',
      1 => 'CreateInspActOptions',
      2 => 'UpdateInspActOptions',
    ),
  ),
  'AdminInspActOptions' => 
  array (
    'type' => 2,
    'description' => 'AdminInspActOptions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActOptions',
      1 => 'CreateInspActOptions',
      2 => 'UpdateInspActOptions',
      3 => 'DeleteInspActOptions',
    ),
  ),
  'UserInspActOptions' => 
  array (
    'type' => 2,
    'description' => 'UserInspActOptions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewInspActOptions',
    ),
  ),
  'ViewInspActOptions' => 
  array (
    'type' => 0,
    'description' => 'ViewInspActOptions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateInspActOptions' => 
  array (
    'type' => 0,
    'description' => 'CreateInspActOptions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateInspActOptions' => 
  array (
    'type' => 0,
    'description' => 'UpdateInspActOptions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteInspActOptions' => 
  array (
    'type' => 0,
    'description' => 'DeleteInspActOptions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerValuableInstructions' => 
  array (
    'type' => 2,
    'description' => 'ManagerValuableInstructions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewValuableInstructions',
      1 => 'CreateValuableInstructions',
      2 => 'UpdateValuableInstructions',
    ),
  ),
  'AdminValuableInstructions' => 
  array (
    'type' => 2,
    'description' => 'AdminValuableInstructions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewValuableInstructions',
      1 => 'CreateValuableInstructions',
      2 => 'UpdateValuableInstructions',
      3 => 'DeleteValuableInstructions',
    ),
  ),
  'UserValuableInstructions' => 
  array (
    'type' => 2,
    'description' => 'UserValuableInstructions',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewValuableInstructions',
    ),
  ),
  'ViewValuableInstructions' => 
  array (
    'type' => 0,
    'description' => 'ViewValuableInstructions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateValuableInstructions' => 
  array (
    'type' => 0,
    'description' => 'CreateValuableInstructions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateValuableInstructions' => 
  array (
    'type' => 0,
    'description' => 'UpdateValuableInstructions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteValuableInstructions' => 
  array (
    'type' => 0,
    'description' => 'DeleteValuableInstructions',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ManagerClientSounds' => 
  array (
    'type' => 2,
    'description' => 'ManagerClientSounds',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewClientSounds',
      1 => 'CreateClientSounds',
      2 => 'UpdateClientSounds',
    ),
  ),
  'AdminClientSounds' => 
  array (
    'type' => 2,
    'description' => 'AdminClientSounds',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewClientSounds',
      1 => 'CreateClientSounds',
      2 => 'UpdateClientSounds',
      3 => 'DeleteClientSounds',
    ),
  ),
  'UserClientSounds' => 
  array (
    'type' => 2,
    'description' => 'UserClientSounds',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewClientSounds',
    ),
  ),
  'ViewClientSounds' => 
  array (
    'type' => 0,
    'description' => 'ViewClientSounds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'CreateClientSounds' => 
  array (
    'type' => 0,
    'description' => 'CreateClientSounds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateClientSounds' => 
  array (
    'type' => 0,
    'description' => 'UpdateClientSounds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteClientSounds' => 
  array (
    'type' => 0,
    'description' => 'DeleteClientSounds',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UserObjectEvents' => 
  array (
    'type' => 2,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectEvents',
    ),
  ),
  'ManagerObjectEvents' => 
  array (
    'type' => 2,
    'description' => 'Просмотр + Редактирование',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectEvents',
      1 => 'InsretObjectEvents',
      2 => 'UpdateObjectEvents',
    ),
  ),
  'AdminObjectEvents' => 
  array (
    'type' => 2,
    'description' => 'Все права',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewObjectEvents',
      1 => 'InsretObjectEvents',
      2 => 'UpdateObjectEvents',
      3 => 'DeleteObjectEvents',
    ),
  ),
  'ViewObjectEvents' => 
  array (
    'type' => 0,
    'description' => 'Просмотр',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'InsretObjectEvents' => 
  array (
    'type' => 0,
    'description' => 'Вставка',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'UpdateObjectEvents' => 
  array (
    'type' => 0,
    'description' => 'Изменение',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'DeleteObjectEvents' => 
  array (
    'type' => 0,
    'description' => 'Удаление',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'guest' => 
  array (
    'type' => 2,
    'description' => 'Guest',
    'bizRule' => NULL,
    'data' => NULL,
  ),
  'ViewDocs' => 
  array (
    'type' => 2,
    'description' => 'Просмотр документов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ViewDeliveryDemands',
      1 => 'WHDocumentsView',
      2 => 'ViewRepairs',
      3 => 'ViewMonitoringDemands',
      4 => 'ViewMonitoringDemandDetails',
      5 => 'ViewCostCalculations',
      6 => 'ViewContractsS',
      7 => 'ViewDocuments',
      8 => 'ViewWhActs',
    ),
  ),
  'Storekeeper' => 
  array (
    'type' => 2,
    'description' => 'Кладовщик',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerWhActs',
      1 => 'AdminActEquips',
      2 => 'FindTreb',
      3 => 'FindWHDoc1',
      4 => 'WHDocuments8Report',
      5 => 'WHDocuments9Report',
    ),
  ),
  'Clerk' => 
  array (
    'type' => 2,
    'description' => 'Делопроизводитель',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'UserObjects',
      1 => 'UserObjectsGroup',
      2 => 'ManagerContactInfo',
      3 => 'UserObjectsGroupSystems',
      4 => 'UserObjectEquips',
      5 => 'ManagerContractsS',
      6 => 'ManagerDocuments',
      7 => 'ManagerContacts',
      8 => 'UserObjectsGroupCostCalculations',
      9 => 'ManagerCostCalculations',
      10 => 'ManagerCostCalcDocuments',
      11 => 'ManagerCostCalcEquips',
      12 => 'ManagerCostCalcWorks',
      13 => 'ManagerDemands',
      14 => 'ManagerExecuteReports',
      15 => 'UserRepairs',
      16 => 'UserDeliveryDemands',
      17 => 'MSWHDocuments',
      18 => 'AdminSerialNumbers',
      19 => 'ManagerDocmAchsDetails',
      20 => 'ManagerMonitoringDemands',
      21 => 'ManagerEvents',
      22 => 'LogDeliveryDemands',
      23 => 'WhActsView',
      24 => 'WHDocumentsReportAll',
      25 => 'WHDocuments1Report',
      26 => 'WHActsAll',
      27 => 'WHActs3Report',
      28 => 'AdminEmployees',
      29 => 'AdminOrganizationStructure',
      30 => 'ManagerWHDocuments',
      31 => 'EmployeesReportAll',
      32 => 'Employee1Report',
      33 => 'Employee2Report',
      34 => 'Employee3Report',
      35 => 'TasksReportAll',
      36 => 'TasksReport1',
    ),
  ),
  'SeniorDispatcher' => 
  array (
    'type' => 2,
    'description' => 'Старший диспетчер',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'UserObjects',
      1 => 'ManagerObjects',
      2 => 'ManagerObjectsGroup',
      3 => 'SeniorDemands',
      4 => 'AdminExecuteReports',
      5 => 'ManagerContactInfo',
      6 => 'ManagerObjectsGroupSystems',
      7 => 'UserDeliveryDemands',
      8 => 'ManagerContacts',
      9 => 'UserContractsS',
      10 => 'ManagerEvents',
      11 => 'AdminEventOffers',
      12 => 'AdminOfferDemands',
      13 => 'AllLoadObjects',
      14 => 'ManagerStreets',
      15 => 'ViewDocs',
    ),
  ),
  'AdministartorDispatchers' => 
  array (
    'type' => 2,
    'description' => 'Администратор диспетчерской службы',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'UserObjects',
      1 => 'ManagerObjectsGroup',
      2 => 'SeniorDemands',
      3 => 'AdminExecuteReports',
      4 => 'ManagerContactInfo',
      5 => 'ManagerObjectsGroupSystems',
      6 => 'UserDeliveryDemands',
      7 => 'ChangeType',
      8 => 'ManagerContacts',
      9 => 'UserContractsS',
      10 => 'AllLoadObjects',
      11 => 'ViewDocs',
    ),
  ),
  'Dispatcher' => 
  array (
    'type' => 2,
    'description' => 'Диспетчер',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'UserObjects',
      1 => 'ManagerObjectsGroup',
      2 => 'ManagerDemands',
      3 => 'AdminExecuteReports',
      4 => 'ManagerContactInfo',
      5 => 'ManagerObjectsGroupSystems',
      6 => 'UserDeliveryDemands',
      7 => 'ManagerContacts',
      8 => 'UserContractsS',
      9 => 'AllLoadObjects',
      10 => 'ViewDocs',
    ),
  ),
  'SeniorRSO' => 
  array (
    'type' => 2,
    'description' => 'Руководитель РСО',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'Dispatcher',
      1 => 'AdminEvents',
      2 => 'AdminEventOffers',
      3 => 'AdministartorDispatchers',
      4 => 'AdminSystemComplexitys',
      5 => 'AdminSystemStatements',
    ),
  ),
  'Administrator' => 
  array (
    'type' => 2,
    'description' => 'Administrator',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'AdminDemands',
      1 => 'Storekeeper',
      2 => 'AdminObjects',
      3 => 'AdminObjectsGroup',
      4 => 'AdminWhActs',
      5 => 'AdminPriceMonitoring',
      6 => 'AdminWHDocuments',
      7 => 'AdminBanks',
      8 => 'AdminAddressSystems',
      9 => 'AdminEquips',
      10 => 'AdminAddressedStorage',
      11 => 'AdminEqipGroups',
      12 => 'AdminCategories',
      13 => 'AdminEquipGroups',
      14 => 'AdminEquipSubgroups',
      15 => 'AdminStreets',
      16 => 'AdminPropForms',
      17 => 'AdminSuppliers',
      18 => 'AdminServiceTypes',
      19 => 'AdminPositions',
      20 => 'AdminSpecialDays',
      21 => 'AdminDepartments',
      22 => 'AdminSections',
      23 => 'AdminChildrens',
      24 => 'AdminEmployees',
      25 => 'AdminInstructings',
      26 => 'AdminControlContacts',
      27 => 'AdminContractsS',
      28 => 'AdminReplaceMaster',
      29 => 'AdminRepairs',
      30 => 'AdminExecuteReports',
      31 => 'AdminRepDebtReasons',
      32 => 'AdminRepDebtReasonDetails',
      33 => 'AdminEvents',
      34 => 'AdminEventOffers',
      35 => 'AdminTasks',
      36 => 'AdminTaskNotes',
      37 => 'AdminTaskExecutors',
      38 => 'AdminRepairMaterials',
      39 => 'AdminRepairComments',
      40 => 'AdminRepairActDefectations',
      41 => 'AdminRepairSRM',
      42 => 'AdminRepairWarrantys',
      43 => 'AdminRepairActUtilizations',
      44 => 'AdminRegions',
      45 => 'AdminTerritory',
      46 => 'AdminSystemComplexitys',
      47 => 'AdminSystemStatements',
      48 => 'AdminOrganizationStructure',
      49 => 'AdminObjectsGroupSystems',
      50 => 'AdminContacts',
      51 => 'AdminDeliveryDemands',
      52 => 'AdminDocuments',
      53 => 'AdminContractsDetails_v',
      54 => 'AdminDeliveryComments',
      55 => 'AdminContractMasterHistory',
      56 => 'AdminContractEquips',
      57 => 'AdminContractSystems',
      58 => 'AdminContractPriceHistory',
      59 => 'AdminPaymentHistory',
      60 => 'AdminMonitoringDemands',
      61 => 'AdminMonitoringDemandDetails',
      62 => 'AdminEquipForMDDetails',
      63 => 'AdminEquipTypes',
      64 => 'AdminMalfunctions',
      65 => 'AdminDemandTypes',
      66 => 'AdminDeliveryTypes',
      67 => 'AdminInventories',
      68 => 'AdminInventoryDetails',
      69 => 'AdminPriceMarkups',
      70 => 'AdminPriceMarkupDetails',
      71 => 'AdminDocmAchsDetails',
      72 => 'AdminPriceList',
      73 => 'AdminPriceListDetails',
      74 => 'AdminSerialNumbers',
      75 => 'AdminObjectsGroupCostCalculations',
      76 => 'AdminCostCalculations',
      77 => 'AdminCostCalcEquips',
      78 => 'AdminCostCalcWorks',
      79 => 'AdminCostCalcSalarys',
      80 => 'AdminCostCalcDocuments',
      81 => 'AdminWHBuhActs',
      82 => 'AdminRepairDocs',
      83 => 'AdminObjectsGroupSystemComplexitys',
      84 => 'AdminOfferDemands',
      85 => 'AdminControlWHDocuments',
      86 => 'HeadLogistics',
      87 => 'AdminAreaPrices',
      88 => 'AdminAreaObjectPrices',
      89 => 'ManagerSalesDepClients',
      90 => 'ManagerInspectionActs',
      91 => 'ManagerInspectionActEquips',
      92 => 'ManagerInspActEquipCharacteristics',
      93 => 'ManagerInspActRemarks',
      94 => 'ManagerInspActRecommendations',
      95 => 'ManagerInspActOptions',
      96 => 'ManagerValuableInstructions',
      97 => 'AdminClientSounds',
      98 => 'AdminObjectEvents',
      99 => 'WHActsAll',
      100 => 'WHActs1Report',
      101 => 'WHActs2Report',
      102 => 'WHActs3Report',
      103 => 'WHActs4Report',
      104 => 'Employee1Report',
      105 => 'Employee2Report',
      106 => 'Employee3Report',
      107 => 'ContactsReport',
      108 => 'ObjectsMasterReport',
      109 => 'ObjectServiceTypeReport',
      110 => 'ObjectServiceTypeEquipsReport',
      111 => 'PricesIncreaseReport',
      112 => 'DepartedCustomersReport',
      113 => 'AdminDemandsExecTime',
      114 => 'DemandsObjectsReport',
      115 => 'DemandsMastersReport',
      116 => 'DemandsListDetailsReport',
      117 => 'DemandsListReport',
      118 => 'Contract1Report',
      119 => 'ObjectsSystemsReport',
      120 => 'DemandsBrokenDeadlinesReport',
      121 => 'DemandsBrokenDeadlinesDetailsReport',
      122 => 'DemandsSubmittedTooLateReport',
      123 => 'DemandsForUpgradesReport',
      124 => 'DemandsUniversalReport',
      125 => 'ObjectEquipsReport',
      126 => 'ObjectEquipsReport2',
      127 => 'Equips1',
      128 => 'DemandsDateMaster',
      129 => 'FormObjects',
      130 => 'Contacts2',
      131 => 'AdminRepairDetails',
      132 => 'AdminSystemCompetitors',
      133 => 'ObjectReportAll',
      134 => 'ObjectReport1',
      135 => 'ObjectReport2',
      136 => 'ObjectReport3',
      137 => 'ObjectReport4',
      138 => 'ObjectReport5',
      139 => 'DeliveryDemandsReportAll',
      140 => 'DeliveryDemandsReport',
      141 => 'DeliveryDemandsBrokenDeadlinesReport',
      142 => 'WHDocumentsReportAll',
      143 => 'WHDocuments1Report',
      144 => 'WHDocuments3Report',
      145 => 'WHDocuments4Report',
      146 => 'WHDocuments5Report',
      147 => 'WHDocuments6Report',
      148 => 'WHDocuments7Report',
      149 => 'WHDocuments8Report',
      150 => 'WHDocuments9Report',
      151 => 'WHDocuments10Report',
      152 => 'WHDocuments11Report',
      153 => 'DemandsReportAll',
      154 => 'DemandsReport1',
      155 => 'DemandsReport2',
      156 => 'DemandsReport3',
      157 => 'DemandsReport4',
      158 => 'DemandsReport5',
      159 => 'DemandsReport6',
      160 => 'DemandsReport7',
      161 => 'DemandsReport8',
      162 => 'DemandsReport9',
      163 => 'DemandsReport10',
      164 => 'DemandsReport11',
      165 => 'DemandsReport12',
      166 => 'DebtorsReportAll',
      167 => 'Debt1Report',
      168 => 'Debt2Report',
      169 => 'TasksReportAll',
      170 => 'TasksReport1',
      171 => 'CalcReportAll',
      172 => 'CalcReport1',
    ),
    'assignments' => 
    array (
      'rpy' => 
      array (
        'bizRule' => NULL,
        'data' => NULL,
      ),
    ),
  ),
  'PersonalManager' => 
  array (
    'type' => 2,
    'description' => 'Administrator',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'AdminPositions',
      1 => 'AdminDepartments',
      2 => 'AdminSections',
      3 => 'AdminChildrens',
      4 => 'AdminEmployees',
      5 => 'AdminInstructings',
      6 => 'AdminOrganizationStructure',
      7 => 'Employee1Report',
    ),
  ),
  'HeadServiceCentr' => 
  array (
    'type' => 2,
    'description' => 'Руководитель СЦ',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'UserObjects',
      1 => 'UserObjectsGroup',
      2 => 'ManagerContactInfo',
      3 => 'UserObjectsGroupSystems',
      4 => 'UserObjectEquips',
      5 => 'ManagerContractsS',
      6 => 'ManagerDocuments',
      7 => 'ManagerContacts',
      8 => 'UserObjectsGroupCostCalculations',
      9 => 'ManagerCostCalculations',
      10 => 'ManagerCostCalcEquips',
      11 => 'ManagerCostCalcWorks',
      12 => 'ManagerDemands',
      13 => 'ManagerExecuteReports',
      14 => 'UserRepairs',
      15 => 'UserDeliveryDemands',
      16 => 'MSWHDocuments',
      17 => 'ManagerDocmAchsDetails',
      18 => 'ManagerMonitoringDemands',
      19 => 'ManagerEvents',
      20 => 'ChangeType',
      21 => 'ManagerCostCalcDocuments',
      22 => 'DemandsReportAll',
      23 => 'DemandsReport1',
      24 => 'DemandsReport2',
      25 => 'DemandsReport3',
      26 => 'DemandsReport4',
      27 => 'DemandsReport5',
      28 => 'DemandsReport6',
      29 => 'DemandsReport7',
      30 => 'DemandsReport8',
      31 => 'DemandsReport9',
      32 => 'DemandsReport10',
      33 => 'DemandsReport11',
      34 => 'DemandsReport12',
      35 => 'CalcReportAll',
      36 => 'CalcReport1',
    ),
  ),
  'StaffManager' => 
  array (
    'type' => 2,
    'description' => 'Руководитель СЦ',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerObjects',
      1 => 'UserObjectsGroup',
      2 => 'UpdateObjectsGroup',
      3 => 'ManagerContactInfo',
      4 => 'UserObjectsGroupSystems',
      5 => 'UserEquips',
      6 => 'ManagerObjectEquips',
      7 => 'ManagerContractsS',
      8 => 'ManagerDocuments',
      9 => 'ManagerContacts',
      10 => 'ManagerContractMasterHistory',
      11 => 'ManagerContractsDetails_v',
      12 => 'AdminContractEquips',
      13 => 'UserObjectsGroupCostCalculations',
      14 => 'ManagerCostCalculations',
      15 => 'ManagerCostCalcDocuments',
      16 => 'ManagerCostCalcEquips',
      17 => 'ManagerCostCalcWorks',
      18 => 'ManagerDemands',
      19 => 'ManagerExecuteReports',
      20 => 'UserRepairs',
      21 => 'ManagerRepairComments',
      22 => 'UserDeliveryDemands',
      23 => 'ManagerDeliveryComments',
      24 => 'MSWHDocuments',
      25 => 'AdminSerialNumbers',
      26 => 'ManagerDocmAchsDetails',
      27 => 'ManagerMonitoringDemandDetails',
      28 => 'ManagerMonitoringDemands',
      29 => 'ManagerEvents',
      30 => 'LogDeliveryDemands',
      31 => 'WhActsView',
      32 => 'ManagerWHBuhActs',
      33 => 'FindTreb',
      34 => 'FindWHDoc1',
      35 => 'AdminEvents',
      36 => 'ManagerReplaceMaster',
      37 => 'ManagerObjectEvents',
      38 => 'DemandsReportAll',
      39 => 'DemandsReport1',
      40 => 'DemandsReport2',
      41 => 'DemandsReport3',
      42 => 'DemandsReport4',
      43 => 'DemandsReport5',
      44 => 'DemandsReport6',
      45 => 'DemandsReport7',
      46 => 'DemandsReport8',
      47 => 'DemandsReport9',
      48 => 'DemandsReport10',
      49 => 'DemandsReport11',
      50 => 'DemandsReport12',
      51 => 'EquipsReportAll',
      52 => 'ObjectEquipsReport',
      53 => 'ObjectEquipsReport2',
      54 => 'ObjectReportAll',
      55 => 'ObjectReport1',
      56 => 'ObjectReport2',
      57 => 'ObjectReport3',
      58 => 'ObjectReport4',
      59 => 'ObjectReport5',
    ),
  ),
  'StaffManagerSouth' => 
  array (
    'type' => 2,
    'description' => 'Руководитель СЦ',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'ManagerWHDocuments',
      2 => 'FindTreb',
      3 => 'FindWHDoc1',
      4 => 'ObjectReportAll',
      5 => 'ObjectReport1',
      6 => 'ObjectReport2',
      7 => 'ObjectReport3',
      8 => 'ObjectReport4',
      9 => 'ObjectReport5',
    ),
  ),
  'AccountManager' => 
  array (
    'type' => 2,
    'description' => 'Менеджер по работе с клиентами',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerObjects',
      1 => 'ManagerObjectsGroup',
      2 => 'ManagerOfficeObjectsGroup',
      3 => 'AdminContactInfo',
      4 => 'ManagerObjectsGroupSystems',
      5 => 'DeleteDocmAchsDetails',
      6 => 'ManagerSystemCompetitors',
      7 => 'ManagerObjectEquips',
      8 => 'ManagerContractsS',
      9 => 'ManagerDocuments',
      10 => 'ManagerContacts',
      11 => 'ManagerContractMasterHistory',
      12 => 'AdminContractsDetails_v',
      13 => 'AdminContractEquips',
      14 => 'UserObjectsGroupCostCalculations',
      15 => 'ManagerCostCalculations',
      16 => 'ManagerCostCalcDocuments',
      17 => 'ManagerCostCalcEquips',
      18 => 'ManagerCostCalcWorks',
      19 => 'ManagerDemands',
      20 => 'ManagerExecuteReports',
      21 => 'UserRepairs',
      22 => 'ManagerRepairComments',
      23 => 'UserDeliveryDemands',
      24 => 'ManagerDeliveryComments',
      25 => 'MSWHDocuments',
      26 => 'AdminSerialNumbers',
      27 => 'ManagerDocmAchsDetails',
      28 => 'ManagerMonitoringDemands',
      29 => 'AdminEvents',
      30 => 'ManagerEventOffers',
      31 => 'ManagerOfferDemands',
      32 => 'WhActsView',
      33 => 'ManagerWHBuhActs',
      34 => 'ManagerPropForms',
      35 => 'ManagerBanks',
      36 => 'AdminSystemCompetitors',
      37 => 'ManagerObjectEvents',
      38 => 'DemandsReportAll',
      39 => 'DemandsReport1',
      40 => 'DemandsReport2',
      41 => 'DemandsReport3',
      42 => 'DemandsReport4',
      43 => 'DemandsReport5',
      44 => 'DemandsReport6',
      45 => 'DemandsReport7',
      46 => 'DemandsReport8',
      47 => 'DemandsReport9',
      48 => 'DemandsReport10',
      49 => 'DemandsReport11',
      50 => 'DemandsReport12',
      51 => 'CalcReportAll',
      52 => 'CalcReport1',
    ),
  ),
  'OfficeManager' => 
  array (
    'type' => 2,
    'description' => 'Офис менеджер',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerObjects',
      1 => 'ManagerObjectsGroup',
      2 => 'AdminContactInfo',
      3 => 'ManagerObjectEquips',
      4 => 'ManagerContractsS',
      5 => 'ManagerContractMasterHistory',
      6 => 'ManagerContractsDetails_v',
      7 => 'ManagerDocuments',
      8 => 'ManagerContacts',
      9 => 'AdminContractEquips',
      10 => 'UserObjectsGroupCostCalculations',
      11 => 'ManagerCostCalculations',
      12 => 'ManagerCostCalcDocuments',
      13 => 'ManagerCostCalcEquips',
      14 => 'ManagerCostCalcWorks',
      15 => 'ManagerDemands+',
      16 => 'ManagerExecuteReports',
      17 => 'UserRepairs',
      18 => 'ManagerRepairComments',
      19 => 'ManagerDeliveryComments',
      20 => 'UserDeliveryDemands',
      21 => 'MSWHDocuments',
      22 => 'ManagerDocmAchsDetails',
      23 => 'ManagerMonitoringDemands',
      24 => 'ManagerEvents',
      25 => 'WhActsView',
      26 => 'ManagerControlContacts',
      27 => 'ManagerWHBuhActs',
      28 => 'UserPropForms',
      29 => 'ManagerObjectsGroupSystems',
      30 => 'AdminSystemCompetitors',
      31 => 'DemandsReportAll',
      32 => 'DemandsReport1',
      33 => 'DemandsReport2',
      34 => 'DemandsReport3',
      35 => 'DemandsReport4',
      36 => 'DemandsReport5',
      37 => 'DemandsReport6',
      38 => 'DemandsReport7',
      39 => 'DemandsReport8',
      40 => 'DemandsReport9',
      41 => 'DemandsReport10',
      42 => 'DemandsReport11',
      43 => 'DemandsReport12',
      44 => 'DebtorsReportAll',
      45 => 'Debt1Report',
      46 => 'Debt2Report',
      47 => 'CalcReportAll',
      48 => 'CalcReport1',
    ),
  ),
  'OfficeManagerSouth' => 
  array (
    'type' => 2,
    'description' => 'Офис менеджер - ЮГ',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerObjects',
      1 => 'ManagerObjectsGroup',
      2 => 'AdminContactInfo',
      3 => 'UserObjectsGroupSystems',
      4 => 'ManagerObjectEquips',
      5 => 'ManagerContractsS',
      6 => 'ManagerContractMasterHistory',
      7 => 'ManagerContractsDetails_v',
      8 => 'ManagerDocuments',
      9 => 'ManagerContacts',
      10 => 'AdminContractEquips',
      11 => 'UserObjectsGroupCostCalculations',
      12 => 'ManagerCostCalculations',
      13 => 'ManagerCostCalcDocuments',
      14 => 'ManagerCostCalcEquips',
      15 => 'ManagerCostCalcWorks',
      16 => 'ManagerDemands',
      17 => 'ManagerExecuteReports',
      18 => 'UserRepairs',
      19 => 'ManagerRepairComments',
      20 => 'ManagerDeliveryDemands',
      21 => 'ManagerDeliveryComments',
      22 => 'MSWHDocuments',
      23 => 'AdminSerialNumbers',
      24 => 'AdminDocmAchsDetails',
      25 => 'ManagerMonitoringDemands',
      26 => 'ManagerEvents',
      27 => 'WhActsView',
      28 => 'ManagerControlContacts',
      29 => 'ManagerWHBuhActs',
      30 => 'ManagerInventories',
      31 => 'UserInventoryDetails',
      32 => 'ManagerEquips',
      33 => 'ManagerPropForms',
      34 => 'ManagerBanks',
      35 => 'ManagerObjectsGroupSystems',
      36 => 'AdminSystemCompetitors',
      37 => 'DemandsReportAll',
      38 => 'DemandsReport1',
      39 => 'DemandsReport2',
      40 => 'DemandsReport3',
      41 => 'DemandsReport4',
      42 => 'DemandsReport5',
      43 => 'DemandsReport6',
      44 => 'DemandsReport7',
      45 => 'DemandsReport8',
      46 => 'DemandsReport9',
      47 => 'DemandsReport10',
      48 => 'DemandsReport11',
      49 => 'DemandsReport12',
      50 => 'DebtorsReportAll',
      51 => 'Debt1Report',
      52 => 'Debt2Report',
      53 => 'ObjectReportAll',
      54 => 'ObjectReport1',
      55 => 'ObjectReport2',
      56 => 'ObjectReport3',
      57 => 'ObjectReport4',
      58 => 'ObjectReport5',
      59 => 'CalcReportAll',
      60 => 'CalcReport1',
    ),
  ),
  'LeadEngineer' => 
  array (
    'type' => 2,
    'description' => 'Руководитель СЦ',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'UserObjects',
      1 => 'UserObjectsGroup',
      2 => 'ManagerContactInfo',
      3 => 'UserObjectsGroupSystems',
      4 => 'UserObjectEquips',
      5 => 'ManagerContractsS',
      6 => 'ManagerDocuments',
      7 => 'ManagerContacts',
      8 => 'UserObjectsGroupCostCalculations',
      9 => 'ManagerCostCalculations',
      10 => 'ManagerCostCalcDocuments',
      11 => 'ManagerCostCalcEquips',
      12 => 'ManagerCostCalcWorks',
      13 => 'ManagerDemands',
      14 => 'ManagerExecuteReports',
      15 => 'UserRepairs',
      16 => 'UserDeliveryDemands',
      17 => 'MSWHDocuments',
      18 => 'ManagerDocmAchsDetails',
      19 => 'ManagerMonitoringDemands',
      20 => 'ManagerEvents',
      21 => 'ManagerWHBuhActs',
      22 => 'ManagerEventOffers',
      23 => 'ManagerOfferDemands',
      24 => 'ManagerEquips',
      25 => 'ManagerEqipGroups',
      26 => 'ViewDocs',
      27 => 'ManagerInspectionActs',
      28 => 'ManagerInspectionActEquips',
      29 => 'ManagerInspActEquipCharacteristics',
      30 => 'ManagerInspActOptions',
      31 => 'ManagerInspActRecommendations',
      32 => 'ManagerInspActRemarks',
      33 => 'DemandsReportAll',
      34 => 'DemandsReport1',
      35 => 'DemandsReport2',
      36 => 'DemandsReport3',
      37 => 'DemandsReport4',
      38 => 'DemandsReport5',
      39 => 'DemandsReport6',
      40 => 'DemandsReport7',
      41 => 'DemandsReport8',
      42 => 'DemandsReport9',
      43 => 'DemandsReport10',
      44 => 'DemandsReport11',
      45 => 'DemandsReport12',
      46 => 'ObjectReportAll',
      47 => 'ObjectReport1',
      48 => 'ObjectReport2',
      49 => 'ObjectReport3',
      50 => 'ObjectReport4',
      51 => 'ObjectReport5',
    ),
  ),
  'OfficeManagerSalesDepartment' => 
  array (
    'type' => 2,
    'description' => 'Офис-менеджер отдела продаж',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerObjects',
      1 => 'ManagerOfficeObjectsGroup',
      2 => 'ManagerContactInfo',
      3 => 'UserObjectsGroupSystems',
      4 => 'ManagerObjectEquips',
      5 => 'ManagerContractsS',
      6 => 'ManagerDocuments',
      7 => 'ManagerContacts',
      8 => 'ManagerEquips',
      9 => 'UserObjectsGroupCostCalculations',
      10 => 'ManagerCostCalculations',
      11 => 'ManagerCostCalcDocuments',
      12 => 'ManagerCostCalcEquips',
      13 => 'ManagerCostCalcWorks',
      14 => 'ManagerDemands',
      15 => 'ManagerExecuteReports',
      16 => 'UserRepairs',
      17 => 'UserDeliveryDemands',
      18 => 'MSWHDocuments',
      19 => 'ManagerDocmAchsDetails',
      20 => 'ManagerMonitoringDemands',
      21 => 'ManagerEvents',
      22 => 'WhActsView',
      23 => 'ManagerControlContacts',
      24 => 'ManagerPropForms',
      25 => 'ManagerBanks',
      26 => 'ManagerStreets',
      27 => 'ManagerRegions',
      28 => 'ManagerWHBuhActs',
      29 => 'UserPropForms',
      30 => 'ManagerSalesDepClients',
      31 => 'ManagerInspectionActs',
      32 => 'ManagerInspectionActEquips',
      33 => 'ManagerInspActEquipCharacteristics',
      34 => 'ManagerInspActRemarks',
      35 => 'ManagerInspActRecommendations',
      36 => 'ManagerInspActOptions',
      37 => 'ManagerValuableInstructions',
      38 => 'AdminClientSounds',
      39 => 'DemandsReportAll',
      40 => 'DemandsReport1',
      41 => 'DemandsReport2',
      42 => 'DemandsReport3',
      43 => 'DemandsReport4',
      44 => 'DemandsReport5',
      45 => 'DemandsReport6',
      46 => 'DemandsReport7',
      47 => 'DemandsReport8',
      48 => 'DemandsReport9',
      49 => 'DemandsReport10',
      50 => 'DemandsReport11',
      51 => 'DemandsReport12',
      52 => 'DebtorsReportAll',
      53 => 'Debt1Report',
      54 => 'Debt2Report',
    ),
  ),
  'SalesManager' => 
  array (
    'type' => 2,
    'description' => 'Менеджер по прождажам',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ManagerObjects',
      1 => 'ManagerOfficeObjectsGroup',
      2 => 'UserObjectsGroup',
      3 => 'ManagerContactInfo',
      4 => 'ManagerObjectsGroupSystems',
      5 => 'UserObjectEquips',
      6 => 'ManagerContractsS',
      7 => 'ManagerDocuments',
      8 => 'ManagerContacts',
      9 => 'ManagerObjectEquips',
      10 => 'UserObjectsGroupCostCalculations',
      11 => 'ManagerCostCalculations',
      12 => 'ManagerCostCalcDocuments',
      13 => 'ManagerCostCalcEquips',
      14 => 'ManagerCostCalcWorks',
      15 => 'ManagerDemands',
      16 => 'ManagerExecuteReports',
      17 => 'UserRepairs',
      18 => 'UserDeliveryDemands',
      19 => 'MSWHDocuments',
      20 => 'ManagerDocmAchsDetails',
      21 => 'ManagerMonitoringDemands',
      22 => 'ManagerEvents',
      23 => 'LogDeliveryDemands',
      24 => 'WhActsView',
      25 => 'ManagerWHBuhActs',
      26 => 'ManagerPropForms',
      27 => 'ManagerSalesDepClients',
      28 => 'ManagerInspectionActs',
      29 => 'ManagerInspectionActEquips',
      30 => 'ManagerInspActEquipCharacteristics',
      31 => 'ManagerInspActRemarks',
      32 => 'ManagerInspActRecommendations',
      33 => 'ManagerInspActOptions',
      34 => 'ManagerValuableInstructions',
      35 => 'AdminClientSounds',
      36 => 'DemandsReportAll',
      37 => 'DemandsReport1',
      38 => 'DemandsReport2',
      39 => 'DemandsReport3',
      40 => 'DemandsReport4',
      41 => 'DemandsReport5',
      42 => 'DemandsReport6',
      43 => 'DemandsReport7',
      44 => 'DemandsReport8',
      45 => 'DemandsReport9',
      46 => 'DemandsReport10',
      47 => 'DemandsReport11',
      48 => 'DemandsReport12',
    ),
  ),
  'HeadSalesDepartment' => 
  array (
    'type' => 2,
    'description' => 'Руководитель ОПР',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'UserObjects',
      1 => 'ManagerBanks',
      2 => 'UserObjectsGroup',
      3 => 'ManagerContactInfo',
      4 => 'UserObjectsGroupSystems',
      5 => 'UserObjectEquips',
      6 => 'ManagerContractsS',
      7 => 'ManagerDocuments',
      8 => 'ManagerContacts',
      9 => 'UserObjectsGroupCostCalculations',
      10 => 'ManagerCostCalculations',
      11 => 'ManagerCostCalcDocuments',
      12 => 'ManagerCostCalcEquips',
      13 => 'ManagerCostCalcWorks',
      14 => 'ManagerDemands',
      15 => 'ManagerExecuteReports',
      16 => 'UserRepairs',
      17 => 'ManagerDeliveryComments',
      18 => 'UserDeliveryDemands',
      19 => 'MSWHDocuments',
      20 => 'ManagerDocmAchsDetails',
      21 => 'ManagerMonitoringDemands',
      22 => 'ManagerEvents',
      23 => 'LogDeliveryDemands',
      24 => 'WhActsView',
      25 => 'ManagerWHBuhActs',
      26 => 'SalesManager',
      27 => 'ManagerSalesDepClients',
      28 => 'ManagerInspectionActs',
      29 => 'ManagerInspectionActEquips',
      30 => 'ManagerInspActEquipCharacteristics',
      31 => 'ManagerInspActRemarks',
      32 => 'ManagerInspActRecommendations',
      33 => 'ManagerInspActOptions',
      34 => 'ManagerValuableInstructions',
      35 => 'AdminClientSounds',
      36 => 'DemandsReportAll',
      37 => 'DemandsReport1',
      38 => 'DemandsReport2',
      39 => 'DemandsReport3',
      40 => 'DemandsReport4',
      41 => 'DemandsReport5',
      42 => 'DemandsReport6',
      43 => 'DemandsReport7',
      44 => 'DemandsReport8',
      45 => 'DemandsReport9',
      46 => 'DemandsReport10',
      47 => 'DemandsReport11',
      48 => 'DemandsReport12',
    ),
  ),
  'HeadMaterialLogistics' => 
  array (
    'type' => 2,
    'description' => 'Руководитель ОПР',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ProjectManager',
      1 => 'ManagerMaterialLogistics',
      2 => 'EngineerPRC',
      3 => 'HeadLogistics',
    ),
  ),
  'HeadAPPZ' => 
  array (
    'type' => 2,
    'description' => 'Руководитель направления ПБ и ИТП',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'ProjectManager',
      1 => 'AdminObjectsGroupSystems',
      2 => 'AdminObjectsGroupSystemComplexitys',
      3 => 'ManagerSalesDepClients',
      4 => 'ManagerInspectionActs',
      5 => 'ManagerInspectionActEquips',
      6 => 'ManagerInspActEquipCharacteristics',
      7 => 'ManagerInspActRemarks',
      8 => 'ManagerInspActRecommendations',
      9 => 'ManagerInspActOptions',
      10 => 'ManagerValuableInstructions',
      11 => 'AdminClientSounds',
      12 => 'ManagerEquips',
      13 => 'ManagerEqipGroups',
    ),
  ),
  'ProjectManager' => 
  array (
    'type' => 2,
    'description' => 'Менеджер проектов',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'ManagerObjectEquips',
      2 => 'ManagerObjects',
      3 => 'AdminContractEquips',
      4 => 'AdminContractsDetails_v',
      5 => 'ManagerSalesDepClients',
      6 => 'ManagerInspectionActs',
      7 => 'ManagerInspectionActEquips',
      8 => 'ManagerInspActEquipCharacteristics',
      9 => 'ManagerInspActRemarks',
      10 => 'ManagerInspActRecommendations',
      11 => 'ManagerInspActOptions',
      12 => 'ManagerValuableInstructions',
      13 => 'AdminClientSounds',
      14 => 'ManagerEquips',
    ),
  ),
  'ManagerMaterialLogistics' => 
  array (
    'type' => 2,
    'description' => 'Менеджер ОМТО',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'AdminRepairs',
      2 => 'UserWhActs',
      3 => 'AdminRepairDocs',
      4 => 'ManagerEquips',
      5 => 'AdminSuppliers',
      6 => 'ManagerDeliveryDemands',
      7 => 'WHDocumentsReportAll',
      8 => 'WHDocuments1Report',
      9 => 'WHDocuments3Report',
      10 => 'WHDocuments4Report',
      11 => 'WHDocuments5Report',
      12 => 'WHDocuments6Report',
      13 => 'WHDocuments7Report',
      14 => 'WHDocuments8Report',
      15 => 'WHDocuments9Report',
      16 => 'WHDocuments10Report',
      17 => 'WHDocuments11Report',
    ),
  ),
  'EngineerPRC' => 
  array (
    'type' => 2,
    'description' => 'Инженер ПРЦ',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'AdminRepairs',
      2 => 'AdminRepairDocs',
      3 => 'AdminSuppliers',
      4 => 'UserWhActs',
      5 => 'ManagerEquips',
      6 => 'WHDocumentsReportAll',
      7 => 'WHDocuments1Report',
      8 => 'WHDocuments3Report',
      9 => 'WHDocuments4Report',
      10 => 'WHDocuments5Report',
      11 => 'WHDocuments6Report',
      12 => 'WHDocuments7Report',
      13 => 'WHDocuments8Report',
      14 => 'WHDocuments9Report',
      15 => 'WHDocuments10Report',
      16 => 'WHDocuments11Report',
    ),
  ),
  'HeadLogistics' => 
  array (
    'type' => 2,
    'description' => 'Руководитель логистики',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'LogisticsManager',
      1 => 'Storeman',
      2 => 'ManagerInventoryDetails',
      3 => 'AdminInventories',
      4 => 'ManagerMaterialLogistics',
      5 => 'AdminWHDocuments',
      6 => 'AdminSuppliers',
      7 => 'ManagerWhActs',
    ),
  ),
  'LogisticsManager' => 
  array (
    'type' => 2,
    'description' => 'Менеджер по логитике',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'ManagerWHDocuments',
      2 => 'ManagerDeliveryDemands',
      3 => 'ManagerDeliveryComments',
      4 => 'ManagerMonitoringDemands',
      5 => 'ManagerMonitoringDemandDetails',
      6 => 'ManagerPriceMonitoring',
      7 => 'ManagerEquips',
      8 => 'AdminAddressedStorage',
      9 => 'AdminSuppliers',
      10 => 'ManagerAddressSystems',
      11 => 'ManagerInventories',
      12 => 'UserInventoryDetails',
      13 => 'UserPriceList',
      14 => 'UserPriceListDetails',
      15 => 'ManagerControlWHDocuments',
      16 => 'AdminRepairs',
      17 => 'UserWhActs',
      18 => 'AdminRepairDocs',
      19 => 'DeliveryDemandsReportAll',
      20 => 'DeliveryDemandsReport',
      21 => 'DeliveryDemandsBrokenDeadlinesReport',
      22 => 'WHDocumentsReportAll',
      23 => 'WHDocuments1Report',
      24 => 'WHDocuments3Report',
      25 => 'WHDocuments4Report',
      26 => 'WHDocuments5Report',
      27 => 'WHDocuments6Report',
      28 => 'WHDocuments7Report',
      29 => 'WHDocuments8Report',
      30 => 'WHDocuments9Report',
      31 => 'WHDocuments10Report',
      32 => 'WHDocuments11Report',
      33 => 'WHActsAll',
      34 => 'WHActs1Report',
      35 => 'WHActs2Report',
      36 => 'WHActs3Report',
      37 => 'WHActs4Report',
    ),
  ),
  'Storeman' => 
  array (
    'type' => 2,
    'description' => 'Кладовщик',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'ManagerWHDocuments',
      2 => 'ManagerEquips',
      3 => 'AdminSuppliers',
      4 => 'ManagerAddressSystems',
      5 => 'ManagerInventories',
      6 => 'UserInventoryDetails',
      7 => 'AdminDocmAchsDetails',
      8 => 'AdminRepairs',
      9 => 'UserWhActs',
      10 => 'AdminRepairDocs',
      11 => 'WHActsAll',
      12 => 'WHActs1Report',
      13 => 'WHActs2Report',
      14 => 'WHActs3Report',
      15 => 'WHActs4Report',
      16 => 'WHDocumentsReportAll',
      17 => 'WHDocuments1Report',
      18 => 'WHDocuments3Report',
      19 => 'WHDocuments4Report',
      20 => 'WHDocuments5Report',
      21 => 'WHDocuments6Report',
      22 => 'WHDocuments7Report',
      23 => 'WHDocuments8Report',
      24 => 'WHDocuments9Report',
      25 => 'WHDocuments10Report',
      26 => 'WHDocuments11Report',
    ),
  ),
  'AccountantGeneral' => 
  array (
    'type' => 2,
    'description' => 'Главный бухгалтер',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'ManagerPaymentHistory',
      2 => 'AdminContractsDetails_v',
      3 => 'UserContractEquips',
      4 => 'AdminContractPriceHistory',
      5 => 'Storeman',
    ),
  ),
  'Accountant' => 
  array (
    'type' => 2,
    'description' => 'Бухгалтер',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'ManagerPaymentHistory',
      2 => 'AdminContractsDetails_v',
      3 => 'UserContractEquips',
    ),
  ),
  'EconomistAccountant' => 
  array (
    'type' => 2,
    'description' => 'Экономист-бухгалтер',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'ManagerPaymentHistory',
      2 => 'AdminContractsDetails_v',
      3 => 'UserContractEquips',
    ),
  ),
  'HeadMarketing' => 
  array (
    'type' => 2,
    'description' => 'Руководитель отдела маркетинга',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'SeniorDispatcher',
      2 => 'AdministartorDispatchers',
    ),
  ),
  'MarketingManager' => 
  array (
    'type' => 2,
    'description' => 'Менеджер по маркетингу',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
    ),
  ),
  'InternetMarketer' => 
  array (
    'type' => 2,
    'description' => 'Интернет-маркетолог',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
    ),
  ),
  'SeniorEconomist' => 
  array (
    'type' => 2,
    'description' => 'Старший экономист',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'StaffManager',
      1 => 'SeniorDispatcher',
      2 => 'EconomistAccountant',
      3 => 'OfficeManagerSalesDepartment',
      4 => 'AccountManager',
      5 => 'ManagerWhActs',
      6 => 'AdminSystemComplexitys',
      7 => 'AdminSystemStatements',
      8 => 'AdminDocuments',
      9 => 'AdminWHBuhActs',
      10 => 'AdminContractMasterHistory',
      11 => 'AdminDemands',
      12 => 'AdminCostCalcSalarys',
      13 => 'AdminContactInfo',
      14 => 'AdminObjectsGroupSystems',
      15 => 'AdminObjectsGroupSystemComplexitys',
      16 => 'AdminSystemCompetitors',
      17 => 'AdminContractsS',
      18 => 'AdminContractPriceHistory',
      19 => 'AdminCostCalcDocuments',
    ),
  ),
  'FinanceManager' => 
  array (
    'type' => 2,
    'description' => 'Менеджер по финансам',
    'bizRule' => NULL,
    'data' => NULL,
    'children' => 
    array (
      0 => 'SeniorEconomist',
    ),
  ),
);
