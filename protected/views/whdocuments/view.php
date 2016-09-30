<script type="text/javascript">
    $(document).ready(function () {
        var WHDocuments = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Dctp_id: <?php echo json_encode($model->dctp_id); ?>,
            Number: <?php echo json_encode($model->number); ?>,
            WorkType: <?php echo json_encode($model->wrtp_name); ?>,
            Date: Aliton.DateConvertToJs('<?php echo $model->date; ?>'),
            Address: <?php echo json_encode($model->Address); ?>,
            Storage: <?php echo json_encode($model->storage); ?>,
            Supplier: <?php echo json_encode($model->splr_name); ?>,
            DocKind: <?php echo json_encode($model->dckn_name); ?>,
            Jrdc: <?php echo json_encode($model->JuridicalPerson); ?>,
            Notes: <?php echo json_encode($model->notes); ?>,
        };
        
        $('#edNote').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { height: 50, width: '100%', minLength: 1}));
        $("#edMsg").jqxInput($.extend(true, {}, InputDefaultSettings, {width: '100%'}));
        $("#btnEdit").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/4.png" }));
        $("#btnOperation").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { autoOpen: true, width: 140, height: 28 }));
        $('#jqxTreeOperation').on('select', function (event) {
                var args = event.args;
                var item = $('#jqxTreeOperation').jqxTree('getItem', args.element);
            });
        $("#jqxTreeOperation").jqxTree({ width: 280});
        $("#btnOperation").jqxDropDownButton('setContent', '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 5px;">Выберите</div>');
        $("#btnPrintClient").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, disabled: false, imgSrc: "/images/5.png" }));
        $("#btnPrint").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/5.png" }));
        $("#edQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edUsedQuant").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#btnReserv").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, width: 150}));
        $("#edReserv").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edReady").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edMinReserv").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        $("#edPurchase").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px'}));
        
        $("#btnAddDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/6.png"}));
        $("#btnEditDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/4.png"}));
        $("#btnRefreshDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
        $("#btnHistoryDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
        $("#btnInfoDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false}));
        $("#btnDelDetails").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/7.png"}));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        DataEmployees.dataBind();
        $("#edStoreman").jqxComboBox({ source: DataEmployees.records, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#edMaster").jqxComboBox({ source: DataEmployees.records, width: '300', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"});
        $("#btnAction").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, imgSrc: "/images/8.png", width: 130}));
        $("#btnPurchase").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false, width: 180}));
        var CurrentRowDetails;
        
        var DataDetails = new $.jqx.dataAdapter($.extend(true, {}, Sources.DocmAchsDetailsSource), {
            formatData: function (data) {
                        $.extend(data, {
                            Filters: ["d.Docm_id = " + WHDocuments.Docm_id],
                        });
                        return data;
                    },
        });
        
        
        $("#GridDetails").on('rowselect', function (event) {
            CurrentRowDetails = $('#GridDetails').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowDetails != undefined) {
//                $("#edNotes1").jqxTextArea('val', GetNotes(CurrentRowDetails.docm_id));
//                $('#btnInfo').jqxButton({disabled: false});
            }

//            $('#btnRefresh').jqxButton({disabled: false});
        });
                    
        $("#GridDetails").on("bindingcomplete", function (event) {
            $("#GridDetails").jqxGrid('selectrow', 0);
        });
                    
        $("#GridDetails").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 200,
                width: '100%',
                source: DataDetails,
                showstatusbar: true,
                statusbarheight: 29,
                showaggregates: true,
                showfilterrow: false,
                autoshowfiltericon: true,
                pagesize: 200,
                virtualmode: false,
                columns:
                    [
                        { text: 'Оборудование', datafield: 'EquipName', width: 200 },
                        { text: 'Ед. изм.', datafield: 'NameUnitMeasurement', width: 80 },
                        { text: 'Кол-во', datafield: 'docm_quant', width: 120, cellsformat: 'f2' },
                        { text: 'Факт кол-во', datafield: 'fact_quant', width: 120, cellsformat: 'f2' },
                        { text: 'Цена', datafield: 'price', width: 120, cellsformat: 'f2' },
                        { text: 'Сумма', datafield: 'sum', width: 180, cellsformat: 'f2', aggregates: [{ 'Сумма':
                            function (aggregatedValue, currentValue) {
                                return aggregatedValue + currentValue;
                            }
                          }]
                        },
                        { text: 'Б\\У', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'used', width: 50 },
                        { text: 'В производство', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'ToProduction', width: 100 },
                        { text: 'Серийные номера', datafield: 'SN', width: 150 },
                        { text: 'Без прайса', filtertype: 'checkbox', columntype: 'checkbox', datafield: 'no_price_list', width: 100 },
                    ],
                }));
                    
        
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#edWorkType1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200}));
                    $("#edStorage1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 200}));
                    $("#edSupplier1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 400}));
                    $("#edDocKind1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 400}));
                    $("#edNumber1").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 150}));
                    $("#edDate1").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy', value: WHDocuments.Date, readonly: true, showCalendarButton: false, allowKeyboardDelete: false}));
                    $("#edJrdc1").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 356}));
                    
                    if (WHDocuments.WorkType != '') $("#edWorkType1").jqxInput('val', WHDocuments.WorkType);
                    if (WHDocuments.Storage != '') $("#edStorage1").jqxInput('val', WHDocuments.Storage);
                    if (WHDocuments.Supplier != '') $("#edSupplier1").jqxInput('val', WHDocuments.Supplier);
                    if (WHDocuments.DocKind != '') $("#edDocKind1").jqxInput('val', WHDocuments.DocKind);
                    if (WHDocuments.Number != '') $("#edNumber1").jqxInput('val', WHDocuments.Number);
                    if (WHDocuments.Jrdc != '') $("#edJrdc1").jqxInput('val', WHDocuments.Jrdc);
                break;
            };
        };
        
        var DefaultTabIndex;
        switch(parseInt(WHDocuments.Dctp_id)) {
            case 1: DefaultTabIndex = 0; break;
        }
        
        $('#edTabs').jqxTabs({ width: '100%', height: 250, initTabContent: initWidgets, selectedItem: DefaultTabIndex });
        
        if (WHDocuments.Notes != '') $("#edNote").jqxTextArea('val', WHDocuments.Notes);       
        
        
    });
</script>    


<style>
    .row {
        margin-top: 0px;
    }
</style>


<?php
    $this->breadcrumbs=array(
            'Главная'=>array('/Site/index'),
            'Реестр документов'=>array('index'),
            'Документ'=>array('view'),
    );
?>

<div id='edTabs' style="margin-top: 5px;">
    <ul>
        <li style="margin-left: 20px;">
            <div style="height: 20px; margin-top: 5px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладная на приход</div>
                
            </div>
        </li>
    </ul>
    <div style="overflow: hidden;">
        <div style="padding: 10px;">
            <div class="row">
                <div class="row-column" style="width: 100px">Вид работ</div>
                <div class="row-column"><input type="text" id="edWorkType1" readonly="readonly" /></div>
                <div class="row-column">Склад</div>
                <div class="row-column"><input type="text" id="edStorage1" readonly="readonly" /></div>
            </div>  
            <div class="row">
                <div class="row-column" style="width: 100px">Поставшик</div>
                <div class="row-column"><input type="text" id="edSupplier1" readonly="readonly" /></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Поставшик</div>
                <div class="row-column"><input type="text" id="edDocKind1" readonly="readonly" /></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Номер</div>
                <div class="row-column"><input type="text" id="edNumber1" readonly="readonly" /></div>
                <div class="row-column">Дата</div>
                <div class="row-column"><div id="edDate1"></div></div>
            </div>
            <div class="row">
                <div class="row-column" style="width: 100px">Юр. лицо</div>
                <div class="row-column"><input type="text" id="edJrdc1" readonly="readonly" /></div>
            </div>
        </div>
    </div>
</div>
<div class="row" style="padding: 0px 2px 3px 0px">
    <div>Примечание</div>    
    <div><textarea id="edNote" ></textarea></div>
    <div style="padding-right: 6px;"><input type="text" id="edMsg" /></div>
</div>
<div class="row" style="padding: 0px 2px 3px 0px; margin-top: 3px;">
    <div class="row-column"><input type="button" value="Изменить" id='btnEdit' /></div>
    <div class="row-column">
        <div style='float: left;' id="btnOperation">
            <div style="border: none;" id='jqxTreeOperation'>
                <ul>
                    <li><div style="width: 230px; height: 20px;">Просмотреть заявку</div></li>
                    <li><div style="width: 230px; height: 20px;">Просмотреть заявку на ремонт</div></li>
                    <li><div style="width: 230px; height: 20px;">Создать заявку на доставку</div></li>
                </ul>
            </div>
        </div>
    </div>
    <div style="float: right">
        <div class="row-column"><input type="button" value="Для заказчика" id='btnPrintClient' /></div>
        <div class="row-column" style="margin-right: 0px;"><input type="button" value="Печать" id='btnPrint' /></div>
    </div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div id="GridDetails"></div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div class="row-column">В наличие на складе: новое:</div>
    <div class="row-column"><div id="edQuant" readonly="readonly"></div></div>
    <div class="row-column">Б\У:</div>
    <div class="row-column"><div id="edUsedQuant" readonly="readonly"></div></div>
    <div class="row-column"><input type="button" value="Зарезервировано" id='btnReserv' /></div>
    <div class="row-column"><div id="edReserv" readonly="readonly"></div></div>
    <div class="row-column">Готово к выдаче:</div>
    <div class="row-column"><div id="edReady" readonly="readonly"></div></div>
    <div class="row-column">Мин. резерв:</div>
    <div class="row-column"><div id="edMinReserv" readonly="readonly"></div></div>
    <div class="row-column">Закупить:</div>
    <div class="row-column"><div id="edPurchase" readonly="readonly"></div></div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddDetails' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditDetails' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshDetails' /></div>
    <div class="row-column"><input type="button" value="История оборудования" id='btnHistoryDetails' /></div>
    <div class="row-column"><input type="button" value="Наличие" id='btnInfoDetails' /></div>
    <div class="row-column" style="float: right"><input type="button" value="Удалить" id='btnDelDetails' /></div>
</div>
<div class="row" style="padding: 6px 2px 3px 0px">
    <div class="row-column">
        <div>
            <div class="row-column" style="width: 100px;">Кладовщик</div>
            <div class="row-column"><div id="edStoreman"></div></div>
        </div>
        <div style="clear: both"></div>
        <div style="margin-top: 6px">
            <div class="row-column" style="width: 100px;">Мастер</div>
            <div class="row-column"><div id="edMaster"></div></div>    
        </div>
    </div>
    <div class="row-column">
        <div class="row-column"><input type="button" value="Подтвердить" id='btnAction' /></div>
        <div class="row-column"><input type="button" value="Требуется закупка" id='btnPurchase' /></div>
    </div>
</div>    