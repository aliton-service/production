<?php
/**
 *
 * @var DemandsController $this
 */
?>

<div class="filter form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'filter',
		'htmlOptions'=>array(
			'class'=>'form-inline',

		),
		'action'=>'/index.php',
		'method'=>'get',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation'=>false,
	));
	?>
	<div class="close-popup"></div>

	<input name="r" value="demands/repGeneral" class="hidden">
	<div class="Clearfix"></div>
<!--	<label>номер</label><input class="form-control" type="text" name="d[id]" pattern="^[ 0-9]+$" size="5" maxlength="30" >-->
<!--	<label>дата</label><input class="form-control datepicker" type="text" name="d[date][fixday]" size="10" maxlength="30">-->
<!--	<div class="Clearfix"></div>-->
	<label>за период с </label><input class="form-control datepicker" type="text" name="d[date][begin]" size="10" maxlength="30"  >
	<label>по </label><input class="form-control datepicker" type="text" name="d[date][end]" size="10" maxlength="30" >
	<div class="Clearfix"></div>



	<?php
	$territory = array();
	$territory = array_merge($territory, array('null'=>'Без участка'));
	$territory = array_merge($territory,Territory::all())
	?>
	<div class="row">
	<?php echo $form->labelEx($model,'Участок'); ?>
	<?php echo $form->dropDownList($model,'Territ_id', $territory, array('name'=>'d[d.Territ_id]',
		'class'=>'form-control',

		'empty'=>array(''=>'Все'),
		'options'=>array()


	)); ?>
		</div>
	<?php echo $form->error($model,'Territ_id'); ?>

	<div class="row">

	<?php echo $form->labelEx($model,'Тип заявки'); ?>
	<?php echo $form->dropDownList($model,'DemandType_id', DemandTypes::all(), array('name'=>'d[d.DemandType_id]',
		'class'=>'form-control',

		'empty'=>array(''=>'Все'),
		'options'=>array()


	)); ?>

		</div>

	<div class="row">

		<?php echo $form->labelEx($model,'Мастер'); ?>
		<?php echo $form->dropDownList($model,'MasterName', Employees::all(), array('name'=>'d[d.MasterName]',
			'class'=>'form-control',

			'empty'=>array(''=>'Все'),
			'options'=>array()


		)); ?>

	</div>

	<div class="row">

	<?php echo $form->labelEx($model,'Тип системы'); ?>
	<?php echo $form->dropDownList($model,'SystemType_id', SystemTypes::all(), array('name'=>'d[d.SystemType_id]',
		'class'=>'form-control',

		'empty'=>array(''=>'Все'),
		'options'=>array()


	)); ?>

		</div>
		<div class="row">

	<?php echo $form->labelEx($model,'Тип оборудования'); ?>
	<?php echo $form->dropDownList($model,'EquipType_id', EquipTypes::all(), array('name'=>'d[d.EquipType_id]',
		'class'=>'form-control',

		'empty'=>array(''=>'Все'),
		'options'=>array()


	)); ?>

		</div>
			<div class="row">

	<?php echo $form->labelEx($model,'Тариф'); ?>
	<?php echo $form->dropDownList($model,'ServiceType', ServiceTypes::all(), array('name'=>'d[d.ServiceType]',
		'class'=>'form-control',

		'empty'=>array(''=>'Все'),
		'options'=>array()


	)); ?>

		</div>
				<div class="row">

	<?php echo $form->labelEx($model,'Приоритет'); ?>
	<?php echo $form->dropDownList($model,'DemandPrior_id', DemandPriors::all(), array('name'=>'d[d.DemandPrior_id]',
		'class'=>'form-control',

		'empty'=>array(''=>'Все'),
		'options'=>array()


	)); ?>

		</div>
	<div class="row">

	<?php echo $form->labelEx($model,'Неисправность'); ?>
	<?php echo $form->dropDownList($model,'Malfunction_id', Malfunctions::all(), array('name'=>'d[d.Malfunction_id]',
		'class'=>'form-control',

		'empty'=>array(''=>'Все'),
		'options'=>array()


	)); ?>

	</div>

	<div class="Clearfix"></div>
	<input name="status[notransf]" class="form-control" id="d-notransf" type="checkbox"><label for="d-notransf">Непереданные заявки </label>
	<div class="Clearfix"></div>
	<input name="status[nofinish]" class="form-control" id="d-nofinish" type="checkbox" ><label for="d-nofinish">Невыплненные заявки </label>
	<div class="Clearfix"></div>


	<input type="submit" class="form-control" value="ok">

	<?php $this->endWidget(); ?>
</div>

<?php
$rep=new RepDemandsHelper;
$renderRep ? $rep->render('general',$data) : '';

?>

<script type="text/javascript">
	(function($){
		$(".datepicker").datepicker({showButtonPanel:true, changeMonth:true, changeYear:true, dateFormat:'dd.mm.yy'});
	})(jQuery)
</script>
