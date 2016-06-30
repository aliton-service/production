<?php
/* @var $this StreetsController */
/* @var $data Streets */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->Region_id); ?></td><td class='table-cell'><?php echo CHtml::encode($data->StreetType_id); ?></td><td class='table-cell'><?php echo CHtml::encode($data->StreetName); ?></td><td class='table-cell'><?php echo CHtml::encode($data->user_change); ?></td><td class='table-cell'><?php echo CHtml::encode($data->date_change); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td>	*/ ?>

</tr>