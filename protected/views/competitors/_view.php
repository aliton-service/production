<?php
/* @var $this CompetitorsController */
/* @var $data Competitors */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->Competitor); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplCreate); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateCreate); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelData); ?></td>	*/ ?>

</tr>