<?php

class EquipGroupsListMin extends MainFormModel
{

	public $grp_id = null;
	public $name = null;

	public $SP_INSERT_NAME = 'INSERT_EquipGroups';
	public $SP_UPDATE_NAME = 'UPDATE_EquipGroups';
	public $SP_DELETE_NAME = 'DELETE_EquipGroups';

	public $KeyFiled = 'e.grp_id';
	public $PrimaryKey = 'grp_id';

	function __construct($scenario='') {
		parent::__construct($scenario);

		$select = "\nSelect
                                grp_id, 
                                name";

		$from = "\nFrom EquipGroups";

//		$where = "";

		$order = "\nOrder by name";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
//		$this->Query->setWhere($where);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EquipGroups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('grp_id, name', 'safe'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'grp_id' => 'Grp',
			'name' => 'Наименование',
		);
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
