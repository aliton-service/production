<script type="text/javascript">
    $(document).ready(function(){
        var DeliveryDemand = {};
        
        // Инициализация источников данных
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        DataEmployees.dataBind();
        var EmployeesRecords = DataEmployees.records;
        var DataStreets = new $.jqx.dataAdapter(Sources.SourceStreets);
        
        var DeliveryDemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.DeliveryDemandsSource, {
            filter: function () {
                $("#DeliveryDemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#DeliveryDemandsGrid").jqxGrid('updatebounddata', 'sort');
            }
        }));
        
        $("#cmbExecutor").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: 'Выберите исполнителя', source: EmployeesRecords, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edNoAccept").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 200}));
        $("#edNoExec").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 200}));
        $("#edExec").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {width: 200}));
        $("#edNumber").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: '120px', height: '25px', decimalDigits: 0 }));
        $("#edDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null}));
        $("#edDeliveryMan").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { placeHolder: 'Выберите курьера', source: EmployeesRecords, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
        $("#edStreet").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataStreets, width: '290', height: '25px', displayMember: "StreetName", valueMember: "Street_id"}));
        $("#edHouse").jqxInput($.extend(true, {}, InputDefaultSettings, {placeHolder: "", width: 100}));
        
        $("#DeliveryDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 300,
                width: '100%',
                showfilterrow: true,
                autoshowfiltericon: true,
                source: DeliveryDemandsAdapter,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize:200,
                virtualmode: true,
                columns:
                    [
                        { text: 'Номер', datafield: 'dldm_id', width: 60 },
                        { text: 'Вид доставок', columntype: 'textbox', filtercondition: 'CONTAINS', datafield: 'DeliveryType', width: 100 },
                        { text: 'Дата', filtertype: 'date', datafield: 'date', filtercondition: 'DATE_EQUAL', cellsformat: 'dd.MM.yyyy HH:mm', width: 130 },
                        { text: 'Мастер', datafield: 'MasterName', filterable: false, width: 150 },
                        { text: 'Подал', datafield: 'user_sender_name', width: 150 },
                        { text: 'Приоритет', datafield: 'DemandPrior', width: 100 },
                        { text: 'Предельная дата', datafield: 'deadline', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Желаемая дата', datafield: 'bestdate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Адрес', datafield: 'Addr', width: 260 },
                        { text: 'Принял', datafield: 'user_logist_name', width: 150 },
                        { text: 'Дата принятия', datafield: 'date_logist', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'План. дата', datafield: 'plandate', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Дата вып.', datafield: 'date_delivery', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Просрочено', datafield: 'overday', width: 100 },
                        { text: 'Обещанная дата', datafield: 'date_promise', width: 130, cellsformat: 'dd.MM.yyyy HH:mm' },
                        { text: 'Заявка', datafield: 'dmnd_id', width: 100 },
                        { text: 'Курьер', datafield: 'DeliveryMan', width: 150 },
                    ],
                }));
    });
</script>    

<?php $this->setPageTitle('Заявки на доставку') ?>

<div class="row">
    <div class="row-column">
        <div class="row" style="padding: 0px; margin: 0px;">
            <div class="row-column">
                <div class="row" style="padding: 0px; margin: 0px;">
                    <div class="row-column"><div id='cmbExecutor'></div></div>
                </div>
                <div class="row" style="border: 1px solid #e0e0e0;">
                    <div class="row-column">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id='edNoAccept'>Непринятые заявки</div></div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id='edNoExec'>Невыполненные заявки</div></div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id='edExec'>Выполненные заявки</div></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row-column" style="border: 1px solid #e0e0e0; height: 118px">
                <div class="row" style="margin: 0px;">
                    <div class="row-column" style="">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;">Номер</div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id="edNumber"></div></div>
                        </div>
                    </div>
                    <div class="row-column" style="">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;">Дата</div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id="edDate"></div></div>
                        </div>
                    </div>
                    <div class="row-column" style="">
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;">Курьер</div>
                        </div>
                        <div class="row" style="padding: 0px; margin: 0px;">
                            <div class="row-column" style="padding: 0px; margin: 0px;"><div id="edDeliveryMan"></div></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="row-column" style="">Улица</div>
                    <div class="row-column" style=""><div id="edStreet"></div></div>
                    <div class="row-column" style="">Дом</div>
                    <div class="row-column" style=""><input id="edHouse" type="text" /></div>
                </div>
            </div>
        </div>
    </div>
</div>    
<div class="row">
    <div id="DeliveryDemandsGrid" class="jqxGridAliton"></div>
</div>
