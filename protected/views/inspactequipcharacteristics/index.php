<script type="text/javascript">
    var CharacteristicObj = {
        Characteristic_id: 0,
    };
    $(document).ready(function () {
        var FirstStartCharacteristics = true;
        /* Текущая выбранная строка данных */
        var CurrentRowDataCharacteristic;
        var ActEquip_id = <?php echo json_encode($ActEquip_id); ?>;
        
        var InspActEquipCharacteristicsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInspActEquipCharacteristics), { 
            formatData: function (data) {
                        $.extend(data, {
                            Filters: ["c.ActEquip_id = " + ActEquip_id]
                        });
                        return data;
                    },
        });

        $('#btnAddInspActEquipCharacteristics').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditInspActEquipCharacteristics').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshInspActEquipCharacteristics').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelInspActEquipCharacteristics').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#InspActEquipCharacteristicsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        $('#btnCloseInspActEquipCharacteristics').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        var CheckButton = function() {
            $('#btnEditInspActEquipCharacteristics').jqxButton({disabled: !(CurrentRowDataCharacteristic != undefined)})
            $('#btnDelInspActEquipCharacteristics').jqxButton({disabled: !(CurrentRowDataCharacteristic != undefined)})
        }
        
        $("#InspActEquipCharacteristicsGrid").on('rowselect', function (event) {
            CurrentRowDataCharacteristic = $('#InspActEquipCharacteristicsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#InspActEquipCharacteristicsGrid").on('rowdoubleclick', function(){
            $('#btnEditInspActEquipCharacteristics').click();
        });
        
        $("#InspActEquipCharacteristicsGrid").on("bindingcomplete", function (event) {
            if (CharacteristicObj.Characteristic_id !== 0) {
                Aliton.SelectRowById('Characteristic_id', CharacteristicObj.Characteristic_id, '#InspActEquipCharacteristicsGrid', false);
                return;
            }

            if (CurrentRowDataCharacteristic != undefined) {
                Aliton.SelectRowById('Characteristic_id', CharacteristicObj.Characteristic_id, '#InspActEquipCharacteristicsGrid', false);
            }
            else {
                if (FirstStartCharacteristics) {
                    $('#InspActEquipCharacteristicsGrid').jqxGrid('selectrow', 0);
                    $('#InspActEquipCharacteristicsGrid').jqxGrid('ensurerowvisible', 0);
                    FirstStartCharacteristics = false;

                }
            }

            var DataInformation = $('#InspActEquipCharacteristicsGrid').jqxGrid('getdatainformation');
            if (DataInformation.rowscount == 0)
                CheckButton();
        });
        
        $("#InspActEquipCharacteristicsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: InspActEquipCharacteristicsDataAdapter,
                columns: [
                    { text: 'Характеристика', datafield: 'CharacteristicName', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnCloseInspActEquipCharacteristics').on('click', function(){
            if ($('#InspectionActDialog').length>0) {
                $('#InspectionActDialog').jqxWindow('close');
                $('#btnRefreshEquips').click();
            }
            
        });
        
        $('#btnAddInspActEquipCharacteristics').on('click', function(){
            $('#InspActEquipCharacteristicsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('InspActEquipCharacteristics/Create')) ?>,
                type: 'POST',
                data: {ActEquip_id: ActEquip_id},
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyInspActEquipCharacteristicsDialog").html(Res.html);
                    $('#InspActEquipCharacteristicsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditInspActEquipCharacteristics').on('click', function(){
            if (CurrentRowDataCharacteristic != undefined) {
                $('#InspActEquipCharacteristicsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('InspActEquipCharacteristics/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Characteristic_id: CurrentRowDataCharacteristic.Characteristic_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyInspActEquipCharacteristicsDialog").html(Res.html);
                        $('#InspActEquipCharacteristicsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelInspActEquipCharacteristics').on('click', function(){
            if (CurrentRowDataCharacteristic != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('InspActEquipCharacteristics/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Characteristic_id: CurrentRowDataCharacteristic.Characteristic_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#InspActEquipCharacteristicsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#InspActEquipCharacteristicsGrid').jqxGrid('getcelltext', RowIndex + 1, "Characteristic_id");
                            Aliton.SelectRowById('Characteristic_id', Text, '#InspActEquipCharacteristicsGrid', true);
                            RowIndex = $('#InspActEquipCharacteristicsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#InspActEquipCharacteristicsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshInspActEquipCharacteristics').on('click', function(){
            var RowIndex = $('#InspActEquipCharacteristicsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#InspActEquipCharacteristicsGrid').jqxGrid('getcellvalue', RowIndex, "Characteristic_id");
            Aliton.SelectRowById('Characteristic_id', Val, '#InspActEquipCharacteristicsGrid', true);
        });
        
        $('#InspActEquipCharacteristicsGrid').jqxGrid('selectrow', 0);
    });
</script>

<div class="row">
    <div id="InspActEquipCharacteristicsGrid" class="jqxGridAliton"></div>
</div>
<div class="row" style="margin: 0px; padding: 0px;">
    <div style="float: left">
        <div class="row">
            <div class="row-column"><input type="button" value="Добавить" id='btnAddInspActEquipCharacteristics'/></div>
            <div class="row-column"><input type="button" value="Изменить" id='btnEditInspActEquipCharacteristics'/></div>
        </div>
        <div class="row">
            <div class="row-column" style=""><input type="button" value="Удалить" id='btnDelInspActEquipCharacteristics'/></div>
            <div class="row-column"><input type="button" value="Обновить" id='btnRefreshInspActEquipCharacteristics'/></div>
        </div>
    </div>
    <div style="float: right">
        <div class="row-column" style=""><input type="button" value="Закрыть" id='btnCloseInspActEquipCharacteristics'/></div>
    </div> 
    
    
</div>    

<div id="InspActEquipCharacteristicsDialog" style="display: none;">
    <div id="InspActEquipCharacteristicsDialogHeader">
        <span id="InspActEquipCharacteristicsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogInspActEquipCharacteristicsContent">
        <div style="" id="BodyInspActEquipCharacteristicsDialog"></div>
    </div>
</div>

