<?php
   
    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'Objects',
            'action'=> $this->action_url,
            'enableClientValidation'=>true,
            'enableAjaxValidation'=>true,
    ));
    
    echo '<input name="Objects[ObjectGr_id]" id="Objects_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>';
    echo '<input name="Objects[Object_id]" id="Objects_Object_id" type="text" style="display: none;" value="' . $model->Object_id . '"/>';
?>    
    
<table>
    <tbody>
        <tr>
            <td><?php echo $form->labelEx($model,'Doorway'); ?></td>
            <td>
                <?php echo $form->textField($model,'Doorway'); ?>
                <?php echo $form->error($model,'Doorway'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'ObjectType'); ?></td>
            <td>
                <?php
                    $ObjectTypes = new ObjectTypes();
                    $ObjectTypes = $ObjectTypes->getData();
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbObjectType',
                        'popupid' => 'cmbObjectTypeGrid',
                        'data' => $ObjectTypes,
                        'label' => '',
                        'name' => 'Objects[ObjectType_id]',
                        'fieldname' => 'ObjectType',
                        'keyfield' => 'ObjectType',
                        'keyvalue' => $model->ObjectType,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'ObjectType' => array(
                                'name' => 'Число квартир',
                                'fieldname' => 'ObjectType',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),
                        
                    ));
                    echo $form->error($model,'ObjectType');
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Complexity_id'); ?></td>
            <td>
                <?php
                    $ComplexityTypes = new ComplexityTypes();
                    $ComplexityTypes = $ComplexityTypes->getData();
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbComplexityType',
                        'popupid' => 'cmbComplexityTypeGrid',
                        'data' => $ComplexityTypes,
                        'label' => '',
                        'name' => 'Objects[Complexity_id]',
                        'fieldname' => 'ComplexityName',
                        'keyfield' => 'Complexity_Id',
                        'keyvalue' => $model->Complexity_id,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'ComplexityName' => array(
                                'name' => 'Число квартир',
                                'fieldname' => 'ComplexityName',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),
                        
                    ));
                    echo $form->error($model,'Complexity_id');
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Code'); ?></td>
            <td>
                <?php echo $form->textField($model,'Code'); ?>
                <?php echo $form->error($model,'Code'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'MasterKey'); ?></td>
            <td>
                <?php echo $form->checkBox($model,'MasterKey'); ?>
                <?php echo $form->error($model,'MasterKey'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Signal'); ?></td>
            <td>
                <?php echo $form->textField($model,'Signal'); ?>
                <?php echo $form->error($model,'Signal'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'Cntp_id'); ?></td>
            <td>
                <?php
                    $ConnectionTypes = new ConnectionTypes();
                    $ConnectionTypes = $ConnectionTypes->getData();
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbConnectionType',
                        'popupid' => 'cmbConnectionTypeGrid',
                        'data' => $ConnectionTypes,
                        'label' => '',
                        'name' => 'Objects[Cntp_id]',
                        'fieldname' => 'ConnectionType',
                        'keyfield' => 'ConnectionType_id',
                        'keyvalue' => $model->Cntp_id,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'ConnectionType' => array(
                                'name' => 'Тип связи',
                                'fieldname' => 'ConnectionType',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),
                        
                    ));
                    echo $form->error($model,'Complexity_id');
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Note'); ?></td>
            <td>
                <?php echo $form->textArea($model,'Note', array('style' => 'width: 250px')); ?>
                <?php echo $form->error($model,'Note'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Condition'); ?></td>
            <td>
                <?php echo $form->textArea($model,'Condition', array('style' => 'width: 250px')); ?>
                <?php echo $form->error($model,'Condition'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <br>
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                        'id' => 'Save',
                        'width' => 114,
                        'height' => 30,
                        'text' => 'Сохранить',
                        'name' => 'yt0',
                        'form' => 'Objects',
                        'url' => $this->action_url,
                    ));
                ?>
            </td>
        </tr>
    </tbody>
</table>

<?php
    $this->endWidget();
?>