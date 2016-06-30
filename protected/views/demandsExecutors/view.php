<div style="padding-left: 3px">
<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id'=>'DemandExecutorsGrid',
	'Width' => 600,
        'ModelName' => 'DemandsExecutors',
	'Height' => 200,
	'Stretch' => true,
	'Columns' => array(
            'EmployeeName' => array(
                    'Name' => 'Исполнитель',
                    'FieldName' => 'EmployeeName',
                    'Width' => 100,
            ),
            'Date' => array(
                    'Name' => 'Дата начала работы',
                    'FieldName' => 'Date',
                    'Format' => 'd.m.Y H:i',
                    'Width' => 100,
            ),
        ),
    ));
?>
</div>
<table>
    <tbody>
        <tr>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                        'id' => 'AddExecutor',
                        'Width' => 114,
                        'Height' => 30,
                        'Text' => 'Помощь',
                        'Type' => 'Window',
                        'Href' => Yii::app()->createUrl('DemandsExecutors/insert', array('Demand_id' => $Demand_id)),
                    ));
                    
                ?>
            </td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                        'id' => 'ChangeExecutor',
                        'Width' => 134,
                        'Height' => 30,
                        'Text' => 'Другой исполнитель',
                        'Type' => 'Window',
                        'Href' => Yii::app()->createUrl('DemandsExecutors/change', array('Demand_id' => $Demand_id)),
                    ));
                    
                ?>
            </td>
            <td>
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                        'id' => 'DelExecutor',
                        'Width' => 114,
                        'Height' => 30,
                        'Text' => 'Удалить',

                    ));
                    
                ?>
            </td>
        </tr>
    </tbody>
</table>
 
