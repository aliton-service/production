<script type="text/javascript">
    
    $(document).ready(function () {
        
        var Demand = {
            PropForm_id: '<?php echo $model->PropForm_id; ?>',
            Region: '<?php echo $model->Region_id; ?>',
            Area: '<?php echo $model->Area_id; ?>',
            Street: <?php echo $model->Street_id; ?>,
            House: '<?php echo $model->House; ?>',
            Corp: '<?php echo $model->Corp; ?>',
            Room: '<?php echo $model->Room; ?>',
            Apartment: '<?php echo $model->Apartment; ?>',
            DoorwayList: '<?php echo $model->DoorwayList; ?>',
            Journal: '<?php echo $model->Journal; ?>',
            year_construction: '<?php echo $model->year_construction; ?>',
            CountPorch: '<?php echo $model->CountPorch; ?>',
            Floor: '<?php echo $model->Floor; ?>',
            ClientGroup: '<?php echo $model->clgr_id; ?>',
            ClientName: '<?php echo $model->ClientName; ?>',
            Telephone: '<?php echo $model->Telephone; ?>',
            PostalAddress: <?php echo json_encode($model->PostalAddress); ?>,
            no_sms: '<?php echo $model->no_sms; ?>',
            AreaSize: '<?php echo $model->AreaSize; ?>',
            Refusers: <?php echo json_encode($model->Refusers); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            Information: <?php echo json_encode($model->Information); ?>,
            Slmg_id: '<?php echo $model->Slmg_id; ?>',
            Srmg_id: '<?php echo $model->Srmg_id; ?>',
            Inmg_id: '<?php echo $model->Inmg_id; ?>',
        };

        
        var DataRegion = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListRegionsMin, {}));
        var DataArea = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceAreas, {}));
        var DataStreet = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListStreetsMin, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["rg.Region_id = " + Demand.Region],
                });
                return data;
            },
        });
        var DataClientGroup = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientGroup, {}));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
        var DataOrg = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOrganizationsVMin, {}));
        
        $("#FullName").on('bindingComplete', function (event) {
            if (Demand.PropForm_id !== '') $("#FullName").jqxComboBox('val', Demand.PropForm_id);
            $("#SaveNewObjectsGroup").jqxButton({disabled: false});
        });
        $("#FullName").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataOrg, width: 300, displayMember: "FullName", valueMember: "Form_id" }));
      
        
        $("#JAddress").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 365 }));
        $("#FAddress").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#bank_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 350 }));
        $("#bik").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
        $("#inn").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 160 }));
        $("#account").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        $("#cor_account").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
        
        $("#Region").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataRegion, width: 220, displayMember: "RegionName", valueMember: "Region_id" }));
        $("#Area").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataArea, width: 150, displayMember: "AreaName", valueMember: "Area_id" }));
        $("#Street").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStreet, width: 240, displayMember: "StreetName", valueMember: "Street_id" }));
        
        $("#House").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 40 }));
        $("#Corp").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 60 }));
        $("#Room").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
        
        $("#Apartment").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 110 }));
        $("#CountPorch").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 130 }));
        $("#Floor").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#year_construction").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 100 }));
        $("#ClientGroup").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataClientGroup, width: 160, displayMember: "ClientGroup", valueMember: "clgr_id" }));
        $("#DoorwayList").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 830 }));
        $("#Journal").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '110px', formatString: 'dd.MM.yyyy' }));
        $("#AreaSize").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '120px', height: '25px', inputMode: 'simple'}));
        $("#ClientName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 320 }));
        $("#Telephone").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 383 }));
        $("#PostalAddress").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 385 }));
        $("#no_sms").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        
        $("#Information").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 915 }));
        $("#Refusers").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 450 }));
        $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 450 }));
        DataEmployees.dataBind();
        $("#Slmg_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees.records, width: 290, displayMember: "ShortName", valueMember: "Employee_id" }));
        $("#Srmg_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees.records, width: 290, displayMember: "ShortName", valueMember: "Employee_id" }));
        $("#Inmg_id").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees.records, width: 290, displayMember: "ShortName", valueMember: "Employee_id" }));
        
        var find = function(id) {
            for (var i = 0; i < DataOrg.records.length; i++) {
                if (DataOrg.records[i].Form_id == id) {
//                    console.log(DataOrg.records[i]);
                    return DataOrg.records[i];
                }
            }
            return null;
        };
        
        $("#FullName").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
                var res = find(item.value);
                $("#JAddress").jqxInput('val', res.JAddress);
                $("#FAddress").jqxInput('val', res.FAddress);
                $("#bank_name").jqxInput('val', res.bank_name);
                $("#bik").jqxInput('val', res.bik);
                $("#inn").jqxInput('val', res.inn);
                $("#account").jqxInput('val', res.account);
                $("#cor_account").jqxInput('val', res.cor_account);
            } 
        });
        
        $("#Region").on('change', function(event){
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
                $("#Street").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: NewDataStreet, width: 240, displayMember: "StreetName", valueMember: "Street_id" }));
                if(itemId != Demand.Region) {
                    $("#Area").jqxComboBox('val', '');
                    $("#Street").jqxComboBox('val', '');
                } else {
                    $("#Area").jqxComboBox('val', Demand.Area);
                    $("#Street").jqxComboBox('val', Demand.Street);
                }
            }
            if ($("#Street").val() == '') {
                $("#errorStreet").html('Регион изменился, измените улицу и дом.');
            }
        });
        $("#Street").on('change', function(event){
            if ($("#Street").val() != '') {
                $("#errorStreet").html('');
            }
        });
        
        if (Demand.Region !== '') $("#Region").jqxComboBox('val', Demand.Region);
        if (Demand.Area !== '') $("#Area").jqxComboBox('val', Demand.Area);
        if (Demand.Street !== '') $("#Street").jqxComboBox('val', Demand.Street);
        if (Demand.House !== '') $("#House").jqxInput('val', Demand.House);
        if (Demand.Corp !== '') $("#Corp").jqxInput('val', Demand.Corp);
        if (Demand.Room !== '') $("#Room").jqxInput('val', Demand.Room);
        if (Demand.Apartment !== '') $("#Apartment").jqxInput('val', Demand.Apartment);
        if (Demand.DoorwayList !== '') $("#DoorwayList").jqxInput('val', Demand.DoorwayList);
        if (Demand.Journal !== '') $("#Journal").jqxDateTimeInput('val', Demand.Journal);
        if (Demand.year_construction !== '') $("#year_construction").jqxInput('val', Demand.year_construction);
        if (Demand.CountPorch !== '') $("#CountPorch").jqxInput('val', Demand.CountPorch);
        if (Demand.Floor !== '') $("#Floor").jqxInput('val', Demand.Floor);
        if (Demand.ClientGroup !== '') $("#ClientGroup").jqxComboBox('val', Demand.ClientGroup);
        if (Demand.AreaSize !== '') $("#AreaSize").jqxNumberInput('val', Demand.AreaSize);
        if (Demand.ClientName !== '') $("#ClientName").jqxInput('val', Demand.ClientName);
        if (Demand.Telephone !== '') $("#Telephone").jqxInput('val', Demand.Telephone);
        if (Demand.PostalAddress !== '') $("#PostalAddress").jqxInput('val', Demand.PostalAddress);
        if (Demand.no_sms !== '') $("#no_sms").jqxCheckBox('val', Demand.no_sms);
        
        if (Demand.Refusers !== '') $("#Refusers").jqxTextArea('val', Demand.Refusers);
        if (Demand.Note !== '') $("#Note").jqxTextArea('val', Demand.Note);
        if (Demand.Information !== '') $("#Information").jqxTextArea('val', Demand.Information);
        
        if (Demand.Slmg_id !== '') $("#Slmg_id").jqxComboBox('val', Demand.Slmg_id);
        if (Demand.Srmg_id !== '') $("#Srmg_id").jqxComboBox('val', Demand.Srmg_id);
        if (Demand.Inmg_id !== '') $("#Inmg_id").jqxComboBox('val', Demand.Inmg_id);
        
        $("#SaveNewObjectsGroup").jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: true}));
        $("#SaveNewObjectsGroup").on('click', function ()
        {
            $('#ObjectsGroup').submit();
        });
        
    });   
</script>

<?php
    $this->breadcrumbs=array(
        'Список объектов'=>array('/object/index'),
        'Редактирование карточки объекта: ' . $model->Address,
    );
?>

<?php

    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'ObjectsGroup',
        'htmlOptions'=>array(
            'class'=>'form-inline',
        ),
     )); 

?>
<div style="margin: 0; background-color: #F2F2F2;">
    <div class="row" style="margin: 0; padding-bottom: 5px; width: 950px; border: 1px solid #ddd;">
        <h2 style="font-size: 1em; margin: 0 10px 0 5px;">Клиент</h2>

        <div class="row">
            <div class="row-column">Наименование:</div>
            <div class="row-column"><div id="FullName" name="ObjectsGroup[PropForm_id]"></div><?php echo $form->error($model, 'FullName'); ?></div>
        </div>

        <div class="row">
            <div class="row-column">ЮР.АДРЕС: <input type="text" id="JAddress"></div>
            <div class="row-column">ИНН: <input type="text" id="inn"></div>
        </div>
        
        <div class="row">
            <div class="row-column">ФАКТ.АДРЕС: <input type="text" id="FAddress"></div>
            <div class="row-column">Р/СЧ: <input type="text" id="account"></div>
        </div>
        
        <div class="row">
            <div class="row-column">БАНК: <input type="text" id="bank_name"></div>
            <div class="row-column">БИК: <input type="text" id="bik"></div>
            <div class="row-column">КОР/СЧ: <input type="text" id="cor_account"></div>
        </div>
    </div>

    <div class="row" style="padding-bottom: 5px; width: 950px; border: 1px solid #ddd;">
        <h2 style="display: inline-block; float: left; font-size: 1em; margin: 0 10px 0 5px;">Адрес проведения работ</h2> 
        <span id="errorStreet" style="margin-left: 150px; color: red; font-weight: bold;"></span>
        
        <div class="row">
            <div class="row-column">Регион: <div id="Region" name="ObjectsGroup[Region_id]"></div></div>
            <div class="row-column">Район: <div id="Area" name="ObjectsGroup[Area_id]"></div></div>
            <div class="row-column">Улица: <div id="Street" name="ObjectsGroup[Street_id]"></div><?php echo $form->error($model, 'StreetName'); ?></div>

            <div class="row-column">Дом: <br><input type="text" id="House" name="ObjectsGroup[House]"></div>
            <div class="row-column">Корпус: <br><input type="text" id="Corp" name="ObjectsGroup[Corp]"></div>
            <div class="row-column">Помещение: <br><input type="text" id="Room" name="ObjectsGroup[Room]"></div>
        </div>
    </div>
    
    <div class="row" style="padding-bottom: 5px; width: 950px; border: 1px solid #ddd;">
        <div class="row" style="margin-top: 0;">
            <div class="row-column">Кол-во подъездов: <br><input type="text" id="CountPorch" name="ObjectsGroup[CountPorch]"></div>
            <div class="row-column">Кол-во этажей: <br><input type="text" id="Floor" name="ObjectsGroup[Floor]"></div>
            <div class="row-column">Кол-во квартир: <br><input type="text" id="Apartment" name="ObjectsGroup[Apartment]"></div>
            <div class="row-column">Год постройки: <br><input type="text" id="year_construction" name="ObjectsGroup[year_construction]"></div>
            <div class="row-column">Сегмент: <div id="ClientGroup" name="ObjectsGroup[clgr_id]"></div></div>
            <div class="row-column">Журнал: <div id='Journal' name="ObjectsGroup[Journal]" ></div></div>
        </div>
        
        <div class="row" style="margin-top: 0;">
            <div class="row-column">Подъезды: <input readonly type="text" id="DoorwayList"></div>
        </div>
    </div>
    
    <div class="row" style="padding-bottom: 5px; width: 950px; border: 1px solid #ddd;">
        <div class="row" style="margin-top: 0;">
            <div class="row-column">Контактное лицо: <input readonly type="text" id="ClientName"></div>
            <div class="row-column">Телефон: <input readonly type="text" id="Telephone"></div>
        </div>
    </div>
    
    <div class="row" style="padding-bottom: 5px; width: 950px; border: 1px solid #ddd;">
        <div class="row" style="margin-top: 0;">
            <div class="row-column">Не отправлять смс:</div>
            <div class="row-column"><div id="no_sms" name="ObjectsGroup[no_sms]"></div></div>
            <div class="row-column">Почтовый адрес:</div>    
            <div class="row-column"><input type="text" id="PostalAddress" name="ObjectsGroup[PostalAddress]"></div>
            <div class="row-column">Площадь</div>
            <div class="row-column"><div id='AreaSize' name="ObjectsGroup[AreaSize]"></div></div>
        </div>
    </div>
    
    <div class="row" style="padding-bottom: 5px; width: 950px; border: 1px solid #ddd;">
        <div class="row" style="margin-top: 0;">
            <div class="row-column">Общая информация: <textarea  type="text" id="Information" name="ObjectsGroup[Information]"></textarea></div>
        </div>
        
        <div class="row" style="margin-top: 0;">
            <div class="row-column">Отказники: <textarea  type="text" id="Refusers" name="ObjectsGroup[Refusers]"></textarea></div>
            <div class="row-column">Примечание: <textarea  type="text" id="Note" name="ObjectsGroup[Note]"></textarea></div>
        </div>
    </div>
    
    <div class="row" style="padding-bottom: 5px; width: 950px; border: 1px solid #ddd;">
        <div class="row" style="margin-top: 0;">
            <div class="row-column">Менеджер ОП: <div id="Slmg_id" name="ObjectsGroup[Slmg_id]"></div></div>
            <div class="row-column">Менеджер СЦ: <div id="Srmg_id" name="ObjectsGroup[Srmg_id]"></div></div>
            <div class="row-column">Менеджер Монтажа: <div id="Inmg_id" name="ObjectsGroup[Inmg_id]"></div></div>
        </div>
    </div>
        
    <div class="row" style="clear: both; margin-left: 5px;"><input type="button" value="Сохранить" id='SaveNewObjectsGroup' /></div>
</div>

<?php $this->endWidget(); ?>