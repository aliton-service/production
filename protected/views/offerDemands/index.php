<script type="text/javascript">
    var OfferDemands = {};
    
    $(document).ready(function () {
        
        var CurrentRowDataOfferDemands;
        
        OfferDemands = {
            offer_id: '<?php echo $offer_id; ?>',
        };

        OfferDemands.AddDemand = function(Demand_id) {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('OfferDemands/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    offer_id: OfferDemands.offer_id,
                    dmnd_id: Demand_id
                },
                success: function(Res) {
                    $("#OfferDemandsGrid").jqxGrid('updatebounddata');
                    $("#OfferDemandsGrid").jqxGrid('selectrow', 0);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };

        var OfferDemandsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOfferDemands), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["od.offer_id = " + OfferDemands.offer_id],
                });
                return data;
            },
        });
        
        $("#OfferDemandsGrid").on('rowselect', function (event) {
            var Temp = $('#OfferDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowDataOfferDemands = Temp;
            } else { CurrentRowDataOfferDemands = null; };
//            console.log(CurrentRowDataOfferDemands);
            CheckButtonOD();
        });
//
        $('#btnFindDemand').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnReloadDemands').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnDelDemand').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnClose').jqxButton($.extend(true, {}, ButtonDefaultSettings));
//        
        var CheckButtonOD = function() {
            $('#btnDelDemand').jqxButton({disabled: !(CurrentRowDataOfferDemands != undefined)});
        };
        
        $("#OfferDemandsGrid").on("bindingcomplete", function () {
            $('#OfferDemandsGrid').jqxGrid('selectrow', 0);
        });
//        
        $("#OfferDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                groupable: false,
                width: '100%',
                height: '450',
                source: OfferDemandsDataAdapter,
                columns: [
                    { text: 'Номер', datafield: 'dmnd_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                    { text: 'Адрес', datafield: 'Address', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 500 },
                ]
            })
        );

//        
        $('#btnFindDemand').on('click', function(){
            $('#FindDemandDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 550, width: 800, position: 'center'}));
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Demands/FindDemand')) ?>,
                type: 'POST',
                async: false,
                data: {
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyFindDemandDialog").html(Res.html);
                    $('#FindDemandDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        $("#btnReloadDemands").on('click', function (){
            $.ajax({
                type: "POST",
                url: "/index.php?r=OfferDemands/index",
                success: function(){
                    $("#OfferDemandsGrid").jqxGrid('updatebounddata');
                    $("#OfferDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        $("#btnDelDemand").on('click', function (){
            $.ajax({
                type: "POST",
                url: "/index.php?r=OfferDemands/Delete",
                data: { 
                    OfferDemand_id: CurrentRowDataOfferDemands.OfferDemand_id,
                },
                success: function(){
                    $("#OfferDemandsGrid").jqxGrid('updatebounddata');
                    $("#OfferDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
        $('#btnClose').on('click', function(){
            $('#EventOffersDialog').jqxWindow('close');
        });

        
    });
</script>        

<div id="OfferDemandsGrid" class="jqxGridAliton"></div>

<div class="row">
    <div class="row-column"><input type="button" value="Найти" id='btnFindDemand'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnReloadDemands'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Закрыть" id='btnClose'/></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Удалить" id='btnDelDemand'/></div>
</div>

<div id="FindDemandDialog" style="display: none;">
    <div id="FindDemandDialogHeader">
        <span id="FindDemandDialogHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogFindDemandContent">
        <div style="" id="BodyFindDemandDialog"></div>
    </div>
</div>
