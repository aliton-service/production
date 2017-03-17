<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentCostCalcRowData;
        var Calc_id = null;
        var CostCalculations = {
            ObjectGr_id: '<?php echo $ObjectGr_id; ?>',
        };
        
        var CostCalculationsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectsGroupCostCalculations), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["c.ObjectGr_id = " + CostCalculations.ObjectGr_id],
                });
                return data;
            },
            beforeSend(jqXHR, settings) {
                DisabledCostCalcControls();
            },
        });
        
        var DisabledCostCalcControls = function() {
            $('#dropDownBtnCostCalculations').jqxButton({disabled: true});
            $('#btnRefreshCostCalculations').jqxButton({disabled: true});
            $('#btnEditCostCalculations').jqxButton({disabled: true});
            $('#btnAnnulCostCalculations').jqxButton({disabled: true});
            $('#btnCopyCostCalculations').jqxButton({disabled: true});
        };

        $("#NoteCostCalculations").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%' }));
        
        $("#dropDownBtnCostCalculations").on('open', function(){
            $('#btnAddSmeta').jqxButton({disabled: true});
            $('#btnAddDopSmeta').jqxButton({disabled: true});
            if (CurrentCostCalcRowData != undefined) {
                if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 0) 
                    $('#btnAddSmeta').jqxButton({disabled: false});
                
                if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 1) 
                    $('#btnAddDopSmeta').jqxButton({disabled: false});
            }
        });
        
        $("#dropDownBtnCostCalculations").jqxDropDownButton({initContent: function(){
                $('#btnAddSmeta').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: '162px', disabled: true}));
                $('#btnAddDopSmeta').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: '162px', disabled: true}));
                
                $('#btnAddSmeta').on('click', function(){
                    if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 0) {
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Add')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                Params: {
                                    cgrp_id: CurrentCostCalcRowData.cgrp_id,
                                    type: 1
                                }
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                if (Res.result == 1)
                                    window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + "&calc_id=" + Res.id);
//                                    location.href =<?php // echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + '&calc_id=' + Res.id;
                                else
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);

                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                            }
                        });
                    } else {
                        if (CostCalculations.count_type0 == 0) 
                            Aliton.ShowErrorMessage('Ошибка', 'В этом проекте нет подтвержденного коммерческого предложения');
                        if (CostCalculations.count_type1 > 0) 
                            Aliton.ShowErrorMessage('Ошибка', 'В этом проекте уже создана смета');
                    }

                });
                
                $('#btnAddDopSmeta').on('click', function(){
                    if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 1) {
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Add')) ?>,
                            type: 'POST',
                            async: false,
                            data: {
                                Params: {
                                    cgrp_id: CurrentCostCalcRowData.cgrp_id,
                                    type: 2
                                }
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                if (Res.result == 1)
                                    window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + "&calc_id=" + Res.id);
//                                    location.href =<?php // echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + '&calc_id=' + Res.id;
                                else
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);

                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                            }
                        });
                    } else {
                        if (CostCalculations.count_type1 == 0) 
                            Aliton.ShowErrorMessage('Ошибка', 'В этом нет сметы');
                    }

                });
            }
        });
       
        
        $("#dropDownBtnCostCalculations").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { autoOpen: false, width: 160, height: 22, dropDownVerticalAlignment: 'top' }));
        
        var dropDownBtnCostCalculations = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 2px;">Создать</div>';
        $("#dropDownBtnCostCalculations").jqxDropDownButton('setContent', dropDownBtnCostCalculations);
        
        var createNewCostCalculations = function (DocType_Name) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ObjectsGroupCostCalculations/Create');?>",
                type: 'POST',
                async: false,
                data: { 
                    ObjectGr_id: CostCalculations.ObjectGr_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#CostCalculationsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#CostCalculationsGrid').jqxGrid('getcelltext', RowIndex + 1, "Malfunction_id");
                            Aliton.SelectRowById('calc_id', Text, '#CostCalculationsGrid', true);
                            RowIndex = $('#CostCalculationsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#CostCalculationsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        $('#btnRefreshCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 110, imgSrc: '/images/11.png'}));
        $('#btnCopyCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 120, imgSrc: '/images/10.png'}));
        $('#btnEditCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 100, imgSrc: '/images/4.png'}));
        $('#btnAnnulCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 140, imgSrc: '/images/3.png'}));
        $('#btnCopyBuffer').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 200}));
        
        $('#btnCopyBuffer').on('click', function() {
            var Calc_id = getCookie("CopyCostCalc_Calc_id");
            var ObjectGr_id = getCookie("CopyCostCalc_ObjectGr_id");
            if (Calc_id != undefined && ObjectGr_id != undefined) {
                PasteCostCalc(Calc_id, ObjectGr_id);
            }
        });
        
        
        
        $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 500, position: 'center'}));
        
        var CheckButton = function() {
            $('#dropDownBtnCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData != undefined)});
            $('#btnRefreshCostCalculations').jqxButton({disabled: false});
            $('#btnEditCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData != undefined)});
            $('#btnAnnulCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData != undefined)});
            if (CurrentCostCalcRowData != undefined)
                $('#btnCopyCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData.count_type0 == 0 && CurrentCostCalcRowData.count_type1 == 0)});
            else $('#btnCopyCostCalculations').jqxButton({disabled: true});
        };
        
        $("#CostCalculationsGrid").on('rowselect', function (event) {
            CurrentCostCalcRowData = $('#CostCalculationsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
            if (CurrentCostCalcRowData !== undefined)
                if (CurrentCostCalcRowData.Note !== null)
                    $("#NoteCostCalculations").jqxTextArea('val', CurrentCostCalcRowData.Note);
        });
        
        var groupsrenderer = function (text, group, expanded, data) 
        {
            if (data.subItems.length > 0) {
                var groupname = data.subItems[0]['group_name'];
                return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + text + ' (' + groupname + ')</span>';
            }
        };
        
        var CellClass = function (row, columnfield, value) {
            var StyleClass = '';
            var RowData = $("#CostCalculationsGrid").jqxGrid('getrowdata', row);
            if (RowData != undefined) {
                if (RowData.type == 1 || RowData.type == 2)
                    StyleClass = 'CellSmet';
                if (RowData.date_annul != null)
                    StyleClass = StyleClass + ' CellAnnul';
            }
            return StyleClass;
        }
        
        var contextMenu = $("#ContextMenu").jqxMenu({ width: 200, height: 58, autoOpenPopup: false, mode: 'popup'});
        $("#CostCalculationsGrid").on('contextmenu', function () {
            return false;
        });
        
        $("#CostCalculationsGrid").on("columnclick", function (event) {
            var scrollTop = $(window).scrollTop();
            var scrollLeft = $(window).scrollLeft();
            contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
            return false;
        });
        
        $("#CostCalculationsGrid").on('rowclick', function (event) {
            if (event.args.rightclick) {
                $("#CostCalculationsGrid").jqxGrid('selectrow', event.args.rowindex);
                var scrollTop = $(window).scrollTop();
                var scrollLeft = $(window).scrollLeft();
                contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                return false;
            }
        });
        
        function getCookie(name) {
          var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
          return matches ? decodeURIComponent(matches[1]) : undefined;
        }
        
        function setCookie(name, value, options) {
            options = options || {};

            var expires = options.expires;

            if (typeof expires == "number" && expires) {
                var d = new Date();
                d.setTime(d.getTime() + expires * 1000);
                expires = options.expires = d;
            }
            if (expires && expires.toUTCString) {
                options.expires = expires.toUTCString();
            }

            value = encodeURIComponent(value);

            var updatedCookie = name + "=" + value;

            for (var propName in options) {
                updatedCookie += "; " + propName;
                var propValue = options[propName];
                if (propValue !== true) {
                    updatedCookie += "=" + propValue;
                }
            }

            document.cookie = updatedCookie;
        }
        
        $("#ContextMenu").on('itemclick', function (event) {
            var args = event.args;
            var rowindex = $("#CostCalculationsGrid").jqxGrid('getselectedrowindex');
            if ($.trim($(args).text()) == "Копировать смету") {
                setCookie("CopyCostCalc_Calc_id", CurrentCostCalcRowData.calc_id, 3600);
                setCookie("CopyCostCalc_ObjectGr_id", CurrentCostCalcRowData.ObjectGr_id, 3600);
            }
            if ($.trim($(args).text()) == "Вставить смету") {
                var Calc_id = getCookie("CopyCostCalc_Calc_id");
                var ObjectGr_id = getCookie("CopyCostCalc_ObjectGr_id");
                if (Calc_id != undefined && ObjectGr_id != undefined) {
                    PasteCostCalc(Calc_id, ObjectGr_id);
                }
            }
        });
        
        function PasteCostCalc(FCalc_id, ObjectGr_id) {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl("CostCalculations/Paste")); ?>,
                type: 'POST',
                async: true,
                data: {
                   Calc_id: FCalc_id,
                   ObjectGr_id: CostCalculations.ObjectGr_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    Calc_id = Res.id;
                    $('#btnRefreshCostCalculations').click();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
        
            });
        };
        
        $("#CostCalculationsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: false,
                showfilterrow: false,
                groupable: true,
                pageable: false,
                showstatusbar: true,
                statusbarheight: 25,
                groupsrenderer: groupsrenderer,
                width: '100%',
                height: 'calc(100% - 2px)',
                showgroupsheader: false,
                source: CostCalculationsDataAdapter,
                columns: [
                    { text: 'Группа', datafield: 'group_name', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, hidden: true },
                    { text: 'Вариант', datafield: 'number', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, hidden: true, cellclassname: CellClass },
                    { text: 'Номер', datafield: 'calc_id', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, cellclassname: CellClass},
                    { text: 'Тип', datafield: 'CostCalcType', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 220, cellclassname: CellClass},
                    { text: 'Дата', dataField: 'date', columngroup: 'Group1', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140, cellclassname: CellClass},
                    { text: 'Дата готовности', dataField: 'date_ready', columngroup: 'Group1', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140, cellclassname: CellClass},
                    { text: 'Создал', datafield: 'EmployeeName', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 100, cellclassname: CellClass },
                    { text: '№ заявки', datafield: 'Demand_id', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 80, cellclassname: CellClass },
                    { text: 'Дата', dataField: 'cnt_date', columngroup: 'Sent', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140, cellclassname: CellClass },
                    { text: 'Способ', datafield: 'cntp_name', columngroup: 'Sent', filtercondition: 'CONTAINS', width: 150, cellclassname: CellClass },
                    { text: 'Контакное лицо', datafield: 'FIO', columngroup: 'Sent', filtercondition: 'CONTAINS', width: 250, cellclassname: CellClass },
                ],
                columngroups: [
                    { text: '', align: 'center', name: 'Group1' },
                    { text: 'Отправлено заказчику', align: 'center', name: 'Sent' },
                ],
                groups: ['number']
        }));
        
        $("#CostCalculationsGrid").jqxGrid('expandallgroups');

        $('#btnAnnulCostCalculations').on('click', function(){
            if ($('#btnAnnulCostCalculations').jqxButton('disabled')) return;
            if (CurrentCostCalcRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Annul')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        calc_id: CurrentCostCalcRowData.calc_id
                    },
                    success: function(Res) {
                        $('#btnRefreshCostCalculations').click();
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshCostCalculations').on('click', function(){
            if ($('#btnRefreshCostCalculations').jqxButton('disabled')) return;
            console.log('Calc_id2:' + Calc_id);
            if (Calc_id == null) {
                var RowIndex = $('#CostCalculationsGrid').jqxGrid('getselectedrowindex');
                var Val = $('#CostCalculationsGrid').jqxGrid('getcellvalue', RowIndex, "calc_id");
            } else {
                var Val = Calc_id;
            }
            
            $('#CostCalculationsGrid').jqxGrid('updatebounddata', 'data');
            $('#CostCalculationsGrid').jqxGrid('expandallgroups');
            var GroupCount = 0;
            var GroupName = null;
            var Index = 0;
            var Rows = $('#CostCalculationsGrid').jqxGrid('getrows');
            for (var i = 0; i < Rows.length; i++) {
                var TmpVal = $('#CostCalculationsGrid').jqxGrid('getcellvalue', i, 'calc_id');
                var TmpGroup = $('#CostCalculationsGrid').jqxGrid('getcellvalue', i, 'number');
                if (GroupName != TmpGroup) {
                    GroupCount++;
                    GroupName = TmpGroup;
                }
                if (TmpVal == Val) {
                    Index = i;
                    break;
                }
            }
                
            $('#CostCalculationsGrid').jqxGrid('selectrow', Index);
            $('#CostCalculationsGrid').jqxGrid('ensurerowvisible', (Index + GroupCount));
            Calc_id = null;
        });
        
        $("#CostCalculationsGrid").on('rowdoubleclick', function(){
            if (CurrentCostCalcRowData !== null && CurrentCostCalcRowData.calc_id !== null) {
                $('#btnEditCostCalculations').click();
            }
        });
        
        $('#btnEditCostCalculations').on('click', function(){
            window.open('/index.php?r=CostCalculations/Index&calc_id=' + CurrentCostCalcRowData.calc_id);
        });
        
        $('#btnCopyCostCalculations').on('click', function() {
            if ($('#btnCopyCostCalculations').jqxButton('disabled')) return;
            if (CurrentCostCalcRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Copy')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        cgrp_id: CurrentCostCalcRowData.cgrp_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            Calc_id = Res.id;
                            $('#btnRefreshCostCalculations').click();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#CostCalculationsGrid').jqxGrid('selectrow', 0);
        
    });
</script>

<style>
    .CellAnnul {
        text-decoration: line-through;
    }
    
    .CellSmet {
        color: black;
        /*background-color: #5FB989;*/
    }
    
    .CellSmet:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .CellSmet:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
        color: black;
        background-color: #B8E7AC;
    }
    .jqx-grid-group-cell {
        border-width:0 1px 1px 0;
    }
    #CostCalculationsGrid .jqx-fill-state-pressed {
        background-color: #5FB989 !important;
        color: black;
    }
</style>

<div class="row" style="height: calc(100% - 150px); margin: 0;">
    <div id="CostCalculationsGrid" class="jqxGridAliton"></div>
</div>

<div class="row" style="margin: 0;">
    <div class="row-column">Примечание:</div>
</div>
<div class="row" style="margin: 0;">
    <textarea readonly id="NoteCostCalculations"></textarea>
</div>

<div class="row">
    <div class="row-column">
        <div id='jqxWidget'>
            <div style='float: left;' id="dropDownBtnCostCalculations">
                <div style="border: none;" id='jqxTreeCostCalculations'> 
                    <div style="padding: 2px"><input type="button" id="btnAddSmeta" value="Смета"/></div>
                    <div style="clear: both"></div>
                    <div style="padding: 2px"><input type="button" id="btnAddDopSmeta" value="Доп. смета"/></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditCostCalculations'/></div>
    <div class="row-column"><input type="button" value="Копировать" id='btnCopyCostCalculations'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshCostCalculations'/></div>
    <div class="row-column"><input type="button" value="Вставить КП из буфера" id='btnCopyBuffer'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Аннулировать" id='btnAnnulCostCalculations'/></div>
</div>   


<div id="CostCalculationsDialog" style="display: none;">
    <div id="CostCalculationsDialogHeader">
        <span id="CostCalculationsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px 20px;" id="DialogCostCalculationsContent">
        <div style="" id="BodyCostCalculationsDialog"></div>
    </div>
</div>

<div id='ContextMenu' style="display: none">
    <ul>
        <li>Копировать смету</li>
        <li>Вставить смету</li>
    </ul>
</div>