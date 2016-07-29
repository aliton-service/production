<script type="text/javascript">
    
    $(document).ready(function () {
        
        var DataRegionName = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListRegionsMin, {}));
        var DataStreetType = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListStreetTypesMin, {}));
        
        $("#cmbRegionName").jqxComboBox({ source: DataRegionName, width: '300', height: '25px', displayMember: "RegionName", valueMember: "Region_id" });
        $("#cmbStreetType").jqxComboBox({ source: DataStreetType, width: '300', height: '25px', displayMember: "StreetType", valueMember: "StreetType_id" });
        
        $("#StreetName").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Название улицы"}));
        
        $("#SaveNewStreet").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewStreet").on('click', function ()
        {
            $('#Streets').submit();
        });
        
        var Demand = {
            Region_id: '<?php echo $model->Region_id; ?>',
            StreetType_id: '<?php echo $model->StreetType_id; ?>',
        };

        if (Demand.Region_id != '') $("#cmbRegionName").jqxComboBox('val', Demand.Region_id);
        if (Demand.StreetType_id != '') $("#cmbStreetType").jqxComboBox('val', Demand.StreetType_id);
    });   
</script>

<?php
/* @var $this StreetsController */
/* @var $model Streets */
/* @var $form CActiveForm */
?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'Streets',
        'htmlOptions'=>array(
            'class'=>'form-inline',
            ),
     )); 
?>

    <div class="row" style="width: 300px;">Регион: <div id='cmbRegionName' name="Streets[Region_id]"  class="row-column"></div></div>
    <div class="row">Улица: <br/><input name="Streets[StreetName]" type="text" id="StreetName" value="<?php echo $model->StreetName; ?>" ></div>
    <div class="row" style="width: 300px;">Тип улицы: <div id='cmbStreetType' name="Streets[StreetType_id]" class="row-column"></div></div>
    
    <br/>
    <div class="row-column"><input type="button" value="Сохранить" id='SaveNewStreet' /></div>


<?php $this->endWidget(); ?>
