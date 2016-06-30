<?php
/* @var $this CustomersController */
/* @var $data Customers */
?>

<tr class="view">

<td class='table-cell'><?php echo CHtml::encode($data->CustomerName); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Reduction); ?></td><td class='table-cell'><?php echo CHtml::encode($data->Lock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DateLock); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplChange); ?></td>	<?php /*
<td class='table-cell'><?php echo CHtml::encode($data->DateChange); ?></td><td class='table-cell'><?php echo CHtml::encode($data->EmplDel); ?></td><td class='table-cell'><?php echo CHtml::encode($data->DelDate); ?></td>	*/ ?>

</tr>