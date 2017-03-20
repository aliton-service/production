<script>
    $(document).ready(function () {
        
        var DemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientDemands, {
            filter: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["d.PropForm_id = " + Form_id],
                });
                return data;
            },
        });
        
        $("#edFilterDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '140px', formatString: 'dd.MM.yyyy', value: null })); // Фильтр дата регистрации
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        $('#GroupFilters').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                if ($('#DemandsGrid').jqxGrid('isBindingCompleted')) 
                    Find();
                return false;
            }
        });
        
        var Find = function() {
            var DateRegFilterGroup = new $.jqx.filter();
            if ($("#edFilterDate").val() != '') {
                var FilterDateExec = DateRegFilterGroup.createfilter('datefilter', $("#edFilterDate").val(), 'DATE_EQUAL');   
                DateRegFilterGroup.addfilter(1, FilterDateExec);
            }
            
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Date', false);
            if ($("#edFilterDate").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Date', DateRegFilterGroup);
            
            $('#DemandsGrid').jqxGrid({source: DemandsAdapter});
        };
        Find();
    });
</script>    

<div id="GroupFilters">
    <div class="al-row">
        <div>Дата</div>
        <div><div id='edFilterDate'></div></div>
    </div>
    <div class="al-row">
        <input type="button" value="Фильтр" id="edFiltering"/>
    </div>
</div>    

