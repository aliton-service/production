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
            'id' => 'RepairSRM',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
     ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edDocm_id',
        'Name' => 'RepairSRM[Docm_id]',
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
            'Name' => 'RepairSRM[Number]',
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
            'Name' => 'RepairSRM[Date]',
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
                'Name' => 'RepairSRM[Repr_id]',
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
                'Name' => 'RepairSRM[Addr]',
                'Width' => 310,
                'Value' => $model->Addr,
                'ReadOnly' => true,
            ));
        ?>
        
        <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edObjectId',
            'Name' => 'RepairSRM[Objc_id]',
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
                'Name' => 'RepairSRM[Equip_id]',
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
    <div style="float: left">СРМ</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbSupplier',
                'ModelName' => 'Suppliers',
                'Name' => 'RepairSRM[Splr_id]',
                'FieldName' => 'NameSupplier',
                'KeyField' => 'Supplier_id',
                'KeyValue' => $model->Splr_id,
                'Width' => 320,
                'PopupWidth' => 340,
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 's.NameSupplier like \':Value%\'',
                ),
                'Columns' => array(
                    'EquipName' => array(
                        'Name' => 'Поставщик',
                        'FieldName' => 'NameSupplier',
                        'Width' => 280,
                    ),
                ),
            ));
        ?>

    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px; margin-left: 0px;">
    <div style="float: left">Контактное лицо</div>
    <div style="float: left; margin-left: 6px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edContact',
                'Name' => 'RepairSRM[Contact]',
                'Width' => 210,
                'Value' => $model->Contact,
                'ReadOnly' => true,
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 8px">
        <div style="float: left">Контакты отправителя</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbEmpl',
                    'ModelName' => 'Employees',
                    'Name' => 'RepairSRM[Empl_id]',
                    'FieldName' => 'ShortName',
                    'KeyField' => 'Employee_id',
                    'KeyValue' => $model->Empl_id,
                    'Width' => 200,
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
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px; margin-left: 0px;">
    <div style="float: left; margin-left: 0px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                'id' => 'edDiagnosticPay',
                'Label' => 'Диагн. за счет клиента',
                'Name' => 'RepairSRM[DiagnosticPay]',
                'Checked' => $model->DiagnosticPay,
            ));
        ?>
    </div>        
    <div style="float: left; margin-left: 6px;">Сумма диагностики</div>
    <div style="float: left; margin-left: 6px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edDiagnosticSum',
                'Width' => 100,
                'Name' => 'RepairSRM[DiagnosticSum]',
                'Value' => $model->DiagnosticSum,
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px;">Стоимость ремонта</div>
    <div style="float: left; margin-left: 6px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edRepairSum',
                'Width' => 100,
                'Name' => 'RepairSRM[RepairSum]',
                'Value' => $model->RepairSum,
            ));
        ?>
    </div>
</div>    
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Заявленная неисправность</div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <?php 
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edDefect',
                'Width' => 600,
                'Height' => 100,
                'Name' => 'RepairSRM[Defect]',
                'Value' => $model->Defect,
                'Type' => 'String',
                'ReadOnly' => false,
            ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left">Неисправность для СРМ</div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <?php 
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edResult',
                'Width' => 600,
                'Height' => 100,
                'Name' => 'RepairSRM[Result]',
                'Value' => $model->Result,
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
            'FormName' => 'RepairSRM',
            'Type' => 'Form',
            'OnAfterClick' => 'albuttonSettings["BtnSave"].Enabled = false;',
        ));
    ?>
</div>


<?php $this->endWidget(); ?>