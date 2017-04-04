<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var WHDocuments = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Dctp_id: <?php echo json_encode($model->dctp_id); ?>,
            Number: <?php echo json_encode($model->number); ?>,
            WorkType: <?php echo json_encode($model->wrtp_name); ?>,
            Wrtp_id: <?php echo json_encode($model->wrtp_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            Storage: <?php echo json_encode($model->storage); ?>,
            Strg_id: <?php echo json_encode($model->strg_id); ?>,
            Supplier: <?php echo json_encode($model->splr_name); ?>,
            Splr_id: <?php echo json_encode($model->splr_id); ?>,
            DocKind: <?php echo json_encode($model->dckn_name); ?>,
            Dckn_id: <?php echo json_encode($model->dckn_id); ?>,
            Jrdc: <?php echo json_encode($model->JuridicalPerson); ?>,
            Jrdc_id: <?php echo json_encode($model->jrdc_id); ?>,
            Achs_id: <?php echo json_encode($model->achs_id); ?>,
            Note: <?php echo json_encode($model->note); ?>
        };
        
        $('#WHDocuments').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        // Инициализация источников данных
        var DataWorkTypes; //= new $.jqx.dataAdapter(Sources.SourceWorkTypes);
        var DataStorages; //= new $.jqx.dataAdapter(Sources.SourceStoragesList);
        var DataSuppliers; //= new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSuppliersListMin, {async: false, url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SuppliersListMin',}));
        var DataWHDocKinds; //= new $.jqx.dataAdapter(Sources.SourceWHDocKinds);
        var DataJuridicals; //= new $.jqx.dataAdapter(Sources.SourceJuridicalsMin);
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['WorkTypes', 'StoragesList', 'SuppliersListMin', 'WHDocKinds', 'JuridicalsMin']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataWorkTypes = Res[0].Data;
                DataStorages = Res[1].Data;
                DataSuppliers = Res[2].Data;
                DataWHDocKinds = Res[3].Data;
                DataJuridicals = Res[4].Data;
            }
        });
        
        $("#edWorkTypeEdit").jqxComboBox({ source: DataWorkTypes, width: '200', height: '25px', displayMember: "name", valueMember: "wrtp_id"});
        $("#edStorageEdit").jqxComboBox({ source: DataStorages, width: '200', height: '25px', displayMember: "storage", valueMember: "storage_id"});
        $("#edDocKindEdit").jqxComboBox({ source: DataWHDocKinds, width: '200', height: '25px', displayMember: "name", valueMember: "dckn_id"});
        
        $("#edSupplierEdit").on('select', function(event){
            var args = event.args;
            if (args) {
                var Item = args.item;
                var Value = Item.value;
                var Row = Aliton.FindArray(DataSuppliers, 'Supplier_id', Value);
                if (Row != null)
                    $("#edSupplierFullName").val(Row.FullName);
                    
            }
            
        });
        
        $("#edSupplierEdit").jqxComboBox({ source: DataSuppliers, width: '300', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"});
        $("#edSupplierFullName").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 300} ));
        $("#edNumberEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150} ));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.Date, formatString: 'dd.MM.yyyy'}));
        $("#edJrdcEdit").jqxComboBox({ source: DataJuridicals, width: '300', height: '25px', displayMember: "JuridicalPerson", valueMember: "Jrdc_Id"});
        $('#edNoteEdit').jqxTextArea({ disabled: false, placeHolder: '', height: 50, width: '99.5%', minLength: 1});
        
        $('#btnSaveWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelWHDocuments').on('click', function(){
            $('#WHDocumentsDialog').jqxWindow('close');
        });
        
        $('#btnSaveWHDocuments').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')); ?>;
            
            var Model = $('#WHDocuments').serialize() + '&Dctp_id=' + WHDocuments.Dctp_id;
            
            $.ajax({
                url: Url,
                data: Model,
                
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (!StateInsert) WHDoc.Refresh();
                        if (StateInsert) {
                            WHReestr.Docm_id = Res.id;
                            $('#Grid1').jqxGrid('updatebounddata');
                            window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View'))?> + '&Docm_id=' + Res.id);
                        }
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
        
        if (WHDocuments.Wrtp_id !== null) $("#edWorkTypeEdit").jqxComboBox('val', WHDocuments.Wrtp_id);
        if (WHDocuments.Strg_id !== null) $("#edStorageEdit").jqxComboBox('val', WHDocuments.Strg_id);
        if (WHDocuments.Splr_id !== null) $("#edSupplierEdit").jqxComboBox('val', WHDocuments.Splr_id);
        if (WHDocuments.Dckn_id !== null) $("#edDocKindEdit").jqxComboBox('val', WHDocuments.Dckn_id);
        if (WHDocuments.Number !== null) $("#edNumberEdit").jqxInput('val', WHDocuments.Number);
        if (WHDocuments.Jrdc_id !== null) $("#edJrdcEdit").jqxComboBox('val', WHDocuments.Jrdc_id);
        if (WHDocuments.Note !== null) $("#edNoteEdit").jqxTextArea('val', WHDocuments.Note);
        
    });
</script>    

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'WHDocuments',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="WHDocuments[docm_id]" value="<?php echo $model->docm_id; ?>" />
<input type="hidden" name="WHDocuments[dctp_id]" value="<?php echo $model->dctp_id; ?>" />

<div class="row">
    <div class="row-column" style="width: 100px">Вид работ</div>
    <div class="row-column"><div id="edWorkTypeEdit" name="WHDocuments[wrtp_id]"></div><?php echo $form->error($model, 'wrtp_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Склад</div>
    <div class="row-column"><div id="edStorageEdit" name="WHDocuments[strg_id]"></div><?php echo $form->error($model, 'strg_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Поставщик</div>
    <div class="row-column"><div id="edSupplierEdit" name="WHDocuments[splr_id]"></div><?php echo $form->error($model, 'splr_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Полн. имя</div>
    <div class="row-column"><input id="edSupplierFullName" /></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Вид документа</div>
    <div class="row-column"><div id="edDocKindEdit" name="WHDocuments[dckn_id]"></div><?php echo $form->error($model, 'dckn_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Номер</div>
    <div class="row-column"><input id="edNumberEdit" name="WHDocuments[number]" /><?php echo $form->error($model, 'number'); ?></div>
    <div class="row-column">Дата</div>
    <div class="row-column"><div id="edDateEdit" name="WHDocuments[date]"></div><?php echo $form->error($model, 'date'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Юр. лицо</div>
    <div class="row-column"><div id="edJrdcEdit" name="WHDocuments[jrdc_id]"></div></div>
</div>
<div class="row" style="margin-top: 8px; border-top: 1px solid #e0e0e0;">
    <div><div class="row-column">Примечание</div></div>
    <div><textarea id="edNoteEdit" name="WHDocuments[note]"></textarea></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveWHDocuments'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelWHDocuments'/></div>
</div>
<?php $this->endWidget(); ?>
    

