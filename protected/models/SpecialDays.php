<?php

class SpecialDays extends MainFormModel
{
    public $sday_id;
    public $date;
    public $datp_id;
    public $minutes;
    public $datp_name;
    public $EmplCreate;
    public $EmplChange;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_SpecialDays';
        $this->SP_UPDATE_NAME = 'UPDATE_SpecialDays';
        $this->SP_DELETE_NAME = 'DELETE_SpecialDays';

        $Select = "\nSelect
                        sd.sday_id,
                        sd.date,
                        sd.datp_id,
                        sd.minutes,
                        case when sd.datp_id = 0 then 'Рабочий'
                                 when sd.datp_id = 1 then 'Выходной'
                                 when sd.datp_id = 2 then 'Праздничный'
                                 when sd.datp_id = 3 then 'Сокращенный' end datp_name";
        $From = "\nFrom SpecialDays sd";
        //$Where = "\nWhere p.DelDate is null";
        $Order = "\nOrder by sd.date desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        //$this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
        
        $this->KeyFiled = 'sd.sday_id';
        $this->PrimaryKey = 'sday_id';
    }
    
    public function rules()
    {
        return array(
            array('date, datp_id', 'required'),
            array('sday_id,
                    date,
                    datp_id,
                    minutes,
                    datp_name', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'sday_id' => '',
            'date' => 'Дата',
            'datp_id' => 'Тип дня',
            'minutes' => '',
            'datp_name' => '',
        );
    }
}


