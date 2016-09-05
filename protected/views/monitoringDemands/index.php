<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
        var DataPriors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDemandPriors, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["dp.for_md = 1"],
                });
                return data;
            },
        });
        
        $("#Master").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id", width: 200, placeHolder: "Выберите мастера" }));
        $("#notAcceptedDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 170, height: 30 }));
        $("#unfulfilledDemands").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 180, height: 30 }));
        
        $("#BeginDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#EndDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
//        $("#LastDemands").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, { checked:true }));
//        $("#DemandsCount").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 60, symbolPosition: 'right', min: 0, decimalDigits: 0, value: 200, spinButtons: true }));
//        $("#unlimited").jqxRadioButton($.extend(true, {}, RadioButtonDefaultSettings, {}));
        
        $("#Number").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, { width: 80, symbolPosition: 'right', min: 0, decimalDigits: 0 }));
        $("#Date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 110, formatString: 'dd.MM.yyyy', value: null }));
        $("#Prior").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataPriors, displayMember: "DemandPrior", valueMember: "DemandPrior_id", width: 220, autoDropDownHeight: true }));
        $("#btnReset").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180 }));
        
        $("#Number").jqxNumberInput('val', null);
        
        
        
        $('#jqxTabsMonitoringDemands').jqxTabs({ width: '100%', height: 490 });
        
//        var filtergroup = new $.jqx.filter();
//        var filtervalue = 10; // Each cell value is compared with the filter's value.
//        // filtertype - numericfilter, stringfilter, datefilter or booelanfilter. 
//        // condition
//        // possible conditions for string filter: 'EMPTY', 'NOT_EMPTY', 'CONTAINS', 'CONTAINS_CASE_SENSITIVE',
//        // 'DOES_NOT_CONTAIN', 'DOES_NOT_CONTAIN_CASE_SENSITIVE', 'STARTS_WITH', 'STARTS_WITH_CASE_SENSITIVE',
//        // 'ENDS_WITH', 'ENDS_WITH_CASE_SENSITIVE', 'EQUAL', 'EQUAL_CASE_SENSITIVE', 'NULL', 'NOT_NULL'
//        // possible conditions for numeric filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL'
//        
//        // possible conditions for date filter: 'EQUAL', 'NOT_EQUAL', 'LESS_THAN', 'LESS_THAN_OR_EQUAL', 'GREATER_THAN', 'GREATER_THAN_OR_EQUAL', 'NULL', 'NOT_NULL'                         
//        var filter = filtergroup.createfilter(filtertype, filtervalue, condition);
//        var filter2 = filtergroup.createfilter(filtertype, filtervalue2, condition2);
//        // To create a custom filter, you need to call the createfilter function and pass a custom callback function as a fourth parameter.
//        // If the callback's name is 'customfilter', the Grid will pass 3 params to this function - filter's value, current cell value to evaluate and the condition.                        
//        // operator - 0 for "and" and 1 for "or"
//        filtergroup.addfilter(operator, filter);
//        filtergroup.addfilter(operator, filter2);
//        // datafield is the bound field.
//        // adds a filter to the grid.
//        $('#grid').jqxGrid('addfilter', datafield, filtergroup);
//        // to add and apply the filter, use this:
//        $('#jqxGrid').jqxGrid('addfilter', datafield, filtergroup, true);
        
        
        
        var addfilter = function (args = [], dataField, filtertype, filter_or_operator)
        {                
                var filtergroup = new $.jqx.filter();
                
                var newFilter;
                
                for(var i = 0; i < args.length; i++)
                {
//                    console.log(args[i].value);
                    if(args[i].value !== 0 && args[i].value !== ''){

                        newFilter = filtergroup.createfilter(filtertype, args[i].value, args[i].filtercondition);
                        filtergroup.addfilter(filter_or_operator, newFilter);
                    }
                }

                $("#MonitoringDemandsGrid").jqxGrid('addfilter', dataField, filtergroup);
                
            $("#MonitoringDemandsGrid").jqxGrid('applyfilters');
            
        }
        
        $('#Number').on('valueChanged', function () {
            var numberVal = $("#Number").val();
            var args = [
                { value: numberVal, filtercondition: 'CONTAINS' },
            ];
            addfilter(args, 'mndm_id', 'stringfilter', 0);
        });
        
                
        var changeDateFormat = function (strDate = '') {
            if(strDate !== '') {
                var newDateVal = strDate[3] + strDate[4] + '.' + strDate[0] + strDate[1] + '.'+ strDate[6] + strDate[7] + strDate[8] + strDate[9];
                return newDateVal;
            } else {
                return strDate;
            }
        };
        
        
        $('#Date').on('valueChanged', function () {
            var dateVal = $("#Date").val();
            var newDateVal = changeDateFormat(dateVal);
            
            var args = [
                { value: newDateVal, filtercondition: 'EQUAL' },
            ];
            addfilter(args, 'Date', 'datefilter', 0);
        });
        
        
        var getFieldsVal = function () {
            var beginDateVal = $("#BeginDate").val();
            var newBeginDateVal = changeDateFormat(beginDateVal);
            
            var endDateVal = $("#EndDate").val();
            var newEndDateVal = changeDateFormat(endDateVal);
            
            var args = [
                { value: newBeginDateVal, filtercondition: 'GREATER_THAN_OR_EQUAL' },
                { value: newEndDateVal, filtercondition: 'LESS_THAN_OR_EQUAL' },
            ];
            addfilter(args, 'Date', 'datefilter', 0);
        };
        
        $('#BeginDate').on('valueChanged', function () {
            getFieldsVal();
        });
        
        
        $('#EndDate').on('valueChanged', function () {
            getFieldsVal();
        });
        
        
        $('#Prior').on('select', function () {
            var priorVal = $("#Prior").val();
            var args = [
                { value: priorVal, filtercondition: 'EQUAL' },
            ];
            addfilter(args, 'Prior', 'numericfilter', 0);
        });
        
        
        $('#Master').on('select', function () {
            var masterVal = $("#Master").val();
            var args = [
                { value: masterVal, filtercondition: 'EQUAL' },
            ];
            addfilter(args, 'prtp_id', 'numericfilter', 0);
        });
        
        
        
        
        $('#notAcceptedDemands').on('checked', function () { 
            var args = [
                { value: null, filtercondition: 'EMPTY' },
            ];
            addfilter(args, 'DateAccept', 'stringfilter', 0);
        });
        
        $('#notAcceptedDemands').on('unchecked', function () { 
            var args = [
                { value: null, filtercondition: 'EMPTY' },
                { value: null, filtercondition: 'NOT_EMPTY' },
            ];
            addfilter(args, 'DateAccept', 'stringfilter', 1);
        });
        
        
        
        $('#unfulfilledDemands').on('checked', function () { 
            var args = [
                { value: null, filtercondition: 'EMPTY' },
            ];
            addfilter(args, 'DateExec', 'stringfilter', 0);
        });
        
        $('#unfulfilledDemands').on('unchecked', function () { 
            var args = [
                { value: null, filtercondition: 'EMPTY' },
                { value: null, filtercondition: 'NOT_EMPTY' },
            ];
            addfilter(args, 'DateExec', 'stringfilter', 1);
        });
        
       
        
        
        
        $('#btnReset').on('click', function () { 
            $('#MonitoringDemandsGrid').jqxGrid('clearfilters');
            $("#Number").jqxNumberInput('val', null);
            $("#Date").jqxDateTimeInput('val', null);
            $("#BeginDate").jqxDateTimeInput('val', null);
            $("#EndDate").jqxDateTimeInput('val', null);
            $("#Prior").jqxComboBox('clearSelection');
            $('#notAcceptedDemands').jqxCheckBox('uncheck');
            $('#unfulfilledDemands').jqxCheckBox('uncheck');
        });
        
        
        
        $("#btnPrint").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#btnAcceptEmployeeName").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $("#btnCancelAcceptance").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));
        
        $("#Description").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 1045, height: 55 }));
        
        
        
        var MonitoringDemandsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemands));
        
        
        $("#MonitoringDemandsGrid").on('bindingComplete', function(){
            $('#MonitoringDemandsGrid').jqxGrid('hidecolumn', 'Prior');
            var index = $('#MonitoringDemandsGrid').jqxGrid('getrowboundindex', 0);
            $('#MonitoringDemandsGrid').jqxGrid('selectrow', index);
        });
                    
        $("#MonitoringDemandsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                filterable: true,
                width: '99.8%',
                height: '440',
                source: MonitoringDemandsDataAdapter,
                columns: [
                    { text: 'Номер', dataField: 'mndm_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                    { text: 'Дата', dataField: 'Date', filtertype: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Подал', dataField: 'UserName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 170 },
                    { text: 'Prior', dataField: 'Prior', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 50 },
                    { text: 'Приоритет', dataField: 'DemandPrior', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Дата принятия', dataField: 'DateAccept', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Принял', dataField: 'EmplNameAccept', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Дата выполнения', dataField: 'DateExec', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Просрочка', dataField: 'OverDays', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 80 },
                ]
            })
        );
        
//        $('#MonitoringDemandsGrid').jqxGrid('hidecolumn', 'Prior');
        
        
        
        $("#MonitoringDemandsGrid").on('rowselect', function (event) {
            var Temp = $('#MonitoringDemandsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
            
//            console.log(CurrentRowData);
            if (CurrentRowData !== null && CurrentRowData.Description !== null) {
                $("#Description").jqxTextArea('val', CurrentRowData.Description);
            } else {
                $("#Description").jqxTextArea('val', '');
            }
            
            var args = event.args;
            var rowBoundIndex = args.rowindex;
            var pagesize = getPageSize();
            $('#rowNum').html('Запись ' + (rowBoundIndex + 1) + ' из ' + pagesize);
            
            var MonitoringDemandDetailsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceMonitoringDemandDetails, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["m.mndm_id = " + CurrentRowData.mndm_id],
                    });
                    return data;
                },
            });
            
            MonitoringDemandDetailsDataAdapter.dataBind();
            $("#MonitoringDemandDetailsGrid").jqxGrid({source: MonitoringDemandDetailsDataAdapter});

            
            if(CurrentRowData.EmplNameAccept !== null) { 
                $('#btnAcceptEmployeeName').jqxButton({disabled: true }); 
                if(CurrentRowData.DateExec == null) {
                    $('#btnCancelAcceptance').jqxButton({disabled: false });
                } else if (CurrentRowData.DateExec !== null) {
                    $('#btnCancelAcceptance').jqxButton({disabled: true });
                }
            }
            if(CurrentRowData.EmplNameAccept === null) { 
                $('#btnAcceptEmployeeName').jqxButton({disabled: false });
                $('#btnCancelAcceptance').jqxButton({disabled: true }); 
            }


            $("#btnAcceptEmployeeName").on('click', function () {                
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('MonitoringDemands/Accept');?>",
                    type: 'POST',
                    async: false,
                    data: { mndm_id: CurrentRowData.mndm_id },
                    success: function(Res) {
                        console.log(Res);
                        $('#btnAcceptEmployeeName').jqxButton({disabled: true });
                        $('#btnCancelAcceptance').jqxButton({disabled: false });
//                        $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
//                        $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                        location.reload();
                    }
                });
            });

            $("#btnCancelAcceptance").on('click', function () {                
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('MonitoringDemands/CancelAcceptance');?>",
                    type: 'POST',
                    async: false,
                    data: { mndm_id: CurrentRowData.mndm_id },
                    success: function(Res) {
                        console.log(Res);
                        $('#btnAcceptEmployeeName').jqxButton({disabled: false });
                        $('#btnCancelAcceptance').jqxButton({disabled: true });
//                        $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
//                        $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                        location.reload();
                    }
                });
            });
        });
        
        
        
        $("#btnStart").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 80 }));
        $("#btnPrevious").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 80 }));
        $("#btnNext").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 80 }));
        $("#btnEnd").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 80 }));
        
        var getPageSize = function () {
            var paginginformation = $('#MonitoringDemandsGrid').jqxGrid('getpaginginformation');
            var pagesize = paginginformation.pagesize;
            return pagesize;
        };
        
        $('#rowNum').html('Запись 1 из ' + getPageSize());
        
        $('#btnStart').on('click', function () { 
            $('#MonitoringDemandsGrid').jqxGrid('selectrow', 0);
            var pagesize = getPageSize();
            $('#rowNum').html('Запись 1 из ' + pagesize);
//            $('#btnPrevious').jqxButton({disabled: true });
//            $('#btnStart').jqxButton({disabled: true });
        });
        
        $('#btnPrevious').on('click', function () { 
            var rowindex = $('#MonitoringDemandsGrid').jqxGrid('getselectedrowindex');
            if(rowindex > 0) {
                $('#MonitoringDemandsGrid').jqxGrid('selectrow', rowindex - 1);
                var pagesize = getPageSize();
                $('#rowNum').html('Запись ' + (rowindex) + ' из ' + pagesize);
            } else {
//                $('#btnPrevious').jqxButton({disabled: true });
//                $('#btnStart').jqxButton({disabled: true });
            }
        });
        
        $('#btnNext').on('click', function () { 
            var rowindex = $('#MonitoringDemandsGrid').jqxGrid('getselectedrowindex');
            $('#MonitoringDemandsGrid').jqxGrid('selectrow', rowindex + 1);
            var pagesize = getPageSize();
            $('#rowNum').html('Запись ' + (rowindex + 2) + ' из ' + pagesize);
//            $('#btnPrevious').jqxButton({disabled: false });
//            $('#btnStart').jqxButton({disabled: false });
        });
        
        $('#btnEnd').on('click', function () {
            var pagesize = getPageSize();
            $('#rowNum').html('Запись ' + (pagesize - 2) + ' из ' + pagesize);
            $('#MonitoringDemandsGrid').jqxGrid('selectrow', pagesize - 1);
//            $('#btnPrevious').jqxButton({disabled: false });
//            $('#btnStart').jqxButton({disabled: false });
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
        $("#ReloadMonitoringDemands").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        
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
        
        $("#ReloadMonitoringDemands").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=MonitoringDemands/Index",
                success: function(){
                    $("#MonitoringDemandsGrid").jqxGrid('updatebounddata');
                    $("#MonitoringDemandsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
        
                            
        $("#MonitoringDemandDetailsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: '99.8%',
                height: '440',
                columns: [
                    { text: 'Наименование', dataField: 'EquipName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Ед.изм.', dataField: 'NameUnitMeasurement', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Цена', dataField: 'price', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Описание', dataField: 'Note', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                ]
            })
        );
    
        
        
        
        $('#MonitoringDemandsGrid').jqxGrid('selectrow', 0);
        
        
    });
    
        
</script>

<?php $this->setPageTitle('Заявки на мониторинг'); ?>

<div class="row" style="margin: 5px 0 10px 0; padding: 0;">
    <div class="row-column">
        <div class="row" style="margin: 0; padding: 0 10px 5px 10px; border: 1px solid #ddd; background-color: #eee;">
            <div class="row-column" style="margin: 0;"><div id="Master" style="margin: 5px 0 0 0;"></div></div>
        </div>
        <div class="row" style="margin: 10px 0 0 0; padding: 0 10px 5px 10px; border: 1px solid #ddd; background-color: #eee;">
            <div class="row" style="margin: 0;"><div class="row-column" style="margin: 0 0 5px 0;">Показывать только:</div></div>
            <div class="row" style="margin: 0; padding: 0;">
                <div class="row-column"><div id='notAcceptedDemands'>Непринятые заявки</div></div>
            </div>
            <div class="row" style="margin: 0; padding: 0;">
                <div class="row-column"><div id='unfulfilledDemands'>Невыполненные заявки</div></div>
            </div>
        </div>
    </div>
    <div class="row-column">
        <div class="row" style="margin: 0;padding: 0 10px 5px 10px; border: 1px solid #ddd; background-color: #eee;">
            <div class="row" style="margin: 0; padding: 0;"><div class="row-column" style="margin: 0 0 5px 0;">Отбор по параметрам:</div></div>
            <div class="row" style="margin: 0;">
                <div class="row-column" style="text-align: center;">Номер <div id="Number"></div></div>
                <div class="row-column" style="text-align: center;">Дата <div id="Date"></div></div>
                <div class="row-column" style="text-align: center;">Приоритет <div id="Prior"></div></div>
            </div>
            <div class="row" style="margin: 5px 0 0 0;">
                <div class="row-column" style="margin-top: 2px;">За период </div>
                <div class="row-column" style="margin-top: 2px;">с </div><div class="row-column"><div id='BeginDate'></div></div>
                <div class="row-column" style="margin-top: 2px;">по </div><div class="row-column"><div id='EndDate'></div></div>
            </div>
        </div>
    </div>
    <div class="row-column">
        <div class="row" style="margin: 0;">
            <div class="row-column" style="padding: 0; margin: 0; font-weight: bold" id="rowNum"></div>
        </div>
        <div class="row" style="margin-top: 5px;">
            <div class="row-column" style="padding: 0; margin: 0;"><input type="button" value="|<" id='btnStart' /></div>
            <div class="row-column" style="padding: 0; margin: 0;"><input type="button" value="<" id='btnPrevious' /></div>
            <div class="row-column" style="padding: 0; margin: 0;"><input type="button" value=">" id='btnNext' /></div>
            <div class="row-column" style="padding: 0; margin: 0;"><input type="button" value=">|" id='btnEnd' /></div>
        </div>
        <div class="row">
            <div class="row-column" style="padding: 0;"><input type="button" value="Сбросить все фильтры" id='btnReset' /></div>
        </div>
    </div>
</div>
<!--<div class="row" style="margin-bottom: 10px;">
    <div class="row-column" style="padding: 0 10px 10px 10px; border: 1px solid #ddd; background-color: #eee;">
        <div class="row" style="margin: 0; padding: 0;"><div class="row-column" style="margin: 0 0 5px 0;">Выберите период за который будут отображены заявки:</div></div>
        <div class="row" style="">
            <div class="row-column"><div id='PeriodDemands'></div></div><div class="row-column">За период </div>
            <div class="row-column">с </div><div class="row-column"><div id='BeginDate' ></div></div>
            <div class="row-column">по </div><div class="row-column"><div id='EndDate'></div></div>
            <div class="row-column" style="margin-left: 25px;"><div id='LastDemands'></div></div><div class="row-column">Последние </div>
            <div class="row-column"><div id="DemandsCount"></div></div>
            <div class="row-column" style="margin-left: 25px;"><div id='unlimited'></div></div><div class="row-column">Неограниченно </div>
        </div>
    </div>
</div>-->


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


    <div id='' style="overflow: hidden; width: 100%;">
        <div class="row" style="margin: 5px; padding: 0;">
            <div id="MonitoringDemandsGrid" class="jqxGridAliton"></div>
        </div>
    </div>


    <div id='' style="overflow: hidden; width: 100%;">
        <div class="row" style="margin: 5px; padding: 0;">
            <div id="MonitoringDemandDetailsGrid" class="jqxGridAliton"></div>
        </div>
    </div>

</div>


<div class="row"><div class="row-column">Примечание: <textarea readonly="" type="text" id="Description" name="MonitoringDemands[Description]"></textarea></div></div>

<div class="row" style="max-width: 1065px; margin: 0;">
    <div class="row">
        <div class="row-column"><input type="button" value="Дополнительно" id='MoreInfoMonitoringDemands' /></div>
        <div class="row-column"><input type="button" value="Новая заявка" id='NewMonitoringDemands' /></div>
        <div class="row-column"><input type="button" value="Принять" id='btnAcceptEmployeeName'/></div>
        <div class="row-column" style="margin-left: 150px;"><input type="button" value="Печатать" id='btnPrint'/></div>
        <div class="row-column" style="float: right;"><input type="button" value="Удалить" id='DelMonitoringDemands' /></div>
    </div>

    <div class="row">
        <div class="row-column"><input type="button" value="Обновить" id='ReloadMonitoringDemands' /></div>
        <div class="row-column" style="float: right;"><input type="button" value="Отменить принятие" id='btnCancelAcceptance' /></div>
    </div>
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