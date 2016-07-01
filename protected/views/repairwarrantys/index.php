<script>
    function Agreed() {
        var Docm_id;
        
        var Data = {
            Data: {
                Docm_id: null,
            },
        };
        
        Docm_id = algridajaxSettings["RepairWarrantysGrid"].CurrentRow["Docm_id"];
        
        Data.Data.Docm_id = Docm_id;
        
        $.ajax({
            url: '/index.php?r=RepairWarrantys/Agreed',
            type: 'POST',
            data: Data, 
            async: true,
            success: function(Res){
                $("#RepairWarrantysGrid").algridajax("Load");
            }
        });
    }
    
    Aliton.Links.push({
        Out: "RepairWarrantysGrid",
        In: "edDocm_id",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Docm_id",
        Name: "edDocm_idFilter",
        TypeFilter: "Internal",
        TypeLink: "Filter",
    });
</script>    


<div style="clear: both; margin-top: 12px"></div>
<div style="float: left; width: 100%">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'RepairWarrantysGrid',
            'Stretch' => true,
            'Key' => 'RepairWarrantys_Index_RepairWarrantysGrid',
            'ModelName' => 'RepairWarrantys',
            'ShowFilters' => true,
            'Height' => 430,
            'Width' => 500,
            'OnDblClick' => '$("#EditRepairWarrantys").albutton("BtnClick");',
            'Columns' => array(
                'Number' => array(
                    'Name' => 'Номер',
                    'FieldName' => 'Number',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "rw.Number = :Value",
                    ),
                ),
                'Date' => array(
                    'Name' => 'Дата',
                    'FieldName' => 'Date',
                    'Width' => 130,
                    'Format' => 'd.m.Y',
                    'Filter' => array(
                        'Condition' => "rw.Date = ':Value'",
                    ),
                ),
                'RepNumber' => array(
                    'Name' => 'Ремонт №',
                    'FieldName' => 'RepNumber',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "rw.RepNumber like ':Value%'",
                    ),
                ),
                'Addr' => array(
                    'Name' => 'Адрес',
                    'FieldName' => 'Addr',
                    'Width' => 320,
                    'Filter' => array(
                        'Condition' => "rw.Addr like ':Value%'",
                    ),
                ),
                'EquipName' => array(
                    'Name' => 'Оборудование',
                    'FieldName' => 'EquipName',
                    'Width' => 320,
                    'Filter' => array(
                        'Condition' => "rw.EquipName like ':Value%'",
                    ),
                ),
                'Period' => array(
                    'Name' => 'Срок гарантии',
                    'FieldName' => 'Period',
                    'Width' => 110,
                    'Filter' => array(
                        'Condition' => "rw.Period like ':Value%'",
                    ),
                ),
                'DateAgree' => array(
                    'Name' => 'Дата подтверждения',
                    'FieldName' => 'DateAgree',
                    'Format' => 'd.m.Y H:i',
                    'Width' => 140,
                    'Filter' => array(
                        'Condition' => "rw.DateAgree = ':Value'",
                    ),
                ),
                
                'EmplAgreeName' => array(
                    'Name' => 'Подтвердил',
                    'FieldName' => 'EmplAgreeName',
                    'Width' => 140,
                    'Filter' => array(
                        'Condition' => "rw.EmplAgreeName = ':Value'",
                    ),
                ),
            ),
        ));
    ?>
</div>
<div style="clear: both"></div>
<div style="margin-top: 16px">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AddRepairWarrantys',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Type' => 'Window',
                'Href' => Yii::app()->createUrl('RepairWarrantys/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditRepairWarrantys',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Type' => 'Window',
                'Href' => Yii::app()->createUrl('RepairWarrantys/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Docm_id',
                                'NameControl' => 'RepairWarrantysGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Docm_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'AgreedRepairWarrantys',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Подтвердить',
                'Type' => 'None',
                'Href' => Yii::app()->createUrl('RepairWarrantys/Agreed'),
                'OnAfterClick' => 'Agreed();',
            ));
        ?>
    </div>
    <div style="float: left;">
        <?php
            $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'Parameters',
                    'action' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Ремонт/Гарантийный талон')),
                    'htmlOptions'=>array(
                            'class'=>'form-inline'
                            ),
             ));
            
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edDocm_id',
                'Width' => 70,
                'Type' => 'String',
                'Name' => 'Parameters[Docm_id]',
                'ReadOnly' => true,
                'Visible' => false,
            ));
        
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'Print',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Печать',
                'FormName' => 'Parameters',
                'Type' => 'Form',
                'Href' => '',
            ));
            
            
        ?>
        <?php $this->endWidget(); ?>
    </div>
    <div style="float: right; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelRepairWarrantys',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('RepairRepairWarrantys/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Docm_id',
                                'NameControl' => 'RepairWarrantysGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Docm_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>





