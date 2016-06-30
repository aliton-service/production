<?php

    echo 'Время выполнения (ms): ' . $Interval;
    
?>
<br>
<div id="ajax_result"></div>

<script>
    $(function(){
        var DateStart = new Date();
        
        $.ajax({
            url: "http://aliton/index.php?r=site/test",
            type: 'GET',
            async: true,
            success: function(){
                var DateEnd = new Date();
                var Diff = DateEnd - DateStart;
                console.log("Время выполнения AJAX запроса (ms): " + Diff);
                $("#ajax_result").text("Время выполнения AJAX запроса (ms): " + Diff);
            }
        });
    });
</script>    

