<script>
    
    var context = new AudioContext();
    
    function loadAudio( object, url) {
        var request = new XMLHttpRequest();
        request.open('GET', url, true);
        request.responseType = 'arraybuffer';

        request.onload = function() {
            context.decodeAudioData(request.response, function(buffer) {
                object.buffer = buffer;
            });
        }
        request.send();
    }

    function addAudioProperties(object) {

    object.name = object.id;

    object.source = $(object).data('sound');

    loadAudio(object, object.source);

    object.play = function () {

        var s = context.createBufferSource();

        s.buffer = object.buffer;

        s.connect(context.destination);

        s.start(0);

        object.s = s;

    }

}

    $(document).ready(function() {
//        $.ajax({
//            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
//            type: 'POST',
//            data: {
//                Models: ['Juridicals', 'Sections']
//            },
//            success: function(Res) {
//                Res = JSON.parse(Res);
//                console.log(Res);
//            }
//        });
        
        
        
        $('#sp div').each(function() {

        addAudioProperties(this);

    });

 

    $('#sp div').click(function() {

        this.play();

    });

    });
    

</script>    

<?php
    if (Yii::app()->user->isGuest)
        echo '<p>Для авторизации кликните: <a href="' . Yii::app()->createUrl ('site/login') .'">здесь</a>.';
   
?>

<?php if (!Yii::app()->user->isGuest):?>
    <div class="logo" style="width: 100%; height: 44px;"></div>
    <div class="row" style="font-family: 'Roboto', sans-serif; font-size: 16px; font-weight: 400; line-height: 1.3em; color: #171412; letter-spacing: 0.02em;">
        Приветствуем Вас на страницах сайта нашей компании!<br>
        С 1987 года мы оказываем услуги по обслуживанию и поддержанию работоспособности систем безопасности и инженерных систем 
        на различных объектах Санкт-Петербурга и Ленинградской области. <br>
        Осознавая всю степень ответственности за безопасность наших горожан, 
        за комфортные условия жизни и труда жителей Санкт-Петербурга и области, мы идем в ногу со временем и сегодня являемся прогрессивной и клиентоориентированной компанией.
    </div>
<?php endif; ?>

<!--    <audio controls>
        <source src="file://chz/records2/113/2017_01_09_12_34_45_6F1.wav" type="audio/wav; codecs=vorbis">
        <source src="file://chz/records2/113/2017_01_09_12_34_45_6F1.wav" type="audio/wav;">
        <source src="file:\\\\chz\\records2\\113\\2017_01_09_12_34_45_6F1.wav" type="audio/wav;">
        <source src="audio/music.mp3" type="audio/mpeg">
        <source src="audio/2017_01_09_12_34_45_6F1.wav" type="audio/wav">
        Тег audio не поддерживается вашим браузером. 
        <a href="\\CHZ\records2\113\2017_01_09_12_34_45_6F1.wav">Скачайте музыку</a>.
  </audio>
    <a href="file:\\\\chz\\records2\\113\\2017_01_09_12_34_45_6F1.wav">Скачать</a>-->
    
<script>
    var music = $('#music')[0];  
    var f = true;
    var i = 0;
    
    
    $(document).ready(function() {
        $(".item").on('click', function() {
            var patch = $(this).attr('patch');
            var filename = $(this).attr('filename');
            $("#music")[0].pause();
            //$("#music").attr("src", "index.php?r=Audio/Load2&Parameters[out_patch]=" + patch + "&Parameters[out_filename]=" + filename);
            //$("#music")[0].load();
           
            
            $.ajax({
                url: 'index.php?r=Audio/Load&cb=' + new Date().getTime(),
                type: 'POST',
                data: {
                    Parameters: {
                        out_patch: patch,
                        out_filename: filename
                    }
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    //audio = new Audio('http://aliton/audio/274_sound.wav?cb=1');
                    //audio.load();
                    //audio.play();
                    $("#music").attr("src", 'http://aliton/audio/274_sound.wav?cb=' + new Date().getTime());
                    $("#music")[0].load();
                }
                
            });
        });
    });
</script>

<div id="file_text" style="height: 400px; width: 400px; overflow: scroll">
    
</div>

<div id="pnl1">
    <audio controls style="width: 400px" id="music" src="" type="audio/wav"></audio>
</div>

<?php
    $dir = "\\\\CHZ\\records2\\113";

    if ($handle = opendir($dir)) {
        echo "Дескриптор каталога: $handle" + "<br>";
        echo "Файлы:<br>" ;

        /* Именно этот способ чтения элементов каталога является правильным. */
        while (false !== ($file = readdir($handle))) { 
            echo "<a><div class='item' filename='$file' patch='$dir'>$file</div></a><br>";
        }

        /* Этот способ НЕВЕРЕН. */
        while ($file = readdir($handle)) { 
            echo "$file<br>";
        }

        closedir($handle); 
    }

?>



    

