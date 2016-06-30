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
    
    Aliton.Links.push({
        Out: "DoorwaysGrid",
        In: "DoorwayNote",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Note",
        Name: "DoorwaysGrid_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>

<div style="float: left">
    
<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'DoorwaysGrid',
        'Width' => 800,
        'Height' => 150,
        'Stretch' => false,
        'ModelName' => 'Objects',
        'Filters' => array(
            array(
                'Type' => 'Internal',
                'Condition' => 'o.ObjectGr_id = ' . $ObjectGr_id,
                'Control' => 'Form',
            ),
            array(
                'Type' => 'Internal',
                'Condition' => "o.Doorway <> 'Общее'",
                'Control' => 'Form',
            ),
        ),
        'Columns' => array(
            'ObjectTypeName' => array(
                'Name' => 'Число квартир',
                'FieldName' => 'ObjectTypeName',
                'Width' => 100,
            ),
            'Doorway' => array(
                'Name' => 'Подъезд',
                'FieldName' => 'Doorway',
                'Width' => 100,
            ),
            'ComplexityName' => array(
                'Name' => 'Тип',
                'FieldName' => 'ComplexityName',
                'Width' => 100,
            ),
            'Condition' => array(
                'Name' => 'Условия',
                'FieldName' => 'Condition',
                'Width' => 100,
            ),
            'MasterKey' => array(
                'Name' => 'Мастер ключ',
                'FieldName' => 'MasterKey',
                'Width' => 50,
            ),
            'Code' => array(
                'Name' => 'Код',
                'FieldName' => 'Code',
                'Width' => 50,
            ),
            'Signal' => array(
                'Name' => 'Сигнал ОДС',
                'FieldName' => 'Signal',
                'Width' => 50,
            ),
            'ConnectionType' => array(
                'Name' => 'Тип связи',
                'FieldName' => 'ConnectionType',
                'Width' => 50,
            ),
        ),
    ));
?>
</div>
<div style="float: left; padding-left: 10px">
<div>Примечание</div>
    <?php

    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
        'id' => 'DoorwayNote',
        'Width' => 250,
        'Height' => 180,
        'ReadOnly' => true,
    ));
    ?>
</div>
<div style="clear: left; padding-top: 10px">    
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'AddObject',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Добавить',
            'Href' => Yii::app()->createUrl('Object/insert', array('ObjectGr_id' => $ObjectGr_id)),
        ));
    ?>

    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'EditObject',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Изменить',
            'Href' => Yii::app()->createUrl('Object/update'),
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
            'id' => 'DeleteObject',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Удалить',
            'Href' => Yii::app()->createUrl('Objects/delete'),
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


<div style="padding-top: 10px">
    <?php
    $this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
        'reload' => false,
        
        'header' => array(
            array(
                'name'=>'Оборудование на подъезде',
                'ajax'=>true,
                'options'=>array(
                    'url'=>$this->createUrl('ObjectsAndEquips/ObjectEquips')
                ),
            ),
            array(
                'name'=>'Оборудование на доме',
                'ajax'=>true,
                'options'=>array(
                    'url'=>$this->createUrl('ObjectsAndEquips/CommonEquips', array('ObjectGr_id' => $ObjectGr_id))
                ),
            ),
        ),
        'content'=> array(
            array(
                'id'=>'ObjectEquipsTab',
            ),
            array(
                'id'=>'CommonTab',
            ),
        ),
    ));
?>
</div>            
                
