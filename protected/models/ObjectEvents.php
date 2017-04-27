<?php

class ObjectEvents extends MainFormModel
{
    public $evnt_id;
    public $evtp_id;
    public $eventtype;
    public $ObjectGr_id;
    public $date;
    public $date_plan;
    public $date_exec;
    public $date_act;
    public $empl_id;
    public $employeename;
    public $rpfr_id;
    public $who_reported;
    public $evaluation;
    public $prds_id;
    public $Note;
    public $user_create;
    public $date_create;
    public $achs_id;
    public $ac_date;
    public $empl_name;
    public $empl_name3;
    public $add_date_act;
    public $empl_name4;
    public $add_date_exec;

   /**
     * @return string the associated database table name
     */
    

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_ObjectEvents';
        $this->SP_UPDATE_NAME = 'UPDATE_ObjectEvents';
        $this->SP_DELETE_NAME = 'DELETE_ObjectEvents';

        $select = "Select
            e.evnt_id,
            e.evtp_id,
            et.eventtype,
            e.objectgr_id as ObjectGr_id,
            e.date,
            e.date_plan,
            e.date_exec,
            e.date_act,
            e.empl_id,
            dbo.fio(emp.employeename) employeename,
            e.rpfr_id,
            e.who_reported,
            e.evaluation,
            e.prds_id,
            e.Note,
            e.user_create,
            e.date_create,
            e.achs_id,
            ah.ac_date,
            dbo.fio(e2.employeename) empl_name,
            dbo.fio(e3.employeename) empl_name3,
            e.add_date_act,
            dbo.fio(e4.employeename) empl_name4,
            e.add_date_exec";
        $from = "\nFrom Events e 
                    left join EventTypes et on (e.evtp_id = et.evtp_id)
                    left join Employees_ForObj_v emp on (emp.Employee_id = e.empl_id)
                    left join planactionhistory ah on (e.achs_id = ah.achs_id and ah.deldate is null)
                    left join employees_forobj_v e2 on (e2.alias = ah.user_create or e2.remotealias = ah.user_create)
                    left join employees_forobj_v e3 on (e3.alias = e.user_date_act or e3.remotealias = e.user_date_act)
                    left join employees_forobj_v e4 on (e4.alias = e.user_date_exec or e4.remotealias = e.user_date_exec)
                    ";
        $Where =    "\nWhere e.deldate is null"; 
        
        $Order =    "\nOrder by et.eventtype, e.date desc";

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($Where);       
        $this->Query->setOrder($Order);

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'e.evnt_id';
        $this->PrimaryKey = 'evnt_id';


    }

    public function tableName()
    {
        return 'ObjectEvents';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('', 'required'),
            array('evnt_id,
            evtp_id,
            eventtype,
            objectgr_id,
            date,
            date_plan,
            date_exec,
            date_act,
            empl_id,', 'safe'),
        );
    }

    

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'evnt_id' => 'evnt_id',
            'objectgr_id' => 'objectgr_id',
        );
    }

   

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Regions the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}

