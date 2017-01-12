<?php

class ContractsDetails_v extends MainFormModel
{
    public $csdt_id;
    public $ContrS_id;
    public $Equip_id;
    public $Name;
    public $ItemName;
    public $um_name;
    public $price;
    public $Quant;
    public $sum;
    public $Note;
    public $EmplCreate;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';


    public function rules()
    {
        return array(
            array('csdt_id, ContrS_id, Equip_id, Quant', 'numerical', 'integerOnly'=>true),
            array('Name, price, Quant', 'required'),
            array('price, sum', 'numerical'),
            array('Name, ItemName', 'length', 'max'=>150),
            array('Note', 'length', 'max'=>1073741823),
            array('sum', 'length', 'max'=>19),
            array('csdt_id, ContrS_id, Equip_id, Name, ItemName, um_name, price, Quant, sum, Note', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_ContractsDetails';
        $this->SP_UPDATE_NAME = 'UPDATE_ContractsDetails';
        $this->SP_DELETE_NAME = 'DELETE_ContractsDetails';
        
        parent::__construct($scenario);
        $select = "
            Select
                c.csdt_id,
                c.ContrS_id,
                c.Equip_id,
                c.Name,
                c.ItemName,
                c.um_name,
                c.price,
                c.Quant,
                c.sum,
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
        
    public function attributeLabels()
    {
        return array(
            'csdt_id' => 'csdt id',
            'ContrS_id' => 'ContrS id',
            'Equip_id' => 'Equip id',
            'Name' => 'Наименование',
            'ItemName' => 'Наименование',
            'price' => 'Цена',
            'Quant' => 'Количество',
            'sum' => 'Сумма',
            'Note' => 'Примечание',
        );
    }

}
