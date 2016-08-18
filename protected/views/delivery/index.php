<script type="text/javascript">
    $(document).ready(function(){
        var DeliveryDemand = {};
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        DataEmployees.dataBind();
        var EmployeesRecords = DataEmployees.records;
        var DataStreets = new $.jqx.dataAdapter(Sources.SourceStreets);
        
        var DeliveryDemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.DeliveryDemandsSource, {
            filter: function () {
                $("#DeliveryDemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#DeliveryDemandsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        $("#cmbExecutor").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: 'Выберите исполнителя', source: EmployeesRecords, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edNoAccept").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 200}));
        $("#edNoExec").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 200}));
        $("#edExec").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 200}));
        $("#edNumber").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '120px', height: '25px', decimalDigits: 0 }));
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null}));
        $("#edDeliveryMan").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: 'Выберите курьера', source: EmployeesRecords, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edStreet").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStreets, width: '290', height: '25px', displayMember: "StreetName", valueMember: "Street_id"}));
        $("#edHouse").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100}));
        $("#edContactInfo").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 300}));
        $("#edText").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: 306}));
        $("#edDelivery").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 300}));
        $("#edNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: 306}));
        $('#btnAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnUndoAccept').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 160, height: 30 }));
        $('#btnPrint').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
        $('#btnInfo').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 160, height: 30 }));
        $('#btnNew').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnUndoExec').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 160, height: 30 }));
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
        // Привязка фильтров к гриду
        GridFilters.AddControlFilter('cmbExecutor', 'jqxComboBox', 'DeliveryDemandsGrid', 'mstr_id', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('edNoAccept', 'jqxCheckBox', 'DeliveryDemandsGrid', 'date_logist', 'datefilter', 1, 'NULL', true);
        GridFilters.AddControlFilter('edNoExec', 'jqxCheckBox', 'DeliveryDemandsGrid', 'date_delivery', 'datefilter', 1, 'NULL', true);
        GridFilters.AddControlFilter('edExec', 'jqxCheckBox', 'DeliveryDemandsGrid', 'date_delivery', 'datefilter', 1, 'NOT_NULL', true);
        GridFilters.AddControlFilter('edNumber', 'jqxComboBox', 'DeliveryDemandsGrid', 'dldm_id', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('edDate', 'jqxDateTimeInput', 'DeliveryDemandsGrid', 'date', 'datefilter', 1, 'DATE_EQUAL', true);
        GridFilters.AddControlFilter('edDeliveryMan', 'jqxComboBox', 'DeliveryDemandsGrid', 'empl_dlvr_id', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('edStreet', 'jqxComboBox', 'DeliveryDemandsGrid', 'street_id', 'numericfilter', 1, 'EQUAL', true);
        GridFilters.AddControlFilter('edHouse', 'jqxInput', 'DeliveryDemandsGrid', 'house', 'stringfilter', 1, 'STARTS_WITH', true);
        
        $("#DeliveryDemandsGrid").on('rowselect', function (event) {
            DeliveryDemand = $('#DeliveryDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (DeliveryDemand != undefined) {
                if (DeliveryDemand.contact_info != undefined)
                    $("#edContactInfo").jqxInput('val', DeliveryDemand.contact_info);
                if (DeliveryDemand.text != undefined)
                    $("#edText").jqxTextArea('val', DeliveryDemand.text);
                if (DeliveryDemand.DeliveryMan != undefined)
                    $("#edDelivery").jqxInput('val', DeliveryDemand.DeliveryMan);
                if (DeliveryDemand.note != undefined)
                    $("#edNote").jqxTextArea('val', DeliveryDemand.note);
            }
            
            $('#btnAccept').jqxButton({disabled: ((DeliveryDemand == undefined) || (DeliveryDemand.date_logist != null))});
            $('#btnUndoAccept').jqxButton({disabled: ((DeliveryDemand == undefined) || (DeliveryDemand.date_logist == null))});
            $('#btnPrint').jqxButton({disabled: (DeliveryDemand == undefined)});
            $('#btnInfo').jqxButton({disabled: (DeliveryDemand == undefined)});
            $('#btnUndoExec').jqxButton({disabled: ((DeliveryDemand == undefined) || (DeliveryDemand.date_delivery == null))});
        });
        
        $("#DeliveryDemandsGrid").on('bindingcomplete', function(){
            $("#DeliveryDemandsGrid").jqxGrid('selectrow', 0);
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
        
        $('#EditDeliveryDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '460px', width: '740'}));
        $('#EditDeliveryDemandDialog').jqxWindow({initContent: function() {
            $('#btnDeliveryDemOk').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
            $('#btnDeliveryDemCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            
            $('#btnDeliveryDemCancel').on('click', function(){
                $('#EditDeliveryDemandDialog').jqxWindow('close');
            });
            
            $('#btnDeliveryDemOk').on('click', function(){
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl('Delivery/Insert'); ?>',
                    type: 'POST',
                    data: $('#DeliveryDemands').serialize(),
                    success: function(Res) {
                        if (Res == '1') {
                            $('#EditDeliveryDemandDialog').jqxWindow('close');
                            $("#DeliveryDemandsGrid").jqxGrid('updatebounddata');
                        }
                        else
                            $('#BodyDeliveryDemDialog').html(Res);
                    }
                });
            });
        }});
        
        LoadEditForm = function(Url, Data, Type) {
            $.ajax({
                url: Url,
                type: Type,
                data: Data,
                async: false,
                success: function(Res) {
                    $('#BodyDeliveryDemDialog').html(Res);
                }
            });
        };
        
        $('#EditDeliveryDemandDialog').on('open', function (event) {
            $('#btnDeliveryDemOk').jqxButton({disabled: true});
        }); 
        
        $('#btnNew').on('click', function(){
            LoadEditForm('<?php echo Yii::app()->createUrl('Delivery/Insert'); ?>', null, 'POST');
            $('#EditDeliveryDemandDialog').jqxWindow('open');
        });
        
        $("#DeliveryDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 300,
                width: '100%',
                showfilterrow: true,
                autoshowfiltericon: true,
                source: DeliveryDemandsAdapter,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize:200,
                virtualmode: true,
                columns:
                    [
                        { text: 'Номер', datafield: 'dldm_id', width: 60 },
                        { text: 'Вид доставок', columntype: 'textbox', filtercondition: 'CONTAINS', datafield: 'DeliveryType', width: 100 },
                        { text: 'Дата', filtertype: 'date', datafield: 'date', filtercondition: 'DATE_EQUAL', cellsformat: 'dd.MM.yyyy HH:mm', width: 130 },
                        { text: 'Мастер', datafield: 'MasterName', filterable: false, sortable: false, width: 150 },
                        { text: 'Подал', datafield: 'user_sender_name', filterable: false, sortable: false, width: 150 },
                        { text: 'Приоритет', datafield: 'DemandPrior', width: 100 },
                        { text: 'Предельная дата', datafield: 'deadline', filtertype: 'date', filtercondition: 'DATE_EQUAL', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Желаемая дата', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'bestdate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Адрес', datafield: 'Addr', width: 260 },
                        { text: 'Принял', datafield: 'user_logist_name', filterable: false, sortable: false, width: 150 },
                        { text: 'Дата принятия', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'date_logist', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'План. дата', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'plandate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Дата вып.', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'date_delivery', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Просрочено', datafield: 'overday', width: 100 },
                        { text: 'Обещанная дата', filtertype: 'date', filtercondition: 'DATE_EQUAL', datafield: 'date_promise', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Заявка', datafield: 'dmnd_id', width: 100 },
                        { text: 'Курьер', datafield: 'DeliveryMan', width: 150 },
                        { text: 'mstr_id', datafield: 'mstr_id', width: 120, hidden: true },
                        { text: 'empl_dlvr_id', datafield: 'empl_dlvr_id', width: 120, hidden: true },
                        { text: 'street_id', datafield: 'street_id', width: 120, hidden: true },
                        { text: 'street_id', datafield: 'house', width: 120, hidden: true },
                    ],
                }));
        });
        
        
</script>    

<?php $this->setPageTitle('Заявки на доставку') ?>

<div class="row">
    <div class="row-column">
        <div class="row" style="padding: 0px; margin: 0px;">
            <div class="row-column">
                <div class="row" style="padding: 0px; margin: 0px;">
                    <div class="row-column"><div id='cmbExecutor'></div></div>
                </div>
                <div class="row" style="border: 1px solid #e0e0e0;">
                    <div class="row-column">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id='edNoAccept'>Непринятые заявки</div></div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id='edNoExec'>Невыполненные заявки</div></div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id='edExec'>Выполненные заявки</div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-column" style="border: 1px solid #e0e0e0; height: 118px">
                <div class="row" style="margin: 0px;">
                    <div class="row-column" style="">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;">Номер</div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id="edNumber"></div></div>
                        </div>
                    </div>
                    <div class="row-column" style="">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;">Дата</div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id="edDate"></div></div>
                        </div>
                    </div>
                    <div class="row-column" style="">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;">Курьер</div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id="edDeliveryMan"></div></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row-column" style="">Улица</div>
                    <div class="row-column" style=""><div id="edStreet"></div></div>
                    <div class="row-column" style="">Дом</div>
                    <div class="row-column" style=""><input id="edHouse" type="text" /></div>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="row">
    <div id="DeliveryDemandsGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column">
        <div>Контактное лицо\Телефон мастера</div>
        <div><input id="edContactInfo" type="text" /></div>
        <div>Содержание заявки</div>
        <div><textarea id="edText"></textarea></div>
    </div>
    <div class="row-column">
        <div>Курьер</div>
        <div><input id="edDelivery" type="text" /></div>
        <div>Отчет курьера</div>
        <div><textarea id="edNote"></textarea></div>
    </div>
    <div class="row-column">
        <div class="row" style="width: 500px;">
            <div class="row-column"><input type="button" value="Принять" id='btnAccept' /></div>
            <div class="row-column"><input type="button" value="Отмена принятия" id='btnUndoAccept' /></div>
            <div class="row-column" style="float: right"><input type="button" value="Печать" id='btnPrint' /></div>
        </div>
        <div class="row" style="width: 500px;">
            <div class="row-column"><input type="button" value="Дополнительно" id='btnInfo' /></div>
            <div class="row-column"><input type="button" value="Новая заявка" id='btnNew' /></div>
            <div class="row-column" style="float: right"><input type="button" value="Снять выполнение" id='btnUndoExec' /></div>
        </div>
        <div class="row" style="width: 500px;">
            <div class="row-column"><input type="button" value="Обновить" id='btnRefresh' /></div>
        </div>
    </div>
</div>
<div id="EditDeliveryDemandDialog">
    <div id="DeliveryDemandDialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="/* overflow: hidden; */padding: 10px;" id="DialogDeliveryContent">
        <div style="/*overflow: hidden;*/" id="BodyDeliveryDemDialog"></div>
        <div id="BottomDeliveryDemDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnDeliveryDemOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnDeliveryDemCancel' /></div>
            </div>
        </div>
    </div>
</div>