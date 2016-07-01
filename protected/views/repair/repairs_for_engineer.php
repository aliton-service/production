<div style="float: left;">Текущие поставленные задачи инженеру:</div>
<div style="float: left; margin-left: 8px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbEngineer',
                'Stretch' => true,
                'ModelName' => 'ListEmployees',
                'Height' => 300,
                'Width' => 200,
                'KeyField' => 'Employee_id',
                'KeyValue' => 89,
                'Name' => 'Demands[ExecOther]',
                'FieldName' => 'ShortName',
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'e.EmployeeName like \':Value%\'',
                ),
                'Columns' => array(
                    'EmployeeName' => array(
                        'Name' => 'ФИО',
                        'FieldName' => 'EmployeeName',
                        'Width' => 300,

                    ),
                ),
            ));
        ?>
</div>
<div style="clear: both; margin-top: 12px"></div>
<div style="float: left; width: 100%">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'RepairsGrid',
            'Stretch' => true,
            'Key' => 'Repairs_RepairsForEngineer_RepairsGrid',
            'ModelName' => 'Repairs',
            'ShowFilters' => true,
            'Height' => 430,
            'Width' => 500,
            'OnDblClick' => '$("#RepairEngineerInformation").albutton("BtnClick");',
            'Sort' => array('r.TaskSequence'),
            'Filters' => array(
                array(
                    'Type' => 'Internal',
                    'Control' => 'Form',
                    'Condition' => 'r.RepTask_id is not null',
                    'Value' => '',
                    'Name' => 'Form1',
                ),
            ),
            'Columns' => array(
                'TaskSequence' => array(
                    'Name' => 'Очередь',
                    'FieldName' => 'TaskSequence',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "r.TaskSequence = :Value",
                    ),
                ),
                'StatusName' => array(
                    'Name' => 'Статус',
                    'FieldName' => 'StatusName',
                    'Width' => 130,
                    'Filter' => array(
                        'Condition' => "r.StatusName like ':Value%'",
                    ),
                ),
                'Number' => array(
                    'Name' => 'Номер',
                    'FieldName' => 'Number',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "r.Number like ':Value%'",
                    ),
                ),
                'Addr' => array(
                    'Name' => 'Адрес',
                    'FieldName' => 'Addr',
                    'Width' => 320,
                    'Filter' => array(
                        'Condition' => "r.Addr like ':Value%'",
                    ),
                ),
            ),
        ));
    ?>
</div>
<div style="clear: both; margin-top: 6px"></div>
<div style="float: left">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'RepairEngineerInformation',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Просмотр',
            'Type' => 'NewWindow',
            'Href' => Yii::app()->createUrl('Repair/RepairEngineerInformation'),
            'Params' => array(
                        array(
                            'ParamName' => 'Repr_id',
                            'NameControl' => 'RepairsGrid',
                            'TypeControl' => 'Grid',
                            'FieldControl' => 'Repr_id',
                        ),
                    ),
        ));
    ?>
                
</div>



