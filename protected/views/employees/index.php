<?php

$this->title = 'Сотрудники';

?>
<div>
    <!--    <div class="field pull-left">-->
    <!--        -->
    <!--    </div>-->
    <div class="field pull-left">
        <label>Сотрудник</label>
        <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'empl-filter',
            'Width' => 200,
            'Type' => 'String',
            'Mode' => "Auto",
        ));
        ?>
    </div>

    <div class="field pull-left">
        <?php
        $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
            'id' => 'empl-all',
            'Width' => 200,
            'Checked' => true,
            'Label' => "Все",
        ));
        ?>
        <div class="clearfix"></div>
        <?php
        $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
            'id' => 'empl-out',
            'Width' => 200,

            'Label' => "Уволенные",
        ));
        ?>
    </div>

    <div class="field pull-left">
        <label>Юр. лицо</label>
        <?php
        $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'juric-filter',
            'Stretch' => true,
            'ModelName' => 'Juridicals',
            'Height' => 300,
            'Width' => 200,
            'KeyField' => 'Jrdc_Id',
//            'KeyValue' => $model->Jrdc_id,
            'FieldName' => 'JuridicalPerson',
//            'Name' => 'Employees[Jrdc_id]',
            'Type' => array(
                'Mode' => 'Filter',
                'Condition' => 'jur.JuridicalPerson like \':Value%\'',
            ),
            'Columns' => array(
                'group_name' => array(
                    'Name' => 'Юр. лицо',
                    'FieldName' => 'JuridicalPerson',
                    'Width' => 250,
                ),
            ),
        ));
        ?>
    </div>

</div>
<?php

$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
    'id' => 'EmployeesGrid',
    'Stretch' => true,
    'Key' => 'Site_Index_EmployeesGrid_1',
    'ModelName' => 'Employees',
    'ShowFilters' => true,
    'Height' => 300,
    'Width' => 500,
    'Columns' => array(
        'EmployeeName' => array(
            'Name' => 'ФИО',
            'FieldName' => 'EmployeeName',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.EmployeeName like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 'e.EmployeeName desc',
                'Down' => 'e.EmployeeName',
            ),
        ),

        'Address' => array(
            'Name' => 'Адрес',
            'FieldName' => 'Address',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.Address like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 'e.Address desc',
                'Down' => 'e.Address',
            ),
        ),

        'Birthday' => array(
            'Name' => 'Дата рождения',
            'FieldName' => 'Birthday',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.Birthday = :Value",
            ),
            'Sort' => array(
                'Up' => 'e.Birthday desc',
                'Down' => 'e.Birthday',
            ),
        ),

        'PositionName' => array(
            'Name' => 'Должность',
            'FieldName' => 'PositionName',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "p.PositionName like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 'p.PositionName desc',
                'Down' => 'p.PositionName',
            ),
        ),

        'DepName' => array(
            'Name' => 'Отдел',
            'FieldName' => 'DepName',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "d.DepName like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 'd.DepName desc',
                'Down' => 'd.DepName',
            ),
        ),

        'SectionName' => array(
            'Name' => 'Служба',
            'FieldName' => 'SectionName',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "s.SectionName like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 's.SectionName desc',
                'Down' => 's.SectionName',
            ),
        ),

        'Territ_Name' => array(
            'Name' => 'Участок',
            'FieldName' => 'Territ_Name',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "t.Territ_Name like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 't.Territ_Name desc',
                'Down' => 't.Territ_Name',
            ),
        ),

        'DateStart' => array(
            'Name' => 'Дата приема',
            'FieldName' => 'DateStart',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.DateStart =:Value",
            ),
            'Sort' => array(
                'Up' => 'e.DateStart desc',
                'Down' => 'e.DateStart',
            ),
        ),

        'DateEnd' => array(
            'Name' => 'Дата увольнения',
            'FieldName' => 'DateEnd',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.DateEnd =:Value",
            ),
            'Sort' => array(
                'Up' => 'e.DateEnd desc',
                'Down' => 'e.DateEnd',
            ),
        ),

        'JuridicalPerson' => array(
            'Name' => 'Юр. лицо',
            'FieldName' => 'JuridicalPerson',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "j.JuridicalPerson like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 'j.JuridicalPerson desc',
                'Down' => 'j.JuridicalPerson',
            ),
        ),

        'DateBegin' => array(
            'Name' => 'Оформлен с',
            'FieldName' => 'DateBegin',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.DateBegin =:Value",
            ),
            'Sort' => array(
                'Up' => 'e.DateBegin desc',
                'Down' => 'e.DateBegin',
            ),
        ),

        'DateTrial' => array(
            'Name' => 'Дата окончания испытательного срока',
            'FieldName' => 'DateTrial',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.DateTrial =:Value",
            ),
            'Sort' => array(
                'Up' => 'e.DateTrial desc',
                'Down' => 'e.DateTrial',
            ),
        ),

        'BypassList' => array(
            'Name' => 'Обходной лист',
            'FieldName' => 'BypassList',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.BypassList =:Value",
            ),
            'Sort' => array(
                'Up' => 'e.BypassList desc',
                'Down' => 'e.BypassList',
            ),
        ),

        'Note' => array(
            'Name' => 'Примечание',
            'FieldName' => 'Note',
            'Width' => 100,
            'Filter' => array(
                'Condition' => "e.Note Like ':Value%'",
            ),
            'Sort' => array(
                'Up' => 'e.Note desc',
                'Down' => 'e.Note',
            ),
        ),

    ),
    'OnDblClick' => '$("#update").albutton("BtnClick");'
));


$this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
//	'success' => '',
//    'afterActivate'=>'',
//	'reload' => true,
    'header' => array(
        array(
            'name' => 'Общая',
            'ajax' => true,
            'options' => array(
                'url' => '/index.php?r=employees/infoGeneral',
            ),
        ),
        array(
            'name' => 'Условия',
            'ajax' => true,
            'options' => array(
                'url' => '/index.php?r=employees/infoCondition',
            ),
        ),
        array(
            'name' => 'Дети',
            'ajax' => true,
            'options' => array(
                'url' => '/index.php?r=Childrens/Index',
            ),
        ),
        array(
            'name' => 'Инструктаж',
            'ajax' => true,
            'options' => array(
                'url' => '/index.php?r=instructings',
            ),
        ),
    ),

    'content' => array(
        array(
            'id' => 'empl-general',
        ),
        array(
            'id' => 'empl-condition',
        ),
        array(
            'id' => 'empl-children',
        ),
        array(
            'id' => 'empl-instruction',
        ),
    ),
));
?>
<div class="btn-group"><?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'create',
        'Height' => 30,
        'Text' => 'Создать',
        'Type' => 'NewWindow',
        'Href' => Yii::app()->createUrl('employees/create')

    ));

    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'update',
        'Height' => 30,
        'Text' => 'Изменить',
        'Type' => 'none',
        'OnAfterClick' => "window.open('/?r=employees/update&id='+algridajaxSettings.EmployeesGrid.CurrentRow['Employee_id'])"
    ));

    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'delete',
        'Height' => 30,
        'Text' => 'Удалить',
        'Type' => 'none',
        'OnAfterClick' => "aliton.form.delete('employees/delete', algridajaxSettings.EmployeesGrid.CurrentRow['Employee_id'], function(){
		 $('#EmployeesGrid').algridajax('LoadData')
		 })"
    ));
    ?></div>

<script>

    $('.alcheckbox').on('click', function () {
        if(alcheckboxSettings["empl-out"].Checked) {
            $('#empl-all').alcheckbox('SetValue',1)
        } else {
            $('#empl-all').alcheckbox('SetValue',0)
        }
    })

    Aliton.Links = [

        {
            Out: "empl-out",
            In: "EmployeesGrid",
            TypeControl: "Grid",
            Condition: "e.DateEnd is not null",
            ConditionFalse: "",
            Name: "Checkbox1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "empl-filter",
            In: "EmployeesGrid",
            TypeControl: "Grid",
            Condition: "e.EmployeeName like ':Value%'",
            //Field: "Employee_id",
            Name: "Edit1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "InstructingsGrid",
            TypeControl: "Grid",
            Condition: "i.Employee_id = :Value",
            Field: "Employee_id",
            Name: "instrFilter",
            TypeFilter: "Internal",
            TypeLink: "Filter",
        },
        {
            Out: "EmployeesGrid",
            In: "note",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Note",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "documents",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Documents",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "address",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Address",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "phone-home",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Tel_home",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "phone-other",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Tel_other",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "email",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Email",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "phone-work",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Tel_work",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "email-work",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "WorkEmail",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "EmployeesGrid",
            In: "information",
            TypeControl: "Edit",
            Condition: ":Value",
            Field: "Information",
            Name: "TestGrid1_Filter1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
        {
            Out: "juric-filter",
            In: "EmployeesGrid",
            TypeControl: "Grid",
            Condition: "e.Jrdc_id = :Value",
            Field: "Jrdc_Id",
            Name: "TestCombobox77_Locate1",
            TypeFilter: "Internal",
            TypeLink: "Filter",
            isNullRun: false
        },
//		{
//			Out: "EmployeesGrid",
//			In: "address",
//			TypeControl: "Edit",
//			Condition: ":Value",
//			Field: "Address",
//			Name: "TestGrid1_Filter1",
//			TypeFilter: "Internal",
//			TypeLink: "Filter",
//			isNullRun: false
//		},
    ]
</script>