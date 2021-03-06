var Sources = {};

Sources.SourceListObjects =
{
    datatype: "json",
    datafields: [
        { name: 'Object_id' },
        { name: 'ObjectGr_id' },
        { name: 'Street_id' },
        { name: 'House' },
        { name: 'Addr', type: 'string' },
        { name: 'FullName', type: 'string' },
        { name: 'JuridicalPerson' },
        { name: 'AreaName' },
        { name: 'ServiceType' },
        { name: 'MasterName'},
        { name: 'year_construction' },
        { name: 'VIP' },
        { name: 'Territ_Name' },
        { name: 'ContrS_id' },
        { name: 'Status' }
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ListObjects',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        Sources.SourceListObjects.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListObjectsMin =
{
    datatype: "json",
    datafields: [
        { name: 'Object_id' },
        { name: 'ObjectGr_id' },
        { name: 'Street_id' },
        { name: 'House' },
        { name: 'Addr', type: 'string' },
        { name: 'FullName', type: 'string' },
        { name: 'JuridicalPerson' },
        { name: 'AreaName' },
        { name: 'ServiceType' },
        { name: 'MasterName'},
        { name: 'year_construction' },
        { name: 'VIP' },
        { name: 'Territ_Name' },
        { name: 'ContrS_id' },
        { name: 'Status' },
        { name: 'ServiceManager', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ListObjectsMin',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListEmployees =
{
    datatype: "json",
    datafields: [
        {name: 'Employee_id', type: 'int'},
        {name: 'Employee_id_For_Demands', type: 'string'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'ShortName', type: 'string'}
    ],
    id: 'Employee_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ListEmployees',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDemandTypeList =
{
    datatype: "json",
    datafields: [
        { name: 'DemandType_id', type: 'int' },
        { name: 'DemandType', type: 'string' }
    ],
    id: 'DemandType_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DemandTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceDemandTypes =
{
    datatype: "json",
    datafields: [
        { name: 'DType_id' },
        { name: 'DemandType_id' },
        { name: 'DemandType' }
    ],
    id: 'DType_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceSystemTypeList =
{
    datatype: "json",
    datafields: [
        { name: 'SystemType_Id' },
        { name: 'SystemTypeName' },
    ],
    id: 'SystemType_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SystemTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceSystemTypes =
{
    datatype: "json",
    datafields: [
        { name: 'DSystem_id' },
        { name: 'DType_id' },
        { name: 'SystemType_id' },
        { name: 'SystemType' },
    ],
    id: 'DSystem_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DSystems',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourceSystemTypes.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceEquipTypes =
{
    datatype: "json",
    datafields: [
        { name: 'DEquip_id' },
        { name: 'DSystem_id' },
        { name: 'EquipType_id' },
        { name: 'EquipType' },
    ],
    id: 'DEquip_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DEquips',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourceEquipTypes.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceMalfunctions =
{
    datatype: "json",
    datafields: [
        { name: 'DMalfunction_id' },
        { name: 'DEquip_id' },
        { name: 'Malfunction_id' },
        { name: 'Malfunction' },
    ],
    id: 'DMalfunction_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DMalfunctions',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourceMalfunctions.totalrecords = data[0].TotalRows;
        }
};

Sources.SourcePriors =
{
    datatype: "json",
    datafields: [
        { name: 'DPrior_id' },
        { name: 'DMalfunction_id' },
        { name: 'DemandPrior_id' },
        { name: 'DemandPrior' },
    ],
    id: 'DPrior_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DPriors',
    root: 'Rows',
    type: 'POST',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourcePriors.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceContactInfo =
{
    datatype: "json",
    datafields: [
        { name: 'Info_id', type: 'int' },
        { name: 'contact', type: 'string' },
        { name: 'FIO', type: 'string' },
        { name: 'CName', type: 'string' },
        { name: 'SelEmail', type: 'string'},
        { name: 'Email', type: 'string'},
        
    ],
    id: 'Info_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContactInfo',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.DemandsSource =
{
    datatype: "json",
    datafields: [
        { name: 'Demand_id', type: 'int'},
        { name: 'Object_id', type: 'int'},
        { name: 'ObjectGr_id', type: 'int'},
        { name: 'Address', type: 'string'},
        { name: 'UCreateName', type: 'string'},
        { name: 'VIPName', type: 'string'},
        { name: 'DateReg', type: 'date'},
        { name: 'Deadline', type: 'date'},
        { name: 'DateMaster', type: 'date'},
        { name: 'DateExec', type: 'date'},
        { name: 'DateExecFilter', type: 'date'},
        { name: 'ExceedDays', type: 'int'},
        { name: 'FullOverDay', type: 'int'},
        { name: 'DemandType', type: 'string'},
        { name: 'EquipType', type: 'string'},
        { name: 'Malfunction', type: 'string'},
        { name: 'DemandPrior', type: 'string'},
        { name: 'DemandPrior_id', type: 'int'},
        { name: 'MasterName', type: 'string'},
        { name: 'PlanDateExec', type: 'date'},
        { name: 'ExecutorsName', type: 'string'},
        { name: 'ServiceType', type: 'string'},
        { name: 'FirstDemandType', type: 'string'},
        { name: 'Contacts', type: 'string'},
        { name: 'DemandText', type: 'string'},
        { name: 'Note', type: 'string'},
        { name: 'AreaName', type: 'string'},
        { name: 'UChangeName', type: 'string'},
        { name: 'ResultName', type: 'string'},
        { name: 'OtherName', type: 'string'},
        { name: 'Territ_id', type: 'int'},
        { name: 'Street_id', type: 'int'},
        { name: 'House', type: 'string'},
        { name: 'Contacts', type: 'string'},
        { name: 'StatusOP', type: 'int'},
        { name: 'StatusOPName', type: 'string'},
        { name: 'FirstDemandPrior', type: 'string'},
        { name: 'Initiator_id', type: 'int'},
        { name: 'InitiatorName', type: 'string'},
        
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=Demands',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListAddresses =
{
    datatype: "json",
    datafields: [
        { name: 'Object_id', type: 'int' },
        { name: 'ObjectGr_id', type: 'int' },
        { name: 'Address_id', type: 'int' },
        { name: 'Addr', type: 'string' },
    ],
    id: 'Object_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AddressList',
    root: 'Rows',
    cache: true,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
   }
};

Sources.SourceTerritory =
{
    datatype: "json",
    datafields: [
        { name: 'Territ_Id' },
        { name: 'Territ_Name' },
    ],
    id: 'Territ_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Territory',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceStreets =
{
    datatype: "json",
    datafields: [
        { name: 'Street_id' },
        { name: 'StreetName' },
        { name: 'Region_id', type: 'int' },
    ],
    id: 'Street_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Streets',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

/* Ход работы */
Sources.SourceExecutorReports =
{
    datatype: "json",
    datafields: [
        {name: 'exrp_id', type: 'int'},
        {name: 'demand_id', type: 'int'},
        {name: 'date', type: 'date'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'empl_id', type: 'int'},
        {name: 'plandateexec', type: 'date'},
        {name: 'dateexec', type: 'date'},
        {name: 'report', type: 'string'},
        {name: 'othername', type: 'string'},
        {name: 'StageName', type: 'string'},
        {name: 'ContactName', type: 'string'},
        {name: 'ActionOperationName', type: 'string'},
        {name: 'ActionResultName', type: 'string'},
        {name: 'ResponsibleName', type: 'string'},
        {name: 'FIO', type: 'string'},
        {name: 'NextAction', type: 'string'},
    ],
    id: 'exrp_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ExecutorReports',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourceExecutorReports.totalrecords = data[0].TotalRows;
        }
};

/* Причины несвоевременного закрытия заявки */
Sources.SourceDelayedClosureReasons =
{
    datatype: "json",
    datafields: [
        {name: 'DelayedClosureReason_id', type: 'int'},
        {name: 'Name', type: 'string'},
    ],
    id: 'DelayedClosureReason_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DelayedClosureReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceDelayedClosureReasons.totalrecords = data[0].TotalRows;
    }
};

/* Причины перевода заявки */
Sources.SourceTransferReasons =
{
    datatype: "json",
    datafields: [
        {name: 'TransferReason_id', type: 'int'},
        {name: 'TransferReason', type: 'string'},
    ],
    id: 'TransferReason_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=TransferReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceTransferReasons.totalrecords = data[0].TotalRows;
    }
};

/* Причины закрытия */
Sources.SourceCloseReasons =
{
    datatype: "json",
    datafields: [
        {name: 'CloseReason_id', type: 'int'},
        {name: 'CloseReason', type: 'string'},
    ],
    id: 'CloseReason_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=CloseReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceCloseReasons.totalrecords = data[0].TotalRows;
    }
};

/* Причины просрочки */
Sources.SourceDelayReasons =
{
    datatype: "json",
    datafields: [
        {name: 'dlrs_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'dlrs_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DelayReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceDelayReasons.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDemandResults =
{
    datatype: "json",
    datafields: [
        {name: 'Result_id', type: 'int'},
        {name: 'ResultName', type: 'string'},
    ],
    id: 'Result_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DemandResults',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceDemandResults.totalrecords = data[0].TotalRows;
    }
};

/* исполнителе по заявкам */
Sources.SourceDemandsExecutors =
{
    datatype: "json",
    datafields: [
        {name: 'DemandExecutor_id', type: 'int'},
        {name: 'Demand_id', type: 'int'},
        {name: 'Employee_id', type: 'int'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'Date', type: 'date'},
    ],
    id: 'Result_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DemandsExecutors',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceDemandsExecutors.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListRegionsMin =
{
    datatype: "json",
    datafields: [
        {name: 'Region_id', type: 'int'},
        {name: 'RegionName', type: 'string'},
    ],
    id: 'Region_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Regions',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceListRegionsMin.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceListStreetsMin =
{
    datatype: "json",
    datafields: [
        {name: 'Region_id', type: 'int'},
        {name: 'RegionName', type: 'string'},
        {name: 'Street_id', type: 'int'},
        {name: 'StreetName', type: 'string'},
        {name: 'StreetType', type: 'string'},
    ],
    id: 'Street_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Streets',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListStreetTypesMin =
{
    datatype: "json",
    datafields: [
        {name: 'StreetType_id', type: 'int'},
        {name: 'StreetType', type: 'string'},
    ],
    id: 'StreetType_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=StreetTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceListStreetTypesMin.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListTerritoryMin =
{
    datatype: "json",
    datafields: [
        {name: 'Territ_Id', type: 'int'},
        {name: 'Territ_Name', type: 'string'},
        {name: 'Note', type: 'string'},
    ],
    id: 'Territ_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Territory',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceListTerritoryMin.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListSystemComplexitysMin =
{
    datatype: "json",
    datafields: [
        {name: 'SystemComplexitys_id', type: 'int'},
        {name: 'SystemComplexitysName', type: 'string'},
        {name: 'Coefficient', type: 'float'},
    ],
    id: 'SystemComplexitys_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SystemComplexitys',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceListSystemComplexitysMin.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListSystemStatementsMin =
{
    datatype: "json",
    datafields: [
        {name: 'SystemStatements_id', type: 'int'},
        {name: 'SystemStatementsName', type: 'string'},
        {name: 'Coefficient', type: 'float'},
    ],
    id: 'SystemStatements_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SystemStatements',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceListSystemStatementsMin.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceListPriceMonitoringMin =
{
    datatype: "json",
    datafields: [
        {name: 'mntr_id', type: 'int'},
        {name: 'date', type: 'date'},
        {name: 'eqip_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'UnitMeasurement_Id', type: 'int'},
        {name: 'NameUnitMeasurement', type: 'string'},
        {name: 'splr_id', type: 'int'},
        {name: 'NameSupplier', type: 'string'},
        {name: 'price', type: 'float'},
        {name: 'price_high', type: 'float'},
        {name: 'price_retail', type: 'float'},
        {name: 'user_create_id', type: 'int'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'ShortName', type: 'string'},
        {name: 'date_create', type: 'date'},
        {name: 'user_change', type: 'string'},
        {name: 'date_change', type: 'date'},
        {name: 'delivery', type: 'string'},
        {name: 'mndm_id', type: 'int'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=PriceMonitoring',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListEquipsMin =
{
    datatype: "json",
    datafields: [
        {name: 'Equip_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'NameUM', type: 'string'},
        {name: 'discontinued', type: 'date'},
        {name: 'EmplChangeInventory', type: 'int'}
    ],
    id: 'Equip_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EquipsListAll',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceListSuppliersMin =
{
    datatype: "json",
    datafields: [
        {name: 'Supplier_id', type: 'int'},
        {name: 'NameSupplier', type: 'string'},
    ],
    id: 'Supplier_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Suppliers',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceListSuppliersMin.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceOrganizationStructure =
{
    datatype: "json",
    datafields: [
        {name: 'Structure_id', type: 'int'},
        {name: 'Parent_id', type: 'int'},
        {name: 'empl_id', type: 'int'},
        {name: 'ShortName', type: 'string'},
    ],
    id: 'Structure_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=OrganizationStructure',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    
    hierarchy:
    {
        keyDataField: { name: 'Structure_id' },
        parentDataField: { name: 'Parent_id' }
    },
    
    beforeprocessing: function (data) {
        Sources.SourceOrganizationStructure.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceContactInfoMax =
{
    datatype: "json",
    datafields: [
        { name: 'Info_id',  type: 'int' },
        { name: 'FIO', type: 'string' },
        { name: 'Telephone', type: 'string' },
        { name: 'Cstm_id', type: 'int' },
        { name: 'CustomerName', type: 'string' },
        { name: 'Email', type: 'string' },
        { name: 'CTelephone', type: 'string' },
        { name: 'Main', type: 'bool' },
        { name: 'Birthday', type: 'date' },
        { name: 'ForReport', type: 'bool' },
        { name: 'NoSend', type: 'bool' },
    ],
    id: 'Info_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContactInfo',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceContactInfoMax.totalrecords = data[0].TotalRows;
    }
};



Sources.SourceOrganizationsVMin =
{
    datatype: "json",
    datafields: [
        { name: 'Form_id',  type: 'int' },
        { name: 'FormName',  type: 'string' },
        { name: 'FullName',  type: 'string' },
        { name: 'JAddress',  type: 'string' },
        { name: 'FAddress',  type: 'string' },
        { name: 'bank_name',  type: 'string' },
        { name: 'bik',  type: 'string' },
        { name: 'cor_account',  type: 'string' },
        { name: 'inn',  type: 'string' },
        { name: 'account',  type: 'string' },
    ],
    id: 'Form_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=OrganizationsVMin',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceAreas =
{
    datatype: "json",
    datafields: [
        { name: 'Area_id',  type: 'int' },
        { name: 'AreaName',  type: 'string' },
    ],
    id: 'Area_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Areas',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceAreas.totalrecords = data[0].TotalRows;
    }
};



Sources.SourceClientGroup =
{
    datatype: "json",
    datafields: [
        { name: 'clgr_id',  type: 'int' },
        { name: 'ClientGroup',  type: 'string' },
    ],
    id: 'clgr_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ClientGroups',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceClientGroup.totalrecords = data[0].TotalRows;
    }
};



Sources.SourceCustomers =
{
    datatype: "json",
    datafields: [
        { name: 'Customer_Id',  type: 'int' },
        { name: 'CustomerName',  type: 'string' },
    ],
    id: 'Customer_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Customers',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        Sources.SourceCustomers.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceOrganizationsV =
{
    datatype: "json",
    datafields: [
        { name: 'Form_id',  type: 'int' },
        { name: 'FormName',  type: 'string' },
        { name: 'FownName',  type: 'string' },
        { name: 'JAddress',  type: 'string' },
        { name: 'FAddress',  type: 'string' },
        { name: 'telephone',  type: 'string' },
        { name: 'bank_name',  type: 'string' },
        { name: 'inn',  type: 'string' },
        { name: 'kpp',  type: 'string' },
        { name: 'account',  type: 'string' },
        { name: 'bik',  type: 'string' },
        { name: 'cor_account',  type: 'string' },
        { name: 'cityb',  type: 'string' },
        { name: 'lph_name',  type: 'string' },
        { name: 'DEBT',  type: 'string' },
        { name: 'sum_price',  type: 'string' },
        { name: 'sum_appz_price',  type: 'string' },
        { name: 'sum_appz_price',  type: 'string' },
        { name: 'telephone',  type: 'string' },
        {name: 'Number', type: 'string'},
        {name: 'Status_id', type: 'int'},
        {name: 'Segment_id', type: 'int'},
        {name: 'SubSegment_id', type: 'int'},
        {name: 'SourceInfo_id', type: 'int'},
        {name: 'SubSourceInfo_id', type: 'int'},
        {name: 'BrandName', type: 'string'},
        {name: 'WWW', type: 'string'},
        {name: 'CountObjects', type: 'int'},
    ],
    id: 'Form_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=OrganizationsV',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};


Sources.SourceObjectsGroupSystems =
{
    datatype: "json",
    datafields: [
        { name: 'ObjectsGroupSystem_id',  type: 'int' },
        { name: 'ObjectGr_id',  type: 'int' },
        { name: 'Sttp_id',  type: 'int' },
        { name: 'Desc',  type: 'string' },
        { name: 'SystemTypeName',  type: 'string' },
        { name: 'Availability_id',  type: 'int' },
        { name: 'Availability',  type: 'string' },
        { name: 'Condition',  type: 'string' },
        { name: 'sysav_id',  type: 'int' },
        { name: 'count',  type: 'int' },
        { name: 'Competitors',  type: 'string' },
        {name: 'SysCmplxt_id', type: 'int'},
        {name: 'SysSttmnt_id', type: 'int'},
        {name: 'SystemComplexitysName', type: 'string'},
        {name: 'SystemStatementsName', type: 'string'},
        {name: 'Coefficient', type: 'float'},
        {name: 'Coefficient2', type: 'float'},
        {name: 'SystemComplexityFull', type: 'string'},
    ],
    id: 'ObjectsGroupSystem_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ObjectsGroupSystems',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};


Sources.SourceSystemTypesMin =
{
    datatype: "json",
    datafields: [
        { name: 'SystemType_Id', type: 'int' },
        { name: 'SystemTypeName', type: 'string' },
    ],
    id: 'SystemType_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SystemTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceSystemAvailabilitys =
{
    datatype: "json",
    datafields: [
        { name: 'code_id', type: 'int' },
        { name: 'availability',  type: 'string' },
    ],
    id: 'code_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SystemAvailabilitys',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceCompetitors =
{
    datatype: "json",
    datafields: [
        { name: 'cmtr_id', type: 'int' },
        { name: 'Competitor',  type: 'string' },
    ],
    id: 'cmtr_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Competitors',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceSystemCompetitors =
{
    datatype: "json",
    datafields: [
        { name: 'SystemCompetitor_id', type: 'int' },
        { name: 'ObjectsGroupSystem_id', type: 'int' },
        { name: 'Cmtr_id', type: 'int' },
        { name: 'Competitor',  type: 'string' },
    ],
    id: 'SystemCompetitor_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SystemCompetitors',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceObjects =
{
    datatype: "json",
    datafields: [
        { name: 'Object_id', type: 'int' },
        { name: 'ObjectGr_id', type: 'int' },
        { name: 'Address_id', type: 'int' },
        { name: 'Doorway',  type: 'string' },
        { name: 'ObjectType',  type: 'int' },
        { name: 'ObjectTypeName',  type: 'string' },
        { name: 'Note',  type: 'string' },
        { name: 'Complexity_id',  type: 'int' },
        { name: 'ComplexityName',  type: 'string' },
        { name: 'Condition',  type: 'string' },
        { name: 'Code',  type: 'string' },
        { name: 'MasterKey',  type: 'string' },
        { name: 'Signal',  type: 'string' },
        { name: 'Cntp_id',  type: 'int' },
        { name: 'ConnectionType',  type: 'string' },
    ],
    id: 'Object_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Objects',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceObjectEquips =
{
    datatype: "json",
    datafields: [
        { name: 'Code', type: 'int' },
        { name: 'Object_Id', type: 'int' },
        { name: 'ObjectGr_id', type: 'int' },
        { name: 'Equip_id',  type: 'int' },
        { name: 'EquipName',  type: 'string' },
        { name: 'EquipQuant',  type: 'string' },
        { name: 'Note',  type: 'string' },
        { name: 'StockNumber',  type: 'string' },
        { name: 'DateInstall',  type: 'date' },
        { name: 'DateService',  type: 'date' },
        { name: 'Status',  type: 'string' },
        { name: 'Condition',  type: 'string' },
        { name: 'flag',  type: 'string' },
        { name: 'Location',  type: 'string' },
    ],
    id: 'Object_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ObjectEquips',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceObjectTypes =
{
    datatype: "json",
    datafields: [
        { name: 'ObjectType_Id', type: 'int' },
        { name: 'ObjectType', type: 'string' },
    ],
    id: 'Object_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ObjectTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceComplexityTypes =
{
    datatype: "json",
    datafields: [
        { name: 'Complexity_Id', type: 'int' },
        { name: 'ComplexityName', type: 'string' },
    ],
    id: 'Object_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ComplexityTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceConnectionTypes =
{
    datatype: "json",
    datafields: [
        { name: 'ConnectionType_id', type: 'int' },
        { name: 'ConnectionType', type: 'string' },
    ],
    id: 'Object_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ConnectionTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.Contacts =
{
    datatype: "json",
    datafields: [
        { name: 'cont_id', type: 'int' },
        { name: 'ObjectGr_id', type: 'int' },
        { name: 'date', type: 'date' },
        { name: 'GroupContact', type: 'string' },
        { name: 'Kind', type: 'int' },
        { name: 'Kind_Name', type: 'string' },
        { name: 'SourceInfo_id', type: 'int' },
        { name: 'sourceInfo_name', type: 'string' },
        { name: 'info_id', type: 'int' },
        { name: 'cntp_id', type: 'int' },
        { name: 'cntp_name', type: 'string' },
        { name: 'empl_id', type: 'int' },
        { name: 'empl_name', type: 'string' },
        { name: 'contact', type: 'string' },
        { name: 'UserCreateName', type: 'string' },
        { name: 'next_date', type: 'date' },
        { name: 'next_cntp_name', type: 'string' },
        { name: 'next_contact', type: 'string' },
        { name: 'text', type: 'string' },
        { name: 'rslt_id', type: 'int' },
        { name: 'rslt_name', type: 'string' },
        { name: 'drsn_id', type: 'int' },
        { name: 'drsn_name', type: 'string' },
        { name: 'note', type: 'string' },
        { name: 'Telephone', type: 'string' },
        { name: 'pay_date', type: 'date' },
        { name: 'time_length', type: 'int' },
        { name: 'FullName', type: 'string' },
        { name: 'Addr', type: 'string' },
        { name: 'Debt', type: 'float' },
        { name: 'ContactPriority', type: 'bool' },
    ],
    id: 'cont_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Contacts',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceContactKinds =
{
    datatype: "json",
    datafields: [
        { name: 'Kind_id', type: 'int' },
        { name: 'Kind_name', type: 'string' },
    ],
    id: 'Kind_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContactKinds',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceContactTypes =
{
    datatype: "json",
    datafields: [
        { name: 'Contact_id', type: 'int' },
        { name: 'ContactName', type: 'string' },
    ],
    id: 'Contact_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContactTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceDebtReasons =
{
    datatype: "json",
    datafields: [
        { name: 'drsn_Id', type: 'int' },
        { name: 'name', type: 'string' },
    ],
    id: 'drsn_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DebtReasons',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.DeliveryDemandsSource =
{
    datatype: "json",
    datafields: [
        { name: 'dldm_id', type: 'int'},
        { name: 'date', type: 'date'},
        { name: 'user_sender', type: 'int'},
        { name: 'user_sender_name', type: 'string'},
        { name: 'objc_id', type: 'int'},
        { name: 'dltp_id', type: 'int'},
        { name: 'DeliveryType', type: 'string'},
        { name: 'mstr_id', type: 'int'},
        { name: 'MasterName', type: 'string'},
        { name: 'prty_id', type: 'int'},
        { name: 'DemandPrior', type: 'string'},
        { name: 'bestdate', type: 'date'},
        { name: 'deadline', type: 'date'},
        { name: 'plandate', type: 'date'},
        { name: 'text', type: 'string'},
        { name: 'phonenumber', type: 'string'},
        { name: 'empl_dlvr_id', type: 'int'},
        { name: 'DeliveryMan', type: 'string'},
        { name: 'date_logist', type: 'date'},
        { name: 'user_logist', type: 'int'},
        { name: 'user_logist_name', type: 'string'},
        { name: 'note', type: 'string'},
        { name: 'date_delivery', type: 'date'},
        { name: 'rep_delivery', type: 'string'},
        { name: 'Contacts', type: 'string'},
        { name: 'contact_info', type: 'string'},
        { name: 'dlrs_id', type: 'int'},
        { name: 'date_promise', type: 'date'},
        { name: 'prtp_id', type: 'int'},
        { name: 'prdoc_id', type: 'int'},
        { name: 'calc_id', type: 'int'},
        { name: 'docm_id', type: 'int'},
        { name: 'dmnd_id', type: 'int'},
        { name: 'repr_id', type: 'int'},
        { name: 'Addr', type: 'string'},
        { name: 'overday', type: 'int'},
        
        
        
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=DeliveryDemands',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceSourceInfo =
{
    datatype: "json",
    datafields: [
        { name: 'SourceInfo_id', type: 'int' },
        { name: 'SourceInfo_name', type: 'string' },
    ],
    id: 'SourceInfo_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SourceInfo',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};




Sources.SourceResults =
{
    datatype: "json",
    datafields: [
        {name: 'Result_Id', type: 'int'},
        {name: 'ResultName', type: 'string'},
    ],
    id: 'Result_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Results',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDeliveryComments =
{
    datatype: "json",
    datafields: [
        {name: 'dlcm_id', type: 'int'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'Employeename', type: 'string'},
        {name: 'text', type: 'string'},
        {name: 'date_create', type: 'date'},
    ],
    id: 'dlcm_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DeliveryComments',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDeliveryDetails =
{
    datatype: "json",
    datafields: [
        {name: 'dldt_id', type: 'int'},
        {name: 'equipname', type: 'string'},
        {name: 'um_name', type: 'string'},
        {name: 'quant', type: 'float'},
        {name: 'used', type: 'bool'},
    ],
    id: 'dldt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DeliveryDetails',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDeliveryTypes =
{
    datatype: "json",
    datafields: [
        {name: 'dltp_id', type: 'int'},
        {name: 'DeliveryType', type: 'string'},
    ],
    id: 'dltp_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DeliveryTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDemandPriors =
{
    datatype: "json",
    datafields: [
        {name: 'DemandPrior_id', type: 'int'},
        {name: 'DemandPrior', type: 'string'},
    ],
    id: 'DemandPrior_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DemandPriors',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDeliveryDemandPriors =
{
    datatype: "json",
    datafields: [
        {name: 'DemandPrior_id', type: 'int'},
        {name: 'DemandPrior', type: 'string'},
    ],
    id: 'DemandPrior_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DeliveryDemandPriors',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDelayReasons =
{
    datatype: "json",
    datafields: [
        {name: 'dlrs_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'dlrs_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DelayReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceContractsS =
{
    datatype: "json",
    datafields: [
        {name: 'ContrS_id', type: 'int'},
        {name: 'ContrNumS', type: 'string'},
        {name: 'DocType_Name', type: 'string'},
        {name: 'crtp_name', type: 'string'},
        {name: 'date_doc', type: 'date'},
        {name: 'ContrDateS', type: 'date'},
        {name: 'ContrSDateStart', type: 'date'},
        {name: 'ContrSDateEnd', type: 'date'},
        {name: 'PaymentName', type: 'string'},
        {name: 'PaymentTypeName', type: 'string'},
        {name: 'Debt', type: 'float'},
        {name: 'DatePay', type: 'date'},
        {name: 'Debtor', type: 'bool'},
        {name: 'CalcSum', type: 'float'},
        {name: 'JuridicalPerson', type: 'string'},
        {name: 'Master', type: 'int'},
        {name: 'MasterName', type: 'string'},
        {name: 'SpecialCondition', type: 'string'},
        {name: 'ContrNote', type: 'string'},
        {name: 'DateExecuting', type: 'date'},
        {name: 'Price', type: 'float'},
        {name: 'PriceMonth', type: 'float'},
        {name: 'Reason_id', type: 'int'},
        {name: 'PropForm_id', type: 'int'},
        {name: 'LastChangeDate', type: 'date'},
        {name: 'SumPay', type: 'float'},
    ],
    id: 'ContrS_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractsS',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};



Sources.SourceContractsDetails_v =
{
    datatype: "json",
    datafields: [
        {name: 'csdt_id', type: 'int'},
        {name: 'ContrS_id', type: 'int'},
        {name: 'Equip_id', type: 'int'},
        {name: 'Name', type: 'string'},
        {name: 'ItemName', type: 'string'},
        {name: 'price', type: 'float'},
        {name: 'Quant', type: 'int'},
        {name: 'sum', type: 'float'},
        {name: 'Note', type: 'string'},
    ],
    id: 'csdt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractsDetails_v',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};



Sources.SourceUnitMeasurement =
{
    datatype: "json",
    datafields: [
        {name: 'UnitMeasurement_Id', type: 'int'},
        {name: 'NameUnitMeasurement', type: 'string'},
    ],
    id: 'UnitMeasurement_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=UnitMeasurement',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDelayReasonsLogistik =
{
    datatype: "json",
    datafields: [
        {name: 'dlrs_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'dlrs_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DelayReasonsLogistik',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceJuridicalsMin =
{
    datatype: "json",
    datafields: [
        { name: 'Jrdc_Id',  type: 'int' },
        { name: 'JuridicalPerson',  type: 'string' },
    ],
    id: 'Jrdc_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=JuridicalsMin',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceJuridicalsMin =
{
    datatype: "json",
    datafields: [
        { name: 'Jrdc_Id',  type: 'int' },
        { name: 'JuridicalPerson',  type: 'string' },
    ],
    id: 'Jrdc_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=JuridicalsMin',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};



Sources.SourceContractTypes =
{
    datatype: "json",
    datafields: [
        { name: 'crtp_id',  type: 'int' },
        { name: 'name',  type: 'string' },
    ],
    id: 'crtp_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};



Sources.SourcePaymentTypes =
{
    datatype: "json",
    datafields: [
        { name: 'PaymentType_Id',  type: 'int' },
        { name: 'PaymentTypeName',  type: 'string' },
    ],
    id: 'PaymentType_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PaymentTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};



Sources.SourcePaymentPeriods =
{
    datatype: "json",
    datafields: [
        { name: 'PaymentPeriod_Id',  type: 'int' },
        { name: 'PaymentName',  type: 'string' },
    ],
    id: 'PaymentPeriod_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PaymentPeriods',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceServiceTypes =
{
    datatype: "json",
    datafields: [
        { name: 'ServiceType_id',  type: 'int' },
        { name: 'ServiceType',  type: 'string' },
    ],
    id: 'ServiceType_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ServiceTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceContractMasterHistory =
{
    datatype: "json",
    datafields: [
        { name: 'History_id',  type: 'int' },
        { name: 'ContrS_id',  type: 'int' },
        { name: 'Master',  type: 'int' },
        { name: 'EmployeeName',  type: 'string' },
        { name: 'WorkDateStart',  type: 'date' },
        { name: 'WorkDateEnd',  type: 'date' },
    ],
    id: 'History_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractMasterHistory',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceContractEquips =
{
    datatype: "json",
    datafields: [
        { name: 'creq_id',  type: 'int' },
        { name: 'contrs_id',  type: 'int' },
        { name: 'eqip_id',  type: 'int' },
        { name: 'equipname',  type: 'string' },
        { name: 'um_name',  type: 'string' },
        { name: 'price',  type: 'float' },
        { name: 'quant',  type: 'float' },
        { name: 'sum',  type: 'float' },
    ],
    id: 'creq_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractEquips',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceContractSystems =
{
    datatype: "json",
    datafields: [
        { name: 'ContractSystem_id',  type: 'int' },
        { name: 'ContrS_id',  type: 'int' },
        { name: 'SystemType_id',  type: 'int' },
        { name: 'SystemTypeName',  type: 'string' },
    ],
    id: 'ContractSystem_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractSystems',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceContractPriceHistory =
{
    datatype: "json",
    datafields: [
        { name: 'PriceHistory_id',  type: 'int' },
        { name: 'ContrS_id',  type: 'int' },
        { name: 'Reason_id',  type: 'int' },
        { name: 'ServiceType_id',  type: 'int' },
        { name: 'DateStart',  type: 'date' },
        { name: 'DateEnd',  type: 'date' },
        { name: 'Price',  type: 'float' },
        { name: 'PriceMonth',  type: 'float' },
        { name: 'ReasonName',  type: 'string' },
        { name: 'ServiceType',  type: 'string' },
    ],
    id: 'PriceHistory_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractPriceHistory',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourcePriceChangeReasons =
{
    datatype: "json",
    datafields: [
        { name: 'Reason_id',  type: 'int' },
        { name: 'ReasonName',  type: 'string' },
    ],
    id: 'Reason_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PriceChangeReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourcePaymentHistory =
{
    datatype: "json",
    datafields: [
        { name: 'pmhs_id',  type: 'int' },
        { name: 'cntr_id',  type: 'int' },
        { name: 'date',  type: 'date' },
        { name: 'year_start',  type: 'int' },
        { name: 'year_end',  type: 'int' },
        { name: 'month_start',  type: 'int' },
        { name: 'month_end',  type: 'int' },
        { name: 'sum',  type: 'float' },
        { name: 'note',  type: 'string' },
        { name: 'month_start_name',  type: 'string' },
        { name: 'month_end_name',  type: 'string' },
    ],
    id: 'pmhs_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PaymentHistory',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceMonths =
{
    datatype: "json",
    datafields: [
        { name: 'Month_id',  type: 'int' },
        { name: 'Month_name',  type: 'string' },
        { name: 'Month_name_eu',  type: 'string' },
    ],
    id: 'Month_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Months',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceMonitoringDemands =
{
    datatype: "json",
    datafields: [
        { name: 'mndm_id',  type: 'int' },
        { name: 'Date',  type: 'date' },
        { name: 'Prior',  type: 'int' },
        { name: 'DemandPrior',  type: 'string' },
        { name: 'Deadline',  type: 'date' },
        { name: 'WishDate',  type: 'date' },
        { name: 'PlanDate',  type: 'date' },
        { name: 'Description',  type: 'string' },
        { name: 'UserName',  type: 'string' },
        { name: 'Employee_id',  type: 'int' },
        { name: 'Note',  type: 'string' },
        { name: 'DateExec',  type: 'date' },
        { name: 'Calc_id',  type: 'int' },
        { name: 'Dmnd_id',  type: 'int' },
        { name: 'Repr_id',  type: 'int' },
        { name: 'User2',  type: 'string' },
        { name: 'EmplNameAccept',  type: 'string' },
        { name: 'UserCreate2',  type: 'string' },
        { name: 'DateCreate',  type: 'date' },
        { name: 'UserChange2',  type: 'string' },
        { name: 'DateChange',  type: 'date' },
        { name: 'UserAccept2',  type: 'string' },
        { name: 'DateAccept',  type: 'date' },
        { name: 'OverDays',  type: 'int' },
        { name: 'DelDate',  type: 'date' },
        { name: 'prtp_id',  type: 'int' },
        { name: 'prdoc_id',  type: 'int' },
        { name: 'Lock',  type: 'bool' },
        { name: 'EmplLock',  type: 'int' },
        { name: 'DateLock',  type: 'date' },
        { name: 'EmplCreate',  type: 'int' },
        { name: 'EmplChange',  type: 'int' },
        { name: 'EmplDel',  type: 'int' },
        { name: 'prtp_id',  type: 'int' },
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=MonitoringDemands',
    //type: 'POST',
    root: 'Rows',
    cache: false,
    //async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceMonitoringDemandDetails =
{
    datatype: "json",
    datafields: [
        { name: 'mndt_id',  type: 'int' },
        { name: 'EquipName',  type: 'string' },
        { name: 'equip_id',  type: 'int' },
        { name: 'price',  type: 'int' },
        { name: 'quant',  type: 'int' },
        { name: 'Note',  type: 'string' },
        { name: 'NameUnitMeasurement',  type: 'string' },
        { name: 'price_low',  type: 'float' },
        { name: 'price_high',  type: 'float' },
    ],
    id: 'mndt_id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=MonitoringDemandDetails',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEmployees =
{
    datatype: "json",
    datafields: [
        {name: 'Employee_id', type: 'int'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'ShortName', type: 'string'},
        {name: 'Address', type: 'string'},
        {name: 'Addr', type: 'string'},
        {name: 'Birthday', type: 'date'},
        {name: 'PositionName', type: 'string'},
        {name: 'DepName', type: 'string'},
        {name: 'SectionName', type: 'string'},
        {name: 'Territ_Name', type: 'string'},
        {name: 'DateStart', type: 'date'},
        {name: 'DateEnd', type: 'date'},
        {name: 'JuridicalPerson', type: 'string'},
        {name: 'DateBegin', type: 'date'},
        {name: 'DateTrial', type: 'date'},
        {name: 'BypassList', type: 'date'},
        {name: 'CerDateIn', type: 'date'},
        {name: 'CerDateOut', type: 'date'},
        {name: 'Note', type: 'string'},
        {name: 'Tel_home', type: 'string'},
        {name: 'Tel_work', type: 'string'},
        {name: 'Tel_other', type: 'string'},
        {name: 'WorkEmail', type: 'string'},
        {name: 'Email', type: 'string'},
        {name: 'Information', type: 'string'},
        {name: 'Documents', type: 'string'},
        
        
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=Employees',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourcePositions =
{
    datatype: "json",
    datafields: [
        { name: 'Position_id',  type: 'int' },
        { name: 'PositionName',  type: 'string' },
    ],
    id: 'Position_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Positions',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceSections =
{
    datatype: "json",
    datafields: [
        { name: 'Section_id',  type: 'int' },
        { name: 'SectionName',  type: 'string' },
    ],
    id: 'Position_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Sections',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDepartments =
{
    datatype: "json",
    datafields: [
        { name: 'Dep_id',  type: 'int' },
        { name: 'DepName',  type: 'string' },
    ],
    id: 'Position_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Departments',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceChildrens =
{
    datatype: "json",
    datafields: [
        { name: 'Children_id',  type: 'int' },
        { name: 'Employee_id',  type: 'int' },
        { name: 'ChildrenName',  type: 'string' },
        { name: 'BirthDay',  type: 'date' },
        { name: 'DateCreate',  type: 'date' },
        { name: 'Age',  type: 'string' },
    ],
    id: 'Children_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Childrens',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInstructings =
{
    datatype: "json",
    datafields: [
        { name: 'Instructing_id',  type: 'int' },
        { name: 'Employee_id',  type: 'int' },
        { name: 'UserExec',  type: 'int' },
        { name: 'EmployeeName',  type: 'string' },
        { name: 'Name',  type: 'string' },
        { name: 'Date',  type: 'date' },
        { name: 'Note',  type: 'string' },
    ],
    id: 'Instructing_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Instructings',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceControlContacts =
{
    datatype: "json",
    datafields: [
        { name: 'ObjectGr_id',  type: 'int' },
        { name: 'Org_id',  type: 'int' },
        { name: 'PKey',  type: 'int' },
        { name: 'FullName',  type: 'string' },
        { name: 'Addr',  type: 'string' },
        { name: 'Address_id',  type: 'int' },
        { name: 'Doctype_Name',  type: 'string' },
        { name: 'ContrNumS',  type: 'int' },
        { name: 'ContrDateS',  type: 'date' },
        { name: 'empl_name',  type: 'string' },
        { name: 'empl_id',  type: 'int' },
        { name: 'text',  type: 'string' },
        { name: 'next_date',  type: 'date' },
        { name: 'next_info_id',  type: 'int' },
        { name: 'next_cntp_id',  type: 'int' },
        { name: 'next_cntp_name',  type: 'string' },
        { name: 'next_contact',  type: 'string' },
        { name: 'contact',  type: 'string' },
        { name: 'note',  type: 'string' },
        { name: 'date',  type: 'date' },
        { name: 'rslt_name',  type: 'string' },
        { name: 'drsn_name',  type: 'string' },
        { name: 'cntp_name',  type: 'string' },
        { name: 'debt',  type: 'float' },
        { name: 'last_cont',  type: 'date' },
        { name: 'ContactPriority',  type: 'bool' },
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=ControlContacts',
//    type: 'POST',
    root: 'Rows',
    cache: false,
//    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceSpecialDays =
{
    datatype: "json",
    datafields: [
        { name: 'sday_id',  type: 'int' },
        { name: 'date',  type: 'date' },
        { name: 'datp_id',  type: 'int' },
        { name: 'minutes',  type: 'int' },
        { name: 'datp_name',  type: 'string' },
        
    ],
    id: 'sday_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SpecialDays',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEquipTypesList =
{
    datatype: "json",
    datafields: [
        { name: 'EquipType_id',  type: 'int' },
        { name: 'EquipType',  type: 'string' },
    ],
    id: 'EquipType_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EquipTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceMalfunctionsOld =
{
    datatype: "json",
    datafields: [
        { name: 'Malfunction_id',  type: 'int' },
        { name: 'Malfunction',  type: 'string' },
    ],
    id: 'Malfunction_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Malfunctions',
    root: 'Rows',
    
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceDemandTypesList =
{
    datatype: "json",
    datafields: [
        { name: 'DemandType_id',  type: 'int' },
        { name: 'DemandType',  type: 'string' },
        { name: 'dd',  type: 'bool' },
        { name: 'd',  type: 'bool' },
        { name: 'id',  type: 'bool' },
    ],
    id: 'DemandType_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DemandTypes',
    root: 'Rows',
    type: 'POST',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
            this.totalrecords = data[0].TotalRows;
        }
};

Sources.SourceDemandsExecTime =
{
    datatype: "json",
    datafields: [
        { name: 'DType_id',  type: 'int' },
        { name: 'DemandType_id',  type: 'int' },
        { name: 'DemandType',  type: 'string' },
        { name: 'DSystem_id',  type: 'int' },
        { name: 'SystemType_id',  type: 'int' },
        { name: 'SystemTypeName',  type: 'string' },
        { name: 'DEquip_id',  type: 'int' },
        { name: 'EquipType_id',  type: 'int' },
        { name: 'EquipType',  type: 'string' },
        { name: 'DMalfunction_id',  type: 'int' },
        { name: 'Malfunction_id',  type: 'int' },
        { name: 'Malfunction',  type: 'string' },
        { name: 'DPrior_id',  type: 'int' },
        { name: 'DemandPrior_id',  type: 'int' },
        { name: 'DemandPrior',  type: 'string' },
        { name: 'Demandet_id',  type: 'int' },
        { name: 'ExceedDays',  type: 'int' },
        { name: 'ExceedType',  type: 'int' },
        { name: 'ExceedTypeName',  type: 'string' },
        { name: 'DayOff',  type: 'bool' },
        { name: 'VipDayOff',  type: 'bool' },
        { name: 'VipExceedDays',  type: 'int' },
    ],
    id: 'DPrior_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DemandsExecTime',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsAllSource =
{
    datatype: "json",
    datafields: [
        { name: 'docm_id', type: 'int'},
        { name: 'objc_id', type: 'int'},
        { name: 'dctp_id', type: 'int'},
        { name: 'dctp_name', type: 'string'},
        { name: 'number', type: 'string'},
        { name: 'date', type: 'date'},
        { name: 'date_create', type: 'date'},
        { name: 'note', type: 'string'},
        { name: 'actn_code', type: 'int'},
        { name: 'actn_name', type: 'string'},
        { name: 'ac_date', type: 'date'},
        { name: 'Source', type: 'string'},
        { name: 'Destination', type: 'string'},
        { name: 'achs_id', type: 'int'},
        { name: 'wrtp_name', type: 'string'},
        { name: 'wrtp_gr', type: 'string'},
        { name: 'strg_id', type: 'int'},
        { name: 'storage', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsAll',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsDoc1Source =
{
    datatype: "json",
    datafields: [
        { name: 'docm_id', type: 'int'},
        { name: 'objc_id', type: 'int'},
        { name: 'dctp_id', type: 'int'},
        { name: 'dctp_name', type: 'string'},
        { name: 'dckn_id', type: 'int'},
        { name: 'dckn_name', type: 'string'},
        { name: 'number', type: 'string'},
        { name: 'date', type: 'date'},
        { name: 'd.date', type: 'date'},
        { name: 'date_create', type: 'date'},
        { name: 'note', type: 'string'},
        { name: 'splr_name', type: 'string'},
        { name: 'ac_date', type: 'date'},
        { name: 'strm_name', type: 'string'},
        { name: 'achs_id', type: 'int'},
        { name: 'wrtp_name', type: 'string'},
        { name: 'summa', type: 'float'},
        { name: 'c_date', type: 'date'},
        { name: 'c_name', type: 'string'},
        { name: 'c_confirmname', type: 'string'},
        { name: 'strg_id', type: 'int'},
        { name: 'storage', type: 'string'},
        { name: 'jrdc_id', type: 'int'},
        { name: 'JuridicalPerson', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsDoc1',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsDoc2Source =
{
    datatype: "json",
    datafields: [
        { name: 'docm_id', type: 'int'},
        { name: 'objc_id', type: 'int'},
        { name: 'dctp_id', type: 'int'},
        { name: 'dctp_name', type: 'string'},
        { name: 'dckn_id', type: 'int'},
        { name: 'dckn_name', type: 'string'},
        { name: 'number', type: 'string'},
        { name: 'date', type: 'date'},
        { name: 'date_create', type: 'date'},
        { name: 'note', type: 'string'},
        { name: 'Address', type: 'string'},
        { name: 'rtrs_id', type: 'int'},
        { name: 'rtrs_name', type: 'string'},
        { name: 'ac_date', type: 'date'},
        { name: 'strm_name', type: 'string'},
        { name: 'mstr_name', type: 'string'},
        { name: 'achs_id', type: 'int'},
        { name: 'wrtp_id', type: 'int'},
        { name: 'wrtp_name', type: 'string'},
        { name: 'strg_id', type: 'int'},
        { name: 'storage', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsDoc2',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsDoc3Source =
{
    datatype: "json",
    datafields: [
        { name: 'docm_id', type: 'int'},
        { name: 'objc_id', type: 'int'},
        { name: 'dctp_id', type: 'int'},
        { name: 'dctp_name', type: 'string'},
        { name: 'number', type: 'string'},
        { name: 'date', type: 'date'},
        { name: 'date_create', type: 'date'},
        { name: 'note', type: 'string'},
        { name: 'splr_name', type: 'string'},
        { name: 'ac_date', type: 'date'},
        { name: 'strm_name', type: 'string'},
        { name: 'achs_id', type: 'int'},
        { name: 'wrtp_name', type: 'string'},
        { name: 'strg_id', type: 'int'},
        { name: 'storage', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsDoc3',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsDoc4Source =
{
    datatype: "json",
    datafields: [
        { name: 'docm_id', type: 'int'},
        { name: 'dctp_id', type: 'int'},
        { name: 'objc_id', type: 'int'},
        { name: 'dctp_name', type: 'string'},
        { name: 'number', type: 'string'},
        { name: 'date', type: 'date'},
        { name: 'date_create', type: 'date'},
        { name: 'prty_name', type: 'string'},
        { name: 'wrtp_name', type: 'string'},
        { name: 'Address', type: 'string'},
        { name: 'AddressForFind', type: 'string'},
        { name: 'best_date', type: 'date'},
        { name: 'deadline', type: 'date'},
        { name: 'date_ready', type: 'date'},
        { name: 'ac_date', type: 'date'},
        { name: 'dmnd_empl_name', type: 'string'},
        { name: 'dmnd_empl_id', type: 'int'},
        { name: 'prms_empl_name', type: 'string'},
        { name: 'empl_name', type: 'string'},
        { name: 'empl_id', type: 'int'},
        { name: 'ReceiptNumber', type: 'string'},
        { name: 'ReceiptDate', type: 'date'},
        { name: 'strm_name', type: 'string'},
        { name: 'mstr_name', type: 'string'},
        { name: 'rcrs_name', type: 'string'},
        { name: 'rcrs_name2', type: 'string'},
        { name: 'StatusFull', type: 'string'},
        { name: 'status', type: 'int'},
        { name: 'date_promise', type: 'date'},
        { name: 'achs_id', type: 'int'},
        { name: 'c_date', type: 'date'},
        { name: 'c_name', type: 'string'},
        { name: 'c_confirmname', type: 'string'},
        { name: 'overday', type: 'int'},
        { name: 'date_prchs', type: 'date'},
        { name: 'empl_prchs', type: 'int'},
        { name: 'name_prchs', type: 'string'},
        { name: 'state_prchs', type: 'string'},
        { name: 'strg_id', type: 'int'},
        { name: 'storage', type: 'string'},
        { name: 'control', type: 'bool'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsDoc4',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsDoc8Source =
{
    datatype: "json",
    datafields: [
        { name: 'invn_id',  type: 'int' },
        { name: 'docm_id', type: 'int' },
        { name: 'objc_id', type: 'int' },
        { name: 'dctp_id', type: 'int' },
        { name: 'dctp_name', type: 'string' },
        { name: 'number', type: 'string' }, 
        { name: 'date', type: 'date' },
        { name: 'date_create', type: 'date' },
        { name: 'note', type: 'string' },
        { name: 'rtrs_name', type: 'string' },
        { name: 'ac_date', type: 'date' },
        { name: 'strm_name', type: 'string' },
        { name: 'achs_id', type: 'int' },
        { name: 'wrtp_name', type: 'string' },
        { name: 'strg_id', type: 'int' },
        { name: 'storage', type: 'string' },
        { name: 'in_strg_id', type: 'int' },
        { name: 'in_storage', type: 'string' },
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsDoc8',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsDoc7Source =
{
    datatype: "json",
    datafields: [
        { name: 'docm_id', type: 'int' },
        { name: 'dctp_id', type: 'int' },
        { name: 'objc_id', type: 'int' },
        { name: 'dctp_name', type: 'string' },
        { name: 'number', type: 'string' },
        { name: 'date', type: 'date' },
        { name: 'date_create', type: 'date' },
        { name: 'note', type: 'string' },
        { name: 'Address', type: 'string' },
        { name: 'rtrs_name', type: 'string' },
        { name: 'ac_date', type: 'date' },
        { name: 'strm_name', type: 'string' },
        { name: 'mstr_name', type: 'string' },
        { name: 'achs_id', type: 'int' },
        { name: 'wrtp_name', type: 'string' },
        { name: 'overday', type: 'int' },
        { name: 'strg_id', type: 'int' },
        { name: 'storage', type: 'string' },
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsDoc7',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.WHDocumentsDoc9Source =
{
    datatype: "json",
    datafields: [
        { name: 'docm_id', type: 'int' },
        { name: 'docm_id', type: 'int' },
        { name: 'dctp_id', type: 'int' },
        { name: 'dctp_name', type: 'string' },
        { name: 'number', type: 'string' },
        { name: 'status', type: 'string' },
        { name: 'date', type: 'date' },
        { name: 'date_create', type: 'date' },
        { name: 'note', type: 'string' },
        { name: 'address', type: 'string' },
        { name: 'ac_date', type: 'date' },
        { name: 'dmnd_empl_name', type: 'string' },
        { name: 'dmnd_empl_id', type: 'int' },
        { name: 'empl_name', type: 'string' },
        { name: 'empl_id', type: 'int' },
        { name: 'strm_id', type: 'int' },
        { name: 'strm_name', type: 'string' },
        { name: 'achs_id', type: 'int' },
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WHDocumentsDoc9',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.DocmAchsDetailsSource =
{
    datatype: "json",
    datafields: [
        { name: 'dadt_id', type: 'int' },
        { name: 'docm_id', type: 'int' },
        { name: 'eqip_id', type: 'int' },
        { name: 'achs_id', type: 'int' },
        { name: 'EquipName', type: 'string' },
        { name: 'UnitMeasurement_Id', type: 'int' },
        { name: 'NameUnitMeasurement', type: 'string' },
        { name: 'docm_quant', type: 'float' },
        { name: 'fact_quant', type: 'float' },
        { name: 'quant', type: 'float' },
        { name: 'used', type: 'bool' },
        { name: 'ToProduction', type: 'bool' },
        { name: 'price', type: 'float' }, 
        { name: 'sum', type: 'float' },
        { name: 'Emplchange', type: 'int' },
        { name: 'date_change', type: 'date' },
        { name: 'Emplcreate', type: 'int' },
        { name: 'date_create', type: 'date' },
        { name: 'discontinued', type: 'string' },
        { name: 'SN', type: 'string' },
        { name: 'color', type: 'bool' },
        { name: 'no_price_list', type: 'bool' },
        { name: 'EmplChangeInventory', type: 'int' },
        
    ],
    id: 'dadt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DocmAchsDetails',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.DocmAchsDetailsAuditSource =
{
    datatype: "json",
    datafields: [
        { name: 'History_id', type: 'int' },
        { name: 'Action', type: 'int' },
        { name: 'ActionName', type: 'string' },
        { name: 'ActionDate', type: 'date' },
        { name: 'ActionEmpl', type: 'string' },
        { name: 'Docm_id', type: 'int' },
        { name: 'Dadt_id', type: 'int' },
        { name: 'Eqip_id', type: 'int' },
        { name: 'EquipName', type: 'string' },
        { name: 'docm_quant', type: 'float' },
        { name: 'fact_quant', type: 'float' },
        { name: 'used', type: 'bool' },
        { name: 'price', type: 'float' },
        { name: 'sum', type: 'float' },
        { name: 'ToProduction', type: 'bool' },
        { name: 'no_price_list', type: 'bool' },
        { name: 'old_eqip_id', type: 'int' },
        { name: 'OldEquipName', type: 'string' },
        { name: 'old_docm_quant', type: 'float' },
        { name: 'old_fact_quant', type: 'float' },
        { name: 'old_used', type: 'bool' },
        { name: 'old_price', type: 'float' },
        { name: 'old_sum', type: 'float' },
        { name: 'old_ToProduction', type: 'bool' },
        { name: 'old_no_price_list', type: 'bool' }
    ],
    id: 'dadt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DocmAchsDetailsAudit',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.DocmAchsDetailsReservSource =
{
    datatype: "json",
    datafields: [
        { name: 'dadt_id', type: 'int' },
        { name: 'docm_id', type: 'int' },
        { name: 'number', type: 'string' },
        { name: 'eqip_id', type: 'int' },
        { name: 'achs_id', type: 'int' },
        { name: 'EquipName', type: 'string' },
        { name: 'UnitMeasurement_Id', type: 'int' },
        { name: 'NameUnitMeasurement', type: 'string' },
        { name: 'docm_quant', type: 'float' },
        { name: 'fact_quant', type: 'float' },
        { name: 'quant', type: 'float' },
        { name: 'used', type: 'bool' },
        { name: 'ToProduction', type: 'bool' },
        { name: 'price', type: 'float' }, 
        { name: 'sum', type: 'float' },
        { name: 'Emplchange', type: 'int' },
        { name: 'date_change', type: 'date' },
        { name: 'Emplcreate', type: 'int' },
        { name: 'date_create', type: 'date' },
        { name: 'discontinued', type: 'string' },
        { name: 'SN', type: 'string' },
        { name: 'color', type: 'bool' },
        { name: 'no_price_list', type: 'bool' },
    ],
    id: 'dadt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DocmAchsDetailsReserv',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.InventoryEquipsSource =
{
    datatype: "json",
    datafields: [
        { name: 'Equip_id', type: 'int' },
        { name: 'EquipName', type: 'string' },
        { name: 'Storage_id', type: 'int' },
        { name: 'Storage', type: 'string' },
        { name: 'quant', type: 'float' },
        { name: 'quant_used', type: 'float' }
    ],
    id: 'dadt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InventoryEquips',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInventories =
{
    datatype: "json",
    datafields: [
        { name: 'invn_id',  type: 'int' },
        { name: 'date',  type: 'date' },
        { name: 'closed',  type: 'bool' },
        { name: 'strg_id',  type: 'int' },
        { name: 'storage',  type: 'string' },
    ],
    id: 'invn_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Inventories',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceStoragesList =
{
    datatype: "json",
    datafields: [
        { name: 'storage_id', type: 'int'},
        { name: 'storage', type: 'string'},
    ],
    id: 'storage_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=StoragesList',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInventoryDetails =
{
    datatype: "json",
    datafields: [
        { name: 'indt_id', type: 'int'},
        { name: 'invn_id', type: 'int'},
        { name: 'eqip_id', type: 'int'},
        { name: 'EquipName', type: 'string'},
        { name: 'UnitMeasurement_id', type: 'int'},
        { name: 'NameUnitMeasurement', type: 'string'},
        { name: 'quant', type: 'int'},
        { name: 'quant_used', type: 'int'},
    ],
    id: 'indt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InventoryDetails',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourcePriceMarkups =
{
    datatype: "json",
    datafields: [
        { name: 'mrkp_id', type: 'int'},
        { name: 'date_start', type: 'date'},
        { name: 'date_end', type: 'date'},
    ],
    id: 'mrkp_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PriceMarkups',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourcePriceMarkupDetails =
{
    datatype: "json",
    datafields: [
        { name: 'mrdt_id', type: 'int'},
        { name: 'mrkp_id', type: 'int'},
        { name: 'eqip_id', type: 'int'},
        { name: 'splr_id', type: 'int'},
        { name: 'grp_id', type: 'int'},
        { name: 'EquipName', type: 'string'},
        { name: 'NameSupplier', type: 'string'},
        { name: 'grp_name', type: 'string'},
        { name: 'Price', type: 'int'},
        { name: 'MarkupLow', type: 'int'},
        { name: 'MarkupHigh', type: 'int'},
    ],
    id: 'mrdt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PriceMarkupDetails',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEquipGroupsListMin =
{
    datatype: "json",
    datafields: [
        { name: 'grp_id', type: 'int'},
        { name: 'name', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=EquipGroupsListMin',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceSuppliersListMin =
{
    datatype: "json",
    datafields: [
        {name: 'Supplier_id', type: 'int'},
        {name: 'NameSupplier', type: 'string'},
        {name: 'FullName', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=SuppliersListMin',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceWorkTypes =
{
    datatype: "json",
    datafields: [
        {name: 'wrtp_id', type: 'int'},
        {name: 'name', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=WorkTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceWHDocKinds =
{
    datatype: "json",
    datafields: [
        {name: 'dckn_id', type: 'int'},
        {name: 'name', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=WHDocKinds',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};
Sources.SourcePriceList =
{
    datatype: "json",
    datafields: [
        {name: 'prlt_id', type: 'int'},
        {name: 'date', type: 'date'},
        {name: 'note', type: 'string'},
    ],
    id: 'prlt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PriceList',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceConfirmCancels =
{
    datatype: "json",
    datafields: [
        {name: 'ConfirmCancel_id', type: 'int'},
        {name: 'ConfirmCancelName', type: 'string'},
    ],
    id: 'ConfirmCancel_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ConfirmCancels',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceSerialNumbers =
{
    datatype: "json",
    datafields: [
        {name: 'srnm_id', type: 'int'},
        {name: 'dadt_id', type: 'int'},
        {name: 'SN', type: 'string'},
    ],
    id: 'srnm_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SerialNumbers',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceWHDocumentsMin =
{
    datatype: "json",
    datafields: [
        {name: 'docm_id', type: 'int'},
        {name: 'number', type: 'string'},
        {name: 'date', type: 'date'},
        {name: 'doc', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=WHDocumentsMin',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceReturnReasons =
{
    datatype: "json",
    datafields: [
        {name: 'rtrs_id', type: 'int'},
        {name: 'name', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ReturnReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};
Sources.SourceObjectsGroupCostCalculations =
{
    datatype: "json",
    datafields: [
        {name: 'calc_id', type: 'int'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'cgrp_id', type: 'int'},
        {name: 'number', type: 'int'},
        {name: 'group_name', type: 'string'},
        {name: 'CostGroupName', type: 'string'},
        {name: 'date', type: 'date'},
        {name: 'type', type: 'int'},
        {name: 'CostCalcType', type: 'string'},
        {name: 'count_type0', type: 'int'},
        {name: 'count_type1', type: 'int'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'cnt_date', type: 'date'},
        {name: 'cntp_name', type: 'int'},
        {name: 'FIO', type: 'string'},
        {name: 'Note', type: 'string'},
        {name: 'date_annul', type: 'date'},
        {name: 'Demand_id', type: 'int'},
        {name: 'date_ready', type: 'date'},
        {name: 'Executor', type: 'int'},
        {name: 'Sum_High_Full', type: 'float'}
    ],
    id: 'calc_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ObjectsGroupCostCalculations',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCostCalcEquips =
{
    datatype: "json",
    datafields: [
        {name: 'cceq_id', type: 'int'},
        {name: 'calc_id', type: 'int'},
        {name: 'eqip_id', type: 'int'},
        {name: 'eqip_name', type: 'string'},
        {name: 'quant', type: 'float'},
        {name: 'price', type: 'float'},
        {name: 'sum_price', type: 'float'},
        {name: 'price_low', type: 'float'},
        {name: 'sum_low', type: 'float'},
        {name: 'work_price', type: 'float'},
        {name: 'work_sum', type: 'float'},
        {name: 'note', type: 'string'},
        {name: 'um_name', type: 'string'},
        {name: 'mntr', type: 'int'},
    ],
    id: 'cceq_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=CostCalcEquips',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCostCalcWorks =
{
    datatype: "json",
    datafields: [
        {name: 'ccwr_id', type: 'int'},
        {name: 'calc_id', type: 'int'},
        {name: 'cceq_id', type: 'int'},
        {name: 'cwdt_id', type: 'int'},
        {name: 'cw_name', type: 'string'},
        {name: 'cwrt_name', type: 'string'},
        {name: 'EquipName', type: 'string'},
        {name: 'note', type: 'string'},
        {name: 'quant', type: 'int'},
        {name: 'price', type: 'float'},
        {name: 'price_low', type: 'float'},
        {name: 'sum_low', type: 'float'},
        {name: 'sum_high', type: 'float'},
        {name: 'koef', type: 'float'},
    ],
    id: 'ccwr_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=CostCalcWorks',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCalcWorkTypeDetails =
{
    datatype: "json",
    datafields: [
        {name: 'cwdt_id', type: 'int'},
        {name: 'name', type: 'string'},
        {name: 'Price', type: 'float'},
    ],
    id: 'cwdt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=CalcWorkTypeDetails',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCalcWorkTypes =
{
    datatype: "json",
    datafields: [
        {name: 'cwdt_id', type: 'int'},
        {name: 'price', type: 'float'},
    ],
    id: 'cwdt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=CalcWorkTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourcePriceListDetails =
{
    datatype: "json",
    datafields: [
        {name: 'pldt_id', type: 'int'},
        {name: 'eqip_id', type: 'int'},
        {name: 'price_high', type: 'float'},
        {name: 'price_low', type: 'float'},
    ],
    id: 'cwdt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=PriceListDetails',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCostCalcSalarys =
{
    datatype: "json",
    datafields: [
        {name: 'ccsl_id', type: 'int'},
        {name: 'calc_id', type: 'int'},
        {name: 'empl_id', type: 'int'},
        {name: 'price', type: 'float'},
        {name: 'date_accept', type: 'date'},
        {name: 'EmployeeName', type: 'string'},
    ],
    id: 'ccsl_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=CostCalcSalarys',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCostCalcDocuments =
{
    datatype: "json",
    datafields: [
        {name: 'Docid', type: 'int'},
        {name: 'DocType_id', type: 'int'},
        {name: 'DocName', type: 'string'},
        {name: 'DocNumber', type: 'string'},
        {name: 'DocDate', type: 'date'},
        {name: 'DocSum', type: 'float'},
        {name: 'DocState', type: 'string'},
        {name: 'DocDateState', type: 'date'},
        {name: 'DocWrtpName', type: 'string'},
        {name: 'DocPrior', type: 'string'},
        {name: 'DocDeadline', type: 'date'},
        {name: 'DocAccept', type: 'date'},
        {name: 'DocUserCreate', type: 'string'},
        {name: 'DocJuridicalPerson', type: 'string'},
    ],
    id: 'Docid',
    url: '/index.php?r=CostCalcDocuments/Index',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceReceiptReasons =
{
    datatype: "json",
    datafields: [
        {name: 'rcrs_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'cwdt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ReceiptReasons',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceRegistrations =
{
    datatype: "json",
    datafields: [
        {name: 'Registration_id', type: 'int'},
        {name: 'RegistrationName', type: 'string'},
    ],
    id: 'Registration_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Registrations',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCostCalcWorkTypes =
{
    datatype: "json",
    datafields: [
        {name: 'ccwt_id', type: 'int'},
        {name: 'ccwt_name', type: 'string'},
    ],
    id: 'ccwt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=CostCalcWorkTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceContactInfoForCostCalc =
{
    datatype: "json",
    datafields: [
        {name: 'info_id', type: 'int'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'FIO', type: 'string'},
    ],
    id: 'info_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContactInfoForCostCalc',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceWHBuhActsEquips =
{
    datatype: "json",
    datafields: [
        {name: 'dadt_id', type: 'int'},
        {name: 'docm_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'NameUnitMeasurement', type: 'string'},
        {name: 'docm_quant', type: 'int'},
        {name: 'used', type: 'bool'},
        {name: 'SN', type: 'string'},
        {name: 'in_number', type: 'int'},
        {name: 'in_date', type: 'date'},
    ],
    id: 'dadt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=WHBuhActsEquips',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceJobTypes =
{
    datatype: "json",
    datafields: [
        {name: 'JobType_Id', type: 'int'},
        {name: 'JobType_Name', type: 'string'},
    ],
    id: 'JobType_Id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=JobTypes',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};
Sources.WHActsForReestrSource =
{
    datatype: "json",
    datafields: [
        {name: 'docm_id', type: ''},
        {name: 'achs_id', type: 'int'},
        {name: 'date', type: 'date'},
        {name: 'ac_date', type: 'date'},
        {name: 'objc_id', type: 'int'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'Address', type: 'string'},
        {name: 'sum', type: 'float'},
        {name: 'date_payment', type: 'date'},
        {name: 'note', type: 'string'},
        {name: 'work_list', type: 'string'},
        {name: 'dmnd_empl_id', type: 'int'},
        {name: 'signed_yn', type: 'bool'},
        {name: 'cstm_id', type: 'int'},
        {name: 'cstn_name', type: 'string'},
        {name: 'master', type: 'string'},
        {name: 'c_date', type: 'date'},
        {name: 'c_name', type: 'string'},
        {name: 'c_confirmname', type: 'string'},
        {name: 'date_create', type: 'date'},
        {name: 'EmplCreate', type: 'string'},
        {name: 'user_create', type: 'string'},
        {name: 'dctp_id', type: 'int'},
        {name: 'DelDate', type: 'date'},
        {name: 'sort', type: 'int'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=WhActsReestr_v',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.ActEquipsSource =
{
    datatype: "json",
    datafields: [
        {name: 'treb_id', type: 'int'},
        {name: 'number', type: 'string'},
        {name: 'date', type: 'date'},
        {name: 'acdc_id', type: 'int'},
        {name: 'dadt_id', type: 'int'},
        {name: 'docm_id', type: 'int'},
        {name: 'eqip_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'NameUnitMeasurement', type: 'string'},
        {name: 'docm_quant', type: 'float'},
        {name: 'fact_quant', type: 'float'},
        {name: 'used', type: 'bool'},
        {name: 'snf', type: 'string'}, 
        {name: 'SN', type: 'string'},
        {name: 'price', type: 'float'},
        {name: 'sum', type: 'float'},
        {name: 'ToProduction', type: 'bool'},
        {name: 'no_price_list', type: 'bool'},
        {name: 'EmplChange', type: 'int'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ActEquips_v',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEventsClients =
{
    datatype: "json",
    datafields: [
        {name: 'Form_id', type: 'int'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'Fullname', type: 'string'},
        {name: 'Addr', type: 'string'},
        {name: 'EventCount', type: 'int'},
        {name: 'NoExecEventCount', type: 'int'},
        {name: 'Vip', type: 'bool'}
    ],
    id: 'form_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EventsClients',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEventTypes =
{
    datatype: "json",
    datafields: [
        {name: 'evtp_id', type: 'int'},
        {name: 'EventType', type: 'string'},
    ],
    id: 'evtp_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EventTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEvents =
{
    datatype: "json",
    datafields: [
        {name: 'Evnt_id', type: 'int'},
        {name: 'Evtp_id', type: 'int'},
        {name: 'EventType', type: 'string'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'Date', type: 'date'},
        {name: 'DateExec', type: 'date'},
        {name: 'Empl_id', type: 'int'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'Addr', type: 'string'},
        {name: 'OverDay', type: 'int'},
        {name: 'Note', type: 'string'},
        {name: 'DateAct', type: 'date'},
        {name: 'DatePlan', type: 'date'},
        {name: 'Rpfr_id', type: 'int'},
        {name: 'Evaluation', type: 'string'},
        {name: 'Prds_id', type: 'int'},
        {name: 'Who_reported', type: 'int'},
        {name: 'EmplCreate', type: 'int'},
    ],
    id: 'Evnt_id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=Events',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceRepairs =
{
    datatype: "json",
    datafields: [
        {name: 'Repr_id', type: 'int'},
        {name: 'status', type: 'int'},
        {name: 'status_name', type: 'string'},
        {name: 'number', type: 'string'},
        {name: 'date', type: 'date'},
        {name: 'date_create', type: 'date'},
        {name: 'action', type: 'string'},
        {name: 'EquipName', type: 'string'},
        {name: 'Addr', type: 'string'},
        {name: 'date_ready', type: 'date'},
        {name: 'date_exec', type: 'date'},
        {name: 'date_accept', type: 'date'},
        {name: 'RepairPrior', type: 'string'},
        {name: 'deadline', type: 'date'},
        {name: 'mstr_empl_id', type: 'int'},
        {name: 'mstr_empl_name', type: 'string'},
        {name: 'egnr_empl_id', type: 'int'},
        {name: 'egnr_empl_name', type: 'string'},
        {name: 'defect', type: 'string'},
        {name: 'SN', type: 'string'},
        {name: 'user_create', type: 'int'},
        {name: 'reg_empl_name', type: 'string'},
        {name: 'Return', type: 'bool'},
        {name: 'overday', type: 'int'},
        {name: 'date_plan', type: 'date'},
        {name: 'wrnt', type: 'bool'},
        {name: 'splr_id', type: 'int'},
        {name: 'NameSupplier', type: 'string'},
        {name: 'delayreason', type: 'string'},
        {name: 'resultname', type: 'string'},
        {name: 'date_undo', type: 'date'},
        {name: 'undo_empl_name', type: 'int'},
        {name: 'reason_name', type: 'string'},
        {name: 'DatePlan', type: 'date'},
    ],
    id: 'Repr_id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=Repairs',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceRepairComments =
{
    datatype: "json",
    datafields: [
        {name: 'Repr_id', type: 'int'},
        {name: 'Rpcm_id', type: 'int'},
        {name: 'Repr_id', type: 'int'},
        {name: 'Date', type: 'date'},
        {name: 'DatePlan', type: 'date'},
        {name: 'Auto', type: 'bool'},
        {name: 'Comment', type: 'string'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'EmployeeName', type: 'string'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=RepairComments',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceRepairDetails =
{
    datatype: "json",
    datafields: [
        {name: 'rpdt_id', type: 'int'},
        {name: 'repr_id', type: 'int'},
        {name: 'eqip_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'um_name', type: 'string'},
        {name: 'docm_quant', type: 'float'},
        {name: 'fact_quant', type: 'float'},
        {name: 'summa', type: 'float'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=RepairDetails',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceRepairDocuments =
{
    datatype: "json",
    datafields: [
        {name: 'keyfield', type: 'int'},
        {name: 'docid', type: 'int'},
        {name: 'doctype_id', type: 'int'},
        {name: 'doctype', type: 'int'},
        {name: 'number', type: 'int'},
        {name: 'datereg', type: 'date'},
        {name: 'dateexec', type: 'date'},
        {name: 'note', type: 'string'},
        {name: 'status', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=RepairDocuments',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceRepairPriors =
{
    datatype: "json",
    datafields: [
        {name: 'prtp_id', type: 'int'},
	{name: 'RepairPrior', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=RepairPriors',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceRepairDelayReasons =
{
    datatype: "json",
    datafields: [
        {name: 'Dlrs_id', type: 'int'},
	{name: 'DelayReason', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=RepairDelayReasons',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceRepairResults =
{
    datatype: "json",
    datafields: [
        {name: 'Rslt_id', type: 'int'},
	{name: 'ResultName', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=RepairResults',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};
Sources.SourcePeriods =
{
    datatype: "json",
    datafields: [
        {name: 'code', type: 'int'},
        {name: 'periodname', type: 'string'},
        {name: 'interval', type: 'int'},
        {name: 'sort', type: 'int'},
    ],
    id: 'code',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=Periods',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEventOffers =
{
    datatype: "json",
    datafields: [
        {name: 'code', type: 'int'},
        {name: 'evnt_id', type: 'int'},
        {name: 'oftp_id', type: 'int'},
        {name: 'offertype', type: 'string'},
        {name: 'rslt_id', type: 'int'},
        {name: 'resultname', type: 'string'},
        {name: 'note', type: 'string'},
        {name: 'situation', type: 'string'},
        {name: 'prev_date', type: 'date'},
        {name: 'prev_resultname', type: 'string'},
        {name: 'prev_note', type: 'string'},
        {name: 'offergroup', type: 'int'},
        {name: 'demand', type: 'string'},
        {name: 'emplname', type: 'string'},
    ],
    id: 'code',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EventOffers',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceOfferTypes =
{
    datatype: "json",
    datafields: [
        {name: 'code', type: 'int'},
        {name: 'offertype', type: 'string'},
    ],
    id: 'code',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=OfferTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceOfferResults =
{
    datatype: "json",
    datafields: [
        {name: 'rslt_id', type: 'int'},
        {name: 'ResultName', type: 'string'},
    ],
    id: 'rslt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=OfferResults',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceReportForms =
{
    datatype: "json",
    datafields: [
        {name: 'rpfr_id', type: 'int'},
        {name: 'ReportForm', type: 'string'},
    ],
    id: 'rpfr_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ReportForms',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceFormsOfOwnership =
{
    datatype: "json",
    datafields: [
        {name: 'fown_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'fown_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=FormsOfOwnership',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceBanks =
{
    datatype: "json",
    datafields: [
        {name: 'Bank_id', type: 'int'},
        {name: 'bank_name', type: 'string'},
        {name: 'cor_account', type: 'string'},
	{name: 'bik', type: 'string'},
	{name: 'City', type: 'string'},
    ],
    id: 'Bank_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Banks',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceSuppliers =
{
    datatype: "json",
    datafields: [
        {name: 'Supplier_id', type: 'int'},
	{name: 'NameSupplier', type: 'string'},
	{name: 'Adress', type: 'string'},
	{name: 'Tel', type: 'string'},
	{name: 'ContactFace', type: 'string'},
	{name: 'Properties', type: 'string'},
	{name: 'Note', type: 'string'},
	{name: 'DateInsert', type: 'date'},
	{name: 'Producer', type: 'bool'},
	{name: 'Supplier', type: 'bool'},
	{name: 'Repair', type: 'bool'},
	{name: 'DelDate', type: 'date'},
	{name: 'FullName', type: 'string'},
	{name: 'DateLastContact', type: 'date'},
	{name: 'DateLastPurchase', type: 'date'},
	{name: 'bank_name', type: 'string'},
        {name: 'bank_id', type: 'int'},
	{name: 'inn', type: 'string'},
        {name: 'bik', type: 'string'},
	{name: 'account', type: 'string'},
        {name: 'cor_account', type: 'string'},
        
	{name: 'kpp', type: 'string'},
    ],
    id: 'Supplier_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Suppliers',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceSystemCompetitors =
{
    datatype: "json",
    datafields: [
        {name: 'SystemCompetitor_id', type: 'int'},
        {name: 'ObjectsGroupSystem_id', type: 'int'},
        {name: 'Cmtr_id', type: 'int'},
        {name: 'Competitor', type: 'string'},
    ],
    id: 'Bank_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SystemCompetitors',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceObjectsGroupSystemComplexitys =
{
    datatype: "json",
    datafields: [
        {name: 'Ogsc_id', type: 'int'},
        {name: 'Ogst_id', type: 'int'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'SystemComplexity_id', type: 'int'},
        {name: 'SystemComplexitysName', type: 'string'},
    ],
    id: 'Bank_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ObjectsGroupSystemComplexitys',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};
    
Sources.SourceOfferDemands =
{
    datatype: "json",
    datafields: [
        {name: 'OfferDemand_id', type: 'int'},
        {name: 'offer_id', type: 'int'},
        {name: 'dmnd_id', type: 'int'},
        {name: 'Address', type: 'string'},
    ],
    id: 'OfferDemand_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=OfferDemands',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDemandDocuments =
{
    datatype: "json",
    datafields: [
        {name: 'KeyField', type: 'string'},
        {name: 'Docid', type: 'int'},
        {name: 'DocType_id', type: 'int'},
        {name: 'DocType', type: 'string'},
        {name: 'Number', type: 'string'},
        {name: 'DateReg', type: 'date'},
        {name: 'DateExec', type: 'date'},
        {name: 'Note', type: 'string'},
        {name: 'Procpay', type: 'float'}
    ],
    id: 'KeyField',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DemandDocuments',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceResolveReasons =
{
    datatype: "json",
    datafields: [
        {name: 'Rvrs_id', type: 'int'},
        {name: 'ResolveReason', type: 'string'},
    ],
    id: 'KeyField',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ResolveReasons',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceNegatives =
{
    datatype: "json",
    datafields: [
        {name: 'Ngtv_id', type: 'int'},
        {name: 'NegativeName', type: 'string'},
    ],
    id: 'KeyField',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Negatives',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCostCalculations_v =
{
    datatype: "json",
    datafields: [
        {name: 'Calc_id', type: 'int'},
        {name: 'Type', type: 'int'},
        {name: 'TypeName', type: 'string'},
        {name: 'Date', type: 'date'},
        {name: 'Sum_High_Full', type: 'float'},
        {name: 'SumPay', type: 'float'},
        {name: 'Treb_id', type: 'int'},
        {name: 'Name', type: 'string'},
        {name: 'Addr', type: 'string'},
        {name: 'Territ_id', type: 'int'},
        {name: 'MngrShortName', type: 'string'},
        {name: 'Date_Ready', type: 'date'},
        {name: 'Demand_id', type: 'int'},
        {name: 'Date_Agreed', type: 'date'},
        {name: 'AgreedShortName', type: 'string'},
        {name: 'PaymentTypeName', type: 'string'},
        {name: 'JuridicalPerson', type: 'string'},
        {name: 'BuhAct_id', type: 'int'},
        {name: 'Sum_Works_Low', type: 'float'},
        {name: 'TrebShortName', type: 'string'},
        {name: 'TrebDate', type: 'date'},
        {name: 'Number', type: 'string'},
        {name: 'ProcPay', type: 'float'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'DateExec', type: 'date'},
    ],
    id: 'Calc_id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=CostCalculations_v',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceContractM =
{
    datatype: "json",
    datafields: [
        {name: 'ContrS_id', type: 'int'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'ContrDateS', type: 'date'},
        {name: 'ContrNumS', type: 'string'},
        {name: 'DocType_Name', type: 'string'},
        {name: 'ContrSDateStart', type: 'date'},
        {name: 'ContrSDateEnd', type: 'date'},
        {name: 'Addr', type: 'string'},
        {name: 'Price', type: 'float'},
    ],
    id: 'ContrS_id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=ContractM',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 500,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};
Sources.SourceEquipGroups =
{
    datatype: "json",
    datafields: [
        {name: 'group_id', type: 'int'},
        {name: 'parent_group_id', type: 'int'},
        {name: 'code', type: 'string'},
        {name: 'group_name', type: 'string'},
        {name: 'full_group_name', type: 'string'}
    ],
    id: 'group_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EqipGroups',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    
    hierarchy:
    {
        keyDataField: { name: 'group_id' },
        parentDataField: { name: 'parent_group_id' }
    },
    
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    },
};

Sources.SourceEquips =
{
    datatype: "json",
    datafields: [
        {name: 'Equip_id', type: 'int'},
        {name: 'group_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'UnitMeasurement_id', type: 'int'},
        {name: 'NameUnitMeasurement', type: 'string'},
        {name: 'Supplier_id', type: 'int'},
        {name: 'NameSupplier', type: 'string'},
        {name: 'Description', type: 'string'},
        {name: 'SystemType_id', type: 'int'},
        {name: 'SystemTypeName', type: 'string'},
        {name: 'actp_id', type: 'int'},
        {name: 'actp_name', type: 'string'},
        {name: 'ctgr_id', type: 'int'},
        {name: 'ctgr_name', type: 'string'},
        {name: 'grp_id', type: 'int'},
        {name: 'grp_name', type: 'string'},
        {name: 'discontinued', type: 'date'},
        {name: 'sgrp_id', type: 'int'},
        {name: 'sgrp_name', type: 'string'},
        {name: 'ServicingTime', type: 'string'},
        {name: 'EquipImage', type: 'string'},
        {name: 'full_group_name', type: 'string'},
        {name: 'must_instruction', type: 'bool'},
        {name: 'there_instruction', type: 'bool'},
        {name: 'must_photo', type: 'bool'},
        {name: 'there_photo', type: 'bool'},
        {name: 'must_analog', type: 'bool'},
        {name: 'there_analog', type: 'bool'},
        {name: 'must_producer', type: 'bool'},
        {name: 'there_producer', type: 'bool'},
        {name: 'must_supplier', type: 'bool'},
        {name: 'there_supplier', type: 'bool'},
        {name: 'note', type: 'string'},
        {name: 'EmplChangeInventory', type: 'string'},
        {name: 'DateChangeInventory', type: 'date'},
        {name: 'AddressedStorage', type: 'string'},
        {name: 'Replacement', type: 'string'},
        {name: 'Analogs', type: 'string'},
        {name: 'Sets', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=Equips',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceAccountingTypes =
{
    datatype: "json",
    datafields: [
        {name: 'actp_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AccountingTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceCategories =
{
    datatype: "json",
    datafields: [
        {name: 'ctgr_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=Categories',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEquipSubgroups =
{
    datatype: "json",
    datafields: [
        {name: 'sgrp_id', type: 'int'},
        {name: 'grp_id', type: 'int'},
        {name: 'name', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EquipSubgroups',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceEquipHistory =
{
    datatype: "json",
    datafields: [
        {name: 'docm_id', type: 'int'},
        {name: 'dadt_id', type: 'int'},
        {name: 'dctp_id', type: 'int'},
        {name: 'date', type: 'date'},
        {name: 'ac_date', type: 'date'},
        {name: 'achs_date', type: 'date'},
        {name: 'number', type: 'string'},
        {name: 'Addr', type: 'string'},
        {name: 'MasterName', type: 'string'},
        {name: 'quant', type: 'float'},
        {name: 'quant_used', type: 'float'},
        {name: 'note', type: 'string'},
        {name: 'SN', type: 'string'}
        
    ],
    id: 'id',
    url: '/index.php?r=Equips/DocHistory',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceAddressSystems =
{
    datatype: "json",
    datafields: [
        {name: 'AddressSystem_id', type: 'int'},
        {name: 'AddressSystem', type: 'string'}
    ],
    id: 'AddressSystem_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AddressSystems',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceControlWHDocuments =
{
    datatype: "json",
    datafields: [
        {name: 'dadt_id', type: 'int'},
        {name: 'eqip_id', type: 'int'},
        {name: 'docm_id', type: 'int'},
        {name: 'equipname', type: 'string'},
        {name: 'um_name', type: 'string'},
        {name: 'quant', type: 'int'},
        {name: 'used', type: 'bool'},
        {name: 'Addr', type: 'string'},
        {name: 'plan_date', type: 'date'},
        {name: 'demand_id', type: 'int'},
        {name: 'dmnd_empl_name', type: 'string'},
        {name: 'ac_date', type: 'date'},
        {name: 'number', type: 'int'},
        {name: 'empl_name', type: 'string'},
        {name: 'deadline', type: 'date'},
        {name: 'overday', type: 'int'},
        {name: 'SN', type: 'int'},
    ],
    id: 'dadt_id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=ControlWHDocuments',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 500,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceAddressedStorage =
{
    datatype: "json",
    datafields: [
        {name: 'Adst_id', type: 'int'},
        {name: 'Equip_id', type: 'int'},
        {name: 'Adsys_id', type: 'int'},
        {name: 'AddressSystem', type: 'string'},
    ],
    id: 'Adst_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AddressedStorage',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};


Sources.SourceWHControls =
{
    datatype: "json",
    datafields: [
        {name: 'id', type: 'string'},
        {name: 'docm_id', type: 'int'},
        {name: 'dctp_id', type: 'int'},
        {name: 'DocTypeName', type: 'string'},
        {name: 'Employee_id', type: 'int'},
        {name: 'MasterName', type: 'string'},
        {name: 'Equip_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'NameUnitMeasurement', type: 'string'},
        {name: 'docm_quant', type: 'float'},
        {name: 'fact_quant', type: 'float'},
        {name: 'quant', type: 'float'},
        {name: 'quant_used', type: 'float'},
        {name: 'direct', type: 'int'},
        {name: 'price', type: 'float'},
        {name: 'number', type: 'string'},
        {name: 'Addr', type: 'string'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=WHControls_v',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 500,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceAreaPrices =
{
    datatype: "json",
    datafields: [
        {name: 'AreaPrice_id', type: 'int'},
        {name: 'StartArea', type: 'int'},
        {name: 'EndArea', type: 'int'},
        {name: 'Price', type: 'float'},	
        {name: 'EmplCreate', type: 'int'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplChange', type: 'int'},
        {name: 'DateChange', type: 'date'},
        {name: 'Lock', type: 'int'},
        {name: 'DateLock', type: 'date'},
        {name: 'EmplLock', type: 'int'},
        {name: 'DelDate', type: 'date'},
    ],
    id: 'AreaPrice_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AreaPrices',
    root: 'Rows',
    async: false,
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceAreaObjectPrices =
{
    datatype: "json",
    datafields: [
        {name: 'AreaObjectPrice_id', type: 'int'},
        {name: 'StartArea', type: 'int'},
        {name: 'EndArea', type: 'int'},
        {name: 'Price', type: 'float'},	
        {name: 'EmplCreate', type: 'int'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplChange', type: 'int'},
        {name: 'DateChange', type: 'date'},
        {name: 'Lock', type: 'int'},
        {name: 'DateLock', type: 'date'},
        {name: 'EmplLock', type: 'int'},
        {name: 'DelDate', type: 'date'},
    ],
    id: 'AreaPrice_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AreaObjectPrices',
    root: 'Rows',
    async: false,
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceClients =
{
    datatype: "json",
    datafields: [
        {name: 'Form_id', type: 'int'},
        {name: 'Number', type: 'string'},
        {name: 'FullName', type: 'string'},
        {name: 'Demands', type: 'int'},
        {name: 'SegmentName', type: 'string'},
        {name: 'SubSegmentName', type: 'string'},
        {name: 'SourceInfoName', type: 'string'},
        {name: 'SubSourceInfoName', type: 'string'},
        {name: 'BrandName', type: 'string'},
        {name: 'Address', type: 'string'},
        {name: 'WWW', type: 'string'},
        {name: 'CountObjects', type: 'int'},
        {name: 'SalesManager', type: 'string'},
        {name: 'ServiceManager', type: 'string'},
        {name: 'StatusName', type: 'string'},
        {name: 'NextAction', type: 'string'},
        {name: 'LastDateContact', type: 'date'},
        {name: 'DateChangeSalesManager', type: 'date'},
        {name: 'DateCreate', type: 'date'},
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=Clients',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceClientStatus =
{
    datatype: "json",
    datafields: [
        { name: 'Status_id',  type: 'int' },
        { name: 'StatusName',  type: 'string' },
    ],
    id: 'Status_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ClientStatus',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceClientActions =
{
    datatype: "json",
    datafields: [
        {name: 'Exrp_id', type: 'int'},
        {name: 'Date', type: 'date'},
        {name: 'FullName', type: 'string'},
        {name: 'Demand_id', type: 'int'},
        {name: 'ContactType_id', type: 'int'},
        {name: 'ContactName', type: 'string'},
        {name: 'ActionStage_id', type: 'int'},
        {name: 'StageName', type: 'string'},
        {name: 'Report', type: 'string'},
        {name: 'NextDate', type: 'date'},
        {name: 'NextAction', type: 'string'},
        {name: 'SegmentName', type: 'string'},
        {name: 'SubSegmentName', type: 'string'},
        {name: 'Address', type: 'string'},
        {name: 'Date', type: 'date'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'PlanDateExec', type: 'date'},
        {name: 'ActionOperationName', type: 'string'},
        {name: 'ActionResultName', type: 'string'},
        {name: 'ResponsibleName', type: 'string'},
        {name: 'FIO', type: 'string'},
        {name: 'OtherName', type: 'string'},
        {name: 'Report', type: 'string'},
        
        
    ],
    id: 'Exrp_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ClientActions',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceClientDemands =
{
    datatype: "json",
    datafields: [
        {name: 'Exrp_id', type: 'int'},
        {name: 'Date', type: 'date'},
        {name: 'Demand_id', type: 'int'},
        {name: 'Address', type: 'string'},
        {name: 'DemandType', type: 'string'},
        {name: 'StageName', type: 'string'},
        {name: 'ActionOperationName', type: 'string'},
        {name: 'EmplName', type: 'string'},
        {name: 'ActionResultName', type: 'string'},
        {name: 'FIO', type: 'string'},
        {name: 'NextDate', type: 'date'},
        {name: 'Report', type: 'string'},
        {name: 'OtherName', type: 'string'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'ContactType_id', type: 'int'},
        {name: 'ContactName', type: 'string'},
        {name: 'NextAction', type: 'int'},
        {name: 'NextActionOperationName', type: 'string'},
        {name: 'Responsible_id', type: 'int'},
        {name: 'ResponsibleName', type: 'string'},
        {name: 'DateReg', type: 'date'},
        {name: 'DateExec', type: 'date'}
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=ClientDemands',
    //type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceDiaryActions =
{
    datatype: "json",
    datafields: [
        {name: 'Exrp_id', type: 'int'},
        {name: 'Date', type: 'date'},
        {name: 'FullName', type: 'string'},
        {name: 'SegmentName', type: 'string'},
        {name: 'SubSegmentName', type: 'string'},
        {name: 'Address', type: 'string'},
        {name: 'Demand_id', type: 'int'},
        {name: 'Form_id', type: 'int'},
        {name: 'ContactName', type: 'string'},
        {name: 'StageName', type: 'string'},
        {name: 'DIFF_STR', type: 'string'},
        {name: 'LastDateContact', type: 'date'},
        {name: 'StatusOP', type: 'string'},
        {name: 'NextAction', type: 'string'},
        {name: 'NextDate', type: 'date'},
        {name: 'Responsible_id', type: 'int'},
        {name: 'ResponsibleName', type: 'string'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'OverDay', type: 'int'},
        {name: 'DemandType', type: 'string'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'Contacts', type: 'string'},
        {name: 'DemandText', type: 'string'}
        
        
    ],
    id: 'Exrp_id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=DiaryActions',
    //type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceActionStages =
{
    datatype: "json",
    datafields: [
        { name: 'Stage_id',  type: 'int' },
        { name: 'StageName',  type: 'string' },
    ],
    id: 'Stage_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ActionStages',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceActionOperations =
{
    datatype: "json",
    datafields: [
        { name: 'Operation_id',  type: 'int' },
        { name: 'ActionOperationName',  type: 'string' },
    ],
    id: 'Operation_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ActionOperations',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceActionResults =
{
    datatype: "json",
    datafields: [
        { name: 'Result_id',  type: 'int' },
        { name: 'ActionResultName',  type: 'string' },
    ],
    id: 'Result_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ActionResults',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInspectionActEquips =
{
    datatype: "json",
    datafields: [
        {name: 'ActEquip_id', type: 'int'},
        {name: 'Inspection_id', type: 'int'},
        {name: 'Equip_id', type: 'int'},
        {name: 'EquipName', type: 'string'},
        {name: 'Quant', type: 'float'},
        {name: 'Object_id', type: 'int'},
        {name: 'Doorway', type: 'string'},
        {name: 'UmName', type: 'string'},
        {name: 'Characteristics', type: 'string'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'DateChange', type: 'date'},
        {name: 'EmplChange', type: 'int'},
    ],
    id: 'ActEquip_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InspectionActEquips',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInspActEquipCharacteristics =
{
    datatype: "json",
    datafields: [
        {name: 'Characteristic_id', type: ''},
        {name: 'ActEquip_id', type: ''},
        {name: 'CharacteristicName', type: ''},
        {name: 'EmplCreate', type: ''},
        {name: 'DateCreate', type: ''},
        {name: 'EmplChange', type: ''},
        {name: 'DateChange', type: ''},
    ],
    id: 'Characteristic_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InspActEquipCharacteristics',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInspActRemarks =
{
    datatype: "json",
    datafields: [
        {name: 'Remark_id', type: 'int'},
        {name: 'Inspection_id', type: 'int'},
        {name: 'Remark', type: 'string'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'ShortName', type: 'string'},
        {name: 'DateChange', type: 'date'},
        {name: 'EmplChange', type: 'int'},
    ],
    id: 'Remark_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InspActRemarks',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInspActRecommendations =
{
    datatype: "json",
    datafields: [
        {name: 'Recommendation_id', type: 'int'},
        {name: 'Inspection_id', type: 'int'},
        {name: 'Recommendation', type: 'string'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'ShortName', type: 'string'},
        {name: 'DateChange', type: 'date'},
        {name: 'EmplChange', type: 'int'},
    ],
    id: 'Recommendation_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InspActRecommendations',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInspActOptions =
{
    datatype: "json",
    datafields: [
        {name: 'Option_id', type: 'int'},
        {name: 'Inspection_id', type: 'int'},
        {name: 'Option', type: 'string'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'ShortName', type: 'string'},
        {name: 'DateChange', type: 'date'},
        {name: 'EmplChange', type: 'int'},
    ],
    id: 'Option_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InspActOptions',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceValuableInstructions =
{
    datatype: "json",
    datafields: [
        {name: 'Instruction_id', type: 'int'},
        {name: 'Form_id', type: 'int'},
        {name: 'Demand_id', type: 'int'},
        {name: 'Empl_id', type: 'int'},
        {name: 'ShortName', type: 'string'},
        {name: 'DatePlanExec', type: 'date'},
        {name: 'Instruction', type: 'string'},
        {name: 'Executor_id', type: 'int'},
        {name: 'ExecutorShortName', type: ''},
        {name: 'DateExec', type: 'date'},
        {name: 'Note', type: 'string'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'CreatorShortName', type: 'string'},
        {name: 'DateChange', type: 'date'},
        {name: 'EmplChange', type: 'int'},
    ],
    id: 'Instruction_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ValuableInstructions',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceInspectionActs_v =
{
    datatype: "json",
    datafields: [
        {name: 'Inspection_id', type: 'int'},
        {name: 'Date', type: 'date'},
        {name: 'ObjectGr_id', type: 'int'},
        {name: 'Demand_id', type: 'int'},
        {name: 'Addr', type: 'string'},
        {name: 'SystemType_id', type: 'int'},
        {name: 'SystemTypeName', type: 'string'},
        {name: 'Empl_id', type: 'int'},
        {name: 'EmployeeName', type: 'string'},
        {name: 'Info_id', type: 'int'},
        {name: 'FIO', type: 'string'},
        {name: 'Territ_id', type: 'int'},
        {name: 'Territ_Name', type: 'string'},
        {name: 'LiveAreaSize', type: 'float'},
        {name: 'SystemComplexity_id', type: 'int'},
        {name: 'SystemComplexitysName', type: 'string'},
        {name: 'CountEntrance', type: 'int'},
        {name: 'CountFloors', type: 'int'},
        {name: 'CountApartments', type: 'int'},
        {name: 'Perimetr', type: 'float'},
        {name: 'Feature', type: 'string'},
        {name: 'Statement_id', type: 'int'},
        {name: 'SystemStatementsName', type: 'string'},
        {name: 'ServiceCompetitor_id', type: 'int'},
        {name: 'ServiceCompetitor', type: 'string'},
        {name: 'MontageCompetitor_id', type: 'int'},
        {name: 'MontageCompetitor', type: 'string'},
        {name: 'Claims', type: 'string'},
        {name: 'DateMontage', type: 'date'},
        {name: 'Documentations', type: 'string'},
        {name: 'CountRiser', type: 'int'},
        {name: 'PreparationVideo', type: 'string'},
        {name: 'StateTrails', type: 'string'},
        {name: 'BoxInfo', type: 'string'},
        {name: 'ResultEngineer', type: 'string'},
        {name: 'ResultHead', type: 'string'},
        {name: 'DateAgreeROMTO', type: 'date'},
        {name: 'DateAgreeRGI', type: 'date'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplChange', type: 'int'},
        {name: 'DateChange', type: 'date'},
    ],
    id: 'Inspection_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=InspectionActs_v',
    type: 'GET',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceClientSounds =
{
    datatype: "json",
    datafields: [
        {name: 'Sound_id', type: 'int'},
        {name: 'Form_id', type: 'int'},
        {name: 'SoundDate', type: 'date'},
        {name: 'SoundName', type: 'string'},
        {name: 'SoundPatch', type: 'string'},
        {name: 'Empl_id', type: 'int'},
        {name: 'ShortName', type: 'string'},
        {name: 'DateCreate', type: 'date'},
        {name: 'EmplCreate', type: 'int'},
        {name: 'DateChange', type: 'date'},
        {name: 'EmplChange', type: 'int'},
    ],
    id: 'Sound_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ClientSounds',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceAudioFiles =
{
    datatype: "json",
    datafields: [
        {name: 'SoundName', type: 'string'},
        {name: 'SoundPatch', type: 'string'},
        {name: 'FullFileName', type: 'string'},
        {name: 'LastChange', type: 'date'},
        
    ],
    id: 'FileName',
    url: '/index.php?r=Audio/GetListFiles',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceObjectEvents =
{
    datatype: "json",
    datafields: [
        {name: 'evnt_id', type: 'int'},
        {name: 'evtp_id', type: 'int'},
        {name: 'eventtype', type: 'string'},
        {name: 'date', type: 'date'},
        {name: 'date_exec', type: 'date'},
        {name: 'employeename', type: 'string'},
        {name: 'Note', type: 'string'},
    ],
    id: 'evnt_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ObjectEvents',
    type: 'POST',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};

Sources.DemandsListSource =
{
    datatype: "json",
    datafields: [
        { name: 'Demand_id', type: 'int'},
        { name: 'Object_id', type: 'int'},
        { name: 'ObjectGr_id', type: 'int'},
        { name: 'Address', type: 'string'},
        { name: 'UCreateName', type: 'string'},
        { name: 'VIPName', type: 'string'},
        { name: 'DateReg', type: 'date'},
        { name: 'Deadline', type: 'date'},
        { name: 'DateMaster', type: 'date'},
        { name: 'DateExec', type: 'date'},
        { name: 'DateExecFilter', type: 'date'},
        { name: 'ExceedDays', type: 'int'},
        { name: 'FullOverDay', type: 'int'},
        { name: 'DemandType', type: 'string'},
        { name: 'EquipType', type: 'string'},
        { name: 'Malfunction', type: 'string'},
        { name: 'DemandPrior', type: 'string'},
        { name: 'DemandPrior_id', type: 'int'},
        { name: 'MasterName', type: 'string'},
        { name: 'PlanDateExec', type: 'date'},
        { name: 'ExecutorsName', type: 'string'},
        { name: 'ServiceType', type: 'string'},
        { name: 'FirstDemandType', type: 'string'},
        { name: 'Contacts', type: 'string'},
        { name: 'DemandText', type: 'string'},
        { name: 'Note', type: 'string'},
        { name: 'AreaName', type: 'string'},
        { name: 'UChangeName', type: 'string'},
        { name: 'ResultName', type: 'string'},
        { name: 'OtherName', type: 'string'},
        { name: 'Territ_id', type: 'int'},
        { name: 'Street_id', type: 'int'},
        { name: 'House', type: 'string'},
        { name: 'Contacts', type: 'string'},
        { name: 'StatusOP', type: 'int'},
        { name: 'StatusOPName', type: 'string'},
        { name: 'FirstDemandPrior', type: 'string'},
        { name: 'InitiatorName', type: 'string'},
        
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQX&ModelName=DemandsList',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        this.totalrecords = data[0].TotalRows;
    }
};
