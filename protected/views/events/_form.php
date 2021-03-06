<script type="text/javascript">
    $(document).ready(function () {
        
        var EventTypeDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceEventTypes));
        $("#EventType").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EventTypeDataAdapter, displayMember: "EventType", valueMember: "evtp_id", width: 250 }));
        
        var PeriodsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePeriods));
        $("#Periods").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: PeriodsDataAdapter, displayMember: "periodname", valueMember: "code", width: 180, autoDropDownHeight: true }));
        
        var EmployeeDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees));
        $("#Employee").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: EmployeeDataAdapter, displayMember: "ShortName", valueMember: "Employee_id", width: 230 }));
        
        var currentDate = new Date();
        var currentYear = currentDate.getFullYear();
        $("#datestart").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: new Date(currentYear + '/01/01') }));
        $("#dateend").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 117, formatString: 'dd.MM.yyyy', value: new Date(currentYear + '/12/31') }));

        $('#btnSaveEvents').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelEvents').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelEvents').on('click', function(){
            $('#EventsDialog').jqxWindow('close');
        });
        
        $('#btnSaveEvents').on('click', function(){
            var rowindexes = $('#EventsClientsGrid').jqxGrid('getselectedrowindexes');
            
            for (var i = 0; i < rowindexes.length; i++)
            {
                var rowindex = rowindexes[i];
                $.ajax({
                    url: <?php echo json_encode(Yii::app()->createUrl('Events/Create')); ?>,
                    data:  $('#Events').serialize() + '&Events[ObjectGr_id]=' + EventsClientsDataAdapter.records[rowindex]['ObjectGr_id'],
                    type: 'POST',
                    async: false,
                    success: function(Res) {
                        var Res = JSON.parse(Res);
                        if (Res.result == 1) {
//                            Aliton.SelectRowById('Evnt_id', Res.id, '#EventsGrid', true);
                            $('#EventsDialog').jqxWindow('close');
                            if (i == (rowindexes.length - 1)) {
                                if (checked) {
//                                    $("#edFiltering").click();
                                }
                            }
                        }
                        else {
                            $('#BodyEventsDialog').html(Res.html);
                        };
                    },
                    error: function(Res) {
                        Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                    }
                });
            }
            $("#edFiltering").click();
        });
        
        
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'Events',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    ));
?>

<div class="row">
    <div class="row-column">Направление:</div>
    <div class="row-column"><div id="EventType" name="Events[Evtp_id]"></div><?php // echo $form->error($model, 'evtp_id'); ?></div>
</div>

<div class="row">
    <div class="row-column">Интервал:</div>
    <div class="row-column"><div id="Periods" name="Events[Prds_id]"></div></div>
</div>

<div class="row">
    <div class="row-column">Исполнитель:</div>
    <div class="row-column"><div id="Employee" name="Events[Empl_id]"></div><?php // echo $form->error($model, 'empl_id'); ?></div>
</div>

<div class="row"> 
    <div class="row-column">Период с: </div>
    <div class="row-column"><div id="datestart" name="Events[datestart]"></div></div>
    <div class="row-column">по: </div>
    <div class="row-column"><div id="dateend" name="Events[dateend]"></div></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveEvents'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelEvents'/></div>
</div>
<?php $this->endWidget(); ?>



