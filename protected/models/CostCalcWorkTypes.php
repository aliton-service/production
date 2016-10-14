<?php

class CostCalcWorkTypes extends MainFormModel
{
    public $ccwt_id = null;
    public $ccwt_name = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_CostCalcWorkTypes';
        $this->SP_UPDATE_NAME = 'UPDATE_CostCalcWorkTypes';
        $this->SP_DELETE_NAME = 'DELETE_CostCalcWorkTypes';

        $Select = "\nSelect 
                        c.ccwt_id,
                        c.ccwt_name";
        
        $From = "\nFrom CostCalcWorkTypes c";
        
//        $Where = "\nWhere c.DelDate is Null";
        
        $Order = "\nOrder by c.ccwt_name";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
//        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'c.ccwt_id';
        $this->PrimaryKey = 'ccwt_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'CostCalcWorkTypes';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('ccwt_name', 'required'),
            array('ccwt_id', 'integerOnly'=>true),
            array('ccwt_id, ccwt_name', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'ccwt_id' => 'ccwt_id',
            'ccwt_name' => 'ccwt_name',
        );
    }

}
