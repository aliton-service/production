<script>
    Aliton.Links.push({
        Out: "ListObjectsGrid",
        In: "edFilterObject_id",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Object_id",
        Name: "Filter1_1",
        isNullRun: false,
        TypeFilter: "Internal",
        TypeLink: "Filter",
    });
    Aliton.Links.push({
        Out: "ListObjectsGrid",
        In: "edFilterObjectGr_id",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "ObjectGr_id",
        Name: "Filter1_2",
        isNullRun: false,
        TypeFilter: "Internal",
        TypeLink: "Filter",
    });
    
    Aliton.Links.push({
        Out: "ListObjectsGrid",
        In: "edFilterStreet_id",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Street_id",
        Name: "Filter1_3",
        isNullRun: false,
        TypeFilter: "Internal",
        TypeLink: "Filter",
    });
    
    Aliton.Links.push({
        Out: "ListObjectsGrid",
        In: "edFilterHouse",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "House",
        Name: "Filter1_4",
        isNullRun: false,
        TypeFilter: "Internal",
        TypeLink: "Filter",
    });
</script>

<?php
    $this->beginWidget('CActiveForm', array(
            'id'=>'DemFilters',
            'htmlOptions'=>array(
                'class'=>'form-inline',
                'target'=>'blank',
                ),
            'action'=> Yii::app()->createUrl('Demands/index'),
    ));

    //echo '<input name="DemFilters[Object_id]" type="text" style="display: none;" value="' . $Object_id . '"/>';
    //echo '<input name="DemFilters[ObjectGr_id]" type="text" style="display: none;" value="' . $ObjectGr_id . '"/>';

?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edFilterObject_id',
        'Name' => 'DemFilters[Object_id]',
        'Value' => $Object_id,
        'Width' => 150,
        'Visible' => false,
    ));
?>
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edFilterObjectGr_id',
        'Name' => 'DemFilters[ObjectGr_id]',
        'Value' => $ObjectGr_id,
        'Width' => 150,
        'Visible' => false,
    ));
?>
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edFilterStreet_id',
        'Name' => 'DemFilters[Street_id]',
        'Value' => $Street_id,
        'Width' => 150,
        'Visible' => false,
    ));
?>
<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edFilterHouse',
        'Name' => 'DemFilters[House]',
        'Value' => $House,
        'Width' => 150,
        'Visible' => false,
    ));
?>


<div style="margin-left: 6px">
    <div>Выбирите заявки для просмотра</div>
    <div style="float: left">
        <div style="float: left">        
            <?php
                $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                    'id' => 'rbAll',
                    'Label' => 'Любые',
                    'Name' => 'DemFilters[All]',
                    'OnAfterClick' => '$("#Ok").albutton("BtnClick");',
                ));
            ?>
        </div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                    'id' => 'rbNoDateMaster',
                    'Label' => 'Непереданные',
                    'Name' => 'DemFilters[NoDateMaster]',
                    'OnAfterClick' => '$("#Ok").albutton("BtnClick");',
                ));
            ?>
        </div>
        <div style="clear: both"></div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                    'id' => 'rbNoDateExec',
                    'Label' => 'Невыполненные',
                    'Name' => 'DemFilters[NoDateExec]',
                ));
            ?>
        </div>    
    </div>
    <div style="float: left">
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                    'id' => 'rbDemObject',
                    'Label' => 'По выбранному объекту',
                    'Name' => 'DemFilters[DemObject]',
                    'OnAfterClick' => '$("#Ok").albutton("BtnClick"); albuttonSettings["Ok"].Enabled = true;',
                ));
            ?>
        </div>
        <div>
            <?php
                $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                    'id' => 'rbDemAllObject',
                    'Label' => 'По всем объектам адреса',
                    'Name' => 'DemFilters[DemObjectGroup]',
                    'OnAfterClick' => '$("#Ok").albutton("BtnClick"); albuttonSettings["Ok"].Enabled = true;',
                ));
            ?>
        </div>
    </div>
    <div style="clear: both; margin-bottom: 6px"></div>       
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
                'id' => 'rbParams',
                'Label' => 'По параметрам',
            ));
        ?>
    </div>
    <div style="float: left; padding-left: 6px;">Мастер</div>
    <div style="padding-left: 6px; float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                'id' => 'cmbMasterFilter',
                'ModelName' => 'ListEmployees',
                'FieldName' => 'ShortName',
                'KeyField' => 'Employee_id',
                'Name' => 'DemFilters[Master]',
                'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => 'e.EmployeeName like \':Value%\'',
                ),
                'Width' => 200,
                'Columns' => array(
                    'ShortName' => array(
                        'Name' => 'Сотрудник',
                        'FieldName' => 'ShortName',
                    ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="border: 1px solid; margin-top: 6px; padding: 6px; float: left; margin-bottom: 6px">
        <div style="float: left">Номер</div>
        <div style="float: left">      
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDemand_id',
                    'Name' => 'DemFilters[Demand_id]',
                    'Width' => 150,
                ));
            ?>
        </div>        
        <div style="float: left">Дата</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDateReg1',
                    'Name' => 'DemFilters[DateReg]',
                    'Width' => 150,
                ));
            ?>
        </div>
        <div style="clear: both; margin-bottom: 6px"></div>
        <div style="float: left">Тип</div>
        <div style="float: left; padding-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbDemandType',
                    'ModelName' => 'DemandTypes',
                    'FieldName' => 'DemandType',
                    'KeyField' => 'DemandType_id',
                    
                    'Name' => 'DemFilters[DemandType_id]',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 'dt.DemandType like \':Value%\'',
                    ),
                    'Width' => 200,
                    'Columns' => array(
                        'DemandType' => array(
                            'Name' => 'Тип',
                            'FieldName' => 'DemandType',
                        ),
                    ),
                ));
            ?>
        </div>
        <div style="clear: both; margin-bottom: 6px"></div>
        <div style="float: left">Исполнитель</div>
        <div style="float: left; padding-left: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'cmbExecutor',
                    'ModelName' => 'ListEmployees',
                    'FieldName' => 'ShortName',
                    'KeyField' => 'Employee_id',
                    'Name' => 'DemFilters[Executor]',
                    'Type' => array(
                        'Mode' => 'Filter',
                        'Condition' => 'e.EmployeeName like \':Value%\'',
                    ),
                    'Width' => 200,
                    'Columns' => array(
                        'ShortName' => array(
                            'Name' => 'Сотрудник',
                            'FieldName' => 'EmployeeName',
                        ),
                    ),
                ));
            ?>
        </div>
        <div ></div>
    </div>
    <div style="clear: both;">
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'Ok',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Выбрать',
                    'Type' => 'Form',
                    'FormName' => 'DemFilters',
                    'OnAfterClick' => '$("#Dialog1").aldialog("HideContent");',

                ));
            ?>
        </div>
        <div style="float: right; margin-right: 6px">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'Cancel',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Отмена',
                    'Type' => 'None',
                    'OnAfterClick' => '$("#Dialog1").aldialog("HideContent");',

                ));
            ?>
        </div>
    </div>
        
</div>
<?php
    $this->endWidget();
?>

