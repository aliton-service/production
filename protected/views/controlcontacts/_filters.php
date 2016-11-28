<script>
    $(document).ready(function () {
        var Filters = {
            FullName: <?php echo json_encode($filterDefaultValues['FullName']); ?>,
            Address: <?php echo json_encode($filterDefaultValues['Address']); ?>,
            DateStart: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateStart']?>'),
            DateEnd: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateEnd']?>'),
            DebtStart: <?php echo json_encode($filterDefaultValues['DebtStart']); ?>,
            DebtEnd: <?php echo json_encode($filterDefaultValues['DebtEnd']); ?>,
            Executor: <?php echo json_encode($filterDefaultValues['Executor']); ?>
            
        };
        
        var DisabledControls = function() {
            $("#btnRefresh").jqxButton({disabled: true});
            $("#edFiltering").jqxButton({disabled: true});
            $("#btnInfo").jqxButton({disabled: true});
            $('#btnAdd').jqxButton({disabled: true});
            $('#btnExport').jqxButton({disabled: true});
            $('#btnDel').jqxButton({disabled: true});
            $('#btnUndo').jqxButton({disabled: true});
        };
        
        var ControlContactsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceControlContacts, {
            filter: function () {
                $("#ControlContactsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ControlContactsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        
        // Инициализируем контролы фильтров
        $("#edOrgFilter").jqxInput({height: 25, width: 200, minLength: 1, value: Filters.FullName}); 
        $("#edAddressFilter").jqxInput({height: 25, width: 200, minLength: 1, value: Filters.Address}); 
        $("#edDebtStartFilter").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', disabled: false, value: Filters.DebtStart}));
        $("#edDebtEndFilter").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', disabled: false, value: Filters.DebtEnd}));
        $("#edExecutorFilter").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); 
        $("#edExecutorFilter").val(Filters.Executor);
        $("#edDateStart").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateStart, readonly: false}); 
        $("#edDateEnd").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateEnd, readonly: false}); 
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        if (Filters.Master != null) $("#cmbMaster").val(Filters.Master);
        
        var Find = function(){
            var FullNameFilterGroup = new $.jqx.filter();
            if ($("#edOrgFilter").val() != '') {
                var FilterFullName = FullNameFilterGroup.createfilter('stringfilter', $("#edOrgFilter").val(), 'CONTAINS');
                FullNameFilterGroup.addfilter(1, FilterFullName);
            }
            
            var AddressFilterGroup = new $.jqx.filter();
            if ($("#edAddressFilter").val() != '') {
                var FilterAddress = AddressFilterGroup.createfilter('stringfilter', $("#edAddressFilter").val(), 'CONTAINS');
                AddressFilterGroup.addfilter(1, FilterAddress);
            }
            
            var DebtFilterGroup = new $.jqx.filter();
            var FilterDebtStart = DebtFilterGroup.createfilter('numericfilter', $("#edDebtStartFilter").val(), 'GREATER_THAN_OR_EQUAL');
            DebtFilterGroup.addfilter(1, FilterDebtStart);
            var FilterDebtEnd = DebtFilterGroup.createfilter('numericfilter', $("#edDebtEndFilter").val(), 'LESS_THAN_OR_EQUAL');
            DebtFilterGroup.addfilter(1, FilterDebtEnd);
            
            var ExecutorFilterGroup = new $.jqx.filter();
            if ($("#edExecutorFilter").val() != '') {
                var FilterExecutor = ExecutorFilterGroup.createfilter('numericfilter', $("#edExecutorFilter").val(), 'EQUAL');
                ExecutorFilterGroup.addfilter(1, FilterExecutor);
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
                 
            $('#ControlContactsGrid').jqxGrid('removefilter', 'empl_name', false);
            if ($("#edExecutorFilter").val() != '') $("#ControlContactsGrid").jqxGrid('addfilter', 'empl_name', ExecutorFilterGroup);
            
            $('#ControlContactsGrid').jqxGrid('removefilter', 'FullName', false);
            if ($("#edOrgFilter").val() != '') $("#ControlContactsGrid").jqxGrid('addfilter', 'FullName', FullNameFilterGroup);
            
            $('#ControlContactsGrid').jqxGrid('removefilter', 'Addr', false);
            if ($("#edAddressFilter").val() != '') $("#ControlContactsGrid").jqxGrid('addfilter', 'Addr', AddressFilterGroup);
            
            $('#ControlContactsGrid').jqxGrid('removefilter', 'debt', false);
            $("#ControlContactsGrid").jqxGrid('addfilter', 'debt', DebtFilterGroup);
            
            $('#ControlContactsGrid').jqxGrid('removefilter', 'next_date', false);
            if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#ControlContactsGrid").jqxGrid('addfilter', 'next_date', DateFilterGroup);
            
            $('#ControlContactsGrid').jqxGrid({source: ControlContactsDataAdapter});
        };
        
        Find();
    });
</script>

<div>Организация</div>
<div><input id='edOrgFilter' /><?php echo $filterDefaultValues['FullName']; ?></div>
<div>Адрес</div>
<div><input type="text" id="edAddressFilter" /></div>
<div>Долг</div>
<div>
    <div class="al-row-column">от</div>
    <div class="al-row-column"><input type="text" id="edDebtStartFilter" /></div>
    <div class="al-row-column">до</div>
    <div class="al-row-column"><input type="text" id="edDebtEndFilter" /></div>
    <div style="clear: both"></div>
</div>
<div>Исполнитель</div>
<div><div id='edExecutorFilter'></div></div>
<div>Дата запл. конт. с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>


