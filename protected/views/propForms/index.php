<script>
    Aliton.Links.push({
        Out: "edFullName",
        In: "PropFormsGrid",
        TypeControl: "Grid",
        Condition: "p.FullName like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edINN",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "inn",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edKPP",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "kpp",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edAccount",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "account",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edTelephone",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "telephone",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edBANK",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "bank_name",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edCorAccount",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "cor_account",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edBik",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "bik",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edJAddress",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "JAddress",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "PropFormsGrid",
        In: "edFAddress",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "FAddress",
        Name: "Filter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>

<?php $this->setPageTitle('Организации'); ?>

<?php
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Организации'=>array('index'),
    );
?>

<div style="float: left; margin-top: 16px;">
    <div style="text-align: center; float: left">Поиск по наименованию</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edFullName',
                    'Width' => 250,
                    'Type' => 'String',
            ));
        ?>
    </div>
</div>

<div style="clear: both"></div>
<div style="margin-top: 16px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'PropFormsGrid',
            'Stretch' => true,
            'Key' => 'PropForms_Index_PropFormsGrid',
            'ModelName' => 'OrganizationsV',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#EditPropForm").albutton("BtnClick");',
            'Columns' => array(
                'FormName' => array(
                    'Name' => 'Наименование',
                    'FieldName' => 'FormName',
                    'Width' => 200,
                    'Filter' => array(
                        'Condition' => "p.FormName like '%:Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'p.FormName desc',
                        'Down' => 'p.FormName',
                    ),
                ),
                'FownName' => array(
                    'Name' => 'Форма собственности',
                    'FieldName' => 'FownName',
                    'Width' => 150,
                    'Filter' => array(
                        'Condition' => "p.FownName like '%:Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'p.FownName desc',
                        'Down' => 'p.FownName',
                    ),
                ),
                'LphName' => array(
                    'Name' => 'Тип',
                    'FieldName' => 'lph_name',
                    'Width' => 150,
                    'Filter' => array(
                        'Condition' => "p.lph_name like '%:Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'p.lph_name desc',
                        'Down' => 'p.lph_name',
                    ),
                ),
            ),
        ));
    ?>
</div>
<div style="margin-top: 16px;">    
    <div style="float: left;">
        <div style="text-align: center; float: left">ИНН:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edINN',
                        'Width' => 120,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="text-align: center; float: left">КПП:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edKPP',
                        'Width' => 120,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="text-align: center; float: left">Расчетный счет:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edAccount',
                        'Width' => 220,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="text-align: center; float: left">Телефон:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edTelephone',
                        'Width' => 120,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div style="margin-top: 8px">
    <div style="float: left;">
        <div style="text-align: center; float: left">Банк:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edBANK',
                        'Width' => 420,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="text-align: center; float: left">Кор. счет:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edCorAccount',
                        'Width' => 220,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="text-align: center; float: left">БИК:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edBik',
                        'Width' => 120,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div style="margin-top: 8px">
    <div style="float: left;">
        <div style="text-align: center; float: left">Юридический адрес:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edJAddress',
                        'Width' => 320,
                        'Type' => 'String',
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="text-align: center; float: left">Фактический адрес:</div>
        <div style="float: left; margin-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edFAddress',
                        'Width' => 320,
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
                'id' => 'AddPropForm',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('propForms/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditPropForm',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('propForms/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'id',
                                'NameControl' => 'PropFormsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Form_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelPropForm',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('propForms/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'id',
                                'NameControl' => 'PropFormsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Form_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>

