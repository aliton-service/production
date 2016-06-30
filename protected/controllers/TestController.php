<?php

class TestController extends Controller {
    
    public $layout='//layouts/column2';

    public $cookie = 'ScrollHolda_oms_X=0; ScrollHolda_oms_Y=570; _ga=GA1.2.400261084.1448441856; _ym_uid=1448441856522786875; mid=92a55be0-9352-11e5-88fe-899632510ee1; __utma=156674020.400261084.1448441856.1448441857.1450966642.2; __utmz=156674020.1448441857.1.1.utmcsr=yandex|utmccn=(organic)|utmcmd=organic|utmctr=%D0%BC%D0%B5%D0%B3%D0%B0%D1%84%D0%BE%D0%BD; lastLink404=https://moscow.megafon.ru/download/~federal/oferts/oferta_mobilnoe_informirovanie.pdf; topbar__last-visited-url_corporate=http%3A%2F%2Fmoscow.megafon.ru%2Fcorporate%2Fproductsandsolutions%2Fproducts%2Fmobilnoe_informirovanie.html; __utmc=156674020; JSESSIONID=4F148382DFAA3C6683A3BA5ED485C527';
    
    public function actionIndex() {
        $this->render("index");
    }
    
    public function actionParser() {
        $this->render("parser");
    }
    
    public function actionjqxGrid() {
        $this->layout='//layouts/jqxgrid';
        $this->render("jqxgrid");
    }
    
    public function actionjqxGridData() {
        $model = new ListObjects();
        $CountRow = $model->getCountAllRow();
        
        
        $pagenum = $_GET["pagenum"];
        $pagesize = $_GET["pagesize"];
        
        if ($pagenum == 0) $pagenum++;
        
        //$Result = $model->FindAjax($pagenum, $pagesize);
        $Result = $model->Find(array()); // $Result["Data"];
        $data = array();
        
        $data[] = array(
            'TotalRows' => $CountRow,
            'Rows' => $Result
        );
        //$data = $model->Find(array());
	 
	//header("Content-type: application/json"); 
	//echo "{\"data\":" .json_encode($data). "}";
        echo json_encode($data);
    }
    
    public function actionIndex2() {
        $this->renderPartial("index2", null, false, true);
    }
    
    public function actionTest1() {
        $this->renderPartial("test1", null, false, true);
    }
    
    public function actionTest2() {
        $this->renderPartial("test2", null, false, true);
    }
    
    public function actionTest3() {
        $this->renderPartial("test3", null, false, true);
    }
    
    public function actionTest4() {
        $this->renderPartial("test4", null, false, true);
    }
    
    public function actionTest5() {
        $this->renderPartial("test5", null, false, true);
    }
    
    public function actionTest6() {
        $this->renderPartial("test6", null, false, true);
    }
    
    public function actionTest7() {
        $this->renderPartial("test7", null, false, true);
    }
    
    public function actionTest8() {
        $this->renderPartial("test8", null, false, true);
    }
    
    public function actionTest9() {
        $this->renderPartial("test9", null, false, true);
    }
    
    public function actionTest10() {
        $this->renderPartial("test10", null, false, true);
    }
    
    public function actionTest11() {
        $this->renderPartial("test11", null, false, true);
    }
    
    public function actionTest12() {
        $this->renderPartial("test12", null, false, true);
    }
    
    public function actionTest13() {
        $this->renderPartial("test13", null, false, true);
    }
    
    public function actionTest14() {
        $this->renderPartial("test14", null, false, true);
    }
    
    public function actionTest15() {
        $this->renderPartial("test15", null, false, true);
    }
    
    public function actionTest16() {
        $this->renderPartial("test16", null, false, true);
    }
    
    public function actionTest17() {
        $this->renderPartial("test17", null, false, true);
    }
    
    public function actionTest18() {
        $this->renderPartial("test18", null, false, true);
    }
    
    public function actionTest19() {
        $this->renderPartial("test19", null, false, true);
    }
    
    public function actionTest20() {
        $this->layout='//layouts/page';
        $this->render("test20");
    }

    public function actionCurl() {
        $post_data = array(
            'action_ref' => 'p_998364430',
            'aps_time_zone' => '-180',
            'frame_id' => 'APS_1453710709379',
            'login_field' => '(931)311-06-89',
            'p_481721939' => '061660005',
            'request_id' => '54140',
        );

        $header = array(
            'Accept'=>
'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
'Accept-Encoding'=>
'gzip, deflate',
'Accept-Language'=>
'ru-RU,ru;q=0.8,en-US;q=0.5,en;q=0.3',
'Connection'=>
'keep-alive',
'Cookie'=>
'_ga=GA1.2.400261084.1448441856; _ym_uid=1448441856522786875; mid=92a55be0-9352-11e5-88fe-899632510ee1
; __utma=156674020.400261084.1448441856.1448441857.1450966642.2; __utmz=156674020.1448441857.1.1.utmcsr
=yandex|utmccn=(organic)|utmcmd=organic|utmctr=%D0%BC%D0%B5%D0%B3%D0%B0%D1%84%D0%BE%D0%BD; lastLink404
=https://moscow.megafon.ru/download/~federal/oferts/oferta_mobilnoe_informirovanie.pdf; topbar__last-visited-url_corporate
=http%3A%2F%2Fmoscow.megafon.ru%2Fcorporate%2Fproductsandsolutions%2Fproducts%2Fmobilnoe_informirovanie
.html; __utmc=156674020; JSESSIONID=031A14722523463F6F46286AABE47BD0',
'Host'=>
'sms-inform.megafon.ru:8443',
'Referer'=>
'https://sms-inform.megafon.ru:8443/index.jsp',
'User-Agent'=>
'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0',
        );

        $cookie = 'JSESSIONID=4F148382DFAA3C6683A3BA5ED485C527;'
            .'__utma=156674020.400261084.1448441856.1448441857.1450966642.2;'
            .'__utmc=156674020.400261084.1448441856.1448441857.1450966642.2;'
            .'__utmz=156674020.1448441857.1.1.utmcsr=yandex|utmccn=(organic)|utmcmd=organic|utmctr=мегафон;'
            .'_ga=GA1.2.400261084.1448441856;'
            .'_ym_uid=1448441856522786875;'
            .'mid=92a55be0-9352-11e5-88fe-899632510ee1;'
            .'lastLink404=https://moscow.megafon.ru/download/~federal/oferts/oferta_mobilnoe_informirovanie.pdf;'
            .'topbar__last-visited-url_corporate=topbar__last-visited-url_corporate;'
            .'ScrollHolda_oms_X=0;'
            .'ScrollHolda_oms_Y=228;'
            .'Path=/;Secure;HttpOnly';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sms-inform.megafon.ru:8443/index.jsp");
//        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//        curl_setopt($ch, CURLINFO_HEADER_OUT, 1 );
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        //curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; rv:33.0) Gecko/20100101 Firefox/33.0');

        $result = curl_exec($ch);
//        var_dump($result);
//        die;
        echo($result);
?>
        <script>
//            var doc = <?php //echo $result ?>
//            var elem = doc.getElementById('request_id')
//            alert(elem.value)
        </script>
        <?php
        //$this->render('megaphone',array('result'=>$result));

        ?>


        <?php
//        var_dump($result);
//        die;
//        var_dump(curl_getinfo($ch,CURLINFO_HEADER_OUT));



/*
        request_id	        58498
        aps_time_zone        -180
        p_968085377
        p107772740        ELTON
        p_759614445        false
        p1216403422        222px
        p_1379194353        109px
        p328079498        222px
        p1147535075        109px
        p1355893911
        p1696326717
        p_293005933        тест от Егише
        p1532576697        false
        p605278220        1
        p_562738362        null
        p_1324643683        09
        p_1324643678        00
        p_1431531092        21
        p_1431531087        00
        action_ref        p1465881296
        frame_id        APS_1453710709379

//============================================

        request_id	        58652
        aps_time_zone        -180
        p_968085377
        p107772740	        ELTON
        p_759614445	        false
        p1216403422	        234px
        p_1379194353	        127px
        p328079498	        234px
        p1147535075	        127px
        p1355893911
        p1696326717	        79046342540
        p_293005933
        p1532576697	        false
        p605278220        1
        p_562738362        null
        p_1324643683        09
        p_1324643678        00
        p_1431531092        21
        p_1431531087        00
        action_ref        p_2060871764
        action_mode        ive=true
        frame_id        APS_1453710709379
*/
    }


    public function actionSms() {
        $this->render('megaphone');
    }


    public function actionSetPhone() {
        $cookie = 'JSESSIONID=75FF9A1A424B3405668388A5EF36CE24;'
            .'__utma=156674020.400261084.1448441856.1448441857.1450966642.2;'
            .'__utmc=156674020.400261084.1448441856.1448441857.1450966642.2;'
            .'__utmz=156674020.1448441857.1.1.utmcsr=yandex|utmccn=(organic)|utmcmd=organic|utmctr=мегафон;'
            .'_ga=GA1.2.400261084.1448441856;'
            .'_ym_uid=1448441856522786875;'
            .'mid=92a55be0-9352-11e5-88fe-899632510ee1;'
            .'lastLink404=https://moscow.megafon.ru/download/~federal/oferts/oferta_mobilnoe_informirovanie.pdf;'
            .'topbar__last-visited-url_corporate=topbar__last-visited-url_corporate;'
            .'ScrollHolda_oms_X=0;'
            .'ScrollHolda_oms_Y=228;'
            .'Path=/;Secure;HttpOnly';
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sms-inform.megafon.ru:8443/distribution/distribution_send.jsp");
//        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//        curl_setopt($ch, CURLINFO_HEADER_OUT, 1 );
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
        curl_setopt($ch, CURLOPT_REFERER, "https://sms-inform.megafon.ru:8443/distribution/distribution_send.jsp");
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0');

        $result = curl_exec($ch);
        $result = str_replace('href="','href="https://sms-inform.megafon.ru:8443',$result);
        $result = str_replace('src="','src="https://sms-inform.megafon.ru:8443',$result);
       // $result = str_replace('form','form targetId=test',$result);
die($result);
        die(json_encode(array('status'=>'ok')));
    }

    public function actionSendsms() {

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sms-inform.megafon.ru:8443/distribution/distribution_send.jsp");
//        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//        curl_setopt($ch, CURLINFO_HEADER_OUT, 1 );
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $_POST);
        curl_setopt($ch, CURLOPT_REFERER, "https://sms-inform.megafon.ru:8443/distribution/distribution_send.jsp");
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0');

        $result = curl_exec($ch);
        die($result);
        die(json_encode(array('status'=>'ok')));
    }

    public function actionSendform() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://sms-inform.megafon.ru:8443/index.jsp ");
//        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_NOBODY, 1);
//        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
//        curl_setopt($ch, CURLINFO_HEADER_OUT, 1 );
        curl_setopt($ch, CURLOPT_COOKIE, $this->cookie);
        curl_setopt($ch, CURLOPT_POST, 1);
//        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_REFERER, "https://sms-inform.megafon.ru:8443/distribution/distribution_send.jsp");
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:43.0) Gecko/20100101 Firefox/43.0');

        $result = curl_exec($ch);
var_dump($result);
//        die;
        echo($result);
        die;
    }
}



