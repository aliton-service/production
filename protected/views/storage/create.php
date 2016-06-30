<?php

$this->renderPartial($view, array('model'=>$model));
//
//
//$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
//	//'success' => '$(".form").togglerEditForm()',
//	'header' => array(
//
//		array(
//			'name' => 'Накладные на приход',
//			'ajax' => true,
//			'options' => array(
//				'url' => '/index.php?r=storage/billComing&view=1',
//				'class' => 'hidden',
//			),
//		),
//		array(
//			'name' => 'Требования на выдачу',
//			'ajax' => true,
//			'options' => array(
//				'url' => '/index.php?r=storage/requireGrant&view=1',
//				'class' => 'hidden',
//			),
//		),
//		array(
//			'name' => 'Накладная на возврат',
//			'ajax' => true,
//			'options' => array(
//				'url' => '/index.php?r=storage/billReturn&view=1',
//				'class' => 'hidden',
//			),
//		),
//		array(
//			'name' => 'Накладная на возврат поставщику',
//			'ajax' => true,
//			'options' => array(
//				'url' => '/index.php?r=storage/billReturnDistrib&view=1',
//				'class' => 'hidden',
//			),
//		),
//		array(
//			'name' => 'Перемещение из ПРЦ на склад',
//			'ajax' => true,
//			'options' => array(
//				'url' => '/index.php?r=storage/movePRC&view=1',
//				'class' => 'hidden',
//			),
//		),
//		array(
//			'name' => 'Перемещение со склада на склад',
//			'ajax' => true,
//			'options' => array(
//				'url' => '/index.php?r=storage/moveStorage&view=1',
//				'class' => 'hidden',
//			),
//		),
//		array(
//			'name' => 'Накладная на возврат мастеру',
//			'ajax' => true,
//			'options' => array(
//				'url' => '/index.php?r=storage/billReturnMaster&view=1',
//				'class' => 'hidden',
//			),
//		),
//
//
//	),
//	'content' => array(
//
//		array(
//			'id' => 'doc-billcoming',
//		),
//		array(
//			'id' => 'doc-requiregrant',
//		),
//		array(
//			'id' => 'doc-billreturn',
//		),
//		array(
//			'id' => 'doc-billreturndistrib',
//		),
//		array(
//			'id' => 'doc-moveprc',
//		),
//		array(
//			'id' => 'doc-movestorage',
//		),
//		array(
//			'id' => 'doc-billreturnmaster',
//		),
//
//	),
//));
//
//
//$this->widget('application.extensions.alitonwidgets.button.albutton', array(
//	'id' => 'create',
//	'Height' => 30,
//	'Text' => 'Сохранить',
//	'Type' => 'none',
//));