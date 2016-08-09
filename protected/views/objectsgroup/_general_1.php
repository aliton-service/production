<script>
    Aliton.Links.push({
        Out: "cmbRegion",
        In: "cmbStreet",
        TypeControl: "Combobox",
        Condition: "st.Region_id = :Value",
        Field: "Region_id",
        Name: "cmbRegion_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "LphName",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "lph_name",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "Adr1",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "JAddress",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "Adr2",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "FAddress",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "INN",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "inn",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "Acc",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "account",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "Bank",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "bank_name",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "Bik",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "bik",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "cmbPropForm",
        In: "KAcc",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "cor_account",
        Name: "cmbPropForm_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>
<br>
<div style="width: 100%; min-width: 1000px">
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

    echo '<input name="ObjectsGroup[ObjectGr_id]" id="ObjectsGroup_ObjectGr_id" type="text" style="display: none;" value="' . $model->ObjectGr_id . '"/>';
    echo '<input name="ObjectsGroup[Address_id]" id="ObjectsGroup_Address_id" type="text" style="display: none;" value="' . $model->Address_id . '"/>';
?>

<table border="0">
    <tbody>
        <tr>
            <td><?php echo $form->labelEx($model,'PropForm_id'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbPropForm',
                        'Key' => 'ObjectsGroup_EditForm_PropForm',
                        'ModelName' => 'OrganizationsV',
                        'Name' => 'ObjectsGroup[PropForm_id]',
                        'FieldName' => 'FullName',
                        'KeyField' => 'Form_id',
                        'KeyValue' => $model->PropForm_id,
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => "p.Fullname like '%:Value%'",
                        ),
                        'Width' => 300,
                        'Columns' => array(
                            'FullName' => array(
                                'Name' => 'Организация',
                                'FieldName' => 'FullName',
                                'Width' => 300,
                            ),
                        ),
                    ));
                    echo $form->error($model,'PropForm_id');
                ?>
            </td>
            <td><?php echo $form->labelEx($model,'LphName'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'LphName',
                        'Width' => 200,
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
                <?php echo $form->error($model,'LphName'); ?>
            </td>

        </tr>
        <tr>
            <td>Юр. адрес:</td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Adr1',
                        'Width' => 200,
                        'Value' => '',
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
            <td>ИНН</td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'INN',
                        'Width' => 200,
                        'Value' => '',
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td>Факт. адрес:</td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Addr2',
                        'Width' => 200,
                        'Value' => '',
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
            <td>Р/СЧ</td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Acc',
                        'Width' => 200,
                        'Value' => '',
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td>Банк:</td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Bank',
                        'Width' => 200,
                        'Value' => '',
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
            <td>Бик</td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Bik',
                        'Width' => 200,
                        'Value' => '',
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
            <td>КОР/СЧ</td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'KAcc',
                        'Width' => 200,
                        'Value' => '',
                        'Type' => 'String',
                        'ReadOnly' => true,
                    ));
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="6">Адрес</td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Region_id'); ?></td>
            <td>
                <?php
                   
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbRegion',
                        'Key' => 'ObjectsGroup_EditForm_Region',
                        'ModelName' => 'Regions',
                        'Name' => 'ObjectsGroup[Region_id]',
                        'FieldName' => 'RegionName',
                        'KeyField' => 'Region_id',
                        'KeyFieldPrefix' => 't.',
                        'KeyValue' => $model->Region_id,
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => "r.RegionName like ':Value%'",
                            ),
                        'Width' => 300,
                        
                        'Columns' => array(
                            'RegionName' => array(
                                'Name' => 'Район',
                                'FieldName' => 'RegionName',
                                'Width' => 300,
                            ),
                        ),
                    ));
                    echo $form->error($model,'Region_id');
                ?>
            </td>
            <td><?php echo $form->labelEx($model,'Area_id'); ?></td>
            <td>
                <?php
                    $Areas = new Areas();
                    $Areas = $Areas->getData();
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbArea',
                        'ModelName' => 'Areas',
                        'Name' => 'ObjectsGroup[Area_id]',
                        'FieldName' => 'AreaName',
                        'KeyField' => 'Area_id',
                        'KeyValue' => $model->Area_id,
                        'Width' => 200,
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => "a.AreaName like ':Value%'",
                        ),
                        'Columns' => array(
                            'AreaName' => array(
                                'Name' => 'Район',
                                'FieldName' => 'AreaName',
                                'Width' => 150,
                                'Height' => 23,
                            ),
                        ),
                        
                    ));
                    echo $form->error($model,'Area_id');
                ?>
            </td>
            <td><?php echo $form->labelEx($model,'Street_id'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbStreet',
                        'Key' => 'ObjectsGroup_EditForm_Street',
                        'ModelName' => 'Streets',
                        'Name' => 'ObjectsGroup[Street_id]',
                        'FieldName' => 'StreetName',
                        'KeyField' => 'Street_id',
                        'KeyFieldPrefix' => 't.',
                        'KeyValue' => $model->Street_id,
                        'Width' => 300,
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => "st.StreetName like ':Value%'",
                        ),
                        'Columns' => array(
                            'StreetName' => array(
                                'Name' => 'Улицы',
                                'FieldName' => 'StreetName',
                                'Width' => 300,
                            ),
                        ),
                    ));
                    
                ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'House'); ?></td>
            <td>
                <?php //echo $form->textField($model,'House'); ?>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'House',
                        'Width' => 50,
                        'Value' => $model->House,
                        'Name' => 'ObjectsGroup[House]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'House'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'Corp'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Corp',
                        'Width' => 50,
                        'Value' => $model->Corp,
                        'Name' => 'ObjectsGroup[Corp]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Corp'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'Room'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Room',
                        'Width' => 50,
                        'Value' => $model->Room,
                        'Name' => 'ObjectsGroup[Room]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Room'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Apartment'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Apartment',
                        'Width' => 50,
                        'Value' => $model->Apartment,
                        'Name' => 'ObjectsGroup[Apartment]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Apartment'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'Entrance'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Entrance',
                        'Width' => 50,
                        'Value' => $model->Entrance,
                        'Name' => 'ObjectsGroup[Entrance]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Entrance'); ?>
            </td>
            <td></td>
            <td></td>
            
            
        </tr>
        
        <tr>
            <td><?php echo $form->labelEx($model,'year_construction'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'year_construction',
                        'Width' => 50,
                        'Value' => $model->year_construction,
                        'Name' => 'ObjectsGroup[year_construction]',
                        'Type' => 'Integer',
                    ));
                ?>
                <?php echo $form->error($model,'year_construction'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'CountPorch'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'CountPorch',
                        'Width' => 50,
                        'Value' => $model->CountPorch,
                        'Name' => 'ObjectsGroup[CountPorch]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'CountPorch'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'clgr_id'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbClientGroup',
                        'ModelName' => 'ClientGroups',
                        'Name' => 'ObjectsGroup[clgr_id]',
                        'FieldName' => 'ClientGroup',
                        'KeyField' => 'clgr_id',
                        'KeyValue' => $model->clgr_id,
                        'Width' => 300,
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => "cg.ClientGroup like ':Value%'",
                        ),
                        'Columns' => array(
                            'ClientGroup' => array(
                                'Name' => 'Сегмент',
                                'FieldName' => 'ClientGroup',
                                'Width' => 150,
                                'Height' => 23,
                            ),
                        ),
                    ));
                ?>
            </td>
            
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Floor'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'Floor',
                        'Width' => 50,
                        'Value' => $model->Floor,
                        'Name' => 'ObjectsGroup[Floor]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Floor'); ?>
            </td>
            <td><?php echo $form->labelEx($model,'Journal'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'Journal',
                        'Value' => DateTimeManager::YiiDateToAliton($model->Journal),
                        'Name' => 'ObjectsGroup[Journal]',
                    ));
                ?>
                <?php echo $form->error($model,'Journal'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'PostalAddress'); ?></td>
            <td>
                <?php 
                    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'PostalAddress',
                        'Width' => 250,
                        'Value' => $model->PostalAddress,
                        'Name' => 'ObjectsGroup[PostalAddress]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'PostalAddress'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Information'); ?></td>
            <td colspan="3">
                <?php 
                    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'Information',
                        'Width' => 500,
                        'Height' => 50,
                        'Value' => $model->Information,
                        'Name' => 'ObjectsGroup[Information]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Information'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Refusers'); ?></td>
            <td colspan="3">
                 <?php 
                    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'Refusers',
                        'Width' => 500,
                        'Height' => 50,
                        'Value' => $model->Refusers,
                        'Name' => 'ObjectsGroup[Refusers]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Refusers'); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo $form->labelEx($model,'Note'); ?></td>
            <td colspan="3">
                <?php 
                    $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'Note',
                        'Width' => 500,
                        'Height' => 50,
                        'Value' => $model->Note,
                        'Name' => 'ObjectsGroup[Note]',
                        'Type' => 'String',
                    ));
                ?>
                <?php echo $form->error($model,'Note'); ?>
            </td>
        </tr>
        <tr>
            <td>
                <?php echo $form->labelEx($model,'Srmg_id'); ?>
            </td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbSrmg',
                        'Stretch' => true,
                        'Key' => 'ObjectsGroup_EditForm_CmbSrmg',
                        'ModelName' => 'Employees',
                        'Name' => 'ObjectsGroup[Srmg_id]',
                        'Height' => 300,
                        'Width' => 250,
                        'PopupWidth' => 300,
                        'KeyField' => 'Employee_id',
                        'KeyValue' => $model->Srmg_id,
                        'FieldName' => 'ShortName',
                        'Type' => array(
                            'Type' => 'Locate',
                            'Condition' => "e.EmployeeName like ':Value%'",
                        ),
                        'Columns' => array(
                            'EmployeeName' => array(
                                'Name' => 'ФИО',
                                'FieldName' => 'EmployeeName',
                                'Width' => 300,
                                'Filter' => array(
                                    'Condition' => "e.EmployeeName like ':Value%'",
                                ),

                            ),
                        ),
                    ));
                ?>
            </td>
            </tr>
            <tr>
            <td><?php echo $form->labelEx($model,'Slmg_id'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbSlmg',
                        'Stretch' => true,
                        'Key' => 'ObjectsGroup_EditForm_CmbSrmg',
                        'ModelName' => 'Employees',
                        'Name' => 'ObjectsGroup[Slmg_id]',
                        'Height' => 300,
                        'Width' => 250,
                        'PopupWidth' => 300,
                        'KeyField' => 'Employee_id',
                        'KeyValue' => $model->Slmg_id,
                        'FieldName' => 'ShortName',
                        'Type' => array(
                            'Type' => 'Locate',
                            'Condition' => "e.EmployeeName like ':Value%'",
                        ),
                        'Columns' => array(
                            'EmployeeName' => array(
                                'Name' => 'ФИО',
                                'FieldName' => 'EmployeeName',
                                'Width' => 300,
                                'Filter' => array(
                                    'Condition' => "e.EmployeeName like ':Value%'",
                                ),

                            ),
                        ),
                    ));
                    
                ?>
            </td>
            </tr>
            <tr>
            <td><?php echo $form->labelEx($model,'Inmg_id'); ?></td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbInmg',
                        'Stretch' => true,
                        'Key' => 'ObjectsGroup_EditForm_CmbSrmg',
                        'ModelName' => 'Employees',
                        'Name' => 'ObjectsGroup[Inmg_id]',
                        'Height' => 300,
                        'Width' => 250,
                        'PopupWidth' => 300,
                        'KeyField' => 'Employee_id',
                        'KeyValue' => $model->Inmg_id,
                        'FieldName' => 'ShortName',
                        'Type' => array(
                            'Type' => 'Locate',
                            'Condition' => "e.EmployeeName like ':Value%'",
                        ),
                        'Columns' => array(
                            'EmployeeName' => array(
                                'Name' => 'ФИО',
                                'FieldName' => 'EmployeeName',
                                'Width' => 300,
                                'Filter' => array(
                                    'Condition' => "e.EmployeeName like ':Value%'",
                                ),

                            ),
                        ),
                    ));
                    
                ?>
            </td>
        </tr>
    </tbody>
</table>

    



<br>
<table>
    <tbody>
        <tr>
            <td>
                <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'Save',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Сохранить',
                    'Type' => 'Form',
                    'FormName' => 'ObjectsGroup',
                ));
                ?>
            </td>
            <td>
                <?php
                /*
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'Cancel',
                    'width' => 114,
                    'height' => 30,
                    'text' => 'Отменить',
                    'url' => Yii::app()->createUrl('Objectsgroup/index', array('ObjectGr_id'=>9633)),
                ));
                 * 
                 */
                ?>
            </td>
            <td></td>
        </tr>
    </tbody>
</table>

<?php
    $this->endWidget();
    
?>
</div>
<script>
    /*
    $.relDropList({
        controller:'streets',
        action:'getStreets',
        rel:'#regions',
        list: '#streets',

        //empty: "Выбрать из карточки объекта"
    })

    $('#ObjectsGroup').on('submit', function () {
        if($('#regions').val() == '') {
            alert('Выберите регион')
            return false
        }
        if($('#streets').val() == '') {
            alert('Выберите улицу')
            return false
        }

        if($('#house').val() == '') {
            alert('Выберите дом')
            return false
        }
    })
    */
</script>