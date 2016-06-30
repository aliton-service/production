<?php
/**
 *
 * @var RepairController $this
 * @var \Repair $model
 */
?>

<h1>Заявка на ремонт №</h1>

<div>

	<?php


	$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
		'success' => '$(".form").togglerEditForm()',
		'header' => array(
			array(
				'name' => 'Общие сведения',
				'ajax' => true,
				'options' => array(
					'url' => '/index.php?r=repair/cartGeneral&id='.$model->Repr_id
				),
			),
			array(
				'name' => 'Диагностика',
				'ajax' => true,
				'options' => array(
					'url' => '/index.php?r=repair/diagnostic&id='.$model->Repr_id.'&ajax=1',
					//'func' => 'function(){ alert(1); }'
				),
			),
			array(
				'name' => 'Ремонт в ПРЦ',
				'ajax' => true,
				'options' => array(
					'url' => '/index.php?r=repair/cartPRC&id='.$model->Repr_id.'&ajax=1',
					//'func' => 'function(){ alert("df"); }'
				),
			),
			array(
				'name' => 'Ремонт в СРМ',
				'ajax' => true,
				'options' => array(
					'url' => 'index.php/?r=repair/cartSRM&id='.$model->Repr_id.'&ajax=1',
				),
			),
			array(
				'name' => 'Неремонтопригодно'
			),
		),
		'content' => array(
			array(
				'id' => 'general',
//				'content' => '<div class="albutton">ffff</div>'

			),
			array(
				'id' => 'diagnostic'
			),
			array(
				'id' => 'repair-prc'
			),
			array(
				'id' => 'repair-srm'
			),
			array(
				'id' => 'non-repair',
				'content' => $model->status == 5 ? '<h3>Оборудование неремонтнопригодно</h3>' : '<h3>Оборудование не признано неремонтопригодным</h3>'
			),
		),
	));
	?>

</div>

<div id="list-so" style="display: none;">
	<div id="list-so1" action="<?=Yii::app()->createUrl('repair/update',array('id'=>$model->Repr_id))	?>">
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'so',
			'Stretch' => true,
			'ModelName' => 'Territory',
			'Height' => 300,
			'Width' => 250,
			'KeyField' => 'Territ_id',
			'FieldName' => 'Territ_Name',
			'KeyValue' => $model->so_id,
			'Type' => array(
				'Mode' => 'Filter',
				'Condition' => 't.Territ_Name like \':Value%\'',
			),
			'Columns' => array(
				'Territ_Name' => array(
					'Name' => 'Отделение',
					'FieldName' => 'Territ_Name',
					'Width' => 300,
				),
			),
		));

		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			//'id' => 'repr-send-agree',
			//'width' => 114,
			'Height' => 30,
			'Text' => 'ok',
			//'form' => 'list-so form',
			'id'=>'submit-so',
//			'beforeClick' => 'object.href = "'.Yii::app()->createUrl('repair/accept',array('id'=>$model->Repr_id)).'";
//			$(object.href).append($("input[name=Repair[so_id]]").val())',
			//'href' => Yii::app()->createUrl('repair/accept',array('id'=>$model->Repr_id))
		));

		?>

	</div>

</div>
<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'btnChange',
		'Text' => 'Изменить',
		'Href' => Yii::app()->createUrl('repair/update', array('id' => $model->Repr_id)),
	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'btnDemand',
		'Text' => 'Заявка'
	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'dtnCart',
		'Text' => 'Карточка'
	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'profitability',
		'Height' => 30,
		'Width' => 270,
		'Type' => 'none',
		'Text' => 'Рентабельность ремонта',
		'OnAfterClick' => '$("#profitabilityCalc").dialog()'
	));
	?>
</div>

<div id="documents" style="display: none;">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-kp',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Коммерческое предложение',
		//'href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-dem-monitor',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Заявка на мониторинг',
		//'href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-return-master',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Накладная на возврат мастеру',
		//'href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-move-prc',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Накладная на перемещение с ПРЦ на склад',
		//'href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-defect',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Акт деффектации',
		//'href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-soprod-naklad',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Сопроводительная накладная',
		//'href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-dem-delivery',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Заявка на доставку',
		'Href' => Yii::app()->createUrl('delivery/create', array('Delivery[objc_id]'=>$model->objc_id))
	));

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'doc-spisanie',
		'Height' => 30,
		'Width' => 270,
		'Text' => 'Акт списания материалов',
		//'href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
	));
	?>
</div>

<div id="profitabilityCalc" class="hidden">
	<div for="srm" class="typeRepairTitle clickable field pull-left">Ремонт в СРМ</div>
	<div for="prc" class="typeRepairTitle clickable field pull-left">Ремонт в ПРЦ</div>
	<hr>
	<div data-repair="srm" class="typeRepairForm hidden">
		<label>Стоимость ремонта в СРМ</label>
		<input name="srm[price]">
	</div>
	<div data-repair="prc" class="typeRepairForm hidden">
		<div>
			<label>Стоимость зап. части</label>
			<input name="prc[pricedetail]">
		</div>
		<div>
			<label>Времязатратность</label>
			<input name="prc[time]">
		</div>
		<div>
			<label>Оклад</label>
			<input name="prc[sallary]">
		</div>
	</div>
	<div class="loader"></div>
	<div class="btn-group">
		<button class="typeRepairCalculate">Рассчитать</button>
	</div>
</div>



<script>
	$(function(){
//		window.onbeforeunload = function() {
//			$.ajax({
//				url:'/index.php?r=site/logout',
//
//			})
//			//return "Данные не сохранены. Точно перейти?";
//		};

//		$('#submit-so').on('click', function(e){
//			e.preventDefault()
//			var url = $('#list-so form').attr('action')+'&Repair[so_id]='+$('input[name="Repair[so_id]"]').val()
//			location.href = url
//		})


	})

	var typeRepair = false;

	$('.typeRepairTitle').on('click', function() {
		typeRepair = $(this).attr('for')
		$('.typeRepairForm').addClass('hidden')
		$('.typeRepairForm[data-repair="'+typeRepair+'"]').removeClass('hidden')
	})

	$('#profitabilityCalc .typeRepairCalculate').on('click', function(){

		switch (typeRepair) {
			case 'srm':
				calcProfitSRM()
				break
			case 'prc':
				calcProfitPRC()
				break
			default:
				break

		}
	})

	function calcProfitSRM() {
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/equipPrice')?>',
			data:'id=<?=$model->eqip_id?>',
			dataType: 'json',
			beforeSend: function() {
				$('#profitabilityCalc .loader').text('Идет расчет, подождите...')
			},
			complete: function() {
				$('#profitabilityCalc .loader').text('')
			},
			success: function (r) {
				if(!r.data.price > 0) {
					alert('не удалось определить стоимость оборудования. расчет рентабельности невозможен.')
					return false
				}
				alert((parseFloat($('input[name="srm[price]"]').val())*1.3 / r.data.price)*100 >=49 ? 'ремонт нерентабельный' : 'ремонт рентабельный')
			}
		})
	}

	function calcProfitPRC() {
		$.ajax({
			url: '<?=Yii::app()->createUrl('repair/equipPrice')?>',
			data:'id=<?=$model->eqip_id?>',
			dataType: 'json',
			success: function (r) {

			}
		})
	}

</script>



<?php

$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(


	'header' => array(
		array(
			'ajax' => true,
			'options' => array(
				'url' => Yii::app()->createUrl('repairComments', array('repr_id'=>$model->Repr_id)),
			),
			'name'=>'Ход работ',
		),
		array(
			'ajax' => true,
			'options' => array(
				'url' => Yii::app()->createUrl('repairDetails', array('repr_id'=>$model->Repr_id)),
			),
			'name'=>'Используемые материалы',
		),
		array(
			'ajax' => true,
			'options' => array(
				'url' => Yii::app()->createUrl('repairDocuments', array('repr_id'=>$model->Repr_id)),
			),
			'name'=>'Документы',
		),
	),
	'content'=> array(
		array(
			'id'=>'process',
		),
		array(
			'id' => 'materials',
		),
		array(
			'id'=>'documentsr',
		),
	),
));

?>


<div class="btn-group">
	<?php
	if($model->status == 1) {
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'repr-send-accept',
			//'width' => 114,
			'Height' => 30,
			'Type' => 'Window',
			'Text' => 'Принять',
			'Href' => Yii::app()->createUrl('repair/accept',array('id'=>$model->Repr_id))
//			'OnAfterClick' => '
//			$("#list-so").dialog({
//				minHeight: 380,
//				minWidth:300,
//				modal: true,
//			})
//			'
		));
	}

	if($model->status == 7) {
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'repr-send-agree',
			//'width' => 114,
			'Height' => 30,
			'Text' => 'Требуется согласование',
			'Href' => Yii::app()->createUrl('repair/sendAgree',array('id'=>$model->Repr_id))
		));
	}

	if($model->status == 7) {
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'repr-agree',
			//'width' => 114,
			'Height' => 30,
			'Text' => 'Согласовано',
			'Href' => Yii::app()->createUrl('repair/agree',array('id'=>$model->Repr_id, 'agree'=>1))
		));
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'repr-no-agree',
			//'width' => 114,
			'Height' => 30,
			'Text' => 'Не согласовано',
			'Href' => Yii::app()->createUrl('Noagree',array('id'=>$model->Repr_id, 'agree'=>0))
		));
	}

	if($model->status == 3 || $model->status == 4) {
		if($model->date_plan<getdate()) {
			?>
			<label>Ремонт просрочен, укажите причину</label>
			<?php
			$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
				'id' => 'delayreason',
				'Value' => $model->delayreason,
				'Name' => 'Repair[delayreason]'
			));
		}
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'repr-complete',
			//'width' => 114,
			'Height' => 30,
			'Text' => 'Ремонт выполнен',
			'Href' => Yii::app()->createUrl('repair/ready',array('id'=>$model->Repr_id)),
		));
	}

	if($model->status == 10) {
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'repr-exec',
			//'width' => 114,
			'Height' => 30,
			'Text' => 'Выполнить',
			'Href' => Yii::app()->createUrl('repair/exec',array('id'=>$model->Repr_id))
		));
	}

	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'repr-undo-diagnos',
		//'width' => 114,
		'Height' => 30,
		'Text' => 'Возврат на диагностику',
		'Type' => 'Window',
		'Href' => Yii::app()->createUrl('repair/undoDiagnostic',array('id'=>$model->Repr_id))
	));



	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'repr-docs',
		//'width' => 114,
		'Height' => 30,
		'Text' => 'Документы',
		'Type' => 'none',
		//'href' => Yii::app()->createUrl('repair/accept',array('id'=>$model->Repr_id))
		'OnAfterClick' => '
			$("#documents").dialog({
				minHeight: 380,
				minWidth:300,
				modal: true,
			})
			'
	));

	?>


</div>

<!--<div id="ttt"><input name="sss"></div>-->
<!---->
<!--<script>-->
<!--	$('#ttt').ajaxSender()-->
<!--</script>-->