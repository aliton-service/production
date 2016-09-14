<?php

class Employees extends MainFormModel
{
    public $Employee_id;
    public $EmployeeName;
    public $Alias;
    public $RemoteAlias;
    public $Position_id;
    public $PositionName;
    public $Dep_id;
    public $DepName;
    public $Section_id;
    public $SectionName;
    public $DateStart;
    public $DateEnd;
    public $Address;
    public $Addr;
    public $Tel_home;
    public $Tel_work;
    public $Birthday;
    public $Documents;
    public $Note;
    public $upsize_ts;
    public $Territ_Id;
    public $Territ_Name;
    public $DateCreate;
    public $DateChange;
    public $UserCreate2;
    public $UserChange2;
    public $DelDate;
    public $DateBegin;
    public $Jrdc_id;
    public $JuridicalPerson;
    public $Tel_other;
    public $Dataend_trial_period;
    public $Date_motivation;
    public $Prior_result;
    public $DateTrial;
    public $BypassList;
    public $Email;
    public $WorkEmail;
    public $Region_id;
    public $Area_id;
    public $Street_id;
    public $House;
    public $Corp;
    public $Apartment;
    public $CerDateIn;
    public $CerDateOut;
    public $Information;
    public $dir_and_manager;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $EmplChange;
    public $EmplDel;
    public $Role_id;
    public $ShortName;
        
    public function rules()
    {
        return array(
            array('EmployeeName', 'required'),
            array('Employee_id,
                    EmployeeName,
                    ShortName,
                    Alias,
                    RemoteAlias,
                    Position_id,
                    Dep_id,
                    Section_id,
                    DateStart,
                    DateEnd,
                    Address,
                    Tel_home,
                    Tel_work,
                    Birthday,
                    Documents,
                    Note,
                    upsize_ts,
                    Territ_Id,
                    DateCreate,
                    DateChange,
                    UserCreate2,
                    UserChange2,
                    DelDate,
                    DateBegin,
                    Jrdc_id,
                    Tel_other,
                    Dataend_trial_period,
                    Date_motivation,
                    Prior_result,
                    DateTrial,
                    BypassList,
                    Email,
                    WorkEmail,
                    Region_id,
                    Area_id,
                    Street_id,
                    House,
                    Corp,
                    Apartment,
                    CerDateIn,
                    CerDateOut,
                    Information,
                    dir_and_manager,
                    Lock,
                    EmplLock,
                    DateLock,
                    EmplCreate,
                    EmplChange,
                    EmplDel,
                    Role_id', 'safe')
        );
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_EMPLOYEES';
        $this->SP_UPDATE_NAME = 'UPDATE_Employees';
        $this->SP_DELETE_NAME = 'DELETE_EMPLOYEES';
        
        $Select = " Select 
                        e.Employee_id,
                        e.EmployeeName,
                        dbo.FIO(e.EmployeeName) ShortName,
                        e.Alias,  
                        e.Position_id,
                        p.PositionName,
                        e.Dep_id,
                        d.DepName,
                        e.Section_id,
                        s.SectionName,
                        e.DateStart,
                        e.DateEnd,
                        e.Address,
                        e.Tel_home,
                        e.Tel_work,
                        e.Birthday,
                        e.Documents,
                        e.Note,
                        e.Territ_Id,
                        t.Territ_Name,
                        e.Jrdc_id,
                        j.JuridicalPerson,
                        e.DateBegin,
                        e.Tel_other,
                        e.Email,
                        e.WorkEmail,
                        e.Dataend_trial_period,
                        e.Date_motivation,
                        e.Prior_result,
                        e.DateTrial,
                        e.BypassList,
                        p.TrialPeriod,
                        e.Region_id,
                        e.Area_id,
                        e.Street_id,
                        e.House,
                        e.Corp,
                        e.Apartment,
                        e.CerDateIn,
                        e.CerDateOut,
                        e.Information,
                        e.Role_id,
                        dbo.address(e.region_id, e.street_id, e.house, e.corp, e.apartment) as Addr";
        $From = "\nFrom Employees e left join Positions p on (e.Position_id = p.Position_id)
                         left join Departments d on (e.Dep_id = d.Dep_id)
                         left join Sections s on (e.Section_id = s.Section_id)
                         left join Territory t on (e.Territ_id = t.Territ_id)
                         left join Juridicals j on (e.Jrdc_id = j.Jrdc_id)";
        $Where = "\nWhere e.DelDate is Null";
        $Order = "\nOrder by e.EmployeeName";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'e.Employee_id';
        $this->PrimaryKey = 'Employee_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Employee_id' => 'ФИО',
                    'EmployeeName' => 'ФИО',
                    'Alias' => 'Логин',
                    'RemoteAlias' => 'Удаленный логин',
                    'Position_id' => 'Должность',
                    'Dep_id' => 'Отдел',
                    'Section_id' => 'Служба',
                    'DateStart' => 'Дата приема',
                    'DateEnd' => 'Дата увольнения',
                    'Address' => 'Адрес',
                    'Tel_home' => 'Домашний телефон',
                    'Tel_work' => 'Рабочий телефон',
                    'Birthday' => 'День рождения',
                    'Documents' => 'Документы',
                    'Note' => 'Примечание',
                    'upsize_ts' => '',
                    'Territ_Id' => 'Участок',
                    'DateCreate' => '',
                    'DateChange' => '',
                    'UserCreate2' => '',
                    'UserChange2' => '',
                    'DelDate' => '',
                    'DateBegin' => 'Дата приема на постоянную работу',
                    'Jrdc_id' => 'Юр. лицо',
                    'Tel_other' => 'Другие телефоны',
                    'Dataend_trial_period' => '',
                    'Date_motivation' => 'Система мотивации',
                    'Prior_result' => 'Предварительные итоги',
                    'DateTrial' => 'Дата окончания испытательного срока',
                    'BypassList' => 'Подписание обходного листа',
                    'Email' => 'Личный e-mail',
                    'WorkEmail' => 'Рабочий e-mail',
                    'Region_id' => 'Регион',
                    'Area_id' => 'Район',
                    'Street_id' => 'Улица',
                    'House' => 'Дом',
                    'Corp' => 'Корпус',
                    'Apartment' => 'Помещение',
                    'CerDateIn' => 'Дата выдачи удостоверения',
                    'CerDateOut' => 'Дата сдачи удостоверения',
                    'Information' => 'Информация',
                    'dir_and_manager' => '',
                    'Lock' => '',
                    'EmplLock' => '',
                    'DateLock' => '',
                    'EmplCreate' => '',
                    'EmplChange' => '',
                    'EmplDel' => '',
                    'Role_id' => '',
            );
    }


    public function getData($filter=array()) {
        $q = new SQLQuery();
        $q->setSelect("Select Employee_id, EmployeeName");
        $q->setFrom("\nFrom Employees");
        $q->setWhere("\nWhere DelDate is Null");
        $q->setFilter($filter);
        return $q->QueryAll();
    }


    static function getSalaryPerHour($id) {
        $year = date('Y');
        $sql = "select
                    c.salary * 12 / dbo.get_whours_diff(1, '01.01.$year', '31.12.$year') salary
                From Conditions c
                Where c.empl_id = $id";
        return Yii::app()->db->createCommand($sql)->queryScalar();

    }
}
