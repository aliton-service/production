<?php

class ContractPriceHistory extends MainFormModel
{
    public $PriceHistory_id;
    public $ContrS_id;
    public $DateStart;
    public $DateEnd;
    public $Price;
    public $PriceMonth;
    public $Reason_id;
    public $ReasonName;
    public $ServiceType_id;
    public $ServiceType;
    public $EmplCreate;
    public $EmplChange;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';

    public function rules()
    {
        return array(
            array('PriceHistory_id, ContrS_id, Reason_id, ServiceType_id', 'numerical', 'integerOnly'=>true),
            array('ContrS_id, Reason_id, DateStart, Price, PriceMonth', 'required'),
            array('PriceHistory_id, ContrS_id, Reason_id, ServiceType_id, DateStart, Price, PriceMonth, ReasonName, ServiceType, DateEnd', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_ContractPriceHistory';
        $this->SP_UPDATE_NAME = 'UPDATE_ContractPriceHistory';

        
        parent::__construct($scenario);
        $select = "
            select ph.PriceHistory_id,
                ph.ContrS_id,
                ph.DateStart,
                ph.DateEnd,
                ph.Price,
                ph.PriceMonth,
                ph.Reason_id,
                r.ReasonName,
                ph.ServiceType_id,
                st.ServiceType,
                case when dbo.truncdate(getdate()) between ph.DateStart and ph.DateEnd then 1
                     when getdate() < ph.DateStart then 2
                else 0 end status 
        ";

        $from = "
            from ContractPriceHistory ph inner join PriceChangeReasons r on (ph.Reason_id = r.Reason_id)
                left join ServiceTypes st on (ph.ServiceType_id = st.ServiceType_id)
        ";

        $where = "
            Where ph.DelDate is Null
	";

        $order = "
            order by ph.DateStart desc
        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'ph.PriceHistory_id';
        $this->PrimaryKey = 'PriceHistory_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
	$this->Query->setWhere($where);
        $this->Query->setOrder($order);
    }
        
    public function attributeLabels()
    {
        return array(
            'PriceHistory_id' => 'PriceHistory id',
            'ContrS_id' => 'ContrS id',
            'DateStart' => 'DateStart',
            'DateEnd' => 'DateEnd',
            'Price' => 'Price',
            'PriceMonth' => 'PriceMonth',
            'Reason_id' => 'Reason_id',
            'ServiceType_id' => 'ServiceType_id',
            'ServiceType' => 'ServiceType',
        );
    }

}
