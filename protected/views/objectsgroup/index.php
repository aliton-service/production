<script type="text/javascript">
    var OG = {};
    $(document).ready(function () {
        var ObjectGroup = {
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            FullName: <?php echo json_encode($model->FullName); ?>,
            LphName: <?php echo json_encode($model->LphName); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            Apartment: <?php echo json_encode($model->Apartment); ?>,
            Floor: <?php echo json_encode($model->Floor); ?>,
            year_construction: <?php echo json_encode($model->year_construction); ?>,
            DoorwayList: <?php echo json_encode($model->DoorwayList); ?>,
            CountPorch: <?php echo json_encode($model->CountPorch); ?>,
            ClientGroup: <?php echo json_encode($model->ClientGroup); ?>,
            Journal: <?php echo json_encode($model->Journal); ?>,
            PostalAddress: <?php echo json_encode($model->PostalAddress); ?>,
            Refusers: <?php echo json_encode($model->Refusers); ?>,
            Note: <?php echo json_encode($model->Note); ?>,
            Information: <?php echo json_encode($model->Information); ?>,
            InstallManager: <?php echo json_encode($model->InstallManager); ?>,
            ServiceManager: <?php echo json_encode($model->ServiceManager); ?>,
            SalesManager: <?php echo json_encode($model->SalesManager); ?>,
            ClientName: <?php echo json_encode($model->ClientName); ?>,
            Telephone: <?php echo json_encode($model->Telephone); ?>,
            House: <?php echo json_encode($model->House); ?>,
            Street_id: <?php echo json_encode($model->Street_id); ?>
        };
        
        var SetValueOGControls = function() {
            $("#FullName").jqxInput('val', ObjectGroup.FullName);
            $("#LphName").jqxInput('val', ObjectGroup.LphName);
            $("#Address").jqxInput('val', ObjectGroup.Address);
            $("#Apartment").jqxInput('val', ObjectGroup.Apartment);
            $("#Floor").jqxInput('val', ObjectGroup.Floor);
            $("#year_construction").jqxInput('val', ObjectGroup.year_construction);
            $("#DoorwayList").jqxInput('val', ObjectGroup.DoorwayList);
            $("#CountPorch").jqxInput('val', ObjectGroup.CountPorch);
            $("#ClientGroup").jqxInput('val', ObjectGroup.ClientGroup);
            $("#Journal").jqxInput('val', ObjectGroup.Journal);
            $("#PostalAddress").jqxInput('val', ObjectGroup.PostalAddress);
            $("#Refusers").jqxTextArea('val', ObjectGroup.Refusers);
            $("#Note").jqxTextArea('val', ObjectGroup.Note);
            $("#Information").jqxTextArea('val', ObjectGroup.Information);
            $("#ServiceManager").jqxInput('val', ObjectGroup.ServiceManager);
            $("#SalesManager").jqxInput('val', ObjectGroup.SalesManager);
        };
        OG.Addr = ObjectGroup.Address;
        OG.Refresh = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroup/GetModel'))?>,
                type: 'POST',
                data: {
                    ObjectGr_id: ObjectGroup.ObjectGr_id
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    
                    ObjectGroup.ObjectGr_id = Res.ObjectGr_id;
                    ObjectGroup.FullName = Res.FullName;
                    ObjectGroup.LphName = Res.LphName;
                    ObjectGroup.Address = Res.Address;
                    ObjectGroup.Apartment = Res.Apartment;
                    ObjectGroup.Floor = Res.Floor;
                    ObjectGroup.year_construction = Res.year_construction;
                    ObjectGroup.DoorwayList = Res.DoorwayList;
                    ObjectGroup.CountPorch = Res.CountPorch;
                    ObjectGroup.ClientGroup = Res.ClientGroup;
                    ObjectGroup.Journal = Res.Journal;
                    ObjectGroup.PostalAddress = Res.PostalAddress;
                    ObjectGroup.Refusers = Res.Refusers;
                    ObjectGroup.Note = Res.Note;
                    ObjectGroup.Information = Res.Information;
                    ObjectGroup.InstallManager = Res.InstallManager;
                    ObjectGroup.ServiceManager = Res.ServiceManager;
                    ObjectGroup.SalesManager = Res.SalesManager;
                    ObjectGroup.ClientName = Res.ClientName;
                    ObjectGroup.Telephone = Res.Telephone;
                    
                    SetValueOGControls();
                    
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                }
            });
        };
        
        var initInputs = function () {
            $("#FullName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
            $("#LphName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
            $("#Address").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
            $("#Apartment").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 50 }));
            $("#Floor").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 50 }));
            $("#year_construction").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#DoorwayList").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
            $("#CountPorch").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 50 }));
            $("#ClientGroup").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
            $("#Journal").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 90, formatString: 'dd.MM.yyyy', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));
            $("#PostalAddress").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
            
            $("#Refusers").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {width: '100%'}));
            $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {width: '100%'}));
            $("#Information").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: '100%'}));
            
            $("#ServiceManager").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
            $("#SalesManager").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 150 }));
            
            $("#ChangeObjectsGroup").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#ViewDemandsObjectsGroup").jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 200}));
            
            $("#ViewDemandsObjectsGroup").on('click', function () {
                var Data = {
                    ObjectGr_id: ObjectGroup.ObjectGr_id
                };
                
                window.open(<?php echo json_encode(Yii::app()->createUrl('Demands/Index')); ?> + '&DemFilters[ObjectGr_id]=' + ObjectGroup.ObjectGr_id + '&DemFilters[DemObjectGroup]=true' + '&DemFilters[House]=' + ObjectGroup.House + '&DemFilters[Street_id]=' + ObjectGroup.Street_id);
            });
            
            $("#ChangeObjectsGroup").on('click', function ()
            {
                if (ObjectGroup != undefined) {
                    $('#ObjectsGroupDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 830, height: 730, position: 'center'}));
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('ObjectsGroup/Update')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            ObjectGr_id: ObjectGroup.ObjectGr_id
                        },
                        success: function(Res) {
                            Res = JSON.parse(Res);
                            $("#BodyObjectsGroupDialog").html(Res.html);
                            $('#ObjectsGroupDialog').jqxWindow('open');
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                }
            });
            
            if (ObjectGroup.FullName !== '') $("#FullName").jqxInput('val', ObjectGroup.FullName);
            if (ObjectGroup.LphName !== '') $("#LphName").jqxInput('val', ObjectGroup.LphName);
            if (ObjectGroup.Address !== '') $("#Address").jqxInput('val', ObjectGroup.Address);
            if (ObjectGroup.Apartment !== '') $("#Apartment").jqxInput('val', ObjectGroup.Apartment);
            if (ObjectGroup.Floor !== '') $("#Floor").jqxInput('val', ObjectGroup.Floor);
            if (ObjectGroup.year_construction !== '') $("#year_construction").jqxInput('val', ObjectGroup.year_construction);
            if (ObjectGroup.DoorwayList !== '') $("#DoorwayList").jqxInput('val', ObjectGroup.DoorwayList);
            if (ObjectGroup.CountPorch !== '') $("#CountPorch").jqxInput('val', ObjectGroup.CountPorch);
            if (ObjectGroup.ClientGroup !== '') $("#ClientGroup").jqxInput('val', ObjectGroup.ClientGroup);
            if (ObjectGroup.Journal !== '') $("#Journal").jqxDateTimeInput('val', ObjectGroup.Journal);
            if (ObjectGroup.PostalAddress !== '') $("#PostalAddress").jqxInput('val', ObjectGroup.PostalAddress);
            if (ObjectGroup.Refusers !== '') $("#Refusers").jqxTextArea('val', ObjectGroup.Refusers);
            if (ObjectGroup.Note !== '') $("#Note").jqxTextArea('val', ObjectGroup.Note);
            if (ObjectGroup.Information !== '') $("#Information").jqxTextArea('val', ObjectGroup.Information);
            if (ObjectGroup.ServiceManager !== '') $("#ServiceManager").jqxInput('val', ObjectGroup.ServiceManager);
            if (ObjectGroup.SalesManager !== '') $("#SalesManager").jqxInput('val', ObjectGroup.SalesManager);
        };
        
        
        
        var initContactInfoGrid = function () {
            
            var CurrentRowCInfoData;
            
            var ObjectsGroup = {
                ObjectGr_id: <?php echo $model->ObjectGr_id; ?>
            };
    
            var DataObjectsGroupsExecutors = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContactInfoMax, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["ci.ObjectGr_id = " + ObjectsGroup.ObjectGr_id],
                    });
                    return data;
                },
            });


            $("#ContactInfoGrid").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    pagesizeoptions: ['10', '200', '500', '1000'],
                    pagesize: 200,
                    showfilterrow: false,
                    virtualmode: false,
                    width: 'calc(100% - 2px)',
                    height: 'calc(100% - 2px)',
                    source: DataObjectsGroupsExecutors,
                    enablebrowserselection: true,
                    columns: [
                        { text: 'ФИО', dataField: 'FIO', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                        { text: 'Должность', dataField: 'CustomerName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                        { text: 'Телефон', dataField: 'Telephone', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                        { text: 'Сотовый телефон', dataField: 'CTelephone', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                        { text: 'Электронная почта', dataField: 'Email', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                        { text: 'Дата рождения', dataField: 'Birthday', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                        { text: 'ЛПР', dataField: 'Main', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 50 },
                        { text: 'Для отчетов', dataField: 'ForReport', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 100 },
                        { text: 'Эл. почту не отправлять', dataField: 'NoSend', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 150 },
                    ]
                })
            );
    
            $("#NewContactInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#EditContactInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#DelContactInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            $("#ContactInfoGrid").on('rowselect', function (event) {
                CurrentRowCInfoData = $('#ContactInfoGrid').jqxGrid('getrowdata', event.args.rowindex);
                
            });

            $('#ContactInfoGrid').on('rowdoubleclick', function (event) { 
                $("#EditContactInfo").click();
            });


            $("#NewContactInfo").on('click', function ()
            {
                $('#ObjectsGroupDialog').jqxWindow({width: 630, height: 480, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ContactInfo/Insert')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        ObjectGr_id: ObjectGroup.ObjectGr_id,
                        ClientName: ObjectGroup.ClientName,
                        Telephone: ObjectGroup.Telephone 
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyObjectsGroupDialog").html(Res.html);
                        $('#ObjectsGroupDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });

            $("#EditContactInfo").on('click', function () {
                if (CurrentRowCInfoData == undefined) return;
                $('#ObjectsGroupDialog').jqxWindow({width: 600, height: 470, position: 'center'});
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('ContactInfo/Update')) ?>,
                    type: 'POST',
                    async: false,
                    data: {
                        Info_id: CurrentRowCInfoData.Info_id,
                        ObjectGr_id: ObjectGroup.ObjectGr_id,
                        ClientName: ObjectGroup.ClientName,
                        Telephone: ObjectGroup.Telephone 
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        $("#BodyObjectsGroupDialog").html(Res.html);
                        $('#ObjectsGroupDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });

            $("#DelContactInfo").on('click', function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=ContactInfo/Delete",
                    data: { Info_id: CurrentRowCInfoData.Info_id },
                    
                    success: function(){
                        $("#ContactInfoGrid").jqxGrid('updatebounddata');
                        $("#ContactInfoGrid").jqxGrid('selectrow', 0);
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            });
        };
        
        var loadPage = function (url, index) {
            $.ajax({
                url: url,
                type: 'GET',
                success: function(data) {
                    if (index == 1)
                        $('#content2').html(data);
                    if (index == 2)
                        $('#content3').html(data);
                    if (index == 3)
                        $('#content4').html(data);
                    if (index == 4)
                        $('#content5').html(data);
                    if (index == 5)
                        $('#content6').html(data);
                    if (index == 6)
                        $('#content7').html(data);
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    if (index == 1)
                        $('#content2').html(Res.responseText);
                    if (index == 2)
                        $('#content3').html(Res.responseText);
                    if (index == 3)
                        $('#content4').html(Res.responseText);
                    if (index == 4)
                        $('#content5').html(Res.responseText);
                    if (index == 5)
                        $('#content6').html(Res.responseText);
                    if (index == 6)
                        $('#content7').html(Res.responseText);
                }
            });
        
//            $.get(url, function (data) {
//                
//            }).error(function() {
//                if (index == 1)
//                    $('#content2').html('Ошибка');
//                if (index == 2)
//                    $('#content3').html('Ошибка');
//                if (index == 3)
//                    $('#content4').html('Ошибка');
//                if (index == 4)
//                    $('#content5').html('Ошибка');
//                if (index == 5)
//                    $('#content6').html('Ошибка');
//            });
        };
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    initInputs ();
                    initContactInfoGrid();
                    break;
                case 1:
                    loadPage('<?php echo Yii::app()->createUrl('ObjectsGroupsystems/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 1);
                    break;
                case 2:
                    loadPage('<?php echo Yii::app()->createUrl('ObjectsAndEquips/ajaxview', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 2);
                    break;
                case 3:
                    loadPage('<?php echo Yii::app()->createUrl('ContractsS/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 3);
                    break;
                case 4:
                    loadPage('<?php echo Yii::app()->createUrl('Contacts/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 4);
                    break;
                case 5:
                    loadPage('<?php echo Yii::app()->createUrl('ObjectsGroupCostCalculations/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 5);
                    break;
                case 6:
                    loadPage('<?php echo Yii::app()->createUrl('SalesDepClients/History', array('Form_id' => "$model->PropForm_id")) ?>', 6);
                    break;
            }
        };
        
        $('#jqxTabs').jqxTabs({ width: '100%', height: 'calc(100% - 2px)', keyboardNavigation: false, initTabContent: initWidgets });
        var defaultTabIndex = 0;
        var tabIndex = Aliton.GetTabIndexFromURL(defaultTabIndex);
        $('#jqxTabs').jqxTabs('select', tabIndex);
        
        var SelectTab = function() {
            var SelectedTab = $('#jqxTabs').jqxTabs('selectedItem');
            Aliton.SetLocation(SelectedTab);
        };
        
        $('#jqxTabs').on('selected', function (event){ 
            SelectTab();
        });
        
    });
</script>

<style>
    
    #ContactInfoGrid .jqx-fill-state-pressed {
        background-color: #A7D2BB !important;
        color: black;
    }

    #RefusersWrapper {
        width: 250px;
    }

    #NoteWrapper {
        width: 310px;
    }

    #InformationWrapper {
        width: 290px;
        height: 70px;
    }
    
    @media screen and (min-width: 1300px) { 
        #RefusersWrapper {
            width: 360px;
        }

        #NoteWrapper {
            width: 440px;
        }
    
        #InformationWrapper {
            position: absolute;
            left: 870px;
            top: 50px;
            width: 320px;
            height: 212px;
        }
    }
    @media screen and (min-width: 1400px) { 
        #InformationWrapper {
            width: 400px;
        }
    }
    
</style>

<?php

$this->breadcrumbs=array(
    'Список объектов'=>array('/object/index'),
    'Карточка объекта: ' . $model->Address,
);

?>

<div id='jqxTabs' style="">
    <ul>
        <li style="margin-left: 20px;">
            <div style="height: 15px; margin-top: 3px;">
                <div style="vertical-align: middle; text-align: center; float: left; margin-left: 4px">
                    Общие данные
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Системы
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Оборудование
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Договора и оплаты
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Контакты
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Коммерческие предложения и сметы
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    История
                </div>
            </div>
        </li>
    </ul>
    <div style="overflow: auto; height: calc(100% - 2px); background-color: #F2F2F2;">
        <div style="overflow: auto; padding: 5px 10px 0;">
            <div class="al-row">
                <div class="al-row-column" style="width: 60px">Клиент:</div>
                <div class="al-row-column"><input readonly type="text" id="FullName"></div>
                <div class="al-row-column">Тип клиента:</div>
                <div class="al-row-column"><input readonly type="text" id="LphName"></div>
                <div style="clear: both"></div>
            </div>
            <div class="al-row">
                <div class="al-row-column" style="width: 60px">Адрес:</div>
                <div class="al-row-column"><input readonly type="text" id="Address"></div>
                <div class="al-row-column">Квартир:</div>
                <div class="al-row-column"><input readonly type="text" id="Apartment"></div>
                <div class="al-row-column">Кол-во этажей:</div>
                <div class="al-row-column"><input readonly type="text" id="Floor"></div>
                <div class="al-row-column">Год постройки:</div>
                <div class="al-row-column"><input readonly type="text" id="year_construction"></div>
                <div style="clear: both"></div>
            </div>
            <div class="al-row">
                <div class="al-row-column">Подъезды:</div>
                <div class="al-row-column"><input readonly type="text" id="DoorwayList"></div>
                <div class="al-row-column">Кол-во под.:</div>
                <div class="al-row-column"><input readonly type="text" id="CountPorch"></div>
                <div class="al-row-column">Сегмент:</div>
                <div class="al-row-column"><input readonly type="text" id="ClientGroup"></div>
                <div class="al-row-column">Журнал:</div>
                <div class="al-row-column"><div id="Journal"></div></div>
                <div style="clear: both"></div>
            </div>
            <div class="al-row">
                <div class="al-row-column" style="width: 60px">Почта:</div>
                <div class="al-row-column"><input readonly type="text" id="PostalAddress"></div>
                <div class="al-row-column">Менеджер СЦ:</div>
                <div class="al-row-column"><input readonly type="text" id="ServiceManager"></div>
                <div class="al-row-column">Менеджер ОП:</div>
                <div class="al-row-column"><input readonly type="text" id="SalesManager"></div>
                <div style="clear: both"></div>
            </div>
            <div class="al-row" style="padding: 0">
                <div class="al-row-column" id="RefusersWrapper">
                    <div class="al-row"><div class="al-row-column">Отказники:</div><div style="clear: both"></div></div>
                    <textarea readonly type="text" id="Refusers"></textarea>
                </div>
                <div class="al-row-column" id="NoteWrapper">
                    <div class="al-row"><div class="al-row-column">Примечание:</div><div style="clear: both"></div></div>
                    <textarea readonly type="text" id="Note"></textarea>
                </div>
                <div class="al-row-column" id="InformationWrapper">
                    <div class="al-row"><div class="al-row-column">Общая информация:</div><div style="clear: both"></div></div>
                    <textarea readonly type="text" id="Information"></textarea>
                </div>
                <div style="clear: both"></div>
            </div>
            <div class="al-row" style="margin: 0;">
                <div class="al-row-column"><input type="button" value="Изменить" id='ChangeObjectsGroup' /></div>
                <div class="al-row-column"><input type="button" value="Заявки по объекту" id='ViewDemandsObjectsGroup' /></div>
            </div>
        </div>
        <div style="padding: 10px; height: calc(100% - 323px)">
            <div class="al-row" style="padding: 0px; height: calc(100% - 12px)">
                <div id="ContactInfoGrid" class="jqxGridAliton"></div>
            </div>
            <div class="al-row" style="padding: 6px 0px 0px 0px;">
                <div class="al-row-column"><input type="button" value="Создать" id='NewContactInfo' /></div>
                <div class="al-row-column"><input type="button" value="Изменить" id='EditContactInfo' /></div>
                <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='DelContactInfo' /></div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>

    <div style="overflow: hidden; height: calc(100% - 2px);">
        <div id='content2' style="overflow: hidden; margin: 5px; height: calc(100% - 0px)"></div>
    </div>

    <div id='content3' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: calc(100% - 2px)"></div>
    </div>

    <div id='content4' style="overflow: hidden; margin: 5px; height: calc(100% - 2px); overflow-y: visible;">
        <div style="width: 100%; height: 100%"></div>
    </div>

    <div id='content5' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: 100%"></div>
    </div>

    <div id='content6' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: 100%"></div>
    </div>
    
    <div id='content7' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: 100%"></div>
    </div>
    
    
</div>

<div id="ObjectsGroupDialog" style="display: none;">
    <div id="ObjectsGroupDialogHeader">
        <span id="ObjectsGroupHeaderText">Вставка\Редактирование записи</span>
    </div>
    <div style="padding: 10px;" id="DialogObjectsGroupContent">
        <div style="" id="BodyObjectsGroupDialog"></div>
    </div>
</div>

