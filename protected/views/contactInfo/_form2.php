<script type="text/javascript">
    
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        var DataCustomers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCustomers, {}));
        
        $("#FIO").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "ФИО", width: 300}));
        $("#Birthday").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd-MM-yyyy', value: null }));
        $("#Main").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#ForReport").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#Telephone").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 300}));
        $("#CTelephone").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 300}));
        $("#Cstm_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataCustomers, width: 307, displayMember: "CustomerName", valueMember: "Customer_Id" }));
        $("#Email").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 300}));
        $("#NoSend").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#ClientName").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: '25px' }));
        $("#OGTelephone").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: '25px' }));
         
        $("#SaveNewContactInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#CancelContactInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#CancelContactInfo").on('click', function (){
            $('#ObjectsGroupDialog').jqxWindow('close');
        });
        $("#SaveNewContactInfo").on('click', function () {
            var Url = <?php echo json_encode(Yii::app()->createUrl('ContactInfo/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('ContactInfo/Insert')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#ContactInfo').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Info_id', Res.id, '#ContactInfoGrid', true);
                        $('#ObjectsGroupDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyObjectsGroupDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        var Demand = {
            FIO: <?php echo json_encode($model->FIO); ?>,
            Birthday: Aliton.DateConvertToJs('<?php echo $model->Birthday; ?>'),
            Main: <?php echo json_encode($model->Main); ?>,
            ForReport: <?php echo json_encode($model->ForReport); ?>,
            Telephone: <?php echo json_encode($model->Telephone); ?>,
            CTelephone: <?php echo json_encode($model->CTelephone); ?>,
            Cstm_id: <?php echo json_encode($model->Cstm_id); ?>,
            Email: <?php echo json_encode($model->Email); ?>,
            NoSend: <?php echo json_encode($model->NoSend); ?>,
            ClientName: <?php echo json_encode($ClientName); ?>,
            OGTelephone: <?php echo json_encode($Telephone); ?>,
        };

        if (Demand.FIO != '') $("#FIO").jqxInput('val', Demand.FIO);
        if (Demand.Birthday != '') $("#Birthday").jqxDateTimeInput('val', Demand.Birthday);
        if (Demand.Main != '') $("#Main").jqxCheckBox({checked: Boolean(Number(Demand.Main))});
        if (Demand.ForReport != '') $("#ForReport").jqxCheckBox({checked: Boolean(Number(Demand.ForReport))});
        if (Demand.Telephone != '') $("#Telephone").jqxInput('val', Demand.Telephone);
        if (Demand.CTelephone != '') $("#CTelephone").jqxInput('val', Demand.CTelephone);
        if (Demand.Cstm_id != '') $("#Cstm_id").jqxComboBox('val', Demand.Cstm_id);
        if (Demand.Email != '') $("#Email").jqxInput('val', Demand.Email);
        if (Demand.NoSend != '') $("#NoSend").jqxCheckBox({checked: Boolean(Number(Demand.NoSend))});
        if (Demand.ClientName != '') $("#ClientName").jqxTextArea('val', Demand.ClientName);
        if (Demand.OGTelephone != '') $("#OGTelephone").jqxTextArea('val', Demand.OGTelephone);
    });   
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ContactInfo',
        'htmlOptions'=>array(
            'class'=>'form-inline',
            ),
     )); 
?>

<input type="hidden" name="ContactInfo[Info_id]" value="<?php echo $model->Info_id; ?>"/>
<input type="hidden" name="ContactInfo[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>"/>

<div class="al-data">
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Контактное лицо:</div>
        <div class="al-row-column"><input name="ContactInfo[FIO]" type="text" id="FIO"><?php echo $form->error($model, 'FIO'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Дата рождения:</div>
        <div class="al-row-column"><div id='Birthday' name="ContactInfo[Birthday]" ></div><?php echo $form->error($model, 'Birthday'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 200px;">Лицо принимающее решение</div>
        <div class="al-row-column"><div id='Main' name="ContactInfo[Main]" ></div><?php echo $form->error($model, 'Main'); ?></div>
        <div class="al-row-column" >Для отчетов</div>
        <div class="al-row-column"><div id='ForReport' name="ContactInfo[ForReport]" ></div><?php echo $form->error($model, 'ForReport'); ?></div>
        <div class="al-row-column" style="">Эл. почту не присылать:</div>
        <div class="al-row-column"><div id='NoSend' name="ContactInfo[NoSend]" ></div><?php echo $form->error($model, 'NoSend'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Домашний телефон:</div>
        <div class="al-row-column"><input name="ContactInfo[Telephone]" type="text" id="Telephone"><?php echo $form->error($model, 'Telephone'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Сотовый телефон:</div>
        <div class="al-row-column"><input name="ContactInfo[CTelephone]" type="text" id="CTelephone"><?php echo $form->error($model, 'CTelephone'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Должность:</div>
        <div class="al-row-column"><div id="Cstm_id" name="ContactInfo[Cstm_id]"></div><?php echo $form->error($model, 'Cstm_id'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 150px;">Электронная почта:</div>
        <div class="al-row-column"><input name="ContactInfo[Email]" type="text" id="Email"><?php echo $form->error($model, 'Email'); ?></div>
        <div style="clear: both"></div>
    </div>

    <div class="al-row">
        <div class="al-row" style="padding: 0px;">Контактное лицо из карточки клиента:</div>
        <div class="al-row"><textarea readonly type="text" id="ClientName"></textarea><?php echo $form->error($model, 'ClientName'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row" style="padding: 0px;">Телефон из карточки клиента:</div>
        <div class="al-row"><textarea readonly type="text" id="OGTelephone"></textarea><?php echo $form->error($model, 'OGTelephone'); ?></div>
        <div style="clear: both"></div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='SaveNewContactInfo' /></div>
    <div class="al-row-column" style="float: right;"><input type="button" value="Закрыть" id='CancelContactInfo' /></div>
    <div style="clear: both"></div>
</div>

<?php $this->endWidget(); ?>
