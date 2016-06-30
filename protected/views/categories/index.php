
<br>
<?php
/**
 *
 * @var CategoriesController $this
 */
$this->title = 'Категории ТМЦ';
$this->setPageTitle('Категории ТМЦ');
$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListCategories',
	'Stretch' => true,
	'Key' => 'Reference_Categories_Index_Grid_1',
	'ModelName' => 'Categories',
	//'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'name' => array(
			'Name' => 'Название',
			'FieldName' => 'name',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'c.name Like \':Value%\'',
			),
			'Sort' => array(
				'Up' => 'c.name desc',
				'Down' => 'c.name',
			),
		),
		'ForPrice' => array(
			'Name' => 'Для прайса',
			'FieldName' => 'ForPrice',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'c.ForPrice = :Value',
			),
		),
		'ForObject' => array(
			'Name' => 'Для объектов',
			'FieldName' => 'ForObject',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'c.ForObject = :Value',
			),
		),
		'ForTreb' => array(
			'Name' => 'Для требований',
			'FieldName' => 'ForTreb',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'c.ForTreb = :Value',
			),
		),
		'ForCostCalc' => array(
			'Name' => 'Для смет',
			'FieldName' => 'ForCostCalc',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'c.ForCostCalc = :Value',
			),
		),



	),
	'OnDblClick' => '$("#update").albutton("BtnClick")',


));
?><div class="clearfix"></div><div class="btn-group"><?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'create',
	'Height' => 30,
	'Text' => 'Создать',
	'Type' => 'Window',
	'Href' => Yii::app()->createUrl('Categories/create')

));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'update',
	'Height' => 30,
	'Text' => 'Изменить',
	'Type' => 'none',
	'OnAfterClick' => "window.open('/?r=categories/update&id='+algridajaxSettings.ListCategories.CurrentRow['ctgr_id'])"
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'delete',
	'Height' => 30,
	'Text' => 'Удалить',
	'Type' => 'none',
	'OnAfterClick' => "aliton.form.delete('categories/delete', algridajaxSettings.ListCategories.CurrentRow['ctgr_id'], function(){
	 $('#ListCategories').algridajax('LoadData')
	 })"
));

?>
</div>
<script>
//	$('#update').on('click', function (e) {
//		e.preventDefault()
//		window.open('/?r=categories/update&id='+algridajaxSettings.ListCategories.CurrentRow['ctgr_id'])
//	})
</script>
