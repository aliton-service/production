
<?php
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
        'OnDrawRow' => 'RowStyle=""; if (Row["Addr"].indexOf("1 Алекс") !== -1) RowStyle="color: red";',
        'Columns' => array(
            'RowNumber' => array(
                'Name' => '№',
                'FieldName' => 'RowNumber',
                'Width' => 100,
            ),
            'DateCreate' => array(
                'Name' => 'Дата создания',
                'FieldName' => 'DateCreate',
                'Format' => 'd.m.Y',
                'Width' => 300,
                'Filter' => array(
                    'Condition' => "o.DateCreate = ':Value'",
                ),
                'Sort' => array(
                    'CurrentSort' => 'None',
                    'Up' => 'o.DateCreate',
                    'Down' => 'o.DateCreate desc',
                ),
                
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



