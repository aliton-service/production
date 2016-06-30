<?php
/**
 *
 * @var RepairController $this
 * @var \Repair $model
 */

if($model->status != 4) die('Оборудование не находится в ремонте в СРМ');
?>


<div class="field border" style="background-color: inherit">
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
