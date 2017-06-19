<script>
    var a = function() {
            
        };
        
    $(function(){
        
        $("#simple").dxNumberBox({height: 25, width: 150});
            $("#simple2").dxTextBox({value: "John Smith", height: 25, width: 150});
        
    });
</script>

<div style="margin: 0 auto; width: 500px; margin-top: 300px;">
    Тест dx
    <div id="simple" class="dx-texteditor dx-widget dx-numberbox" style="width: 150px; height: 25px;"></div>
    <div id="simple2" class="dx-texteditor dx-widget dx-numberbox" style="width: 150px; height: 25px;"></div>
</div>