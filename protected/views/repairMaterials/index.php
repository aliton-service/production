<script>
    function Add_RepairMaterials() {
        aldialogSettings['ContentUrl'] = '<?php echo Yii::app()->createUrl('Repairmaterials/Create')?>';
        $("#MaterialEditForm").aldialog("Show", null, true);
    };

    function Update_RepairMaterials() {
        var RepairMaterial_id = algridajaxSettings['RepairMaterialsGrid'].CurrentRow['RepairMaterial_id'];
        aldialogSettings['MaterialEditForm'].ContentUrl = '<?php echo Yii::app()->createUrl('Repairmaterials/Update')?>';
        var Params = [];
        Params['RepairMaterial_id'] = RepairMaterial_id;
        $("#MaterialEditForm").aldialog("Show", Params, true);
    };
    
    function Delete_RepairMaterials() {
        var RepairMaterial_id = algridajaxSettings['RepairMaterialsGrid'].CurrentRow['RepairMaterial_id'];
        $.ajax({
            url: '<?php echo Yii::app()->createUrl('RepairMaterials/Delete'); ?>' + '&RepairMaterial_id=' + RepairMaterial_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairMaterialsGrid").algridajax("Load");
            }
        });
    };
    
    function ClearForm() {
        delete aleditSettings['edRepairMaterial_id'];
        delete aleditSettings['edRepr_id_Mat'];
        delete alcomboboxajaxSettings['cmbEquip'];
        delete aleditSettings['edRepairQuant'];
        
        console.log('Clear');
    };
    
    Aliton.Links.push({
        Out: "edRepr_id",
        In: "RepairMaterialsGrid",
        TypeControl: "Grid",
        Condition: "rm.Repr_id = :Value",
        Name: "Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
        
</script>    
<div style="float: left; width: 100%">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'RepairMaterialsGrid',
            'Stretch' => true,
            'Key' => 'RepairMaterials_Index_RepairMaterialsGrid',
            'ModelName' => 'RepairMaterials',
            'ShowFilters' => true,
            'Height' => 200,
            'Width' => 500,
            'Columns' => array(
                    'EquipName' => array(
                            'Name' => 'Наименование',
                            'FieldName' => 'EquipName',
                            'Width' => 250,
                            'Filter' => array(
                                    'Condition' => 'rm.EquipName Like \':Value%\'',
                            ),
                            'Sort' => array(
                                    'Up' => 'rm.EquipName desc',
                                    'Down' => 'rm.EquipName',
                            ),
                    ),
                    'UmName' => array(
                            'Name' => 'Ед. изм.',
                            'FieldName' => 'UmName',
                            'Width' => 100,
                            'Filter' => array(
                                    'Condition' => 'rm.UmName Like \':Value%\'',
                            ),
                            'Sort' => array(
                                    'Up' => 'rm.UmName desc',
                                    'Down' => 'rm.UmName',
                            ),
                    ),
                    'Quant' => array(
                            'Name' => 'Кол-во',
                            'FieldName' => 'Quant',
                            'Width' => 100,
                            'Filter' => array(
                                    'Condition' => 'rm.Quant = :Value',
                            ),
                            'Sort' => array(
                                    'Up' => 'rm.Quant desc',
                                    'Down' => 'rm.Quant',
                            ),
                    ),
                    'SumPriceLow' => array(
                            'Name' => 'Сумма',
                            'FieldName' => 'SumPriceLow',
                            'Width' => 100,
                            'Filter' => array(
                                    'Condition' => 'rm.SumPriceLow = :Value',
                            ),
                            'Sort' => array(
                                    'Up' => 'rm.SumPriceLow desc',
                                    'Down' => 'rm.SumPriceLow',
                            ),
                    ),
            ),
        ));
    ?>
</div>
<div style="clear: both; margin-top: 6px;"></div>
<div style="float: left; width: 100%">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnAddMaterial',
                'Width' => 144,
                'Height' => 30,
                'Text' => 'Добавить',
                'Type' => 'None',
                'OnAfterClick' => 'Add_RepairMaterials()',
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 10px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnEditMaterial',
                'Width' => 144,
                'Height' => 30,
                'Text' => 'Изменить',
                'Type' => 'None',
                'OnAfterClick' => 'Update_RepairMaterials()',
            ));
        ?>
    </div>
    <div style="float: right; margin-left: 10px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnDelMaterial',
                'Width' => 144,
                'Height' => 30,
                'Text' => 'Удалить',
                'Type' => 'None',
                'OnAfterClick' => 'Delete_RepairMaterials()',
            ));
        ?>
    </div>
</div>
<div style="clear: both; margin-top: 6px;"></div>
<?php
    $this->widget('application.extensions.alitonwidgets.dialog.aldialog', array(
        'id' => 'MaterialEditForm',
        'Width' => 400,
        'Height' => 150,
        'ContentUrl' => Yii::app()->createUrl('RepairMaterials/Create'),
        'OnClose' => 'ClearForm();',
    ));
?>
<div style="clear: both; margin-top: 6px;"></div>
