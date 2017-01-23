<script>
    $(document).ready(function () {
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {async: false}));
        
        $("#edEmpl").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); 
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        
        
        var Find = function(){
            var MasterFilterGroup = new $.jqx.filter();
            if ($("#edEmpl").val() != '') {
                var FilterMaster = MasterFilterGroup.createfilter('numericfilter', $("#edEmpl").val(), 'EQUAL');
                MasterFilterGroup.addfilter(1, FilterMaster);
            }
            
            $('#GridControls').jqxGrid('removefilter', 'MasterName', false);
            if ($("#edEmpl").val() != '') $("#GridControls").jqxGrid('addfilter', 'MasterName', MasterFilterGroup);
            
            $('#GridControls').jqxGrid('updatebounddata');
        };
        
        
    });
</script>    


<div class="al-row">Сотрудник</div>
<div class="al-row"><div id="edEmpl"></div></div>

<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>

