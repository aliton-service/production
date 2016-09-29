<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var DataStorages = new $.jqx.dataAdapter(Sources.SourceStoragesList);
        var DataEquips = new $.jqx.dataAdapter(Sources.SourceListEquipsMin);
        
        $('#Inventories').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edInventory").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStorages, displayMember: "storage", valueMember: "storage_id", width: 150, autoDropDownHeight: true }));
        $("#DateTime").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true, value: new Date() }));

        $('#btnSaveInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        var breakInsert = false;
        
        $('#btnCancelInventory').on('click', function(){
            breakInsert = true;
            $('#InventoriesDialog').jqxWindow('close');
        });
        
        var invn_id;
        var eqip_idx = 0;
        var progBarValueTotal = 0;
        
        var insertInventoryDetails = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('InventoryDetails/Create')); ?>,
                data: {
                    InventoryDetails: {
                        invn_id: invn_id,
                        eqip_id: DataEquips.records[eqip_idx].Equip_id
                    }
                },
                type: 'POST',
                async: true,
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        
                      eqip_idx++; 
                      if(!breakInsert && eqip_idx < DataEquips.records.length) {
                            insertInventoryDetails();
                            progBarValueTotal = ((eqip_idx + 1) / DataEquips.records.length) * 100;;
                            $("#jqxProgressBarInventory").jqxProgressBar({ value: progBarValueTotal });
                      } 
                      else if (breakInsert) {
                            $("#InventoriesGrid").jqxGrid('updatebounddata');
                            $("#InventoriesGrid").jqxGrid('selectrow', 0);
                            $('#btnDelInventory').click();
                      } 
                      else {
                          $('#InventoriesDialog').jqxWindow('close');
                      }
                    }
                    else {
                        $('#BodyInventoriesDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        };
        
        
        $('#btnSaveInventory').on('click', function()
        {
            var Url = <?php echo json_encode(Yii::app()->createUrl('Inventories/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('Inventories/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Inventories').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        DataEquips.dataBind();
                        invn_id = Res.id;
                        insertInventoryDetails();
                    }
                    else {
                        $('#BodyInventoriesDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        
        $("#jqxProgressBarInventory").jqxProgressBar({ width: 250, height: 30, value: 0, showText: true, max: 100, animationDuration: 0 });
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Inventories',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">Склад: </div>
    <div class="row-column"><div id='edInventory' name="Inventories[strg_id]"></div><?php echo $form->error($model, 'strg_id'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">На дату </div>
    <div class="row-column"><div id='DateTime' name="Inventories[date]"></div></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Рассчитать" id='btnSaveInventory'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInventory'/></div>
</div>

<div class="row">
    <div class="row-column">*Рассчет может занять более 25 минут.</div>
</div>

<div class="row">
    <div style='margin-top: 10px; overflow: hidden;' id='jqxProgressBarInventory'></div>
</div>

<?php $this->endWidget(); ?>



