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
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        var Find = function(){
//            var EngineerFilterGroup = new $.jqx.filter();
//            if ($("#cmbEngineer").val() != '') {
//                var FilterEngineer = EngineerFilterGroup.createfilter('numericfilter', $("#cmbEngineer").val(), 'EQUAL');
//                EngineerFilterGroup.addfilter(1, FilterEngineer);
//            }
            
            
//            $('#RepairsGrid').jqxGrid('removefilter', 'egnr_empl_name', false);
//            if ($("#cmbEngineer").val() != '') $("#RepairsGrid").jqxGrid('addfilter', 'egnr_empl_name', EngineerFilterGroup);
            
            $('#ClientsGrid').jqxGrid({source: ClientsAdapter});
        };
        
        Find();
    });
</script>

<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>