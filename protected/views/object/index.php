<script>
    /*
    Aliton.Links.push({
        Out: "CmbObjects",
        In: "ListObjectsGrid",
        TypeControl: "Grid",
        Condition: "t.Object_id = :Value",
        Field: "Object_id",
        Name: "CmbObjects_Filter1",
        TypeFilter: "External",
        TypeLink: "Locate",
        isNullRun: false,
    });
    */
    Aliton.Links.push({
        Out: "edPropDopFilter",
        In: "ListObjectsGrid",
        TypeControl: "Grid",
        Condition: "o.Fullname like '%:Value%'",
        Field: "",
        Name: "CmbObjects_Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "edAddrDopFilter",
        In: "ListObjectsGrid",
        TypeControl: "Grid",
        Condition: "o.StreetName like ':Value%'",
        Name: "CmbObjects_Filter3",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
</script>
<?php
    /*
    $this->breadcrumbs=array(
	'Объекты'=>array('/object/index'),
	'Список объектов'=>array('index'),
    );
     * */
     
?>
<div id="glav" style="height: 100%; min-height:inherit; background-color: white;" >
    <div style="height: 5%" class="field">
        <div style="float: left">
            <div style="float: left">Адрес:</div>
            <div style="float: left; margin-left: 6px">
                <?php
                    /*
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'CmbObjects',
                        'Stretch' => true,
                        'Key' => 'Site_Index_CmbObjectsGrid',
                        'ModelName' => 'FullObjects',
                        'ShowFilters' => false,
                        'ShowPager' => false,
                        'Height' => 300,
                        'Width' => 400,
                        'PopupWidth' => 500,
                        'KeyField' => 'Object_id',
                        'FieldName' => 'Addr',
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Condition' => "o.Addr like ':Value%'",
                        ),
                        'Columns' => array(
                            'Addr' => array(
                                'Name' => 'Адрес',
                                'FieldName' => 'Addr',
                                'Width' => 450,
                                'Filter' => array(
                                    'Condition' => "o.Addr like ':Value%'",
                                ),

                            ),
                        ),
                    ));
                    */
                
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edAddrDopFilter',
                        'Width' => 420,
                        'ReadOnly' => false,
                    ));
                ?>
            </div>
        </div>
        <div style="float: left">
            <div style="float: left; margin-left: 12px">Клиент:</div>
            <div style="float: left; margin-left: 6px">
                <?php
                    /*
                    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'CmbOrganizations',
                        'Stretch' => true,
                        'Key' => 'WhActs_Update_CmbOrganizations',
                        'ModelName' => 'OrganizationsV',
                        'ShowFilters' => false,
                        'ShowPager' => false,
                        'Height' => 300,
                        'Width' => 400,
                        'PopupWidth' => 500,
                        'KeyField' => 'Form_id',
                        'FieldName' => 'FullName',
                        'Type' => array(
                            'Mode' => 'Filter',
                            'Type' => 'Internal',
                            'Condition' => "p.FullName like '%:Value%'",
                            'Name' => 'Filter1'
                        ),
                        'Columns' => array(
                            'FullName' => array(
                                'Name' => 'Клиент',
                                'FieldName' => 'FullName',
                                'Width' => 450,
                            ),
                        ),
                    ));
                    */
                    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edPropDopFilter',
                        'Width' => 420,
                        'ReadOnly' => false,
                    ));
                ?>
            </div>
        </div>
        <div style="float: left; margin-left: 12px">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'edObjFind',
                    'Width' => 134,
                    'Height' => 30,
                    'Text' => 'Поиск\Обновить',
                    'Type' => 'None',
                    'OnAfterClick' => '$("#ListObjectsGrid").algridajax("Load");',
                ));
            ?>
        </div>
        <div style="clear: both"></div>
        
    </div>

    <div style="height: 90%;margin-top: 6px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
                'id' => 'ListObjectsGrid',
                'Stretch' => true,
                'Key' => 'Object_Index_ListObjectsGrid_1',
                'ModelName' => 'FullObjects',

                'ShowFilters' => true,
                'Height' => 400,
                'Width' => 500,
                'OnDrawRow' => 'RowStyle=""; if (Row["Status"] === "Должник") RowStyle="color: red";' .
                               'if (Row["Status"] === "Особые условия") RowStyle="color: green";' .
                               'if (Row["Status"] === "Должник и особые условия") RowStyle="color: blue";',
                'OnDblClick' => '$("#desc").albutton("BtnClick");',
                'Columns' => array(
                    'Object_id' => array(
                        'Name' => 'Ид',
                        'FieldName' => 'Object_id',
                        'Width' => 100,
                    ),
                    'ObjectGr_id' => array(
                        'Name'=>'ObjectGr_id',
                        'FieldName'=>'ObjectGr_id',
                        'Width'=> 100,
                    ),
                    'Addr' => array(
                        'Name' => 'Адрес',
                        'FieldName' => 'Addr',
                        'Width' => 300,
                        'Filter' => array(
                            'Condition' => "o.Addr like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'o.Addr desc',
                            'Down' => 'o.Addr',
                        ),
                    ),
                    'FullName' => array(
                        'Name' => 'Организация',
                        'FieldName' => 'FullName',
                        'Width' => 200,
                        'Filter' => array(
                            'Condition' => "p.FullName like '%:Value%'",
                        ),
                    ),
                    'JuridicalPerson' => array(
                        'Name' => 'Юр. лицо',
                        'FieldName' => 'JuridicalPerson',
                        'Width' => 100,
                    ),
                    'AreaName' => array(
                        'Name' => 'Район',
                        'FieldName' => 'AreaName',
                        'Width' => 100,
                    ),
                    'Servicetype' => array(
                        'Name' => 'Тип обслуживания',
                        'FieldName' => 'ServiceType',
                        'Width' => 100,
                    ),
                    'MasterName' => array(
                        'Name' => 'Имя мастера',
                        'FieldName' => 'MasterName',
                        'Width' => 100,
                    ),
                    'MasterName2' => array(
                        'Name' => 'Имя мастера',
                        'FieldName' => 'MasterName',
                        'Width' => 100,
                    ),
                    'year_construction' => array(
                        'Name' => 'Новостройка',
                        'FieldName' => 'year_construction',
                        'Width' => 100,
                    ),
                    'VIP' => array(
                        'Name' => 'ВИП',
                        'FieldName' => 'VIP',
                        'Width' => 100,
                    ),
                    'Territ_Name' => array(
                        'Name' => 'Участок',
                        'FieldName' => 'Territ_Name',
                        'Width' => 100,
                    ),
                ),
            ));
        ?>
    </div>
    <div style="height: 5%;" class="btn-group">
        <div >
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'desc',
            'Width' => 134,
            'Height' => 30,
            'Text' => 'Дополнительно',
            'Href' => Yii::app()->createUrl('Objectsgroup/index'),
            'Params' => array(
                array(
                    'ParamName' => 'ObjectGr_id',
                    'NameControl' => 'ListObjectsGrid',
                    'TypeControl' => 'Grid',
                    'FieldControl' => 'ObjectGr_id',
                ),
            ),
        ));
    
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'newdemand',
                'Width' => 114,
                'Height' => 30,
                'Text' => 'Новая заявка',
                'Type' => 'None',
                'OnAfterClick' => 'OnAfterClickNewDemand();',
            ));
    
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'NoVisibleNewDemand',
                'Width' => 114,
                'Height' => 30,
                'Text' => 'Новая заявка',
                'Visible' => false,
                'Href' => Yii::app()->createUrl('Demands/create'),
                'Params' => array(
                    array(
                        'ParamName' => 'Object_id',
                        'NameControl' => 'ListObjectsGrid',
                        'TypeControl' => 'Grid',
                        'FieldControl' => 'Object_id',
                    ),
                    array(
                        'ParamName' => 'ContrS_id',
                        'NameControl' => 'ListObjectsGrid',
                        'TypeControl' => 'Grid',
                        'FieldControl' => 'ContrS_id',
                    ),
                ),
                
            ));
    
    
    
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'contract',
        'Width' => 114,
        'Height' => 30,
        'Text' => 'Договор',
        
    ));
    
    
    
    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'view_demand',
        'Width' => 134,
        'Height' => 30,
        'Text' => 'Просмотр заявок',
        'Type' => 'None',
        'OnAfterClick' => ''
            . '$("#ListObjectsGrid").algridajax("SetFocused", algridajaxSettings["ListObjectsGrid"].CurrentFocusedIndex);'
            . 'if (!aldialogSettings["Dialog1"].FirstShow) {'
            . '     $("#rbAll").alradiobutton("SetValue", false);'
            . '     $("#rbNoDateMaster").alradiobutton("SetValue", false);'
            . '     $("#rbNoDateExec").alradiobutton("SetValue", false);'
            . '     $("#rbDemObject").alradiobutton("SetValue", false);'
            . '     $("#rbDemAllObject").alradiobutton("SetValue", false);'
            . '     $("#rbParams").alradiobutton("SetValue", false);'
            . '     $("#cmbMasterFilter").alcomboboxajax("SetValue", null);'
            . '     $("#cmbDemandType").alcomboboxajax("SetValue", null);'
            . '     $("#cmbExecutor").alcomboboxajax("SetValue", null);'
            . '     $("#edDemand_id").aledit("SetValue", null);'
            . '     $("#edDateReg1").aldateedit("SetValue", null);'
            . '}'
            . ' $("#Dialog1").aldialog("Show", {'
            . '     Object_id: algridajaxSettings["ListObjectsGrid"].CurrentRow["Object_id"],'
            . '     ObjectGr_id: algridajaxSettings["ListObjectsGrid"].CurrentRow["ObjectGr_id"],'
            . '     Street_id: algridajaxSettings["ListObjectsGrid"].CurrentRow["Street_id"],'
            . '     House: algridajaxSettings["ListObjectsGrid"].CurrentRow["House"]'
            . '});',
        
    ));
?>



<?php

    $this->widget('application.extensions.alitonwidgets.dialog.aldialog', array(
        'id' => 'Dialog1',
        'Width' => 400,
        'Height' => 250,
        'ContentUrl' => Yii::app()->createUrl('Demands/DemandFilters'),
    ));
 

?>
</div>
    </div>    
</div>

<?php
    $this->widget('application.extensions.alitonwidgets.dialog.aldialog', array(
        'id' => 'Dialog2',
        'Width' => 400,
        'Height' => 80,
        'ContentUrl' => Yii::app()->createUrl('Object/TodayDemandsDialog'),
    ));
?>

<script>
    
    function OnAfterClickNewDemand() {
        if (algridajaxSettings["ListObjectsGrid"].CurrentRow !== null) {
            if (CheckToDayDemands(algridajaxSettings["ListObjectsGrid"].CurrentRow["Object_id"])) {
                $("#NoVisibleNewDemand").albutton("BtnClick");
            }
            else {
                $("#Dialog2").aldialog("Show", {
                    Object_id: algridajaxSettings["ListObjectsGrid"].CurrentRow["Object_id"],
                    ContrS_id: algridajaxSettings["ListObjectsGrid"].CurrentRow["ContrS_id"],
                });
            }
        }
    }
    
    /* Проверка заявок зарегестрированных сегодня, на выбранном объекте */
    function CheckToDayDemands(Object_id) {
        var result = false;
        $.ajax({
            url: 'index.php?r=Object/TodayDemands&Object_id=' + Object_id,
            type: 'GET',
            async: false,
            success: function(Res) {
                if (Res == '1')
                    result = false;
                else
                    result = true;
            }
        });
        return result;
    }




$('body').on('click','#grid tbody tr', function(){


    var obj_id = $(this).find("td[role=object]").text()
    var objgr_id = $(this).find("td[role=object_group]").text()

	
	var link = $(this).find('td.button-column a.update').attr('href');
	$('li[data-action=update] a').attr('href', '/index.php?r=Objectsgroup/index&ObjectGr_id='+objgr_id+'&Object_id='+obj_id);

    $('li[data-action=view] a').attr('href', '/index.php?r=demands&status[nofinish]=on&addr=');
    $('li[data-action=create] a').attr('href', '/index.php?r=demands/create&object='+obj_id);

    $('#dem-view-filter input[name="d[addr]"]').val(obj_id)
    $('#dem-view-filter input[name="d[objgr_id]"]').val(objgr_id)
    $('#dem-this').attr('checked',true)
    
    

});

    $('body').on('click','#close-dem-filter',function(e){

        e.preventDefault()
        $('#dem-view-filter').addClass('hidden')


    })

    $('body').on('click','li[data-action=view] a',function(e){

        e.preventDefault()
        $('#dem-view-filter').removeClass('hidden')


    })
    .on('change','input[name=dem_filter]',function () {
        if($('#dem-nofinish').is(':checked')) $('#master-dem').attr('disabled',false)
        else $('#master-dem').attr('disabled',true)

        if($('#dem-params').is(':checked')) $('#filter-params').removeClass('hidden')
        else $('#filter-params').addClass('hidden')
    })
    .on('submit','#dem-view-filter', function () {
        if(!$('input[name="dem_filter"]').is(':checked')) {
            alert('Выберите параметры')
            return false
        }
        if($('#dem-this').is(':checked') && $('#dem-view-filter input[name="d[addr]"]').val() == 0) {
            alert('Выберите объект')
            return false
        }
    })
</script>


    


     


    
