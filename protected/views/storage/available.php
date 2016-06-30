<table rules="all" border="1" cellpadding="4">
	<thead>
	<tr>
		<td width="250px" rowspan="2">Склад</td>
		<td width="150px" colspan="2" style="text-align:center">Наличие</td>
	</tr>
	<tr>
		<td width="75px" style="text-align:center">Новое</td>
		<td width="75px" style="text-align:center">Б/У</td>
	</tr>
	</thead>

	<tbody>
	<?php
	if(!empty($data)) {
		foreach ($data as $item) {
			?>
			<tr>
				<td><?= $item['storage'] ?></td>
				<td><?= $item['quant'] ?></td>
				<td><?= $item['quant_used'] ?></td>
			</tr>
			<?php
		}
	}
	?>
	</tbody>
</table>