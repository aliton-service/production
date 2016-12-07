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

        $("#ControlWHDocumentsGrid").on('rowselect', function (event) {
            var Temp = $('#ControlWHDocumentsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null;}
            console.log(CurrentRowData);
            if (CurrentRowData != undefined) {
                $("#notes").jqxTextArea('val', GetNotes(CurrentRowData.docm_id));
                $('#btnNewNote').jqxButton({disabled: false});
                $('#btnOpenObjectGroup').jqxButton({disabled: false});
            }
        });
        
        
        $('#ControlWHDocumentsGrid').on('rowdoubleclick', function () {
            window.open('/index.php?r=Documents/Index&ContrS_id=' + CurrentRowData.ContrS_id + PropForm_id);
        });

        $("#ControlWHDocumentsGrid").on('bindingcomplete', function () {
            $("#ControlWHDocumentsGrid").jqxGrid('selectrow', 0);
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
                        console.log('finish0');
                    if (Res.result = 1) {
                        console.log('finish1');
                        location.reload();
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
<div class="row"><input type="button" value="Открыть требование" id='btnOpenObjectGroup' /></div>