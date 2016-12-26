<script type="text/javascript">
    $(document).ready(function () {
        var CurrentRowData;
        var ControlWHDocuments = {};
        
//        var DataControlWHDocuments = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceControlWHDocuments, {
//            filter: function () {
//                $("#ControlWHDocumentsGrid").jqxGrid('updatebounddata', 'filter');
//            },
//            sort: function () {
//                $("#ControlWHDocumentsGrid").jqxGrid('updatebounddata', 'sort');
//            }
//        }));

        $("#ControlWHDocumentsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: true,
                filterable: true,
                virtualmode: true,
                width: '99.8%',
                height: '99%',
//                source: DataControlWHDocuments,
                columns: [
                    { text: 'Наименование оборудования', dataField: 'equipname', columntype: 'textbox', filtercondition: 'CONTAINS', width: 350 },
                    { text: 'Ед.изм.', dataField: 'um_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 60 },
                    { text: 'Кол-во', dataField: 'quant', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 60 },
                    { text: 'Б/У', dataField: 'used', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 40 },
                    { text: 'Адрес', dataField: 'Addr', columntype: 'textbox', filtercondition: 'CONTAINS', width: 350 },
                    { text: 'Дата возврата', dataField: 'plan_date', columntype: 'textbox', filtercondition: 'STARTS_WITH', cellsformat: 'dd.MM.yyyy', width: 120 },
                    { text: 'Заявка', dataField: 'demand_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 80 },
                    { text: 'Кому выдано', dataField: 'dmnd_empl_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Дата выдачи', dataField: 'ac_date', columntype: 'textbox', filtercondition: 'STARTS_WITH', cellsformat: 'dd.MM.yyyy', width: 110 },
                    { text: 'Номер', dataField: 'number', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                    { text: 'Выписал', dataField: 'empl_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                    { text: 'Предельная дата', dataField: 'deadline', columntype: 'textbox', filtercondition: 'STARTS_WITH', cellsformat: 'dd.MM.yyyy', width: 130 },
                    { text: 'Пр-ка', dataField: 'overday', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 50 },
                    { text: 'Серийный номер', dataField: 'SN', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 180 },
                    { text: 'Затребовал', dataField: 'dmnd_empl_id', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100, hidden: true },
                ]
            })
        );

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
        
        $("#ControlWHDocumentsGrid").on('rowselect', function (event) {
            var Temp = $('#ControlWHDocumentsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null;}
//            console.log(CurrentRowData);
            if (CurrentRowData != undefined) {
                $("#notes").jqxTextArea('val', GetNotes(CurrentRowData.docm_id));
                $('#btnNewNote').jqxButton({disabled: false});
                $('#btnOpenObjectGroup').jqxButton({disabled: false});
            }
        });
        
        
        $('#ControlWHDocumentsGrid').on('rowdoubleclick', function (event) { 
            $('#btnOpenObjectGroup').click();
        });

        $("#ControlWHDocumentsGrid").on('bindingcomplete', function () {
            $("#ControlWHDocumentsGrid").jqxGrid('selectrow', 0);
        });
        
        
        $("#notes").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 120 }));
        $("#inputNewNote").jqxInput($.extend(true, {}, InputDefaultSettings, { width: '100%' }));
        $("#btnNewNote").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 250, disabled: true }));
        
        ControlWHDocuments.AddNote = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WHDocuments/AddNote')); ?>,
                type: 'POST',
                data: {
                    Note: {
                        docm_id: CurrentRowData.docm_id,
                        note: $('#inputNewNote').val()
                    }
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result = 1) {
                        $("#notes").jqxTextArea('val', GetNotes(CurrentRowData.docm_id));
                    }
                },
                error: function(Res){
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        };
        
        $("#inputNewNote").on('keyup', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                ControlWHDocuments.AddNote();
                $('#inputNewNote').val('');
                return false;
            }
        });
        
        $("#btnNewNote").on('click', function () {
            ControlWHDocuments.AddNote();
            $('#inputNewNote').val('');
            return false;
        });
        
        
        $("#btnOpenObjectGroup").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 180, disabled: true }));
        
        $("#btnOpenObjectGroup").on('click', function () {
            window.open(<?php echo json_encode(Yii::app()->createUrl('WHDocuments/View'))?> + '&Docm_id=' + CurrentRowData.docm_id);
        });
        
        $('#btnExport').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnExport').on('click', function() {
            $("#ControlWHDocumentsGrid").jqxGrid('exportdata', 'xls', 'Контроль возвратов', true, null, true, <?php echo json_encode(Yii::app()->createUrl('Reports/UpLoadFileGrid'))?>);
        });
        
        var Init = function() {
            var ListSource = [
                { label: 'Наименование оборудования', value: 'equipname', checked: true },
                { label: 'Ед.изм.', value: 'um_name', checked: true },
                { label: 'Кол-во', value: 'quant', checked: true },
                { label: 'Б/У', value: 'used', checked: true },
                { label: 'Адрес', value: 'Addr', checked: true },
                { label: 'Дата возврата', value: 'plan_date', checked: true },
                { label: 'Заявка', value: 'demand_id', checked: true },
                { label: 'Кому выдано', value: 'dmnd_empl_name', checked: true },
                { label: 'Дата выдачи', value: 'ac_date', checked: true },
                { label: 'Номер', value: 'number', checked: true },
                { label: 'Выписал', value: 'empl_name', checked: true },
                { label: 'Предельная дата', value: 'deadline', checked: true },
                { label: 'Пр-ка', value: 'overday', checked: true },
                { label: 'Серийный номер', value: 'SN', checked: true },
                { label: 'Затребовал', value: 'dmnd_empl_id', checked: false },
            ];
            
            $("#ColumnsList").jqxListBox({ source: ListSource, width: 'calc(100% - 2px)', height: 'calc(100% - 2px)',  checkboxes: true });
            $("#ColumnsList").on('checkChange', function (event) {
                $("#ControlWHDocumentsGrid").jqxGrid('beginupdate');
                if (event.args.checked) {
                    $("#ControlWHDocumentsGrid").jqxGrid('showcolumn', event.args.value);
                }
                else {
                    $("#ControlWHDocumentsGrid").jqxGrid('hidecolumn', event.args.value);
                }
                $("#ControlWHDocumentsGrid").jqxGrid('endupdate');
            });
        };
        
        $('#SettingsColumnsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 400, height: 300, position: 'center', isModal: true, initContent: Init()}));
        
        $("#btnSittings").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 180, disabled: false }));
        $("#btnSittings").on('click', function() {
            $('#SettingsColumnsDialog').jqxWindow('open');
        });
        
    });
</script> 

<div style="height: calc(100% - 250px);">
    <div id="ControlWHDocumentsGrid" class="jqxGridAliton"></div>
</div>
<div class="row" style="padding-right: 5px;">Примечание + Ход работ: <textarea readonly id="notes" style="padding: 0;"></textarea></div>
<div class="row">
    <div class="row-column" style="width: calc(100% - 263px);"><input type="text" id='inputNewNote' /></div>
    <div class="row-column"><input type="button" value="Добавить запись в ход работ" id='btnNewNote' /></div>
</div>
<div class="row">
    <input type="button" value="Открыть требование" id='btnOpenObjectGroup' />
    <input type="button" value="Экспорт" id='btnExport' />
    <input type="button" value="Настройка колонок" id='btnSittings' />
</div>

<div id="SettingsColumnsDialog" style="display: none;">
    <div id="SettingsColumnsDialogHeader">
        <span id="SettingsColumnsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogSettingsColumnsContent">
        <div style="" id="BodySettingsColumnsDialog">
            <div style="float: left;" id="ColumnsList"></div>
        </div>
    </div>
</div>