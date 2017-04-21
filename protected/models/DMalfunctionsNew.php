<?php

class DMalfunctionsNew extends MainFormModel
{
    public $DMalfunction_id;
    public $DEquip_id;
    public $Malfunction_id;
    public $Malfunction;
    public $Sort;

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        d.DMalfunction_id,
                        d.DEquip_id,
                        d.Malfunction_id,
                        isNull(m.Malfunction, '(Пусто)') as Malfunction,
                        d.Sort";
        $From = "\nFrom DMalfunctions d left join Malfunctions m on (d.Malfunction_id =  m.Malfunction_id)";
        $Where = "\nWhere d.Visible = 1";
        $Order = "\nOrder by d.Sort";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.DMalfunction_id';
        $this->PrimaryKey = 'DMalfunction_id';
    }
        
    public function rules()
    {
        return array(
            array('DMalfunction_id,
                    DEquip_id,
                    Malfunction_id,
                    Malfunction,
                    Sort', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'DMalfunction_id' => '',
            'DEquip_id' => '',
            'Malfunction_id' => '',
            'Malfunction' => '',
            'Sort' => '',
        );
    }
}








