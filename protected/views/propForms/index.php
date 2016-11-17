<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowOrgData;
        
        var OrganizationsVDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOrganizationsV, {async: true, id: 'id'}));

        $('#btnAddOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnEditOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnRefreshOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnDelOrganization').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#OrganizationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: '200px', width: '400', position: 'center'}));
        $('#edOrgINN').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgKPP').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgAccount').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgBank').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgCorAccount').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgBik').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgTelephone').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgJurAddr').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        $('#edOrgFactAddr').jqxInput($.extend(true, {}, InputDefaultSettings, {width: '200px'}));
        
        var CheckButton = function() {
            $('#btnEditOrganization').jqxButton({disabled: !(CurrentRowOrgData != undefined)})
            $('#btnDelOrganization').jqxButton({disabled: !(CurrentRowOrgData != undefined)})
        }
        
        $("#OrganizationsGrid").on('rowselect', function (event) {
            CurrentRowOrgData = $('#OrganizationsGrid').jqxGrid('getrowdata', event.args.rowindex);
            if (CurrentRowOrgData != undefined) {
                $('#edOrgINN').jqxInput('val', CurrentRowOrgData.inn);
                $('#edOrgKPP').jqxInput('val', CurrentRowOrgData.kpp);
                $('#edOrgAccount').jqxInput('val', CurrentRowOrgData.account);
                $('#edOrgBank').jqxInput('val', CurrentRowOrgData.bank_name);
                $('#edOrgCorAccount').jqxInput('val', CurrentRowOrgData.cor_account);
                $('#edOrgBik').jqxInput('val', CurrentRowOrgData.bik);
                $('#edOrgTelephone').jqxInput('val', CurrentRowOrgData.telephone);
                $('#edOrgJurAddr').jqxInput('val', CurrentRowOrgData.JAddress);
                $('#edOrgFactAddr').jqxInput('val', CurrentRowOrgData.FAddress);
            }
                
            CheckButton();
        });
        
        $("#OrganizationsGrid").on('rowdoubleclick', function(){
            $('#btnEditOrganization').click();
        });
        
        $("#OrganizationsGrid").on('bindingcomplete', function(){
            if (CurrentRowOrgData != undefined) 
                Aliton.SelectRowByIdVirtual('Form_id', CurrentRowOrgData.Form_id, '#OrganizationsGrid', false);
            else
                Aliton.SelectRowByIdVirtual('Form_id', null, '#OrganizationsGrid', false);
        });
        
        $("#OrganizationsGrid").jqxGrid(
            $.extend(true, {}, GridDefaultSettings, {
                pagesizeoptions: ['10', '200', '500', '1000'],
                pagesize: 200,
                sortable: true,
                showfilterrow: true,
                width: '100%',
                height: 'calc(100% - 2px)',
                source: OrganizationsVDataAdapter,
                columns: [
                    { text: 'Наименование', datafield: 'FormName', filtercondition: 'CONTAINS', width: 320},    
                    { text: 'Форма собственности', datafield: 'FownName', filtercondition: 'CONTAINS', width: 150},    
                    { text: 'Тип', datafield: 'lph_name', filtercondition: 'CONTAINS', width: 150},    
                ]

        }));
        
        $('#btnAddOrganization').on('click', function(){
            $('#OrganizationsDialog').jqxWindow({width: 800, height: 490, position: 'center'});
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('propForms/Create')) ?>,
                type: 'POST',
                async: false,
                success: function(Res) {
                    Res = JSON.parse(Res);
                    $("#BodyOrganizationsDialog").html(Res.html);
                    $('#OrganizationsDialog').jqxWindow('open');
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        });

        $('#btnEditOrganization').on('click', function(){
            if (CurrentRowOrgData != undefined) {
                $('#OrganizationsDialog').jqxWindow({width: 800, height: 490, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('propForms/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Form_id: CurrentRowOrgData.Form_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyOrganizationsDialog").html(Res.html);
                        $('#OrganizationsDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnDelOrganization').on('click', function(){
            if (CurrentRowOrgData != undefined) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Organizations/Delete')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Form_id: CurrentRowOrgData.Form_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        if (Res.result == 1) {
                            var RowIndex = $('#OrganizationsGrid').jqxGrid('getselectedrowindex');
                            var Text = $('#OrganizationsGrid').jqxGrid('getcelltext', RowIndex + 1, "Form_id");
                            Aliton.SelectRowById('Form_id', Text, '#OrganizationsGrid', true);
                            RowIndex = $('#OrganizationsGrid').jqxGrid('getselectedrowindex');
                            var S = $('#OrganizationsGrid').jqxGrid('getrowdata', RowIndex);
                        }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            }
        });
        
        $('#btnRefreshOrganization').on('click', function(){
            $('#OrganizationsGrid').jqxGrid('updatebounddata');
        });
        
        $('#OrganizationsGrid').jqxGrid('selectrow', 0);
    });
</script>

<?php $this->setPageTitle('Должности'); ?>

<?php
    $this->breadcrumbs=array(
            'Кадры'=>array('/Employees/index'),
            'Подразделения'=>array('index'),
    );?>


<div class="al-row" style="height: calc(100% - 50px)">
    <div class="al-row-column" style="width: calc(100% - 320px)">
        <div id="OrganizationsGrid" class="jqxGridAliton"></div>
    </div>
    <div class="al-row-column" style="width: 300px; float: right">
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">ИНН:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgINN" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">КПП:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgKPP" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">Р/Счет:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgAccount" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">Банк:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgBank" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">Кор/Счет:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgCorAccount" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">БИК:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgBik" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">Телефон:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgTelephone" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">Юр. адрес:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgJurAddr" /></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 80px">Факт. адрес:</div>
            <div class="al-row-column"><input type="text" readonly="readonly" id="edOrgFactAddr" /></div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div style="clear: both"></div>
</div>
<div class="al-row">
    <div class="al-row-column"><input type="button" value="Добавить" id='btnAddOrganization'/></div>
    <div class="al-row-column"><input type="button" value="Изменить" id='btnEditOrganization'/></div>
    <div class="al-row-column"><input type="button" value="Обновить" id='btnRefreshOrganization'/></div>
    <div class="al-row-column" style="float: right; margin: 0px"><input type="button" value="Удалить" id='btnDelOrganization'/></div>
    <div style="clear: both"></div>
</div>    

<div id="OrganizationsDialog" style="display: none;">
    <div id="OrganizationsDialogHeader">
        <span id="OrganizationsHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogOrganizationsContent">
        <div style="" id="BodyOrganizationsDialog"></div>
    </div>
</div>