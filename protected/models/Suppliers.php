<?php

class Suppliers extends MainFormModel
{

	public $Supplier_id = null;
	public $NameSupplier = null;
	public $Adress = null;
	public $Tel = null;
	public $ContactFace = null;
	public $Properties = null;
	public $Note = null;
	public $DateInsert = null;
	public $DateChange = null;
	public $UserInsert2 = null;
	public $UserChange2 = null;
        public $isContract;
	public $Producer = null;
	public $Supplier = null;
	public $Repair = null;
	public $DelDate = null;
	public $FullName = null;
	public $user_create2 = null;
	public $date_create = null;
	public $user_change2 = null;
	public $date_change = null;
	public $DateLastContact;
	public $DateLastPurchase;
        public $bank_name;
	public $bank_id = null;
	public $inn = null;
	public $account = null;
        public $cor_account;
        public $bik;
	public $kpp = null;
	public $Lock = null;
	public $EmplLock = null;
	public $DateLock = null;
	public $EmplCreate = null;
	public $EmplChange = null;
	public $EmplDel = null;

	function __construct($scenario = '') {

		parent::__construct($scenario);

		$this->SP_INSERT_NAME = 'INSERT_Suppliers';
		$this->SP_UPDATE_NAME = 'UPDATE_Suppliers';
		$this->SP_DELETE_NAME = 'DELETE_Suppliers';

		$select = "\nSelect "
                            . "s.Supplier_id,
                               s.NameSupplier,
                               s.Adress,
                               s.Tel,
                               s.ContactFace,
                               s.Properties,
                               s.Note,
                               s.isContract,
                               s.Producer,
                               s.Supplier,
                               s.Repair,
                               s.FullName,
                               dbo.truncdate(s.DateLastContact) as DateLastContact,
                               s.bank_id,
                               s.inn,
                               s.account,
                               s.kpp,
                               b.bank_name,
                               b.cor_account,
                               b.bik,
                               (Select
                                    Max(ah.ac_date)
                               From WHDocuments d left join ActionHistory ah on (d.achs_id = ah.achs_id)
                               Where d.dctp_id = 1 and d.splr_id = s.Supplier_Id) as DateLastPurchase";
		$from = "\nFrom Suppliers s left join Banks b on (s.bank_id = b.bank_id)";
                $Where = "\nWhere s.DelDate is null";
		$order = "\nOrder By s.NameSupplier";

		$this->Query->setSelect($select);
		$this->Query->setFrom($from);
		$this->Query->setOrder($order);
                $this->Query->setWhere($Where);
                
                $this->KeyFiled = 's.Supplier_id';
                $this->PrimaryKey = 'Supplier_id';
	}

	public function rules()
	{
            return array(
                    array('Supplier', 'TypeValidate'),
                    array('NameSupplier', 'required'),
                    array('Supplier_id,
                            NameSupplier,
                            Adress,
                            Tel,
                            ContactFace,
                            Properties,
                            Note,
                            DateInsert,
                            DateChange,
                            UserInsert2,
                            UserChange2,
                            isContract,
                            Producer,
                            Supplier,
                            Repair,
                            DelDate,
                            FullName,
                            user_create2,
                            date_create,
                            user_change2,
                            date_change,
                            DateLastContact,
                            DateLastPurchase,
                            bank_name,
                            bank_id,
                            inn,
                            bik,
                            account,
                            cor_account,
                            kpp,
                            Lock,
                            EmplLock,
                            DateLock,
                            EmplCreate,
                            EmplChange,
                            EmplDel', 'safe'),
            );
	}

        public function TypeValidate($attribute, array $params = array()) {
            if ((($this->Supplier !== 1) && ($this->Supplier !== 'true')) &&
                (($this->Producer !== 1) && ($this->Producer !== 'true')) &&
                (($this->Repair !== 1) && ($this->Repair !== 'true')))    
                    $this->addError($attribute, 'Должен быть проставлен тип Поставщик\Производитель\СРМ');
        }
        
	
	public function attributeLabels()
	{
		return array(
			'Supplier_id' => 'Supplier',
			'NameSupplier' => 'Name Supplier',
			'Adress' => 'Adress',
			'Tel' => 'Tel',
			'ContactFace' => 'Contact Face',
			'Properties' => 'Properties',
			'Note' => 'Note',
			'DateInsert' => 'Date Insert',
			'DateChange' => 'Date Change',
			'UserInsert2' => 'User Insert2',
			'UserChange2' => 'User Change2',
			'Producer' => 'Producer',
			'Supplier' => 'Supplier',
			'Repair' => 'Repair',
			'DelDate' => 'Del Date',
			'FullName' => 'Full Name',
			'user_create2' => 'User Create2',
			'date_create' => 'Date Create',
			'user_change2' => 'User Change2',
			'date_change' => 'Date Change',
			'DateLastContact' => 'Date Last Contact',
			'DateLastPurchase' => 'Date Last Purchase',
                        'bank_name' => 'bank_name',
			'bank_id' => 'Bank',
			'inn' => 'Inn',
                        'bik' => 'bik',
			'account' => 'Account',
                        'cor_account' => '',
			'kpp' => 'Kpp',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'EmplChange' => 'Empl Change',
			'EmplDel' => 'Empl Del',
		);
	}

	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select Supplier_id, NameSupplier, FullName");
		$q->setFrom("\nFrom Suppliers");
		$q->setWhere("\nWhere DelDate is null and Supplier = 1");
		$q->setOrder("\nOrder by NameSupplier");
		return $q->QueryAll();
	}
}
