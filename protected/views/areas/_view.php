<?php
/* @var $this AreasController */
/* @var $data Areas */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->AreaName); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td>	*/ ?>

</tr>