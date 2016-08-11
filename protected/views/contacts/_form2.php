<div class="form">

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Contacts',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation'=>false,
    )); 
    
    echo '<input name="Contacts[ObjectGr_id]" id="Contacts_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>';
    echo '<input name="Contacts[cont_id]" id="Contacts_cont_id" type="text" style="display: none;" value="' . $model->cont_id . '"/>';
?>

    <table>
        <tbody>
            <tr>
                <td><?php echo $form->labelEx($model,'Тема контакта'); ?></td>
                <td>
                    <?php
                    $ContactKinds = new ContactKinds();
                    $ContactKinds = $ContactKinds->getData();
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbContactKind',
                        'popupid' => 'cmbContactKindGrid',
                        'data' => $ContactKinds,
                        'label' => '',
                        'name' => 'Contacts[Kind]',
                        'fieldname' => 'Kind_name',
                        'keyfield' => 'Kind_id',
                        'keyvalue' => $model->Kind,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'Kind_name' => array(
                                'name' => 'Тема',
                                'fieldname' => 'Kind_name',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),
                        
                    ));
                    ?>
                </td>
                <td><?php echo $form->labelEx($model,'date'); ?></td>
                <td>
                    <?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                            'id' => 'edDate',
                            'Name' => 'Contacts[date]',
                            'Value' => DateTimeManager::YiiDateToAliton($model->date),
                        ));
                        echo $form->error($model,'date');
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'cntp_id'); ?></td>
                <td>
                    <?php
                    $ContactTypes = new ContactTypes();
                    $ContactTypes = $ContactTypes->getData();
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbContactType',
                        'popupid' => 'cmbContactTypeGrid',
                        'data' => $ContactTypes,
                        'label' => '',
                        'name' => 'Contacts[cntp_id]',
                        'fieldname' => 'ContactName',
                        'keyfield' => 'Contact_id',
                        'keyvalue' => $model->cntp_id,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'ContactName' => array(
                                'name' => 'Тип',
                                'fieldname' => 'ContactName',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),
                        
                    ));
                    ?>
                    <?php echo $form->error($model,'cntp_id'); ?>
                </td>
            
                <td><?php echo $form->labelEx($model,'empl_id'); ?></td>
                <td>
                    <?php
                        $Employees = new Employees();
                        $Employees = $Employees->getData();
                        $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                            'id' => 'cmbEmpl',
                            'popupid' => 'cmbEmplGrid',
                            'data' => $Employees,
                            'label' => '',
                            'name' => 'Contacts[empl_id]',
                            'fieldname' => 'EmployeeName',
                            'keyfield' => 'empl_id',
                            'width' => 300,
                            'showcolumns' => true,
                            'columns' => array(
                                'Srmg_id' => array(
                                    'name' => 'Сотрудник',
                                    'fieldname' => 'EmployeeName',
                                    'width' => 250,
                                    'height' => 23,
                                ),
                            ),
                        ));
                        
                    ?>
                    <?php echo $form->error($model,'empl_id'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model, 'info_id'); ?></td>
                <td colspan="3">
                    <?php
                        $ContactInfo = new ContactInfo();
                        $ContactInfo = $ContactInfo->Find(array('ci.ObjectGr_id' => $model->ObjectGr_id));
                        
                        $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                            'id' => 'cmbContactInfo',
                            'popupid' => 'cmbContactInfoGrid',
                            'data' => $ContactInfo,
                            'label' => '',
                            'name' => 'Contacts[info_id]',
                            'fieldname' => 'contact',
                            'keyfield' => 'Info_id',
                            'keyvalue' => $model->info_id,
                            'width' => 400,
                            'showcolumns' => true,
                            'columns' => array(
                                'contact' => array(
                                    'name' => 'Контактное лицо',
                                    'fieldname' => 'contact',
                                    'width' => 150,
                                    'height' => 23,
                                ),
                            ),
                        ));
                     
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'Содержание'); ?></td>
                <td>
                    <?php echo $form->textArea($model,'text',array('style'=>'width:400px;height: 70px;min-width:250px', 'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'text'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model, 'drsn_id'); ?></td>
                <td>
                    <?php
                        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                            'id' => 'cmbDelayReason',
                            'ModelName' => 'DelayReasons',
                            'Name' => 'Contacts[drsn_id]',
                            'FieldName' => 'name',
                            'KeyField' => 'drsn_id',
                            'KeyValue' => $model->drsn_id,
                            'Width' => 300,
                            'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => 'd.name like \':Value%\'',
                            ),
                            'Columns' => array(
                                'Name' => array(
                                    'Name' => 'Причина долга',
                                    'FieldName' => 'name',
                                    'Width' => 150,
                                    
                                ),
                            ),
                        ));
                    ?>
                    <?php echo $form->error($model,'drsn_id'); ?>
                </td>
                <td><?php echo $form->labelEx($model, 'SourceInfo_id'); ?></td>
                <td>
                    <?php
                        $SourceInfo = new SourceInfo();
                        $SourceInfo = $SourceInfo->getData();
                        
                        $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                            'id' => 'cmbSourceInfo',
                            'popupid' => 'cmbSourceInfoGrid',
                            'data' => $SourceInfo,
                            'label' => '',
                            'name' => 'Contacts[SourceInfo_id]',
                            'fieldname' => 'SourceInfo_name',
                            'keyfield' => 'SourceInfo_id',
                            'keyvalue' => $model->SourceInfo_id,
                            'width' => 300,
                            'showcolumns' => true,
                            'columns' => array(
                                'SourceInfo_name' => array(
                                    'name' => 'Источник информации о фирме',
                                    'fieldname' => 'SourceInfo_name',
                                    'width' => 150,
                                    'height' => 23,
                                ),
                            ),
                        ));
                    ?>
                    <?php echo $form->error($model,'SourceInfo_id'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model, 'rslt_id'); ?></td>
                <td>    
                    <?php
                        $Results = new Results();
                        $Results = $Results->getData();
                        
                        $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                            'id' => 'cmbResult',
                            'popupid' => 'cmbResultGrid',
                            'data' => $Results,
                            'label' => '',
                            'name' => 'Contacts[SourceInfo_id]',
                            'fieldname' => 'ResultName',
                            'keyfield' => 'rslt_id',
                            'keyvalue' => $model->rslt_id,
                            'width' => 300,
                            'showcolumns' => true,
                            'columns' => array(
                                'SourceInfo_name' => array(
                                    'name' => 'Результат',
                                    'fieldname' => 'ResultName',
                                    'width' => 150,
                                    'height' => 23,
                                ),
                            ),
                        ));
                    ?>
                    <?php echo $form->error($model, 'rslt_id'); ?>
                </td>
                <td><?php echo $form->labelEx($model,'pay_date'); ?></td>
                <td>
                    <?php $this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
                            'name' => 'Contacts[pay_date]',
                            'value' => $model->pay_date,
                        ));
                        echo $form->error($model,'pay_date');
                    ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model, 'Telephone'); ?></td>
                <td>
                    <?php echo $form->textField($model,'Telephone',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'Telephone'); ?>
                </td>
                <td><?php echo $form->labelEx($model,'PaySum'); ?></td>
                <td>
                    <?php echo $form->textField($model,'PaySum',array('class'=>'form-control')); ?>
                    <?php echo $form->error($model,'PaySum'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'time_length'); ?></td>
                <td>
                    <?php echo $form->textField($model,'time_length',array('size'=>30,'maxlength'=>100, 'class'=>'form-control time')); ?>
                    <?php echo $form->error($model,'time_length'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model,'note'); ?></td>
                <td>
                    <?php echo $form->textArea($model,'note',array('style'=>'width:400px;height: 70px;min-width:250px', 'class'=>'form-control')); ?>
                    <?php echo $form->error($model,'note'); ?>
                </td>
            </tr>
        </tbody>
</table>
    <br>
    <div style="border-bottom: 1px Solid #c0c0c0">Следующий контакт</div>   
    <br>
    <table>
        <tbody>
            <tr>
                <td><?php echo $form->labelEx($model,'next_date'); ?></td>
                <td>
                    <?php $this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
                            'name' => 'Contacts[next_date]',
                            'value' => $model->next_date,
                        ));
                        echo $form->error($model,'next_date');
                    ?>
                </td>
                <td><?php echo $form->labelEx($model,'next_cntp_id'); ?></td>
                <td>
                    <?php
                    $ContactTypes = new ContactTypes();
                    $ContactTypes = $ContactTypes->getData();
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbNextContactType',
                        'popupid' => 'cmbNextContactTypeGrid',
                        'data' => $ContactTypes,
                        'label' => '',
                        'name' => 'Contacts[next_cntp_id]',
                        'fieldname' => 'ContactName',
                        'keyfield' => 'Contact_id',
                        'keyvalue' => $model->next_cntp_id,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'ContactName' => array(
                                'name' => 'Тип',
                                'fieldname' => 'ContactName',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),
                        
                    ));
                    ?>
                    <?php echo $form->error($model,'next_cntp_id'); ?>
                </td>
            </tr>
            <tr>
                <td><?php echo $form->labelEx($model, 'next_info_id'); ?></td>
                <td colspan="2">
                    <?php
                        $ContactInfo = new ContactInfo();
                        $ContactInfo = $ContactInfo->Find(array('ci.ObjectGr_id' => $model->ObjectGr_id));
                        
                        $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                            'id' => 'cmbNextContactInfo',
                            'popupid' => 'cmbNextContactInfoGrid',
                            'data' => $ContactInfo,
                            'label' => '',
                            'name' => 'Contacts[next_info_id]',
                            'fieldname' => 'contact',
                            'keyfield' => 'next_info_id',
                            'keyvalue' => $model->next_info_id,
                            'width' => 400,
                            'showcolumns' => true,
                            'columns' => array(
                                'contact' => array(
                                    'name' => 'Контактное лицо',
                                    'fieldname' => 'contact',
                                    'width' => 150,
                                    'height' => 23,
                                ),
                            ),
                        ));
                     
                    ?>
                </td>
            </tr>
        </tbody>
    </table>
    
<?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'Save',
        'Width' => 114,
        'Height' => 30,
        'Text' => 'Сохранить',
        'FormName' => 'Contacts',
        'Href' => $this->action_url,
    ));
?>
    
<?php $this->endWidget(); ?>

</div><!-- form -->