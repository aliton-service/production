<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        var Organization = {
            Form_id: <?php echo json_encode($model->Form_id); ?>,
            FormName: <?php echo json_encode($model->FormName); ?>,
            fown_id: <?php echo json_encode($model->fown_id); ?>,
            FownName: <?php echo json_encode($model->FownName); ?>,
            FullName: <?php echo json_encode($model->FullName); ?>,
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
            jhouse: <?php echo json_encode($model->jhouse); ?>,
            jcorp: <?php echo json_encode($model->jcorp); ?>,
            jroom: <?php echo json_encode($model->jroom); ?>,
            fregion: <?php echo json_encode($model->fregion); ?>,
            farea: <?php echo json_encode($model->farea); ?>,
            fstreet: <?php echo json_encode($model->fstreet); ?>,
            fhouse: <?php echo json_encode($model->fhouse); ?>,
            fcorp: <?php echo json_encode($model->fcorp); ?>,
            froom: <?php echo json_encode($model->froom); ?>,
            telephone: <?php echo json_encode($model->telephone); ?>,
            bank_name: <?php echo json_encode($model->bank_name); ?>,
            bik: <?php echo json_encode($model->bik); ?>,
            cor_account: <?php echo json_encode($model->cor_account); ?>,
            cityb: <?php echo json_encode($model->cityb); ?>,
            lph_name: <?php echo json_encode($model->lph_name); ?>,
            DEBT: <?php echo json_encode($model->DEBT); ?>,
            sum_price: <?php echo json_encode($model->sum_price); ?>, 
            sum_appz_price: <?php echo json_encode($model->sum_appz_price); ?>,
            JAddress: <?php echo json_encode($model->JAddress); ?>,
            FAddress: <?php echo json_encode($model->FAddress); ?>
        };
        
        $('#Organizations').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        var FormsOfOwnershipVDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceFormsOfOwnership));
        var RegionsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListRegionsMin));
        RegionsDataAdapter.dataBind();
        RegionsDataAdapter = RegionsDataAdapter.records;
        var AreasDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAreas));
        AreasDataAdapter.dataBind();
        AreasDataAdapter = AreasDataAdapter.records;
        var StreetsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStreets, {async: false}));
        StreetsDataAdapter.dataBind();
        StreetsDataAdapter = StreetsDataAdapter.records;
        var BanksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceBanks, {async: true}));
        
        $("#edFormNameEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 300} ));
        $("#edFownEdit").jqxComboBox({ source: FormsOfOwnershipVDataAdapter, width: '200', height: '25px', displayMember: "name", valueMember: "fown_id"});
        $("#edLphEdit").jqxComboBox({ source: [{id: 1, name: 'Юридическое лицо'}, {id: 2, name: 'Физическое лицо'}], width: '200', height: '25px', displayMember: "name", valueMember: "id"});
        $("#edInnEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100} ));
        $("#edAccountEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 200} ));
        $("#edKppEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edJRegionEdit").jqxComboBox({ source: RegionsDataAdapter, width: '100', height: '25px', displayMember: "RegionName", valueMember: "Region_id"});
        $("#edJAreaEdit").jqxComboBox({ source: AreasDataAdapter, width: '150', height: '25px', displayMember: "AreaName", valueMember: "Area_id"});
        $("#edJStreetEdit").jqxComboBox({ source: StreetsDataAdapter, width: '150', height: '25px', displayMember: "StreetName", valueMember: "Street_id"});
        $("#edJHouseEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 80} ));
        $("#edJCorpEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 80} ));
        $("#edJRoomEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100} ));
        $("#edFRegionEdit").jqxComboBox({ source: RegionsDataAdapter, width: '100', height: '25px', displayMember: "RegionName", valueMember: "Region_id"});
        $("#edFAreaEdit").jqxComboBox({ source: AreasDataAdapter, width: '150', height: '25px', displayMember: "AreaName", valueMember: "Area_id"});
        $("#edFStreetEdit").jqxComboBox({ source: StreetsDataAdapter, width: '150', height: '25px', displayMember: "StreetName", valueMember: "Street_id"});
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
        
        $("#edBankEdit").on('bindingComplete', function() {
            if (Organization.bank_id != '') $("#edBankEdit").jqxComboBox('val', Organization.bank_id);
        });
        $("#edBankEdit").jqxComboBox({ source: BanksDataAdapter, width: '300px', height: '25px', displayMember: "bank_name", valueMember: "Bank_id"});
        $("#edBankBikEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edBankCorAccountEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 150} ));
        $("#edTelephoneEdit").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 350} ));
        
        $('#btnSaveOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnCancelOrganization').on('click', function(){
            $('#OrganizationsDialog').jqxWindow('close');
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
                        Aliton.SelectRowById('Form_id', Res.id, '#OrganizationsGrid', true);
                        $('#OrganizationsDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyOrganizationsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Organization.FormName != '') $("#edFormNameEdit").jqxInput('val', Organization.FormName);
        if (Organization.fown_id != '') $("#edFownEdit").jqxComboBox('val', Organization.fown_id);
        if (Organization.lph_id != '') $("#edLphEdit").jqxComboBox('val', Organization.lph_id);
        if (Organization.inn != '') $("#edInnEdit").jqxInput('val', Organization.inn);
        if (Organization.account != '') $("#edAccountEdit").jqxInput('val', Organization.account);
        if (Organization.kpp != '') $("#edKppEdit").jqxInput('val', Organization.kpp);
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
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Форма собственности:</div>
    <div class="al-row-column"><div name="Organizations[fown_id]" id="edFownEdit"></div><?php echo $form->error($model, 'fown_id'); ?></div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column" style="width: 150px">Тип:</div>
    <div class="al-row-column"><div name="Organizations[lph_id]" id="edLphEdit"></div><?php echo $form->error($model, 'lph_id'); ?></div>
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

