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
                width: '100%',
                height: '700',
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
        
        $('#EditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '570px', width: '380'}));
        
        $('#EditDialog').jqxWindow({initContent: function() {
            $("#btnOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        }});

        $("#btnCancel").on('click', function () {
            $('#EditDialog').jqxWindow('close');
        });
        
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
                        $('#EditDialog').jqxWindow('close');
                        $("#ObjectsGroupSystemsGrid").jqxGrid('updatebounddata');
//                        $('#ObjectsGroupSystemsGrid').jqxGrid({source: LoadData(OGSystemsDataAdapter)});
                    } else {
                        $('#BodyDialog').html(Res);
                    }

                }
            });
        }

        $("#btnOk").on('click', function () {
            SendForm(Mode);
        });
            
        
        $("#NewObjectsGroupSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#EditObjectsGroupSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $("#DelObjectsGroupSystem").jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
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
                    $('#BodyDialog').html(Res);
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
                    $('#BodyDialog').html(Res);
                }
            });
        }
        
        $('#ObjectsGroupSystemsGrid').on('rowdoubleclick', function (event) { 
            $("#EditObjectsGroupSystem").click();
        });
        
        $("#NewObjectsGroupSystem").on('click', function () 
        {
            Mode = 'Insert';
            LoadFormInsert(OGSystems.ObjectGr_id);
            $('#EditDialog').jqxWindow('open');
        });
        
        $("#EditObjectsGroupSystem").on('click', function ()
        {
            Mode = 'Edit';
            LoadFormUpdate(CurrentRowData.ObjectsGroupSystem_id);
            $('#EditDialog').jqxWindow('open');
        });
           
        $("#DelObjectsGroupSystem").on('click', function ()
        {
            $.ajax({
                type: "POST",
                url: "/index.php?r=ObjectsGroupSystems/Delete",
                data: { ObjectsGroupSystem_id: CurrentRowData.ObjectsGroupSystem_id },
                success: function(){
                    $("#ObjectsGroupSystemsGrid").jqxGrid('updatebounddata');
                }
            });
        });
        
            
    });
    
        
</script>

<div class="row">
    <div id="ObjectsGroupSystemsGrid" class="jqxGridAliton"></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Создать" id='NewObjectsGroupSystem' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='EditObjectsGroupSystem' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='DelObjectsGroupSystem' /></div>
</div>


    <div id="EditDialog">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="DialogContent">
        <div style="overflow: hidden;" id="BodyDialog"></div>
        <div id="BottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancel' /></div>
            </div>
        </div>
    </div>
</div>