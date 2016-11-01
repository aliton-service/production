<?php
/**
 *
 * @var EventsController $this
 */
$this->title = 'Графики';
?>
<style>
	/*#clientList {*/
		/*height: 500px;*/
		/*width: 450px;*/
		/*overflow: auto;*/
		/*border: 1px solid #aaa;*/
		/*background-color: #fff;*/
	/*}*/
	/*.client {*/
		/*clear: both;*/
		/*border-bottom: 1px solid #aaa;*/
		/*height: 25px;*/
		/*overflow: hidden;*/
		/*cursor: pointer;*/
	/*}*/
	/*.client.selected, .albutton.selected{*/
		/*background-color: #2f5c3b;*/
		/*color: #fff;*/
	/*}*/
	/*.client.selected .column:nth-child(odd) {*/
		/*border-color: #fff ;*/
	/*}*/
	/*.column {*/
		/*padding: 0 7px;*/
		/*width:200px;*/
		/*height: 100%;*/
	/*}*/
	/*.column:nth-child(odd) {*/
		/*border-right: 1px solid #aaa;*/
	/*}*/
	/*#systype-list {*/
		/*position: relative;*/
	/*}*/
	/*#systype-list #droplist {*/
		/*display: none;*/
		/*position: absolute;*/
		/*z-index: 10;*/
		/*background-color: #fff;*/
		/*width: 100%;*/
		/*padding: 5px;*/
		/*border: 1px solid #aaa;*/
		/*height: 200px;*/
		/*overflow: auto;*/
	/*}*/
</style>


<form id="filterevent">
	<ul class="filter">
		<li>
			<div class="field">
				<label>Мастер</label>
				<?php
				$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
					'id' => 'master',
					'Stretch' => true,
					'ModelName' => 'Employees',
					'Height' => 300,
					'Width' => 180,
					'KeyField' => 'Employee_id',
					'FieldName' => 'EmployeeName',
					'Type' => array(
						'Mode' => 'Filter',
						'Condition' => 'e.EmployeeName like \':Value%\'',
					),
					'Columns' => array(
						'EmployeeName' => array(
							'Name' => 'Мастер',
							'FieldName' => 'EmployeeName',
							'Width' => 200,

						),
					),
				));
				?>
			</div>
			<div style="min-width: 180px;" class="field border">
				<div class="title">Показывать только:</div>
				<?php
				$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
					'id' => 'noexec',
					'Width' => 200,
					'Label' => "Невыполненные",
//					'OnAfterClick'=>'filter["noexec"] = ""'
				));
				?>
				<?php
				$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
					'id' => 'exec',
					'Width' => 200,
					'Label' => "Выполненные",
//					'OnAfterClick'=>'filter["exec"] = "e.date_exec is null"'
				));
				?>
				<?php
				$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
					'id' => 'overday',
					'Width' => 200,
					'Label' => "Просроченные",
//					'OnAfterClick'=>'filter["overday"] = "e.date_exec is null"'
				));
				?>
				<div class="pull-left" style="margin-right: 15px">
					<?php
					$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
						'id' => 'vip',
						'Width' => 200,
						'Label' => "VIP",
						'OnAfterClick'=>'filter["vip"] = "(o.sum_price >= " + forvip + " or o.sum_appz_price >= " + forvip + ")";'
					));
					?>
				</div>
				<div class="pull-left">
					<?php
					$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
						'id' => 'novip',
						'Width' => 200,
						'Label' => "Не VIP",
						'OnAfterClick'=>'filter["novip"] = "(o.sum_price < " + forvip + " and o.sum_appz_price < " + forvip + ")";'
					));
					?>
				</div>
				<div class="clearfix"></div>
				<div class="pull-left" style="margin-right: 15px">
				<?php
				$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
					'id' => 'manyevent',
					'Width' => 60,
					'Label' => ">0",

				));
				?>
				</div>
				<div class="pull-left">
				<?php
				$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
					'id' => 'notevent',
					'Width' => 60,
					'Label' => "=0",

				));
				?>
				</div>
				<div class="clearfix"></div>
				<?php
				$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
					'id' => 'showhidden',
					//'Width' => 60,
					'Label' => "Показать скрытые",
				));
				?>
			</div>
		</li>
		<li>
			<div style="min-width: 600px;" class="field border">
				<div class="title">Отбор по парметрам</div>
				<div>
					<div class="field pull-left">
						<label>План. дата</label>
						<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'plandate',
							'Width' => 120,
						));
						?>
					</div>


					<div class="field pull-left">
						<label>Исполнитель</label>
						<?php
						$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
							'id' => 'executor',
							'Stretch' => true,
							'ModelName' => 'Employees',
							'Height' => 300,
							'Width' => 180,
							'KeyField' => 'Employee_id',
							'FieldName' => 'EmployeeName',
							'Type' => array(
								'Mode' => 'Filter',
								'Condition' => 'e.EmployeeName like \':Value%\'',
							),
							'Columns' => array(
								'EmployeeName' => array(
									'Name' => 'Исполнитель',
									'FieldName' => 'EmployeeName',
									'Width' => 200,

								),
							),
						));
						?>
					</div>

					<div class="field pull-left">
						<label>Район</label>
						<?php
						$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
							'id' => 'area',
							'Stretch' => true,
							'ModelName' => 'Areas',
							'Height' => 300,
							'Width' => 180,
							'KeyField' => 'Area_id',
							'FieldName' => 'AreaName',
							'Type' => array(
								'Mode' => 'Filter',
								'Condition' => 'a.AreaName like \':Value%\'',
							),
							'Columns' => array(
								'AreaName' => array(
									'Name' => 'Район',
									'FieldName' => 'AreaName',
									'Width' => 200,

								),
							),
							'OnAfterChange' => 'areaChange()'
						));
						?>
					</div>

					<div class="field pull-left">
						<label>Форма отчетности</label>
						<?php
						$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
							'id' => 'repform',
							'Stretch' => true,
							'ModelName' => 'ReportForms',
							'Height' => 300,
							'Width' => 180,
							'KeyField' => 'Rpfr_id',
							'FieldName' => 'ReportForm',
							'Type' => array(
								'Mode' => 'Filter',
								'Condition' => 'rf.ReportForm like \':Value%\'',
							),
							'Columns' => array(
								'ReportForm' => array(
									'Name' => 'Исполнитель',
									'FieldName' => 'ReportForm',
									'Width' => 200,

								),
							),
						));
						?>
					</div>

					<div class="clearfix"></div>

					<div>
						<div class="field pull-left">
							<label>Участок</label>
							<?php
							$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
								'id' => 'territ',
								'Stretch' => true,
								'ModelName' => 'Territory',
								'Height' => 300,
								'Width' => 200,
								'KeyField' => 'Territ_Id',
								'FieldName' => 'Territ_Name',
								'Type' => array(
									'Mode' => 'Filter',
									'Condition' => 't.Territ_Name like \':Value%\'',
								),
								'Columns' => array(
									'Territ_Name' => array(
										'Name' => 'Район',
										'FieldName' => 'Territ_Name',
										'Width' => 200,

									),
								),
								'OnAfterChange' => 'territChange()'
							));
							?>
						</div>

						<div id="systype-list" class="field pull-left">
							<label>Тип системы</label>
							<div style="position: relative; width: 200px;">
								<table class="alcomboboxajax" style="width: 100%; height: 24px;">
									<tbody>
										<tr>
											<td class="dxic" style="width:100%;"></td>
											<td id="systype-toggler" class="alComboboxAjaxButton" style="-khtml-user-select:none;">
												<img id="alComboboxAjaxButtonImg_territ" class="alcomboboxajaxButtonImg" alt="v" src="/images/whitepixel.gif">
											</td>
										</tr>
									</tbody>

								</table>
								<div id="droplist">
									<?php
									foreach($systypes as $type) {
										$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
											'id' => 'type'.$type['SystemType_Id'],
											'Width' => 200,
											'Label' => $type["SystemTypeName"],
		//									'OnAfterClick'=>'filter_systypes.push("'.$type['SystemType_Id'].'")'
											'OnAfterClick'=>'createFilterSystype()'
										));
									}
									?>
								</div>
							</div>
						</div>

						<div class="field pull-left">
							<label>VIP</label>
							<?php
							$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
								'id' => 'vip-sum',
								'Width' => 120,
								'Value' => 7500,
							));
							?>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div style="min-width: 600px;" class="field border">
				<div class="title">Выберите период, за который будут отображены события</div>
				<div>
					<?php
					$date = new DateTime();
					$date_interval = new DateInterval('P1Y');

					?>
					<div class="field pull-left"><label>С:</label></div>
					<div class="field pull-left">
					<?php
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'datebegin',
							'Width' => 200,
							'Value' => $date->format('01-01-Y'),
							'OnAfterChange' => 'changeDatebegin()'
						));
					?>
					</div>
					<div class="field pull-left"><label>По:</label></div>
					<div class="field pull-left">
					<?php
						$date->add($date_interval);
						$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
							'id' => 'dateend',
							'Width' => 200,
							'Value' => $date->format('31-12-Y'),
							'OnAfterChange' => 'changeDateend()'
						));
					?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</li>
	</ul>
</form>

<div class="field pull-left">
	<div id="clientList">

		<?php
//		$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
//			'id' => 'ListEquips',
//			'Stretch' => true,
//			'Key' => 'Reference_Equips_Index_Grid_1',
//			'ModelName' => 'EventClient',
//			'ShowFilters' => true,
//			'Height' => 300,
//			'Width' => 500,
//			'Columns' => array(
//				'addr' => array(
//					'Name' => 'Наименование',
//					'FieldName' => 'addr',
//					'Width' => 100,
//					'Filter' => array(
//						'Condition' => 'e.addr Like \':Value%\'',
//					),
//					'Sort' => array(
//						'Up' => 'e.addr desc',
//						'Down' => 'e.addr',
//					),
//				),
//
//
//
//
//
//			)));
		?>
	</div>
	<div><span>Количество клиентов: </span><span id="count-clients" style="font-weight: bold;"></span><span class="hidden" id="count-events" style="font-weight: bold;padding-left: 20px"></span></div>
</div>

<div class="field pull-left" style="width: 580px;">
	<?php
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Edit1',
		'Width' => 200,
		'Value' =>0,
		'Type' => 'String',
		'ReadOnly'=>true,
		'Visible'=>false,
	));
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'Edit2',
		'Width' => 200,
		'Value' =>0,
		'Type' => 'String',
		'ReadOnly'=>true,
		'Visible'=>false,
	));
	$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
		'id' => 'eventType',
		'Width' => 200,
//		'Value' =>0,
		'Type' => 'String',
		'ReadOnly'=>true,
		'Visible'=>false,
	));

	?>
	<div class="btn-group event-types">
		<?php
//		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
//			'id' => 'type0',
//			'Height' => 30,
//			'Text' => 'Все',
//			'Type' => 'none',
//			'OnAfterClick' => '$("#eventType").aledit("SetValue", ""); $("#ListEvents").algridajax("LoadData");',
//		));
//
//		foreach($event_types as $type) {
//			$this->widget('application.extensions.alitonwidgets.button.albutton', array(
//				'id' => 'eventtype' . $type['evtp_id'],
//				'Height' => 30,
//				'Text' => $type['EventType'],
//				'Type' => 'none',
//				'OnAfterClick' => '$("#eventType").aledit("SetValue", '.$type['evtp_id'].'); $("#ListEvents").algridajax("LoadData");',
//			));
//		}

		$tab_config = array(
			'id' => 'events-type',
			'header' => array(
				array(
					'name' => 'Все',
					'options' => array(
						'data-type' => '0',
					),
				),
			),

			'content'=>array(),

			'afterActivate' => 'loadData()'
		);

		foreach($event_types as $type) {
			array_push($tab_config['header'], array(
				'name'=>$type['EventType'],
				'options'=>array(
					'data-type'=>$type['evtp_id']
				),
			));
		}

		$this->widget('application.extensions.alitonwidgets.tabs.altabs', $tab_config);

		?>
	</div>
	<style>
		.ui-tabs-panel {
			display: none !important;
		}
	</style>
	<?php
			$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
				'id' => 'ListEvents',
				'Stretch' => true,
				'Key' => 'Reference_Events_Index_Grid_1',
				'ModelName' => 'Events',
				'ShowFilters' => true,
				'Height' => 300,
				'Width' => 500,

				'Columns' => array(
					'date' => array(
						'Name' => 'Дата',
						'FieldName' => 'date',
						'Width' => 100,
						'Filter' => array(
							'Condition' => 'e.date = :Value',
						),
						'Sort' => array(
							'Up' => 'e.date desc',
							'Down' => 'e.date',
						),
					),

					'eventtype' => array(
						'Name' => 'Тип',
						'FieldName' => 'eventtype',
						'Width' => 100,
						'Filter' => array(
							'Condition' => 'et.eventtype Like \':Value%\'',
						),
						'Sort' => array(
							'Up' => 'et.eventtype desc',
							'Down' => 'et.eventtype',
						),
					),

					'addr' => array(
						'Name' => 'Адрес',
						'FieldName' => 'addr',
						'Width' => 100,
						'Filter' => array(
							'Condition' => 'a.addr Like \':Value%\'',
						),
						'Sort' => array(
							'Up' => 'a.addr desc',
							'Down' => 'a.addr',
						),
					),

					'employeename' => array(
						'Name' => 'Исполнитель',
						'FieldName' => 'employeename',
						'Width' => 100,
						'Filter' => array(
							'Condition' => 'employeename Like \':Value%\'',
						),
						'Sort' => array(
							'Up' => 'employeename desc',
							'Down' => 'employeename',
						),
					),

					'date_exec' => array(
						'Name' => 'Выполнение',
						'FieldName' => 'date_exec',
						'Width' => 100,
						'Filter' => array(
							'Condition' => 'e.date_exec = :Value',
						),
						'Sort' => array(
							'Up' => 'e.date_exec desc',
							'Down' => 'e.date_exec',
						),
					),

				),
				'OnDblClick' => '$("#changeEvent").albutton("BtnClick");'
			));
	?>

	<div class="btn-group">
		<?php
		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'changeEvent',
			'Height' => 30,
			'Text' => 'Изменить',
			'Type' => 'none',
			'OnAfterClick' => 'window.open("/?r=events/view&id="+algridajaxSettings.ListEvents.CurrentRow["evnt_id"])',
		));

		$this->widget('application.extensions.alitonwidgets.button.albutton', array(
			'id' => 'deleteEvent',
			'Height' => 30,
			'Text' => 'Удалить',
			'Type' => 'none',
			'OnAfterClick' => "confirm('Вы точно хотите удалить?') && aliton.form.delete('events/delete', algridajaxSettings.ListEvents.CurrentRow['evnt_id'], function(){
			 $('#ListEvents').algridajax('LoadData')
			 })",
		));
		?>
	</div>
</div>

<div class="clearfix"></div>

<div class="btn-group">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'autoevent',
		'Height' => 30,
		'Text' => 'Автопланирование',
		'Type' => 'none',
		'OnAfterClick' => 'autoEvents()'
	));
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'show-hide',
		'Height' => 30,
		'Text' => 'Скрыть/Показать',
		'Type' => 'none',
		'OnAfterClick' => 'showOrHideEvent()'
	));
	?>
</div>
<div id="autoevents"></div>
<style>
	.ui-dialog {
		overflow: visible;
	}
	.ui-dialog .ui-dialog-content {
		overflow: visible;
	}
</style>
<?php //$this->endWidget(); ?>

<script>
	var forvip = 7500;
	var filter_systypes = [];
	var filter_event = {
		manyevent:false,
		notevent:false,
	};
	var clients = {};

	var filter = {};
	var out_filter = {};
	var show_hidden = true;



	function autoEvents() {
		$('#autoevents').load('/?r=events/autoevents&objgr_id=' + aleditSettings.Edit2.Value)
			.dialog({
				minHeight:300
			})
	}

	$('#events-type li a').on('click', function(){
		$(this).attr('data-type') > 0 ? out_filter['evtp_id'] = 'e.evtp_id='+$(this).attr('data-type') : delete(out_filter['evtp_id'])
		loadClients();
		$("#eventType").aledit("SetValue", $(this).attr('data-type') > 0 ? $(this).attr('data-type') : '' )
		$("#ListEvents").algridajax("LoadData")
	})

	$(document).on('change', '#vip-sum input.aleditcontrol', function() {
		var regex = /^(?:[\d]|$)(?:[\d]*)(?:\.|\,?)[\d]{0,2}$/;
		if(!regex.test($(this).val())) {
			alert("Введите числовое значение");
			$(this).val(forvip);
			return false;
		}
		forvip = $(this).val();
		loadClients();
	})

	function showOrHideEvent() {
		if(!aleditSettings.Edit2.Value > 0){
			return false
		} else {
			var objgr_id = aleditSettings.Edit2.Value
		}
//		var id = aleditSettings.Edit1.Value
		var evtp_id = $('#events-type .ui-tabs-active a').attr('data-type') ? $('#events-type .ui-tabs-active a').attr('data-type') : 0
		$.ajax({
			url:'/?r=events/showHide&evtp_id='+evtp_id + '&objgr_id='+objgr_id,
			dataType: 'json',
			success: function(r) {
				if(r.status == 'ok') {
					$('#clientList .client.selected').remove()
				}
			},
		})
	}

	function changeDatebegin(){
		if($('#datebegin input.aldateeditinput').val() != '') {
			out_filter['datebegin'] = "dbo.truncdate(e.Date) >= dbo.truncdate('"+$('#datebegin input.aldateeditinput').val()+"')"
		} else {
			delete out_filter['datebegin']
		}
		loadClients();
	}

	function changeDateend(){
		if($('#dateend input.aldateeditinput').val() != '') {
			out_filter['dateend'] = "dbo.truncdate(e.Date) <= dbo.truncdate('"+$('#dateend input.aldateeditinput').val()+"')"
		} else {
			delete out_filter['dateend']
		}
		loadClients();
	}

	$('#systype-toggler').on('click', function () {
		if($('#systype-list #droplist').is(':hidden')) {
			$('#systype-list #droplist').show();
		} else {
			$('#systype-list #droplist').hide();
		}
	})

$(function(){
	$('#events-type li.ui-tabs-active a').attr('data-type') > 0
		? out_filter['evtp_id'] = 'e.evtp_id='+$('#events-type li.ui-tabs-active a').attr('data-type')
		: ''
	loadClients();
})


	function createFilterSystype() {
		filter_systypes = [];
		delete filter["systype"];
		$('#systype-list table.alcheckbox span.alcheckboxcelledit.alcheckboxchecked').each(function () {
			filter_systypes.push('st.Sttp_id='+$(this).attr('id').split('type')[1]);
		})
		if(filter_systypes.length>0)
			filter["systype"] = '('+filter_systypes.join(' or ')+')';
	}

	function areaChange() {
		if(alcomboboxajaxSettings.area.CurrentRow && alcomboboxajaxSettings.area.CurrentRow["Area_id"] != null){
			filter["area"] = "o.farea = " + alcomboboxajaxSettings.area.CurrentRow["Area_id"];
			loadClients();
		} else {
			delete filter.area;
		}
	}

	function territChange() {
		if(alcomboboxajaxSettings.territ.CurrentRow && alcomboboxajaxSettings.territ.CurrentRow["Territ_Id"] != null){
			filter["territ"] = "c.territ_id = " + alcomboboxajaxSettings.territ.CurrentRow["Territ_Id"];
			loadClients();
		} else {
			delete filter.territ;
		}
	}

	$(document).on('click', 'table.alcheckbox', function() {
		if($(this).attr('id') === 'notevent' || $(this).attr('id') === 'manyevent') {
			if($(this).find('span.alcheckboxcelledit').hasClass('alcheckboxchecked'))
				filter_event[$(this).attr('id')] = true;
			else
				filter_event[$(this).attr('id')] = false;
			loadClients();
			return false;
		}
		if(!$('#vip span.alcheckboxcelledit').hasClass('alcheckboxchecked')) {
			delete filter.vip;
		}
		if(!$('#novip span.alcheckboxcelledit').hasClass('alcheckboxchecked')) {
			delete filter.novip;
		}

		if($(this).attr('id') === 'showhidden') {
			if($(this).find('span.alcheckboxcelledit').hasClass('alcheckboxchecked'))
				show_hidden = false;
			else
				show_hidden = true;
//			renderClients()
//			return false
		}
		loadClients();
	})

	$(document).on('click', '.btn-group.event-types .albutton', function() {
		$('.btn-group.event-types .albutton').removeClass('selected');
		$(this).addClass('selected');
	})

	function loadClients() {
		if(!filter_event.manyevent || (filter_event.manyevent && filter_event.notevent)) {
			if(out_filter.datebegin)
				delete out_filter.datebegin;
			if(out_filter.dateend)
				delete out_filter.dateend;
		} else {
			out_filter['datebegin'] = "dbo.truncdate(e.Date) >= dbo.truncdate('"+$('#datebegin input.aldateeditinput').val()+"')";
			out_filter['dateend'] = "dbo.truncdate(e.Date) <= dbo.truncdate('"+$('#dateend input.aldateeditinput').val()+"')";
		}
		$.ajax({
			url:'/?r=events/clients',
			dataType:'json',
			type:'post',
			data: {filter:filter,out_filter:out_filter},
			beforeSend: function () {
				$('#clientList').html('<strong class="preloader">Загрузка списка клиентов и адресов...</strong>');
			},
			complete: function () {
				$('#clientList .preloader').remove();
			},
			success: function (r) {
				//console.log(r.length);
				clients = r;
				renderClients(r);
			}
		})
	}

	var event_count = 0;
	var clients_count = 0;
	function renderClients(clients) {
		var prev_client = '';
		var b_date = false
		var e_date = false
		event_count = 0;
		clients_count = 0;
		$('#clientList').html("");
		if(aldateeditSettings.datebegin.Date) {
			b_date = aldateeditSettings.datebegin.Date;//new Date(out_filter['datebegin'].split(' '))
		}
		if(aldateeditSettings.dateend.Date) {
			e_date = aldateeditSettings.dateend.Date
		}
		for(i in clients) {
			if((!filter_event['manyevent'] && !filter_event['notevent']) || (filter_event['manyevent'] && filter_event['notevent'])) {

			} else {
				if(filter_event['manyevent'] && clients[i].event_count==0)
					continue;
				else if(filter_event['notevent'] && clients[i].event_count!=0)
					continue;
			}
			if(out_filter['evtp_id'] && clients[i].evtp_id == out_filter['evtp_id']) {
				continue;
			}
			if(show_hidden && clients[i].isVisible == 0) {
				continue
			}

			if(prev_client != clients[i].fullname) {
				prev_client = clients[i].fullname;
				clients_count++;
			}
			if(clients[i].Date && clients[i].Date != null) {
				var ev_date = new Date(clients[i].Date.split(' ')[0])
				if(b_date && e_date){
					if(ev_date <= e_date && ev_date >= b_date)
						event_count += parseFloat(clients[i].event_count)
				}
				else if((b_date && ev_date >= b_date) || (e_date && ev_date <= e_date)) {
					event_count += parseFloat(clients[i].event_count)
				}

			}
//			if((out_filter['datebegin'] && out_filter['dateend'] && clients[i].Date.split(' ')[0] >= out_filter['datebegin'] && clients[i].Date.split(' ')[0] <= out_filter['dateend'])
//				|| (out_filter['datebegin'] && clients[i].Date.split(' ')[0] >= out_filter['datebegin'] )
//				|| (out_filter['dateend'] && clients[i].Date.split(' ')[0] <= out_filter['dateend']))
//				event_count += parseFloat(clients[i].event_count)
			$('#clientList').append('<div class="client" data-obj="'+ clients[i].objectgr_id +'" data-id="'+ clients[i].form_id +'"><div class="group column pull-left">' + clients[i].fullname + '</div><div class="address column pull-left">' + clients[i].addr + '</div></div>')
		}
		$('#count-clients').text(clients_count);
		$('#count-events').text(event_count);


	}

	$('#clientList').on('click', '.client', function () {
		$('#clientList .client').removeClass('selected');
		$(this).addClass('selected');
		$('#Edit1').aledit('SetValue', $(this).attr('data-id'));
		$('#Edit2').aledit('SetValue', $(this).attr('data-obj'));
		$('#ListEvents').algridajax('LoadData');
	})
		.on('dblclick', '.client', function () {
			window.open('/?r=Objectsgroup/index&ObjectGr_id='+$(this).attr('data-obj'));
		})

	Aliton.Links = [
		{
			Out: "Edit1",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "o.form_id = :Value",
			//Field: "Employee_id",
			Name: "Edit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false

		},
		{
			Out: "Edit2",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "og.objectgr_id = :Value",
			//Field: "Employee_id",
			Name: "Edit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false

		},
		{
			Out: "eventType",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "e.evtp_id = :Value",
			//Field: "Employee_id",
			Name: "eventType_Filetr",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false

		},
		{
			Out: "noexec",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "e.date_exec is null",
			ConditionFalse: "",
			Name: "Checkbox1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "exec",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "e.date_exec is not null",
			ConditionFalse: "",
			Name: "Checkbox1_Filter2",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
//		{
//			Out: "overday",
//			In: "ListEvents",
//			TypeControl: "Grid",
//			Condition: "",
//			ConditionFalse: "",
//			Name: "Checkbox1_Filter3",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
		{
			Out: "vip",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "(o.sum_price >= "+forvip+" or o.sum_appz_price >= "+forvip+")",
			ConditionFalse: "",
			Name: "Checkbox1_Filter4",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "novip",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "(o.sum_price < "+forvip+" or o.sum_appz_price < "+forvip+")",
			ConditionFalse: "",
			Name: "Checkbox1_Filter5",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		},
		{
			Out: "plandate",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(e.date_plan) >= ':Value'",
			Name: "DateEdit1_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "datebegin",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(e.Date) >= ':Value'",
			Name: "DateEdit2_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "dateend",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "dbo.truncdate(e.Date) <= ':Value'",
			Name: "DateEdit3_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "executor",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "e.empl_id = :Value",
			Field: "Employee_id",
			Name: "TestCombobox4_Locate1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "area",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "og.area_id = :Value",
			Field: "Area_id",
			Name: "TestCombobox5",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "repform",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "e.rpfr_id = :Value",
			Field: "rpfr_id",
			Name: "TestCombobox6",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
		{
			Out: "territ",
			In: "ListEvents",
			TypeControl: "Grid",
			Condition: "c.territ_id = :Value",
			Field: "Territ_Id",
			Name: "TestCombobox7",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false,
		},
	];
</script>