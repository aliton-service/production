<?php
   $form=$this->beginWidget('CActiveForm', array(
            'id'=>'ObjectsGroupSystems',
            'action'=> $this->action_url,
            'enableClientValidation'=>true,
            'enableAjaxValidation'=>true,
    ));

    echo '<input name="ObjectsGroupSystems[ObjectGr_id]" id="ObjectsGroupSystems_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>';
    echo '<input name="ObjectsGroupSystems[ObjectsGroupSystem_id]" id="ObjectsGroupSystems_ObjectsGroupSystem_id" type="text" style="display: none;" value="' . $model->ObjectsGroupSystem_id . '"/>';
?>

<table>
    <tbody>
        <tr>
            <td><?php echo $form->labelEx($model,'Sttp_id'); ?></td>
            <td>
                <?php
                    $SystemTypes = new SystemTypes();
                    $SystemTypes = $SystemTypes->getData();
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbSystemType',
                        'popupid' => 'cmbSystemTypeGrid',
                        'data' => $SystemTypes,
                        'label' => '',
                        'name' => 'ObjectsGroupSystems[Sttp_id]',
                        'fieldname' => 'SystemTypeName',
                        'keyfield' => 'SystemType_Id',
                        'keyvalue' => $model->Sttp_id,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'SystemTypeName' => array(
                                'name' => 'Тип системы',
                                'fieldname' => 'SystemTypeName',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),

                    ));
                    echo $form->error($model,'Sttp_id');
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Availability_id'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbSystemAvailabilitys',
                        'ModelName' => 'SystemAvailabilitys',
                        'Name' => 'ObjectsGroupSystems[Availability_id]',
                        'FieldName' => 'availability',
                        'KeyField' => 'code_id',
                        'KeyValue' => $model->Availability_id,
                        'Width' => 200,
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => 'sa.availability like \':Value%\'',
                        ),
                        'Columns' => array(
                            'availability' => array(
                                'Name' => 'Наличие',
                                'FieldName' => 'availability',
                                'Width' => 150,
                                'Height' => 23,
                            ),
                        ),

                    ));
                    echo $form->error($model,'Availability_id');
                ?>
            </td>
            <td><?php echo $form->labelEx($model,'Count'); ?></td>
            <td>
                <?php echo $form->textField($model,'Count'); ?>
                <?php echo $form->error($model,'Count'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Condition'); ?></td>
            <td colspan="3">
                <?php echo $form->textArea($model,'Condition', array('style' => 'width: 500px')); ?>
                <?php echo $form->error($model,'Condition'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Desc'); ?></td>
            <td colspan="3">
                <?php echo $form->textArea($model,'Desc', array('style' => 'width: 500px')); ?>
                <?php echo $form->error($model,'Desc'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                        'id' => 'Save',
                        'Width' => 114,
                        'Height' => 30,
                        'Text' => 'Сохранить',
                        'Type' => 'Form',
                        'FormName' => 'ObjectsGroupSystems',
                        'Href' => $this->action_url,
                    ));
                ?>
            </td>
        </tr>
    </tbody>
</table>

<?php $this->endWidget(); ?>