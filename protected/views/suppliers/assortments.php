<script>
    Aliton.Links.push({
        Out: "edEquipName",
        In: "SupplierAssortmentsGrid",
        TypeControl: "Grid",
        Condition: "sa.EquipName like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
</script>

<div style="float: left">Поиск по наименованию:</div>
<div style="float: left; margin-left: 8px">
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edEquipName',
                'Width' => 300,
                'Type' => 'String',
        ));
    ?>
</div>
<div style="clear: both"></div>

<div style="margin-top: 12px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'SupplierAssortmentsGrid',
            'Stretch' => true,
            'Key' => 'Supplier_Assortments_SupplierAssortmentsGrid',
            'ModelName' => 'SupplierAssortments_v',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'Filters' => array(
                array(
                    'Type' => 'Internal',
                    'Control' => 'Form',
                    'Condition' => 'sa.Supplier_id = ' . $Supplier_id,
                    'Value' => '',
                    'Name' => 'Form',
                ),
            ),
            'Columns' => array(
                'EquipName' => array(
                    'Name' => 'Наименование',
                    'FieldName' => 'EquipName',
                    'Width' => 400,
                    'Filter' => array(
                        'Condition' => "sa.EquipName like '%:Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'sa.EquipName desc',
                        'Down' => 'sa.EquipName',
                    ),
                ),
            ),
        ));
    ?>
</div>
<div style="float: right; margin-top: 6px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'Close',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Закрыть',
            'Type' => 'None',
            'OnAfterClick' => '$("#AssortmentsDialog").aldialog("HideContent");',

        ));
    ?>
</div>

