<div style="float: left">
<div style="float: left; border: 1px solid; padding: 6px">
   <div>
        <div style="float: left; width: 50px">Адрес</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edAddress',
                    'Width' => 300,
                    'Type' => 'String',
                    'Value' => $model->Address,
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-top: 6px">
        <div style="float: left; width: 50px">Клиент</div>
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edClient',
                    'Width' => 300,
                    'Type' => 'String',
                    'Value' => $model->org_name,
                    'ReadOnly' => true,
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
        <div style="float: left; width: 50px">Тип</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDckn_name',
                    'Width' => 150,
                    'Type' => 'String',
                    'Value' => $model->dckn_name,
                    'ReadOnly' => true,
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
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edCstm_name',
                    'Width' => 250,
                    'Type' => 'String',
                    'Value' => $model->cstm_name,
                    'ReadOnly' => true,
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
                    'Value' => $model->note,
                    'ReadOnly' => true,
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
                    'Value' => $model->sum,
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
    </div>
    <div style="clear: both"></div>
    <div style="margin-top: 6px">
        <div style="float: left; width: 100px">Форма оплаты</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edPaymentType',
                    'Width' => 150,
                    'Type' => 'String',
                    'Value' => $model->pmtp_name,
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
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
                    'Value' => $model->bill,
                    'ReadOnly' => true,
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
                    'Name' => '',
                    'Width' => 160,
                    'Value' => null,
                    'Value' => DateTimeManager::YiiDateToAliton($model->date_payment),
                    'ReadOnly' => true,
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
                    'Value' => $model->note_payment,
                    'ReadOnly' => true,
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
                    'Value' => DateTimeManager::YiiDateToAliton($model->date),
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
    </div>
    <div style="margin-top: 6px; float: left; margin-left: 6px">
        <div style="float: left; width: 100px">Тип работ</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edWrtpName',
                    'Width' => 150,
                    'Type' => 'String',
                    'Value' => $model->wrtp_name,
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
    </div>
    <div style="margin-top: 6px; float: left; margin-left: 6px">
        <div style="float: left; width: 100px">Вид работ</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edJbtpName',
                    'Width' => 150,
                    'Type' => 'String',
                    'Value' => $model->jbtp_name,
                    'ReadOnly' => true,
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
                    'Value' => $model->work_list,
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
    </div>
    <div style="clear: both;"></div>
    <div style="float: left; margin-top: 6px">
        <div style="width: 70px; float: left">Юр. лицо</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edJuridicalPerson',
                    'Width' => 150,
                    'Type' => 'String',
                    'Value' => $model->JuridicalPerson,
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-top: 6px; margin-left: 6px">
        <div style="width: 50px; float: left">Создал</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edUserCreate',
                    'Width' => 150,
                    'Type' => 'String',
                    'Value' => $model->UserCreate,
                    'ReadOnly' => true,
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-top: 6px; margin-left: 6px">
        <div style="width: 100px; float: left">Исполнитель</div>
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edMaster',
                    'Width' => 250,
                    'Type' => 'String',
                    'Value' => $model->master,
                    'ReadOnly' => true,
                ));
            ?>
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
                    'Text' => 'Изменить',
                    'Href' => Yii::app()->createUrl('WhActs/Update', array('docm_id' => $model->docm_id)),
                    
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-top: 6px; margin-left: 6px">
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'Action',
                    'Width' => 124,
                    'Height' => 30,
                    'Text' => 'Подтвердить',
                    'Href' => Yii::app()->createUrl('WhActs/Confirm', array('docm_id' => $model->docm_id)),
                ));
            ?>
        </div> 
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 6px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'FindTreb',
                'Width' => 144,
                'Height' => 30,
                'Text' => 'Найти требование',
                'Href' => Yii::app()->createUrl('WHDocumentsFindTreb/index', array(
                    'objc_id' => $model->objc_id,
                    'docm_id' => $model->docm_id,
                    )),
            ));
        ?>
    </div>
</div>
<div style="clear: both;"></div>
<div style="margin-top: 12px;">
<div>
<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'ActEquipsGrid',
        'Stretch' => true,
        'Key' => 'WhActs_Index_ActEquipsGrid',
        'ModelName' => 'ActEquips_v',
        'ShowFilters' => true,
        'Height' => 230,
        'Width' => 500,
        'OnDblClick' => '$("#EditWhActEquips").albutton("BtnClick");',
        'Filters' => array(
            array(
                'Type' => 'Internal',
                'Control' => 'Form',
                'Condition' => 'd.docm_id = ' . $model->docm_id,
                'Value' => '',
                'Name' => 'Form1',
            ),
        ),
        'Columns' => array(
            'EquipName' => array(
                'Name' => 'Оборудование',
                'FieldName' => 'EquipName',
                'Width' => 100,
            ),
            'NameUnitMeasurement' => array(
                'Name' => 'Ед. изм.',
                'FieldName' => 'NameUnitMeasurement',
                'Width' => 50,
            ),
            'NameUnitMeasurement' => array(
                'Name' => 'Ед. изм.',
                'FieldName' => 'NameUnitMeasurement',
                'Width' => 50,
            ),
            'fact_quant' => array(
                'Name' => 'Кол-во',
                'FieldName' => 'fact_quant',
                'Width' => 50,
            ),
            'used' => array(
                'Name' => 'Б\У',
                'FieldName' => 'used',
                'Width' => 25,
            ),
            'SN' => array(
                'Name' => 'Серийные номера',
                'FieldName' => 'SN',
                'Width' => 100,
            ),
            'number' => array(
                'Name' => 'Номер требования',
                'FieldName' => 'number',
                'Width' => 90,
            ),
            'date' => array(
                'Name' => 'Дата требования',
                'FieldName' => 'date',
                'Width' => 120,
                'Format' => 'd.m.Y',
            ),
        ),
    ));
?>
</div>
<div style="margin-top: 12px">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AddWhActEquips',
                'Width' => 134,
                'Height' => 30,
                'Text' => 'Добавить',
                'Href' => Yii::app()->createUrl('ActEquips/insert', array('docm_id' => $model->docm_id)),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditWhActEquips',
                'Width' => 134,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('ActEquips/update', array('docm_id' => $model->docm_id)),
                'Params' => array(
                    array(
                        'ParamName' => 'dadt_id',
                        'NameControl' => 'ActEquipsGrid',
                        'TypeControl' => 'Grid',
                        'FieldControl' => 'dadt_id',
                    ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DeleteWhActEquips',
                'Width' => 134,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('ActEquips/delete', array('docm_id' => $model->docm_id)),
                'Params' => array(
                    array(
                        'ParamName' => 'dadt_id',
                        'NameControl' => 'ActEquipsGrid',
                        'TypeControl' => 'Grid',
                        'FieldControl' => 'dadt_id',
                    ),
                ),
            ));
        ?>
    </div>
    
</div>


    
</div>