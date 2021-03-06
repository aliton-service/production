<script type="text/javascript">
    var Dldm_id = 0;
    $(document).ready(function(){
        var DeliveryDemand = {};
        
        $("#edContactInfo").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 'calc(100% - 6px)'}));
        $("#edText").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", height: 50, width: 'calc(100% - 2px)'}));
        $("#edDelivery").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 'calc(100% - 6px)'}));
        $("#edNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", height: 50, width: 'calc(100% - 2px)'}));
        $('#btnAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnUndoAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnPrint').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnInfo').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnNew').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnUndoExec').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnPrint').on('click', function(){
            
            window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                'ReportName' => '/Заявки на доставку/Заявка на доставку',
                'Ajax' => false,
                'Render' => true,
            ))); ?> + '&Parameters[Dldm_id]=' + DeliveryDemand.dldm_id);
        });
        $('#btnAccept').on('click', function(){
            $.ajax({
                url: '<?php echo Yii::app()->createUrl('Delivery/ToLogist')?>',
                data: {Dldm_id: DeliveryDemand.dldm_id},
                type: 'POST',
                async: false,
                success: function(Res) {
                    if (Res == '1')
                        $("#DeliveryDemandsGrid").jqxGrid('updatebounddata');
                }
            });
        });
        $('#btnUndoExec').on('click', function(){
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl('Delivery/UndoExec')?>',
                    data: {Dldm_id: DeliveryDemand.dldm_id},
                    type: 'POST',
                    async: false,
                    success: function(Res) {
                        $("#DeliveryDemandsGrid").jqxGrid('updatebounddata');
                    }
                });
        });
        
        
        GetComments = function(Dldm_id) {
            if (Dldm_id == DeliveryDemand.dldm_id) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Delivery/GetComments')); ?>,
                    type: 'POST',
                    async: true,
                    data: {
                        Dldm_id: DeliveryDemand.dldm_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#edNote").val(Res);
                    }
                });
            }
        };
        
        $("#DeliveryDemandsGrid").on('rowselect', function (event) {
            DeliveryDemand = $('#DeliveryDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (DeliveryDemand != undefined) {
                if (DeliveryDemand.contact_info != undefined)
                    $("#edContactInfo").jqxInput('val', DeliveryDemand.contact_info);
                if (DeliveryDemand.text != undefined)
                    $("#edText").jqxTextArea('val', DeliveryDemand.text);
                if (DeliveryDemand.DeliveryMan != undefined)
                    $("#edDelivery").jqxInput('val', DeliveryDemand.DeliveryMan);
//                if (DeliveryDemand.note != undefined)
//                    $("#edNote").jqxTextArea('val', DeliveryDemand.note);
                window.setTimeout("GetComments(" + DeliveryDemand.dldm_id + ")", 600);
            }
            
            $('#btnAccept').jqxButton({disabled: ((DeliveryDemand == undefined) || (DeliveryDemand.date_logist != null))});
            $('#btnUndoAccept').jqxButton({disabled: ((DeliveryDemand == undefined) || (DeliveryDemand.date_logist == null))});
            $('#btnPrint').jqxButton({disabled: (DeliveryDemand == undefined)});
            $('#btnInfo').jqxButton({disabled: (DeliveryDemand == undefined)});
            $('#btnUndoExec').jqxButton({disabled: ((DeliveryDemand == undefined) || (DeliveryDemand.date_delivery == null))});
        });
        
        $("#DeliveryDemandsGrid").on("bindingcomplete", function (event) {
            if (Dldm_id != 0)
                Aliton.SelectRowByIdVirtual('dldm_id', Dldm_id, '#DeliveryDemandsGrid', false);
            else if (DeliveryDemand != undefined) 
                Aliton.SelectRowByIdVirtual('dldm_id', DeliveryDemand.dldm_id, '#DeliveryDemandsGrid', false);
            else
                Aliton.SelectRowByIdVirtual('dldm_id', null, '#DeliveryDemandsGrid', false);
        });
        
        $('#btnRefresh').on('click', function(){
            $("#DeliveryDemandsGrid").jqxGrid('updatebounddata');
        });
        
        $('#btnInfo').on('click', function(){
            window.open('/index.php?r=Delivery/View&Dldm_id=' + DeliveryDemand.dldm_id);
        });
        
        $('#DeliveryDemandsGrid').on('rowdoubleclick', function (event) { 
            $('#btnInfo').click();
        });
        
        $('#EditDeliveryDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '510px', width: '830'}));
        
        LoadEditForm = function(Url, Data, Type) {
            $.ajax({
                url: Url,
                type: Type,
                data: Data,
                async: true,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $('#BodyDeliveryDemDialog').html(Res.html);
                    $('#EditDeliveryDemandDialog').jqxWindow('open');
                }
            });
        };
        
        $('#EditDeliveryDemandDialog').on('open', function (event) {
//            $('#btnDeliveryDemOk').jqxButton({disabled: true});
        }); 
        
        $('#btnNew').on('click', function(){
            LoadEditForm('<?php echo Yii::app()->createUrl('Delivery/Insert'); ?>', null, 'POST');
            
        });
        
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        DataEmployees.dataBind();
        var EmployeesFilters = [];
        for (var i = 0; i < DataEmployees.records.length; i++)
            EmployeesFilters.push({
                label: DataEmployees.records[i].ShortName,
                value: DataEmployees.records[i].Employee_id,
            });
        
        var EmployeesFiltersSource =
        {
             datatype: "array",
             datafields: [
                 { name: 'label', type: 'string' },
                 { name: 'value', type: 'int' }
             ],
             localdata: EmployeesFilters
        };
        
        $('#DeliveryDemandsGrid').on("columnreordered", function (event) { 
            GridState.SaveGridSettings('DeliveryDemandsGrid', 'Delivery_DeliveryDemandsGrid');
        });
        $('#DeliveryDemandsGrid').on("columnresized", function (event) {
            GridState.SaveGridSettings('DeliveryDemandsGrid', 'Delivery_DeliveryDemandsGrid');
        });
        
        var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
                        var Temp = $('#DeliveryDemandsGrid').jqxGrid('getrowdata', row);
                        var column = $("#DeliveryDemandsGrid").jqxGrid('getcolumn', columnfield);
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
                        if (parseInt(Temp["overday"]) > 0)
                            return '<span class="backlight_red" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
                        else if ((Temp["DemandPrior"] == "Срочная") || (Temp["DemandPrior"] == "Аварийная")) 
                            return '<span class="backlight_pink" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
                    }
        
        $("#DeliveryDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 'calc(100% - 2px)',
                width: 'calc(100% - 2px)',
                showfilterrow: false,
                autoshowfiltericon: true,
                //source: DeliveryDemandsAdapter,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize:200,
                ready: function() {
                    var State = $('#DeliveryDemandsGrid').jqxGrid('getstate');
                    var Columns = GridState.LoadGridSettings('#DeliveryDemandsGrid', 'Delivery_DeliveryDemandsGrid');
                    $.extend(true, State.columns, Columns);
                    $('#DeliveryDemandsGrid').jqxGrid('loadstate', State);    
                },
                virtualmode: true,
                columns:
                    [
                        { text: 'Номер', datafield: 'dldm_id', width: 60, cellsrenderer: cellsrenderer },
                        { text: 'Вид доставок', columntype: 'textbox', filtercondition: 'CONTAINS', datafield: 'DeliveryType', width: 100, cellsrenderer: cellsrenderer },
                        { text: 'Дата', filtertype: 'date', datafield: 'date', filtercondition: 'DATE_EQUAL', cellsformat: 'dd.MM.yyyy HH:mm', width: 130, cellsrenderer: cellsrenderer },
                        { text: 'Мастер', datafield: 'MasterName', filtertype: 'list', filteritems: new $.jqx.dataAdapter(EmployeesFiltersSource),
                                                                            createfilterwidget: function (column, htmlElement, editor) {
                                                                                editor.jqxDropDownList({ displayMember: "label", valueMember: "value" });
                                                                            }, sortable: true, width: 150, cellsrenderer: cellsrenderer},
                        { text: 'Подал', datafield: 'user_sender_name', filtertype: 'list', filteritems: new $.jqx.dataAdapter(EmployeesFiltersSource),
                                                                            createfilterwidget: function (column, htmlElement, editor) {
                                                                                editor.jqxDropDownList({ displayMember: "label", valueMember: "value" });
                                                                            }, width: 150, cellsrenderer: cellsrenderer },
                        { text: 'Приоритет', datafield: 'DemandPrior', width: 100, cellsrenderer: cellsrenderer },
                        { text: 'Предельная дата', datafield: 'deadline', filtertype: 'date', filtercondition: 'DATE_EQUAL', width: 130, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Желаемая дата', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'bestdate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Адрес', datafield: 'Addr', width: 260, cellsrenderer: cellsrenderer },
                        { text: 'Принял', datafield: 'user_logist_name', filterable: false, sortable: false, width: 150, cellsrenderer: cellsrenderer },
                        { text: 'Дата принятия', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'date_logist', width: 130, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'План. дата', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'plandate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Дата вып.', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'date_delivery', width: 130, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Просрочено', datafield: 'overday', width: 100, cellsrenderer: cellsrenderer },
                        { text: 'Обещанная дата', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'date_promise', width: 130, cellsformat: 'dd.MM.yyyy HH:mm', cellsrenderer: cellsrenderer },
                        { text: 'Заявка', datafield: 'dmnd_id', width: 100, cellsrenderer: cellsrenderer },
                        { text: 'Курьер', datafield: 'DeliveryMan', width: 150, cellsrenderer: cellsrenderer },
                        { text: 'mstr_id', datafield: 'mstr_id', width: 120, hidden: true },
                        { text: 'empl_dlvr_id', datafield: 'empl_dlvr_id', width: 120, hidden: true },
                        { text: 'street_id', datafield: 'street_id', width: 120, hidden: true },
                        { text: 'street_id', datafield: 'house', width: 120, hidden: true },
                    ],
                }));
        });
        
        
</script>    

<style>
    .backlight_pink {
        color: #E000E0;
    }
    .backlight_red {
        color: #FF0000;
    }
</style> 

<?php $this->setPageTitle('Заявки на доставку') ?>

<div class="al-row" style="height: calc(100% - 175px)">
    <div id="DeliveryDemandsGrid" class="jqxGridAliton"></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 50%">
        <div style="width: 100%">Контактное лицо\Телефон мастера</div>
        <div style="width: 100%"><input id="edContactInfo" type="text" /></div>
        <div style="width: 100%">Содержание заявки</div>
        <div style="width: 100%"><textarea id="edText"></textarea></div>
    </div>
    <div class="al-row-column" style="width: calc(50% - 12px)">
        <div style="width: 100%">Курьер</div>
        <div style="width: 100%"><input id="edDelivery" type="text" /></div>
        <div style="width: 100%">Отчет курьера</div>
        <div style="width: 100%"><textarea id="edNote"></textarea></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Принять" id='btnAccept' /></div>
    <div class="al-row-column"><input type="button" value="Отмена прин." id='btnUndoAccept' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Печать" id='btnPrint' /></div>
    <div class="al-row-column"><input type="button" value="Доп-но" id='btnInfo' /></div>
    <div class="al-row-column"><input type="button" value="Новая заявка" id='btnNew' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Снять вып." id='btnUndoExec' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefresh' /></div>
    <div style="clear: both"></div>
</div>

<div id="EditDeliveryDemandDialog" style="display: none;">
    <div id="DeliveryDemandDialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="/* overflow: hidden; */padding: 10px;" id="DialogDeliveryContent">
        <div style="/*overflow: hidden;*/" id="BodyDeliveryDemDialog"></div>
    </div>
</div>