<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 19.01.2016
 * Time: 11:47
 */

class ReplaceMaster extends MainFormModel
{

	public $date = null;
	public $FromEmpl = null;
	public $ToEmpl = null;
	public $EmplChange = null;

	public $REPLACE_MASTER = 'REPLACE_Master';


	public $KeyFiled = '';
	public $PrimaryKey = '';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';

	public $select = '';
	public $from = '';
	public $order = '';
	public $where = '';

	public function rules() {
		return array(
			array('FromEmpl,ToEmpl,date','required'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'date' => 'Дата начала работы',
			'FromEmpl' => 'Мастер С которого переводим объекты',
			'ToEmpl' => 'Мастер НА которого переводим объекты',
		);
	}


	public function getMasterCount($id)
	{
		$query = "
		Select
		  count(t.ContrS_id) as contract,
		  isnull(sum(t.CountObj), 0) as object

		From (
			Select
			  c.ContrS_id,
			  count(o.Object_id) as CountObj
			From Contracts_v c left join FullObjects o on (c.ObjectGr_id = o.ObjectGr_id)
			Where o.DelDate is null
			  and o.Doorway <> 'Общее'
			  and dbo.truncdate(getdate()) between c.ContrSDateStart and c.ContrSDateEnd
			  and isNull(c.DocType_id,4) = 4
			  and c.Master = {$id}
			Group by c.ContrS_id
			) t

		";

		return Yii::app()->db->createCommand($query)->queryAll();

	}

}