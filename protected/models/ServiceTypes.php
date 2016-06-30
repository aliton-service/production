<?php

class ServiceTypes extends MainFormModel
{
    public $ServiceType_id;
    public $ServiceType;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $Lock;
    public $DateLock;
    public $EmplLock;
    public $EmplDel;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_SERVTYPES';
        $this->SP_UPDATE_NAME = 'UPDATE_SERVTYPES';
        $this->SP_DELETE_NAME = 'DELETE_SERVTYPES';

        $Select = "\nSelect
                        st.ServiceType_id,
                        st.ServiceType,
                        st.DateCreate,
                        st.EmplCreate,
                        st.DateChange,
                        st.EmplChange,
                        st.Lock,
                        st.DateLock,
                        st.EmplLock,
                        st.EmplDel";
        $From = "\nFrom ServiceTypes st";
        $Where = "\nWhere st.DelDate is null";
        $Order = "\nOrder By st.ServiceType";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'st.ServiceType_id';
        $this->PrimaryKey = 'ServiceType_id';
    }
    
    public function rules()
    {
        return array(
            array('ServiceType', 'required'),
            array('ServiceType_id,
                    ServiceType,
                    DateCreate,
                    EmplCreate,
                    DateChange,
                    EmplChange,
                    Lock,
                    DateLock,
                    EmplLock,
                    EmplDel', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'ServiceType_id' => 'Тариф обслуживания',
            'ServiceType' => 'Тариф обслуживания',
            'DateCreate' => 'DateCreate',
            'EmplCreate' => 'EmplCreate',
            'DateChange' => 'DateChange',
            'EmplChange' => 'EmplChange',
            'Lock' => 'Lock',
            'DateLock' => 'DateLock',
            'EmplLock' => 'EmplLock',
            'EmplDel' => 'EmplDel',
        );
    }
}
