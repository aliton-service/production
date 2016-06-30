
<h1>Реестр документов</h1>

<div class="filter-grid">
	<ul class="filter">
		<li>
			<div class="pull-left" >
				<label>Номер: </label>
<!--				<input class="small">-->
				<?php
				$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
					'id' => 'id-number',
					'Width' => 200,
					'Value' => 100,
					'Type' => 'String',
					'Mode' => "Auto",
				));
				?>
				<br>
				<div>
					<?php
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'cmb-storage-suppliers',

						'FieldName' => 'NameSupplier',
						'KeyField' => 'Supplier_Id',
						'Width' => 167,
						'ModelName' => 'Suppliers',

						'Type' => array(
							'Condition' => 's.NameSupplier like \':Value%\'',
						),
						'Columns' => array(
							'Address' => array(
								'Name' => 'Поставщик',
								'FieldName' => 'NameSupplier',
								'Width' => 300,
								'Height' => 23,
							),
						),

					));
					?>
				</div>
			</div>
			<div class="pull-left text-right" style="margin-left: 20px;">
				<div>
					<label>Дата с: </label>
					<?php
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'DateEdit1',
						//'Value' => date('d.m.Y H:i'),
					));
					echo 'по: ';
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'DateEdit2',
						//'Value' => date('d.m.Y H:i'),
					));
					?>
				</div>
			</div>
			<div class="clearfix"></div>

		</li>

		<li>
			<div class="pull-left text-right">
				<div>
					<label>Создан с: </label>
					<?php
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'DateEdit3',
						//'Value' => date('d.m.Y H:i'),
					));
					echo 'по: ';
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'DateEdit4',
						//'Value' => date('d.m.Y H:i'),
					));
					?>
				</div>
			</div>
			<div class="pull-left text-right" style="margin-left: 20px;">
				<div>
					<label>Подтвержден с: </label>
					<?php
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'DateEdit5',
						//'Value' => date('d.m.Y H:i'),
					));
					echo 'по: ';
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'DateEdit6',
						//'Value' => date('d.m.Y H:i'),
					));
					?>
				</div>
			</div>
			<?php
//			$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
//				'id' => 'storage-addr',
//				'Stretch' => true,
//				'Key' => 'Storage_Index_cmbAddrGrid',
//				'ModelName' => 'ListObjects',
//				'ShowFilters' => false,
//				'ShowPager' => false,
//				'Height' => 300,
//				'Width' => 400,
//				'PopupWidth' => 500,
//				'KeyField' => 'Object_id',
//				'FieldName' => 'Addr',
//				'Type' => 'Locate',
//				'FilterCondition' => "t.Addr like ':Value%'",
//				'Columns' => array(
//					'Addr' => array(
//						'Name' => 'Адрес',
//						'FieldName' => 'Addr',
//						'Width' => 300,
//						'Filter' => array(
//							'Condition' => "a.Addr like ':Value%'",
//						),
//
//					),
//				),
//				//'OnAfterChange' => '$("#ListDocumentsAllGrid").algridajax("locate", ["t.Object_id = " + alcomboboxajaxSettings[id].KeyValue]);',
//
//			));
			?>

		</li>
	</ul>
</div>


<?php

$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
//	'success' => '$(".form").togglerEditForm()',
'afterActivate'=>'docParam.type = $(this).attr("href");
	docParam.actionCreate = $(this).attr("url").match(/\/?[\S]*storage\/([\w]*)/)[1];
	loadLinks();

',
//	'reload' => true,
	'header' => array(
		array(
			'name' => 'Все документы',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/docAll',
			),
		),
		array(
			'name' => 'Накладные на приход',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/billComing',
			),
		),
		array(
			'name' => 'Требования на выдачу',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/requireGrant',
			),
		),
		array(
			'name' => 'Накладная на возврат',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/billReturn',
			),
		),
		array(
			'name' => 'Накладная на возврат поставщику',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/billReturnDistrib',
			),
		),
		array(
			'name' => 'Перемещение из ПРЦ на склад',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/movePRC',
			),
		),
		array(
			'name' => 'Перемещение со склада на склад',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/moveStorage',
			),
		),
		array(
			'name' => 'Накладная на возврат мастеру',
			'ajax' => true,
			'options' => array(
				'url' => '/index.php?r=storage/billReturnMaster',
			),
		),


	),
	'content' => array(
		array(
			'id' => 'doc-all',
		),
		array(
			'id' => 'doc-billcoming',
		),
		array(
			'id' => 'doc-requiregrant',
		),
		array(
			'id' => 'doc-billreturn',
		),
		array(
			'id' => 'doc-billreturndistrib',
		),
		array(
			'id' => 'doc-moveprc',
		),
		array(
			'id' => 'doc-movestorage',
		),
		array(
			'id' => 'doc-billreturnmaster',
		),

	),
));

?>
<h4>Ход работы:</h4>
<div id="process-work"></div>

<div class="buttons">
<a id="view-doc" target="_blank" ><?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'view',
	'Height' => 30,
	'Text' => 'Дополнительно',
	'Type' => 'none',
));
?></a>
<a id="create-doc" target="_blank" >
<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'create',
	'Height' => 30,
	'Text' => 'Создать',
	'Type' => 'none',
	//'Href' => Yii::app()->createUrl('storage/create'),
));
?>
</a>

<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'cancel-confirm',
	'Height' => 30,
	'Text' => 'Отменить подтверждение',
	'Type' => 'none',
	'OnAfterClick' => 'cancelConfirm()'
));
?>

<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'delete',
	'Height' => 30,
	'Text' => 'Удалить',
	'Type' => 'none',
	'OnAfterClick' => 'deleteDoc()'
));
?>
</div>

<div id="cancel-confirm-box" class="hidden">
	<?php
	$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
		'id' => 'cmb-cancel-confirm',
		'popupid' => 'cmb-cancel-confirm-grid',
		'data' =>ConfirmCancels::getData(),
		'label' => 'Основание для отмены подтвеждения отмены документов',
		'fieldname' => 'ConfirmCancelName',
		'keyfield' => 'ConfirmCancel_id',

		'width' => -1,
		'popupwidth' => 300,
		'showcolumns' => true,
		'name' => 'WHDocuments[ConfirmCancel_id]',
		'columns' => array(
			'confirmcancel' => array(
				'name' => 'Основание',
				'fieldname' => 'ConfirmCancelName',
				'width' => 300,
			),
		),
		'onafterchange'=>'docParam.confirm_cancel_id = object.keyvalue'

	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'save-confirm-cancel',
		'Height' => 30,
		'Text' => 'OK',
		'Type' => 'none',
		'OnAfterClick' => 'saveConfirmCancel()'
	));
	?>
</div>
<!---->
<!--<input id="docm_id_test">-->
<!---->
<!--<input id="testdoc">-->
<!--<input id="testdoc2">-->
<!--<input id="testdoc3">-->


<script>


	var docParam = {
		type: false,
		id: false,
		strg_id: null,
		actionCreate: null,
		confirm_cancel_id: null,
		createUrl: function (selector) {
			$(selector).attr('href','/index.php?r=storage/view&id='+this.id+'&strg_id='+this.strg_id+this.type)
		}
	}

	$('#view-doc').on('click', function (e) {
		if(!docParam.type || docParam.type == '#doc-all') {
			alert('Выберите тип документа')
			return false
		}
		if(!docParam.id) {
			alert('Выберите документ')
			return false
		}
	})

	$('#create-doc').on('click', function (e) {
		if(!docParam.type || docParam.type == '#doc-all') {
			alert('Выберите тип документа')
			return false
		}
		$(this).attr('href','/index.php?r=storage/create&view='+docParam.actionCreate)
	})

	deleteDoc = function() {
		if(!docParam.id) {
			alert('Выберите документ')
			return false
		}

		if(!confirm('Вы действительно хотите удалить этот документ?')) {
			return false
		}

		$.ajax({
			url: '/?r=storage/delete',
			data: 'id='+docParam.id,
			method: 'post',
			dataType: 'json',
			success: function (r) {
				if (r.status_msg && r.status_msg != 0) {
					alert(r.status_msg)
				}
				else {
					alert('Не получилось удалить запись, попробуйте удалить позже.')
				}
			},
			error: function () {
				alert('Запрос не удался, повторите попытку позже.')
			}
		})
	}

	cancelConfirm = function() {
		$('#cancel-confirm-box').dialog({minHeight:390, minWidth:350})
	}

	saveConfirmCancel = function() {
		if(confirm('Вы действительно хотите отменить подтверждение?')) {

			$.ajax({
				url: '/?r=storage/cancelConfirm',
				data: 'ConfirmCancel_id='+docParam.confirm_cancel_id+'&id='+docParam.id,
				dataType: 'json',
				method: 'post',
				success: function(r){
					if (r.status_msg && r.status_msg != 0) {
						alert(r.status_msg)
					}
					else {
						alert('Не получилось отменить подтверждение, попробуйте удалить позже.')
					}
				},
				error: function () {
					alert('Запрос не удался, повторите попытку позже.')
				},
			})
		}
	}


//	aliton.wh = $('#process-work').model({
//		table:'WHDocuments',
//		prop: {
//			docm_id:null,
//			notes:'',
//			t2:'',
//			t3:'',
//		},
//		bindProp: {
//			notes: '#process-work',
//			docm_id: '#testdoc',
//			t2:'#testdoc2',
//			t3:'#testdoc3',
//		},
//		relations: {
//			notes: {
//				target: '#docm_id_test',
//				update: true,
//			}
//		},
//		validate: {
//			number: {
//				props: ['docm_id','t2'],
//				regex: 'number',
//			},
//			sym: {
//				props: ['t3'],
//				regex: 'dfgfd',
//				required: true,
//			},
//			req:{
//				props:['t2'],
//				required:true,
//			}
//		},
//		sourceNote: '/?r=storage/getNote',
//		onChange: function(event,props) {
//			props.docm_id = $(this).val()
//		},
//		decorator:{
//			notes: function (e) {
//				return '<pre>' + e + '</pre>'
//			},
//			general: function (e) {
//				alert(e)
//
//			}
//		},
//		onUpdateProp: {
//			docm_id: function () {
//
//			}
//		}
//
//	})

/*
modelup example

	Aliton.wh = $('#process-work').modelup({
		table:'WHDocuments',
		prop: {
			docm_id:{
				value:null,
				bind:'#testdoc',
				validate: {
					regex: 'number',
					//	maxLength:2,
				},
				primary: true,
			},
			notes:{
				value:'',
				bind:'#process-work',
				relations: {
					target: '#docm_id_test',
					update: true,
				},
				decorator: function(v){
					//$('#process-work').html('<pre>'+v+'<pre>')
					$('#process-work').html('')
					var parts = v.split('\n')
//					var regexp = /([\d]{2}\.[\d]{2}\.[\d]{4}\ [\d]{2}\:[\d]{2})\ \|\ ([\S ]*)/g, parts =[];

//					while(result = regexp.exec(v)) {
//						parts.push(result)
//					}
//					for(part in parts) {
//						$('#process-work table tbody').append('<tr><td>'+parts[part][1]+'</td><td>'+parts[part][2]+'</td></tr></p>')
//					}
					for(part in parts) {
						$('#process-work').append('<p>'+parts[part]+'</p>')
					}
//					$('#process-work').html('<pre>'+v+'</pre>')

				}

			},
			t2:{
				value:'',
				bind:'#testdoc2',
				validate:{
					regex: 'float',
					required: true,
					minLength: 3,
					min:100,
					max:80000,
					maxLength:8,

				},
				onUpdate: function () {
					//alert('t2')
				},
			},
			t3:{
				value:'',
				bind:'#testdoc3',
				validate:{
					required: true,
					regex:'set',
					set: ['Мовсисян','Привалов','Рогов','Иванов','Петров'],
				},
				onUpdate: function () {
					//alert('t3')
				},
			},
		},
		sourceNote: '/?r=storage/getNote',
		onChange: function(event,props) {
			props.docm_id = $(this).val()
		},
		decorator: function(v) {
			return '<div>' + v + '</div>'
		},
//		decorator:{
//			notes: function (e) {
//				return '<pre>' + e + '</pre>'
//			},
//			general: function (e) {
//				return '<div>' + e + '</div>'
//			}
//		},
		onUpdateProp: {
			docm_id: function () {

			}
		}

	})

 */


//core.createNamespace('al.test')
////	al.test = {
////		events: {
////			showmsg: {
////				event: 'click',
////				selector: 'body',
////				action: 'showmsg',
////			},
////		},
////
////		showmsg: function(){
////			alert(123)
////		},
////	}
//	al.test = extClass.extend({
//		events: {
//			showmsg: {
//				event: 'click',
//				selector: 'body',
//				action: 'showmsg',
//			},
//		},
//
//		showmsg: function(){
//			alert(123)
//		},
//	})
//	al.test.extend(evented)
//	al.test.init()





	var socket = new WebSocket("ws://localhost:3000", []);
	console.log(socket)

</script>




<script>
	var Links = {
		docAll: [
			{
				Out: "id-number",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListDocumentsAllGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate8",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
		billReturn: [
			{
				Out: "id-number",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate7",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
		billReturnDistrib: [
			{
				Out: "id-number",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListBillReturnDistribGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate6",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
		requireGrant: [
			{
				Out: "id-number",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListRequireGrantGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate5",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
		billComing: [
			{
				Out: "id-number",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListBillComingGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
		movePRC: [
			{
				Out: "id-number",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListMovePRCGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate4",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
		moveStorage: [
			{
				Out: "id-number",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListMoveStorageGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate3",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
		billReturnMaster: [
			{
				Out: "id-number",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "d.docm_id = ':Value'",
				Name: "Edit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false
			},
			{
				Out: "DateEdit1",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit2",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit3",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit4",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit5",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) >= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "DateEdit6",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "dbo.truncdate(d.date_create) <= ':Value'",
				Field: "DateCreate",
				Name: "DateEdit1_Filter1",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			},
			{
				Out: "cmb-storage-suppliers",
				In: "ListBillReturnMasterGrid",
				TypeControl: "Grid",
				Condition: "d.splr_id = :Value",
				Field: "Supplier_Id",
				Name: "cmb-storage-suppliers_Locate2",
				TypeFilter: "Internal",
				TypeLink: "Filter",
				isNullRun: false,
			}
		],
	};

	loadLinks = function() {
		location.hash == 0 ? location.hash = '#doc-all' : ''
		switch (location.hash.match(/^#([\w-_+., ]*)/)[1] || '') {
			case 'doc-all':
				Aliton.Links = Links.docAll;
				break;
			case 'doc-billcoming':
				Aliton.Links = Links.billComing
				break;
			case 'doc-requiregrant':
				Aliton.Links = Links.requireGrant
				break;
			case 'doc-billreturn':
				Aliton.Links = Links.billReturn
				break;
			case 'doc-billreturndistrib':
				Aliton.Links = Links.billReturnDistrib
				break;
			case 'doc-moveprc':
				Aliton.Links = Links.movePRC
				break;
			case 'doc-movestorage':
				Aliton.Links = Links.moveStorage
				break;
			case 'doc-billreturnmaster':
				Aliton.Links = Links.billReturnMaster
				break;
			default:
				break;
		}
	};





//	aliton.chanel.on('testevent', function(evt, msg) {
//		console.log(msg)
//	});
//
//	aliton.chanel.trigger('testevent', 'ololo');



</script>