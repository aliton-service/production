<script type="text/javascript">
    $(document).ready(function () {
        var UserSettings = {
            Setting_id: <?php echo json_encode($model->Setting_id); ?>,
            Empl_id: <?php echo json_encode($model->Empl_id); ?>,
            Theme: <?php echo json_encode($model->Theme); ?>
        };
        
        $("#edTheme").jqxComboBox({ source: [{id: 'standart', name: 'standart'}, {id: 'fresh', name: 'fresh'}, {id: 'fresh2', name: 'fresh2'}], width: '300', height: '25px', displayMember: "id", valueMember: "name"});
        $("#edTheme").jqxComboBox('val', UserSettings.Theme); 
        $("#btnSaveSetting").jqxButton($.extend(true, {}, ButtonDefaultSettings, { disabled: false }));
        
        $('#btnSaveSetting').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('Site/Settings')); ?>;
            
            $.ajax({
                url: Url,
                data: $('#UserSettings').serialize(),
                type: 'POST',
                success: function(Res) {
                    if (Res === '1')
                        location.reload();
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        $('#UserSettings').on('keyup keypress', function(e) {
            var keyCode = e.keyCode || e.which;
            if (keyCode === 13) { 
                e.preventDefault();
                return false;
            }
        });
    });
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
	'id'=>'UserSettings',
	'htmlOptions'=>array(
		'class'=>'form-inline'
		),
    )); 
?>

<input type="hidden" name="UserSettings[Setting_id]" value="<?php echo $model->Setting_id; ?>"/>
<div class="row">
    <div class="row-column">Тема:</div>
    <div class="row-column"><div id="edTheme" name="UserSettings[Theme]"></div></div>
</div>
<div class="row">
    <div class="row-column"><input type="button" value="Сохранить" id='btnSaveSetting'/></div>
</div>
<?php $this->endWidget(); ?>
