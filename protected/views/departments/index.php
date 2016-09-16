<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var DepartmentsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDepartments));

        $('#btnAddDepartment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditDepartment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshDepartment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelDepartment').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#DepartmentsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        
        var CheckButton = function() {
            $('#btnEditDepartment').jqxButton({disabled: !(CurrentRowData != undefined)})
            $('#btnDelDepartment').jqxButton({disabled: !(CurrentRowData != undefined)})
        }
        
        $("#DepartmentsGrid").on('rowselect', function (event) {
            CurrentRowData = $('#DepartmentsGrid').jqxGrid('getrowdata', event.args.rowindex);
            CheckButton();
        });
        
        $("#DepartmentsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: '300',
                source: DepartmentsDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'DepName', filtercondition: 'CONTAINS', width: 320},    
                ]

        }));
        
        $('#btnAddDepartment').on('click', function(){
            $('#DepartmentsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('Departments/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyDepartmentsDialog").html(Res.html);
                    $('#DepartmentsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditDepartment').on('click', function(){
            if (CurrentRowData != undefined) {
                $('#DepartmentsDialog').jqxWindow({width: 400, height: 160, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Departments/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Dep_id: CurrentRowData.Dep_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyDepartmentsDialog").html(Res.html);
                        $('#DepartmentsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelDepartment').on('click', function(){
            if (CurrentRowData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Departments/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Dep_id: CurrentRowData.Dep_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#DepartmentsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#DepartmentsGrid').jqxGrid('getcelltext', RowIndex + 1, "Dep_id");
                            Aliton.SelectRowById('Dep_id', Text, '#DepartmentsGrid', true);
                            RowIndex = $('#DepartmentsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#DepartmentsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshDepartment').on('click', function(){
            var RowIndex = $('#DepartmentsGrid').jqxGrid('getselectedrowindex');
            var Val = $('#DepartmentsGrid').jqxGrid('getcellvalue', RowIndex, "Dep_id");
            Aliton.SelectRowById('Dep_id', Val, '#DepartmentsGrid', true);
        });
        
        $('#DepartmentsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Должности'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Департаменты'=>array('index'),
    );
?>


<div class="row">
    <div id="DepartmentsGrid" class="jqxGridAliton"></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Добавить" id='btnAddDepartment'/></div>
    <div class="row-column"><input type="button" value="Изменить" id='btnEditDepartment'/></div>
    <div class="row-column"><input type="button" value="Обновить" id='btnRefreshDepartment'/></div>
    <div class="row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelDepartment'/></div>
</div>    

<div id="DepartmentsDialog" style="display: none;">
    <div id="DepartmentsDialogHeader">
        <span id="DepartmentsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogDepartmentsContent">
        <div style="" id="BodyDepartmentsDialog"></div>
    </div>
</div>