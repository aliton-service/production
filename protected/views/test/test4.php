<script>

Aliton.Links[0] = {
        Out: "TestCombobox4",
        In: "TestCombobox4_PopupGrid",
        TypeControl: "Grid",
        Condition: "a.Addr like ':Value%'",
        //Field: "Employee_id",
        Name: "TestCombobox4_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
};

</script>
<?php
    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
        'id' => 'TestCombobox4',
        'Stretch' => true,
        'Key' => 'KeyTestCombobox4',
        'ModelName' => 'ListObjects',
        'ShowFilters' => false,
        'ShowPager' => false,
        'LightingLine' => true,
        'Height' => 300,
        'Width' => 400,
        'PopupWidth' => 500,
        'KeyField' => 'Object_id',
        'KeyValue' => 17652,
        'FieldName' => 'Addr',
        'Type' => array(
            'Mode' => 'Filter',
            'Condition' => "a.Addr like ':Value%'",
        ),
        'Columns' => array(
            'Addr' => array(
                'Name' => 'Адрес',
                'FieldName' => 'Addr',
                'Width' => 300,
                'Filter' => array(
                    'Condition' => "a.Addr like ':Value%'",
                ),
                
            ),
        ),
    ));
    /*
    echo '<br>Значение по умолчанию<br>';
    
    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
        'id' => 'TestCombobox5',
        'Stretch' => true,
        'Key' => 'KeyTestCombobox5',
        'ModelName' => 'ListObjects',
        'ShowFilters' => false,
        'ShowPager' => false,
        'LightingLine' => true,
        'Height' => 300,
        'Width' => 400,
        'PopupWidth' => 500,
        'KeyField' => 'Object_id',
        'KeyValue' => 17652,
        'FieldName' => 'Addr',
        'Type' => array(
            'Mode' => 'Filter',
            'Condition' => "a.Addr like ':Value%'",
        ),
        'Columns' => array(
            'Addr' => array(
                'Name' => 'Адрес',
                'FieldName' => 'Addr',
                'Width' => 300,
                'Filter' => array(
                    'Condition' => "a.Addr like ':Value%'",
                ),
            ),
        ),
    ));
    */
?>


