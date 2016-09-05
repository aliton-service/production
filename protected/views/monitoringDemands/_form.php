<script type="text/javascript">
    $(document).ready(function () {
        
        var MonitoringDemands3 = {
            mndm_id: '<?php echo $model->mndm_id; ?>',
            Prior: '<?php echo $model->Prior; ?>',
            Description: '<?php echo $model->Description; ?>',
            Deadline: Aliton.DateConvertToJs('<?php echo $model->Deadline; ?>'),
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            DateAccept: Aliton.DateConvertToJs('<?php echo $model->DateAccept; ?>'),
            WishDate: Aliton.DateConvertToJs('<?php echo $model->WishDate; ?>'),
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
        };

        var DataPriors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandPriors, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["dp.for_md = 1"],
                });
                return data;
            },
        });

        $("#mndm_id3").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130, placeHolder: "-Авто-" }));
        $("#Date3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, showCalendarButton: false, value: new Date() }));
        $("#Prior3").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, displayMember: "DemandPrior", valueMember: "DemandPrior_id", width: 220, autoDropDownHeight: true }));
        $("#Deadline3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 130, showCalendarButton: false, value: null }));
        $("#WishDate3").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, showTimeButton: true }));
        $("#Description3").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 590 }));
        
        
        if (MonitoringDemands3.mndm_id != '') $("#mndm_id3").jqxInput('val', MonitoringDemands3.mndm_id);
        if (MonitoringDemands3.Date != null) $("#Date3").jqxDateTimeInput('val', MonitoringDemands3.Date);
        if (MonitoringDemands3.Prior != '') $("#Prior3").jqxComboBox('val', MonitoringDemands3.Prior);
        if (MonitoringDemands3.Deadline != null) $("#Deadline3").jqxDateTimeInput('val', MonitoringDemands3.Deadline);
        if (MonitoringDemands3.WishDate != null) $("#WishDate3").jqxDateTimeInput('val', MonitoringDemands3.WishDate);
        if (MonitoringDemands3.Description != '') $("#Description3").jqxTextArea('val', MonitoringDemands3.Description);
        
        var getDeadline = function (daysAmount) {
            var newDate = new Date();
            var days = daysAmount;

            while (days > 0) 
            {
                newDate.setDate(newDate.getDate() + 1);
                if (newDate.getDay() < 6 && newDate.getDay() > 0) { // если это не выходной
                    days--;
                }
            }
            return newDate;
        };
        
        $('#Prior3').on('select', function (event) 
        {
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
//                console.log(value);
                var newDate;

                switch(value) {
                    case 1: // Срочная
                        newDate = new Date();
                        $("#Deadline3").jqxDateTimeInput('val', newDate);
                        break;
                        
                    case 8: // Текущая
                        newDate = getDeadline(2);
                        $("#Deadline3").jqxDateTimeInput('val', newDate);
                        break;
                        
                    case 10: // Отложенная
                        newDate = getDeadline(14);
                        $("#Deadline3").jqxDateTimeInput('val', newDate);
                        break;
                        
                    case 9: // Плановая
                        newDate = getDeadline(10);
                        $("#Deadline3").jqxDateTimeInput('val', newDate);
                        break;
                        
                    case 11: // Условно выполнена
                        newDate = new Date('2999.01.01');
                        $("#Deadline3").jqxDateTimeInput('val', newDate);
                        break;
                }
            }
        }); 
    });
           
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'MonitoringDemands',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>



<div class="row">
    <div class="row-column">Номер: <input id="mndm_id3" name="MonitoringDemands[mndm_id]" type="text"></div>
    <div class="row-column">Подана: </div><div class="row-column"><div id="Date3"  name="MonitoringDemands[Date]"></div></div>
</div>

<div class="row">
    <div class="row-column">Приоритет: <div id="Prior3" name="MonitoringDemands[Prior]"></div><?php echo $form->error($model, 'Prior'); ?></div>
    <div class="row-column">Предельная дата: <div id="Deadline3" name="MonitoringDemands[Deadline]"></div></div>
    <div class="row-column">Желаемая дата: <div id="WishDate3" name="MonitoringDemands[WishDate]"></div></div>
</div>

<div class="row">
    <div class="row-column">Примечание: <textarea id="Description3" name="MonitoringDemands[Description]"></textarea></div>
</div>

<?php $this->endWidget(); ?>