<script>
    Aliton.Links.push({
        Out: "edStreetName",
        In: "StreetsGrid",
        TypeControl: "Grid",
        Condition: "st.StreetName like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
</script>
<?php $this->setPageTitle('Улицы'); ?>
<?php
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Улицы'=>array('index'),
    );
?>

<div style="float: left; margin-top: 16px;">
    <div style="text-align: center; float: left">Поиск по наименованию</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edStreetName',
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
            'id' => 'StreetsGrid',
            'Stretch' => true,
            'Key' => 'Streets_Index_StreetsGrid',
            'ModelName' => 'Streets',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#EditStreet").albutton("BtnClick");',
            'Columns' => array(
                'RegionName' => array(
                    'Name' => 'Регион',
                    'FieldName' => 'RegionName',
                    'Width' => 200,
                    'Filter' => array(
                        'Condition' => "rg.RegionName like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'rg.RegionName desc',
                        'Down' => 'rg.RegionName',
                    ),
                ),
                'StreetName' => array(
                    'Name' => 'Улица',
                    'FieldName' => 'StreetName',
                    'Width' => 350,
                    'Filter' => array(
                        'Condition' => "st.StreetName like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'st.StreetName desc',
                        'Down' => 'st.StreetName',
                    ),
                ),
                'StreetType' => array(
                    'Name' => 'Тип улицы',
                    'FieldName' => 'StreetType',
                    'Width' => 100,
                    'Filter' => array(
                        'Condition' => "stype.StreetType like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'stype.StreetType desc',
                        'Down' => 'stype.StreetType',
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
                'id' => 'AddStreet',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('Streets/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditStreet',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('Streets/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Street_id',
                                'NameControl' => 'StreetsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Street_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelStreet',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('Streets/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Street_id',
                                'NameControl' => 'StreetsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Street_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>