<script>
    var Find;
    
    $(document).ready(function () {
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        var First = true;
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        var DataAreas = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAreas, {async: false}));
        var DataReportForms = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceReportForms, {async: false}));
        var DataTerritory = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory, {async: false}));
        var DataSystemTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSystemTypesMin, {async: false}));
        var DS = new Date();
        var CY = DS.getFullYear();
        var DS = new Date(CY + "-01-01");
        var DE = new Date(CY + "-12-31");
        
        
        
        $("#cmbEmpl").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id" }); 
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id" }); 
        $("#chbNoExecFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbExecFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbVipFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbNoVipFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbCount1Filter").jqxCheckBox({ width: 50, height: 25, checked: false}); 
        $("#chbCount2Filter").jqxCheckBox({ width: 50, height: 25, checked: false}); 
        $("#edPlanDateFilter").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: null }));
        $("#edAreaFilter").jqxComboBox({ source: DataAreas, width: '200', height: '25px', displayMember: "AreaName", valueMember: "Area_id" }); 
        $("#edReportForm").jqxComboBox({ source: DataReportForms, width: '200', height: '25px', displayMember: "ReportForm", valueMember: "rpfr_id" });
        $("#edTerrit").jqxComboBox({ source: DataTerritory, width: '200', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id" }); 
        $("#edSystemsFilter").jqxComboBox({ checkboxes: true, source: DataSystemTypes, width: '200', height: '25px', displayMember: "SystemTypeName", valueMember: "SystemType_Id" }); 
        $("#edDateStartFilter").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: DS }));
        $("#edDateEndFilter").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: DE }));
        
        
        $("#edFiltering").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        
        $('#edFiltering').on('click', function(){
            $("#EventsClientsGrid").jqxGrid('updatebounddata', 'data');
        });
        
        $("#EventsClientsGrid").on('rowselect', function (event) {
            Find();
            
        });

        var EventsFiltersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEvents), {
            filter: function () {
                $("#EventsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#EventsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
//                DisabledControls();
                $('#btnEditEvent').jqxButton({disabled: true})
                $('#btnDelEvent').jqxButton({disabled: true})
            }
        });

        Find = function(){
            var EmplFilterGroup = new $.jqx.filter();
            if ($("#cmbEmpl").val() != '') {
                var FilterEmpl = EmplFilterGroup.createfilter('numericfilter', $("#cmbEmpl").val(), 'EQUAL');
                EmplFilterGroup.addfilter(1, FilterEmpl);
            }
            
            if (CurrentRowDataClients != undefined) {
                var ObjectGroup = new $.jqx.filter();
                var FilterObject = ObjectGroup.createfilter('numericfilter', CurrentRowDataClients.ObjectGr_id, 'EQUAL');
                ObjectGroup.addfilter(1, FilterObject);
            } else return;
            
            var tabIndex = $('#jqxTabsEvents').jqxTabs('selectedItem'); 
              
            if (tabIndex != 0) {
                var EventGroup = new $.jqx.filter();
                var FilterEvent = EventGroup.createfilter('numericfilter', (EventTypesDataAdapter.records[tabIndex - 1].evtp_id), 'EQUAL');
                EventGroup.addfilter(1, FilterEvent);
            };
            
            D = new Date();
            if ($("#chbNoExecFilter").val() != false) {
                var DateExecGroup = new $.jqx.filter();
                var FilterDateExec = DateExecGroup.createfilter('datefilter', D, 'NULL');
                DateExecGroup.addfilter(1, FilterDateExec);
            };
            
            if ($("#chbExecFilter").val() != false) {
                var DateExecGroup = new $.jqx.filter();
                var FilterDateExec = DateExecGroup.createfilter('datefilter', D, 'NOT_NULL');
                DateExecGroup.addfilter(1, FilterDateExec);
            };
            
            var DatePlanGroup = new $.jqx.filter();
            if ($("#edPlanDateFilter").val() != '') {
                var FilterDatePlan = DatePlanGroup.createfilter('datefilter', $("#edPlanDateFilter").val(), 'DATE_EQUAL');
                DatePlanGroup.addfilter(1, FilterDatePlan);
            };
            
            var ReportFormFilterGroup = new $.jqx.filter();
            if ($("#edReportForm").val() != '') {
                var FilterReportForm = ReportFormFilterGroup.createfilter('numericfilter', $("#edReportForm").val(), 'EQUAL');
                ReportFormFilterGroup.addfilter(1, FilterReportForm);
            }
            
            if ($("#edDateStartFilter").val() != '') {
                var FilterDateStart = DatePlanGroup.createfilter('datefilter', $("#edDateStartFilter").val(), 'DATE_GREATER_THAN_OR_EQUAL');
                DatePlanGroup.addfilter(1, FilterDateStart);
            };
            
            if ($("#edDateEndFilter").val() != '') {
                var FilterDateStart = DatePlanGroup.createfilter('datefilter', $("#edDateEndFilter").val(), 'DATE_LESS_THAN_OR_EQUAL');
                DatePlanGroup.addfilter(1, FilterDateStart);
            };
            
            $('#EventsGrid').jqxGrid('removefilter', 'EmployeeName', false);
            if ($("#cmbEmpl").val() != '') $("#EventsGrid").jqxGrid('addfilter', 'EmployeeName', EmplFilterGroup);

            $('#EventsGrid').jqxGrid('removefilter', 'ObjectGr_id', false);
            if (CurrentRowDataClients != null) $("#EventsGrid").jqxGrid('addfilter', 'ObjectGr_id', ObjectGroup);
            
            $('#EventsGrid').jqxGrid('removefilter', 'DateExec', false);
            if ($("#chbNoExecFilter").val() != false || $("#chbExecFilter").val() != false) $("#EventsGrid").jqxGrid('addfilter', 'DateExec', DateExecGroup);
            
            $('#EventsGrid').jqxGrid('removefilter', 'Evtp_id', false);
            if (tabIndex > 0)
                $("#EventsGrid").jqxGrid('addfilter', 'Evtp_id', EventGroup);
            
            $('#EventsGrid').jqxGrid('removefilter', 'Date', false);
            if ($("#edPlanDateFilter").val() != '' || $("#edDateStartFilter").val() != '' || $("#edDateEndFilter").val() != '') $("#EventsGrid").jqxGrid('addfilter', 'Date', DatePlanGroup);
            
            $('#EventsGrid').jqxGrid('removefilter', 'Rpfr_id', false);
            if ($("#edReportForm").val() != '') $("#EventsGrid").jqxGrid('addfilter', 'Rpfr_id', ReportFormFilterGroup);
            
            if (First)
                $('#EventsGrid').jqxGrid({source: EventsFiltersDataAdapter});
            else
                $('#EventsGrid').jqxGrid('updatebounddata', 'data');
            First = false;
            
        };
    });
</script>

<div class='al-row'>Исполнитель</div>
<div class='al-row'><div id='cmbEmpl'></div></div>
<div class='al-row'>Мастер</div>
<div class='al-row'><div id='cmbMaster'></div></div>
<div class='al-row'><div id='chbNoExecFilter'>Невыполненные</div></div>
<div class='al-row'><div id='chbExecFilter'>Выполненные</div></div>
<div class='al-row'><div id='chbVipFilter'>ВИП</div></div>
<div class='al-row'><div id='chbNoVipFilter'>Не ВИП</div></div>
<div class="al-row">
    <div class="al-row-column"><div id='chbCount1Filter'> > 0</div></div>
    <div class="al-row-column"><div id='chbCount2Filter'> = 0</div></div>
    <div style="clear: both"></div>
</div>
<div class='al-row'>Плановая дата</div>
<div class='al-row'><div id='edPlanDateFilter'></div></div>
<div class='al-row'>Район</div>
<div class='al-row'><div id='edAreaFilter'></div></div>
<div class='al-row'>Форма отчетности</div>
<div class='al-row'><div id='edReportForm'></div></div>
<div class='al-row'>Участок</div>
<div class='al-row'><div id='edTerrit'></div></div>
<div class='al-row'>Системы</div>
<div class='al-row'><div id='edSystemsFilter'></div></div>
<div>Дата с</div>
<div><div id='edDateStartFilter'></div></div>
<div>по</div>
<div><div id='edDateEndFilter'></div></div>

<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>


