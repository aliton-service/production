<?php

    $form = $this->beginWidget('CActiveForm', array(
	'id' => 'DemandsExecutors',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
	'enableAjaxValidation' => true,
        'enableClientValidation' => true,
    ));

?>    

<div>Дата начало работы</div>
<div>
    <?php
        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
            'id' => 'edDate',
            'Name' => 'DemandsExecutors[Date]',
            'Width' => 160,
            'Value' => DateTimeManager::YiiDateToAliton($model->Date),
        ));
    ?>
</div>
<div>Сотрудник</div>
<div>
    <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'cmbExecutor',
            'Stretch' => true,
            'ModelName' => 'ListEmployees',
            'Name' => 'DemandsExecutors[Employee_id]',
            'Height' => 300,
            'Width' => 300,
            'KeyField' => 'Employee_id',
            'KeyValue' => $model->Employee_id,
            'FieldName' => 'ShortName',
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => 'e.EmployeeName like \':Value%\'',
            ),
            'Columns' => array(
                'EmployeeName' => array(
                    'Name' => 'ФИО',
                    'FieldName' => 'EmployeeName',
                    'Width' => 300,

                ),
            ),
        ));
    ?>
</div>
<div style="margin-top: 6px">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnSave',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Сохранить',
            'FormName' => 'DemandsExecutors',
            'Type' => 'Form',
            //'Href' => Yii::app()->createUrl('Demands/view', array('Demand_id'=>$model->Demand_id)),
        ));
    ?>
</div>

<?php $this->endWidget(); ?>
    
