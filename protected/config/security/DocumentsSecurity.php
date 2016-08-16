<?php
return array(

	/**  Documents  **/
	'ManagerDocuments' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerDocuments',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Documents/index',
		'children' => array(
			'ViewDocuments',
			'CreateDocuments',
			'UpdateDocuments',
		),
	),

	'AdminDocuments' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminDocuments',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Documents/index',
		'children' => array(
			'ViewDocuments',
			'CreateDocuments',
			'UpdateDocuments',
			'DeleteDocuments',
		),
	),

	'UserDocuments' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserDocuments',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Documents/index',
		'children' => array(
			'ViewDocuments'
		),
	),

	'ViewDocuments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewDocuments',
		'bizRule' => null,
		'data' => null,
	),

	'CreateDocuments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateDocuments',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateDocuments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateDocuments',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteDocuments' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteDocuments',
		'bizRule' => null,
		'data' => null,
	),

);