<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataEventEdit;
    
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var EventEdit = {
            evnt_id: <?php echo json_encode($model->evnt_id); ?>,
            objectgr_id: <?php echo json_encode($model->objectgr_id); ?>,
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            prds_id: <?php echo json_encode($model->prds_id); ?>,
            empl_id: <?php echo json_encode($model->empl_id); ?>,
            user_create: <?php echo json_encode($model->user_create); ?>,
            note: <?php echo json_encode($model->note); ?>,
            date_exec: Aliton.DateConvertToJs('<?php echo $model->date_exec; ?>'),
            rpfr_id: <?php echo json_encode($model->rpfr_id); ?>,
            who_reported: <?php echo json_encode($model->who_reported); ?>,
            date_act: Aliton.DateConvertToJs('<?php echo $model->date_act; ?>'),
            evaluation: <?php echo json_encode($model->evaluation); ?>,
        };

        $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy' }));
        
        var PeriodsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePeriods));
        $("#Periods2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: PeriodsDataAdapter, displayMember: "periodname", valueMember: "code", width: 160, autoDropDownHeight: true }));
        
        var EmployeeDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        $("#Employee").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeeDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 230 }));
        $("#user_create").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeeDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 230, disabled: true }));
        
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 70 }));
        
        $("#date_exec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: null }));
        
        var ReportFormsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceReportForms));
        $("#ReportForms").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: ReportFormsDataAdapter, displayMember: "ReportForm", valueMember: "rslt_id", width: 150, autoDropDownHeight: true }));
        
        var ContactInfoDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfo, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ci.ObjectGr_id = " + EventEdit.objectgr_id],
                });
                return data;
            },
        });
        $("#ContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: ContactInfoDataAdapter, displayMember: "CName", valueMember: "Info_id", width: 350, autoDropDownHeight: true }));

        $("#date_act").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: null }));
        
        $("#evaluation").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 520 }));
        
        if (EventEdit.date != null) $("#date").jqxDateTimeInput('val', EventEdit.date);
        if (EventEdit.prds_id != null) $("#Periods2").jqxComboBox('val', EventEdit.prds_id);
        if (EventEdit.empl_id != null) $("#Employee").jqxComboBox('val', EventEdit.empl_id);
        if (EventEdit.user_create != null) $("#user_create").jqxComboBox('val', EventEdit.user_create);
        if (EventEdit.date_exec != null) $("#date_exec").jqxDateTimeInput('val', EventEdit.date_exec);
        if (EventEdit.rpfr_id != null) $("#ReportForms").jqxComboBox('val', EventEdit.rpfr_id);
        if (EventEdit.who_reported != null) $("#ReportForms").jqxComboBox('val', EventEdit.who_reported);
        if (EventEdit.date_act != null) $("#date_act").jqxDateTimeInput('val', EventEdit.date_act);
        if (EventEdit.who_reported != null) $("#ContactInfo").jqxComboBox('val', EventEdit.who_reported);
        if (EventEdit.evaluation != null) $("#evaluation").jqxInput('val', EventEdit.evaluation);
        
        
        var initTabEventEditContent = function (tab) {
//            console.log(tab);
        };

        $('#jqxTabsEventOffers').jqxTabs({ width: '100%', height: 37, initTabContent: initTabEventEditContent});
        $('#jqxTabsEventOffers').jqxTabs('select', 0);
        
        
//        var tabIndex = $('#jqxTabsEventOffers').jqxTabs('selectedItem'); 
//        console.log('tabIndex0 = ' + tabIndex);
        
        $('#jqxTabsEventOffers').on('selected', function (event) {
            var tabIndex = event.args.item;
//            console.log('tabIndex-selected = ' + tabIndex);
            tabFilter(tabIndex);
        });
        
        var tabFilter = function(tabIndex){
//            console.log('tabIndex-tabFilter = ' + tabIndex);
            if (tabIndex != 0) {
//                console.log('evtp_id = ' + EventTypesDataAdapter.records[tabIndex - 1].evtp_id);
                var EventEditTabGroup = new $.jqx.filter();
                var FilterEventEditTab = EventEditTabGroup.createfilter('numericfilter', (EventTypesDataAdapter.records[tabIndex - 1].evtp_id), 'EQUAL');
                EventEditTabGroup.addfilter(1, FilterEventEditTab);
            }

            $('#EventOffersGrid').jqxGrid('removefilter', 'evtp_id', false);
            if (tabIndex != 0) {
                $("#EventOffersGrid").jqxGrid('addfilter', 'evtp_id', EventEditTabGroup);
            } else {
                $('#EventOffersGrid').jqxGrid('removefilter', 'evtp_id', false);
            }

            $('#EventOffersGrid').jqxGrid({source: EventOffersDataAdapter});
            $("#EventOffersGrid").on("bindingcomplete", function () {
                $('#EventOffersGrid').jqxGrid('selectrow', 0);
                
                var rowindex = $('#EventOffersGrid').jqxGrid('getselectedrowindex');
//                console.log('rowindex = ' + rowindex);
                if (rowindex == -1) {
                    $("#btnEditEventOffer").jqxButton({ disabled: true });
                    $("#btnAddDemandEventOffer").jqxButton({ disabled: true });
                } else {
                    $("#btnEditEventOffer").jqxButton({ disabled: false });
                    $("#btnAddDemandEventOffer").jqxButton({ disabled: false });
                }
            });
        };
        
        
        
        var EventOffersDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventOffers, {
            filter: function () {
                $("#EventOffersGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#EventOffersGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
//                DisabledControls();
            }
        }), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["eo.evnt_id = " + EventEdit.evnt_id],
                });
                return data;
            },
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
//                source: EventOffersDataAdapter,
                columns: [
                    { text: 'Наименование предложения', dataField: 'offertype', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Результат данного предложения', dataField: 'ResultName', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Примечание данного предложения', dataField: 'note', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Заявки', dataField: 'Demand', columngroup: 'Current', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Дата', dataField: 'prev_date', columngroup: 'Previous', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Результат', dataField: 'prev_resultname', columngroup: 'Previous', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Примечание', dataField: 'prev_note', columngroup: 'Previous', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                ],
                columngroups: [
                    { text: 'Текущее предложение', align: 'center', name: 'Current' },
                    { text: 'Предыдущее предложение', align: 'center', name: 'Previous' },
                ]
            })
        );

        $("#EventOffersGrid").on('rowselect', function (event) {
            var Temp = $('#EventOffersGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataEventEdit = Temp;
            } else {CurrentRowDataEventEdit = null};
//            console.log(CurrentRowDataEventEdit);
        });

        $('#btnAddEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnEditEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnAddDemandEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 280 }));
        $('#btnDelEventOffer').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnAddDemandEvaluation').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 280 }));
        
        $('#btnAddEventOffer').on('click', function(){
            $('#EventOffersDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 460, width: 600, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('EventOffers/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    evnt_id: CurrentRowDataEvents.evnt_id,
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
                url: <?php echo json_encode(Yii::app()->createUrl('EventOffers/Update')) ?>,
                type: 'POST',
                async: false,
                data: {
                    code: CurrentRowDataEventEdit.code,
                    evnt_id: CurrentRowDataEvents.evnt_id,
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
                    $("#EventOffersGrid").jqxGrid('updatebounddata');
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
            var Url = <?php echo json_encode(Yii::app()->createUrl('Events/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Events/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Events').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('evnt_id', Res.id, '#EventsGrid', true);
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
        
        $('#EventOffersGrid').jqxGrid('selectrow', 0);
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

<?php // echo "user_create = " . json_encode($model->user_create); ?>

<input type="hidden" name="Events[evnt_id]" value="<?php echo $model->evnt_id; ?>"/>
<!--<input type="hidden" name="Events[objectgr_id]" value="<?php // echo $model->objectgr_id; ?>"/>-->


<div class="row">
    <div class="row-column">Плановая дата: </div>
    <div class="row-column"><div id="date" name="Events[date]"></div></div>
    <div class="row-column">Интервал:</div>
    <div class="row-column"><div id="Periods2" name="Events[prds_id]"></div></div>
</div>

<div class="row">
    <div class="row-column">Исполнитель:</div>
    <div class="row-column"><div id="Employee" name="Events[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div>
    <div class="row-column">Составитель:</div>
    <div class="row-column"><div id="user_create"></div></div>
</div>

<div class="row">
    <div class="row-column">Примечание:</div>
    <div class="row-column"><div id="note" name="Events[note]"></div><?php echo $form->error($model, 'note'); ?></div>
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
    <div class="row-column"><div id="date_exec" name="Events[date_exec]"></div></div>

    <div class="row-column">Дата прихода акта по ТО: </div>
    <div class="row-column"><div id="date_act" name="Events[date_act]"></div></div>
</div>

<div class="row">
    <div class="row-column">Форма отчетности:</div>
    <div class="row-column"><div id="ReportForms" name="Events[rpfr_id]"></div><?php echo $form->error($model, 'rpfr_id'); ?></div>

    <div class="row-column">Перед кем отчитался:</div>
    <div class="row-column"><div id="ContactInfo" name="Events[who_reported]"></div><?php echo $form->error($model, 'who_reported'); ?></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать заявку по итогам оценки" id='btnAddDemandEvaluation'/></div>
    <div class="al-row-column">Итоги оценки <input type="text" id="evaluation" name="Events[evaluation]"></div>
</div>

<div class="row">
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

