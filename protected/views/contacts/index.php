<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var Contacts = {
            ObjectGr_id: '<?php echo $ObjectGr_id; ?>',
            text: <?php echo json_encode($model->text); ?>,
            rslt_name: '<?php echo $model->rslt_name; ?>',
            note: <?php echo json_encode($model->note); ?>,
            drsn_name: '<?php echo $model->drsn_name; ?>',
            pay_date: '<?php echo $model->pay_date; ?>',
        };
            
        var ContactsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.Contacts, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.ObjectGr_id = " + Contacts.ObjectGr_id],
                });
                return data;
            },
        });
            
        $("#ContactsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '100%',
                height: '300',
                source: ContactsDataAdapter,
                columns: [
                    { text: 'Отдел', columngroup: 'Current', dataField: 'GroupContact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                    { text: 'Тема', columngroup: 'Current', dataField: 'Kind_Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Источник', columngroup: 'Current', dataField: 'sourceInfo_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Дата', columngroup: 'Current', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Тип', columngroup: 'Current', dataField: 'cntp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Контактное лицо', columngroup: 'Current', dataField: 'contact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 300 },
                    { text: 'Сотрудник', columngroup: 'Current', dataField: 'empl_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Создал', columngroup: 'Current', dataField: 'UserCreateName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Дата', columngroup: 'Next', dataField: 'next_date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Тип', columngroup: 'Next', dataField: 'next_cntp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Контактное лицо', columngroup: 'Next', dataField: 'next_contact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 300 },
                ],
                columngroups: 
                [
                    { text: '', align: 'center', name: 'Current' },
                    { text: 'Следующий контакт', align: 'center', name: 'Next' },
                ]
            })
        );
        
        $("#textField").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 450 }));
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 450 }));
        $("#drsn_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 370 }));
        $("#rslt_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 370 }));
        $("#pay_date").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
        
        $('#EditContactDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '770', width: '840'}));
        
        $('#EditContactDialog').jqxWindow({initContent: function() {
            $("#btnContactOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnNotReach").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnClientInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
            $("#btnContactCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#btnContactCancel").on('click', function () {
            $('#EditContactDialog').jqxWindow('close');
        });
        
        SendForm = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('Contacts/Insert');?>";
            if (Mode == 'Edit')
                Url = "<?php echo Yii::app()->createUrl('Contacts/Update');?>";
            
            var Data;
            if (Form == undefined)
                Data = $('#Contacts').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditContactDialog').jqxWindow('close');
                        $("#ContactsGrid").jqxGrid('updatebounddata');
//                        $('#ContactsGrid').jqxGrid({source: LoadData(ContactsDataAdapter)});
                    } else {
                        $('#BodyContactDialog').html(Res);
                    }

                }
            });
        }

        $("#btnContactOk").on('click', function () {
            SendForm(Mode);
        });

        $("#btnNotReach").on('click', function () {
            if(Mode == 'Insert') {
                $("#ContactTypes").jqxComboBox('val', '11');
                $("#textField2").jqxTextArea('val', 'Недозвон');
                SendForm(Mode);
            }
        });

        $("#btnClientInfo").on('click', function () {
            window.open('/index.php?r=ObjectsGroup/Index&ObjectGr_id=' + Contacts.ObjectGr_id);
        });
            
        
        $("#NewContact").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditContact").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#btnReload").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContact").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                
        $("#ContactsGrid").on('rowselect', function (event) {
            var Temp = $('#ContactsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
//            console.log(CurrentRowData.cont_id);
            
            if (CurrentRowData.text != '') $("#textField").jqxTextArea('val', CurrentRowData.text);
            if (CurrentRowData.rslt_name != '') $("#rslt_name").jqxInput('val', CurrentRowData.rslt_name);
            if (CurrentRowData.note != '') $("#note").jqxTextArea('val', CurrentRowData.note);
            if (CurrentRowData.drsn_name != '') $("#drsn_name").jqxInput('val', CurrentRowData.drsn_name);
            if (CurrentRowData.pay_date != '') $("#pay_date").jqxInput('val', CurrentRowData.pay_date);
        });
        
        var LoadFormInsert = function(ObjectGr_id) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Contacts/Insert');?>",
                type: 'POST',
                async: false,
                data: {
                    ObjectGr_id: ObjectGr_id
                },
                success: function(Res) {
                    $('#BodyContactDialog').html(Res);
                }
            });
        };
        
        var LoadFormUpdate = function(cont_id) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('Contacts/Update');?>",
                type: 'POST',
                async: false,
                data: {
                    cont_id: cont_id
                },
                success: function(Res) {
                    $('#BodyContactDialog').html(Res);
                }
            });
        };
   
        
        $('#ContactsGrid').on('rowdoubleclick', function (event) { 
            $("#EditContact").click();
        });
        
        $("#NewContact").on('click', function () 
        {
            Mode = 'Insert';
            LoadFormInsert(Contacts.ObjectGr_id);
            $('#EditContactDialog').jqxWindow('open');
        });
        
        $("#EditContact").on('click', function ()
        {
            Mode = 'Edit';
            LoadFormUpdate(CurrentRowData.cont_id);
            $('#EditContactDialog').jqxWindow('open');
        });
        
        $("#btnReload").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Contacts/Index",
                success: function(){
                    $("#ContactsGrid").jqxGrid('updatebounddata');
                    $("#ContactsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
           
        $("#DelContact").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Contacts/Delete",
                data: { cont_id: CurrentRowData.cont_id },
                success: function(){
                    $("#ContactsGrid").jqxGrid('updatebounddata');
                    $("#ContactsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
    });
    
        
</script>


<div class="row">
    <div id="ContactsGrid" class="jqxGridAliton"></div>
</div>
<div class="row"  style="margin: 0;">
    <div class="row-column">
        <div class="row">Содержание: <textarea readonly id="textField" name="Contacts[text]"></textarea></div>
        <div class="row">Примечание: <textarea readonly id="note" name="Contacts[note]"></textarea></div>
    </div>   

    <div class="row-column">
        <div class="row">Причина долга: <br><input readonly id="drsn_name" name="Contacts[drsn_name]" type="text"></div>
        <div class="row">Результат: <br><input readonly id="rslt_name" name="Contacts[rslt_name]" type="text"></div>
        <div class="row">Дата согласованной оплаты: <br><input readonly id='pay_date' name="Contacts[pay_date]" type="text"></div> 
    </div>
</div>
    
<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewContact' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditContact' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnReload' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelContact' /></div>
</div>


<div id="EditContactDialog">
    <div id="DialogContactHeader">
        <span id="HeaderContactText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow-x: hidden; padding: 20px 30px 10px; background-color: #F2F2F2;" id="DialogContactContent">
        <div style="" id="BodyContactDialog"></div>
        <div id="BottomContactDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnContactOk' /></div>
                <div class="row-column"><input type="button" value="Недозвон" id='btnNotReach' /></div>
                <div class="row-column"><input type="button" value="Карточка клиента" id='btnClientInfo' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnContactCancel' /></div>
            </div>
        </div>
    </div>
</div>