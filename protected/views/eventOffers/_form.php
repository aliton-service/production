<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var EventOffers = {
            code: <?php echo json_encode($model->code); ?>,
            evnt_id: <?php echo json_encode($model->evnt_id); ?>,
            oftp_id: <?php echo json_encode($model->oftp_id); ?>,
            note: <?php echo json_encode($model->note); ?>,
            situation: <?php echo json_encode($model->situation); ?>,
            rslt_id: <?php echo json_encode($model->rslt_id); ?>,
        };
        
        var OfferTypesDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOfferTypes));
        $("#OfferTypes").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: OfferTypesDataAdapter, displayMember: "offertype", valueMember: "code", width: 350 }));
        
        $("#note2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 550, height: 110 }));
        $("#situation2").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, { width: 550, height: 110 }));
        
        var OfferResultsDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceOfferResults));
        $("#OfferResults").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: OfferResultsDataAdapter, displayMember: "ResultName", valueMember: "rslt_id", width: 340, autoDropDownHeight: true }));
        
        
        $('#btnSaveEventOffers').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        $('#btnCancelEventOffers').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelEventOffers').on('click', function(){
            $('#EventOffersDialog').jqxWindow('close');
        });
        
        $('#btnSaveEventOffers').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('EventOffers/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('EventOffers/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#EventOffers').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if ($("#EventOffersGrid").length>0) {
                            Aliton.SelectRowById('evnt_id', Res.id, '#EventOffersGrid', true);
                            $('#EventOffersDialog').jqxWindow('close');
                            $("#EventOffersDialog").on("bindingcomplete", function () {
                                $('#EventOffersGrid').jqxGrid('updatebounddata');
                                $('#EventOffersGrid').jqxGrid({ groupable: true}); 
                            });
                        }
                        if ($("#EventOffersGrid2").length>0) {
                            $('#EventOffersGrid2').jqxGrid('updatebounddata');
                            $("#EventOffersGrid2").jqxGrid({
                                groupable: true,
                                showgroupsheader: false,
                                groups: ['offertype']
                            });
                        }
                        $('#EventOffersDialog').jqxWindow('close');
                    }
                    else {
                        $('#BodyEventOffersDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], 'Добавляемое предложение уже есть в данном событии. ');
                }
            });
        });
        
        if (EventOffers.oftp_id != null) $("#OfferTypes").jqxComboBox('val', EventOffers.oftp_id);
        if (EventOffers.note != null) $("#note2").jqxTextArea('val', EventOffers.note);
        if (EventOffers.situation != null) $("#situation2").jqxTextArea('val', EventOffers.situation);
        if (EventOffers.rslt_id != null) $("#OfferResults").jqxComboBox('val', EventOffers.rslt_id);
        
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'EventOffers',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    ));
?>

<input type="hidden" name="EventOffers[code]" value="<?php echo $model->code; ?>"/>
<input type="hidden" name="EventOffers[evnt_id]" value="<?php echo $model->evnt_id; ?>"/>

<div class="row">
    <div class="row-column">Предложение: </div>
    <div class="row-column"><div id="OfferTypes" name="EventOffers[oftp_id]"></div><?php echo $form->error($model, 'oftp_id'); ?></div>
</div>

<div class="row">
    <div class="row-column">Примечание: <textarea id="note2" name="EventOffers[note]"></textarea></div>
</div>

<div class="row">
    <div class="row-column">Ситуация по постановке на обслуживание: <textarea id="situation2" name="EventOffers[situation]"></textarea></div>
</div>

<div class="row">
    <div class="row-column">Результат по предложению: </div>
    <div class="row-column"><div id="OfferResults" name="EventOffers[rslt_id]"></div><?php echo $form->error($model, 'rslt_id'); ?></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveEventOffers'/></div>
    <div class="row-column" style="float: right; margin-right: 28px;"><input type="button" value="Отмена" id='btnCancelEventOffers'/></div>
</div>
<?php $this->endWidget(); ?>



