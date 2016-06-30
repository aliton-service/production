<script>
	Aliton.Links.push({
		Out: "cbNoTrans",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.DateMaster is null",
		ConditionFalse: "",
		Name: "cbNoTrans_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false
	});

	Aliton.Links.push({
		Out: "cbNoExec",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.DateExec is null",
		ConditionFalse: "",
		Name: "cbNoExec_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false
	});
        
        Aliton.Links.push({
		Out: "cbNoWorkedOut",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.WorkedOut is null",
		ConditionFalse: "",
		Name: "cbWorkedOut_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false
	});

	Aliton.Links.push({
		Out: "cmbMaster",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.Master = :Value",
		Field: "Employee_id",
		Name: "cmbMaster_filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});

	Aliton.Links.push({
		Out: "edNumber",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.Demand_id = :Value",
		Field: "",
		Name: "edNumber_filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});

	Aliton.Links.push({
		Out: "edDate",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "dbo.truncdate(d.DateReg) = dbo.truncdate(':Value')",
		//Field: "DateCreate",
		Name: "edDate_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "cmbDemandType",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.DemandType_id = :Value",
		//Field: "DateCreate",
		Name: "cmbDemandType_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "cmbExecutor",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.OtherName = '#:Value#'",
		Field: "Employee_id",
		Name: "cmbExecutor_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "cmbAddress",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.Object_id = :Value",
		Field: "Object_id",
		Name: "cmbAddress_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "cmbTerritory",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.Territ_id = :Value",
		Field: "Territ_Id",
		Name: "cmbTerrit_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "cmbStreet",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.Street_id = :Value",
		Field: "Street_id",
		Name: "cmbStreet_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	
	Aliton.Links.push({
		Out: "edHouse",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.House = ':Value'",
		Field: "Street_id",
		Name: "cmbHouse_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "edDateStart",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "dbo.truncdate(d.DateReg) >= dbo.truncdate(':Value')",
		Field: "Street_id",
		Name: "edDateStart_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "edDateEnd",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "dbo.truncdate(d.DateReg) <= dbo.truncdate(':Value')",
		Field: "Street_id",
		Name: "edDateEnd_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	Aliton.Links.push({
		Out: "edObjectGr_id",
		In: "DemandsGrid",
		TypeControl: "Grid",
		Condition: "d.ObjectGr_id = :Value",
		Name: "edObjectGr_id_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false,
	});
	
        function WorkedOut() {
            var Demand_id = algridajaxSettings['DemandsGrid'].CurrentRow['Demand_id'];
            
            $.ajax({
		url: '/?r=demands/workedout&Demand_id=' + Demand_id,
                success: function(r) {
                    console.log(r);
                    if (r === '0')
                        $("#DemandsGrid").algridajax("Load");
                }
                
            });
            $('#DialogMessage').aldialog('HideContent');
        }
        
        function NoWorkedOut() {
            var Demand_id = algridajaxSettings['DemandsGrid'].CurrentRow['Demand_id'];
            $('#DialogMessage').aldialog('HideContent');
            //document.location = '/index.php?r=Demands/View&Demand_id=' + Demand_id;
        }
</script>
<script>
    Aliton.Links.push({
            Out: "DemandsGrid",
            In: "AdministrationGrid",
            TypeControl: "Grid",
            Condition: "ex.Demand_id = :Value",
            Field: "Demand_id",
            //ConditionFalse: "",
            Name: "DemandsGrid_Filter10",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false,
            NullValue: -1,
    });
</script>



<?php



$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
	'id' => 'edObjectGr_id',
	'Width' => 150,
	'Type' => 'Number',
	//'Value' => $Filters['ObjectGr_id'],
	'Visible' => false,
));
?>

<?php
$this->breadcrumbs=array(
	'Заявки'=>array('index'),
);
?>
<div style="float: left; margin-bottom: 6px">
	<div style="float: left; margin-bottom: 6px">
		<div>
			<?php

//			$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
//				'id' => 'cmbMaster',
//				'Stretch' => true,
//				'Key' => 'Site_Index_CmbMaster',
//				'ModelName' => 'Employees',
//				'ShowFilters' => false,
//				'ShowPager' => false,
//				'Height' => 300,
//				'Width' => 250,
//				'PopupWidth' => 300,
//				'KeyField' => 'Employee_id',
//				'KeyValue' => $Filters['Master'],
//				'FieldName' => 'ShortName',
//				'Type' => 'Locate',
//				'Filters' => array(
//					array(
//						'Type' => 'Internal',
//						'Condition' => "t.EmployeeName like ':Value%'",
//					),
//				),
//				'FilterControls' => array(
//					array(
//						'ControlName' => 'DemandsGrid',
//						'TypeControl' => 'Grid',
//						'Condition' => 'd.Master = :Value',
//						'Field' => 'Employee_id'
//					),
//				),
//				'Columns' => array(
//					'EmployeeName' => array(
//						'Name' => 'ФИО',
//						'FieldName' => 'EmployeeName',
//						'Width' => 300,
//						'Filter' => array(
//							'Condition' => "e.EmployeeName like ':Value%'",
//						),
//
//					),
//				),
//			));
?><label>Мастер</label>
			<?php
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'cmbMaster',
						'Stretch' => true,
						'Key' => 'Demands_CmbExecutor',
						'ModelName' => 'ListEmployees',
						'Height' => 300,
						'Width' => 250,
						'PopupWidth' => 300,
						'KeyField' => 'Employee_id',
						'KeyValue' => $Filters['Master'],
						'FieldName' => 'ShortName',
						'Type' => array(
							'Type' => 'Locate',
							'Condition' => "e.EmployeeName like ':Value%'",
						),
						'Columns' => array(
							'EmployeeName' => array(
								'Name' => 'ФИО',
								'FieldName' => 'EmployeeName',
								'Width' => 300,
								'Filter' => array(
									'Condition' => "e.EmployeeName like ':Value%'",
								),

							),
						),
					));

					?>

		</div>
		<div style="border: 1px solid #c0c0c0; margin-top: 6px; padding: 6px;">
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'cbNoTrans',
				'Label' => 'Непереданные',
				'Checked' => $Filters['NoDateMaster'],
			));
			?>
			<?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'cbNoExec',
				'Label' => 'Невыполненные',
				'Checked' => true,
			));
			?>
                        <?php
			$this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
				'id' => 'cbNoWorkedOut',
				'Label' => 'Неотработанные',
				'Checked' => true,
			));
			?>
		</div>
	</div>
	<div style="float: left; margin-left: 6px; border: 1px solid #c0c0c0; padding: 6px; margin-bottom: 6px">
		<div style="float: left; margin-bottom: 6px">
			<div style="float: left; margin-right: 6px;">
				<div style="text-align: center; padding-bottom: 4px;">Номер</div>
				<div>
					<?php
					$this->widget('application.extensions.alitonwidgets.edit.aledit', array(
						'id' => 'edNumber',
						'Width' => 150,
						'Type' => 'Number',
						'Value' => $Filters['Demand_id'],
					));
					?>
				</div>
			</div>
			<div style="float: left; margin-right: 6px;">
				<div style="text-align: center; padding-bottom: 4px;">Дата</div>
				<div>
					<?php
					$this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
						'id' => 'edDate',
						'Value' => $Filters['DateReg'],
                                                'Width' => 120,
					));
					?>
				</div>
			</div>
			<div style="float: left; margin-right: 6px;">
				<div style="text-align: center; padding-bottom: 4px;">Тип заявки</div>
				<div>
					<?php
					$DemandTypes = new DemandTypes();
					$DemandTypes = $DemandTypes->getData();
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'cmbDemandType',
						'ModelName' => 'DemandTypes',
						'FieldName' => 'DemandType',
						'KeyField' => 'DemandType_id',
						'KeyValue' => $Filters['DemandType_id'],
						'Width' => 200,
						'Type' => array(
							'Mode' => 'Filter',
							'Condition' => "dt.DemandType like ':Value%'",
						),
						'Columns' => array(
							'DemandType' => array(
								'Name' => 'Тип заявки',
								'FieldName' => 'DemandType',
								'Width' => 250,
							),
						),
					));
					?>
				</div>
			</div>
			<div style="float: left">
				<div style="text-align: center; padding-bottom: 4px;">Исполнитель</div>
				<div>
					<?php
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'cmbExecutor',
						'Stretch' => true,
						'Key' => 'Demands_CmbExecutor',
						'ModelName' => 'ListEmployees',
						'Height' => 300,
						'Width' => 250,
						'PopupWidth' => 300,
						'KeyField' => 'Employee_id',
						'KeyValue' => $Filters['Executor'],
						'FieldName' => 'ShortName',
						'Type' => array(
							'Type' => 'Locate',
							'Condition' => "e.EmployeeName like ':Value%'",
						),
						'Columns' => array(
							'EmployeeName' => array(
								'Name' => 'ФИО',
								'FieldName' => 'EmployeeName',
								'Width' => 300,
								'Filter' => array(
									'Condition' => "e.EmployeeName like ':Value%'",
								),

							),
						),
					));

					?>

				</div>
			</div>
		</div>
		<div style="clear: left">

			<div style="float: left; margin-right: 6px">
				<div style="float: left; margin-right: 6px">Адрес</div>
				<div style="float: left">
					<?php
					$this->widget('application.extensions.alitonwidgets.comboboxjax.alcomboboxajax', array(
						'id' => 'cmbAddress',
						'ModelName' => 'ListObjects',
						'FieldName' => 'Addr',
						'KeyField' => 'Object_id',
						'KeyValue' => $Filters["Object_id"],
						'Type' => array(
							'Mode' => 'Filter',
							'Condition' => "a.Addr like ':Value%'",
						),
						'Width' => 300,
						'Columns' => array(
							'Address' => array(
								'Name' => 'Адрес',
								'FieldName' => 'Addr',
							),
						),
					));
					?>
				</div>
			</div>
			<div style="float: left; margin-bottom: 6px">
				<div style="float: left; margin-right: 6px">Участок</div>
				<div style="float: left">
					<?php
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'cmbTerritory',
						'Stretch' => true,
						'Key' => 'Demands_CmbTerritory',
						'ModelName' => 'Territory',
						'Height' => 300,
						'Width' => 200,
						'PopupWidth' => 300,
						'KeyField' => 'Territ_Id',
						'FieldName' => 'Territ_Name',
						'Type' => array(
							'Type' => 'Filter',
							'Condition' => "t.Territ_Name like ':Value%'",
						),
						'Columns' => array(
							'Territ_Name' => array(
								'Name' => 'Участок',
								'FieldName' => 'Territ_Name',
								'Width' => 300,
								'Filter' => array(
									'Condition' => "t.Territ_Name like ':Value%'",
								),

							),
						),
					));
					?>
				</div>
			</div>
			<div style="clear: left; margin-right: 6px">
				<div style="float: left; margin-right: 6px">Улица</div>
				<div style="float: left">
					<?php
					$this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'cmbStreet',
						'FieldName' => 'StreetName',
						'ModelName' => 'Streets',
						'KeyField' => 'Street_id',
                                                'KeyValue' => $Filters['Street_id'],
						'Width' => 200,
						'Type' => array(
							'Mode' => 'Filter',
							'Condition' => "st.StreetName like ':Value%'",
						),
						'Columns' => array(
							'StreetName' => array(
								'Name' => 'Улица',
								'FieldName' => 'StreetName',
								'Width' => 150,
								'Height' => 23,
							),
						),
					));
					?>
				</div>
			</div>
			<div style="float: left; margin-left: 6px">
				<div style="float: left; margin-right: 6px">Дом</div>
				<div style="float: left">
					<?php
					/*
                                        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
						'id' => 'cmbHouse',
						'ModelName' => 'ListObjects',
						'FieldName' => 'House',
						'KeyField' => 'House',
						'Width' => 100,
						'Type' => array(
							'Mode' => 'Filter',
							'Condition' => "a.House like ':Value%'",
						),
                                                'KeyValue' => $Filters['House'],
						'Columns' => array(
							'House' => array(
								'Name' => 'Дом',
								'FieldName' => 'House',
								'Width' => 90,
								'Height' => 23,
							),
						),
					));
                                        */
                                        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
						'id' => 'edHouse',
						'Width' => 70,
						'Type' => 'String',
						'Value' => $Filters['House'],
					));
					?>
				</div>
			</div>
                        
                            <div style="float: left;">
                                    <div style="float: left; margin-right: 6px">За период</div>
                                    <div style="float: left; margin-right: 6px">
                                            <?php
                                            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                                                    'id' => 'edDateStart',
                                                    'Width' => 100,
                                                    'Name' => '',
                                            ));
                                            ?>
                                    </div>
                                    <div style="float: left; margin-right: 6px">по</div>
                                    <div style="float: left; margin-right: 6px">
                                            <?php
                                            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                                                    'id' => 'edDateEnd',
                                                    'Width' => 100,
                                                    'Name' => '',
                                            ));
                                            ?>
                                    </div>


                                    <div style="clear: both"></div>
                            </div>
                    

		</div>
	</div>
	
</div>
<div style="float: left">
<?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'BtnWorkedOut',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Отработано',
	'Type' => 'None',
	'OnAfterClick' => '$("#DialogMessage").aldialog("Show");',
    ));
?>    
</div>    
<div style="clear: both"></div>
<div style="margin-top: 6px">
	<?php
	$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
		'id'=>'DemandsGrid',
		'Width' => 600,
		'Height' => 200,
                'ShowFilters' => true,
		'Stretch' => true,
		'ModelName' => 'Demands',
		'Key' => 'Demand_Index_DemandsGrid',
                'OnDrawRow' => 'RowStyle=""; if (Row["DemandPrior_id"] === "1" || Row["DemandPrior_id"] === "32") RowStyle = "color: #FF00FF"; if (Row["FullOverDay"] !== "0") RowStyle = "color: #FF0000";',
                'OnDblClick' => '$("#EditDemand").albutton("BtnClick");',
		'Columns' => array(
			'UCreateName' => array(
				'Name' => 'Зарегистрировал',
				'FieldName' => 'UCreateName',
				'Filter' => array(
					'Condition' => "d.UCreateName like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.UCreateName desc',
					'Down' => 'd.UCreateName',
				),
			),
			'Demand_id' => array(
				'Name' => 'Код заявки',
				'FieldName' => 'Demand_id',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.Demand_id = :Value",
				),
				'Sort' => array(
					'Up' => 'd.Demand_id desc',
					'Down' => 'd.Demand_id',
				),
			),
			'Address' => array(
				'Name' => 'Адрес',
				'FieldName' => 'Address',
				'Width' => 220,
				'Sort' => array(
					'Up' => 'd.Address desc',
					'Down' => 'd.Address',
				),
			),
			'VIP' => array(
				'Name' => 'VIP',
				'FieldName' => 'VIPName',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.VIPName desc',
					'Down' => 'd.VIPName',
				),
			),
			'DateReg' => array(
				'Name' => 'Регистрация',
				'FieldName' => 'DateReg',
                                'Format' => 'd.m.Y H:i',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.DateReg desc',
					'Down' => 'd.DateReg',
				),
			),
			'DateMaster' => array(
				'Name' => 'Передача мастеру',
				'FieldName' => 'DateMaster',
                                'Format' => 'd.m.Y H:i',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.DateMaster desc',
					'Down' => 'd.DateMaster',
				),
			),
			'DateExec' => array(
				'Name' => 'Выполнение',
				'FieldName' => 'DateExec',
                                'Format' => 'd.m.Y H:i',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.DateExec desc',
					'Down' => 'd.DateExec',
				),
			),
			'ExceedDays' => array(
				'Name' => 'Время на выполнение',
				'FieldName' => 'ExceedDays',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.ExceedDays desc',
					'Down' => 'd.ExceedDays',
				),
			),
			'FullOverDay' => array(
				'Name' => 'Просрочка',
				'FieldName' => 'FullOverDay',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.FullOverDay desc',
					'Down' => 'd.FullOverDay',
				),
			),
			'DemandType' => array(
				'Name' => 'Тип заявки',
				'FieldName' => 'DemandType',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.DemandType like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.DemandType desc',
					'Down' => 'd.DemandType',
				),
			),
			'EquipType' => array(
				'Name' => 'Тип оборудования',
				'FieldName' => 'EquipType',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.EquipType like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.EquipType desc',
					'Down' => 'd.EquipType',
				),
			),
			'Malfunction' => array(
				'Name' => 'Неисправность',
				'FieldName' => 'Malfunction',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.Malfunction like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.Malfunction desc',
					'Down' => 'd.Malfunction',
				),
			),
			'DemandPrior' => array(
				'Name' => 'Приоритет',
				'FieldName' => 'DemandPrior',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.DemandPrior like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.DemandPrior desc',
					'Down' => 'd.DemandPrior',
				),
			),
			'MasterName' => array(
				'Name' => 'Мастер',
				'FieldName' => 'MasterName',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.MasterName like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.MasterName desc',
					'Down' => 'd.MasterName',
				),
			),
			'PlanDateExec' => array(
				'Name' => 'Запланированная дота исполнения',
				'FieldName' => 'PlanDateExec',
				'Width' => 120,
				'Format' => 'd.m.Y H:i',
				'Filter' => array(
					'Condition' => "d.PlanDateExec = :Value",
				),
				'Sort' => array(
					'Up' => 'd.PlanDateExec desc',
					'Down' => 'd.PlanDateExec',
				),
			),
			'OtherName' => array(
				'Name' => 'Другой исполнитель',
				'FieldName' => 'OtherName',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.OtherName like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.OtherName desc',
					'Down' => 'd.OtherName',
				),
			),
			'ExecutorsName' => array(
				'Name' => 'Исполнитель',
				'FieldName' => 'ExecutorsName',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.ExecutorsName like '%:Value%'",
				),
				'Sort' => array(
					'Up' => 'd.ExecutorsName desc',
					'Down' => 'd.ExecutorsName',
				),
			),
			'ServiceType' => array(
				'Name' => 'Тип обслуживания',
				'FieldName' => 'ServiceType',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.ServiceType like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.ServiceType desc',
					'Down' => 'd.ServiceType',
				),
			),
			'FirstDemandType' => array(
				'Name' => 'Первоначальный тип',
				'FieldName' => 'FirstDemandType',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.FirstDemandType like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.FirstDemandType desc',
					'Down' => 'd.FirstDemandType',
				),
			),
			'Contacts' => array(
				'Name' => 'Контакт',
				'FieldName' => 'Contacts',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.Contacts like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.Contacts desc',
					'Down' => 'd.Contacts',
				),
			),
			'FirstDemandPrior' => array(
				'Name' => 'Первоначальный приоритет',
				'FieldName' => 'FirstDemandPrior',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.FirstDemandPrior like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.FirstDemandPrior desc',
					'Down' => 'd.FirstDemandPrior',
				),
			),
			'DemandText' => array(
				'Name' => 'Неисправность',
				'FieldName' => 'DemandText',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.DemandText desc',
					'Down' => 'd.DemandText',
				),

			),
			'Note' => array(
				'Name' => 'Примечание',
				'FieldName' => 'Note',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.Note desc',
					'Down' => 'd.Note',
				),
			),
			'AreaName' => array(
				'Name' => 'Район',
				'FieldName' => 'AreaName',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.AreaName like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.AreaName desc',
					'Down' => 'd.AreaName',
				),
			),
                        'UChangeName' => array(
				'Name' => 'Изменил заявку',
				'FieldName' => 'UChangeName',
				'Width' => 120,
				'Filter' => array(
					'Condition' => "d.UChangeName like ':Value%'",
				),
				'Sort' => array(
					'Up' => 'd.UChangeName desc',
					'Down' => 'd.UChangeName',
				),
			),
			'ResultName' => array(
				'Name' => 'Результат',
				'FieldName' => 'ResultName',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.ResultName desc',
					'Down' => 'd.ResultName',
				),
			),
                        'WorkedOutStatus' => array(
				'Name' => 'Статус',
				'FieldName' => 'WorkedOutStatus',
				'Width' => 120,
				'Sort' => array(
					'Up' => 'd.WorkedOut desc',
					'Down' => 'd.WorkedOut',
				),
			),

		),
            /*
            'OnAfterClick' => 'Aliton.demands.modelup("setProp", {
        Demand_id: settings.CurrentRow["Demand_id"]
        },true)', */
	));

	?>
</div>


<div style="display:none;">
	<input id="LookupAdmDemand_id" class="filterajax" control="AdministrationGrid" condition="ex.Demand_id = :value" type="hidden" typefilter="condt" value="">;
</div>

<?php

$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
	'reload' => false,
	'header' => array(
		array(
			'name' => 'Общая',
			'ajax'=>true,
			'options'=>array(
				'url'=>$this->createUrl('Demands/TabGeneral'),
			),
		),
		array(
			'name' => 'Ход работы',
			'ajax'=>true,
			'options'=>array(
				'url'=>$this->createUrl('Demands/TabAdministration'),
			),
		),
	),
	'content' => array(
		array(
			'id' => 'TabGeneral',
		),

		array(
			'id' => 'TabProceess',
			/*
			'content' => '<div class="content">
								<table id="testgrid" class="algridajax">
													<tbody>
													<tr>
													<td id="alContent_testgrid" style="padding-left: 0px"></td>
													</tr>
													</tbody>
													</table>
								</div>
															<div class="form">
															<form id="send-note">
															<input type="text" id="note">
															<input type="submit" value="написать">
								</form>
								</div>'
			 *
			*/
		)
	),
	//'afterLoad' => 'binSendNote()'
));

?>
<div class="btn-group">
<?php
$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'EditDemand',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Доп-но',
	'Type' => 'NewWindow',
	'Href' => Yii::app()->createUrl('Demands/View'),
	'Params' => array(
		array(
			'ParamName' => 'Demand_id',
			'NameControl' => 'DemandsGrid',
			'TypeControl' => 'Grid',
			'FieldControl' => 'Demand_id',
		),
	),
));

$this->widget('application.extensions.alitonwidgets.button.albutton', array(
	'id' => 'createRep',
	'Width' => 114,
	'Height' => 30,
	'Text' => 'Создать отчет',
	'Type' => 'none',
	'OnAfterClick' => 'demandsReport()',
));
?>
</div>
<script>

	function demandsReport() {
		$.ajax({
			url: '/?r=demands/report',
			dataType: 'json',
			beforeSend: function () {
				$('#createRep .albutton-span').text('Загрузка...')
			},
			complete: function () {
				$('#createRep .albutton-span').text('Создать отчет')
			},
			success: function(r) {
				var data = '<table border="1" rules="all"><tbody>'
				data += '' +
					'<tr style="text-align: center;font-weight: bold;">' +
					'<td colspan="9">' +
					'Время создания отчета: ' + r.datecreate +
					'</td>' +
					'</tr>' +
					'<tr></tr>'+
					'<tr style="text-align: center;font-weight: bold;">' +
					'<td colspan="9">' +
					'СРОЧНЫЕ ЗАЯВКИ. ВСЕГО: <span style="color:red">' + r.urgent.length + '</span>' +
					'</td>' +
					'</tr>' +
					'<tr style="text-align: center;font-weight: bold;">' +
					'<td>' +
					'Код заявки' +
					'</td>' +
					'<td>' +
					'VIP' +
					'</td>' +
					'<td>' +
					'Адрес' +
					'</td>' +
					'<td>' +
					'Тип заявки' +
					'</td>' +
					'<td>' +
					'Приоритет' +
					'</td>' +
					'<td>' +
					'Регистрация' +
					'</td>' +
					'<td>' +
					'Зарегистрировал заявку' +
					'</td>' +
					'<td>' +
					'Передача' +
					'</td>' +
					'<td>' +
					'Выполнение' +
					'</td>' +
					'</tr>'

				for(item in r.urgent) {
					data += '' +
						'<tr>' +
							'<td>' +
						r.urgent[item].Demand_id +
							'</td>' +
							'<td>' +
						r.urgent[item].VIP +
							'</td>' +
							'<td>' +
						r.urgent[item].Address +
							'</td>' +
							'<td>' +
						r.urgent[item].DemandType +
							'</td>' +
							'<td>' +
						r.urgent[item].DemandPrior +
							'</td>' +
							'<td>' +
						r.urgent[item].DateReg.split('.')[0] +
							'</td>' +
							'<td>' +
						r.urgent[item].UCreateName +
							'</td>' +
							'<td>' +
						r.urgent[item].DateMaster.split('.')[0] +
							'</td>' +
							'<td>' +
						r.urgent[item].DateExec.split('.')[0] +
							'</td>' +
						'</tr>'
				}

				data += '<tr></tr>'+
					'<tr style="text-align: center;font-weight: bold;">' +
					'<td colspan="9">' +
					'АВАРИЙНЫЕ ЗАЯВКИ. ВСЕГО: <span style="color:red">' + r.crash.length + '</span>' +
					'</td>' +
					'</tr>'

				for(item in r.crash) {
					data += '' +
						'<tr>' +
						'<td>' +
						r.crash[item].Demand_id +
						'</td>' +
						'<td>' +
						r.crash[item].VIP +
						'</td>' +
						'<td>' +
						r.crash[item].Address +
						'</td>' +
						'<td>' +
						r.crash[item].DemandType +
						'</td>' +
						'<td>' +
						r.crash[item].DemandPrior +
						'</td>' +
						'<td>' +
						r.crash[item].DateReg.split('.')[0] +
						'</td>' +
						'<td>' +
						r.crash[item].UCreateName +
						'</td>' +
						'<td>' +
						r.crash[item].DateMaster.split('.')[0] +
						'</td>' +
						'<td>' +
						r.crash[item].DateExec.split('.')[0] +
						'</td>' +
						'</tr>'
				}

				data += '</table></tbody>'
				core.exporter('XLS', data, 'Ежедневный очтет')

			}
		})
	}

	function binSendNote() {
//		$('#send-note').ajaxSender({
//			url: '/?r=executorReports/create',
//			type: 'post',
//			params: {
//				action: 'call_sp',
//				table: 'ExecutorReports',
//				SP: 'INSERT_EXECUTORREPORTS'
//			},
//			success: function() {
//				$('#AdministrationGrid').algridajax('Load')
//			}
//		})
		//     Aliton.demands = $('#send-note').modelup({
//         table:'Demands',
//         eventSend: 'submit',
//         liveUpdate: true,
//         sendAjax: {
//             data: {
//                 SP: 'INSERT_EXECUTORREPORTS',
//             },
//             success: function () {
//                 $('#AdministrationGrid').algridajax('Load')
//             },
//         },
//         prop: {
//             Demand_id:{
//                 value:-1,
////                 onUpdate: function () {
////
////                     $('#AdministrationGrid').algridajax('setParams',{
////                         actions: {
////                             getProceessInfo: Aliton.demands.modelup('getProp','Demand_id'),
////                         },
////                     })
////                     $('#AdministrationGrid').algridajax('Load')
//
//                 //},
//             },
//
//         },
//     })
	}



	Aliton.Links.push({
		Out: "DemandsGrid",
		In: "Edit1",
		TypeControl: "Edit",
		Condition: ":Value",
		Field: "Demand_id",
		Name: "TestGrid1_Filter1",
		TypeFilter: "Internal",
		TypeLink: "Filter",
		isNullRun: false

	});

</script>

<?php
    $this->widget('application.extensions.alitonwidgets.dialog.aldialog', array(
        'id' => 'DialogMessage',
        'Width' => 400,
        'Height' => 80,
        'ContentUrl' => Yii::app()->createUrl('Demands/Message', array(
            'message' => 'Вы уверены, что заявка полностью проадминистрирована?',
            'ok' => 'WorkedOut();',
            'no' => 'NoWorkedOut();',
        )),
    ));
?>