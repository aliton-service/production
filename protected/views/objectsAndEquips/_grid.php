<script>
    Aliton.Links.push({
        Out: "DoorwaysGrid",
        In: "ObjectEquipsGrid",
        TypeControl: "Grid",
        Condition: "o.Object_id = :Value",
        Field: "Object_id",
        Name: "DoorwaysGrid_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
    });
</script>

<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'ObjectEquipsGrid',
            'Width' => 800,
            'Height' => 300,
            'Stretch' => true,
            'ModelName' => 'ObjectEquips',
            'Key' => 'ObjectsGroup_index_ObjectEquipsGrid',
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
            'id' => 'AddObjectEquip',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Добавить',
            'Href' => Yii::app()->createUrl('ObjectEquips/insert'),
            'Params' => array(
                array(
                    'ParamName' => 'Object_id',
                    'NameControl' => 'DoorwaysGrid',
                    'TypeControl' => 'Grid',
                    'FieldControl' => 'Object_id',
                ),
            ),
        ));
    ?>

    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'EditObjectEquip',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Изменить',
            'Href' => Yii::app()->createUrl('ObjectEquips/update'),
            'Params' => array(
                array(
                    'ParamName' => 'Code',
                    'NameControl' => 'ObjectEquipsGrid',
                    'TypeControl' => 'Grid',
                    'FieldControl' => 'Code',
                ),
            ),
        ));
    ?>

    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'DeleteObjectEquip',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Удалить',
            'Href' => Yii::app()->createUrl('ObjectEquips/delete'),
            'Params' => array(
                array(
                    'ParamName' => 'Code',
                    'NameControl' => 'ObjectEquipsGrid',
                    'TypeControl' => 'Grid',
                    'FieldControl' => 'Code',
                ),
            ),
        ));
    ?>
</div>
