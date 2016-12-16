<script>
    $(document).ready(function () {
        var EmplDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEmployees, { async: true,
            filter: function () {
                $("#EmployeesGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#EmployeesGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        var SourceFilter = [{id: 1, Name: 'Работающие'}, {id: 2, Name: 'Уволенные'}];
        
        $("#edFIO").jqxInput($.extend(true, {}, {height: 25, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edFilter").jqxComboBox({ source: SourceFilter, width: 'calc(100% - 2px)', height: '25px', displayMember: "Name", valueMember: "id"}); // Фильтр тип заявки
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#GroupFilters').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                if ($('#EmployeesGrid').jqxGrid('isBindingCompleted')) 
                    Find();
                return false;
            }
        });
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        var Find = function(){
            var FIOFilterGroup = new $.jqx.filter();
            if ($("#edFIO").val() != '') {
                var FilterFIO = FIOFilterGroup.createfilter('stringfilter', $("#edFIO").val(), 'CONTAINS');
                FIOFilterGroup.addfilter(1, FilterFIO);
            }
            
            var DateEndFilterGroup = new $.jqx.filter();
            if ($("#edFilter").val() != '') {
                var FilterDateEnd;
                if ($("#edFilter").val() == 1)
                    FilterDateEnd = DateEndFilterGroup.createfilter('datefilter', Date(), 'NULL');
                else
                    FilterDateEnd = FIOFilterGroup.createfilter('datefilter', Date(), 'NOT_NULL');
                DateEndFilterGroup.addfilter(1, FilterDateEnd);
            }
            
            $('#EmployeesGrid').jqxGrid('removefilter', 'EmployeeName', false);
            if ($("#edFIO").val() != '') $("#EmployeesGrid").jqxGrid('addfilter', 'EmployeeName', FIOFilterGroup);
            
            $('#EmployeesGrid').jqxGrid('removefilter', 'DateEnd', false);
            if ($("#edFilter").val() != '') $("#EmployeesGrid").jqxGrid('addfilter', 'DateEnd', DateEndFilterGroup);
            
            $('#EmployeesGrid').jqxGrid({source: EmplDataAdapter});
        };
        
        Find();
        
    });
</script>

<div id="GroupFilters">
    <div class="al-row">Сотрудник</div>
    <div class="al-row"><input type="text" id="edFIO"/></div>
    <div class="al-row"><div id="edFilter"></div></div>
</div>
<div style="margin-top: 4px;"><input type="button" value="Фильтр" id="edFiltering"/></div>