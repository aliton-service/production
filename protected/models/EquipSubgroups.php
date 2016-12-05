<?php

/**
 * This is the model class for table "EquipSubgroups".
 *
 * The followings are the available columns in table 'EquipSubgroups':
 * @property integer $sgrp_id
 * @property integer $grp_id
 * @property string $name
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class EquipSubgroups extends MainFormModel
{
	public $sgrp_id = null;
	public $grp_id = null;
	public $name = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $DateCreate = null;
	public $EmplChange = null;
	public $DateChange = null;
	public $EmplDel = null;
	public $DelDate = null;

	public $KeyFiled = 'esg.sgrp_id';
	public $PrimaryKey = 'sgrp_id';

	public $SP_INSERT_NAME = 'INSERT_EquipSubgroups';
	public $SP_UPDATE_NAME = 'UPDATE_EquipSubgroups';
	public $SP_DELETE_NAME = 'DELETE_EquipSubgroups';

	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "\nSelect esg.* ";
		$from = "\nFrom EquipSubgroups esg ";
		$where = "\nWhere esg.DelDate Is Null ";
		$order = "\nOrder By esg.name ";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
		$this->Query->setWhere($where);
	}
	
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('grp_id, name', 'required'),
			array('grp_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>25),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sgrp_id, grp_id, name, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
		);
	}



	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'sgrp_id' => 'Sgrp',
			'grp_id' => 'Grp',
			'name' => 'Name',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
		);
	}



	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EquipSubgroups the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE EquipSubgroups SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE sgrp_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
