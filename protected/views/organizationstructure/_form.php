<script type="text/javascript">
        $(document).ready(function () {
            var Structure = {
                Structure_id: <?php echo json_encode($model->Structure_id); ?>,
                Parent_id: <?php echo json_encode($model->Parent_id); ?>,
                Empl_id: <?php echo json_encode($model->Empl_id); ?>
            };
            
            var DataEmployees = new $.jqx.dataAdapter(Sources.SourceListEmployees);
            
            $("#Structure_id").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100, value: Structure.Structure_id,}));
            $("#Parent_id").jqxInput($.extend(true, {}, InputDefaultSettings, {width: 100, value: Structure.Parent_id,}));
            $("#edEmpl").jqxComboBox($.extend(true, {}, ComboBoxDefaultSettings, { source: DataEmployees, displayMember: "ShortName", valueMember: "Employee_id"}));
            
            if (Structure.Empl_id != '') $("#edEmpl").jqxComboBox('val', Structure.Empl_id);
            
            
        });
</script>        
<?php
    $form = $this->beginWidget('CActiveForm', array(
            'id' => 'OrganizationStructure',
            'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
     )); 
?>

<div class="row">
    <div class="row-column">
        <input id='Structure_id' type="hidden" name='OrganizationStructure[Structure_id]'/>
        <input id='Parent_id' type="hidden" name='OrganizationStructure[Parent_id]'/>ФИО сотрудника:
    </div>
</div>    
<div class="row">
    <div class="row-column">
        <div id='edEmpl' name="OrganizationStructure[Empl_id]"></div><?php echo $form->error($model, 'Empl_id'); ?>
    </div>
</div>  

<?php $this->endWidget(); ?>