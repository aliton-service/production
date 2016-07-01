<script>
    
    
    
    function RepairChange() {
        if (alcomboboxajaxSettings["cmbRepair"].CurrentRow !== null && alcomboboxajaxSettings["cmbRepair"].CurrentRow != undefined)
            $("#cmbEquip").alcomboboxajax("SetValue", alcomboboxajaxSettings["cmbRepair"].CurrentRow["Eqip_id"]);
    };
</script>
<?php

    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'RepairActUtilizations',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
     ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edDocm_id',
        'Name' => 'RepairActUtilizations[Docm_id]',
        'Width' => 120,
        'Value' => $model->Docm_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>





<div style="float: left">Номер</div>
<div style="float: left; margin-left: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edNumber',
            'Name' => 'RepairActUtilizations[Number]',
            'Width' => 120,
            'Value' => $model->Number,
            'ReadOnly' => true,
        ));
    ?>
    
    
</div>

<div style="float: left; margin-left: 6px;">
    <div style="float: left;">Дата</div>
    <div style="float: left; margin-left: 6px;">
    <?php
        //echo 'Model: ' . $model->DateReg . ' Aliton: "' . DateTimeManager::YiiDateToAliton($model->DateReg) . '"';
        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
            'id' => 'edDate',
            'Name' => 'RepairActUtilizations[Date]',
            'Width' => 110,
            'Format' => 'd.m.Y',
            'Value' => DateTimeManager::YiiDateToAliton($model->Date),
            'ReadOnly' => false,
        ));
    ?>  
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Заявка на ремонт</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbRepair',
                'ModelName' => 'Repairs',
                'Name' => 'RepairActUtilizations[Repr_id]',
                'FieldName' => 'Number',
                'KeyField' => 'Repr_id',
                'KeyValue' => $model->Repr_id,
                'Width' => 120,
                'PopupWidth' => 700,
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'r.Number like \':Value%\'',
                ),
                //'OnAfterChange' => 'RepairChange();',
                'Columns' => array(
                    'Number' => array(
                        'Name' => 'Номер',
                        'FieldName' => 'Number',
                        'Width' => 80,
                    ),
                    'Date' => array(
                        'Name' => 'Дата',
                        'FieldName' => 'Date',
                        'Format' => 'd.m.Y',
                        'Width' => 80,
                    ),
                    'Addr' => array(
                        'Name' => 'Адрес',
                        'FieldName' => 'Addr',
                        'Width' => 200,
                    ),
                    'EquipName' => array(
                        'Name' => 'Оборудование',
                        'FieldName' => 'EquipName',
                        'Width' => 150,
                    ),
                ),
            ));
        ?>

    </div>
</div>
<div style="float: left; margin-top: 8px; margin-left: 8px;">
    
    <div style="float: left; margin-left: 6px;">
        <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edObjectId',
            'Name' => 'RepairActUtilizations[Objc_id]',
            'Width' => 100,
            'Value' => $model->Objc_id,
            'ReadOnly' => true,
            'Visible' => false,
        ));
    ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Оборудование</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbEquip',
                'ModelName' => 'Equips',
                'Name' => 'RepairActUtilizations[Equip_id]',
                'FieldName' => 'EquipName',
                'KeyField' => 'Equip_id',
                'KeyValue' => $model->Equip_id,
                'Width' => 320,
                'PopupWidth' => 340,
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'e.EquipName like \':Value%\'',
                ),
                'Columns' => array(
                    'EquipName' => array(
                        'Name' => 'Оборудование',
                        'FieldName' => 'EquipName',
                        'Width' => 280,
                    ),
                ),
            ));
        ?>

    </div>
</div>
<div style="clear: both; margin-top: 10px;"></div>
<div style="float: left">Хронологический возраст оборудования</div>
<div style="float: left; margin-left: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edEquipAge',
            'Name' => 'RepairActUtilizations[EquipAge]',
            'Width' => 120,
            'Value' => $model->EquipAge,
            'ReadOnly' => false,
        ));
    ?>
</div>
<div style="clear: both; margin-top: 10px;"></div>
<div style="float: left">Срок службы</div>
<div style="float: left; margin-left: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edEquipLifeTime',
            'Name' => 'RepairActUtilizations[EquipLifeTime]',
            'Width' => 120,
            'Value' => $model->EquipLifeTime,
            'ReadOnly' => false,
        ));
    ?>
</div>
<div style="clear: both; margin-top: 10px;"></div>
<div style="float: left">Совокупный износ</div>
<div style="float: left; margin-left: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edEquipWear',
            'Name' => 'RepairActUtilizations[EquipWear]',
            'Width' => 120,
            'Value' => $model->EquipWear,
            'ReadOnly' => false,
        ));
    ?>
</div>
<div style="clear: both; margin-top: 10px;"></div>
<div style="float: left">Физический износ</div>
<div style="float: left; margin-left: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edEquipFactWear',
            'Name' => 'RepairActUtilizations[EquipFactWear]',
            'Width' => 120,
            'Value' => $model->EquipFactWear,
            'ReadOnly' => false,
        ));
    ?>
</div>

<div style="clear: both; margin-bottom: 6px"></div>
<div style="float: left;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnSave',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Сохранить',
            'FormName' => 'RepairActUtilizations',
            'Type' => 'Form',
            'OnAfterClick' => 'albuttonSettings["BtnSave"].Enabled = false;',
        ));
    ?>
</div>


<?php $this->endWidget(); ?>