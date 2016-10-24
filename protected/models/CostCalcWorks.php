<?php

class CostCalcWorks extends MainFormModel
{
    public $ccwr_id = null;
    public $calc_id = null;
    public $cceq_id = null;
    public $cwdt_id = null;
    public $cw_name = null;
    public $cwrt_name = null;
    public $EquipName = null;
    public $quant = null;
    public $price = null;
    public $price_low = null;
    public $sum_low = null;
    public $note = null;
    public $koef = null;
    public $sum_high = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_CostCalcWorks';
        $this->SP_UPDATE_NAME = 'UPDATE_CostCalcWorks';
        $this->SP_DELETE_NAME = 'DELETE_CostCalcWorks';

        $Select = "\nSelect 
                        t.ccwr_id,
                        t.calc_id,
                        t.cceq_id,
                        t.cwdt_id,
                        t.cw_name,
                        t.cwrt_name,
                        t.EquipName,
                        t.quant,
                        t.note,
                        t.price,
                        t.price_low,
                        t.sum_low,
                        t.koef,
                        t.sum_high";
        
        $From = "\nFrom CostCalcWorks_v t";
        
//        $Where = "\nWhere cc.DelDate is null";
        
        $Order = "\nOrder by case when t.cceq_id is null then 1 else 0 end, t.cceq_id, t.cwrt_name";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
//        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 't.ccwr_id';
        $this->PrimaryKey = 'ccwr_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'CostCalcWorks';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('cwdt_id', 'cwdt_validate'),
            array('quant', 'numerical', 'min' => 1),
            array('quant', 'required'),
            array('ccwr_id, cceq_id, calc_id, cwdt_id, cw_name, cwrt_name, quant, price, price_low, note, sum_low, koef, sum_high', 'safe'),
        );
    }

    public function cwdt_validate($attribute, array $params = array()) {
        if (($this->cwdt_id === '') && ($this->cw_name === '')) {
            $this->addError($attribute, 'Заполните поле работ');
        }
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ccwr_id' => 'ccwr_id',
            'cceq_id' => 'cceq_id',
            'calc_id' => 'calc_id',
            'cwdt_id' => 'Вид работ',
            'cw_name' => 'cw_name',
            'cwrt_name' => 'cwrt_name',
            'EquipName' => 'EquipName',
            'quant' => 'quant',
            'price' => 'price',
            'price_low' => 'price_low',
            'note' => 'note',
            'sum_low' => 'sum_low',
            'koef' => 'koef',
            'sum_high' => 'sum_high',
        );
    }

}
