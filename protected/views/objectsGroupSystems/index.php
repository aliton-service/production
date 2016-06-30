<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'SystemsGrid',
        'Width' => 800,
        'Height' => 320,
        'Visible' => true,
        'Stretch' => false,
        'ModelName' => 'ObjectsGroupSystems',
        'Key' => 'Objectsgroup_index_SystemsGrid',
        'Filters' => array(
            array(
                'Type' => 'Internal',
                'Condition' => 's.ObjectGr_id = ' . $ObjectGr_id,
                'Control' => 'Form',
            ),
        ),
        'Columns' => array(
            'Availability' => array(
                'Name' => 'Наличие',
                'FieldName' => 'Availability',
                'Width' => 50,
            ),
            'Count' => array(
                'Name' => 'Кол-во',
                'fieldname' => 'Count',
                'Width' => 50,
            ),
            'Competitors' => array(
                'Name' => 'Обслуживающая организация',
                'FieldName' => 'Competitors',
                'Width' => 50,
            ),
            'SystemTypeName' => array(
                'Name' => 'Тип системы',
                'FieldName' => 'SystemTypeName',
                'Width' => 150,
            ),
            'Condition' => array(
                'Name' => 'Условия',
                'FieldName' => 'Condition',
                'Width' => 150,
            ),
        ),
    ));
?>

<table>
    <tbody>
        <tr>
            <td>
                <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'AddSystem',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Добавить',
                    'Href' => Yii::app()->createUrl('ObjectsGroupSystems/insert', array('ObjectGr_id' => $ObjectGr_id)),
                ));
                ?>
            </td>
            <td>
                <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'EditSystem',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Изменить',
                    'Href' => Yii::app()->createUrl('ObjectsGroupSystems/update'),
                    'Params' => array(
                        array(
                            'ParamName' => 'ObjectsGroupSystem_id',
                            'NameControl' => 'SystemsGrid',
                            'TypeControl' => 'Grid',
                            'FieldControl' => 'ObjectsGroupSystem_id',
                        ),
                    ),
                ));
                ?>
            </td>
        </tr>
    </tbody>
</table>

