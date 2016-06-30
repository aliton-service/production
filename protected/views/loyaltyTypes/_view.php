<?php
/* @var $this LoyaltyTypesController */
/* @var $data LoyaltyTypes */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->LoyaltyTypeName); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td>	*/ ?>

</tr>