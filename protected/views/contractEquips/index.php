<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var CurrentContract = {
            contrs_id: '<?php echo $contrs_id; ?>',
        };
            
        
        var ContractEquipsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractEquips, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ce.contrs_id = " + CurrentContract.contrs_id],
                });
                return data;
            },
        });
        
        $("#CEquipsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '98%',
                height: '99%',
                source: ContractEquipsDataAdapter,
                columns: [
                    { text: 'Наименование', dataField: 'equipname', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                    { text: 'Количество', dataField: 'quant', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Цена', dataField: 'price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120, decimalDigits: 2 },
                    { text: 'Сумма', dataField: 'sum', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );
        var summaryData2 = $("#CEquipsGrid").jqxGrid('getcolumnaggregateddata', 'sum', ['sum']);
        
        $("#GridSum2").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р.", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        if (summaryData2.sum != '') $("#GridSum2").jqxNumberInput('val', summaryData2.sum);
        
        $("#CEquipsGrid").on('rowselect', function (event) {
            var Temp = $('#CEquipsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null;};
        });
    
        
        $("#NewContractsEquips").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditContractsEquips").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadContractsEquips").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractsEquips").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#CEquipsEditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 210, width: 700}));
        
        $('#CEquipsEditDialog').jqxWindow({initContent: function() {
            $("#CEquipsBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#CEquipsBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#CEquipsBtnCancel").on('click', function () {
            $('#CEquipsEditDialog').jqxWindow('close');
        });
        
        var SendFormCEquips = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('ContractEquips/Insert');?>";
            if (Mode == 'Update')
                Url = "<?php echo Yii::app()->createUrl('ContractEquips/Update');?>";
            
            var Data;
            if (Form == undefined)
                Data = $('#ContractEquips').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#CEquipsEditDialog').jqxWindow('close');
                        $("#CEquipsGrid").jqxGrid('updatebounddata');
                        var summaryData = $("#CEquipsGrid").jqxGrid('getcolumnaggregateddata', 'sum', ['sum']);
                        $("#GridSum2").jqxNumberInput('val', summaryData.sum);
                    } else {
                        $('#CEquipsBodyDialog').html(Res);
                    }

                }
            });
        }

        $("#CEquipsBtnOk").on('click', function () {
            SendFormCEquips(Mode);
        });
        
        var LoadFormCEquips = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('ContractEquips/Insert');?>";
                Data = { contrs_id: id };
            }
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('ContractEquips/Update');?>";
                Data = { creq_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#CEquipsBodyDialog').html(Res);
                }
            });
        };
        
        
        $('#CEquipsGrid').on('rowdoubleclick', function (event) { 
            $("#EditContractsEquips").click();
        });
        
        $("#NewContractsEquips").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormCEquips(Mode, CurrentContract.contrs_id);
            $('#CEquipsEditDialog').jqxWindow('open');
        });
        
        $("#EditContractsEquips").on('click', function ()
        {
            Mode = 'Update';
            LoadFormCEquips(Mode, CurrentRowData.creq_id);
            $('#CEquipsEditDialog').jqxWindow('open');
        });
           
        $("#DelContractsEquips").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractEquips/Delete",
                data: { creq_id: CurrentRowData.creq_id},
                success: function(){
                    $("#CEquipsGrid").jqxGrid('updatebounddata');
                    $("#CEquipsGrid").jqxGrid('selectrow', 0);
                    var summaryData3 = $("#CEquipsGrid").jqxGrid('getcolumnaggregateddata', 'sum', ['sum']);
                    $("#GridSum2").jqxNumberInput('val', summaryData3.sum);
                }
            });
        });
        
        $("#ReloadContractsEquips").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Documents/Index",
                success: function(){
                    $("#CEquipsGrid").jqxGrid('updatebounddata');
                    $("#CEquipsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
    });
    
        
</script>

<div style="height: calc(100% - 60px);">
    <div id="CEquipsGrid" class="jqxGridAliton" style="margin-top: 10px"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='NewContractsEquips' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditContractsEquips' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='ReloadContractsEquips' /></div>
    <div class="row-column" style="padding-top: 5px;">Сумма: </div><div class="row-column"><div id="GridSum2"></div></div>
    <div class="row-column" style="float: right; margin-right: 20px;"><input type="button" value="Удалить" id='DelContractsEquips' /></div>
</div>



<div id="CEquipsEditDialog">
    <div id="CEquipsDialogHeader">
        <span id="CEquipsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="CEquipsDialogContent">
        <div style="overflow: hidden;" id="CEquipsBodyDialog"></div>
        <div id="CEquipsBottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='CEquipsBtnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='CEquipsBtnCancel' /></div>
            </div>
        </div>
    </div>
</div>