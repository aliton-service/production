<?php

ini_set('max_execution_time', 100);
class PdfController extends Controller {

	private $pdf;

	public function actionRender($action = 'renderTest', $orient = 'L') {

		$this->pdf = genPdf::newPdf($orient);
		$this->pdf->SetFont('times', '', 10);
		$this->$action($this->pdf);
		$this->pdf->Output('example_001.pdf', 'I');

	}

	public function renderTest(&$pdf) {
		$pdf->AddPage();

		// set text shadow effect
		$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));

		// Set some content to print
		$html = <<<EOD
			<h1>Welcome to <a href="http://www.tcpdf.org" style="text-decoration:none;background-color:#CC0000;color:black;">&nbsp;<span style="color:black;">TC</span><span style="color:white;">PDF</span>&nbsp;</a>!</h1>
			<i>This is the first example of TCPDF library.</i>
			<p>This text is printed using the <i>writeHTMLCell()</i> method but you can also use: <i>Multicell(), writeHTML(), Write(), Cell() and Text()</i>.</p>
			<p>Please check the source code documentation and other examples for further information.</p>
			<p style="color:#CC0000;">TO IMPROVE AND EXPAND TCPDF I NEED YOUR SUPPORT, PLEASE <a href="http://sourceforge.net/donate/index.php?group_id=128076">MAKE A DONATION!</a></p>
EOD;

		// Print text using writeHTMLCell()
		$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	}


	public function DeliveryDemands(&$pdf) {
		$pdf->AddPage();

		$request = new CHttpRequest;
        $data = $request->getParam('data',array());

        // if(!$data) {
        // 	throw new Exception("Not params");        	
        // }

        $model = new Delivery;
        
		$model->setFilter($data);

		$DataRow = $model->Find(array());
        $Data = $model->filter($DataRow);
        $html = '';
        foreach ($Data as $key) {
        	$html .= "<tr>
        		<td>{$key['dldm_id']}</td>
        		<td>".Yii::app()->dateFormatter->formatDateTime($key['date'], 'long','short')."</td>
        		<td>{$key['MasterName']}</td>
        		<td>{$key['user_sender_name']}</td>
        		<td>{$key['DemandPrior']}</td>
        		<td>".Yii::app()->dateFormatter->formatDateTime($key['deadline'], 'long','short')."</td>
        		<td>{$key['Addr']}</td>
        		<td>{$key['user_logist_name']}</td>
        		<td>".Yii::app()->dateFormatter->formatDateTime($key['date_logist'], 'long','short')."</td>
        		<td>".Yii::app()->dateFormatter->formatDateTime($key['date_delivery'], 'long','short')."</td>
        		<td>{$key['DeliveryMan']}</td>
        	</tr>";
        }


        $doc = "<h1 style=\"text-align:center\">Заявки на доставку</h1>
        <table cellpadding=\"5\" border=\"1\">
        	<thead>
        		<tr>
        			<td><b>Код</b></td>
        			<td><b>Дата</b></td>
        			<td><b>Мастер</b></td>
        			<td><b>Подал</b></td>
        			<td><b>Приоритет</b></td>
        			<td><b>Предельная дата</b></td>
        			<td><b>Адрес</b></td>
        			<td><b>Принял</b></td>
        			<td><b>Дата принятия</b></td>
        			<td><b>Дата выполнения</b></td>
        			<td><b>Курьер</b></td>
        		</tr>
        	</thead>

        	<tbody>{$html}</tbody>
        </table>";



        $pdf->writeHTMLCell(0, 0, '', '', $doc, 0, 1, 0, true, '', true);
	}


	public function DeliveryDemandsDelay(&$pdf) {
		$pdf->AddPage();
                $work_info = true;

		 $model = new Delivery('', true);

                 //$model->Query->AddWhere("d.plandate>d.date_delivery");
                 $model->Query->setOrder(" order by d.mstr_id desc ");
                 // echo $model->Query->text;

                $request = new CHttpRequest;
                $data = $request->getParam('data',array());
		$model->setFilter($data);

		$DataRow = $model->Find(array());
                $Data = $model->filter($DataRow);
                
                $html = "<h1 style=\"text-align:center\">Нурешения сроков на доставку</h1>"
                        ."<table cellpadding=\"5\" border=\"1\"><tr>
                                <td>Подана</td>
                                <td>Принята</td>
                                <td>Выполнена</td>
                                <td>Проритет/Вид доставки</td>
                                <td>Проср-н</td>
                                <td>Мастер</td>
                                <td>Адрес</td>
                                <td>Код</td>
                                <td>Отчет курьера</td>
                                <td>Текст заявки</td>
                                <td>Департамент</td>
                                
                        </tr></table>";

                // foreach ($Data as $key) {
                // 	$html .= "<h2>{$key['mstr_id']}</h2>
                //                 <table cellpadding=\"5\" border=\"1\">
                //                      <tr>
                //                         <td>".Yii::app()->dateFormatter->formatDateTime($key['date'], 'long','short')."</td>
                //                         <td>".Yii::app()->dateFormatter->formatDateTime($key['date_logist'], 'long','short')."</td>
                //                         <td>".Yii::app()->dateFormatter->formatDateTime($key['date_delivery'], 'long','short')."</td>
                //                         <td>{$key['date']}</td>
                //                         <td>{$key['date']}</td>
                //                         <td>{$key['MasterName']}</td>
                //                         <td>{$key['date']}</td>
                //                      </tr>
                //                 </table>";
                // }

                $kol = 0;
                for ($i=0; $i < count($Data); $i++) { 

                        $delivery_comment_model = new DeliveryComments;
                        $delivery_comment_model->dldm_id = $Data[$i]['dldm_id'];
                        $_comments = $delivery_comment_model->search()->data;

                      $kol++;
                        if ($i>0) {

                                 if ($Data[$i]['mstr_id'] != $Data[$i-1]['mstr_id']) {
                                        $html .= "</table><p>Всего заявок по мастеру $kol</p><h2>{$Data[$i]['mstr_id']}</h2>
                                        <table cellpadding=\"5\" border=\"1\">
                                        ";
                                        $kol=0;

                                 }
                                 else {
                                        $html .= "";
                                 }
                                        
                                        $html.="<tr>
                                                <td>".Yii::app()->dateFormatter->formatDateTime($Data[$i]['date'], 'long','short')."</td>
                                                <td>".Yii::app()->dateFormatter->formatDateTime($Data[$i]['date_logist'], 'long','short')."</td>
                                                <td>".Yii::app()->dateFormatter->formatDateTime($Data[$i]['date_delivery'], 'long','short')."</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['MasterName']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['rep_delivery']}</td>
                                                <td>{$Data[$i]['text']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                             </tr>";
                                if ($work_info) {
                                        $html .= "<tr>
                                                <td colspan=\"3\">Ход работ</td>
                                        </tr>
                                        <tr>
                                                <td>Дата</td>
                                                <td colspan=\"2\">Администрирующий</td>
                                                <td colspan=\"3\">Текст</td>
                                        </tr>";
                                        if (count($_comments)>0) {
                                                foreach ($_comments as $comment) {
                                                        $html .= "<tr>
                                                                <td>{$comment['DateCreate']}</td>
                                                        </tr>";
                                                }
                                                
                                        }
                                }
                                
                                
                        }
                        else {
                                $html .= "<h2>{$Data[$i]['mstr_id']}</h2>
                                        <table cellpadding=\"5\" border=\"1\">
                                        <tr>
                                                <td>".Yii::app()->dateFormatter->formatDateTime($Data[$i]['date'], 'long','short')."</td>
                                                <td>".Yii::app()->dateFormatter->formatDateTime($Data[$i]['date_logist'], 'long','short')."</td>
                                                <td>".Yii::app()->dateFormatter->formatDateTime($Data[$i]['date_delivery'], 'long','short')."</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['MasterName']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                                <td>{$Data[$i]['rep_delivery']}</td>
                                                <td>{$Data[$i]['text']}</td>
                                                <td>{$Data[$i]['date']}</td>
                                             </tr>";
                                if ($work_info) {
                                        $html .= "<tr>
                                                <td colspan=\"3\">Ход работ</td>
                                        </tr>
                                        <tr>
                                                <td>Дата</td>
                                                <td colspan=\"2\">Администрирующий</td>
                                                <td colspan=\"3\">Текст</td>
                                        </tr>";
                                        if (count($_comments)>0) {
                                                foreach ($_comments as $comment) {
                                                        $html .= "<tr>
                                                                <td>{$comment['DateCreate']}</td>
                                                        </tr>";
                                                }
                                                
                                        }
                                }
                        }
                       
                        $html .= "<tr><td colspan=\"11\"><hr></td></tr>";
                }
                $html .= "</table>";
                //echo $html;

                $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
	}


        public function DemandsGeneral(&$pdf) {
                $model = new Demands;

                $data = $model->getReportGeneral();

        }


}

