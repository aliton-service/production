<?php
/* @var $this RegionsController */
/* @var $data Regions */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->RegionName); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Sort); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td>	*/ ?>

</tr>