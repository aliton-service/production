<script>
    Aliton.Links.push({
        Out: "ContactGrid",
        In: "TextC",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "text",
        Name: "ContactGrid_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "ContactGrid",
        In: "Result",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "rslt_name",
        Name: "ContactGrid_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "ContactGrid",
        In: "Note",
        TypeControl: "Combobox",
        Condition: ":Value",
        Field: "note",
        Name: "ContactGrid_Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>

<?php
    $this->breadcrumbs=array(
        'Объекты',
        'Контакты'=>array('index'),
    );
?>
<div>
<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
        'id' => 'ContactGrid',
        'ModelName' => 'Contacts',
        'Height' => 300,
        'Stretch' => true,
        'Filters' => array(
            array(
                'Type' => 'Internal',
                'Control' => 'Form',
                'Condition' => 'c.ObjectGr_id = ' . $ObjectGr_id,
                'Value' => '',
                'Name' => 'Form1',
            ),
        ),
        'Columns' => array(
            'GroupContact' => array(
                'Name' => 'Отдел',
                'FieldName' => 'GroupContact',
                'Width' => 100,
            ),
            'Kind_Name' => array(
                'Name' => 'Тема',
                'FieldName' => 'Kind_Name',
                'Width' => 100,
            ),
            'SourceInfo_id' => array(
                'Name' => 'Источник',
                'FieldName' => 'SourceInfo_id',
                'Width' => 100,
            ),
            'date' => array(
                'Name' => 'Дата',
                'FieldName' => 'date',
                'Width' => 100,
            ),
            'cntp_name' => array(
                'Name' => 'Тип',
                'FieldName' => 'cntp_name',
                'Width' => 100,
            ),
            'contact' => array(
                'Name' => 'Контактное лицо',
                'FieldName' => 'contact',
                'Width' => 150,
            ),
            'empl_name' => array(
                'Name' => 'Сотрудник',
                'FieldName' => 'empl_name',
                'Width' => 150,
            ),
            'UserCreateName' => array(
                'Name' => 'Создал',
                'FieldName' => 'UserCreateName',
                'Width' => 150,
            ),
            'next_date' => array(
                'Name' => 'Дата след. контакта',
                'FieldName' => 'next_date',
                'Width' => 150,
            ),
            'next_cntp_name' => array(
                'Name' => 'Тип след. контакта',
                'FieldName' => 'next_cntp_name',
                'Width' => 150,
            ),
            'next_contact' => array(
                'Name' => 'Контактное лицо',
                'FieldName' => 'next_contact',
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
                    'id' => 'AddContact',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Добавить',
                    'Href' => Yii::app()->createUrl('Contacts/Create', array('ObjectGr_id' => $ObjectGr_id)),
                ));
                ?>
            </td>
            <td>
                <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'EditContact',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Изменить',

                ));
                ?>
            </td>
            <td>
                <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'DeleteContact',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Удалить',

                ));
                ?>
            </td>
            
        </tr>
    </tbody>
</table>
    <div>Содержание</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'TextC',
                'Width' => 500,
                'Height' => 50,
                'Type' => 'String',
                'ReadOnly' => true,
            ));
        ?>
    </div>
    <div>
        <div style="float: left">Результат</div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'Result',
                    'Width' => 500,
                    'Type' => 'String',
                    'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div>Примечание</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'Note',
                'Width' => 500,
                'Height' => 50,
                'Type' => 'String',
                'ReadOnly' => true,
            ));
        ?>
    </div>
</div>






