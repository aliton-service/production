<?php

class SystemCompetitors extends MainFormModel
{
	
    public $SystemCompetitor_id;
    public $ObjectsGroupSystem_id;
    public $Cmtr_id;
    public $Competitor;
    public $user_create2;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $EmplChange;
    public $DelDate;
    public $EmplDel;
    
    public function rules()
    {
        return array(
            array('SystemCompetitor_id, ObjectsGroupSystem_id, user_create2, Cmtr_id, Lock, EmplLock, DateLock, EmplCreate, EmplChange,  EmplDel, DelDate', 'safe'),
        );
    }

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        sc.SystemCompetitor_id,
                        sc.ObjectsGroupSystem_id,
                        sc.user_create2,
                        sc.Cmtr_id,
                        cts.Competitor,
                        sc.Lock,
                        sc.EmplLock,
                        sc.DateLock,
                        sc.EmplCreate,
                        sc.EmplChange,
                        cts.DelDate,
                        sc.EmplDel";
        $From = "\nFrom SystemCompetitors sc left join Competitors cts on (sc.Cmtr_id = cts.cmtr_id)";
        $Where = "\nWhere cts.DelDate is null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'sc.SystemCompetitor_id';
        $this->PrimaryKey = 'SystemCompetitor_id';
    }
	
}
