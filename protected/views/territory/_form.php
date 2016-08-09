<script type="text/javascript">
    
    $(document).ready(function () {
        
        
        $("#Territ_Name").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Название участка"}));
        $("#Note").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Примечание"}));
        $("#SaveNewTerritory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewTerritory").on('click', function ()
        {
            $('#Territory').submit();
        });
        
    });   
</script>

<?php
/* @var $this TerritoryController */
/* @var $model Territory */
/* @var $form CActiveForm */
    
?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'Territory',
        'htmlOptions'=>array(
                'class'=>'form-inline',
                ),
     )); 

?>
    <div class="row">Название участка: <input name="Territory[Territ_Name]" type="text" id="Territ_Name" value="<?php echo $model->Territ_Name; ?>"><?php echo $form->error($model, 'Territ_Name'); ?></div>
    <div class="row">Примечание: <input name="Territory[Note]" type="text" id="Note" value="<?php echo $model->Note; ?>"><?php echo $form->error($model, 'Note'); ?></div>
    <br/>
    <div class="row-column"><input type="button" value="Сохранить" id='SaveNewTerritory' /></div>


<?php $this->endWidget(); ?>
