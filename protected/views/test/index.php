<script>
    $(function(){
        $("li").click(function(){
            var id = $(this).attr("id");
            var url = "";
            
            if (id === "1")
                url = "http://alitonw/index.php?r=Test/Test1";
            if (id === "2")
                url = "http://alitonw/index.php?r=Test/Test2";
            if (id === "3")
                url = "http://alitonw/index.php?r=Test/Test3";
            if (id === "4")
                url = "http://alitonw/index.php?r=Test/Test4";
            if (id === "5")
                url = "http://alitonw/index.php?r=Test/Test5";
            if (id === "6")
                url = "http://alitonw/index.php?r=Test/Test6";
            if (id === "7")
                url = "http://alitonw/index.php?r=Test/Test7";
            if (id === "8")
                url = "http://alitonw/index.php?r=Test/Test8";
            if (id === "9")
                url = "http://alitonw/index.php?r=Test/Test9";
            if (id === "10")
                url = "http://alitonw/index.php?r=Test/Test10";
            if (id === "11")
                url = "http://alitonw/index.php?r=Test/Test11";
            if (id === "12")
                url = "http://alitonw/index.php?r=Test/Test12";
            if (id === "13")
                url = "http://alitonw/index.php?r=Test/Test13";
            if (id === "14")
                url = "http://alitonw/index.php?r=Test/Test14";
            if (id === "15")
                url = "http://alitonw/index.php?r=Test/Test15";
            if (id === "16")
                url = "http://alitonw/index.php?r=Test/Test16";
            if (id === "17")
                url = "http://alitonw/index.php?r=Test/Test17";
            if (id === "18")
                url = "http://alitonw/index.php?r=Test/Test18";
            if (id === "19")
                url = "http://alitonw/index.php?r=Test/Test19";
            
            if (url !== "")
                $.ajax({
                    url: url,
                    type: "POST",
                    data: null,
                    async: false,
                    success: function(Res){
                        $("#cont").html(Res);
                    },
                });
            
        });
})    
</script>

<div style="padding-top: 16px">
<div style="float: left">
    <ul>
        <li id="1">Грид</li>
        <li id="2">Два взаимосвязанных грида (Фильтр)</li>
        <li id="3">Два взаимосвязанных грида (Переход)</li>
        <li id="4">Выпадающий список</li>
        <li id="5">Выпадающий список + грид</li>
        <li id="6">Два взаимосвязанных списка</li>
        <li id="7">Поле</li>
        <li id="8">Поле и грид</li>
        <li id="9">Флажок</li>
        <li id="10">Флажок и грид</li>
        <li id="11">Переключатель</li>
        <li id="12">Календарь</li>
        <li id="13">Календарь + грид</li>
        <li id="14">Поле дата</li>
        <li id="15">Поле дата + грид</li>
        <li id="16">Размеры полей</li>
        <li id="17">Грид + поле</li>
        <li id="18">Заметка</li>
        <li id="19">Заметка + грид</li>
        <li id="20">Шаблон</li>
    </ul>
</div>
<div id="cont" style="float: left; padding-left: 16px; padding-top: 16px">
    
</div>
</div>



