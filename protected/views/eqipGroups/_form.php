<script type="text/javascript">
        $(document).ready(function () {
            var EqipGroups = {
                group_id: <?php echo json_encode($model->group_id); ?>,
                parent_group_id: <?php echo json_encode($model->parent_group_id); ?>,
                group_name: <?php echo json_encode($model->group_name); ?>
            };
            
            $("#group_id").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100, value: EqipGroups.group_id }));
            $("#parent_group_id").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100, value: EqipGroups.parent_group_id }));
            $("#groupName").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 480, value: EqipGroups.group_id,}));
            
            if (EqipGroups.group_name != '') $("#groupName").jqxInput('val', EqipGroups.group_name);
            
            
        });
</script>        
<?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'EqipGroups',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
     )); 
?>

<div>
    <input id='group_id' type="hidden" name='EqipGroups[group_id]'/>
    <input id='parent_group_id' type="hidden" name='EqipGroups[parent_group_id]'/>
</div>    
<div class="row">
    <div class="row-column">Наименование:
        <input id='groupName' type="text" name='EqipGroups[group_name]'/><?php echo $form->error($model, 'group_name'); ?>
    </div>
</div>  

<?php $this->endWidget(); ?>