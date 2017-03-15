<script type="text/javascript">
    var CurrentRowBankData;
    
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
//      var CurrentRowBankData;
        
        var BanksDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceBanks /*, {async: true, id: 'id'} */));

        $('#btnAddBank').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditBank').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshBank').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelBank').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#BanksDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditBank').jqxButton({disabled: !(CurrentRowBankData != undefined)})
            $('#btnDelBank').jqxButton({disabled: !(CurrentRowBankData != undefined)})
        }
        
        $("#BanksGrid").on('rowselect', function (event) {
            CurrentRowBankData = $('#BanksGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowBankData != undefined) {
                
            }
                
            CheckButton();
        });
        
        $("#BanksGrid").on('rowdoubleclick', function(){
            $('#btnEditBank').click();
        });
        
        $("#BanksGrid").on('bindingcomplete', function(){
            if (CurrentRowBankData != undefined) 
                Aliton.SelectRowByIdVirtual('Bank_id', CurrentRowBankData.Bank_id, '#BanksGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Bank_id', null, '#BanksGrid', false);
        });
        
        $("#BanksGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: 'calc(100% - 2px)',
                source: BanksDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'bank_name', filtercondition: 'CONTAINS', width: 320},    
                    { text: 'Корсчет', datafield: 'cor_account', filtercondition: 'CONTAINS', width: 180},
                    { text: 'БИК', datafield: 'bik', filtercondition: 'CONTAINS', width: 120},
                    { text: 'Город', datafield: 'City', filtercondition: 'CONTAINS', width: 150},
                    { text: 'Отдел', datafield: 'Department', filtercondition: 'CONTAINS', width: 150},
                ]

        }));
        
        $('#btnAddBank').on('click', function(){
            $('#BanksDialog').jqxWindow({width: 600, height: 320, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Banks/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyBanksDialog").html(Res.html);
                    $('#BanksDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditBank').on('click', function(){
            if (CurrentRowBankData != undefined) {
                $('#BanksDialog').jqxWindow({width: 600, height: 320, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Banks/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Bank_id: CurrentRowBankData.Bank_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyBanksDialog").html(Res.html);
                        $('#BanksDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelBank').on('click', function(){
            if (CurrentRowBankData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Banks/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Bank_id: CurrentRowBankData.Bank_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#BanksGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#BanksGrid').jqxGrid('getcelltext', RowIndex + 1, "Bank_id");
                            Aliton.SelectRowById('Bank_id', Text, '#BanksGrid', true);
                            RowIndex = $('#BanksGrid').jqxGrid('getselectedrowindex');
                            var S = $('#BanksGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshBank').on('click', function(){
            $('#BanksGrid').jqxGrid('updatebounddata');
        });
        
        $('#BanksGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Банки'); ?>

<div class="al-row" style="height: calc(100% - 58px)">
    <div class="al-row-column" style="width: 100%">
        <div id="BanksGrid" class="jqxGridAliton"></div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddBank'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditBank'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshBank'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelBank'/></div>
    <div style="clear: both"></div>
</div>    

<div id="BanksDialog" style="display: none;">
    <div id="BanksDialogHeader">
        <span id="BanksHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogBanksContent">
        <div style="" id="BodyBanksDialog"></div>
    </div>
</div>