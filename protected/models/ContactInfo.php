<?php


class ContactInfo extends MainFormModel
{
    public $Info_id;
    public $ObjectGr_id;
    public $FIO;
    public $Telephone;
    public $Cstm_id;
    public $Note;
    public $Birthday;
    public $Email;
    public $WorkTelephone;
    public $OrgTelephone;
    public $Main;
    public $CTelephone;
    public $ForReport;   
    public $CustomerName;
    public $EmplCreate;
    public $EmplChange;
    public $contact;
    public $NoSend;
    public $CName;
    public $dep;

        
     
    public function rules() {
        return array(
            /* обязательные поля*/
            array('ObjectGr_id, FIO, Cstm_id, Telephone', 'required'),
            array('Telephone,'
                . 'Cstm_id,'
                . 'CustomerName,'
                . 'Note,'
                . 'Birthday,'
                . 'Email,'
                . 'WorkTelephone,'
                . 'OrgTelephone,'
                . 'Main,'
                . 'CTelephone,'
                . 'ForReport,'
                . 'EmplCreate,'
                . 'EmplChange,'
                . 'NoSend', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_ContactInfo';
        $this->SP_UPDATE_NAME = 'UPDATE_ContactInfo';
        $this->SP_DELETE_NAME = 'DELETE_ContactInfo';
        
        $Select =   "Select"
                    ."  ci.Info_id,"
                    ."  ci.ObjectGr_id,"
                    ."  ci.FIO,"
                    ."  ci.Telephone,"
                    ."  ci.Cstm_id,"
                    ."  c.CustomerName,"
                    ."  ci.Note,"
                    ."  ci.Birthday,"
                    ."  ci.Email,"
                    ."  ci.WorkTelephone,"
                    ."  ci.OrgTelephone,"
                    ."  ci.Main,"
                    ."  ci.CTelephone,"
                    ."  ci.ForReport,"
                    ."  ci.EmplCreate,"
                    ."  ci.EmplChange,"
                    ."  ci.NoSend,"
                    ."  ci.FIO + ' (' + ISNULL(c.CustomerName + ', ', '') + ISNULL(ci.telephone, '') + CASE WHEN ci.ctelephone IS NOT NULL THEN ', ' + ci.ctelephone + ')' ELSE ')' END AS contact,"
                    ."  ISNULL(c.Reduction + ' - ', '') + isNull(ci.FIO, '') +
                            case when isNull(ci.telephone, '') <> '' or isNull(ci.ctelephone, '') <> ''
                            then ', тел.:' + isNull(ci.telephone + '', '') + isNull(ci.ctelephone, '') else '' end CName";
        $From =     "\nFrom ContactInfo ci left join Customers c on (ci.Cstm_id = c.Customer_Id)"
                    . "     left join ObjectsGroup og on (ci.ObjectGr_id = og.ObjectGr_id)";
        $Where =    "\nWhere ci.DelDate is Null";
        $Order =    "\nOrder by ci.Info_id";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        $this->KeyFiled = 'ci.Info_id';
        
    }
    
    public function attributeLabels()
    {
            return array(
                    'info_id' => 'Info_id',
                    'ObjectGr_id' => 'ObjectGr_id',
                    'FIO' => 'Контактное лицо',
                    'Telephone' => 'Домашний телефон',
                    'Cstm_id' => 'Должность',
                    'note' => 'Примечание',
                    'Birthday' => 'День рождения',
                    'DelDate' => 'DelDate',
                    'Email' => 'Почта',
                    'WorkTelephone' => 'Раб. телефон',
                    'OrgTelephone' => 'Телефон организации',
                    'Main' => 'Лицо принимающее решение',
                    'CTelephone' => 'Сотовый телефон',
                    'ForReport' => 'Для отчетов',
                    'NoSend' => 'Эл. почту не отправлять',
                    'CName' => 'Перед кем отчитался',
            );
    } 


    public function getContactList($id){
  
        $Command = Yii::app()->db->createCommand(
        "select i.info_id as id, i.ObjectGr_id,
               c.CustomerName + ' - ' + i.FIO + ', тел.:' + i.telephone +
               case when i.ctelephone is Null then '' else ', ' + i.ctelephone end as value
        from ContactInfo i left join Customers c on (i.cstm_id = c.Customer_id)
        where i.ObjectGr_id = {$id}"
        );
        
        return $Command->queryAll();
  
    }

    static function getData() {
        $q = new SQLQuery();
        $q->setSelect("Select i.Info_id as id, i.ObjectGr_id,
               c.CustomerName + ' - ' + i.FIO + ', тел.:' + i.telephone +
               case when i.ctelephone is Null then '' else ', ' + i.ctelephone end as contact");
        $q->setFrom("\nFrom ContactInfo i left join Customers c on (i.cstm_id = c.Customer_id)");
        $q->setWhere("\nWhere i.DelDate is Null");
        return $q->QueryAll();
    }
    
}
