<?php

class Contacts extends MainFormModel
{
    public $cont_id;
    public $ObjectGr_id;
    public $date;
    public $cntp_id;
    public $cntp_name;
    public $info_id;
    public $contact;
    public $empl_id;
    public $empl_name;
    public $UserCreateName;
    public $text;
    public $rslt_id;
    public $rslt_name;
    public $note;
    public $drsn_id;
    public $drsn_name;
    public $pay_date;
    public $next_date;
    public $next_cntp_id;
    public $sourceInfo_name;
    public $next_cntp_name;
    public $next_info_id;
    public $next_contact;
    public $Telephone;
    public $Kind;
    public $SourceInfo_id;
    public $Kind_Name;
    public $base_name;
    public $PaySum;
    public $time_length;
    public $EmplDel;
    public $GroupContact;
    public $EmplChange;
    public $EmplCreate;


   /**
     * @return string the associated database table name
     */
    
    


    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Contacts';
        $this->SP_UPDATE_NAME = 'UPDATE_Contacts';
        $this->SP_DELETE_NAME = 'DELETE_Contacts';

        $select = "Select 
                    c.cont_id,
                    c.ObjectGr_id,
                    c.date,
                    c.cntp_id,
                    ct.ContactName as cntp_name,
                    c.info_id,
                    ci.contact,
                    c.empl_id,
                    dbo.FIO(e.EmployeeName) empl_name,
                    dbo.FIO(e1.EmployeeName) UserCreateName,
                    c.text,
                    c.rslt_id,
                    r.ResultName rslt_name,
                    c.note,
                    c.drsn_id,
                    dr.name drsn_name,
                    c.pay_date,
                    c.next_date,
                    c.next_cntp_id,
                    si.sourceInfo_name,
                    ct2.ContactName as next_cntp_name,
                    c.next_info_id,
                    ci2.contact next_contact,
                    c.Telephone,
                    c.Kind,
                    c.SourceInfo_id,
                    ck.Kind_Name,
                    case when bn.base_name = 'База монтажа и отдела продаж' then 'Монтаж'
                    when bn.base_name = 'База СЦ' then 'СЦ'
                    when bn.base_name = 'База ОП' then 'ОП'
                    else 'СЦ' end GroupContact,
                    c.PaySum,
                    c.time_length,
                    c.EmplChange,
                    c.EmplCreate
                    ";
        $from = "\nFrom Contacts c left join ContactTypes ct on (c.cntp_id = ct.contact_id)
                    left join ContactInfo_v ci on (c.info_id = ci.info_id)
                     left join Employees_ForObj_v  e on (c.empl_id = e.Employee_id)
                    left join Results r on (c.rslt_id = r.Result_id) 
                     left join DebtReasons dr on (c.drsn_id =dr.drsn_id)
                    left join ContactTypes ct2 on (c.next_cntp_id = ct2.contact_id)
                     left join ContactInfo_v ci2 on (c.next_info_id = ci2.info_id)
                     left join ContactKinds ck on (c.Kind = ck.Kind_id)
                    left join Departments d on (e.Dep_id = d.Dep_id)
                     left join Basenames bn on (d.bn_id = bn.bn_id)
                    left join SourceInfo si on si.sourceInfo_id=c.SourceInfo_id
                     left join Employees_ForObj_v e1 on (c.EmplCreate = e1.Employee_id)
                    ";

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        // $this->Query->AddWhere('c.EmplDel IS NULL ');        
        $this->Query->setOrder('order by c.date desc');

        
        // Инициализация первичного ключа
        $this->KeyFiled = 'c.cont_id';
        $this->PrimaryKey = 'cont_id';


    }

    public function tableName()
    {
        return 'Contacts';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            
            array('cont_id, '
                . 'ObjectGr_id, '
                . 'date, cntp_id, '
                . 'EmplDel, '
                . 'cntp_name, '
                . 'info_id, '
                . 'contact, '
                . 'empl_id, '
                . 'empl_name, '
                . 'UserCreateName, '
                . 'text, '
                . 'rslt_id, '
                . 'rslt_name, '
                . 'note, '
                . 'drsn_id, '
                . 'drsn_name, '
                . 'pay_date, '
                . 'next_date, '
                . 'next_cntp_id, '
                . 'sourceInfo_name, '
                . 'next_cntp_name, '
                . 'next_info_id, '
                . 'next_contact, '
                . 'Telephone, '
                . 'Kind, '
                . 'SourceInfo_id, '
                . 'Kind_Name, '
                . 'base_name, '
                . 'PaySum, '
                . 'time_length, '
                . 'EmplCreate, '
                . 'EmplChange', 'safe'),
        );
    }

    

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'cont_id' => 'cont_id',
            'ObjectGr_id' => 'ObjectGr_id',
            'date' => 'Дата',
            'cntp_id' => 'Тип контакта',
            'cntp_name' => 'Тип контакта',
            'info_id' => 'Контактное лицо',
            'contact' => 'contact',
            'empl_id' => 'Исполнитель',
            'empl_name' => 'empl_name',
            'UserCreateName' => 'UserCreateName',
            'text' => 'text',
            'rslt_id' => 'Результат',
            'rslt_name' => 'rslt_name',
            'note' => 'Примечание',
            'drsn_id' => 'Причина долга',
            'drsn_name' => 'drsn_name',
            'pay_date' => 'Дата согласованной оплаты',
            'next_date' => 'Дата следующего контакта',
            'next_cntp_id' => 'Тип следующего контакта',
            'sourceInfo_name' => 'sourceInfo_name',
            'next_cntp_name' => 'next_cntp_name',
            'next_info_id' => 'Контактное лицо',
            'next_contact' => 'next_contact',
            'Telephone' => 'Телефоны',
            'Kind' => 'Kind',
            'SourceInfo_id' => 'Источник информации о фирме',
            'Kind_Name' => 'Тема контакта',
            'base_name' => 'base_name',
            'PaySum' => 'Сумма согласованной оплаты',
            'time_length' => 'Времязатратность',
            'EmplDel' => 'EmplDel'
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

