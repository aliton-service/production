<script>
    $(document).ready(function () {
        var Filters = {
            
        };
        
        var DisabledControls = function() {
//            $("#btnRefresh").jqxButton({disabled: true});
        };
        
        var ClientsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClients, {
            filter: function () {
                $("#ClientsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ClientsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                DisabledControls();
            }
        }));
        
        $("#cmbSalesManager").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "ShortName"}));
        $("#cmbSegment").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSegments, width: '200', height: '25px', displayMember: "ClientGroup", valueMember: "ClientGroup"}));
        $("#cmbSubSegment").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSegments, width: '200', height: '25px', displayMember: "ClientGroup", valueMember: "ClientGroup"}));
        $("#cmbSourceInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSourceInfo, width: '200', height: '25px', displayMember: "SourceInfo_name", valueMember: "SourceInfo_name"}));
        $("#cmbSubSourceInfo").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSubSourceInfo, width: '200', height: '25px', displayMember: "SourceInfo_name", valueMember: "SourceInfo_name"}));
        $("#edBrandName").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 2px)', minLength: 1})); 
        $("#cmbStatus").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataClientStatus, width: '200', height: '25px', displayMember: "StatusName", valueMember: "StatusName"}));
        $("#edFullName").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 2px)', minLength: 1})); 
        
        $("#chbSalesManager").jqxCheckBox($.extend(true, {}, { width: 160, height: 25, checked: false})); 
        $("#chbNoSalesManager").jqxCheckBox($.extend(true, {}, { width: 160, height: 25, checked: false})); 
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        $('#GroupFilters').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                if ($('#ClientsGrid').jqxGrid('isBindingCompleted')) 
                    Find();
                return false;
            }
        });
        
        var Find = function() {
            var SalesManagerFilterGroup = new $.jqx.filter();
            if ($("#chbSalesManager").val() != '') {
                var FilterSalesManager = SalesManagerFilterGroup.createfilter('stringfilter', '', 'NOT_NULL');
                SalesManagerFilterGroup.addfilter(1, FilterSalesManager);
            }
            if ($("#chbNoSalesManager").val() != '') {
                var FilterNoSalesManager = SalesManagerFilterGroup.createfilter('stringfilter', '', 'NULL');
                SalesManagerFilterGroup.addfilter(1, FilterNoSalesManager);
            }
            if ($("#cmbSalesManager").val() != '') {
                var FilterSalesManager2 = SalesManagerFilterGroup.createfilter('stringfilter', $("#cmbSalesManager").val(), 'STR_EQUAL');
                SalesManagerFilterGroup.addfilter(1, FilterSalesManager2);
            }
            var SegmentFilterGroup = new $.jqx.filter();
            if ($("#cmbSegment").val() != '') {
                var FilterSegment = SegmentFilterGroup.createfilter('stringfilter', $("#cmbSegment").val(), 'STR_EQUAL');
                SegmentFilterGroup.addfilter(1, FilterSegment);
            }
            var SubSegmentFilterGroup = new $.jqx.filter();
            if ($("#cmbSubSegment").val() != '') {
                var FilterSubSegment = SubSegmentFilterGroup.createfilter('stringfilter', $("#cmbSubSegment").val(), 'STR_EQUAL');
                SubSegmentFilterGroup.addfilter(1, FilterSubSegment);
            }
            var SourceInfoFilterGroup = new $.jqx.filter();
            if ($("#cmbSourceInfo").val() != '') {
                var FilterSourceInfo = SourceInfoFilterGroup.createfilter('stringfilter', $("#cmbSourceInfo").val(), 'STR_EQUAL');
                SourceInfoFilterGroup.addfilter(1, FilterSourceInfo);
            }
            var SubSourceInfoFilterGroup = new $.jqx.filter();
            if ($("#cmbSubSourceInfo").val() != '') {
                var FilterSubSourceInfo = SubSourceInfoFilterGroup.createfilter('stringfilter', $("#cmbSubSourceInfo").val(), 'STR_EQUAL');
                SubSourceInfoFilterGroup.addfilter(1, FilterSubSourceInfo);
            }
            
            var BrandNameFilterGroup = new $.jqx.filter();
            if ($("#edBrandName").val() != '') {
                var FilterBrandName = BrandNameFilterGroup.createfilter('stringfilter', $("#edBrandName").val(), 'CONTAINS');
                BrandNameFilterGroup.addfilter(1, FilterBrandName);
            }
            
            var StatusFilterGroup = new $.jqx.filter();
            if ($("#cmbStatus").val() != '') {
                var FilterStatus = StatusFilterGroup.createfilter('stringfilter', $("#cmbStatus").val(), 'CONTAINS');
                StatusFilterGroup.addfilter(1, FilterStatus);
            }
            
            var FullNameFilterGroup = new $.jqx.filter();
            if ($("#edFullName").val() != '') {
                var FilterFullName = FullNameFilterGroup.createfilter('stringfilter', $("#edFullName").val(), 'CONTAINS');
                FullNameFilterGroup.addfilter(1, FilterFullName);
            }
            
            $('#ClientsGrid').jqxGrid('removefilter', 'SalesManager', false);
            if ($("#chbSalesManager").val() != '' || $("#chbNoSalesManager").val() != '' || $("#cmbSalesManager").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'SalesManager', SalesManagerFilterGroup);
            
            $('#ClientsGrid').jqxGrid('removefilter', 'SegmentName', false);
            if ($("#cmbSegment").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'SegmentName', SegmentFilterGroup);
            
            $('#ClientsGrid').jqxGrid('removefilter', 'SubSegmentName', false);
            if ($("#cmbSubSegment").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'SubSegmentName', SubSegmentFilterGroup);
            
            $('#ClientsGrid').jqxGrid('removefilter', 'SourceInfoName', false);
            if ($("#cmbSourceInfo").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'SourceInfoName', SourceInfoFilterGroup);
            
            $('#ClientsGrid').jqxGrid('removefilter', 'SubSourceInfoName', false);
            if ($("#cmbSubSourceInfo").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'SubSourceInfoName', SubSourceInfoFilterGroup);
            
            $('#ClientsGrid').jqxGrid('removefilter', 'BrandName', false);
            if ($("#edBrandName").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'BrandName', BrandNameFilterGroup);
            
            $('#ClientsGrid').jqxGrid('removefilter', 'StatusName', false);
            if ($("#cmbStatus").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'StatusName', StatusFilterGroup);
            
            $('#ClientsGrid').jqxGrid('removefilter', 'FullName', false);
            if ($("#edFullName").val() != '') $("#ClientsGrid").jqxGrid('addfilter', 'FullName', FullNameFilterGroup);
            
            $('#ClientsGrid').jqxGrid({source: ClientsAdapter});
            Statistics.Refresh();
        };
        
        Find();
    });
</script>
<div id="GroupFilters">
    <div class="al-row">
        <div id='chbSalesManager' style="color: white;">Распределенные</div>
    </div>
    <div class="al-row">
        <div id='chbNoSalesManager' style="color: white;">Нераспределенные</div>
    </div>
    <div class="al-row">
        <div>МПОПР</div>
        <div><div id="cmbSalesManager"></div></div>
    </div>
    <div class="al-row">
        <div>Сегмент</div>
        <div><div id="cmbSegment"></div></div>
    </div>
    <div class="al-row">
        <div>ПОДСегмент</div>
        <div><div id="cmbSubSegment"></div></div>
    </div>
    <div class="al-row">
        <div>Источник</div>
        <div><div id="cmbSourceInfo"></div></div>
    </div>
    <div class="al-row">
        <div>ПОДИсточник</div>
        <div><div id="cmbSubSourceInfo"></div></div>
    </div>
    <div class="al-row">
        <div>Бренд</div>
        <div><input type="text" id="edBrandName" /></div>
    </div>
    <div class="al-row">
        <div>Статус</div>
        <div><div id="cmbStatus"></div></div>
    </div>
    <div class="al-row">
        <div>Клиент</div>
        <div><input type="text" id="edFullName" /></div>
    </div>
</div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>