<div>
<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'ActEquipsGrid',
        'Stretch' => true,
        'Key' => 'ActsEquips_Index_ActEquipsGrid',
        'ModelName' => 'ActEquips_v',
        'ShowFilters' => true,
        'Height' => 230,
        'Width' => 500,
        'OnDblClick' => '',
        'Filters' => array(
            array(
                'Type' => 'Internal',
                'Control' => 'Form',
                'Condition' => 'd.docm_id = ' . $docm_id,
                'Value' => '',
                'Name' => 'Form1',
            ),
        ),
        'Columns' => array(
            'EquipName' => array(
                'Name' => 'Оборудование',
                'FieldName' => 'EquipName',
                'Width' => 100,
            ),
            'NameUnitMeasurement' => array(
                'Name' => 'Ед. изм.',
                'FieldName' => 'NameUnitMeasurement',
                'Width' => 50,
            ),
            'NameUnitMeasurement' => array(
                'Name' => 'Ед. изм.',
                'FieldName' => 'NameUnitMeasurement',
                'Width' => 50,
            ),
            'fact_quant' => array(
                'Name' => 'Кол-во',
                'FieldName' => 'fact_quant',
                'Width' => 50,
            ),
            'used' => array(
                'Name' => 'Б\У',
                'FieldName' => 'used',
                'Width' => 25,
            ),
            'SN' => array(
                'Name' => 'Серийные номера',
                'FieldName' => 'SN',
                'Width' => 100,
            ),
            'number' => array(
                'Name' => 'Номер требования',
                'FieldName' => 'number',
                'Width' => 90,
            ),
            'date' => array(
                'Name' => 'Дата требования',
                'FieldName' => 'date',
                'Width' => 120,
                'Format' => 'd.m.Y',
            ),
        ),
    ));
?>
</div>
<div style="margin-top: 12px">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AddWhActEquips',
                'Width' => 134,
                'Height' => 30,
                'Text' => 'Добавить',
                'Href' => Yii::app()->createUrl('ActEquips/insert', array('docm_id' => $docm_id)),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditWhActEquips',
                'Width' => 134,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('ActEquips/update', array('docm_id' => $docm_id)),
                'Params' => array(
                    array(
                        'ParamName' => 'dadt_id',
                        'NameControl' => 'ActEquipsGrid',
                        'TypeControl' => 'Grid',
                        'FieldControl' => 'dadt_id',
                    ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DeleteWhActEquips',
                'Width' => 134,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('ActEquips/delete', array('docm_id' => $docm_id)),
                'Params' => array(
                    array(
                        'ParamName' => 'dadt_id',
                        'NameControl' => 'ActEquipsGrid',
                        'TypeControl' => 'Grid',
                        'FieldControl' => 'dadt_id',
                    ),
                ),
            ));
        ?>
    </div>
</div>


