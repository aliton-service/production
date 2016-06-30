<?php

class SystemAvailabilitys extends MainFormModel
{
	
    public $code_id;
    public $availability;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    
    public function rules()
    {
        return array(
            array('code_id, availability, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe'),
        );
    }

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        sa.code_id,
                        sa.availability,
                        sa.Lock,
                        sa.EmplLock,
                        sa.DateLock,
                        sa.EmplCreate,
                        sa.DateCreate,
                        sa.EmplChange,
                        sa.DateChange,
                        sa.EmplDel,
                        sa.DelDate";
        $From = "\nFrom SystemAvailabilitys sa";
        $Where = "\nWhere sa.DelDate is null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'sa.code_id';
        $this->PrimaryKey = 'code_id';
    }
	
}
