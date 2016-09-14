<?php
/**
 *
 * @var ReplaceMasterController $this
 */

$this->title = 'Мастера';

if(isset($msg)) {
	?>
	<h3><?php echo $msg; ?></h3>
	<?php
}

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'rmaster-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));

echo $form->labelEx($model,'date');
$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
	'id' => 'date',
	'Name' => 'ReplaceMaster[date]',
	'Value' => DateTimeManager::YiiDateToAliton($model->date),
	'Width'=>300,
));
echo $form->error($model,'date');

echo $form->labelEx($model, 'FromEmpl');
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'fromempl',
	'Stretch' => true,
	'ModelName' => 'Employees',
	'Height' => 300,
	'Width' => 300,
	'KeyField' => 'Employee_id',
	'KeyValue' => $model->FromEmpl,
	'FieldName' => 'EmployeeName',
	'Name' => 'ReplaceMaster[FromEmpl]',
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
	'OnAfterChange'=>'getCountDataMaster("fromempl")'
));
echo $form->error($model, 'FromEmpl');
?>

<div class="master-count" rel="fromempl">
	<div class="field count-object">
		<div class="pull-left"><label>Кол-во объектов</label></div>
<!--		<input disabled class="count-object">-->
		<div class="pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
				'id' => 'count1',
				'Width' => 120,
				'Type' => 'String',
				'ReadOnly'=>true,
				//	'Mode' => "Auto",
			));
			?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="field count-contract">
		<div class="pull-left"><label>Кол-во договоров</label></div>
		<div class="pull-left">
		<?php
			$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
				'id' => 'count2',
				'Width' => 120,
				'Type' => 'String',
				'ReadOnly'=>true,
				//	'Mode' => "Auto",
			));
			?>
			</div>
<!--		<input disabled class="count-contract">-->
	</div>
</div>
<div class="clearfix"></div>
<?php

echo $form->labelEx($model, 'ToEmpl');
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'toempl',
	'Stretch' => true,
	'ModelName' => 'Employees',
	'Height' => 300,
	'Width' => 300,
	'KeyField' => 'Employee_id',
	'KeyValue' => $model->ToEmpl,
	'FieldName' => 'EmployeeName',
	'Name' => 'ReplaceMaster[ToEmpl]',
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
	'OnAfterChange'=>'getCountDataMaster("toempl")'
));
echo $form->error($model, 'ToEmpl');
?>

<div class="master-count" rel="toempl">
	<div class="field count-object">
		<div class="pull-left"><label>Кол-во объектов</label></div>
		<!--		<input disabled class="count-object">-->
		<div class="pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
				'id' => 'count3',
				'Width' => 120,
				'Type' => 'String',
				'ReadOnly'=>true,
				//	'Mode' => "Auto",
			));
			?>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="field count-contract">
		<div class="pull-left"><label>Кол-во договоров</label></div>
		<div class="pull-left">
			<?php
			$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
				'id' => 'count4',
				'Width' => 120,
				'Type' => 'String',
				'ReadOnly'=>true,
				//	'Mode' => "Auto",
			));
			?>
		</div>
		<!--		<input disabled class="count-contract">-->
	</div>
</div>
<div class="clearfix"></div>
<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'save-pricemonitoring',
		'Height' => 30,
		'Text' => 'Сохранить',
		'Type' => 'Form',
		'FormName'=>'rmaster-form'
	));
?>
<!--<input type="submit" style="margin-top: 7px;margin-left: 5px" value="Сохранить">-->

<?php $this->endWidget(); ?>


<script>
	function getCountDataMaster(from) {
		var target = from
		if(!alcomboboxajaxSettings[target].CurrentRow)  return false
		$.ajax({
			url: '/?r=replaceMaster/count&id='+alcomboboxajaxSettings[target].CurrentRow['Employee_id'],
			dataType: 'json',
			success: function(r){
				if(r.status != 'ok') {
					alert('error')
					return false
				}

				$('.master-count[rel="'+target+'"] .count-object input').val(r.data[0].object)
				$('.master-count[rel="'+target+'"] .count-contract input').val(r.data[0].contract)
			}
		})
	}
</script>
