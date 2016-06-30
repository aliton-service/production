<?php

class FormsOfOwnership extends MainFormModel
{
    public $fown_id;
    public $name;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    
    public function rules()
    {
        return array(
                array(''
                    . ' fown_id,
                        name,
                        Lock,
                        EmplLock,
                        DateLock,
                        EmplCreate,
                        DateCreate,
                        EmplChange,
                        DateChange,
                        EmplDel', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
            parent::__construct($scenario);
        
            $this->SP_INSERT_NAME = 'INSERT_FormsOfOwnership';
            $this->SP_UPDATE_NAME = 'UPDATE_FormsOfOwnership';
            $this->SP_DELETE_NAME = 'DELETE_FormsOfOwnership';

            $Select =   "Select
                            fo.fown_id,
                            fo.name,
                            fo.Lock,
                            fo.EmplLock,
                            fo.DateLock,
                            fo.EmplCreate,
                            fo.DateCreate,
                            fo.EmplChange,
                            fo.DateChange,
                            fo.EmplDel";
            $From =     "\nFrom FormsOfOwnership fo";
            $Order =    "\nOrder by fo.name";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setOrder($Order);
            
            $this->KeyFiled = 'p.fown_id';
    
        }
    
    public function attributeLabels()
    {
        return array(
                'fown_id' => 'Fown',
                'name' => 'Name',
                'Lock' => 'Lock',
                'DateLock' => 'Date Lock',
                'EmplLock' => 'Empl Lock',
                'DateChange' => 'Date Change',
                'EmplChange' => 'Empl Change',
                'EmplDel' => 'Empl Del',
        );
    }

    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
}
