<?php
if($model->status != 3) die('Оборудование не находится в ремонте в ПРЦ');
?>
<label>Заявленная неисправность 2</label>
<?php
$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
	'id' => 'defect2',
	'Width' => 660,
	'Height' => 60,
	'Value' => $model->edefect,
));
?>
<label>Примечание</label>
<?php
$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
	'id' => 'note',
	'Width' => 660,
	'Height' => 40,
	'Value' => $model->edefect,
));

?>

<div class="field border pull-left" style="background-color: inherit">
	<div class="title" style="background-color: inherit">Дата выполнения ремонта</div>
	<div>
		<div class="field pull-left">
			<label>Планируемая</label>
			<?php
			$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
				'id' => 'date_plan',
				'Value' => DateTimeManager::YiiDateToAliton($model->date_plan),
			));
			?>
		</div>
		<div class="field pull-left">
			<label>Фактическая</label>
			<?php
			$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
				'id' => 'date_ready',
				'Value' => DateTimeManager::YiiDateToAliton($model->date_ready),
			));
			?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="field pull-left">
	<label>Приступил к работе</label>
	<?php
	$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
		'id' => 'date_start'
	));
	?>
</div>
<div class="clearfix"></div>


