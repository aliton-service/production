<script>
    $(document).ready(function () {
        
        var DemandsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceClientDemands, {
            filter: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#DemandsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["og.PropForm_id = " + Form_id],
                });
                return data;
            },
        });
        
        var DataEmployees;
        var DataDemandTypes;
        var DataActionStages;
        var DataContactTypes;
        var DataOperation;
        var DataResult;
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['ListEmployees', 'DTypes', 'ActionStages', 'ContactTypes', 'ActionOperations', 'ActionResults']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataEmployees = Res[0].Data;
                DataDemandTypes = Res[1].Data;
                DataActionStages = Res[2].Data;
                DataContactTypes = Res[3].Data;
                DataOperation = Res[4].Data;
                DataResult = Res[5].Data;
            }
        });
        
        $("#edFilterDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '140px', formatString: 'dd.MM.yyyy', value: null })); // Фильтр дата регистрации
        $("#edFilterDemand_id").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 2px)', minLength: 1})); // Фильтр номер
        $("#edFilterAddr").jqxInput($.extend(true, {}, InputDefaultSettings, {height: 25, width: 'calc(100% - 2px)', minLength: 1})); // Фильтр номер
        $("#cmbFilterDemandType").jqxComboBox({ source: DataDemandTypes, width: '200', height: '25px', displayMember: "DemandType", valueMember: "DemandType_id"}); // Фильтр тип заявки
        $("#cmbFilterActionStages").jqxComboBox({ source: DataActionStages, width: '200', height: '25px', displayMember: "StageName", valueMember: "Stage_id"}); // Фильтр тип заявки
        $("#cmbFilterContactType").jqxComboBox({ source: DataContactTypes, width: '200', height: '25px', displayMember: "ContactName", valueMember: "Contact_id"}); // Фильтр тип заявки
        $("#cmbFilterOperation").jqxComboBox({ source: DataOperation, width: '200', height: '25px', displayMember: "ActionOperationName", valueMember: "Operation_id"}); // Фильтр тип заявки
        $("#cmbFilterAdmin").jqxComboBox({ source: DataEmployees, width: '200', height: '25px', displayMember: "ShortName", valueMember: "Employee_id"}); // Фильтр тип заявки
        $("#cmbFilterResult").jqxComboBox({ source: DataResult, width: 'calc(100% - 2px)', height: '25px', displayMember: "ActionResultName", valueMember: "Result_id"}); // Фильтр тип заявки
        $("#cmbFilterNextDate").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '140px', formatString: 'dd.MM.yyyy', value: null })); // Фильтр дата регистрации
        
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        $('#GroupFilters').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                if ($('#DemandsGrid').jqxGrid('isBindingCompleted')) 
                    Find();
                return false;
            }
        });
        
        var Find = function() {
            var DateRegFilterGroup = new $.jqx.filter();
            if ($("#edFilterDate").val() != '') {
                var FilterDateExec = DateRegFilterGroup.createfilter('datefilter', $("#edFilterDate").val(), 'DATE_EQUAL');   
                DateRegFilterGroup.addfilter(1, FilterDateExec);
            }
            
            var NumberFilterGroup = new $.jqx.filter();
            if ($("#edFilterDemand_id").val() != '') {
                var FilterNumber = NumberFilterGroup.createfilter('numericfilter', $("#edFilterDemand_id").val(), 'EQUAL');
                NumberFilterGroup.addfilter(1, FilterNumber);
            }
            
            var AddressFilterGroup = new $.jqx.filter();
            if ($("#edFilterAddr").val() != '') {
                var FilterAddress = AddressFilterGroup.createfilter('stringfilter', $("#edFilterAddr").val(), 'CONTAINS');
                AddressFilterGroup.addfilter(1, FilterAddress);
            }
            
            var DemandTypeFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterDemandType").val() != '') {
                var FilterDemandType = DemandTypeFilterGroup.createfilter('numericfilter', $("#cmbFilterDemandType").val(), 'EQUAL');
                DemandTypeFilterGroup.addfilter(1, FilterDemandType);
            }
            
            var StageFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterActionStages").val() != '') {
                var FilterStage = StageFilterGroup.createfilter('numericfilter', $("#cmbFilterActionStages").val(), 'EQUAL');
                StageFilterGroup.addfilter(1, FilterStage);
            }
            
            var ContactTypeFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterContactType").val() != '') {
                var FilterContactType = ContactTypeFilterGroup.createfilter('numericfilter', $("#cmbFilterContactType").val(), 'EQUAL');
                ContactTypeFilterGroup.addfilter(1, FilterContactType);
            }
            
            var OpeartionFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterOperation").val() != '') {
                var FilterOperation = OpeartionFilterGroup.createfilter('numericfilter', $("#cmbFilterOperation").val(), 'EQUAL');
                OpeartionFilterGroup.addfilter(1, FilterOperation);
            }
            
            var AdminFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterAdmin").val() != '') {
                var FilterAdmin = AdminFilterGroup.createfilter('numericfilter', $("#cmbFilterAdmin").val(), 'EQUAL');
                AdminFilterGroup.addfilter(1, FilterAdmin);
            }
            
            var ResultFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterResult").val() != '') {
                var FilterResult = ResultFilterGroup.createfilter('numericfilter', $("#cmbFilterResult").val(), 'EQUAL');
                ResultFilterGroup.addfilter(1, FilterResult);
            }
            
            var NextDateFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterNextDate").val() != '') {
                var FilterNextDate = NextDateFilterGroup.createfilter('datefilter', $("#cmbFilterNextDate").val(), 'DATE_EQUAL');   
                NextDateFilterGroup.addfilter(1, FilterNextDate);
            }
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Date', false);
            if ($("#edFilterDate").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Date', DateRegFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Demand_id', false);
            if ($("#edFilterDemand_id").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Demand_id', NumberFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'Address', false);
            if ($("#edFilterAddr").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'Address', AddressFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'DemandType', false);
            if ($("#cmbFilterDemandType").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'DemandType', DemandTypeFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'StageName', false);
            if ($("#cmbFilterActionStages").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'StageName', StageFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'ContactName', false);
            if ($("#cmbFilterContactType").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'ContactName', ContactTypeFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'ActionOperationName', false);
            if ($("#cmbFilterOperation").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'ActionOperationName', OpeartionFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'EmplName', false);
            if ($("#cmbFilterAdmin").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'EmplName', AdminFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'ActionResultName', false);
            if ($("#cmbFilterResult").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'ActionResultName', ResultFilterGroup);
            
            $('#DemandsGrid').jqxGrid('removefilter', 'NextDate', false);
            if ($("#cmbFilterNextDate").val() != '') $("#DemandsGrid").jqxGrid('addfilter', 'NextDate', NextDateFilterGroup);
            
            $('#DemandsGrid').jqxGrid({source: DemandsAdapter});
        };
        Find();
    });
</script>    

<div id="GroupFilters">
    <div class="al-row">
        <div>Дата</div>
        <div><div id='edFilterDate'></div></div>
    </div>
    <div class="al-row">
        <div>Номер</div>
        <div><input id="edFilterDemand_id" type="text"/></div>
    </div>
    <div class="al-row">
        <div>Адрес </div>
        <div><input id="edFilterAddr" type="text"/></div>
    </div>
    <div class="al-row">
        <div>Тип заявки</div>
        <div id='cmbFilterDemandType'</div>
    </div>
    <div class="al-row">
        <div>Этап</div>
        <div id='cmbFilterActionStages'</div>
    </div>
    <div class="al-row">
        <div>Тип контакта</div>
        <div id='cmbFilterContactType'</div>
    </div>
    <div class="al-row">
        <div>Действие</div>
        <div id='cmbFilterOperation'</div>
    </div>
    <div class="al-row">
        <div>Администрирующий</div>
        <div id='cmbFilterAdmin'</div>
    </div>
    <div class="al-row">
        <div>Результат</div>
        <div id='cmbFilterResult'</div>
    </div>
    <div class="al-row">
        <div>План. дейсвие</div>
        <div id='cmbFilterNextDate'</div>
    </div>
    <div class="al-row">
        <input type="button" value="Фильтр" id="edFiltering"/>
    </div>
</div>    

