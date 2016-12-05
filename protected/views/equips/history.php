<script type="text/javascript">
    $(document).ready(function () {
        var Equip_id = <?php echo json_encode($Equip_id); ?>;
        var CurrentRowData;
        var HistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEquipHistory, {}), {
            formatData: function (data) {
                var Variables = {
                    Equip_id: Equip_id,
                };
                
                $.extend(data, {
                    Variables: Variables,
                });
                return data;
        }});
        
        $("#HistoryGrid").on('rowselect', function (event) {
            CurrentRowData = $('#HistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowData != undefined) {
                $("#edNote").jqxTextArea('val', CurrentRowData.note); 
            }
        });
        
        $("#HistoryGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: HistoryDataAdapter,
                columns: [
                    { text: 'Тип документа', columngroup: 'Generals', datafield: 'dctp_id', filtercondition: 'CONTRAINS', width: 100, 
                        cellsrenderer: function (row, columnfield, value, defaulthtml, columnproperties) {
                            if (value == '0') 
                                return 'Остатки';
                            if (value == '1') 
                                return 'Приход';
                            if (value == '2') 
                                return 'Возврат';
                            if (value == '3') 
                                return 'Возврат (П)';
                            if (value == '4') 
                                return 'Требование';
                        }    
                    },
                    { text: 'Дата', columngroup: 'Generals', datafield: 'achs_date', filtercondition: 'CONTRAINS', width: 100, cellsformat: 'dd.MM.yyyy' },
                    { text: 'Номер', columngroup: 'Generals', datafield: 'number', filtercondition: 'CONTRAINS', width: 100 },
                    { text: 'Адрес', columngroup: 'Generals', datafield: 'Addr', filtercondition: 'CONTRAINS', width: 200 },
                    { text: 'Мастер', columngroup: 'Generals', datafield: 'MasterName', filtercondition: 'CONTRAINS', width: 150 },
                    { text: 'Серийный номер', columngroup: 'Generals', datafield: 'SN', filtercondition: 'CONTRAINS', width: 100 },
                    { text: 'Новое', columngroup: 'Quant', datafield: 'quant', cellsformat: 'f2', filtercondition: 'CONTRAINS', width: 100 },
                    { text: 'Б\У', columngroup: 'Quant', datafield: 'quant_used', cellsformat: 'f2', filtercondition: 'CONTRAINS', width: 100 },
                ],
                columngroups: 
                [
                    { text: 'Документ', align: 'center', name: 'Generals' },
                    { text: 'Количесвто', align: 'center', name: 'Quant' },
                ]
        }));
        
        $("#edNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {width: 'calc(100% - 2px)'}));
        $("#btnDocInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnClose").jqxButton($.extend(true, {}, ButtonDefaultSettings, {}));
        $("#btnClose").on('click', function() {
            $("#EquipsDialog").jqxWindow('close');
        });
    });
</script>    

<div class="al-row" style="height: calc(100% - 158px)">
    <div id="HistoryGrid"></div>
</div>
<div class="al-row" >
    <div class="al-row">Примечание</div>
    <div class="al-row"><textarea id="edNote"></textarea></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnDocInfo" value="Доп-но"/></div>
    <div class="al-row-column" style="float: right;"><input type="button" id="btnClose" value="Закрыть"/></div>
</div>    


