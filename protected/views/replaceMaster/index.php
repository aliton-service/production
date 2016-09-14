<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var ReplaceMaster = {
            Employee_id: '<?php // echo $model->Employee_id; ?>',
        };

        var DataEmpl = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        
        $("#DateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        
        $("#FromEmpl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 233 }));
        $("#FromObjectCount").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $("#FromContrsCount").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        
        $("#ToEmpl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmpl, displayMember: "ShortName", valueMember: "Employee_id", width: 233 }));
        $("#ToObjectCount").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        $("#ToContrsCount").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 70}));
        
        $("#btnReplaceMaster").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
    });
    
        
</script>

<?php $this->setPageTitle('Перевод мастеров'); ?>

<div class="row" style="margin-left: 10px;">
    <div class="row">
        <div class="row-column">Дата начала работы: </div><div class="row-column"><div id='DateStart' name="ReplaceMaster[date]"></div></div>
    </div>

    <div class="row" style="padding: 10px; width: 350px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row-column" style="margin: 0 0 15px 5px; width: 100%;">Мастер С которого переводим объекты</div>
        <div class="row">
            <div class="row-column" style="margin-top: 4px;">Имя: </div><div class="row-column"><div id='FromEmpl' name="ReplaceMaster[FromEmpl]"></div><?php // echo $form->error($model, 'FromEmpl'); ?></div>
        </div>
        <div class="row">
            <div class="row-column">Кол-во объектов на мастере: <input readonly id='FromObjectCount' type="text" style="margin-left: 8px;"></div>
        </div>
        <div class="row">
            <div class="row-column">Кол-во договоров на мастере: <input readonly id='FromContrsCount' type="text" ></div>
        </div>
    </div>
    
    <div class="row" style="padding: 10px; width: 350px; border: 1px solid #ddd; background-color: #F2F2F2;">
        <div class="row-column" style="margin: 0 0 15px 5px; width: 100%;">Мастер НА которого переводим объекты</div>
        <div class="row">
            <div class="row-column" style="margin-top: 4px;">Имя: </div><div class="row-column"><div id='ToEmpl' name="ReplaceMaster[ToEmpl]"></div><?php // echo $form->error($model, 'FromEmpl'); ?></div>
        </div>
        <div class="row">
            <div class="row-column">Кол-во объектов на мастере: <input readonly id='ToObjectCount' type="text" style="margin-left: 8px;"></div>
        </div>
        <div class="row">
            <div class="row-column">Кол-во договоров на мастере: <input readonly id='ToContrsCount' type="text" ></div>
        </div>
    </div>
    <div class="row">
        <div class="row-column"><input type="button" value="Перевести" id='btnReplaceMaster' /></div>
    </div>
</div>