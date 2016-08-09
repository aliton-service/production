<script type="text/javascript">
    
    $(document).ready(function () {
        
        
        $("#RegionName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Имя"}));
        $("#RegionSort").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Сортировка", width: 100}));
        $("#SaveNewRegion").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewRegion").on('click', function ()
        {
            $('#Regions').submit();
        });
        
    });   
</script>

<?php
/* @var $this RegionsController */
/* @var $model Regions */
/* @var $form CActiveForm */
    
?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'Regions',
            'htmlOptions'=>array(
                    'class'=>'form-inline',
                    ),
     )); 

?>
    <div class="row">Название региона: <input name="Regions[RegionName]" type="text" id="RegionName" value="<?php echo $model->RegionName; ?>"><?php echo $form->error($model, 'RegionName'); ?></div>
    <div class="row">Порядок: <input name="Regions[Sort]" type="text" id="RegionSort" value="<?php echo $model->Sort; ?>"><?php echo $form->error($model, 'Sort'); ?></div>
    <br/>
    <div class="row-column"><input type="button" value="Сохранить" id='SaveNewRegion' /></div>


<?php $this->endWidget(); ?>
