<script type="text/javascript">
    $(document).ready(function(){
        var DeliveryDetail = {
            dldt_id: <?php echo json_encode($model->dldt_id); ?>,
            dldm_id: <?php echo json_encode($model->dldm_id); ?>,
            equip_id: <?php echo json_encode($model->equip_id); ?>,
            quant: <?php echo json_encode($model->quant); ?>,
            used: <?php echo json_encode($model->used); ?>,
            price: <?php echo json_encode($model->price); ?>,
            deldate: <?php echo json_encode($model->deldate); ?>,
            equipname: <?php echo json_encode($model->equipname); ?>,
            um_name: <?php echo json_encode($model->um_name); ?>,
        };
    });
</script>    

<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'DeliveryDetails',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<div class="row">
    <div class="row-column">
        <div>Оборудование</div>
        <div><div id="edEditDetailEquip" name="DeliveryDetails[equip_id]"></div><?php echo $form->error($model, 'equip_id'); ?></div>
    </div>
</div>    

<?php $this->endWidget(); ?>