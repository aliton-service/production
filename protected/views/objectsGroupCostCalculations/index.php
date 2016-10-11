<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var OGCostCalculations = {
            ObjectGr_id: '<?php echo $ObjectGr_id; ?>',
        };
        
        var OGCostCalculationsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectsGroupCostCalculations), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.ObjectGr_id = " + OGCostCalculations.ObjectGr_id],
                });
                return data;
            },
        });

        $("#NoteCostCalculations").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 1000 }));
        
        $("#dropDownBtnCostCalculations").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { autoOpen: true, width: 240, height: 28 }));
        $("#jqxTreeCostCalculations").jqxTree({ width: 240 });
        
        var dropDownBtnCostCalculations = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 5px;">Создать</div>';
        $("#dropDownBtnCostCalculations").jqxDropDownButton('setContent', dropDownBtnCostCalculations);
        
        var createNewCostCalculations = function (DocType_Name) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ObjectsGroupCostCalculations/Create');?>",
                type: 'POST',
                async: false,
                data: { 
                    ObjectGr_id: OGCostCalculations.ObjectGr_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#OGCostCalculationsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#OGCostCalculationsGrid').jqxGrid('getcelltext', RowIndex + 1, "Malfunction_id");
                            Aliton.SelectRowById('calc_id', Text, '#OGCostCalculationsGrid', true);
                            RowIndex = $('#OGCostCalculationsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#OGCostCalculationsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };

        
        $('#jqxTreeCostCalculations').on('select', function (event) {
            var args = event.args;
            var item = $('#jqxTreeCostCalculations').jqxTree('getItem', args.element);
            createNewCostCalculations(item.label);
            $("#jqxTreeCostCalculations").jqxTree('selectItem', null);
        });
        
        
        $('#btnRefreshOGCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnEditOGCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnDelOGCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#OGCostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 500, position: 'center'}));
        
        var CheckButton = function() {
            $('#btnDelOGCostCalculations').jqxButton({disabled: !(CurrentRowData != undefined)})
        };
        
        $("#OGCostCalculationsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#OGCostCalculationsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
//            console.log(CurrentRowData.calc_id);
            if (CurrentRowData !== null && CurrentRowData.Note !== null) $("#NoteCostCalculations").jqxTextArea('val', CurrentRowData.Note);
        });
        
        var groupsrenderer = function (text, group, expanded, data) 
        {
//            console.log('data.groupcolumn.datafield = ' + data.groupcolumn.datafield);
//            console.log(data);
            
            if (data.groupcolumn.datafield == 'number') 
            {
                var number = OGCostCalculationsDataAdapter.formatNumber(group, data.groupcolumn.cellsformat);
                var text = data.groupcolumn.text + ': ' + number;
                return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + text + '</span>';
            } 
            else if (data.groupcolumn.datafield == 'group_name')
            {
                var group_name = OGCostCalculationsDataAdapter.formatNumber(group, data.groupcolumn.cellsformat);
                return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + group_name + '</span>';
            }
        };
            
        $("#OGCostCalculationsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: false,
                groupable: true,
                pageable: true,
                groupsrenderer: groupsrenderer,
                width: '100%',
                height: '500',
                source: OGCostCalculationsDataAdapter,
                columns: [
                    { text: 'Группа', datafield: 'group_name', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, hidden: true },
                    { text: 'Вариант', datafield: 'number', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, hidden: true },
                    { text: 'Номер', datafield: 'calc_id', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70 },
                    { text: 'Тип', datafield: 'CostCalcType', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 220 },
                    { text: 'Дата', dataField: 'date', columngroup: 'Group1', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Дата готовности', dataField: 'date_ready', columngroup: 'Group1', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Создал', datafield: 'EmployeeName', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 100 },
                    { text: '№ заявки', datafield: 'Demand_id', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 80 },
                    { text: 'Дата', dataField: 'cnt_date', columngroup: 'Sent', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140 },
                    { text: 'Способ', datafield: 'cntp_name', columngroup: 'Sent', filtercondition: 'CONTAINS', width: 150 },
                    { text: 'Контакное лицо', datafield: 'FIO', columngroup: 'Sent', filtercondition: 'CONTAINS', width: 250 },
                ],
                columngroups: [
                    { text: '', align: 'center', name: 'Group1' },
                    { text: 'Отправлено заказчику', align: 'center', name: 'Sent' },
                ],
                groups: ['number', 'group_name']
        }));
        
        $("#OGCostCalculationsGrid").jqxGrid('expandallgroups');
        $("#OGCostCalculationsGrid").jqxGrid('showgroupsheader', false);
        

        $('#btnDelOGCostCalculations').on('click', function(){
//            console.log(CurrentRowData.prlt_id);
            
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('OGCostCalculations/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        prlt_id: CurrentRowData.prlt_id
                    },
                    success: function(Res) {
                        $("#OGCostCalculationsGrid").jqxGrid('updatebounddata');
                        $('#OGCostCalculationsGrid').jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshOGCostCalculations').on('click', function(){
            var RowIndex = $('#OGCostCalculationsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#OGCostCalculationsGrid').jqxGrid('getcellvalue', RowIndex, "prlt_id");
            Aliton.SelectRowById('prlt_id', Val, '#OGCostCalculationsGrid', true);
        });
        
        $("#OGCostCalculationsGrid").on('rowdoubleclick', function(){
            if (CurrentRowData !== null && CurrentRowData.calc_id !== null) {
                $('#btnEditOGCostCalculations').click();
            }
        });
        
        $('#btnEditOGCostCalculations').on('click', function(){
            window.open('/index.php?r=CostCalculationDetails/Index&calc_id=' + CurrentRowData.calc_id);
        });
        
        $('#OGCostCalculationsGrid').jqxGrid('selectrow', 0);
        
    });
</script>

<div class="row">
    <div id="OGCostCalculationsGrid" class="jqxGridAliton"></div>
</div>

<div class="row" style="margin: 0;">
    <div class="row-column">Примечание: <textarea readonly id="NoteCostCalculations"></textarea></div>
</div>

<div class="row">
    <div class="row-column">
        <div id='jqxWidget'>
            <div style='float: left;' id="dropDownBtnCostCalculations">
                <div style="border: none;" id='jqxTreeCostCalculations'>
                    <ul>
                        <li><div style="width: 200px; height: 20px;">Коммерческое предложение</div></li>
                        <li><div style="width: 200px; height: 20px;">Смета</div></li>
                        <li><div style="width: 200px; height: 20px;">Доп. смета</div></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditOGCostCalculations'/></div>
    <div class="row-column"><input type="button" value="Удалить" id='btnDelOGCostCalculations'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshOGCostCalculations'/></div>
</div>   


<div id="OGCostCalculationsDialog" style="display: none;">
    <div id="OGCostCalculationsDialogHeader">
        <span id="OGCostCalculationsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px 20px;" id="DialogOGCostCalculationsContent">
        <div style="" id="BodyOGCostCalculationsDialog"></div>
    </div>
</div>