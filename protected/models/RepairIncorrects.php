<?php


class RepairIncorrects extends MainFormModel
{
    public $Incorrect_id;
    public $IncorrectName;
    public $DateCreate;
    public $EmplCreate;
    public $DateChange;
    public $EmplChange;
    public $DelDate;

    public function __construct($scenario = '') {
        parent::__construct($scenario);

        $Select = "\nSelect
                        ri.Incorrect_id,
                        ri.IncorrectName,
                        ri.DateCreate,
                        ri.EmplCreate,
                        ri.DateChange,
                        ri.EmplChange,
                        ri.DelDate";
        $From = "\nFrom RepairIncorrects ri";
        $Where = "\nWhere ri.DelDate is null";
        $Order = "\nOrder by ri.IncorrectName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
        $this->Query->setWhere($Where);
    }

    public function rules()
    {
        return array(
                array('Incorrect_id,
                        IncorrectName,
                        DateCreate,
                        EmplCreate,
                        DateChange,
                        EmplChange,
                        DelDate', 'safe', 'on'=>'search'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'Incorrect_id' => '',
            'IncorrectName' => '',
            'DateCreate' => '',
            'EmplCreate' => '',
            'DateChange' => '',
            'EmplChange' => '',
            'DelDate' => '',
        );
    }
}


