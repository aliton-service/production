
<?php
//подгружаем библиотеку
require_once '/protected/components/simple_html_dom.php';
//создаём новый объект
$html = new simple_html_dom();
//загружаем в него данные
$html = file_get_html('http://www.ulmart.ru');
//находим все ссылки на странице и...
/*
if($html->innertext!='' and count($html->find('a'))) {
 foreach($html->find('a') as $a){
        //... что то с ними делаем
     echo $a;
 }
}
* 
*/
//освобождаем ресурсы
$html->clear(); 
unset($html);
?>

