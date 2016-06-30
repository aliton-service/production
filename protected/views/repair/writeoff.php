<?php
/**
 *
 * @var RepairController $this
 */
?>
<h3>Списание оборудования</h3>
<?php

$Employees = new Employees();
$Employees = $Employees->getData();
$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
	'id' => 'repair-master',
	'popupid' => 'repair-master-grid',
	'data' => $Employees,
	'label' => 'Мастер',
	'name' => 'Master',
	'fieldname' => 'EmployeeName',
	'keyfield' => 'Employee_id',
	'keyvalue' => 274,
	'width' => 200,
	'showcolumns' => true,
	'columns' => array(
		'Master' => array(
			'name' => 'Мастер',
			'fieldname' => 'EmployeeName',
			'width' => 250,
			'height' => 23,
		),
	),
));