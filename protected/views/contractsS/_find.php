<script type="text/javascript">
        $(document).ready(function () {
            var ContractM = {
                csdt_id: '<?php echo $model->csdt_id; ?>',
            };
            
            var DataEquip = new $.jqx.dataAdapter(Sources.SourceListEquipsMin);
            
            $("#Equip").on('bindingComplete', function(){
                if (ContractM.Equip != '') {
                    $("#Equip").jqxComboBox('val', ContractM.Equip);
                }
            });
            
            $("#Name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 540 }));

            if (ContractM.CDNote != '') $("#CDNote").jqxTextArea('val', ContractM.CDNote);
        });
</script> 

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ContractM',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="ContractM[csdt_id]" value="<?php echo $model->csdt_id; ?>">
<input type="hidden" name="ContractM[ContrS_id]" value="<?php echo $model->ContrS_id; ?>">

<div class="row"><div class="row-column">Наименование: <input id="Name" type="text" name="ContractM[Name]"><?php echo $form->error($model, 'Name'); ?></div></div>
<div class="row"><div class="row-column">Оборудование: </div><div class="row-column"><div id='Equip' name="ContractM[Equip_id]"></div><?php echo $form->error($model, 'Equip_id'); ?></div></div>
<div class="row">
    <div class="row-column">Ед.изм.: <input id="NameUM" type="text"></div>
    <div class="row-column" style="padding-top: 3px;">Количество: </div><div class="row-column"><div id="Quant" name="ContractM[Quant]"></div><?php echo $form->error($model, 'Quant'); ?></div>
    <div class="row-column" style="padding-top: 3px;">Цена: </div><div class="row-column"><div id="price" name="ContractM[price]"></div><?php echo $form->error($model, 'price'); ?></div>
</div>
<div class="row">
    <div class="row-column">Примечание: <textarea id="CDNote" name="ContractM[Note]"></textarea></div>
</div>


<?php $this->endWidget(); ?>