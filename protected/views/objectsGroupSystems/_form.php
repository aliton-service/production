<script type="text/javascript">
        var OGSystem = {};
        $(document).ready(function () {
            OGSystems = {
                ObjectsGroupSystem_id: <?php echo json_encode($model->ObjectsGroupSystem_id); ?>,
                SystemType_Id: <?php echo json_encode($model->Sttp_id); ?>,
                Availability: <?php echo json_encode($model->Availability_id); ?>,
                count: <?php echo json_encode($model->count); ?>,
                Competitors: <?php echo json_encode($model->Competitors); ?>,
                Condition: <?php echo json_encode($model->Condition); ?>,
                Desc: <?php echo json_encode($model->Desc); ?>,
                ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
                SystemComplexityFull: <?php echo json_encode($model->SystemComplexityFull); ?>,
                SysSttmnt_id: <?php echo json_encode($model->SysSttmnt_id); ?>
            };
            
            var DataSystemTypes = new $.jqx.dataAdapter(Sources.SourceSystemTypesMin);
            var DataSystemAvailabilitys = new $.jqx.dataAdapter(Sources.SourceSystemAvailabilitys);
            var DataCompetitors = new $.jqx.dataAdapter(Sources.SourceCompetitors);
            var DataSystemStatements = new $.jqx.dataAdapter(Sources.SourceListSystemStatementsMin);
            
            
            $("#SystemType2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemTypes, displayMember: "SystemTypeName", valueMember: "SystemType_Id", width:300 }));
            $("#Availability2").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemAvailabilitys, displayMember: "availability", valueMember: "code_id", width:200, autoDropDownHeight: true }));;
            $("#count2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, symbolPosition: 'right', min: 0, decimalDigits: 0, spinButtons: true }));
            $("#edCompetitors").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 340 }));
            $("#edComplexitySystems").jqxInput($.extend(true, {}, InputDefaultSettings, { width: '100%' }));
            
//
            $('#btnEditComplexitySystems').on('click', function(){
                $('#SystemDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 500, height: 500, position: 'center'}));
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystemComplexitys/Index')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Ogst_id: OGSystems.ObjectsGroupSystem_id,
                        ObjectGr_id: OGSystems.ObjectGr_id 
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodySystemDialog").html(Res.html);
                        $('#SystemDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });

            $("#edSystemStatements").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSystemStatements, displayMember: "SystemStatementsName", valueMember: "SystemStatements_id", width:'calc(100% - 2px)', autoDropDownHeight: true }));;
            $("#Condition2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {width: 'calc(100% - 2px)'}));
            $("#Desc2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {width: 'calc(100% - 2px)'}));
            
            $('#btnFindCompetitor').on('click', function(){
                $('#SystemDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 500, height: 500, position: 'center'}));
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('SystemCompetitors/Index')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        ObjectsGroupSystem_id: OGSystems.ObjectsGroupSystem_id,
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodySystemDialog").html(Res.html);
                        $('#SystemDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
            
            
            $("#btnSaveOrgSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
            $("#btnCancelOrgSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
            
            $("#btnCancelOrgSystem").on('click', function() {
                $('#EditDialogOGSystems').jqxWindow('close');
                $("#RefreshObjectsGroupSystem").click();
            });
            
            $("#btnSaveOrgSystem").on('click', function() {
                var Url;
                if (Mode == 'Insert')
                    Url = "<?php echo Yii::app()->createUrl('ObjectsGroupSystems/Insert');?>";
                if (Mode == 'Edit')
                    Url = "<?php echo Yii::app()->createUrl('ObjectsGroupSystems/Update');?>";

                $.ajax({
                    url: Url,
                    type: 'POST',
                    async: false,
                    data: $('#ObjectsGroupSystems').serialize(),
                    success: function(Res) {
                        if (Res == '1' || Res == 1) {
                            $('#EditDialogOGSystems').jqxWindow('close');
                            $("#RefreshObjectsGroupSystem").click();
                        } else {
                            $('#BodyDialogOGSystems').html(Res);
                        }

                    }
                });
            });
            
            if (OGSystems.SystemType_Id != '') $("#SystemType2").jqxComboBox('val', OGSystems.SystemType_Id);
            if (OGSystems.Availability != '') $("#Availability2").jqxComboBox('val', OGSystems.Availability);
            if (OGSystems.count != '') $("#count2").jqxNumberInput('val', OGSystems.count);
            if (OGSystems.SysSttmnt_id != '') $("#edSystemStatements").jqxComboBox('val', OGSystems.SysSttmnt_id);
            if (OGSystems.SystemComplexityFull != '') $("#edComplexitySystems").jqxInput('val', OGSystems.SystemComplexityFull);
            if (OGSystems.Condition != '') $("#Condition2").jqxTextArea('val', OGSystems.Condition);
            if (OGSystems.Desc != '') $("#Desc2").jqxTextArea('val', OGSystems.Desc);
            
            OGSystem.GetCompetitors = function () {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystems/GetCompetitor')); ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        ObjectsGroupSystem_id: OGSystems.ObjectsGroupSystem_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            $('#edCompetitors').val(Res.html);
                        } 
                    }
                });
            };
            
            OGSystem.GetSystemComplexitys = function () {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroupSystems/GetSystemComplexitys')); ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        ObjectsGroupSystem_id: OGSystems.ObjectsGroupSystem_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            $('#edComplexitySystems').val(Res.html);
                        } 
                    }
                });
            };
            
            OGSystem.GetCompetitors();
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

<input type="hidden" name="ObjectsGroupSystems[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>">
<input type="hidden" name="ObjectsGroupSystems[ObjectsGroupSystem_id]" value="<?php echo $model->ObjectsGroupSystem_id; ?>">

<div class='al-data'>
    <div class="al-row">
        <div class="al-row-column" style="width: 100px">Тип системы:</div>
        <div class="al-row-column"><div id='SystemType2' name="ObjectsGroupSystems[Sttp_id]"></div><?php echo $form->error($model, 'Sttp_id'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 100px">Наличие:</div>
        <div class="al-row-column"><div id='Availability2' name="ObjectsGroupSystems[Availability_id]"></div><?php echo $form->error($model, 'Availability_id'); ?></div>
        <div class="al-row-column" style="width: 100px">Кол-во систем:</div>
        <div class="al-row-column"><div id="count2" name="ObjectsGroupSystems[count]" type="text"></div><?php echo $form->error($model, 'count'); ?></div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 200px">Обслуживающие орг.:</div>
        <div class="al-row-column">
            <div id="edCompetitors" name="" readonly="readonly">
                <input type="text" name="" readonly="readonly" />
                <input type="button" id="btnFindCompetitor" style="height: 100%; width: 25px;" value="..." />
            </div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column" style="width: 50%">
            <div class="al-row" style="padding: 0px">Сложность системы</div>
            <div class="al-row" style="padding: 0px">
                <div id="edComplexitySystems" name="" readonly="readonly">
                    <input type="text" name="" readonly="readonly" />
                    <input type="button" id="btnEditComplexitySystems" style="height: 100%; width: 25px;" value="..." />
                </div>
            </div>
        </div>
        <div class="al-row-column" style="width: calc(50% - 6px)">
            <div class="al-row" style="padding: 0px">Состояние системы</div>
            <div class="al-row" style="padding: 0px"><div id="edSystemStatements" name="ObjectsGroupSystems[SysSttmnt_id]" type="text"></div><?php echo $form->error($model, 'SysSttmnt_id'); ?></div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row" style="padding: 0px">Условия:</div>
        <div class="al-row" style="padding: 0px"><textarea id="Condition2" name="ObjectsGroupSystems[Condition]"></textarea><?php echo $form->error($model, 'Condition'); ?></div>
    </div>
    <div class="al-row">
        <div class="al-row" style="padding: 0px">Примечание:</div>
        <div class="al-row" style="padding: 0px"><textarea id="Desc2" name="ObjectsGroupSystems[Desc]"></textarea></div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnSaveOrgSystem" value="Сохранить" /></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnCancelOrgSystem" value="Отмена" /></div>
</div>
<?php $this->endWidget(); ?> 

<div id="SystemDialog" style="display: none;">
    <div id="SystemDialogHeader">
        <span id="SystemHeaderText">Поиск заявки</span>
    </div>
    <div style="padding: 10px;" id="DialogSystemContent">
        <div style="" id="BodySystemDialog"></div>
    </div>
</div> 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 