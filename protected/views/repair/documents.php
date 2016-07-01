<script>
    function CreateActDefectations() {
        
        $.ajax({
            url: '/index.php?r=Repair/CreateActDefectations' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function CreateRepairSRM() {
        
        $.ajax({
            url: '/index.php?r=Repair/CreateRepairSRM' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function CreateRepairWarrantys() {
        
        $.ajax({
            url: '/index.php?r=Repair/CreateRepairWarrantys' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function CreateRepairUtil() {
        
        $.ajax({
            url: '/index.php?r=Repair/CreateRepairUtil' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    
    function CreateWHDocType2() {
        
        $.ajax({
            url: '/index.php?r=Repair/CreateWHDocType2' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function CreateBtnWHAct() {
        $.ajax({
            url: '/index.php?r=Repair/CreateBtnWHAct' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function CreateBtnWHDocType7() {
        
        $.ajax({
            url: '/index.php?r=Repair/CreateWHDocType7' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function CreateBtnWHDocType9() {
        $.ajax({
            url: '/index.php?r=Repair/CreateWHDocType9' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    
    function OpenDocument() {
        if (algridajaxSettings['RepairDocumentsGrid'].CurrentRow !== null)
            if (algridajaxSettings['RepairDocumentsGrid'].CurrentRow['DocType_id'] == 1) {
                window.open("<?php echo Yii::app()->createUrl('RepairActDefectations/Update')?>" + "&Docm_id=" + algridajaxSettings['RepairDocumentsGrid'].CurrentRow['Docm_id']);
            }
            if (algridajaxSettings['RepairDocumentsGrid'].CurrentRow['DocType_id'] == 4) {
                window.open("<?php echo Yii::app()->createUrl('RepairSRM/Update')?>" + "&Docm_id=" + algridajaxSettings['RepairDocumentsGrid'].CurrentRow['Docm_id']);
            }
            if (algridajaxSettings['RepairDocumentsGrid'].CurrentRow['DocType_id'] == 5) {
                window.open("<?php echo Yii::app()->createUrl('RepairWarrantys/Update')?>" + "&Docm_id=" + algridajaxSettings['RepairDocumentsGrid'].CurrentRow['Docm_id']);
            }
            if (algridajaxSettings['RepairDocumentsGrid'].CurrentRow['DocType_id'] == 6) {
                window.open("<?php echo Yii::app()->createUrl('RepairUtilizations/Update')?>" + "&Docm_id=" + algridajaxSettings['RepairDocumentsGrid'].CurrentRow['Docm_id']);
            }
    };
    
    function CostCalc() {
        $.ajax({
            url: '/index.php?r=Repair/CreateCostCalc' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function NewPackDoc() {
        $.ajax({
            url: '/index.php?r=Repair/CreateDocuments' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    };
    
    function Monitoring() {
        $.ajax({
            url: '/index.php?r=Repair/Monitoring' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                $("#RepairDocumentsGrid").algridajax("Load");
            }
        });
    }
    
    function NewDoc() {
        var Operations = [
            '', // 0
            'CreateActDefectations();', // 1
            'Monitoring();', // 2
            'CostCalc();', // 3
            'CreateRepairSRM();', // 4
            'CreateRepairWarrantys();', // 5
            'CreateRepairUtil();', // 6
            'CreateBtnWHDocType9();', // 7
            'CreateBtnWHAct();', // 8
            'CreateBtnWHDocType7();', // 9
        ];
        
        if (alcomboboxajaxSettings["cmbRepDocType"].CurrentRow != null) {
            var ID = alcomboboxajaxSettings["cmbRepDocType"].CurrentRow['ID'];
            eval(Operations[ID]);
        }
        
    };
        
</script>

<div style="float: left; width: 100%">
        <?php
            $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
                'id' => 'RepairDocumentsGrid',
                'Stretch' => true,
                'Key' => 'RepairDocuments_Index_RepairDocumentsGrid',
                'ModelName' => 'RepairDocuments',
                'ShowFilters' => true,
                'Height' => 200,
                'Width' => 500,
                'OnDblClick' => 'OpenDocument();',
                'Filters' => array(
                    array(
                        'Type' => 'Internal',
                        'Control' => 'Form',
                        'Condition' => '#' . $Repr_id,
                        'Value' => '\'' . $Repr_id . '\'',
                        'Name' => 'Form',
                    ),
                ),
                'Columns' => array(
                    'DocType' => array(
                        'Name' => 'Тип документа',
                        'FieldName' => 'DocType',
                        'Width' => 130,
                        'Filter' => array(
                            'Condition' => "d.DocType like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'd.DocType desc',
                            'Down' => 'd.DocType',
                        ),
                    ),
                    'Status' => array(
                        'Name' => 'Статус',
                        'FieldName' => 'Status',
                        'Width' => 130,
                        'Filter' => array(
                            'Condition' => "d.Status like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'd.Status desc',
                            'Down' => 'd.StatusName',
                        ),
                    ),
                    'Number' => array(
                        'Name' => 'Номер',
                        'FieldName' => 'Number',
                        'Width' => 80,
                        'Filter' => array(
                            'Condition' => "d.Number like ':Value%'",
                        ),
                        'Sort' => array(
                            'Up' => 'd.Number desc',
                            'Down' => 'd.Number',
                        ),
                    ),
                ),
            ));
        ?>
</div>
<div style="clear: both"></div>
<div style="clear: both; margin-top: 8px"></div>
<div style="float: left; ">
<?php
    $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
            'id' => 'cmbRepDocType',
            'ModelName' => 'RepairDocTypes',
            'FieldName' => 'DocName',
            'KeyField' => 'ID',
            'Type' => array(
                    'Mode' => 'Filter',
                    'Condition' => "dt.DocName like ':Value%'",
                
            ),
            'Width' => 300,
            'Columns' => array(
                    'DocName' => array(
                            'Name' => 'Тип документа',
                            'Width' => 240,
                            'FieldName' => 'DocName',
                    ),
            ),
    ));

?>
</div>    

<div style="float: left; ">
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'NewDoc',
                    'Width' => 184,
                    'Height' => 34,
                    'Text' => 'Создать документ',
                    'Type' => 'None',
                    'OnAfterClick' => 'NewDoc();',
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 12px;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'NewPack',
                    'Width' => 234,
                    'Height' => 34,
                    'Text' => 'Создать пакет документов',
                    'Type' => 'None',
                    'OnAfterClick' => 'NewPackDoc();',
            ));
        ?>
    </div>
</div>

<div style="clear: both"></div>