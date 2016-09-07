<?php

class ContractSystems extends MainFormModel
{
    public $ContractSystem_id;
    public $ContrS_id;
    public $SystemType_id;
    public $SystemTypeName;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';


    public function rules()
    {
        return array(
            array('ContractSystem_id, ContrS_id, SystemType_id', 'numerical', 'integerOnly'=>true),
            array('ContrS_id, SystemType_id', 'required'),
            array('SystemTypeName', 'length', 'max'=>150),
            array('ContractSystem_id, ContrS_id, SystemType_id, SystemTypeName', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_ContractSystems';
        $this->SP_UPDATE_NAME = 'UPDATE_ContractSystems';
        $this->SP_DELETE_NAME = 'DELETE_ContractSystems';
        
        parent::__construct($scenario);
        $select = "
            select 
                cs.ContractSystem_id,
                cs.ContrS_id,
                cs.SystemType_id,
                st.SystemTypeName
        ";

        $from = "
            from ContractSystems cs
                inner join SystemTypes st on (cs.SystemType_id = st.SystemType_id)
        ";

        $where = "
            where cs.DelDate is Null
	";

        $order = "
            order by st.SystemTypeName
        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'cs.ContractSystem_id';
        $this->PrimaryKey = 'ContractSystem_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
	$this->Query->setWhere($where);
        $this->Query->setOrder($order);
    }
        
    public function attributeLabels()
    {
        return array(
            'ContractSystem_id' => 'ContractSystem_id',
            'ContrS_id' => 'ContrS id',
            'SystemType_id' => 'Тип подсистемы',
            'SystemTypeName' => 'Наименование',
        );
    }

}
