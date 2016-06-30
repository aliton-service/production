<?php

/*
    Модель - список объектов, на форме для диспетчеров
*/

class AddressList extends MainFormModel
{
    public $Object_id;
    public $ObjectGr_id;
    public $Address_id;
    public $Addr;
    
    public function rules() {
        return array(
            array(
                'Object_id',
                'ObjectGr_id',
                'Address_id',
                'Addr', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_Objects';
        $this->SP_UPDATE_NAME = 'UPDATE_Objects';
        $this->SP_DELETE_NAME = 'DELETE_Objects';
        
        $Select  =  "\nSelect 
                        o.Object_id,
                        o.ObjectGr_id,
                        o.Address_id,
                        a.Addr + CASE WHEN o.Doorway IS NULL THEN '' ELSE ', п. ' + o.Doorway END AS Addr,
                        a.Street_id,
                        a.House";
        $From =     "\nFrom dbo.Objects AS o inner join dbo.ObjectsGroup AS og ON o.ObjectGr_id = og.ObjectGr_id 
                        left join dbo.Addresses_v AS a ON og.Address_id = a.Address_id ";
        $Where =    "\nWhere (o.DelDate IS NULL)
                        AND (og.DelDate IS NULL)
                        AND (o.Doorway <> 'Общее')";
        $Order =    "\nOrder by a.Addr";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'o.Object_id';
        $this->PrimaryKey = 'Object_id';
    }
    
    public function attributeLabels()
    {
        return array(
                'Object_id' => 'Объект',
                'ObjectGr_id' => 'Дом',
                'Address_id' => 'Адрес',
                'Addr' => 'Адрес',
            );
    }
}




