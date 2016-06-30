<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'WhActs',
        'htmlOptions'=>array(
                'class'=>'form-inline'
                ),
        'enableAjaxValidation' => true,
        'enableClientValidation' => true,
    )); 

?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edDocm_id',
        'Width' => 200,
        'Type' => 'String',
        'Name' => 'WhActs[docm_id]',
        'Value' => $model->docm_id,
        'ReadOnly' => true,
        'Visible' => false
    ));
?>

<div style="float: left">
<div style="float: left; border: 1px solid; padding: 6px">
   <div>
        <div style="float: left; width: 50px">Адрес</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbObjects',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbObjectsGrid',
                    'ModelName' => 'ListObjects',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 400,
                    'Name' => 'WhActs[objc_id]',
                    'PopupWidth' => 500,
                    'KeyField' => 'Object_id',
                    'KeyValue' => $model->objc_id,
                    'FieldName' => 'Addr',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => "a.Addr like ':Value%'",
                    ),
                    'OnAfterChange' => 'if (alcomboboxajaxSettings["CmbObjects"].CurrentRow !== null) { '
                    . '                     $("#CmbOrganizations").alcomboboxajax("SetValue", alcomboboxajaxSettings["CmbObjects"].CurrentRow["PropForm_id"], true);'
                    . '                     $("#edServiceType").aledit("SetValue", alcomboboxajaxSettings["CmbObjects"].CurrentRow["ServiceType"]);'
                    . '                     $("#CmbJuridical").alcomboboxajax("SetValue", alcomboboxajaxSettings["CmbObjects"].CurrentRow["jrdc_id"]);'
                    . '                }'
                                       . ' ',
                    'Columns' => array(
                        'Addr' => array(
                            'Name' => 'Адрес',
                            'FieldName' => 'Addr',
                            'Width' => 300,
                            'Filter' => array(
                                'Condition' => "a.Addr like ':Value%'",
                            ),

                        ),
                    ),
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-top: 6px">
        <div style="float: left; width: 50px">Клиент</div>
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbOrganizations',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbOrganizations',
                    'ModelName' => 'OrganizationsV',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 300,
                    'PopupWidth' => 500,
                    'KeyField' => 'Form_id',
                    'FieldName' => 'FullName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "p.FullName like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'FullName' => array(
                            'Name' => 'Клиент',
                            'FieldName' => 'FullName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edServiceType',
                'Width' => 200,
                'Type' => 'String',
                'Value' => $model->ServiceType,
                'ReadOnly' => true,
            ));
        ?>
    </div>
</div>
    
<div style="clear: both"></div>
<div style="margin-top: 12px; padding: 6px; float: left; border: 1px solid">
    <div style="float: left">
        <div style="float: left; width: 50px">Вид</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbWhDckn',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbWhDckn',
                    'ModelName' => 'WHDocKinds',
                    'Name' => 'WhActs[dckn_id]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 500,
                    'KeyField' => 'dckn_id',
                    'KeyValue' => $model->dckn_id,
                    'FieldName' => 'name',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "k.name like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'name' => array(
                            'Name' => 'Вид',
                            'FieldName' => 'name',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'edSignedYn',
                    'Label' => 'Подписан',
                    'Checked' => $model->signed_yn,
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbCustomer',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbCustomer',
                    'ModelName' => 'Customers',
                    'Name' => 'WhActs[cstm_id]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 250,
                    'PopupWidth' => 500,
                    'KeyField' => 'Customer_Id',
                    'KeyValue' => $model->cstm_id,
                    'FieldName' => 'CustomerName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "c.CustomerName like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'name' => array(
                            'Name' => 'Должность',
                            'FieldName' => 'CustomerName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
            
        </div> 
    </div>
    <div style="clear: both"></div>
    
    <div >
        <div style="width: 50px">Примечание</div>
        <div style="">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'edNote',
                    'Width' => 558,
                    'Height' => 60,
                    'Name' => 'WhActs[note]',
                    'Value' => $model->note,
                    'ReadOnly' => false,
                ));
            ?>
        </div> 
    </div>
</div>
</div>

<div style="margin-left: 6px; float: left; border: 1px solid; padding: 6px">
    <div style="float: left">
        <div style="float: left; width: 100px">Сумма по акту</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edSumAct',
                    'Width' => 150,
                    'Type' => 'String',
                    'Name' => 'WhActs[sum]',
                    'Value' => $model->sum,
                    'ReadOnly' => false,
                ));
            ?>
        </div> 
    </div>
    <div style="clear: both"></div>
    <div style="margin-top: 6px">
        <div style="float: left; width: 100px">Форма оплаты</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbPaymentType',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbPaymentType',
                    'ModelName' => 'PaymentTypes',
                    'Name' => 'WhActs[pmtp_id]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 500,
                    'KeyField' => 'PaymentType_Id',
                    'KeyValue' => $model->pmtp_id,
                    'FieldName' => 'PaymentTypeName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "pt.PaymentTypeName like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'PaymentTypeName' => array(
                            'Name' => 'Вид оплаты',
                            'FieldName' => 'PaymentTypeName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'pmtp_id'); ?></div>
    </div>
    <div style="clear: both"></div>
    <div style="margin-top: 6px">
        <div style="float: left; width: 100px">Счет</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edBill',
                    'Width' => 150,
                    'Type' => 'String',
                    'Name' => 'WhActs[bill]',
                    'Value' => $model->bill,
                    'ReadOnly' => false,
                ));
            ?>
        </div> 
    </div>
    <div style="clear: both"></div>
    <div style="margin-top: 6px">
        <div style="float: left; width: 100px">Дата оплаты</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDatePayment',
                    'Name' => 'WhActs[date_payment]',
                    'Width' => 160,
                    'Value' => null,
                    'Value' => DateTimeManager::YiiDateToAliton($model->date_payment),
                    'ReadOnly' => false,
                ));
            ?>
        </div> 
    </div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <div style="width: 50px">Примечание</div>
        <div style="">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'edPaymentNote',
                    'Width' => 322,
                    'Height' => 50,
                    'Name' => 'WhActs[note_payment]',
                    'Value' => $model->note_payment,
                    'ReadOnly' => false,
                ));
            ?>
        </div> 
    </div>
</div>
<div style="clear: both;"></div>

<div style="margin-top: 12px; border: 1px solid; float: left; padding: 6px">
    <div style="margin-top: 6px; float: left">
        <div style="float: left; width: 160px">Дата выполнения работ</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDate',
                    'Name' => '',
                    'Width' => 160,
                    'Value' => null,
                    'Name' => 'WhActs[date]',
                    'Value' => DateTimeManager::YiiDateToAliton($model->date),
                    'ReadOnly' => false,
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'date'); ?></div>
    </div>
    <div style="margin-top: 6px; float: left; margin-left: 6px">
        <div style="float: left; width: 100px">Тип работ</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbWorkType',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbWorkType',
                    'ModelName' => 'WorkTypes',
                    'Name' => 'WhActs[wrtp_id]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 500,
                    'KeyField' => 'wrtp_id',
                    'KeyValue' => $model->wrtp_id,
                    'FieldName' => 'name',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "wt.name like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'Name' => array(
                            'Name' => 'Тип работы',
                            'FieldName' => 'name',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div> 
    </div>
    <div style="margin-top: 6px; float: left; margin-left: 6px">
        <div style="float: left; width: 100px">Вид работ</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbJobType',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbJobType',
                    'ModelName' => 'JobTypes',
                    'Name' => 'WhActs[jbtp_id]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 500,
                    'KeyField' => 'JobType_Id',
                    'KeyValue' => $model->jbtp_id,
                    'FieldName' => 'JobType_Name',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "jt.JobType_Name like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'JobType_Name' => array(
                            'Name' => 'Вид работы',
                            'FieldName' => 'JobType_Name',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
            
        </div> 
    </div>
    <div style="clear: both;"></div>
    <div style="float: left;">
        <div style="width: 150px">Перечень работ</div>
        <div style="">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'edWorkList',
                    'Width' => 900,
                    'Height' => 100,
                    'Name' => 'WhActs[work_list]',
                    'Value' => $model->work_list,
                    'ReadOnly' => false,
                ));
            ?>
        </div> 
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; margin-top: 6px">
        <div style="width: 70px; float: left">Юр. лицо</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbJuridical',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbJuridical',
                    'ModelName' => 'Juridicals',
                    'Name' => 'WhActs[jrdc_id]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 150,
                    'PopupWidth' => 500,
                    'KeyField' => 'Jrdc_Id',
                    'KeyValue' => $model->jrdc_id,
                    'FieldName' => 'JuridicalPerson',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "jur.JuridicalPerson like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'JuridicalPerson' => array(
                            'Name' => 'Юр. лицо',
                            'FieldName' => 'JuridicalPerson',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div><?php echo $form->error($model, 'jrdc_id'); ?></div>
    </div>
    <div style="float: left; margin-top: 6px; margin-left: 6px">
        <div style="width: 318px; float: left"></div>
        <div style="float: left">
            
        </div> 
    </div>
    <div style="float: left; margin-top: 6px; margin-left: 6px">
        <div style="width: 100px; float: left">Исполнитель</div>
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbMaster',
                    'Stretch' => true,
                    'Key' => 'WhActs_Update_CmbMaster',
                    'ModelName' => 'Employees',
                    'Name' => 'WhActs[dmnd_empl_id]',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 250,
                    'PopupWidth' => 500,
                    'KeyField' => 'Employee_id',
                    'KeyValue' => $model->dmnd_empl_id,
                    'FieldName' => 'ShortName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "e.EmployeeName like '%:Value%'",
                        'Name' => 'Filter1'
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
            <div><?php echo $form->error($model, 'dmnd_empl_id'); ?></div>
        </div> 
    </div>
</div>
<div style="clear: both;"></div>
<div>
    <div style="float: left; margin-top: 6px;">
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'EditWhAct',
                    'Width' => 124,
                    'Height' => 30,
                    'Text' => 'Сохранить',
                    'FormName' => 'WhActs',
                    'Type' => 'Form',
                ));
            ?>
        </div> 
    </div>
    
</div>
<div style="clear: both;"></div>
<div style="margin-top: 12px;">
    
</div>

<?php $this->endWidget(); ?>


