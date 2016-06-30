<script>
    Aliton.Links.push({
        Out: "CmbObjects",
        In: "WHDocumentsFindTrebGrid",
        TypeControl: "Grid",
        Condition: "d.objc_id = :Value",
        Name: "Filter1",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateStart",
        In: "WHDocumentsFindTrebGrid",
        TypeControl: "Grid",
        Condition: "d.date >= ':Value'",
        Name: "Filter2",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edDateEnd",
        In: "WHDocumentsFindTrebGrid",
        TypeControl: "Grid",
        Condition: "d.date <= ':Value'",
        Name: "Filter3",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "edNumber",
        In: "WHDocumentsFindTrebGrid",
        TypeControl: "Grid",
        Condition: "d.number like ':Value%'",
        Name: "Filter4",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    Aliton.Links.push({
        Out: "WHDocumentsFindTrebGrid",
        In: "edNoteTreb",
        Condition: ":Value",
        Field: "note",
        Name: "Filter5",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "WHDocumentsFindTrebGrid",
        In: "WHDocumentsFindTrebEquipsGrid",
        Condition: "d.docm_id = :Value",
        Field: "docm_id",
        Name: "Filter6",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
    
    Aliton.Links.push({
        Out: "WHDocumentsFindTrebGrid",
        In: "edDocm_id",
        Condition: ":Value",
        Field: "docm_id",
        Name: "Filter7",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false,
    });
</script>

<div style="float: left; ">
    <div style="float: left">
        <div style="float: left; width: 60px">Адрес</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                    'id' => 'CmbObjects',
                    'Stretch' => true,
                    'Key' => 'WHDocumentsFindTreb_Index_CmbAddressGrid',
                    'ModelName' => 'ListObjects',
                    'ShowFilters' => false,
                    'ShowPager' => false,
                    'Height' => 300,
                    'Width' => 400,
                    'PopupWidth' => 500,
                    'KeyField' => 'Object_id',
                    'KeyValue' => $objc_id,
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
    <div style="float: left;">
        <div style="width: 290px; margin-left: 6px">
            <div style="float: left; width: 130px;">Дата документа с</div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateStart',
                        'Name' => '',
                        'Width' => 160,
                        'Value' => null,
                        'ReadOnly' => false,
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both"></div>
        <div style="width: 290px; float: left; margin-left: 6px; margin-top: 6px">
            <div style="float: left; width: 130px">по</div>
            <div style="float: left">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateEnd',
                        'Name' => '',
                        'Width' => 160,
                        'Value' => null,
                        'ReadOnly' => false,
                    ));
                ?>
            </div>
        </div>
    </div>
    <div style="float: left; margin-left: 12px"> 
        <div style="float: left; width: 50px">Номер</div>
        <div style="float: left">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                        'id' => 'edNumber',
                        'Width' => 150,
                        'Type' => 'Number',
                ));
            ?>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div style="float: left; margin-top: 12px">
    <?php
	$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
		'id'=>'WHDocumentsFindTrebGrid',
		'Width' => 1000,
		'Height' => 300,
                'ShowFilters' => true,
		'Stretch' => false,
		'ModelName' => 'WHDocuments_FindTreb_v',
		'Key' => 'WHDocumentsFindTreb_Index_WHDocumentsFindTrebGrid',
                'Columns' => array(
                    'Number' => array(
                            'Name' => 'Номер',
                            'FieldName' => 'number',
                            'Width' => 120,
                    ),
                    'Date' => array(
                            'Name' => 'Дата',
                            'FieldName' => 'date',
                            'Width' => 130,
                            'Format' => 'd.m.Y H:i',
                    ),
                    'DateCreate' => array(
                            'Name' => 'Дата создания',
                            'FieldName' => 'date_create',
                            'Width' => 130,
                            'Format' => 'd.m.Y H:i',
                    ),
                    'PrtyName' => array(
                            'Name' => 'Срочность',
                            'FieldName' => 'prty_name',
                            'Width' => 120,
                    ),
                    'StatusFull' => array(
                            'Name' => 'Статус',
                            'FieldName' => 'StatusFull',
                            'Width' => 120,
                    ),
                    'Address' => array(
                            'Name' => 'Адрес',
                            'FieldName' => 'Address',
                            'Width' => 120,
                    ),
                    'wrtp_name' => array(
                            'Name' => 'Вид работ',
                            'FieldName' => 'wrtp_name',
                            'Width' => 120,
                    ),
                    'AcDate' => array(
                            'Name' => 'Дата выдачи',
                            'FieldName' => 'ac_date',
                            'Width' => 130,
                            'Format' => 'd.m.Y H:i',
                    ),
                    'StrmName' => array(
                            'Name' => 'Кладовщик',
                            'FieldName' => 'strm_name',
                            'Width' => 120,
                    ),
                    'MstrName' => array(
                            'Name' => 'Кому',
                            'FieldName' => 'mstr_name',
                            'Width' => 120,
                    ),
                    'BestDate' => array(
                            'Name' => 'Желаемая дата выдачи',
                            'FieldName' => 'best_date',
                            'Width' => 130,
                            'Format' => 'd.m.Y H:i',
                    ),
                    'Deadline' => array(
                            'Name' => 'Предельная дата',
                            'FieldName' => 'deadline',
                            'Width' => 130,
                            'Format' => 'd.m.Y H:i',
                    ),
                    /*
                    'Note' => array(
                            'Name' => 'Примечание',
                            'FieldName' => 'note',
                            'Width' => 120,
                    ),
                    */
                ),
        ));
    ?>
</div>
<div style="clear: both"></div>
<div style="margin-top: 12px">
    <div>Примечание</div>
    <div>
        <?php
            $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                'id' => 'edNoteTreb',
                'Width' => 1000,
                'Height' => 50,
                'Type' => 'String',
                'ReadOnly' => true,
            ));
        ?>
    </div>
</div>
<div style="margin-top: 12px">
    <?php
	$this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
		'id'=>'WHDocumentsFindTrebEquipsGrid',
		'Width' => 1000,
		'Height' => 150,
                'ShowFilters' => true,
		'Stretch' => false,
		'ModelName' => 'DocmAchsDetails',
		'Key' => 'WHDocumentsFindTreb_Index_WHDocumentsFindTrebEquipsGrid',
                'Columns' => array(
                    'EquipName' => array(
                            'Name' => 'Оборудование',
                            'FieldName' => 'EquipName',
                            'Width' => 220,
                    ),
                    'NameUnitMeasurement' => array(
                            'Name' => 'Ед. изм.',
                            'FieldName' => 'NameUnitMeasurement',
                            'Width' => 60,
                    ),
                    'quant' => array(
                            'Name' => 'Кол-во',
                            'FieldName' => 'quant',
                            'Width' => 60,
                    ),
                    'used' => array(
                            'Name' => 'Б\У',
                            'FieldName' => 'used',
                            'Width' => 60,
                    ),
                )
        ));
    ?>
</div>



<div style="margin-top: 12px">
    <?php
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'Treb',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
            'action' => $this->createUrl('WhActs/AddTreb', array('docm_id' => $docm_id)),
            'enableAjaxValidation' => true,
            'enableClientValidation' => true,
        )); 

    ?>
    
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edDocm_id',
            'Width' => 200,
            'Type' => 'String',
            'Name' => 'Treb[docm_id]',
            'ReadOnly' => true,
            'Visible' => false
        ));
    ?>
    
    <?php
        $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
            'id' => 'edAct_id',
            'Width' => 200,
            'Type' => 'String',
            'Name' => 'Treb[act_id]',
            'Value' => $docm_id,
            'ReadOnly' => true,
            'Visible' => false
        ));
    ?>
    
    
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'SelectTreb',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Выбрать',
            'FormName' => 'Treb',
            'Type' => 'Form',
            'Href' => Yii::app()->createUrl('WhActs/AddTreb', array('docm_id' => $docm_id)),
        ));
    ?>
    
    <?php $this->endWidget(); ?>
</div>



