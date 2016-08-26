<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var MonitoringDemands = {
            mndm_id: '14385',
        };
        
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataPriors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandPriors, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["dp.for_md = 1"],
                });
                return data;
            },
        });
        
        $("#Master").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 225, placeHolder: "Выберите мастера" }));
        $("#notAcceptedDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        $("#unfulfilledDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, {}));
        
        $("#PeriodDemands").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, {}));
        $("#BeginDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102 }));
        $("#EndDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102 }));
        $("#LastDemands").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, {}));
        $("#DemandsCount").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 60, symbolPosition: 'right', min: 0, decimalDigits: 0, value: 200, spinButtons: true }));
        $("#unlimited").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, {}));
        
        $("#Number").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#Date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 102 }));
        $("#Prior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, displayMember: "DemandPrior", valueMember: "DemandPrior_id", width: 220, autoDropDownHeight: true }));
        $("#btnSearch").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $('#jqxTabsMonitoringDemands').jqxTabs({ width: '99%', height: 360 });
        
//        var MonitoringDemandsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemands, {}));
        var MonitoringDemandsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemands, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["m.mndm_id = " + MonitoringDemands.mndm_id],
                });
                return data;
            },
        });
            
        $("#MonitoringDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '300',
                source: MonitoringDemandsDataAdapter,
                columns: [
                    { text: 'Номер', dataField: 'mndm_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                    { text: 'Дата', dataField: 'Date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Подал', dataField: 'UserName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 170 },
                    { text: 'Приоритет', dataField: 'DemandPrior', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Дата принятия', dataField: 'DateAccept', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Принял', dataField: 'EmplAccept', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Дата выполнения', dataField: 'DateExec', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Просрочка', dataField: 'OverDays', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 80 },
                ]
            })
        );

        
        var MonitoringDemandDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemandDetails, {}));
//        var MonitoringDemandDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemandDetails, {}), {
//            formatData: function (data) {
//                $.extend(data, {
//                    Filters: ["m.mndm_id = " + MonitoringDemandDetails.mndm_id],
//                });
//                return data;
//            },
//        });
            
        $("#MonitoringDemandDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99%',
                height: '300',
                source: MonitoringDemandDetailsDataAdapter,
                columns: [
                    { text: 'Наименование', dataField: 'EquipName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Ед.изм.', dataField: 'NameUnitMeasurement', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Цена', dataField: 'Price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Описание', dataField: 'Note', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                ]
            })
        );


        
        $("#Description").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 700 }));
        
        
        $("#MonitoringDemandsGrid").on('rowselect', function (event) {
            var Temp = $('#MonitoringDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
            console.log(CurrentRowData.Description);
            if (CurrentRowData.Description != '') $("#Description").jqxTextArea('val', CurrentRowData.Description);
        });
        
        
        $('#EditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '330px', width: '640'}));
        
        $('#EditDialog').jqxWindow({initContent: function() {
            $("#btnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#btnCancel").on('click', function () {
            $('#EditDialog').jqxWindow('close');
        });
        
        var SendForm = function() {
            var Data = $('#MonitoringDemands').serialize();
                
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialog').jqxWindow('close');
                        $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                        $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                    } else {
                        $('#BodyDialog').html(Res);
                    }

                }
            });
        };

        $("#btnOk").on('click', function () {
            SendForm();
        });
            
        
        $("#NewMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#MoreInfoMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
        $("#DelMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        
        var LoadFormInsert = function() {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Insert');?>",
                type: 'POST',
                async: false,
                data: {},
                success: function(Res) {
                    $('#BodyDialog').html(Res);
                }
            });
        };
        
        $('#MonitoringDemandsGrid').on('rowdoubleclick', function () { 
            $("#MoreInfoMonitoringDemands").click();
        });
        
        
        $("#NewMonitoringDemands").on('click', function () 
        {
            LoadFormInsert();
            $('#EditDialog').jqxWindow('open');
        });
        
        $("#MoreInfoMonitoringDemands").on('click', function ()
        {
            window.open('/index.php?r=MonitoringDemands/Index&mndm_id=' + CurrentRowData.mndm_id);
        });
           
        $("#DelMonitoringDemands").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=MonitoringDemands/Delete",
                data: { mndm_id: CurrentRowData.mndm_id },
                success: function(){
                    $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                    $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
        
        
        
        $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
        
    });
    
        
</script>


<div class="row">
    <div class="row-column">
        <div><div id="Master" name="MonitoringDemands[Master]"></div></div>
        <div class="row" style="padding: 0 10px 10px 10px; border: 1px solid #ddd; background-color: #eee;">
            <div class="row" style="margin: 0;"><div class="row-column" style="margin: 0 0 5px 0;">Показывать только:</div></div>
            <div class="row" style="margin: 0;"><div class="row-column"><div id='notAcceptedDemands' name="MonitoringDemands[notAcceptedDemands]" ></div></div><div class="row-column" style="margin-top: 3px;">Непринятые заявки </div></div>
            <div class="row" style="margin: 0;"><div class="row-column"><div id='unfulfilledDemands' name="MonitoringDemands[unfulfilledDemands]" ></div></div><div class="row-column" style="margin-top: 3px;">Невыполненные заявки</div></div>
        </div>
    </div>
    <div class="row-column" style="padding: 0 10px 10px 10px; border: 1px solid #ddd; background-color: #eee;">
        <div class="row" style="margin: 0; padding: 0;"><div class="row-column" style="margin: 0 0 5px 0;">Отбор по параметрам:</div></div>
        <div class="row">
            <div class="row-column" style="text-align: center;">Номер <div id="Number" name="MonitoringDemands[Number]"></div></div>
            <div class="row-column" style="text-align: center;">Дата <div id="Date" name="MonitoringDemands[Date]"></div></div>
            <div class="row-column" style="text-align: center;">Приоритет <div id="Prior" name="MonitoringDemands[Prior]"></div></div>
        </div>
        <div class="row" style="float: right; margin-right: 10px;"><input type="button" value="Найти" id='btnSearch' /></div>
    </div>
</div>
<div class="row" style="margin-bottom: 10px;">
    <div class="row-column" style="padding: 0 10px 10px 10px; border: 1px solid #ddd; background-color: #eee;">
        <div class="row" style="margin: 0; padding: 0;"><div class="row-column" style="margin: 0 0 5px 0;">Выберите период за который будут отображены заявки:</div></div>
        <div class="row" style="margin: 0;">
            <div class="row-column"><div id='PeriodDemands' name="MonitoringDemands[PeriodDemands]" ></div></div><div class="row-column">За период </div>
            <div class="row-column">с </div><div class="row-column"><div id='BeginDate' name="MonitoringDemands[BeginDate]" ></div></div>
            <div class="row-column">по </div><div class="row-column"><div id='EndDate' name="MonitoringDemands[EndDate]" ></div></div>
            <div class="row-column" style="margin-left: 25px;"><div id='LastDemands' name="MonitoringDemands[LastDemands]" ></div></div><div class="row-column">Последние </div>
            <div class="row-column"><div id="DemandsCount" name="MonitoringDemands[DemandsCount]"></div></div>
            <div class="row-column" style="margin-left: 25px;"><div id='unlimited' name="MonitoringDemands[unlimited]" ></div></div><div class="row-column">Неограниченно </div>
        </div>
    </div>
</div>


<div id='jqxTabsMonitoringDemands'>
    <ul>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Реестр заявок на мониторинг
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Позиции мониторинга
                </div>
            </div>
        </li>
    </ul>


    <div id='' style="overflow: hidden; margin-left: 10px; width: 100%; height: 100%">
        <div class="row">
            <div id="MonitoringDemandsGrid" class="jqxGridAliton"></div>
        </div>
    </div>


    <div id='' style="overflow: hidden; margin-left: 10px; width: 100%; height: 100%">
        <div class="row">
            <div id="MonitoringDemandDetailsGrid" class="jqxGridAliton"></div>
        </div>
    </div>

</div>


<div class="row"><div class="row-column">Примечание: <textarea type="text" id="Description" name="MonitoringDemands[Description]"></textarea></div></div>

<div class="row">
    <div class="row-column"><input type="button" value="Дополнительно" id='MoreInfoMonitoringDemands' /></div>
    <div class="row-column"><input type="button" value="Создать" id='NewMonitoringDemands' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelMonitoringDemands' /></div>
</div>



<div id="EditDialog">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContent">
        <div id="BodyDialog"></div>
        <div id="BottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancel' /></div>
            </div>
        </div>
    </div>
</div>