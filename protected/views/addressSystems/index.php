<div style="margin-top: 6px">
<?php
    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'ListAddrSys',
            'Stretch' => true,
            'Key' => 'Reference_AddrSys_Index_Grid_1',
            'ModelName' => 'AddressSystems',
            'ShowFilters' => true,
            'Height' => 300,
            'Width' => 500,
            'OnDblClick' => '$("#update").albutton("BtnClick");',
            'Columns' => array(
                    'AddressSystem' => array(
                            'Name' => 'Адрес',
                            'FieldName' => 'AddressSystem',
                            'Width' => 100,
                            'Filter' => array(
                                    'Condition' => 'a.AddressSystem Like \':Value%\'',
                            ),
                            'Sort' => array(
                                'Up' => 'a.AddressSystem desc',
                                'Down' => 'a.AddressSystem',
                            ),
                    ),
                    'Note' => array(
                            'Name' => 'Примечание',
                            'FieldName' => 'Note',
                            'Width' => 100,
                            'Filter' => array(
                                    'Condition' => 'a.Note Like \':Value%\'',
                            ),
                            'Sort' => array(
                                'Up' => 'a.Note desc',
                                'Down' => 'a.Note',
                            ),
                    ),
        ),
    ));
?>
</div>
<div style="margin-top: 6px">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'create',
                'Height' => 30,
                'Text' => 'Создать',
                'Type' => 'NewWindow',
                'Href' => Yii::app()->createUrl('AddressSystems/create')
                    
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
    <?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'update',
            'Height' => 30,
            'Text' => 'Изменить',
            'Href' => Yii::app()->createUrl('AddressSystems/update'),
            'Params' => array(
                    array(
                            'ParamName' => 'id',
                            'NameControl' => 'ListAddrSys',
                            'TypeControl' => 'Grid',
                            'FieldControl' => 'AddressSystem_id',
                    ),
            ),
    ));
    ?>
    </div>
    <div style="float: left; margin-left: 6px">
    <?php
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'delete',
            'Height' => 30,
            'Text' => 'Удалить',
            'Type' => 'none',
            'OnAfterClick' => "aliton.form.delete('AddressSystems/delete', algridajaxSettings.ListAddrSys.CurrentRow['AddressSystem_id'], function(){
             $('#ListAddrSys').algridajax('LoadData')
             })"
    ));
    ?>
    </div>
</div>    



    
