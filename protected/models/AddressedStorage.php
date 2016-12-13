<?php

class AddressedStorage extends MainFormModel
{
    public $Adst_id;
    public $Equip_id;
    public $Adsys_id;
    public $AddressSystem;
    public $EmplCreate;
    public $EmplChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_AddressedStorage';
        $this->SP_UPDATE_NAME = 'UPDATE_AddressedStorage';
        $this->SP_DELETE_NAME = 'DELETE_AddressedStorage';

        $Select = "\nSelect
                        ads.Adst_id,
                        ads.Equip_id,
                        ads.Adsys_id,
                        s.AddressSystem";
        $From = "\nFrom AddressedStorage ads left join AddressSystems s on (ads.Adsys_id = s.AddressSystem_id)";
        $Where = "\nWhere ads.Deldate is null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        $this->KeyFiled = 'ads.Adst_id';
        $this->PrimaryKey = 'Adst_id';
    }
    
    public function rules()
    {
        return array(
            array('Equip_id', 'required'),
            array('Adst_id,
                    Equip_id,
                    Adsys_id,
                    AddressSystem,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Adst_id' => '',
            'Equip_id' => '',
            'Adsys_id' => '',
            'AddressSystem' => '',
        );
    }
}




