<script type="text/javascript">
    var WHDoc2Edit = {};
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var WHDocuments = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Dctp_id: <?php echo json_encode($model->dctp_id); ?>,
            Objc_id: <?php echo json_encode($model->objc_id); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            Number: <?php echo json_encode($model->number); ?>,
            WorkType: <?php echo json_encode($model->wrtp_name); ?>,
            Wrtp_id: <?php echo json_encode($model->wrtp_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            BestDate: Aliton.DateConvertToJs('<?php echo $model->best_date; ?>'),
            Deadline: Aliton.DateConvertToJs('<?php echo $model->deadline; ?>'),
            Storage: <?php echo json_encode($model->storage); ?>,
            Strg_id: <?php echo json_encode($model->strg_id); ?>,
            Achs_id: <?php echo json_encode($model->achs_id); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            Prior_id: <?php echo json_encode($model->prty_id); ?>,
            Rcrs_id: <?php echo json_encode($model->rcrs_id); ?>,
            ReceiptDate: Aliton.DateConvertToJs('<?php echo $model->ReceiptDate; ?>'),
            ReceiptNumber: <?php echo json_encode($model->ReceiptNumber); ?>,
            PrmsEmpl_id: <?php echo json_encode($model->prms_empl_id); ?>,
            DatePromise: Aliton.DateConvertToJs('<?php echo $model->date_promise; ?>'),
            DatePlan: Aliton.DateConvertToJs('<?php echo $model->plan_date; ?>'),
            EmplCreate: <?php echo json_encode($model->empl_id); ?>,
            DmndEmpl_id: <?php echo json_encode($model->dmnd_empl_id); ?>,
            DialogId: <?php echo json_encode($DialogId); ?>,
            BodyDialogId: <?php echo json_encode($BodyDialogId); ?>
        };
        
        $('#WHDocuments').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        
        // Инициализация источников данных
        var DataWorkTypes = new $.jqx.dataAdapter(Sources.SourceWorkTypes);
        var DataStorages = new $.jqx.dataAdapter(Sources.SourceStoragesList);
        var DataPrior = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandPriors), {
            formatData: function (data) {
                var Filters = [];
                Filters[0] = "dp.for_wh = 1";
                $.extend(data, {
                    Filters: Filters
                });
                return data;
            },
        });
        var DataReceiptReasons = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceReceiptReasons)); 
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees)); 
        DataEmployees.dataBind();
        var EmplRecords  = DataEmployees.records;
        $('#FindTrebsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings));
        $('#btnCancelWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnSaveWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false}));
        $("#edNumberEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150} ));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.Date, formatString: 'dd.MM.yyyy'}));
        $("#edWorkTypeEdit").jqxComboBox({ source: DataWorkTypes, width: '200', height: '25px', displayMember: "name", valueMember: "wrtp_id"});
        $("#edStorageEdit").jqxComboBox({ source: DataStorages, width: '150', height: '25px', displayMember: "storage", valueMember: "storage_id"});
        $("#edPriorEdit").jqxComboBox({ source: DataPrior, width: '130', height: '25px', displayMember: "DemandPrior", valueMember: "DemandPrior_id"});
        $("#edBestDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.BestDate, formatString: 'dd.MM.yyyy'}));
        $("#edDeadlineEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.Deadline, formatString: 'dd.MM.yyyy'}));
        $("#edAddressEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 550} ));
        $('#edNoteEdit').jqxTextArea({ disabled: false, placeHolder: '', height: 50, width: '100%', minLength: 1});
        $("#edReceiptReasonEdit").jqxComboBox({ source: DataReceiptReasons, width: '200', height: '25px', displayMember: "name", valueMember: "rcrs_id"});
        $("#edReceiptDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.ReceiptDate, formatString: 'dd.MM.yyyy'}));
        $("#edReceiptNumberEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100} ));
        $("#edDemandEmplEdit").jqxComboBox({ source: EmplRecords, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edPromiseEmplEdit").jqxComboBox({ source: EmplRecords, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edCreateEmplEdit").jqxComboBox({ source: EmplRecords, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edPromiseDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.DatePromise, formatString: 'dd.MM.yyyy'}));
        $("#edPlanDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.DatePlan, formatString: 'dd.MM.yyyy'}));
        
        $('#btnCancelWHDocuments').on('click', function(){
            if (WHDocuments.DialogId != '' && WHDocuments.DialogId != null)
                $('#' + WHDocuments.DialogId).jqxWindow('close');
            else
                $('#WHDocumentsDialog').jqxWindow('close');
        });
        
        $('#btnSaveWHDocuments').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')); ?>;
            
            var Model = $('#WHDocuments').serialize() + '&Dctp_id=' + WHDocuments.Dctp_id + '&DialogId=' + WHDocuments.DialogId + '&BodyDialogId=' + WHDocuments.BodyDialogId;
            
            $.ajax({
                url: Url,
                data: Model,
                
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (WHDocuments.DialogId != '' && WHDocuments.DialogId != null) {
                            $('#' + WHDocuments.DialogId).jqxWindow('close');
                            
                            return;
                        }
                        
                        if (!StateInsert) 
                            WHDoc.Refresh();
                        
                        if (StateInsert) {
                            WHReestr.Docm_id = Res.id;
                            $('#Grid4').jqxGrid('updatebounddata');
                            window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View'))?> + '&Docm_id=' + Res.id);
                        }
                        if (WHDocuments.DialogId != '' && WHDocuments.DialogId != null)
                            $('#' + WHDocuments.DialogId).jqxWindow('close');
                        else
                            $('#WHDocumentsDialog').jqxWindow('close');
                    }
                    else {
                        if (WHDocuments.DialogId != '' && WHDocuments.DialogId != null) {
                            $('#' + WHDocuments.BodyDialogId).html(Res.html);
                        }
                        else $('#BodyWHDocumentsDialog').html(Res.html);
                        
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (WHDocuments.Prior_id !== null) $("#edPriorEdit").jqxComboBox('val', WHDocuments.Prior_id);
        if (WHDocuments.Wrtp_id !== null) $("#edWorkTypeEdit").jqxComboBox('val', WHDocuments.Wrtp_id);
        if (WHDocuments.Strg_id !== null) $("#edStorageEdit").jqxComboBox('val', WHDocuments.Strg_id);
        if (WHDocuments.Number !== null) $("#edNumberEdit").jqxInput('val', WHDocuments.Number);
        if (WHDocuments.Note !== null) $("#edNoteEdit").jqxTextArea('val', WHDocuments.Note);
        if (WHDocuments.Address !== null) $("#edAddressEdit").jqxInput('val', WHDocuments.Address);
        if (WHDocuments.Rcrs_id !== null) $("#edReceiptReasonEdit").jqxComboBox('val', WHDocuments.Rcrs_id);
        if (WHDocuments.ReceiptDate !== null) $("#edReceiptDateEdit").jqxDateTimeInput('val', WHDocuments.ReceiptDate);
        if (WHDocuments.ReceiptNumber !== null) $("#edReceiptNumberEdit").jqxInput('val', WHDocuments.ReceiptNumber);
        if (WHDocuments.DmndEmpl_id !== null) $("#edDemandEmplEdit").jqxComboBox('val', WHDocuments.DmndEmpl_id);
        if (WHDocuments.PrmsEmpl_id !== null) $("#edPromiseEmplEdit").jqxComboBox('val', WHDocuments.PrmsEmpl_id);
        if (WHDocuments.EmplCreate !== null) $("#edCreateEmplEdit").jqxComboBox('val', WHDocuments.EmplCreate);
        if (WHDocuments.DatePromise !== null) $("#edPromiseDateEdit").jqxDateTimeInput('val', WHDocuments.DatePromise);
        if (WHDocuments.DatePlan !== null) $("#edPlanDateEdit").jqxDateTimeInput('val', WHDocuments.DatePlan);
        
        
    });
</script>    

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'WHDocuments',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="WHDocuments[docm_id]" value="<?php echo $model->docm_id; ?>" />
<input type="hidden" name="WHDocuments[dctp_id]" value="<?php echo $model->dctp_id; ?>" />
<input type="hidden" name="WHDocuments[calc_id]" value="<?php echo $model->calc_id; ?>" />

<div class="row">
    <div class="row-column" style="width: 100px">Номер</div>
    <div class="row-column"><input id="edNumberEdit" readonly="readonly" name="WHDocuments[number]" /><?php echo $form->error($model, 'number'); ?></div>
    <div class="row-column">Дата</div>
    <div class="row-column"><div id="edDateEdit" name="WHDocuments[date]"></div><?php echo $form->error($model, 'date'); ?></div>
    <div class="row-column"><b><?php echo $model->status; ?></b></div>
</div>

<div class="row">
    <div class="row-column" style="width: 100px">Вид работ</div>
    <div class="row-column"><div id="edWorkTypeEdit" name="WHDocuments[wrtp_id]"></div><?php echo $form->error($model, 'wrtp_id'); ?></div>
    <div class="row-column" style="">Склад</div>
    <div class="row-column"><div id="edStorageEdit" name="WHDocuments[strg_id]"></div><?php echo $form->error($model, 'strg_id'); ?></div>
    
</div>
<div class="row" style="border: 1px solid #e0e0e0; background-color: #e0e0e0">
    <div >
        <div><div class="row-column">Дата получения</div></div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column" style="">Срочность</div>
            <div class="row-column"><div id="edPriorEdit" name="WHDocuments[prty_id]"></div><?php echo $form->error($model, 'prty_id'); ?></div>
            <div class="row-column">Желаемая</div>
            <div class="row-column"><div id="edBestDateEdit" name="WHDocuments[best_date]"></div><?php echo $form->error($model, 'best_date'); ?></div>
            <div class="row-column" style="float: right">
                <div class="row-column">Предельная</div>
                <div class="row-column"><div id="edDeadlineEdit" name="WHDocuments[deadline]"></div><?php echo $form->error($model, 'deadline'); ?></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <input type="hidden" name="WHDocuments[objc_id]" value="<?php echo $model->objc_id; ?>"/>
    <div class="row-column" style="width: 100px">Адрес объекта</div>
    <div class="row-column" ><input id="edAddressEdit" readonly="readonly" /><?php echo $form->error($model, 'objc_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Основание</div>
    <div class="row-column"><div id="edReceiptReasonEdit" name="WHDocuments[rcrs_id]"></div><?php echo $form->error($model, 'rcrs_id'); ?></div>
    <div class="row-column">Дата</div>
    <div class="row-column"><div id="edReceiptDateEdit" name="WHDocuments[ReceiptDate]"></div><?php echo $form->error($model, 'ReceiptDate'); ?></div>
    <div class="row-column">Номер</div>
    <div class="row-column"><input id="edReceiptNumberEdit" name="WHDocuments[ReceiptNumber]" /><?php echo $form->error($model, 'ReceiptNumber'); ?></div>
</div>
    
<div class="row">
    <div style="float: left">
        <div><div class="row-column">Затребовал</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edDemandEmplEdit" name="WHDocuments[dmnd_empl_id]"></div><?php echo $form->error($model, 'dmnd_empl_id'); ?></div></div>
    </div>
    <div style="float: right">
        <div><div class="row-column">Разрешил</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edPromiseEmplEdit" name="WHDocuments[prms_empl_id]"></div><?php echo $form->error($model, 'prms_empl_id'); ?></div></div>
    </div>
</div>
<div class="row">
    <div style="float: left">
        <div><div class="row-column">Требование выписал</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div id="edCreateEmplEdit" name="WHDocuments[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div></div>
    </div>
    <div style="float: right">
        <div class="row-column">
            <div><div class="row-column">Обещанная дата</div></div>
            <div style="clear: both"></div>
            <div><div class="row-column"><div id="edPromiseDateEdit" name="WHDocuments[date_promise]"></div><?php echo $form->error($model, 'date_promise'); ?></div></div>
        </div>
        <div class="row-column">
            <div><div class="row-column">План. дата возврата</div></div>
            <div style="clear: both"></div>
            <div><div class="row-column"><div id="edPlanDateEdit" name="WHDocuments[plan_date]"></div><?php echo $form->error($model, 'plan_date'); ?></div></div>
        </div>
    </div>
</div>




<div class="row" style="margin-top: 8px; border-top: 1px solid #e0e0e0;">
    
    <div><div class="row-column">Примечание</div></div>
    <div><textarea id="edNoteEdit" name="WHDocuments[note]"></textarea></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveWHDocuments'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelWHDocuments'/></div>
</div>

<?php $this->endWidget(); ?>

<div id="FindTrebsDialog" style="display: none;">
    <div id="FindTrebsDialogHeader">
        <span id="FindTrebsHeaderText">Поиск накладной</span>
    </div>
    <div style="padding: 10px;" id="DialogFindTrebsContent">
        <div style="" id="BodyFindTrebsDialog"></div>
    </div>
</div>    






