<?php

class alform extends CWidget {
    public $form;
    public $model;
    
    public $table = array();
    
    
    public function init() {
        parent::init();
    }
    
    public function renderField($fieldname, $type, $data) {
        $str = '';
        if ($type == 'alcombobox')
        {
            $str = $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                'id' => $fieldname,
                'popupid' => 'grid_' . $fieldname,
                'data' => $data,
                'fieldname' => $fieldname,
                'columns' => array(
                    'column1' => array(
                        'name' => 'fieldname',
                        'fieldname' => 'fieldname',
                    ),
                ),
            ));
        }
    }
    
    public function run() {
        
        echo '<table border="1"><tbody>';
        
        foreach ($this->table as $key => $value) {
            echo '<tr>';
            foreach ($value as $key2 => $value2) {
                $td = '<td';
                if (isset($value2['colspan']))
                    $td .= ' colspan="'.$value2['colspan'].'"';
                if (isset($value2['rowspan']))
                    $td .= ' rowspan="' .$value2['rowspan'].'"';
                $td .= '>';
                
                if (isset($value2['fieldname']))
                    $fieldname = $value2['fieldname'];
                if (isset($value2['type']))
                    $type = $value2['type'];
                if (isset($value2['data']))
                    $data = $value2['data'];
                else
                    $data = array();
                
                $td .= $this->renderField($fieldname, $type, $data);
                $td .= '</td>';
                echo $td;
            }
            echo '</tr>';
        }
        
        echo '</table></tbody>';
    }
}