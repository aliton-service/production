<script type="text/javascript">
    $(document).ready(function () {
        
        var MonitoringDemands2 = {
            mndm_id: '<?php echo $model->mndm_id; ?>',
            Prior: '<?php echo $model->DemandPrior; ?>',
            Description: '<?php echo $model->Description; ?>',
            Deadline: Aliton.DateConvertToJs('<?php echo $model->Deadline; ?>'),
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            DateAccept: Aliton.DateConvertToJs('<?php echo $model->DateAccept; ?>'),
            WishDate: Aliton.DateConvertToJs('<?php echo $model->WishDate; ?>'),
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
        };
        

        $("#mndm_id2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Date2").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true, readonly: true }));
        $("#Prior2").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 220 }));
        $("#Deadline").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true, readonly: true }));
        $("#WishDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true, readonly: true }));
        $("#DateAccept").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true, readonly: true }));
        $("#DateExec").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true, readonly: true }));
        $("#Description2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 590 }));
        
        
        $('#EditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '640'}));
        
        $('#EditDialog').jqxWindow({initContent: function() {
            $("#btnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
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
                data: { mndm_id: MonitoringDemands2.mndm_id},
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
        
        if (MonitoringDemands2.mndm_id != '') $("#mndm_id2").jqxInput('val', MonitoringDemands2.mndm_id);
        if (MonitoringDemands2.Date != '') $("#Date2").jqxDateTimeInput('val', MonitoringDemands2.Date);
        if (MonitoringDemands2.Prior != '') $("#Prior2").jqxInput('val', MonitoringDemands2.Prior);
        if (MonitoringDemands2.Deadline != '') $("#Deadline").jqxDateTimeInput('val', MonitoringDemands2.Deadline);
        if (MonitoringDemands2.WishDate != '') $("#WishDate").jqxDateTimeInput('val', MonitoringDemands2.WishDate);
        if (MonitoringDemands2.DateAccept != '') $("#DateAccept").jqxDateTimeInput('val', MonitoringDemands2.DateAccept);
        if (MonitoringDemands2.DateExec != '') $("#DateExec").jqxDateTimeInput('val', MonitoringDemands2.DateExec);
        if (MonitoringDemands2.Description != '') $("#Description2").jqxTextArea('val', MonitoringDemands2.Description);
    });
    
</script>


<div class="row">
    <div class="row-column">Номер: <input readonly id="mndm_id2" type="text"></div>
    <div class="row-column">Подана: </div><div class="row-column"><div id="Date2"></div></div>
</div>

<div class="row">
    <div class="row-column">Приоритет <br><input readonly id="Prior2" type="text"></div>
    <div class="row-column">
        <div class="row" style="margin: 0; padding-top: 0;">
            <div class="row-column">Предельная дата: <div id="Deadline"></div></div>
            <div class="row-column">Желаемая дата: <div id="WishDate"></div></div>
        </div>
        <div class="row">
            <div class="row-column">Принята: <div id="DateAccept"></div></div>
            <div class="row-column">Выполнена: <div id="DateExec"></div></div>
        </div>
    </div>
</div>

<div class="row" style="margin: 0">
    <div class="row-column">Примечание: <textarea readonly id="Description2"></textarea></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Изменить" id='EditMonitoringDemands' /></div>
    <div style="margin-left: 310px;" class="row-column"><input type="button" value="Печатать" id='btnPrint' /></div>
</div>



<div id="EditDialog">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContent">
        <div id="BodyDialog"></div>
        <div id="BottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancel' /></div>
            </div>
        </div>
    </div>
</div>