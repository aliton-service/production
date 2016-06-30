<script>
    Aliton.Links.push({
        Out: "edPositionName",
        In: "PositionsGrid",
        TypeControl: "Grid",
        Condition: "p.PositionName like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
</script>
<?php $this->setPageTitle('Должности'); ?>
<?php
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Должности'=>array('index'),
    );
?>

<div style="float: left; margin-top: 16px;">
    <div style="text-align: center; float: left">Поиск по наименованию</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edPositionName',
                    'Width' => 350,
                    'Type' => 'String',
            ));
        ?>
    </div>
</div>

<div style="clear: both"></div>
<div style="margin-top: 16px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'PositionsGrid',
            'Stretch' => true,
            'Key' => 'Positions_Index_PositionsGrid',
            'ModelName' => 'Positions',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#EditPosition").albutton("BtnClick");',
            'Columns' => array(
                'PositionName' => array(
                    'Name' => 'Наименование',
                    'FieldName' => 'PositionName',
                    'Width' => 400,
                    'Filter' => array(
                        'Condition' => "p.PositionName like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'P.PositionName desc',
                        'Down' => 'p.PositionName',
                    ),
                ),
            ),
        ));
    ?>
</div>

<div style="clear: both"></div>
<div style="margin-top: 16px">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AddPosition',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('Positions/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditPosition',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('Positions/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Position_id',
                                'NameControl' => 'PositionsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Position_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelPosition',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('Positions/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Position_id',
                                'NameControl' => 'PositionsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Position_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>

