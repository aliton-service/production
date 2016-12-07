<script>
    $(document).ready(function () {

        var DataControlWHDocuments = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceControlWHDocuments, {
            filter: function () {
                $("#ControlWHDocumentsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ControlWHDocumentsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        // Инициализируем контролы фильтров
        $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '125px', formatString: 'dd.MM.yyyy', value: null })); // Фильтр дата рег
        $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '125px', formatString: 'dd.MM.yyyy', value: null })); // Фильтр дата рег

        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        
        var Find = function(){
            var DateFilterGroup = new $.jqx.filter();
            if ($("#edDateStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#edDateStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#edDateEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#edDateEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            
            if ($("#edDateStart").val() != '' || $("#edDateEnd").val() != '') {
                $('#ControlWHDocumentsGrid').jqxGrid('removefilter', 'ac_date', false);
                $("#ControlWHDocumentsGrid").jqxGrid('addfilter', 'ac_date', DateFilterGroup);
                $("#ControlWHDocumentsGrid").jqxGrid('applyfilters');
            }
             
            $('#ControlWHDocumentsGrid').jqxGrid({source: DataControlWHDocuments});
        };
        
        Find();
    });
</script>

<div>Дата выдачи:</div>
<div>с</div>
<div><div id='edDateStart'></div></div>
<div>по</div>
<div><div id='edDateEnd'></div></div>
<div style="margin-top: 15px;"><input type="button" value="Фильтр" id="edFiltering"/></div>
