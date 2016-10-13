<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var Params = {
            Supplier_id: <?php echo json_encode($Supplier_id); ?>,
        };
        var CurrentRowDataAll;
        
        var Data = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc1Source, {
            filter: function () {
                $("#FindTrebGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#FindTrebGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend(jqXHR, settings) {
                DisabledControls();
            },
        }));
        
        var GetNotes = function(Docm_id) {
            var Result = '';
            if (Docm_id != undefined) {
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl('WHDocuments/GetWhNotes'); ?>',
                    type: 'POST',
                    data: {Docm_id: Docm_id},
                    async: false,
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        Result = Res.text;
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage('Ошибка', Res.responseText);
                    }
                });
            }
            return Result;
        };
        var DataSuppliers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceSuppliersListMin, {async: false, url: '/index.php?r=AjaxData/DataJQXSimple&ModelName=SuppliersListMin',}));
        $("#edFindSupplier").jqxComboBox({ source: DataSuppliers, width: '300', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"});
        if (Params.Supplier_id != null) $("#edFindSupplier").jqxComboBox('val', Params.Supplier_id);
        $("#edFindDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: null, formatString: 'dd.MM.yyyy'}));
        $("#edFindDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '130px', value: null, formatString: 'dd.MM.yyyy'}));
        $("#edFindNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100, disabled: false}));
        $('#btnFindRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false}));
        $('#btnFindSelectTreb').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false}));
        $('#btnFindClose').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: false}));
        $("#edFindNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
        
        $('#btnFindSelectTreb').on('click', function(){
            WHDoc2Edit.SelectDoc(CurrentRowDataAll.docm_id);
            $('#FindTrebsDialog').jqxWindow('close');
        });
        $('#btnFindClose').on('click', function(){
            $('#FindTrebsDialog').jqxWindow('close');
        });
        $('#btnFindRefresh').on('click', function(){
            Find();
        });
        
        var Find = function() {
            
            var FindSupplierFilterGroup = new $.jqx.filter();
            if ($("#edFindSupplier").val() != '') {
                var FindFilterSupplier = FindSupplierFilterGroup.createfilter('numericfilter', $("#edFindSupplier").val(), 'EQUAL');
                FindSupplierFilterGroup.addfilter(1, FindFilterSupplier);
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
            
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edFindNumber").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('stringfilter', $("#edFindNumber").val(), 'CONTAINS');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
            
            $('#FindTrebGrid').jqxGrid('removefilter', 'splr_name', false);
            if ($("#edFindSupplier").val() != '') $("#FindTrebGrid").jqxGrid('addfilter', 'splr_name', FindSupplierFilterGroup);
            
            $('#FindTrebGrid').jqxGrid('removefilter', 'date', false);
            if ($("#edFindDateStart").val() != '' || $("#edFindDateEnd").val() != '') $("#FindTrebGrid").jqxGrid('addfilter', 'date', DateFilterGroup);
            
            $('#FindTrebGrid').jqxGrid('removefilter', 'number', false);
            if ($("#edFindNumber").val() != '') $("#FindTrebGrid").jqxGrid('addfilter', 'number', NumberFilterGroup);
            
            $("#FindTrebGrid").jqxGrid({source: Data});
        };
        
        
        var DisabledControls = function() {
            $('#btnFindSelectTreb').jqxButton({disabled: true});
            $('#btnFindRefresh').jqxButton({disabled: true});
            $('#btnFindClose').jqxButton({disabled: true});
        };
                    
        var SetStateButton = function() {
            $('#btnFindSelectTreb').jqxButton({disabled: (CurrentRowDataAll == undefined)});
            $('#btnFindRefresh').jqxButton({disabled: false});
            $('#btnFindClose').jqxButton({disabled: false});
        };
        $("#FindTrebGrid").on("bindingcomplete", function (event) {
            if (CurrentRowDataAll != undefined) 
                Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataAll.docm_id, '#FindTrebGrid', false);
            else
                Aliton.SelectRowByIdVirtual('docm_id', null, '#FindTrebGrid', false);
        });        
        $("#FindTrebGrid").on('rowselect', function (event) {
            CurrentRowDataAll = $('#FindTrebGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowDataAll !== undefined) {
                $("#edFindNote").jqxTextArea('val', GetNotes(CurrentRowDataAll.docm_id));
                var DataDetails = new $.jqx.dataAdapter($.extend(true, {}, Sources.DocmAchsDetailsSource), { async: false,
                    formatData: function (data) {
                                $.extend(data, {
                                    Filters: ["d.Docm_id = " + CurrentRowDataAll.docm_id]
                                });
                                return data;
                            },
                    beforeSend(jqXHR, settings) {
                                //DisabledDetailsControls();
                            },
                });
                $("#FindTrebDetailsGrid").jqxGrid({source: DataDetails});
            }
            else
                $("#edFindNote").jqxTextArea('val', '');
            SetStateButton();
        });
        
        $("#FindTrebDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 200,
                width: '100%',
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesize: 200,
                virtualmode: false,
                columns:
                    [
                        { text: 'Оборудование', datafield: 'EquipName', width: 200 },
                        { text: 'Ед. изм.', datafield: 'NameUnitMeasurement', width: 80 },
                        { text: 'Кол-во', datafield: 'docm_quant', width: 120, cellsformat: 'f2' },
                        { text: 'Факт кол-во', datafield: 'fact_quant', width: 120, cellsformat: 'f2' },
                        { text: 'Цена', datafield: 'price', width: 120, cellsformat: 'f2' },
                        { text: 'Сумма', datafield: 'sum', width: 180, cellsformat: 'f2', aggregates: [{ 'Сумма':
                            function (aggregatedValue, currentValue) {
                                return aggregatedValue + currentValue;
                            }
                          }]
                        },
                        { text: 'Б\\У', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'used', width: 50 },
                        { text: 'В производство', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'ToProduction', width: 100 },
                        { text: 'Серийные номера', datafield: 'SN', width: 150},
                        { text: 'Без прайса', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'no_price_list', width: 100 },
                    ],
                }));
        
        $("#FindTrebGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 280,
                width: '100%',
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesize: 200,
                ready: function() {
                    Find();
                },
                virtualmode: true,
                columns:
                    [
                        { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                        { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                        { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                        { text: 'Поставщик', columngroup: 'Documents', datafield: 'splr_name', width: 200 },
                        { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                        { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 130 },
                    ],
                columngroups: 
                    [
                      { text: 'Накладная', align: 'center', name: 'Documents' },
                      { text: 'Выдано со склада', align: 'center', name: 'Action' },
                    ],
                }));
        
    });
</script>    

<div class="row">
    <div class="row-column">
        <div class="row-column">Поставщик</div>
        <div class="row-column"><div id="edFindSupplier"></div></div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 115px">Дата документа с</div>
            <div class="row-column"><div id="edFindDateStart"></div></div>
        </div>
        <div>
            <div class="row-column" style="width: 115px; text-align: right">по</div>
            <div class="row-column"><div id="edFindDateEnd"></div></div>
        </div>
    </div>
    <div class="row-column">
        <div class="row-column">Номер</div>
        <div class="row-column"><input type="text" id="edFindNumber" /></div>
    </div>
</div>
<div class="row">
    <div id="FindTrebGrid"></div>
</div>
<div class="row">
    <div><div class="row-column">Примечание</div></div>
    <div><textarea id="edFindNote" readonly="readonly"></textarea></div>
</div>
<div class="row">
    <div id="FindTrebDetailsGrid"></div>
</div>    
<div class="row">
    <div class="row-column"><input type="button" value="Выбрать" id="btnFindSelectTreb"></div>
    
    <div class="row-column"><input type="button" value="Обновить" id="btnFindRefresh"></div>
    <div class="row-column" style="float: right"><input type="button" value="Закрыть" id="btnFindClose"></div>
</div>    

    

