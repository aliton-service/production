<?php

class DemandsExecTime_EquipTypes extends MainFormModel
{
	public $EquipType_id;
        public $EquipTypeName;
        
	function __construct($scenario = '') {

        parent::__construct($scenario);

            $this->SP_INSERT_NAME = '';
            $this->SP_UPDATE_NAME = '';
            $this->SP_DELETE_NAME = '';

            $Select = "Select
                           p.EquipType_id,
                           e.EquipType";
            $From = "\nFrom DemandsExecTime p left join EquipTypes e on (p.EquipType_id = e.EquipType_id)";
            $Where = "\nWhere p.DelDate is null";
            $Group = "\nGroup by p.EquipType_id, e.EquipType";
            $Order = "\nOrder By e.EquipType";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setGroupBy($Group);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 'p.EquipType_id';
            $this->PrimaryKey = 'EquipType_id';
        }
        
	public function rules()
	{
            return array(
                array('EquipType_id,'
                    . ' EquipType', 'safe'),
            );
	}

	public function attributeLabels()
	{
            return array(
                    'EquipType_id' => 'EquipType_id',
                    'EquipType' => 'EquipType',
            );
	}
}




