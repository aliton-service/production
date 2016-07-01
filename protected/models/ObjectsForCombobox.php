<?php

class ObjectsForCombobox extends MainFormModel
{
    public $Object_id;
    public $ObjectGr_id;
    public $Addr;
    
    public function rules() {
        return array(
            array('Object_id,
                    ObjectGr_id,
                    Addr', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';
        
        $Select =   "Select
                        o.Object_id,
                        o.ObjectGr_id,
                        a.Addr";
        $From =     "\nFrom Objects o inner join Addresses_v a on (o.Address_id = a.Address_id)";
        $Where =    "\nWhere o.DelDate is null
                            and ISNULL(a.Addr, '') <> ''";
        $Order = "Order by a.Addr";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'o.Object_id';
    }
    
    public function attributeLabels()
    {
        return array(
                'Object_id' => 'Object_id',
                'ObjectGr_id' => 'ObjectGr_id',
                'Addr' => 'Addr',
            );
    }
}

