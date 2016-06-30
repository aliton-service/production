<?php
//var_dump($info);

?>

<!--<div>-->
<!--	<div class="">-->
<!--		<p><label>Наименование: </label><input value="--><?//=$info['EquipName']?><!--"></p>-->
<!--		<p><label>Единицы измерения: </label><input value="--><?//=$info['NameUnitMeasurement']?><!--"></p>-->
<!--		<p><label>Производитель: </label><input value="--><?//=$info['NameSupplier']?><!--"></p>-->
<!--		<p><label>Снят с производства: </label><input value="--><?//=$info['discontinued']?><!--"></p>-->
<!--	</div>-->
<!---->
<!--	<div>-->
<!--		<p><label>Аналоги: </label>-->
<!--			<textarea>-->
<!--				--><?php
//				if(isset($analog) && !empty($analog)) {
//					foreach ($analog as $item) {
//						echo $item['EquipName'];
//					}
//				}
//				?>
<!--			</textarea></p>-->
<!--	</div>-->
<!---->
<!--</div>-->
<!---->
<!---->


<?php

$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'equipId',
	'Value' => $_GET['id'],
	'Visible' => false,
));

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListEquipsAnalog',
	'Stretch' => true,
	'Key' => 'Equips_Analog_Grid_1',
	'ModelName' => 'EquipAnalog',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,

	'Columns' => array(
		'EquipName' => array(
			'Name' => 'Наименование',
			'FieldName' => 'EquipName',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'e.EquipName = :Value',
			),
			'Sort' => array(
				'Up' => 'e.EquipName desc',
				'Down' => 'e.EquipName',
			),
		),
	),
));


$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'create',
	'Height' => 30,
	'Text' => 'Добавить',
	'Type' => 'none',
	'OnAfterClick' => ""
));


?>


<script>

	Aliton.Links = [
		{
			Out: "equipId",
			In: "ListEquipsAnalog",
			TypeControl: "Grid",
			Condition: "ea.Equip_id = :Value",
			Name: "Edit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		}
	]

</script>
