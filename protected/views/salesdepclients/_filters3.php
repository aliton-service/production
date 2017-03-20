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
                    Filters: ["isNull(d.StatusOP, 0) <> 1 and er.NextDate <> '01.01.2999'"],
                });
                return data;
            },
        });
        
        var ReservDiaryActionsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDiaryActions, {
            filter: function () {
                $("#ReservActionsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ReservActionsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["(isNull(d.StatusOP, 0) = 1 or er.NextDate = '01.01.2999' )"],
                });
                return data;
            },
        });
        
        var ValuableInstructionsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceValuableInstructions, {
            filter: function () {
                $("#ValuableInstructionsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ValuableInstructionsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
//                $.extend(data, {
//                    Filters: ["isNull(d.StatusOP, 0) = 1"],
//                });
                return data;
            },
        });
        
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
            var ExecutorFilterGroup = new $.jqx.filter();
            if ($("#cmbExecutor").val() != '') {
                var FilterExecutor = ExecutorFilterGroup.createfilter('stringfilter', $("#cmbExecutor").val(), 'STR_EQUAL');
                ExecutorFilterGroup.addfilter(1, FilterExecutor);
            }
            
            var selectedItem = $('#Tabs').jqxTabs('selectedItem'); 
            
            
            switch (selectedItem) {
                case 0:
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'ResponsibleName', false);
                    if ($("#cmbExecutor").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'ResponsibleName', ExecutorFilterGroup);
            
                    $('#ActionsGrid').jqxGrid({source: DiaryActionsAdapter});
                    break;
                case 1:
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'ResponsibleName', false);
                    if ($("#cmbExecutor").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'ResponsibleName', ExecutorFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid({source: ReservDiaryActionsAdapter});
                    break;
                case 2:
                    $('#ValuableInstructionsGrid').jqxGrid('removefilter', 'ShortName', false);
                    if ($("#cmbExecutor").val() != '') $("#ValuableInstructionsGrid").jqxGrid('addfilter', 'ShortName', ExecutorFilterGroup);
                    
                    $('#ValuableInstructionsGrid').jqxGrid({source: ValuableInstructionsAdapter});
                    break;
            };
            
            
                
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

