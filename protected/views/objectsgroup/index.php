<script type="text/javascript">
    var OG = {};
    $(document).ready(function () {
        var ObjectGroup = {
            ObjectGr_id: <?php echo json_encode($model->ObjectGr_id); ?>,
            PropForm_id: <?php echo json_encode($model->PropForm_id); ?>,
            FullName: <?php echo json_encode($model->FullName); ?>,
            LphName: <?php echo json_encode($model->LphName); ?>,
            Address_id: <?php echo json_encode($model->Address_id); ?>,
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
            Street_id: <?php echo json_encode($model->Street_id); ?>,
            CommonObject_id: <?php echo json_encode($model->CommonObject_id); ?>,
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
        OG.Address_id = ObjectGroup.Address_id;
        
        console.log('Address_id:' + OG.Address_id);
        
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
            $("#AddInstructing").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            $("#ViewDemandsObjectsGroup").on('click', function () {
                var Data = {
                    ObjectGr_id: ObjectGroup.ObjectGr_id
                };
                
                window.open(<?php echo json_encode(Yii::app()->createUrl('Demands/Index')); ?> + '&DemFilters[ObjectGr_id]=' + ObjectGroup.ObjectGr_id + '&DemFilters[DemObjectGroup]=true' + '&DemFilters[House]=' + ObjectGroup.House + '&DemFilters[Street_id]=' + ObjectGroup.Street_id);
            });
            
            $("#AddInstructing").on('click', function ()
            {
                if (ObjectGroup != undefined) {
                    $('#ObjectsGroupDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 620, height: 370, position: 'center'}));
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('ValuableInstructions/Create')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            Form_id: ObjectGroup.PropForm_id,
                            Demand_id: 0
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
            
            $("#ChangeObjectsGroup").on('click', function ()
            {
                if (ObjectGroup != undefined) {
                    $('#ObjectsGroupDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {width: 850, height: 730, position: 'center'}));
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
            
            var contextMenu = $("#ContextMenu1").jqxMenu({ width: 200, height: 58, autoOpenPopup: false, mode: 'popup'});
            $("#ContactInfoGrid").on('contextmenu', function () {
                return false;
            });

            $("#ContactInfoGrid").on("columnclick", function (event) {
                var scrollTop = $(window).scrollTop();
                var scrollLeft = $(window).scrollLeft();
                contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                return false;
            });

            $("#ContactInfoGrid").on('rowclick', function (event) {
                if (event.args.rightclick) {
                    $("#ContactInfoGrid").jqxGrid('selectrow', event.args.rowindex);
                    var scrollTop = $(window).scrollTop();
                    var scrollLeft = $(window).scrollLeft();
                    contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                    return false;
                }
            });
            
            
            function getCookie(name) {
                var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
                return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            function setCookie(name, value, options) {
                options = options || {};

                var expires = options.expires;

                if (typeof expires == "number" && expires) {
                    var d = new Date();
                    d.setTime(d.getTime() + expires * 1000);
                    expires = options.expires = d;
                }
                if (expires && expires.toUTCString) {
                    options.expires = expires.toUTCString();
                }

                value = encodeURIComponent(value);

                var updatedCookie = name + "=" + value;

                for (var propName in options) {
                    updatedCookie += "; " + propName;
                    var propValue = options[propName];
                    if (propValue !== true) {
                        updatedCookie += "=" + propValue;
                    }
                }

                document.cookie = updatedCookie;
            }

            $("#ContextMenu1").on('itemclick', function (event) {
                var args = event.args;
                var rowindex = $("#ContactInfoGrid").jqxGrid('getselectedrowindex');
                if ($.trim($(args).text()) == "Копировать контакты") {
                    setCookie("Out_ObjectGr_id", ObjectsGroup.ObjectGr_id, 3600);
                }
                if ($.trim($(args).text()) == "Вставить контакты") {
                    var Out_ObjectGr_id = getCookie("Out_ObjectGr_id");
                    if (Out_ObjectGr_id != undefined) {
                        PasteContactInfo(Out_ObjectGr_id);
                    }
                }
            });
            
            
            function PasteContactInfo(Out_ObjectGr_id1) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl("ContactInfo/Paste")); ?>,
                    type: 'POST',
                    async: true,
                    data: {
                       Out_ObjectGr_id: Out_ObjectGr_id1,
                       In_ObjectGr_id: ObjectsGroup.ObjectGr_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        Out_ObjectGr_id = Res.id;
                        $('#ContactInfoGrid').jqxGrid('updatebounddata');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }

                });
            };



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
            $('#btnCopyContactBuffer').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 220}));
            $("#DelContactInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            
            $('#btnCopyContactBuffer').on('click', function() {
                var Out_ObjectGr_id = getCookie("Out_ObjectGr_id");
                if (Out_ObjectGr_id != undefined) {
                    PasteContactInfo(Out_ObjectGr_id);
                }
            });
            
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
                $('#ObjectsGroupDialog').jqxWindow({width: 620, height: 470, position: 'center'});
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
        
        var initSystems = function() {
            var CurrentRowDataSystem;
        
            var OGSystems = {
                ObjectGr_id: ObjectGroup.ObjectGr_id,
            };

            var OGSystemsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectsGroupSystems, {async: true}), {
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
                        { text: 'Наличие системы', dataField: 'Availability', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                        { text: 'Кол-во систем', dataField: 'count', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 110 },
                        { text: 'Обслуживающие организации', dataField: 'Competitors', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                        { text: 'Тип системы', dataField: 'SystemTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 220 },
                        { text: 'Условия', dataField: 'Condition', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                        { text: 'Сложность системы', dataField: 'SystemComplexityFull', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 170 },
                        { text: 'Коэф. сложности', dataField: 'Coefficient', columntype: 'textbox', width: 60 },
                        { text: 'Состояние системы', dataField: 'SystemStatementsName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 150 },
                        { text: 'Коэф. состояния', dataField: 'Coefficient2', columntype: 'textbox', width: 60 },
                    ]
                })
            );

            $("#ObjectsGroupSystemsGrid").on("bindingcomplete", function (event) {
                $("#ObjectsGroupSystemsGrid").jqxGrid('selectrow', 0);
            });  

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
                    CurrentRowDataSystem = Temp;
                } else {CurrentRowDataSystem = null};
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
                LoadFormUpdate(CurrentRowDataSystem.ObjectsGroupSystem_id);

            });

            $("#DelObjectsGroupSystem").on('click', function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=ObjectsGroupSystems/Delete",
                    data: { ObjectsGroupSystem_id: CurrentRowDataSystem.ObjectsGroupSystem_id },
                    success: function(){
                        $("#ObjectsGroupSystemsGrid").jqxGrid('updatebounddata');
                        $("#ObjectsGroupSystemsGrid").jqxGrid('selectrow', 0);
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
                    if (index == 8)
                        $('#content9').html(data);
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
                    if (index == 8)
                        $('#content9').html(Res.responseText);
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
        
        var initOjectEquips = function() {
            var Mode = '';
            var House = {
                ObjectGr_id: ObjectGroup.ObjectGr_id,
                CommonObject_id: ObjectGroup.CommonObject_id,
                Address_id: OG.Address_id
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

            $('#edObjectNote').jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { height: 180, width: 'calc(100% - 2px)', minLength: 1 }));
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

            });

            $('#btnEditObject').on('click', function(){
                Mode = 'Update';
                LoadEditForm(Mode, ObjectCorrentRow.Object_id, House.ObjectGr_id);

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
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
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
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
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
                        ObjectGr_id: ObjectGr_id,
                        Address_id: House.Address_id
                    },
                    success: function(Res) {
                        $('#EditObjectDialog #BodyDialog').html(Res);
                        $('#EditObjectDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
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
                        $('#EditObjectEquipDialog').jqxWindow('open');
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            };

            var initWidgets = function (tab) {
                switch (tab) {
                    case 0:
                        $("#ObjectEquipsGrid").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                height: '100%',
                                width: 'calc(100% - 10px)',
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

                        });

                        $('#btnEditEquip').on('click', function(){
                            Mode = 'Update';
                            if (EquipCurrentRow != undefined)
                                LoadForm('<?php echo Yii::app()->createUrl('ObjectEquips/Update'); ?>', {Code: EquipCurrentRow.Code}, $('#BodyObjectEquipDialog'), 'Elem.html(Res);');

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
                                height: 'calc(100% - 2px)',
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
                        });

                        $('#btnEditCommonEquip').on('click', function(){
                            Mode = 'Update';
                            if (EquipCommonCurrentRow != undefined)
                                LoadForm('<?php echo Yii::app()->createUrl('ObjectEquips/Update'); ?>', {Code: EquipCommonCurrentRow.Code}, $('#BodyObjectEquipDialog'), 'Elem.html(Res);');    

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

            $('#EquipTabs').jqxTabs({ width: 'calc(100% - 10px)', height: 'calc(100% - 2px)',  initTabContent: initWidgets });

            $("#ObjectsGrid").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    height: 200,
                    width: 'calc(100% - 2px)',
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
                        { text: 'Условия', datafield: 'Condition', width: 600},
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
        };
        
        var initContractsS = function() {
            var CurrentRowDataContractsS;
        
            var Contracts = {
                ObjectGr_id: ObjectGroup.ObjectGr_id,
                Price: '<?php //echo $model->Price; ?>',
                PriceMonth: '<?php //echo $model->PriceMonth; ?>',
                Reason_id: '<?php //echo $model->Reason_id; ?>',
                LastChangeDate: '<?php //echo $model->LastChangeDate; ?>',
            };

            var ContractsSDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractsS, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["c.ObjectGr_id = " + Contracts.ObjectGr_id],
                    });
                    return data;
                },
            });

            $("#ContractsGrid").on('bindingcomplete', function (event) {
                $("#ContractsGrid").jqxGrid('selectrow', 0);
            });

            $("#ContractsGrid").on('rowselect', function (event) {
                CurrentRowDataContractsS = $('#ContractsGrid').jqxGrid('getrowdata', event.args.rowindex);
                
                
                
                if (CurrentRowDataContractsS != undefined) {
                    Contracts.Price = CurrentRowDataContractsS.Price;
                    Contracts.PriceMonth = CurrentRowDataContractsS.PriceMonth;
                    Contracts.Reason_id = CurrentRowDataContractsS.Reason_id;
                    Contracts.LastChangeDate = CurrentRowDataContractsS.LastChangeDate;
                    
                    
                    $("#MoreInformContract").jqxButton({ disabled: false });
                    $("#JuridicalPerson").jqxInput('val', CurrentRowDataContractsS.JuridicalPerson);
                    $("#MasterName").jqxInput('val', CurrentRowDataContractsS.MasterName);
                    $("#DateExecuting").jqxDateTimeInput('val', CurrentRowDataContractsS.DateExecuting);
                    $("#SpecialCondition").jqxTextArea('val', CurrentRowDataContractsS.SpecialCondition);
                    $("#ContrNote").jqxTextArea('val', CurrentRowDataContractsS.ContrNote);

                    var TabIndex = $('#jqxTabsContracts').jqxTabs('selectedItem');
                    switch(parseInt(TabIndex)) {
                        case 0:
                            $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                            break;
                        case 1:
                            $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                            break;
                        case 2:
                            $("#PaymentHistoryGrid").jqxGrid('updatebounddata');
                            break;
                        case 3:
                            $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                            break;
                    }
                }
            });

            $("#ContractsGrid").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    pageable: false,
                    showstatusbar: true,
                    statusbarheight: 29,
                    showaggregates: true,
                    showfilterrow: false,
                    virtualmode: false,
                    width: '100%',
                    height: '100%',
                    source: ContractsSDataAdapter,
                    columns: [
                        { text: 'Вид документа', dataField: 'DocType_Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                        { text: 'Тип договора', dataField: 'crtp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130 },
                        { text: 'Подписание акта', dataField: 'date_doc', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 135 },
                        { text: 'Номер', dataField: 'ContrNumS', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 90 },
                        { text: 'Дата', dataField: 'ContrDateS', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                        { text: 'Действует с', dataField: 'ContrSDateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                        { text: 'по', dataField: 'ContrSDateEnd', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 90 },
                        { text: 'Сумма долга', cellsalign: 'right', datafield: 'Debt', cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100, aggregates: [{ 'Сумма':
                                            function (aggregatedValue, currentValue) {
                                                return aggregatedValue + currentValue;
                                            }
                                          }] },
                        { text: 'Период оплаты', dataField: 'PaymentName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120 },
                        { text: 'Вид оплаты', dataField: 'PaymentTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                        { text: 'Оплачено по', dataField: 'DatePay', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 105 },
                        { text: 'Долг', datafield: 'Debtor', columntype: 'checkbox', filtercondition: 'STARTS_WITH', width: 50 },
                        { text: 'Оплачено', datafield: 'SumPay', cellsalign: 'right', cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 90 },
                        { text: 'MasterName', dataField: 'MasterName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 120, hidden: true },
                    ]
                })
            );

            $("#JuridicalPerson").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 302 }));
            $("#MasterName").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 170 }));
            $("#DateExecuting").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 100 }));
            $("#SpecialCondition").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 50 }));
            $("#ContrNote").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 50 }));
            $("#dropDownBtnContracts").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { width: 210, height: 28 }));
            $("#jqxTreeContracts").jqxTree({ width: 210 });
            $("#MoreInformContract").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150, disabled: true }));
            $("#ReloadContracts").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#DelContract").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $('#NewContractDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: 630, width: 870}));
            $("#btnViewActs").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnViewActs").on('click', function() {
                var url = <?php echo json_encode(Yii::app()->createUrl('WhActs/Index')); ?>;
                window.open(url + '&Address=' + OG.Addr);
            });
            $("#btnBillPay").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnBillPay").on('click', function() {
                window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen', array(
                    'ReportName' => '/Договора/Начисления и платежи по договору',
                    'Ajax' => false,
                    'Render' => true,
                    ))); ?> + '&Parameters[ContrS_id]=' + CurrentRowDataContractsS.ContrS_id);
            });
            var openCreateWindow = function (DocType_Name) {
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Documents/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: { 
                        ObjectGr_id: Contracts.ObjectGr_id,
                        DocType_Name: DocType_Name
                    },
                    success: function(Res) {
                        $('#NewContractBodyDialog').html(Res);
                        $('#NewContractHeaderText').html(DocType_Name);
                    }
                });
                $('#NewContractDialog').jqxWindow('open');
            };


            $('#jqxTreeContracts').on('select', function (event) {
                var args = event.args;
                var item = $('#jqxTreeContracts').jqxTree('getItem', args.element);
                openCreateWindow(item.label);
                $("#jqxTreeContracts").jqxTree('selectItem', null);
            });


            var dropDownBtnContent = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 5px;">Создать</div>';
            $("#dropDownBtnContracts").jqxDropDownButton('setContent', dropDownBtnContent);


            $('#ContractsGrid').on('rowdoubleclick', function () { 
                $("#MoreInformContract").click();
            });


            $("#MoreInformContract").on('click', function ()
            {
                window.open('/index.php?r=Documents/Index&ContrS_id=' + CurrentRowDataContractsS.ContrS_id);
            });

            $("#ReloadContracts").on('click', function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=ContractsS/Index",
                    success: function(){
                        $("#ContractsGrid").jqxGrid('updatebounddata');
                        $("#ContractsGrid").jqxGrid('selectrow', 0);
                    }
                });
            });

            $("#DelContract").on('click', function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=ContractsS/Delete",
                    data: { ContrS_id: CurrentRowDataContractsS.ContrS_id },
                    success: function(){
                        $("#ContractsGrid").jqxGrid('updatebounddata');
                        $("#ContractsGrid").jqxGrid('selectrow', 0);
                    }
                });
            });


            $('#jqxTabsContracts').on('selected', function (event) 
            { 
                var SelectedTab = event.args.item;
                switch (SelectedTab) {
                    case 0:
                        $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                        break;
                    case 1:
                        $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                        break;
                    case 2:
                        $("#PaymentHistoryGrid").jqxGrid('updatebounddata');
                        break;
                    case 3:
                        $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                        break;

                };
            });

            var initWidgets = function (tab) {
                switch (tab) {
                    case 0:
                        /* Тип обслуживаемых систем */ 
                        /* Текущая выбранная строка данных */
                        var CurrentRowDataCS;
                        var ContractSystemsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractSystems, {}), {
                            formatData: function (data) {
                                var CurrentRowDataContractsS = $('#ContractsGrid').jqxGrid('getrowdata', $('#ContractsGrid').jqxGrid('getselectedrowindex'));
                                if (CurrentRowDataContractsS == undefined)
                                    $.extend(data, {
                                        Filters: ["cs.ContrS_id = 0"],
                                    });
                                else
                                    $.extend(data, {
                                        Filters: ["cs.ContrS_id = " + CurrentRowDataContractsS.ContrS_id],
                                    });
                                return data;
                            },
                        });

                        $("#ContractSystemsGrid").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                pageable: false,
                                showfilterrow: false,
                                virtualmode: false,
                                width: 'calc(100% - 2px)',
                                height: 'calc(100% - 2px)',
                                source: ContractSystemsDataAdapter,
                                columns: [
                                    { text: 'Тип подсистемы', dataField: 'SystemTypeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 400 },
                                ]
                            })
                        );

                        $("#ContractSystemsGrid").on('bindingcomplete', function (event) {
                            $("#ContractSystemsGrid").jqxGrid('selectrow', 0);
                        });

                        $("#ContractSystemsGrid").on('rowselect', function (event) {
                            CurrentRowDataCS = $('#ContractSystemsGrid').jqxGrid('getrowdata', event.args.rowindex);
                        });
                        $("#NewContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#DelContractSystems").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $('#EditDialogContractSystems').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '170px', width: '340'}));

                        $("#NewContractSystems").on('click', function () {
                            var CurrentRowDataContractsS = $('#ContractsGrid').jqxGrid('getrowdata', $('#ContractsGrid').jqxGrid('getselectedrowindex'));
                            if (CurrentRowDataContractsS == undefined) return;
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('ContractSystems/Insert')); ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    ContrS_id: CurrentRowDataContractsS.ContrS_id
                                },
                                success: function(Res) {
                                    $('#BodyDialogContractSystems').html(Res);
                                    $('#EditDialogContractSystems').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });

                        });
                        $("#DelContractSystems").on('click', function ()  {
                            if(typeof CurrentRowDataCS !== 'undefined') {
                                $.ajax({
                                    type: "POST",
                                    url: "/index.php?r=ContractSystems/Delete",
                                    data: { ContractSystem_id: CurrentRowDataCS.ContractSystem_id},
                                    success: function(){
                                        $("#ContractSystemsGrid").jqxGrid('updatebounddata');
                                        $("#ContractSystemsGrid").jqxGrid('selectrow', 0);
                                    },
                                    error: function(Res) {
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                    }
                                });
                            }
                        });
                    break;
                    case 1:
                        /* Текущая выбранная строка данных */

                        var CurrentRowDataCPH;
                        var ContractPriceHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractPriceHistory, {}), {
                            formatData: function (data) {
                                if (CurrentRowDataContractsS == undefined)
                                    $.extend(data, {
                                        Filters: ["ph.ContrS_id = 0"],
                                    });
                                else
                                    $.extend(data, {
                                        Filters: ["ph.ContrS_id = " + CurrentRowDataContractsS.ContrS_id],
                                    });
                                return data;
                            },
                        });

                        $("#ContractPriceHistoryGrid").on('rowselect', function (event) {
                            CurrentRowDataCPH = $('#ContractPriceHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
                        });



                        $("#NewContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#EditContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#ClearContractPriceHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 160 }));

                        $("#ContractPriceHistoryGrid").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                pageable: false,
                                showfilterrow: false,
                                sortable: false,
                                filterable: false,
                                virtualmode: false,
                                source: ContractPriceHistoryDataAdapter,
                                width: 'calc(100% - 2px)',
                                height: 'calc(100% - 2px)',
                                columns: [
                                    { text: 'Тариф', dataField: 'ServiceType', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                                    { text: 'Дата изменения', dataField: 'DateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                                    { text: 'Расценка', datafield: 'Price', columntype: 'textbox', cellsformat: 'f2', filtercondition: 'STARTS_WITH', width: 130 },
                                    { text: 'Ежемесячные начисления', datafield: 'PriceMonth', cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                                    { text: 'Причина изменения', dataField: 'ReasonName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 200 },
                                ]
                            })
                        );

                        $("#ContractPriceHistoryGrid").on('bindingcomplete', function (event) {
                            $("#ContractPriceHistoryGrid").jqxGrid('selectrow', 0);
                        });

                        $('#EditDialogContractPriceHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '280px', width: '600'}));

                        $("#NewContractPriceHistory").on('click', function () {
                            if (CurrentRowDataContractsS == undefined) return;
                            var Date = CurrentRowDataContractsS.ContrSDateEnd;
                            var DateEnd = Date.getDate() + '.' + (Date.getMonth()+1) + '.' + Date.getFullYear();
                            var DataInformations = $('#ContractPriceHistoryGrid').jqxGrid('getdatainformation');
                            var RowsCounts = DataInformations.rowscount;
                            $("#ContractPriceHistoryGrid").jqxGrid('selectrow', (RowsCounts - 1));
                            if (CurrentRowDataCPH == undefined) {
                                
                                CurrentRowDataCPH = {};
                                CurrentRowDataCPH.ContrS_id = CurrentRowDataContractsS.ContrS_id;
                                CurrentRowDataCPH.Reason_id = 1;
                                CurrentRowDataCPH.ServiceType_id = null;
                                CurrentRowDataCPH.DateStart = CurrentRowDataContractsS.ContrSDateStart;
                                CurrentRowDataCPH.Price = null;
                                CurrentRowDataCPH.PriceMonth = null;

                            }

                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('ContractPriceHistory/Insert')); ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    ContrS_id: CurrentRowDataContractsS.ContrS_id, 
                                    DateEnd: DateEnd,
                                    Price: CurrentRowDataContractsS.Price,
                                    Params: {
                                        ContrS_id: CurrentRowDataContractsS.ContrS_id, 
                                        Reason_id: CurrentRowDataCPH.Reason_id,
                                        ServiceType_id: CurrentRowDataCPH.ServiceType_id,
                                        DateStart: CurrentRowDataCPH.DateStart,
                                        Price: CurrentRowDataCPH.Price,
                                        PriceMonth: CurrentRowDataCPH.PriceMonth,
                                        DateEnd: DateEnd
                                    }
                                },
                                success: function(Res) {
                                    $('#BodyDialogContractPriceHistory').html(Res);
                                    $('#EditDialogContractPriceHistory').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });

                        });

                        $("#EditContractPriceHistory").on('click', function () {
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('ContractPriceHistory/Update')); ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    PriceHistory_id: CurrentRowDataCPH.PriceHistory_id,
                                    Params: {
                                        ContrS_id: CurrentRowDataContractsS.ContrS_id, 
                                        Reason_id: CurrentRowDataCPH.Reason_id,
                                        ServiceType_id: CurrentRowDataCPH.ServiceType_id,
                                        DateStart: CurrentRowDataCPH.DateStart,
                                        Price: CurrentRowDataCPH.Price,
                                        PriceMonth: CurrentRowDataCPH.PriceMonth,
                                        DateEnd: CurrentRowDataCPH.DateEnd,
                                    }
                                },
                                success: function(Res) {
                                    $('#BodyDialogContractPriceHistory').html(Res);
                                    $('#EditDialogContractPriceHistory').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });

                        $('#ContractPriceHistoryGrid').on('rowdoubleclick', function () { 
                            $("#EditContractPriceHistory").click();
                        });


                        $("#ClearContractPriceHistory").on('click', function (){
                            if (CurrentRowDataContractsS == undefined) return;
                            $.ajax({
                                type: "POST",
                                url: "/index.php?r=ContractPriceHistory/Delete",
                                data: { ContrS_id: CurrentRowDataContractsS.ContrS_id},
                                success: function(){
                                    $("#ContractPriceHistoryGrid").jqxGrid('updatebounddata');
                                    $("#ContractPriceHistoryGrid").jqxGrid('selectrow', 0);
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                }
                            });
                        });
                    break;
                    case 2:
                        /* Текущая выбранная строка данных */
                        var CurrentRowDataPH;
                        var PaymentHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePaymentHistory, {}), {
                            formatData: function (data) {
                                if (CurrentRowDataContractsS == undefined)
                                    $.extend(data, {
                                        Filters: ["ph.cntr_id = 0"],
                                    });
                                else
                                    $.extend(data, {
                                        Filters: ["ph.cntr_id = " + CurrentRowDataContractsS.ContrS_id],
                                    });
                                return data;
                            },
                        });

                        $("#PaymentHistoryGrid").on('rowselect', function (event) {
                            CurrentRowDataPH = $('#PaymentHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);

                            if (CurrentRowDataPH != undefined) $("#NotePaymentHistory").jqxTextArea('val', CurrentRowDataPH.note);

                        });

                        $('#PaymentHistoryGrid').on('rowdoubleclick', function () { 
                            $("#EditPaymentHistory").click();
                        });

                        $("#PaymentHistoryGrid").on('bindingcomplete', function() {
                            $("#PaymentHistoryGrid").jqxGrid('selectrow', 0);
                        });

                        $("#NotePaymentHistory").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%', height: 'calc(100% - 2px)' }));
                        $("#NewPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#EditPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#DelPaymentHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $('#EditDialogPaymentHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '400px', width: '400'}));


                        $("#PaymentHistoryGrid").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                pageable: false,
                                sortable: false,
                                filterable: false,
                                showfilterrow: false,
                                virtualmode: false,
                                source: PaymentHistoryDataAdapter,
                                width: 'calc(100% - 2px)',
                                height: 'calc(100% - 2px)',
                                columns: [
                                    { text: 'Дата', columngroup: 'Payment', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 100 },
                                    { text: 'Сумма', columngroup: 'Payment', datafield: 'sum', cellsformat: 'f2', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                                    { text: 'Месяц с', columngroup: 'PaymentPeriod', dataField: 'month_start_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                                    { text: 'Год с', columngroup: 'PaymentPeriod', dataField: 'year_start', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                                    { text: 'Месяц по', columngroup: 'PaymentPeriod', dataField: 'month_end_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100 },
                                    { text: 'Год по', columngroup: 'PaymentPeriod', dataField: 'year_end', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70 },
                                ],
                                columngroups: 
                                [
                                    { text: 'Платеж', align: 'center', name: 'Payment' },
                                    { text: 'Период оплаты', align: 'center', name: 'PaymentPeriod' },
                                ]
                            })
                        );

                        $("#PaymentHistoryGrid").jqxGrid('selectrow', 0);

                        $("#NewPaymentHistory").on('click', function ()
                        {
                            if (CurrentRowDataContractsS == undefined) return;
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('PaymentHistory/Insert')); ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    cntr_id: CurrentRowDataContractsS.ContrS_id
                                },
                                success: function(Res) {
                                    $('#BodyDialogPaymentHistory').html(Res);
                                    $('#EditDialogPaymentHistory').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                },        
                            });

                        });

                        $("#EditPaymentHistory").on('click', function ()
                        {
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('PaymentHistory/Update')); ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    pmhs_id: CurrentRowDataPH.pmhs_id
                                },
                                success: function(Res) {
                                    $('#BodyDialogPaymentHistory').html(Res);
                                    $('#EditDialogPaymentHistory').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                },        
                            });
                        });


                        $("#DelPaymentHistory").on('click', function ()
                        {
                            if(typeof CurrentRowDataPH !== 'undefined') {
                                $.ajax({
                                    type: "POST",
                                    url: "/index.php?r=PaymentHistory/Delete",
                                    data: { pmhs_id: CurrentRowDataPH.pmhs_id},
                                    success: function(){
                                        $("#PaymentHistoryGrid").jqxGrid('updatebounddata');
                                        $("#PaymentHistoryGrid").jqxGrid('selectrow', 0);
                                    }
                                });
                            }
                        });
                    break;
                    case 3:
                        /* Текущая выбранная строка данных */
                        var CurrentRowDataMH;
                            var ContractMasterHistoryDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceContractMasterHistory, {}), {
                            formatData: function (data) {
                                if (CurrentRowDataContractsS == undefined)
                                    $.extend(data, {
                                        Filters: ["c.ContrS_id = 0"],
                                    });
                                else
                                    $.extend(data, {
                                        Filters: ["c.ContrS_id = " + CurrentRowDataContractsS.ContrS_id],
                                    });
                                return data;
                            },
                        });

                        $("#ContractMasterHistoryGrid").on('rowselect', function (event) {
                            CurrentRowDataMH = $('#ContractMasterHistoryGrid').jqxGrid('getrowdata', event.args.rowindex);
                        });

                        $("#NewContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#ReloadContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                        $("#DelContractMasterHistory").jqxButton($.extend(true, {}, ButtonDefaultSettings));

                        $('#EditDialogContractMasterHistory').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '270px', width: '340'}));




                        $("#ContractMasterHistoryGrid").jqxGrid(
                            $.extend(true, {}, GridDefaultSettings, {
                                pageable: false,
                                sortable: false,
                                filterable: false,
                                showfilterrow: false,
                                virtualmode: false,
                                source: ContractMasterHistoryDataAdapter,
                                width: 'calc(100% - 2px)',
                                height: 'calc(100% - 2px)',
                                columns: [
                                    { text: 'Мастер', dataField: 'EmployeeName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 250 },
                                    { text: 'Дата с', dataField: 'WorkDateStart', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                                    { text: 'Дата по', dataField: 'WorkDateEnd', columntype: 'date', cellsformat: 'dd.MM.yyyy', filtercondition: 'STARTS_WITH', width: 120 },
                                ]
                            })
                        );

                        $("#ContractMasterHistoryGrid").on('bindingcomplete', function (event) {
                            $("#ContractMasterHistoryGrid").jqxGrid('selectrow', 0);
                        });

                        $("#NewContractMasterHistory").on('click', function () {
                            if (CurrentRowDataContractsS == undefined) return;
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('ContractMasterHistory/Insert')); ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    ContrS_id: CurrentRowDataContractsS.ContrS_id
                                },
                                success: function(Res) {
                                    $('#BodyDialogContractMasterHistory').html(Res);
                                    $('#EditDialogContractMasterHistory').jqxWindow('open');
                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                                },          
                            });

                        });

                        $("#ReloadContractMasterHistory").on('click', function () {
                            $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                        });


                        $("#DelContractMasterHistory").on('click', function ()
                        {
                            if(typeof CurrentRowDataMH !== 'undefined') {
                                $.ajax({
                                    type: "POST",
                                    url: "/index.php?r=ContractMasterHistory/Delete",
                                    data: { History_id: CurrentRowDataMH.History_id},
                                    success: function(){
                                        $("#ContractMasterHistoryGrid").jqxGrid('updatebounddata');
                                    }
                                });
                            }
                        });
                    break;
                }
            };

            $('#jqxTabsContracts').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)', initTabContent: initWidgets, selectedItem: 1});
        };
        
        var initContacts = function() {
            var CurrentRowData;
        
            var Contacts = {
                ObjectGr_id: ObjectGroup.ObjectGr_id,
            };

            var ContactsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.Contacts, {}), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["c.ObjectGr_id = " + Contacts.ObjectGr_id],
                    });
                    return data;
                },
            });

            var cellsrenderer = function (row, columnfield, value, defaulthtml, columnproperties) {
                var Temp = $('#ContactsGrid').jqxGrid('getrowdata', row);
                var column = $("#ContactsGrid").jqxGrid('getcolumn', columnfield);
                if (column.cellsformat != '') {
                    if ($.jqx.dataFormat) {
                        if ($.jqx.dataFormat.isDate(value)) {
                            value = $.jqx.dataFormat.formatdate(value, column.cellsformat);
                        }   
                        else if ($.jqx.dataFormat.isNumber(value)) {
                            value = $.jqx.dataFormat.formatnumber(value, column.cellsformat);
                        }
                    }
                }
//                console.log(Temp);
                if ((Temp["ContactPriority"] == 1)) 
                    return '<span class="backlight_pink" style="margin: 4px; float: ' + columnproperties.cellsalign + ';">' + value + '</span>';
            };

            $("#ContactsGrid").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    pagesizeoptions: ['10', '200', '500', '1000'],
                    pagesize: 200,
                    showfilterrow: false,
                    virtualmode: false,
                    width: '99.5%',
                    height: '99.5%',
                    source: ContactsDataAdapter,
                    columns: [
                        { text: 'Отдел', columngroup: 'Current', dataField: 'GroupContact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 70, cellsrenderer: cellsrenderer },
                        { text: 'Тема', columngroup: 'Current', dataField: 'Kind_Name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 230, cellsrenderer: cellsrenderer },
                        { text: 'Источник', columngroup: 'Current', dataField: 'sourceInfo_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 90, cellsrenderer: cellsrenderer },
                        { text: 'Дата', columngroup: 'Current', dataField: 'date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 130, cellsrenderer: cellsrenderer },
                        { text: 'Тип', columngroup: 'Current', dataField: 'cntp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130, cellsrenderer: cellsrenderer },
                        { text: 'Контактное лицо', columngroup: 'Current', dataField: 'contact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 300, cellsrenderer: cellsrenderer },
                        { text: 'Сотрудник', columngroup: 'Current', dataField: 'empl_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130, cellsrenderer: cellsrenderer },
                        { text: 'Создал', columngroup: 'Current', dataField: 'UserCreateName', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 130, cellsrenderer: cellsrenderer },
                        { text: 'Дата', columngroup: 'Next', dataField: 'next_date', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 130, cellsrenderer: cellsrenderer },
                        { text: 'Тип', columngroup: 'Next', dataField: 'next_cntp_name', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 100, cellsrenderer: cellsrenderer },
                        { text: 'Контактное лицо', columngroup: 'Next', dataField: 'next_contact', columntype: 'textbox', filtercondition: 'STARTS_WITH', width: 300, cellsrenderer: cellsrenderer },
//                        { text: 'ContactPriority', columngroup: 'Next', dataField: 'ContactPriority', filtercondition: 'STARTS_WITH', width: 300, hidden: true },
                    ],
                    columngroups: [
                        { text: '', align: 'center', name: 'Current' },
                        { text: 'Следующий контакт', align: 'center', name: 'Next' },
                    ]
                })
            );

            $("#textField").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 450 }));
            $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 450 }));
            $("#drsn_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 370 }));
            $("#rslt_name").jqxInput($.extend(true, {}, InputDefaultSettings, { width: 370 }));
            $("#pay_date").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { formatString: 'dd.MM.yyyy', value: null, height: '25', width: '200', readonly: true, showCalendarButton: false, allowKeyboardDelete: false }));

            $('#EditContactDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {resizable: true, height: '770', width: '840'}));

            $('#EditContactDialog').jqxWindow({initContent: function() {
                $("#btnContactOk").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                $("#btnNotReach").jqxButton($.extend(true, {}, ButtonDefaultSettings));
                $("#btnClientInfo").jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 150 }));
                $("#btnContactCancel").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            }});

            $("#btnContactCancel").on('click', function () {
                $('#EditContactDialog').jqxWindow('close');
            });

            SendForm = function(Mode, Form) {
                var Url;
                if (Mode == 'Insert')
                    Url = "<?php echo Yii::app()->createUrl('Contacts/Insert');?>";
                if (Mode == 'Edit')
                    Url = "<?php echo Yii::app()->createUrl('Contacts/Update');?>";

                var Data;
                if (Form == undefined)
                    Data = $('#Contacts').serialize();
                else Data = Form;

                $.ajax({
                    url: Url,
                    type: 'POST',
                    async: false,
                    data: Data,
                    success: function(Res) {
                        if (Res == '1' || Res == 1) {
                            $('#EditContactDialog').jqxWindow('close');
                            $("#ContactsGrid").jqxGrid('updatebounddata');
    //                        $('#ContactsGrid').jqxGrid({source: LoadData(ContactsDataAdapter)});
                        } else {
                            $('#BodyContactDialog').html(Res);
                        }

                    }
                });
            }

            $("#btnContactOk").on('click', function () {
                SendForm(Mode);
            });

            $("#btnNotReach").on('click', function () {
                if(Mode == 'Insert') {
                    $("#ContactTypes").jqxComboBox('val', '11');
                    $("#textField").jqxTextArea('val', 'Недозвон');
                    SendForm(Mode);
                }
            });

            $("#btnClientInfo").on('click', function () {
                window.open('/index.php?r=ObjectsGroup/Index&ObjectGr_id=' + Contacts.ObjectGr_id);
            });


            $("#NewContact").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#EditContact").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#btnReload").jqxButton($.extend(true, {}, ButtonDefaultSettings));
            $("#DelContact").jqxButton($.extend(true, {}, ButtonDefaultSettings));

            $("#ContactsGrid").on('rowselect', function (event) {
                var Temp = $('#ContactsGrid').jqxGrid('getrowdata', event.args.rowindex);
                if (Temp !== undefined) {
                    CurrentRowData = Temp;
                } else {CurrentRowData = null};

    //            console.log(CurrentRowData.cont_id);
                if(CurrentRowData !== null) {
                    if (CurrentRowData.text !== null) $("#textField").jqxTextArea('val', CurrentRowData.text);
                    if (CurrentRowData.rslt_name !== null) $("#rslt_name").jqxInput('val', CurrentRowData.rslt_name);
                    if (CurrentRowData.note !== null) $("#note").jqxTextArea('val', CurrentRowData.note);
                    if (CurrentRowData.drsn_name !== null) $("#drsn_name").jqxInput('val', CurrentRowData.drsn_name);
                    if (CurrentRowData.pay_date !== null) $("#pay_date").jqxDateTimeInput('val', CurrentRowData.pay_date);
                }
            });

            var LoadFormInsert = function(ObjectGr_id) {
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Contacts/Insert');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        ObjectGr_id: ObjectGr_id
                    },
                    success: function(Res) {
                        $('#BodyContactDialog').html(Res);
                    }
                });
            };

            var LoadFormUpdate = function(cont_id) {
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('Contacts/Update');?>",
                    type: 'POST',
                    async: false,
                    data: {
                        cont_id: cont_id
                    },
                    success: function(Res) {
                        $('#BodyContactDialog').html(Res);
                    }
                });
            };


            $('#ContactsGrid').on('rowdoubleclick', function (event) { 
                $("#EditContact").click();
            });

            $("#NewContact").on('click', function () 
            {
                Mode = 'Insert';
                LoadFormInsert(Contacts.ObjectGr_id);
                $('#EditContactDialog').jqxWindow('open');
            });

            $("#EditContact").on('click', function ()
            {
                Mode = 'Edit';
                LoadFormUpdate(CurrentRowData.cont_id);
                $('#EditContactDialog').jqxWindow('open');
            });

            $("#btnReload").on('click', function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=Contacts/Index",
                    success: function(){
                        $("#ContactsGrid").jqxGrid('updatebounddata');
                        $("#ContactsGrid").jqxGrid('selectrow', 0);
                    }
                });
            });

            $("#DelContact").on('click', function ()
            {
                $.ajax({
                    type: "POST",
                    url: "/index.php?r=Contacts/Delete",
                    data: { cont_id: CurrentRowData.cont_id },
                    success: function(){
                        $("#ContactsGrid").jqxGrid('updatebounddata');
                        $("#ContactsGrid").jqxGrid('selectrow', 0);
                    }
                });
            });


            $('#ContactsGrid').jqxGrid('selectrow', 0);
        };
        
        var initCostCalc = function() {
            var CurrentCostCalcRowData;
            var Calc_id = null;
            var CostCalculations = {
                ObjectGr_id: ObjectGroup.ObjectGr_id,
            };

            var CostCalculationsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceObjectsGroupCostCalculations), {
                formatData: function (data) {
                    $.extend(data, {
                        Filters: ["c.ObjectGr_id = " + CostCalculations.ObjectGr_id],
                    });
                    return data;
                },
                beforeSend(jqXHR, settings) {
                    DisabledCostCalcControls();
                },
            });

            var DisabledCostCalcControls = function() {
                $('#dropDownBtnCostCalculations').jqxButton({disabled: true});
                $('#btnRefreshCostCalculations').jqxButton({disabled: true});
                $('#btnEditCostCalculations').jqxButton({disabled: true});
                $('#btnAnnulCostCalculations').jqxButton({disabled: true});
                $('#btnCopyCostCalculations').jqxButton({disabled: true});
            };

            $("#NoteCostCalculations").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: '100%' }));

            $("#dropDownBtnCostCalculations").on('open', function(){
                $('#btnAddSmeta').jqxButton({disabled: true});
                $('#btnAddDopSmeta').jqxButton({disabled: true});
                if (CurrentCostCalcRowData != undefined) {
                    if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 0) 
                        $('#btnAddSmeta').jqxButton({disabled: false});

                    if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 1) 
                        $('#btnAddDopSmeta').jqxButton({disabled: false});
                }
            });

            $("#dropDownBtnCostCalculations").jqxDropDownButton({initContent: function(){
                    $('#btnAddSmeta').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: '162px', disabled: true}));
                    $('#btnAddDopSmeta').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: '162px', disabled: true}));

                    $('#btnAddSmeta').on('click', function(){
                        if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 0) {
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Add')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Params: {
                                        cgrp_id: CurrentCostCalcRowData.cgrp_id,
                                        type: 1
                                    }
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    if (Res.result == 1)
                                        window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + "&calc_id=" + Res.id);
    //                                    location.href =<?php // echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + '&calc_id=' + Res.id;
                                    else
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);

                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                                }
                            });
                        } else {
                            if (CostCalculations.count_type0 == 0) 
                                Aliton.ShowErrorMessage('Ошибка', 'В этом проекте нет подтвержденного коммерческого предложения');
                            if (CostCalculations.count_type1 > 0) 
                                Aliton.ShowErrorMessage('Ошибка', 'В этом проекте уже создана смета');
                        }

                    });

                    $('#btnAddDopSmeta').on('click', function(){
                        if (CurrentCostCalcRowData.count_type0 == 1 && CurrentCostCalcRowData.count_type1 == 1) {
                            $.ajax({
                                url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Add')) ?>,
                                type: 'POST',
                                async: false,
                                data: {
                                    Params: {
                                        cgrp_id: CurrentCostCalcRowData.cgrp_id,
                                        type: 2
                                    }
                                },
                                success: function(Res) {
                                    Res = JSON.parse(Res);
                                    if (Res.result == 1)
                                        window.open(<?php echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + "&calc_id=" + Res.id);
    //                                    location.href =<?php // echo json_encode(Yii::app()->createUrl('CostCalculations/Index')); ?> + '&calc_id=' + Res.id;
                                    else
                                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);

                                },
                                error: function(Res) {
                                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                                }
                            });
                        } else {
                            if (CostCalculations.count_type1 == 0) 
                                Aliton.ShowErrorMessage('Ошибка', 'В этом нет сметы');
                        }

                    });
                }
            });


            $("#dropDownBtnCostCalculations").jqxDropDownButton($.extend(true, {}, DropDownButtonDefaultSettings, { autoOpen: false, width: 160, height: 22, dropDownVerticalAlignment: 'top' }));

            var dropDownBtnCostCalculations = '<div style="position: relative; margin-left: 3px; text-align: center; margin-top: 2px;">Создать</div>';
            $("#dropDownBtnCostCalculations").jqxDropDownButton('setContent', dropDownBtnCostCalculations);

            var createNewCostCalculations = function (DocType_Name) {
                $.ajax({
                    url: "<?php echo Yii::app()->createUrl('ObjectsGroupCostCalculations/Create');?>",
                    type: 'POST',
                    async: false,
                    data: { 
                        ObjectGr_id: CostCalculations.ObjectGr_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                            if (Res.result == 1) {
                                var RowIndex = $('#CostCalculationsGrid').jqxGrid('getselectedrowindex');
                                var Text = $('#CostCalculationsGrid').jqxGrid('getcelltext', RowIndex + 1, "Malfunction_id");
                                Aliton.SelectRowById('calc_id', Text, '#CostCalculationsGrid', true);
                                RowIndex = $('#CostCalculationsGrid').jqxGrid('getselectedrowindex');
                                var S = $('#CostCalculationsGrid').jqxGrid('getrowdata', RowIndex);
                            }
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }
                });
            };

            $('#btnRefreshCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 110, imgSrc: '/images/11.png'}));
            $('#btnCopyCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 120, imgSrc: '/images/10.png'}));
            $('#btnEditCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 100, imgSrc: '/images/4.png'}));
            $('#btnAnnulCostCalculations').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 140, imgSrc: '/images/3.png'}));
            $('#btnCopyBuffer').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 200}));

            $('#btnCopyBuffer').on('click', function() {
                var Calc_id = getCookie("CopyCostCalc_Calc_id");
                var ObjectGr_id = getCookie("CopyCostCalc_ObjectGr_id");
                if (Calc_id != undefined && ObjectGr_id != undefined) {
                    PasteCostCalc(Calc_id, ObjectGr_id);
                }
            });



            $('#CostCalculationsDialog').jqxWindow($.extend(true, {}, DialogDefaultSettings, {height: 500, width: 500, position: 'center'}));

            var CheckButton = function() {
                $('#dropDownBtnCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData != undefined)});
                $('#btnRefreshCostCalculations').jqxButton({disabled: false});
                $('#btnEditCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData != undefined)});
                $('#btnAnnulCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData != undefined)});
                if (CurrentCostCalcRowData != undefined)
                    $('#btnCopyCostCalculations').jqxButton({disabled: !(CurrentCostCalcRowData.count_type0 == 0 && CurrentCostCalcRowData.count_type1 == 0)});
                else $('#btnCopyCostCalculations').jqxButton({disabled: true});
            };

            $("#CostCalculationsGrid").on('rowselect', function (event) {
                CurrentCostCalcRowData = $('#CostCalculationsGrid').jqxGrid('getrowdata', event.args.rowindex);
                CheckButton();
                if (CurrentCostCalcRowData !== undefined)
                    if (CurrentCostCalcRowData.Note !== null)
                        $("#NoteCostCalculations").jqxTextArea('val', CurrentCostCalcRowData.Note);
            });

            var groupsrenderer = function (text, group, expanded, data) 
            {
                if (data.subItems.length > 0) {
                    var groupname = data.subItems[0]['group_name'];
                    return '<div class="jqx-grid-groups-row" style="position: absolute;"><span>' + text + ' (' + groupname + ')</span>';
                }
            };

            var CellClass = function (row, columnfield, value) {
                var StyleClass = '';
                var RowData = $("#CostCalculationsGrid").jqxGrid('getrowdata', row);
                if (RowData != undefined) {
                    if (RowData.type == 1 || RowData.type == 2)
                        StyleClass = 'CellSmet';
                    if (RowData.date_annul != null)
                        StyleClass = StyleClass + ' CellAnnul';
                }
                return StyleClass;
            }

            var contextMenu = $("#ContextMenu").jqxMenu({ width: 200, height: 58, autoOpenPopup: false, mode: 'popup'});
            $("#CostCalculationsGrid").on('contextmenu', function () {
                return false;
            });

            $("#CostCalculationsGrid").on("columnclick", function (event) {
                var scrollTop = $(window).scrollTop();
                var scrollLeft = $(window).scrollLeft();
                contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                return false;
            });

            $("#CostCalculationsGrid").on('rowclick', function (event) {
                if (event.args.rightclick) {
                    $("#CostCalculationsGrid").jqxGrid('selectrow', event.args.rowindex);
                    var scrollTop = $(window).scrollTop();
                    var scrollLeft = $(window).scrollLeft();
                    contextMenu.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                    return false;
                }
            });

            function getCookie(name) {
              var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
              return matches ? decodeURIComponent(matches[1]) : undefined;
            }

            function setCookie(name, value, options) {
                options = options || {};

                var expires = options.expires;

                if (typeof expires == "number" && expires) {
                    var d = new Date();
                    d.setTime(d.getTime() + expires * 1000);
                    expires = options.expires = d;
                }
                if (expires && expires.toUTCString) {
                    options.expires = expires.toUTCString();
                }

                value = encodeURIComponent(value);

                var updatedCookie = name + "=" + value;

                for (var propName in options) {
                    updatedCookie += "; " + propName;
                    var propValue = options[propName];
                    if (propValue !== true) {
                        updatedCookie += "=" + propValue;
                    }
                }

                document.cookie = updatedCookie;
            }

            $("#ContextMenu").on('itemclick', function (event) {
                var args = event.args;
                var rowindex = $("#CostCalculationsGrid").jqxGrid('getselectedrowindex');
                if ($.trim($(args).text()) == "Копировать смету") {
                    setCookie("CopyCostCalc_Calc_id", CurrentCostCalcRowData.calc_id, 3600);
                    setCookie("CopyCostCalc_ObjectGr_id", CurrentCostCalcRowData.ObjectGr_id, 3600);
                }
                if ($.trim($(args).text()) == "Вставить смету") {
                    var Calc_id = getCookie("CopyCostCalc_Calc_id");
                    var ObjectGr_id = getCookie("CopyCostCalc_ObjectGr_id");
                    if (Calc_id != undefined && ObjectGr_id != undefined) {
                        PasteCostCalc(Calc_id, ObjectGr_id);
                    }
                }
            });

            function PasteCostCalc(FCalc_id, ObjectGr_id) {
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl("CostCalculations/Paste")); ?>,
                    type: 'POST',
                    async: true,
                    data: {
                       Calc_id: FCalc_id,
                       ObjectGr_id: CostCalculations.ObjectGr_id
                    },
                    success: function(Res) {
                        Res = JSON.parse(Res);
                        Calc_id = Res.id;
                        $('#btnRefreshCostCalculations').click();
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                    }

                });
            };

            $("#CostCalculationsGrid").jqxGrid(
                $.extend(true, {}, GridDefaultSettings, {
                    pagesizeoptions: ['10', '200', '500', '1000'],
                    pagesize: 200,
                    sortable: false,
                    showfilterrow: false,
                    groupable: true,
                    pageable: false,
                    showstatusbar: true,
                    statusbarheight: 25,
                    groupsrenderer: groupsrenderer,
                    width: '100%',
                    height: 'calc(100% - 2px)',
                    showgroupsheader: false,
                    source: CostCalculationsDataAdapter,
                    columns: [
                        { text: 'Группа', datafield: 'group_name', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, hidden: true },
                        { text: 'Вариант', datafield: 'number', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, hidden: true, cellclassname: CellClass },
                        { text: 'Номер', datafield: 'calc_id', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 70, cellclassname: CellClass},
                        { text: 'Тип', datafield: 'CostCalcType', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 220, cellclassname: CellClass},
                        { text: 'Дата', dataField: 'date', columngroup: 'Group1', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140, cellclassname: CellClass},
                        { text: 'Дата готовности', dataField: 'date_ready', columngroup: 'Group1', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140, cellclassname: CellClass},
                        { text: 'Создал', datafield: 'EmployeeName', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 100, cellclassname: CellClass },
                        { text: '№ заявки', datafield: 'Demand_id', columngroup: 'Group1', filtercondition: 'CONTAINS', width: 80, cellclassname: CellClass },
                        { text: 'Дата', dataField: 'cnt_date', columngroup: 'Sent', columntype: 'date', cellsformat: 'dd.MM.yyyy HH:mm', filtercondition: 'STARTS_WITH', width: 140, cellclassname: CellClass },
                        { text: 'Способ', datafield: 'cntp_name', columngroup: 'Sent', filtercondition: 'CONTAINS', width: 150, cellclassname: CellClass },
                        { text: 'Контакное лицо', datafield: 'FIO', columngroup: 'Sent', filtercondition: 'CONTAINS', width: 250, cellclassname: CellClass },
                    ],
                    columngroups: [
                        { text: '', align: 'center', name: 'Group1' },
                        { text: 'Отправлено заказчику', align: 'center', name: 'Sent' },
                    ],
                    groups: ['number']
            }));

            $("#CostCalculationsGrid").jqxGrid('expandallgroups');

            $('#btnAnnulCostCalculations').on('click', function(){
                if ($('#btnAnnulCostCalculations').jqxButton('disabled')) return;
                if (CurrentCostCalcRowData != undefined) {
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Annul')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            calc_id: CurrentCostCalcRowData.calc_id
                        },
                        success: function(Res) {
                            $('#btnRefreshCostCalculations').click();
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                }
            });

            $('#btnRefreshCostCalculations').on('click', function(){
                if ($('#btnRefreshCostCalculations').jqxButton('disabled')) return;
                console.log('Calc_id2:' + Calc_id);
                if (Calc_id == null) {
                    var RowIndex = $('#CostCalculationsGrid').jqxGrid('getselectedrowindex');
                    var Val = $('#CostCalculationsGrid').jqxGrid('getcellvalue', RowIndex, "calc_id");
                } else {
                    var Val = Calc_id;
                }

                $('#CostCalculationsGrid').jqxGrid('updatebounddata', 'data');
                $('#CostCalculationsGrid').jqxGrid('expandallgroups');
                var GroupCount = 0;
                var GroupName = null;
                var Index = 0;
                var Rows = $('#CostCalculationsGrid').jqxGrid('getrows');
                for (var i = 0; i < Rows.length; i++) {
                    var TmpVal = $('#CostCalculationsGrid').jqxGrid('getcellvalue', i, 'calc_id');
                    var TmpGroup = $('#CostCalculationsGrid').jqxGrid('getcellvalue', i, 'number');
                    if (GroupName != TmpGroup) {
                        GroupCount++;
                        GroupName = TmpGroup;
                    }
                    if (TmpVal == Val) {
                        Index = i;
                        break;
                    }
                }

                $('#CostCalculationsGrid').jqxGrid('selectrow', Index);
                $('#CostCalculationsGrid').jqxGrid('ensurerowvisible', (Index + GroupCount));
                Calc_id = null;
            });

            $("#CostCalculationsGrid").on('rowdoubleclick', function(){
                if (CurrentCostCalcRowData !== null && CurrentCostCalcRowData.calc_id !== null) {
                    $('#btnEditCostCalculations').click();
                }
            });

            $('#btnEditCostCalculations').on('click', function(){
                window.open('/index.php?r=CostCalculations/Index&calc_id=' + CurrentCostCalcRowData.calc_id);
            });

            $('#btnCopyCostCalculations').on('click', function() {
                if ($('#btnCopyCostCalculations').jqxButton('disabled')) return;
                if (CurrentCostCalcRowData != undefined) {
                    $.ajax({
                        url: <?php echo json_encode(Yii::app()->createUrl('CostCalculations/Copy')) ?>,
                        type: 'POST',
                        async: false,
                        data: {
                            cgrp_id: CurrentCostCalcRowData.cgrp_id
                        },
                        success: function(Res) {
                            Res = JSON.parse(Res);
                            if (Res.result == 1) {
                                Calc_id = Res.id;
                                $('#btnRefreshCostCalculations').click();
                            }
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                }
            });

            $('#CostCalculationsGrid').jqxGrid('selectrow', 0);
        };
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    initInputs ();
                    initContactInfoGrid();
                    break;
                case 1:
//                    loadPage('<?php //echo Yii::app()->createUrl('ObjectsGroupsystems/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 1);
                      initSystems();  
                    break;
                case 2:
//                    loadPage('<?php //echo Yii::app()->createUrl('ObjectsAndEquips/ajaxview', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 2);
                    initOjectEquips();
                    break;
                case 3:
//                    loadPage('<?php //echo Yii::app()->createUrl('ContractsS/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 3);
                    initContractsS();
                    break;
                case 4:
//                    loadPage('<?php //echo Yii::app()->createUrl('Contacts/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 4);
                    initContacts();
                    break;
                case 5:
//                    loadPage('<?php //echo Yii::app()->createUrl('ObjectsGroupCostCalculations/index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 5);
                    initCostCalc();    
                    break;
                case 6:
                    loadPage('<?php echo Yii::app()->createUrl('SalesDepClients/History', array('Form_id' => "$model->PropForm_id")) ?>', 6);
                    break;
                case 7:
                    var InspectionActRow;
                    
                    var contextMenu2 = $("#ContextMenu2").jqxMenu({ width: 200, height: 58, autoOpenPopup: false, mode: 'popup'});
                    $("#InspectionActsGrid").on('contextmenu', function () {
                        return false;
                    });

                    $("#InspectionActsGrid").on("columnclick", function (event) {
                        var scrollTop = $(window).scrollTop();
                        var scrollLeft = $(window).scrollLeft();
                        contextMenu2.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                        return false;
                    });

                    $("#InspectionActsGrid").on('rowclick', function (event) {
                        if (event.args.rightclick) {
                            $("#ContactInfoGrid").jqxGrid('selectrow', event.args.rowindex);
                            var scrollTop = $(window).scrollTop();
                            var scrollLeft = $(window).scrollLeft();
                            contextMenu2.jqxMenu('open', parseInt(event.args.originalEvent.clientX) + 5 + scrollLeft, parseInt(event.args.originalEvent.clientY) + 5 + scrollTop);
                            return false;
                        }
                    });


                    function getCookie(name) {
                        var matches = document.cookie.match(new RegExp("(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"));
                        return matches ? decodeURIComponent(matches[1]) : undefined;
                    }

                    function setCookie(name, value, options) {
                        options = options || {};

                        var expires = options.expires;

                        if (typeof expires == "number" && expires) {
                            var d = new Date();
                            d.setTime(d.getTime() + expires * 1000);
                            expires = options.expires = d;
                        }
                        if (expires && expires.toUTCString) {
                            options.expires = expires.toUTCString();
                        }

                        value = encodeURIComponent(value);

                        var updatedCookie = name + "=" + value;

                        for (var propName in options) {
                            updatedCookie += "; " + propName;
                            var propValue = options[propName];
                            if (propValue !== true) {
                                updatedCookie += "=" + propValue;
                            }
                        }

                        document.cookie = updatedCookie;
                    }

                    $("#ContextMenu2").on('itemclick', function (event) {
                        var args = event.args;
                        var rowindex = $("#InspectionActsGrid").jqxGrid('getselectedrowindex');
                        if ($.trim($(args).text()) == "Копировать акт") {
                            console.log(InspectionActRow);
                            if (InspectionActRow != undefined) {
                                setCookie("CopyInspAct_Inspection_id", InspectionActRow.Inspection_id, 3600);
                            }
                        }
                        if ($.trim($(args).text()) == "Вставить акт") {
                            var Inspection_id = getCookie("CopyInspAct_Inspection_id");
                            if (Inspection_id != undefined) {
                                PasteInspAct(Inspection_id);
                            }
                        }
                    });


                    function PasteInspAct(Inspection_id) {
                        $.ajax({
                            url: <?php echo json_encode(Yii::app()->createUrl("InspectionActs/Paste")); ?>,
                            type: 'POST',
                            async: true,
                            data: {
                                Parameters: {
                                    Inspection_id: Inspection_id,
                                    In_ObjectGr_id: ObjectGroup.ObjectGr_id
                                }
                            },
                            success: function(Res) {
                                Res = JSON.parse(Res);
                                //Out_ObjectGr_id = Res.id;
                                $('#InspectionActsGrid').jqxGrid('updatebounddata');
                            },
                            error: function(Res) {
                                Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                            }

                        });
                    };

                    
                    var DataInspectionActions = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceInspectionActs_v, {}), {
                        formatData: function (data) {
                            $.extend(data, {
                                Filters: ["i.ObjectGr_id = " + ObjectGroup.ObjectGr_id],
                            });
                            return data;
                        },
                    });
                    
                    $("#InspectionActsGrid").on('rowselect', function (event) {
                        InspectionActRow = $('#InspectionActsGrid').jqxGrid('getrowdata', event.args.rowindex);
                    });
                    
                    $("#InspectionActsGrid").jqxGrid(
                        $.extend(true, {}, GridDefaultSettings, {
                            pagesizeoptions: ['10', '200', '500', '1000'],
                            pagesize: 200,
                            showfilterrow: false,
                            virtualmode: false,
                            width: 'calc(100% - 2px)',
                            height: 'calc(100% - 2px)',
                            source: DataInspectionActions,
                            enablebrowserselection: true,
                            columns: [
                                { text: 'Дата', dataField: 'Date', cellsformat: 'dd.MM.yyyy', width: 150 },
                                { text: 'Система', datafield: 'SystemTypeName', width: 150 },
                                { text: 'Инженер', datafield: 'EmployeeName', width: 100 },
                            ]
                        })
                    );
                    
                    $('#btnCopyInspAct').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 220}));
                    $('#btnCopyInspAct').on('click', function() {
                        var Inspection_id = getCookie("CopyInspAct_Inspection_id");
                        if (Inspection_id != undefined) {
                            PasteInspAct(Inspection_id);
                        }
                    });
                    
                    break;
                    
                case 8:
                    loadPage('<?php echo Yii::app()->createUrl('ObjectEvents/Index', array('ObjectGr_id' => "$model->ObjectGr_id")) ?>', 8);
                    break;
            }
        };
        
        $('#jqxTabs').jqxTabs($.extend(true, {}, TabsDefaultSettings, { width: '100%', height: 'calc(100% - 2px)', keyboardNavigation: false, initTabContent: initWidgets }));
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
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Акты обследования
                </div>
            </div>
        </li>
        <li>
            <div style="height: 15px; margin-top: 3px;">
                <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                    Предложения и события графика
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
                <div class="al-row-column"><input type="button" value="ЦУ" id='AddInstructing' /></div>
            </div>
        </div>
        <div style="padding: 10px; height: calc(100% - 323px)">
            <div class="al-row" style="padding: 0px; height: calc(100% - 12px)">
                <div id="ContactInfoGrid" class="jqxGridAliton"></div>
            </div>
            <div class="al-row" style="padding: 6px 0px 0px 0px;">
                <div class="al-row-column"><input type="button" value="Создать" id='NewContactInfo' /></div>
                <div class="al-row-column"><input type="button" value="Изменить" id='EditContactInfo' /></div>
                <div class="al-row-column"><input type="button" value="Вставить контакт из буфера" id='btnCopyContactBuffer'/></div>
                <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='DelContactInfo' /></div>
                <div style="clear: both"></div>
            </div>
        </div>
    </div>

    <div style="overflow: hidden; height: calc(100% - 2px);">
            <div id='content2' style="overflow: hidden; margin: 5px; height: calc(100% - 0px)">
                <style>
                    #ObjectsGroupSystemsGrid .jqx-fill-state-pressed {
                        background-color: #A7D2BB !important;
                        color: black;
                    }

                </style>

                <div class="al-row" style="height: calc(100% - 68px); padding: 0;">
                    <div id="ObjectsGroupSystemsGrid" class="jqxGridAliton"></div>
                    <div style="clear: both"></div>
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
    
        </div>
    </div>

    <div id='content3' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
            <div style="width: 100%; height: calc(100% - 2px)">
                <style>
    
                    #ObjectsGrid .jqx-fill-state-pressed,
                    #CommonEquipsGrid .jqx-fill-state-pressed,
                    #ObjectEquipsGrid .jqx-fill-state-pressed {
                        background-color: #A7D2BB !important;
                        color: black;
                    }

                </style>

                <div class="al-row" style="padding: 0;">
                    <div class="al-row-column" style="width: 60%">
                        <div id="ObjectsGrid" class="jqxGridAliton"></div>
                    </div>
                    <div class="al-row-column" style="width: calc(40% - 10px)">
                        <div>Примечание:</div>
                        <div>
                            <textarea id="edObjectNote"></textarea>
                        </div>
                    </div>
                    <div style="clear: both"></div>
                </div>
                <div class="row">
                    <div class="row-column"><input type="button" value="Добавить" id='btnAddObject' /></div>
                    <div class="row-column"><input type="button" value="Изменить" id='btnEditObject' /></div>
                    <div class="row-column"><input type="button" value="Удалить" id='btnDelObject' /></div>
                </div>
                <div class="row" style="height: calc(100% - 288px)">

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
                        <div id='content1' style="overflow: hidden; margin-left: 10px; height: calc(100% - 2px)">
                            <div style="overflow: hidden; width: 100%; height: calc(100% - 2px)">
                                <div class="row" style="height: calc(100% - 54px)">
                                    <div id="ObjectEquipsGrid" class="jqxGridAliton"></div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="row" style="margin-top: 3px;">
                                    <div class="row-column"><input type="button" value="Добавить" id='btnAddEquip' /></div>
                                    <div class="row-column"><input type="button" value="Изменить" id='btnEditEquip' /></div>
                                    <div class="row-column"><input type="button" value="Удалить" id='btnDelEquip' /></div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                        <div id='content2' style="overflow: hidden; margin-left: 10px; height: calc(100% - 2px)">
                            <div style="overflow: hidden; height: calc(100% - 2px);">
                                <div class="row" style="height: calc(100% - 54px)">
                                    <div id="CommonEquipsGrid" class="jqxGridAliton"></div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="row" style="margin-top: 3px;">
                                    <div class="row-column"><input type="button" value="Добавить" id='btnAddCommonEquip' /></div>
                                    <div class="row-column"><input type="button" value="Изменить" id='btnEditCommonEquip' /></div>
                                    <div class="row-column"><input type="button" value="Удалить" id='btnDelCommonEquip' /></div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="EditObjectDialog" style="display: none;">
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

                <div id="EditObjectEquipDialog" style="display: none;">
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
        </div>
    </div>

    <div id='content4' style="overflow: hidden; margin: 5px; height: calc(100% - 2px); overflow-y: visible;">
            <div style="width: 100%; height: 100%">
                <style>
    
                    .jqxGridAliton .jqx-fill-state-pressed {
                        background-color: #A7D2BB !important;
                        color: black;
                    }
                    .jqx-tree-item-li {
                        margin-left: 0 !important;
                    }
                </style>

                <div class="al-row-label" style="height: calc(100% - 370px); min-height: 200px;">
                    <div id="ContractsGrid" class="jqxGridAliton"></div>
                </div>

                <div class="al-row" >
                    <div class="al-row-column" style="width: 400px">
                        <div class="al-row">
                            <div class="al-row-column" style="width: 70px">Юр. лицо:</div>
                            <div class="al-row-column"><input readonly id="JuridicalPerson" type="text"></div>
                            <div style="clear: both"></div>
                        </div>
                        <div class="al-row">
                            <div class="al-row-column" style="width: 50px">Мастер:</div>
                            <div class="al-row-column"><input readonly id="MasterName" type="text"></div>
                            <div class="al-row-column">ВЦКП: </div>
                            <div class="al-row-column"><div id='DateExecuting'></div></div>
                            <div style="clear: both"></div>
                        </div>
                    </div>

                    <div class="al-row-column" style="width: calc(100% - 415px);">
                        <div class="row-column" style="width: 50%;">Особые договоренности: <textarea readonly id="SpecialCondition" ></textarea></div>
                        <div class="row-column" style="width: calc(50% - 22px);">Примечание: <textarea readonly id="ContrNote" ></textarea></div>
                        <div style="clear: both"></div>
                    </div>
                    <div style="clear: both"></div>
                </div>

                <div class="al-row">
                    <div class="al-row-column">
                        <div id='jqxWidget'>
                            <div style='float: left;' id="dropDownBtnContracts">
                                <div style="border: none;" id='jqxTreeContracts'>
                                    <ul>
                                        <li><div style="width: 160px; padding: 5px; text-align: center;">Договор обслуживания</div></li>
                                        <li><div style="width: 160px; padding: 5px; text-align: center;">Доп.соглашение</div></li>
                                        <li><div style="width: 160px; padding: 5px; text-align: center;">Счет</div></li>
                                        <li><div style="width: 160px; padding: 5px; text-align: center;">Счет-заказ</div></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="al-row-column"><input type="button" value="Дополнительно" id='MoreInformContract' /></div>
                    <div class="al-row-column"><input type="button" value="Обновить" id='ReloadContracts' /></div>
                    <div class="al-row-column"><input type="button" value="Акты" id='btnViewActs' /></div>
                    <div class="al-row-column"><input type="button" value="Нач. и платежи" id='btnBillPay' /></div>
                    <div class="al-row-column" style="float: right"><input type="button" value="Удалить" id='DelContract' /></div>
                    <div style="clear: both"></div>
                </div>

                <!--<div id='jqxWidgetContracts' style="margin-top: 10px;">-->
                <div class="al-row" style="height: 240px; width: 100%">
                    <div id='jqxTabsContracts'>
                        <ul>
                            <li style="margin-left: 20px;">
                                <div style="height: 15px; margin-top: 3px;">
                                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                                        Типы обслуживаемых подсистем
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div style="height: 15px; margin-top: 3px;">
                                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                                        История изменения расценок
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div style="height: 15px; margin-top: 3px;">
                                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                                        История платежей
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div style="height: 15px; margin-top: 3px;">
                                    <div style="margin-left: 4px; vertical-align: middle; text-align: center; float: left;">
                                        История мастеров
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <div id='contentContractSystems' style="padding: 6px; overflow: hidden;">
                            <div class="al-row-label" style="height: 155px;">
                                <div id="ContractSystemsGrid" class="jqxGridAliton"></div>
                            </div>
                            <div class="al-row">
                                <div class="al-row-column"><input type="button" value="Добавить" id='NewContractSystems' /></div>
                                <div class="al-row-column" style="float: right;"><input type="button" value="Удалить" id='DelContractSystems' /></div>
                                <div style="clear: both"></div>
                            </div>
                        </div>

                        <div id='contentContractPriceHistory' style="padding: 6px; overflow: hidden;">
                            <div class="al-row-label" style="height: 155px;">
                                <div id="ContractPriceHistoryGrid" class="jqxGridAliton"></div>
                            </div>
                            <div class="al-row">
                                <div class="al-row-column"><input type="button" value="Добавить" id='NewContractPriceHistory' /></div>
                                <div class="al-row-column"><input type="button" value="Изменить" id='EditContractPriceHistory' /></div>
                                <div class="al-row-column"><input type="button" value="Очистить тарифы" id='ClearContractPriceHistory' /></div>
                                <div style="clear: both"></div>
                            </div>
                        </div>

                        <div id='contentPaymentHistory' style="padding: 6px; overflow: hidden;">
                            <div class="al-row-label" style="height: 155px;">
                                <div class="row-column" style="width: calc(100% - 310px);"><div id="PaymentHistoryGrid" class="jqxGridAliton"></div></div>
                                <div class="row-column" style="width: 280px;">
                                    <div style="clear: both"></div>
                                    <div class="al-row" style="padding: 0px">Примечание:</div>
                                    <div class="al-row" style="padding: 0px; height: 135px;"><textarea readonly id="NotePaymentHistory"></textarea></div>
                                </div>
                                <div style="clear: both"></div>
                            </div>
                            <div class="al-row">
                                <div class="row-column"><input type="button" value="Добавить" id='NewPaymentHistory' /></div>
                                <div class="row-column"><input type="button" value="Изменить" id='EditPaymentHistory' /></div>
                                <div class="row-column" style="float: right; margin-right: 25px;"><input type="button" value="Удалить" id='DelPaymentHistory' /></div>
                                <div style="clear: both"></div>
                            </div>
                        </div>

                        <div id='contentContractMasterHistory' style="padding: 6px; overflow: hidden;">
                            <div class="al-row-label" style="height: 155px;">
                                <div id="ContractMasterHistoryGrid" class="jqxGridAliton"></div>
                            </div>
                            <div class="al-row">
                                <div class="row-column"><input type="button" value="Добавить" id='NewContractMasterHistory' /></div>
                                <div class="row-column"><input type="button" value="Обновить" id='ReloadContractMasterHistory' /></div>
                                <div class="row-column" style="float: right; margin-right: 25px;"><input type="button" value="Удалить" id='DelContractMasterHistory' /></div>
                                <div style="clear: both"></div>
                            </div>
                        </div>
                    </div>
                </div>


                <div id="NewContractDialog">
                    <div id="NewContractDialogHeader">
                        <span id="NewContractHeaderText"></span>
                    </div>
                    <div style="overflow-y: visible; padding: 10px; background-color: #F2F2F2;" id="NewContractDialogContent">
                        <div style="overflow: hidden;" id="NewContractBodyDialog"></div>
                    </div>
                </div>

                <div id="EditDialogContractSystems" style="display: none;">
                    <div id="">
                        <span id="">Вставка\Редактирование записи</span>
                    </div>
                    <div style="overflow: hidden; padding: 10px;" id="">
                        <div style="overflow: hidden;" id="BodyDialogContractSystems"></div>
                    </div>
                </div>

                <div id="EditDialogContractPriceHistory" style="display: none">
                    <div id="">
                        <span id="">Вставка\Редактирование записи</span>
                    </div>
                    <div style="padding: 10px;" id="">
                        <div id="BodyDialogContractPriceHistory"></div>
                    </div>
                </div>

                <div id="EditDialogPaymentHistory" style="display: none;">
                    <div id="">
                        <span id="">Вставка\Редактирование записи</span>
                    </div>
                    <div style="padding: 10px;" id="">
                        <div id="BodyDialogPaymentHistory"></div>
                <!--        <div id="">
                            <div class="row">
                                <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogPaymentHistory' /></div>
                                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogPaymentHistory' /></div>
                            </div>
                        </div>-->
                    </div>
                </div>

                <div id="EditDialogContractMasterHistory" style="display: none;">
                    <div id="">
                        <span id="">Вставка\Редактирование записи</span>
                    </div>
                    <div style="padding: 10px;" id="">
                        <div id="BodyDialogContractMasterHistory"></div>
                <!--        <div id="">
                            <div class="row">
                                <div class="row-column"><input type="button" value="Сохранить" id='BtnOkDialogContractMasterHistory' /></div>
                                <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='BtnCancelDialogContractMasterHistory' /></div>
                            </div>
                        </div>-->
                    </div>
                </div>
        </div>
    </div>

    <div id='content5' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: 100%">
            <style>
                #ContactsGrid .jqx-fill-state-pressed {
                    background-color: #A7D2BB !important;
                    color: black;
                }
                
                .backlight_pink {
                    color: #E000E0;
                }

            </style>

            <div class="row" style="height: calc(100% - 270px); margin: 0px;">
                <div id="ContactsGrid" class="jqxGridAliton"></div>
            </div>
            <div class="row" style="margin: 0;">
                <div class="row-column">
                    <div class="row">Содержание: <textarea readonly id="textField"></textarea></div>
                    <div class="row">Примечание: <textarea readonly id="note"></textarea></div>
                </div>   

                <div class="row-column">
                    <div class="row">Причина долга: <br><input readonly id="drsn_name" type="text"></div>
                    <div class="row">Результат: <br><input readonly id="rslt_name" type="text"></div>
                    <div class="row">Дата согласованной оплаты: <div id='pay_date'></div></div>
                </div>
            </div>

            <div class="row">
                <div class="row-column"><input type="button" value="Создать" id='NewContact' /></div>
                <div class="row-column"><input type="button" value="Изменить" id='EditContact' /></div>
                <div class="row-column"><input type="button" value="Обновить" id='btnReload' /></div>
                <div class="row-column"><input type="button" value="Удалить" id='DelContact' /></div>
            </div>


            <div id="EditContactDialog">
                <div id="DialogContactHeader">
                    <span id="HeaderContactText">Вставка\Редактирование записи</span>
                </div>
                <div id="DialogContactContent" style="overflow-x: hidden; padding: 20px 30px 10px; background-color: #F2F2F2;" >
                    <div style="" id="BodyContactDialog"></div>
                    <div id="BottomContactDialog">
                        <div class="row">
                            <div class="row-column"><input type="button" value="Сохранить" id='btnContactOk' /></div>
                            <div class="row-column"><input type="button" value="Недозвон" id='btnNotReach' /></div>
                            <div class="row-column"><input type="button" value="Карточка клиента" id='btnClientInfo' /></div>
                            <div style="float: right;" class="row-column"><input type="button" value="Отменить" id='btnContactCancel' /></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id='content6' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: 100%">
            <style>
                .CellAnnul {
                    text-decoration: line-through;
                }

                .CellSmet {
                    color: black;
                    /*background-color: #5FB989;*/
                }

                .CellSmet:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected), .jqx-widget .CellSmet:not(.jqx-grid-cell-hover):not(.jqx-grid-cell-selected) {
                    color: black;
                    background-color: #B8E7AC;
                }
                .jqx-grid-group-cell {
                    border-width:0 1px 1px 0;
                }
                #CostCalculationsGrid .jqx-fill-state-pressed {
                    background-color: #5FB989 !important;
                    color: black;
                }
            </style>

            <div class="row" style="height: calc(100% - 150px); margin: 0;">
                <div id="CostCalculationsGrid" class="jqxGridAliton"></div>
            </div>

            <div class="row" style="margin: 0;">
                <div class="row-column">Примечание:</div>
            </div>
            <div class="row" style="margin: 0;">
                <textarea readonly id="NoteCostCalculations"></textarea>
            </div>

            <div class="row">
                <div class="row-column">
                    <div id='jqxWidget'>
                        <div style='float: left;' id="dropDownBtnCostCalculations">
                            <div style="border: none;" id='jqxTreeCostCalculations'> 
                                <div style="padding: 2px"><input type="button" id="btnAddSmeta" value="Смета"/></div>
                                <div style="clear: both"></div>
                                <div style="padding: 2px"><input type="button" id="btnAddDopSmeta" value="Доп. смета"/></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-column"><input type="button" value="Изменить" id='btnEditCostCalculations'/></div>
                <div class="row-column"><input type="button" value="Копировать" id='btnCopyCostCalculations'/></div>
                <div class="row-column"><input type="button" value="Обновить" id='btnRefreshCostCalculations'/></div>
                <div class="row-column"><input type="button" value="Вставить КП из буфера" id='btnCopyBuffer'/></div>
                <div class="row-column" style="float: right;"><input type="button" value="Аннулировать" id='btnAnnulCostCalculations'/></div>
            </div>   


            <div id="CostCalculationsDialog" style="display: none;">
                <div id="CostCalculationsDialogHeader">
                    <span id="CostCalculationsHeaderText">Вставка\Редактирование записи</span>
                </div>
                <div style="padding: 10px 20px;" id="DialogCostCalculationsContent">
                    <div style="" id="BodyCostCalculationsDialog"></div>
                </div>
            </div>

            <div id='ContextMenu' style="display: none">
                <ul>
                    <li>Копировать смету</li>
                    <li>Вставить смету</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div id='content7' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: 100%"></div>
    </div>
    
    <div id='content8' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
        <div style="width: 100%; height: calc(100% - 18px)">
            <div class="al-row" style="height: calc(100% - 38px)">
                <div id="InspectionActsGrid"></div>
            </div>
            <div class="al-row">
                <div class="al-row-column"><input type="button" id="btnCopyInspAct" value="Вставить из буфера"/></div>
            </div>
        </div>
    </div>
    
    <div id='content9' style="overflow: hidden; margin: 5px; height: calc(100% - 2px);">
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

<div id='ContextMenu1' style="display: none">
    <ul>
        <li>Копировать контакты</li>
        <li>Вставить контакты</li>
    </ul>
</div>

<div id='ContextMenu2' style="display: none">
    <ul>
        <li>Копировать акт</li>
        <li>Вставить акт</li>
    </ul>
</div>
