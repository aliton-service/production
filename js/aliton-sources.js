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
    url: '/index.php?r=AjaxData/DataJQX&ModelName=ListObjects',
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
        {name: '$Employee_id_For_Demands', type: 'string'},
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
        Sources.SourceListEmployees.totalrecords = data[0].TotalRows;
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
            Sources.SourceSystemTypes.totalrecords = data[0].TotalRows;
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
        { name: 'Info_id' },
        { name: 'contact' },
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
            Sources.SourceContactInfo.totalrecords = data[0].TotalRows;
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
        Sources.DemandsSource.totalrecords = data[0].TotalRows;
    }
};

Sources.SourceListAddresses =
{
    datatype: "json",
    datafields: [
        { name: 'Object_id' },
        { name: 'Addr' },
    ],
    id: 'Object_id',
    url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=AddressList',
    root: 'Rows',
    cache: false,
    async: true,
    pagenum: 0,
    pagesize: 300,
    beforeprocessing: function (data) {
            Sources.SourceListAddresses.totalrecords = data[0].TotalRows;
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