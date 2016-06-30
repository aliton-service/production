<script>
    Aliton.Links.push({
        Out: "edDepName",
        In: "DepartmentsGrid",
        TypeControl: "Grid",
        Condition: "dp.DepName like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
</script>
<?php $this->setPageTitle('Отделы'); ?>
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
                    'id' => 'edDepName',
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
            'id' => 'DepartmentsGrid',
            'Stretch' => true,
            'Key' => 'Departments_Index_DepartmentsGrid',
            'ModelName' => 'Departments',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#EditDepartment").albutton("BtnClick");',
            'Columns' => array(
                'DepName' => array(
                    'Name' => 'Наименование',
                    'FieldName' => 'DepName',
                    'Width' => 400,
                    'Filter' => array(
                        'Condition' => "dp.DepName like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'dp.DepName desc',
                        'Down' => 'dp.DepName',
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
                'id' => 'AddDepartment',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('Departments/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditDepartment',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('Departments/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Dep_id',
                                'NameControl' => 'DepartmentsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Dep_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelDepartment',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('Departments/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Dep_id',
                                'NameControl' => 'DepartmentsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Dep_id',
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
                'OnAfterClick' => '$("#DepartmentsGrid").algridajax("Load");',
            ));
        ?>
    </div>
</div>



