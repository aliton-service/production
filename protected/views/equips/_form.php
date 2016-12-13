<script type="text/javascript">
    $(document).ready(function () {
        var Equips = {
            Equip_id: <?php echo json_encode($model->Equip_id); ?>,
            Group_id: <?php echo json_encode($model->group_id); ?>,
            EquipName: <?php echo json_encode($model->EquipName); ?>,
            UnitMeasurement_id: <?php echo json_encode($model->UnitMeasurement_id); ?>,
            Actp_id: <?php echo json_encode($model->actp_id); ?>,
            ServicingTime: <?php echo json_encode($model->ServicingTime); ?>,
            grp_id: <?php echo json_encode($model->grp_id); ?>,
            sgrp_id: <?php echo json_encode($model->sgrp_id); ?>,
            ctgr_id: <?php echo json_encode($model->ctgr_id); ?>,
            discontinued: Aliton.DateConvertToJs('<?php echo $model->discontinued; ?>'),
            SystemType_id: <?php echo json_encode($model->SystemType_id); ?>,
            Description: <?php echo json_encode($model->Description); ?>,
            must_instruction: Boolean(Number(<?php echo json_encode($model->must_instruction); ?>)),
            there_instruction: Boolean(Number(<?php echo json_encode($model->there_instruction); ?>)),
            must_photo: Boolean(Number(<?php echo json_encode($model->must_photo); ?>)),
            there_photo: Boolean(Number(<?php echo json_encode($model->there_photo); ?>)),
            must_analog: Boolean(Number(<?php echo json_encode($model->must_analog); ?>)),
            there_analog: Boolean(Number(<?php echo json_encode($model->there_analog); ?>)),
            must_producer: Boolean(Number(<?php echo json_encode($model->must_producer); ?>)),
            there_producer: Boolean(Number(<?php echo json_encode($model->there_producer); ?>)),
            must_supplier: Boolean(Number(<?php echo json_encode($model->must_supplier); ?>)),
            there_supplier: Boolean(Number(<?php echo json_encode($model->there_supplier); ?>)),
            Supplier_id: <?php echo json_encode($model->Supplier_id); ?>,
            note: <?php echo json_encode($model->note); ?>,
    
        };
        
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        $("#cmbGroup").jqxDropDownButton({ width: 'calc(100% - 2px)', height: 25});
        var DataEquipGroups = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipGroups));
        DataEquipGroups.dataBind();
        var Records = DataEquipGroups.records;
        
        var DataTreeEquipGroups = DataEquipGroups.getRecordsHierarchy('group_id', 'parent_group_id', 'items', [{name: 'group_id', map: 'value'}, { name: 'group_name', map: 'label'}]);
        $('#EquipGroupsGridEdit').jqxTree($.extend({}, TreeDefaultSettings, { source: DataTreeEquipGroups, height: '150px', width: '100%'}));
        
        
        $('#EquipGroupsGridEdit').on('select',function (event) {
            var args = event.args;
            var item = $('#EquipGroupsGridEdit').jqxTree('getItem', args.element);
            $('#edEquipGroupEdit').val(item.value);
            var dropDownContent = '<div style="position: relative; margin-left: 3px; margin-top: 5px;">' + item.label + '</div>';
            $("#cmbGroup").jqxDropDownButton('setContent', dropDownContent);
            $("#cmbGroup").jqxDropDownButton("close"); 
        });
        
        var items = $('#EquipGroupsGridEdit').jqxTree('getItems');
        $("#EquipGroupsGridEdit").jqxTree('expandItem', items[0]);
        
        
        
        
        $("#edEquipNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)'}));
        var DataUmNames = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceUnitMeasurement));        
        $("#edUmNameEdit").jqxComboBox($.extend(true, {}, InputDefaultSettings, {source: DataUmNames, width: '100', height: '25px', displayMember: "NameUnitMeasurement", valueMember: "UnitMeasurement_Id"}));
        $("#edServiceTimeEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '150px'}));
        var DataSuppliers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSuppliers, {async: false, id: 'Supplier_id'}));        
        $("#edSupplierEdit").jqxComboBox($.extend(true, {}, InputDefaultSettings, {source: DataSuppliers, width: 'calc(100% - 2px)', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"}));
        var DataAccountingTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAccountingTypes));        
        $("#edAccountingTypeEdit").jqxComboBox($.extend(true, {}, InputDefaultSettings, {source: DataAccountingTypes, width: 'calc(100% - 2px)', height: '25px', displayMember: "name", valueMember: "actp_id"}));
        var DataCategories = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCategories));        
        $("#edCategoryEdit").jqxComboBox($.extend(true, {}, InputDefaultSettings, {source: DataCategories, width: 'calc(100% - 2px)', height: '25px', displayMember: "name", valueMember: "ctgr_id"}));
        var DataGroups = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipGroupsListMin));        
        $("#edGroupEdit").jqxComboBox($.extend(true, {}, InputDefaultSettings, {source: DataGroups, width: 'calc(100% - 2px)', height: '25px', displayMember: "name", valueMember: "grp_id"}));
        var DataEquipSubgroups = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipSubgroups));
        DataEquipSubgroups.dataBind();
        $("#edDiscontinuedEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Equips.discontinued, formatString: 'dd.MM.yyyy'}));
        var DataSystemTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSystemTypeList));        
        $("#edSystemTypeEdit").jqxComboBox($.extend(true, {}, InputDefaultSettings, {source: DataSystemTypes, width: 'calc(100% - 2px)', height: '25px', displayMember: "SystemTypeName", valueMember: "SystemType_Id"}));
        $("#edDescriptionEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)'}));
        $("#edNoteEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)'}));
        $("#edMustInstructing").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 70, height: 25 }));
        $("#edThereInstructing").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 60, height: 25 }));
        $("#edMustAnalog").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 70, height: 25 }));
        $("#edThereAnalog").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 60, height: 25 }));
        $("#edMustSupplier").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 70, height: 25 }));
        $("#edThereSupplier").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 60, height: 25 }));
        $("#edMustPhoto").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 70, height: 25 }));
        $("#edTherePhoto").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 60, height: 25 }));
        $("#edMustProducer").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 70, height: 25 }));
        $("#edThereProducer").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 60, height: 25 }));
        
        
        $("#edGroupEdit").on('select', function(event) {
            if (event.args) {
                if (event.args.item !== null) {
                    var value = event.args.item.value;
                    var ds = new Array();
                    for (var i = 0; i < DataEquipSubgroups.records.length; i++)
                        if (DataEquipSubgroups.records[i].grp_id == value)
                            ds.push(DataEquipSubgroups.records[i]);
                    
                    $("#edSubGroupEdit").jqxComboBox({source: ds});
                    $("#edSubGroupEdit").jqxComboBox('selectIndex', 0);
                };
            };
        });
        
        $("#edSubGroupEdit").jqxComboBox($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)', height: '25px', displayMember: "name", valueMember: "sgrp_id"}));
        
        if (Equips.Group_id != '' && Equips.Group_id != null) {
            for (var i=0; i < items.length; i++)
                if (items[i].value == Equips.Group_id) {
                    $("#EquipGroupsGridEdit").jqxTree('expandItem', items[i]);
                    $('#EquipGroupsGridEdit').jqxTree('selectItem', items[i]);
                    break;
                }
        }
        else 
            $('#EquipGroupsGridEdit').jqxTree('selectItem', items[0]);
        
        $("#edEquipNameEdit").val(Equips.EquipName);
        $("#edUmNameEdit").val(Equips.UnitMeasurement_id);
        $("#edServiceTimeEdit").val(Equips.ServicingTime);
        $("#edGroupEdit").val(Equips.grp_id);
        $("#edSubGroupEdit").val(Equips.sgrp_id);
        $("#edSupplierEdit").val(Equips.Supplier_id);
        $("#edAccountingTypeEdit").val(Equips.Actp_id);
        $("#edCategoryEdit").val(Equips.ctgr_id);
        $("#edSystemTypeEdit").val(Equips.SystemType_id);
        $("#edDescriptionEdit").val(Equips.Description);
        
        $("#edMustInstructing").val(Equips.must_instruction);
        $("#edThereInstructing").val(Equips.there_instruction);
        $("#edMustAnalog").val(Equips.must_analog);
        $("#edThereAnalog").val(Equips.there_analog);
        $("#edMustSupplier").val(Equips.must_supplier);
        $("#edThereSupplier").val(Equips.there_supplier);
        $("#edMustPhoto").val(Equips.must_photo);
        $("#edTherePhoto").val(Equips.there_photo);
        $("#edMustProducer").val(Equips.must_producer);
        $("#edThereProducer").val(Equips.there_producer);
        
        
        $('#EquipsDialog').on('close', function() {
            if ($("#cmbGroup").jqxDropDownButton('isOpened'))
                $("#cmbGroup").jqxDropDownButton('close');
        });
        
        $('#btnSaveEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelEquip').on('click', function(){
            $('#EquipsDialog').jqxWindow('close');
        });
        
        $('#btnSaveEquip').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Equips/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Equips/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Equips').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        Aliton.SelectRowById('Equip_id', Res.id, '#EquipsGrid', true);
                        $('#EquipsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyEquipsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
    });
</script>    

<?php
    $Form = $this->beginWidget('CActiveForm', array(
	'id'=>'Equips',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="Equips[Equip_id]" value="<?php echo $model->Equip_id; ?>"/>

<div class="al-row">
    <div class="al-row-column" style="width: 150px">Ветка:</div>
    <div class="al-row-column" style="width: calc(100% - 160px)">
        <input type="hidden" name="Equips[group_id]" id="edEquipGroupEdit"/>
        <div id="cmbGroup">
            <div id="EquipGroupsGridEdit"></div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Наименование:</div>
    <div class="al-row-column" style="width: calc(100% - 160px);">
        <input type="text" name="Equips[EquipName]" id="edEquipNameEdit"/>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Ед. изм.</div>
    <div class="al-row-column"><div name="Equips[UnitMeasurement_id]" id="edUmNameEdit"></div></div>
    <div class="al-row-column">Время ТО</div>
    <div class="al-row-column"><div name="Equips[ServiceTime]" id="edServiceTimeEdit"></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Производитель:</div>
    <div class="al-row-column" style="width: calc(100% - 160px);">
        <div name="Equips[Supplier_id]" id="edSupplierEdit"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Тип учета:</div>
    <div class="al-row-column" style="width: calc(100% - 360px);">
        <div name="Equips[actp_id]" id="edAccountingTypeEdit"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Категория:</div>
    <div class="al-row-column" style="width: calc(100% - 360px);">
        <div name="Equips[ctgr_id]" id="edCategoryEdit"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Группа:</div>
    <div class="al-row-column" style="width: calc(100% - 360px);">
        <div name="Equips[grp_id]" id="edGroupEdit"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Подгруппа:</div>
    <div class="al-row-column" style="width: calc(100% - 360px);">
        <div name="Equips[sgrp_id]" id="edSubGroupEdit"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Снят с производства:</div>
    <div class="al-row-column" style="width: calc(100% - 360px);">
        <div name="Equips[discontinued]" id="edDiscontinuedEdit"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Тип системы:</div>
    <div class="al-row-column" style="width: calc(100% - 360px);">
        <div name="Equips[SystemType_id]" id="edSystemTypeEdit"></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Описание:</div>
    <div class="al-row-column" style="width: calc(100% - 160px);">
        <input name="Equips[Description]" id="edDescriptionEdit" />
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Краткие тех. х-ки:</div>
    <div class="al-row-column" style="width: calc(100% - 160px);">
        <input name="Equips[note]" id="edNoteEdit" />
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="border: 1px solid #e0e0e0; padding: 4px;">
        <div class="al-row">Инструкция</div>
        <div class="al-row">
            <div class="al-row-column"><div id='edMustInstructing' name="Equips[must_instruction]">Нужна</div></div>
            <div class="al-row-column"><div id='edThereInstructing' name="Equips[there_instruction]">Есть</div></div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="al-row-column" style="border: 1px solid #e0e0e0; padding: 4px;">
        <div class="al-row">Аналог</div>
        <div class="al-row">
            <div class="al-row-column"><div id='edMustAnalog' name="Equips[must_analog]">Нужна</div></div>
            <div class="al-row-column"><div id='edThereAnalog' name="Equips[there_analog]">Есть</div></div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="al-row-column" style="border: 1px solid #e0e0e0; padding: 4px;">
        <div class="al-row">Поставщики</div>
        <div class="al-row">
            <div class="al-row-column"><div id='edMustSupplier' name="Equips[must_supplier]">Нужна</div></div>
            <div class="al-row-column"><div id='edThereSupplier' name="Equips[there_supplier]">Есть</div></div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="al-row-column" style="border: 1px solid #e0e0e0; padding: 4px;">
        <div class="al-row">Фотография</div>
        <div class="al-row">
            <div class="al-row-column"><div id='edMustPhoto' name="Equips[must_photo]">Нужна</div></div>
            <div class="al-row-column"><div id='edTherePhoto' name="Equips[there_photo]">Есть</div></div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="al-row-column" style="border: 1px solid #e0e0e0; padding: 4px;">
        <div class="al-row">Производители</div>
        <div class="al-row">
            <div class="al-row-column"><div id='edMustProducer' name="Equips[must_producer]">Нужна</div></div>
            <div class="al-row-column"><div id='edThereProducer' name="Equips[there_producer]">Есть</div></div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='btnSaveEquip' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Отмена" id='btnCancelEquip' /></div>
</div>

<?php $this->endWidget(); ?>