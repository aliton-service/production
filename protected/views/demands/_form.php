<script>
    
    Aliton.Links.push({
        Out: "cmbDemandType",
        In: "cmbSystemType",
        TypeControl: "Grid",
        Condition: "p.DemandType_id = :Value",
        Name: "cmbDemandType_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });  
    
    Aliton.Links.push({
        Out: "cmbDemandType",
        In: "cmbEquipType",
        TypeControl: "Grid",
        Condition: "(p.DemandType_id = :Value or p.DemandType_id is null)",
        Name: "cmbDemandType_Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbSystemType",
        In: "cmbEquipType",
        TypeControl: "Grid",
        Condition: "(p.SystemType_id = :Value or p.SystemType_id is null)",
        Name: "cmbSystemType_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbDemandType",
        In: "cmbMalfunction",
        TypeControl: "Grid",
        Condition: "(p.DemandType_id = :Value or p.DemandType_id is null)",
        Name: "cmbDemandType_Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbSystemType",
        In: "cmbMalfunction",
        TypeControl: "Grid",
        Condition: "(p.SystemType_id = :Value or p.SystemType_id is null)",
        Name: "cmbSystemType_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbEquipType",
        In: "cmbMalfunction",
        TypeControl: "Grid",
        Condition: "(p.EquipType_id = :Value or p.EquipType_id is null)",
        Name: "cmbEquipType_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbDemandType",
        In: "cmbDemandPrior",
        TypeControl: "Grid",
        Condition: "(p.DemandType_id = :Value or p.DemandType_id is null)",
        Name: "cmbDemandType_Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbSystemType",
        In: "cmbDemandPrior",
        TypeControl: "Grid",
        Condition: "(p.SystemType_id = :Value or p.SystemType_id is null)",
        Name: "cmbSystemType_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbEquipType",
        In: "cmbDemandPrior",
        TypeControl: "Grid",
        Condition: "(p.EquipType_id = :Value or p.EquipType_id is null)",
        Name: "cmbEquipType_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "cmbMalfunction",
        In: "cmbDemandPrior",
        TypeControl: "Grid",
        Condition: "(p.Malfunction_id = :Value or p.Malfunction_id is null)",
        Name: "cmbMalfunction_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: true
    });
    
    Aliton.Links.push({
        Out: "edObjectGr_id",
        In: "cmbContactInfo",
        TypeControl: "Grid",
        Condition: "ci.ObjectGr_id = :Value",
        Name: "edObjectGr_id_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
</script>



<?php


$form = $this->beginWidget('CActiveForm', array(
	'id' => 'Demands',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation' => true,
        'enableClientValidation' => true,
 )); 

$request = new CHttpRequest;
        //$object = $request->getParam('object',null);

?>
    <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edObjectGr_id',
                'Name' => 'Demands[ObjectGr_id]',
                'Width' => 120,
                'Value' => $model->ObjectGr_id,
                'ReadOnly' => true,
                'Visible' => false,
            ));
        ?>
    
    <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edObject_id',
                'Name' => 'Demands[Object_id]',
                'Width' => 120,
                'Value' => $model->Object_id,
                'ReadOnly' => true,
                'Visible' => false,
            ));
        ?>
    
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edFirstDemandPrior_Id',
            'Name' => 'Demands[FirstDemandPrior_Id]',
            'Width' => 120,
            'Value' => $model->FirstDemandPrior_Id,
            'ReadOnly' => true,
            'Visible' => false,
        ));
    ?>
    
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edContrS_id',
            'Name' => 'Demands[ContrS_id]',
            'Width' => 120,
            'Value' => $model->ContrS_id,
            'ReadOnly' => true,
            'Visible' => false,
        ));
    ?>

    <div style="float: left">Номер</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edNumber',
                'Name' => 'Demands[Demand_id]',
                'Width' => 120,
                'Value' => $model->Demand_id,
                'ReadOnly' => true,
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">Адрес</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edAddress',
                'Width' => 420,
                'Value' => $model->Address,
                'ReadOnly' => true,
            ));
        ?>
    </div>
    
    <?php if ($Objects->Condition !== null) { ?>
    
    <div style="float: left; color: blue; margin-left: 6px"><b>Особые условия: </b></div>
    <div style="float: left; color: blue; margin-left: 6px"><?php echo '<b>' .  $Objects->Condition . '</b>' ?></div>
    
    
    <?php } ?>
    
    <div style="clear: both; margin-bottom: 6px"></div>         
    <div style="float: left; margin-top: 2px">
        <div style="float: left;">Дата и время заявки</div>
        <div style="clear: both">
        <?php
            //echo 'Model: ' . $model->DateReg . ' Aliton: "' . DateTimeManager::YiiDateToAliton($model->DateReg) . '"';
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDate',
                'Name' => 'Demands[DateReg]',
                'Width' => 160,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateReg),
                'ReadOnly' => true,
            ));
        ?>  
        </div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 2px">
        <div style="float: left;">Тариф обслуживания</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edServiceType',
                'Width' => 220,
                'Value' => $model->ServiceType,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                        'id' => 'cbAutoDateMaster',
                        'Label' => 'Передача мастеру',
                        'Checked' => false,
                    ));
                ?>
            </div>
            <div style="float: left; margin-left: 6px">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                        'id' => 'cbOtherExecutor',
                        'Label' => 'Другой исполнитель',
                        'Checked' => false,
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both">
            <?php
                if ($model->ExecOther === null)
                    $ID = $model->Master;
                else
                    $ID = $model->ExecOther;
                
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbMaster',
                    'Stretch' => true,
                    'ModelName' => 'ListEmployees',
                    'Height' => 300,
                    'Width' => 300,
                    'KeyField' => 'Employee_id',
                    'KeyValue' => $ID,
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
    </div>
    <div style="clear: both; margin-bottom: 6px"></div>        
    <div style="float: left; margin-top: 2px">
        <div style="float: left">Тип</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbDemandType',
                    'ModelName' => 'DemandTypes',
                    'Name' => 'Demands[DemandType_id]',
                    'FieldName' => 'DemandType',
                    'KeyField' => 'DemandType_id',
                    'KeyValue' => $model->DemandType_id,
                    'Width' => 300,
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 'dt.DemandType like \':Value%\'',
                    ),
                    'ReadOnly' => $ReadOnly,
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
        <?php //echo $form->error($model, 'DemandType_id'); ?>
    </div>
    <!--</div>-->
    <div style="float: left; margin-left: 6px; margin-top: 2px">
        <div style="float: left">Тип системы</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbSystemType',
                    'ModelName' => 'DemandsExecTime_SystemTypes',
                    'Name' => 'Demands[SystemType_id]',
                    'FieldName' => 'SystemTypeName',
                    'KeyField' => 'SystemType_id',
                    'KeyValue' => $model->SystemType_id,
                    'Width' => 300,
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 's.SystemTypeName like \':Value%\'',
                    ),
                    'ReadOnly' => $ReadOnly,
                    'Columns' => array(
                        'SystemTypeName' => array(
                            'Name' => 'Тип системы',
                            'FieldName' => 'SystemTypeName',
                            'Width' => 250,
                            'Height' => 23,
                        ),
                    ),
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 2px">
        <div style="float: left">Тип оборудования</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbEquipType',
                    'ModelName' => 'DemandsExecTime_EquipTypes',
                    'Name' => 'Demands[EquipType_id]',
                    'FieldName' => 'EquipType',
                    'KeyField' => 'EquipType_id',
                    'KeyValue' => $model->EquipType_id,
                    'Width' => 300,
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 'e.EquipType like \':Value%\'',
                    ),
                    
                    'ReadOnly' => $ReadOnly,
                    'Columns' => array(
                        'EquipType' => array(
                            'Name' => 'Тип оборудования',
                            'FieldName' => 'EquipType',
                            'Width' => 250,
                            'Height' => 23,
                        ),
                    ),
                ));
            ?>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; margin-top: 2px">
        <div style="float: left">Неисправность</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbMalfunction',
                    'ModelName' => 'DemandsExecTime_Malfunctions',
                    'Name' => 'Demands[Malfunction_id]',
                    'FieldName' => 'Malfunction',
                    'KeyField' => 'Malfunction_id',
                    'KeyValue' => $model->Malfunction_id,
                    'Width' => 300,
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 'm.Malfunction like \':Value%\'',
                    ),
                    'ReadOnly' => $ReadOnly,
                    'Columns' => array(
                        'Malfunction' => array(
                            'Name' => 'Тип оборудования',
                            'FieldName' => 'Malfunction',
                            'Width' => 250,
                            'Height' => 23,
                        ),
                    ),
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 2px">
        <div style="float: left">Приоритет</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbDemandPrior',
                    'ModelName' => 'DemandsExecTime_DemandPriors',
                    'Name' => 'Demands[DemandPrior_id]',
                    'FieldName' => 'DemandPrior',
                    'KeyField' => 'DemandPrior_id',
                    'KeyValue' => $model->DemandPrior_id,
                    'Width' => 300,
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 'd.DemandPrior like \':Value%\'',
                    ),
                    'OnAfterChange' => 'if (alcomboboxajaxSettings[id].CurrentRow !== null) { $("#edDemandet_id").aledit("SetValue", alcomboboxajaxSettings[id].CurrentRow["Demandet_id"])}
                                        priorColored();',
                    /*
                    'OnAfterChange' => 'var Prior_id = null;'
                        . ' if (alcomboboxajaxSettings[id].CurrentRow !== null)'
                        . '     Prior_id = alcomboboxajaxSettings[id].CurrentRow["Demandet_id"];'
                        . ' var DateReg = aldateeditSettings["edDate"].Value;'
                        . ' if (Prior_id !== null && DateReg !== null)'
                        . ' $.ajax({'
                        . '         url: "/index.php?r=demands/getDeadline&time=" + DateReg + "&id=" + Prior_id,'
                        . '         success: function(r) {'
                        . '             var D = new Date(r);'
                        . '             $("#Deadline").aldateedit("SetValue", D);'
			. '         }'
                        . '     });',
                    */
                    'ReadOnly' => $ReadOnly,
                    'Columns' => array(
                        'DemandPrior' => array(
                            'Name' => 'Тип оборудования',
                            'FieldName' => 'DemandPrior',
                            'Width' => 250,
                            'Height' => 23,
                        ),
                    ),
                ));
            ?>
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDemandet_id',
                    'Name' => 'Demands[DemandEt_id]',
                    'Value' => $model->DemandEt_id,
                    'Visible' => False,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'DemandPrior_id'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 2px">
        <div style="float: left">Предельная дата</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'Deadline',
                    'Value' => DateTimeManager::YiiDateToAliton($model->Deadline),
                    'Name' => 'Demands[Deadline]',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 2px">
        <div style="float: left">Согласованная дата</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edAgreeDate',
                    'Width' => 160,
                    'Value' => DateTimeManager::YiiDateToAliton($model->AgreeDate),
                    'Name' => 'Demands[AgreeDate]',
                ));
            ?>
        </div>
    </div>
    <div style="clear: both;"></div>
    <?php
    /*
                        'onafterchange' => ''
                        . '     prior_id = object.keyvalue;'
                        . '     date = $("#edDateReg .aleditcontrol").first().val();'
                        . '     $.ajax({'
                        . '         url: "/index.php?r=demands/getDeadline&time=" + date + "&id=" + prior_id,'
                        . '         success: function(r) {'
                        . '             $("#edDeadline .aleditcontrol").val(r);'
			. '         }'
                        . '     });'
                        . '     console.log(date);',
                        
    */           
    ?>                
    <div style="float: left; margin-top: 2px">
        <div style="float: left">Контактное лицо</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edContact01',
                    'Name' => 'Demands[Contacts]',
                    'Width' => 400,
                    'Value' => $model->Contacts,
                    'ReadOnly' => false,
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'Contacts'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 2px">
        <div style="float: left">Из карточки клиента</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbContactInfo',
                    'ModelName' => 'ContactInfo',
                    'FieldName' => 'contact',
                    'KeyField' => 'Info_id',
                    'Width' => 400,
                    'PopupWidth' => 600,
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 'ci.FIO like \':Value%\'',
                    ),
                    'OnAfterChange' => '/* if (aleditSettings["edContact01"].Value === null) */ if (alcomboboxajaxSettings["cmbContactInfo"].CurrentRow !== null) if (alcomboboxajaxSettings["cmbContactInfo"].FirstOpen === false) {$("#edContact01").aledit("SetValue", aleditSettings["edContact01"].Value + " " + alcomboboxajaxSettings["cmbContactInfo"].CurrentRow["contact"]);}',
                    'Columns' => array(
                        'contact' => array(
                            'Name' => 'Контактное лицо',
                            'FieldName' => 'contact',
                            'Width' => 550,
                            'Height' => 23,
                        ),
                    ),
                ));
            ?>
            
            
        </div>
    </div>
    <div style="clear: both; margin-bottom: 6px"></div>
            
<?php if(($this->action->id === 'update') || ($this->action->id === 'Tomaster')  || ($this->action->id === 'DemandExec')) { ?>            
            
<div style="border: 1px solid; float: left; padding: 6px">
    <div style="float: left;">
        <div style="float: left">Дата доклада помощи</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDateOfHelpRequest',
                'Name' => 'Demands[DateOfHelpRequest]',
                'Width' => 160,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateOfHelpRequest),
                //'ReadOnly' => true,
            ));
        ?>  
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Дата перевода заявки</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDateOfTransfer',
                'Name' => 'Demands[DateOfTransfer]',
                'Width' => 160,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateOfTransfer),
                //'ReadOnly' => true,
            ));
        ?>  
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Причина несв. закрытия заявки</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbDelayedClosureReason',
                'ModelName' => 'DelayedClosureReasons',
                'Name' => 'Demands[DelayedClosureReason_id]',
                'FieldName' => 'Name',
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'Name like \':Value%\'',
                ),
                'KeyField' => 'DelayedClosureReason_id',
                'KeyValue' => $model->DelayedClosureReason_id,
                'Width' => 300,
                'Columns' => array(
                    'Name' => array(
                        'Name' => 'Причина',
                        'FieldName' => 'Name',
                        'Width' => 250,
                        'Height' => 23,
                    ),
                ),
            ));
        ?> 
        </div>
    </div>
</div>

<div style="clear: both"></div>

<div style="float: left;">
    <div style="float: left">Причина перевода заявки</div>
    <div style="clear: both">
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'cmbTransferReason',
            'ModelName' => 'TransferReasons',
            'Name' => 'Demands[TransferReason]',
            'FieldName' => 'TransferReason',
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => 't.TransferReason like \':Value%\'',
            ),
            'KeyField' => 'TransferReason_id',
            'KeyValue' => $model->TransferReason,
            'Width' => 300,
            'Columns' => array(
                'TransferReason' => array(
                    'Name' => 'Причина',
                    'FieldName' => 'TransferReason',
                    'Width' => 250,
                    'Height' => 23,
                ),
            ),
        ));
    ?>
    <div><?php echo $form->error($model, 'TransferReason'); ?></div>
    </div>
</div>

<div style="float: left; margin-left: 6px">
    <div style="float: left">Причина закрытия</div>
    <div style="clear: both">
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'cmbCloseReason',
            'ModelName' => 'CloseReasons',
            'Name' => 'Demands[clrs_id]',
            'FieldName' => 'CloseReason',
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => 'cr.CloseReason like \':Value%\'',
            ),
            'KeyField' => 'CloseReason_id',
            'KeyValue' => $model->clrs_id,
            'Width' => 300,
            'Columns' => array(
                'CloseReason' => array(
                    'Name' => 'Причина',
                    'FieldName' => 'CloseReason',
                    'Width' => 250,
                    'Height' => 23,
                ),
            ),
        ));
    ?> 
    </div>
</div>

<div style="float: left; margin-left: 6px">
    <div style="float: left">Причина просрочки</div>
    <div style="clear: both">
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'cmbDelayReason',
            'ModelName' => 'DelayReasons',
            'Name' => 'Demands[dlrs_id]',
            'FieldName' => 'name',
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => 'd.name like \':Value%\'',
            ),
            'KeyField' => 'dlrs_id',
            'KeyValue' => $model->dlrs_id,
            'Width' => 300,
            'Columns' => array(
                'name' => array(
                    'Name' => 'Причина',
                    'FieldName' => 'name',
                    'Width' => 250,
                    'Height' => 23,
                ),
            ),
        ));
    ?> 
    <div><?php echo $form->error($model, 'dlrs_id'); ?></div>    
    </div>
</div>

<div style="float: left; margin-left: 6px">
    <div style="float: left">Результат заявки</div>
    <div style="clear: both">
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'cmbResult',
            'ModelName' => 'DemandResults',
            'Name' => 'Demands[rslt_id]',
            'FieldName' => 'ResultName',
            'KeyField' => 'Result_id',
            'KeyValue' => $model->rslt_id,
            'Width' => 200,
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => 'dr.ResultName like \':Value%\'',
            ),
            'Columns' => array(
                'ResultName' => array(
                    'Name' => 'Причина',
                    'FieldName' => 'ResultName',
                    'Width' => 250,
                    'Height' => 23,
                ),
            ),
        ));
    ?>
    <div><?php echo $form->error($model, 'rslt_id'); ?></div>
    </div>
</div>

<?php } ?>            

<div style="clear: both"></div>
<div>Отказники</div>
<div style="clear: both">
    <?php 
        //echo $ObjectsGroup;
        
        $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
            'id' => 'edRefusers',
            'Width' => 800,
            'Height' => 50,
            'Value' => $ObjectsGroup->Refusers,
            'Type' => 'String',
            'ReadOnly' => true,
        ));
        
        
    ?>
</div>
<div>Неисправность</div>
<div>
    <?php 
        $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
            'id' => 'edDemandText',
            'Width' => 800,
            'Height' => 50,
            'Value' => $model->DemandText,
            'Name' => 'Demands[DemandText]',
            'Type' => 'String',
        ));
    ?>
</div>
<?php if(($this->action->id === 'update') || ($this->action->id === 'Tomaster') || ($this->action->id === 'DemandExec')) { ?>  
<div>Отчет мастера</div>
<div>
    <?php 
        $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
            'id' => 'edRepMaster',
            'Width' => 800,
            'Height' => 50,
            'Value' => $model->RepMaster,
            'Name' => 'Demands[RepMaster]',
            'Type' => 'String',
        ));
    ?>
</div>

<div style="margin-top: 6px; border-top: 1px solid; border-bottom: 1px solid; float: left; padding: 6px">
    <div style="float: left">Передано</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDateMaster',
                'Name' => 'Demands[DateMaster]',
                'Width' => 160,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateMaster),
                //'ReadOnly' => true,
            ));
        ?>
        <div><?php echo $form->error($model, 'DateMaster'); ?></div>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnDateMaster',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Передать мастеру',
            ));
        ?> 
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnDateExec',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Выполнено',
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDateExec',
                'Name' => 'Demands[DateExec]',
                'Width' => 160,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateExec),
                //'ReadOnly' => true,
            ));
        ?>
        <div><?php echo $form->error($model, 'DateExec'); ?></div>
    </div>
</div>

<?php } ?>  

<div style="clear: both; margin-bottom: 6px"></div>

<div style="float: left;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnSave',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Сохранить',
            'FormName' => 'Demands',
            'Type' => 'Form',
            'OnAfterClick' => 'albuttonSettings["BtnSave"].Enabled = false;',
            //'Href' => Yii::app()->createUrl('Demands/view', array('Demand_id'=>$model->Demand_id)),
        ));
    ?>
</div>
<div style="float: left; margin-left: 6px">
  <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnEquip',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Оборудование',
            'Href' => Yii::app()->createUrl('ObjectsGroup/index', array('ObjectGr_id'=>$model->ObjectGr_id)).'#objgr_eq',
        ));
    ?>  
</div>
<div style="float: left; margin-left: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnObjectInfo',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Карточка клиента',
            'Href' => Yii::app()->createUrl('ObjectsGroup/index', array('ObjectGr_id'=>$model->ObjectGr_id)),
        ));
    ?>
    
</div>
            

<?php $this->endWidget(); ?>



<script>
    function priorColored() {
        var prioir = alcomboboxajaxSettings.cmbDemandPrior.CurrentRow ? alcomboboxajaxSettings.cmbDemandPrior.CurrentRow['DemandPrior'] : ''
        if(typeof prioir != 'string')
            return false
        switch (prioir.toLowerCase()) {
            case 'аварийная':
                $('#cmbDemandPrior input.alcomboboxajaxInput').css({'color': '#ff0000'})
                break
            case 'срочная':
                $('#cmbDemandPrior input.alcomboboxajaxInput').css({'color': '#ff00ff'})
                break
            default:
                $('#cmbDemandPrior input.alcomboboxajaxInput').css({'color': '#000000'})
                break
        }
    }
</script>