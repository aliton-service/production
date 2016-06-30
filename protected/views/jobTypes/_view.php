<?php
/* @var $this JobTypesController */
/* @var $data JobTypes */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->JobType_Name); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td>	*/ ?>

</tr>