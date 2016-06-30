<script>
    
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Streets',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edStreet_id',
        'Width' => 100,
        'Type' => 'String',
        'Name' => 'Streets[Street_id]',
        'Value' => $model->Street_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>

<div style="float: left; width: 200px">Регион:</div>
<div style="float: left; ">
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'Region_id',
            'Key' => 'Streets_Update_Region_id',
            'ModelName' => 'Regions',
            'Name' => 'Streets[Region_id]',
            'FieldName' => 'RegionName',
            'KeyField' => 'Region_id',
            'KeyFieldPrefix' => 't.',
            'KeyValue' => $model->Region_id,
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => "r.RegionName like ':Value%'",
                ),
            'Width' => 300,
            'Columns' => array(
                'RegionName' => array(
                    'Name' => 'Регион',
                    'FieldName' => 'RegionName',
                    'Width' => 250,
                ),
            ),
        ));
    ?>
</div>
<div><?php echo $form->error($model, 'Region_id'); ?></div>
<div style="clear: both"></div>

<div style="float: left; width: 200px; margin-top: 6px;">Наименование:</div>
<div style="float: left; margin-top: 6px; ">
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edStreetName',
            'Width' => 280,
            'Type' => 'String',
            'Value' => $model->StreetName,
            'Name' => 'Streets[StreetName]',
    ));
?>
</div>
<div><?php echo $form->error($model, 'StreetName'); ?></div>
<div style="clear: both"></div>
<div style="float: left; width: 200px; margin-top: 6px;">Тип улицы:</div>
<div style="float: left; margin-top: 6px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'StreetType_id',
            'Key' => 'Streets_Update_StreetType_id',
            'ModelName' => 'Streettypes',
            'Name' => 'Streets[StreetType_id]',
            'FieldName' => 'StreetType',
            'KeyField' => 'StreetType_id',
            'KeyFieldPrefix' => 't.',
            'KeyValue' => $model->StreetType_id,
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => "st.StreetType like ':Value%'",
                ),
            'Width' => 300,
            'Columns' => array(
                'StreetType' => array(
                    'Name' => 'Тип улицы',
                    'FieldName' => 'StreetType',
                    'Width' => 100,
                ),
            ),
        ));
    ?>
</div>
<div><?php echo $form->error($model, 'StreetType_id'); ?></div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px;">
    <div style="float: left;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'SaveStreet',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'Streets',
                'Type' => 'Form',
            ));
        ?>
    </div> 
</div>
<?php $this->endWidget(); ?>

