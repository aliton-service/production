<script type="text/javascript">
    
    $(document).ready(function () {
        
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
        $("#ClientName").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 300 }));
        $("#OGTelephone").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 300 }));
         
        $("#SaveNewContactInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#SaveNewContactInfo").on('click', function ()
        {
            $('#ContactInfo').submit();
        });
        
        var Demand = {
            FIO: '<?php echo $model->FIO; ?>',
            Birthday: Aliton.DateConvertToJs('<?php echo $model->Birthday; ?>'),
            Main: <?php echo json_encode($model->Main); ?>,
            ForReport: <?php echo json_encode($model->ForReport); ?>,
            Telephone: '<?php echo $model->Telephone; ?>',
            CTelephone: '<?php echo $model->CTelephone; ?>',
            Cstm_id: '<?php echo $model->Cstm_id; ?>',
            Email: '<?php echo $model->Email; ?>',
            NoSend: <?php echo json_encode($model->NoSend); ?>,
            ClientName: '<?php echo $model2->ClientName; ?>',
            OGTelephone: '<?php echo $model2->Telephone; ?>',
        };

        console.log(typeof(Number(Demand.NoSend)));
        console.log(Demand.NoSend);
        console.log(Demand.Main);
        console.log(Demand.ForReport);
        console.log(Boolean(Demand.ForReport));

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
/* @var $this ContactInfoController */
/* @var $model ContactInfo */
/* @var $form CActiveForm */
?>
<?php echo 'ЛПР = ' . json_encode($model->Main) . '<br>'; ?>
<?php echo 'ForReport = ' . json_encode($model->ForReport) . '<br>'; ?>
<?php echo 'NoSend = ' . json_encode($model->NoSend) . '<br>'; ?>

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ContactInfo',
        'htmlOptions'=>array(
            'class'=>'form-inline',
            ),
     )); 
?>

<div class="row" style="padding-bottom: 10px; width: 350px; border: 1px solid #ddd;">
    <div class="row">Контактное лицо: <br><input name="ContactInfo[FIO]" type="text" id="FIO"><?php echo $form->error($model, 'FIO'); ?></div>
    <div class="row">Дата рождения: <div id='Birthday' name="ContactInfo[Birthday]" ></div></div>
    <div class="row-column"><div class="row">Лицо принимающее решение <div id='Main' name="ContactInfo[Main]" ></div></div></div>
    <div class="row">Для отчетов <div id='ForReport' name="ContactInfo[ForReport]" ></div></div>
    <div class="row">Домашний телефон: <br><input name="ContactInfo[Telephone]" type="text" id="Telephone"></div>
    <div class="row">Сотовый телефон: <br><input name="ContactInfo[CTelephone]" type="text" id="CTelephone"></div>
    <div class="row">Должность: <div id="Cstm_id" name="ContactInfo[Cstm_id]"></div></div>
    <div class="row">Электронная почта: <br><input name="ContactInfo[Email]" type="text" id="Email"></div>
    <div class="row">Эл. почту не присылать <div id='NoSend' name="ContactInfo[NoSend]" ></div></div>
    <div class="row" style="margin-top: 5px;">Контактное лицо из карточки клиента: <textarea readonly type="text" id="ClientName"></textarea></div>
    <div class="row" style="margin-top: 5px;">Телефон из карточки клиента: <textarea readonly type="text" id="OGTelephone"></textarea></div>
    <br/>
    <div class="row"><input type="button" value="Сохранить" id='SaveNewContactInfo' /></div>
</div>

<?php $this->endWidget(); ?>
