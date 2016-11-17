<?php

class OfferDemands extends MainFormModel
{
    public $OfferDemand_id = null;
    public $offer_id = null;
    public $dmnd_id = null;
    public $Address = null;

    public $KeyFiled = 'od.OfferDemand_id';
    public $PrimaryKey = 'OfferDemand_id';

    public $SP_INSERT_NAME = 'INSERT_OfferDemands';
    public $SP_UPDATE_NAME = 'UPDATE_OfferDemands';
    public $SP_DELETE_NAME = 'DELETE_OfferDemands';


    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $select = "\nSelect
                        od.OfferDemand_id,
                        od.offer_id,
                        od.dmnd_id,
                        d.Address
         ";
        $from = "\nFrom OfferDemands od inner join FullDemands d on (od.dmnd_id = d.Demand_id)";
        $where = "\nWhere od.DelDate is Null";
//        $order = "\nOrder";

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setWhere($where);
//        $this->Query->setOrder($order);
    }


    public function rules()
    {
        return array(
            array('offer_id, dmnd_id', 'required'),
            array('OfferDemand_id', 'numerical', 'integerOnly'=>true),
            array('offer_id, dmnd_id', 'safe'),
        );
    }


    public function attributeLabels()
    {
        return array(
                'OfferDemand_id' => 'OfferDemand_id',
                'offer_id' => 'offer_id',
                'dmnd_id' => 'dmnd_id',
                'Address' => 'Address',
        );
    }
}
