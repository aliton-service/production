<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var Params = {
            Demand_id: <?php echo json_encode($Demand_id); ?>,
            Object_id: <?php echo json_encode($Object_id); ?>,
            ObjectGr_id: <?php echo json_encode($ObjectGr_id); ?>,
        };
        var CurrentRowDataAll;
        
        var Data = new $.jqx.dataAdapter($.extend(true, {}, Sources.DemandsSource, {
            filter: function () {
                $("#FindDemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#FindDemandsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend(jqXHR, settings) {
                DisabledControls();
            },
        }));
        
        var DateEnd = new Date();
        var DateStart = new Date();
        DateStart.setMonth(DateEnd.getMonth() - 3);
                
        $("#edFindDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', value: DateStart, formatString: 'dd.MM.yyyy'}));
        $("#edFindDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', value: DateEnd, formatString: 'dd.MM.yyyy'}));
        $("#edFindDemNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100, disabled: false}));
        $("#edFindDemNoExec").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 200, checked: true}));
        $("#edFindObjectGrDem").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 240, checked: false}));
        $("#chbPeriod").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, {width: 110, groupName: 'group1', checked: true}));
        
        $("#chbPeriodAll").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, {width: 130, groupName: 'group1'}));
        $('#btnFindRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false}));
        $('#btnFindSelectDem').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false}));
        $('#btnFindClose').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false}));
        $("#edFindDemandText").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '99.5%'}));
        
        $("#chbPeriodAll").on('change', function(){
            if ($("#chbPeriodAll").jqxRadioButton('checked'))
                $("#edFindDemNoExec").jqxCheckBox({checked: true, disabled: true});
            else {
                var DateEnd = new Date();
                var DateStart = new Date();
                DateStart.setMonth(DateEnd.getMonth() - 3);
                $("#edFindDemNoExec").jqxCheckBox({checked: true, disabled: false});
                $("#edFindDateStart").jqxDateTimeInput({value: DateStart});
                $("#edFindDateEnd").jqxDateTimeInput({value: DateEnd});
            }
        });
        
        $('#btnFindSelectDem').on('click', function(){
            if ($("#Demand_idCC").length>0)
                $("#Demand_idCC").val(CurrentRowDataAll.Demand_id);
            if ($("#edDemandEdit").length>0)
                $("#edDemandEdit").val(CurrentRowDataAll.Demand_id);
            if (typeof(OfferDemands) != undefined)
                OfferDemands.AddDemand(CurrentRowDataAll.Demand_id);
            
            $('#FindDemandDialog').jqxWindow('close');
        });
        
        $('#btnFindClose').on('click', function(){
            $('#FindDemandDialog').jqxWindow('close');
        });
        
        $('#btnFindRefresh').on('click', function(){
            Find();
        });
        
        var Find = function() {
            
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edFindDemNumber").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('stringfilter', $("#edFindDemNumber").val(), 'CONTAINS');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
            var ExecFilterGroup = new $.jqx.filter();
            if ($("#edFindDemNoExec").jqxCheckBox('checked')) {
                var FilterExec = ExecFilterGroup.createfilter('datefilter', Date(), 'NULL');
                ExecFilterGroup.addfilter(1, FilterExec);
            }
            var ObjectGrFilterGroup = new $.jqx.filter();
            if ($("#edFindObjectGrDem").jqxCheckBox('checked')) {
                var FilterObjectGr = ObjectGrFilterGroup.createfilter('numericfilter', Params.ObjectGr_id, 'EQUAL');
                ObjectGrFilterGroup.addfilter(1, FilterObjectGr);
            }
            var DateFilterGroup = new $.jqx.filter();
            if ($("#edFindDateStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#edFindDateStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#edFindDateEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#edFindDateEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            var ObjectFilterGroup = new $.jqx.filter();
            if (Params.Object_id != 0) {
                var FilterObject = ObjectFilterGroup.createfilter('numericfilter', Repair.Object_id, 'EQUAL');
                ObjectFilterGroup.addfilter(1, FilterObject);
            }
            
            
            $('#FindDemandsGrid').jqxGrid('removefilter', 'Demand_id', false);
            if ($("#edFindDemNumber").val() != '') $("#FindDemandsGrid").jqxGrid('addfilter', 'Demand_id', NumberFilterGroup);
            
            $('#FindDemandsGrid').jqxGrid('removefilter', 'DateExec', false);
            if ($("#edFindDemNoExec").jqxCheckBox('checked')) $("#FindDemandsGrid").jqxGrid('addfilter', 'DateExec', ExecFilterGroup);
            
            $('#FindDemandsGrid').jqxGrid('removefilter', 'ObjectGr_id', false);
            if ($("#edFindObjectGrDem").jqxCheckBox('checked') && Params.ObjectGr_id != 0) {
                $("#FindDemandsGrid").jqxGrid('addfilter', 'ObjectGr_id', ObjectGrFilterGroup);
            }
            $('#FindDemandsGrid').jqxGrid('removefilter', 'DateReg', false);
            if (($("#edFindDateStart").val() != '' || $("#edFindDateEnd").val() != '') && (!$("#chbPeriodAll").jqxRadioButton('checked'))) $("#FindDemandsGrid").jqxGrid('addfilter', 'DateReg', DateFilterGroup);
            
            $('#FindDemandsGrid').jqxGrid('removefilter', 'Object_id', false);
            if (Params.Object_id != 0) $("#FindDemandsGrid").jqxGrid('addfilter', 'Object_id', ObjectFilterGroup);
            
            $("#FindDemandsGrid").jqxGrid({source: Data});
        };
        
        
        var DisabledControls = function() {
            $('#btnFindSelectDem').jqxButton({disabled: true});
            $('#btnFindRefresh').jqxButton({disabled: true});
            $('#btnFindClose').jqxButton({disabled: true});
        };
                    
        var SetStateButton = function() {
            $('#btnFindSelectDem').jqxButton({disabled: (CurrentRowDataAll == undefined)});
            $('#btnFindRefresh').jqxButton({disabled: false});
            $('#btnFindClose').jqxButton({disabled: false});
        };
        $("#FindDemandsGrid").on("bindingcomplete", function (event) {
            if (CurrentRowDataAll != undefined) 
                Aliton.SelectRowByIdVirtual('Demand_id', CurrentRowDataAll.docm_id, '#FindDemandsGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Demand_id', null, '#FindDemandsGrid', false);
        });        
        
        $("#FindDemandsGrid").on('rowselect', function (event) {
            CurrentRowDataAll = $('#FindDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowDataAll !== undefined) {
                $("#edFindDemandText").jqxTextArea('val', CurrentRowDataAll.DemandText);
            }
            else
                $("#edFindDemandText").jqxTextArea('val', '');
            SetStateButton();
        });
        
        $("#FindDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 280,
                width: '99.5%',
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesize: 200,
                ready: function() {
                    Find();
                },
                virtualmode: true,
                columns:
                    [
                        { text: 'Номер', columngroup: 'Documents', datafield: 'Demand_id', width: 120 },
                        { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'DateReg', cellsformat: 'dd.MM.yyyy', width: 100 },
                        { text: 'Дата выполнения', columngroup: 'Documents', filtertype: 'date', datafield: 'DateExec', cellsformat: 'dd.MM.yyyy ', width: 120 },
                        { text: 'Мастер', columngroup: 'Documents', datafield: 'MasterName', width: 120 },
                        { text: 'Тип заявки', columngroup: 'Documents', datafield: 'DemandType', width: 150 },
                        { text: 'Неисправность', columngroup: 'Documents', datafield: 'Malfunction', width: 150 },
                        { text: 'Объект', columngroup: 'Documents', datafield: 'Object_id', width: 150, hidden: true },
                        { text: 'ObjectGr_id', columngroup: 'Documents', datafield: 'ObjectGr_id', width: 150, hidden: true },
                    ],
                
                }));
        
    });
</script>    

<div class="row" style="margin: 0;">
    <div class="row-column">
        <div>
            <div class="row-column">Номер заявки</div>
            <div class="row-column"><input type="text" id="edFindDemNumber" /></div>
        </div>
        <div>
            <div class="row-column"><div id="edFindDemNoExec">Невыполненные заявки</div></div>
        </div>
    </div>
    <div class="row-column" style="float: right">
        <div id="edFindObjectGrDem">Только по этому адресу</div>
        <div style="height: 35px; margin-top: 2px; padding: 4px 4px 0; border: 1px solid #ccc; border-radius: 2px;">
            <div class="row-column"><div id="chbPeriod">За период с</div></div>
            <div class="row-column"><div id="edFindDateStart"></div></div>
            <div class="row-column">по</div>
            <div class="row-column"><div id="edFindDateEnd"></div></div>
            <div class="row-column" style="margin-left: 15px;"><div id="chbPeriodAll">Неограничено</div></div>
        </div>
    </div>
</div>
<div class="row">
    <div id="FindDemandsGrid"></div>
</div>
<div class="row">
    <div><div class="row-column">Неисправность</div></div>
    <div><textarea id="edFindDemandText" readonly="readonly"></textarea></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Выбрать" id="btnFindSelectDem"></div>
    <div class="row-column"><input type="button" value="Обновить" id="btnFindRefresh"></div>
    <div class="row-column" style="float: right"><input type="button" value="Закрыть" id="btnFindClose"></div>
</div>    

    



