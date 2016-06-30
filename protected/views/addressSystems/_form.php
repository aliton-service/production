<?php
/* @var $this AddressSystemsController */
/* @var $model AddressSystems */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'address-systems-form',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation' => true,
	'enableClientValidation' => true,
)); ?>

	<?php
	echo $form->labelEx($model,'AddressSystem');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'AddrSys',
		'Width' => 250,
		'Value' => $model->AddressSystem,
		'Type' => 'String',
		'Name' => 'AddressSystems[AddressSystem]'
	));
	echo $form->error($model,'AddressSystem');


	echo $form->labelEx($model,'Note');
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'note',
		'Width' => 250,
		'Value' => $model->Note,
		'Type' => 'String',
		'Name' => 'AddressSystems[Note]'
	));
	echo $form->error($model,'Note');
	?>
    <div style="margin-top: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'Save',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Сохранить',
                'FormName' => 'address-systems-form',
                'Type' => 'Form',
            ));
        ?>
        </div>
<?php $this->endWidget(); ?>

</div><!-- form -->