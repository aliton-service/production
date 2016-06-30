<?php

class DemandsExecTime_SystemTypes extends MainFormModel
{
	public $DemandType_id;
        public $SystemType_id;
        public $SystemTypeName;
        public $Sort;

	function __construct($scenario = '') {

        parent::__construct($scenario);

            $this->SP_INSERT_NAME = '';
            $this->SP_UPDATE_NAME = '';
            $this->SP_DELETE_NAME = '';

            $Select = "Select
                           p.SystemType_id,
                           s.SystemTypeName,
                           s.Sort";
            $From = "\nFrom DemandsExecTime p left join SystemTypes s on (p.SystemType_id = s.SystemType_Id)";
            $Where = "\nWhere p.DelDate is null and p.SystemType_id is not null";
            $Group = "\nGroup by p.SystemType_id, s.SystemTypeName, s.Sort";
            $Order = "\nOrder By s.Sort, s.SystemTypeName";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setGroupBy($Group);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 'p.SystemType_id';
            $this->PrimaryKey = 'SystemType_id';
        }
        
	public function rules()
	{
            return array(
                array('SystemType_id,'
                    . ' SystemTypeName,'
                    . ' Sort,', 'safe'),
            );
	}

	public function attributeLabels()
	{
            return array(
                    'SystemType_id' => 'SystemType_id',
                    'SystemTypeName' => 'SystemTypeName',
                    'Sort' => 'Sort',
            );
	}
}


