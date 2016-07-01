<script>
    function Agreed() {
        var Docm_id;
        
        var Data = {
            Data: {
                Docm_id: null,
            },
        };
        
        Docm_id = algridajaxSettings["RepairSRMGrid"].CurrentRow["Docm_id"];
        
        Data.Data.Docm_id = Docm_id;
        
        $.ajax({
            url: '/index.php?r=RepairSRM/Agreed',
            type: 'POST',
            data: Data, 
            async: true,
            success: function(Res){
                $("#RepairSRMGrid").algridajax("Load");
            }
        });
    }
</script>    


<div style="clear: both; margin-top: 12px"></div>
<div style="float: left; width: 100%">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'RepairSRMGrid',
            'Stretch' => true,
            'Key' => 'RepairSRM_Index_RepairSRMGrid',
            'ModelName' => 'RepairSRM',
            'ShowFilters' => true,
            'Height' => 430,
            'Width' => 500,
            'OnDblClick' => '$("#EditRepairSRM").albutton("BtnClick");',
            
            'Columns' => array(
                'Number' => array(
                    'Name' => 'Номер',
                    'FieldName' => 'Number',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "srm.Number = :Value",
                    ),
                ),
                'Date' => array(
                    'Name' => 'Дата',
                    'FieldName' => 'Date',
                    'Width' => 130,
                    'Format' => 'd.m.Y',
                    'Filter' => array(
                        'Condition' => "srm.Date = ':Value'",
                    ),
                ),
                'RepNumber' => array(
                    'Name' => 'Ремонт №',
                    'FieldName' => 'RepNumber',
                    'Width' => 80,
                    'Filter' => array(
                        'Condition' => "srm.RepNumber like ':Value%'",
                    ),
                ),
                'Addr' => array(
                    'Name' => 'Адрес',
                    'FieldName' => 'Addr',
                    'Width' => 320,
                    'Filter' => array(
                        'Condition' => "srm.Addr like ':Value%'",
                    ),
                ),
                'EquipName' => array(
                    'Name' => 'Оборудование',
                    'FieldName' => 'EquipName',
                    'Width' => 320,
                    'Filter' => array(
                        'Condition' => "srm.EquipName like ':Value%'",
                    ),
                ),
                'DateAgree' => array(
                    'Name' => 'Дата подтверждения',
                    'FieldName' => 'DateAgree',
                    'Format' => 'd.m.Y H:i',
                    'Width' => 140,
                    'Filter' => array(
                        'Condition' => "srm.DateAgree = ':Value'",
                    ),
                ),
                
                'EmplAgreeName' => array(
                    'Name' => 'Подтвердил',
                    'FieldName' => 'EmplAgreeName',
                    'Width' => 140,
                    'Filter' => array(
                        'Condition' => "srm.EmplAgreeName = ':Value'",
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
                'id' => 'AddRepairSRM',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Type' => 'Window',
                'Href' => Yii::app()->createUrl('RepairSRM/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditRepairSRM',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Type' => 'Window',
                'Href' => Yii::app()->createUrl('RepairSRM/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'Docm_id',
                                'NameControl' => 'RepairSRMGrid',
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
                'id' => 'AgreedRepairSRM',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Подтвердить',
                'Type' => 'None',
                'Href' => Yii::app()->createUrl('RepairSRM/Agreed'),
                'OnAfterClick' => 'Agreed();',
            ));
        ?>
    </div>
    <div style="float: right; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelRepairSRM',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('RepairRepairSRM/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'Docm_id',
                                'NameControl' => 'RepairSRMGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'Docm_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>



