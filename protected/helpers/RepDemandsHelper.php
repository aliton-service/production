<?php

class RepDemandsHelper extends RepHelper {
	public function general(&$data) {
		?>

		<h3>Список заявок</h3>
		<input type="button" onclick="tableToExcel('testTable', 'Заявки (общий отчет)')" value="Экспорт в Excel">
		<table id="testTable" class="table table-striped table-bordered">
			<thead>
			<tr>
				<td>Дата рег.</td>
				<td>Тип заявки/Тип. об./Неиспр. об.</td>
				<td>Дата перед</td>
				<td>Дата вып-ния</td>
				<td>Срочность</td>
				<td>Просрочка</td>
				<td>Мастер</td>
				<td>Исполнители</td>
				<td>Неисправность</td>
				<td>Адрес/Отчет мастера</td>
				<td>Код</td>
			</tr>
			</thead>

			<tbody>
			<?php

				foreach($data as $row) {
					?>
					<tr>
						<td><?=$row['DateReg']?></td>
						<td><?=$row['DemandType']?><br><?=$row['EquipType']?><br><?=$row['Malfunction']?></td>
						<td><?=$row['DateMaster']?></td>
						<td><?=$row['DateExec']?></td>
						<td><?=$row['DemandPrior']?></td>
						<td><?=$row['Overday']?></td>
						<td><?=$row['MasterName']?></td>
						<td><?=$row['ExecutorsName']?></td>
						<td><?=$row['DemandText']?></td>
						<td><?=$row['Address']?><br><?=$row['RepMaster']?></td>
						<td><?=$row['Demand_id']?></td>
					</tr>
					<?php
						$details = Demands::getReportGeneralDetails($row['Demand_id']);
						?>
						<tr>
							<td colspan="11">
								<table class="table table-striped table-bordered">
									<thead>
										<tr style="background:#eee">
											<td colspan="4">Ход работы</td>
										</tr>
										<tr style="background:#eee">
											<td>Дата</td>
											<td>Администрирующий</td>
											<td>План. работы</td>
											<td>Действие</td>
										</tr>
									</thead>
									<tbody>
									<?php
									foreach($details as $row_details) {
										?>
										<tr>
										<td style="background:#f0f0f0"><?=$row_details['DateCreate']?></td>
										<td style="background:#f0f0f0"><?=$row_details['EmployeeName']?></td>
										<td style="background:#f0f0f0"><?=$row_details['plandateexec']?></td>
										<td style="background:#f0f0f0"><?=$row_details['report']?></td>
										</tr>
										<?php
									}
									?>
									</tbody>
								</table>
							</td>
						</tr>
						<?php
				}
			?>
			</tbody>
		</table>
		<?php
	}

}