<?php

class OrganizationsVMin extends MainFormModel
{
	public $Form_id;
	public $FormName;
	public $FullName;
	public $inn;
	public $account;
	public $bank_name;
	public $bik;
	public $cor_account;
	public $JAddress;
	public $FAddress;
        public $EmplCreate;
        public $EmplChange;
        public $date_create;
        public $date_change;
                
	public function rules()
	{
            return array(
                    array('FormName, fown_id', 'required'),
                    array('Form_id,
                            FormName,
                            FullName,
                            inn,
                            account,
                            bank_name,
                            bik,
                            cor_account,
                            JAddress,
                            FAddress,', 'safe'),
            );
	}
        
        public function __construct($scenario = '') {
            parent::__construct($scenario);
        
            $this->SP_INSERT_NAME = 'INSERT_PropForms';
            $this->SP_UPDATE_NAME = 'UPDATE_PropForms';
            $this->SP_DELETE_NAME = 'DELETE_PropForms';

            $Select =   "Select "
                        ."  Form_id,
                            FormName,
                            FullName,
                            inn,
                            account,
                            bank_name,
                            bik,
                            cor_account,
                            JAddress,
                            FAddress,
                            EmplCreate,
                            EmplChange,
                            date_create,
                            date_change";
            $From =     "\nFrom Organizations_v p";
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
            );
	}

	
}
