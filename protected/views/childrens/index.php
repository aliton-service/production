<script>
    Aliton.Links.push({
        Out: "EmployeesGrid",
        In: "ChildrensGrid",
        TypeControl: "Grid",
        Condition: "c.Employee_id = :Value",
        Name: "Filter1",
        Field: "Employee_id",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
</script>

<div style="margin-top: 16px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'ChildrensGrid',
            'Stretch' => true,
            'Key' => 'Employees_Index_ChildrensGrid',
            'ModelName' => 'Childrens',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            //'OnDblClick' => '$("#EditSection").albutton("BtnClick");',
            'Columns' => array(
                'ChildrenName' => array(
                    'Name' => 'ФИО Ребенка',
                    'FieldName' => 'ChildrenName',
                    'Width' => 280,
                    'Filter' => array(
                        'Condition' => "c.ChildrenName like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'c.ChildrenName desc',
                        'Down' => 'c.ChildrenName',
                    ),
                ),
                'BirthDay' => array(
                    'Name' => 'Дата рождения',
                    'FieldName' => 'BirthDay',
                    'Width' => 100,
                    'Format' => 'd.m.Y',
                    'Filter' => array(
                        'Condition' => "c.BirthDay = ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'c.BirthDay desc',
                        'Down' => 'c.BirthDay',
                    ),
                ),
                'Age' => array(
                    'Name' => 'Полных лет',
                    'FieldName' => 'Age',
                    'Width' => 100,
                    'Filter' => array(
                        'Condition' => "c.Age = :Value%",
                    ),
                    'Sort' => array(
                        'Up' => 'c.Age desc',
                        'Down' => 'c.Age',
                    ),
                ),
            ),
        ));
    ?>
</div>
<div style="clear: both"></div>
<div style="margin-top: 8px">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AddChildren',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                //'Type' => 'None',
                'Href' => Yii::app()->createUrl('Childrens/Create'),
                'Params' => array(
                        array(
                                'ParamName' => 'Employee_id',
                                'NameControl' => 'EmployeesGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Employee_id',
                        ),
                ),
                //'OnAfterClick' => 'aldialogSettings["ChildrensEditFrom"].ContentUrl = albuttonSettings["AddChildren"].Href; $("#ChildrensEditFrom").aldialog("Show");',
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditChildren',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('Childrens/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Children_id',
                                'NameControl' => 'ChildrensGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Children_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelChildren',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('Childrens/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Children_id',
                                'NameControl' => 'ChildrensGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Children_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'Refresh',
                'Width' => 124,
                'Height' => 30,
                'Type' => 'None',
                'Text' => 'Обновить',
                'OnAfterClick' => '$("#ChildrensGrid").algridajax("Load");',
            ));
        ?>
    </div>
</div>
<div class="clearfix"></div>
<?php
    $this->widget('application.extensions.alitonwidgets.dialog.aldialog', array(
        'id' => 'ChildrensEditFrom',
        'Width' => 580,
        'Height' => 90,
        'ContentUrl' => Yii::app()->createUrl('Childrens/Create'),
    ));
?>