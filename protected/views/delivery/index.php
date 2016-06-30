<h1>Заявки на доставку</h1>
<?php $this->setPageTitle('Заявки на доставку') ?>

 <?php
 $this->breadcrumbs=array(
	
	'Заявки на доставку'=>array('index'),

);

 $this->menu=array(
	array('label'=>'Создать заявку', 'url'=>array('create')),
	array('label'=>'Редактировать заявку', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
	array('label'=>'Принять заявку', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'take')),
	array('label'=>'Удалить заявку', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
);
//$empl = Employees::all();
$street = new Streets;
//asort($empl);

?>
<!--<a class="toggler" href="#filter"><div class="btn btn-primary">Продвинутый фильтр</div></a>-->
<?php //$form=$this->beginWidget('CActiveForm', array(
//	'id'=>'filter',
//	'htmlOptions'=>array(
//		'class'=>'form-inline hidden popup',
//
//		),
//	'action'=>'/index.php',
//		'method'=>'get',
//	// Please note: When you enable ajax validation, make sure the corresponding
//	// controller action is handling ajax validation correctly.
//	// There is a call to performAjaxValidation() commented in generated controller code.
//	// See class documentation of CActiveForm for details on this.
//	'enableAjaxValidation'=>false,
//));
//?>
<!--<div class="close-popup"></div>-->
<?php //echo $form->labelEx($model,'Мастер'); ?>
<?php //echo $form->dropDownList($model,'mstr_id', $empl, array('name'=>'master_id',
//																							'class'=>'form-control',
//
//																								'empty'=>array(''=>'выбрать мастера'),
//																								'options'=>array(
//																											$master_id=>array('selected'=>'selected')),
//																											)); ?>
<?php //echo $form->error($model,'mstr_id'); ?>
<!--<div class="Clearfix"></div>-->
<!---->
<?php //echo $form->labelEx($model,'Курьер'); ?>
<?php //echo $form->dropDownList($model,'empl_dlvr_id', $empl, array('name'=>'empl_id',
//																							'class'=>'form-control',
//
//																								'empty'=>array(''=>'выбрать курьера'),
//																								'options'=>array(
//																											$empl_id=>array('selected'=>'selected')),
//																											)); ?>
<?php //echo $form->error($model,'empl_dlvr_id'); ?>
<!---->
<!---->
<!--<input name="r" value="delivery/index" class="hidden">-->
<!--<div class="Clearfix"></div>-->
<!--	<label>номер</label><input class="form-control" type="text" name="id" pattern="^[ 0-9]+$" size="5" maxlength="30" value="--><?//=$id?><!--">-->
<!--	<label>дата</label><input class="form-control datepicker" type="text" name="date[fixday]" size="10" maxlength="30" value="--><?//=$date?><!--">-->
<!--	<div class="Clearfix"></div>-->
<!--	<label>за период с </label><input class="form-control datepicker" type="text" name="date[begin]" size="10" maxlength="30" value="--><?//=$date_range['begin']?><!--" >-->
<!--	<label>по </label><input class="form-control datepicker" type="text" name="date[end]" size="10" maxlength="30" value="--><?//=$date_range['end']?><!--">-->
<!--	<div class="Clearfix"></div>-->
<!--	<label>последние</label><input class="form-control" type="text" name="top" pattern="^[ 0-9]+$" size="5" maxlength="30" value="--><?//=$top?><!--"><label>записей</label>-->
<!--	<div class="Clearfix"></div>-->
<!---->
<!--	<input name="status[notrans]" class="form-control" id="d-notrans" type="checkbox" --><?php //echo isset($status['notrans']) ? "checked=\"true\"" : ""; ?><!--<label for="d-notrans">Непринятые заявки </label>-->
<!--	<div class="Clearfix"></div>-->
<!--	<input name="status[nofinish]" class="form-control" id="d-nofinish" type="checkbox" --><?php //echo isset($status['nofinish']) ? "checked=\"true\"" : ""; ?><!--<label for="d-nofinish">Невыполненные заявки </label>-->
<!--	<div class="Clearfix"></div>-->
<!--	<input name="status[finish]" class="form-control" id="d-finish" type="checkbox" --><?php //echo isset($status['finish']) ? "checked=\"true\"" : ""; ?><!--<label for="d-finish">Выполненные заявки </label>-->
<!--	<div class="Clearfix"></div>-->
<!---->
<!--	--><?php //echo $form->labelEx($model,'Улица'); ?>
<!--	--><?php //echo $form->dropDownList($model,'Address_id', $street->all(), array('name'=>'address',
//																								'class'=>'form-control',
//
//																									'empty'=>array(''=>'выбрать улицу'),
//																									'options'=>array(
//																												$address=>array('selected'=>'selected')),
//																												)); ?>
<!--	--><?php //echo $form->error($model,'empl_dlvr_id'); ?>
<!---->
<!---->
<!--	<input type="submit" class="form-control" value="ok">-->
<!--	--><?php //$this->endWidget(); ?>
<ul class="filter">

	<li class="filter-field	">
		<div style="float: left"><label>номер</label></div>
		<div style="float: left">
		<?php
		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
			'id' => 'demands-number',
			'Width' => 100,
			//'label' => 'Номер',
//			'filterajax' => array(
//				'Count' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'condt',
//					'condition' => 'd.dldm_id = :value',
//				),
//			),
		));
		?>
		</div>
		<div class="clearfix"></div>
<!--		<input name="status[notrans]" class="form-control" id="d-notrans" type="checkbox" ><label for="d-notrans">Непринятые заявки </label>-->
		<?php
		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'cbNoTrans',
			'Label' => 'Непринятые заявки',
//			'filterajax' => array(
//				'NoTrans' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'check',
//					'condition_checked' => 'd.date_logist is null',
//					'condition_unchecked' => '',
//				),
//			),

		));
		?>
		<div class="Clearfix"></div>
<!--		<input name="status[nofinish]" class="form-control" id="d-nofinish" type="checkbox" ><label for="d-nofinish">Невыполненные заявки </label>-->
		<?php
		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'cbNoExec',
			'Label' => 'Невыполненные заявки',
//			'filterajax' => array(
//				'NoTrans' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'check',
//					'condition_checked' => 'd.date_delivery is null',
//					'condition_unchecked' => '',
//				),
//			),

		));
		?>
		<div class="Clearfix"></div>

<!--		<input name="status[finish]" class="form-control" id="d-finish" type="checkbox" ><label for="d-finish">Выполненные заявки </label>-->
		<?php
		$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
			'id' => 'cbExec',
			'Label' => 'Выполненные заявки',
//			'filterajax' => array(
//				'NoTrans' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'check',
//					'condition_checked' => 'd.date_delivery is not null',
//					'condition_unchecked' => '',
//				),
//			),

		));
		?>
		<div class="Clearfix"></div>
	</li>
	<li class="filter-field" >
		<div class="pull-left">
		<label>Курьер: </label>
		<?php
		$empl = new Employees();
		$list_empl = $empl->getData();
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'empl-dlvr',
//			'name' => 'Delivery[empl_dlvr_id]',
			'FieldName' => 'EmployeeName',
			'KeyField' => 'Employee_id',
			'ModelName' => 'Employees',
			'Width' => 200,
			'Type' => array(
				'Condition' => 'e.EmployeeName like \':Value%\'',
			),
			'Columns' => array(
				'Addr' => array(
					'Name' => 'Курьер',
					'FieldName' => 'EmployeeName',
//					'width' => 150,
//					'height' => 23,
				),
			),
//			'filterajax' => array(
//				'Master' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'condt',
//					'condition' => 'd.empl_dlvr_id = :value',
//				),
//			),

		));
		?>
		<label>Мастер: </label>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'master',

			'FieldName' => 'EmployeeName',
			'KeyField' => 'Employee_id',
			'Type' => array(
				'Condition' => 'e.EmployeeName like \':Value%\'',
			),
			'Width' => 200,
			'ModelName' => 'Employees',
			'Columns' => array(
				'Addr' => array(
					'Name' => 'Мастер',
					'FieldName' => 'EmployeeName',
					'Width' => 150,
					'Height' => 23,
				),
			),
//			'filterajax' => array(
//				'Master' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'condt',
//					'condition' => 'd.mstr_id = :value',
//				),
//			),

		));
		?>
		</div>
<!--		<div class="Clearfix"></div>-->
		<div class="pull-left">
		<label>Улица: </label>
		<?php
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'streets',

			'FieldName' => 'StreetName',
			'KeyField' => 'Street_id',
			'ModelName' => 'Streets',

			'Width' => 200,
			'Type' => array(
				'Condition' => 'st.StreetName like \':Value%\'',
			),

			'Columns' => array(
				'Addr' => array(
					'Name' => 'Улица',
					'FieldName' => 'StreetName',
					'Width' => 150,
					'Height' => 23,
				),
			),
//			'cascade' => array(
//				'control' => 'house',
//				'field' => 'Street_id',
//				'controlfield' => 'Street_id',
//			),
//			'filterajax' => array(
//				'Master' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'condt',
//					'condition' => 'a.Street_id = :value',
//				),
//			),

		));
		?>
		<label>Дом: </label>
<!--			<select></select>-->

		<?php
		$AddressList = new AddressList();
		$AddressList = $AddressList->Find(array());
		$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
			'id' => 'house',

			'FieldName' => 'House',
			'KeyField' => 'House',

			'Width' => 200,

			'Columns' => array(
				'Addr' => array(
					'Name' => 'Дом',
					'Fieldname' => 'House',
					'Width' => 150,
					'Height' => 23,
				),
			),
//			'filterajax' => array(
//				'Master' => array(
//					'grid' => 'demands-grid',
//					'typefilter' => 'condt',
//					'condition' => 'a.House = :value',
//				),
//			),

		));
		?>
			</div>
<!--		<div class="clearfix"></div>-->
		<div class="pull-left">
		<label>за период с </label>
		<?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id'=>'dateedit1'

		)); ?>
		<label>по </label>
		<?php $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
			'id'=>'dateedit2'

		)); ?>
		<div class="clearfix"></div>
<!--			<div class="pull-left">-->
<!--		<div style="float: left;"><label>последние</label></div>-->
<!--<!--		<input class="form-control" type="text" name="top" pattern="^[ 0-9]+$" size="5" maxlength="30" >-->
<!--		<div style="float: left;">-->
<!--		--><?php
//		$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
//			'id' => 'edCount',
//			'Width' => 100,
//			'Value' => 200,
////			'filterajax' => array(
////				'Count' => array(
////					'grid' => 'demands-grid',
////					'typefilter' => 'top',
////					'condition' => '',
////				),
////			),
//		));
//		?><!--</div>-->
<!--		<div style="float: left;"><label>записей</label></div>-->
<!--		<div class="Clearfix"></div>-->
	</li>
<div class="clearfix"></div>
</ul>
<!-- <form class="form-inline" method="get" action="/index.php">
	
</form> -->
<?php
//
//$this->widget('zii.widgets.grid.CGridView',array(
//	'filter'=>$model,
//	'tableHeight'=>'400px',
//	'dataProvider'=>$data,
//	'cssFile'=>'css/reference/gridview/styles.css',
//	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
//	//'htmlOption'=>array('class'=>'delivery-demands'),
//	'columns'=>array(
//		'dldm_id'=>array('name'=>'dldm_id', 'htmlOptions'=>array('role'=>'id')),
//		'date'=>array('name'=>'date','value'=>'$data["date"]'),
//		'user_sender'=>array('name'=>'user_sender','value'=>'$data["user_sender"]'),
//		'DeliveryType'=>array('name'=>'DeliveryType', 'value'=>'$data["DeliveryType"]'),
//		'objc_id'=>array('name'=>'objc_id'),
//		'dltp_id'=>array('name'=>'dltp_id'),
//		'mstr_id'=>array('name'=>'mstr_id','value'=>'$data["MasterName"]'),
//		'prty_id'=>array('name'=>'prty_id'),
//		'bestdate'=>array('name'=>'bestdate', 'value'=>'$data["bestdate"]'),
//		'deadline'=>array('name'=>'deadline', 'value'=>'$data["deadline"]'),
//		'plandate'=>array('name'=>'plandate', 'value'=>'$data["plandate"]'),
//		'text'=>array('name'=>'text','value'=>'$data["text"]','htmlOptions'=>array('role'=>'description','style'=>'width:200px;display:none;'),'headerHtmlOptions'=>array('style'=>'display:none;')),
//		'phonenumber'=>array('name'=>'phonenumber', 'value'=>'$data["phonenumber"]'),
//		'empl_dlvr_id'=>array('name'=>'empl_dlvr_id', 'value'=>'$data["CurName"]'),
//		'date_logist'=>array('name'=>'date_logist'),
//		'user_logist'=>array('name'=>'user_logist'),
//		'note'=>array('name'=>'note'),
//		'date_delivery'=>array('name'=>'date_delivery'),
//		'rep_delivery'=>array('name'=>'rep_delivery','htmlOptions'=>array('role'=>'rep','style'=>'width:200px;display:none;'),'headerHtmlOptions'=>array('style'=>'display:none;')),
//		'Contacts'=>array('name'=>'Contacts','htmlOptions'=>array('role'=>'contact','style'=>'width:200px;display:none;'),'headerHtmlOptions'=>array('style'=>'display:none;')),
//		'dlrs_id'=>array('name'=>'dlrs_id'),
//		'date_promise'=>array('name'=>'date_promise'),
//		'prtp_id'=>array('name'=>'prtp_id'),
//		'prdoc_id'=>array('name'=>'prdoc_id'),
//		'calc_id'=>array('name'=>'calc_id'),
//		'docm_id'=>array('name'=>'docm_id'),
//		'dmnd_id'=>array('name'=>'dmnd_id'),
//		'repr_id'=>array('name'=>'repr_id'),
//		'DeliveryMan'=>array('name'=>'DeliveryMan','value'=>'$data["DeliveryMan"]','htmlOptions'=>array('role'=>'cur','style'=>'width:200px;display:none;'),'headerHtmlOptions'=>array('style'=>'display:none;'))
//
//		),
//	));



$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id'=>'delivery-grid',
	'Width' => 600,
	'Height' => 200,

	'Stretch' => true,
	'ModelName' => 'Delivery',
	'Key' => 'DeliveryDemand_Index_DeliveryDemandsGrid',

	'Columns' => array(
		'date' => array(
			'Name' => 'Дата',
			'FieldName' => 'date',
			'Width' => 120,
		),
		'user_sender' => array(
			'Name' => 'Подал',
			'FieldName' => 'user_sender',
			'Width' => 120,
		),
		'DeliveryType' => array(
			'Name' => 'Вид доставок',
			'FieldName' => 'DeliveryType',
			'Width' => 120,
		),
		'bestdate' => array(
			'Name' => 'Желаемая дата',
			'FieldName' => 'bestdate',
			'Width' => 120,
		),
		'deadline' => array(
			'Name' => 'Предельная дата',
			'FieldName' => 'deadline',
			'Width' => 120,
		),
		'plandate' => array(
			'Name' => 'Запланированная дата',
			'FieldName' => 'plandate',
			'Width' => 120,
		),
		'AreaName' => array(
			'Name' => 'Район',
			'FieldName' => 'AreaName',
			'Width' => 120,
		),
		'Addr' => array(
			'Name' => 'Адрес',
			'FieldName' => 'Addr',
			'Width' => 120,
		),
		'date_promise' => array(
			'Name' => 'Обещанная дата',
			'FieldName' => 'date_promise',
			'Width' => 120,
		),
		'DemandPrior' => array(
			'Name' => 'Приоритет',
			'FieldName' => 'DemandPrior',
			'Width' => 120,
		),
		'date_logist' => array(
			'Name' => 'Дата принятия',
			'FieldName' => 'date_logist',
			'Width' => 120,
		),
		'overday' => array(
			'Name' => 'Просрочено',
			'FieldName' => 'overday',
			'Width' => 120,
		),
		'CurName' => array(
			'Name' => 'Курьер',
			'FieldName' => 'CurName',
			'Width' => 120,
		),
		'MasterName' => array(
			'Name' => 'Мастер',
			'FieldName' => 'MasterName',
			'Width' => 120,
		),

		'phonenumber' => array(
			'Name' => 'Телефон',
			'FieldName' => 'phonenumber',
			'Width' => 120,
		),
	),
	'OnAfterClick'=>'$("#delivery-description .description").text(settings.CurrentRow["text"])
	$("#delivery-cur .description").text(settings.CurrentRow["CurName"])
	$("#delivery-contact .description").text(settings.CurrentRow["Contacts"])
	$("#delivery-rep .description").text(settings.CurrentRow["rep_delivery"])
	',
	'OnDblClick'=>'$("#addition").click()'

));



//
//$this->widget('application.extensions.alitonwidgets.grid.algrid', array(
//	'id'=>'demands-grid',
//	'width' => 600,
//	'height' => 200,
//	'visible' => true,
//	'stretch' => true,
//	'data' => $data->rawData,
//	'keyfield' => 'dldm_id',
//	'ajax' => array(
//		'modelname' => 'Delivery',
//		'conditions' => array(),
//		'url' => Yii::app()->createUrl('AjaxData/GetData'),
//	),
//	'columns' => array(
//		'date' => array(
//			'name' => 'date',
//			'fieldname' => 'date',
//			'width' => 120,
//		),
//		'user_sender' => array(
//			'name' => 'user_sender',
//			'fieldname' => 'user_sender',
//			'width' => 120,
//		),
//		'DeliveryType' => array(
//			'name' => 'DeliveryType',
//			'fieldname' => 'DeliveryType',
//			'width' => 120,
//		),
//		'bestdate' => array(
//			'name' => 'bestdate',
//			'fieldname' => 'bestdate',
//			'width' => 120,
//		),
//		'deadline' => array(
//			'name' => 'deadline',
//			'fieldname' => 'deadline',
//			'width' => 120,
//		),
//		'plandate' => array(
//			'name' => 'plandate',
//			'fieldname' => 'plandate',
//			'width' => 120,
//		),
//
//		'phonenumber' => array(
//			'name' => 'phonenumber',
//			'fieldname' => 'phonenumber',
//			'width' => 120,
//		),
//	),
//	'lookup' => array(
//		'Contacts' => array(
//			'selector' => '#delivery-contact .description',
//			'field' => 'Contacts',
//		),
//		'Empl_dlvr' => array(
//			'selector' => '#delivery-cur .description',
//			'field' => 'CurName',
//		),
//		'Text' => array(
//			'selector' => '#delivery-description .description',
//			'field' => 'text',
//		),
//	),
//	'buttons' => array(
//		'edit' => array(
//			'url' => Yii::app()->createUrl('delivery/update'),
//			'params' => array(
//				'id' => 'dldm_id',
//			),
//		),
//		'take' => array(
//			'url' => Yii::app()->createUrl('delivery/take'),
//			'params' => array(
//				'id' => 'dldm_id',
//			),
//		),
//		'delete' => array(
//			'url' => Yii::app()->createUrl('delivery/delete'),
//			'params' => array(
//				'id' => 'dldm_id',
//			),
//		),
//	),
//));
?>
<hr>
<div id="delivery-contact" class="static-field extra-small pull-left">
	<p class="p-head">Контактное лицо:</p>
	<div class="description">

	</div>
</div>

<div id="delivery-cur" class="static-field extra-small pull-left">
	<p class="p-head">Курьер:</p>
	<div class="description">

	</div>
</div>

<hr>
<div id="delivery-description" class="static-field small pull-left">
	<p class="p-head">Содержание:</p>
	<div class="description">

	</div>
</div>

<div id="delivery-rep" class="static-field small pull-left">
	<p class="p-head">Отчет курьера:</p>
	<div class="description">

	</div>
</div>
<hr>
<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'addition',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Доп-но',
	'Href' => Yii::app()->createUrl('delivery/addition'),
	'Params' => array(
		array(
			'ParamName' => 'id',
			'NameControl' => 'delivery-grid',
			'TypeControl' => 'Grid',
			'FieldControl' => 'dldm_id',
		),
	),

));
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'add',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Создать',
	'Href' => Yii::app()->createUrl('delivery/create'),

));
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'edit',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Изменить',
	'Href' => Yii::app()->createUrl('delivery/update'),
	'Params' => array(
		array(
			'ParamName' => 'id',
			'NameControl' => 'delivery-grid',
			'TypeControl' => 'Grid',
			'FieldControl' => 'dldm_id',
		),
	),
));
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'take',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Принять',

));
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'delete',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Удалить',

));
?>
<style>
	.albutton {
		margin:3px;
	}
</style>

<script type="text/javascript">
$(".datepicker").datepicker({showButtonPanel:true, changeMonth:true, changeYear:true, dateFormat:'dd.mm.yy'
	
});

	$("body").on("click","tr",function(){

		// $("#delivery-description .description").text($(this).find("td[role='description']").text())
		// $("#delivery-rep .description").text($(this).find("td[role='rep']").text())

		$(this).find('td[role]').each(function(){
			var role = $(this).attr('role')
			$("#delivery-"+role+" .description").text($(this).text())
		})
		
		var id = $(this).find('td[role=id]').text();
		$('li[data-action=update] a').attr('href', '/index.php?r=delivery/update&id='+id);

		link = $(this).find('td.button-column a.delete').attr('href');
		$('li[data-action=delete] a').attr('href', '/index.php?r=delivery/delete&id='+id);
		$('li[data-action=take] a').attr('href', '/index.php?r=delivery/take&id='+id);
	})

	$("input[name='status[finish]']").click(function(){
		$(this).is(":checked") ?
			$("input[name='status[notrans]'],input[name='status[nofinish]']").attr({'checked':false,'disabled':true}) : 
			$("input[name='status[notrans]'],input[name='status[nofinish]']").attr({'disabled':false})		
		
	})

	$(".toggler").click(function(){
		var e = $(this).attr('href')
		if($(e).is(":hidden")) {
			$(e).hide().removeClass('hidden')
			$(e).slideDown(500)
			return false
		}
		else {
			$(e).slideUp(500)
			return false
		}
	})

	$(".close-popup").click(function(){
		$(".popup").slideUp(500)
	})







	Aliton.Links = [
		{
			Out: "empl-dlvr",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "d.empl_dlvr_id = :Value",
			Field: "Employee_id",
			Name: "cmb-delivery-empl_dlvr",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "master",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "d.mstr_id = :Value",
			Field: "Employee_id",
			Name: "cmb-delivery-empl_master",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "streets",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "a.Street_id = :Value",
			Field: "Street_id",
			Name: "cmb-delivery-empl_streets",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "dateedit1",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(d.DateCreate) <= ':Value'",
			Field: "DateCreate",
			Name: "DateEdit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "dateedit2",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(d.DateCreate) >= ':Value'",
			Field: "DateCreate",
			Name: "DateEdit2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "cbNoTrans",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "d.date_logist is null",
			ConditionFalse: "",
			Name: "Checkbox1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "cbNoExec",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "d.date_delivery is null",
			ConditionFalse: "",
			Name: "Checkbox2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "cbExec",
			In: "delivery-grid",
			TypeControl: "Grid",
			Condition: "d.date_delivery is not null",
			ConditionFalse: "",
			Name: "Checkbox3_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
	]

</script>