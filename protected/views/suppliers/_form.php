<script>
    
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Suppliers',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edSupplier_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'Suppliers[Supplier_id]',
        'Value' => $model->Supplier_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<div style="float: left; width: 200px">Наименование</div>
<div style="float: left; ">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edNameSupplier',
            'Width' => 280,
            'Type' => 'String',
            'Value' => $model->NameSupplier,
            'Name' => 'Suppliers[NameSupplier]',
    ));
?>
</div>
<div><?php echo $form->error($model, 'NameSupplier'); ?></div>
<div style="clear: both"></div>
<div style="float: left; width: 200px; margin-top: 6px">Адрес</div>
<div style="float: left;; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edAdress',
            'Width' => 320,
            'Type' => 'String',
            'Value' => $model->Adress,
            'Name' => 'Suppliers[Adress]',
    ));
?>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 200px; margin-top: 6px">Телефон</div>
<div style="float: left;; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edTel',
            'Width' => 180,
            'Type' => 'String',
            'Value' => $model->Tel,
            'Name' => 'Suppliers[Tel]',
    ));
?>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 200px; margin-top: 6px">Контактное лицо</div>
<div style="float: left;; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edContact',
            'Width' => 320,
            'Type' => 'String',
            'Value' => $model->ContactFace,
            'Name' => 'Suppliers[ContactFace]',
    ));
?>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 200px; margin-top: 6px"></div>
<div style="float: left">
    <div style="width: 200px; margin-top: 6px">Дата посл. контакта</div>
    <div style="float: left;; margin-top: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDateLastContact',
                'Width' => 140,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateLastContact),
                'Name' => 'Suppliers[DateLastContact]',
        ));
    ?>
    </div>
</div>
<div style="float: left">
    <div style="width: 200px; margin-top: 6px">Дата посл. закупки</div>
    <div style="float: left;; margin-top: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDateLastPurchase',
                'Width' => 140,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateLastPurchase),
                'Name' => 'Suppliers[DateLastPurchase]',
        ));
    ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left;">
    <div style="float: left; margin-top: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'edSupplier',
                    'Label' => 'Поставщик',
                    'Checked' => $model->Supplier,
                    'Name' => 'Suppliers[Supplier]',
            ));
        ?>
    </div>
    <div style="float: left; margin-top: 6px; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'edProducer',
                    'Label' => 'Производитель',
                    'Checked' => $model->Producer,
                    'Name' => 'Suppliers[Producer]',
            ));
        ?>
    </div>
    <div style="float: left; margin-top: 6px; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'edRepair',
                    'Label' => 'СРМ',
                    'Checked' => $model->Repair,
                    'Name' => 'Suppliers[Repair]',
            ));
        ?>
    </div>
    <div style="clear: both"><?php echo $form->error($model, 'Supplier'); ?></div>
</div>
<div style="clear: both"></div>
<div style="width: 200px; margin-top: 6px">Полное наименование</div>
<div style="float: left; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edFullName',
            'Width' => 320,
            'Type' => 'String',
            'Value' => $model->FullName,
            'Name' => 'Suppliers[FullName]',
    ));
?>
</div>
<div style="clear: both"></div>
<div style="width: 200px; margin-top: 6px">Примечание</div>
<div style="float: left; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edNote',
            'Width' => 320,
            'Type' => 'String',
            'Value' => $model->Note,
            'Name' => 'Suppliers[Note]',
    ));
?>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 60px; margin-top: 6px">ИНН</div>
<div style="float: left; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edINN',
            'Width' => 120,
            'Type' => 'String',
            'Value' => $model->inn,
            'Name' => 'Suppliers[inn]',
    ));
?>
</div>
<div style="float: left; width: 60px; margin-top: 6px; margin-left: 6px">КПП</div>
<div style="float: left; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edKPP',
            'Width' => 120,
            'Type' => 'String',
            'Value' => $model->kpp,
            'Name' => 'Suppliers[kpp]',
    ));
?>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 150px; margin-top: 6px">Расчетный счет</div>
<div style="float: left; margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edAccount',
            'Width' => 320,
            'Type' => 'String',
            'Value' => $model->account,
            'Name' => 'Suppliers[account]',
    ));
?>
</div>
<div style="clear: both"></div>
<div style="float: left; width: 150px; margin-top: 6px">Банк</div>
<div style="float: left; margin-top: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'CmbBank',
            'Stretch' => true,
            'Key' => 'Suppliers_Update_CmbBank',
            'ModelName' => 'Banks',
            'Name' => 'Suppliers[bank_id]',
            'ShowFilters' => false,
            'ShowPager' => false,
            'Height' => 300,
            'Width' => 450,
            'PopupWidth' => 500,
            'KeyField' => 'Bank_id',
            'KeyValue' => $model->bank_id,
            'FieldName' => 'bank_name',
            'Type' => array(
                'Mode' => 'Filter',
                'Type' => 'Internal',
                'Condition' => "b.bank_name like '%:Value%'",
                'Name' => 'Filter1'
            ),
            'Columns' => array(
                'bank_name' => array(
                    'Name' => 'Банк',
                    'FieldName' => 'bank_name',
                    'Width' => 400,
                ),
            ),
        ));
    ?>
</div>

<div style="clear: both"></div>
<div style="float: left; margin-top: 6px;">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'SaveSuppliers',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'Suppliers',
                'Type' => 'Form',
            ));
        ?>
    </div> 
</div>
<?php $this->endWidget(); ?>

