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

            var DS = new Date();
            var DE = new Date();
            DS.setMonth(DS.getMonth() - 1);
            
            $("#edMaster").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, multiSelect: true, width: '290', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}));
            $("#edDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DS, width: 110, formatString: 'dd.MM.yyyy', showCalendarButton: true }));
            $("#edDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: DE, width: 110, formatString: 'dd.MM.yyyy', showCalendarButton: true }));
            $("#edWHDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, width: 110, formatString: 'dd.MM.yyyy', showCalendarButton: true }));
            $("#edWHDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, width: 110, formatString: 'dd.MM.yyyy', showCalendarButton: true }));
            $("#edWHBuhDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, width: 110, formatString: 'dd.MM.yyyy', showCalendarButton: true }));
            $("#edWHBuhDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: null, width: 110, formatString: 'dd.MM.yyyy', showCalendarButton: true }));
            
            
            $("#edMaster").on('change', function (event) {
                var items = $("#edMaster").jqxComboBox('getSelectedItems');
                var selectedItems = "";
                $.each(items, function (index) {
                    selectedItems += "#" +  this.value + "#";
                    if (items.length - 1 != index) {
                        selectedItems += ", ";
                    }
                });
                
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
        <div class="al-row">
            <div class="row-column" style="width: 130px">Сотрудники:</div>
            <div class="row-column"><div id="edMaster" ></div></div>
            <input hidden="" type="hidden" name="Parameters[Empl]" id="edParam"/>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 150px;">Выполнение заявки в период с</div>
            <div class="al-row-column"><div name="Parameters[DateStart]" id="edDateStart"></div></div>
            <div class="al-row-column" >по</div>
            <div class="al-row-column"><div name="Parameters[DateEnd]" id="edDateEnd"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 150px;">Внутренний акт</div>
            <div class="al-row-column"><div name="Parameters[WHDateStart]" id="edWHDateStart"></div></div>
            <div class="al-row-column" >по</div>
            <div class="al-row-column"><div name="Parameters[WHDateEnd]" id="edWHDateEnd"></div></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-row-column" style="width: 150px;">Бухг. акт</div>
            <div class="al-row-column"><div name="Parameters[WHBuhDateStart]" id="edWHBuhDateStart"></div></div>
            <div class="al-row-column" >по</div>
            <div class="al-row-column"><div name="Parameters[WHBuhDateEnd]" id="edWHBuhDateEnd"></div></div>
            <div style="clear: both"></div>
        </div>

        <div style="clear: both; margin-top: 10px;"></div>
        
<?php        
        $this->endWidget();
    }
    
    echo '<div id="res_cont">' . $ResultHtml . '</div>';
?>



