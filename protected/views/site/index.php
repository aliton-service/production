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

