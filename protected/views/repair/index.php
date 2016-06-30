<?php
/**
 *
 * @var RepairController $this
 */

$this->title = 'Заявки на ремонт';

?>
<ul class="filter">
	<li>
		<?php
		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'NoTrans',
			'Label' => 'Непринятые в ремонт',
		));

		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'NoRepair',
			'Label' => 'Невыполненный ремонт',
		));

		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'RequireReturn',
			'Label' => 'Требуется возврат',
		));

		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'NoReturn',
			'Label' => 'Не требуется возврат',
		));

		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'RepeatRepair',
			'Label' => 'Повторный ремонт',
		));

		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'NotExec',
			'Label' => 'Невыполненные заявки',
		));
		?>
	</li>

	<li>
		<label>Мастер:</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'repair-master',
			'Stretch' => true,
			'ModelName' => 'Employees',
			'Height' => 300,
			'Width' => 250,
			'KeyField' => 'Employee_id',
			'FieldName' => 'EmployeeName',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'e.EmployeeName like \':Value%\'',
			),
			'Columns' => array(
				'group_name' => array(
					'Name' => 'Мастер',
					'FieldName' => 'EmployeeName',
					'Width' => 300,
				),
			),
		));
		?>

		<label>Инженер:</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'repair-egnr',
			'Stretch' => true,
			'ModelName' => 'Employees',
			'Height' => 300,
			'Width' => 250,
			'KeyField' => 'Employee_id',
			'FieldName' => 'EmployeeName',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'e.EmployeeName like \':Value%\'',
			),
			'Columns' => array(
				'group_name' => array(
					'Name' => 'Инженер',
					'FieldName' => 'EmployeeName',
					'Width' => 300,
				),
			),
		));
		?>

		<label>Адрес объекта:</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'addr-obj',
			'Stretch' => true,
			'ModelName' => 'ListObjects',
			'Height' => 300,
			'Width' => 250,
			'KeyField' => 'Address_id',
			'FieldName' => 'Addr',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'Addr like \':Value%\'',
			),
			'Columns' => array(
				'Addr' => array(
					'Name' => 'Адрес',
					'FieldName' => 'Addr',
					'Width' => 300,
				),
			),
		));
		?>
	</li>

	<li>
		<label>СО:</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'so',
			'Stretch' => true,
			'ModelName' => 'Territory',
			'Height' => 300,
			'Width' => 200,
			'KeyField' => 'Territ_Id',
			'FieldName' => 'Territ_Name',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'Territ_Name like \':Value%\'',
			),
			'Columns' => array(
				'Territ_Name' => array(
					'Name' => 'СО',
					'FieldName' => 'Territ_Name',
					'Width' => 250,
				),
			),
		));
		?>

		<label>За период с</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'date-begin',
			'Width'=>200,
		));
		?>
		<label>по</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'date-end',
			'Width'=>200,
		));
		?>
	</li>
</ul>
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'repair',
	'Stretch' => true,
	'Key' => 'Repair_Index_Grid_1',
	'ModelName' => 'Repair',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'status_name' => array(
			'Name' => 'Статус',
			'FieldName' => 'status_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.status_name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.status_name desc',
				'Down' => 'r.status_name',
			),
		),

		'Addr' => array(
			'Name' => 'Адрес',
			'FieldName' => 'Addr',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.Addr Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.Addr desc',
				'Down' => 'r.Addr',
			),
		),

		'EquipName' => array(
			'Name' => 'Оборудование',
			'FieldName' => 'EquipName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.status_EquipNameEquipNameame Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.EquipName desc',
				'Down' => 'r.EquipName',
			),
		),

		'RepairPrior' => array(
			'Name' => 'Приоритет',
			'FieldName' => 'RepairPrior',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.RepairPrior Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.RepairPrior desc',
				'Down' => 'r.RepairPrior',
			),
		),

		'defect' => array(
			'Name' => 'Неисправность',
			'FieldName' => 'defect',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.defect Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.defect desc',
				'Down' => 'r.defect',
			),
		),

		'SN' => array(
			'Name' => 'Серийный номер',
			'FieldName' => 'SN',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.SN Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.SN desc',
				'Down' => 'r.SN',
			),
		),

		'mstr_empl_name' => array(
			'Name' => 'Мастер',
			'FieldName' => 'mstr_empl_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.mstr_empl_name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.mstr_empl_name desc',
				'Down' => 'r.mstr_empl_name',
			),
		),

		'egnr_empl_name' => array(
			'Name' => 'Инженер',
			'FieldName' => 'egnr_empl_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.egnr_empl_name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.egnr_empl_name desc',
				'Down' => 'r.egnr_empl_name',
			),
		),

		'deadline' => array(
			'Name' => 'Предельная дата',
			'FieldName' => 'deadline',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.deadline Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.deadline desc',
				'Down' => 'r.deadline',
			),
		),

		'date_ready' => array(
			'Name' => 'Дата выполнения ремонта',
			'FieldName' => 'date_ready',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.date_ready Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.date_ready desc',
				'Down' => 'r.date_ready',
			),
		),

		'date_exec' => array(
			'Name' => 'Дата выполнения',
			'FieldName' => 'date_exec',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.date_exec Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.date_exec desc',
				'Down' => 'r.date_exec',
			),
		),

		'resultname' => array(
			'Name' => 'Результат диагностики',
			'FieldName' => 'resultname',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.resultname Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.resultname desc',
				'Down' => 'r.resultname',
			),
		),

		'Territ_Name' => array(
			'Name' => 'Сервисное отделение',
			'FieldName' => 'Territ_Name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'r.Territ_Name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'r.Territ_Name desc',
				'Down' => 'r.Territ_Name',
			),
		),

	),

));

?>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'addition',
		'Height' => 30,
		'Text' => 'Дополнительно',
		'Type' => 'none',
		'OnAfterClick' => 'window.open("/?r=repair/view&id="+algridajaxSettings.repair.CurrentRow["Repr_id"])'
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'create',
		'Width' => 120,
		'Height' => 30,
		'Text' => 'Создать',
		'Href' => Yii::app()->createUrl('repair/create')
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'export-grid',
		'Height' => 30,
		'Text' => 'Экспорт в XLS',
	));
	?>
</div>

<?php
$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(


	'header' => array(
		array(
			'name'=>'Общая',
		),
		array(
			'name'=>'Ход работ',
		),
		array(
			'name'=>'Документы',
		),
	),
	'content'=> array(
		array(
			'id' => 'info-general',
		),
		array(
			'id'=>'info-process',
		),

		array(
			'id'=>'info-documents',
		),
	),
));

?>


<script>
	Aliton.Links = [
		{
			Out: "NoTrans",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.date_accept is null",
			ConditionFalse: "",
			Name: "repair_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "NoRepair",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.date_ready is null",
			ConditionFalse: "",
			Name: "repair_Filter2",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},

		{
			Out: "NotExec",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.date_exec is null",
			ConditionFalse: "",
			Name: "repair_Filter5",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "RequireReturn",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.[return] = 1",
			ConditionFalse: "",
			Name: "repair_Filter3",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "NoReturn",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.[return] = 0",
			ConditionFalse: "",
			Name: "repair_Filter4",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "RepeatRepair",
			In: "repair",
			TypeControl: "Grid",
			Condition: "datediff(d, dbo.truncdate(r.date_exec), getdate()) <= <?php echo Repair::DAYS_REPEAT_REPAIR ?>",
			ConditionFalse: "",
			Name: "repair_Filter5",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "date-begin",
			In: "repair",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(r.date) >= dbo.truncdate(':Value')",
			Field: "date",
			Name: "repair_Filter6",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "date-end",
			In: "repair",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(r.date) <= dbo.truncdate(':Value')",
			Field: "date",
			Name: "repair_Filter7",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "repair-egnr",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.egnr_empl_id = :Value",
			Name: "repair_Filter8",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "repair-master",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.mstr_empl_id = :Value",
			Name: "repair_Filter9",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "addr-obj",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.Address_id = :Value",
			Name: "repair_Filter10",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "so",
			In: "repair",
			TypeControl: "Grid",
			Condition: "r.Territ_Id = :Value",
			Name: "repair_Filter11",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
	]
</script>
