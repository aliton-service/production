<?php

class PriceListDetails extends MainFormModel
{
    public $pldt_id = null;
    public $eqip_id = null;
    public $price_high = null;
    public $price_low = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_PriceListDetails';
        $this->SP_UPDATE_NAME = 'UPDATE_PriceListDetails';
        $this->SP_DELETE_NAME = 'DELETE_PriceListDetails';

        $Select = "\nSelect  
                        p.pldt_id,
                        p.eqip_id,
                        p.price_high,
                        p.price_low";
        
        $From = "\nFrom PriceListDetails_v p";
        
        $Where = "\nWhere p.prlt_id = dbo.get_price_list(getdate())";
        
//        $Order = "\nOrder by ";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
//        $this->Query->setOrder($Order);

        $this->KeyFiled = 'p.pldt_id';
        $this->PrimaryKey = 'pldt_id';
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
                    array('pldt_id', 'required'),
                    array('pldt_id', 'eqip_id', 'integerOnly'=>true),
                    array('pldt_id, eqip_id, price_high, price_low', 'safe'),
            );
    }



    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'pldt_id' => 'pldt_id',
            'eqip_id' => 'eqip_id',
            'price_high' => 'price_high',
            'price_low' => 'price_low',
        );
    }

}
