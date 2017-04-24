<script>
    $(document).ready(function(){
        var DataWHDocumentsAll = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsAllSource, {
                        filter: function () {
                            $("#GridAll").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#GridAll").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        var DataWHDocumentsDoc1 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc1Source, {
                        filter: function () {
                            $("#Grid1").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid1").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        var DataWHDocumentsDoc2 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc2Source, {
                        filter: function () {
                            $("#Grid2").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid2").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        var DataWHDocumentsDoc3 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc3Source, {
                        filter: function () {
                            $("#Grid3").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid3").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        var DataWHDocumentsDoc4 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc4Source, {
                        filter: function () {
                            $("#Grid4").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid4").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        var DataWHDocumentsDoc8 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc8Source, {
                        filter: function () {
                            $("#Grid5").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid5").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        var DataWHDocumentsDoc7 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc7Source, {
                        filter: function () {
                            $("#Grid6").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid6").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        var DataWHDocumentsDoc9 = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHDocumentsDoc9Source, {
                        filter: function () {
                            $("#Grid7").jqxGrid('updatebounddata', 'filter');
                        },
                        sort: function () {
                            $("#Grid7").jqxGrid('updatebounddata', 'sort');
                        },
                        beforeSend: function(jqXHR, settings) {
                            DisabledControls();
                        },
                        formatData: function (data) {
                            if ($("#edSN").val() != '')
                                data.Filters = ["exists (select 1 from docmachsdetails dt inner join serialnumbers s on (dt.dadt_id = s.dadt_id) where dt.docm_id = d.docm_id and dt.deldate is null and s.empldel is null and s.SN like '%" + $("#edSN").val() + "%')"];
                            return data;
                        },
                    }));
        
        var DateStart = new Date();
        var DateEnd = new Date();
        DateStart.setMonth(DateStart.getMonth() - 1);
        
        var DataSuppliers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSuppliersMin));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        var DataStorages = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceStoragesList));
        
        $("#edNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 135} ));
        $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', formatString: 'dd.MM.yyyy', value: DateStart}));
        $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', formatString: 'dd.MM.yyyy', value: DateEnd, dropDownHorizontalAlignment: 'right'}));
        $("#edControl").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 150}));
        $("#edAcDateNull").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 150}));
        $("#edDateCrStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', formatString: 'dd.MM.yyyy', value: null}));
        $("#edDateCrEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', formatString: 'dd.MM.yyyy', value: null, dropDownHorizontalAlignment: 'right'}));
        $("#edDateAcStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', formatString: 'dd.MM.yyyy', value: null}));
        $("#edDateAcEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '100px', formatString: 'dd.MM.yyyy', value: null, dropDownHorizontalAlignment: 'right'}));
        $("#edSupplier").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSuppliers, width: 'calc(100% - 2px)', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"}));
        $("#edAddress").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)'} ));
        $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: 'calc(100% - 2px)', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edStorage").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStorages, width: '180', height: '25px', displayMember: "storage", valueMember: "storage_id", autoDropDownHeight: true}));
        $("#edSN").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 'calc(100% - 2px)'} ));
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
            WHDocCount = 0;
            $('h1').html('Склад - реестр документов');
        });
        
        var DisabledControls = function() {
            $('#btnRefresh').jqxButton({disabled: true});
            $('#btnInfo').jqxButton({disabled: true});
            $('#btnCreate').jqxButton({disabled: true});
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
            
            var StorageFilterGroup = new $.jqx.filter();
            if ($("#edStorage").val() != '') {
                var FilterStorage = StorageFilterGroup.createfilter('numericfilter', $("#edStorage").val(), 'EQUAL');
                StorageFilterGroup.addfilter(1, FilterStorage);
            }
            
            var Docm_id = 0;
            
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
                    /* Склад */
                    $('#Grid4').jqxGrid('removefilter', 'strg_id', false);
                    if ($("#edStorage").val() != '') $("#Grid4").jqxGrid('addfilter', 'strg_id', StorageFilterGroup);
                    
                    
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
        Find();
    });
</script>

<div class="al-row" style="padding: 0;">Номер:</div>
<div class="al-row"><input type="text" autocomplete="off" id="edNumber"/></div>
<div class="al-row"><div id="edControl" style="color: white;">Котроль</div></div>
<div class="al-row"><div id="edAcDateNull" style="color: white;">Не выданные</div></div>
<div class="al-row" style="padding: 0;">Дата:</div>
<div class="al-row" style="height: 27px;">
    <div class="al-row-column">с</div>
    <div class="al-row-column" style="margin-left: 0"><div id="edDateStart"></div></div>
    <div class="al-row-column" style="margin-left: 0">по</div>
    <div class="al-row-column" style="margin-left: 0"><div id="edDateEnd"></div></div>
</div>
<div class="al-row" style="padding-bottom: 0;">Создан:</div>
<div class="al-row" style="height: 27px;">
    <div class="al-row-column">с</div>
    <div class="al-row-column" style="margin-left: 0"><div id="edDateCrStart"></div></div>
    <div class="al-row-column" style="margin-left: 0">по</div>
    <div class="al-row-column" style="margin-left: 0"><div id="edDateCrEnd"></div></div>
</div>
<div class="al-row" style="padding-bottom: 0;">Подтвержден:</div>
<div class="al-row" style="height: 27px;">
    <div class="al-row-column">с</div>
    <div class="al-row-column" style="margin-left: 0"><div id="edDateAcStart"></div></div>
    <div class="al-row-column" style="margin-left: 0">по</div>
    <div class="al-row-column" style="margin-left: 0"><div id="edDateAcEnd"></div></div>
</div>
<div class="al-row" style="padding-bottom: 0;">Поставщик:</div>
<div class="al-row"><div id="edSupplier"></div></div>
<div class="al-row" style="padding-bottom: 0;">Адрес:</div>
<div class="al-row"><input type="text" autocomplete="off" id="edAddress"/></div>
<div class="al-row" style="padding-bottom: 0;">Затребовал:</div>
<div class="al-row"><div id="edMaster"></div></div>
<div class="al-row" style="padding-bottom: 0;">Серийный номер:</div>
<div class="al-row"><input type="text" autocomplete="off" id="edSN"/></div>
<div class="al-row" style="padding-bottom: 0;">Склад:</div>
<div class="al-row"><div id="edStorage"></div></div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>