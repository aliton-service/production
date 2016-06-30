<?php

class StreetTypes extends MainFormModel
{
    public $StreetType_id;
    public $StreetType;
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
            array('StreetType_id,
                    StreetType,
                    Lock,
                    EmplLock,
                    DateLock,
                    EmplCreate,
                    DateCreate,
                    EmplChange,
                    DateChange,
                    EmplDel,', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
	parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_StreetTypes';
        $this->SP_UPDATE_NAME = 'UPDATE_StreetTypes';
        $this->SP_DELETE_NAME = 'DELETE_StreetTypes';

        $Select = "Select
                        st.StreetType_id,
                        st.StreetType,
                        st.Lock,
                        st.EmplLock,
                        st.DateLock,
                        st.EmplCreate,
                        st.DateCreate,
                        st.EmplChange,
                        st.DateChange,
                        st.EmplDel";
        $From = "\nFrom StreetTypes st";
        $Order = "\nOrder by st.StreetType";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'st.StreetType_id';
        $this->PrimaryKey = 'StreetType_id';
    }

    public function attributeLabels()
    {
        return array(
            'StreetType_id' => 'Street Type',
            'StreetType' => 'Street Type',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'DateLock' => 'Date Lock',
            'EmplChange' => 'Empl Change',
            'DateChange' => 'Date Change',
            'DelDate' => 'Del Date',
            'EmplDel' => 'Empl Del',
        );
    }
}
