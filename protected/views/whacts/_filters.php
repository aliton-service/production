<script>
    $(document).ready(function () {
        var Filters = {
            DateStart: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateStart']?>'),
            DateEnd: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateEnd']?>'),
            DateCrStart: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateCrStart']?>'),
            DateCrEnd: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateCrEnd']?>'),
            DateAcStart: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateAcStart']?>'),
            DateAcEnd: Aliton.DateConvertToJs('<?php echo $filterDefaultValues['DateAcEnd']?>'),
            Master: <?php echo json_encode($filterDefaultValues['Master']); ?>,
            Address: <?php echo json_encode($filterDefaultValues['Address']); ?>
        };
        
        var DisabledControls = function() {
            $("#btnRefresh").jqxButton({disabled: true});
            $("#edFiltering").jqxButton({disabled: true});
            $("#btnInfo").jqxButton({disabled: true});
            $('#btnAdd').jqxButton({disabled: true});
            $('#btnExport').jqxButton({disabled: true});
            $('#btnDel').jqxButton({disabled: true});
            $('#btnUndo').jqxButton({disabled: true});
        };
        
        var WHActsForReestrAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.WHActsForReestrSource, {
            filter: function () {
                $("#ActsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ActsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                DisabledControls();
            }
        }));
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        
        if (Filters.DateStart == null) {
            var DS = new Date();
            DS.setMonth(DS.getMonth()-1);
            Filters.DateStart = DS;
        }
        
        if (Filters.DateEnd == null) {
            var DE = new Date();
            Filters.DateEnd = DE;
        }
            
        
        // Инициализируем контролы фильтров
        $("#cmbMaster").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); 
        $("#edDateStart").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateStart, readonly: false}); 
        $("#edDateEnd").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateEnd, readonly: false}); 
        $("#edDateCrStart").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateCrStart, readonly: false}); 
        $("#edDateCrEnd").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateCrEnd, readonly: false});
        $("#edDateAcStart").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateCrStart, readonly: false}); 
        $("#edDateAcEnd").jqxDateTimeInput({ width: '180px', height: '25px', formatString: 'dd.MM.yyyy', value: Filters.DateCrEnd, readonly: false});
        $("#edAddress").jqxInput({height: 25, width: 200, minLength: 1, value: Filters.Address}); 
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        if (Filters.Master != null) $("#cmbMaster").val(Filters.Master);
        
        var Find = function(){
            var MasterFilterGroup = new $.jqx.filter();
            if ($("#cmbMaster").val() != '') {
                var FilterMaster = MasterFilterGroup.createfilter('numericfilter', $("#cmbMaster").val(), 'EQUAL');
                MasterFilterGroup.addfilter(1, FilterMaster);
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
            
            if ($("#edDateCrStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#edDateCrStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#edDateCrEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#edDateCrEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            if ($("#edDateAcStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#edDateAcStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#edDateAcEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#edDateAcEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            
            var AddressFilterGroup = new $.jqx.filter();
            if ($("#edAddress").val() != '') {
                var FilterAddress = AddressFilterGroup.createfilter('stringfilter', $("#edAddress").val(), 'CONTAINS');
                AddressFilterGroup.addfilter(1, FilterAddress);
            }
            
            $('#ActsGrid').jqxGrid('removefilter', 'master', false);
            if ($("#cmbMaster").val() != '') $("#ActsGrid").jqxGrid('addfilter', 'master', MasterFilterGroup);
            
            $('#ActsGrid').jqxGrid('removefilter', 'date', false);
            if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#ActsGrid").jqxGrid('addfilter', 'date', DateFilterGroup);
            
            $('#ActsGrid').jqxGrid('removefilter', 'date_create', false);
            if ($("#edDateCrStart").val() != '' || $("#edDateCrEnd").val() != '') $("#ActsGrid").jqxGrid('addfilter', 'date_create', DateFilterGroup);
            
            $('#ActsGrid').jqxGrid('removefilter', 'ac_date', false);
            if ($("#edDateAcStart").val() != '' || $("#edDateAcEnd").val() != '') $("#ActsGrid").jqxGrid('addfilter', 'ac_date', DateFilterGroup);
            
            $('#ActsGrid').jqxGrid('removefilter', 'Address', false);
            if ($("#edAddress").val() != '') $("#ActsGrid").jqxGrid('addfilter', 'Address', AddressFilterGroup);
            
            $('#ActsGrid').jqxGrid({source: WHActsForReestrAdapter});
        };
        
        Find();
    });
</script>

<div>Мастер</div>
<div><div id='cmbMaster'><?php echo $filterDefaultValues['Master']; ?></div></div>
<div>Дата с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
<div>Создан с</div>
<div><div id='edDateCrStart'></div></div>
<div>по</div>
<div><div id='edDateCrEnd'></div></div>
<div>Подтвержден с</div>
<div><div id='edDateAcStart'></div></div>
<div>по</div>
<div><div id='edDateAcEnd'></div></div>
<div>Адрес</div>
<div><input type="text" id="edAddress" /></div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>


