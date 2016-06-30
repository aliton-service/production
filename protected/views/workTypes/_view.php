<?php
/* @var $this WorkTypesController */
/* @var $data WorkTypes */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->name); ?></td><td class='table-cell'><?php echo CHtml::encode($data->user_create); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td>	*/ ?>

</tr>