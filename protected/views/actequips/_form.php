<script>
    Aliton.Links.push({
        Out: "cmbEquip",
        In: "edUmName",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "NameUnitMeasurement",
        Name: "Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
</script>

<?php

    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'ActEquips',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
     )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edDocm_id',
        'Value' => $model->docm_id,
        'Name' => 'ActEquips[docm_id]',
        'Visible' => false,
    ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
        'id' => 'edToProduction',
        'Label' => 'В производство',
        'Checked' => $model->ToProduction,
        'Name' => 'ActEquips[ToProduction]',
        'Visible' => false,
    ));
?>

<div style="float: left">
    <div>Оборудование</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbEquip',
                'Stretch' => true,
                'ModelName' => 'EquipForWhActs',
                'Height' => 300,
                'Width' => 300,
                'Name' => 'ActEquips[eqip_id]',
                'Key' => 'ActEquips_IU_cmbEquip',
                'KeyField' => 'Equip_id',
                'KeyValue' => $model->eqip_id,
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
    <div><?php echo $form->error($model, 'eqip_id'); ?></div>
</div>

<div style="float: left; margin-left: 6px">
    <div>Ед. изм.</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edUmName',
                'Width' => 50,
                'ReadOnly' => true,
            ));
        ?>
    </div>
</div>

<div style="float: left; margin-left: 6px">
    <div>Количество</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edQuant',
                'Width' => 150,
                'Name' => 'ActEquips[docm_quant]',
                'Value' => $model->docm_quant,
                'ReadOnly' => false,
            ));
        ?>
    </div>
    <div><?php echo $form->error($model, 'docm_quant'); ?></div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-left: 0px; margin-top: 12px">
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                'id' => 'edUsed',
                'Label' => 'Б\У',
                'Checked' => $model->used,
                'Name' => 'ActEquips[used]',
            ));
        ?>
    </div>
</div>
<div style="float: left; margin-left: 236px; margin-top: 12px">
    <div style="float: left">Факт. кол-во</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edFactQuant',
                'Width' => 150,
                'Name' => 'ActEquips[fact_quant]',
                'Value' => $model->fact_quant,
                'ReadOnly' => false,
            ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 12px">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnSave',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Сохранить',
            'FormName' => 'ActEquips',
            'Type' => 'Form',
        ));
    ?>
</div>

<?php $this->endWidget(); ?>

