<script>
    $(document).ready(function () {
        var Filters = {
            
        };
        
        var DisabledControls = function() {
//            $("#btnRefresh").jqxButton({disabled: true});
        };
        
        var RepairsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRepairs, {
            filter: function () {
                $("#RepairsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#RepairsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                DisabledControls();
            }
        }));
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        DataEmployees.dataBind();
        DataEmployees = DataEmployees.records;
        // Инициализируем контролы фильтров
        $("#cmbEngineer").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); 
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); 
        $("#chbNotAccept").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#chbNotReady").jqxCheckBox({ width: 160, height: 25, checked: true}); 
        $("#chbNotExec").jqxCheckBox({ width: 160, height: 25, checked: true}); 
        $("#chbReturn").jqxCheckBox({ width: 160, height: 25, checked: false}); 
        $("#edNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 200, minLength: 1}));
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: null})); 
        $("#edDateStart").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: null, readonly: false}); 
        $("#edDateEnd").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: null, readonly: false}); 
        $("#edAddr").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 200, minLength: 1})); 
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        if (Filters.Master != null) $("#cmbMaster").val(Filters.Master);
        
        var Find = function(){
            var EngineerFilterGroup = new $.jqx.filter();
            if ($("#cmbEngineer").val() != '') {
                var FilterEngineer = EngineerFilterGroup.createfilter('numericfilter', $("#cmbEngineer").val(), 'EQUAL');
                EngineerFilterGroup.addfilter(1, FilterEngineer);
            }
            
            var NotAcceptFilterGroup = new $.jqx.filter();
            if ($("#chbNotAccept").val() != false) {
                var FilterNotAccept = NotAcceptFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NotAcceptFilterGroup.addfilter(1, FilterNotAccept);
            }
            
            var NoReadyFilterGroup = new $.jqx.filter();
            if ($("#chbNotReady").val() != false) {
                var FilterNotReady = NoReadyFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NoReadyFilterGroup.addfilter(1, FilterNotReady);
            }
            
            var NoExecFilterGroup = new $.jqx.filter();
            if ($("#chbNotExec").val() != false) {
                var FilterNotExec = NoExecFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NoExecFilterGroup.addfilter(1, FilterNotExec);
            }
            
            var ReturnFilterGroup = new $.jqx.filter();
            if ($("#chbReturn").val() != false) {
                var FilterReturn = ReturnFilterGroup.createfilter('booleanfilter', 1, 'EQUAL');
                ReturnFilterGroup.addfilter(1, FilterReturn);
            }
            
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edNumber").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('stringfilter', $("#edNumber").val(), 'CONTAINS');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
            
            var DateRegFilterGroup = new $.jqx.filter();
            if ($("#edDate").val() != '') {
                var FilterDateExec = DateRegFilterGroup.createfilter('datefilter', $("#edDate").val(), 'DATE_EQUAL');   
                DateRegFilterGroup.addfilter(1, FilterDateExec);
            }
            
            var MasterFilterGroup = new $.jqx.filter();
            if ($("#cmbMaster").val() != '') {
                var FilterEngineer = MasterFilterGroup.createfilter('numericfilter', $("#cmbMaster").val(), 'EQUAL');
                MasterFilterGroup.addfilter(1, FilterEngineer);
            }
            
            var AddressFilterGroup = new $.jqx.filter();
            if ($("#edAddr").val() != '') {
                var FilterAddress = AddressFilterGroup.createfilter('stringfilter', $("#edAddr").val(), 'CONTAINS');
                AddressFilterGroup.addfilter(1, FilterAddress);
            }
            
            var DateFilterGroup = new $.jqx.filter();
            if ($("#edDateStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#edDateStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#edDateEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#edDateEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            
            $('#RepairsGrid').jqxGrid('removefilter', 'egnr_empl_name', false);
            if ($("#cmbEngineer").val() != '') $("#RepairsGrid").jqxGrid('addfilter', 'egnr_empl_name', EngineerFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'date_accept', false);
            if ($("#chbNotAccept").val() != false) $("#RepairsGrid").jqxGrid('addfilter', 'date_accept', NotAcceptFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'date_ready', false);
            if ($("#chbNotReady").val() != false) $("#RepairsGrid").jqxGrid('addfilter', 'date_ready', NoReadyFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'date_exec', false);
            if ($("#chbNotExec").val() != false) $("#RepairsGrid").jqxGrid('addfilter', 'date_exec', NoReadyFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'Return', false);
            if ($("#chbReturn").val() != false) $("#RepairsGrid").jqxGrid('addfilter', 'Return', ReturnFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'number', false);
            if ($("#edNumber").val() != '') $("#RepairsGrid").jqxGrid('addfilter', 'number', NumberFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'date_create', false);
            if ($("#edDate").val() != '') $("#RepairsGrid").jqxGrid('addfilter', 'date_create', DateRegFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'mstr_empl_name', false);
            if ($("#cmbMaster").val() != '') $("#RepairsGrid").jqxGrid('addfilter', 'mstr_empl_name', MasterFilterGroup);
            
            $('#RepairsGrid').jqxGrid('removefilter', 'Addr', false);
            if ($("#edAddr").val() != '') $("#RepairsGrid").jqxGrid('addfilter', 'Addr', AddressFilterGroup);
            
            if ($("#edDate").val() == '') $('#RepairsGrid').jqxGrid('removefilter', 'date_create', false);
            if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#RepairsGrid").jqxGrid('addfilter', 'date_create', DateFilterGroup);
            
            $('#RepairsGrid').jqxGrid({source: RepairsAdapter});
        };
        
        Find();
    });
</script>

<div>Инженер ПРЦ</div>
<div><div id='cmbEngineer'></div></div>
<div><div id='chbNotAccept' style="color: white;">Непринятые</div></div>
<div><div id='chbNotReady' style="color: white;">Невыполненный ремонт</div></div>
<div><div id='chbNotExec' style="color: white;">Незакрытый ремонт</div></div>
<div><div id='chbReturn' style="color: white;">Требуется возврат</div></div>
<div>Номер</div>
<div><input type="text" id='edNumber' /></div>
<div>Дата регистрации</div>
<div><div id='edDate' ></div></div>
<div>Мастер</div>
<div><div id='cmbMaster'></div></div>
<div>Адрес</div>
<div><input id="edAddr" type="text" /></div>
<div>Период с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>



