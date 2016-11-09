<script type="text/javascript">
    $(document).ready(function () {
        Repair = {
            Repr_id: <?php echo json_encode($model->Repr_id); ?>,
            Rslt_id: <?php echo json_encode($model->rslt_id); ?>,
        };
        
        var ResultDataAdapter = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceRepairResults));
        $("#edResultEdit").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: ResultDataAdapter, displayMember: "ResultName", valueMember: "Rslt_id", autoDropDownHeight: true, width: 250 }));
        
        if (Repair.Rslt_id != '') $("#edResultEdit").jqxComboBox('val', Repair.Rslt_id);
               
        $('#btnSaveRepairs').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Repair/Update')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#Repairs').serialize() + '&Type=1',
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        if (typeof(Repairs) != 'undefined')
                            Repairs.Refresh();
                        if ($('#RepairsDialog').length>0)
                            $('#RepairsDialog').jqxWindow('close');
                    }
                    else {
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $('#btnSaveRepairs').jqxButton($.extend(true, {}, ButtonDefaultSettings, {disabled: false}));
        $('#btnCancelRepairs').jqxButton($.extend(true, {}, ButtonDefaultSettings));
        
        $('#btnCancelRepairs').on('click', function() {
            $('#RepairsDialog').jqxWindow('close');
        });
        $('#RepairsDialog').on('close', function (event) { 
            if ($('#TabsEdit').length>0)
                $('#TabsEdit').jqxTabs('destroy');
        });
        
        
    });
</script>




    <div style="padding: 10px; overflow: none;">
        <?php 
            $form=$this->beginWidget('CActiveForm', array(
                'id'=>'Repairs',
                'htmlOptions'=>array(
                    'class'=>'form-inline'
                ),
            )); 
        ?>
        <input type="hidden" name="Repairs[Repr_id]" value="<?php echo $model->Repr_id; ?>"/>

        
        <div class="al-row">
            <div class="al-row-column">Результат диагностики</div>
            <div class="al-row-column"><div id="edResultEdit" name="Repairs[rslt_id]"></div><?php echo $form->error($model, 'rslt_id'); ?></div>
            <div style="clear: both"></div>
        </div>
        <?php $this->endWidget(); ?>
    </div>
    <div style="clear: both"></div>
<div style="clear: both"></div>
    
    
<div class="al-row">
    <div class="al-row-column"><input type="button" id="btnSaveRepairs" value="Сохранить" /></div>
    <div class="al-row-column" style="float: right"><input type="button" id="btnCancelRepairs" value="Закрыть" /></div>
    <div style="clear: both"></div>
</div>
