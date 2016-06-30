<?php
/**
 *
 * @var \Repair $model
 */
?>

<div class="form form-options">

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'repairs-form',
		'htmlOptions'=>array(
			'class'=>'form-inline'
		),
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	)); ?>
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'Адрес объекта'); ?>
<!--		--><?php //echo $form->dropDownList($model,'objc_id', $model->getObjectList(), array(//'name'=>'objc_id',
//			'class'=>'form-control',
//			'id'=>'object',
//			'empty'=>array(''=>'выбрать адрес объекта'),
//
//		)); ?>
<!--		--><?php //echo $form->error($model,'Object_id'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->checkBox($model,'used',array('class'=>'form-control')); ?>
<!--		--><?php //echo $form->labelEx($model,'used'); ?>
<!--		--><?php //echo $form->error($model,'used'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'date'); ?>
<!--		--><?php //echo $form->textField($model,'date',array('class'=>'form-control datepicker')); ?>
<!--		--><?php //echo $form->error($model,'date'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model, 'eqip_id') ?>
<!--		--><?php //echo $form->dropDownList($model, 'eqip_id', Equips::all(), array(
//			'class'=>'form-control',
//			'id'=>'equip',
//			'empty'=>array(''=>'выбрать оборудование'),
//			'style' => 'width:500px;',
//		))?>
<!--		--><?php //echo $form->error($model,'eqip_id'); ?>
<!--	</div>-->
<!---->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model,'docm_quant'); ?>
<!--		--><?php //echo $form->textField($model,'docm_quant',array('class'=>'form-control datepicker')); ?>
<!--		--><?php //echo $form->error($model,'docm_quant'); ?>
<!--	</div>-->
<!---->
<!---->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->checkBox($model,'return',array('class'=>'form-control')); ?>
<!--		--><?php //echo $form->labelEx($model,'return'); ?>
<!--		--><?php //echo $form->error($model,'return'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->checkBox($model,'wrnt',array('class'=>'form-control')); ?>
<!--		--><?php //echo $form->labelEx($model,'wrnt'); ?>
<!--		--><?php //echo $form->error($model,'wrnt'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->checkBox($model,'work_ok',array('class'=>'form-control')); ?>
<!--		--><?php //echo $form->labelEx($model,'work_ok'); ?>
<!--		--><?php //echo $form->error($model,'work_ok'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model, 'prtp_id') ?>
<!--		--><?php //echo $form->dropDownList($model, 'prtp_id', RepairPriors::all(), array(
//			'class'=>'form-control',
//			'id'=>'equip',
//			'empty'=>array(''=>'выбрать приоритет'),
//			'style' => 'width:500px;',
//		))?>
<!--		--><?php //echo $form->error($model,'eqip_id'); ?>
<!--	</div>-->
<!---->
<!---->
<!--	<div class="row">-->
<!--		--><?php //echo $form->labelEx($model, 'SN') ?>
<!--		--><?php //echo $form->textField($model,'SN',array('class'=>'form-control')); ?>
<!--		--><?php //echo $form->error($model,'SN'); ?>
<!--	</div>-->
<!---->
<!--	<div class="row buttons">-->
<!--		--><?php //echo CHtml::submitButton('Сохранить', array('class'=>'btn btn-primary')); ?>
<!--	</div>-->
<!---->
<!---->
<!---->
<!--	<div class="row timepicker" style="position:absolute;background-color:white;margin:0;display:none;outline:2px solid orange">-->
<!--		<label style="*color:orange">выберите время</label><br><br>-->
<!--		<input class="hours form-control">-->
<!--		<input class="minutes form-control">-->
<!--		<input type="button" value="ok" class="add-time form-control btn btn-info">-->
<!--	</div>-->


		<?php
		if($this->action->id == 'create' || $this->action->id == 'update') {

			if($this->action->id =='create') {
				?>
<!--				<div class="form-field" id="repair-repeat">-->
<!--				--><?php
//				//echo $form->labelEx($model, 'Ремонт производится повторно');
//				echo $form->labelEx($model,'Выберите причину повторного ремонта');
//				$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
//					'id' => 'repr-repeat',
//					'popupid' => 'repr-repeat-grid',
//					'data' => RepairRepeatReason::getData(),
//					'label' => '',
//					'name' => 'Repair[Repr_repeat_id]',
//					'fieldname' => 'Repr_repeat_name',
//					'keyfield' => 'Repr_repeat_id',
//					'keyvalue' => $model->objc_id,
//					'width' => 200,
//					'showcolumns' => true,
//					'columns' => array(
//						'ReprRepeat' => array(
//							'name' => 'Причина повторного ремонта',
//							'fieldname' => 'Repr_repeat_name',
//							'width' => 150,
//							'height' => 23,
//						),
//					),
//
//
//				));
//				?>
<!--				</div><hr>-->

				<div class="form-field">
<!--					--><?php //echo $form->checkBox($model,'Tmp_equip_replace',array('class'=>'form-control')); ?>
<!--					--><?php //echo $form->labelEx($model,'Tmp_equip_replace', array('for'=>'Repair_Tmp_equip_replace')); ?>
					<?php
					$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
						'id' => 'tmpEquipReplace',
						'Label' => 'Установленно подменное оборудование',
						'Name' => 'Repair[Tmp_equip_replace]',
						'Checked' => $model->Tmp_equip_replace
					));
					?>
					<?php echo $form->error($model,'Tmp_equip_replace'); ?>
				</div>
				<div class="clearfix"></div>

				<div class="field pull-left">
					<?php echo $form->labelEx($model,'date'); ?>
					<?php //echo $form->textField($model,'date',array('class'=>'form-control datepicker')); ?>
					<?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'date',
						'Name' => 'Repair[date]',

					)); ?>
					<?php echo $form->error($model,'date'); ?>
				</div>
				<div class="field pull-left">
					<?php echo $form->labelEx($model,'prtp_id'); ?>
					<?php
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'repair-priors',
						'Stretch' => true,
						'ModelName' => 'RepairPriors',
						'Height' => 300,
						'Width' => 250,
						'KeyField' => 'prtp_id',
						'FieldName' => 'RepairPrior',
						'Name' => 'Repair[prtp_id]',
						'KeyValue' => $model->prtp_id,
						'Type' => array(
							'Mode' => 'Filter',
							'Condition' => 'rp.RepairPrior like \':Value%\'',
						),
						'Columns' => array(
							'RepairPrior' => array(
								'Name' => 'Приоритет',
								'FieldName' => 'RepairPrior',
								'Width' => 300,
							),
						),
					));
					?>
					<?php echo $form->error($model,'prtp_id'); ?>
				</div>
				<div class="clearfix"></div>

				<?php
			}
		?>
			<div class="field border pull-left" style="background-color: inherit">
				<div class="title">Дата выполнения</div>
				<div>
					<div class="field pull-left">
						<label>Желаемая</label>
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'best_date',
							'Value' => DateTimeManager::YiiDateToAliton($model->best_date),
							'Name' => 'Repair[best_date]'
						));
						?>
					</div>
					<div class="field pull-left">
						<label>Предельная</label>
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'deadline',
							'Name' => 'Repair[deadline]',
						));
						?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

				<div class="clearfix"></div>

	<div class="field pull-left">
		<?php echo $form->labelEx($model,'Адрес'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'addr-obj',
			'Stretch' => true,
			'ModelName' => 'ListObjects',
			'Height' => 300,
			'Width' => 350,
			'KeyField' => 'Object_id',
			'FieldName' => 'Addr',
			'Name' => 'Repair[obcj_id]',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'Addr like \':Value%\'',
			),
			'Columns' => array(
				'Addr' => array(
					'Name' => 'Адрес',
					'FieldName' => 'Addr',
					'Width' => 350,
				),
			),
			'OnAfterChange' => 'checkRepeatRepair(); getServiceDept();',
		));
		?>
	</div>
	<div class="field pull-left">
		<?php echo $form->labelEx($model,'Юр. лицо'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'juric',
			'Stretch' => true,
			'ModelName' => 'Juridicals',
			'Height' => 300,
			'Width' => 200,
			'KeyField' => 'Jrdc_Id',
			'FieldName' => 'JuridicalPerson',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'jur.JuridicalPerson like \':Value%\'',
			),
			'Columns' => array(
				'JuridicalPerson' => array(
					'Name' => 'Юр. лицо',
					'FieldName' => 'JuridicalPerson',
					'Width' => 250,
				),
			),
		));

		?>
	</div>
			<div class="clearfix"></div>

	<div class="field pull-left">
		<?php echo $form->labelEx($model,'Оборудование'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'equip',
			'Stretch' => true,
			'ModelName' => 'Equips',
			'Height' => 300,
			'Width' => 250,
			'KeyField' => 'Equip_id',
			'FieldName' => 'EquipName',
			'Name' => 'Repair[eqip_id]',
			'KeyValue' => $model->eqip_id,
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'e.EquipName like \':Value%\'',
			),
			'Columns' => array(
				'EquipName' => array(
					'Name' => 'Оборудование',
					'FieldName' => 'EquipName',
					'Width' => 300,
				),
			),
			'OnAfterChange' => 'if(alcomboboxajaxSettings.equip.CurrentRow) { getInfoEquip(alcomboboxajaxSettings.equip.CurrentRow["Equip_id"]); }'
		));

		?>

		</div>
			<div class="form-field" id="repair-repeat" style="display: none;">
				<?php
				//echo $form->labelEx($model, 'Ремонт производится повторно');
				echo $form->labelEx($model,'Выберите причину повторного ремонта');
				$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
					'id' => 'repr-repeat',
					'Stretch' => true,
					'ModelName' => 'RepairRepeatReason',
					'Height' => 300,
					'Width' => 250,
					'KeyField' => 'Equip_id',
					'FieldName' => 'Repr_repeat_name',
					'Name' => 'Repair[objc_id]',
					'KeyValue' => $model->objc_id,
					'Type' => array(
						'Mode' => 'Filter',
						'Condition' => 'rr.Repr_repeat_name like \':Value%\'',
					),
					'Columns' => array(
						'Repr_repeat_name' => array(
							'Name' => 'Причина повторного ремонта',
							'FieldName' => 'Repr_repeat_name',
							'Width' => 300,
						),
					),
				));

				?>
			</div>
<!--		<div class="form-field">-->
<!--			--><?php //echo $form->labelEx($model, 'Ед. изм.') ?>
<!--			--><?php //echo $form->textField($model,'Um_name',array('class'=>'form-control')); ?>
<!--			--><?php //echo $form->error($model,'Um_name'); ?>
<!--		</div>-->
			<div class="field pull-left">
				<?php echo $form->labelEx($model,'Ед. изм.'); ?>
				<?php
				$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
					'id' => 'um_name',
					'Name' => 'Repair[um_name]',
					'Value' => $model->um_name,
					'Width' => 80,
					'Name' => 'Repair[um_name]'
				));
				//echo $form->numberField($model,'docm_quant'); ?>
				<?php echo $form->error($model,'um_name'); ?>
			</div>

			<div class="field pull-left">
				<?php echo $form->labelEx($model,'Количество'); ?>
				<?php
				$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
					'id' => 'docm_quant',
					'Name' => 'Repair[docm_quant]',
					'Value' => $model->docm_quant,
					'Width' => 80,
					'Name' => 'Repair[docm_quant]'
				));
				//echo $form->numberField($model,'docm_quant'); ?>
				<?php echo $form->error($model,'docm_quant'); ?>
			</div>



		<div class="field pull-left" style="margin-top: 17px">
<!--			--><?php //echo $form->checkBox($model,'used',array('class'=>'form-control')); ?>
<!--			--><?php //echo $form->labelEx($model,'Б/у', array('for'=>'Repair_used')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'used',
				'Label' => 'Б/У',
				'Name' => 'Repair[used]',
				'Checked' => $model->used
			));
			?>
			<?php echo $form->error($model,'used'); ?>
		</div><div class="clearfix"></div>

			<div class="field pull-left">
				<?php echo $form->labelEx($model,'EquipState_id'); ?>
				<?php
				$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
					'id' => 'equipState',
					'Stretch' => true,
					'ModelName' => 'EquipState',
					'Height' => 300,
					'Width' => 250,
					'KeyField' => 'EquipState_id',
					'FieldName' => 'EquipState',
					'Name' => 'Repair[EquipState_id]',
					'KeyValue' => $model->EquipState_id,
					'Type' => array(
						'Mode' => 'Filter',
						'Condition' => 'es.EquipState like \':Value%\'',
					),
					'Columns' => array(
						'EquipState' => array(
							'Name' => 'Причина повторного ремонта',
							'FieldName' => 'EquipState',
							'Width' => 300,
						),
					),
				));
				?>
				<?php echo $form->error($model,'EquipState_id'); ?>
			</div>

			<div class="field pull-left">
				<?php
				$this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
					'id' => 'payClient',
					'Checked' => $model->repair_pay == 1 ? true : false,
					'Label' => "Ремонт платный за счет клиента",
					'GroupName' => 'payRepair',
					'Value' => 1,
					'Name' => 'Repair[repair_pay]'
				));

				$this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
					'id' => 'payCompany',
					'Checked' => $model->repair_pay == 2 ? true : false,
					'Label' => "Ремонт платный за счет компании",
					'GroupName' => 'payRepair',
					'Value' => 2,
					'Name' => 'Repair[repair_pay]'
				));
				?>
			</div>

			<div class="clearfix"></div>
		<div class="form-field">
<!--			--><?php //echo $form->checkBox($model,'return',array('class'=>'form-control')); ?>
<!--			--><?php //echo $form->labelEx($model,'Требуется возврат', array('for'=>'Repair_return')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'return',
				'Label' => 'Требуется возврат',
				'Name' => 'Repair[return]',
				'Checked' => $model->return
			));
			?>
			<?php echo $form->error($model,'return'); ?>
		</div>
		<div class="form-field">
<!--			--><?php //echo $form->checkBox($model,'wrnt',array('class'=>'form-control')); ?>
<!--			--><?php //echo $form->labelEx($model,'На гарантии', array('for'=>'Repair_wrnt')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'wrnt',
				'Label' => 'На гарантии',
				'Name' => 'Repair[wrnt]',
				'Checked' => $model->wrnt
			));
			?>
			<?php echo $form->error($model,'wrnt'); ?>
		</div>
		<div class="form-field">
<!--			--><?php //echo $form->checkBox($model,'work_ok',array('class'=>'form-control')); ?>
<!--			--><?php //echo $form->labelEx($model,'Исправное', array('for'=>'Repair_work_ok')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'work_ok',
				'Label' => 'Исправное',
				'Name' => 'Repair[work_ok]',
				'Checked' => $model->work_ok
			));
			?>
			<?php echo $form->error($model,'work_ok'); ?>
		</div>
		<hr>


		<?php
		if($this->action->id == 'create' || Yii::app()->user->checkAccess('LogisticAdministrator')) {
			?>
			<div class="field">
				<?php echo $form->labelEx($model, 'SN') ?>
<!--				--><?php //echo $form->textField($model,'SN',array('class'=>'form-control', 'id'=>'equipSN')); ?>
				<?php
				$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
					'id' => 'equipSN',
					'Name' => 'Repair[SN]',
					'Value' => $model->SN,

				));
				?>
				<?php echo $form->error($model,'SN'); ?>
			</div><hr>
			<?php
		}
		?>

		<div id="repeatRepair" class="hidden">
			<label>Выберите причину повторного ремонта</label>
			<input>
		</div>


		<div class="form-field">
			<?php echo $form->labelEx($model, 'Комплектность') ?>
<!--			--><?php //echo $form->textArea($model,'set',array('class'=>'form-control')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
				'id' => 'set',
				'Name' => 'Repair[set]',
				'Value' => $model->set,
				'Width' => 230,
				'Height' => 60
			));
			?>
			<?php echo $form->error($model,'set'); ?>
		</div><hr>

		<div class="form-field">
			<?php echo $form->labelEx($model, 'Неисправность') ?>
			<span>(<a href="#choiseDefect" id="choiseDefect">выбрать из списка</a>)</span>
			<div class="defectList">
				<?php
				$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
					'id' => 'defectList',
					'Stretch' => true,
					'ModelName' => 'RepairDefects',
					'Height' => 300,
					'Width' => 200,
					'KeyField' => 'RepairDefect_id',
					'FieldName' => 'RepairDefect',
					'Type' => array(
						'Mode' => 'Filter',
						'Condition' => 'rd.RepairDefect like \':Value%\'',
					),
					'Columns' => array(
						'RepairDefect' => array(
							'Name' => 'Неисправность',
							'FieldName' => 'RepairDefect',
							'Width' => 200,

						),
					),
				));
				?>
			</div>
<!--			--><?php //echo $form->textArea($model,'defect',array('class'=>'form-control')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
				'id' => 'defect',
				'Name' => 'Repair[defect]',
				'Value' => $model->defect,
				'Width' => 230,
				'Height' => 60
			));
			?>
			<?php echo $form->error($model,'defect'); ?>
		</div>

		<div class="form-field">
			<?php echo $form->labelEx($model, 'Примечание') ?>
<!--			--><?php //echo $form->textArea($model,'note',array('class'=>'form-control')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
				'id' => 'note',
				'Name' => 'Repair[note]',
				'Value' => $model->note,
				'Width' => 230,
				'Height' => 60
			));
			?>
			<?php echo $form->error($model,'note'); ?>
		</div><hr>

		<div class="field pull-left">
			<?php echo $form->labelEx($model,'Сдал в ремонт'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
				'id' => 'master',
				'Stretch' => true,
				'ModelName' => 'Employees',
				'Height' => 300,
				'Width' => 200,
				'KeyField' => 'Employee_id',
				'FieldName' => 'EmployeeName',
				'KeyValue' => $model->mstr_empl_id,
				'Name' => 'Repair[mstr_empl_id]',
				'Type' => array(
					'Mode' => 'Filter',
					'Condition' => 'e.EmployeeName like \':Value%\'',
				),
				'Columns' => array(
					'EmployeeName' => array(
						'Name' => 'Сдал в ремонт',
						'FieldName' => 'EmployeeName',
						'Width' => 200,

					),
				),
			));

			?>
		</div>

		<div class="field pull-left">
			<?php echo $form->labelEx($model,'Инженер ПРЦ'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
				'id' => 'egnr',
				'Stretch' => true,
				'ModelName' => 'Employees',
				'Height' => 300,
				'Width' => 200,
				'KeyField' => 'Employee_id',
				'FieldName' => 'EmployeeName',
				'KeyValue' => $model->egnr_empl_id,
				'Name' => 'Repair[egnr_empl_id]',
				'Type' => array(
					'Mode' => 'Filter',
					'Condition' => 'e.EmployeeName like \':Value%\'',
				),
				'Columns' => array(
					'EmployeeName' => array(
						'Name' => 'Инженер ПРЦ',
						'FieldName' => 'EmployeeName',
						'Width' => 200,

					),
				),
			));

			?>
		</div>
			<div class="clearfix"></div>

			<div class="field pull-left">
				<?php echo $form->labelEx($model,'EmplCreate'); ?>
				<?php
				$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
					'id' => 'emplCreate',
					'Stretch' => true,
					'ModelName' => 'Employees',
					'Height' => 300,
					'Width' => 200,
					'KeyField' => 'Employee_id',
					'FieldName' => 'EmployeeName',
					'KeyValue' => $model->EmplCreate,
					'Name' => 'Repair[EmplCreate]',
					'Type' => array(
						'Mode' => 'Filter',
						'Condition' => 'e.EmployeeName like \':Value%\'',
					),
					'Columns' => array(
						'EmployeeName' => array(
							'Name' => 'Зарегистрировал',
							'FieldName' => 'EmployeeName',
							'Width' => 200,

						),
					),
				));

				?>
				<?php echo $form->error($model,'EmplCreate'); ?>
			</div>

			<div class="field pull-left">
				<?php echo $form->labelEx($model,'Доставил'); ?>
				<?php
				$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
					'id' => 'cur',
					'Stretch' => true,
					'ModelName' => 'Employees',
					'Height' => 300,
					'Width' => 200,
					'KeyField' => 'Employee_id',
					'FieldName' => 'EmployeeName',
					'KeyValue' => $model->cur_empl_id,
					'Name' => 'Repair[cur_empl_id]',
					'Type' => array(
						'Mode' => 'Filter',
						'Condition' => 'e.EmployeeName like \':Value%\'',
					),
					'Columns' => array(
						'EmployeeName' => array(
							'Name' => 'Доставил',
							'FieldName' => 'EmployeeName',
							'Width' => 200,

						),
					),
				));

				?>
			</div>
			<div class="clearfix"></div>

	<div class="form-field">
<!--		--><?php //$reason = new DelayReasons();
//		$reason_list = $reason->getData(); ?>
		<?php echo $form->labelEx($model,'Причина просрочки'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'delay',
			'Stretch' => true,
			'ModelName' => 'DelayReasons',
			'Height' => 300,
			'Width' => 200,
			'KeyField' => 'dlrs_id',
			'FieldName' => 'name',
			'KeyValue' => $model->delayreason,
			'Name' => 'Repair[delayreason]',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 'd.name like \':Value%\'',
			),
			'Columns' => array(
				'name' => array(
					'Name' => 'Причина просрочки',
					'FieldName' => 'name',
					'Width' => 200,

				),
			),
		));

		?>
	</div><hr>


	<?php }
	elseif ($this->action->id == 'repairPRC') {
		if($model->status != 3) die('Оборудование не находится в ремонте в ПРЦ');
		?>

		<div class="form-field">
			<!--			--><?php //echo $form->checkBox($model,'blank_correct',array('class'=>'form-control')); ?>
			<!--			--><?php //echo $form->labelEx($model,'Без бланка/некор-ый', array('for'=>'Repair_blank_correct')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'blank_correct',
				'Label' => 'Без бланка/некор-ый',
				'Name' => 'Repair[blank_correct]',
				'Checked' => $model->blank_correct
			));
			?>
			<?php echo $form->error($model,'blank_correct'); ?>
		</div><hr>

		<div class="form-field">
			<?php echo $form->labelEx($model, 'Неисправность') ?>
<!--			--><?php //echo $form->textArea($model,'edefect',array('class'=>'form-control')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
				'id' => 'edefect',
				'Name' => 'Repair[edefect]',
				'Value' => $model->edefect
			));
			?>
			<?php echo $form->error($model,'edefect'); ?>
		</div>

		<div class="form-field">
			<?php echo $form->labelEx($model, 'Примечание') ?>
<!--			--><?php //echo $form->textArea($model,'note',array('class'=>'form-control')); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
				'id' => 'note',
				'Name' => 'Repair[note]',
				'Value' => $model->note
			));
			?>0
			<?php echo $form->error($model,'note'); ?>
		</div><hr>

		<div class="form-field">
			<?php echo $form->labelEx($model, 'Времязатратность') ?>
			<?php echo $form->numberField($model,'ExecHour',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'ExecHour'); ?>
		</div><hr>

		<div class="form-field">
			<?php echo $form->labelEx($model,'Дата выполнения ремонта:'); ?>
		</div><div class="clearfix"></div>
		<div class="form-field">
			<?php echo $form->labelEx($model,'Планируемая'); ?>
			<?php //echo $form->textField($model,'date_plan',array('class'=>'form-control datepicker')); ?>
			<?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
				'Name' => 'Repair[date_plan]',
				'id' => 'date-plan'

			)); ?>
			<?php echo $form->error($model,'date_plan'); ?>
		</div>
		<div class="form-field">
			<?php echo $form->labelEx($model,'Фактическая'); ?>
			<?php //echo $form->textField($model,'date_fact',array('class'=>'form-control datepicker')); ?>
			<?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
				'Name' => 'Repair[date_fact]',
				'id' => 'date-fact'

			)); ?>
			<?php echo $form->error($model,'date_fact'); ?>
		</div><hr>

		<?php
	}

	elseif ($this->action->id == 'repairSRM') {
		if($model->status != 4) die('Оборудование не находится в ремонте в СРМ');
		?>
		<div class="form-field">
			<?php echo $form->labelEx($model,'Дата выполнения ремонта:'); ?>
		</div><div class="clearfix"></div>
		<div class="form-field">
			<?php echo $form->labelEx($model,'Планируемая'); ?>
			<?php //echo $form->textField($model,'date_plan',array('class'=>'form-control datepicker')); ?>
			<?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
				'Name' => 'Repair[date_plan]',
				'id' => 'date-plan'
			)); ?>
			<?php echo $form->error($model,'date_plan'); ?>
		</div>
		<div class="form-field">
			<?php echo $form->labelEx($model,'Фактическая'); ?>
			<?php //echo $form->textField($model,'date_fact',array('class'=>'form-control datepicker')); ?>
			<?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
				'Name' => 'Repair[date_fact]',
				'id' => 'date-fact'

			)); ?>
			<?php echo $form->error($model,'date_fact'); ?>
		</div><hr>
		<?php
	}

	elseif ($this->action->id == 'diagnostic') {
		if($model->status != 2) die('Оборудование не находится на диагностике');
		?>

		<div class="form-field">
<!--			--><?php //$reason = new DelayReasons();
//			$reason_list = $reason->getData(); ?>
			<?php echo $form->labelEx($model,'Результат диагностики'); ?>
			<?php
			$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
				'id' => 'diagnos',
				'Stretch' => true,
				'ModelName' => 'RepairResults',
				'Height' => 300,
				'Width' => 200,
				'KeyField' => 'rslt_id',
				'FieldName' => 'ResultName',
				'KeyValue' => $model->rslt_id,
				'Name' => 'Repair[rslt_id]',
				'Type' => array(
					'Mode' => 'Filter',
					'Condition' => 'rr.ResultName like \':Value%\'',
				),
				'Columns' => array(
					'ResultName' => array(
						'Name' => 'Результат диагностики',
						'FieldName' => 'ResultName',
						'Width' => 200,

					),
				),
			));

			?>
		</div><hr>

		<?php
	}
	?>


		<div class="form-field">

		</div>


<!--	<div class="buttons">-->
<!--		--><?php //echo CHtml::submitButton('Сохранить', array('class'=>'btn btn-primary')); ?>
<!--	</div>-->

	<div class="btn-group">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'save',
			'Type' => 'Form',
			'Text' => 'Сохранить',
			'FormName' => 'repairs-form'
		));
		?>
	</div>
<?php $this->endWidget(); ?>

</div></div>

<div class="form-menu">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'delete',
		'Type' => 'none',
		'Text' => 'Выданное оборудование',

	));
	?>
	<div id="equipInfo">
		<div class="price"></div>
		<div class="infoSN"></div>
		<div class="repeatRepair"></div>
		<div class="warranty"></div>
	</div>
	<div id="so"></div>
</div>
<div class="clearfix"></div>
<!--<div id="qwe"><input></div>-->
<?php

?>

<div id="needReturn" class="btn-group hidden">
	<p style="font-size: 125%;margin-top: 0">Требуется возврат?</p>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'returnNeed',
		'Type' => 'none',
		'Text' => 'Да',
	));
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'returnNotNeed',
		'Type' => 'none',
		'Text' => 'Нет',
	));
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'returnCancel',
		'Type' => 'none',
		'Text' => 'Отмена',
	));
	?>
</div>
<style>
	.defectList #defectList {
		visibility: hidden;
		z-index: 0;
		*margin-top: 0px;
		position: absolute;
	}
</style>


<script type="text/javascript">
	var returnAnswer = false;
	<?php
	if($this->action->id === 'create') {
		?>
		$('#repairs-form').on('submit', function(e){
			if(!returnAnswer) {
				e.preventDefault()
			}

			if(!alcheckboxSettings.return.Checked) {
				$('#needReturn').dialog({
					modal: true,
				})
			}
		})
		<?php
	}
	?>

	$('#returnNeed').on('click', function(){
		returnAnswer = true
		$('#return').alcheckbox('SetValue', true)
		$('#repairs-form').submit()
	})
	$('#returnNotNeed').on('click', function(){
		returnAnswer = true
		$('#return').alcheckbox('SetValue', false)
		$('#repairs-form').submit()
	})
	$('#returnCancel').on('click', function(){
		returnAnswer = false;
		$('#needReturn').dialog('close')
	})

	$('#choiseDefect').on('click', function(e){
		e.preventDefault()
		setTimeout(function(){$('#defectList').alcomboboxajax('ButtonClick', 'defectList');},1)

	})

//$("#repair-repeat").togglerDialog({
//	label: 'Ремонт производится повторно',
//	beforeShow: function (e) {
//		//e.text($('#Repair_SN').val())
//	},
//	unchecked: function() {
//
//	}
//})

//$('#repair-repeat').alToggler({
//	label:'Ремонт производится повторно',
//})

//$('.form').togglerEditForm()
//$('#qwe').togglerEditForm()


//var defect = ''
//	$("#Repair_work_ok").on('click', function () {
//		if($(this).is(':checked')) {
//			defect = aleditSettings.defect.Value
//			$('#defect').aledit('SetValue','Оборудование исправно')
//		}
//		else {
//			$('#defect').aledit('SetValue',defect)
//		}
//	})


//	$(".datepicker").datepicker({showButtonPanel:true, changeMonth:true, changeYear:true, dateFormat:'yy-mm-dd', t:null,
//		beforeShow: function(){
//			$('.timepicker').hide()
//		},
//		onSelect: function(dateText, inst) {
//			t = $(this)
//			var date = t.val()
//			var pos = t.offset()
//			console.log(pos)
//			var hours = '00'
//			var minutes = '00'
//			var time = hours+':'+minutes
//			t.val(date+' '+time)
//			$('.timepicker').css({'top':pos.top+'px', 'left':pos.left+t.outerWidth()+'px'})
//			$('.timepicker').show()
//			$('html').on('keypress','body',function(e){
//				//console.log(e)
//				if(e.which==13) return false
//			})
//
//			$('.hours').change(function(){
//				//alert($(this).val())
//				hours = $(this).val()
//				//$('.hours').off()
//				return false
//			})
//			$('.minutes').change(function(){
//				//alert('dfgf')
//				minutes = $(this).val()
//				//	alert(hours)
//				//$('.minutes').off()
//				return false
//			})
//			$(".add-time").click(function(){
//
//				var time = hours+':'+minutes
//				t.val(date+' '+time)
//				$('.hours, .minutes').val('')
//				$('.hours, .minutes').off()
//				$('.timepicker').hide()
//				return false
//			})
//		}
//	});
	//$(".datepicker").mask("99.99.9999 99:99",{placeholder:"dd.mm.yyyy hh:mm"});

</script>

<script>
	$(document).on('change', '#equipSN input', function () {
		if($(this).val() == 0) {
			return false
		}
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/equipInfoSN')?>',
			data:'sn='+$(this).val(),
			type: 'get',
			success: function (r) {
				$('#equipInfo .infoSN').html(r)
			},
			error: function () {
				$('#equipInfo .infoSN').html('<p>Не удалось загрузить информацию по оборудованию</p>')
			},
			beforeSend: function() {
				$('#equipInfo .infoSN').html('<div class="loader">Загрузка...</div>')
			},
			complete: function() {
				$('#equipInfo .infoSN .loader').remove()
			}
		})
		checkRepeatRepair()
		checkWarranty();
	})

	function checkWarranty() {
		var data = {
			sn: $('#equipSN input').val(),
		}
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/CheckWarranty')?>',
			data: data,
			type: 'get',
			dataType: 'json',
			success: function(r) {
				if(r.status != 'ok' || !r.data.warranty) {
					$('#equipInfo .warranty').html('<p>Не удалось определить гарантию</p>')
					return false
				}
				$('#equipInfo .warranty').html(r.data.warranty)
			},
			error: function () {
				$('#equipInfo .warranty').html('<p>Не удалось загрузить информацию о гарантии</p>')
			},
			beforeSend: function() {
				$('#equipInfo .warranty').html('<div class="loader">Проверка на предмет повторного ремонта...</div>')
			},
			complete: function() {
				$('#equipInfo .warranty .loader').remove()
			}
		})
	}

	function checkRepeatRepair() {
		var data = {
			sn: $('#equipSN input').val(),
			objc_id: alcomboboxajaxSettings['addr-obj'].CurrentRow ? alcomboboxajaxSettings['addr-obj'].CurrentRow['Object_id'] : 0,
		}
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/checkRepeatRepair')?>',
			data: data,
			type: 'get',
			dataType: 'json',
			success: function (r) {
				if(r.status != 'ok' || !r.data.repeatRepair) {
					$('#equipInfo .repeatRepair').html('<p>Не удалось определить дату последнего ремонта</p>')
					return false
				}
				var msg = r.data.repeatRepair.equip ? '<p class="txt-red">ремонт оборудования повторный</p>' : '<p class="txt-green">ремонт оборудования НЕ повторный</p>'
				msg += r.data.repeatRepair.object ? '<p class="txt-red">ремонт на объекте повторный</p>' : '<p class="txt-green">ремонт на объекте НЕ повторный</p>'
				if(r.data.repeatRepair.equip || r.data.repeatRepair.object)  $('#repeatRepair').show()
				$('#equipInfo .repeatRepair').html(msg)
			},
			error: function () {
				$('#equipInfo .repeatRepair').html('<p>Не удалось загрузить информацию по оборудованию</p>')
			},
			beforeSend: function() {
				$('#equipInfo .repeatRepair').html('<div class="loader">Проверка на предмет повторного ремонта...</div>')
			},
			complete: function() {
				$('#equipInfo .repeatRepair .loader').remove()
			}
		})
	}

	function getServiceDept() {
		var data = {
			objgr: alcomboboxajaxSettings['addr-obj'].CurrentRow ? alcomboboxajaxSettings['addr-obj'].CurrentRow['ObjectGr_id'] : 0,
		}
		if(!data.objgr) {
			$('#so').html('<p>Не удалось загрузить информацию о сервисном отделении. Вы не выбрали объект</p>')
			return false
		}
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/GetServiceDept')?>',
			data: data,
			type: 'get',
			dataType: 'json',
			success: function (r) {
				if(r.status != 'ok' || !r.data.sd) {
					$('#so').html('<p><strong>Сервисное отделение:</strong></p><p>Не удалось определить сервисное отделение</p>')
					return false
				}
				$('#so').html(r.data.sd)
			},
			error: function () {
				$('#so').html('<p>Не удалось загрузить информацию о сервисном отделении</p>')
			},
			beforeSend: function() {
				$('#so').html('<div class="loader">Определяю сервисное отделение...</div>')
			},
			complete: function() {
				$('#so .loader').remove()
			}
		})
	}

	function getInfoEquip(id) {
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/equipInfo')?>',
			data:'id='+id,
			type: 'get',
			success: function (r) {
				$('#equipInfo .price').html(r)
			},
			error: function () {
				$('#equipInfo .price').html('<p>Не удалось загрузить информацию по оборудованию</p>')
			},
			beforeSend: function() {
				$('#equipInfo .price').html('<div class="loader">Загрузка...</div>')
			},
			complete: function() {
				$('#equipInfo .price .loader').remove()
			}
		})


	}

//
//	function getRepairRepeat(){
//		var objc_id = $('input[name="Repair[objc_id]"]').val()
//		var equip_id = $('input[name="Repair[eqip_id]"]').val()
//
//		if(objc_id == 0 || equip_id == 0) {
//			return false
//		}
//
//		var status = checkRepairRepeat(equip_id, objc_id)
//		if(status == 'error') {
//			alert('Не удалось определить дату последнего ремонта.')
//			return false
//		}
//		if(status) {
//			alert('Ремонт производится повторно, выберите причину.')
//			$('#repair-repeat').slideDown(180)
//			$('#alcomboboxedit_repr-repeat').focus()
//		}
//	}


	function checkRepairRepeat(id, objc_id) {
		var status;
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/repairRepeat')?>',
			data:'id='+id+'&objc_id='+objc_id,
			method: 'get',
			async:false,
			success: function (r) {
				if (r > 0) {
					status = true
				} else {
					status = false
				}
			},
			error: function () {
				status = 'error'
			}
		})
		return status
	}

//	$('#repairs-form').on('click', function(e){
//		e.preventDefault()
//	})

</script>



