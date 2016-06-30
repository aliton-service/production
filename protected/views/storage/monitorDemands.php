
<div class="filter-form">
	<ul class="filter">
		<li>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'noaccept',
				'label' => 'Непринятые заявки',
				'filterajax' => array(
					'NoTrans' => array(
						'grid' => 'ListMonitoringDemands',
						'typefilter' => 'check',
						'condition_checked' => 'm.DateAccept is not null',
						'condition_unchecked' => '',
					),
				),

			));
			?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'noexec',
				'label' => 'Невыполненные заявки',
				'filterajax' => array(
					'NoTrans' => array(
						'grid' => 'ListMonitoringDemands',
						'typefilter' => 'check',
						'condition_checked' => 'm.DateExec is not null',
						'condition_unchecked' => '',
					),
				),

			));
			?>
		</li>
		<li>
			<div class="pull-left">Номер: </div>
			<div class="pull-left">
				<?php
				$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
					'id' => 'number-demand',
					'width' => 100,
					'value' => '',
					'filterajax' => array(
						'Count' => array(
							'grid' => 'ListMonitoringDemands',
							'typefilter' => '',
							'condition' => '',
						),
					),
				));
				?>
			</div>
			<div class="pull-left">
				<?php
				$this->widget('application.extensions.alitonwidgets.datepicker.aldatepicker', array(
					'name' => 'MonitoringDemands[date][begin]',
					'label' => 'Дата: ',
				));
				?>
			</div>
			<div class="pull-left">
				<?php
				$this->widget('application.extensions.alitonwidgets.combobox.alcombobox', array(
					'id' => 'cmb-demand-priors',
					'popupid' => 'cmb-demand-priors-grid',
					'data' =>MonitoringDemandPriors::getData(),
					'label' => 'Приоритет',
					'fieldname' => 'Prior',
					'keyfield' => '$DemandPrior_id',

					'width' => -1,
					'popupwidth' => 300,
					'showcolumns' => true,

					'columns' => array(
						'Address' => array(
							'name' => 'Приоритет',
							'fieldname' => 'Prior',
							'width' => 300,
							'height' => 23,
						),
					),

				));
				?>
			</div>
		</li>
	</ul>
</div>

<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'ListMonitoringDemands',
	'Stretch' => true,
	'Key' => 'Storage_Index_ListMonitoringDemandsGrid_1',
	'ModelName' => 'MonitoringDemands',
	'ShowFilters' => true,
	'Height' => 300,
	'Width' => 500,
	'Columns' => array(
		'mndm_id' => array(
			'Name' => 'Ид',
			'FieldName' => 'mndm_id',
			'Width' => 100,
			'Filter' => array(
				'Condition' => 'm.mndm_id = :Value',
			),
		),
		'date' => array(
			'Name'=>'Дата',
			'FieldName'=>'Date',
			'Width'=> 100,
		),
		'user' => array(
			'Name'=>'Подал',
			'FieldName'=>'UserName',
			'Width'=>100,
		),
		'prior' => array(
			'Name'=>'Приоритет',
			'FieldName'=>'Prior',
			'Width'=>100,
		),
		'dateaccept'=>array(
			'Name'=>'Дата принятия',
			'FieldName'=>'DateAccept',
			'Width'=>100,
		),
		'dateexec'=>array(
			'Name'=>'Дата выполнения',
			'FieldName'=>'DateExec',
			'Width'=>100,
		),
		'overday'=>array(
			'Name'=>'Просрочка',
			'FieldName'=>'OverDays',
			'Width'=>100,
		),
	),

	'OnAfterClick' => 'md.params.mndm_id = settings.CurrentRow["mndm_id"]',

));

?>

<div class="buttons">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'addition',
		'Height' => 30,
		'Text' => 'Дополнительно',
		'Type' => 'none',
		'OnAfterClick' => 'md.getAddition()',
	));
	?>

	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'new-demand',
		'Height' => 30,
		'Text' => 'Новая заявка',
		'Type' => 'Window',
		'Href' => '/?r=storage/createMonitoring',
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'accept-demand',
		'Height' => 30,
		'Text' => 'Принять',
		'Type' => 'none',
		'OnAfterClick' => 'md.Accept()',
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'undoaccept',
		'Height' => 30,
		'Text' => 'Отменить принятие',
		'Type' => 'none',
		'OnAfterClick' => 'md.UndoAccept()',
	));
	?>
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'deletedemand',
		'Height' => 30,
		'Text' => 'Удалить',
		'Type' => 'none',
		'OnAfterClick' => 'md.DeleteDemand()',
	));
	?>
</div>



<script>
	aliton.models.MonitoringDemands = {
		params: {
			mndm_id: null,
		},
		getAddition: function () {
			if(!this.params.mndm_id || this.params.mndm_id == null){
				alert('Выберите запись')
				return false
			}
			window.open('/?r=storage/updateMonitoring&id='+this.params.mndm_id)

		},

		Accept: function(){
			$.ajax({
				url: '/?r=storage/acceptMonitoringDemand',
				data: 'id='+this.params.mndm_id,
				success: function(){
					alert("Заявка принята")
				},
				error: function(){
					alert("Возникла ошибка, повторите попытку позже")
				},
			})
		},

		UndoAccept: function(){
			$.ajax({
				url: '/?r=storage/undoAcceptMonitoringDemand',
				data: 'id='+this.params.mndm_id,
				success: function(){
					alert("Принятие отменено")
				},
				error: function(){
					alert("Возникла ошибка, повторите попытку позже")
				},
			})
		},
		
		DeleteDemand: function () {
			$.ajax({
				url: '/?r=storage/deleteMonitoringDemand',
				data: 'id='+this.params.mndm_id,
				success: function(){
					alert("Удалено")
				},
				error: function(){
					alert("Возникла ошибка, повторите попытку позже")
				},
			})
		}
	}

	md = aliton.getModel("MonitoringDemands");

</script>