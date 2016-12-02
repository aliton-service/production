<script type="text/javascript">
    $(document).ready(function () {
        var Equips = {
            Equip_id: <?php echo json_encode($model->Equip_id); ?>,
            Group_id: 317,
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
        
        
        
        if (Equips.Group_id != '' && Equips.Group_id != null) {
            console.log(Equips.Group_id);
            for (var i=0; i < items.length; i++)
                if (items[i].value == Equips.Group_id) {
                    $("#EquipGroupsGridEdit").jqxTree('expandItem', items[i]);
                    $('#EquipGroupsGridEdit').jqxTree('selectItem', items[i]);
                    break;
                }
        }
        else {
            $('#EquipGroupsGridEdit').jqxTree('selectItem', items[0]);
        }
        
        $('#cmbGroup').on('open', function () { 
            
        });
        
        
        var Equips = {
            Equip_id: <?php echo json_encode($model->Equip_id); ?>,
        };
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
</div>

<?php $this->endWidget(); ?>