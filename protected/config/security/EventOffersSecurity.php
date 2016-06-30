<?php
return array(

	/** Роли для таблицы EventOffers (событие) **/
	'ManagerEventOffers' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerEventOffers',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'EventOffers/index',
		'children' => array(
			'ViewEventOffers',
			'CreateEventOffers',
			'UpdateEventOffers',
		),
	),

	'AdminEventOffers' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminEventOffers',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'EventOffers/index',
		'children' => array(
			'ViewEventOffers',
			'CreateEventOffers',
			'UpdateEventOffers',
			'DeleteEventOffers',
		),
	),

	'UserEventOffers' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserEventOffers',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'EventOffers/index',
		'children' => array(
			'ViewEventOffers'
		),
	),

	'ViewEventOffers' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewEventOffers',
		'bizRule' => null,
		'data' => null,
	),

	'CreateEventOffers' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateEventOffers',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateEventOffers' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateEventOffers',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteEventOffers' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteEventOffers',
		'bizRule' => null,
		'data' => null,
	),

);