<script type="text/javascript">
        $(document).ready(function () {
            var PaymentHistoryForm = {
                pmhs_id: '<?php echo $model->pmhs_id; ?>',
                cntr_id: '<?php echo $model->cntr_id; ?>',
                date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
                sum: '<?php echo $model->sum; ?>',
                month_start: '<?php echo $model->month_start; ?>',
                year_start: '<?php echo $model->year_start; ?>',
                month_end: '<?php echo $model->month_end; ?>',
                year_end: '<?php echo $model->year_end; ?>',
                note: '<?php echo $model->note; ?>',
            };
            
            var DataMonths = new $.jqx.dataAdapter(Sources.SourceMonths);
            
            $("#date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100 }));
            $("#sum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 140, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
            $("#month_start").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataMonths, displayMember: "Month_name", valueMember: "Month_id", width: 120, autoDropDownHeight: true }));
            $("#month_end").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataMonths, displayMember: "Month_name", valueMember: "Month_id", width: 120, autoDropDownHeight: true }));
            $("#year_start").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            $("#year_end").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 260 }));
            
            var now = new Date();
            var currentYear = now.getFullYear();
            var currentMonth = now.getMonth() + 1;
            console.log(currentMonth);
            
            if (PaymentHistoryForm.date != '') $("#date").jqxDateTimeInput('val', PaymentHistoryForm.date);
            if (PaymentHistoryForm.sum != '') $("#sum").jqxNumberInput('val', PaymentHistoryForm.sum);
            
            if (PaymentHistoryForm.month_start != '') {
                $("#month_start").jqxComboBox('val', PaymentHistoryForm.month_start);
            } else {
                $("#month_start").jqxComboBox('val', currentMonth);
            }
            
            if (PaymentHistoryForm.month_end != '') {
                $("#month_end").jqxComboBox('val', PaymentHistoryForm.month_end);
            } else {
                $("#month_end").jqxComboBox('val', currentMonth);
            }
            
            if (PaymentHistoryForm.year_start != '') {
                $("#year_start").jqxNumberInput('val', PaymentHistoryForm.year_start);
            } else {
                $("#year_start").jqxNumberInput('val', currentYear);
            }
            
            if (PaymentHistoryForm.year_start != '') {
                $("#year_end").jqxNumberInput('val', PaymentHistoryForm.year_end);
            } else {
                $("#year_end").jqxNumberInput('val', currentYear);
            }
            
            if (PaymentHistoryForm.note != '') $("#note").jqxTextArea('val', PaymentHistoryForm.note);
        });
</script> 

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'PaymentHistory',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="PaymentHistory[pmhs_id]" value="<?php echo $model->pmhs_id; ?>">
<input type="hidden" name="PaymentHistory[cntr_id]" value="<?php echo $model->cntr_id; ?>">


<div class="row"><div class="row-column">Дата платежа: </div><div class="row-column"><div id="date" name="PaymentHistory[date]"><?php echo $form->error($model, 'date'); ?></div></div></div>
<div class="row"><div class="row-column">Сумма: </div><div class="row-column"><div id="sum" name="PaymentHistory[sum]"><?php echo $form->error($model, 'sum'); ?></div></div></div>
<div style="padding-bottom: 10px; margin-top: 10px; border: 1px solid #ddd;">
    <h2 style="font-size: 0.9em; margin: 0 10px 0 5px;">Период оплаты</h2>
    <div class="row">
        <div class="row-column">с: </div><div class="row-column"><div id="month_start" name="PaymentHistory[month_start]"><?php echo $form->error($model, 'month_start'); ?></div></div>
        <div class="row-column"><div id="year_start" name="PaymentHistory[year_start]"  name="PaymentHistory[year_start]"></div></div>    
    </div>
    <div class="row">
        <div class="row-column">по: </div><div class="row-column"><div id="month_end" name="PaymentHistory[month_end]"><?php echo $form->error($model, 'month_end'); ?></div></div>
        <div class="row-column"><div id="year_end" name="PaymentHistory[year_end]"  name="PaymentHistory[year_end]"></div></div>    
    </div>
</div>
<div class="row"><div class="row-column">Примечание: <textarea type="text" id="note" name="PaymentHistory[note]"></textarea></div></div>

<?php $this->endWidget(); ?>