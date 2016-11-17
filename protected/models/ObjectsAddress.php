<?php

class ObjectsAddress extends MainFormModel
{
    public $Address_id;
    public $Region_id;
    public $Street;
    public $StreetType_id;
    public $House;
    public $Corp;
    public $Note;
    public $Street_id;
    public $Room;	
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_OBJECTSADDRESS';
        
        $Select = "\nSelect
                        oa.Address_id,
                        oa.Region_id,
                        oa.Street,
                        oa.StreetType_id,
                        oa.House,
                        oa.Corp,
                        oa.Note,
                        oa.Street_id,
                        oa.Room";
        $From = "\nFrom ObjectsAddress oa";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        
        $this->KeyFiled = 'oa.Address_id';
        $this->PrimaryKey = 'Address_id';
    }
    
    public function rules()
    {
        return array(
            array('Address_id,
                    Region_id,
                    Street,
                    StreetType_id,
                    House,
                    Corp,
                    Note,
                    Street_id,
                    Room,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Address_id' => '',
            'Region_id' => '',
            'Street' => '',
            'StreetType_id' => '',
            'House' => '',
            'Corp' => '',
            'Note' => '',
            'Street_id' => '',
            'Room' => '',
        );
    }
}




