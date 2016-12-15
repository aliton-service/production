<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var CurrentContract = {
//            ContrS_id: '<?php echo $model->ContrS_id; ?>',
            ContrS_id: '<?php echo $ContrS_id; ?>',
        };
            
        
        var ContractsDetails_vDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractsDetails_v, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.ContrS_id = " + CurrentContract.ContrS_id],
                });
                return data;
            },
        });
        
        $("#CDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                //pagesizeoptions: ['10', '200', '500', '1000'],
                //pagesize: 200,
                pageable: false,
                showfilterrow: false,
                virtualmode: false,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: ContractsDetails_vDataAdapter,
                columns: [
                    { text: 'Наименование', dataField: 'ItemName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                    { text: 'Кол-во', dataField: 'Quant', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                    { text: 'Цена', datafield: 'price', columntype: 'textbox', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Сумма', dataField: 'sum', columntype: 'textbox', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 120 },
                ]
            })
        );
        var summaryData = $("#CDetailsGrid").jqxGrid('getcolumnaggregateddata', 'sum', ['sum']);
        
        $("#GridSum").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 100, readOnly: true, symbol: "р", symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        if (summaryData.sum != '') $("#GridSum").jqxNumberInput('val', summaryData.sum);
        
        $("#CDetailsGrid").on('rowselect', function (event) {
            var Temp = $('#CDetailsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
//            console.log(CurrentRowData.csdt_id);
        });
    
        
        $("#NewContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#ReloadContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractsDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#CDetailsEditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 310, width: 700}));
        
        $('#CDetailsEditDialog').jqxWindow({initContent: function() {
            $("#CDetailsBtnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#CDetailsBtnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#CDetailsBtnCancel").on('click', function () {
            $('#CDetailsEditDialog').jqxWindow('close');
        });
        
        var SendFormCDetails = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Insert');?>";
            if (Mode == 'Update')
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Update');?>";
            
            var Data;
            if (Form == undefined)
                Data = $('#ContractsDetails_v').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#CDetailsEditDialog').jqxWindow('close');
                        $("#CDetailsGrid").jqxGrid('updatebounddata');
                        var summaryData = $("#CDetailsGrid").jqxGrid('getcolumnaggregateddata', 'sum', ['sum']);
                        $("#GridSum").jqxNumberInput('val', summaryData.sum);
                    } else {
                        $('#CDetailsBodyDialog').html(Res);
                    }

                }
            });
        }

        $("#CDetailsBtnOk").on('click', function () {
            SendFormCDetails(Mode);
        });
        
        var LoadFormCDetails = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Insert');?>";
                Data = { ContrS_id: id };
            }
            if (Mode == 'Update') {
                Url = "<?php echo Yii::app()->createUrl('ContractsDetails_v/Update');?>";
                Data = { csdt_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#CDetailsBodyDialog').html(Res);
                }
            });
        };
        
        
        $('#CDetailsGrid').on('rowdoubleclick', function (event) { 
            $("#EditContractsDetails").click();
        });
        
        $("#NewContractsDetails").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormCDetails(Mode, CurrentContract.ContrS_id);
            $('#CDetailsEditDialog').jqxWindow('open');
        });
        
        $("#EditContractsDetails").on('click', function ()
        {
            Mode = 'Update';
            LoadFormCDetails(Mode, CurrentRowData.csdt_id);
            $('#CDetailsEditDialog').jqxWindow('open');
        });
           
        $("#DelContractsDetails").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractsDetails_v/Delete",
                data: { csdt_id: CurrentRowData.csdt_id},
                success: function(){
                    $("#CDetailsGrid").jqxGrid('updatebounddata');
                    $("#CDetailsGrid").jqxGrid('selectrow', 0);
                    var summaryData4 = $("#CDetailsGrid").jqxGrid('getcolumnaggregateddata', 'sum', ['sum']);
                    $("#GridSum").jqxNumberInput('val', summaryData4.sum);
                }
            });
        });
        
        $("#ReloadContractsDetails").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=Documents/Index",
                success: function(){
                    $("#CDetailsGrid").jqxGrid('updatebounddata');
                    $("#CDetailsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
    });
    
        
</script>
    
    <div class="al-row" style="height: calc(100% - 42px);">
        <div id="CDetailsGrid" class="jqxGridAliton"></div>
    </div>
    <div class="al-row">
        <div class="al-row-column"><input type="button" value="Добавить" id='NewContractsDetails' /></div>
        <div class="al-row-column"><input type="button" value="Изменить" id='EditContractsDetails' /></div>
        <div class="al-row-column"><input type="button" value="Обновить" id='ReloadContractsDetails' /></div>
        <div class="al-row-column" style="padding-top: 5px;">Сумма: </div><div class="row-column"><div id="GridSum"></div></div>
        <div class="al-row-column" style="float: right; margin-right: 20px;"><input type="button" value="Удалить" id='DelContractsDetails' /></div>
        <div style="clear: both"></div>
        
    </div>



<div id="CDetailsEditDialog" style="display: none">
    <div id="CDetailsDialogHeader">
        <span id="CDetailsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="CDetailsDialogContent">
        <div style="overflow: hidden;" id="CDetailsBodyDialog"></div>
        <div id="CDetailsBottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='CDetailsBtnOk' /></div>
                <div style="float: right; margin-right: 30px;" class="row-column"><input type="button" value="Отменить" id='CDetailsBtnCancel' /></div>
            </div>
        </div>
    </div>
</div>