<script>
    function Agreed() {
        var Docm_id;
        
        var Data = {
            Data: {
                Docm_id: null,
            },
        };
        
        Docm_id = algridajaxSettings["RepairActDefectationsGrid"].CurrentRow["Docm_id"];
        
        Data.Data.Docm_id = Docm_id;
        
        $.ajax({
            url: '/index.php?r=RepairActDefectations/Agreed',
            type: 'POST',
            data: Data, 
            async: true,
            success: function(Res){
                $("#RepairActDefectationsGrid").algridajax("Load");
            }
        });
    }
</script>    

<div style="float: left">
    <?php

    ?>
</div>
<div style="clear: both; margin-top: 12px"></div>
<div style="float: left; width: 100%">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'RepairActDefectationsGrid',
            'Stretch' => true,
            'Key' => 'RepairActDefectationsGrid_Index_RepairActDefectationsGrid',
            'ModelName' => 'RepairActDefectations',
            'ShowFilters' => true,
            'Height' => 430,
            'Width' => 500,
            'OnDblClick' => '$("#EditActDefectations").albutton("BtnClick");',
            'Sort' => array('rd.Docm_id desc'),
            'Columns' => array(
                'Number' => array(
                    'Name' => 'Номер',
                    'FieldName' => 'Number',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "rd.Number = :Value",
                    ),
                ),
                'Date' => array(
                    'Name' => 'Дата',
                    'FieldName' => 'Date',
                    'Width' => 130,
                    'Format' => 'd.m.Y',
                    'Filter' => array(
                        'Condition' => "rd.Date = ':Value'",
                    ),
                ),
                'RepNumber' => array(
                    'Name' => 'Ремонт №',
                    'FieldName' => 'RepNumber',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "rd.RepNumber like ':Value%'",
                    ),
                ),
                'Addr' => array(
                    'Name' => 'Адрес',
                    'FieldName' => 'Addr',
                    'Width' => 320,
                    'Filter' => array(
                        'Condition' => "rd.Addr like ':Value%'",
                    ),
                ),
                'EquipName' => array(
                    'Name' => 'Оборудование',
                    'FieldName' => 'EquipName',
                    'Width' => 320,
                    'Filter' => array(
                        'Condition' => "rd.EquipName like ':Value%'",
                    ),
                ),
                'DateAgree' => array(
                    'Name' => 'Дата подтверждения',
                    'FieldName' => 'DateAgree',
                    'Format' => 'd.m.Y H:i',
                    'Width' => 140,
                    'Filter' => array(
                        'Condition' => "rd.DateAgree = ':Value'",
                    ),
                ),
                
                'EmplAgreeName' => array(
                    'Name' => 'Подтвердил',
                    'FieldName' => 'EmplAgreeName',
                    'Width' => 140,
                    'Filter' => array(
                        'Condition' => "rd.EmplAgreeName = ':Value'",
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
                'id' => 'AddRepActDefectations',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Type' => 'Window',
                'Href' => Yii::app()->createUrl('RepairActDefectations/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditActDefectations',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Type' => 'Window',
                'Href' => Yii::app()->createUrl('RepairActDefectations/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Docm_id',
                                'NameControl' => 'RepairActDefectationsGrid',
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
                'id' => 'AgreedActDefectations',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Подтвердить',
                'Type' => 'None',
                'Href' => Yii::app()->createUrl('RepairActDefectations/Agreed'),
                'OnAfterClick' => 'Agreed();',
            ));
        ?>
    </div>
    <div style="float: right; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelActDefectations',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('RepairActDefectations/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Docm_id',
                                'NameControl' => 'RepairActDefectationsGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Docm_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>

