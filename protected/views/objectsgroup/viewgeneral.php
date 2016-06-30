<?php

    $url = Yii::app()->createUrl('Objectsgroup/update', array('ObjectGr_id' => $model->ObjectGr_id));
    
    $form=$this->beginWidget('CActiveForm', array(
            'id'=>'ObjectsGroup',
            'action'=> $url,
            'htmlOptions'=>array(
                'class'=>'form-inline'
                ),
            'enableClientValidation'=>true,
            'enableAjaxValidation'=>true,
    ));
?>
<table border="0">
    <tbody>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'FullName');?>
            </td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'FullName',
                        'Width' => 400,
                        'Value' => $model->FullName,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
            <td><?php echo $form->labelEx($model,'LphName'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'LphName',
                        'Width' => 200,
                        'Value' => $model->LphName,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'LphName'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Address'); ?></td>
            <td colspan="3">
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Address',
                        'Width' => 400,
                        'Value' => $model->Address,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Address'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Apartment'); ?></td>
            <td>
                
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Apartment',
                        'Width' => 150,
                        'Value' => $model->Apartment,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Apartment'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'Floor'); ?></td>
            <td>
                
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Floor',
                        'Width' => 150,
                        'Value' => $model->Floor,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Floor'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'year_construction'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'year_construction',
                        'Width' => 150,
                        'Value' => $model->year_construction,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'year_construction'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Entrance'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Entrance',
                        'Width' => 150,
                        'Value' => $model->Entrance,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Entrance'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'CountPorch'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'CountPorch',
                        'Width' => 150,
                        'Value' => $model->CountPorch,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'CountPorch'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'ClientGroup'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'ClientGroup',
                        'Width' => 150,
                        'Value' => $model->ClientGroup,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'ClientGroup'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'Journal'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Journal',
                        'Width' => 150,
                        'Value' => $model->Journal,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Journal'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'PostalAddress'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'PostalAddress',
                        'Width' => 150,
                        'Value' => $model->PostalAddress,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'PostalAddress'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Refusers'); ?></td>
            <td colspan="6">
                <?php
                    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'Refusers',
                        'Width' => 159,
                        'Value' => $model->Refusers,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Refusers'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Note'); ?></td>
            <td colspan="6">
                <?php
                    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'Note',
                        'Width' => 500,
                        'Height' => 50,
                        'Value' => $model->Note,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Note'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Information'); ?></td>
            <td colspan="6">
                <?php
                    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'Information',
                        'Width' => 500,
                        'Height' => 50,
                        'Value' => $model->Information,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'Information'); ?>
            </td>
        </tr>
    </tbody>
</table>
<?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'ObjectGroupEdit',
        'Width' => 114,
        'Height' => 30,
        'Text' => 'Изменить',
        'Type' => 'NewWindow',
        'Href' => Yii::app()->createUrl('Objectsgroup/editform', array('ObjectGr_id'=>$model->ObjectGr_id)),
    ));

    $this->endWidget();
echo '<br>';
echo '<div>';

    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'ContactsGrid',
        'Width' => 800,
        'Height' => 250,
        'Visible' => true,
        'Stretch' => true,
        'Filters' => array(
            array(
                'Type' => 'Internal',
                'Control' => 'Form',
                'Condition' => 'ci.ObjectGr_id = ' . $model->ObjectGr_id,
                'Value' => '',
                'Name' => 'Form1',
            ),
        ),
        'Key' => 'ObjectsGroup_Index_ContactsGrid_1',
        'ModelName' => 'ContactInfo',
        'Columns' => array(
            'FIO' => array(
                'Name' => 'ФИО',
                'FieldName' => 'FIO',
                'Width' => 300,
            ),
            'CustomerName' => array(
                'Name' => 'Должность',
                'FieldName' => 'CustomerName',
                'Width' => 100,
            ),
            'Telephone' => array(
                'Name' => 'Телефон',
                'FieldName' => 'Telephone',
                'Width' => 100,
            ),
            'Email' => array(
                'Name' => 'Электронная почта',
                'FieldName' => 'Email',
                'Width' => 100,
            ),
            'CTelephone' => array(
                'Name' => 'Сотовый телефон',
                'FieldName' => 'CTelephone',
                'Width' => 100,
            ),
            'Birthday' => array(
                'Name' => 'Дата рождения',
                'FieldName' => 'Birthday',
                'Width' => 100,
            ),
            'Main' => array(
                'Name' => 'ЛПР',
                'FieldName' => 'Main',
                'Width' => 100,
            ),
            'ForReport' => array(
                'Name' => 'Для отчетов',
                'FieldName' => 'ForReport',
                'Width' => 100,
            ),
        ),    
    ));

    echo '</div>';
?>

<table border="0" style="">
    <tbody>
        <tr>
            <td>
                <?php
                
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'AddContact',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Добавить',
                    'Type' => 'NewWindow',
                    'Href' => Yii::app()->createUrl('ContactInfo/insert', array('ObjectGr_id' => $model->ObjectGr_id)),
                ));
                ?>
            </td>
            <td>
                <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'EditContact',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Изменить',
                    'Href' => Yii::app()->createUrl('ContactInfo/update'),
                    'Params' => array(
                        array(
                            'ParamName' => 'Info_id',
                            'NameControl' => 'ContactsGrid',
                            'TypeControl' => 'Grid',
                            'FieldControl' => 'Info_id',
                        ),
                    ),
                ));
                ?>
            </td>
            <td>
                <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'DeleteContact',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Удалить',
                    'Type' => 'Window',
                    'Href' => Yii::app()->createUrl('ContactInfo/delete'),
                    'Params' => array(
                        array(
                            'ParamName' => 'Info_id',
                            'NameControl' => 'ContactsGrid',
                            'TypeControl' => 'Grid',
                            'FieldControl' => 'Info_id',
                        ),
                    ),
                ));
                ?>
            </td>
        </tr>
    </tbody>
</table>