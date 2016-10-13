<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var CostCalcSalary = {
            ccsl_id: '<?php echo $model->ccsl_id; ?>',
            empl_id: '<?php echo $model->empl_id; ?>',
            price: '<?php echo $model->price; ?>',
        };
        
        $('#CostCalcSalarys').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var EmployeesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        
        $("#EmployeesCCS").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeesDataAdapter, displayMember: "EmployeeName", valueMember: "Employee_id", width: 345 }));
        $("#PriceCCS").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, min: 0, decimalDigits: 2 }));
        
        $('#btnSaveCostCalcSalary').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelCostCalcSalary').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelCostCalcSalary').on('click', function(){
            $('#CostCalcDetailsDialog').jqxWindow('close');
        });
        
        $('#btnSaveCostCalcSalary').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('CostCalcSalarys/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#CostCalcSalarys').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('ccsl_id', Res.id, '#CostCalcSalarysGrid', true);
                        $('#CostCalcDetailsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyCostCalcDetailsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (CostCalcSalary.empl_id != '') $("#EmployeesCCS").jqxComboBox('val', CostCalcSalary.empl_id);
        if (CostCalcSalary.price != '') $("#PriceCCS").jqxNumberInput('val', CostCalcSalary.price);
        
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'CostCalcSalarys',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="CostCalcSalarys[ccsl_id]" value="<?php echo $model->ccsl_id; ?>"/>
<input type="hidden" name="CostCalcSalarys[calc_id]" value="<?php echo $model->calc_id; ?>"/>

<div class="row">
    <div class="row-column">Сотрудник: <div id="EmployeesCCS" name="CostCalcSalarys[empl_id]"></div><?php echo $form->error($model, 'empl_id'); ?></div>
    <div class="row-column" style="margin-left: 10px;">Сумма: <div id="PriceCCS" name="CostCalcSalarys[price]"></div><?php echo $form->error($model, 'price'); ?></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveCostCalcSalary'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelCostCalcSalary'/></div>
</div>
<?php $this->endWidget(); ?>



