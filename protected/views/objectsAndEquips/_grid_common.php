<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'CommonObjectEquipsGrid',
        'Width' => 800,
        'Height' => 300,
        'Stretch' => true,
        'ModelName' => 'ObjectEquips',
        'Key' => 'ObjectsGroup_index_CommonObjectEquipsGrid',
        'Filters' => array(
            array(
                'Type' => 'Internal',
                'Condition' => 'o.Object_id = ' . $Object_id,
                'Control' => 'Form',
            ),
        ),
        'Columns' => array(
            'EquipName' => array(
                'Name' => 'Оборудование',
                'FieldName' => 'EquipName',
                'Width' => 200,
            ),
            'EquipQuant' => array(
                'Name' => 'Количество',
                'FieldName' => 'EquipQuant',
                'Width' => 100,
            ),
            'StockNumber' => array(
                'Name' => 'Описание оборудования',
                'FieldName' => 'StockNumber',
                'Width' => 100,
            ),
            'DateInstall' => array(
                'Name' => 'Дата установки',
                'FieldName' => 'DateInstall',
                'Width' => 100,
            ),
            'DateService' => array(
                'Name' => 'Дата постановки на обслуживание',
                'FieldName' => 'DateService',
                'Width' => 100,
            ),
            'Location' => array(
                'Name' => 'Местоположение',
                'FieldName' => 'Location',
                'Width' => 50,
            ),
        ),
    ));
?>

<div style="padding-top: 10px;"> 

<?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'AddCommonObjectEquip',
        'Width' => 114,
        'Height' => 30,
        'Text' => 'Добавить',
        'Href' => Yii::app()->createUrl('ObjectEquips/insert', array('ObjectGr_id' => $Object_id)),
    ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'EditCommonObjectEquip',
        'Width' => 114,
        'Height' => 30,
        'Text' => 'Изменить',
        'Href' => Yii::app()->createUrl('ObjectEquips/update'),
        'Params' => array(
            array(
                'ParamName' => 'Code',
                'NameControl' => 'CommonObjectEquipsGrid',
                'TypeControl' => 'Grid',
                'FieldControl' => 'Code',
            ),
        ),
    ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'DeleteCommonObjectEquip',
        'Width' => 114,
        'Height' => 30,
        'Text' => 'Удалить',
        'Href' => Yii::app()->createUrl('ObjectEquips/delete'),
        'Params' => array(
            array(
                'ParamName' => 'Code',
                'NameControl' => 'CommonObjectEquipsGrid',
                'TypeControl' => 'Grid',
                'FieldControl' => 'Code',
            ),
        ),
    ));
?>

</div>