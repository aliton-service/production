<script>
    $(document).ready(function () {
        
        var tabIndex = $('#jqxTabsEvents').jqxTabs('selectedItem'); 
//        console.log('tabIndex0 = ' + tabIndex);
        
        $('#jqxTabsEvents').on('selected', function (event) {
            tabIndex = event.args.item;
//            console.log('tabIndex-selected = ' + tabIndex);
            Find();
        });
//        $('#jqxTabsEvents').on('selecting', function (event) {
//            Find();
//        }); 
            
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
            }
        });

        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));


        $("#cmbEmpl").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id" }); 
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id" }); 

        $('#edFiltering').on('click', function(){
            //Find1();
        });

        var EventTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventTypes));
        EventTypesDataAdapter.dataBind();

        var Find = function(){
            var EmplFilterGroup = new $.jqx.filter();
            if ($("#cmbEmpl").val() != '') {
                var FilterEmpl = EmplFilterGroup.createfilter('numericfilter', $("#cmbEmpl").val(), 'IN');
                EmplFilterGroup.addfilter(1, FilterEmpl);
            }

            if (CurrentRowDataClients != undefined) {
                var ObjectGroup = new $.jqx.filter();
                var FilterObject = ObjectGroup.createfilter('numericfilter', CurrentRowDataClients.objectgr_id, 'EQUAL');
                ObjectGroup.addfilter(1, FilterObject);
            }
//            console.log('tabIndex-Find = ' + tabIndex);
            if (tabIndex != 0) {
//                console.log('evtp_id = ' + EventTypesDataAdapter.records[tabIndex - 1].evtp_id);
                var EventGroup = new $.jqx.filter();
                var FilterEvent = EventGroup.createfilter('numericfilter', (EventTypesDataAdapter.records[tabIndex - 1].evtp_id), 'EQUAL');
                EventGroup.addfilter(1, FilterEvent);
            }

            $('#EventsGrid').jqxGrid('removefilter', 'employee', false);
            if ($("#cmbEmpl").val() != '') $("#EventsGrid").jqxGrid('addfilter', 'employee', EmplFilterGroup);

            $('#EventsGrid').jqxGrid('removefilter', 'objectgr_id', false);
            if (CurrentRowDataClients != null) $("#EventsGrid").jqxGrid('addfilter', 'objectgr_id', ObjectGroup);

            $('#EventsGrid').jqxGrid('removefilter', 'evtp_id', false);
            if (tabIndex != 0) {
                $("#EventsGrid").jqxGrid('addfilter', 'evtp_id', EventGroup);
            } else {
                $('#EventsGrid').jqxGrid('removefilter', 'evtp_id', false);
            }

            $('#EventsGrid').jqxGrid({source: EventsFiltersDataAdapter});
            
            
        };
        
        $("#EventsGrid").on("bindingcomplete", function () {
            $('#EventsGrid').jqxGrid('selectrow', 0);
        });
    });
</script>

<div>Исполнитель</div>
<div><div id='cmbEmpl'></div></div>

<div>Мастер</div>
<div><div id='cmbMaster'><?php // echo $filterDefaultValues['Master']; ?></div></div>
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


