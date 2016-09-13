<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var ControlContacts = {
            Employee_id: '<?php echo $model->Employee_id; ?>',
        };

        var DataOrganizations = new $.jqx.dataAdapter(Sources.SourceOrganizationsVMin);
        var DataAddress = new $.jqx.dataAdapter(Sources.SourceListAddresses);
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);

        $("#Organizations").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataOrganizations, displayMember: "FormName", valueMember: "Form_id", width: 350 }));
        $("#Address").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataAddress, displayMember: "Addr", valueMember: "Address_id", width: 380 }));
        $("#Employee").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
        
        $("#DebtMin").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { min: 0, decimalDigits: 0 }));
        $("#DebtMax").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { min: 0, decimalDigits: 0 }));
        
        $("#DebtMin").jqxNumberInput('val', null);
        $("#DebtMax").jqxNumberInput('val', null);
        
        $("#BeginDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#EndDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        
        
        $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 140, formatString: 'dd.MM.yyyy HH:mm', value: null, readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#Type").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 190 }));
        $("#Contact").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 420 }));
        
        $("#textField").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 400 }));
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 55 }));
        $("#drsn_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 287 }));
        $("#debt").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#rslt_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 325 }));
        $("#next_date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy', value: null, height: '25', width: '180', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        
        
        
//        $("#btnReset").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180 }));
        
        
        
//        var filtergroup = new $.jqx.filter();
//        var filtervalue = 10; // Each cell value is compared with the filter's value.
//        // filtertype - numericfilter, stringfilter, datefilter or booelanfilter. 
//        // condition
//        // possible conditions for string filter: 'EMPTY', 'NOT_EMPTY', 'CONTAINS', 'CONTAINS_CASE_SENSITIVE',
//        // 'DOES_NOT_CONTAIN', 'DOES_NOT_CONTAIN_CASE_SENSITIVE', 'STARTS_WITH', 'STARTS_WITH_CASE_SENSITIVE',
//        // 'ENDS_WITH', 'ENDS_WITH_CASE_SENSITIVE', 'EQUAL', 'EQUAL_CASE_SENSITIVE', 'NULL', 'NOT_NULL'
//        // possible conditions for numeric filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL'
//        
//        // possible conditions for date filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL'                         
//        var filter = filtergroup.createfilter(filtertype, filtervalue, condition);
//        var filter2 = filtergroup.createfilter(filtertype, filtervalue2, condition2);
//        // To create a custom filter, you need to call the createfilter function and pass a custom callback function as a fourth parameter.
//        // If the callback's name is 'customfilter', the Grid will pass 3 params to this function - filter's value, current cell value to evaluate and the condition.                        
//        // operator - 0 for "and" and 1 for "or"
//        filtergroup.addfilter(operator, filter);
//        filtergroup.addfilter(operator, filter2);
//        // datafield is the bound field.
//        // adds a filter to the grid.
//        $('#grid').jqxGrid('addfilter', datafield, filtergroup);
//        // to add and apply the filter, use this:
//        $('#jqxGrid').jqxGrid('addfilter', datafield, filtergroup, true);
        
        


        var ControlContactsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceControlContacts, {
            filter: function () {
                $("#ControlContactsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ControlContactsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        $("#ControlContactsGrid").on('bindingcomplete', function(){
            $('#ControlContactsGrid').jqxGrid('selectrow', 0);
        });
                    
        $("#ControlContactsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: true,
                width: '99.8%',
                height: '400',
                source: ControlContactsDataAdapter,
                columns: [
                    { text: 'Заплонированная дата', dataField: 'next_date', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 170 },
                    { text: 'Тип контакта', dataField: 'next_cntp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Контактное лицо', dataField: 'next_contact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Организация', dataField: 'FullName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 220 },
                    { text: 'Form_id', dataField: 'Form_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 30, hidden: true },
                    { text: 'Адрес', dataField: 'Addr', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Address_id', dataField: 'og.Address_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 30, hidden: true },
                    { text: 'Долг', dataField: 'debt', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 80 },
                    { text: 'c.debt', dataField: 'c.debt', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 80, hidden: true },
                    { text: 'Исполнитель', dataField: 'empl_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'empl_id', dataField: 'cnt.empl_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 30, hidden: true },
                ]
            })
        );
        
        
         // Привязка фильтров к гриду
        GridFilters.AddControlFilter('Organizations', 'jqxComboBox', 'ControlContactsGrid', 'Form_id', 'numericfilter', 0, 'EQUAL', true);
        GridFilters.AddControlFilter('Employee', 'jqxComboBox', 'ControlContactsGrid', 'cnt.empl_id', 'numericfilter', 0, 'EQUAL', true);
        GridFilters.AddControlFilter('Address', 'jqxComboBox', 'ControlContactsGrid', 'og.Address_id', 'numericfilter', 0, 'EQUAL', true);
        GridFilters.AddControlFilter('DebtMin', 'jqxNumberInput', 'ControlContactsGrid', 'c.debt', 'numericfilter', 0, 'GREATER_THAN_OR_EQUAL', true);
        GridFilters.AddControlFilter('DebtMax', 'jqxNumberInput', 'ControlContactsGrid', 'c.debt', 'numericfilter', 0, 'LESS_THAN_OR_EQUAL', true);
        
        GridFilters.AddControlFilter('BeginDate', 'jqxDateTimeInput', 'ControlContactsGrid', 'next_date', 'datefilter', 0, 'DATE_GREATER_THAN_OR_EQUAL', true);
        GridFilters.AddControlFilter('EndDate', 'jqxDateTimeInput', 'ControlContactsGrid', 'next_date', 'datefilter', 0, 'DATE_LESS_THAN_OR_EQUAL', true);
//        
//        $('#btnReset').on('click', function () {
//            $("#Date").jqxDateTimeInput('val', null);
//            $("#Prior").jqxComboBox('clearSelection');
//            $("#UserCreate").jqxComboBox('clearSelection');
//            $('#notAcceptedDemands').jqxCheckBox('uncheck');
//            $('#unfulfilledDemands').jqxCheckBox('uncheck');
//            $("#BeginDate").jqxDateTimeInput('val', null);
//            $("#Number").jqxNumberInput('val', null);
//            $("#EndDate").jqxDateTimeInput('val', null);
//            $('#ControlContactsGrid').jqxGrid('clearfilters');
//        });
        

        $("#ControlContactsGrid").on('rowselect', function (event) {
            var Temp = $('#ControlContactsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null;}
            
            console.log(CurrentRowData);
            
            if (CurrentRowData !== null) {
                if (CurrentRowData.date !== null) $("#date").jqxDateTimeInput('val', CurrentRowData.date);
                if (CurrentRowData.text !== null) $("#textField").jqxTextArea('val', CurrentRowData.text);
                if (CurrentRowData.rslt_name !== null) $("#rslt_name").jqxInput('val', CurrentRowData.rslt_name);
                if (CurrentRowData.note !== null) $("#note").jqxTextArea('val', CurrentRowData.note);
                if (CurrentRowData.drsn_name !== null) $("#drsn_name").jqxInput('val', CurrentRowData.drsn_name);
                if (CurrentRowData.next_date !== null) $("#next_date").jqxDateTimeInput('val', CurrentRowData.next_date);
                if (CurrentRowData.debt !== null) $("#debt").jqxInput('val', CurrentRowData.debt);
                if (CurrentRowData.cntp_name !== null) $("#Type").jqxInput('val', CurrentRowData.cntp_name);
                if (CurrentRowData.contact !== null) $("#Contact").jqxInput('val', CurrentRowData.contact);
            }
        });



        
        $('#EditDialogControlContacts').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '770', width: '840'}));
        
        $('#EditDialogControlContacts').jqxWindow({initContent: function() {
            $("#btnOkControlContacts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnCancelControlContacts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#btnCancelControlContacts").on('click', function () {
            $('#EditDialogControlContacts').jqxWindow('close');
        });
        
        var SendForm = function() {
            var Data = $('#Contacts').serialize();
                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Contacts/Insert');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogControlContacts').jqxWindow('close');
                        $("#ControlContactsGrid").jqxGrid('updatebounddata');
                        $("#ControlContactsGrid").jqxGrid('selectrow', 0);
                    } else {
                        $('#BodyDialogControlContacts').html(Res);
                    }

                }
            });
        };

        $("#btnOkControlContacts").on('click', function () {
            SendForm();
        });
            
        
        $("#NewControlContacts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#MoreInfoControlContacts").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
        $("#ReloadControlContacts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        
        var LoadFormInsert = function() {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Contacts/Insert');?>",
                type: 'POST',
                async: false,
                data: {
                    ObjectGr_id: CurrentRowData.ObjectGr_id
                },
                success: function(Res) {
                    $('#BodyDialogControlContacts').html(Res);
                }
            });
        };
        
        $('#ControlContactsGrid').on('rowdoubleclick', function () { 
            $("#MoreInfoControlContacts").click();
        });
        
        
        $("#NewControlContacts").on('click', function () 
        {
            LoadFormInsert();
            $('#EditDialogControlContacts').jqxWindow('open');
        });
        
        $("#MoreInfoControlContacts").on('click', function ()
        {
            window.open('/index.php?r=Objectsgroup/Index&ObjectGr_id=' + CurrentRowData.ObjectGr_id);
        });
           
        
        
        $("#ReloadControlContacts").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ControlContacts/Index",
                success: function(){
                    $("#ControlContactsGrid").jqxGrid('updatebounddata');
                    $("#ControlContactsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
    });
    
        
</script>

<?php $this->setPageTitle('Контроль контактов'); ?>

<div class="row">
    <div class="row-column" style="margin-top: 5px;">Организация: </div><div class="row-column"><div id="Organizations"></div></div>
    <div class="row-column" style="margin-top: 5px; margin-left: 50px;">Адрес: </div><div class="row-column"><div id="Address"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 5px;">Долг: </div>
    <div class="row-column" style="margin-top: 5px;">с </div><div class="row-column"><div id='DebtMin'></div></div>
    <div class="row-column" style="margin-top: 5px;">по </div><div class="row-column"><div id='DebtMax'></div></div>
    <div class="row-column" style="margin-top: 5px; margin-left: 105px;">Исполнитель: </div><div class="row-column"><div id="Employee"></div></div>
</div>

<div class="row" style="margin-bottom: 20px;">
    <div class="row-column" style="margin-top: 5px;">Дата запланированного контакта: </div>
    <div class="row-column" style="margin-top: 5px;">с </div><div class="row-column"><div id='BeginDate'></div></div>
    <div class="row-column" style="margin-top: 5px;">по </div><div class="row-column"><div id='EndDate'></div></div>
</div>


<div id="ControlContactsGrid" class="jqxGridAliton"></div>
        

<div class="row" style="padding: 0 10px 5px 10px; border: 1px solid #ddd; background-color: #eee;">
    <div class="row" style="margin: 0; padding: 0;"><div class="row-column" style="margin: 0 0 5px 0;">Последний контакт</div></div>
    <div class="row" style="margin: 0;">
        <div class="row" style="margin-top: 5px;">
            <div class="row-column" style="margin-top: 3px;">Дата: </div><div class="row-column"><div id='date'/></div></div>
            <div class="row-column">Тип: <input readonly type="text" id='Type'/></div>
            <div class="row-column">Контактное лицо: <input readonly type="text" id='Contact'/></div>
        </div>
        <div class="row-column">
            <div class="row"><div class="row-column">Содержание: <textarea readonly id="textField"></textarea></div></div>
            <div class="row"><div class="row-column">Результат: <input readonly id="rslt_name" type="text"></div></div>
        </div>   

        <div class="row">
            <div class="row-column">Долг: <br><input readonly id="debt" type="text"></div>
            <div class="row-column">Причина долга: <br><input readonly id="drsn_name" type="text"></div>
            <div class="row-column">Дата согласованной оплаты: <div id='next_date'></div></div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="row-column">Примечание: <textarea readonly id="note"></textarea></div>
        </div>
    </div>
</div>


<div class="row" style="max-width: 1065px; margin: 0;">
    <div class="row">
        <div class="row-column"><input type="button" value="Дополнительно" id='MoreInfoControlContacts' /></div>
        <div class="row-column"><input type="button" value="Новый контакт" id='NewControlContacts' /></div>
        <div class="row-column"><input type="button" value="Обновить" id='ReloadControlContacts' /></div>
    </div>
</div>


<div id="EditDialogControlContacts">
    <div id="DialogHeaderControlContacts">
        <span id="HeaderTextControlContacts">Вставка\Редактирование записи</span>
    </div>
    <div id="DialogContentControlContacts" style="padding: 20px 30px 10px; background-color: #F2F2F2;" >
        <div id="BodyDialogControlContacts"></div>
        <div id="BottomDialogControlContacts">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOkControlContacts' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancelControlContacts' /></div>
            </div>
        </div>
    </div>
</div>
