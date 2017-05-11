<script>
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        var LastAction = <?php echo json_encode($LastAction); ?>;
        LastAction.Date = Aliton.DateConvertToJs(LastAction.Date);
        
        var MarketingSolutions = <?php echo json_encode($MarketingSolutions); ?>;
        MarketingSolutions.Offer1Date = Aliton.DateConvertToJs(MarketingSolutions.Offer1Date);
        MarketingSolutions.Offer2Date = Aliton.DateConvertToJs(MarketingSolutions.Offer2Date);
        MarketingSolutions.Offer3Date = Aliton.DateConvertToJs(MarketingSolutions.Offer3Date);
        MarketingSolutions.Offer4Date = Aliton.DateConvertToJs(MarketingSolutions.Offer4Date);
        MarketingSolutions.Offer5Date = Aliton.DateConvertToJs(MarketingSolutions.Offer5Date);
        MarketingSolutions.Offer6Date = Aliton.DateConvertToJs(MarketingSolutions.Offer6Date);
        MarketingSolutions.Offer7Date = Aliton.DateConvertToJs(MarketingSolutions.Offer7Date);
        MarketingSolutions.Offer8Date = Aliton.DateConvertToJs(MarketingSolutions.Offer8Date);
        MarketingSolutions.Offer9Date = Aliton.DateConvertToJs(MarketingSolutions.Offer9Date);
        
        var SystemOffers = <?php echo json_encode($SystemOffers); ?>;
        SystemOffers.Offer1Date = Aliton.DateConvertToJs(SystemOffers.Offer1Date);
        SystemOffers.Offer2Date = Aliton.DateConvertToJs(SystemOffers.Offer2Date);
        SystemOffers.Offer3Date = Aliton.DateConvertToJs(SystemOffers.Offer3Date);
        SystemOffers.Offer4Date = Aliton.DateConvertToJs(SystemOffers.Offer4Date);
        SystemOffers.Offer5Date = Aliton.DateConvertToJs(SystemOffers.Offer5Date);
        SystemOffers.Offer6Date = Aliton.DateConvertToJs(SystemOffers.Offer6Date);
        SystemOffers.Offer7Date = Aliton.DateConvertToJs(SystemOffers.Offer7Date);
        SystemOffers.Offer8Date = Aliton.DateConvertToJs(SystemOffers.Offer8Date);
        SystemOffers.Offer9Date = Aliton.DateConvertToJs(SystemOffers.Offer9Date);
        
        var ClientSolutions = <?php echo json_encode($ClientSolutions); ?>;
        ClientSolutions.Solution1Date = Aliton.DateConvertToJs(ClientSolutions.Solution1Date);
        ClientSolutions.Solution2Date = Aliton.DateConvertToJs(ClientSolutions.Solution2Date);
        ClientSolutions.Solution3Date = Aliton.DateConvertToJs(ClientSolutions.Solution3Date);
        ClientSolutions.Solution4Date = Aliton.DateConvertToJs(ClientSolutions.Solution4Date);
        ClientSolutions.Solution5Date = Aliton.DateConvertToJs(ClientSolutions.Solution5Date);
        ClientSolutions.Solution6Date = Aliton.DateConvertToJs(ClientSolutions.Solution6Date);
        ClientSolutions.Solution7Date = Aliton.DateConvertToJs(ClientSolutions.Solution7Date);
        ClientSolutions.Solution8Date = Aliton.DateConvertToJs(ClientSolutions.Solution8Date);
        ClientSolutions.Solution9Date = Aliton.DateConvertToJs(ClientSolutions.Solution9Date);
        ClientSolutions.Solution10Date = Aliton.DateConvertToJs(ClientSolutions.Solution10Date);
        ClientSolutions.Solution11Date = Aliton.DateConvertToJs(ClientSolutions.Solution11Date);
        ClientSolutions.Solution12Date = Aliton.DateConvertToJs(ClientSolutions.Solution12Date);
        ClientSolutions.Solution13Date = Aliton.DateConvertToJs(ClientSolutions.Solution13Date);
        ClientSolutions.Solution14Date = Aliton.DateConvertToJs(ClientSolutions.Solution14Date);
        ClientSolutions.Solution15Date = Aliton.DateConvertToJs(ClientSolutions.Solution15Date);
        
        var Action = {
            Exrp_id: <?php echo json_encode($model->Exrp_id); ?>,
            Demand_id: <?php echo json_encode($model->Demand_id); ?>,
            Empl_id: <?php echo json_encode($model->Empl_id); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->Date; ?>'),
            Report: <?php echo json_encode($model->Report); ?>,
            DateExec: Aliton.DateConvertToJs('<?php echo $model->DateExec; ?>'),
            PlanDateExec: Aliton.DateConvertToJs('<?php echo $model->PlanDateExec; ?>'),
            Form_id: <?php echo json_encode($model->Form_id); ?>,
            ActionStage_id: <?php echo json_encode($model->ActionStage_id); ?>,
            ContactType_id: <?php echo json_encode($model->ContactType_id); ?>,
            ContactInfo_id: <?php echo json_encode($model->ContactInfo_id); ?>,
            ActionStatus_id: <?php echo json_encode($model->ActionStatus_id); ?>,
            ActionOperation_id: <?php echo json_encode($model->ActionOperation_id); ?>,
            ActionResult_id: <?php echo json_encode($model->ActionResult_id); ?>,
            NextDate: Aliton.DateConvertToJs('<?php echo $model->NextDate; ?>'),
            Responsible_id: <?php echo json_encode($model->Responsible_id); ?>,
            NextAction: <?php echo json_encode($model->NextAction); ?>,
            NextContactInfo: <?php echo json_encode($model->NextContactInfo); ?>,
            StatusOP: <?php echo json_encode($model->StatusOP); ?>
        };
    
        var DataContactInfo = <?php echo json_encode($ContactInfo); ?>;
        var DataActionStages;
        var DataContactTypes;
        var DataOfferResults;
        var DataActionOperations;
        var DataActionResults;
        var DataListEmployees;
        
        var ChangeTab1 = false;
        var ChangeTab2 = false;
        var ChangeTab3 = false;
        
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
        
        $("#cmbStageEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataActionStages, width: '260', height: '25px', displayMember: "StageName", valueMember: "Stage_id"}));
        $("#cmbStageEdit").jqxComboBox('val', Action.ActionStage_id);
        $("#cmbContactTypeEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataContactTypes, width: '200', height: '25px', displayMember: "ContactName", valueMember: "Contact_id"}));
        $("#cmbContactTypeEdit").jqxComboBox('val', Action.ContactType_id);
        $("#cmbContactInfoEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataContactInfo, width: '240', height: '25px', displayMember: "CName", valueMember: "Info_id"}));
        $("#cmbContactInfoEdit").jqxComboBox('val', Action.ContactInfo_id);
        $("#cmbStatusOPEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: [{id: 1, name: 'Холодный'}, {id: 2, name: 'Теплый'}, {id: 3, name: 'Горячий'}, {id: 4, name: 'Хронический'}], width: '150', height: '25px', displayMember: "name", valueMember: "id"}));
        $("#cmbStatusOPEdit").jqxComboBox('val', Action.StatusOP);
                
        var initWidgets = function(tab) {
            switch (tab) {
                case 0:
                    console.log(MarketingSolutions.Offer1Date);
                    $("#edOfferName1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Бесплатная модернизация'}));
                    $("#cmbOffer1ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer1DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer1Date }));
                    $("#edOffer1Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer1Note}));
                    
                    $("#edOfferName2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Бесплатные месяца обслуживания'}));
                    $("#cmbOffer2ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer2DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer2Date }));
                    $("#edOffer2Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer2Note}));
                    
                    $("#edOfferName3").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Скидка на модернизацию'}));
                    $("#cmbOffer3ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer3DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer3Date }));
                    $("#edOffer3Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer3Note}));
                    
                    $("#edOfferName4").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Скидка на обслуживание'}));
                    $("#cmbOffer4ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer4DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer4Date }));
                    $("#edOffer4Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer4Note}));
                    
                    $("#edOfferName5").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Акция 15% от клиента'}));
                    $("#cmbOffer5ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer5DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer5Date }));
                    $("#edOffer5Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer5Note}));
                    
                    $("#edOfferName6").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Акция система в подарок'}));
                    $("#cmbOffer6ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer6DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer6Date }));
                    $("#edOffer6Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer6Note}));
                    
                    $("#edOfferName7").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Акция год за два'}));
                    $("#cmbOffer7ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer7DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer7Date }));
                    $("#edOffer7Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer7Note}));
                    
                    $("#edOfferName8").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Антиклон'}));
                    $("#cmbOffer8ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer8DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer8Date }));
                    $("#edOffer8Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer8Note}));
                    
                    $("#edOfferName9").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Акция'}));
                    $("#cmbOffer9ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbOffer9DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: MarketingSolutions.Offer9Date }));
                    $("#edOffer9Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: MarketingSolutions.Offer9Note}));
                    
                    $("#cmbOffer1ResultEdit").jqxComboBox('val', MarketingSolutions.Offer1Result_id);
                    $("#cmbOffer2ResultEdit").jqxComboBox('val', MarketingSolutions.Offer2Result_id);
                    $("#cmbOffer3ResultEdit").jqxComboBox('val', MarketingSolutions.Offer3Result_id);
                    $("#cmbOffer4ResultEdit").jqxComboBox('val', MarketingSolutions.Offer4Result_id);
                    $("#cmbOffer5ResultEdit").jqxComboBox('val', MarketingSolutions.Offer5Result_id);
                    $("#cmbOffer6ResultEdit").jqxComboBox('val', MarketingSolutions.Offer6Result_id);
                    $("#cmbOffer7ResultEdit").jqxComboBox('val', MarketingSolutions.Offer7Result_id);
                    $("#cmbOffer8ResultEdit").jqxComboBox('val', MarketingSolutions.Offer8Result_id);
                    $("#cmbOffer9ResultEdit").jqxComboBox('val', MarketingSolutions.Offer9Result_id);
                    
                    $("#edOffer1Note, #cmbOffer1ResultEdit, #cmbOffer1DateEdit,\n\
                        #edOffer2Note, #cmbOffer2ResultEdit, #cmbOffer2DateEdit,\n\
                        #edOffer3Note, #cmbOffer3ResultEdit, #cmbOffer3DateEdit,\n\
                        #edOffer4Note, #cmbOffer4ResultEdit, #cmbOffer4DateEdit,\n\
                        #edOffer5Note, #cmbOffer5ResultEdit, #cmbOffer5DateEdit,\n\
                        #edOffer6Note, #cmbOffer6ResultEdit, #cmbOffer6DateEdit,\n\
                        #edOffer7Note, #cmbOffer7ResultEdit, #cmbOffer7DateEdit,\n\
                        #edOffer8Note, #cmbOffer8ResultEdit, #cmbOffer8DateEdit,\n\
                        #edOffer9Note, #cmbOffer9ResultEdit, #cmbOffer9DateEdit,\n\
                        #chbEconomy, #chbQuality, #chbPrivate, #chbModernization, #chbBeautification").on('change', function() {
                        ChangeTab1 = true;
                    });
                    
                    break;
                case 1:
                    $("#edSystemOfferName1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'ПЗУ'}));
                    $("#cmbSystemOffer1ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer1DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer1Date }));
                    $("#edSystemOffer1Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer1Note}));
                    
                    $("#edSystemOfferName2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'СВН'}));
                    $("#cmbSystemOffer2ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer2DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer2Date }));
                    $("#edSystemOffer2Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer2Note}));
                    
                    $("#edSystemOfferName3").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'АППЗ'}));
                    $("#cmbSystemOffer3ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer3DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer3Date }));
                    $("#edSystemOffer3Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer3Note}));
                    
                    $("#edSystemOfferName4").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'СКД'}));
                    $("#cmbSystemOffer4ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer4DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer4Date }));
                    $("#edSystemOffer4Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer4Note}));
                    
                    $("#edSystemOfferName5").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Венталиция'}));
                    $("#cmbSystemOffer5ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer5DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer5Date }));
                    $("#edSystemOffer5Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer5Note}));
                    
                    $("#edSystemOfferName6").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Естественная вентиляция'}));
                    $("#cmbSystemOffer6ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer6DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer6Date }));
                    $("#edSystemOffer6Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer6Note}));
                    
                    $("#edSystemOfferName7").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'ОДС'}));
                    $("#cmbSystemOffer7ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer7DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer7Date }));
                    $("#edSystemOffer7Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer7Note}));
                    
                    $("#edSystemOfferName8").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'ИТП'}));
                    $("#cmbSystemOffer8ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer8DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer8Date }));
                    $("#edSystemOffer8Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer8Note}));
                    
                    $("#edSystemOfferName9").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'УУТЭ'}));
                    $("#cmbSystemOffer9ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSystemOffer9DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: SystemOffers.Offer9Date }));
                    $("#edSystemOffer9Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: SystemOffers.Offer9Note}));
                    
                    $("#cmbSystemOffer1ResultEdit").jqxComboBox('val', SystemOffers.Offer1Result_id);
                    $("#cmbSystemOffer2ResultEdit").jqxComboBox('val', SystemOffers.Offer2Result_id);
                    $("#cmbSystemOffer3ResultEdit").jqxComboBox('val', SystemOffers.Offer3Result_id);
                    $("#cmbSystemOffer4ResultEdit").jqxComboBox('val', SystemOffers.Offer4Result_id);
                    $("#cmbSystemOffer5ResultEdit").jqxComboBox('val', SystemOffers.Offer5Result_id);
                    $("#cmbSystemOffer6ResultEdit").jqxComboBox('val', SystemOffers.Offer6Result_id);
                    $("#cmbSystemOffer7ResultEdit").jqxComboBox('val', SystemOffers.Offer7Result_id);
                    $("#cmbSystemOffer8ResultEdit").jqxComboBox('val', SystemOffers.Offer8Result_id);
                    $("#cmbSystemOffer9ResultEdit").jqxComboBox('val', SystemOffers.Offer9Result_id);
                    
                    $("#edSystemOffer1Note, #cmbSystemOffer1ResultEdit, #cmbSystemOffer1DateEdit,\n\
                        #edSystemOffer2Note, #cmbSystemOffer2ResultEdit, #cmbSystemOffer2DateEdit,\n\
                        #edSystemOffer3Note, #cmbSystemOffer3ResultEdit, #cmbSystemOffer3DateEdit,\n\
                        #edSystemOffer4Note, #cmbSystemOffer4ResultEdit, #cmbSystemOffer4DateEdit,\n\
                        #edSystemOffer5Note, #cmbSystemOffer5ResultEdit, #cmbSystemOffer5DateEdit,\n\
                        #edSystemOffer6Note, #cmbSystemOffer6ResultEdit, #cmbSystemOffer6DateEdit,\n\
                        #edSystemOffer7Note, #cmbSystemOffer7ResultEdit, #cmbSystemOffer7DateEdit,\n\
                        #edSystemOffer8Note, #cmbSystemOffer8ResultEdit, #cmbSystemOffer8DateEdit,\n\
                        #edSystemOffer9Note, #cmbSystemOffer9ResultEdit, #cmbSystemOffer9DateEdit,\n\
                        #chbEconomy, #chbQuality, #chbPrivate, #chbModernization, #chbBeautification").on('change', function() {
                        ChangeTab2 = true;
                    });
                    
                    break;
                case 2:
                    $("#edSolutionName1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Другой бонус, чем предлагался ранее'}));
                    $("#cmbSolution1ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution1DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution1Date }));
                    $("#edSolution1Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution1Note}));
                    
                    $("#edSolutionName2").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Дополнительный личный выезд'}));
                    $("#cmbSolution2ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution2DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution2Date }));
                    $("#edSolution2Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution2Note}));
                    
                    $("#edSolutionName3").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Звонок руководителя'}));
                    $("#cmbSolution3ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution3DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution3Date }));
                    $("#edSolution3Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution3Note}));
                    
                    $("#edSolutionName4").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Поездка с руководителем'}));
                    $("#cmbSolution4ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution4DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution4Date }));
                    $("#edSolution4Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution4Note}));
                    
                    $("#edSolutionName5").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Повторная поездка с руководителем'}));
                    $("#cmbSolution5ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution5DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution5Date }));
                    $("#edSolution5Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution5Note}));
                    
                    $("#edSolutionName6").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Отправить проект договора на рассмотрение'}));
                    $("#cmbSolution6ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution6DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution6Date }));
                    $("#edSolution6Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution6Note}));
                    
                    $("#edSolutionName7").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Приехать на заседание правления'}));
                    $("#cmbSolution7ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution7DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution7Date }));
                    $("#edSolution7Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution7Note}));
                    
                    $("#edSolutionName8").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Отправить перечень довольных клиентов в округе'}));
                    $("#cmbSolution8ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution8DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution8Date }));
                    $("#edSolution8Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution8Note}));
                    
                    $("#edSolutionName9").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Предложить начать с одной системы или каких-то конкретных работ'}));
                    $("#cmbSolution9ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution9DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution9Date }));
                    $("#edSolution9Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution9Note}));
                    
                    $("#edSolutionName10").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Поездка с ГД'}));
                    $("#cmbSolution10ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution10DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution10Date }));
                    $("#edSolution10Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution10Note}));
                    
                    $("#edSolutionName11").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Повторная поездка с ГД'}));
                    $("#cmbSolution11ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution11DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution11Date }));
                    $("#edSolution11Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution11Note}));
                    
                    $("#edSolutionName12").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Отправка видеобращений руководителей и сотрудников'}));
                    $("#cmbSolution12ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution12DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution12Date }));
                    $("#edSolution12Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution12Note}));
                    
                    $("#edSolutionName13").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Отправка итогов обследований'}));
                    $("#cmbSolution13ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution13DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution13Date }));
                    $("#edSolution13Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution13Note}));
                    
                    $("#edSolutionName14").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'Отправка портфолио отзывов'}));
                    $("#cmbSolution14ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution14DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution14Date }));
                    $("#edSolution14Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution14Note}));
                    
                    $("#edSolutionName15").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: 'ДРУГОЕ'}));
                    $("#cmbSolution15ResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataOfferResults, width: 190, height: '25px', displayMember: "ResultName", valueMember: "rslt_id"}));
                    $("#cmbSolution15DateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: ClientSolutions.Solution15Date }));
                    $("#edSolution15Note").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 230, value: ClientSolutions.Solution15Note}));
                    
                    $("#cmbSolution1ResultEdit").jqxComboBox('val', ClientSolutions.Solution1Result_id);
                    $("#cmbSolution2ResultEdit").jqxComboBox('val', ClientSolutions.Solution2Result_id);
                    $("#cmbSolution3ResultEdit").jqxComboBox('val', ClientSolutions.Solution3Result_id);
                    $("#cmbSolution4ResultEdit").jqxComboBox('val', ClientSolutions.Solution4Result_id);
                    $("#cmbSolution5ResultEdit").jqxComboBox('val', ClientSolutions.Solution5Result_id);
                    $("#cmbSolution6ResultEdit").jqxComboBox('val', ClientSolutions.Solution6Result_id);
                    $("#cmbSolution7ResultEdit").jqxComboBox('val', ClientSolutions.Solution7Result_id);
                    $("#cmbSolution8ResultEdit").jqxComboBox('val', ClientSolutions.Solution8Result_id);
                    $("#cmbSolution9ResultEdit").jqxComboBox('val', ClientSolutions.Solution9Result_id);
                    $("#cmbSolution10ResultEdit").jqxComboBox('val', ClientSolutions.Solution9Result_id);
                    $("#cmbSolution11ResultEdit").jqxComboBox('val', ClientSolutions.Solution9Result_id);
                    $("#cmbSolution12ResultEdit").jqxComboBox('val', ClientSolutions.Solution9Result_id);
                    $("#cmbSolution13ResultEdit").jqxComboBox('val', ClientSolutions.Solution9Result_id);
                    $("#cmbSolution14ResultEdit").jqxComboBox('val', ClientSolutions.Solution9Result_id);
                    $("#cmbSolution15ResultEdit").jqxComboBox('val', ClientSolutions.Solution9Result_id);
                    
                    $("#edSolution1Note, #cmbSolution1ResultEdit, #cmbSolution1DateEdit,\n\
                        #edSolution2Note, #cmbSolution2ResultEdit, #cmbSolution2DateEdit,\n\
                        #edSolution3Note, #cmbSolution3ResultEdit, #cmbSolution3DateEdit,\n\
                        #edSolution4Note, #cmbSolution4ResultEdit, #cmbSolution4DateEdit,\n\
                        #edSolution5Note, #cmbSolution5ResultEdit, #cmbSolution5DateEdit,\n\
                        #edSolution6Note, #cmbSolution6ResultEdit, #cmbSolution6DateEdit,\n\
                        #edSolution7Note, #cmbSolution7ResultEdit, #cmbSolution7DateEdit,\n\
                        #edSolution8Note, #cmbSolution8ResultEdit, #cmbSolution8DateEdit,\n\
                        #edSolution9Note, #cmbSolution9ResultEdit, #cmbSolution9DateEdit,\n\
                        #edSolution10Note, #cmbSolution10ResultEdit, #cmbSolution10DateEdit,\n\
                        #edSolution11Note, #cmbSolution11ResultEdit, #cmbSolution11DateEdit,\n\
                        #edSolution12Note, #cmbSolution12ResultEdit, #cmbSolution12DateEdit,\n\
                        #edSolution13Note, #cmbSolution13ResultEdit, #cmbSolution13DateEdit,\n\
                        #edSolution14Note, #cmbSolution14ResultEdit, #cmbSolution14DateEdit,\n\
                        #edSolution15Note, #cmbSolution15ResultEdit, #cmbSolution15DateEdit").on('change', function() {
                        ChangeTab3 = true;
                    });
                    
                    break;
            };
        };
        
        $('#ActionEditTab').jqxTabs($.extend(true, {}, TabsDefaultSettings, { width: 'calc(100% - 2px)', height: '234px', keyboardNavigation: false, initTabContent: initWidgets}));
        $("#chbEconomy").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25, checked: Boolean(Number(MarketingSolutions.Economy))}));
        $("#chbQuality").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25, checked: Boolean(Number(MarketingSolutions.Quality)) }));
        $("#chbPrivate").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 150, height: 25, checked: Boolean(Number(MarketingSolutions.Private)) }));
        $("#chbModernization").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 150, height: 25, checked: Boolean(Number(MarketingSolutions.Modernization)) }));
        $("#chbBeautification").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 150, height: 25, checked: Boolean(Number(MarketingSolutions.Beautification)) }));
        
        $("#cmbActionOperationEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataActionOperations, width: 235, height: '25px', displayMember: "ActionOperationName", valueMember: "Operation_id", dropDownWidth: 400}));
        $("#cmbActionOperationEdit").jqxComboBox('val', Action.ActionOperation_id);
        $("#cmbActionResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataActionResults, width: 235, height: '25px', displayMember: "ActionResultName", valueMember: "Result_id", dropDownWidth: 600}));
        $("#cmbActionResultEdit").jqxComboBox('val', Action.ActionResult_id);
        $('#edReport').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: 'Комментарии', height: 50, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edNextDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, {width: 130, formatString: 'dd.MM.yyyy', value: Action.NextDate }));
        $("#cmbResponsibleEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataListEmployees, width: 200, height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#cmbResponsibleEdit").jqxComboBox('val', Action.Responsible_id);
        $("#cmbExecutorEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataListEmployees, width: 200, height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edNextAction").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: 'Планируемое действие', width: 400, value: Action.NextAction}));
        $("#cmbNextContactInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: DataContactInfo, dropDownVerticalAlignment: 'top', width: '240', height: '25px', displayMember: "CName", valueMember: "Info_id"}));
        $("#cmbNextContactInfo").jqxComboBox('val', Action.NextContactInfo);
        $("#chbReserv").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 100, height: 25 }));
        
        $('#btnSaveAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 130, height: 30 }));
        $('#btnCancelAction').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 130, height: 30 }));
        $('#btnCancelAction').on('click', function() {
            if ($('#ActionsDialog').length>0)
                $('#ActionsDialog').jqxWindow('close');
            if ($('#EditFormDialog').length>0)
                $('#EditFormDialog').jqxWindow('close');
            if ($('#CostCalculationsDialog').length>0)
                $('#CostCalculationsDialog').jqxWindow('close');
        });
        
        
        $('#btnSaveAction').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Update')); ?>;
            if (StateInsert) {
                Url = <?php echo json_encode(Yii::app()->createUrl('ExecutorReports/Insert')); ?>;
            }
            var Data = {};
            if (ChangeTab1) {
                Data = {
                        MarketingSolutions: {
                            Form_id: Action.Form_id,
                            Action_id: Action.Exrp_id,
                            Offer1Result_id: $("#cmbOffer1ResultEdit").val(),
                            Offer1Date: $("#cmbOffer1DateEdit").val(),
                            Offer1Note: $("#edOffer1Note").val(),
                            Offer2Result_id: $("#cmbOffer2ResultEdit").val(),
                            Offer2Date: $("#cmbOffer2DateEdit").val(),
                            Offer2Note: $("#edOffer2Note").val(),
                            Offer3Result_id: $("#cmbOffer3ResultEdit").val(),
                            Offer3Date: $("#cmbOffer3DateEdit").val(),
                            Offer3Note: $("#edOffer3Note").val(),
                            Offer4Result_id: $("#cmbOffer4ResultEdit").val(),
                            Offer4Date: $("#cmbOffer4DateEdit").val(),
                            Offer4Note: $("#edOffer4Note").val(),
                            Offer5Result_id: $("#cmbOffer5ResultEdit").val(),
                            Offer5Date: $("#cmbOffer5DateEdit").val(),
                            Offer5Note: $("#edOffer5Note").val(),
                            Offer6Result_id: $("#cmbOffer6ResultEdit").val(),
                            Offer6Date: $("#cmbOffer6DateEdit").val(),
                            Offer6Note: $("#edOffer6Note").val(),
                            Offer7Result_id: $("#cmbOffer7ResultEdit").val(),
                            Offer7Date: $("#cmbOffer7DateEdit").val(),
                            Offer7Note: $("#edOffer7Note").val(),
                            Offer8Result_id: $("#cmbOffer8ResultEdit").val(),
                            Offer8Date: $("#cmbOffer8DateEdit").val(),
                            Offer8Note: $("#edOffer8Note").val(),
                            Offer9Result_id: $("#cmbOffer9ResultEdit").val(),
                            Offer9Date: $("#cmbOffer9DateEdit").val(),
                            Offer9Note: $("#edOffer9Note").val(),
                            Economy: $("#chbEconomy").val(),
                            Quality: $("#chbQuality").val(),
                            Private: $("#chbPrivate").val(),
                            Modernization: $("#chbModernization").val(),
                            Beautification: $("#chbBeautification").val(),
                        }
                };
                
            }
            if (ChangeTab2) {
                Data = $.extend(true, Data, {
                        SystemOffers: {
                            Form_id: Action.Form_id,
                            Action_id: Action.Exrp_id,
                            Offer1Result_id: $("#cmbSystemOffer1ResultEdit").val(),
                            Offer1Date: $("#cmbSystemOffer1DateEdit").val(),
                            Offer1Note: $("#edSystemOffer1Note").val(),
                            Offer2Result_id: $("#cmbSystemOffer2ResultEdit").val(),
                            Offer2Date: $("#cmbSystemOffer2DateEdit").val(),
                            Offer2Note: $("#edSystemOffer2Note").val(),
                            Offer3Result_id: $("#cmbSystemOffer3ResultEdit").val(),
                            Offer3Date: $("#cmbSystemOffer3DateEdit").val(),
                            Offer3Note: $("#edSystemOffer3Note").val(),
                            Offer4Result_id: $("#cmbSystemOffer4ResultEdit").val(),
                            Offer4Date: $("#cmbSystemOffer4DateEdit").val(),
                            Offer4Note: $("#edSystemOffer4Note").val(),
                            Offer5Result_id: $("#cmbSystemOffer5ResultEdit").val(),
                            Offer5Date: $("#cmbSystemOffer5DateEdit").val(),
                            Offer5Note: $("#edSystemOffer5Note").val(),
                            Offer6Result_id: $("#cmbSystemOffer6ResultEdit").val(),
                            Offer6Date: $("#cmbSystemOffer6DateEdit").val(),
                            Offer6Note: $("#edSystemOffer6Note").val(),
                            Offer7Result_id: $("#cmbSystemOffer7ResultEdit").val(),
                            Offer7Date: $("#cmbSystemOffer7DateEdit").val(),
                            Offer7Note: $("#edSystemOffer7Note").val(),
                            Offer8Result_id: $("#cmbSystemOffer8ResultEdit").val(),
                            Offer8Date: $("#cmbSystemOffer8DateEdit").val(),
                            Offer8Note: $("#edSystemOffer8Note").val(),
                            Offer9Result_id: $("#cmbSystemOffer9ResultEdit").val(),
                            Offer9Date: $("#cmbSystemOffer9DateEdit").val(),
                            Offer9Note: $("#edSystemOffer9Note").val(),
                        }
                });
                
            }
            if (ChangeTab3) {
                Data = $.extend(true, Data, {
                        ClientSolutions: {
                            Form_id: Action.Form_id,
                            Action_id: Action.Exrp_id,
                            Solution1Result_id: $("#cmbSolution1ResultEdit").val(),
                            Solution1Date: $("#cmbSolution1DateEdit").val(),
                            Solution1Note: $("#edSolution1Note").val(),
                            Solution2Result_id: $("#cmbSolution2ResultEdit").val(),
                            Solution2Date: $("#cmbSolution2DateEdit").val(),
                            Solution2Note: $("#edSolution2Note").val(),
                            Solution3Result_id: $("#cmbSolution3ResultEdit").val(),
                            Solution3Date: $("#cmbSolution3DateEdit").val(),
                            Solution3Note: $("#edSolution3Note").val(),
                            Solution4Result_id: $("#cmbSolution4ResultEdit").val(),
                            Solution4Date: $("#cmbSolution4DateEdit").val(),
                            Solution4Note: $("#edSolution4Note").val(),
                            Solution5Result_id: $("#cmbSolution5ResultEdit").val(),
                            Solution5Date: $("#cmbSolution5DateEdit").val(),
                            Solution5Note: $("#edSolution5Note").val(),
                            Solution6Result_id: $("#cmbSolution6ResultEdit").val(),
                            Solution6Date: $("#cmbSolution6DateEdit").val(),
                            Solution6Note: $("#edSolution6Note").val(),
                            Solution7Result_id: $("#cmbSolution7ResultEdit").val(),
                            Solution7Date: $("#cmbSolution7DateEdit").val(),
                            Solution7Note: $("#edSolution7Note").val(),
                            Solution8Result_id: $("#cmbSolution8ResultEdit").val(),
                            Solution8Date: $("#cmbSolution8DateEdit").val(),
                            Solution8Note: $("#edSolution8Note").val(),
                            Solution9Result_id: $("#cmbSolution9ResultEdit").val(),
                            Solution9Date: $("#cmbSolution9DateEdit").val(),
                            Solution9Note: $("#edSolution9Note").val(),
                            Solution10Result_id: $("#cmbSolution10ResultEdit").val(),
                            Solution10Date: $("#cmbSolution10DateEdit").val(),
                            Solution10Note: $("#edSolution10Note").val(),
                            Solution11Result_id: $("#cmbSolution11ResultEdit").val(),
                            Solution11Date: $("#cmbSolution11DateEdit").val(),
                            Solution11Note: $("#edSolution11Note").val(),
                            Solution12Result_id: $("#cmbSolution12ResultEdit").val(),
                            Solution12Date: $("#cmbSolution12DateEdit").val(),
                            Solution12Note: $("#edSolution12Note").val(),
                            Solution13Result_id: $("#cmbSolution13ResultEdit").val(),
                            Solution13Date: $("#cmbSolution13DateEdit").val(),
                            Solution13Note: $("#edSolution13Note").val(),
                            Solution14Result_id: $("#cmbSolution14ResultEdit").val(),
                            Solution14Date: $("#cmbSolution14DateEdit").val(),
                            Solution14Note: $("#edSolution14Note").val(),
                            Solution15Result_id: $("#cmbSolution15ResultEdit").val(),
                            Solution15Date: $("#cmbSolution15DateEdit").val(),
                            Solution15Note: $("#edSolution15Note").val(),
                        }
                });
                
            }
            var Temp = $.param(Data);
            Temp += '&' + $('#ClientActions').serialize();
            
            $.ajax({
                url: Url,
                data: Temp,
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($('#CostCalculationsDialog').length>0) {
                            Aliton.SelectRowById('Exrp_id', Res.id, '#ProgressGrid', true);
                            $('#CostCalculationsDialog').jqxWindow('close');
                            
                        }
                        
                        if ($('#ActionsDialog').length>0) {
                            if ($('#CostCalculationsDialog').length>0) {
                                $('#ActionsDialog').jqxWindow('close');
                            } else {
                                if ($('#ProgGrid').length>0)
                                    Aliton.SelectRowById('Exrp_id', Res.id, '#ProgGrid', true);
                                $('#ActionsDialog').jqxWindow('close');
                            }
                            
                        }
                        
                        if ($('#DiaryDialog').length>0) {
                            $('#DiaryDialog').jqxWindow('close');
                        }
                        
                        if ($('#EditFormDialog').length>0) {
                            if (typeof(RC) != 'undefined')
                                RC.Action_id = Res.id;
                            $('#edFiltering').click();
                            $('#EditFormDialog').jqxWindow('close');
                        }
                    }
                    else {
                        if ($('#ActionsDialog').length>0) 
                            $('#BodyActionsDialog').html(Res.html);
                        if ($('#EditFormDialog').length>0) 
                            $('#BodyEditFormDialog').html(Res.html);
                        if ($('#CostCalculationsDialog').length>0) 
                            $('#BodyCostCalculationsDialog').html(Res.html);
                        if ($('#DiaryDialog').length>0) 
                            $('#BodyDiaryDialog').html(Res.html);
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
        <div style="text-align: center">Этап*</div>
        <div><div id="cmbStageEdit" name="ClientActions[ActionStage_id]"></div><?php echo $form->error($model, 'ActionStage_id'); ?></div>
    </div>
    <div class="al-row-column">
        <div style="text-align: center">Тип контакта*</div>
        <div><div id="cmbContactTypeEdit" name="ClientActions[ContactType_id]"></div><?php echo $form->error($model, 'ContactType_id'); ?></div>
    </div>
    <div class="al-row-column">
        <div style="text-align: center">Контактное лицо*</div>
        <div><div id="cmbContactInfoEdit" name="ClientActions[ContactInfo_id]"></div><?php echo $form->error($model, 'ContactInfo_id'); ?></div>
    </div>
    <div class="al-row-column">
        <div style="text-align: center">Статус ОП*</div>
        <div><div id="cmbStatusOPEdit" name="ClientActions[StatusOP]"></div><?php echo $form->error($model, 'StatusOP'); ?></div>
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
            <li style="">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Предложения</div>

                </div>
            </li>
            <li style="">
                <div style="height: 15px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Меры по доведению клиента до договора на обслуживание</div>

                </div>
            </li>
        </ul>
        <div style="overflow: hidden; padding: 10px; overflow-y: visible;">
            <div style="height: 300px">
                <div class="al-row" style="padding: 0px 0px 0px 0px">
                    <div class="al-row-column" style="width: 238px">Предложения</div>
                    <div class="al-row-column" style="width: 192px">Результат</div>
                    <div class="al-row-column" style="width: 132px">Дата предложения</div>
                    <div class="al-row-column" style="width: 238px">Комментарии</div>
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
        <div style="overflow: hidden; padding: 10px; overflow-y: visible;">
            <div style="height: 300px">
                <div class="al-row" style="padding: 0px 0px 0px 0px">
                    <div class="al-row-column" style="width: 238px">Предложения</div>
                    <div class="al-row-column" style="width: 192px">Результат</div>
                    <div class="al-row-column" style="width: 132px">Дата предложения</div>
                    <div class="al-row-column" style="width: 238px">Комментарии</div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName1" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer1ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer1DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer1Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName2" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer2ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer2DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer2Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName3" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer3ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer3DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer3Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName4" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer4ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer4DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer4Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName5" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer5ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer5DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer5Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName6" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer6ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer6DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer6Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName7" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer7ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer7DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer7Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName8" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer8ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer8DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer8Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSystemOfferName9" /></div>
                    <div class="al-row-column"><div id="cmbSystemOffer9ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSystemOffer9DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSystemOffer9Note" /></div>
                    <div style="clear: both"></div>
                </div>
            </div>
        </div>
        <div style="overflow: hidden; padding: 10px; overflow-y: visible;">
            <div style="height: 500px">
                <div class="al-row" style="padding: 0px 0px 0px 0px">
                    <div class="al-row-column" style="width: 238px">Предложения</div>
                    <div class="al-row-column" style="width: 192px">Результат</div>
                    <div class="al-row-column" style="width: 132px">Дата предложения</div>
                    <div class="al-row-column" style="width: 238px">Комментарии</div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName1" /></div>
                    <div class="al-row-column"><div id="cmbSolution1ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution1DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution1Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName2" /></div>
                    <div class="al-row-column"><div id="cmbSolution2ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution2DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution2Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName3" /></div>
                    <div class="al-row-column"><div id="cmbSolution3ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution3DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution3Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName4" /></div>
                    <div class="al-row-column"><div id="cmbSolution4ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution4DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution4Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName5" /></div>
                    <div class="al-row-column"><div id="cmbSolution5ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution5DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution5Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName6" /></div>
                    <div class="al-row-column"><div id="cmbSolution6ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution6DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution6Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName7" /></div>
                    <div class="al-row-column"><div id="cmbSolution7ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution7DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution7Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName8" /></div>
                    <div class="al-row-column"><div id="cmbSolution8ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution8DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution8Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName9" /></div>
                    <div class="al-row-column"><div id="cmbSolution9ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution9DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution9Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName10" /></div>
                    <div class="al-row-column"><div id="cmbSolution10ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution10DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution10Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName11" /></div>
                    <div class="al-row-column"><div id="cmbSolution11ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution11DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution11Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName12" /></div>
                    <div class="al-row-column"><div id="cmbSolution12ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution12DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution12Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName13" /></div>
                    <div class="al-row-column"><div id="cmbSolution13ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution13DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution13Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName14" /></div>
                    <div class="al-row-column"><div id="cmbSolution14ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution14DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution14Note" /></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row" style="padding: 0px 0px 2px 0px">
                    <div class="al-row-column"><input type="text" id="edSolutionName15" /></div>
                    <div class="al-row-column"><div id="cmbSolution15ResultEdit"></div></div>
                    <div class="al-row-column"><div id="cmbSolution15DateEdit"></div></div>
                    <div class="al-row-column"><input type="text" id="edSolution15Note" /></div>
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
    <div class="al-row-column">Действие*</div>
    <div class="al-row-column"><div id="cmbActionOperationEdit" name="ClientActions[ActionOperation_id]"></div><?php echo $form->error($model, 'ActionOperation_id'); ?></div>
    <div class="al-row-column">Результат*</div>
    <div class="al-row-column"><div id="cmbActionResultEdit" name="ClientActions[ActionResult_id]"></div><?php echo $form->error($model, 'ActionResult_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div><textarea id="edReport" name="ClientActions[Report]"><?php echo $model->Report; ?></textarea><?php echo $form->error($model, 'Report'); ?></div>
</div>
<div class="al-row">
    <div class="al-row-column">Дата план. действия*</div>
    <div class="al-row-column"><div id="edNextDateEdit" name="ClientActions[NextDate]"></div><?php echo $form->error($model, 'NextDate'); ?></div>
    <div class="al-row-column">Ответ.*</div>
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
        <div id="chbReserv" name="ClientActions[InReserv]">В РЕЗЕРВ</div>
    </div>
    <div style="clear: both"></div>
</div>


<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnSaveAction" value="Сохранить"/></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnCancelAction" value="Отмена"/></div>
    <div style="clear: both"></div>
</div>

<?php $this->endWidget(); ?>