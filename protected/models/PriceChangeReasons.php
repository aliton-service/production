<?php

class PriceChangeReasons extends MainFormModel
{
    public $Reason_id;
    public $ReasonName;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';


    public function rules()
    {
        return array(
            array('Reason_id', 'numerical', 'integerOnly'=>true),
            array('ReasonName', 'required'),
            array('Reason_id, ReasonName', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_PriceChangeReasons';
        $this->SP_UPDATE_NAME = 'UPDATE_PriceChangeReasons';
        $this->SP_DELETE_NAME = 'DELETE_PriceChangeReasons';
        
        parent::__construct($scenario);
        $select = "
            select 
                r.Reason_id,
                r.ReasonName
        ";

        $from = "
            from PriceChangeReasons r
        ";

//        $where = "
//	";

        $order = "
            order by r.ReasonName
        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'r.Reason_id';
        $this->PrimaryKey = 'Reason_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
//	$this->Query->setWhere($where);
        $this->Query->setOrder($order);
    }
        
    public function attributeLabels()
    {
        return array(
            'Reason_id' => 'Reason id',
            'ReasonName' => 'ReasonName',
        );
    }

}
