<script>
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

<?php 
//    if ($handle = opendir("\\CHZ\\records2")) {
//        echo "Дескриптор каталога: $handle\n";
//        echo "Файлы:\n";
//
//        /* Именно этот способ чтения элементов каталога является правильным. */
//        while (false !== ($file = readdir($handle))) { 
//            echo "$file\n";
//        }
//
//        /* Этот способ НЕВЕРЕН. */
//        while ($file = readdir($handle)) { 
//            echo "$file\n";
//        }
//
//        closedir($handle); 
//    }

?>

    

