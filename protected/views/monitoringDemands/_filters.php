<script type="text/javascript">
    $(document).ready(function(){
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataPriors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandPriors, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["dp.for_md = 1"],
                });
                return data;
            },
        });
        var MonitoringDemandsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemands, {
            filter: function () {
                $("#MonitoringDemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#MonitoringDemandsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#GroupFilters').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                if ($('#MonitoringDemandsGrid').jqxGrid('isBindingCompleted')) 
                    Find();
                return false;
            }
        });
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        $("#UserCreate").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
        $("#notAcceptedDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings));
        $("#unfulfilledDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings));
        $("#BeginDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#EndDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#Number").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 110, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#Date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#Prior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, displayMember: "DemandPrior", valueMember: "DemandPrior_id", width: 200, autoDropDownHeight: true }));
        
        
        var Find = function(){
            var UserCreateFilterGroup = new $.jqx.filter();
            if ($("#UserCreate").val() != '') {
                var FilterUserCreate = UserCreateFilterGroup.createfilter('numericfilter', $("#UserCreate").val(), 'EQUAL');
                UserCreateFilterGroup.addfilter(1, FilterUserCreate);
            }
            
            var NotAcceptedFilterGroup = new $.jqx.filter();
            if ($("#notAcceptedDemands").val() != '') {
                var FilterNotAccepted = NotAcceptedFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NotAcceptedFilterGroup.addfilter(1, FilterNotAccepted);
            }
            
            var NotExecFilterGroup = new $.jqx.filter();
            if ($("#unfulfilledDemands").val() != '') {
                var FilterNotExec = NotExecFilterGroup.createfilter('datefilter', Date(), 'NULL');
                NotExecFilterGroup.addfilter(1, FilterNotExec);
            }
            
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#Number").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('numericfilter', $("#Number").val(), 'EQUAL');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
            
            var DateFilterGroup = new $.jqx.filter();
            if ($("#Date").val() != '') {
                var FilterDate = DateFilterGroup.createfilter('datefilter', $("#Date").val(), 'STR_EQUAL');
                DateFilterGroup.addfilter(1, FilterDate);
            }
            
            var PriorFilterGroup = new $.jqx.filter();
            if ($("#Prior").val() != '') {
                var FilterPrior = PriorFilterGroup.createfilter('numericfilter', $("#Prior").val(), 'EQUAL');
                PriorFilterGroup.addfilter(1, FilterPrior);
            }
            
            if ($("#BeginDate").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#BeginDate").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#EndDate").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#EndDate").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }

            $('#MonitoringDemandsGrid').jqxGrid('removefilter', 'UserName', false);
            if ($("#UserCreate").val() != '') $("#MonitoringDemandsGrid").jqxGrid('addfilter', 'UserName', UserCreateFilterGroup);
            
            $('#MonitoringDemandsGrid').jqxGrid('removefilter', 'DateAccept', false);
            if ($("#notAcceptedDemands").val() != '') $("#MonitoringDemandsGrid").jqxGrid('addfilter', 'DateAccept', NotAcceptedFilterGroup);
            
            $('#MonitoringDemandsGrid').jqxGrid('removefilter', 'DateExec', false);
            if ($("#unfulfilledDemands").val() != '') $("#MonitoringDemandsGrid").jqxGrid('addfilter', 'DateExec', NotExecFilterGroup);
            
            $('#MonitoringDemandsGrid').jqxGrid('removefilter', 'mndm_id', false);
            if ($("#Number").val() != '') $("#MonitoringDemandsGrid").jqxGrid('addfilter', 'mndm_id', NumberFilterGroup);
            
            $('#MonitoringDemandsGrid').jqxGrid('removefilter', 'Date', false);
            if ($("#Date").val() != '' || $("#edDateStart").val() != '' || $("#edDateEnd").val() != '') $("#MonitoringDemandsGrid").jqxGrid('addfilter', 'Date', DateFilterGroup);
            
            $('#MonitoringDemandsGrid').jqxGrid('removefilter', 'DemandPrior', false);
            if ($("#Prior").val() != '') $("#MonitoringDemandsGrid").jqxGrid('addfilter', 'DemandPrior', PriorFilterGroup);
            
            $('#MonitoringDemandsGrid').jqxGrid({source: MonitoringDemandsDataAdapter});
        };
        
        Find();
    });
</script>    

<div id="GroupFilters">
<div class="filter-row">Заявку подал 
    <div class="filter-input"><div id="UserCreate"></div></div>
</div>

<div class="filter-row">Показывать только: 

    <div class="filter-row-column">
        <div class="filter-input"><div id='notAcceptedDemands'></div></div>
        <div class="filter-text">Непринятые заявки </div>
    </div>
    <div class="filter-row-column">
        <div class="filter-input"><div id='unfulfilledDemands'></div></div>
        <div class="filter-text">Невыполненные заявки </div>
    </div>
    
</div>

<div class="filter-row">Номер 
    <div class="filter-input"><div id="Number"></div></div>
</div>

<div class="filter-row">Дата 
    <div class="filter-input"><div id="Date"></div></div>
</div>

<div class="filter-row">Приоритет 
    <div class="filter-input"><div id="Prior"></div></div>
</div>

<div class="filter-row">За период: 
    
    <div class="filter-row-column">
        <div class="filter-row" style="margin-left: 10px;">с </div>
        <div class="filter-input"><div id='BeginDate'></div></div>
    </div>
    <div class="filter-row-column">
        <div class="filter-row">по </div>
        <div class="filter-input"><div id='EndDate'></div></div>
    </div>
</div>
</div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>



