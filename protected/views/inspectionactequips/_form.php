<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var InspectionActEquips = {
            ActEquip_id: <?php echo json_encode($model->ActEquip_id); ?>,
            Inspection_id: <?php echo json_encode($model->Inspection_id); ?>,
            Equip_id: <?php echo json_encode($model->Equip_id); ?>,
            Quant: <?php echo json_encode($model->Quant); ?>,
            OtherEquip: <?php echo json_encode($model->OtherEquip); ?>,
            Object_id: <?php echo json_encode($model->Object_id); ?>
        };

        var ObjectList = <?php echo json_encode($Objects); ?>
        
        $('#InspectionActEquips').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        //var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}));
//        $("#edEquipEdit").on('select', function(event) {
//            var args = event.args;
//            if (args) {
//                var Item = args.item;
//                var Value = Item.value;
//                var Row = Aliton.FindArray(DataEquips.records, 'Equip_id', Value);
//                if (Row != null)
//                    $("#edUmNameEdit").val(Row.NameUM);
//                    
//            }
//        });
//        
        $("#edEquipEdit").on('bindingComplete', function(event){
            if (InspectionActEquips.Equip_id != '') $("#edEquipEdit").jqxComboBox('val', InspectionActEquips.Equip_id);
            $("#btnSaveInspectionActEquips").jqxButton({disabled: false});
        });
        
        $("#dropDownButton").jqxDropDownButton({ width: 150, height: 25});
        var DataEquipGroups = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipGroups));
        DataEquipGroups.dataBind();
        var Records = DataEquipGroups.records;
        var DataTreeEquipGroups = DataEquipGroups.getRecordsHierarchy('group_id', 'parent_group_id', 'items', [{name: 'group_id', map: 'value'}, { name: 'group_name', map: 'label'}]);
        $('#Tree').jqxTree($.extend({}, TreeDefaultSettings, { source: DataTreeEquipGroups, height: 200, width: 200}));
        
        
        $('#Tree').on('select', function (event) {
            var args = event.args;
            var item = $('#Tree').jqxTree('getItem', args.element);
            var dropDownContent = '<div style="position: relative; margin-left: 3px; margin-top: 5px;">' + item.label + '</div>';
            $("#dropDownButton").jqxDropDownButton('setContent', dropDownContent);
            
            var Code = '';
            for (var i=0; i <= Records.length; i++)
                if (Records[i].group_id == item.value) {
                    Code = Records[i].code;
                    break;
                }
            
            var DataEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEquipsMin, {async: true}), {
                formatData: function (data) {
                            $.extend(data, {
                                Filters: ["eg.code like '" + Code + "%'"],
                            });
                            return data;
                        },});
            
            $("#edEquipEdit").jqxComboBox({source: DataEquips});
            
            $("#dropDownButton").jqxDropDownButton('close');
        });
        var items = $('#Tree').jqxTree('getItems');
        $("#Tree").jqxTree('expandItem', items[0]);
        $('#Tree').jqxTree('selectItem', items[0]);
        
        
            
        $("#edEquipEdit").jqxComboBox($.extend(true, {}, { /* source: DataEquips,*/ width: '300', height: '25px', displayMember: "EquipName", valueMember: "Equip_id" /*, renderer: EquipRenderer */}));
        $("#edObjectEdit").jqxComboBox($.extend(true, {}, { source: ObjectList, width: '300', height: '25px', displayMember: "Doorway", valueMember: "Object_id" /*, renderer: EquipRenderer */}));
        $("#edObjectEdit").val(InspectionActEquips.Object_id);
        $("#edUmNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: '50px'}));
        $("#edOtherEquipEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: '320px'}));
        
        $("#edQuantEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', decimalDigits: 0}));
        $('#btnSaveInspectionActEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#btnCancelInspectionActEquips').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelInspectionActEquips').on('click', function(){
            if ($('#InspectionActDialog').length>0)
                $('#InspectionActDialog').jqxWindow('close');
        });
        
        $('#btnSaveInspectionActEquips').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('InspectionActEquips/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('InspectionActEquips/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#InspectionActEquips').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        InspAct.ActEquip_id = Res.id;
                        if ($('#InspectionActDialog').length>0) {
                            $('#btnRefreshEquips').click();
                            $('#InspectionActDialog').jqxWindow('close');
                            
                        }
                    }
                    else {
                        if ($('#InspectionActDialog').length>0)
                            $('#BodyInspectionActDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        
        
        if (InspectionActEquips.Quant != null) $("#edQuantEdit").jqxNumberInput('val', InspectionActEquips.Quant);
        if (InspectionActEquips.OtherEquip != null) $("#edOtherEquipEdit").jqxInput('val', InspectionActEquips.OtherEquip);
    });
</script>        

<?php
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'InspectionActEquips',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="InspectionActEquips[ActEquip_id]" value="<?php echo $model->ActEquip_id; ?>"/>
<input type="hidden" name="InspectionActEquips[Inspection_id]" value="<?php echo $model->Inspection_id; ?>"/>

<div class="row">
    <div class="row-column">
        <div><div class="row-column">Выбирите подъезд</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div name="InspectionActEquips[Object_id]" id="edObjectEdit"></div><?php echo $form->error($model, 'Object_id'); ?></div></div>
    </div>
</div>

<div class="row">
    <div class="row-column">
        <div><div class="row-column">Ветвь оборудования</div></div>
        <div style="clear: both"></div>
        <div>
            <div class="row-column">
                <div id="dropDownButton">
                    <div id="Tree"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-column">Доп. наименование:</div>
    <div class="row-column"><input type="text" id="edOtherEquipEdit" name="InspectionActEquips[OtherEquip]" /></div>
</div>
<div class="row">
    
    <div class="row-column">
        <div><div class="row-column">Оборудование</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div name="InspectionActEquips[Equip_id]" id="edEquipEdit"></div><?php echo $form->error($model, 'Equip_id'); ?></div></div>
    </div>
    <div class="row-column">
        <div><div class="row-column">Ед. изм.</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><input type="text" id="edUmNameEdit" /></div></div>
    </div>
    <div class="row-column">
        <div><div class="row-column">Количество</div></div>
        <div style="clear: both"></div>
        <div><div class="row-column"><div type="text" id="edQuantEdit" name="InspectionActEquips[Quant]"></div><?php echo $form->error($model, 'Quant'); ?></div></div>
    </div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInspectionActEquips'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInspectionActEquips'/></div>
</div>
<?php $this->endWidget(); ?>



