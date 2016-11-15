<?php
return array(

	'ManagerOfferDemands' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerOfferDemands',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'OfferDemands/index',
		'children' => array(
			'ViewOfferDemands',
			'CreateOfferDemands',
			'UpdateOfferDemands',
		),
	),

	'AdminOfferDemands' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminOfferDemands',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'OfferDemands/index',
		'children' => array(
			'ViewOfferDemands',
			'CreateOfferDemands',
			'UpdateOfferDemands',
			'DeleteOfferDemands',
		),
	),

	'UserOfferDemands' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserOfferDemands',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'OfferDemands/index',
		'children' => array(
			'ViewOfferDemands'
		),
	),

	'ViewOfferDemands' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewOfferDemands',
		'bizRule' => null,
		'data' => null,
	),

	'CreateOfferDemands' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateOfferDemands',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateOfferDemands' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateOfferDemands',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteOfferDemands' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteOfferDemands',
		'bizRule' => null,
		'data' => null,
	),

);