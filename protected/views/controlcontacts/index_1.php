<script>
    Aliton.Links.push({
        Out: "CmbClients",
        In: "ControlContactsGrid",
        TypeControl: "Grid",
        Condition: "og.PropForm_id = :Value",
        Field: "Form_id",
        Name: "Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "CmbObjects",
        In: "ControlContactsGrid",
        TypeControl: "Grid",
        Condition: "og.ObjectGr_id = :Value",
        Field: "ObjectGr_id",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDebtStart",
        In: "ControlContactsGrid",
        TypeControl: "Grid",
        Condition: "isnull(o.debt, 0) >= :Value",
        Name: "Filter3",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDebtEnd",
        In: "ControlContactsGrid",
        TypeControl: "Grid",
        Condition: "isnull(o.debt, 0) <= :Value",
        Name: "Filter4",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "CmbEmpl",
        In: "ControlContactsGrid",
        TypeControl: "Grid",
        Condition: "cnt.empl_id = :Value",
        Field: "Employee_id",
        Name: "Filter5",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateStart",
        In: "ControlContactsGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(cnt.next_date) >= ':Value'",
        Name: "Filter6",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateEnd",
        In: "ControlContactsGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(cnt.next_date) <= ':Value'",
        Name: "Filter7",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "ControlContactsGrid",
        In: "LastContactGrid",
        TypeControl: "Grid",
        Condition: "c.ObjectGr_id = :Value",
        Field: "ObjectGr_id",
        Name: "Filter8",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edDateLastContact",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "date",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edTypeLastContact",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "cntp_name",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edInfoLastContact",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "contact",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edTextLastContact",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "text",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edResultLastContact",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "rslt_name",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "ControlContactsGrid",
        In: "edDebt",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "debt",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edDebtReason",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "drsn_name",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edNextDate",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "next_date",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "LastContactGrid",
        In: "edNote",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "note",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
</script>

<?php $this->setPageTitle('Контроль контактов'); ?>

<?php
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Контроль контактов'=>array('index'),
    );
?>

<div style="float: left; margin-top: 16px;">
    <div style="float: left;">
        <div style="float: left; width: 90px;">Организация</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbClients',
                    'Stretch' => true,
                    'Key' => 'ControlContacts_Index_CmbClients',
                    'ModelName' => 'OrganizationsV',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 350,
                    'PopupWidth' => 500,
                    'KeyField' => 'Form_id',
                    'FieldName' => 'FullName',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Type' => 'Internal',
                        'Condition' => "p.FullName like '%:Value%'",
                        'Name' => 'Filter1'
                    ),
                    'Columns' => array(
                        'FullName' => array(
                            'Name' => 'Клиент',
                            'FieldName' => 'FullName',
                            'Width' => 300,
                        ),
                    ),
                ));
            ?>
        </div>
        <div style="float: left; width: 40px; margin-left: 16px">Адрес</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbObjects',
                    'Stretch' => true,
                    'Key' => 'ControlContacts_Index_CmbObjectsGrid',
                    'ModelName' => 'ListObjects',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 400,
                    'PopupWidth' => 500,
                    'KeyField' => 'Object_id',
                    'FieldName' => 'Addr',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => "a.Addr like ':Value%'",
                    ),
                    'Columns' => array(
                        'Addr' => array(
                            'Name' => 'Адрес',
                            'FieldName' => 'Addr',
                            'Width' => 300,
                            'Filter' => array(
                                'Condition' => "a.Addr like ':Value%'",
                            ),

                        ),
                    ),
                ));
            ?>
        </div>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 6px">
        <div style="float: left; width: 90px;">Долг с</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edDebtStart',
                        'Width' => 100,
                        'Type' => 'String',
                        'Value' => 0,
                ));
            ?>
        </div>
        <div style="float: left; width: 10px; margin-left: 16px;">по</div>
        <div style="float: left; margin-left: 16px;">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edDebtEnd',
                        'Width' => 100,
                        'Type' => 'String',
                        'Value' => 9999999,
                ));
            ?>
        </div>
        <div style="float: left; width: 90px; margin-left: 124px">Исполнитель</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbEmpl',
                    'Stretch' => true,
                    'Key' => 'ControlContacts_Index_CmbEmplGrid',
                    'ModelName' => 'Employees',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 200,
                    'PopupWidth' => 350,
                    'KeyField' => 'Employee_id',
                    'FieldName' => 'ShortName',
                    'KeyValue' => Yii::app()->user->Employee_id,
                    'Type' => array(
                        'Mode' => 'Filter',
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
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 6px">
        <div style="float: left; margin-right: 6px">Дата запланированного контакта с</div>
        <div style="float: left; margin-right: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateStart',
                        'Width' => 130,
                        'Name' => '',
                        'Value' => date('d.m.Y'),
                ));
            ?>
        </div>
        <div style="float: left; margin-right: 6px">по</div>
        <div style="float: left; margin-right: 6px">
                <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateEnd',
                        'Width' => 130,
                        'Name' => '',
                        'Value' => date('d.m.Y'),
                ));
                ?>
        </div>
    </div>
</div>

<div style="clear: both"></div>
<div style="margin-top: 16px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'ControlContactsGrid',
            'Stretch' => true,
            'Key' => 'ControlContacts_Index_ControlContactsGrid',
            'ModelName' => 'ControlContacts',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#ObjectInfo").albutton("BtnClick");',
            'Columns' => array(
                'NextDate' => array(
                    'Name' => 'Заплонированная дата конткта',
                    'FieldName' => 'next_date',
                    'Width' => 130,
                    'Format' => 'd.m.Y H:i',
                    'Filter' => array(
                        'Condition' => "cnt.next_date = ':Value'",
                    ),
                    'Sort' => array(
                        'Up' => 'cnt.next_date desc',
                        'Down' => 'cnt.next_date',
                    ),
                ),
                'Date' => array(
                    'Name' => 'Дата',
                    'FieldName' => 'date',
                    'Width' => 130,
                    'Format' => 'd.m.Y H:i',
                    'Filter' => array(
                        'Condition' => "cnt.date = ':Value'",
                    ),
                    'Sort' => array(
                        'Up' => 'cnt.date desc',
                        'Down' => 'cnt.date',
                    ),
                ),
                'Type' => array(
                    'Name' => 'Тип контакта',
                    'FieldName' => 'contactname',
                    'Width' => 130,
                    'Filter' => array(
                        'Condition' => "ct.contactname = ':Value'",
                    ),
                    'Sort' => array(
                        'Up' => 'ct.contactname desc',
                        'Down' => 'ct.contactname',
                    ),
                ),
                'ContactInfo' => array(
                    'Name' => 'Контактное лицо',
                    'FieldName' => 'next_contact',
                    'Width' => 180,
                    'Filter' => array(
                        'Condition' => "ci.contact like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'ci.contact desc',
                        'Down' => 'ci.contact',
                    ),
                ),
                'FullName' => array(
                    'Name' => 'Организация',
                    'FieldName' => 'FullName',
                    'Width' => 180,
                    'Filter' => array(
                        'Condition' => "o.FullName like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'o.FullName desc',
                        'Down' => 'o.FullName',
                    ),
                ),
                'Addr' => array(
                    'Name' => 'Адрес',
                    'FieldName' => 'Addr',
                    'Width' => 260,
                    'Filter' => array(
                        'Condition' => "a.Addr like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'a.Addr desc',
                        'Down' => 'a.Addr',
                    ),
                ),
                'Debt' => array(
                    'Name' => 'Долг',
                    'FieldName' => 'debt',
                    'Width' => 120,
                    'Filter' => array(
                        'Condition' => "o.debt = :Value",
                    ),
                    'Sort' => array(
                        'Up' => 'o.debt desc',
                        'Down' => 'o.debt',
                    ),
                ),
                'Empl' => array(
                    'Name' => 'Исполнитель',
                    'FieldName' => 'empl_name',
                    'Width' => 140,
                    'Filter' => array(
                        'Condition' => "e.empl_name like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'e.empl_name desc',
                        'Down' => 'e.empl_name',
                    ),
                ),
            ),
        ));
    ?>
</div>
<div style="clear: both"></div>
<div style="margin-top: 16px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'LastContactGrid',
            'Stretch' => true,
            'Key' => 'ControlContacts_Index_LastContactGrid',
            'ModelName' => 'Contacts',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'Visible' => false,
            //'OnDblClick' => '$("#EditSection").albutton("BtnClick");',
            'Filters' => array(
                array(
                    'Type' => 'Internal',
                    'Control' => 'Form',
                    'Condition' => 'c.cont_id = (select top 1 c2.cont_id from contacts c2 where c2.objectgr_id = c.objectgr_id and c2.deldate is null order by c2.date desc)', 
                    'Value' => '',
                    'Name' => 'Form1',
                ),
            ),
            'Columns' => array(
                'Date' => array(
                    'Name' => 'Дата конткта',
                    'FieldName' => 'date',
                    'Width' => 130,
                    'Format' => 'd.m.Y H:i',
                    'Filter' => array(
                        'Condition' => "c.date = ':Value'",
                    ),
                    'Sort' => array(
                        'Up' => 'c.date desc',
                        'Down' => 'c.date',
                    ),
                ),
            ),
        ));
        ?>
</div>
<div style="clear: both"></div>
<div style="margin-top: 6px">Последний контакт</div>
<div style="float: left; margin-top: 6px">
    <div style="float: left; margin-right: 6px">Дата</div>
    <div style="float: left; margin-right: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDateLastContact',
                    'Width' => 130,
                    'Name' => '',
                    'ReadOnly' => true,
            ));
        ?>
    </div>
    <div style="float: left; margin-right: 26px">Тип</div>
    <div style="float: left; margin-right: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edTypeLastContact',
                    'Width' => 180,
                    'Name' => '',
                    'ReadOnly' => true,
            ));
        ?>
    </div>
    <div style="float: left; margin-right: 26px">Контактное лицо</div>
    <div style="float: left; margin-right: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edInfoLastContact',
                    'Width' => 230,
                    'Name' => '',
                    'ReadOnly' => true,
            ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px">
    <div style="float: left; margin-right: 26px">Содержание</div>
    <div style="clear: both"></div>
    <div style="float: left; margin-right: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'edTextLastContact',
                    'Width' => 430,
                    'Height' => 100,
                    'Name' => '',
                    'ReadOnly' => true,
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-right: 26px; margin-top: 6px">Результат</div>
    <div style="float: left; margin-right: 6px; margin-top: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edResultLastContact',
                    'Width' => 342,
                    'Name' => '',
                    'ReadOnly' => true,
            ));
        ?>
    </div>
</div>
<div style="float: left; margin-top: 6px">
    <div style="float: left;">
        <div style="float: left; margin-right: 26px">Долг</div>
        <div style="clear: both"></div>
        <div style="float: left; margin-right: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edDebt',
                        'Width' => 130,
                        'Name' => '',
                        'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div style="float: left;">
        <div style="float: left; margin-right: 26px">Причина долга</div>
        <div style="clear: both"></div>
        <div style="float: left; margin-right: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edDebtReason',
                        'Width' => 230,
                        'Name' => '',
                        'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div style="float: left;">
        <div style="float: left; margin-right: 26px">Дата согласованной оплаты</div>
        <div style="clear: both"></div>
        <div style="float: left; margin-right: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edatedit.aldateedit', array(
                        'id' => 'edNextDate',
                        'Width' => 130,
                        'Name' => '',
                        'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <div style="float: left; margin-right: 26px">Примечание</div>
        <div style="clear: both"></div>
        <div style="float: left; margin-right: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                        'id' => 'edNote',
                        'Width' => 500,
                        'Height' => 88,
                        'Name' => '',
                        'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 6px">
    <div style="float: left; margin-left: 0px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'ObjectInfo',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Дополнительно',
                'Href' => Yii::app()->createUrl('Objectsgroup/index'),
                'Params' => array(
                        array(
                                'ParamName' => 'ObjectGr_id',
                                'NameControl' => 'ControlContactsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'ObjectGr_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'Refresh',
                'Width' => 124,
                'Height' => 30,
                'Type' => 'None',
                'Text' => 'Обновить',
                'OnAfterClick' => '$("#ControlContactsGrid").algridajax("Load");',
            ));
        ?>
    </div>
</div>
