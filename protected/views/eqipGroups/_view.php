<?php
/* @var $this EqipGroupsController */
/* @var $data EqipGroups */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->parent_group_id); ?></td><td class='table-cell'><?php echo CHtml::encode($data->code); ?></td><td class='table-cell'><?php echo CHtml::encode($data->group_name); ?></td><td class='table-cell'><?php echo CHtml::encode($data->full_group_name); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplCreate); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateCreate); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td>	*/ ?>

</tr>