<?php

class DeliveryDetails extends MainFormModel
{
    public $dldt_id = null;
    public $dldm_id = null;
    public $equip_id = null;
    public $quant = null;
    public $used = null;
    public $price = null;
    public $date_create = null;
    public $user_create = null;
    public $date_change = null;
    public $user_change = null;
    public $deldate = null;
    public $equipname = null;
    public $um_name = null;
    public $EmplCreate = null;

    public $KeyField = 'dt.dldt_id';
    public $KeyFiled = 'dt.dldt_id';
    public $PrimaryKey = 'dldt_id';

    public $SP_INSERT_NAME = 'INSERT_DeliveryDetails';
    public $SP_UPDATE_NAME = 'UPDATE_DeliveryDetails';

    function __construct($scenario = '', $print_reason = false)
    {
            parent::__construct($scenario);

            $select = "
            Select
                    dt.dldt_id,
                    dt.dldm_id,
                    dt.equip_id,
                    e.equipname,
                    u.NameUnitMeasurement um_name,
                    dt.quant,
                    dt.used,
                    dt.price
            ";
            $from = "
            From DeliveryDetails dt left join Equips e on (dt.equip_id = e.equip_id)
            left join UnitMeasurement u on (e.UnitMeasurement_Id = u.UnitMeasurement_Id)
            ";
            $where = "
            Where dt.deldate is null
            ";
            $order = "
            Order by dt.dldt_id
            ";

            $this->Query->setSelect($select);
            $this->Query->setFrom($from);
            $this->Query->setOrder($order);
            $this->Query->setWhere($where);

    }

    public function rules()
    {
        return array(
            array('dldm_id, equip_id, quant', 'required'),
            array('dldt_id,'
                . ' dldm_id,'
                . ' equip_id,'
                . ' quant, used,'
                . ' price,'
                . ' date_create,'
                . ' user_create,'
                . ' date_change,'
                . ' user_change,'
                . ' deldate', 'safe'),
        );
    }

    public function attributeLabels()
    {
            return array(
                    'dldt_id' => 'Dldt',
                    'dldm_id' => 'Dldm',
                    'equip_id' => 'Equip',
                    'quant' => 'Quant',
                    'used' => 'Used',
                    'price' => 'Price',
                    'date_create' => 'Date Create',
                    'user_create' => 'User Create',
                    'date_change' => 'Date Change',
                    'user_change' => 'User Change',
                    'deldate' => 'Deldate',
            );
    }
}
