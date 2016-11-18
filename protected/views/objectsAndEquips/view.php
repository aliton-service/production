<script type="text/javascript">
    $(document).ready(function(){
        var Mode = '';
        var House = {
            ObjectGr_id: <?php echo json_encode($ObjectGr_id); ?>,
            CommonObject_id: <?php echo json_encode($CommonObject_id); ?>
        };
        
        var ObjectCorrentRow = {};
        var EquipCurrentRow = {};
        var EquipCommonCurrentRow = {};
        
        var DataObjects = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjects, {}), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["o.ObjectGr_id = " + House.ObjectGr_id, "o.Doorway <> 'Общее'"],
                });
                return data;
            },
        });
        
        $('#edObjectNote').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { height: 180, width: 600, minLength: 1 }));
        $('#btnAddObject').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditObject').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelObject').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        
        $('#EditObjectDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '500px', width: '580'}));
        
        $('#EditObjectDialog').jqxWindow({initContent: function() {
            $('#btnObjectOk').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnObjectCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnObjectCancel').on('click', function(){
                $('#EditObjectDialog').jqxWindow('close');   
            });
            $('#btnObjectOk').on('click', function(){
                Save(Mode);
            });
        }});
    
        $('#EditObjectEquipDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '420px', width: '580'}));
        $('#EditObjectEquipDialog').jqxWindow({initContent: function() {
            $('#btnObjectEquipOk').jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: true, width: 120, height: 30 }));
            $('#btnObjectEquipCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
            $('#btnObjectEquipCancel').on('click', function(){
                $('#EditObjectEquipDialog').jqxWindow('close');   
            });
            $('#btnObjectEquipOk').on('click', function(){
                if (Mode == 'Insert')
                    SaveEquip('<?php echo Yii::app()->createUrl('ObjectEquips/Insert'); ?>');
                if (Mode == 'Update')
                    SaveEquip('<?php echo Yii::app()->createUrl('ObjectEquips/Update'); ?>');
            });
        }});
        
        $('#btnAddObject').on('click', function(){
            Mode = 'Insert';
            LoadEditForm('Insert', 0, House.ObjectGr_id);
            $('#EditObjectDialog').jqxWindow('open');
        });
        
        $('#btnEditObject').on('click', function(){
            Mode = 'Update';
            LoadEditForm(Mode, ObjectCorrentRow.Object_id, House.ObjectGr_id);
            $('#EditObjectDialog').jqxWindow('open');
        });
        
        $('#btnDelObject').on('click', function(){
            $.ajax({
                url: '<?php echo Yii::app()->createUrl('Object/Delete'); ?>',
                type: 'POST',
                async: false,
                data: {
                    Object_id: ObjectCorrentRow.Object_id
                },
                success: function(Res) {
                    if (Res === '1') {
                        $('#EditObjectDialog').jqxWindow('close');
                        $("#ObjectsGrid").jqxGrid('updatebounddata');
                    }
                    else
                        $('#EditObjectDialog #BodyDialog').html(Res);
                }
            });
        });
        
        DeleteEquip = function(Code) {
            $.ajax({
                url: '<?php echo Yii::app()->createUrl('ObjectEquips/Delete'); ?>',
                type: 'POST',
                async: false,
                data: {Code: Code},
                success: function(Res) {
                    if (Res === '1') {
                        $('#EditObjectEquipDialog').jqxWindow('close');
                        $("#ObjectEquipsGrid").jqxGrid('updatebounddata');
                        $('#ObjectEquipsGrid').jqxGrid('selectrow', 0);
                        $("#CommonEquipsGrid").jqxGrid('updatebounddata');
                        $('#CommonEquipsGrid').jqxGrid('selectrow', 0);
                    }
                }
            });
        };
        
        SaveEquip = function(Url) {
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: $('#ObjectEquips').serialize(),
                success: function(Res) {
                    if (Res === '1') {
                        $('#EditObjectEquipDialog').jqxWindow('close');
                        $("#ObjectEquipsGrid").jqxGrid('updatebounddata');
                        $("#CommonEquipsGrid").jqxGrid('updatebounddata');
                    }
                    else
                        $('#BodyObjectEquipDialog').html(Res);
                }
            });
        };
        
        Save = function(Mode) {
            var Url = '';
            if (Mode == 'Insert')
                Url = '<?php echo Yii::app()->createUrl('Object/Insert');?>';
            if (Mode == 'Update')
                Url = '<?php echo Yii::app()->createUrl('Object/Update');?>';
        
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: $('#Objects').serialize(),
                success: function(Res) {
                    if (Res === '1') {
                        $('#EditObjectDialog').jqxWindow('close');
                        $("#ObjectsGrid").jqxGrid('updatebounddata');
                    }
                    else {
                        $('#BodyDialog').html(Res);
                    }
                }
            });
        };
        
        LoadEditForm = function(Mode, Object_id, ObjectGr_id) {
            var Url = '';
            if (Mode == 'Insert')
                Url = '<?php echo Yii::app()->createUrl('Object/Insert');?>';
            if (Mode == 'Update')
                Url = '<?php echo Yii::app()->createUrl('Object/Update');?>';
        
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: {
                    Object_id: Object_id,
                    ObjectGr_id: ObjectGr_id
                },
                success: function(Res) {
                    $('#EditObjectDialog #BodyDialog').html(Res);
                }
            });
        };
        
        LoadObjectEquips = function() {
            var DataObjectEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectEquips, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["o.Object_id = " + ObjectCorrentRow.Object_id],
                    });
                    return data;
                },
            });
            DataObjectEquips.dataBind();
            $("#ObjectEquipsGrid").jqxGrid({source: DataObjectEquips});
        };
        
        LoadForm = function(Url, Data, Elem, AfterFunction) {
            if (Data == undefined)
                Data = {};
            
            $.ajax({
                url: Url,
                type: 'POST',
                async: false,
                data: Data,
                success: function(Res) {
                    //Elem.html(Res);
                    eval(AfterFunction);
                }
            });
        };
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    $("#ObjectEquipsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 200,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize:200,
                            virtualmode: false,
                            columns:
                                [
                                    { text: 'Оборудование', datafield: 'EquipName', width: 200 },
                                    { text: 'Кол-во', datafield: 'EquipQuant', width: 60 },
                                    { text: 'Описание оборудования', datafield: 'StockNumber', width: 150 },
                                    { text: 'Дата установки', cellsformat: 'dd.MM.yyyy', datafield: 'DateInstall', width: 100 },
                                    { text: 'Дата постановки на обслуживание', cellsformat: 'dd.MM.yyyy', datafield: 'DateService', width: 140 },
                                    { text: 'Местоположение', datafield: 'Location', width: 100 },
                                ],
                            }));
                    
                    $('#btnAddEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnEditEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDelEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    $('#btnAddEquip').on('click', function(){
                        Mode = 'Insert';
                        LoadForm('<?php echo Yii::app()->createUrl('ObjectEquips/Insert'); ?>', {Object_Id: ObjectCorrentRow.Object_id}, $('#BodyObjectEquipDialog'), 'Elem.html(Res);');
                        $('#EditObjectEquipDialog').jqxWindow('open');
                    });
                    
                    $('#btnEditEquip').on('click', function(){
                        Mode = 'Update';
                        LoadForm('<?php echo Yii::app()->createUrl('ObjectEquips/Update'); ?>', {Code: EquipCurrentRow.Code}, $('#BodyObjectEquipDialog'), 'Elem.html(Res);');
                        $('#EditObjectEquipDialog').jqxWindow('open');
                    });
                    
                    $('#ObjectEquipsGrid').on('rowdoubleclick', function (event) { 
                        $("#btnEditEquip").click();
                    });
                    
                    $('#btnDelEquip').on('click', function(){
                        if (EquipCurrentRow != undefined)
                            DeleteEquip(EquipCurrentRow.Code);
                    });
                    
                    $("#ObjectEquipsGrid").on('rowselect', function(event){
                        EquipCurrentRow = $('#ObjectEquipsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
        
                    break;
                case 1:
                    var DataCommonEquips = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectEquips, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["o.Object_id = " + House.CommonObject_id],
                            });
                            return data;
                        },
                    });
                    
                    $("#CommonEquipsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            height: 200,
                            width: '100%',
                            showfilterrow: false,
                            autoshowfiltericon: true,
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize:200,
                            source: DataCommonEquips,
                            virtualmode: false,
                            columns:
                            [
                                { text: 'Оборудование', datafield: 'EquipName', width: 200 },
                                { text: 'Кол-во', datafield: 'EquipQuant', width: 60 },
                                { text: 'Описание оборудования', datafield: 'StockNumber', width: 150 },
                                { text: 'Дата установки', cellsformat: 'dd.MM.yyyy', datafield: 'DateInstall', width: 100 },
                                { text: 'Дата постановки на обслуживание', cellsformat: 'dd.MM.yyyy', datafield: 'DateService', width: 140 },
                                { text: 'Местоположение', datafield: 'Location', width: 100 },
                            ],
                        })
                    );
                    
                    $('#btnAddCommonEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnEditCommonEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    $('#btnDelCommonEquip').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
                    
                    $('#btnAddCommonEquip').on('click', function(){
                        Mode = 'Insert';
                        LoadForm('<?php echo Yii::app()->createUrl('ObjectEquips/Insert'); ?>', {ObjectGr_id: House.ObjectGr_id}, $('#BodyObjectEquipDialog'), 'Elem.html(Res);');
                        $('#EditObjectEquipDialog').jqxWindow('open');
                    });
                    
                    $('#btnEditCommonEquip').on('click', function(){
                        Mode = 'Update';
                        LoadForm('<?php echo Yii::app()->createUrl('ObjectEquips/Update'); ?>', {Code: EquipCommonCurrentRow.Code}, $('#BodyObjectEquipDialog'), 'Elem.html(Res);');
                        $('#EditObjectEquipDialog').jqxWindow('open');
                    });
                    
                    $('#CommonEquipsGrid').on('rowdoubleclick', function (event) { 
                        $("#btnEditCommonEquip").click();
                    });
                    
                    $('#btnDelCommonEquip').on('click', function(){
                        if (EquipCommonCurrentRow != undefined)
                            DeleteEquip(EquipCommonCurrentRow.Code);
                    });
                    
                    $("#CommonEquipsGrid").on('rowselect', function(event){
                        EquipCommonCurrentRow = $('#CommonEquipsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#CommonEquipsGrid").jqxGrid('selectrow', 0);
                    
                    break;
            }
        };
        
        $('#EquipTabs').jqxTabs({ width: '100%', height: 300,  initTabContent: initWidgets });
        
        $("#ObjectsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                height: 200,
                width: '650px',
                showfilterrow: false,
                autoshowfiltericon: true,
                source: DataObjects,
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize:200,
                virtualmode: false,
                columns:
                [
                    { text: 'Число квартир', datafield: 'ObjectTypeName', width: 60 },
                    { text: 'Подъезд', datafield: 'Doorway', width: 70},
                    { text: 'Тип', datafield: 'ComplexityName', width: 40},
                    { text: 'Условия', datafield: 'Condition', width: 100},
                    { text: 'Мастер ключ', datafield: 'MasterKey', width: 100},
                    { text: 'Код', datafield: 'Code', width: 100},
                    { text: 'Сигнал ОДС', datafield: 'Signal', width: 90},
                    { text: 'Тип связи', datafield: 'ConnectionType', width: 90},
                ],
            }));
        
        $('#ObjectsGrid').on('rowdoubleclick', function (event) { 
            $("#btnEditObject").click();
        });
        
        $("#ObjectsGrid").on('rowselect', function(event){
            ObjectCorrentRow = $('#ObjectsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (ObjectCorrentRow != undefined) {
                $("#edObjectNote").jqxTextArea('val', ObjectCorrentRow.Note);
                LoadObjectEquips();
                
            }
        });
        
        $("#ObjectsGrid").jqxGrid('selectrow', 0);
        $("#ObjectEquipsGrid").jqxGrid('selectrow', 0);
    });
</script>

<style>
    
    #ObjectsGrid .jqx-fill-state-pressed,
    #CommonEquipsGrid .jqx-fill-state-pressed,
    #ObjectEquipsGrid .jqx-fill-state-pressed {
        background-color: #A7D2BB !important;
        color: black;
    }
     
</style>

<div class="row">
    <div class="row-column">
        <div id="ObjectsGrid" class="jqxGridAliton"></div>
    </div>
    <div class="row-column">
        Примечание:
        <textarea id="edObjectNote"></textarea>
    </div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddObject' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditObject' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='btnDelObject' /></div>
</div>
<div class="row">
    <div id='jqxWidget'>
        <div id='EquipTabs'>
            <ul>
                <li>
                    <div style="height: 15px; margin-top: 3px;">
                        <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                            Оборудование на подъезде
                        </div>
                    </div>
                </li>
                <li>
                    <div style="height: 15px; margin-top: 3px;">
                        <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                            Оборудование на доме
                        </div>
                    </div>
                </li>
            </ul>
            <div id='content1' style="overflow: hidden; margin-left: 10px;">
                <div style="overflow: hidden; width: 100%">
                    <div class="row">
                            <div id="ObjectEquipsGrid" class="jqxGridAliton"></div>
                    </div>
                    <div class="row" style="margin-top: 3px;">
                        <div class="row-column"><input type="button" value="Добавить" id='btnAddEquip' /></div>
                        <div class="row-column"><input type="button" value="Изменить" id='btnEditEquip' /></div>
                        <div class="row-column"><input type="button" value="Удалить" id='btnDelEquip' /></div>
                    </div>
                </div>
            </div>
            <div id='content2' style="overflow: hidden; margin-left: 10px;">
                <div style="overflow: hidden; width: 100%">
                    <div class="row">
                            <div id="CommonEquipsGrid" class="jqxGridAliton"></div>
                    </div>
                    <div class="row" style="margin-top: 3px;">
                        <div class="row-column"><input type="button" value="Добавить" id='btnAddCommonEquip' /></div>
                        <div class="row-column"><input type="button" value="Изменить" id='btnEditCommonEquip' /></div>
                        <div class="row-column"><input type="button" value="Удалить" id='btnDelCommonEquip' /></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="EditObjectDialog">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden; padding: 10px;" id="DialogContent">
        <div style="overflow: hidden;" id="BodyDialog"></div>
        <div id="BottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnObjectOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnObjectCancel' /></div>
            </div>
        </div>
    </div>
</div>

<div id="EditObjectEquipDialog">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="/* overflow: hidden; */padding: 10px;" id="DialogContent">
        <div style="/*overflow: hidden;*/" id="BodyObjectEquipDialog"></div>
        <div id="BottomObjectEquipDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnObjectEquipOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnObjectEquipCancel' /></div>
            </div>
        </div>
    </div>
</div>
    

