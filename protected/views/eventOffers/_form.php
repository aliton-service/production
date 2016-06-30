<?php
/**
 *
 */

$form=$this->beginWidget('CActiveForm', array(
	'id'=>'eventoffers-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
	),
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
));

echo $form->labelEx($model,'oftp_id');
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'offertype-eventoffer',
	'Stretch' => true,
	'ModelName' => 'OfferTypes',
	'Height' => 300,
	'Width' => 200,
	'KeyField' => 'code',
	'FieldName' => 'offertype',
	'Name' => 'EventOffers[oftp_id]' ,
	'KeyValue' => $model->oftp_id,
	'Type' => array(
		'Mode' => 'Filter',
		'Condition' => 'ot.offertype like \':Value%\'',
	),
	'Columns' => array(
		'offertype' => array(
			'Name' => 'Предложение',
			'FieldName' => 'offertype',
			'Width' => 200,

		),
	),
));
echo $form->error($model,'oftp_id');

echo $form->labelEx($model,'note');
	$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
		'id' => 'note-eventoffer',
		'Width' => 300,
		'Type' => 'String',
		'Name' => 'EventOffers[note]' ,
		'Value' => $model->note,
	));
echo $form->error($model,'note');

echo $form->labelEx($model,'situation');
$this->widget('application.extensions.alitonwidgets.memo.almemo', array(
	'id' => 'situation-eventoffer',
	'Width' => 300,
	'Type' => 'String',
	'Name' => 'EventOffers[situation]' ,
	'Value' => $model->situation,
));
echo $form->error($model,'situation');


echo $form->labelEx($model,'rslt_id');
$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
	'id' => 'rslt_id-eventoffer',
	'Stretch' => true,
	'ModelName' => 'OfferResults',
	'Height' => 300,
	'Width' => 200,
	'KeyField' => 'rslt_id',
	'FieldName' => 'ResultName',
	'Name' => 'EventOffers[rslt_id]' ,
	'KeyValue' => $model->rslt_id,
	'Type' => array(
		'Mode' => 'Filter',
		'Condition' => 'ofr.ResultName like \':Value%\'',
	),
	'Columns' => array(
		'ResultName' => array(
			'Name' => 'Результат',
			'FieldName' => 'ResultName',
			'Width' => 200,

		),
	),
));
echo $form->error($model,'rslt_id');

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'save-eventoffers',
	'Height' => 30,
	'Text' => 'Сохранить',
	'Type' => 'none',
	'OnAfterClick' => 'saveEventOffers()'
));

?>



<?php $this->endWidget(); ?>