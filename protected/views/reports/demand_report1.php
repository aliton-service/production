<?php
    $this->ReportName = $ReportName;
?>
<?php
    if (!$Ajax) {
        $this->beginWidget('CActiveForm', array(
            'id' => 'Parameters',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
        ));
?>        
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Период с</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDem1DateStart',
                        'Width' => 120,
                        'Value' => date('d.m.Y'),
                        'Format' => 'd.m.Y',
                        'Name' => 'Parameters[DateStart]',
                    ));
                ?>
            </div>
            <div style="float: left; margin-right: 6px">по</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDem1DateEnd',
                        'Width' => 120,
                        'Value' => date('d.m.Y'),
                        'Format' => 'd.m.Y',
                        'Name' => 'Parameters[DateEnd]',
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Тип заявки</div>
            <div style="float: left">
                <?php
                        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                            'id' => 'cmbDem1DemandType',
                            'ModelName' => 'DemandTypes',
                            'Name' => 'Parameters[DemandType_id]',
                            'FieldName' => 'DemandType',
                            'KeyField' => 'DemandType_id',
                            'Width' => 300,
                            'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => 'dt.DemandType like \':Value%\'',
                            ),
                            'Filters' => array(
                                array(
                                    'Type' => 'Internal',
                                    'Control' => 'Form',
                                    'Condition' => 'dt.d = 1',
                                    'Value' => '1',
                                    'Name' => 'Form1',
                                ),
                            ),
                            'Columns' => array(
                                'DemandType' => array(
                                    'Name' => 'Тип заявки',
                                    'FieldName' => 'DemandType',
                                    'Width' => 250,
                                    'Height' => 23,
                                ),
                            ),
                        ));
                    ?>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>
