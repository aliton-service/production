<script>
    Aliton.Links.push({
        Out: "edDateStart",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(w.date) >= ':Value'",
        Name: "Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateEnd",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(w.date) <= ':Value'",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateCrStart",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(w.date_create) >= ':Value'",
        Name: "Filter3",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateCrEnd",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(w.date_create) <= ':Value'",
        Name: "Filter4",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateAcStart",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(w.ac_date) >= ':Value'",
        Name: "Filter5",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateAcEnd",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "dbo.truncdate(w.ac_date) <= ':Value'",
        Name: "Filter6",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "cmbMaster",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "w.dmnd_empl_id = :Value",
        FieldName: "Employee_id",
        Name: "Filter7",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "CmbObjects",
        In: "WhActsReestrGrid",
        TypeControl: "Grid",
        Condition: "w.objc_id = :Value",
        FieldName: "Object_id",
        Name: "Filter8",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "WhActsReestrGrid",
        In: "edWorkList",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "work_list",
        Name: "Filter9",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "WhActsReestrGrid",
        In: "edNote",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "note",
        Name: "Filter10",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
</script>

<div style="padding: 12px;">
    <div style="float: left; width: 400px">
        <div style="margin-bottom: 6px">
            <div style="float: left; width: 100px">Дата с</div>
            <div>
                <?php
                    $Ds = new DateTime();
                    $Ds->modify("-1 month");
                    
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateStart',
                        'Name' => '',
                        'Width' => 160,
                        'Value' => $Ds->format("d.m.Y"),
                        'ReadOnly' => false,
                    ));
                ?>
            </div>
        </div>
        <div style="margin-bottom: 6px">
            <div style="float: left; width: 100px">по</div>
            <div>
                <?php
                    $De = new DateTime();
                    
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateEnd',
                        'Name' => '',
                        'Width' => 160,
                        'Value' => $De->format("d.m.Y"),
                        'ReadOnly' => false,
                    ));
                ?>
            </div>
        </div>
        <div>
            <div style="float: left; width: 100px">Мастер</div>
            <div>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbMaster',
                        'Stretch' => true,
                        'ModelName' => 'Employees',
                        'Height' => 300,
                        'Width' => 300,
                        'KeyField' => 'Employee_id',
                        'FieldName' => 'ShortName',
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => 'e.EmployeeName like \':Value%\'',
                        ),
                        'Columns' => array(
                            'EmployeeName' => array(
                                'Name' => 'ФИО',
                                'FieldName' => 'EmployeeName',
                                'Width' => 300,

                            ),
                        ),
                    ));
                ?>
            </div>
        </div>
    </div>
    <div style="float: left; padding-left: 6px">
        <div>
            <div style="width: 260px; float: left; margin-bottom: 6px">
                <div style="float: left; width: 100px">Создан с</div>
                <div>
                    <?php
                        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                            'id' => 'edDateCrStart',
                            'Name' => '',
                            'Width' => 160,
                            'Value' => null,
                            'ReadOnly' => false,
                        ));
                    ?>
                </div>
            </div>
            <div style="width: 260px; float: left; margin-left: 6px;">
                <div style="float: left; width: 100px">Подтвержден с</div>
                <div>
                    <?php
                        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                            'id' => 'edDateAcStart',
                            'Name' => '',
                            'Width' => 160,
                            'Value' => null,
                            'ReadOnly' => false,
                        ));
                    ?>
                </div>
            </div>
            <div style="clear: both"></div>
            <div style="width: 260px; float: left; margin-bottom: 6px">
                <div style="float: left; width: 100px">по</div>
                <div>
                    <?php
                        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                            'id' => 'edDateCrEnd',
                            'Name' => '',
                            'Width' => 160,
                            'Value' => null,
                            'ReadOnly' => false,
                        ));
                    ?>
                </div>
            </div>
            <div style="width: 260px; float: left; margin-left: 6px">
                <div style="float: left; width: 100px">по</div>
                <div>
                    <?php
                        $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                            'id' => 'edDateAcEnd',
                            'Name' => '',
                            'Width' => 160,
                            'Value' => null,
                            'ReadOnly' => false,
                        ));
                    ?>
                </div>
            </div>
        </div>
        <div style="clear: both"></div>
        <div>
            <div style="float: left; width: 100px">Адрес</div>
            <div>
                <?php
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'CmbObjects',
                        'Stretch' => true,
                        'Key' => 'WhActs_Index_CmbAddressGrid',
                        'ModelName' => 'ListObjects',
                        'ShowFilters' => false,
                        'ShowPager' => false,
                        'Height' => 300,
                        'Width' => 400,
                        'PopupWidth' => 500,
                        'KeyField' => 'Object_id',
                        'FieldName' => 'Addr',
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => "a.Addr like ':Value%'",
                        ),
                        'Columns' => array(
                            'Addr' => array(
                                'Name' => 'Адрес',
                                'FieldName' => 'Addr',
                                'Width' => 300,
                                'Filter' => array(
                                    'Condition' => "a.Addr like ':Value%'",
                                ),

                            ),
                        ),
                    ));
                ?>
            </div>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div style="padding-left: 12px; margin-top: 12px">
    <?php
	$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
		'id'=>'WhActsReestrGrid',
		'Width' => 600,
		'Height' => 400,
                'ShowFilters' => true,
		'Stretch' => true,
		'ModelName' => 'WhActsReestr_v',
		'Key' => 'WhActs_Index_WhActsReestrGrid',
                'OnDblClick' => '$("#EditWhAct").albutton("BtnClick");',
                'Columns' => array(
                    'Date' => array(
                            'Name' => 'Дата работ',
                            'FieldName' => 'date',
                            'Width' => 120,
                            'Format' => 'd.m.Y H:i'
                    ),
                    'Master' => array(
                            'Name' => 'Исполнитель',
                            'FieldName' => 'master',
                            'Width' => 130,
                    ),
                    'Address' => array(
                            'Name' => 'Адрес',
                            'FieldName' => 'Address',
                            'Width' => 180,
                    ),
                    'DatePayment' => array(
                            'Name' => 'Дата оплаты',
                            'FieldName' => 'date_payment',
                            'Width' => 100,
                            'Format' => 'd.m.Y'
                    ),
                    'Sum' => array(
                            'Name' => 'Сумма по акту',
                            'FieldName' => 'sum',
                            'Width' => 120,
                    ),
                    'SignedYn' => array(
                            'Name' => 'Подписан',
                            'FieldName' => 'signed_yn',
                            'Width' => 70,
                    ),
                    'AcDate' => array(
                            'Name' => 'Подтвержден',
                            'FieldName' => 'ac_date',
                            'Width' => 120,
                            'Format' => 'd.m.Y H:i'
                    ),
                    'CstmName' => array(
                            'Name' => 'Клиент',
                            'FieldName' => 'cstn_name',
                            'Width' => 130,
                    ),
                    'СDate' => array(
                            'Name' => 'Дата отмены',
                            'FieldName' => 'c_date',
                            'Width' => 120,
                            'Format' => 'd.m.Y H:i'
                    ),
                    'СName' => array(
                            'Name' => 'Отменил',
                            'FieldName' => 'c_name',
                            'Width' => 120,
                    ),
                    'Сonfirm' => array(
                            'Name' => 'Основание',
                            'FieldName' => 'c_confirmname',
                            'Width' => 150,
                    ),
                    'DateReg' => array(
                            'Name' => 'Дата рег.',
                            'FieldName' => 'date_create',
                            'Width' => 120,
                            'Format' => 'd.m.Y H:i'
                    ),
                    'UserCreate' => array(
                            'Name' => 'Создал',
                            'FieldName' => 'user_create',
                            'Width' => 120,
                    ),
                ),
        ));
    ?>
</div>
<div style="padding-left: 12px; margin-top: 12px; float: left">
    <div>Перечень работ</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edWorkList',
                'Width' => 600,
                'Height' => 50,
                'Type' => 'String',
                'ReadOnly' => true,
            ));
        ?>
    </div>
    <div>Примечание</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edNote',
                'Width' => 600,
                'Height' => 50,
                'Type' => 'String',
                'ReadOnly' => true,
            ));
        ?>
    </div>
</div>
<div style="margin-top: 31px; margin-left: 12px; float: left">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditWhAct',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Дополнительно',
                'Href' => Yii::app()->createUrl('WhActs/View'),
                'Params' => array(
                        array(
                                'ParamName' => 'docm_id',
                                'NameControl' => 'WhActsReestrGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'docm_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 12px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AddWhAct',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('WhActs/Insert'),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'RefreshWhActs',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Обновить',
                'Type' => 'Window',
                'Href' => Yii::app()->createUrl('WhActs/Index'),
            ));
        ?>
    </div>
</div>
<div style="float: left; margin-left: 130px; margin-top: 31px">
    <div style="float: left; margin-left: 12px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DeleteWhAct',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('WhActs/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'docm_id',
                                'NameControl' => 'WhActsReestrGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'docm_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 6px; margin-left: 12px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'UndoWhAct',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Отменить подтв.',
                'Href' => Yii::app()->createUrl('WhActs/Undo'),
                'Params' => array(
                    array(
                            'ParamName' => 'docm_id',
                            'NameControl' => 'WhActsReestrGrid',
                            'TypeControl' => 'Grid',
                            'FieldControl' => 'docm_id',
                    ),
                ),
            ));
        ?>
    </div>
</div>




