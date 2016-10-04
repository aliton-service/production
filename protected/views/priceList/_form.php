<script type="text/javascript">
    $(document).ready(function () {
        
        var DataEquips = new $.jqx.dataAdapter(Sources.SourceListEquipsMin);
        
        $('#PriceList').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
        
        $("#DateTime").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { width: 170, formatString: 'dd.MM.yyyy HH:mm', showTimeButton: true, value: new Date() }));
        $("#note").jqxTextArea($.extend(true, {}, TextAreaDefaultSettings, {}));
        
        $('#btnSavePriceList').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancelPriceList').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        
        var breakInsert = false;
        
        $('#btnCancelPriceList').on('click', function(){
            breakInsert = true;
            $('#PriceListDialog').jqxWindow('close');
        });
        
        var prlt_id;
        var eqip_idx = 0;
        var progBarValueTotal = 0;
        
        var insertPriceListDetails = function() {
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('PriceListDetails/Create')); ?>,
                data: {
                    PriceListDetails: {
                        prlt_id: prlt_id,
                        eqip_id: DataEquips.records[eqip_idx].Equip_id
                    }
                },
                type: 'POST',
                async: true,
                success: function(Res) {
                    
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        
                        eqip_idx++; 
                        if(!breakInsert && eqip_idx < DataEquips.records.length) {
                            insertPriceListDetails();
                            progBarValueTotal = ((eqip_idx + 1) / DataEquips.records.length) * 100;;
                            $("#jqxProgressBarPriceList").jqxProgressBar({ value: progBarValueTotal });
                        } 
                        else if (breakInsert) {
                            $("#PriceListGrid").jqxGrid('updatebounddata');
                            $("#PriceListGrid").jqxGrid('selectrow', 0);
                            $('#btnDelPriceList').click();
                        } 
                        else {
                            $('#PriceListDialog').jqxWindow('close');
                            $("#PriceListGrid").jqxGrid('updatebounddata');
                            $('#PriceListGrid').jqxGrid('selectrow', 0);
                        }
                    }
                    else {
                      $('#BodyPriceListDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        };
        
        
        $('#btnSavePriceList').on('click', function()
        {
            var Url = <?php echo json_encode(Yii::app()->createUrl('PriceList/Create')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#PriceList').serialize(),
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        DataEquips.dataBind();
//                        console.log(DataEquips);
                        prlt_id = Res.id;
                        insertPriceListDetails();
                    }
                    else {
                        $('#BodyPriceListDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        
        $("#jqxProgressBarPriceList").jqxProgressBar({ width: 340, height: 30, value: 0, showText: true, max: 100, animationDuration: 0 });
    });
</script>        

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'PriceList',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">На дату </div>
    <div class="row-column"><div id='DateTime' name="PriceList[date]"></div></div>
</div>

<div class="row">
    <div class="row-column" style="margin-top: 2px;">Примечание: </div>
    <div class="row-column"><div id='note' name="PriceList[note]"></div></div>
</div>

<div class="row">
    <div class="row-column"><input type="button" value="Рассчитать" id='btnSavePriceList'/></div>
    <div class="row-column" style="float: right;"><input type="button" value="Отмена" id='btnCancelPriceList'/></div>
</div>

<div class="row">
    <div class="row-column">*Рассчет может занять более 20 минут.</div>
</div>

<div class="row" style="margin: 0;">
    <div style='margin-top: 5px; overflow: hidden;' id='jqxProgressBarPriceList'></div>
</div>

<?php $this->endWidget(); ?>



