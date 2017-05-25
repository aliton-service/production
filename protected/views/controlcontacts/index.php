<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var ControlContacts = {
            Employee_id: '<?php echo $model->Employee_id; ?>',
        };

        $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 140, formatString: 'dd.MM.yyyy HH:mm', value: null, readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#Type").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 190 }));
        $("#Contact").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 320 }));
        $("#textField").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 400 }));
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 400, height: 52 }));
        $("#drsn_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
        $("#debt").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#rslt_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 325 }));
        $("#next_date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy', value: null, height: '25', width: '120', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));

        $("#ControlContactsGrid").on('bindingcomplete', function(){
            $("#ControlContactsGrid").jqxGrid('selectrow', 0);
        });
        
        var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
            var Temp = $('#ControlContactsGrid').jqxGrid('getrowdata', row);
            var column = $("#ControlContactsGrid").jqxGrid('getcolumn', columnfield);
            if (column.cellsformat != '') {
                if ($.jqx.dataFormat) {
                    if ($.jqx.dataFormat.isDate(value)) {
                        value = $.jqx.dataFormat.formatdate(value, column.cellsformat);
                    }   
                    else if ($.jqx.dataFormat.isNumber(value)) {
                        value = $.jqx.dataFormat.formatnumber(value, column.cellsformat);
                    }
                }
            }
            console.log(Temp);
            if ((Temp["ContactPriority"] == 1)) 
                return '<span class="backlight_pink" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
        };

        $("#ControlContactsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: true,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                columns: [
                    { text: 'Запланированная дата', datafield: 'next_date', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 170, cellsrenderer: cellsrenderer },
                    { text: 'Тип контакта', datafield: 'next_cntp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 140, cellsrenderer: cellsrenderer },
                    { text: 'Контактное лицо', datafield: 'next_contact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200, cellsrenderer: cellsrenderer },
                    { text: 'Организация', datafield: 'FullName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 220, cellsrenderer: cellsrenderer },
                    { text: 'Form_id', datafield: 'Form_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 30, hidden: true },
                    { text: 'Адрес', datafield: 'Addr', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200, cellsrenderer: cellsrenderer },
                    { text: 'Долг', datafield: 'debt', filtercondition: 'STARTS_WITH', width: 80, cellsformat: 'f2', cellsrenderer: cellsrenderer },
                    { text: 'Исполнитель', datafield: 'empl_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150, cellsrenderer: cellsrenderer},
                ]
            })
        );
        
        $("#ControlContactsGrid").on('rowselect', function (event) {
            
            CurrentRowData = $('#ControlContactsGrid').jqxGrid('getrowdata', event.args.rowindex);
            
            if (CurrentRowData !== undefined) {
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

<style>

    .backlight_pink {
        color: #E000E0;
    }

</style>
            
<div class="al-row" style="height: calc(100% - 208px)">
    <div id="ControlContactsGrid" class="jqxGridAliton"></div>
</div>
<div class="al-row">
    
    <div class="al-row" style="margin: 0; padding: 0;">
        <div class="al-row-column">Дата:</div>
        <div class="al-row-column"><div id='date'/></div></div>
        <div class="al-row-column">Тип:</div>
        <div class="al-row-column"><input readonly type="text" id='Type'/></div>
        <div class="al-row-column">Конт. лицо:</div>
        <div class="al-row-column"><input readonly type="text" id='Contact'/></div>
        <div style="clear: both"></div>
    </div>        
</div>    
<div class="al-row">
    <div class="al-row-column">
        <div class="al-row" style="margin: 0; padding: 0;">Содержание:</div>
        <div class="al-row" style="margin: 0; padding: 0;"><textarea readonly id="textField"></textarea></div>
        <div class="al-row" style="margin: 0; padding: 0;">
            <div class="al-row-column">Результат:</div>
            <div class="al-row-column"><input readonly id="rslt_name" type="text"></div>
            <div style="clear: both"></div>
        </div>
    </div>   
    <div class="al-row-column">
        <div class="al-row" style="margin: 0; padding: 0;">
            <div class="al-row-column">
                <div>Долг:</div>
                <div><input readonly id="debt" type="text"></div>
            </div>
            <div class="al-row-column">
                <div>Причина долга:</div>
                <div><input readonly id="drsn_name" type="text"></div>
            </div>
            <div class="al-row-column">
                <div>Дата согл. опл.:</div>
                <div><div id='next_date'></div></div>
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row" style="margin: 0; padding: 0;">
            <div class="al-row" style="margin: 0; padding: 0;">Примечание:</div>
            <div class="al-row" style="margin: 0; padding: 0;"><textarea readonly id="note"></textarea></div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Дополнительно" id='MoreInfoControlContacts' /></div>
    <div class="al-row-column"><input type="button" value="Новый контакт" id='NewControlContacts' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='ReloadControlContacts' /></div>
    <div style="clear: both"></div>
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
