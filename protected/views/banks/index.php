<br>
<?php
/* @var $this BanksController */

$this->setPageTitle('Банки');
$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Банки'=>array('index'),
	'Создать',
);
$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListBanks',
	'Stretch' => true,
	'Key' => 'Reference_Banks_Index_Grid_1',
	'ModelName' => 'Banks',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'bank_name' => array(
			'Name' => 'Название',
			'FieldName' => 'bank_name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'b.bank_name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'b.bank_name desc',
				'Down' => 'b.bank_name',
			),
		),
		'cor_account' => array(
			'Name' => 'Кор. счет',
			'FieldName' => 'cor_account',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'b.cor_account = :Value',
			),
			'Sort' => array(
				'Up' => 'b.cor_account desc',
				'Down' => 'b.cor_account',
			),
		),
		'bik' => array(
			'Name' => 'БИК',
			'FieldName' => 'bik',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'b.bik = :Value',
			),
			'Sort' => array(
				'Up' => 'b.bik desc',
				'Down' => 'b.bik',
			),
		),
		'City' => array(
			'Name' => 'Город',
			'FieldName' => 'City',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'b.City Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'b.City desc',
				'Down' => 'b.City',
			),
		),
		'Department' => array(
			'Name' => 'Отделение',
			'FieldName' => 'Department',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'b.Department Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'b.Department desc',
				'Down' => 'b.Department',
			),
		),


	),
	'OnDblClick' => '$("#update").albutton("BtnClick")',


));
?><div class="clearfix"></div>

<div class="btn-group">
<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'create',
		'Height' => 30,
		'Text' => 'Создать',
		'Type' => 'Window',
		'Href' => Yii::app()->createUrl('banks/create')

	));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'update',
	'Height' => 30,
	'Text' => 'Изменить',
	'Type' => 'none',
	'OnAfterClick' => "window.open('/?r=banks/update&id='+algridajaxSettings.ListBanks.CurrentRow['Bank_id'])"
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'delete',
	'Height' => 30,
	'Text' => 'Удалить',
	'Type' => 'none',
	'OnAfterClick' => "aliton.form.delete('banks/delete', algridajaxSettings.ListBanks.CurrentRow['Bank_id'], function(){
	 $('#ListBanks').algridajax('LoadData')
	 })"
));

?>
</div>
<script>
//	$('#update').on('click', function (e) {
//		e.preventDefault()
//		window.open('/?r=banks/update&id='+algridajaxSettings.ListBanks.CurrentRow['Bank_id'])
//	})
</script>
