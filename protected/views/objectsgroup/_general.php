<script type="text/javascript">
    
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var ObjectGroup = {
            PropForm_id: <?php echo json_encode($model->PropForm_id); ?>,
            Region: <?php echo json_encode($model->Region_id); ?>,
            Area: <?php echo json_encode($model->Area_id); ?>,
            Street: <?php echo json_encode($model->Street_id); ?>,
            House: <?php echo json_encode($model->House); ?>,
            Corp: <?php echo json_encode($model->Corp); ?>,
            Room: <?php echo json_encode($model->Room); ?>,
            Apartment: <?php echo json_encode($model->Apartment); ?>,
            DoorwayList: <?php echo json_encode($model->Entrance); ?>,
            Journal: Aliton.DateConvertToJs(<?php echo json_encode($model->Journal); ?>),
            YearConstruction: <?php echo json_encode($model->year_construction); ?>,
            CountPorch: <?php echo json_encode($model->CountPorch); ?>,
            Floor: <?php echo json_encode($model->Floor); ?>,
            ClientGroup: <?php echo json_encode($model->clgr_id); ?>,
            ClientName: <?php echo json_encode($model->ClientName); ?>,
            Telephone: <?php echo json_encode($model->Telephone); ?>,
            PostalAddress: <?php echo json_encode($model->PostalAddress); ?>,
            NoSms: Boolean(Number(<?php echo json_encode($model->no_sms); ?>)),
            AreaSize: <?php echo json_encode($model->AreaSize); ?>,
            Refusers: <?php echo json_encode($model->Refusers); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            Information: <?php echo json_encode($model->Information); ?>,
            Slmg_id: <?php echo json_encode($model->Slmg_id); ?>,
            Srmg_id: <?php echo json_encode($model->Srmg_id); ?>,
            Inmg_id: <?php echo json_encode($model->Inmg_id); ?>,
            AreaSize: <?php echo json_encode($model->AreaSize); ?>
        };

        
        
        var DataRegion = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListRegionsMin, {}));
        var DataArea = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAreas, {}));
        var DataStreet = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListStreetsMin, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["rg.Region_id = " + ObjectGroup.Region],
                });
                return data;
            },
        });
        var DataClientGroup = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientGroup, {}));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
        var DataOrg = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOrganizationsVMin, {}));
        
        $("#edFullNameGrEdit").on('bindingComplete', function (event) {
            if (ObjectGroup.PropForm_id !== '') $("#edFullNameGrEdit").jqxComboBox('val', ObjectGroup.PropForm_id);
            $("#SaveNewObjectsGroup").jqxButton({disabled: false});
        });
        $("#edFullNameGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataOrg, width: 340, displayMember: "FullName", valueMember: "Form_id", searchMode: 'contains' }));
      
        
        $("#edJAddressGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 365 }));
        $("#edFAddressGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#edBankNameGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
        $("#edBikGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
        $("#edInnGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 160 }));
        $("#edAccountGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#edCorAccountGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        
        $("#edRegionGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataRegion, width: 110, displayMember: "RegionName", valueMember: "Region_id" }));
        $("#edAreaGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataArea, width: 150, displayMember: "AreaName", valueMember: "Area_id" }));
        $("#edStreetGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { width: 240, placeHolder: "Выберите регион", disabled: true }));
        
        $("#edHouseGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 40 }));
        $("#edCorpGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 60 }));
        $("#edRoomGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
        
        $("#edApartmentGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 110 }));
        $("#edCountPorchGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#edFloorGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#edYearConstructionGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#edClientGroupGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataClientGroup, width: 160, displayMember: "edClientGroupGrEdit", valueMember: "clgr_id" }));
        $("#edDoorwayListGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#edAreaSizeGrEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '120px', height: '25px', inputMode: 'simple'}));
        $("#edJournalGrEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '110px', formatString: 'dd.MM.yyyy' }));
//        $("#AreaSize").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '120px', height: '25px', inputMode: 'simple'}));
        $("#edClientNameGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#edTelephoneGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#edPostalAddressGrEdit").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
        $("#edNoSmsGrEdit").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        
        $("#edInformationGrEdit").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)' }));
        $("#edRefusersGrEdit").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)' }));
        $("#edNoteGrEdit").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 'calc(100% - 2px)' }));
        DataEmployees.dataBind();
        $("#edSlmgGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees.records, width: 150, dropDownVerticalAlignment: 'top', displayMember: "ShortName", valueMember: "Employee_id" }));
        $("#edSrmgGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees.records, width: 150, dropDownVerticalAlignment: 'top', displayMember: "ShortName", valueMember: "Employee_id" }));
        $("#edInmgGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees.records, width: 150, dropDownVerticalAlignment: 'top', displayMember: "ShortName", valueMember: "Employee_id" }));
        
        var find = function(id) {
            for (var i = 0; i < DataOrg.records.length; i++) {
                if (DataOrg.records[i].Form_id == id) {
//                    console.log(DataOrg.records[i]);
                    return DataOrg.records[i];
                }
            }
            return null;
        };
        
        $("#edFullNameGrEdit").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                var res = find(item.value);
                $("#edJAddressGrEdit").jqxInput('val', res.JAddress);
                $("#edFAddressGrEdit").jqxInput('val', res.FAddress);
                $("#edBankNameGrEdit").jqxInput('val', res.bank_name);
                $("#edBikGrEdit").jqxInput('val', res.bik);
                $("#edInnGrEdit").jqxInput('val', res.inn);
                $("#edAccountGrEdit").jqxInput('val', res.account);
                $("#edCorAccountGrEdit").jqxInput('val', res.cor_account);
            } 
        });
        
        $("#edRegionGrEdit").on('change', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var itemId = item.value;
                var NewDataStreet = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListStreetsMin, {}), {
                    formatData: function (data) {
                        $.extend(data, {
                            Filters: ["rg.Region_id = " + itemId],
                        });
                        return data;
                    },
                });
                $("#edStreetGrEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { disabled: false, placeHolder: "", source: NewDataStreet, width: 240, displayMember: "StreetName", valueMember: "Street_id" }));
                if(itemId != ObjectGroup.edRegionGrEdit) {
                    $("#edAreaGrEdit").jqxComboBox('val', '');
                    $("#edStreetGrEdit").jqxComboBox('val', '');
                } else {
                    $("#edAreaGrEdit").jqxComboBox('val', ObjectGroup.edAreaGrEdit);
                    $("#edStreetGrEdit").jqxComboBox('val', ObjectGroup.edStreetGrEdit);
                }
            }
            if ($("#edStreetGrEdit").val() == '') {
                $("#errorStreet").html('Регион изменился, измените улицу и дом.');
            }
        });
        $("#edStreetGrEdit").on('change', function(event){
            if ($("#edStreetGrEdit").val() != '') {
                $("#errorStreet").html('');
            }
        });
        
        if (ObjectGroup.Region !== '') $("#edRegionGrEdit").jqxComboBox('val', ObjectGroup.Region);
        if (ObjectGroup.Area !== '') $("#edAreaGrEdit").jqxComboBox('val', ObjectGroup.Area);
        if (ObjectGroup.Street !== '') $("#edStreetGrEdit").jqxComboBox('val', ObjectGroup.Street);
        if (ObjectGroup.House !== '') $("#edHouseGrEdit").jqxInput('val', ObjectGroup.House);
        if (ObjectGroup.Corp !== '') $("#edCorpGrEdit").jqxInput('val', ObjectGroup.Corp);
        if (ObjectGroup.Room !== '') $("#edRoomGrEdit").jqxInput('val', ObjectGroup.Room);
        if (ObjectGroup.Apartment !== '') $("#edApartmentGrEdit").jqxInput('val', ObjectGroup.Apartment);
        if (ObjectGroup.DoorwayList !== '') $("#edDoorwayListGrEdit").jqxInput('val', ObjectGroup.DoorwayList);
        if (ObjectGroup.Journal !== '') $("#edJournalGrEdit").jqxDateTimeInput('val', ObjectGroup.Journal);
        if (ObjectGroup.YearConstruction !== '') $("#edYearConstructionGrEdit").jqxInput('val', ObjectGroup.YearConstruction);
        if (ObjectGroup.CountPorch !== '') $("#edCountPorchGrEdit").jqxInput('val', ObjectGroup.CountPorch);
        if (ObjectGroup.Floor !== '') $("#edFloorGrEdit").jqxInput('val', ObjectGroup.Floor);
        if (ObjectGroup.ClientGroup !== '') $("#edClientGroupGrEdit").jqxComboBox('val', ObjectGroup.ClientGroup);
        if (ObjectGroup.AreaSize !== '') $("#edAreaSizeGrEdit").jqxNumberInput('val', ObjectGroup.AreaSize);
        if (ObjectGroup.ClientName !== '') $("#edClientNameGrEdit").jqxInput('val', ObjectGroup.ClientName);
        if (ObjectGroup.Telephone !== '') $("#edTelephoneGrEdit").jqxInput('val', ObjectGroup.Telephone);
        if (ObjectGroup.PostalAddress !== '') $("#edPostalAddressGrEdit").jqxInput('val', ObjectGroup.PostalAddress);
        if (ObjectGroup.NoSms !== '') $("#edNoSmsGrEdit").jqxCheckBox('val', ObjectGroup.NoSms);
        
        if (ObjectGroup.Refusers !== '') $("#edRefusersGrEdit").jqxTextArea('val', ObjectGroup.Refusers);
        if (ObjectGroup.Note !== '') $("#edNoteGrEdit").jqxTextArea('val', ObjectGroup.Note);
        if (ObjectGroup.Information !== '') $("#edInformationGrEdit").jqxTextArea('val', ObjectGroup.Information);
        
        if (ObjectGroup.Slmg_id !== '') $("#edSlmgGrEdit").jqxComboBox('val', ObjectGroup.Slmg_id);
        if (ObjectGroup.Srmg_id !== '') $("#edSrmgGrEdit").jqxComboBox('val', ObjectGroup.Srmg_id);
        if (ObjectGroup.Inmg_id !== '') $("#edInmgGrEdit").jqxComboBox('val', ObjectGroup.Inmg_id);
        
        $("#SaveNewObjectsGroup").jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: true}));
        $("#btnCloseObjectsGroupEdit").jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: false}));
        $("#edFindOrg").jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: false}));
        $("#edFindOrg").on('click', function() {
            $('#FindOrgDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 900, height: 750, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PropForms/Find')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindOrgDialog").html(Res.html);
                    $('#FindOrgDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#SaveNewObjectsGroup").on('click', function ()
        {
            var Url = <?php echo json_encode(Yii::app()->createUrl('ObjectsGroup/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('ObjectsGroup/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#ObjectsGroup').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (typeof(OG) != 'undefined')
                            OG.Refresh();
                        if (typeof(CurrentRowObjectsData) != 'undefined') {
                            RefObjects = Res.id;
                            window.open('/index.php?r=Objectsgroup/index&ObjectGr_id=' + Res.id);
                            $("#ReloadObjects").click();
                        }
                            
                        if ($('#ObjectsGroupDialog').length>0)
                            $('#ObjectsGroupDialog').jqxWindow('close');
                        
                    }
                    else {
                        $('#BodyObjectsGroupDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $('#btnCloseObjectsGroupEdit').on('click', function(){
            $('#ObjectsGroupDialog').jqxWindow('close');
        });
        
    });   
</script>

<?php

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ObjectsGroup',
        'htmlOptions'=>array(
            'class'=>'form-inline',
        ),
     )); 
?>
<input type="hidden" name="ObjectsGroup[ObjectGr_id]" value="<?php echo $model->ObjectGr_id; ?>"/>

<div class="al-data">
    <div class="al-row" style="padding: 0px;">
        <div class="al-row" style="padding: 0px;"><b>Клиент</b></div>
        <div class="al-row">
            <div class="al-row-column" style="width: 110px;">Наименование:</div>
            <div class="al-row-column"><div id="edFullNameGrEdit" name="ObjectsGroup[PropForm_id]"></div><?php echo $form->error($model, 'PropForm_id'); ?></div>
            <div class="al-row-column"><input type="button" id="edFindOrg" value="Поиск"/></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 110px;">Юр.адрес:</div>
            <div class="al-row-column"><input readonly type="text" id="edJAddressGrEdit"></div>
            <div class="al-row-column">ИНН:</div>
            <div class="al-row-column"><input readonly type="text" id="edInnGrEdit"></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 110px;">Факт.адрес:</div>
            <div class="al-row-column"><input readonly type="text" id="edFAddressGrEdit"></div>
            <div class="al-row-column">Р/Счет:</div>
            <div class="al-row-column"><input readonly type="text" id="edAccountGrEdit"></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 110px;">Банк:</div>
            <div class="al-row-column"><input readonly type="text" id="edBankNameGrEdit"></div>
            <div class="al-row-column">Бик:</div>
            <div class="al-row-column"><input readonly type="text" id="edBikGrEdit"></div>
            <div class="al-row-column">Кор/Счет:</div>
            <div class="al-row-column"><input readonly type="text" id="edCorAccountGrEdit"></div>
            <div style="clear: both"></div>
        </div>
    </div>
</div>
<div class="al-data">
    <div class="al-row" style="padding: 0px;"><b>Адрес проведения работ</b> <span id="errorStreet" style="margin-left: 150px; color: red; font-weight: bold;"></span></div>
    <div class="al-row">
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Регион:</div>
            <div class="al-row"><div id="edRegionGrEdit" name="ObjectsGroup[Region_id]"></div><?php echo $form->error($model, 'Region_id'); ?></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Район:</div>
            <div class="al-row"><div id="edAreaGrEdit" name="ObjectsGroup[Area_id]"></div></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Улица:</div>
            <div class="al-row"><div id="edStreetGrEdit" name="ObjectsGroup[Street_id]"></div><?php echo $form->error($model, 'Street_id'); ?></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Дом:</div>
            <div class="al-row"><input type="text" id="edHouseGrEdit" name="ObjectsGroup[House]"><?php echo $form->error($model, 'House'); ?></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Корпус:</div>
            <div class="al-row"><input type="text" id="edCorpGrEdit" name="ObjectsGroup[Corp]"></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Помещение:</div>
            <div class="al-row"><input type="text" id="edRoomGrEdit" name="ObjectsGroup[Room]"></div>
        </div>
        <div style="clear: both"></div>
    </div>
        
</div>    
<div class="al-data">
    <div class="al-row">
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Кол-во под.:</div>
            <div class="al-row"><input type="text" id="edCountPorchGrEdit" name="ObjectsGroup[CountPorch]" /></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Кол-во эт.:</div>
            <div class="al-row"><input type="text" id="edFloorGrEdit" name="ObjectsGroup[Floor]" /></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Кол-во квартир:</div>
            <div class="al-row"><input type="text" id="edApartmentGrEdit" name="ObjectsGroup[Apartment]"></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Год постройки:</div>
            <div class="al-row"><input type="text" id="edYearConstructionGrEdit" name="ObjectsGroup[year_construction]"></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Сегмент:</div>
            <div class="al-row"><div id="edClientGroupGrEdit" name="ObjectsGroup[clgr_id]"></div></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Журнал:</div>
            <div class="al-row"><div id='edJournalGrEdit' name="ObjectsGroup[Journal]" ></div></div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">Подъезды:</div>
        <div class="al-row-column"><input type="text" id="edDoorwayListGrEdit" name="ObjectsGroup[Entrance]"></div><?php echo $form->error($model, 'Entrance'); ?></div>
        <div class="al-row-column">Площадь АППЗ:</div>
        <div class="al-row-column"><div id='edAreaSizeGrEdit' name="ObjectsGroup[AreaSize]"></div></div>
        <div style="clear: both"></div>
    </div>
</div>
<div class="al-data">    
    <div class="al-row">
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Контактное лицо:</div>
            <div class="al-row"><input readonly type="text" id="edClientNameGrEdit"></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Телефон:</div>
            <div class="al-row"><input readonly type="text" id="edTelephoneGrEdit"></div>
        </div>
        <div class="al-row-column" >
            <div class="al-row" style="padding: 0px;">Почтовый адрес:</div>
            <div class="al-row"><input type="text" id="edPostalAddressGrEdit" name="ObjectsGroup[PostalAddress]"></div>
        </div>
        <div class="al-row-column" >
            <div class="al-row" style="padding: 0px;">Не отправлять смс:</div>
            <div class="al-row"><div id="edNoSmsGrEdit" name="ObjectsGroup[no_sms]"></div></div>
        </div>
        <div style="clear: both"></div>
    </div>
</div>    
<div class="al-data">    
    <div class="al-row">
        <div class="al-row-column" style="width: 30%">
            <div class="al-row" style="padding: 0px;">Общая информация:</div>
            <div class="al-row"><textarea  type="text" id="edInformationGrEdit" name="ObjectsGroup[Information]"></textarea></div>
        </div>
        <div class="al-row-column" style="width: 30%">
            <div class="al-row" style="padding: 0px;">Отказники:</div>
            <div class="al-row"><textarea  type="text" id="edRefusersGrEdit" name="ObjectsGroup[Refusers]"></textarea></div>
        </div>    
        <div class="al-row-column" style="width: 30%">
            <div class="al-row" style="padding: 0px;">Примечание:</div>
            <div class="al-row"><textarea  type="text" id="edNoteGrEdit" name="ObjectsGroup[Note]"></textarea></div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Менеджер ОП:</div>
            <div class="al-row"><div id="edSlmgGrEdit" name="ObjectsGroup[Slmg_id]"></div></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Менеджер СЦ:</div>
            <div class="al-row"><div id="edSrmgGrEdit" name="ObjectsGroup[Srmg_id]"></div></div>
        </div>
        <div class="al-row-column">
            <div class="al-row" style="padding: 0px;">Менеджер Монтажа:</div>
            <div class="al-row"><div id="edInmgGrEdit" name="ObjectsGroup[Inmg_id]"></div></div>
        </div>
        <div style="clear: both"></div>
    </div>
    <div style="clear: both"></div>
</div>

<?php $this->endWidget(); ?>

<div style="clear: both"></div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Сохранить" id='SaveNewObjectsGroup' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Отмена" id='btnCloseObjectsGroupEdit' /></div>
</div>


<div id="FindOrgDialog" style="display: none;">
    <div id="FindOrgDialogHeader">
        <span id="FindOrgHeaderText">Поиск</span>
    </div>
    <div style="padding: 10px;" id="DialogFindOrgContent">
        <div style="" id="BodyFindOrgDialog"></div>
    </div>
</div>