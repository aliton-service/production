<script>
    $(document).ready(function () {
        var DeliveryDemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.DeliveryDemandsSource, {
            filter: function () {
                $("#DeliveryDemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#DeliveryDemandsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        
        // Инициализируем контролы фильтров
        $("#cmbExecutor").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр исполнитель
        $("#cmbUserSenderName").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр подал
        $("#edNoAccept").jqxCheckBox({ width: 200, height: 25, checked: false}); // Фильтр непринятые
        $("#edNoExec").jqxCheckBox({ width: 200, height: 25, checked: true}); // Фильтр невыполненные
        $("#edExec").jqxCheckBox({ width: 200, height: 25, checked: false}); // Фильтр выполненные
        $("#edNumber").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {height: 25, width: 100, decimalDigits: 0})); // Фильтр номер
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null}));
        $("#edDeliveryMan").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр исполнитель
        $("#edAddress").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 'calc(100% - 2px)'}));
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        $("#edNoAccept").on('change', function() { Find(); });
        $("#edNoExec").on('change', function() { Find(); });
        $("#edExec").on('change', function() { Find(); });
        
        
        var Find = function(){
            var ExecutorFilterGroup = new $.jqx.filter();
            if ($("#cmbExecutor").val() != '') {
                var FilterExecutor = ExecutorFilterGroup.createfilter('numericfilter', $("#cmbExecutor").val(), 'EQUAL');
                ExecutorFilterGroup.addfilter(1, FilterExecutor);
            }
            
            var UserSenderNameFilterGroup = new $.jqx.filter();
            if ($("#cmbUserSenderName").val() != '') {
                var FilterUserSenderName = UserSenderNameFilterGroup.createfilter('numericfilter', $("#cmbUserSenderName").val(), 'EQUAL');
                UserSenderNameFilterGroup.addfilter(1, FilterUserSenderName);
            }
            
            var NotAcceptFilterGroup = new $.jqx.filter();
            if ($("#edNoAccept").val() != '') {
                var FilterNotAccept = NotAcceptFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NotAcceptFilterGroup.addfilter(1, FilterNotAccept);
            }
            
            var ExecFilterGroup = new $.jqx.filter();
            if ($("#edNoExec").val() != '') {
                var FilterNotExec = ExecFilterGroup.createfilter('datefilter', Date(), 'NULL');
                ExecFilterGroup.addfilter(0, FilterNotExec);
            }
            if ($("#edExec").val() != '') {
                var FilterExec = ExecFilterGroup.createfilter('datefilter', Date(), 'NOT_NULL');
                ExecFilterGroup.addfilter(0, FilterExec);
            }
            
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edNumber").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('numericfilter', $("#edNumber").val(), 'EQUAL');
                NumberFilterGroup.addfilter(0, FilterNumber);
            }
            var DateFilterGroup = new $.jqx.filter();
            if ($("#edDate").val() != '') {
                var FilterDate = DateFilterGroup.createfilter('datefilter', $("#edDate").val(), 'STR_EQUAL');
                DateFilterGroup.addfilter(0, FilterDate);
            }
            
            var DeliveryManFilterGroup = new $.jqx.filter();
            if ($("#edDeliveryMan").val() != '') {
                var FilterDeliveryMan = DeliveryManFilterGroup.createfilter('numericfilter', $("#edDeliveryMan").val(), 'EQUAL');
                DeliveryManFilterGroup.addfilter(0, FilterDeliveryMan);
            }
            
            var AddressFilterGroup = new $.jqx.filter();
            if ($("#edAddress").val() != '') {
                var FilterAddress = AddressFilterGroup.createfilter('stringfilter', $("#edAddress").val(), 'CONTAINS');
                AddressFilterGroup.addfilter(0, FilterAddress);
            }
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'MasterName', false);
            if ($("#cmbExecutor").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'MasterName', ExecutorFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'user_sender_name', false);
            if ($("#cmbUserSenderName").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'user_sender_name', UserSenderNameFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'date_logist', false);
            if ($("#edNoAccept").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'date_logist', NotAcceptFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'date_delivery', false);
            if ($("#edNoExec").val() != '' || $("#edExec").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'date_delivery', ExecFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'dldm_id', false);
            if ($("#edNumber").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'dldm_id', NumberFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'date', false);
            if ($("#edDate").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'date', DateFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'DeliveryMan', false);
            if ($("#edDeliveryMan").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'DeliveryMan', DeliveryManFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid('removefilter', 'Addr', false);
            if ($("#edAddress").val() != '') $("#DeliveryDemandsGrid").jqxGrid('addfilter', 'Addr', AddressFilterGroup);
            
            $('#DeliveryDemandsGrid').jqxGrid({source: DeliveryDemandsAdapter});
        };
        
        Find();
    });
</script>

<div>Исполнитель:</div>
<div><div id='cmbExecutor'></div></div>

<div id='edNoAccept' style="color: white;">Непринятые заявки</div>
<div id='edNoExec' style="color: white;">Невыполненные заявки</div>
<div id='edExec' style="color: white;">Выполненные заявки</div>

<div style="margin-top: 3px;">Номер:</div>
<div><div id="edNumber"></div></div>

<div style="margin-top: 3px;">Дата:</div>
<div><div id="edDate"></div></div>

<div style="margin-top: 3px;">Курьер:</div>
<div><div id='edDeliveryMan'></div></div>

<div style="margin-top: 3px;">Адрес:</div>
<div><input type="text" id="edAddress"></div>

<div style="margin-top: 3px;">Заявку подал:</div>
<div><div id='cmbUserSenderName'></div></div>

<div style="margin-top: 10px;"><input type="button" value="Фильтр" id="edFiltering"/></div>
