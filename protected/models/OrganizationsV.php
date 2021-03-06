<?php

class OrganizationsV extends MainFormModel
{
	public $Form_id;
	public $FormName;
	public $fown_id;
	public $FownName;
	public $FullName;
	public $lph_id;
	public $TaxNumber;
	public $SettlementAccount;
	public $City;
	public $bank_id;
	public $inn;
	public $account;
	public $kpp;
	public $jregion;
	public $jarea;
	public $jstreet;
        public $JStreetSearch;
	public $jhouse;
	public $jcorp;
	public $jroom;
	public $fregion;
	public $farea;
	public $fstreet;
        public $FStreetSearch;
	public $fhouse;
	public $fcorp;
	public $froom;
	public $telephone;
	public $bank_name;
        public $BankSearch;
	public $bik;
	public $cor_account;
	public $cityb;
	public $lph_name;
	public $DEBT;
	public $sum_price; 
	public $sum_appz_price;
	public $JAddress;
	public $FAddress;
        public $EmplCreate;
        public $EmplChange;
        public $date_create;
        public $date_change;
        public $Number;
        public $Status_id;
        public $Segment_id;
        public $SubSegment_id;
        public $SourceInfo_id;
        public $SubSourceInfo_id;
        public $BrandName;
        public $WWW;
        public $CountObjects;
        
        
	public function rules()
	{
            return array(
                    array('FormName, fown_id', 'required'),
                    array('FormName', 'FormNameValidate'),
                    array('inn', 'INNValidate'),
                    array('Form_id,
                            FormName,
                            fown_id,
                            FownName,
                            FullName,
                            lph_id,
                            TaxNumber,
                            SettlementAccount,
                            City,
                            bank_id,
                            inn,
                            account,
                            kpp,
                            jregion,
                            jarea,
                            jstreet,
                            jhouse,
                            jcorp,
                            jroom,
                            fregion,
                            farea,
                            fstreet,
                            JStreetSearch,
                            fhouse,
                            fcorp,
                            froom,
                            telephone,
                            bank_name,
                            BankSearch,
                            bik,
                            cor_account,
                            cityb,
                            lph_name,
                            DEBT,
                            sum_price, 
                            sum_appz_price,
                            JAddress,
                            FAddress,
                            Number,
                            Status_id,
                            Segment_id,
                            SubSegment_id,
                            SourceInfo_id,
                            SubSourceInfo_id,
                            BrandName,
                            WWW,
                            CountObjects', 'safe'),
            );
	}
        
        public function FormNameValidate($attribute, array $params = array()) {
            $Forms = new OrganizationsV();
            
            if ($this->Form_id != '')
                $Forms = $Forms->Find(array(), array(
                    'p.Form_id <> \'' . $this->Form_id . '\'',
                    'p.FormName = \'' . $this->FormName . '\'',
                    'p.fown_id = ' . $this->fown_id,
                ));
            else
                $Forms = $Forms->Find(array(), array(
                    'p.FormName = \'' . $this->FormName . '\'',
                ));
            
            if (count($Forms) > 0)
                $this->addError($attribute, 'Организация с таким именем уже заведена');
        }
        
        public function INNValidate($attribute, array $params = array()) {
            $Forms = new OrganizationsV();
            
            if ($this->inn == '')
                return;
            
            if ($this->Form_id != '')
                $Forms = $Forms->Find(array(), array(
                    'p.Form_id <> \'' . $this->Form_id . '\'',
                    'p.inn = \'' . $this->inn . '\'',
                    
                ));
            else
                $Forms = $Forms->Find(array(), array(
                    'p.inn = \'' . $this->inn . '\'',
                ));
            
            if (count($Forms) > 0)
                $this->addError($attribute, 'Организация с таким ИНН уже заведена');
        }
        
        public function __construct($scenario = '') {
            parent::__construct($scenario);
        
            $this->SP_INSERT_NAME = 'INSERT_PropForms';
            $this->SP_UPDATE_NAME = 'UPDATE_PropForms';
            $this->SP_DELETE_NAME = 'DELETE_PropForms';

            $Select =   "Select "
                        ."  p.*,"
                        ."  st1.StreetName as JStreetSearch,"
                        ."  st2.StreetName as FStreetSearch,"
                        ."  p.bank_name as BankSearch";
            $From =     "\nFrom Organizations_v p left join Streets st1 on (p.jstreet = st1.Street_id)"
                        ."\nleft join Streets st2 on (p.fstreet = st2.Street_id)";
            $Order =    "\nOrder by p.FullName";
            $Where =    "\nWhere p.DelDate is null";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);
            
            
            $this->KeyFiled = 'p.Form_id';
    
        }

	
	public function attributeLabels()
	{
            return array(
                    'Form_id' => 'Form',
                    'FormName' => 'Наименование',
                    'fown_id' => 'Форма собственности',
                    'JStreetSearch' => 'JStreetSearch',
                    'FStreetSearch' => 'FStreetSearch',
                    'BankSearch' => 'BankSearch',

            );
	}

	
}
