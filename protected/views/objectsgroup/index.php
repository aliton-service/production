<script type="text/javascript">
    $(document).ready(function () {
         
        var initInputs = function () {
            
            var Demand = {
                FullName: '<?php echo json_encode($model->FullName); ?>',
                LphName: '<?php echo $model->LphName; ?>',
                Address: '<?php echo $model->Address; ?>',
                Apartment: '<?php echo $model->Apartment; ?>',
                Floor: '<?php echo $model->Floor; ?>',
                year_construction: '<?php echo $model->year_construction; ?>',
                DoorwayList: '<?php echo $model->DoorwayList; ?>',
                CountPorch: '<?php echo $model->CountPorch; ?>',
                ClientGroup: '<?php echo $model->ClientGroup; ?>',
                Journal: '<?php echo $model->Journal; ?>',
                PostalAddress: <?php echo json_encode($model->PostalAddress); ?>,
                Refusers: <?php echo json_encode($model->Refusers); ?>,
                Note: <?php echo json_encode($model->Note); ?>,
                Information: <?php echo json_encode($model->Information); ?>,
                InstallManager: '<?php echo $model->InstallManager; ?>',
                ServiceManager: '<?php echo $model->ServiceManager; ?>',
                SalesManager: '<?php echo $model->SalesManager; ?>'
            };

            $("#FullName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 300 }));
            $("#LphName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 180 }));
            $("#Address").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 400 }));
            $("#Apartment").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#Floor").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#year_construction").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#DoorwayList").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
            $("#CountPorch").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#ClientGroup").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 250 }));
            $("#Journal").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 80 }));
            $("#PostalAddress").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 630 }));
            
            $("#Refusers").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {}));
            $("#Note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {}));
            $("#Information").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 700 }));
            
            $("#InstallManager").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 210 }));
            $("#ServiceManager").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
            $("#SalesManager").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 200 }));
            
            $("#ChangeObjectsGroup").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            $("#ChangeObjectsGroup").on('click', function ()
            {
                window.open('/index.php?r=ObjectsGroup/Update&ObjectGr_id=' + <?= $model->ObjectGr_id; ?>);
            });
            
            if (Demand.FullName !== '') $("#FullName").jqxInput('val', Demand.FullName);
            if (Demand.LphName !== '') $("#LphName").jqxInput('val', Demand.LphName);
            if (Demand.Address !== '') $("#Address").jqxInput('val', Demand.Address);
            if (Demand.Apartment !== '') $("#Apartment").jqxInput('val', Demand.Apartment);
            if (Demand.Floor !== '') $("#Floor").jqxInput('val', Demand.Floor);
            if (Demand.year_construction !== '') $("#year_construction").jqxInput('val', Demand.year_construction);
            if (Demand.DoorwayList !== '') $("#DoorwayList").jqxInput('val', Demand.DoorwayList);
            if (Demand.CountPorch !== '') $("#CountPorch").jqxInput('val', Demand.CountPorch);
            if (Demand.ClientGroup !== '') $("#ClientGroup").jqxInput('val', Demand.ClientGroup);
            if (Demand.Journal !== '') $("#Journal").jqxInput('val', Demand.Journal);
            if (Demand.PostalAddress !== '') $("#PostalAddress").jqxInput('val', Demand.PostalAddress);
            
            if (Demand.Refusers !== '') $("#Refusers").jqxTextArea('val', Demand.Refusers);
            if (Demand.Note !== '') $("#Note").jqxTextArea('val', Demand.Note);
            if (Demand.Information !== '') $("#Information").jqxTextArea('val', Demand.Information);
            
            if (Demand.InstallManager !== '') $("#InstallManager").jqxInput('val', Demand.InstallManager);
            if (Demand.ServiceManager !== '') $("#ServiceManager").jqxInput('val', Demand.ServiceManager);
            if (Demand.SalesManager !== '') $("#SalesManager").jqxInput('val', Demand.SalesManager);
        };
        
        
        
        var initContactInfoGrid = function () {
            
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
                    width: '100%',
                    height: '180',
                    source: DataObjectsGroupsExecutors,
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
                var Temp = $('#ContactInfoGrid').jqxGrid('getrowdata', event.args.rowindex);
                if (Temp !== undefined) {
                    CurrentRowData = Temp;
                } else {CurrentRowData = null};
            });

            $('#ContactInfoGrid').on('rowdoubleclick', function (event) { 
                $("#EditContactInfo").click();
            });


            $("#NewContactInfo").on('click', function ()
            {
                window.open('/index.php?r=ContactInfo/Insert&ObjectGr_id=' + ObjectsGroup.ObjectGr_id);
            });

            $("#EditContactInfo").on('click', function ()
            {
                window.open('/index.php?r=ContactInfo/Update&ObjectGr_id='+ ObjectsGroup.ObjectGr_id + '&Info_id=' + CurrentRowData.Info_id);
            });

            $("#DelContactInfo").on('click', function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=ContactInfo/Delete",
                    data: { Info_id: CurrentRowData.Info_id },
                    
                    success: function(){
                        $("#ContactInfoGrid").jqxGrid('updatebounddata');
                        $("#ContactInfoGrid").jqxGrid('selectrow', 0);
                    }
                });
            });
        };
        
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    initInputs ();
                    initContactInfoGrid();
                    break;
                case 1:
                    loadPage('<?php echo Yii::app()->createUrl('ObjectsGroupsystems/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>');
                    break;
            }
        };
        $('#jqxTabs').jqxTabs({ width: 1800, height: 860,  initTabContent: initWidgets });
 
        var loadPage = function (url) {
            $.get(url, function (data) {
                $('#content2').html(data);
            });
        };

        
    });
</script>
    

<?php

$this->breadcrumbs=array(
    'Список объектов'=>array('/object/index'),
    'Карточка объекта: ' . $model->Address,
);

?>

    
<div id='jqxWidget'>
    <div id='jqxTabs'>
        <ul>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
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
        </ul>
        <div style="overflow: hidden;">
            <div style="overflow: hidden;  margin-bottom: 10px; background-color: #F2F2F2;">
                <div class="row">
                    <span style="margin-left: 10px;">Клиент: <input readonly type="text" id="FullName"></span>
                    <span style="margin-left: 10px;">Тип клиента: <input readonly type="text" id="LphName"></span>
                </div>

                <div class="row" style="margin-left: 10px;">Адрес: <input readonly type="text" id="Address"></div>

                <div class="row">
                    <span style="margin-left: 10px;">Квартир: <input readonly type="text" id="Apartment"></span>
                    <span style="margin-left: 10px;">Кол-во этажей: <input readonly type="text" id="Floor"></span>
                    <span style="margin-left: 10px;">Год постройки: <input readonly type="text" id="year_construction"></span>
                </div>

                <div class="row">
                    <span style="margin-left: 10px;">Подъезды: <input readonly type="text" id="DoorwayList"></span>
                    <span style="margin-left: 10px;">Кол-во подъездов: <input readonly type="text" id="CountPorch"></span>
                </div>

                <div class="row">
                    <span style="margin-left: 10px;">Сегмент: <input readonly type="text" id="ClientGroup"></span>
                    <span style="margin-left: 10px;">Журнал: <input readonly type="text" id="Journal"></span>
                </div>

                <div class="row" style="margin-left: 10px;">Почта: <input readonly type="text" id="PostalAddress"></div>

                <div style="display: inline-block; margin: 0; ">
                    <div class="row" style="margin-left: 10px; display: inline-block;">Отказники: <textarea readonly type="text" id="Refusers"></textarea></div>
                    <div class="row" style="display: inline-block;">Примечание: <textarea readonly type="text" id="Note"></textarea></div>
                    <div class="row" style="margin-left: 10px;">Общая информация: <textarea readonly type="text" id="Information"></textarea></div>
                </div>
                
                <div style="overflow: hidden; padding: 50px 0 0 40px; display: inline-block;">
                    <div class="row">Менеджер М: <input readonly type="text" id="InstallManager"></div>
                    <div class="row">Менеджер СЦ: <input readonly type="text" id="ServiceManager"></div>
                    <div class="row">Менеджер ОП: <input readonly type="text" id="SalesManager"></div>
                </div>
                
                <div class="row" style="margin-left: 10px;"><input type="button" value="Изменить" id='ChangeObjectsGroup' /></div>
            </div>
            
            <hr style="border-color: #cecece;"/>
            <div class="row" style="margin: 5px 10px;">Контактные лица: </div>
            
            <div style=" overflow: hidden; margin-left: 15px;"><div id="ContactInfoGrid" class="jqxGridAliton"></div></div>
            
            <div class="row" style="margin-left: 10px;">
                <div class="row-column"><input type="button" value="Создать" id='NewContactInfo' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditContactInfo' /></div>
                <div class="row-column"><input type="button" value="Удалить" id='DelContactInfo' /></div>
            </div>
        </div>
        <div id='content2' style="overflow: hidden; margin-left: 10px;">
            <div style="width: 100%; height: 100%">
                
            </div>
        </div>
    </div>
</div>
