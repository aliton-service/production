<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var ContractSystems = {
            ContrS_id: '<?php echo $ContrS_id; ?>',
        };
            
        
        var ContractSystemsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractSystems, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["cs.ContrS_id = " + ContractSystems.ContrS_id],
                });
                return data;
            },
        });
        
        $("#ContractSystemsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '180',
                source: ContractSystemsDataAdapter,
                columns: [
                    { text: 'Тип подсистемы', dataField: 'SystemTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                ]
            })
        );
       
        $("#ContractSystemsGrid").on('rowselect', function (event) {
            var Temp = $('#ContractSystemsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
//            console.log(CurrentRowData.csdt_id);
        });
    
        
        $("#NewContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#EditDialogWindow').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '170px', width: '340'}));
        
        $('#EditDialogWindow').jqxWindow({initContent: function() {
            $("#BtnOkDialogWindow").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#BtnCancelDialogWindow").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#BtnCancelDialogWindow").on('click', function () {
            $('#EditDialogWindow').jqxWindow('close');
        });
        
        

//        $("#BtnOkDialogWindow").on('click', function () {
//            SendFormContractSystems(Mode);
//        });
        
        var LoadFormContractSystems = function(Mode, id) {
            var Url;
            var Data;
            if (Mode == 'Insert') {
                Url = "<?php echo Yii::app()->createUrl('ContractSystems/Insert');?>";
                Data = { ContrS_id: id };
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
        
        
        $("#NewContractSystems").on('click', function ()
        {
            Mode = 'Insert';
            LoadFormContractSystems(Mode, ContractSystems.ContrS_id);
            $('#EditDialogWindow').jqxWindow('open');
        });
        
        
        $("#DelContractSystems").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ContractSystems/Delete",
                data: { ContractSystem_id: CurrentRowData.ContractSystem_id},
                success: function(){
                    $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                    $("#ContractSystemsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
    });
    
        
</script>

<div style="margin-top: 10px;">
    <div id="ContractSystemsGrid" class="jqxGridAliton" style="margin-right: 10px"></div>

    <div class="row">
        <div class="row-column"><input type="button" value="Добавить" id='NewContractSystems' /></div>
        <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractSystems' /></div>
    </div>
</div>

