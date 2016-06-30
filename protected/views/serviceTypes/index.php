<script>
    Aliton.Links.push({
        Out: "edServiceType",
        In: "ServiceTypesGrid",
        TypeControl: "Grid",
        Condition: "st.ServiceType like '%:Value%'",
        Name: "Filter1",
        Field: "",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
</script>
<?php $this->setPageTitle('Тарифы обслуживания'); ?>
<?php
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Тарифы обслуживания'=>array('index'),
    );
?>

<div style="float: left; margin-top: 16px;">
    <div style="text-align: center; float: left">Поиск по наименованию</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edServiceType',
                    'Width' => 350,
                    'Type' => 'String',
            ));
        ?>
    </div>
</div>

<div style="clear: both"></div>
<div style="margin-top: 16px">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'ServiceTypesGrid',
            'Stretch' => true,
            'Key' => 'ServiceType_Index_ServiceTypesGrid',
            'ModelName' => 'ServiceTypes',
            'ShowFilters' => true,
            'Height' => 230,
            'Width' => 500,
            'OnDblClick' => '$("#EditServiceType").albutton("BtnClick");',
            'Columns' => array(
                'ServiceType' => array(
                    'Name' => 'Наименование',
                    'FieldName' => 'ServiceType',
                    'Width' => 400,
                    'Filter' => array(
                        'Condition' => "st.ServiceType like ':Value%'",
                    ),
                    'Sort' => array(
                        'Up' => 'st.ServiceType desc',
                        'Down' => 'st.ServiceType',
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
                'id' => 'AddServiceType',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Создать',
                'Href' => Yii::app()->createUrl('ServiceTypes/Create'),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditServiceType',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Href' => Yii::app()->createUrl('ServiceTypes/Update'),
                'Params' => array(
                        array(
                                'ParamName' => 'ServiceType_id',
                                'NameControl' => 'ServiceTypesGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'ServiceType_id',
                        ),
                ),
            ));
        ?>
    </div>
    <div style="clear: both"></div>
    <div style="float: left; margin-top: 8px">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DelServiceType',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Href' => Yii::app()->createUrl('ServiceTypes/Delete'),
                'Params' => array(
                        array(
                                'ParamName' => 'ServiceType_id',
                                'NameControl' => 'ServiceTypesGrid',
                                'TypeControl' => 'Grid',
                                'FieldControl' => 'ServiceType_id',
                        ),
                ),
            ));
        ?>
    </div>
</div>