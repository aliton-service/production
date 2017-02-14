<script>
    $(document).ready(function () {
        
        var DiaryActionsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDiaryActions, {
            filter: function () {
                $("#ActionsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ActionsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["isNull(d.StatusOP, 0) <> 1"],
                });
                return data;
            },
        });
        
        var ReservDiaryActionsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDiaryActions, {
            filter: function () {
                $("#ActionsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ActionsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["isNull(d.StatusOP, 0) = 1"],
                });
                return data;
            },
        });
        $("#cmbSalesManager").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "ShortName"}));
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        $('#GroupFilters').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                if ($('#ActionsGrid').jqxGrid('isBindingCompleted')) 
                    Find();
                return false;
            }
        });
        
        var Find = function() {
            if ($("#cmbSalesManager").val() != '') {
                var FilterSalesManager2 = SalesManagerFilterGroup.createfilter('stringfilter', $("#cmbSalesManager").val(), 'STR_EQUAL');
                SalesManagerFilterGroup.addfilter(1, FilterSalesManager2);
            }
            
            
            var selectedItem = $('#Tabs').jqxTabs('selectedItem'); 
            if (selectedItem == 0)
                $('#ActionsGrid').jqxGrid({source: DiaryActionsAdapter});
            else
                $('#ReservActionsGrid').jqxGrid({source: ReservDiaryActionsAdapter});
            Statistics.Refresh();
        };
        Find();
    });
</script>    

<div id="GroupFilters">
    <div class="al-row">
        
    </div>
    <div class="al-row">
        <input type="button" value="Фильтр" id="edFiltering"/>
    </div>
</div>    

