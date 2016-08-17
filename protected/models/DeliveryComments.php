<?php

/**
 * This is the model class for table "DeliveryComments".
 *
 * The followings are the available columns in table 'DeliveryComments':
 * @property integer $dlcm_id
 * @property integer $dldm_id
 * @property string $DateCreate
 * @property string $text
 * @property string $DelDate
 * @property integer $EmplCreate
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 */
class DeliveryComments extends MainFormModel
{
	public $dlcm_id = null;
	public $dldm_id = null;
	public $DateCreate = null;
	public $text = null;
	public $DelDate = null;
	public $EmplCreate = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $user_create = null;
	public $date_create = null;
	public $employeename = null;

	public $SP_INSERT_NAME = 'INSERT_DeliveryComments';
	public $SP_DELETE_NAME = 'DELETE_DeliveryComments';
	

	function __construct($scenario = '', $print_reason = false) {

		parent::__construct($scenario);

		$Select = "\nSelect
                                dc.dlcm_id,
                                dc.dldm_id,
                                dc.EmplCreate,
                                dc.date_create,
                                dc.[text],
                                e.ShortName as Employeename";
		$From = "\nFrom DeliveryComments dc left join Employees e on (dc.EmplCreate = e.Employee_id)";
		$Where = "\nWhere dc.DelDate is Null";
		$Order = "\nOrder by dc.dlcm_id desc";
		$this->Query->setSelect($Select);
		$this->Query->setFrom($From);
		$this->Query->setOrder($Order);
		$this->Query->setWhere($Where);
	}

	
	public function rules()
	{
            return array(
                array('dlcm_id,'
                    . ' dldm_id,'
                    . ' DateCreate,'
                    . ' text,'
                    . ' DelDate,'
                    . ' EmplCreate,'
                    . ' Lock,'
                    . ' EmplLock,'
                    . ' DateLock, EmplChange, DateChange, EmplDel', 'safe'),
            );
	}

	public function attributeLabels()
	{
            return array(
                    'dlcm_id' => 'Dlcm',
                    'dldm_id' => 'Dldm',
                    'DateCreate' => 'Date Create',
                    'text' => 'Text',
                    'DelDate' => 'Del Date',
                    'EmplCreate' => 'Empl Create',
                    'Lock' => 'Lock',
                    'EmplLock' => 'Empl Lock',
                    'DateLock' => 'Date Lock',
                    'EmplChange' => 'Empl Change',
                    'DateChange' => 'Date Change',
                    'EmplDel' => 'Empl Del',
            );
	}
}
