<script>
    function Close() {
        $("#MaterialEditForm").aldialog("HideContent");
    };
    
    function Create() {
        
        
        $("#edRepr_id_Mat").aledit("SetValue", Repr_id);
        $.ajax({
            url: '<?php echo Yii::app()->createUrl('RepairMaterials/Create'); ?>',
            type: 'POST',
            data: $("#RepairMaterials").serialize(), 
            async: true,
            success: function(Res){
                $("#RepairMaterialsGrid").algridajax("Load");
                Close();
            }
        });
    };
    
    function Update() {
        
        
        
        $.ajax({
            url: '<?php echo Yii::app()->createUrl('RepairMaterials/Update'); ?>',
            type: 'POST',
            data: $("#RepairMaterials").serialize(), 
            async: true,
            success: function(Res){
                $("#RepairMaterialsGrid").algridajax("Load");
                Close();
            }
        });
    };
    
        
    $(document).ready(function(){
        
    });
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'RepairMaterials',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edRepairMaterial_id',
        'Value' => $model->RepairMaterial_id,
        'Name' => 'RepairMaterials[RepairMaterial_id]',
        'Visible' => false,
    ));
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edRepr_id_Mat',
        'Value' => $model->Repr_id,
        'Name' => 'RepairMaterials[Repr_id]',
        'Visible' => false,
    ));
?>

<div style="float: left; width: 100%">
    <div>Оборудование</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbEquip',
                'Stretch' => true,
                'ModelName' => 'Equips',
                'Height' => 300,
                'Width' => 300,
                'Name' => 'RepairMaterials[Eqip_id]',
                'Key' => 'cmbEquip_RepairMaterials',
                'KeyField' => 'Equip_id',
                'KeyValue' => $model->Eqip_id,
                'FieldName' => 'EquipName',
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'e.EquipName like \':Value%\'',
                ),
                'Columns' => array(
                    'EquipName' => array(
                        'Name' => 'Оборудование',
                        'FieldName' => 'EquipName',
                        'Width' => 300,

                    ),
                ),
            ));
        ?>
    </div>
    <div>Кол-во</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edRepairQuant',
                'Value' => $model->Quant,
                'Name' => 'RepairMaterials[Quant]',
                'Visible' => true,
            ));
        ?>
    </div>
    <div style="margin-top: 16px;">
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'BtnMaterialSave',
                    'Width' => 124,
                    'Height' => 30,
                    'Text' => 'Сохранить',
                    'Type' => 'None',
                    'OnAfterClick' => $action,
                ));
            ?>
        </div>
        <div style="float: right;">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'BtnMaterialCancel',
                    'Width' => 124,
                    'Height' => 30,
                    'Text' => 'Отмена',
                    'Type' => 'None',
                    'OnAfterClick' => 'Close();',
                ));
            ?>
        </div>
    </div>
</div>

<?php $this->endWidget(); ?>
