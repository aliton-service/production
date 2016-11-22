<script type="text/javascript">
    $(document).ready(function () {
        
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var OGSystems = {
            ObjectGr_id: '<?php echo $ObjectGr_id; ?>',
        };
            
        var OGSystemsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectsGroupSystems, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["s.ObjectGr_id = " + OGSystems.ObjectGr_id],
                });
                return data;
            },
        });
            
        $("#ObjectsGroupSystemsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                showfilterrow: false,
                virtualmode: false,
                width: 'calc(100% - 2px)',
                height: 'calc(100% - 2px)',
                source: OGSystemsDataAdapter,
                columns: [
                    { text: 'Наличие системы', dataField: 'Availability', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Кол-во систем', dataField: 'count', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                    { text: 'Обслуживающие организации', dataField: 'Competitors', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Тип системы', dataField: 'SystemTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                    { text: 'Условия', dataField: 'Condition', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                ]
            })
        );
        
        $('#EditDialogOGSystems').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '460px', width: '600'}));
        
        $('#EditDialogOGSystems').jqxWindow({initContent: function() {
//            $("#btnOkOGSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
//            $("#btnCancelOGSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

//        $("#btnCancelOGSystems").on('click', function () {
//            $('#EditDialogOGSystems').jqxWindow('close');
//        });
        
        SendForm = function(Mode, Form) {
            var Url;
            if (Mode == 'Insert')
                Url = "<?php echo Yii::app()->createUrl('ObjectsGroupSystems/Insert');?>";
            if (Mode == 'Edit')
                Url = "<?php echo Yii::app()->createUrl('ObjectsGroupSystems/Update');?>";
            
            var Data;
            if (Form == undefined)
                Data = $('#ObjectsGroupSystems').serialize();
            else Data = Form;
                
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    if (Res == '1' || Res == 1) {
                        $('#EditDialogOGSystems').jqxWindow('close');
                        $("#ObjectsGroupSystemsGrid").jqxGrid('updatebounddata');
                        $("#ObjectsGroupSystemsGrid").jqxGrid('selectrow', 0);
                    } else {
                        $('#BodyDialogOGSystems').html(Res);
                    }

                }
            });
        }

//        $("#btnOkOGSystems").on('click', function () {
//            SendForm(Mode);
//        });
            
        
        $("#NewObjectsGroupSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditObjectsGroupSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelObjectsGroupSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#RefreshObjectsGroupSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        
        $("#RefreshObjectsGroupSystem").on('click', function() {
            $("#ObjectsGroupSystemsGrid").jqxGrid('updatebounddata');
        });
        
        $("#ObjectsGroupSystemsGrid").on('rowselect', function (event) {
            var Temp = $('#ObjectsGroupSystemsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (Temp !== undefined) {
                CurrentRowData = Temp;
            } else {CurrentRowData = null};
        });
        
        LoadFormInsert = function(ObjectGr_id) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ObjectsGroupsystems/Insert');?>",
                type: 'POST',
                async: false,
                data: {
                    ObjectGr_id: ObjectGr_id
                },
                success: function(Res) {
                    $('#BodyDialogOGSystems').html(Res);
                    $('#EditDialogOGSystems').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        }
        
        LoadFormUpdate = function(ObjectsGroupSystem_id) {
            $.ajax({
                url: "<?php echo Yii::app()->createUrl('ObjectsGroupsystems/Update');?>",
                type: 'POST',
                async: false,
                data: {
                    ObjectsGroupSystem_id: ObjectsGroupSystem_id
                },
                success: function(Res) {
                    $('#BodyDialogOGSystems').html(Res);
                    $('#EditDialogOGSystems').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        }
        
        $('#ObjectsGroupSystemsGrid').on('rowdoubleclick', function (event) { 
            $("#EditObjectsGroupSystem").click();
        });
        
//        console.log('OGSystems.ObjectGr_id = ' + OGSystems.ObjectGr_id);
        
        $("#NewObjectsGroupSystem").on('click', function () 
        {
            Mode = 'Insert';
            LoadFormInsert(OGSystems.ObjectGr_id);
        });
        
        $("#EditObjectsGroupSystem").on('click', function ()
        {
            Mode = 'Edit';
            LoadFormUpdate(CurrentRowData.ObjectsGroupSystem_id);
            
        });
           
        $("#DelObjectsGroupSystem").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ObjectsGroupSystems/Delete",
                data: { ObjectsGroupSystem_id: CurrentRowData.ObjectsGroupSystem_id },
                success: function(){
                    $("#ObjectsGroupSystemsGrid").jqxGrid('updatebounddata');
                    $("#ObjectsGroupSystemsGrid").jqxGrid('selectrow', 0);
                }
            });
        });
        
            
    });
    
        
</script>

<style>
    
    #ObjectsGroupSystemsGrid .jqx-fill-state-pressed {
        background-color: #A7D2BB !important;
        color: black;
    }
     
</style>

<div class="al-row" style="height: calc(100% - 68px)">
    <div id="ObjectsGroupSystemsGrid" class="jqxGridAliton"></div>
</div>

<div class="al-row">
    <div class="al-row-column"><input type="button" value="Создать" id='NewObjectsGroupSystem' /></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='EditObjectsGroupSystem' /></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='RefreshObjectsGroupSystem' /></div>
    <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='DelObjectsGroupSystem' /></div>
    <div style="clear: both"></div>
</div>


<div id="EditDialogOGSystems" style="display: none;">
    <div id="DialogHeaderOGSystems">
        <span id="HeaderTextOGSystems">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogContentOGSystems">
        <div id="BodyDialogOGSystems"></div>
    </div>
</div>