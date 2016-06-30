<script>
    
    Aliton.Links[0] = {
        Out: "Edit1",
        In: "TestGrid1",
        TypeControl: "Grid",
        Condition: "a.Addr like ':Value%'",
        //Field: "Employee_id",
        Name: "Edit1_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
        
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
        
        /*
        $.ajax({
            url: "http://aliton/index.php?r=Test/Test7",
            type: "POST",
            data: null,
            async: false,
            success: function(Res){
                $("#ContentEdit1").html(Res);
            },
        }); 
        */
        
    });
</script>


<?php
    
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'Edit1',
        'Width' => 200,
        'Value' => 100,
        'Type' => 'String',
        'Mode' => "Auto",
    ));
    
     
    echo '<div id="ContentEdit1"></div>';
    echo '<div id="Test1"></div>';
    /*
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'TestGrid1',
        'Stretch' => false,
        'Key' => 'KeyTestGrid1',
        'ModelName' => 'ListObjects',
        'FirstLoad' => true,
        'ShowPager' => true,
        'ShowFilters' => true,
        'LightingLine' => true,
        'Height' => 200,
        'Width' => 700,
        'Columns' => array(
            'RowNumber' => array(
                'Name' => '№',
                'FieldName' => 'RowNumber',
                'Width' => 100,
            ),
            'Addr' => array(
                'Name' => 'Адрес',
                'FieldName' => 'Addr',
                'Width' => 300,
                'Filter' => array(
                    'Condition' => "a.Addr like ':Value%'",
                ),
                'Sort' => array(
                    'CurrentSort' => 'None',
                    'Up' => 'a.Addr',
                    'Down' => 'a.Addr desc',
                ),
                
            ),
            'MasterName' => array(
                'Name' => 'Мастер',
                'FieldName' => 'MasterName',
                'Width' => 150,
                'Sort' => array(
                    'CurrentSort' => 'None',
                    'Up' => 'c.MasterName',
                    'Down' => 'c.MasterName desc',
                ),
            ),
            'Master' => array(
                'Name' => 'Мастер ID',
                'FieldName' => 'Master',
                'Width' => 150,
                'Sort' => array(
                    'CurrentSort' => 'None',
                    'Up' => 'c.Master',
                    'Down' => 'c.Master desc',
                ),
            ),
        ),
    ));
    */
     
?>

