<?php
   
    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'ObjectEquips',
            'action'=> $this->action_url,
            'enableClientValidation'=>true,
            'enableAjaxValidation'=>true,
    ));
    
    echo '<input name="ObjectEquips[Object_id]" id="ObjectEquips_Object_id" type="text" style="display: none;" value="' . $model->Object_Id . '"/>';
    echo '<input name="ObjectEquips[ObjectGr_id]" id="ObjectEquips_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>';
    echo '<input name="ObjectEquips[Code]" id="ObjectEquips_Code" type="text" style="display: none;" value="' . $model->Code . '"/>';
?>    
    
<table>
    <tbody>
        <tr>
            <td><?php echo $form->labelEx($model,'Equip_id'); ?></td>
            <td>
                <?php
                    $EquipListAll = new EquipsListAll();
                    $EquipListAll = $EquipListAll->Find(array());
                    $this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
                        'id' => 'cmbEquip',
                        'popupid' => 'cmbEquipGrid',
                        'data' => $EquipListAll,
                        'label' => '',
                        'name' => 'ObjectEquips[Equip_id]',
                        'fieldname' => 'EquipName',
                        'keyfield' => 'Equip_id',
                        'keyvalue' => $model->Equip_id,
                        'width' => 200,
                        'showcolumns' => true,
                        'columns' => array(
                            'EquipName' => array(
                                'name' => 'Оборудование',
                                'fieldname' => 'EquipName',
                                'width' => 150,
                                'height' => 23,
                            ),
                        ),
                        
                    ));
                    echo $form->error($model,'Equip_id');
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'EquipQuant'); ?></td>
            <td>
                <?php echo $form->textField($model,'EquipQuant'); ?>
                <?php echo $form->error($model,'EquipQuant'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'StockNumber'); ?></td>
            <td>
                <?php echo $form->textField($model,'StockNumber'); ?>
                <?php echo $form->error($model,'StockNumber'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Location'); ?></td>
            <td>
                <?php echo $form->textField($model,'Location'); ?>
                <?php echo $form->error($model,'Location'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'DateInstall'); ?></td>
            <td>
                <?php $this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
			'name' => 'ObjectEquips[DateInstall]',
                        'value' => $model->DateInstall,
		));
                echo $form->error($model,'DateInstall');
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'DateService'); ?></td>
            <td>
                <?php $this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
			'name' => 'ObjectEquips[DateService]',
                        'value' => $model->DateService,
		));
                echo $form->error($model,'DateService');
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Note'); ?></td>
            <td>
                <?php echo $form->textArea($model,'Note', array('style' => 'width: 300px; height: 70px;')); ?>
                <?php echo $form->error($model,'Note'); ?>
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
                        'FormName' => 'ObjectEquips',
                        'Href' => $this->action_url,
                    ));
                ?>
            </td>
        </tr>
    </tbody>
</table>

<?php
    $this->endWidget();
?>