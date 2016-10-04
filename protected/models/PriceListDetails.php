<?php

class PriceListDetails extends MainFormModel
{
    public $pldt_id = null;
    public $prlt_id = null;
    public $eqip_id = null;
    public $price = null;
    public $last_date = null;
    public $last_date_mntr = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_PriceListDetails';
        $this->SP_UPDATE_NAME = 'UPDATE_PriceListDetails';
        $this->SP_DELETE_NAME = 'DELETE_PriceListDetails';

//        $Select = "\nSelect ";
//        $From = "\nFrom ";
//        $Where = "\nWhere pl.DelDate is null";
//        $Order = "\nOrder by ";
//
//        $this->Query->setSelect($Select);
//        $this->Query->setFrom($From);
//        $this->Query->setWhere($Where);
//        $this->Query->setOrder($Order);
//
//        $this->KeyFiled = 'pl.prlt_id';
//        $this->PrimaryKey = 'prlt_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'PriceListDetails';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
//			array('date, strg_id', 'required'),
//                    array('prlt_id', 'numerical', 'integerOnly'=>true),
//                    array('prlt_id, date, note', 'safe'),
            );
    }



    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
//        return array(
//            'prlt_id' => 'Invn',
//            'date' => 'Date',
//            'note' => 'note',
//        );
    }

}
