<?php

class SuppliersListMin extends MainFormModel
{
	public $Supplier_id = null;
	public $NameSupplier = null;

	function __construct($scenario = '') {

            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_Suppliers';
            $this->SP_UPDATE_NAME = 'UPDATE_Suppliers';
            $this->SP_DELETE_NAME = 'DELETE_Suppliers';

            $select = "\nSelect
                            Supplier_id,
                            NameSupplier";

            $from = "\nFrom Suppliers";

            $Where = "\nWhere DelDate is Null
                            and Supplier = 1";

            $order = "\nOrder by NameSupplier";

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
                    'Supplier_Id' => 'Supplier',
                    'NameSupplier' => 'Name Supplier',
		);
	}
}
