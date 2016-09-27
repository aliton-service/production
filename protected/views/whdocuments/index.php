<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DateStart = new Date();
        var DateEnd = new Date();
        DateStart.setMonth(DateStart.getMonth() - 1);
        
        var DataSuppliers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListSuppliersMin));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        
        $("#edNumber").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100} ));
        $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: DateStart}));
        $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy', value: DateEnd}));
        $("#edDateCrStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy'}));
        $("#edDateCrEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy'}));
        $("#edDateAcStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy'}));
        $("#edDateAcEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '120px', formatString: 'dd.MM.yyyy'}));
        $("#edSupplier").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataSuppliers, width: '270', height: '25px', displayMember: "NameSupplier", valueMember: "Supplier_id"}));
        $("#edAddress").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150} ));
        $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, width: '150', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edControl").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '75'}));
        $("#edAcDateNull").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: '75'}));
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                break;
            }
        };
                    
        $('#edTabs').jqxTabs({ width: '100%', height: 345, initTabContent: initWidgets});
        
        
    });
</script>    

<?php $this->setPageTitle('Склад - реестр документов'); ?>

<?php
    $this->breadcrumbs=array(
            'Главная'=>array('/Site/index'),
            'Реестр документов'=>array('index'),
    );
?>

<div class="row">
    <div class="row-column">
        <div>
            <div class="row-column">Номер</div>
            <div class="row-column"><input type="text" autocomplete="off" id="edNumber"/></div>
        </div>
        <div>
            <div class="row-column"><div id="edControl">Котроль</div></div>
            <div class="row-column"><div id="edAcDateNull">Не выданные</div></div>
        </div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 40px;">Дата с</div>
            <div class="row-column"><div id="edDateStart"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 4px;">
            <div class="row-column" style="width: 40px;">по</div>
            <div class="row-column"><div id="edDateEnd"></div></div>
        </div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 60px;">Создан с</div>
            <div class="row-column"><div id="edDateCrStart"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 4px;">
            <div class="row-column" style="width: 60px;">по</div>
            <div class="row-column"><div id="edDateCrEnd"></div></div>
        </div>
    </div>
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 100px;">Подтвержден с</div>
            <div class="row-column"><div id="edDateAcStart"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 4px;">
            <div class="row-column" style="width: 100px;">по</div>
            <div class="row-column"><div id="edDateAcEnd"></div></div>
        </div>
    </div>
</div>
<div class="row" style="margin-top: 0px;">
    <div class="row-column">Поставщик</div>
    <div class="row-column"><div id="edSupplier"></div></div>
    <div class="row-column">Адрес</div>
    <div class="row-column"><input type="text" autocomplete="off" id="edAddress"/></div>
    <div class="row-column">Затребовал</div>
    <div class="row-column"><div id="edMaster"></div></div>
</div>
<div id='edTabs' style="margin-top: 5px;">
    <ul>
        <li style="margin-left: 20px;">
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Все документы</div>
                
            </div>
        </li>
        <li>
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладные на приход</div>
            </div>
        </li>
    </ul>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            
        </div>
    </div>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            
        </div>
    </div>
</div>
    
