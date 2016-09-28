<?php

class StoragesList extends MainFormModel
{
    public $Storage_id;
    public $Storage;
    public $DelDate;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Storages';
        $this->SP_UPDATE_NAME = 'UPDATE_Storages';
        $this->SP_DELETE_NAME = 'DELETE_Storages';

        $Select = "\nSelect
                        s.storage_id,
                        s.storage,
                        s.DelDate";
        $From = "\nFrom Storages s";
        $Where = "\nWhere s.DelDate is null";
        $Order = "\nOrder by s.Storage";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 's.Storage_id';
        $this->PrimaryKey = 'Storage_id';
    }
    
    public function rules()
    {
        return array(
            array('Storage', 'required'),
            array('Storage_id,
                    Storage,
                    DelDate', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Storage_id' => 'Storage_id',
            'Storage' => 'Склад',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'DelDate' => 'DelDate',
        );
    }
}




