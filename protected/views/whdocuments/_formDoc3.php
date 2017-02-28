<script type="text/javascript">
    var WHDoc2Edit = {};
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var WHDocuments = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Dctp_id: <?php echo json_encode($model->dctp_id); ?>,
            Objc_id: <?php echo json_encode($model->objc_id); ?>,
            Number: <?php echo json_encode($model->number); ?>,
            WorkType: <?php echo json_encode($model->wrtp_name); ?>,
            Wrtp_id: <?php echo json_encode($model->wrtp_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            Storage: <?php echo json_encode($model->storage); ?>,
            Strg_id: <?php echo json_encode($model->strg_id); ?>,
            Achs_id: <?php echo json_encode($model->achs_id); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            Rtrs_id: <?php echo json_encode($model->rtrs_id); ?>,
            InDocmId: <?php echo json_encode($model->in_docm_id); ?>,
            InNumber: <?php echo json_encode($model->in_number); ?>,
            Splr_id: <?php echo json_encode($model->splr_id); ?>
        };
        
        $('#WHDocuments').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        var AddressBinding = true;
        var InDocmBinding = false;
        // Инициализация источников данных
        var DataSuppliers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSuppliersListMin, {async: false, url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SuppliersListMin',}));
        var DataWorkTypes = new $.jqx.dataAdapter(Sources.SourceWorkTypes);
        var DataStorages = new $.jqx.dataAdapter(Sources.SourceStoragesList);
        var DataWHDocumentsMin = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWHDocumentsMin), {
            formatData: function (data) {
                        var Filters = [];
                        Filters[0] = "d.dctp_id = 1";
                            $.extend(data, {
                                Filters: Filters
                            });
                            return data;
                        
                    },
                
        });
        
        var DataReturnReasons = new $.jqx.dataAdapter(Sources.SourceReturnReasons);
        WHDoc2Edit.SelectDoc = function(Docm_id) {
            if (Docm_id != undefined) {
                DataWHDocumentsMin = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWHDocumentsMin), {
                    formatData: function (data) {
                                    var Filters = [];
                                    Filters[0] = "d.dctp_id = 1";
                                    Filters[1] = "d.docm_id = " + Docm_id;
                                    $.extend(data, {
                                        Filters: Filters
                                    });
                                    return data;
                                },

                });
                WHDocuments.InDocmId = Docm_id;
                $("#edInDocmEdit").jqxComboBox({source: DataWHDocumentsMin});
                
            };
        };
        var DataReloadWHDocuments = function(Value) {
            if (Value.length > 1) {
                DataWHDocumentsMin = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWHDocumentsMin), {
                    formatData: function (data) {
                                    var Filters = [];
                                    Filters[0] = "d.dctp_id = 1";
                                    Filters[1] = "d.number like '" + Value + "%'"
                                    $.extend(data, {
                                        Filters: Filters
                                    });
                                    return data;
                                },

                });
                $("#edInDocmEdit").jqxComboBox({source: DataWHDocumentsMin});
            }
        };
        $("#edFilterTreb").on('change', function(){
            DataReloadWHDocuments($("#edFilterTreb").val());
        });
        $("#edFilterTreb").on('keypress', function(e){
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) {
                DataReloadWHDocuments($("#edFilterTreb").val());
            }
        });
        var initForm = function() {
            
        };
        $("#edSupplierEdit").jqxComboBox({ source: DataSuppliers, width: '300', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"});
        $('#FindTrebsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {initContent: initForm}));
        $('#btnFindTreb').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 , imgSrc: "/images/9.png" }));
        $('#btnCancelWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnSaveWHDocuments').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true}));
        $("#edFilterTreb").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100} ));
        $("#edNumberEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150} ));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: WHDocuments.Date, formatString: 'dd.MM.yyyy'}));
        $("#edWorkTypeEdit").jqxComboBox({ source: DataWorkTypes, width: '200', height: '25px', displayMember: "name", valueMember: "wrtp_id"});
        $("#edStorageEdit").jqxComboBox({ source: DataStorages, width: '150', height: '25px', displayMember: "storage", valueMember: "storage_id"});
        $("#edReturnReasonEdit").jqxComboBox({ source: DataReturnReasons, width: '200', height: '25px', displayMember: "name", valueMember: "rtrs_id"});
        $('#btnFindTreb span').css({
            top: '6px',
            left: '46px'
        });
        
        $("#edInDocmEdit").on('bindingComplete', function() {
            InDocmBinding = true;
            $('#btnSaveWHDocuments').jqxButton({disabled: !(AddressBinding && InDocmBinding)});
            $('#btnFindTreb').jqxButton({disabled: !(AddressBinding && InDocmBinding)});
            if (WHDocuments.InDocmId !== null)
                $("#edInDocmEdit").jqxComboBox('val', WHDocuments.InDocmId);
            else $("#edInDocmEdit").jqxComboBox('selectIndex', 0 ); 
        });
        $("#edInDocmEdit").jqxComboBox({ 
            width: '300',
            height: '25px',
            displayMember: "doc",
            valueMember: "docm_id",
        });
        
        $('#edNoteEdit').jqxTextArea({ disabled: false, placeHolder: '', height: 50, width: '99.5%', minLength: 1});
        
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
                            $('#Grid3').jqxGrid('updatebounddata');
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
        if (WHDocuments.Number !== null) $("#edNumberEdit").jqxInput('val', WHDocuments.Number);
        if (WHDocuments.Note !== null) $("#edNoteEdit").jqxTextArea('val', WHDocuments.Note);
        if (WHDocuments.InNumber !== null) $("#edFilterTreb").jqxInput('val', WHDocuments.InNumber);
        if (WHDocuments.Rtrs_id !== null) $("#edReturnReasonEdit").jqxComboBox('val', WHDocuments.Rtrs_id);
        if (WHDocuments.Splr_id !== null) $("#edSupplierEdit").jqxComboBox('val', WHDocuments.Splr_id);
        
        $('#btnFindTreb').on('click', function(){
            $('#FindTrebsDialog').jqxWindow({width: 900, height: 740, position: 'center'});
            var Item = $("#edSupplierEdit").jqxComboBox('getSelectedItem'); 
            if (Item == undefined) return;
            var Supplier_id = Item.value;
            
            if (Supplier_id == '') return;
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocumentsFind/FindWHDoc1')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Supplier_id: Supplier_id,
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindTrebsDialog").html(Res.html);
                    $('#FindTrebsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
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
    <div class="row-column" style="">Склад</div>
    <div class="row-column"><div id="edStorageEdit" name="WHDocuments[strg_id]"></div><?php echo $form->error($model, 'strg_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Поставщик</div>
    <div class="row-column"><div id="edSupplierEdit" name="WHDocuments[splr_id]"></div><?php echo $form->error($model, 'splr_id'); ?></div>
</div>
<div class="row">
    <div class="row-column" style="width: 100px">Номер</div>
    <div class="row-column"><input id="edNumberEdit" name="WHDocuments[number]" /><?php echo $form->error($model, 'number'); ?></div>
    <div class="row-column">Дата</div>
    <div class="row-column"><div id="edDateEdit" name="WHDocuments[date]"></div><?php echo $form->error($model, 'date'); ?></div>
</div>

<div class="row">
    <div class="row-column" style="width: 150px">Причина возврата</div>
    <div class="row-column"><div id="edReturnReasonEdit" name="WHDocuments[rtrs_id]"></div><?php echo $form->error($model, 'rtrs_id'); ?></div>
    
</div>
<div class="row">
    <div class="row-column" >
        <div>Фильтр</div>
        <div><input type="text" id='edFilterTreb'/></div>
            
    </div>
    <div class="row-column" >Документ, по которому был получен товар</div>
    <div class="row-column"><div id="edInDocmEdit" name="WHDocuments[in_docm_id]"></div><?php echo $form->error($model, 'in_docm_id'); ?></div>
    <div class="row-column"><input type="button" value="Найти" id='btnFindTreb'/></div>    
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

<div id="FindTrebsDialog" style="display: none;">
    <div id="FindTrebsDialogHeader">
        <span id="FindTrebsHeaderText">Поиск накладной</span>
    </div>
    <div style="padding: 10px;" id="DialogFindTrebsContent">
        <div style="" id="BodyFindTrebsDialog"></div>
    </div>
</div>    





