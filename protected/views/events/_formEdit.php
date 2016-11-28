<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataEventEdit;
    
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var EventEdit = {
            Evnt_id: <?php echo json_encode($model->Evnt_id); ?>,
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            Prds_id: <?php echo json_encode($model->Prds_id); ?>,
            Empl_id: <?php echo json_encode($model->Empl_id); ?>,
            EmplCreate: <?php echo json_encode($model->EmplCreate); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
            Rpfr_id: <?php echo json_encode($model->Rpfr_id); ?>,
            Who_reported: <?php echo json_encode($model->Who_reported); ?>,
            DateAct: Aliton.DateConvertToJs('<?php echo $model->DateAct; ?>'),
            Evaluation: <?php echo json_encode($model->Evaluation); ?>,
        };

        $("#Date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy' }));
        
        var PeriodsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePeriods));
        $("#Periods2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: PeriodsDataAdapter, displayMember: "periodname", valueMember: "code", width: 160, autoDropDownHeight: true }));
        
        var EmployeeDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        EmployeeDataAdapter.dataBind();
        EmployeeDataAdapter = EmployeeDataAdapter.records;
        
        $("#Employee").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeeDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 230 }));
        $("#EmplCreate").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeeDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 230, disabled: true }));
        
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 70 }));
        
        $("#DateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: null }));
        
        var ReportFormsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceReportForms));
        $("#ReportForms").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: ReportFormsDataAdapter, displayMember: "ReportForm", valueMember: "Rpfr_id", width: 150, autoDropDownHeight: true }));
        
        var ContactInfoDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ci.ObjectGr_id = " + EventEdit.ObjectGr_id],
                    
                });
                return data;
            },
        });
        $("#ContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: ContactInfoDataAdapter, displayMember: "CName", valueMember: "Info_id", width: 510, autoDropDownHeight: true }));

        $("#DateAct").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: null }));
        
        $("#Evaluation").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 700 }));
        
        if (EventEdit.Date != null) $("#Date").jqxDateTimeInput('val', EventEdit.Date);
        if (EventEdit.Prds_id != null) $("#Periods2").jqxComboBox('val', EventEdit.Prds_id);
        if (EventEdit.Empl_id != null) $("#Employee").jqxComboBox('val', EventEdit.Empl_id);
        if (EventEdit.EmplCreate != null) $("#EmplCreate").jqxComboBox('val', EventEdit.EmplCreate);
        if (EventEdit.DateExec != null) $("#DateExec").jqxDateTimeInput('val', EventEdit.DateExec);
        if (EventEdit.Rpfr_id != null) $("#ReportForms").jqxComboBox('val', EventEdit.Rpfr_id);
        if (EventEdit.Who_reported != null) $("#ContactInfo").jqxComboBox('val', EventEdit.Who_reported);
        if (EventEdit.DateAct != null) $("#DateAct").jqxDateTimeInput('val', EventEdit.DateAct);
        if (EventEdit.Who_reported != null) $("#ContactInfo").jqxComboBox('val', EventEdit.Who_reported);
        if (EventEdit.Evaluation != null) $("#Evaluation").jqxInput('val', EventEdit.Evaluation);
        if (EventEdit.Note != null) $("#Note").jqxTextArea('val', EventEdit.Note);
        
        
        

        $('#jqxTabsEventOffers').jqxTabs({ width: '100%', height: 37});
        
        var tabFilter = function(){
            $("#EventOffersGrid").jqxGrid('upDatebounddata');
        };
        
        var EventOffersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventOffers, {async: true}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["eo.Evnt_id = " + EventEdit.Evnt_id, "ot.offergroup = " + ($('#jqxTabsEventOffers').jqxTabs('selectedItem') + 1)],
                });
                return data;
            },
        });
        
        $("#EventOffersGrid").on("bindingcomplete", function () {
            $('#EventOffersGrid').jqxGrid('selectrow', 0);
        });
                
        $("#EventOffersGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                groupable: false,
                width: '100%',
                height: '300',
                source: EventOffersDataAdapter,
                columns: [
                    { text: 'Наименование предложения', dataField: 'offertype', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 220 },
                    { text: 'Результат данного предложения', dataField: 'resultname', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Примечание данного предложения', dataField: 'Note', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Заявки', dataField: 'demand', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'offergroup', datafield: 'offergroup', columngroup: 'Current', /*columntype: 'textbox', filtercondition: 'STARTS_WITH', */ width: 150, hidden: true },
                    { text: 'Дата', dataField: 'prev_Date', columngroup: 'Previous', columntype: 'Date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 80 },
                    { text: 'Результат', dataField: 'prev_resultname', columngroup: 'Previous', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Примечание', dataField: 'prev_Note', columngroup: 'Previous', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                ],
                columngroups: [
                    { text: 'Текущее предложение', align: 'center', name: 'Current' },
                    { text: 'Предыдущее предложение', align: 'center', name: 'Previous' },
                ]
            })
        );

        
        
        
        $('#jqxTabsEventOffers').on('selected', function (event) {
            tabFilter();
        });
        
        
        $("#EventOffersGrid").on('rowselect', function (event) {
            var Temp = $('#EventOffersGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataEventEdit = Temp;
            } else { CurrentRowDataEventEdit = null; };
//            console.log(CurrentRowDataEventEdit);
        });

        $('#btnAddEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnEditEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnAddDemandEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 280 }));
        $('#btnDelEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnAddEventOffer').on('click', function(){
            $('#EventOffersDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 460, width: 600, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('EventOffers/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Evnt_id: CurrentRowDataEvents.Evnt_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEventOffersDialog").html(Res.html);
                    $('#EventOffersDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#EventOffersGrid').on('rowdoubleclick', function (event) { 
            $("#btnEditEventOffer").click();
        });
        
        $('#btnEditEventOffer').on('click', function(){
            $('#EventOffersDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 460, width: 600, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('EventOffers/UpDate')) ?>,
                type: 'POST',
                async: false,
                data: {
                    code: CurrentRowDataEventEdit.code,
                    Evnt_id: CurrentRowDataEvents.Evnt_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEventOffersDialog").html(Res.html);
                    $('#EventOffersDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnAddDemandEventOffer').on('click', function(){
            $('#EventOffersDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 590, width: 700, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('OfferDemands/Index')) ?>,
                type: 'POST',
                async: false,
                data: {
                    offer_id: CurrentRowDataEventEdit.code
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyEventOffersDialog").html(Res.html);
                    $('#EventOffersDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#btnDelEventOffer").on('click', function (){
            $.ajax({
                type: "POST",
                url: "/index.php?r=EventOffers/Delete",
                data: { 
                    code: CurrentRowDataEventEdit.code,
                },
                success: function(){
                    $("#EventOffersGrid").jqxGrid('upDatebounddata');
                    $("#EventOffersGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        $('#btnSaveEventEdit').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelEventEdit').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelEventEdit').on('click', function(){
            $('#EventsDialog').jqxWindow('close');
        });
        
        $('#btnSaveEventEdit').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Events/UpDate')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Events/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Events').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Evnt_id', Res.id, '#EventsGrid', true);
                        $('#EventsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyEventsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
    });
    
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Events',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    ));
?>

<input type="hidden" name="Events[Evnt_id]" value="<?php echo $model->Evnt_id; ?>"/>

<div class="row">
    <div class="row-column">Плановая дата: </div>
    <div class="row-column"><div id="Date" name="Events[Date]"></div></div>
    <div class="row-column">Интервал:</div>
    <div class="row-column"><div id="Periods2" name="Events[Prds_id]"></div></div>
</div>

<div class="row">
    <div class="row-column">Исполнитель:</div>
    <div class="row-column"><div id="Employee" name="Events[Empl_id]"></div><?php echo $form->error($model, 'Empl_id'); ?></div>
    <div class="row-column">Составитель:</div>
    <div class="row-column"><div id="EmplCreate"></div></div>
</div>

<div class="row">
    <div class="row-column">Примечание:</div>
    <div class="row-column"><textarea id="Note" name="Events[Note]"></textarea><?php echo $form->error($model, 'Note'); ?></div>
</div>

<div id='jqxTabsEventOffers' style="margin-top: 10px;">
    <ul>
        <li>Предложения по модернизации</li>
        <li>Комплексное обслуживание</li>
        <li>Другие предложения</li>
    </ul>

    <div id='contentEventEdit0'></div>
    <div id='contentEventEdit1'></div>
    <div id='contentEventEdit2'></div>
    
</div>

<div id="EventOffersGrid" class="jqxGridAliton"></div>

<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddEventOffer'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditEventOffer'/></div>
    <div class="row-column"><input type="button" value="Создать заявку по предложению" id='btnAddDemandEventOffer'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='btnDelEventOffer'/></div>
</div>

<div class="row"> 
    <div class="row-column">Дата выполнения: </div>
    <div class="row-column"><div id="DateExec" name="Events[DateExec]"></div></div>

    <div class="row-column">Дата прихода акта по ТО: </div>
    <div class="row-column"><div id="DateAct" name="Events[DateAct]"></div></div>
</div>

<div class="row">
    <div class="row-column">Форма отчетности:</div>
    <div class="row-column"><div id="ReportForms" name="Events[Rpfr_id]"></div><?php echo $form->error($model, 'Rpfr_id'); ?></div>

    <div class="row-column">Перед кем отчитался:</div>
    <div class="row-column"><div id="ContactInfo" name="Events[Who_reported]"></div><?php echo $form->error($model, 'Who_reported'); ?></div>
</div>

<div class="row">
    <div class="al-row-column">Итоги оценки <input type="text" id="Evaluation" name="Events[Evaluation]"></div>
</div>

<div class="row" style="margin-top: 20px;">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveEventEdit'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelEventEdit'/></div>
</div>
<?php $this->endWidget(); ?>

<div id="EventOffersDialog" style="display: none;">
    <div id="EventOffersDialogHeader">
        <span id="EventOffersDialogHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogEventOffersContent">
        <div style="" id="BodyEventOffersDialog"></div>
    </div>
</div>

