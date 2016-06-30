<?php
/**
 *
 * @var RepairController $this
 */
?>

<?php
if($this->action->id == 'equipInfo') {
	?>
	<h4>Закупочная цена оборудования:</h4>
	<p><?=$price != null ? $price : 'Закупочная цена не определена'?></p>
	<h4>Количество оборудования на складе:</h4>
	<p><?=$count != null ? $count : 'Количество оборудования не определено'?></p>
	<?php
}
?>

<?php
if($this->action->id == 'equipInfoSN') {
	?>
	<h4>Данные по серийному номеру</h4>
	<?php
	if(count($info) > 0) {
		foreach($info as $inf) {
			?>
			<p><span>Дата: </span><span><?=$inf['date_create']?></span></p>
			<p><span>Номер накладной: </span><span><?=$inf['number']?></span></p>
			<p><span>Поставщик: </span><span><?=$inf['NameSupplier']?></span></p>
			<p><span>Примечание: </span><span><?=$inf['Note']?></span></p>
			<?php
		}
	}
	else {
		?>
		<p><span>Данные не найдены</span></p>

		<?php
	}
}
?>

