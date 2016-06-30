<?php


class genPdf {

	static function newPdf($orientation='P', $unit='mm', $format='A4', $unicode=true, $encoding='UTF-8', $diskcache=false, $pdfa=false) {

		require_once dirname(__FILE__).'/tcpdf/tcpdf.php';
		return new TCPDF($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);

	}


}



















?>