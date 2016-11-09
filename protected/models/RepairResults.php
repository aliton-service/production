<?php


class RepairResults extends MainFormModel
{
    public $Rslt_id;
    public $ResultName;

    function __construct() {
        parent::__construct();

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        r.Rslt_id,
                        r.ResultName";
        $From = "\nFrom RepairResults r";
        $Order = "\nOrder by r.ResultName";

        $this->KeyFiled = 'r.Rslt_id';
        $this->PrimaryKey = 'Rslt_id';

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);
    }
	
    public function rules()
    {
        return array(
            array('Rslt_id, ResultName', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'Rslt_id' => 'Rslt_id',
            'ResultName' => 'Result Name',
        );
    }

}
