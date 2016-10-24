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
        
        $("#UserCreate").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 200 }));
        $("#notAcceptedDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings));
        $("#unfulfilledDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings));
        
        $("#BeginDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#EndDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        
        $("#Number").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 110, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#Date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#Prior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, displayMember: "DemandPrior", valueMember: "DemandPrior_id", width: 200, autoDropDownHeight: true }));
        
        $("#Number").jqxNumberInput('val', null);
    });
</script>    


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




