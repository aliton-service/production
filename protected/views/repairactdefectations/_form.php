<script>
    
    Aliton.Links.push({
        Out: "cmbRepair",
        In: "edObjectId",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Number",
        Name: "cmbRepair_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbRepair",
        In: "edAddr",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Addr",
        Name: "cmbRepair_Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    function RepairChange() {
        if (alcomboboxajaxSettings["cmbRepair"].CurrentRow !== null && alcomboboxajaxSettings["cmbRepair"].CurrentRow != undefined)
            $("#cmbEquip").alcomboboxajax("SetValue", alcomboboxajaxSettings["cmbRepair"].CurrentRow["Eqip_id"]);
    };
</script>
<?php

    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'RepairActDefectations',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
     ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edDocm_id',
        'Name' => 'RepairActDefectations[Docm_id]',
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
            'Name' => 'RepairActDefectations[Number]',
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
            'Name' => 'RepairActDefectations[Date]',
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
                'Name' => 'RepairActDefectations[Repr_id]',
                'FieldName' => 'Number',
                'KeyField' => 'Repr_id',
                'KeyValue' => $model->Repr_id,
                'Width' => 120,
                'PopupWidth' => 700,
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'r.Number like \':Value%\'',
                ),
                'OnAfterChange' => 'RepairChange();',
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
    <div style="float: left">Адрес</div>
    <div style="float: left; margin-left: 6px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edAddr',
                'Name' => 'RepairActDefectations[Addr]',
                'Width' => 310,
                'Value' => $model->Addr,
                'ReadOnly' => true,
            ));
        ?>
        
        <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edObjectId',
            'Name' => 'RepairActDefectations[Objc_id]',
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
                'Name' => 'RepairActDefectations[Equip_id]',
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
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Дефекты выявленные в ходе обследования</div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <?php 
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edDefect',
                'Width' => 600,
                'Height' => 100,
                'Name' => 'RepairActDefectations[Defect]',
                'Value' => $model->Defect,
                'Type' => 'String',
                'ReadOnly' => false,
            ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Заключение инженера ПРЦ</div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <?php 
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edResult',
                'Width' => 600,
                'Height' => 100,
                'Name' => 'RepairActDefectations[Result]',
                'Value' => $model->Result,
                'Type' => 'String',
                'ReadOnly' => false,
            ));
        ?>
    </div>
</div>
<div style="clear: both; margin-bottom: 6px"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Инженер ПРЦ</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbEmpl',
                'ModelName' => 'Employees',
                'Name' => 'RepairActDefectations[Empl_id]',
                'FieldName' => 'ShortName',
                'KeyField' => 'Employee_id',
                'KeyValue' => $model->Empl_id,
                'Width' => 500,
                'PopupWidth' => 340,
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'e.EmployeeName like \':Value%\'',
                ),
                'Columns' => array(
                    'EmployeeName' => array(
                        'Name' => 'ФИО',
                        'FieldName' => 'EmployeeName',
                        'Width' => 280,
                    ),
                ),
            ));
        ?>

    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Заключение согласуещего</div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <?php 
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edHeadComment',
                'Width' => 600,
                'Height' => 100,
                'Name' => 'RepairActDefectations[HeadComment]',
                'Value' => $model->HeadComment,
                'Type' => 'String',
                'ReadOnly' => false,
            ));
        ?>
    </div>
</div>
<div style="clear: both; margin-bottom: 6px"></div>
<div style="float: left;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnSave',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Сохранить',
            'FormName' => 'RepairActDefectations',
            'Type' => 'Form',
            'OnAfterClick' => 'albuttonSettings["BtnSave"].Enabled = false;',
        ));
    ?>
</div>


<?php $this->endWidget(); ?>