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
        <div style="float: left">
            <div style="float: left; margin-right: 6px">
                <div style="float: left">Первые</div>
                <div style="float: left; margin-left: 6px">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                            'id' => 'edWHReport1Top',
                            'Width' => 100,
                            'Value' => 1000,
                            'Name' => 'Parameters[p_top]',
                            'Visible' => true,
                        ));
                    ?>
                </div>
                <div style="float: left; margin-left: 6px">записей</div>
            </div>
            <div style="clear: both; margin-top: 10px;"></div>
            <div style="float: left">Затребовал</div>
            <div style="float: left; margin-left: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbWHReport1EmplID',
                        'Stretch' => true,
                        'ModelName' => 'ListEmployees',
                        'Height' => 300,
                        'Width' => 300,
                        'KeyField' => 'Employee_id',
                        'Name' => 'Parameters[p_empl_id]',
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
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Участок</div>
            <div style="float: left">
                    <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                            'id' => 'cmbWhReport1Territory',
                            'Stretch' => true,
                            'ModelName' => 'Territory',
                            'Name' => 'Parameters[p_territ_id]',
                            'Height' => 300,
                            'Width' => 200,
                            'PopupWidth' => 300,
                            'KeyField' => 'Territ_Id',
                            'FieldName' => 'Territ_Name',
                            'Type' => array(
                                    'Type' => 'Filter',
                                    'Condition' => "t.Territ_Name like ':Value%'",
                            ),
                            'Columns' => array(
                                    'Territ_Name' => array(
                                            'Name' => 'Участок',
                                            'FieldName' => 'Territ_Name',
                                            'Width' => 300,
                                            'Filter' => array(
                                                    'Condition' => "t.Territ_Name like ':Value%'",
                                            ),

                                    ),
                            ),
                    ));
                    ?>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Оборудование</div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbWHReport1Equip',
                        'Stretch' => true,
                        'ModelName' => 'EquipForWhActs',
                        'Height' => 300,
                        'Width' => 300,
                        'Name' => 'Parameters[p_eqip_id]',
                        'KeyField' => 'Equip_id',
                        'FieldName' => 'EquipName',
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => 'e.EquipName like \':Value%\'',
                        ),
                        'Columns' => array(
                            'EquipName' => array(
                                'Name' => 'Оборудование',
                                'FieldName' => 'EquipName',
                                'Width' => 300,

                            ),
                        ),
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Стоимость от</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edWHReport1PriceLowStart',
                        'Width' => 100,
                        'Name' => 'Parameters[p_pricelow_start]',
                        'Visible' => true,
                    ));
                ?>
            </div>
            <div style="float: left; margin-right: 6px">до</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edWHReport1PriceLowEnd',
                        'Width' => 100,
                        'Name' => 'Parameters[p_pricelow_end]',
                        'Visible' => true,
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Основание</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edWHReport1ReceiptNumber',
                        'Width' => 150,
                        'Name' => 'Parameters[p_receiptnum]',
                        'Visible' => true,
                    ));
                ?>
            </div>
            <div style="float: left; margin-right: 6px">Дата с</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edWHReport1ReceiptDateStart',
                        'Width' => 120,
                        'Name' => 'Parameters[p_receiptdate_start]',
                    ));
                ?>
            </div>
            <div style="float: left; margin-right: 6px">по</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edWHReport1ReceiptDateEnd',
                        'Width' => 120,
                        'Name' => 'Parameters[p_receiptdate_end]',
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'edWHReport1Quant',
                    'Label' => 'Фактическая выдача больше 0',
                    
                    'Name' => 'Parameters[p_quant]',
                ));
            ?>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Объект</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxjax.alcomboboxajax', array(
                            'id' => 'cmbWhReport1Object',
                            'ModelName' => 'ListObjects',
                            'FieldName' => 'Addr',
                            'KeyField' => 'Object_id',
                            'Name' => 'Parameters[p_object_id]',
                            'Type' => array(
                                    'Mode' => 'Filter',
                                    'Condition' => "a.Addr like ':Value%'",
                            ),
                            'Width' => 300,
                            'Columns' => array(
                                    'Address' => array(
                                            'Name' => 'Адрес',
                                            'FieldName' => 'Addr',
                                    ),
                            ),
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both; margin-top: 10px;"></div>
        <div style="float: left;">
            <div style="float: left; margin-right: 6px">Период с</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edWHReport1AcDateStart',
                        'Width' => 120,
                        'Value' => date('d.m.Y'),
                        'Format' => 'd.m.Y',
                        'Name' => 'Parameters[p_acdate_start]',
                    ));
                ?>
            </div>
            <div style="float: left; margin-right: 6px">по</div>
            <div style="float: left; margin-right: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edWHReport1AcDateEnd',
                        'Width' => 120,
                        'Value' => date('d.m.Y'),
                        'Format' => 'd.m.Y',
                        'Name' => 'Parameters[p_acdate_end]',
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


