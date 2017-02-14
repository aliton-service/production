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
            $('#DemandsGrid').jqxGrid({source: DemandsAdapter});
        };
        Find();
    });
</script>    

<div id="GroupFilters">
    <div class="al-row">
        <input type="button" value="Фильтр" id="edFiltering"/>
    </div>
</div>    

