<?php

class DemandsExecTime_Malfunctions extends MainFormModel
{
	public $Malfunction_id;
        public $Malfunction;
        
	function __construct($scenario = '') {

        parent::__construct($scenario);

            $this->SP_INSERT_NAME = '';
            $this->SP_UPDATE_NAME = '';
            $this->SP_DELETE_NAME = '';

            $Select = "Select
                           p.Malfunction_id,
                           m.Malfunction";
            $From = "\nFrom DemandsExecTime p left join Malfunctions m on (p.Malfunction_id = m.Malfunction_id)";
            $Where = "\nWhere p.DelDate is null and p.Malfunction_id is not null";
            $Group = "\nGroup by p.Malfunction_id, m.Malfunction";
            $Order = "\nOrder By m.Malfunction";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setGroupBy($Group);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 'p.Malfunction_id';
            $this->PrimaryKey = 'Malfunction';
        }
        
	public function rules()
	{
            return array(
                array('Malfunction_id,'
                    . ' Malfunction', 'safe'),
            );
	}

	public function attributeLabels()
	{
            return array(
                    'Malfunction_id' => 'Malfunction_id',
                    'Malfunction' => 'Malfunction',
            );
	}
}






