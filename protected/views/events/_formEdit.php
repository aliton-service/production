<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var Events = {
            evnt_id: <?php echo json_encode($model->evnt_id); ?>,
            objectgr_id: <?php echo json_encode($model->objectgr_id); ?>,
            date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            prds_id: <?php echo json_encode($model->prds_id); ?>,
            empl_id: <?php echo json_encode($model->empl_id); ?>,
            user_create: <?php echo json_encode($model->user_create); ?>,
            note: <?php echo json_encode($model->note); ?>,
            
            dateend: Aliton.DateConvertToJs('<?php echo $model->dateend; ?>'),
        };

        $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy' }));
        
        var PeriodsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePeriods));
        $("#Periods").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: PeriodsDataAdapter, displayMember: "periodname", valueMember: "code", width: 160, autoDropDownHeight: true }));
        
        var EmployeeDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        $("#Employee").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeeDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 230 }));
        $("#user_create").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeeDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 230 }));
        
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 600, height: 90 }));
        
//        $("#dateend").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy' }));

        $('#btnSaveEvents').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelEvents').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelEvents').on('click', function(){
            $('#EventsDialog').jqxWindow('close');
        });
        
        $('#btnSaveEvents').on('click', function(){
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
        
        if (Events.date != null) $("#date").jqxDateTimeInput('val', Events.date);
        if (Events.prds_id != null) $("#Periods").jqxComboBox('val', Events.prds_id);
        if (Events.empl_id != null) $("#Employee").jqxComboBox('val', Events.empl_id);
        if (Events.user_create != null) $("#user_create").jqxComboBox('val', Events.user_create);
        
        
        if (Events.evnt_id != null) $("#EventType").jqxComboBox('val', Events.evnt_id);
        
//        if (Events.dateend != null) $("#dateend").jqxDateTimeInput('val', Events.dateend);
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

empl_id = <?php echo json_encode($model->empl_id); ?>

<!--<input type="hidden" name="Events[evnt_id]" value="<?php // echo $model->evnt_id; ?>"/>-->
<input type="hidden" name="Events[objectgr_id]" value="<?php echo $model->objectgr_id; ?>"/>


<div class="row">
    <div class="row-column">Плановая дата: </div>
    <div class="row-column"><div id="date" name="Events[date]"></div></div>
    <div class="row-column">Интервал:</div>
    <div class="row-column"><div id="Periods" name="Events[prds_id]"></div></div>
</div>

<div class="row">
    <div class="row-column">Исполнитель:</div>
    <div class="row-column"><div id="Employee" name="Events[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div>
    <div class="row-column">Составитель:</div>
    <div class="row-column"><div id="user_create" name="Events[user_create]"></div><?php echo $form->error($model, 'user_create'); ?></div>
</div>

<div class="row">
    <div class="row-column">Примечание:</div>
    <div class="row-column"><div id="note" name="Events[note]"></div><?php echo $form->error($model, 'note'); ?></div>
</div>

<div class="row"> 
    <div class="row-column">по: </div>
    <!--<div class="row-column"><div id="dateend" name="Events[dateend]"></div></div>-->
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveEvents'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelEvents'/></div>
</div>
<?php $this->endWidget(); ?>



