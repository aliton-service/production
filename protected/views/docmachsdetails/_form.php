<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var DocmAchsDetail = {
            dadt_id: <?php echo json_encode($model->dadt_id); ?>,
            eqip_id: <?php echo json_encode($model->eqip_id); ?>,
            docm_quant: <?php echo json_encode($model->docm_quant); ?>,
            fact_quant: <?php echo json_encode($model->fact_quant); ?>,
            price: <?php echo json_encode($model->price); ?>,
            used: <?php echo json_encode($model->used); ?>,
            ToProduction: <?php echo json_encode($model->ToProduction); ?>,
            no_price_list: <?php echo json_encode($model->no_price_list); ?>,
            sum: <?php echo json_encode($model->sum); ?>
        };
        
        $('#DocmAchsDetails').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
        $("#edEquip").on('select', function(event) {
            var args = event.args;
            if (args) {
                var Item = args.item;
                var Value = Item.value;
                var Row = Aliton.FindArray(DataEquips.records, 'Equip_id', Value);
                if (Row != null)
                    $("#edUmName").val(Row.NameUM);
                    
            }
        });
        
        $("#edEquip").on('bindingComplete', function(event){
            if (DocmAchsDetail.eqip_id != '') $("#edEquip").jqxComboBox('val', DocmAchsDetail.eqip_id);
            $("#btnSaveDocmAchsDetail").jqxButton({disabled: false});
            
        
        });
        $("#edEquip").jqxComboBox($.extend(true, {}, { source: DataEquips, width: '300', height: '25px', displayMember: "EquipName", valueMember: "Equip_id"}));
        $("#edUmName").jqxInput($.extend(true, {}, InputDefaultSettings, {width: '50px'}));
        $("#edQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edPriceEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '130px'}));
        $("#edFactQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '130px'}));
        $("#edSumEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '130px', disabled: true}));
        $("#edUsedEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '50px'}));
        $("#edToProductionEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '130px'}));
        $("#edNoPriceListEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '150px'}));
        $('#btnSaveDocmAchsDetail').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#btnCancelDocmAchsDetail').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        
        $('#btnCancelDocmAchsDetail').on('click', function(){
            $('#WHDocumentsDialog').jqxWindow('close');
        });
        
        $('#btnSaveDocmAchsDetail').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('DocmAchsDetails/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#DocmAchsDetails').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('dadt_id', Res.id, '#DetailsGrid', true);
                        $('#WHDocumentsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyWHDocumentsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        var CalcSum = function() {
            var Quant = $("#edQuantEdit").jqxNumberInput('val');
            var Price = $("#edPriceEdit").jqxNumberInput('val');
            $("#edSumEdit").jqxNumberInput('val', Quant*Price);
        };
        
        if (DocmAchsDetail.docm_quant != '') $("#edQuantEdit").jqxNumberInput('val', DocmAchsDetail.docm_quant);
        if (DocmAchsDetail.price != '') $("#edPriceEdit").jqxNumberInput('val', DocmAchsDetail.price);
        if (DocmAchsDetail.used != '') $("#edUsedEdit").jqxCheckBox('val', Boolean(Number(DocmAchsDetail.used)));
        if (DocmAchsDetail.ToProduction != '') $("#edToProductionEdit").jqxCheckBox('val', Boolean(Number(DocmAchsDetail.ToProduction)));
        if (DocmAchsDetail.no_price_list != '') $("#edNoPriceListEdit").jqxCheckBox('val', Boolean(Number(DocmAchsDetail.no_price_list)));
        if (DocmAchsDetail.fact_quant != '') $("#edFactQuantEdit").jqxNumberInput('val', DocmAchsDetail.fact_quant);
        if (DocmAchsDetail.sum != '') $("#edSumEdit").jqxNumberInput('val', DocmAchsDetail.sum);
        
        $('#edQuantEdit').on('valueChanged', function (event) {
            CalcSum();
        }); 
        $('#edPriceEdit').on('valueChanged', function (event) {
            CalcSum();
        });
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'DocmAchsDetails',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="DocmAchsDetails[dadt_id]" value="<?php echo $model->dadt_id; ?>"/>
<input type="hidden" name="DocmAchsDetails[docm_id]" value="<?php echo $model->docm_id; ?>"/>

<div class="row">
    <div class="row-column">
        <div><div class="row-column">Оборудование</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div name="DocmAchsDetails[eqip_id]" id="edEquip"></div><?php echo $form->error($model, 'eqip_id'); ?></div></div>
    </div>
    <div class="row-column">
        <div><div class="row-column">Ед. изм.</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><input type="text" id="edUmName" /></div></div>
    </div>
    <div class="row-column">
        <div><div class="row-column">Количество</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div type="text" id="edQuantEdit" name="DocmAchsDetails[quant]"></div><?php echo $form->error($model, 'quant'); ?></div></div>
    </div>
    <div class="row-column" style="float: right">
        <div><div class="row-column">Цена</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div type="text" id="edPriceEdit" name="DocmAchsDetails[price]"></div><?php echo $form->error($model, 'price'); ?></div></div>
    </div>
</div>
<div class="row">
    <div class="row-column"><div id="edUsedEdit" name="DocmAchsDetails[used]">Б\У</div><?php echo $form->error($model, 'price'); ?></div>
    <div class="row-column"><div id="edToProductionEdit" name="DocmAchsDetails[ToProduction]">В производство</div><?php echo $form->error($model, 'ToProduction'); ?></div>
    <div class="row-column"><div id="edNoPriceListEdit" name="DocmAchsDetails[no_price_lits]">Не учитывать цену</div><?php echo $form->error($model, 'no_price_lits'); ?></div>
    <div style="float: right">
        <div class="row-column">Факт. кол-во:</div>
        <div class="row-column"><div type="text" id="edFactQuantEdit" name="DocmAchsDetails[fact_quant]"></div><?php echo $form->error($model, 'price'); ?></div>
    </div>
</div>
<div class="row">
    <div style="float: right">
        <div class="row-column">Сумма:</div>
        <div class="row-column"><div type="text" id="edSumEdit" name="DocmAchsDetails[sum]"></div><?php echo $form->error($model, 'sum'); ?></div>
    </div>
</div>    
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveDocmAchsDetail'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelDocmAchsDetail'/></div>
</div>
<?php $this->endWidget(); ?>



