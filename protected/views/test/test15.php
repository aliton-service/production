<script>
    Aliton.Links[0] = {
        Out: "DateEdit1",
        In: "TestGrid1",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(o.DateCreate) >= ':Value'",
        Field: "DateCreate",
        Name: "DateEdit1_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    };
    
    Aliton.Links[1] = {
        Out: "DateEdit2",
        In: "TestGrid1",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(o.DateCreate) <= ':Value'",
        Field: "DateCreate",
        Name: "DateEdit2_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    };
</script>
<?php
    echo 'с: ';
    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
        'id' => 'DateEdit1',
        //'Value' => date('d.m.Y H:i'),
    ));
    echo 'по: ';
    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
        'id' => 'DateEdit2',
        //'Value' => date('d.m.Y H:i'),
    ));
    echo '<br>';
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
?>

