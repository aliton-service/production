<script>
    $(document).ready(function () {
        
        var DiaryActionsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDiaryActions, {
            filter: function () {
                $("#ActionsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ActionsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
                var Filters = [];
                Filters[0] = "isNull(d.StatusOP, 0) <> 1 and er.NextDate <> '01.01.2999'";
                        
                $.extend(data, {
                    Filters: Filters,
                });
                return data;
            },
        });
        
        var ReservDiaryActionsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceDiaryActions, {
            filter: function () {
                $("#ReservActionsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ReservActionsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
                $.extend(data, {
                    Filters: ["(isNull(d.StatusOP, 0) = 1 or er.NextDate = '01.01.2999' )"],
                });
                return data;
            },
        });
        
        var ValuableInstructionsAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceValuableInstructions, {
            filter: function () {
                $("#ValuableInstructionsGrid").jqxGrid('updatebounddata', 'filter');
            },
            sort: function () {
                $("#ValuableInstructionsGrid").jqxGrid('updatebounddata', 'sort');
            },
            beforeSend: function(jqXHR, settings) {
                //DisabledControls();
            }
        }), {
            formatData: function (data) {
//                $.extend(data, {
//                    Filters: ["isNull(d.StatusOP, 0) = 1"],
//                });
                return data;
            },
        });
        
        var DataDemandTypes;
        var DataActionStages;
        var DataClientGroups;
        
        $.ajax({
            url: <?php echo json_encode(Yii::app()->createUrl('AjaxData/DataJQXSimpleList'))?>,
            type: 'POST',
            async: false,
            data: {
                Models: ['DTypes', 'ActionStages', 'ClientGroups']
            },
            success: function(Res) {
                Res = JSON.parse(Res);
                DataDemandTypes = Res[0].Data;
                DataActionStages = Res[1].Data;
                DataClientGroups = Res[2].Data;
            }
        });
        
        $("#chbFilterNotExec").jqxCheckBox({ width: 160, height: 25}); // Фильтр непереданные
        $("#cmbFilterDemandType").jqxComboBox({ source: DataDemandTypes, width: 'calc(100% - 2px)', height: '25px', displayMember: "DemandType", valueMember: "DemandType_id"}); // Фильтр тип заявки
        $("#cmbFilterStage").jqxComboBox({ source: DataActionStages, width: 'calc(100% - 2px)', height: '25px', displayMember: "StageName", valueMember: "Stage_id"}); // Фильтр тип заявки
        $("#cmbFilterState").jqxComboBox({ source: [{id: 1, state: 'Холодный'}, {id: 2, state: 'Теплый'}, {id: 3, state: 'Горячий'}], width: 'calc(100% - 2px)', height: '25px', displayMember: "state", valueMember: "id"}); // Фильтр тип заявки
        $("#cmbFilterSegment").jqxComboBox({ source: DataClientGroups, width: 'calc(100% - 2px)', height: '25px', displayMember: "ClientGroup", valueMember: "clgr_id"}); // Фильтр тип заявки
        $("#cmbFilterSubSegment").jqxComboBox({ source: DataClientGroups, width: 'calc(100% - 2px)', height: '25px', displayMember: "ClientGroup", valueMember: "clgr_id"}); // Фильтр тип заявки
        $("#cmbFilterDateStart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '140px', formatString: 'dd.MM.yyyy', value: null, dropDownVerticalAlignment: 'top' })); // Фильтр дата рег
        $("#cmbFilterDateEnd").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: '140px', formatString: 'dd.MM.yyyy', value: null, dropDownVerticalAlignment: 'top' })); // Фильтр дата рег
        
        $('#edFiltering').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        $('#edFiltering').on('click', function(){
            Find();
        });
        
        $('#GroupFilters').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                if ($('#ActionsGrid').jqxGrid('isBindingCompleted')) 
                    Find();
                return false;
            }
        });
        
        var Find = function() {
            var ExecutorFilterGroup = new $.jqx.filter();
            if ($("#cmbExecutor").val() != '') {
                var FilterExecutor = ExecutorFilterGroup.createfilter('stringfilter', $("#cmbExecutor").val(), 'STR_EQUAL');
                ExecutorFilterGroup.addfilter(1, FilterExecutor);
            }
            
            var DateFilterGroup = new $.jqx.filter();
            if ($("#chbFilterNotExec").val() != '') {
                var D = new Date(); 
                var DSTR = D.getDate() + "." + (D.getMonth()+1) + "." + D.getFullYear();

                var FilterDate = DateFilterGroup.createfilter('datefilter', DSTR, 'DATE_LESS_THAN');
                DateFilterGroup.addfilter(1, FilterDate);
            }
            
            var selectedItem = $('#Tabs').jqxTabs('selectedItem'); 
            
            var DemandTypeFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterDemandType").val() != '') {
                var FilterDemandType = DemandTypeFilterGroup.createfilter('numericfilter', $("#cmbFilterDemandType").val(), 'EQUAL');
                DemandTypeFilterGroup.addfilter(1, FilterDemandType);
            }

            var StageFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterStage").val() != '') {
                var FilterStage = StageFilterGroup.createfilter('numericfilter', $("#cmbFilterStage").val(), 'EQUAL');
                StageFilterGroup.addfilter(1, FilterStage);
            }

            var StateFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterState").val() != '') {
                var FilterState = StateFilterGroup.createfilter('numericfilter', $("#cmbFilterState").val(), 'EQUAL');
                StateFilterGroup.addfilter(1, FilterState);
            }

            var SegmentFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterSegment").val() != '') {
                var FilterSegment = SegmentFilterGroup.createfilter('numericfilter', $("#cmbFilterSegment").val(), 'EQUAL');
                SegmentFilterGroup.addfilter(1, FilterSegment);
            }

            var SubSegmentFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterSubSegment").val() != '') {
                var FilterSubSegment = SubSegmentFilterGroup.createfilter('numericfilter', $("#cmbFilterSubSegment").val(), 'EQUAL');
                SubSegmentFilterGroup.addfilter(1, FilterSubSegment);
            }

            var DateFilterGroup = new $.jqx.filter();
            if ($("#cmbFilterDateStart").val() != '') {
                var FilterDateStart = DateFilterGroup.createfilter('datefilter', $("#cmbFilterDateStart").val(), 'DATE_GREATER_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateStart);
            }
            if ($("#cmbFilterDateEnd").val() != '') {
                var FilterDateEnd = DateFilterGroup.createfilter('datefilter', $("#cmbFilterDateEnd").val(), 'DATE_LESS_THAN_OR_EQUAL');   
                DateFilterGroup.addfilter(1, FilterDateEnd);
            }
            
            switch (selectedItem) {
                case 0:
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'ResponsibleName', false);
                    if ($("#cmbExecutor").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'ResponsibleName', ExecutorFilterGroup);
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'NextDate', false);
                    if ($("#chbFilterNotExec").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'NextDate', DateFilterGroup);
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'DemandType', false);
                    if ($("#cmbFilterDemandType").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'DemandType', DemandTypeFilterGroup);
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'StageName', false);
                    if ($("#cmbFilterStage").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'StageName', StageFilterGroup);
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'StatusOP', false);
                    if ($("#cmbFilterState").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'StatusOP', StateFilterGroup);
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'SegmentName', false);
                    if ($("#cmbFilterSegment").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'SegmentName', SegmentFilterGroup);
                    
                    $('#ActionsGrid').jqxGrid('removefilter', 'SubSegmentName', false);
                    if ($("#cmbFilterSubSegment").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'SubSegmentName', SubSegmentFilterGroup);
                    
                    if ($("#chbFilterNotExec").val() == '') $('#ActionsGrid').jqxGrid('removefilter', 'NextDate', false);
                    if ($("#cmbFilterDateStart").val() != '' || $("#cmbFilterDateEnd").val() != '') $("#ActionsGrid").jqxGrid('addfilter', 'NextDate', DateFilterGroup);
                    
                    $('#ActionsGrid').jqxGrid({source: DiaryActionsAdapter});
                    break;
                case 1:
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'ResponsibleName', false);
                    if ($("#cmbExecutor").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'ResponsibleName', ExecutorFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'NextDate', false);
                    if ($("#chbFilterNotExec").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'NextDate', DateFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'DemandType', false);
                    if ($("#cmbFilterDemandType").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'DemandType', DemandTypeFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'StageName', false);
                    if ($("#cmbFilterStage").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'StageName', StageFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'StatusOP', false);
                    if ($("#cmbFilterState").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'StatusOP', StateFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'SegmentName', false);
                    if ($("#cmbFilterSegment").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'SegmentName', SegmentFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid('removefilter', 'SubSegmentName', false);
                    if ($("#cmbFilterSubSegment").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'SubSegmentName', SubSegmentFilterGroup);
                    
                    if ($("#chbFilterNotExec").val() == '') $('#ReservActionsGrid').jqxGrid('removefilter', 'NextDate', false);
                    if ($("#cmbFilterDateStart").val() != '' || $("#cmbFilterDateEnd").val() != '') $("#ReservActionsGrid").jqxGrid('addfilter', 'NextDate', DateFilterGroup);
                    
                    $('#ReservActionsGrid').jqxGrid({source: ReservDiaryActionsAdapter});
                    break;
                case 2:
                    $('#ValuableInstructionsGrid').jqxGrid('removefilter', 'ShortName', false);
                    if ($("#cmbExecutor").val() != '') $("#ValuableInstructionsGrid").jqxGrid('addfilter', 'ShortName', ExecutorFilterGroup);
                    
                    $('#ValuableInstructionsGrid').jqxGrid({source: ValuableInstructionsAdapter});
                    break;
            };
            
            
                
            Statistics.Refresh();
        };
        Find();
    });
</script>    

<div id="GroupFilters">
    <div class="al-row">
        <div id='chbFilterNotExec' style="color: white;">Невыполненных</div>    
        
    </div>
    <div class="al-row">
        <div>Тип заявки</div>
        <div><div id='cmbFilterDemandType'></div></div>
    </div>
    <div class="al-row">
        <div>Этап</div>
        <div><div id='cmbFilterStage'></div></div>
    </div>
    <div class="al-row">
        <div>Статус ОП</div>
        <div><div id='cmbFilterState'></div></div>
    </div>
    <div class="al-row">
        <div>Сегмент</div>
        <div><div id='cmbFilterSegment'></div></div>
    </div>
    <div class="al-row">
        <div>ПОДСегмент</div>
        <div><div id='cmbFilterSubSegment'></div></div>
    </div>
    <div class="al-row">
        <div>Период с</div>
        <div><div id='cmbFilterDateStart'></div></div>
    </div>
    <div class="al-row">
        <div>по</div>
        <div><div id='cmbFilterDateEnd'></div></div>
    </div>
    <div class="al-row">
        <input type="button" value="Фильтр" id="edFiltering"/>
    </div>
</div>    

