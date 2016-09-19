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
        { name: 'Status' }
    ],
    id: 'id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ListObjectsMin',
    root: 'Rows',
    cache: false,
    pagenum: 0,
    pagesize: 200,
    beforeprocessing: function (data) {
        Sources.SourceListObjects.totalrecords = data[0].TotalRows;
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
    pagesize: 300,
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
        { name: 'DemandType' },
    ],
    id: 'DType_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=DTypes',
    root: 'Rows',
    cache: false,
    async: false,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourceDemandTypes.totalrecords = data[0].TotalRows;
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
        { name: 'Address', type: 'string'},
        { name: 'UCreateName', type: 'string'},
        { name: 'VIPName', type: 'string'},
        { name: 'DateReg', type: 'date'},
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
    cache: false,
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
            Sources.SourceTerritory.totalrecords = data[0].TotalRows;
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
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourceStreets.totalrecords = data[0].TotalRows;
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
        {name: 'plandateexec', type: 'date'},
        {name: 'dateexec', type: 'date'},
        {name: 'report', type: 'string'},
        {name: 'othername', type: 'string'},
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
    ],
    id: 'mntr_id',
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
    ],
    id: 'Equip_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=EquipsListAll',
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
        { name: 'JAddress',  type: 'string' },
        { name: 'FAddress',  type: 'string' },
        { name: 'telephone',  type: 'string' },
        { name: 'bank_name',  type: 'string' },
        { name: 'bik',  type: 'string' },
        { name: 'cor_account',  type: 'string' },
        { name: 'cityb',  type: 'string' },
        { name: 'lph_name',  type: 'string' },
        { name: 'DEBT',  type: 'string' },
        { name: 'sum_price',  type: 'string' },
        { name: 'sum_appz_price',  type: 'string' },
        { name: 'sum_appz_price',  type: 'string' },
    ],
    id: 'Form_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=OrganizationsV',
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

/*
 * 
 *  public $dldm_id;
    public $date;
    public $user_sender;
    public $objc_id;
    public $dltp_id;
    public $mstr_id;
    public $prty_id;
    public $bestdate;
    public $deadline;
    public $plandate;
    public $text;
    public $phonenumber;
    public $empl_dlvr_id;
    public $date_logist;
    public $user_logist;
    public $note;
    public $date_delivery;
    public $rep_delivery;
    public $Contacts;
    public $dlrs_id;
    public $date_promise;
    public $prtp_id;
    public $prdoc_id;
    public $calc_id;
    public $docm_id;
    public $dmnd_id;
    public $repr_id;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
*/
 

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
        {name: 'LastChangeDate', type: 'date'},
    ],
    id: 'ContrS_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractsS',
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



Sources.SourceContractsDetails_v =
{
    datatype: "json",
    datafields: [
        {name: 'csdt_id', type: 'int'},
        {name: 'ContrS_id', type: 'int'},
        {name: 'Equip_id', type: 'int'},
        {name: 'Name', type: 'string'},
        {name: 'ItemName', type: 'string'},
        {name: 'price', type: 'string'},
        {name: 'Quant', type: 'string'},
        {name: 'sum', type: 'string'},
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
    async: false,
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
        { name: 'price',  type: 'string' },
        { name: 'quant',  type: 'string' },
        { name: 'sum',  type: 'string' },
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
    async: false,
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
        { name: 'Price',  type: 'string' },
        { name: 'PriceMonth',  type: 'string' },
        { name: 'ReasonName',  type: 'string' },
        { name: 'ServiceType',  type: 'string' },
    ],
    id: 'PriceHistory_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=ContractPriceHistory',
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
        { name: 'sum',  type: 'string' },
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
        { name: 'EquipName',  type: 'date' },
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

Sources.SourceMalfunctions =
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