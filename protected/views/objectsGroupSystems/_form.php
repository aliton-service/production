<script type="text/javascript">
        $(document).ready(function () {
            var OGSystems = {
                ObjectsGroupSystem_id: '<?php echo $model->ObjectsGroupSystem_id; ?>',
                SystemType_Id: '<?php echo $model->Sttp_id; ?>',
                Availability: '<?php echo $model->Availability_id; ?>',
                count: '<?php echo $model->count; ?>',
                Competitors: '<?php echo $model->Competitors; ?>',
                Condition: '<?php echo $model->Condition; ?>',
                Desc: '<?php echo $model->Desc; ?>',
            };
            
            var DataSystemTypes = new $.jqx.dataAdapter(Sources.SourceSystemTypesMin);
            var DataSystemAvailabilitys = new $.jqx.dataAdapter(Sources.SourceSystemAvailabilitys);
            var DataCompetitors = new $.jqx.dataAdapter(Sources.SourceCompetitors);
            
            
            $("#SystemType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemTypes, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width:300 }));
            $("#Availability").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemAvailabilitys, displayMember: "availability", valueMember: "code_id", width:200, autoDropDownHeight: true }));;
            $("#count").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
    
            $("#Competitors").jqxComboBox({source: DataCompetitors, displayMember: "Competitor", valueMember: "cmtr_id", multiSelect: true, width: 340, height: 25 });
            
            $("#Competitors").on('change', function () {
                var items = $("#Competitors").jqxComboBox('getSelectedItems');
                var selectedItems = "Selected Items: ";
                $.each(items, function (index) {
                    selectedItems += this.label;
                    if (items.length - 1 != index) {
                        selectedItems += ", ";
                    }
                });
                $("#log").text(selectedItems);
            });
            
            $("#Condition").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {}));
            $("#Desc").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {}));

//            var DataSystemCompetitors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSystemCompetitors, {}), {
//                formatData: function (data) {
//                    $.extend(data, {
//                        Filters: ["sc.ObjectsGroupSystem_id = " + OGSystems.ObjectsGroupSystem_id]
//                    });
//                    return data;
//                }
//            });
//            console.log(OGSystems.ObjectsGroupSystem_id);
//            console.log(DataSystemCompetitors);
//            DataSystemCompetitors.dataBind();
            
//            var find = function(data) {
//                for (var i = 0; i < data.records.length; i++) 
//                {
//                    return $("#Competitors").jqxComboBox('selectItem', data.records[i].Competitor);
//                }
//                return null;
//            };
//            find(DataSystemCompetitors);
            
            if (OGSystems.SystemType_Id != '') $("#SystemType").jqxComboBox('val', OGSystems.SystemType_Id);
            if (OGSystems.Availability != '') $("#Availability").jqxComboBox('val', OGSystems.Availability);
            if (OGSystems.count != '') $("#count").jqxNumberInput('val', OGSystems.count);
//            if (OGSystems.Competitors != '') $("#Competitors").jqxComboBox('val', OGSystems.Competitors);
            if (OGSystems.Condition != '') $("#Condition").jqxTextArea('val', OGSystems.Condition);
            if (OGSystems.Desc != '') $("#Desc").jqxTextArea('val', OGSystems.Desc);
            
            
        });
</script>        
<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ObjectsGroupSystems',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<div class="row"><div class="row-column">Тип системы: <div id='SystemType' name="ObjectsGroupSystems[Sttp_id]"></div><?php echo $form->error($model, 'Sttp_id'); ?></div></div>  
<div class="row">
    <input type="hidden" name="ObjectsGroupSystems[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>">
    <input type="hidden" name="ObjectsGroupSystems[ObjectsGroupSystem_id]" value="<?php echo $model->ObjectsGroupSystem_id; ?>">
    <div class="row-column">Наличие: <div id='Availability' name="ObjectsGroupSystems[Availability_id]"></div><?php echo $form->error($model, 'Availability_id'); ?></div>  
    <div class="row-column">Кол-во систем: <div id="count" name="ObjectsGroupSystems[count]" type="text"><?php echo $form->error($model, 'count'); ?></div></div>
    <div class="row-column" style="margin-top: 20px;">Обслуживающие организации: <br><div id="Competitors"></div></div>
    <div id="log" style="margin-top: 10px; font-size: 13px; font-family: Verdana;" name="ObjectsGroupSystems[Competitors]"></div>
    <div class="row-column" style="margin-top: 20px;">Условия: <textarea id="Condition" name="ObjectsGroupSystems[Condition]"></textarea></div>
    <div class="row-column" style="margin-top: 20px;">Примечание: <textarea id="Desc" name="ObjectsGroupSystems[Desc]"></textarea></div>
</div>  

<?php $this->endWidget(); ?>