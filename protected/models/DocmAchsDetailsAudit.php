<?php

class DocmAchsDetailsAudit extends MainFormModel
{
    public $History_id;
    public $Action;
    public $ActionName;
    public $ActionDate;
    public $ActionEmpl;
    public $Docm_id;
    public $Dadt_id;
    public $Eqip_id;
    public $EquipName;
    public $docm_quant;
    public $fact_quant;
    public $used;
    public $price;
    public $sum;
    public $ToProduction;
    public $no_price_list;
    public $old_eqip_id;
    public $OldEquipName;
    public $old_docm_quant;
    public $old_fact_quant;
    public $old_used;
    public $old_price;
    public $old_sum;
    public $old_ToProduction;
    public $old_no_price_list;

    function __construct($scenario='') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';
        
        $Select = "\nSelect
                        d.History_id,
                        d.Action,
                        Case When d.Action = 1 Then 'Вставка'
                                 When d.Action = 2 Then 'Изменение'
                                 When d.Action = 3 Then 'Удаление' End ActionName,
                        d.DateChange ActionDate,
                        e.ShortName ActionEmpl,
                        d.Docm_id,
                        d.Dadt_id,
                        d.Eqip_id,
                        eq.EquipName,
                        d.docm_quant,
                        d.fact_quant,
                        d.used,
                        d.price,
                        d.sum,
                        d.ToProduction,
                        d.no_price_list,
                        d.old_eqip_id,
                        eq2.EquipName as OldEquipName,
                        d.old_docm_quant,
                        d.old_fact_quant,
                        d.old_used,
                        d.old_price,
                        d.old_sum,
                        d.old_ToProduction,
                        d.old_no_price_list";
        $From = "\nFrom DocmAchsDetails_audit d left join Employees e on (d.EmplChange = e.Employee_id)
                        left join Equips eq on (d.Eqip_id = eq.Equip_id)
                        left join Equips eq2 on (d.old_eqip_id = eq2.Equip_id)";
        $Order = "\nOrder by d.DateChange desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.History_id';
        $this->PrimaryKey = 'History_id';
        
    }

    public function rules()
    {
        return array(
            array('eqip_id, docm_quant', 'required'),
            array(' History_id,
                    Action,
                    ActionName,
                    ActionDate,
                    ActionEmpl,
                    Docm_id,
                    Dadt_id,
                    Eqip_id,
                    EquipName,
                    docm_quant,
                    fact_quant,
                    used,
                    price,
                    sum,
                    ToProduction,
                    no_price_list,', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'History_id' => '',
            'Action' => '',
            'ActionName' => '',
            'ActionDate' => '',
            'ActionEmpl' => '',
            'Docm_id' => '',
            'Dadt_id' => '',
            'Eqip_id' => '',
            'EquipName' => '',
            'docm_quant' => '',
            'fact_quant' => '',
            'used' => '',
            'price' => '',
            'sum' => '',
            'ToProduction' => '',
            'no_price_list' => '',
        );
    }
	
    public function deleteCount($id, $empl_id) {

        $Command = Yii::app()->db->createCommand(''
        . "UPDATE DocmAchsDetails SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE dadt_id = {$id}
        ");

        return $Command->queryAll();
    }

    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
}
