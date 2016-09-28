<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataAll;
        
        var DateStart = new Date();
        var DateEnd = new Date();
        DateStart.setMonth(DateStart.getMonth() - 9);
        
        var DataSuppliers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSuppliersMin));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        var DataWHDocumentsAll = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsAllSource, {
                        filter: function () {
                            $("#GridAll").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#GridAll").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend(jqXHR, settings) {
                            DisabledControls();
                        },
                        
                    }));
        var DataWHDocumentsDoc1 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc1Source, {
                        filter: function () {
                            $("#Grid1").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid1").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend(jqXHR, settings) {
                            DisabledControls();
                        },
                        
                    }));
                    
        $("#edNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100} ));
        $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: DateStart}));
        $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: DateEnd}));
        $("#edDateCrStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: null}));
        $("#edDateCrEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: null}));
        $("#edDateAcStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: null}));
        $("#edDateAcEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: null}));
        $("#edSupplier").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSuppliers, width: '270', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"}));
        $("#edAddress").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150} ));
        $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '150', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edControl").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '75'}));
        $("#edAcDateNull").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '75'}));
        $('#btnRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnRefresh').on('click', function(){
            Find();
        });
        
        
        var DisabledControls = function() {
            $('#btnRefresh').jqxButton({disabled: true});
        };
         
        var Find = function() {
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edNumber").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('stringfilter', $("#edNumber").val(), 'CONTAINS');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
        
            var DateFilterGroup = new $.jqx.filter();
            if ($("#edDateStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#edDateStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#edDateEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#edDateEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            
            var DateCrFilterGroup = new $.jqx.filter();
            if ($("#edDateCrStart").val() != '') {
                var FilterDateCrStart = DateCrFilterGroup.createfilter('datefilter', $("#edDateCrStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateCrFilterGroup.addfilter(1, FilterDateCrStart);
            }
            if ($("#edDateCrEnd").val() != '') {
                var FilterDateCrEnd = DateCrFilterGroup.createfilter('datefilter', $("#edDateCrEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateCrFilterGroup.addfilter(1, FilterDateCrEnd);
            }
            
            var DateAcFilterGroup = new $.jqx.filter();
            if ($("#edDateAcStart").val() != '') {
                var FilterDateAcStart = DateAcFilterGroup.createfilter('datefilter', $("#edDateAcStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateAcFilterGroup.addfilter(1, FilterDateAcStart);
            }
            if ($("#edDateAcEnd").val() != '') {
                var FilterDateAcEnd = DateAcFilterGroup.createfilter('datefilter', $("#edDateAcEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateAcFilterGroup.addfilter(1, FilterDateAcEnd);
            }
            if ($("#edSupplier").val() != '') {
                var FilterSupplier = DateAcFilterGroup.createfilter('numericfilter', $("#edSupplier").val(), 'EQUAL');   
            }
            
            
            var TabIndex = $('#edTabs').jqxTabs('selectedItem');
            switch (TabIndex) {
                case 0:
                    /* Фильт номер */
                    $('#GridAll').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#GridAll").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#GridAll').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#GridAll").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#GridAll').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#GridAll").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#GridAll').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#GridAll").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    
                    
                    DisabledControls();
                    $("#GridAll").jqxGrid({source: DataWHDocumentsAll});
                    break;
                case 1:
                    /* Фильт номер */
                    $('#Grid1').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#Grid1").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#Grid1').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#Grid1").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#Grid1').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#Grid1").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#Grid1').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#Grid1").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    
                    
                    DisabledControls();
                    $("#Grid1").jqxGrid({source: DataWHDocumentsDoc1});
                    break;
            };
        };
        
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
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#edNotesAll").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#GridAll").on('rowselect', function (event) {
                        CurrentRowDataAll = $('#GridAll').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataAll != undefined) {
                            
                            $("#edNotesAll").jqxTextArea('val', GetNotes(CurrentRowDataAll.docm_id));
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#GridAll").on("bindingcomplete", function (event) {
                        $("#GridAll").jqxGrid('selectrow', 0);
                    });
                    
                    $("#GridAll").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Обсл.\Мотаж', columngroup: 'Documents', datafield: 'wrtp_gr', width: 130 },
                                    { text: 'Тип документа', columngroup: 'Documents', datafield: 'dctp_name', width: 200 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Операция', columngroup: 'Action', datafield: 'actn_name', width: 150 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'От', columngroup: 'Action', datafield: 'Source', width: 150 },
                                    { text: 'Кому', columngroup: 'Action', datafield: 'Destination', width: 150 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Документ', align: 'center', name: 'Documents' },
                                  { text: 'Движение ТМЦ', align: 'center', name: 'Action' },
                                  
                                ],
                            }));
                    Find();
                break;
                case 1:
                    $("#edNotes1").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid1").on('rowselect', function (event) {
                        CurrentRowDataAll = $('#Grid1').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataAll != undefined) {
                            
                            $("#edNotes1").jqxTextArea('val', GetNotes(CurrentRowDataAll.docm_id));
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#Grid1").on("bindingcomplete", function (event) {
                        $("#Grid1").jqxGrid('selectrow', 0);
                    });
                    
                    $("#Grid1").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Обсл.\Мотаж', columngroup: 'Documents', datafield: 'wrtp_gr', width: 130 },
                                    { text: 'Тип документа', columngroup: 'Documents', datafield: 'dctp_name', width: 200 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'd.date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Операция', columngroup: 'Action', datafield: 'actn_name', width: 150 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'От', columngroup: 'Action', datafield: 'Source', width: 150 },
                                    { text: 'Кому', columngroup: 'Action', datafield: 'Destination', width: 150 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Документ', align: 'center', name: 'Documents' },
                                  { text: 'Движение ТМЦ', align: 'center', name: 'Action' },
                                  
                                ],
                            }));
                    Find();
                break;
            }
        };
                    
        $('#edTabs').jqxTabs({ width: '100%', height: 445, initTabContent: initWidgets});
        
        
    });
</script>    

<?php $this->setPageTitle('Склад - реестр документов'); ?>

<?php
    $this->breadcrumbs=array(
            'Главная'=>array('/Site/index'),
            'Реестр документов'=>array('index'),
    );
?>

<div class="row">
    <div class="row-column">
        <div>
            <div class="row-column">Номер</div>
            <div class="row-column"><input type="text" autocomplete="off" id="edNumber"/></div>
        </div>
        <div>
            <div class="row-column"><div id="edControl">Котроль</div></div>
            <div class="row-column"><div id="edAcDateNull">Не выданные</div></div>
        </div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 40px;">Дата с</div>
            <div class="row-column"><div id="edDateStart"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 4px;">
            <div class="row-column" style="width: 40px;">по</div>
            <div class="row-column"><div id="edDateEnd"></div></div>
        </div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 60px;">Создан с</div>
            <div class="row-column"><div id="edDateCrStart"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 4px;">
            <div class="row-column" style="width: 60px;">по</div>
            <div class="row-column"><div id="edDateCrEnd"></div></div>
        </div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 100px;">Подтвержден с</div>
            <div class="row-column"><div id="edDateAcStart"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 4px;">
            <div class="row-column" style="width: 100px;">по</div>
            <div class="row-column"><div id="edDateAcEnd"></div></div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 0px;">
    <div class="row-column">Поставщик</div>
    <div class="row-column"><div id="edSupplier"></div></div>
    <div class="row-column">Адрес</div>
    <div class="row-column"><input type="text" autocomplete="off" id="edAddress"/></div>
    <div class="row-column">Затребовал</div>
    <div class="row-column"><div id="edMaster"></div></div>
</div>
<div id='edTabs' style="margin-top: 5px;">
    <ul>
        <li style="margin-left: 20px;">
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Все документы</div>
                
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладные на приход</div>
            </div>
        </li>
    </ul>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="GridAll"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotesAll" readonly="readonly"></textarea></div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="Grid1"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotes1" readonly="readonly"></textarea></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Обновить" id='btnRefresh' /></div>
</div>
