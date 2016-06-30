
<script>
    Aliton.Links[0] = {
        Out: "TestGrid2",
        In: "TestGrid1",
        TypeControl: "Grid",
        Condition: "c.Master = :Value",
        Field: "Employee_id",
        Name: "TestGrid2_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
    };
    
    $(function(){
       $.ajax({
            url: "http://aliton/index.php?r=Test/Test1",
            type: "POST",
            data: null,
            async: false,
            success: function(Res){
                $("#Test1").html(Res);
            },
        }); 
    });
</script>

<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'TestGrid2',
        'Stretch' => false,
        'Key' => 'KeyTestGrid2',
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

<div id="Test1">
    
</div>
<div style="padding-top: 24px; font-size: 12px">
    Второй грид погружается Ajax-ом.
</div>
