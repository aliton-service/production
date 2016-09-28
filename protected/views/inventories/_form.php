<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var DataStorages = new $.jqx.dataAdapter(Sources.SourceStoragesList);
        
        $('#Inventories').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#edInventory").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStorages, displayMember: "storage", valueMember: "storage_id", width: 150, autoDropDownHeight: true }));
        $("#DateTime").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 180, formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true }));

        $('#btnSaveInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelInventory').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelInventory').on('click', function(){
            $('#InventoriesDialog').jqxWindow('close');
        });
        
        $('#btnSaveInventory').on('click', function(){
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
                        Aliton.SelectRowById('invn_id', Res.id, '#InventoriesGrid', true);
                        $('#InventoriesDialog').jqxWindow('close');
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
    <div class="row-column"><div id='edInventory' name="Inventories[storage]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">На дату </div>
    <div class="row-column"><div id='DateTime' name="Inventories[date]"></div></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveInventory'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelInventory'/></div>
</div>
<?php $this->endWidget(); ?>



