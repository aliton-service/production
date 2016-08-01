<script type="text/javascript">
    
    $(document).ready(function () {
        
        
        $("#SystemStatementsName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Имя"}));
        $("#Coefficient").jqxNumberInput({ width: '250px', height: '25px', inputMode: 'simple' });
        $("#SaveNewSystemStatements").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewSystemStatements").on('click', function ()
        {
            $('#SystemStatements').submit();
        });
        
        var Demand = {
            Coefficient: '<?php echo $model->Coefficient; ?>'
        };

        if (Demand.Region_id != '') $("#Coefficient").jqxNumberInput('val', Demand.Coefficient);
        
    });   
</script>

<?php
/* @var $this SystemStatementsController */
/* @var $model SystemStatements */
/* @var $form CActiveForm */
    
?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'SystemStatements',
            'htmlOptions'=>array(
                    'class'=>'form-inline',
                    ),
     )); 

?>
    <div class="row">Сложность системы: <br/><input name="SystemStatements[SystemStatementsName]" type="text" id="SystemStatementsName" value="<?php echo $model->SystemStatementsName; ?>"></div>
    <div class="row" style="width: 300px;">Коэффициент: <div id='Coefficient' name="SystemStatements[Coefficient]"  class="row-column"></div><?php echo $form->error($model, 'Coefficient'); ?></div>
    <br/>
    <div class="row-column"><input type="button" value="Сохранить" id='SaveNewSystemStatements' /></div>


<?php $this->endWidget(); ?>
