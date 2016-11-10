<script type="text/javascript">
    
    $(document).ready(function () {
        
        
        Repair = {
            Repr_id: <?php echo json_encode($model->Repr_id); ?>,
            EDefect: <?php echo json_encode($model->edefect); ?>,
            DatePlanAction1: Aliton.DateConvertToJs(<?php echo json_encode($model->date_plan); ?>),
            DateFactAction1: Aliton.DateConvertToJs(<?php echo json_encode($model->date_fact); ?>),
            ExecHour: <?php echo json_encode($model->exechour); ?>
        };
        
        
        
        $("#edEDefectEdit").jqxTextArea($.extend(true, {}, {height: 85, width: 600, minLength: 1}));
        $("#edDatePlanAction1Edit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repair.DatePlanAction1}));
        $("#edDateFactAction1Edit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, value: Repair.DateFactAction1}));
        $("#edExecHourEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {height: 25, width: 100, decimalDigits: 0}));

        
        
        if (Repairs.EDefect != '') $("#edEDefectEdit").jqxTextArea('val', Repair.EDefect);
        if (Repairs.DatePlanAction1 != '') $("#edDatePlanAction1Edit").jqxDateTimeInput('val', Repair.DatePlanAction1);
        if (Repairs.DateFactAction1 != '') $("#edDateFactAction1Edit").jqxDateTimeInput('val', Repair.DateFactAction1);
        if (Repairs.ExecHour != '') $("#edExecHourEdit").jqxNumberInput('val', Repair.ExecHour);
        
        $('#btnSaveRepairs').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Repair/Update')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Repairs').serialize() + '&Type=1',
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (typeof(Repairs) != 'undefined')
                            Repairs.Refresh();
                        if ($('#RepairsDialog').length>0)
                            $('#RepairsDialog').jqxWindow('close');
                    }
                    else {
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $('#btnSaveRepairs').jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: false}));
        $('#btnCancelRepairs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelRepairs').on('click', function() {
            $('#RepairsDialog').jqxWindow('close');
        });
        $('#RepairsDialog').on('close', function (event) { 
            if ($('#TabsEdit').length>0)
                $('#TabsEdit').jqxTabs('destroy');
        });
        
        
    });
</script>




    <div style="padding: 10px; overflow: none;">
        <?php 
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'Repairs',
                'htmlOptions'=>array(
                    'class'=>'form-inline'
                ),
            )); 
        ?>
        <input type="hidden" name="Repairs[Repr_id]" value="<?php echo $model->Repr_id; ?>"/>

        
        <div class="al-row">
            <div class="al-row" style="padding: 0px;">Подтвержденная неисправность</div>
            <div style="clear: both"></div>
            <div class="al-row" style="padding: 0px;"><textarea readonly="readonly" id="edEDefectEdit" name="Repairs[edefect]"></textarea></div>
        </div>
        <div class="al-row">
            <div class="al-row" style="padding: 0px;">Дата выполнения ремонта</div>
            <div class="al-row" style="padding: 0px;">
                <div class="al-row-column">
                    <div class="al-row" style="padding: 0px;">План. дата</div>
                    <div style="clear: both"></div>
                    <div class="al-row" style="padding: 0px;"><div id="edDatePlanAction1Edit" name="Repairs[date_plan]"></div></div>
                </div>
                <div class="al-row-column">
                    <div class="al-row" style="padding: 0px;">Факт. дата</div>
                    <div style="clear: both"></div>
                    <div class="al-row" style="padding: 0px;"><div id="edDateFactAction1Edit" name="Repairs[date_fact]"></div></div>
                </div>
                <div style="clear: both"></div>
            </div>
        </div>
        <div class="al-row">
            <div class="al-row" style="padding: 0px;">Времязатратность (ч)</div>
            <div style="clear: both"></div>
            <div class="al-row" style="padding: 0px;"><div id="edExecHourEdit" name="Repairs[exechour]"></div></div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div style="clear: both"></div>
<div style="clear: both"></div>
    
    
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnSaveRepairs" value="Сохранить" /></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnCancelRepairs" value="Закрыть" /></div>
    <div style="clear: both"></div>
</div>


