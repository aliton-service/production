<?php


$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id' => 'RepairCommentsGrid',
	'Stretch' => true,
	'Key' => 'RepairComments_Index_Grid_1',
	'ModelName' => 'RepairComments',
	'Filters' => array(
            array(
                'Type' => 'Internal',
                'Condition' => 'rc.Repr_id = ' . $Repr_id,
                'Control' => 'Form',
            ),
        ),
	'Height' => 210,
	'Width' => 500,
	'Columns' => array(
            'EmplName' => array(
                    'Name' => 'Администрирующий',
                    'FieldName' => 'EmployeeName',
                    'Width' => 100,
                    'Filter' => array(
                            'Condition' => 'e.EmployeeName Like \':Value%\'',
                    ),
                    'Sort' => array(
                            'Up' => 'e.EmployeeName desc',
                            'Down' => 'e.EmployeeName',
                    ),
            ),
            'DateCreate' => array(
                    'Name' => 'Дата',
                    'FieldName' => 'Date',
                    'Width' => 100,
                    'Filter' => array(
                            'Condition' => 'dbo.truncdate(rc.Date) = dbo.truncdate(\':Value%\')',
                    ),
                    'Format' => 'd.m.Y H:i',
                    'Sort' => array(
                            'Up' => 'rc.Date desc',
                            'Down' => 'rc.Date',
                    ),
            ),
            'Comment' => array(
                    'Name' => 'Сообщение',
                    'FieldName' => 'Comment',
                    'Width' => 100,
                    'Filter' => array(
                            'Condition' => 'rc.Comment Like \':Value%\'',
                    ),
                    'Sort' => array(
                            'Up' => 'rc.Comment desc',
                            'Down' => 'rc.Comment',
                    ),
            ),
        ),
));

?>

<?php
    $this->beginWidget('CActiveForm', array(
            'id'=>'RepairComments',
            'action'=> Yii::app()->createUrl('RepairComments/Create'),
            'htmlOptions'=>array(
                'class'=>'form-inline'
                ),
    ));
?>

    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'Repr_id',
                'Name' => 'RepairComments[Repr_id]',
                'Value' => $Repr_id,
                'Width' => 350,
                'Visible' => false,
        ));
    ?>

    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'Date',
                'Name' => 'RepairComments[Date]',
                'Value' => DateTimeManager::YiiDateToAliton(Date('d.m.Y')),
                'Width' => 350,
                'Visible' => false,
        ));
    ?>

<div class="field pull-left">
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'textWorkState',
                'Name' => 'RepairComments[Comment]',
                'Width' => 350
        ));
    ?>
</div>

<?php $this->endWidget(); ?>

<div class="btn-group pull-left">
	<?php
	$this->widget('application.extensions.alitonwidgets.button.albutton', array(
		'id' => 'sendWorkState',
		'Height' => 30,
		'Text' => 'Написать',
		'Type' => 'AjaxForm',
                'Href' => Yii::app()->createUrl('RepairComments/Create'),
                'FormName' => 'RepairComments',
                'OnAfterAjaxSuccess' => '$("#RepairCommentsGrid").algridajax("Load");',
	));
	?>
</div>
<div class="clearfix"></div>

<script>
	Aliton.Links.push(
		{
			Out: "repr_id_a",
			In: "RepairComments",
			TypeControl: "Grid",
			Condition: "rc.repr_id = :Value",
			Name: "RepairDetails_Filter1",
			TypeFilter: "Internal",
			TypeLink: "Filter",
			isNullRun: false
		}
	)
</script>