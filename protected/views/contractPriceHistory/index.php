<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var ContractPriceHistory = {
            ContrS_id: '<?php echo $ContrS_id; ?>',
        };
            
        
        var ContractPriceHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractPriceHistory, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["ph.ContrS_id = " + ContractPriceHistory.ContrS_id],
                });
                return data;
            },
        });
        
        $("#ContractPriceHistoryGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '180',
                source: ContractPriceHistoryDataAdapter,
                columns: [
                    { text: 'Тариф', dataField: 'ServiceType', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Дата изменения', dataField: 'DateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Расценка', dataField: 'Price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Ежемесячные начисления', dataField: 'PriceMonth', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                    { text: 'Причина изменения', dataField: 'ReasonName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                ]
            })
        );
       
        $("#ContractPriceHistoryGrid").on('rowselect', function (event) {
            var Temp = $('#ContractPriceHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
//            console.log(CurrentRowData.PriceHistory_id);
        });
    
        
        $("#NewContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#EditDialogWindow').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '600'}));
        
        $('#EditDialogWindow').jqxWindow({initContent: function() {
            $("#BtnOkDialogWindow").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogWindow").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#BtnCancelDialogWindow").on('click', function () {
            $('#EditDialogWindow').jqxWindow('close');
        });
        
        

//        $("#BtnOkDialogWindow").on('click', function () {
//            SendFormContractPriceHistory(Mode);
//        });
        
        var LoadFormContractPriceHistory = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'InsertContractPriceHistory') {
                Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Insert');?>";
                Data = { ContrS_id: id };
            }
            if (Mode == 'UpdateContractPriceHistory') {
                Url = "<?php echo Yii::app()->createUrl('ContractPriceHistory/Update');?>";
                Data = { PriceHistory_id: id };
            }
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    $('#BodyDialogWindow').html(Res);
                }
            });
        };
        
        
        $("#NewContractPriceHistory").on('click', function ()
        {
            Mode = 'InsertContractPriceHistory';
            LoadFormContractPriceHistory(Mode, ContractPriceHistory.ContrS_id);
            $('#EditDialogWindow').jqxWindow('open');
        });
        
        
        $("#DelContractPriceHistory").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractPriceHistory/Delete",
                data: { PriceHistory_id: CurrentRowData.PriceHistory_id},
                success: function(){
                    $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                    $("#ContractPriceHistoryGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
    });
    
        
</script>

<div style="margin-top: 10px;">
    <div id="ContractPriceHistoryGrid" class="jqxGridAliton" style="margin-right: 10px"></div>

    <div class="row">
        <div class="row-column"><input type="button" value="Добавить" id='NewContractPriceHistory' /></div>
        <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractPriceHistory' /></div>
    </div>
</div>

