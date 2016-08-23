<?php

class ContractEquips extends MainFormModel
{
    public $creq_id;
    public $contrs_id;
    public $eqip_id;
    public $equipname;
    public $um_name;
    public $price;
    public $quant;
    public $sum;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';


    public function rules()
    {
        return array(
            array('creq_id, contrs_id, eqip_id', 'numerical', 'integerOnly'=>true),
            array('price, quant, sum', 'numerical'),
            array('contrs_id, eqip_id, quant, price', 'required'),
            array('equipname, um_name', 'length', 'max'=>50),
            array('creq_id, contrs_id, eqip_id, equipname, um_name, price, quant, sum', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_ContractEquips';
        $this->SP_UPDATE_NAME = 'UPDATE_ContractEquips';
        $this->SP_DELETE_NAME = 'DELETE_ContractEquips';
        
        parent::__construct($scenario);
        $select = "
            select
                ce.creq_id,
                ce.contrs_id,
                ce.eqip_id,
                case when ce.eqip_id is null then ce.name else e.equipname end equipname,
                u.nameunitmeasurement um_name,
                ce.price,
                ce.quant,
                ce.sum
        ";

        $from = "
            from contractequips ce left join equips e on (ce.eqip_id = e.equip_id)
                left join unitmeasurement u on (e.unitmeasurement_id = u.unitmeasurement_id)
        ";

        $where = "
            where ce.deldate is null
	";

//        $order = "
//        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'ce.creq_id';
        $this->PrimaryKey = 'creq_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
	$this->Query->setWhere($where);
//        $this->Query->setOrder($order);
    }
        
    public function attributeLabels()
    {
        return array(
            'creq_id' => 'creq_id',
            'contrs_id' => 'contrs_id',
            'eqip_id' => 'eqip_id',
            'equipname' => 'equipname',
            'um_name' => 'um_name',
            'price' => 'price',
            'quant' => 'quant',
            'sum' => 'sum',
        );
    }

}
