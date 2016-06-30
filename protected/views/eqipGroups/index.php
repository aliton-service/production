
<br>
<?php
/* @var $this EqipGroupsController */
/* @var $model EqipGroups */
$this->title = 'Структурное дерево оборудования';
$this->setPageTitle('Структурное дерево оборудования');
$this->breadcrumbs=array(
	'Справочники'=>array('/reference/index'),
	'Eqip Groups'=>array('index'),
	
);
?>
<div id="equips-tree">
	<?php
$this->widget('CTreeView', array(
	'collapsed'=>true,
	'control'=>'treecontrol',
	'animated'=>'fast',
	'cssFile'=>'css/treeview/treeview.css',
	'htmlOptions'=>array(

	                'class'=>'treeview-red'),
    'data'=>Tree::getTree('EqipGroups',1, array(
    	'id'=>'group_id',
    	'parent'=>'parent_group_id',
    	'name'=>'group_name',
		'notDel'=>'DelDate Is Null',
    	))

));
	?>
	</div><br>
<div class="btn-group">
<?php

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'create',
	'Height' => 30,
	'Text' => 'Создать',
	'Type' => 'none',
	'OnAfterClick' => 'createEqipGroup()'
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'update',
	'Height' => 30,
	'Text' => 'Изменить',
	'Type' => 'none',
	'OnAfterClick' => 'updateEqipGroup()'
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'delete',
	'Height' => 30,
	'Text' => 'Удалить',
	'Type' => 'none',
	'OnAfterClick' => "deleteEqipGroup()"
));

?>
</div">
<form id="eqip-edit" class="hidden">
	<input type="text" id="name-eqiptree">
	<input type="submit" value="ok">
</form>
<style>
	.treeview li span.text.selected {
		background-color: #006e00;
		color:#fff;
	}
	.treeview li.selected ul {
		background-color: none;
		color:#000;
	}
	#equips-tree {
		height: 500px;overflow: auto;border: 1px solid #000;
		margin: 15px 25px 15px 5px;
		width: 400px;
	}
</style>
<script>
	var eqip_gr = 1
	var action_save = ''
	$('#equips-tree li span.text').on('click', function(){
		$('#equips-tree li span.text').removeClass('selected')
		eqip_gr = $(this).parent().attr('data-id')
		$(this).addClass('selected')
		return false
	})

	function deleteEqipGroup() {
		if(eqip_gr == 1) {
			alert('Выберите категорию')
			return false
		}
		aliton.form.delete('eqipGroups/delete', eqip_gr, function(){

			window.location.reload()
		})
	}

	function createEqipGroup() {
		action_save = 'create'
		$('#eqip-edit').load('/?r=eqipGroups/create')
		$('#eqip-edit').dialog()
	}

	function updateEqipGroup() {
		action_save = 'update'
		$('#eqip-edit').load('/?r=eqipGroups/update&id='+eqip_gr)
//		$('#name-eqiptree').val($('#equips-tree li span.text.selected').text())
		$('#eqip-edit').dialog()
	}

	 function saveEqipGr(){
		var data = {
			EqipGroups: {
				group_name: $('#eqip-groups-form input[name="EqipGroups[group_name]"]').val()
			}
		}
		 var update_query = ''
		if(action_save === 'create') data.EqipGroups.parent_group_id = eqip_gr
		else if(action_save === 'update') {
			data.EqipGroups.group_id = eqip_gr
			update_query = '&id='+eqip_gr
		}
console.log(data)
		$.ajax({
			url: '/?r=eqipGroups/'+action_save+update_query,
			type: 'post',
			data: data,
			dataType: 'json',
			success: function (r) {
				if(r.status !== 'ok') {
					// error
				}
				alert('success')
				window.location.reload()
			},
			error: function (r) {
				if(r.status == 200) {
					$('#eqip-edit').html($(r.responseText))
				} else {
					alert('Произошла непридвиденная ошибка, повторите попытку позже')
				}
			}
		})
	}


</script>
<?php

//$this->menu=array(
//	array('label'=>'Создать EqipGroups', 'url'=>array('create')),
//	array('label'=>'Редактировать EqipGroups', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'update')),
//	array('label'=>'Удалить EqipGroups', 'url'=>array('#'), 'itemOptions'=>array('data-action'=>'delete')),
//);
//
//Yii::app()->clientScript->registerScript('search', "
//$('.search-button').click(function(){
//	$('.search-form').toggle();
//	return false;
//});
//$('.search-form form').submit(function(){
//	$('#eqip-groups-grid').yiiGridView('update', {
//		data: $(this).serialize()
//	});
//	return false;
//});
//");
//?>
<!---->
<!--<h1>Редактирование Eqip Groups</h1>-->
<!---->
<!---->
<!---->
<!---->
<!---->
<!--<div class="search-form" style="display:none">-->
<?php //$this->renderPartial('_search',array(
//	'model'=>$model,
//)); ?>
<!--</div><!-- search-form -->
<!---->
<?php //
//// $this->widget('zii.widgets.grid.CGridView', array(
//// 	'id'=>'eqip-groups-grid',
//// 	'dataProvider'=>$model->search(),
//// 	'cssFile'=>'css/reference/gridview/styles.css',
//// 	'pager'=>array('cssFile'=>'css/reference/gridview/pager.css', ),
//// 	'filter'=>$model,
//// 	'columns'=>array(
//// 		// 'group_id',
//// 		'parent_group_id' ,
//// 		'code',
//// 		'group_name',
//// 		'full_group_name',
//// 		// 'Lock',
//// 		/*
//// 		'EmplLock',
//// 		'DateLock',
//// 		'EmplCreate',
//// 		'DateCreate',
//// 		'EmplChange',
//// 		'DateChange',
//// 		'EmplDel',
//// 		'DelDate',
//// 		*/
//// 		array(
//// 			'class'=>'CButtonColumn',
//// 		),
//// 	),
//// ));
//
//
//$this->widget('CTreeView', array(
//	'collapsed'=>true,
//	'control'=>'treecontrol',
//	'animated'=>'fast',
//	'cssFile'=>'css/treeview/treeview.css',
//	'htmlOptions'=>array(
//
//	                'class'=>'treeview-red'),
//    'data'=>Tree::getTree('EqipGroups',1, array(
//    	'id'=>'group_id',
//    	'parent'=>'parent_group_id',
//    	'name'=>'group_name',
//    	))
//
//));
//
//
//
//// Tree::getTree('EqipGroups','sdfd',1);
//
//?>
<!---->
<!--<script type="text/javascript">-->
<!--	$('body').on('click','.items tbody tr', function(){-->
<!--		-->
<!--		var link = $(this).find('td.button-column a.update').attr('href');-->
<!--		$('li[data-action=update] a').attr('href', link);-->
<!---->
<!--		link = $(this).find('td.button-column a.delete').attr('href');-->
<!--		$('li[data-action=delete] a').attr('href', link);-->
<!---->
<!--	});-->
<!---->
<!--	$('body').on('click','li[data-action=delete] a',function(){-->
<!--		$.ajax({-->
<!--			type: 'post',-->
<!--			url: $(this).attr('href'),-->
<!--			data: 'EqipGroups=EqipGroups',-->
<!--			success: function() {-->
<!---->
<!--			}-->
<!--		})-->
<!--	})-->
<!---->
<!---->
<!---->
<!--	$("body").on("click",".treeview li",function(){-->
<!--		$(".treeview li").removeClass("selected")-->
<!--		$(this).addClass("selected")-->
<!--		$('li[data-action=update] a').attr('href', '/index.php?r=eqipGroups/update&id='+$(this).attr('data-id'));-->
<!--		return false-->
<!--	})-->
<!--	-->
<!---->
<!--</script>-->




