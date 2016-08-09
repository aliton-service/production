<script type="text/javascript">
    
    $(document).ready(function () {
        
        
        $("#SystemComplexitysName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Имя"}));
        $("#Coefficient").jqxNumberInput({ width: '120px', height: '25px', inputMode: 'simple' });
        $("#SaveNewSystemComplexitys").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewSystemComplexitys").on('click', function ()
        {
            $('#SystemComplexitys').submit();
        });
        
        var Demand = {
            Coefficient: '<?php echo $model->Coefficient; ?>'
        };

        if (Demand.Coefficient != '') $("#Coefficient").jqxNumberInput('val', Demand.Coefficient);
        
    });   
</script>

<?php
/* @var $this SystemComplexitysController */
/* @var $model SystemComplexitys */
/* @var $form CActiveForm */
    
?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'SystemComplexitys',
            'htmlOptions'=>array(
                    'class'=>'form-inline',
                    ),
     )); 

?>
    <div class="row">Сложность системы: <br/><input name="SystemComplexitys[SystemComplexitysName]" type="text" id="SystemComplexitysName" value="<?php echo $model->SystemComplexitysName; ?>"></div>
    <div class="row" style="width: 300px;">Коэффициент: <br/><div id='Coefficient' name="SystemComplexitys[Coefficient]"  class="row-column"></div><?php echo $form->error($model, 'Coefficient'); ?></div>
    <br/>
    <div class="row-column"><input type="button" value="Сохранить" id='SaveNewSystemComplexitys' /></div>


<?php $this->endWidget(); ?>
