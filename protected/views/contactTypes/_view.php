<?php
/* @var $this ContactTypesController */
/* @var $data ContactTypes */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->ContactName); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Visible); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td>	*/ ?>

</tr>