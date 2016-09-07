<?php

class Months extends MainFormModel
{
    public $Month_id;
    public $Month_name;
    public $Month_name_eu;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';

    public function rules()
    {
        return array(
            array('Month_id', 'numerical', 'integerOnly'=>true),
            array('Month_id, Month_name, Month_name_eu', 'required'),
            array('Month_id, Month_name, Month_name_eu', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_Months';
        $this->SP_UPDATE_NAME = 'UPDATE_Months';
        $this->SP_DELETE_NAME = 'DELETE_Months';

        
        parent::__construct($scenario);
        $select = "
            select
                m.Month_id,
                m.Month_name,
                m.Month_name_eu
        ";

        $from = "
            from Months m
        ";

//        $where = "
//	";
//
//        $order = "
//        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'm.Month_id';
        $this->PrimaryKey = 'Month_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
//	$this->Query->setWhere($where);
//        $this->Query->setOrder($order);
    }
        
    public function attributeLabels()
    {
        return array(
            'Month_id' => 'Month_id',
            'Month_name' => 'Month_name',
            'Month_name_eu' => 'Month_name_eu',
        );
    }

}
