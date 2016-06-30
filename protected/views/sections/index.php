<script>
    Aliton.Links.push({
        Out: "edSectionName",
        In: "SectionsGrid",
        TypeControl: "Grid",
        Condition: "s.SectionName like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
</script>
<?php $this->setPageTitle('Подразделения'); ?>
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
                    'id' => 'edSectionName',
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
            'id' => 'SectionsGrid',
            'Stretch' => true,
            'Key' => 'Sections_Index_SectionsGrid',
            'ModelName' => 'Sections',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#EditSection").albutton("BtnClick");',
            'Columns' => array(
                'SectionName' => array(
                    'Name' => 'Наименование',
                    'FieldName' => 'SectionName',
                    'Width' => 400,
                    'Filter' => array(
                        'Condition' => "s.SectionName like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.SectionName desc',
                        'Down' => 's.SectionName',
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
                'id' => 'AddSection',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('Sections/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditSection',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('Sections/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Section_id',
                                'NameControl' => 'SectionsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Section_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelSection',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('Sections/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Section_id',
                                'NameControl' => 'SectionsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Section_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-top: 8px; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'Refresh',
                'Width' => 124,
                'Height' => 30,
                'Type' => 'None',
                'Text' => 'Обновить',
                'OnAfterClick' => '$("#SectionsGrid").algridajax("Load");',
            ));
        ?>
    </div>
</div>





