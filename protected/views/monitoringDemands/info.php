<script type="text/javascript">
    $(document).ready(function () {
        
        var CurrentRowData;
        
        var MonitoringDemands2 = {
            mndm_id: <?php echo json_encode($model->mndm_id); ?>,
            Prior: <?php echo json_encode($model->DemandPrior); ?>,
            Description: <?php echo json_encode($model->Note); ?>,
            EmplNameAccept: <?php echo json_encode($model->EmplNameAccept); ?>,
            UserName: <?php echo json_encode($model->UserName); ?>,
            UserChange2: <?php echo json_encode($model->UserChange2); ?>,
            Deadline: Aliton.DateConvertToJs('<?php echo $model->Deadline; ?>'),
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            DateAccept: Aliton.DateConvertToJs('<?php echo $model->DateAccept; ?>'),
            WishDate: Aliton.DateConvertToJs('<?php echo $model->WishDate; ?>'),
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
        };
        

        $("#mndm_id2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Date2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#Prior2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#Deadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#WishDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#DateAccept").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#DateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
        $("#Description2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)' }));
        
        
        $('#EditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '320px', width: '640'}));
        
        $('#EditDialog').jqxWindow({initContent: function() {
//            $("#btnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
//            $("#btnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#btnCancel").on('click', function () {
            $('#EditDialog').jqxWindow('close');
        });
        
        var SendForm = function() {
            var Data = $('#MonitoringDemands').serialize();
                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Update');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialog').jqxWindow('close');
                        location.reload();
                    } else {
                        $('#BodyDialog').html(Res);
                    }
                }
            });
        };

        $("#btnOk").on('click', function () {
            SendForm();
        });
        
        $("#EditMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
        $("#btnPrint").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        var LoadFormUpdate = function() {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Update');?>",
                type: 'POST',
                async: false,
                data: { mndm_id: MonitoringDemands2.mndm_id },
                success: function(Res) {
                    $('#BodyDialog').html(Res);
                }
            });
        };
        
        $("#EditMonitoringDemands").on('click', function () 
        {
            $('#EditDialog').jqxWindow('open');
            LoadFormUpdate();
        });
        
        
        
        var MonitoringDemandDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemandDetails, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["m.mndm_id = " + MonitoringDemands2.mndm_id],
                });
                return data;
            },
        });
        
        $("#MonitoringDemandDetailsGrid").on('bindingcomplete', function(){
            $('#MonitoringDemandDetailsGrid').jqxGrid('selectrow', 0);
        });
        
        $("#MonitoringDemandDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: MonitoringDemandDetailsDataAdapter,
                columns: [
                    { text: 'equip_id', dataField: 'equip_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 80, hidden: true },
                    { text: 'Оборудование', dataField: 'EquipName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 300 },
                    { text: 'Ед.изм.', dataField: 'NameUnitMeasurement', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 60 },
                    { text: 'Кол-во', dataField: 'quant', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 60 },
                    { text: 'Себестоимость', dataField: 'price_low', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Цена для клиента', dataField: 'price_high', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                ]
            })
        );
        
        $("#MonitoringDemandDetailsGrid").on('rowselect', function (event) {
            var Temp = $('#MonitoringDemandDetailsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null;}
//            console.log(CurrentRowData);
        });
        
    
        $('#EditDialogMDDetails').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '230px', width: '640'}));
        
        $('#EditDialogMDDetails').jqxWindow({initContent: function() {
            $("#btnOkMDDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnCancelMDDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#btnCancelMDDetails").on('click', function () {
            $('#EditDialogMDDetails').jqxWindow('close');
        });
        
        var SendFormMDDetails = function(Mode) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('MonitoringDemandDetails/Insert');?>";
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('MonitoringDemandDetails/Update'); ?>";
            }
            
            var Data = $('#MonitoringDemandDetails').serialize();
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogMDDetails').jqxWindow('close');
                        $("#MonitoringDemandDetailsGrid").jqxGrid('updatebounddata');
//                        $("#MonitoringDemandDetailsGrid").jqxGrid('selectrow', 0);
                    } else {
                        $('#BodyDialogMDDetails').html(Res);
                    }
                }
            });
        };

        $("#btnOkMDDetails").on('click', function () {
            SendFormMDDetails(Mode);
        });
        
        $("#NewMonitoringDemandDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditMonitoringDemandDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelMonitoringDemandDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadMonitoringDemandDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#AddPriceMonitoringDemandDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 250 }));
        $("#btnExport").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnExport').on('click', function() {
            $("#MonitoringDemandDetailsGrid").jqxGrid('exportdata', 'xls', 'Позиции мониторинга', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
        });
//        $("#MonitoringDemandDetailsGrid").jqxGrid('selectrow', 0);
        
        $('#MonitoringDemandDetailsGrid').on('rowdoubleclick', function () { 
            $("#EditMonitoringDemandDetails").click();
        });
        
            
        var LoadFormMDDetails = function(Mode) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('MonitoringDemandDetails/Insert'); ?>";
                Data = { mndm_id: MonitoringDemands2.mndm_id };
            }
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('MonitoringDemandDetails/Update'); ?>";
                Data = { mndt_id: CurrentRowData.mndt_id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#BodyDialogMDDetails').html(Res);
                }
            });
        };

        
        $("#NewMonitoringDemandDetails").on('click', function () 
        {
            Mode = 'Insert';
            LoadFormMDDetails(Mode);
            $('#EditDialogMDDetails').jqxWindow('open');
        });
        
        $("#EditMonitoringDemandDetails").on('click', function () 
        {
            Mode = 'Update';
            LoadFormMDDetails(Mode);
            $('#EditDialogMDDetails').jqxWindow('open');
        });
        
        $("#DelMonitoringDemandDetails").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=MonitoringDemandDetails/Delete",
                data: { mndt_id: CurrentRowData.mndt_id },
                success: function(){
                    $("#MonitoringDemandDetailsGrid").jqxGrid('updatebounddata');
//                    $("#MonitoringDemandDetailsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        $("#ReloadMonitoringDemandDetails").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=MonitoringDemands/Index",
                success: function(){
                    $("#MonitoringDemandDetailsGrid").jqxGrid('updatebounddata');
//                    $("#MonitoringDemandDetailsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        $('#EditDialogAddPrice').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '360px', width: '640'}));
        
//        $('#EditDialogAddPrice').jqxWindow({initContent: function() {
//            $("#btnOkAddPrice").jqxButton($.extend(true, {}, ButtonDefaultSettings));
//            $("#btnCancelAddPrice").jqxButton($.extend(true, {}, ButtonDefaultSettings));
//        }});
        
        $("#btnOkAddPrice").on('click', function () {
            var Data = $('#PriceMonitoring').serialize();
                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('PriceMonitoring/Create');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogAddPrice').jqxWindow('close');
                    } else {
                        $('#BodyDialogAddPrice').html(Res);
                    }
                }
            });
        });

        $("#btnCancelAddPrice").on('click', function () {
            $('#EditDialogAddPrice').jqxWindow('close');
        });
        
        $("#AddPriceMonitoringDemandDetails").on('click', function ()
        {
            if(CurrentRowData !== null) {
                $('#EditDialogAddPrice').jqxWindow('open');
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('PriceMonitoring/Create')); ?>,
                    type: 'POST',
                    async: false,
                    data: { 
                        Params: {
                            eqip_id: CurrentRowData.equip_id,
                            mndm_id: MonitoringDemands2.mndm_id
                        }
                    },
                    success: function(Res){
                        Res = JSON.parse(Res);
                        $('#BodyDialogAddPrice').html(Res.html);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                    }
                });
            }
        });
        
        
        $("#btnAcceptEmployeeName").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        if(MonitoringDemands2.EmplNameAccept !== '' &&  MonitoringDemands2.EmplNameAccept !== null) { $('#btnAcceptEmployeeName').jqxButton({disabled: true }); }
        
        $("#btnExecute").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        if(MonitoringDemands2.EmplNameAccept === '' || MonitoringDemands2.DateExec !== null) {
            $('#btnExecute').jqxButton({disabled: true });
        }
        else if(MonitoringDemands2.EmplNameAccept !== '' && MonitoringDemands2.DateExec === null) {
            $('#btnExecute').jqxButton({disabled: false });
        } 
        
        $("#AcceptEmployeeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#CreateEmployeeName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        
        
        $("#btnAcceptEmployeeName").on('click', function () {                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Accept');?>",
                type: 'POST',
                async: false,
                data: { mndm_id: MonitoringDemands2.mndm_id },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        $('#AcceptEmployeeName').jqxInput('val', <?php echo json_encode(Yii::app()->user->fullname); ?>);
                        $('#btnAcceptEmployeeName').jqxButton({disabled: true });
                        $('#btnExecute').jqxButton({disabled: false });
                        $("#DateAccept").jqxDateTimeInput('val', new Date());
                    } else {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], 'Ошибка');
                        $('#btnAcceptEmployeeName').jqxButton({disabled: true });
                    }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $("#btnExecute").on('click', function () {                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Execute');?>",
                type: 'POST',
                async: false,
                data: { mndm_id: MonitoringDemands2.mndm_id },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        $('#btnExecute').jqxButton({disabled: true });
                        $("#DateExec").jqxDateTimeInput('val', new Date());
                    } else
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], 'Ошибка, возможно заявка не принята');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
                
            });
        });
        
        if (MonitoringDemands2.mndm_id != '') $("#mndm_id2").jqxInput('val', MonitoringDemands2.mndm_id);
        if (MonitoringDemands2.Date != '') $("#Date2").jqxDateTimeInput('val', MonitoringDemands2.Date);
        if (MonitoringDemands2.Prior != '') $("#Prior2").jqxInput('val', MonitoringDemands2.Prior);
        if (MonitoringDemands2.Deadline != '') $("#Deadline").jqxDateTimeInput('val', MonitoringDemands2.Deadline);
        if (MonitoringDemands2.WishDate != '') $("#WishDate").jqxDateTimeInput('val', MonitoringDemands2.WishDate);
        if (MonitoringDemands2.DateAccept != '') $("#DateAccept").jqxDateTimeInput('val', MonitoringDemands2.DateAccept);
        if (MonitoringDemands2.DateExec != '') $("#DateExec").jqxDateTimeInput('val', MonitoringDemands2.DateExec);
        if (MonitoringDemands2.Description != '') $("#Description2").jqxTextArea('val', MonitoringDemands2.Description);
        
        if (MonitoringDemands2.EmplNameAccept != '') $("#AcceptEmployeeName").jqxInput('val', MonitoringDemands2.EmplNameAccept);
        if (MonitoringDemands2.UserName != '') $("#CreateEmployeeName").jqxInput('val', MonitoringDemands2.UserName);
        
        
    });
    
</script>

<?php $this->setPageTitle('Заявка на мониторинг'); ?>

<div class="al-row">
    <div class="al-row-column">Номер:</div>
    <div class="al-row-column"><input readonly id="mndm_id2" type="text"></div>
    <div class="al-row-column">Подана:</div>
    <div class="al-row-column"><div id="Date2"></div></div>
    <div class="al-row-column">Приоритет:</div>
    <div class="al-row-column"><input readonly id="Prior2" type="text"></div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div class="al-row-column">
        <div>Предельная дата:</div>
        <div><div id="Deadline"></div></div>
    </div>    
    <div class="al-row-column">
        <div>Желаемая дата:</div>
        <div><div id="WishDate"></div></div>
    </div> 
    <div class="al-row-column">
        <div>Принята:</div>
        <div><div id="DateAccept"></div></div>
    </div> 
    <div class="al-row-column">
        <div>Выполнена:</div>
        <div><div id="DateExec"></div></div>
    </div>
    <div style="clear: both"></div>
</div>

<div class="al-row">
    <div>Примечание:</div>
    <div><textarea readonly id="Description2"></textarea></div>
</div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Изменить" id='EditMonitoringDemands'/></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Печатать" id='btnPrint'/></div>
    <div style="clear: both"></div>
</div>

<div class="al-row" style="height: calc(100% - 354px)">
    <div id="MonitoringDemandDetailsGrid" class="jqxGridAliton"></div>
</div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='NewMonitoringDemandDetails'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='EditMonitoringDemandDetails'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='ReloadMonitoringDemandDetails'/></div>
    <div class="al-row-column"><input type="button" value="Экспорт" id='btnExport'/></div>
    <div class="al-row-column"><input type="button" value="Ввести цену от поставщика" id='AddPriceMonitoringDemandDetails'/></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='DelMonitoringDemandDetails'/></div>
    <div style="clear: both"></div>
</div>

<hr style="margin: 10px 5px; border-color: #ccc;">

<div class="al-row">
    <div class="al-row-column">Заявку принял:</div>
    <div class="al-row-column"><input readonly type="text" id='AcceptEmployeeName'/></div>
    <div class="al-row-column"><input type="button" value="Принять" id='btnAcceptEmployeeName'/></div>
    <div class="al-row-column">Заявку подал:</div>
    <div class="al-row-column"><input readonly type="text" id='CreateEmployeeName'/></div>
    <div class="al-row-column"><input type="button" value="Выполнить" id='btnExecute'/></div>
    <div style="clear: both"></div>
</div>




<div id="EditDialog" style="display: none">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContent">
        <div id="BodyDialog"></div>
<!--        <div id="BottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOk'/></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancel'/></div>
            </div>
        </div>-->
    </div>
</div>

<div id="EditDialogMDDetails" style="display: none">
    <div id="DialogHeaderMDDetails">
        <span id="HeaderTextMDDetails">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContentMDDetails">
        <div id="BodyDialogMDDetails"></div>
        <div id="BottomDialogMDDetails">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOkMDDetails'/></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancelMDDetails'/></div>
            </div>
        </div>
    </div>
</div>

<div id="EditDialogAddPrice" style="display: none">
    <div id="DialogHeaderAddPrice">
        <span id="HeaderTextAddPrice">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContentAddPrice">
        <div id="BodyDialogAddPrice"></div>
        
<!--        <div id="BottomDialogAddPrice">
            <div class="row">
                <div class="row-column"><input readonly type="button" value="Сохранить" id='btnOkAddPrice'/></div>
                <div style="float: right;" class="row-column"><input readonly type="button" value="Отменить" id='btnCancelAddPrice'/></div>
            </div>
        </div>-->
    </div>
</div>