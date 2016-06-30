<script>
    Aliton.Links.push({
        Out: "edSupplierName",
        In: "SuppliersGrid",
        TypeControl: "Grid",
        Condition: "s.NameSupplier like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "SuppliersGrid",
        In: "edFullName",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "FullName",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "SuppliersGrid",
        In: "edBank",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "bank_name",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "SuppliersGrid",
        In: "edNote",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Note",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "SuppliersGrid",
        In: "edBik",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "bik",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "SuppliersGrid",
        In: "edCorAccount",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "cor_account",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>
<?php $this->setPageTitle('Поставщики\Производители'); ?>
<?php
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Поставщики\Производители'=>array('index'),
    );
?>

<div style="float: left; margin-top: 16px;">
    <div style="text-align: center; float: left">Поиск по наименованию</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edSupplierName',
                    'Width' => 350,
                    'Type' => 'String',
            ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="margin-top: 16px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'SuppliersGrid',
            'Stretch' => true,
            'Key' => 'Supplier_Index_SuppliersGrid',
            'ModelName' => 'Suppliers',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#EditSuppliers").albutton("BtnClick");',
            'Columns' => array(
                'NameSupplier' => array(
                    'Name' => 'Наименование',
                    'FieldName' => 'NameSupplier',
                    'Width' => 200,
                    'Filter' => array(
                        'Condition' => "s.NameSupplier like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.NameSupplier desc',
                        'Down' => 's.NameSupplier',
                    ),
                ),
                'Adress' => array(
                    'Name' => 'Адрес',
                    'FieldName' => 'Adress',
                    'Width' => 280,
                    'Filter' => array(
                        'Condition' => "s.Adress like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.Adress desc',
                        'Down' => 's.Adress',
                    ),
                ),
                'Tel' => array(
                    'Name' => 'Телефон',
                    'FieldName' => 'Tel',
                    'Width' => 180,
                    'Filter' => array(
                        'Condition' => "s.Tel like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.Tel desc',
                        'Down' => 's.Tel',
                    ),
                ),
                'ContactFace' => array(
                    'Name' => 'Контактное лицо',
                    'FieldName' => 'ContactFace',
                    'Width' => 180,
                    'Filter' => array(
                        'Condition' => "s.ContactFace like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.ContactFace desc',
                        'Down' => 's.ContactFace',
                    ),
                ),
                'Supplier' => array(
                    'Name' => 'Поставщик',
                    'FieldName' => 'Supplier',
                    'Width' => 60,
                    'Filter' => array(
                        'Condition' => "s.Supplier like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.Supplier desc',
                        'Down' => 's.Supplier',
                    ),
                ),
                'Producer' => array(
                    'Name' => 'Производитель',
                    'FieldName' => 'Producer',
                    'Width' => 60,
                    'Filter' => array(
                        'Condition' => "s.Producer like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.Producer desc',
                        'Down' => 's.Producer',
                    ),
                ),
                'Repair' => array(
                    'Name' => 'СРМ',
                    'FieldName' => 'Repair',
                    'Width' => 60,
                    'Filter' => array(
                        'Condition' => "s.Repair = ':Value'",
                    ),
                    'Sort' => array(
                        'Up' => 's.Repair desc',
                        'Down' => 's.Repair',
                    ),
                ),
                'DateLastContact' => array(
                    'Name' => 'Дата последнего контакта',
                    'FieldName' => 'DateLastContact',
                    'Width' => 130,
                    'Format' => 'd.m.Y',
                    'Filter' => array(
                        'Condition' => "s.DateLastContact = ':Value'",
                    ),
                    'Sort' => array(
                        'Up' => 's.DateLastContact desc',
                        'Down' => 's.DateLastContact',
                    ),
                ),
                'DateLastPurchase' => array(
                    'Name' => 'Дата последней закупки',
                    'FieldName' => 'DateLastPurchase',
                    'Width' => 130,
                    'Format' => 'd.m.Y',
                    'Filter' => array(
                        'Condition' => "s.DateLastPurchase = ':Value'",
                    ),
                    'Sort' => array(
                        'Up' => 's.DateLastPurchase desc',
                        'Down' => 's.DateLastPurchase',
                    ),
                ),
                'INN' => array(
                    'Name' => 'ИНН',
                    'FieldName' => 'inn',
                    'Width' => 130,
                    'Filter' => array(
                        'Condition' => "s.inn like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.inn desc',
                        'Down' => 's.inn',
                    ),
                ),
                'KPP' => array(
                    'Name' => 'КПП',
                    'FieldName' => 'kpp',
                    'Width' => 130,
                    'Filter' => array(
                        'Condition' => "s.kpp like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 's.kpp desc',
                        'Down' => 's.kpp',
                    ),
                ),
            ),
        ));
    ?>
</div>
<div style="margin-top: 16px;">    
    <div style="float: left;">
        <div style="text-align: left;">Полное наименование:</div>
        <div style="float: left; margin-left: 0px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edFullName',
                        'Width' => 320,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="text-align: left; margin-left: 6px">Банк</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edBank',
                        'Width' => 320,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-left: 0px; margin-top: 6px">
        <div style="text-align: left; margin-left: 0px">Примечание</div>
        <div style="float: left; margin-left: 0px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edNote',
                        'Width' => 220,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 6px">
        <div style="text-align: left;">БИК</div>
        <div style="float: left; margin-left: 0px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edBik',
                        'Width' => 120,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px; margin-top: 6px">
        <div style="text-align: left;">Кор. счет</div>
        <div style="float: left; margin-left: 0px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edCorAccount',
                        'Width' => 300,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
</div>




<div style="clear: both"></div>
<div style="margin-top: 16px">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AddSupplier',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('suppliers/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditSuppliers',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('suppliers/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Supplier_id',
                                'NameControl' => 'SuppliersGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Supplier_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'Assortments',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Ассортимент',
                'Type' => 'None',
                /*
                'Href' => Yii::app()->createUrl('suppliers/Assortments'),
                'Params' => array(
                        array(
                                'ParamName' => 'Supplier_id',
                                'NameControl' => 'SuppliersGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Supplier_id',
                        ),
                ),
                */
                'OnAfterClick' => '$("#AssortmentsDialog").aldialog("Show", {Supplier_id: algridajaxSettings["SuppliersGrid"].CurrentRow["Supplier_id"]});',
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelSuppliers',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('suppliers/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Supplier_id',
                                'NameControl' => 'SuppliersGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Supplier_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>

<?php
   $this->widget('application.extensions.alitonwidgets.dialog.aldialog', array(
        'id' => 'AssortmentsDialog',
        'Width' => 500,
        'Height' => 380,
        'ContentUrl' => Yii::app()->createUrl('suppliers/Assortments'),
    ));
 ?>

