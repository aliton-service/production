<?php

class DemandsExecTime_DemandPriors extends MainFormModel
{
    public $Demandet_id;
    public $DemandPrior_id;
    public $DemandPrior;
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

            $this->SP_INSERT_NAME = '';
            $this->SP_UPDATE_NAME = '';
            $this->SP_DELETE_NAME = '';

            $Select = "Select
                           p.Demandet_id,
                           p.DemandPrior_id,
                           d.DemandPrior";
            $From = "\nFrom DemandsExecTime p left join DemandPriors d on (p.DemandPrior_id = d.DemandPrior_id)";
            $Where = "\nWhere p.DelDate is null";
            $Order = "\nOrder By case when d.DemandPrior = 'Срочная, платная' then 1 else 0 end, d.Sort, d.DemandPrior";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 'p.Demandet_id';
            $this->PrimaryKey = 'Demandet_id';
        }
        
	public function rules()
	{
            return array(
                array('Demandet_id,'
                    . ' DemandPrior_id', 'safe'),
            );
	}

	public function attributeLabels()
	{
            return array(
                    'Demandet_id' => 'Demandet_id',
                    'DemandPrior_id' => 'DemandPrior_id',
            );
	}
}







