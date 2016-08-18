<?php
return array(

	/** ContractsS **/
	'ManagerContractsS' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerContractsS',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'ContractsS/index',
		'children' => array(
			'ViewContractsS',
			'CreateContractsS',
			'UpdateContractsS',
		),
	),

	'AdminContractsS' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminContractsS',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'ContractsS/index',
		'children' => array(
			'ViewContractsS',
			'CreateContractsS',
			'UpdateContractsS',
			'DeleteContractsS',
		),
	),

	'UserContractsS' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserContractsS',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'ContractsS/index',
		'children' => array(
			'ViewContractsS'
		),
	),

	'ViewContractsS' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewContractsS',
		'bizRule' => null,
		'data' => null,
	),

	'CreateContractsS' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateContractsS',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateContractsS' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateContractsS',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteContractsS' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteContractsS',
		'bizRule' => null,
		'data' => null,
	),

);