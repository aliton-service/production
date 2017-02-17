<script>
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        var LastAction = <?php echo json_encode($LastAction); ?>;
        var MarketingSolutions = <?php echo json_encode($MarketingSolutions); ?>;
        
        var Action = {
            Exrp_id: <?php echo json_encode($model->Exrp_id); ?>,
            Demand_id: <?php echo json_encode($model->Demand_id); ?>,
            Empl_id: <?php echo json_encode($model->Empl_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            Report: <?php echo json_encode($model->Report); ?>,
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
            PlanDateExec: Aliton.DateConvertToJs('<?php echo $model->PlanDateExec; ?>'),
            Form_id: <?php echo json_encode($model->Report); ?>,
            ActionStage_id: <?php echo json_encode($model->ActionStage_id); ?>,
            ContactType_id: <?php echo json_encode($model->ContactType_id); ?>,
            ContactInfo_id: <?php echo json_encode($model->ContactInfo_id); ?>,
            ActionStatus_id: <?php echo json_encode($model->ActionStatus_id); ?>,
            ActionOperation_id: <?php echo json_encode($model->ActionOperation_id); ?>,
            ActionResult_id: <?php echo json_encode($model->ActionResult_id); ?>,
            NextDate: Aliton.DateConvertToJs('<?php echo $model->NextDate; ?>'),
            Responsible_id: <?php echo json_encode($model->Responsible_id); ?>,
            NextAction: <?php echo json_encode($model->NextAction); ?>,
            NextContactInfo: <?php echo json_encode($model->NextContactInfo); ?>
        };
    
        var DataContactInfo = <?php echo json_encode($ContactInfo); ?>;
        var DataActionStages;
        var DataContactTypes;
        var DataOfferResults;
        var DataActionOperations;
        var DataActionResults;
        var DataListEmployees;
        
        var ChangeTab1 = false;
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['ActionStages', 'ContactTypes', 'OfferResults', 'ActionOperations', 'ActionResults', 'ListEmployees']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataActionStages = Res[0].Data;
                DataContactTypes = Res[1].Data;
                DataOfferResults = Res[2].Data;
                DataActionOperations = Res[3].Data;
                DataActionResults = Res[4].Data;
                DataListEmployees = Res[5].Data;
            }
        });
        
        $("#edLastAddress").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200, value: LastAction.Address}));
        $("#edLastStage").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150, value: LastAction.StageName}));
        $("#edLastDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: LastAction.Date }));
        $("#edLastResult").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150, value: LastAction.ResultName}));
        $("#edLastNextAction").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150, value: LastAction.NextAction}));
        
        $("#cmbStageEdit").jqxComboBox({ source: DataActionStages, width: '260', height: '25px', displayMember: "StageName", valueMember: "Stage_id"});
        $("#cmbStageEdit").jqxComboBox('val', Action.ActionStage_id);
        $("#cmbContactTypeEdit").jqxComboBox({ source: DataContactTypes, width: '200', height: '25px', displayMember: "ContactName", valueMember: "Contact_id"});
        $("#cmbContactTypeEdit").jqxComboBox('val', Action.ContactType_id);
        $("#cmbContactInfoEdit").jqxComboBox({ source: DataContactInfo, width: '240', height: '25px', displayMember: "CName", valueMember: "Info_id"});
        $("#cmbContactInfoEdit").jqxComboBox('val', Action.ContactInfo_id);
        $("#cmbStatusOPEdit").jqxComboBox({ source: [{id: 1, name: 'Холодный'}, {id: 2, name: 'Теплый'}, {id: 3, name: 'Горячий'}, {id: 4, name: 'Хронический'}], width: '150', height: '25px', displayMember: "name", valueMember: "id"});
        
        var initWidgets = function(tab) {
            switch (tab) {
                case 0:
                    
                    
                    $("#edOfferName1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Бесплатная модернизация'}));
                    $("#cmbOffer1ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer1DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer1Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: MarketingSolutions.Offer1Note}));
                    
                    $("#edOfferName2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Бесплатные месяца обслуживания'}));
                    $("#cmbOffer2ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer2DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer2Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOfferName3").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Скидка на модернизацию'}));
                    $("#cmbOffer3ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer3DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer3Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOfferName4").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Скидка на обслуживание'}));
                    $("#cmbOffer4ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer4DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer4Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOfferName5").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Акция 15% от клиента'}));
                    $("#cmbOffer5ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer5DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer5Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOfferName6").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Акция система в подарок'}));
                    $("#cmbOffer6ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer6DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer6Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOfferName7").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Акция год за два'}));
                    $("#cmbOffer7ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer7DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer7Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOfferName8").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Антиклон'}));
                    $("#cmbOffer8ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer8DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer8Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOfferName9").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250, value: 'Акция'}));
                    $("#cmbOffer9ResultEdit").jqxComboBox({ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"});
                    $("#cmbOffer9DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: null }));
                    $("#edOffer9Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 250}));
                    
                    $("#edOffer1Note").on('change', function() {
                        ChangeTab1 = true;
                    });
                    
                    break;
            };
        };
        
        $('#ActionEditTab').jqxTabs({ width: 'calc(100% - 2px)', height: '334px', keyboardNavigation: false, initTabContent: initWidgets});
        $("#chbEconomy").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25 }));
        $("#chbQuality").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25 }));
        $("#chbPrivate").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 150, height: 25 }));
        $("#chbModernization").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 150, height: 25 }));
        $("#chbBeautification").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 150, height: 25 }));
        
        $("#cmbActionOperationEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataActionOperations, width: 235, height: '25px', displayMember: "ActionOperationName", valueMember: "Operation_id"}));
        $("#cmbActionOperationEdit").jqxComboBox('val', Action.ActionOperation_id);
        $("#cmbActionResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataActionResults, width: 235, height: '25px', displayMember: "ActionResultName", valueMember: "Result_id"}));
        $("#cmbActionResultEdit").jqxComboBox('val', Action.ActionResult_id);
        $('#edReport').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: 'Комментарии', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edNextDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: Action.NextDate }));
        $("#cmbResponsibleEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataListEmployees, width: 200, height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#cmbResponsibleEdit").jqxComboBox('val', Action.Responsible_id);
        $("#cmbExecutorEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataListEmployees, width: 200, height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edNextAction").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: 'Планируемое действие', width: 400, value: Action.NextAction}));
        $("#cmbNextContactInfo").jqxComboBox({ source: DataContactInfo, dropDownVerticalAlignment: 'top', width: '240', height: '25px', displayMember: "CName", valueMember: "Info_id"});
        $("#cmbNextContactInfo").jqxComboBox('val', Action.NextContactInfo);
        $("#chbReserv").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25 }));
        
        $('#btnSaveAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 130, height: 30 }));
        $('#btnCancelAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 130, height: 30 }));
        $('#btnCancelAction').on('click', function() {
            if ($('#ActionsDialog').length>0)
                $('#ActionsDialog').jqxWindow('close');
        });
        
        
        $('#btnSaveAction').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Insert')); ?>;
            
            console.log(ChangeTab1);
//            
//            $.ajax({
//                url: Url,
//                data: $('#ClientActions').serialize(),
//                type: 'POST',
//                success: function(Res) {
//                    var Res = JSON.parse(Res);
//                    if (Res.result == 1) {
//                        Aliton.SelectRowById('Exrp_id', Res.id, '#ProgGrid', true);
//                        $('#ActionsDialog').jqxWindow('close');
//                    }
//                    else {
//                        $('#BodyActionsDialog').html(Res.html);
//                    };
//                },
//                error: function(Res) {
//                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
//                }
//            });
        });
        
        
    });
</script>

<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'ClientActions',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
     )); 

?>

<input type="hidden" name="ClientActions[Exrp_id]" value="<?php echo $model->Exrp_id; ?>" />
<input type="hidden" name="ClientActions[Form_id]" value="<?php echo $model->Form_id; ?>" />
<input type="hidden" name="ClientActions[Demand_id]" value="<?php echo $model->Demand_id; ?>" />


<?php echo $form->error($model, 'Form_id'); ?>
<?php echo $form->error($model, 'Demand_id'); ?>
<?php echo $form->error($model, 'Empl_id'); ?>

<div class="al-row" style="border: 1px solid #e0e0e0;">
    <div style="text-align: center">ПОСЛЕДНЯЯ ЗАПИСЬ</div>
    <div style="margin-left: 4px;">
        <div class="al-row-column">
            <div>Адрес</div>
            <div><input type="text" id="edLastAddress" /></div>
        </div>
        <div class="al-row-column">
            <div>Этап</div>
            <div><input type="text" id="edLastStage" /></div>
        </div>
        <div class="al-row-column">
            <div>Дата посл. действия</div>
            <div><div id="edLastDate"></div></div>
        </div>
        <div class="al-row-column">
            <div>Результат</div>
            <div><input type="text" id="edLastResult" /></div>
        </div>
        <div class="al-row-column">
            <div>Запл. действие</div>
            <div><input type="text" id="edLastNextAction" /></div>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column">
        <div style="text-align: center">Этап</div>
        <div><div id="cmbStageEdit" name="ClientActions[ActionStage_id]"></div><?php echo $form->error($model, 'ActionStage_id'); ?></div>
    </div>
    <div class="al-row-column">
        <div style="text-align: center">Тип контакта</div>
        <div><div id="cmbContactTypeEdit" name="ClientActions[ContactType_id]"></div><?php echo $form->error($model, 'ContactType_id'); ?></div>
    </div>
    <div class="al-row-column">
        <div style="text-align: center">Контактное лицо</div>
        <div><div id="cmbContactInfoEdit" name="ClientActions[ContactInfo_id]"></div><?php echo $form->error($model, 'ContactInfo_id'); ?></div>
    </div>
    <div class="al-row-column">
        <div style="text-align: center">Статус ОП</div>
        <div><div id="cmbStatusOPEdit"></div></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div id='ActionEditTab'>
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Маркетинговые решения</div>

                </div>
            </li>
        </ul>
        <div style="overflow: hidden; padding: 10px">
            <div style="height: calc(100% - 20px)">
                <div class="al-row" style="padding: 0px 0px 0px 0px">
                    <div class="al-row-column" style="width: 258px">Предложения</div>
                    <div class="al-row-column" style="width: 192px">Результат</div>
                    <div class="al-row-column" style="width: 132px">Дата предложения</div>
                    <div class="al-row-column" style="width: 258px">Комментарии</div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName1" /></div>
                    <div class="al-row-column"><div id="cmbOffer1ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer1DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer1Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName2" /></div>
                    <div class="al-row-column"><div id="cmbOffer2ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer2DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer2Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName3" /></div>
                    <div class="al-row-column"><div id="cmbOffer3ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer3DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer3Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName4" /></div>
                    <div class="al-row-column"><div id="cmbOffer4ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer4DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer4Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName5" /></div>
                    <div class="al-row-column"><div id="cmbOffer5ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer5DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer5Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName6" /></div>
                    <div class="al-row-column"><div id="cmbOffer6ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer6DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer6Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName7" /></div>
                    <div class="al-row-column"><div id="cmbOffer7ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer7DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer7Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName8" /></div>
                    <div class="al-row-column"><div id="cmbOffer8ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer8DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer8Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edOfferName9" /></div>
                    <div class="al-row-column"><div id="cmbOffer9ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbOffer9DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edOffer9Note" /></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="al-row" style="border: 1px solid #e0e0e0;">
    <div style="text-align: center">ПОТРЕБНОСТИ КЛИЕНТА</div>
    <div style="margin-left: 4px;">
        <div class="al-row-column"><div id="chbEconomy">Экономия</div></div>
        <div class="al-row-column"><div id="chbQuality">Качество</div></div>
        <div class="al-row-column"><div id="chbPrivate">Личный интерес</div></div>
        <div class="al-row-column"><div id="chbModernization">Модернизация</div></div>
        <div class="al-row-column"><div id="chbBeautification">Благоустройство</div></div>
        <div style="clear: both"></div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column">Действие</div>
    <div class="al-row-column"><div id="cmbActionOperationEdit" name="ClientActions[ActionOperation_id]"></div><?php echo $form->error($model, 'ActionOperation_id'); ?></div>
    <div class="al-row-column">Результат</div>
    <div class="al-row-column"><div id="cmbActionResultEdit" name="ClientActions[ActionResult_id]"></div><?php echo $form->error($model, 'ActionResult_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div><textarea id="edReport" name="ClientActions[Report]"><?php echo $model->Report; ?></textarea><?php echo $form->error($model, 'Report'); ?></div>
</div>
<div class="al-row">
    <div class="al-row-column">Дата план. действия</div>
    <div class="al-row-column"><div id="edNextDateEdit" name="ClientActions[NextDate]"></div><?php echo $form->error($model, 'NextDate'); ?></div>
    <div class="al-row-column">Ответ.</div>
    <div class="al-row-column"><div id="cmbResponsibleEdit" name="ClientActions[Responsible_id]"></div><?php echo $form->error($model, 'Responsible_id'); ?></div>
    <div class="al-row-column">Соисп.</div>
    <div class="al-row-column"><div id="cmbExecutorEdit" ></div></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column">
        <div><input type="text" id="edNextAction" name="ClientActions[NextAction]" /><?php echo $form->error($model, 'NextAction'); ?></div>
    </div>
    <div class="al-row-column">План. КЛ</div>
    <div class="al-row-column"><div id="cmbNextContactInfo" name="ClientActions[NextContactInfo]"></div><?php echo $form->error($model, 'NextContactInfo'); ?></div>
    
    <div class="al-row-column">
        <div id="chbReserv">В РЕЗЕРВ</div>
    </div>
    <div style="clear: both"></div>
</div>


<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnSaveAction" value="Сохранить"/></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnCancelAction" value="Отмена"/></div>
    <div style="clear: both"></div>
</div>

<?php $this->endWidget(); ?>