<script>
    Aliton.Links.push({
        Out: "cbExecRepairs",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "r.DateExec is null",
        ConditionFalse: "",
        Name: "cbExecRepairsFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cbNotEquipReturn
    Aliton.Links.push({
        Out: "cbNotEquipReturn",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "isNull(r.EquipReturn, 0) = 0",
        ConditionFalse: "",
        Name: "cbNotEquipReturnFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cbEquipGood            
    Aliton.Links.push({
        Out: "cbEquipGood",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "isNull(r.EquipGood, 0) = 1",
        ConditionFalse: "",
        Name: "cbEquipGoodFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cbEquipRepeated
    Aliton.Links.push({
        Out: "cbEquipRepeated",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "isNull(r.EquipRepeated, 0) = 1",
        ConditionFalse: "",
        Name: "cbEquipRepeatedFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cbAddrRepeated
    Aliton.Links.push({
        Out: "cbAddrRepeated",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "isNull(r.AddrRepeated, 0) = 1",
        ConditionFalse: "",
        Name: "cbAddrRepeatedFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cbNotRepair
    Aliton.Links.push({
        Out: "cbNotRepair",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "r.Status_id < 3",
        ConditionFalse: "",
        Name: "cbNotRepairFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cmbTerritory
    Aliton.Links.push({
        Out: "cmbTerritory",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "r.Territ_id = :Value",
        Field: "Territ_Id",
        Name: "cbNotRepairFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cbSubstitution
    Aliton.Links.push({
        Out: "cbSubstitution",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "isNull(r.Substitution, 0) = 1",
        ConditionFalse: "",
        Name: "cbSubstitutionFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cmbEngr
    Aliton.Links.push({
        Out: "cmbEngr",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "r.Engr_Empl_id = :Value",
        Name: "cmbEngrFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //edNumberFilter
    Aliton.Links.push({
        Out: "edNumberFilter",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "r.Number like ':Value%'",
        Name: "edNumberFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //cmbMaster
    Aliton.Links.push({
        Out: "cmbMaster",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "r.Mstr_Empl_id = :Value",
        Name: "cmbMasterFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //edAddrFilter
    Aliton.Links.push({
        Out: "edAddrFilter",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "r.Addr like ':Value%'",
        Name: "edAddrFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //edDateStart
    Aliton.Links.push({
        Out: "edDateStart",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(r.DateCreate) >= ':Value'",
        Name: "edDateStartFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    //edDateEnd
    Aliton.Links.push({
        Out: "edDateEnd",
        In: "RepairsGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(r.DateCreate) <= ':Value'",
        Name: "edDateEndFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "cbFilimonov",
        In: "RepairTasksGrid",
        TypeControl: "Grid",
        Condition: "rt.Empl_id = 89",
        ConditionFalse: "",
        Name: "cbFilimonovFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "cbIvanov",
        In: "RepairTasksGrid",
        TypeControl: "Grid",
        Condition: "rt.Empl_id = 812",
        ConditionFalse: "",
        Name: "cbIvanovFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "cbSRM",
        In: "RepairTasksGrid",
        TypeControl: "Grid",
        Condition: "rt.SRM = 1",
        ConditionFalse: "",
        Name: "cbSRMFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
</script>

<script>
    function ShowHideFilters() {
        var $CurrentVisible = $("#FormFilters").css("display");
        if ($CurrentVisible == "none")
            $("#FormFilters").css("display", "block");
        else
            $("#FormFilters").css("display", "none");
    }
    
    function SetTask() {
        var Repr_id;
        var Empl_id;
        var SRM;
        var Data = {
            RepairTasks: {
                RepairTask_id: null,
                Repr_id: null,
                Empl_id: null,
                SRM: null,
            },
        };
        
        Repr_id = algridajaxSettings["RepairsGrid"].CurrentRow["Repr_id"];
        
        if (alradiobuttonSettings["cbFilimonov"].Checked == true)
            Empl_id = 89;
        if (alradiobuttonSettings["cbIvanov"].Checked == true)
            Empl_id = 812;
        if (alradiobuttonSettings["cbSRM"].Checked == true)
            SRM = 1;
        
        
        Data.RepairTasks.RepairTask_id = null;
        Data.RepairTasks.Repr_id = Repr_id;
        Data.RepairTasks.Empl_id = Empl_id;
        Data.RepairTasks.SRM = SRM;
        
        $.ajax({
            url: '/index.php?r=Repair/SetTask',
            type: 'POST',
            data: Data, 
            async: true,
            success: function(Res){
                $("#RepairTasksGrid").algridajax("Load");
                //$("#RepairsGrid").algridajax("Load");
                
            }
        });
    }
    
    function SortTask(Step = -1) {
        var Data = {
            RepairTasks: {
                TaskRepair_id: null,
                Repr_id: null,
                TaskSequence: null,
                Empl_id: null,
                Step: null,
            },
        };
        
        var DataRow = algridajaxSettings["RepairTasksGrid"].CurrentRow;
        
        if (DataRow == null) return 0;
        
        Data.RepairTasks.RepairTask_id = DataRow.RepairTask_id;
        Data.RepairTasks.Repr_id = DataRow.Repr_id;
        Data.RepairTasks.TaskSequence = DataRow.TaskSequence;
        Data.RepairTasks.Empl_id = DataRow.Empl_id;
        Data.RepairTasks.Step = Step;
        
        $.ajax({
            url: '/index.php?r=Repair/SortTask',
            type: 'POST',
            data: Data, 
            async: true,
            success: function(Res){
                algridajaxSettings["RepairTasksGrid"].CurrentFocusedIndex = Res;
                $("#RepairTasksGrid").algridajax("Load");
                console.log(Res);
            }
        });
    }
</script>

<div style="float: left">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'ShowHideFilters',
                    'Width' => 124,
                    'Height' => 30,
                    'Text' => 'Фильтры',
                    'Type' => 'None',
                    'OnAfterClick' => 'ShowHideFilters()',
                ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'AddTask',
                    'Width' => 264,
                    'Height' => 30,
                    'Text' => 'Перенести заявку исполнителю >>',
                    'Type' => 'None',
                    'OnAfterClick' => 'SetTask()',
                ));
        ?>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; height: 100%; margin-top: 10px">
    <div style="float: left">
        <div id="FormFilters" style="float: left; height: 533px; overflow-y: scroll; width: 200px; display: none;">
            <div style="float: left">Фильтры</div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                            'id' => 'cbExecRepairs',
                            'Label' => 'Невыполненные',
                            'Checked' => true,
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                            'id' => 'cbNotEquipReturn',
                            'Label' => 'Не треб. возврат',
                            'Checked' => false,
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                            'id' => 'cbEquipGood',
                            'Label' => 'Оборуд. исправно',
                            'Checked' => false,
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                            'id' => 'cbEquipRepeated',
                            'Label' => 'Повторный рем. оборуд.',
                            'Checked' => false,
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                            'id' => 'cbAddrRepeated',
                            'Label' => 'Повт. рем. на объекте',
                            'Checked' => false,
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                            'id' => 'cbNotRepair',
                            'Label' => 'Непринятые в ремонт',
                            'Checked' => false,
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="clear: both"></div>
            <div style="float: left">Участок</div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbTerritory',
                        'Stretch' => true,
                        'Key' => 'Repairs_CmbTerritory',
                        'ModelName' => 'Territory',
                        'Height' => 300,
                        'Width' => 175,
                        'PopupWidth' => 300,
                        'KeyField' => 'Territ_Id',
                        'FieldName' => 'Territ_Name',
                        'Type' => array(
                                'Type' => 'Filter',
                                'Condition' => "t.Territ_Name like ':Value%'",
                        ),
                        'Columns' => array(
                                'Territ_Name' => array(
                                        'Name' => 'Участок',
                                        'FieldName' => 'Territ_Name',
                                        'Width' => 150,
                                        'Filter' => array(
                                                'Condition' => "t.Territ_Name like ':Value%'",
                                        ),

                                ),
                        ),
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                            'id' => 'cbSubstitution',
                            'Label' => 'Оборуд. с подмены',
                            'Checked' => false,
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">Инженер ПРЦ</div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                            'id' => 'cmbEngr',
                            'Stretch' => true,
                            'Key' => 'Repairs_CmbEngr',
                            'ModelName' => 'ListEmployees',
                            'Height' => 300,
                            'Width' => 175,
                            'PopupWidth' => 300,
                            'KeyField' => 'Employee_id',
                            'FieldName' => 'ShortName',
                            'Type' => array(
                                    'Type' => 'Locate',
                                    'Condition' => "e.EmployeeName like ':Value%'",
                            ),
                            'Columns' => array(
                                    'EmployeeName' => array(
                                            'Name' => 'ФИО',
                                            'FieldName' => 'EmployeeName',
                                            'Width' => 300,
                                            'Filter' => array(
                                                    'Condition' => "e.EmployeeName like ':Value%'",
                                            ),

                                    ),
                            ),
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left; margin-top: 10px;">
                <div style="float: left">Номер</div>
                <div style="float: left; margin-left: 10px;">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                                'id' => 'edNumberFilter',
                                'Width' => 100,
                        ));
                    ?>
                </div>
            </div>
            <div style="clear: both"></div>
            <div style="float: left">Мастер</div>
            <div style="clear: both"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                            'id' => 'cmbMaster',
                            'Stretch' => true,
                            'Key' => 'Repairs_CmbMaster',
                            'ModelName' => 'ListEmployees',
                            'Height' => 300,
                            'Width' => 175,
                            'PopupWidth' => 300,
                            'KeyField' => 'Employee_id',
                            'FieldName' => 'ShortName',
                            'Type' => array(
                                    'Type' => 'Locate',
                                    'Condition' => "e.EmployeeName like ':Value%'",
                            ),
                            'Columns' => array(
                                    'EmployeeName' => array(
                                            'Name' => 'ФИО',
                                            'FieldName' => 'EmployeeName',
                                            'Width' => 300,
                                            'Filter' => array(
                                                    'Condition' => "e.EmployeeName like ':Value%'",
                                            ),

                                    ),
                            ),
                    ));
                ?>
            </div>
            <div style="clear: both"></div>
            <div style="float: left; margin-top: 10px;">
                <div style="float: left">Адрес</div>
                <div style="clear: both"></div>
                <div style="float: left;">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                                'id' => 'edAddrFilter',
                                'Width' => 180,
                        ));
                    ?>
                </div>
            </div>
            <div style="clear: both"></div>
            <div style="float: left; margin-top: 10px;">
                <div style="float: left">Период с</div>
                <div style="clear: both"></div>
                <div style="float: left;">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                                'id' => 'edDateStart',
                                'Width' => 180,
                                'Format' => 'd.m.Y',
                        ));
                    ?>
                </div>
            </div>
            <div style="float: left; margin-top: 10px;">
                <div style="float: left">по</div>
                <div style="clear: both"></div>
                <div style="float: left;">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                                'id' => 'edDateEnd',
                                'Width' => 180,
                                'Format' => 'd.m.Y',
                        ));
                    ?>
                </div>
            </div>
        </div>
        <div style="float: left; width: 600px">
            <?php
            $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
                'id' => 'RepairsGrid',
                'Stretch' => true,
                'Key' => 'Repairs_Index_RepairsGrid',
                'ModelName' => 'Repairs',
                'ShowFilters' => true,
                'Height' => 430,
                'Width' => 500,
                'OnDblClick' => '$("#InfoRepair").albutton("BtnClick");',
                'Columns' => array(
                    'StatusName' => array(
                        'Name' => 'Статус',
                        'FieldName' => 'StatusName',
                        'Width' => 130,
                        'Filter' => array(
                            'Condition' => "r.StatusName like '%:Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.StatusName desc',
                            'Down' => 'r.StatusName',
                        ),
                    ),
                    'Number' => array(
                        'Name' => 'Номер',
                        'FieldName' => 'Number',
                        'Width' => 80,
                        'Filter' => array(
                            'Condition' => "r.Number like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.Number desc',
                            'Down' => 'r.Number',
                        ),
                    ),
                    'EquipName' => array(
                        'Name' => 'Оборудование',
                        'FieldName' => 'EquipName',
                        'Width' => 150,
                        'Filter' => array(
                            'Condition' => "r.EquipName like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.EquipName desc',
                            'Down' => 'r.EquipName',
                        ),
                    ),
                    'Date' => array(
                        'Name' => 'Дата пол. оборуд.',
                        'FieldName' => 'Date',
                        'Width' => 110,
                        'Format' => 'd.m.Y H:i',
                        'Filter' => array(
                            'Condition' => "r.Date = ':Value'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.Date desc',
                            'Down' => 'r.Date',
                        ),
                    ),
                    'DateCreate' => array(
                        'Name' => 'Дата регистрации',
                        'FieldName' => 'DateCreate',
                        'Width' => 110,
                        'Format' => 'd.m.Y H:i',
                        'Filter' => array(
                            'Condition' => "r.DateCreate = ':Value'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.DateCreate desc',
                            'Down' => 'r.DateCreate',
                        ),
                    ),
                    'Addr' => array(
                        'Name' => 'Адрес',
                        'FieldName' => 'Addr',
                        'Width' => 160,
                        'Filter' => array(
                            'Condition' => "r.Addr like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.Addr desc',
                            'Down' => 'r.Addr',
                        ),
                    ),
                    'ResultName' => array(
                        'Name' => 'Рез-т диагностики',
                        'FieldName' => 'ResultName',
                        'Width' => 130,
                        'Filter' => array(
                            'Condition' => "r.ResultName like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.ResultName desc',
                            'Down' => 'r.ResultName',
                        ),
                    ),
                    'RepairPrior' => array(
                        'Name' => 'Приоритет',
                        'FieldName' => 'RepairPrior',
                        'Width' => 80,
                        'Filter' => array(
                            'Condition' => "r.RepairPrior like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.RepairPrior desc',
                            'Down' => 'r.RepairPrior',
                        ),
                    ),
                    'Deadline' => array(
                        'Name' => 'Предел. дата',
                        'FieldName' => 'Deadline',
                        'Width' => 110,
                        'Format' => 'd.m.Y H:i',
                        'Filter' => array(
                            'Condition' => "r.Deadline = ':Value'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.Deadline desc',
                            'Down' => 'r.Deadline',
                        ),
                    ),
                    'OverDay' => array(
                        'Name' => 'Просрочка',
                        'FieldName' => 'OverDay',
                        'Width' => 110,
                        'Filter' => array(
                            'Condition' => "r.OverDay = :Value",
                        ),
                        'Sort' => array(
                            'Up' => 'r.OverDay desc',
                            'Down' => 'r.OverDay',
                        ),
                    ),
                    'Reg_Empl_Name' => array(
                        'Name' => 'Зарегистрировал',
                        'FieldName' => 'Reg_Empl_Name',
                        'Width' => 110,
                        'Filter' => array(
                            'Condition' => "r.Reg_Empl_Name like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.Reg_Empl_Name desc',
                            'Down' => 'r.Reg_Empl_Name',
                        ),
                    ),
                    'SN' => array(
                        'Name' => 'Серийный номер',
                        'FieldName' => 'SN',
                        'Width' => 150,
                        'Filter' => array(
                            'Condition' => "r.SN like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.SN desc',
                            'Down' => 'r.SN',
                        ),
                    ),
                    'EquipReturn' => array(
                        'Name' => 'Возврат',
                        'FieldName' => 'EquipReturn',
                        'Width' => 60,
                        'Filter' => array(
                            'Condition' => "r.EquipReturn = ':Value'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.EquipReturn desc',
                            'Down' => 'r.EquipReturn',
                        ),
                    ),
                    'DateBest' => array(
                        'Name' => 'Жел. дата',
                        'FieldName' => 'DateBest',
                        'Width' => 110,
                        'Format' => 'd.m.Y H:i',
                        'Filter' => array(
                            'Condition' => "r.DateBest = ':Value'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.DateBest desc',
                            'Down' => 'r.DateBest',
                        ),
                    ),
                    'Mstr_Empl_Name' => array(
                        'Name' => 'Мастер',
                        'FieldName' => 'Mstr_Empl_Name',
                        'Width' => 140,
                        'Filter' => array(
                            'Condition' => "r.Mstr_Empl_Name like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.Mstr_Empl_Name desc',
                            'Down' => 'r.Mstr_Empl_Name',
                        ),
                    ),
                    'EquipWrnt' => array(
                        'Name' => 'Гарантия',
                        'FieldName' => 'EquipWrnt',
                        'Width' => 60,
                        'Filter' => array(
                            'Condition' => "r.EquipWrnt = ':Value'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.EquipWrnt desc',
                            'Down' => 'r.EquipWrnt',
                        ),
                    ),
                    'EquipDefects' => array(
                        'Name' => 'Неисправность',
                        'FieldName' => 'EquipDefects',
                        'Width' => 140,
                        'Filter' => array(
                            'Condition' => "r.EquipDefects like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.EquipDefects desc',
                            'Down' => 'r.EquipDefects',
                        ),
                    ),
                    'DateExec' => array(
                        'Name' => 'Дата вып.',
                        'FieldName' => 'DateExec',
                        'Width' => 110,
                        'Format' => 'd.m.Y H:i',
                        'Filter' => array(
                            'Condition' => "r.DateExec = ':Value'",
                        ),
                        'Sort' => array(
                            'Up' => 'r.DateExec desc',
                            'Down' => 'r.DateExec',
                        ),
                    ),
                ),
            ));
        ?>
        </div>
        <div style="float: left; margin-left: 8px; width: 400px">
            <div style="float: left">
                <div style="float: left">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                                'id' => 'cbFilimonov',
                                'Label' => 'Филимонов В.Н.',
                                'GroupName' => 'Group1',
                                'Checked' => true,
                        ));
                    ?>
                </div>
                <div style="float: left; margin-left: 6px">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                                'id' => 'cbIvanov',
                                'Label' => 'Иванов В.Н.',
                                'GroupName' => 'Group1',
                                'Checked' => false,
                        ));
                    ?>
                </div>
                <div style="float: left; margin-left: 6px">
                    <?php
                        $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                                'id' => 'cbSRM',
                                'Label' => 'СРМ',
                                'GroupName' => 'Group1',
                                'Checked' => false,
                        ));
                    ?>
                </div>
            </div>
            <div style="clear: both"></div>
            <div style="float: left; width: 100%">
                <?php
                    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
                        'id' => 'RepairTasksGrid',
                        'Stretch' => true,
                        'Key' => 'Repairs_Index_RepairTasksGrid',
                        'ModelName' => 'RepairTasks',
                        'ShowFilters' => true,
                        'Height' => 406,
                        'Width' => 0,
                        'OnDblClick' => '',
                        'Columns' => array(
                            'RowNumber' => array(
                                'Name' => 'Очередь',
                                'FieldName' => 'RowNumber',
                                'Width' => 70,
                                'Filter' => array(
                                    'Condition' => "",
                                ),
                            ),
                            'StatusName' => array(
                                'Name' => 'Статус',
                                'FieldName' => 'StatusName',
                                'Width' => 130,
                                'Filter' => array(
                                    'Condition' => "r.StatusName like ':Value%'",
                                ),
                            ),
                            'Number' => array(
                                'Name' => 'Номер',
                                'FieldName' => 'Number',
                                'Width' => 80,
                                'Filter' => array(
                                    'Condition' => "r.Number like ':Value%'",
                                ),
                            ),
                        ),
                    ));
                ?>
            </div>

        </div>
        <div style="float: left; margin-left: 6px; margin-top: 24px">
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                            'id' => 'Up',
                            'Width' => 34,
                            'Height' => 34,
                            'Text' => '↑',
                            'Style' => 'padding: 0px 2px 0px 0px',
                            'Type' => 'None',
                            'OnAfterClick' => 'SortTask(1);',
                        ));
                ?>
            </div>
            <div style="clear: both; margin-top: 6px;"></div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                            'id' => 'Down',
                            'Width' => 34,
                            'Height' => 34,
                            'Text' => '↓',
                            'Style' => 'padding: 0px 2px 0px 0px',
                            'Type' => 'None',
                            'OnAfterClick' => 'SortTask(-1);',
                        ));
                ?>
            </div>
        </div>
    </div>
    
    <div style="clear: both; margin-top: 8px"></div>
    <div style="float: left; ">
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                        'id' => 'NewRepair',
                        'Width' => 134,
                        'Height' => 34,
                        'Text' => 'Новая заявка',
                        'Href' => Yii::app()->createUrl('Repair/Create'),
                    ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 10px;">
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'InfoRepair',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Просмотр',
                    'Type' => 'NewWindow',
                    'Href' => Yii::app()->createUrl('Repair/RepairEngineerInformation'),
                    'Params' => array(
                                array(
                                    'ParamName' => 'Repr_id',
                                    'NameControl' => 'RepairsGrid',
                                    'TypeControl' => 'Grid',
                                    'FieldControl' => 'Repr_id',
                                ),
                            ),
                ));
            ?>
        </div>
    </div>
</div>

