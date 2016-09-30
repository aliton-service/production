<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataAll;
        var CurrentRowDataDoc1;
        var CurrentRowDataDoc2;
        var CurrentRowDataDoc3;
        var CurrentRowDataDoc8;
        var CurrentRowDataDoc7;
        var CurrentRowDataDoc9;
        
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
        var DataWHDocumentsDoc2 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc2Source, {
                        filter: function () {
                            $("#Grid2").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid2").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend(jqXHR, settings) {
                            DisabledControls();
                        },
                        
                    }));
        var DataWHDocumentsDoc3 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc3Source, {
                        filter: function () {
                            $("#Grid3").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid3").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend(jqXHR, settings) {
                            DisabledControls();
                        },
                        
                    }));
        var DataWHDocumentsDoc4 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc4Source, {
                        filter: function () {
                            $("#Grid4").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid4").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend(jqXHR, settings) {
                            DisabledControls();
                        },
                    }));
        var DataWHDocumentsDoc8 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc8Source, {
                        filter: function () {
                            $("#Grid5").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid5").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend(jqXHR, settings) {
                            DisabledControls();
                        },
                    }));
        var DataWHDocumentsDoc7 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc7Source, {
                        filter: function () {
                            $("#Grid6").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid6").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend(jqXHR, settings) {
                            DisabledControls();
                        },
                    }));
        var DataWHDocumentsDoc9 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc9Source, {
                        filter: function () {
                            $("#Grid7").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid7").jqxGrid('updatebounddata', 'sort');
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
        $('#btnInfo').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#btnInfo').on('click', function(){
            var TabIndex = $('#edTabs').jqxTabs('selectedItem');
            var Docm_id = 0;
            switch (TabIndex) {
                case 0: Docm_id = CurrentRowDataAll.docm_id; break;
                case 1: Docm_id = CurrentRowDataDoc1.docm_id; break;
                case 2: Docm_id = CurrentRowDataDoc2.docm_id; break;
                case 3: Docm_id = CurrentRowDataDoc3.docm_id; break;
                case 4: Docm_id = CurrentRowDataDoc4.docm_id; break;
                case 5: Docm_id = CurrentRowDataDoc8.docm_id; break;
                case 6: Docm_id = CurrentRowDataDoc7.docm_id; break;
                case 7: Docm_id = CurrentRowDataDoc9.docm_id; break;
            };
            
            if (Docm_id > 0) {
//                $('#edDocm_id').val(Docm_id);
//                $('#MyForm').submit();
                window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View'))?> + '&Docm_id=' + Docm_id);
            }
        });
        
        $('#btnRefresh').on('click', function(){
            Find();
        });
        
        
        var DisabledControls = function() {
            $('#btnRefresh').jqxButton({disabled: true});
            $('#btnInfo').jqxButton({disabled: true});
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

            var SupplierFilterGroup = new $.jqx.filter();
            if ($("#edSupplier").val() != '') {
                var FilterSupplier = SupplierFilterGroup.createfilter('numericfilter', $("#edSupplier").val(), 'EQUAL');
                SupplierFilterGroup.addfilter(1, FilterSupplier);
            }
            
            var AddressFilterGroup = new $.jqx.filter();
            if ($("#edAddress").val() != '') {
                var FilterAddress = AddressFilterGroup.createfilter('stringfilter', $("#edAddress").val(), 'CONTAINS');
                AddressFilterGroup.addfilter(1, FilterAddress);
            }
            
            var ControlFilterGroup = new $.jqx.filter();
            if ($("#edControl").val() != '') {
                var FilterControl = ControlFilterGroup.createfilter('booleanfilter', 1, 'EQUAL');
                ControlFilterGroup.addfilter(1, FilterControl);
            }
            
            var AcDateNullFilterGroup = new $.jqx.filter();
            if ($("#edAcDateNull").val() != '') {
                var FilterAcDate = AcDateNullFilterGroup.createfilter('datefilter', Date(), 'NULL');
                AcDateNullFilterGroup.addfilter(1, FilterAcDate);
            }
            
            var MasterFilterGroup = new $.jqx.filter();
            if ($("#edMaster").val() != '') {
                var FilterMaster = MasterFilterGroup.createfilter('numericfilter', $("#edMaster").val(), 'EQUAL');
                MasterFilterGroup.addfilter(1, FilterMaster);
            }
            
            var Docm_id = 0;
            
            var TabIndex = $('#edTabs').jqxTabs('selectedItem');
            switch (TabIndex) {
                case 0:
                    Docm_id = CurrentRowDataAll.docm_id;
                    console.log(Docm_id);
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
                    //Aliton.SelectRowById('docm_id', Docm_id, '#GridAll', false);
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
                    /* Фильтр поставщик */
                    $('#Grid1').jqxGrid('removefilter', 'splr_name', false);
                    if ($("#edSupplier").val() != '') $("#Grid1").jqxGrid('addfilter', 'splr_name', SupplierFilterGroup);
                    
                    DisabledControls();
                    $("#Grid1").jqxGrid({source: DataWHDocumentsDoc1});
                    break;
                case 2:
                    /* Фильт номер */
                    $('#Grid2').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#Grid2").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#Grid2').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#Grid2").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#Grid2').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#Grid2").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#Grid2').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#Grid2").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    /* Фильтр поставщик */
                    $('#Grid2').jqxGrid('removefilter', 'splr_name', false);
                    if ($("#edSupplier").val() != '') $("#Grid2").jqxGrid('addfilter', 'splr_name', SupplierFilterGroup);
                    /* Фильтр по адресу */
                    $('#Grid2').jqxGrid('removefilter', 'Address', false);
                    if ($("#edAddress").val() != '') $("#Grid2").jqxGrid('addfilter', 'Address', AddressFilterGroup);
                    
                    DisabledControls();
                    $("#Grid2").jqxGrid({source: DataWHDocumentsDoc2});
                    break;
                case 3:
                    
                    /* Фильт номер */
                    $('#Grid3').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#Grid3").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#Grid3').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#Grid3").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#Grid3').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#Grid3").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#Grid3').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#Grid3").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    /* Фильтр поставщик */
                    $('#Grid3').jqxGrid('removefilter', 'splr_name', false);
                    if ($("#edSupplier").val() != '') $("#Grid3").jqxGrid('addfilter', 'splr_name', SupplierFilterGroup);
                    /* Фильтр по адресу */
                    $('#Grid3').jqxGrid('removefilter', 'Address', false);
                    if ($("#edAddress").val() != '') $("#Grid3").jqxGrid('addfilter', 'Address', AddressFilterGroup);
                    
                    DisabledControls();
                    $("#Grid3").jqxGrid({source: DataWHDocumentsDoc3});
                    
                    break;
                case 4:
                    
                    /* Фильт номер */
                    $('#Grid4').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#Grid4").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#Grid4').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#Grid4").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#Grid4').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#Grid4").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#Grid4').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#Grid4").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    /* Фильтр поставщик */
                    $('#Grid4').jqxGrid('removefilter', 'splr_name', false);
                    if ($("#edSupplier").val() != '') $("#Grid4").jqxGrid('addfilter', 'splr_name', SupplierFilterGroup);
                    /* Фильтр по адресу */
                    $('#Grid4').jqxGrid('removefilter', 'Address', false);
                    if ($("#edAddress").val() != '') $("#Grid4").jqxGrid('addfilter', 'Address', AddressFilterGroup);
                    /* Контроль */
                    $('#Grid4').jqxGrid('removefilter', 'control', false);
                    if ($("#edControl").val() != '') $("#Grid4").jqxGrid('addfilter', 'control', ControlFilterGroup);
                    /* Затребовал */
                    $('#Grid4').jqxGrid('removefilter', 'dmnd_empl_name', false);
                    if ($("#edMaster").val() != '') $("#Grid4").jqxGrid('addfilter', 'dmnd_empl_name', MasterFilterGroup);
                    
                    $('#Grid4').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edAcDateNull").val() != '') $("#Grid4").jqxGrid('addfilter', 'ac_date', AcDateNullFilterGroup);
                    
                    DisabledControls();
                    $("#Grid4").jqxGrid({source: DataWHDocumentsDoc4});
                    
                    break;
                case 5:
                    /* Фильт номер */
                    $('#Grid5').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#Grid5").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#Grid5').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#Grid5").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#Grid5').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#Grid5").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#Grid5').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#Grid5").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    /* Фильтр поставщик */
                    $('#Grid5').jqxGrid('removefilter', 'splr_name', false);
                    if ($("#edSupplier").val() != '') $("#Grid5").jqxGrid('addfilter', 'splr_name', SupplierFilterGroup);
                    
                    DisabledControls();
                    $("#Grid5").jqxGrid({source: DataWHDocumentsDoc8 });
                    break;
                    
                case 6:
                    /* Фильт номер */
                    $('#Grid6').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#Grid6").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#Grid6').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#Grid6").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#Grid6').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#Grid6").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#Grid6').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#Grid6").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    /* Фильтр поставщик */
                    $('#Grid6').jqxGrid('removefilter', 'splr_name', false);
                    if ($("#edSupplier").val() != '') $("#Grid6").jqxGrid('addfilter', 'splr_name', SupplierFilterGroup);
                    
                    DisabledControls();
                    $("#Grid6").jqxGrid({source: DataWHDocumentsDoc7 });
                    break;
                
                case 7:
                    /* Фильт номер */
                    $('#Grid7').jqxGrid('removefilter', 'number', false);
                    if ($("#edNumber").val() != '') $("#Grid7").jqxGrid('addfilter', 'number', NumberFilterGroup);
                    /* Фильтр по дате */
                    $('#Grid7').jqxGrid('removefilter', 'date', false);
                    if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#Grid7").jqxGrid('addfilter', 'date', DateFilterGroup);
                    /* Фильтр по дате создания */
                    $('#Grid7').jqxGrid('removefilter', 'date_create', false);
                    if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#Grid7").jqxGrid('addfilter', 'date_create', DateCrFilterGroup);
                    /* Фильтр по дате подтверждения */
                    $('#Grid7').jqxGrid('removefilter', 'ac_date', false);
                    if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#Grid7").jqxGrid('addfilter', 'ac_date', DateAcFilterGroup);
                    /* Фильтр поставщик */
                    $('#Grid7').jqxGrid('removefilter', 'splr_name', false);
                    if ($("#edSupplier").val() != '') $("#Grid7").jqxGrid('addfilter', 'splr_name', SupplierFilterGroup);
                    
                    DisabledControls();
                    $("#Grid7").jqxGrid({source: DataWHDocumentsDoc9 });
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
                            $('#btnInfo').jqxButton({disabled: false});
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
                        CurrentRowDataDoc1 = $('#Grid1').jqxGrid('getrowdata', event.args.rowindex);
                        if (CurrentRowDataDoc1 != undefined) {
                            $("#edNotes1").jqxTextArea('val', GetNotes(CurrentRowDataDoc1.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
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
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Вид документа', columngroup: 'Documents', datafield: 'dckn_name', width: 100 },
                                    { text: 'Юр. лицо', columngroup: 'Documents', datafield: 'JuridicalPerson', width: 100 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Поставщик', columngroup: 'Documents', filterable: false, datafield: 'splr_name', width: 130 },
                                    { text: 'Сумма', columngroup: 'Documents', datafield: 'summa', cellsformat: 'f2', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                    { text: 'Дата', columngroup: 'Cancel', filtertype: 'date', datafield: 'c_date',cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Отменил', columngroup: 'Cancel', datafield: 'c_name', width: 120 },
                                    { text: 'Основание', columngroup: 'Cancel', datafield: 'c_confirmname', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                  { text: 'Отменил подтверждение', align: 'center', name: 'Cancel' },
                                  
                                ],
                            }));
                    Find();
                break;
                case 2:
                    $("#edNotes2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid2").on('rowselect', function (event) {
                        CurrentRowDataDoc2 = $('#Grid2').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc2 != undefined) {
                            
                            $("#edNotes2").jqxTextArea('val', GetNotes(CurrentRowDataDoc2.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#Grid2").on("bindingcomplete", function (event) {
                        $("#Grid2").jqxGrid('selectrow', 0);
                    });
                    
                    $("#Grid2").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'Address', width: 100 },
                                    { text: 'Причина возврата', columngroup: 'Documents', datafield: 'rtrs_name', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                    { text: 'От', columngroup: 'Action', datafield: 'mstr_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                ],
                            }));
                    Find();
                break;
                case 3:
                    $("#edNotes3").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid3").on('rowselect', function (event) {
                        CurrentRowDataDoc3 = $('#Grid3').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc3 != undefined) {
                            
                            $("#edNotes3").jqxTextArea('val', GetNotes(CurrentRowDataDoc3.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#Grid3").on("bindingcomplete", function (event) {
                        $("#Grid3").jqxGrid('selectrow', 0);
                    });
                    
                    $("#Grid3").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Поставщик', columngroup: 'Documents', filterable: false, datafield: 'splr_name', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Выдано со склада', align: 'center', name: 'Action' },
                                ],
                            }));
                    Find();
                break;
                case 4:
                    $("#edNotes4").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid4").on('rowselect', function (event) {
                        CurrentRowDataDoc4 = $('#Grid4').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc4 != undefined) {
                            
                            $("#edNotes4").jqxTextArea('val', GetNotes(CurrentRowDataDoc4.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#Grid4").on("bindingcomplete", function (event) {
                        $("#Grid4").jqxGrid('selectrow', 0);
                    });
                    
                    var statusrenderer = function (row, datafield, value) {
                        if (value == 'Готово к выдаче')
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px; overflow: hidden;">' +
                                        '<div style="float: left;">' + 
                                            '<img style="margin-left: 5px; margin-top: 0px;" height="16" width="16" src="/images/1.png"/>' + 
                                        '</div>' +
                                    '</div>';
                        else if (value == 'Зарезервировано')
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px; overflow: hidden;">' +
                                        '<div style="float: left;">' + 
                                            '<img style="margin-left: 5px; margin-top: 0px;" height="16" width="16" src="/images/2.png"/>' + 
                                        '</div>' +
                                    '</div>';
                        else if (value == 'Выдано')
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px; overflow: hidden;">' +
                                        '<div style="float: left;">' + 
                                            '<img style="margin-left: 5px; margin-top: 0px;" height="16" width="16" src="/images/3.png"/>' + 
                                        '</div>' +
                                    '</div>';
                        else
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px;">' + value + '</div>';
                    }
                    
                    $("#Grid4").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Контроль', filtertype: 'checkbox', columntype: 'checkbox', columngroup: 'Documents', datafield: 'control', width: 50 },
                                    { text: 'Статус', columngroup: 'Documents', datafield: 'status', width: 34, cellsrenderer: statusrenderer },
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Затребовал', columngroup: 'Documents', filterable: false, datafield: 'dmnd_empl_name', width: 120 },
                                    { text: 'Выписал', columngroup: 'Documents', datafield: 'empl_name', width: 120 },
                                    { text: 'Срочность', columngroup: 'Documents', datafield: 'prty_name', width: 100 },
                                    { text: 'Статус', columngroup: 'Documents', datafield: 'StatusFull', width: 100 },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'Address', width: 200 },
                                    { text: 'Желаемая дата', columngroup: 'Documents', filtertype: 'date', datafield: 'best_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Предельная дата', columngroup: 'Documents', filtertype: 'date', datafield: 'deadline', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Обещенная дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date_promise', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 100 },
                                    { text: 'Пр-ка', columngroup: 'Documents', datafield: 'overday', width: 50 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 130 },
                                    { text: 'Кому', columngroup: 'Action', datafield: 'mstr_name', width: 130 },
                                    { text: 'Основание', columngroup: 'Action', datafield: 'rcrs_name', width: 100 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ReceiptDate', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Номер', columngroup: 'Action', datafield: 'ReceiptNumber', width: 100 },
                                    { text: 'Дата', columngroup: 'Cancel', filtertype: 'date', datafield: 'c_date',cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Отменил', columngroup: 'Cancel', datafield: 'c_name', width: 120 },
                                    { text: 'Основание', columngroup: 'Cancel', datafield: 'c_confirmname', width: 120 },
                                    { text: 'Дата', columngroup: 'Purchase', filtertype: 'date', datafield: 'date_prchs',cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Статус', columngroup: 'Purchase', datafield: 'state_prchs', width: 120 },
                                    { text: 'Сотрудник', columngroup: 'Purchase', datafield: 'name_prchs', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Выдано со склада', align: 'center', name: 'Action' },
                                  { text: 'Отмена подтверждения', align: 'center', name: 'Cancel' },
                                  { text: 'Закупка', align: 'center', name: 'Purchase' },
                                ],
                            }));
                    Find();
                break;
                case 5:
                    $("#edNotes5").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid5").on('rowselect', function (event) {
                        CurrentRowDataDoc8 = $('#Grid5').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc8 != undefined) {
                            
                            $("#edNotes5").jqxTextArea('val', GetNotes(CurrentRowDataDoc8.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#Grid5").on("bindingcomplete", function (event) {
                        $("#Grid5").jqxGrid('selectrow', 0);
                    });
                    
                    $("#Grid5").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Склад источник', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Склад приемник', columngroup: 'Action', datafield: 'in_storage', width: 130 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                ],
                            }));
                    Find();
                break;
                case 6:
                    $("#edNotes6").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid6").on('rowselect', function (event) {
                        CurrentRowDataDoc7 = $('#Grid6').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc7 != undefined) {
                            
                            $("#edNotes6").jqxTextArea('val', GetNotes(CurrentRowDataDoc7.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#Grid6").on("bindingcomplete", function (event) {
                        $("#Grid6").jqxGrid('selectrow', 0);
                    });
                    
                    $("#Grid6").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'Address', width: 250 },
                                    { text: 'Пр-ка', columngroup: 'Documents', datafield: 'overday', width: 60 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 60 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                    { text: 'От', columngroup: 'Action', datafield: 'mstr_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                ],
                            }));
                    Find();
                break;
                case 7:
                    $("#edNotes7").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid7").on('rowselect', function (event) {
                        CurrentRowDataDoc9 = $('#Grid7').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc9 != undefined) {
                            
                            $("#edNotes7").jqxTextArea('val', GetNotes(CurrentRowDataDoc9.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                    });
                    
                    $("#Grid7").on("bindingcomplete", function (event) {
                        $("#Grid7").jqxGrid('selectrow', 0);
                    });
                    
                    $("#Grid7").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 280,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Статус', columngroup: 'Documents', datafield: 'status', width: 100 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 100 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'address', width: 250 },
                                    { text: 'Мастер', columngroup: 'Documents', datafield: 'dmnd_empl_name', width: 150 },
                                    
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Склад', columngroup: 'Action', datafield: 'storage', width: 60 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Выдано', align: 'center', name: 'Action' },
                                ],
                            }));
                    Find();
                break;
            }
        };
                    
        $('#edTabs').jqxTabs({ width: '100%', height: 445, initTabContent: initWidgets, selectedItem: 1 });
        
        
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
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладные на возрат</div>
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Требования на возврат поставщику</div>
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Требования на выдачу</div>
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Перемещение с склада на склад</div>
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Перемещение из ПРЦ на Склад</div>
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладная на возврат мастеру</div>
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
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="Grid2"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotes2" readonly="readonly"></textarea></div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="Grid3"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotes3" readonly="readonly"></textarea></div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="Grid4"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotes4" readonly="readonly"></textarea></div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="Grid5"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotes5" readonly="readonly"></textarea></div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="Grid6"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotes6" readonly="readonly"></textarea></div>
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div id="Grid7"></div>
            <div><div class="row-column">Примечание</div></div>
            <div><textarea id="edNotes7" readonly="readonly"></textarea></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Дополнительно" id='btnInfo' /></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Обновить" id='btnRefresh' /></div>
</div>

<form id="MyForm" action="<?php echo Yii::app()->createUrl('WHDocuments/View'); ?>" target="_blank" method="POST">
    <input type="hidden" id="edDocm_id" name="Docm_id"/>
</form>