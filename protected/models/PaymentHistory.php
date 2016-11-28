<?php

class PaymentHistory extends MainFormModel
{
    public $pmhs_id;
    public $cntr_id;
    public $date;
    public $sum;
    public $year_start;
    public $year_end;
    public $month_start;
    public $month_start_name;
    public $month_end;
    public $month_end_name;
    public $note;
    public $user_create;
    public $user_change;


    public $SP_INSERT_NAME = '';
    public $SP_UPDATE_NAME = '';
    public $SP_DELETE_NAME = '';

    public function rules()
    {
        return array(
            array('pmhs_id, cntr_id', 'numerical', 'integerOnly'=>true),
            array('sum', 'numerical'),
            array('cntr_id, date, sum, year_start, year_end, month_start, month_end', 'required'),
            array('pmhs_id, cntr_id, date, sum, year_start, year_end, month_start, month_end, note', 'safe'),
        );
    }

    function __construct($scenario='') {
        
        $this->SP_INSERT_NAME = 'INSERT_PaymentHistory2';
        $this->SP_UPDATE_NAME = 'UPDATE_PaymentHistory2';
        $this->SP_DELETE_NAME = 'DELETE_PaymentHistory';

        
        parent::__construct($scenario);
        $select = "
            select
                ph.pmhs_id,
                ph.cntr_id,
                ph.date,
                ph.sum,
                ph.year_start,
                ph.year_end,
                ph.month_start,
                ms.Month_name month_start_name,
                ph.month_end,
                me.Month_name month_end_name,
                ph.note
        ";

        $from = "
            from PaymentHistory ph
            left join Months ms on (ph.month_start = ms.Month_id)
            left join Months me on (ph.month_end = me.Month_id)
        ";

        $where = "
            where ph.DelDate is null
	";

        $order = "
            order by ph.date desc
        ";

        // Инициализация первичного ключа
        $this->KeyFiled = 'ph.pmhs_id';
        $this->PrimaryKey = 'pmhs_id';

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
	$this->Query->setWhere($where);
        $this->Query->setOrder($order);
    }
        
    public function attributeLabels()
    {
        return array(
            'pmhs_id' => 'pmhs_id',
            'cntr_id' => 'cntr_id',
            'date' => 'date',
            'sum' => 'sum',
            'year_start' => 'year_start',
            'month_start' => 'month_start',
            'year_end' => 'year_end',
            'month_end' => 'month_end',
            'note' => 'note',
            'ServiceType' => 'ServiceType',
        );
    }

}
