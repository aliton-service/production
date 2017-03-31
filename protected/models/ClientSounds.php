<?php

class ClientSounds extends MainFormModel
{
    public $Sound_id;
    public $Form_id;
    public $SoundDate;
    public $SoundName;
    public $SoundPatch;
    public $Empl_id;
    public $ShortName;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ClientSounds';
        $this->SP_UPDATE_NAME = 'UPDATE_ClientSounds';
        $this->SP_DELETE_NAME = 'DELETE_ClientSounds';

        $Select = "\nSelect
                        s.Sound_id,
                        s.Form_id,
                        s.SoundDate,
                        s.SoundName,
                        s.SoundPatch,
                        s.Empl_id,
                        e.ShortName,
                        s.DateCreate,
                        s.EmplCreate,
                        s.DateChange,
                        s.EmplChange";
        $From = "\nFrom ClientSounds s left join Employees e on (s.Empl_id = e.Employee_id)";
        $Where = "\nWhere s.DelDate is Null";
        $Order = "\nOrder by s.SoundDate Desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 's.Sound_id';
        $this->PrimaryKey = 'Sound_id';
    }
    
    public function rules()
    {
        return array(
            array('Sound_id,
                    Form_id,
                    SoundDate,
                    SoundName,
                    SoundPatch,
                    Empl_id,
                    ShortName,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Sound_id' => '',
            'Form_id' => '',
            'SoundDate' => '',
            'SoundName' => '',
            'SoundPatch' => '',
            'Empl_id' => '',
            'ShortName' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
        );
    }
}




