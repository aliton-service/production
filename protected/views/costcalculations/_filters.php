<script>
    $(document).ready(function () {
        var Filters = {
        };
        
        var CostCalcDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCostCalculations_v, {
            filter: function () {
                $("#CostCalcGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#CostCalcGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        var DataTerritory = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceTerritory, {async: false}));
        var DS = new Date();
        var DE = new Date();
        DS.setMonth(DS.getMonth()-2);
        
        
        $("#edNumberFilter").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 2px)', minLength: 1})); 
        $("#edNameFilter").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 2px)', minLength: 1})); 
        $("#cmbTerrit").jqxComboBox({ source: DataTerritory, width: '200', height: '25px', displayMember: "Territ_Name", valueMember: "Territ_Id"}); 
        $("#edAddrFilter").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 2px)', minLength: 1})); 
        $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: DS, dropDownVerticalAlignment: 'top' }));
        $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '180px', formatString: 'dd.MM.yyyy', value: DE, dropDownVerticalAlignment: 'top' }));
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        var Find = function(){
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edNumberFilter").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('stringfilter', $("#edNumberFilter").val(), 'CONTAINS');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
            
            var NameFilterGroup = new $.jqx.filter();
            if ($("#edNameFilter").val() != '') {
                var FilterName = NameFilterGroup.createfilter('stringfilter', $("#edNameFilter").val(), 'CONTAINS');
                NameFilterGroup.addfilter(1, FilterName);
            }
            
            var TerritFilterGroup = new $.jqx.filter();
            if ($("#cmbTerrit").val() != '') {
                var FilterTerrit = TerritFilterGroup.createfilter('numericfilter', $("#cmbTerrit").val(), 'EQUAL');
                TerritFilterGroup.addfilter(1, FilterTerrit);
            }
            
            var AddrFilterGroup = new $.jqx.filter();
            if ($("#edAddrFilter").val() != '') {
                var FilterAddress = AddrFilterGroup.createfilter('stringfilter', $("#edAddrFilter").val(), 'CONTAINS');
                AddrFilterGroup.addfilter(1, FilterAddress);
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
            
            $('#CostCalcGrid').jqxGrid('removefilter', 'Calc_id', false);
            if ($("#edNumberFilter").val() != '') $("#CostCalcGrid").jqxGrid('addfilter', 'Calc_id', NumberFilterGroup);
            
            $('#CostCalcGrid').jqxGrid('removefilter', 'Name', false);
            if ($("#edNameFilter").val() != '') $("#CostCalcGrid").jqxGrid('addfilter', 'Name', NameFilterGroup);
            
            $('#CostCalcGrid').jqxGrid('removefilter', 'Territ_id', false);
            if ($("#cmbTerrit").val() != '') $("#CostCalcGrid").jqxGrid('addfilter', 'Territ_id', TerritFilterGroup);
            
            $('#CostCalcGrid').jqxGrid('removefilter', 'Addr', false);
            if ($("#edAddrFilter").val() != '') $("#CostCalcGrid").jqxGrid('addfilter', 'Addr', AddrFilterGroup);
            
            $('#CostCalcGrid').jqxGrid('removefilter', 'Date', false);
            if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#CostCalcGrid").jqxGrid('addfilter', 'Date', DateFilterGroup);
            
            $('#CostCalcGrid').jqxGrid({source: CostCalcDataAdapter});
        };
        
        Find();
    });
</script>

<div class="al-row">Номер</div>
<div class="al-row"><input type="text" id="edNumberFilter" /></div>
<div class="al-row">Наименование</div>
<div class="al-row"><input type="text" id="edNameFilter" /></div>
<div class="al-row">Участок</div>
<div class="al-row"><div id='cmbTerrit'></div></div>
<div class="al-row">Адрес</div>
<div class="al-row"><input type="text" id="edAddrFilter" /></div>
<div>Период с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
<div class="al-row">
    <input type="button" value="Фильтр" id="edFiltering"/>
</div>