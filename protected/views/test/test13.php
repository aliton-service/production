<script>
    Aliton.Links[0] = {
        Out: "Calendar1",
        In: "TestGrid1",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(o.DateCreate) = ':Value'",
        Field: "DateCreate",
        Name: "Calendar1_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
    };
</script>

<?php
    $this->widget('application.extensions.alitonwidgets.calendar.alcalendar', array(
        'id' => 'Calendar1',
        'Value' => date('d.m.Y H:i'),
    ));
    
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
