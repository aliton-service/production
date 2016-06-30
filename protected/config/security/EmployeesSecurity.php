<?php
return array(

	/**  Employees **/
	'ManagerEmployees' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'ManagerEmployees',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Employees/index',
		'children' => array(
			'ViewEmployees',
			'CreateEmployees',
			'UpdateEmployees',
		),
	),

	'AdminEmployees' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'AdminEmployees',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Employees/index',
		'children' => array(
			'ViewEmployees',
			'CreateEmployees',
			'UpdateEmployees',
			'DeleteEmployees',
                        'ManagerEmployees',
		),
	),

	'UserEmployees' => array(
		'type' => CAuthItem::TYPE_ROLE,
		'description' => 'UserEmployees',
		'bizRule' => null,
		'data' => null,
		'defaultIndex' => 'Employees/index',
		'children' => array(
			'ViewEmployees'
		),
	),

	'ViewEmployees' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'ViewEmployees',
		'bizRule' => null,
		'data' => null,
	),

	'CreateEmployees' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'CreateEmployees',
		'bizRule' => null,
		'data' => null,
	),

	'UpdateEmployees' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'UpdateEmployees',
		'bizRule' => null,
		'data' => null,
	),

	'DeleteEmployees' => array(
		'type' => CAuthItem::TYPE_OPERATION,
		'description' => 'DeleteEmployees',
		'bizRule' => null,
		'data' => null,
	),

);