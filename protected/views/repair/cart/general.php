<?php
/**
 *
 * @var RepairController $this
 */
?>
<div class="pull-left" style="background-color: inherit">
	<div class="field pull-left">
		<label>Номер</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'repair_id',
			'Value' => $model->Repr_id,
			'ReadOnly' => true,
		));
		?>
	</div>

	<div class="field pull-left">
		<label>Дата прих. об.</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'date',
			'Value' => DateTimeManager::YiiDateToAliton($model->date),
		));
		?>
	</div>
	<div class="clearfix"></div>

	<div class="field pull-left">
		<label>Срочность</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'RepairPrior',
			'Value' => $model->RepairPrior,
			'ReadOnly' => true,
		));
		?>
	</div>

	<div class="field pull-left" style="margin-top: 20px">
		<?php
		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'moneyWork',
			'Label' => 'Платные работы',
			'Checked' => $model->repair_pay
		));
		?>
	</div>
	<div class="clearfix"></div>

	<div class="field border pull-left" style="background-color: inherit">
		<div class="title" style="background-color: inherit">Дата выполнения</div>
		<div>
			<div class="field pull-left">
				<label>Желаемая</label>
				<?php
				$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
					'id' => 'best_date',
					'Value' => DateTimeManager::YiiDateToAliton($model->best_date),
				));
				?>
			</div>
			<div class="field pull-left">
				<label>Предельная</label>
				<?php
				$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
					'id' => 'deadline',
					'Value' => DateTimeManager::YiiDateToAliton($model->deadline),
				));
				?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="clearfix"></div>

	<div class="field pull-left">
		<label>Адрес объекта</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'addr',
			'Value' => $model->Addr,
			'ReadOnly' => true,
			'Width' => 390
		));
		?>
	</div>

	<div class="field pull-left">
		<label>Номер заявки</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'dmnd_id',
			'Value' => $model->dmnd_id,
			'ReadOnly' => true,
			'Width' => 150
		));
		?>
	</div>
	<div class="clearfix"></div>

	<div class="field pull-left">
		<label>Оборудование</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'EquipName',
			'Value' => $model->EquipName,
			'ReadOnly' => true,
			'Width' => 220
		));
		?>
	</div>

	<div class="field pull-left">
		<label>Ед. изм.</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'um_name',
			'Value' => $model->um_name,
			'ReadOnly' => true,
			'Width' => 80
		));
		?>
	</div>

	<div class="field pull-left">
		<label>Количество</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'docm_quant',
			'Value' => $model->docm_quant,
			'ReadOnly' => true,
			'Width' => 80
		));
		?>
	</div>

	<div class="field pull-left">
		<label>Цена</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'equip_price',
			//'Value' => $model->equip_price,
			'ReadOnly' => true,
			'Width' => 150
		));
		?>
	</div>
	<div class="clearfix"></div>

	<div>
		<div class="field pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'bu',
				'Label' => 'Б/У',
				'Checked' => $model->used,
			));
			?>
		</div>
		<div class="field pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'requireReturn',
				'Label' => 'Требуется возврат',
				'Checked' => $model->return,
			));
			?>
		</div>
		<div class="field pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'worked',
				'Label' => 'Оборудование исправное',
				'Checked' => $model->work_ok,
			));
			?>
		</div>
		<div class="field pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'warranty',
				'Label' => 'Оборудование на гарантии',
				'Checked' => $model->wrnt,
			));
			?>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<div class="pull-left">
	<div class="field">
		<label>Комплектность</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
			'id' => 'set',
			'Value' => $model->set,
			'ReadOnly' => true,
			'Width' => 220,
			'Height' => 100
		));
		?>
	</div>

	<div class="field">
		<label>Неисправность</label>
		<?php
		$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
			'id' => 'defect',
			'Value' => $model->defect,
			'ReadOnly' => true,
			'Width' => 220,
			'Height' => 200
		));
		?>
	</div>
</div>
<div class="clearfix"></div>

