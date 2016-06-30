<?php
/**
 *
 * @var DemandsController $this
 */
?>

<div class="form-inline">
	<div>
		<label>Номер</label><input class="form-control" disabled="disabled" value="<?=$data['Demand_id']?>">
		<label>Адрес</label><input class="form-control" disabled="disabled" value="<?=$data['Address']?>">
	</div>
	<hr>
	<div>
		<label>Дата заявки</label><input class="form-control" value="<?=$data['DateReg']?>">
		<label>Тариф</label><input class="form-control" value="<?=$data['ServiceType']?>">
	</div>
	<hr>
	<div>
		<label>Тип</label><input class="form-control" value="<?=$data['DemandType']?>">
		<label>Тип системы</label><input class="form-control" value="<?=$data['SystemType']?>">
	</div>
	<hr>
	<div>
		<label>Тип оборудования</label><input class="form-control" value="<?=$data['EquipType']?>">
		<label>Неисправность</label><input class="form-control" value="<?=$data['Malfunction']?>">
	</div>
	<hr>
	<div>
		<label>Приоритет</label><input class="form-control" value="<?=$data['DemandPrior']?>">
		<label>Контакт</label><input class="form-control" value="<?=$data['Contacts']?>">
	</div>
	<hr>
	<div>
		<label>Мастер</label><input class="form-control" value="<?=$data['MasterName']?>">
		<label>Причина несвоевременного закрытия</label><input class="form-control" value="<?=$data['CloseReason']?>">
	</div>
	<hr>
	<div>
		<label>Предельная дата</label><input class="form-control" value="<?=$data['Deadline']?>">
		<label>Согласованная дата</label><input class="form-control" value="<?=$data['AgreeDate']?>">
	</div>
	<hr>
	<div>
		<label>Отчет мастера</label><textarea class="form-control"><?=$data['RepMaster']?></textarea>

	</div>
	<div>
		<label>Неисправность</label><textarea class="form-control"><?=$data['Note']?></textarea>

	</div>
	<hr>
<!--	<div>-->
<!--		<label></label><input class="form-control" value="--><?//=$data['']?><!--">-->
<!--		<label></label><input class="form-control" value="--><?//=$data['']?><!--">-->
<!--	</div>-->
<!--	<hr>-->
</div>
