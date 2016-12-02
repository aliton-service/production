<script type="text/javascript">
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Create') echo 'true'; else echo 'false'; ?>;
        
        var Equips = {
            Equip_id: <?php echo json_encode($model->Equip_id); ?>,
        };
    });
</script>    

<?php
    $Form = $this->beginWidget('CActiveForm', array(
	'id'=>'Equips',
	'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="Equips[Equip_id]" value="<?php echo $model->Equip_id; ?>"/>

<div class="al-row">
    <div class="al-row-column" style="width: 150px">Ветка</div>
    <div class="al-row-column" style="width: calc(100% - 150px)"><div id="cmbGroup"></div></div>
</div>

<?php $this->endWidget(); ?>