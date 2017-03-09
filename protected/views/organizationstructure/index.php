<script type="text/javascript">
        var CurrentStructure_id = 0;
        $(document).ready(function () {
            var DataOrganizationStructure = new $.jqx.dataAdapter(Sources.SourceOrganizationStructure);
            var Mode;
            LoadData = function(Adapter) {
                Adapter.dataBind();
                return Adapter.getRecordsHierarchy('Structure_id', 'Parent_id', 'items', [{name: 'Structure_id', map: 'value'}, { name: 'ShortName', map: 'label'}]);
            }
            
            var records = LoadData(DataOrganizationStructure);
            $('#StructureGrid').jqxTree($.extend({}, TreeDefaultSettings, { source: records, height: 'calc(100% - 38px)', width: '50%'}));
            $('#StructureGrid').jqxTree('expandAll');
            $('#StructureGrid').on('select',function (event) {
                var args = event.args;
                var item = $('#StructureGrid').jqxTree('getItem', args.element);
                CurrentStructure_id = item.value;
            });
            
            
            $("#btnAdd").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnEdit").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnDel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $('#EditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '150px'}));
            $("#btnRefresh").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            $("#btnRefresh").on('click', function() {
                $('#StructureGrid').jqxTree({source: LoadData(DataOrganizationStructure)});
                if (CurrentStructure_id != 0) {
                    var Items = $('#StructureGrid').jqxTree('getItems');
                    for (var i = 0; i < Items.length; i++) 
                        if (Items[i].value == CurrentStructure_id) {
                            $('#StructureGrid').jqxTree('expandItem', Items[i].element);
                            $('#StructureGrid').jqxTree('ensureVisible', Items[i].element);
                            $('#StructureGrid').jqxTree('selectItem', Items[i].element);
                            break;
                        }
                }
            });
            
            $("#btnAdd").on('click', function () {
                var item = $('#StructureGrid').jqxTree('getSelectedItem');
                Mode = 'Insert';
                var Parent_id = null;
                if (item != null) {
                    Parent_id = item.value;
                }
                
                LoadForm(0, Parent_id);
                
                $('#EditDialog').jqxWindow('open');
            });
            
            $("#btnEdit").on('click', function () {
                var item = $('#StructureGrid').jqxTree('getSelectedItem');
                var Structure_id = null;
                if (item != null) {
                    Mode = 'Edit';
                    Structure_id = item.value;
                    LoadForm(Structure_id, -1);
                    $('#EditDialog').jqxWindow('open');
                }
            });
            
            $("#btnDel").on('click', function () {
                var item = $('#StructureGrid').jqxTree('getSelectedItem');
                var Structure_id = null;
                if (item != null) {
                    Structure_id = item.value;
                    $.ajax({
                        url: "<?php echo Yii::app()->createUrl('OrganizationStructure/Delete');?>",
                        type: 'POST',
                        async: false,
                        data: {Structure_id: Structure_id},
                        success: function() {
                            $('#StructureGrid').jqxTree({source: LoadData(DataOrganizationStructure)});
                        }
                    });
                }
            });
            
            LoadForm = function(Structure_id, Parent_id) {
                if (Structure_id == undefined)
                    Structure_id = 0;
                if (Parent_id == undefined)
                    Parent_id = null;
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('OrganizationStructure/EditForm');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        Structure_id: Structure_id,
                        Parent_id: Parent_id
                    },
                    success: function(Res) {
                        $('#BodyDialog').html(Res);
                    }
                });
            }
            
            $('#EditDialog').on('open', function (event) { 
            });
            
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
                    Url = "<?php echo Yii::app()->createUrl('OrganizationStructure/Create');?>";
                if (Mode == 'Edit')
                    Url = "<?php echo Yii::app()->createUrl('OrganizationStructure/Update');?>";
                if (Mode == 'Drag')
                    Url = "<?php echo Yii::app()->createUrl('OrganizationStructure/DragAndDrop');?>";
                
                var Data;
                if (Form == undefined)
                    Data = $('#OrganizationStructure').serialize();
                else Data = Form;
                
                $.ajax({
                    url: Url,
                    type: 'POST',
                    async: false,
                    data: Data,
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            $('#EditDialog').jqxWindow('close');
                            console.log(Res);
                            CurrentStructure_id = Res.id;
                            $("#btnRefresh").click();
                        } else {
                            $('#BodyDialog').html(Res.html);
                        }
                            
                    }
                });
            }
            
            $("#btnOk").on('click', function () {
                SendForm(Mode);
            });
            
            $("#StructureGrid").on('dragEnd', function (event) {
                Item = $('#StructureGrid').jqxTree('getSelectedItem');
                ParentElem = Item.parentElement;
                Parent = $('#StructureGrid').jqxTree('getItem', ParentElem);
                if (Parent == null)
                    Parent = {
                        value: null
                    };
                SendForm('Drag', {
                    OrganizationStructure: {
                        Structure_id: Item.value,
                        Parent_id: Parent.value
                    }
                });
                
            });
        });
</script>

<?php $this->setPageTitle('Структура организации'); ?>

<div class="al-row">
    <div id="StructureGrid"></div>
</div>
<div class="al-row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAdd' /></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEdit' /></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefresh' /></div>
    <div class="row-column"><input type="button" value="Удалить" id='btnDel' /></div>
    <div style="clear: both"></div>
</div>
<div id="EditDialog">
    <div id="DialogHeader">
        <span id="HeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="overflow: hidden;" id="DialogContent">
        <div style="overflow: auto;" id="BodyDialog"></div>
        <div id="BottomDialog">
            <div class="row">
                <div class="row-column"><input type="button" value="Сохранить" id='btnOk' /></div>
                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnCancel' /></div>
            </div>
        </div>
    </div>
</div>



