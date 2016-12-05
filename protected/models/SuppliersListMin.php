<?php

class SuppliersListMin extends MainFormModel
{
	public $Supplier_id = null;
	public $NameSupplier = null;
        public $FullName = null;

	function __construct($scenario = '') {

            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_Suppliers';
            $this->SP_UPDATE_NAME = 'UPDATE_Suppliers';
            $this->SP_DELETE_NAME = 'DELETE_Suppliers';

            $select = "\nSelect
                            s.Supplier_id,
                            s.NameSupplier,
                            s.FullName";

            $from = "\nFrom Suppliers s";

            $Where = "\nWhere s.DelDate is Null
                            and s.Supplier = 1";

            $order = "\nOrder by s.NameSupplier";

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
                array('Supplier_id, NameSupplier', 'safe'),
            );
	}

	
	public function attributeLabels()
	{
		return array(
                    'Supplier_id' => 'Supplier',
                    'NameSupplier' => 'Name Supplier',
		);
	}
}
