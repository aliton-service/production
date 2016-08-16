<?php

class ContractsDetails_v extends MainFormModel
{
    public $csdt_id;
    public $ContrS_id;
    public $Equip_id;
    public $Name;
    public $ItemName;
    public $um_name;
    public $Price;
    public $Quant;
    public $Sum;
    public $Note;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';


    public function rules()
    {
        return array(
            array('csdt_id, ContrS_id, Equip_id, Quant', 'numerical', 'integerOnly'=>true),
            array('Price, Sum', 'numerical'),
            array('Name, ItemName', 'length', 'max'=>50),
            array('Note', 'length', 'max'=>1073741823),
            array('Sum', 'length', 'max'=>19),
            array('csdt_id, ContrS_id, Equip_id, Name, ItemName, um_name, Price, Quant, Sum, Note', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_ContractsDetails_v';
        $this->SP_UPDATE_NAME = 'UPDATE_ContractsDetails_v';
        $this->SP_DELETE_NAME = 'DELETE_ContractsDetails_v';
        
        parent::__construct($scenario);
        $select = "
            Select
                c.csdt_id,
                c.ContrS_id,
                c.Equip_id,
                c.Name,
                c.ItemName,
                c.um_name,
                c.Price,
                c.Quant,
                c.Sum,
                c.Note
        ";

        $from = "
            From ContractsDetails_v c
        ";

//		$where = "
//		";

        $order = "
            order by c.ContrS_id
        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'c.csdt_id';
        $this->PrimaryKey = 'csdt_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
//		$this->Query->setWhere($where);
        $this->Query->setOrder($order);
    }
        
//Select
//  c.csdt_id,
//  c.ContrS_id,
//  c.Equip_id,
//  c.Name,
//  c.ItemName,
//  c.Price,
//  c.Quant,
//  c.Sum,
//  c.Note
//From ContractsDetails_v c
//Where c.ContrS_id = :ContrS_id
//
// 

    public function attributeLabels()
    {
        return array(
            'csdt_id' => 'csdt id',
            'ContrS_id' => 'ContrS id',
            'Equip_id' => 'Equip id',
            'Name' => 'Наименование',
            'ItemName' => 'Наименование',
            'Price' => 'Цена',
            'Quant' => 'Количество',
            'Sum' => 'Сумма',
            'Note' => 'Примечание',
        );
    }

}
