<script type="text/javascript">
        var Currentgroup_id = 0;
        $(document).ready(function () {
            var DataEqipGroups = new $.jqx.dataAdapter(Sources.SourceEquipGroups);
            var Mode;
            LoadData = function(Adapter) {
                Adapter.dataBind();
                return Adapter.getRecordsHierarchy('group_id', 'parent_group_id', 'items', [{name: 'group_id', map: 'value'}, { name: 'group_name', map: 'label'}, { name: 'full_group_name', map: 'full_group_name' }]);
            }
            
            var records = LoadData(DataEqipGroups);
            $('#EqipGroupsTree').jqxTree($.extend({}, TreeDefaultSettings, { source: records, height: 'calc(100% - 50px)', width: '90%'}));
            $('#EqipGroupsTree').jqxTree('expandAll');
            $('#EqipGroupsTree').on('select',function (event) {
                var args = event.args;
                var item = $('#EqipGroupsTree').jqxTree('getItem', args.element);
                Currentgroup_id = item.value;
            });
            
            
            $("#btnAdd").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnEdit").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnDel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $('#EditDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '150px'}));
            $("#btnRefresh").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            var selectItem = function () {
                var items = $('#EqipGroupsTree').jqxTree('getItems');
//                $("#EqipGroupsTree").jqxTree('expandItem', items[0]);
                $('#EqipGroupsTree').jqxTree('selectItem', items[0]);
            };
            selectItem();
            
            $("#btnRefresh").on('click', function() {
                $('#EqipGroupsTree').jqxTree({source: LoadData(DataEqipGroups)});
                if (Currentgroup_id != 0) {
                    var Items = $('#EqipGroupsTree').jqxTree('getItems');
                    for (var i = 0; i < Items.length; i++) {
                        if (Items[i].value == Currentgroup_id) {
                            $('#EqipGroupsTree').jqxTree('expandItem', Items[i].element);
                            $('#EqipGroupsTree').jqxTree('ensureVisible', Items[i].element);
                            $('#EqipGroupsTree').jqxTree('selectItem', Items[i].element);
                            break;
                        }
                    }
                }
            });
            
            $("#btnAdd").on('click', function () {
                var item = $('#EqipGroupsTree').jqxTree('getSelectedItem');
                Mode = 'Insert';
                var parent_group_id = null;
                if (item != null) {
                    parent_group_id = item.value;
                }
                
                LoadForm(0, parent_group_id);
                
                $('#EditDialog').jqxWindow('open');
            });
            
            $("#btnEdit").on('click', function () {
                var item = $('#EqipGroupsTree').jqxTree('getSelectedItem');
                var group_id = null;
                if (item != null) {
                    Mode = 'Edit';
                    group_id = item.value;
                    LoadForm(group_id, -1);
                    $('#EditDialog').jqxWindow('open');
                }
            });
            
            $("#btnDel").on('click', function () {
                var item = $('#EqipGroupsTree').jqxTree('getSelectedItem');
                var group_id = null;
                if (item != null) {
                    group_id = item.value;
                    $.ajax({
                        url: "<?php echo Yii::app()->createUrl('EqipGroups/Delete');?>",
                        type: 'POST',
                        async: false,
                        data: {group_id: group_id},
                        success: function() {
                            $('#EqipGroupsTree').jqxTree({source: LoadData(DataEqipGroups)});
                            selectItem();
                        }
                    });
                }
            });
            
            LoadForm = function(group_id, parent_group_id) {
                if (group_id == undefined)
                    group_id = 0;
                if (parent_group_id == undefined)
                    parent_group_id = null;
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('EqipGroups/EditForm');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        group_id: group_id,
                        parent_group_id: parent_group_id
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
                    Url = "<?php echo Yii::app()->createUrl('EqipGroups/Create');?>";
                if (Mode == 'Edit')
                    Url = "<?php echo Yii::app()->createUrl('EqipGroups/Update');?>";
                if (Mode == 'Drag')
                    Url = "<?php echo Yii::app()->createUrl('EqipGroups/DragAndDrop');?>";
                
                var Data;
                if (Form == undefined)
                    Data = $('#EqipGroups').serialize();
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
                            Currentgroup_id = Res.id;
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
            
            $("#EqipGroupsTree").on('dragEnd', function (event) {
                Item = $('#EqipGroupsTree').jqxTree('getSelectedItem');
                ParentElem = Item.parentElement;
                Parent = $('#EqipGroupsTree').jqxTree('getItem', ParentElem);
//                console.log('Item.value ' + Item.value);
//                console.log('Parent.value ' + Parent.value);
                if (Parent == null)
                    Parent = {
                        value: null
                    };
                SendForm('Drag', {
                    EqipGroups: {
                        group_id: Item.value,
                        parent_group_id: Parent.value
                    }
                });
            });
            
        });
</script>

<?php $this->setPageTitle('Структура организации'); ?>

<div class="al-row">
    <div id="EqipGroupsTree"></div>
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



