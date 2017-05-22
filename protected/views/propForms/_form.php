<script type="text/javascript">
    var Prop = {
        SelectObject = []
    };
    $(document).ready(function () {
        
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Organization = {
            Form_id: <?php echo json_encode($model->Form_id); ?>,
            FormName: <?php echo json_encode($model->FormName); ?>,
            fown_id: <?php echo json_encode($model->fown_id); ?>,
            FownName: <?php echo json_encode($model->FownName); ?>,
            FullName: <?php echo json_encode($model->FullName); ?>,
            Number: <?php echo json_encode($model->Number); ?>,
            lph_id: <?php echo json_encode($model->lph_id); ?>,
            TaxNumber: <?php echo json_encode($model->TaxNumber); ?>,
            SettlementAccount: <?php echo json_encode($model->SettlementAccount); ?>,
            City: <?php echo json_encode($model->City); ?>,
            bank_id: <?php echo json_encode($model->bank_id); ?>,
            inn: <?php echo json_encode($model->inn); ?>,
            account: <?php echo json_encode($model->account); ?>,
            kpp: <?php echo json_encode($model->kpp); ?>,
            jregion: <?php echo json_encode($model->jregion); ?>,
            jarea: <?php echo json_encode($model->jarea); ?>,
            jstreet: <?php echo json_encode($model->jstreet); ?>,
            JStreetSearch: <?php echo json_encode($model->JStreetSearch); ?>,
            jhouse: <?php echo json_encode($model->jhouse); ?>,
            jcorp: <?php echo json_encode($model->jcorp); ?>,
            jroom: <?php echo json_encode($model->jroom); ?>,
            fregion: <?php echo json_encode($model->fregion); ?>,
            farea: <?php echo json_encode($model->farea); ?>,
            fstreet: <?php echo json_encode($model->fstreet); ?>,
            FStreetSearch: <?php echo json_encode($model->FStreetSearch); ?>,
            fhouse: <?php echo json_encode($model->fhouse); ?>,
            fcorp: <?php echo json_encode($model->fcorp); ?>,
            froom: <?php echo json_encode($model->froom); ?>,
            telephone: <?php echo json_encode($model->telephone); ?>,
            bank_name: <?php echo json_encode($model->bank_name); ?>,
            BankSearch: <?php echo json_encode($model->BankSearch); ?>,
            bik: <?php echo json_encode($model->bik); ?>,
            cor_account: <?php echo json_encode($model->cor_account); ?>,
            cityb: <?php echo json_encode($model->cityb); ?>,
            lph_name: <?php echo json_encode($model->lph_name); ?>,
            DEBT: <?php echo json_encode($model->DEBT); ?>,
            sum_price: <?php echo json_encode($model->sum_price); ?>, 
            sum_appz_price: <?php echo json_encode($model->sum_appz_price); ?>,
            JAddress: <?php echo json_encode($model->JAddress); ?>,
            FAddress: <?php echo json_encode($model->FAddress); ?>,
            Status_id: <?php echo json_encode($model->Status_id); ?>,
            Segment_id: <?php echo json_encode($model->Segment_id); ?>,
            SubSegment_id: <?php echo json_encode($model->SubSegment_id); ?>,
            SourceInfo_id: <?php echo json_encode($model->SourceInfo_id); ?>,
            SubSourceInfo_id: <?php echo json_encode($model->SubSourceInfo_id); ?>,
            CountObjects: <?php echo json_encode($model->CountObjects); ?>,
            BrandName: <?php echo json_encode($model->BrandName); ?>,
            WWW: <?php echo json_encode($model->WWW); ?>
        };
        
        $('#Organizations').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var FormsOfOwnershipVDataAdapter;
        var RegionsDataAdapter;
        var AreasDataAdapter;
        var StreetsDataAdapter;
        //var BanksDataAdapter;
        var StatusAdapter;
        var ClientGroupsAdapter;
        var SourceInfoAdapter;
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['FormsOfOwnership', 'Regions', 'Areas', 'ClientStatus', 'ClientGroups', 'SourceInfo']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                FormsOfOwnershipVDataAdapter = Res[0].Data;
                RegionsDataAdapter = Res[1].Data;
                AreasDataAdapter = Res[2].Data;
                //StreetsDataAdapter = Res[3].Data;
                //BanksDataAdapter = Res[4].Data;
                StatusAdapter = Res[3].Data;
                ClientGroupsAdapter = Res[4].Data;
                SourceInfoAdapter = Res[5].Data;
            }
        });
        
        var BanksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceBanks, {async: true}));
        
        $("#edFormNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 300} ));
        $("#edNumberEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150, disabled: true} ));
        $("#edStatusEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: StatusAdapter, width: '250', height: '25px', displayMember: "StatusName", valueMember: "Status_id"}));
        $("#edFownEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: FormsOfOwnershipVDataAdapter, width: '200', height: '25px', displayMember: "name", valueMember: "fown_id"}));
        $("#edLphEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: [{id: 1, name: 'Юридическое лицо'}, {id: 2, name: 'Физическое лицо'}], width: '200', height: '25px', displayMember: "name", valueMember: "id"}));
        $("#edCountObjectsEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {placeHolder: "", width: 100, decimalDigits: 0} ));
        $("#edSegmentEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: ClientGroupsAdapter, width: '200', height: '25px', displayMember: "ClientGroup", valueMember: "clgr_id"}));
        $("#edSubSegmentEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: ClientGroupsAdapter, width: '200', height: '25px', displayMember: "ClientGroup", valueMember: "clgr_id"}));
        $("#edSourceInfoEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: SourceInfoAdapter, width: '200', height: '25px', displayMember: "SourceInfo_name", valueMember: "SourceInfo_id"}));
        $("#edSubSourceInfoEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: SourceInfoAdapter, width: '200', height: '25px', displayMember: "SourceInfo_name", valueMember: "SourceInfo_id"}));
        $("#edInnEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100} ));
        $("#edAccountEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 200} ));
        $("#edKppEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edBrandNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 250} ));
        $("#edWWWEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 250} ));
        $("#edCountObjectsEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edJRegionEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: RegionsDataAdapter, width: '100', height: '25px', displayMember: "RegionName", valueMember: "Region_id"}));
        $("#edJAreaEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: AreasDataAdapter, width: '150', height: '25px', displayMember: "AreaName", valueMember: "Area_id"}));
        
        
        var JStreetsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStreets, {async: false}), { 
            formatData: function (data) {
                    data.NotExecute = '';
                    if (Organization.JStreetSearch == null)
                        Organization.JStreetSearch = '';
                    if (Organization.JStreetSearch.length > 5)
                        Organization.JStreetSearch = Organization.JStreetSearch.substr(0, 4);                    
                    
                    if (Organization.JStreetSearch != '')
                        data.Filters = ["st.StreetName like '" + Organization.JStreetSearch + "%'"];
                    else
                        data.NotExecute = 'NotExecute';
                    
                    return data;
                }
            }
        );
        
        $("#edJStreetEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: JStreetsDataAdapter, width: '150', height: '25px', displayMember: "StreetName", valueMember: "Street_id", remoteAutoComplete: true,
            search: function (searchString) {
                Organization.JStreetSearch = $("#edJStreetEdit").jqxComboBox('searchString');
                JStreetsDataAdapter.dataBind();
            }
        }));
        JStreetsDataAdapter.dataBind();
        $("#edJStreetEdit").val(Organization.jstreet);
        
        $("#edJHouseEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 80} ));
        $("#edJCorpEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 80} ));
        $("#edJRoomEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100} ));
        $("#edFRegionEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: RegionsDataAdapter, width: '100', height: '25px', displayMember: "RegionName", valueMember: "Region_id"}));
        $("#edFAreaEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: AreasDataAdapter, width: '150', height: '25px', displayMember: "AreaName", valueMember: "Area_id"}));
        
        var FStreetsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStreets, {async: false}), { 
            formatData: function (data) {
                    data.NotExecute = '';
                    if (Organization.FStreetSearch == null)
                        Organization.FStreetSearch = '';
                    if (Organization.FStreetSearch.length > 5)
                        Organization.FStreetSearch = Organization.FStreetSearch.substr(0, 4);                    
                    
                    if (Organization.FStreetSearch != '')
                        data.Filters = ["st.StreetName like '" + Organization.FStreetSearch + "%'"];
                    else
                        data.NotExecute = 'NotExecute';
                    
                    return data;
                }
            }
        );

        $("#edFStreetEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: FStreetsDataAdapter, width: '150', height: '25px', displayMember: "StreetName", valueMember: "Street_id", remoteAutoComplete: true,
            search: function (searchString) {
                Organization.FStreetSearch = $("#edFStreetEdit").jqxComboBox('searchString');
                FStreetsDataAdapter.dataBind();
            }
        }));
        
        FStreetsDataAdapter.dataBind();
        $("#edFStreetEdit").val(Organization.fstreet);
        
        
        $("#edFHouseEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 80} ));
        $("#edFCorpEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 80} ));
        $("#edFRoomEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100} ));
        $("#edBankEdit").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                var RowData = Aliton.FindArray(BanksDataAdapter.records, 'Bank_id', value);
                $('#edBankBikEdit').jqxInput('val', RowData['bik']);
                $("#edBankCorAccountEdit").jqxInput('val', RowData['cor_account']);
                
            }
            
        });
        
//        $("#edBankEdit").on('bindingComplete', function() {
//            if (Organization.bank_id != '') $("#edBankEdit").jqxComboBox('val', Organization.bank_id);
//        });
        
        var BanksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceBanks, {async: false}), { 
            formatData: function (data) {
                    data.NotExecute = '';
                    if (Organization.BankSearch == null)
                        Organization.BankSearch = '';
                    if (Organization.BankSearch.length > 5)
                        Organization.BankSearch = Organization.BankSearch.substr(0, 4);                    
                    
                    if (Organization.BankSearch != '')
                        data.Filters = ["b.bank_name like '%" + Organization.BankSearch + "%'"];
                    else
                        data.NotExecute = 'NotExecute';
                    
                    return data;
                }
            }
        );
        
        $("#edBankEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings,{ source: BanksDataAdapter, width: '300px', height: '25px', displayMember: "bank_name", valueMember: "Bank_id", remoteAutoComplete: true,
            search: function (searchString) {
                Organization.BankSearch = $("#edBankEdit").jqxComboBox('searchString');
                BanksDataAdapter.dataBind();
            }
        }));
        
        BanksDataAdapter.dataBind();
        $("#edBankEdit").val(Organization.bank_id);
        
        $("#edBankBikEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edBankCorAccountEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edTelephoneEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 350} ));
        
        $('#btnSaveOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnAttachObjects2').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150}));
        $('#btnCancelOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnAttachObjects2').on('click', function(){
            $("#EditFormHeaderText").html("Привязать объекты к клиенту: " + Organization.FullName);
            $('#FindBanksDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 800, height: 600, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('SalesDepClients/SelectObjects')) ?>,
                type: 'POST',
                data: {
                    Form_id: Organization.Form_id,
                },
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindBanksDialog").html(Res.html);
                    $('#FindBanksDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $('#btnCancelOrganization').on('click', function(){
            if ($('#OrganizationsDialog').length>0)
                $('#OrganizationsDialog').jqxWindow('close');
            if ($('#EditFormDialog').length>0)
                $('#EditFormDialog').jqxWindow('close');
        });
        
        $('#btnSupplierFindBank').on('click', function(){
            $('#FindBanksDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 800, height: 520, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Banks/Find')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindBanksDialog").html(Res.html);
                    $('#FindBanksDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnSupplierFindBank').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnSaveOrganization').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('propForms/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('propForms/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Organizations').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($('#OrganizationsDialog').length>0) {
                            Aliton.SelectRowById('Form_id', Res.id, '#OrganizationsGrid', true);
                            $('#OrganizationsDialog').jqxWindow('close');
                        }
                        if ($('#EditFormDialog').length>0) {
                            //Aliton.SelectRowById('Form_id', Res.id, '#ClientsGrid', true);
                            if (typeof(RC) != 'undefined')
                                RC.Form_id = Res.id;
                            
                            $('#edFiltering').click();
                            $('#EditFormDialog').jqxWindow('close');
                        }
                    }
                    else {
                        if ($('#OrganizationsDialog').length>0)
                            $('#BodyOrganizationsDialog').html(Res.html);
                        if ($('#EditFormDialog').length>0)
                            $('#BodyEditFormDialog').html(Res.html);
                        
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Organization.FormName != '') $("#edFormNameEdit").jqxInput('val', Organization.FormName);
        if (Organization.Number != '') $("#edNumberEdit").jqxInput('val', Organization.Number);
        if (Organization.Status_id != '') $("#edStatusEdit").jqxComboBox('val', Organization.Status_id);
        if (Organization.fown_id != '') $("#edFownEdit").jqxComboBox('val', Organization.fown_id);
        if (Organization.lph_id != '') $("#edLphEdit").jqxComboBox('val', Organization.lph_id);
        if (Organization.CountObjects != '') $("#edCountObjectsEdit").jqxNumberInput('val', Organization.CountObjects);
        if (Organization.Segment_id != '') $("#edSegmentEdit").jqxComboBox('val', Organization.Segment_id);
        if (Organization.SubSegment_id != '') $("#edSubSegmentEdit").jqxComboBox('val', Organization.SubSegment_id);
        if (Organization.SourceInfo_id != '') $("#edSourceInfoEdit").jqxComboBox('val', Organization.SourceInfo_id);
        if (Organization.SubSourceInfo_id != '') $("#edSubSourceInfoEdit").jqxComboBox('val', Organization.SubSourceInfo_id);
        if (Organization.inn != '') $("#edInnEdit").jqxInput('val', Organization.inn);
        if (Organization.account != '') $("#edAccountEdit").jqxInput('val', Organization.account);
        if (Organization.kpp != '') $("#edKppEdit").jqxInput('val', Organization.kpp);
        if (Organization.BrandName != '') $("#edBrandNameEdit").jqxInput('val', Organization.BrandName);
        if (Organization.WWW != '') $("#edWWWEdit").jqxInput('val', Organization.WWW);
        if (Organization.CountObjects != '') $("#edCountObjectsEdit").jqxInput('val', Organization.CountObjects);
        if (Organization.jregion != '') $("#edJRegionEdit").jqxComboBox('val', Organization.jregion);
        if (Organization.jarea != '') $("#edJAreaEdit").jqxComboBox('val', Organization.jarea);
        if (Organization.jstreet != '') $("#edJStreetEdit").jqxComboBox('val', Organization.jstreet);
        if (Organization.jhouse != '') $("#edJHouseEdit").jqxInput('val', Organization.jhouse);
        if (Organization.jcorp != '') $("#edJCorpEdit").jqxInput('val', Organization.jcorp);
        if (Organization.jroom != '') $("#edJRoomEdit").jqxInput('val', Organization.jroom);
        if (Organization.fregion != '') $("#edFRegionEdit").jqxComboBox('val', Organization.fregion);
        if (Organization.farea != '') $("#edFAreaEdit").jqxComboBox('val', Organization.farea);
        if (Organization.fstreet != '') $("#edFStreetEdit").jqxComboBox('val', Organization.fstreet);
        if (Organization.fhouse != '') $("#edFHouseEdit").jqxInput('val', Organization.fhouse);
        if (Organization.fcorp != '') $("#edFCorpEdit").jqxInput('val', Organization.fcorp);
        if (Organization.froom != '') $("#edFRoomEdit").jqxInput('val', Organization.froom);
        if (Organization.telephone != '') $("#edTelephoneEdit").jqxInput('val', Organization.telephone);
        
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Organizations',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="Organizations[Form_id]" value="<?php echo $model->Form_id; ?>"/>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Наименование:</div>
    <div class="al-row-column"><input type="text" name="Organizations[FormName]" autocomplete="off" id="edFormNameEdit"/><?php echo $form->error($model, 'FormName'); ?></div>
    <div class="al-row-column" style="">Номер:</div>
    <div class="al-row-column"><input type="text" name="Organizations[Number]" autocomplete="off" id="edNumberEdit"/><?php echo $form->error($model, 'Number'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Форма собственности:</div>
    <div class="al-row-column"><div name="Organizations[fown_id]" id="edFownEdit"></div><?php echo $form->error($model, 'fown_id'); ?></div>
    <div class="al-row-column" style="">Статус:</div>
    <div class="al-row-column"><div name="Organizations[Status_id]" id="edStatusEdit"></div><?php echo $form->error($model, 'Status_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Тип:</div>
    <div class="al-row-column"><div name="Organizations[lph_id]" id="edLphEdit"></div><?php echo $form->error($model, 'lph_id'); ?></div>
    <div class="al-row-column" style="">Кол-во объектов:</div>
    <div class="al-row-column"><div name="Organizations[CountObjects]" id="edCountObjectsEdit"></div><?php echo $form->error($model, 'CountObjects'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Сегмент:</div>
    <div class="al-row-column"><div name="Organizations[Segment_id]" id="edSegmentEdit"></div><?php echo $form->error($model, 'Segment_id'); ?></div>
    <div class="al-row-column" style="">ПОДСегмент:</div>
    <div class="al-row-column"><div name="Organizations[SubSegment_id]" id="edSubSegmentEdit"></div><?php echo $form->error($model, 'SubSegment_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Источник:</div>
    <div class="al-row-column"><div name="Organizations[SourceInfo_id]" id="edSourceInfoEdit"></div><?php echo $form->error($model, 'SourceInfo_id'); ?></div>
    <div class="al-row-column" style="">ПОДИсточник:</div>
    <div class="al-row-column"><div name="Organizations[SubSourceInfo_id]" id="edSubSourceInfoEdit"></div><?php echo $form->error($model, 'SubSourceInfo_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">ИНН:</div>
    <div class="al-row-column"><input type="text" name="Organizations[inn]" id="edInnEdit" /><?php echo $form->error($model, 'inn'); ?></div>
    <div class="al-row-column" >Р/Счет:</div>
    <div class="al-row-column"><input type="text" name="Organizations[account]" id="edAccountEdit" /><?php echo $form->error($model, 'account'); ?></div>
    <div class="al-row-column" >КПП:</div>
    <div class="al-row-column"><input type="text" name="Organizations[kpp]" id="edKppEdit" /><?php echo $form->error($model, 'kpp'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Бренд:</div>
    <div class="al-row-column"><input type="text" name="Organizations[BrandName]" id="edBrandNameEdit" /><?php echo $form->error($model, 'BrandName'); ?></div>
    <div class="al-row-column" style="">Сайт:</div>
    <div class="al-row-column"><input type="text" name="Organizations[WWW]" id="edWWWEdit" /><?php echo $form->error($model, 'WWW'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row" style="padding: 0px"><b><u>Юридический адрес</u></b></div>
    <div class="al-row-column" style="margin-left: 0px;">
        <div class="al-row" style="padding: 0px">Регион</div>
        <div class="al-row" style="padding: 0px"><div name="Organizations[jregion]" id="edJRegionEdit"></div><?php echo $form->error($model, 'jregion'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Район</div>
        <div class="al-row" style="padding: 0px"><div name="Organizations[jarea]" id="edJAreaEdit"></div><?php echo $form->error($model, 'jarea'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Улица</div>
        <div class="al-row" style="padding: 0px"><div name="Organizations[jstreet]" id="edJStreetEdit"></div><?php echo $form->error($model, 'jstreet'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Дом</div>
        <div class="al-row" style="padding: 0px"><input type="text" name="Organizations[jhouse]" id="edJHouseEdit" /><?php echo $form->error($model, 'jhouse'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Корпус</div>
        <div class="al-row" style="padding: 0px"><input type="text" name="Organizations[jcorp]" id="edJCorpEdit" /><?php echo $form->error($model, 'jcorp'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Помещение</div>
        <div class="al-row" style="padding: 0px"><input type="text" name="Organizations[jroom]" id="edJRoomEdit" /><?php echo $form->error($model, 'jroom'); ?></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row" style="padding: 0px"><b><u>Фактический адрес</u></b></div>
    <div class="al-row-column" style="margin-left: 0px;">
        <div class="al-row" style="padding: 0px">Регион</div>
        <div class="al-row" style="padding: 0px"><div name="Organizations[fregion]" id="edFRegionEdit"></div><?php echo $form->error($model, 'fregion'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Район</div>
        <div class="al-row" style="padding: 0px"><div name="Organizations[farea]" id="edFAreaEdit"></div><?php echo $form->error($model, 'farea'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Улица</div>
        <div class="al-row" style="padding: 0px"><div name="Organizations[fstreet]" id="edFStreetEdit"></div><?php echo $form->error($model, 'fstreet'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Дом</div>
        <div class="al-row" style="padding: 0px"><input type="text" name="Organizations[fhouse]" id="edFHouseEdit" /><?php echo $form->error($model, 'fhouse'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Корпус</div>
        <div class="al-row" style="padding: 0px"><input type="text" name="Organizations[fcorp]" id="edFCorpEdit" /><?php echo $form->error($model, 'fcorp'); ?></div>
    </div>
    <div class="al-row-column">
        <div class="al-row" style="padding: 0px">Помещение</div>
        <div class="al-row" style="padding: 0px"><input type="text" name="Organizations[froom]" id="edFRoomEdit" /><?php echo $form->error($model, 'froom'); ?></div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 80px;">Банк:</div>
    <div class="al-row-column"><div name="Organizations[bank_id]" id="edBankEdit"></div><?php echo $form->error($model, 'bank_id'); ?></div>
    <div class="row-column"><input id="btnSupplierFindBank" type="button" value="Поиск"/></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 80px;">Бик:</div>
    <div class="al-row-column"><input type="text" id="edBankBikEdit" /></div>
    <div class="al-row-column">Кор/Счет:</div>
    <div class="al-row-column"><input type="text" id="edBankCorAccountEdit" /></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 80px;">Телефон:</div>
    <div class="al-row-column"><input type="text" id="edTelephoneEdit" /></div>
    <div style="clear: both"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveOrganization'/></div>
    <div class="row-column"><input type="button" value="Привязать объект" id="btnAttachObjects2" /></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelOrganization'/></div>
</div>
<?php $this->endWidget(); ?>

<div id="FindBanksDialog" style="display: none;">
    <div id="FindBanksDialogHeader">
        <span id="FindBanksHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogFindBanksContent">
        <div style="" id="BodyFindBanksDialog"></div>
    </div>
</div>

