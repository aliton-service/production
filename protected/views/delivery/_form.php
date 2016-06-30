<div class="form">

	<?php
	$empl = new Employees();
	$empl_list = $empl->getData();
	$form=$this->beginWidget('CActiveForm', array(
		'id'=>'change-form',

	));
	?>

	<div class="form-field">
		<label>Номер: </label>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id'=>'delivery-id',
			'Value'=>$model->dldm_id,
			'ReadOnly'=>true
		));
		?>
	</div>
	<div class="form-field">
		<label>Дата создания: </label>
	</div>
	<div class="form-field">

		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id'=>'delivery-date',
			'Value'=>DateTimeManager::YiiDateToAliton($model->date),
			'ReadOnly'=>true,
			'Width'=>170
		));
		?>
	</div>
	<div class="form-field">
		<label>Подал: </label>
	</div>
	<div class="form-field">

		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id'=>'delivery-sender',
			'Value'=>$model->user_sender_name,
			'ReadOnly'=>true,
			'Width'=>150
		));
		?>
	</div>
	<hr>

	<div class="form-field">
	<div><?php echo $form->labelEx($model,'Вид доставки'); ?></div>
	<?php


	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'dlvr-type',
		'Name' => 'Delivery[dltp_id]',
		'ModelName' => 'DeliveryTypes',
		'FieldName' => 'DeliveryType',
		'KeyField' => 'dltp_id',
		'KeyValue' => $model->dltp_id,
		'Width' => 200,
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => "dt.DeliveryType like ':Value%'",
		),
		'Columns' => array(
			'DeliveryType' => array(
				'Name' => 'Вид доставки',
				'FieldName' => 'DeliveryType',
				'Width' => 150,
				'Height' => 23,
			),
		),

	));
	?>
	</div>

	<div class="form-field">
		<div><?php echo $form->labelEx($model,'Приоритет'); ?></div>
		<?php


		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'dlvr-prior',
			'Name' => 'Delivery[prty_id]',
			'ModelName' => 'DemandPriors',
			'FieldName' => 'DemandPrior',
			'KeyField' => 'DemandPrior_id',
			'KeyValue' => $model->prty_id,
			'Width' => 200,
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => "dp.DemandPrior like ':Value%'",
			),
			'Columns' => array(
				'DeliveryType' => array(
					'Name' => 'Приоритет',
					'FieldName' => 'DemandPrior',
					'Width' => 150,
					'Height' => 23,
				),
			),

		));
		?>
	</div><hr>

	<div class="form-field">
		<?php echo $form->labelEx($model,'Обещанная дата'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'DateEdit1',
			'Name' => 'Delivery[date_promise]',
			'Value' => DateTimeManager::YiiDateToAliton($model->date_promise),
		));
		?>
	</div>

	<div class="form-field">
		<?php echo $form->labelEx($model,'Предельная дата'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'DateEdit2',
			'Name' => 'Delivery[deadline]',
			'Value' => DateTimeManager::YiiDateToAliton($model->deadline),
		));
		?>
	</div>
	<div class="form-field">
		<?php echo $form->labelEx($model,'Желаемая дата'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'DateEdit3',
			'Name' => 'Delivery[bestdate]',
			'Value' => DateTimeManager::YiiDateToAliton($model->bestdate),
		));
		?>
	</div><hr>


	<div class="form-field">
		<?php echo $form->labelEx($model,'Мастер'); ?><div class="clearfix"></div>
		<?php

		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'master',
			'Name' => 'Delivery[mstr_id]',
			'ModelName' => 'Employees',
			'FieldName' => 'EmployeeName',
			'KeyField' => 'Employee_id',
			'KeyValue' => $model->mstr_id,
			'Width' => 200,
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => "e.EmployeeName like ':Value%'",
			),
			'Columns' => array(
				'EmployeeName' => array(
					'Name' => 'Мастер',
					'FieldName' => 'EmployeeName',
					'Width' => 150,
					'Height' => 23,
				),
			),

		));
		?>

	</div>

	<div class="form-field">
		<?php echo $form->labelEx($model,'Адрес'); ?>
		<?php


		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'cmbAddress',
			'ModelName' => 'ListObjects',
			'FieldName' => 'Addr',
			'KeyField' => 'Object_id',
			'KeyValue' => $model->objc_id,
			'Name' => 'Delivery[objc_id]',
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => "a.Addr like ':Value%'",
			),
			'Width' => 400,
			'PopupWidth' => 400,
			'Columns' => array(
				'Address' => array(
					'Name' => 'Адрес',
					'FieldName' => 'Addr',
					'Width' => 400
				),
			),
		));
		?>
	</div><hr>

	<div class="form-field">
	<?php echo $form->labelEx($model,'Контакт'); ?>
	<?php


	$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
		'id' => 'contact',
		'Name' => 'Delivery[Contacts]',
		'ModelName' => 'ContactInfo',
		'FieldName' => 'contact',
		'KeyField' => 'Info_id',
		//'KeyValue' => $model->Contacts,
		'Width' => 200,
		'Type' => array(
			'Mode' => 'Filter',
			'Condition' => "ci.FIO like ':Value%'",
		),
		'Columns' => array(
			'contact' => array(
				'Name' => 'Контакт',
				'FieldName' => 'contact',
				'Width' => 150,
				'Height' => 23,
			),
		),

	));
	?>
	</div>
	<div class="form-field">
		<?php echo $form->labelEx($model,'Номер телефона'); ?><div class="clearfix"></div>
		<?php echo $form->textField($model,'phonenumber',array('size'=>45,'maxlength'=>100,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'phonenumber'); ?>
	</div><hr>
	<?php
	?>


	<div class="form-field">
		<?php echo $form->labelEx($model,'Содержание заявки'); ?>
		<?php echo $form->textArea($model,'text',array('style'=>'width:400px;height:40px;max-width:700px;min-width:250px','class'=>'form-control')); ?>
		<?php echo $form->error($model,'text'); ?>
	</div><hr>




	<div class="form-field">
		<?php echo $form->labelEx($model,'Курьер'); ?>
		<?php



		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'empl-dlvr',
			'Name' => 'Delivery[empl_dlvr_id]',
			'ModelName' => 'Employees',
			'FieldName' => 'EmployeeName',
			'KeyField' => 'Employee_id',
			'KeyValue' => $model->empl_dlvr_id,
			'Width' => 200,
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => "e.EmployeeName like ':Value%'",
			),
			'Columns' => array(
				'EmployeeName' => array(
					'Name' => 'Курьер',
					'FieldName' => 'EmployeeName',
					'Width' => 150,
					'Height' => 23,
				),
			),

		));
		?>
	</div>
	<div class="form-field">
		<?php echo $form->labelEx($model,'Причина просрочки'); ?><div class="clearfix"></div>
		<?php

		if(Yii::app()->user->checkAccess('EditDeliveryDemands') && $action == 'update') {
			$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
				'id' => 'delay-reason',
				'Name' => 'Delivery[dlrs_id]',
				'ModelName' => 'DelayReasons',
				'FieldName' => 'name',
				'KeyField' => 'dlrs_id',
				'KeyValue' => $model->dlrs_id,
				'Width' => 200,
				'Type' => array(
					'Condition' => 'd.name like \':Value%\'',
				),
				'Columns' => array(
					'name' => array(
						'Name' => 'Причина просрочки',
						'FieldName' => 'name',
	//					'width' => 150,
	//					'height' => 23,
					),
				),

			));
			?>
		</div>

	<div class="clearfix"></div>
		<div class="form-field">
			<?php echo $form->labelEx($model,'Примечание'); ?>
			<?php echo $form->textArea($model,'note',array('style'=>'width:400px;height:40px;max-width:700px;min-width:250px','class'=>'form-control')); ?>
			<?php echo $form->error($model,'note'); ?>
		</div><hr>

		<div class="form-field">
			<?php echo $form->labelEx($model,'Отчет курьера'); ?>
			<?php echo $form->textArea($model,'rep_delivery',array('style'=>'width:400px;height:40px;max-width:700px;min-width:250px','class'=>'form-control')); ?>
			<?php echo $form->error($model,'rep_delivery'); ?>
		</div><hr>



		<?php
	}
	?>

	<div class="form-field">
		<?php echo $form->labelEx($model,'Принята'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'DateEdit4',
			'Value' => DateTimeManager::YiiDateToAliton($model->date_logist),

		));
		?>
	</div>

	<div class="form-field">
		<label>Принял: </label><div class="clearfix"></div>
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'logistname',
			'Value' => $model->user_logist_name,
			'ReadOnly'=>true
		));
		?>
	</div><hr>

	<div class="form-field">
		<?php echo $form->labelEx($model,'Планируется выполнить'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'DateEdit5',
			'Name' => 'Delivery[plandate]',
			'Value' => DateTimeManager::YiiDateToAliton($model->plandate),
		));
		?>
	</div>

	<div class="form-field">
		<?php echo $form->labelEx($model,'Выполнена'); ?>
		<?php
		$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id' => 'DateEdit6',
			'Name' => 'Delivery[date_delivery]',
			'Value' => DateTimeManager::YiiDateToAliton($model->date_delivery),
		));
		?>
	</div><hr>


</div>
<div class="clearfix"></div>

<div>
	<input type="submit" value="Сохранить">
	<?php
	if($ajax) {
		?>
<!--		<input type="button" value="Принять" id="accept-demands">-->
		<?php
	}
	?>
</div>
<?php $this->endWidget(); ?>



<script>



	function setDeadline() {
		$.ajax({
			url: '/?r=delivery/getDeadline&prior='+$('input[name="Delivery[prty_id]"]').val(),
			success: function(r) {
				$('input[name="Delivery[deadline]"]').val(r)
			}

		})
	}

<?php
if($ajax) {
	?>
//	$('#accept-demands').ajaxSender({
//		sendEvent: 'click',
//		url: '<?php //echo $this->createUrl('delivery/take',array('id'=>$model->dldm_id)) ?>//',
//		dataType: 'json',
//	})
//


	$('#change-form').ajaxSender({
		url: '<?php echo $this->createUrl('delivery/update',array('id'=>$model->dldm_id,'ajax'=>1)) ?>',
		type: 'post',
		dataType: 'json',
		success: function(r) {
			if(r.status && r.status == 'ok') {
				alert('Данные сохранены')
			} else {
				alert('Произошла ошибка при сохранении данных')
			}
		},
		error: function() {
			alert('Запрос не удался, попробуйте позже')
		}

	})


	<?php
}
 ?>
</script>

<script>
	Aliton.Links = [
		{
			Out: "cmbAddress",
			In: "contact",
			TypeControl: "Combobox",
			Condition: "ci.ObjectGr_id = :Value",
			Field: "ObjectGr_id",
			Name: "TestCombobox4_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
		}
	];
</script>