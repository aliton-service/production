<script>
    var Find;
    
    $(document).ready(function () {
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        var First = true;
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        
        
        
        $("#cmbEmpl").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id" }); 
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id" }); 
        $("#chbNoExecFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbExecFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbVipFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbNoVipFilter").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        
        $("#edFiltering").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        
        $('#edFiltering').on('click', function(){
            $("#EventsClientsGrid").jqxGrid('updatebounddata', 'data');
//            $("#EventsClientsGrid").jqxGrid('updatebounddata');
        });
        
        $("#EventsClientsGrid").on('rowselect', function (event) {
            console.log('rowselect');
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
            }
        });

        Find = function(){
//            var EmplFilterGroup = new $.jqx.filter();
//            if ($("#cmbEmpl").val() != '') {
//                var FilterEmpl = EmplFilterGroup.createfilter('numericfilter', $("#cmbEmpl").val(), 'IN');
//                EmplFilterGroup.addfilter(1, FilterEmpl);
//            }
            
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

//            $('#EventsGrid').jqxGrid('removefilter', 'employee', false);
//            if ($("#cmbEmpl").val() != '') $("#EventsGrid").jqxGrid('addfilter', 'employee', EmplFilterGroup);

            $('#EventsGrid').jqxGrid('removefilter', 'ObjectGr_id', false);
            if (CurrentRowDataClients != null) $("#EventsGrid").jqxGrid('addfilter', 'ObjectGr_id', ObjectGroup);
            
            $('#EventsGrid').jqxGrid('removefilter', 'DateExec', false);
            if ($("#chbNoExecFilter").val() != false || $("#chbExecFilter").val() != false) $("#EventsGrid").jqxGrid('addfilter', 'DateExec', DateExecGroup);
            
            $('#EventsGrid').jqxGrid('removefilter', 'Evtp_id', false);
            if (tabIndex > 0)
                $("#EventsGrid").jqxGrid('addfilter', 'Evtp_id', EventGroup);
            
            if (First)
                $('#EventsGrid').jqxGrid({source: EventsFiltersDataAdapter});
            else
                $('#EventsGrid').jqxGrid('updatebounddata', 'cells');
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
<!--
<div>Дата с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
<div>Создан с</div>
<div><div id='edDateCrStart'></div></div>
<div>по</div>
<div><div id='edDateCrEnd'></div></div>
<div>Подтвержден с</div>
<div><div id='edDateAcStart'></div></div>
<div>по</div>
<div><div id='edDateAcEnd'></div></div>
<div>Адрес</div>
<div><input type="text" id="edAddress" /></div>-->
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>


