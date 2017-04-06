<script type="text/javascript">
    var WHReestr = {};
    WHReestr.Docm_id = 0;
    var WHDocCount = 0;
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowDataAll;
        var CurrentRowDataDoc1;
        var CurrentRowDataDoc2;
        var CurrentRowDataDoc3;
        var CurrentRowDataDoc4;
        var CurrentRowDataDoc8;
        var CurrentRowDataDoc7;
        var CurrentRowDataDoc9;
        var Dctp_id;
        
        $('#btnRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnInfo').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCreate').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, imgSrc: '/images/6.png' }));
        $('#btnDel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, height: 30, imgSrc: '/images/7.png' }));
        $('#btnUndo').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 180, height: 30, imgSrc: '/images/3.png' }));
        $('#WHDocumentsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings));
        
        var CheckDocs = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/CheckDocuments'))?>,
                type: 'POST',
                async: true,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (WHDocCount == 0)
                            WHDocCount = parseInt(Res.id);
                        if (parseInt(Res.id) > parseInt(WHDocCount)) {
                            $('h1').html('Склад - реестр документов ******************* Выборка устарела');
                        }
                        
                    }
                        
                }
            });
        };
        
        window.setInterval(CheckDocs, 1000*60*5);

        
        var SelectTab = function() {
            var SelectedTab = $('#edTabs').jqxTabs('selectedItem');
            Aliton.SetLocation(SelectedTab);
            
            switch (SelectedTab) {
                case 0: Dctp_id = 0; break;
                case 1: Dctp_id = 1; break;
                case 2: Dctp_id = 2; break;
                case 3: Dctp_id = 3; break;
                case 4: Dctp_id = 4; break;
                case 5: Dctp_id = 8; break;
                case 6: Dctp_id = 7; break;
                case 7: Dctp_id = 9; break;
            };
            SetStateButton();
        };
        
        $('#edTabs').on('selected', function (event){ 
            SelectTab();
        });
        
        $('#btnInfo').on('click', function(){
            var TabIndex = $('#edTabs').jqxTabs('selectedItem');
            var Docm_id = 0;
            switch (TabIndex) {
                case 0: Docm_id = CurrentRowDataAll.docm_id; break;
                case 1: Docm_id = CurrentRowDataDoc1.docm_id; break;
                case 2: Docm_id = CurrentRowDataDoc2.docm_id; break;
                case 3: Docm_id = CurrentRowDataDoc3.docm_id; break;
                case 4: Docm_id = CurrentRowDataDoc4.docm_id; break;
                case 5: Docm_id = CurrentRowDataDoc8.docm_id; break;
                case 6: Docm_id = CurrentRowDataDoc7.docm_id; break;
                case 7: Docm_id = CurrentRowDataDoc9.docm_id; break;
            };
            
            if (Docm_id > 0) {
                window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View'))?> + '&Docm_id=' + Docm_id);
            }
        });
        
        $('#btnRefresh').on('click', function(){
            $('#edFiltering').click();
        });
        
        
        var GetNotes = function(Docm_id) {
            var Result = '';
            if (Docm_id != undefined) {
                $.ajax({
                    url: '<?php echo Yii::app()->createUrl('WHDocuments/GetWhNotes'); ?>',
                    type: 'POST',
                    data: {Docm_id: Docm_id},
                    async: false,
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        Result = Res.text;
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage('Ошибка', Res.responseText);
                    }
                });
            }
            return Result;
        };
        var SetStateButton = function() {
            var TabIndex = $('#edTabs').jqxTabs('selectedItem');
            var Achs_id = null;
            switch(TabIndex) {
                case 0:
                    $('#btnCreate').jqxButton({disabled: true});
                    $('#btnDel').jqxButton({disabled: true});
                    $('#btnUndo').jqxButton({disabled: true});
                break;    
                case 1:
                    $('#btnCreate').jqxButton({disabled: false});
                    if (CurrentRowDataDoc1 != undefined)
                        Achs_id = CurrentRowDataDoc1.achs_id; 
                    $('#btnDel').jqxButton({disabled: (CurrentRowDataDoc1 == undefined || Achs_id != null)});
                    $('#btnUndo').jqxButton({disabled: (CurrentRowDataDoc1 == undefined || Achs_id == null)});
                break;
                case 2:
                    $('#btnCreate').jqxButton({disabled: false});
                    if (CurrentRowDataDoc2 != undefined)
                        Achs_id = CurrentRowDataDoc2.achs_id; 
                    $('#btnDel').jqxButton({disabled: (CurrentRowDataDoc2 == undefined || Achs_id != null)});
                    $('#btnUndo').jqxButton({disabled: (CurrentRowDataDoc2 == undefined || Achs_id == null)});
                    $('#btnRefresh').jqxButton({disabled: false});
                break;
                case 3:
                    $('#btnCreate').jqxButton({disabled: false});
                    if (CurrentRowDataDoc3 != undefined)
                        Achs_id = CurrentRowDataDoc3.achs_id; 
                    $('#btnDel').jqxButton({disabled: (CurrentRowDataDoc3 == undefined || Achs_id != null)});
                    $('#btnUndo').jqxButton({disabled: (CurrentRowDataDoc3 == undefined || Achs_id == null)});
                    $('#btnRefresh').jqxButton({disabled: false});
                break;
                case 4:
                    $('#btnCreate').jqxButton({disabled: false});
                    if (CurrentRowDataDoc4 != undefined)
                        Achs_id = CurrentRowDataDoc4.achs_id; 
                    $('#btnDel').jqxButton({disabled: (CurrentRowDataDoc4 == undefined || Achs_id != null)});
                    $('#btnUndo').jqxButton({disabled: (CurrentRowDataDoc4 == undefined || Achs_id == null)});
                    $('#btnRefresh').jqxButton({disabled: false});
                break;
                case 5:
                    $('#btnCreate').jqxButton({disabled: false});
                    if (CurrentRowDataDoc8 != undefined)
                        Achs_id = CurrentRowDataDoc8.achs_id; 
                    $('#btnDel').jqxButton({disabled: (CurrentRowDataDoc8 == undefined || Achs_id != null)});
                    $('#btnUndo').jqxButton({disabled: (CurrentRowDataDoc8 == undefined || Achs_id == null)});
                    $('#btnRefresh').jqxButton({disabled: false});
                break;
                case 6:
                    $('#btnCreate').jqxButton({disabled: false});
                    if (CurrentRowDataDoc7 != undefined)
                        Achs_id = CurrentRowDataDoc7.achs_id; 
                    $('#btnDel').jqxButton({disabled: (CurrentRowDataDoc7 == undefined || Achs_id != null)});
                    $('#btnUndo').jqxButton({disabled: (CurrentRowDataDoc7 == undefined || Achs_id == null)});
                    $('#btnRefresh').jqxButton({disabled: false});
                break;
                case 7:
                    $('#btnCreate').jqxButton({disabled: false});
                    if (CurrentRowDataDoc9 != undefined)
                        Achs_id = CurrentRowDataDoc9.achs_id; 
                    $('#btnDel').jqxButton({disabled: (CurrentRowDataDoc9 == undefined || Achs_id != null)});
                    $('#btnUndo').jqxButton({disabled: (CurrentRowDataDoc9 == undefined || Achs_id == null)});
                    $('#btnRefresh').jqxButton({disabled: false});
                break;
            }
            
        };
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#edNotesAll").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#GridAll").on('rowselect', function (event) {
                        CurrentRowDataAll = $('#GridAll').jqxGrid('getrowdata', event.args.rowindex);
                        if (CurrentRowDataAll != undefined) {
                            $("#edNotesAll").jqxTextArea('val', GetNotes(CurrentRowDataAll.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                        SetStateButton();
                    });
                    
                    $("#GridAll").on("bindingcomplete", function (event) {
                        
                        if (CurrentRowDataAll != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataAll.docm_id, '#GridAll', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#GridAll', false);
                    });
                    
                    $('#GridAll').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    $("#GridAll").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Обсл.\Мотаж', columngroup: 'Documents', datafield: 'wrtp_gr', width: 130 },
                                    { text: 'Тип документа', columngroup: 'Documents', datafield: 'dctp_name', width: 200 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Операция', columngroup: 'Action', datafield: 'actn_name', width: 150 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'От', columngroup: 'Action', datafield: 'Source', width: 150 },
                                    { text: 'Кому', columngroup: 'Action', datafield: 'Destination', width: 150 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Документ', align: 'center', name: 'Documents' },
                                  { text: 'Движение ТМЦ', align: 'center', name: 'Action' },
                                  
                                ],
                            }));
//                    Find();
                    $('#edFiltering').click();
                break;
                case 1:
                    
                    $("#edNotes1").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid1").on('rowselect', function (event) {
                        CurrentRowDataDoc1 = $('#Grid1').jqxGrid('getrowdata', event.args.rowindex);
                        if (CurrentRowDataDoc1 != undefined) {
                            $("#edNotes1").jqxTextArea('val', GetNotes(CurrentRowDataDoc1.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        $('#btnRefresh').jqxButton({disabled: false});
                        SetStateButton();
                    });
                    
                    
                    
                    $("#Grid1").on("bindingcomplete", function (event) {
                        if (WHReestr.Docm_id > 0) {
                            Aliton.SelectRowByIdVirtual('docm_id', WHReestr.Docm_id, '#Grid1', false);
                            Docm_id = 0;
                            return;
                        }
                        if (CurrentRowDataDoc1 != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataDoc1.docm_id, '#Grid1', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#Grid1', false);
                    });
                    
                    $('#Grid1').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    $('#Grid1').on("columnreordered", function (event) { 
                        GridState.SaveGridSettings('Grid1', 'WHDoc1Grid1');
                    });
                    $('#Grid1').on("columnresized", function (event) {
                        GridState.SaveGridSettings('Grid1', 'WHDoc1Grid1');
                    });
                    
                    $("#Grid1").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            ready: function() {
                                var State = $('#Grid1').jqxGrid('getstate');
                                var Columns = GridState.LoadGridSettings('#Grid1', 'WHDoc1Grid1');
                                $.extend(true, State.columns, Columns);
                                $('#Grid1').jqxGrid('loadstate', State);    
                            },
                            columns:
                                [
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Вид документа', columngroup: 'Documents', datafield: 'dckn_name', width: 100 },
                                    { text: 'Юр. лицо', columngroup: 'Documents', datafield: 'JuridicalPerson', width: 100 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Поставщик', columngroup: 'Documents', filterable: false, datafield: 'splr_name', width: 130 },
                                    { text: 'Сумма', columngroup: 'Documents', datafield: 'summa', cellsformat: 'f4', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                    { text: 'Дата', columngroup: 'Cancel', filtertype: 'date', datafield: 'c_date',cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Отменил', columngroup: 'Cancel', datafield: 'c_name', width: 120 },
                                    { text: 'Основание', columngroup: 'Cancel', datafield: 'c_confirmname', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                  { text: 'Отменил подтверждение', align: 'center', name: 'Cancel' },
                                  
                                ],
                            }));
//                    Find();
                    $('#edFiltering').click();
                break;
                case 2:
                    $("#edNotes2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid2").on('rowselect', function (event) {
                        CurrentRowDataDoc2 = $('#Grid2').jqxGrid('getrowdata', event.args.rowindex);
                        if (CurrentRowDataDoc2 != undefined) {
                            
                            $("#edNotes2").jqxTextArea('val', GetNotes(CurrentRowDataDoc2.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        SetStateButton();
                    });
                    
                    $("#Grid2").on("bindingcomplete", function (event) {
                        if (WHReestr.Docm_id > 0) {
                            Aliton.SelectRowByIdVirtual('docm_id', WHReestr.Docm_id, '#Grid2', false);
                            Docm_id = 0;
                            return;
                        }
                        if (CurrentRowDataDoc2 != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataDoc2.docm_id, '#Grid2', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#Grid2', false);
                    });
                    
                    $('#Grid2').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    $("#Grid2").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'Address', width: 100 },
                                    { text: 'Причина возврата', columngroup: 'Documents', datafield: 'rtrs_name', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                    { text: 'От', columngroup: 'Action', datafield: 'mstr_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                ],
                            }));
//                    Find();
                        $('#edFiltering').click();
                break;
                case 3:
                    $("#edNotes3").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid3").on('rowselect', function (event) {
                        CurrentRowDataDoc3 = $('#Grid3').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc3 != undefined) {
                            
                            $("#edNotes3").jqxTextArea('val', GetNotes(CurrentRowDataDoc3.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        SetStateButton();
                    });
                    
                    $("#Grid3").on("bindingcomplete", function (event) {
                        if (WHReestr.Docm_id > 0) {
                            Aliton.SelectRowByIdVirtual('docm_id', WHReestr.Docm_id, '#Grid3', false);
                            Docm_id = 0;
                            return;
                        }
                        if (CurrentRowDataDoc3 != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataDoc3.docm_id, '#Grid3', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#Grid3', false);
                    });
                    
                    $('#Grid3').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    $("#Grid3").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Поставщик', columngroup: 'Documents', filterable: false, datafield: 'splr_name', width: 100 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Выдано со склада', align: 'center', name: 'Action' },
                                ],
                            }));
//                    Find();
                    $('#edFiltering').click();
                break;
                case 4:
                    $("#edNotes4").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    $("#btnReady").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 180}));
                    $("#btnUndoReady").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 180}));
                    
                    $("#btnReady").on('click', function() {
                        if (CurrentRowDataDoc4 != undefined) {
                            if (CurrentRowDataDoc4.date_ready == null )
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Ready')) ?>,
                                    type: 'POST',
                                    data: {Docm_id: CurrentRowDataDoc4.docm_id},
                                    success: function(Res){
                                        Res = JSON.parse(Res);
                                        if (Res.result == 1)
                                            $('#edFiltering').click();
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                        }
                        
                    });
                    
                    $("#btnUndoReady").on('click', function() {
                        if (CurrentRowDataDoc4 != undefined) {
                            if (CurrentRowDataDoc4.date_ready != null )
                                $.ajax({
                                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Undo')) ?>,
                                    type: 'POST',
                                    data: {Docm_id: CurrentRowDataDoc4.docm_id},
                                    success: function(Res){
                                        Res = JSON.parse(Res);
                                        if (Res.result == 1)
                                            $('#edFiltering').click();
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                        }
                        
                    });
                    
                    $("#Grid4").on('rowselect', function (event) {
                        CurrentRowDataDoc4 = $('#Grid4').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc4 != undefined) {
                            
                            $("#edNotes4").jqxTextArea('val', GetNotes(CurrentRowDataDoc4.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        SetStateButton();
                    });
                    
                    $("#Grid4").on("bindingcomplete", function (event) {
                        if (WHReestr.Docm_id > 0) {
                            Aliton.SelectRowByIdVirtual('docm_id', WHReestr.Docm_id, '#Grid4', false);
                            Docm_id = 0;
                            return;
                        }
                        if (CurrentRowDataDoc4 != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataDoc4.docm_id, '#Grid4', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#Grid4', false);
                    });
                    
                    $('#Grid4').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    var statusrenderer = function (row, datafield, value) {
                        if (value == 'Готово к выдаче')
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px; overflow: hidden;">' +
                                        '<div style="float: left;">' + 
                                            '<img style="margin-left: 5px; margin-top: 0px;" height="16" width="16" src="/images/1.png"/>' + 
                                        '</div>' + '<div style="float: left;">Готово к выдаче</div>' +
                                    '</div>';
                        else if (value == 'Зарезервировано')
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px; overflow: hidden;">' +
                                        '<div style="float: left;">' + 
                                            '<img style="margin-left: 5px; margin-top: 0px;" height="16" width="16" src="/images/2.png"/>' + 
                                        '</div>' + '<div style="float: left;">Зарезервировано</div>' +
                                    '</div>';
                        else if (value == 'Выдано')
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px; overflow: hidden;">' +
                                        '<div style="float: left;">' + 
                                            '<img style="margin-left: 5px; margin-top: 0px;" height="16" width="16" src="/images/3.png"/>' + 
                                        '</div>' + '<div style="float: left;">Выдано</div>' +
                                    '</div>';
                        else
                            return '<div class="jqx-grid-cell-left-align" style="margin-top: 6px;">' + value + '</div>';
                    }
                    
                    var StatusFilters = [
                        { value: 1, label: "Готово к выдаче" },
                        { value: 2, label: "Зарезервировано" },
                        { value: 3, label: "Выдано" },
                    ];
                    var StatusFiltersSource =
                    {
                         datatype: "array",
                         datafields: [
                             { name: 'label', type: 'string' },
                             { name: 'value', type: 'int' }
                         ],
                         localdata: StatusFilters
                    };
                    //var StatusFiltersSource = new $.jqx.dataAdapter(StatusFiltersSource, {autoBind: true});
                    
                    $('#Grid4').on("columnreordered", function (event) { 
                        GridState.SaveGridSettings('Grid4', 'TrebGrid4');
                    });
                    $('#Grid4').on("columnresized", function (event) {
                        GridState.SaveGridSettings('Grid4', 'TrebGrid4');
                    });
                    
                    var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
                        var Temp = $('#Grid4').jqxGrid('getrowdata', row);
                        var column = $("#Grid4").jqxGrid('getcolumn', columnfield);
                            if (column.cellsformat != '') {
                                if ($.jqx.dataFormat) {
                                    if ($.jqx.dataFormat.isDate(value)) {
                                        value = $.jqx.dataFormat.formatdate(value, column.cellsformat);
                                    }   
                                    else if ($.jqx.dataFormat.isNumber(value)) {
                                        value = $.jqx.dataFormat.formatnumber(value, column.cellsformat);
                                    }
                                }
                            }
                        if ((parseInt(Temp["overday"]) > 0)) 
                            return '<span class="backlight_red" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
                        else if ((Temp["prty_name"] == "Срочная")) 
                            return '<span class="backlight_pink" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
                        
                    }
                    
                    $("#Grid4").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            columnsreorder: true,
                            virtualmode: true,
                            ready: function() {
                                var State = $('#Grid4').jqxGrid('getstate');
                                var Columns = GridState.LoadGridSettings('#Grid4', 'TrebGrid4');
                                $.extend(true, State.columns, Columns);
                                $('#Grid4').jqxGrid('loadstate', State);    
                            },
                            columns:
                                [
                                    { text: 'Контроль', filtertype: 'checkbox', columntype: 'checkbox', columngroup: 'Documents', datafield: 'control', width: 50},
                                    { text: 'Статус', columntype: 'textbox', columngroup: 'Documents', datafield: 'status', width: 34, cellsrenderer: statusrenderer,
                                        filtertype: 'list', filteritems: new $.jqx.dataAdapter(StatusFiltersSource), 
                                                                            createfilterwidget: function (column, htmlElement, editor) {
                                                                                editor.jqxDropDownList({ displayMember: "label", valueMember: "value" });
                                                                            } 
                                    },
                                    { text: 'Вид работ', columngroup: 'Documents', datafield: 'wrtp_name', width: 130, cellsrenderer: cellsrenderer },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120, cellsrenderer: cellsrenderer },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Основание', columngroup: 'Documents', datafield: 'rcrs_name2', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Затребовал', columngroup: 'Documents', filterable: false, datafield: 'dmnd_empl_name', width: 120, cellsrenderer: cellsrenderer },
                                    { text: 'Выписал', columngroup: 'Documents', datafield: 'empl_name', width: 120, cellsrenderer: cellsrenderer },
                                    { text: 'Срочность', columngroup: 'Documents', datafield: 'prty_name', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Статус', columngroup: 'Documents', datafield: 'StatusFull', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'Address', width: 200, cellsrenderer: cellsrenderer },
                                    { text: 'Желаемая дата', columngroup: 'Documents', filtertype: 'date', datafield: 'best_date', cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Предельная дата', columngroup: 'Documents', filtertype: 'date', datafield: 'deadline', cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Обещенная дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date_promise', cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Пр-ка', columngroup: 'Documents', datafield: 'overday', width: 50, cellsrenderer: cellsrenderer },
                                    
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 130, cellsrenderer: cellsrenderer },
                                    { text: 'Кому', columngroup: 'Action', datafield: 'mstr_name', width: 130, cellsrenderer: cellsrenderer },
                                    { text: 'Основание', columngroup: 'Action', datafield: 'rcrs_name', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ReceiptDate', cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Номер', columngroup: 'Action', datafield: 'ReceiptNumber', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Дата', columngroup: 'Cancel', filtertype: 'date', datafield: 'c_date',cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Отменил', columngroup: 'Cancel', datafield: 'c_name', width: 120, cellsrenderer: cellsrenderer },
                                    { text: 'Основание', columngroup: 'Cancel', datafield: 'c_confirmname', width: 120 , cellsrenderer: cellsrenderer},
                                    { text: 'Дата', columngroup: 'Purchase', filtertype: 'date', datafield: 'date_prchs',cellsformat: 'dd.MM.yyyy', width: 100, cellsrenderer: cellsrenderer },
                                    { text: 'Статус', columngroup: 'Purchase', datafield: 'state_prchs', width: 120, cellsrenderer: cellsrenderer },
                                    { text: 'Сотрудник', columngroup: 'Purchase', datafield: 'name_prchs', width: 120, cellsrenderer: cellsrenderer },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Выдано со склада', align: 'center', name: 'Action' },
                                  { text: 'Отмена подтверждения', align: 'center', name: 'Cancel' },
                                  { text: 'Закупка', align: 'center', name: 'Purchase' },
                                ],
                            }));
//                    Find();
                    $('#edFiltering').click();
                break;
                case 5:
                    $("#edNotes5").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid5").on('rowselect', function (event) {
                        CurrentRowDataDoc8 = $('#Grid5').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc8 != undefined) {
                            $("#edNotes5").jqxTextArea('val', GetNotes(CurrentRowDataDoc8.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        SetStateButton();
                    });
                    
                    $("#Grid5").on("bindingcomplete", function (event) {
                        if (WHReestr.Docm_id > 0) {
                            Aliton.SelectRowByIdVirtual('docm_id', WHReestr.Docm_id, '#Grid5', false);
                            Docm_id = 0;
                            return;
                        }
                        if (CurrentRowDataDoc8 != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataDoc8.docm_id, '#Grid5', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#Grid5', false);
                    });
                    
                    $('#Grid5').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    $("#Grid5").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Склад источник', columngroup: 'Documents', datafield: 'storage', width: 130 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 120 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Склад приемник', columngroup: 'Action', datafield: 'in_storage', width: 130 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                ],
                            }));
//                    Find();
                    $('#edFiltering').click();
                break;
                case 6:
                    $("#edNotes6").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid6").on('rowselect', function (event) {
                        CurrentRowDataDoc7 = $('#Grid6').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc7 != undefined) {
                            
                            $("#edNotes6").jqxTextArea('val', GetNotes(CurrentRowDataDoc7.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        SetStateButton();
                    });
                    
                    $("#Grid6").on("bindingcomplete", function (event) {
                        if (WHReestr.Docm_id > 0) {
                            Aliton.SelectRowByIdVirtual('docm_id', WHReestr.Docm_id, '#Grid6', false);
                            Docm_id = 0;
                            return;
                        }
                        if (CurrentRowDataDoc7 != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataDoc7.docm_id, '#Grid6', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#Grid6', false);
                    });
                    
                    $('#Grid6').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    $("#Grid6").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'Address', width: 250 },
                                    { text: 'Пр-ка', columngroup: 'Documents', datafield: 'overday', width: 60 },
                                    { text: 'Склад', columngroup: 'Documents', datafield: 'storage', width: 60 },
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                    { text: 'От', columngroup: 'Action', datafield: 'mstr_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Принято на склад', align: 'center', name: 'Action' },
                                ],
                            }));
//                    Find();
                    $('#edFiltering').click();
                    
                break;
                case 7:
                    $("#edNotes7").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {placeHolder: "", width: '100%'}));
                    
                    $("#Grid7").on('rowselect', function (event) {
                        CurrentRowDataDoc9 = $('#Grid7').jqxGrid('getrowdata', event.args.rowindex);
                        
                        if (CurrentRowDataDoc9 != undefined) {
                            
                            $("#edNotes7").jqxTextArea('val', GetNotes(CurrentRowDataDoc9.docm_id));
                            $('#btnInfo').jqxButton({disabled: false});
                        }
                        
                        SetStateButton();
                    });
                    
                    $("#Grid7").on("bindingcomplete", function (event) {
                        if (WHReestr.Docm_id > 0) {
                            Aliton.SelectRowByIdVirtual('docm_id', WHReestr.Docm_id, '#Grid7', false);
                            Docm_id = 0;
                            return;
                        }
                        if (CurrentRowDataDoc9 != undefined) 
                            Aliton.SelectRowByIdVirtual('docm_id', CurrentRowDataDoc9.docm_id, '#Grid7', false);
                        else
                            Aliton.SelectRowByIdVirtual('docm_id', null, '#Grid7', false);
                    });
                    
                    $('#Grid7').on('rowdoubleclick', function (event) { 
                        $('#btnInfo').click();
                    });
                    
                    $("#Grid7").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 'calc(100% - 2px)',
                            width: 'calc(100% - 2px)',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesize: 200,
                            virtualmode: true,
                            columns:
                                [
                                    { text: 'Статус', columngroup: 'Documents', datafield: 'status', width: 100 },
                                    { text: 'Номер', columngroup: 'Documents', datafield: 'number', width: 100 },
                                    { text: 'Дата', columngroup: 'Documents', filtertype: 'date', datafield: 'date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Дата создания', columngroup: 'Documents', filtertype: 'date', datafield: 'date_create', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Адрес', columngroup: 'Documents', datafield: 'address', width: 250 },
                                    { text: 'Мастер', columngroup: 'Documents', datafield: 'dmnd_empl_name', width: 150 },
                                    
                                    { text: 'Дата', columngroup: 'Action', filtertype: 'date', datafield: 'ac_date', cellsformat: 'dd.MM.yyyy', width: 100 },
                                    { text: 'Склад', columngroup: 'Action', datafield: 'storage', width: 60 },
                                    { text: 'Кладовщик', columngroup: 'Action', datafield: 'strm_name', width: 120 },
                                ],
                            columngroups: 
                                [
                                  { text: 'Накладная', align: 'center', name: 'Documents' },
                                  { text: 'Выдано', align: 'center', name: 'Action' },
                                ],
                            }));
//                    Find();
                    $('#edFiltering').click();
                break;
            }
        };
        
        
        $('#edTabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets });
        var defaultTabIndex = 4;
        var tabIndex = Aliton.GetTabIndexFromURL(defaultTabIndex);
        $('#edTabs').jqxTabs('select', tabIndex);
        
        $("#btnCreate").on('click', function(){
            if (Dctp_id == 1)
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 440, position: 'center', isModal: true});
            if (Dctp_id == 2)
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 380, position: 'center', isModal: true});
            if (Dctp_id == 3)
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 380, position: 'center', isModal: true});
            if (Dctp_id == 4)
                $('#WHDocumentsDialog').jqxWindow({width: 810, height: 490, position: 'center', isModal: true});
            if (Dctp_id == 8)
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 290, position: 'center', isModal: true});
            if (Dctp_id == 7)
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 290, position: 'center', isModal: true});
            if (Dctp_id == 9)
                $('#WHDocumentsDialog').jqxWindow({width: 600, height: 300, position: 'center', isModal: true});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Create')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Dctp_id: Dctp_id, 
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHDocumentsDialog").html(Res.html);
                    $('#WHDocumentsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
            
            
        });
        
        $("#btnDel").on('click', function(){
            if ($("#btnDel").jqxButton('disabled')) return;
            var TabIndex = $('#edTabs').jqxTabs('selectedItem');
            var Docm_id = 0;
            var NextDocm_id = 0;
            var Idx = 0;
            switch (TabIndex) {
                case 0: Docm_id = CurrentRowDataAll.docm_id; break;
                case 1: 
                    Docm_id = CurrentRowDataDoc1.docm_id;
                    Idx = $('#Grid1').jqxGrid('selectedrowindex');
                    NextDocm_id = $('#Grid1').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
                    break;
                case 2: 
                    Docm_id = CurrentRowDataDoc2.docm_id;
                    Idx = $('#Grid2').jqxGrid('selectedrowindex');
                    NextDocm_id = $('#Grid2').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
                    break;
                case 3:
                    Docm_id = CurrentRowDataDoc3.docm_id;
                    Idx = $('#Grid3').jqxGrid('selectedrowindex');
                    NextDocm_id = $('#Grid3').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
                    break;
                case 4:
                    Docm_id = CurrentRowDataDoc4.docm_id;
                    Idx = $('#Grid4').jqxGrid('selectedrowindex');
                    NextDocm_id = $('#Grid4').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
                    break;
                case 5: 
                    Docm_id = CurrentRowDataDoc8.docm_id;
                    Idx = $('#Grid5').jqxGrid('selectedrowindex');
                    NextDocm_id = $('#Grid5').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
                    break;
                case 6: 
                    Docm_id = CurrentRowDataDoc7.docm_id;
                    Idx = $('#Grid6').jqxGrid('selectedrowindex');
                    NextDocm_id = $('#Grid6').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
                    break;
                case 7:
                    Docm_id = CurrentRowDataDoc9.docm_id;
                    Idx = $('#Grid7').jqxGrid('selectedrowindex');
                    NextDocm_id = $('#Grid7').jqxGrid('getcellvalue', (Idx + 1), 'docm_id');
                    break;
            };
            
            if (Docm_id > 0) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Docm_id: Docm_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result === 1) {
                            WHReestr.Docm_id = NextDocm_id;
                            $("#btnRefresh").click();
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $("#btnUndo").on('click', function(){
            var Docm_id = 0;
            var Dctp_id = 0;
            var Achs_id = 0;
            var TabIndex = $('#edTabs').jqxTabs('selectedItem');
            switch (TabIndex) {
                case 0: Docm_id = CurrentRowDataAll.docm_id; Dctp_id = CurrentRowDataAll.dctp_id; Achs_id = CurrentRowDataAll.achs_id; break;
                case 1: Docm_id = CurrentRowDataDoc1.docm_id; Dctp_id = CurrentRowDataDoc1.dctp_id; Achs_id = CurrentRowDataDoc1.achs_id; break;
                case 2: Docm_id = CurrentRowDataDoc2.docm_id; Dctp_id = CurrentRowDataDoc2.dctp_id; Achs_id = CurrentRowDataDoc2.achs_id; break;
                case 3: Docm_id = CurrentRowDataDoc3.docm_id; Dctp_id = CurrentRowDataDoc3.dctp_id; Achs_id = CurrentRowDataDoc3.achs_id; break;
                case 4: Docm_id = CurrentRowDataDoc4.docm_id; Dctp_id = CurrentRowDataDoc4.dctp_id; Achs_id = CurrentRowDataDoc4.achs_id; break;
                case 5: Docm_id = CurrentRowDataDoc8.docm_id; Dctp_id = CurrentRowDataDoc8.dctp_id; Achs_id = CurrentRowDataDoc8.achs_id; break;
                case 6: Docm_id = CurrentRowDataDoc7.docm_id; Dctp_id = CurrentRowDataDoc7.dctp_id; Achs_id = CurrentRowDataDoc7.achs_id; break;
                case 7: Docm_id = CurrentRowDataDoc9.docm_id; Dctp_id = CurrentRowDataAll.dctp_id; Achs_id = CurrentRowDataDoc9.achs_id; break;
            };
            
            if ($("#btnUndo").jqxButton('disabled')) return;
            $('#WHDocumentsDialog').jqxWindow({width: 400, height: 140, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/ConfirmCancel')) ?>,
                type: 'POST',
                async: false,
                data: {
                    Dctp_id: Dctp_id, 
                    Achs_id: Achs_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyWHDocumentsDialog").html(Res.html);
                    $('#WHDocumentsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });
        
        
    });
</script>


<style>
    .backlight_pink {
        color: #E000E0;
    }
    .backlight_pink {
        color: #FF0000;
    }
</style> 

<?php $this->setPageTitle('Склад - реестр документов'); ?>

<?php
    $this->breadcrumbs=array(
            'Главная'=>array('/Site/index'),
            'Реестр документов'=>array('index'),
    );
?>

<div class="al-row" style="height: calc(100% - 46px)">
    <div id='edTabs'>
        <ul style="margin-left: 20px">
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Все документы</div>

                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладные на приход</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладные на возрат</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Требования на возврат поставщику</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Требования на выдачу</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Перемещение со склада на склад</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Перемещение из ПРЦ на Склад</div>
                </div>
            </li>
            <li>
                <div style="height: 20px; margin-top: 5px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">Накладная на возврат мастеру</div>
                </div>
            </li>
        </ul>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 112px)">
                    <div id="GridAll"></div>
                </div>
                <div class="al-row"><div class="row-column">Примечание</div></div>
                <div class="al-row"><textarea id="edNotesAll" readonly="readonly"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 112px)">
                    <div id="Grid1"></div>
                </div>
                <div class="al-row"><div class="row-column">Примечание</div></div>
                <div class="al-row"><textarea id="edNotes1" readonly="readonly"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 112px)">
                    <div id="Grid2"></div>
                </div>
                <div class="al-row"><div class="row-column">Примечание</div></div>
                <div class="al-row"><textarea id="edNotes2" readonly="readonly"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 112px)">
                    <div id="Grid3"></div>
                </div>
                <div class="al-row"><div class="row-column">Примечание</div></div>
                <div class="al-row"><textarea id="edNotes3" readonly="readonly"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 150px)">
                    <div id="Grid4"></div>
                </div>
                <div>
                    <input type="button" id="btnReady" value="Готово к выдаче"/>
                    <input type="button" id="btnUndoReady" value="Снять готовность"/>
                </div>
                <div><div class="row-column">Примечание</div></div>
                <div><textarea id="edNotes4" readonly="readonly"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 112px)">
                    <div id="Grid5"></div>
                </div>
                <div class="al-row"><div class="row-column">Примечание</div></div>
                <div class="al-row"><textarea id="edNotes5" readonly="readonly"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 112px)">
                    <div id="Grid6"></div>
                </div>
                <div class="al-row"><div class="row-column">Примечание</div></div>
                <div class="al-row"><textarea id="edNotes6" readonly="readonly"></textarea></div>
            </div>
        </div>
        <div style="overflow: hidden;">
            <div style="padding: 5px; height: 100%">
                <div class="al-row" style="height: calc(100% - 112px)">
                    <div id="Grid7"></div>
                </div>
                <div class="al-row"><div class="row-column">Примечание</div></div>
                <div class="al-row"><textarea id="edNotes7" readonly="readonly"></textarea></div>
            </div>
        </div>
    </div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Дополнительно" id='btnInfo' /></div>
    <div class="al-row-column"><input type="button" value="Создать" id='btnCreate' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefresh' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='btnDel' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Отменить подтв." id='btnUndo' /></div>
    <div style="clear: both"></div>
</div>


<div id="WHDocumentsDialog" style="display: none;">
    <div id="WHDocumentsDialogHeader">
        <span id="WHDocumentsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogWHDocumentsContent">
        <div style="" id="BodyWHDocumentsDialog"></div>
    </div>
</div>
