<?php

class CostCalcEquips extends MainFormModel
{
    public $cceq_id = null;
    public $calc_id = null;
    public $eqip_id = null;
    public $eqip_name = null;
    public $quant = null;
    public $price = null;
    public $sum_price = null;
    public $price_low = null;
    public $sum_low = null;
    public $work_price = null;
    public $work_sum = null;
    public $note = null;
    public $um_name = null;
    public $mntr = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_CostCalcEquips';
        $this->SP_UPDATE_NAME = 'UPDATE_CostCalcEquips';
        $this->SP_DELETE_NAME = 'DELETE_CostCalcEquips';

        $Select = "\nSelect 
                        t.cceq_id,
                        t.calc_id,
                        t.eqip_id,
                        t.eqip_name,
                        t.quant,
                        isnull(t.price, 0) as price, -- цена для заказчика
                        isnull(t.sum_price, 0) as sum_price, -- сумма для заказчика
                        isNull(t.price_low2, t.price_low) as price_low, -- цена себестоимости
                        isNull(t.sum_price_low2, t.sum_price_low) as sum_low, -- сумма себестоимости
                        t.note,
                        t.um_name,
                        case when datediff(mm, t.last_date, getdate()) >= 3 then 1 else 0 end mntr,
                        t.work_price,
                        t.work_sum
                        ";
        
        $From = "\nFrom CostCalcEquips_v t";
          
        
//        $Where = "\nWhere cc.DelDate is null";
        
        $Order = "\nOrder by t.cceq_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
//        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 't.cceq_id';
        $this->PrimaryKey = 'cceq_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'CostCalcEquips';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('calc_id, eqip_id, quant', 'required'),
            array('quant', 'numerical', 'min' => 0.01),
            array('cceq_id, calc_id, eqip_id, eqip_name, quant, price, sum_price, price_low, sum_low, note, um_name, mntr', 'safe'),
        );
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'cceq_id' => 'cceq_id',
            'calc_id' => 'calc_id',
            'eqip_id' => 'Оборудование',
            'eqip_name' => 'eqip_name',
            'quant' => 'Кол-во',
            'price' => 'price',
            'sum_price' => 'sum_price',
            'price_low' => 'price_low',
            'sum_low' => 'sum_low',
            'note' => 'note',
            'um_name' => 'um_name',
            'mntr' => 'mntr',
        );
    }

}
