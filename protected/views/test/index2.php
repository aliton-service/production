<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'TestGrid2',
        'Stretch' => false,
        'Key' => 'TestGrid_2',
        'ModelName' => 'Employees',
        'ShowPager' => true,
        'ShowFilters' => true,
        'Height' => 200,
        'Width' => 600,
        'Columns' => array(
            'RowNumber' => array(
                'Name' => '№',
                'FieldName' => 'RowNumber',
                'Width' => 100,
                'Filter' => array(
                    'Condition' => "e.Employee_id > :Value",
                ),
            ),
            'Employee_id' => array(
                'Name' => 'Ид',
                'FieldName' => 'Employee_id',
                'Width' => 100,
                'Filter' => array(
                    'Condition' => "e.Employee_id > :Value",
                ),
            ),
            'EmployeeName' => array(
                'Name' => 'Наименование',
                'FieldName' => 'EmployeeName',
                'Width' => 200,
                'Filter' => array(
                    'Condition' => "e.EmployeeName like ':Value%'",
                ),
            ),
        ),
    ));
?>

