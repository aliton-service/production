<script>
    var Ajax = '<?php echo $Ajax ?>';
    
    $(document).ready(function(){
        if (Ajax == '') {
            var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
            DataEmployees.dataBind();
            DataEmployees = DataEmployees.records;
//            DataEmployees.push({
//                Employee_id: 0,
//                Employee_id_For_Demands: '#0',
//                EmployeeName: 'Все',
//                ShortName: 'Все'
//                
//            });
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, multiSelect: true, width: '290', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
            
            $("#edMaster").on('change', function (event) {
                var items = $("#edMaster").jqxComboBox('getSelectedItems');
                var selectedItems = "";
                $.each(items, function (index) {
                    selectedItems += "#" +  this.value + "#";
                    if (items.length - 1 != index) {
                        selectedItems += ", ";
                    }
                });
                
                console.log(selectedItems);
                $("#edParam").val(selectedItems);
            });
            $("#edMaster").jqxComboBox('selectIndex', 0 );
        }
    });
</script>    

<?php
    $this->ReportName = $ReportName;
?>
<?php
    if (!$Ajax) {
        $this->beginWidget('CActiveForm', array(
            'id' => 'Parameters',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
        ));
?>        
        <div class="row">
            <div class="row-column" style="width: 130px">Сотрудники:</div>
            <div class="row-column"><div id="edMaster" ></div></div>
            <input hidden="" type="hidden" name="Parameters[prmEmployees]" id="edParam"/>
        </div>
        
        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



