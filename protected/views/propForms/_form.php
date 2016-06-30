<script>
    Aliton.Links.push({
        Out: "CmbBank",
        In: "edCorAccount",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "cor_account",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "CmbBank",
        In: "edBik",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "bik",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'PropForms',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edForm_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'PropForms[Form_id]',
        'Value' => $model->Form_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<div style="margin-top: 16px"></div>
<div style="float: left;">
    <div style="float: left; width: 160px">Организация:</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edFormName',
                    'Width' => 280,
                    'Type' => 'String',
                    'Value' => $model->FormName,
                    'Name' => 'PropForms[FormName]',
            ));
        ?>
    </div>
    <div><?php echo $form->error($model, 'FormName'); ?></div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left; width: 160px">Форма собственности:</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'CmbFownName',
                'Stretch' => true,
                'Key' => 'PropForms_Update_CmbFownName',
                'ModelName' => 'FormsOfOwnership',
                'Name' => 'PropForms[fown_id]',
                'ShowFilters' => false,
                'ShowPager' => false,
                'Height' => 300,
                'Width' => 150,
                'PopupWidth' => 500,
                'KeyField' => 'fown_id',
                'KeyValue' => $model->fown_id,
                'FieldName' => 'name',
                'Type' => array(
                    'Mode' => 'Filter',
                    'Type' => 'Internal',
                    'Condition' => "fo.name like '%:Value%'",
                    'Name' => 'Filter1'
                ),
                'Columns' => array(
                    'name' => array(
                        'Name' => 'Форма собственности',
                        'FieldName' => 'name',
                        'Width' => 300,
                    ),
                ),
            ));
        ?>
    </div>
    <div><?php echo $form->error($model, 'fown_id'); ?></div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 8px">
    <div style="float: left; width: 160px">Юр.\Физ. лица</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'CmbLph',
                'Stretch' => true,
                'Key' => 'PropForms_Update_CmbLph',
                'ModelName' => 'Lph',
                'Name' => 'PropForms[lph_id]',
                'ShowFilters' => false,
                'ShowPager' => false,
                'Height' => 300,
                'Width' => 150,
                'PopupWidth' => 500,
                'KeyField' => 'LPh_id',
                'KeyValue' => $model->lph_id,
                'FieldName' => 'Name',
                'Type' => array(
                    'Mode' => 'Filter',
                    'Type' => 'Internal',
                    'Condition' => "l.Name like ':Value%'",
                    'Name' => 'Filter1'
                ),
                'Columns' => array(
                    'name' => array(
                        'Name' => 'Тип',
                        'FieldName' => 'Name',
                        'Width' => 300,
                    ),
                ),
            ));
        ?>
    </div>
    <div><?php echo $form->error($model, 'LPh_id'); ?></div>
</div>
<div style="float: left; margin-left: 6px; margin-top: 8px">
    <div style="text-align: center; float: left">Телефон:</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edTelephone',
                    'Width' => 150,
                    'Type' => 'String',
                    'Value' => $model->telephone,
                    'Name' => 'PropForms[telephone]',
            ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="margin-top: 6px; float: left">
    <div style="float: left; width: 40px">ИНН:</div>
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edINN',
                'Width' => 150,
                'Type' => 'String',
                'Name' => 'PropForms[inn]',
                'Value' => $model->inn,
                'ReadOnly' => false,
            ));
        ?>
    </div> 
</div>
<div style="margin-top: 6px; margin-left: 6px; float: left">
    <div style="float: left; width: 120px">Расчетный счет:</div>
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edAccount',
                'Width' => 250,
                'Type' => 'String',
                'Name' => 'PropForms[account]',
                'Value' => $model->account,
                'ReadOnly' => false,
            ));
        ?>
    </div> 
</div>
<div style="margin-top: 6px; margin-left: 6px; float: left">
    <div style="float: left; width: 40px">КПП:</div>
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edKPP',
                'Width' => 250,
                'Type' => 'String',
                'Name' => 'PropForms[kpp]',
                'Value' => $model->kpp,
                'ReadOnly' => false,
            ));
        ?>
    </div> 
</div>
<div style="clear: both"></div>
<div style="margin-top: 16px">Юридический адрес</div>
<div style="float: left; margin-top: 2px; border: 1px solid; padding: 6px">
    <div style="float: left; ">
        <div style="width: 60px">Регион</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbRegions',
                    'Stretch' => true,
                    'Key' => 'PropForms_Update_CmbRegions',
                    'ModelName' => 'Regions',
                    'Name' => 'PropForms[jregion]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 350,
                    'KeyField' => 'Region_id',
                    'KeyValue' => $model->jregion,
                    'FieldName' => 'RegionName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "r.RegionName like ':Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'RegionName' => array(
                            'Name' => 'Регион',
                            'FieldName' => 'RegionName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'jregion'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 60px">Район</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbAreas',
                    'Stretch' => true,
                    'Key' => 'PropForms_Update_CmbAreas',
                    'ModelName' => 'Areas',
                    'Name' => 'PropForms[jarea]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 350,
                    'KeyField' => 'Area_id',
                    'KeyValue' => $model->jarea,
                    'FieldName' => 'AreaName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "a.AreaName like ':Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'AreaName' => array(
                            'Name' => 'Район',
                            'FieldName' => 'AreaName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'jarea'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 60px">Улицы</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbStreet',
                    'Stretch' => true,
                    'Key' => 'PropForms_Update_CmbAreas',
                    'ModelName' => 'Streets',
                    'Name' => 'PropForms[jstreet]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 250,
                    'PopupWidth' => 350,
                    'KeyField' => 'Street_id',
                    'KeyValue' => $model->jstreet,
                    'FieldName' => 'StreetName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "st.StreetName like ':Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'StreetName' => array(
                            'Name' => 'Улица',
                            'FieldName' => 'StreetName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'jstreet'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 80px">Дом:</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edJHouse',
                    'Width' => 80,
                    'Type' => 'String',
                    'Name' => 'PropForms[jhouse]',
                    'Value' => $model->jhouse,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 80px">Корпус:</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edJCorp',
                    'Width' => 80,
                    'Type' => 'String',
                    'Name' => 'PropForms[jcorp]',
                    'Value' => $model->jcorp,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 80px">Помещение:</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edJRoom',
                    'Width' => 100,
                    'Type' => 'String',
                    'Name' => 'PropForms[jroom]',
                    'Value' => $model->jroom,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
</div>	
<div style="clear: both"></div>
<div style="margin-top: 16px">Фактический адрес</div>
<div style="float: left; margin-top: 2px; border: 1px solid; padding: 6px">
    <div style="float: left; ">
        <div style="width: 60px">Регион</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbFRegions',
                    'Stretch' => true,
                    'Key' => 'PropForms_Update_CmbFRegions',
                    'ModelName' => 'Regions',
                    'Name' => 'PropForms[fregion]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 350,
                    'KeyField' => 'Region_id',
                    'KeyValue' => $model->fregion,
                    'FieldName' => 'RegionName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "r.RegionName like ':Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'RegionName' => array(
                            'Name' => 'Регион',
                            'FieldName' => 'RegionName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'fregion'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 60px">Район</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbFAreas',
                    'Stretch' => true,
                    'Key' => 'PropForms_Update_CmbFAreas',
                    'ModelName' => 'Areas',
                    'Name' => 'PropForms[farea]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 350,
                    'KeyField' => 'Area_id',
                    'KeyValue' => $model->farea,
                    'FieldName' => 'AreaName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "a.AreaName like ':Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'AreaName' => array(
                            'Name' => 'Район',
                            'FieldName' => 'AreaName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'farea'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 60px">Улицы</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbFStreet',
                    'Stretch' => true,
                    'Key' => 'PropForms_Update_CmbFStreet',
                    'ModelName' => 'Streets',
                    'Name' => 'PropForms[fstreet]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 250,
                    'PopupWidth' => 350,
                    'KeyField' => 'Street_id',
                    'KeyValue' => $model->fstreet,
                    'FieldName' => 'StreetName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "st.StreetName like ':Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'StreetName' => array(
                            'Name' => 'Улица',
                            'FieldName' => 'StreetName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'fstreet'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 80px">Дом:</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edFHouse',
                    'Width' => 80,
                    'Type' => 'String',
                    'Name' => 'PropForms[fhouse]',
                    'Value' => $model->fhouse,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 80px">Корпус:</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edFCorp',
                    'Width' => 80,
                    'Type' => 'String',
                    'Name' => 'PropForms[fcorp]',
                    'Value' => $model->fcorp,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="width: 80px">Помещение:</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edFRoom',
                    'Width' => 100,
                    'Type' => 'String',
                    'Name' => 'PropForms[froom]',
                    'Value' => $model->froom,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px">
        <div style="width: 60px">Банк:</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbBank',
                    'Stretch' => true,
                    'Key' => 'PropForms_Update_CmbBank',
                    'ModelName' => 'Banks',
                    'Name' => 'PropForms[bank_id]',
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
        <div><?php echo $form->error($model, 'fstreet'); ?></div>
</div>
<div style="clear: both"></div>
    <div style="float: left; margin-top: 6px">Кор. счет:</div>
    <div style="float: left; margin-left: 6px; margin-top: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edCorAccount',
                    'Width' => 220,
                    'Type' => 'String',
            ));
        ?>
    </div>
</div>
<div style="float: left; margin-left: 6px; margin-top: 6px">
    <div style="text-align: center; float: left">БИК:</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edBik',
                    'Width' => 120,
                    'Type' => 'String',
            ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px;">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'SavePropForms',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'PropForms',
                'Type' => 'Form',
            ));
        ?>
    </div> 
</div>

<?php $this->endWidget(); ?>

