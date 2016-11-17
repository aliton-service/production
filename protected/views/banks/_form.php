<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Banks = {
            Bank_id: <?php echo json_encode($model->Bank_id); ?>,
            bank_name: <?php echo json_encode($model->bank_name); ?>,
            cor_account: <?php echo json_encode($model->cor_account); ?>,
            bik: <?php echo json_encode($model->bik); ?>,
            City: <?php echo json_encode($model->City); ?>,
            Department: <?php echo json_encode($model->Department); ?>,
            Status: Boolean(Number(<?php echo json_encode($model->Status); ?>)),
        };
        
        $('#Banks').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edBanksNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "Наименование", width: 400} ));
        $("#edCorAccountEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 400} ));
        $("#edBIKEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 400} ));
        $("#edCityEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 400} ));
        $("#edDepartmentEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 400} ));
        $("#chbStatusEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 150, checked: Banks.Status}));
        
        $('#btnSaveBanks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelBanks').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelBanks').on('click', function(){
            $('#BanksDialog').jqxWindow('close');
        });
        
        $('#btnSaveBanks').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Banks/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Banks/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Banks').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        CurrentRowBankData.Bank_id = Res.id;
                        Aliton.SelectRowById('Bank_id', Res.id, '#BanksGrid', true);
                        $('#BanksDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyBanksDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Banks.bank_name != '') $("#edBanksNameEdit").jqxInput('val', Banks.bank_name);
        if (Banks.cor_account != '') $("#edCorAccountEdit").jqxInput('val', Banks.cor_account);
        if (Banks.bik != '') $("#edBIKEdit").jqxInput('val', Banks.bik);
        if (Banks.City != '') $("#edCityEdit").jqxInput('val', Banks.City);
        if (Banks.Department != '') $("#edDepartmentEdit").jqxInput('val', Banks.Department);
        
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Banks',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Banks[Bank_id]" value="<?php echo $model->Bank_id; ?>"/>

<div class="row">
    <div class="row-column" style="width: 150px">Наименование:</div>
    <div class="row-column"><input type="text" name="Banks[bank_name]" autocomplete="off" id="edBanksNameEdit"/><?php echo $form->error($model, 'bank_name'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Корсчет:</div>
    <div class="row-column"><input type="text" name="Banks[cor_account]" autocomplete="off" id="edCorAccountEdit"/><?php echo $form->error($model, 'cor_account'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">БИК:</div>
    <div class="row-column"><input type="text" name="Banks[bik]" autocomplete="off" id="edBIKEdit"/><?php echo $form->error($model, 'bik'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Город:</div>
    <div class="row-column"><input type="text" name="Banks[City]" autocomplete="off" id="edCityEdit"/><?php echo $form->error($model, 'City'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column" style="width: 150px">Отдел:</div>
    <div class="row-column"><input type="text" name="Banks[Department]" autocomplete="off" id="edDepartmentEdit"/><?php echo $form->error($model, 'Department'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div id="chbStatusEdit" name="Suppliers[Status]">Не действует</div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveBanks'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelBanks'/></div>
</div>
<?php $this->endWidget(); ?>





