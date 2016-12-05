<?php

class ContractM extends MainFormModel
{
    public $ContrS_id = null;
    public $ObjectGr_id = null;
    public $ContrDateS = null;
    public $ContrNumS = null;
    public $DocType_Name = null;
    public $ContrSDateStart = null;
    public $ContrSDateEnd = null;
    public $Addr = null;
    public $Price = null;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';
    public $SP_CLEARContractPriceHistory_NAME = '';


    public function rules()
    {
        return array(
            array('', 'numerical', 'integerOnly'=>true),
            array('', 'required'),
            array('', 'numerical'),
            array('', 'safe'),
        );
    }

    function __construct() {

        $this->SP_DELETE_NAME = 'DELETE_CONTRACTS';
        $this->SP_CLEARContractPriceHistory_NAME = 'CLEAR_ContractPriceHistory';

        parent::__construct();
        $select = "\nSelect 
                        c.ContrS_id,
                        c.ObjectGr_id,
                        c.ContrDateS,
                        c.ContrNumS,
                        dt.DocType_Name,
                        c.ContrSDateStart,
                        c.ContrSDateEnd,
                        a.Addr,
                        case when c.DocType_id = 4 then round(c.PriceMonth, 2) else round(c.Price, 2) end Price";

        $from = "\nFrom contractss c 
                        left join ObjectsGroup og on (c.ObjectGr_id = og.ObjectGr_id)
                        left join Addresses_v a on (a.Address_id = og.Address_id)
                        left join DocTypes dt on (c.DocType_id = dt.DocType_Id)";

        $where = "\nWhere 
                        c.DelDate is null
                        and og.DelDate is null
                        and c.DocType_id in (3, 4, 5, 8)";

        // Инициализация первичного ключа
        $this->KeyFiled = 'c.ContrS_id';
        $this->PrimaryKey = 'ContrS_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($where);
    }



    public function attributeLabels()
    {
        return array(
            'ContrS_id' => 'Contr S',
            'ObjectGr_id' => 'ObjectGr_id',
            'ContrDateS' => 'ContrDateS',
            'ContrNumS' => 'ContrNumS',
            'DocType_Name' => 'DocType_Name',
            'ContrSDateStart' => 'ContrSDateStart',
            'ContrSDateEnd' => 'ContrSDateEnd',
            'Addr' => 'Addr',
            'Price' => 'Price',
        );
    }

    public function ClearContractPriceHistory()
    {
        // Очистка тарифов в истории изменения расценок
        if ($this->SP_CLEARContractPriceHistory_NAME == null)
            return 0;
        
        $this->execProcedure($this->SP_CLEARContractPriceHistory_NAME);
    }
}
