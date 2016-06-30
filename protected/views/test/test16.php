<?php
    echo '<div style="float: left">';
    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
        'id' => 'DateEdit1',
        'Value' => date('d.m.Y H:i'),
    ));
    echo '</div><div style="float: left">';
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'Edit1',
        'Width' => 250,
        'Value' => 'Вперед!!! в светлое будущее!!!!',
        'Type' => 'Numeric',
    ));
    
    echo '</div><div style="float: left">';
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
    echo '</div>';
    echo '</div><div style="float: left">';
    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
        'id' => 'Memo1',
        'Width' => 250,
        'Value' => 'Вперед!!! в светлое будущее!!!!',
    ));
    echo '</div>';
   ?>

