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

	<input name="r" value="pdf/render" class="hidden">
	<input name="action" value="DeliveryDemands" class="hidden">
	<div class="Clearfix"></div>
	<!--	<label>номер</label><input class="form-control" type="text" name="d[id]" pattern="^[ 0-9]+$" size="5" maxlength="30" >-->
	<!--	<label>дата</label><input class="form-control datepicker" type="text" name="d[date][fixday]" size="10" maxlength="30">-->
	<!--	<div class="Clearfix"></div>-->
	<label>за период с </label><input class="form-control datepicker" type="text" name="date[begin]" size="10" maxlength="30"  >
	<label>по </label><input class="form-control datepicker" type="text" name="date[end]" size="10" maxlength="30" >
	<div class="Clearfix"></div>




	<input type="submit" class="form-control" value="ok">

	<?php $this->endWidget(); ?>
</div>

<?php

//$renderRep ? RepDemandsHelper::general($data) : '';

?>

<script type="text/javascript">
	(function($){
		$(".datepicker").datepicker({showButtonPanel:true, changeMonth:true, changeYear:true, dateFormat:'dd.mm.yy'});
	})(jQuery)
</script>
