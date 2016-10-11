<?php

class CalcWorkTypeDetails extends MainFormModel
{
    public $cwdt_id = null;
    public $name = null;
    public $Price = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_CalcWorkTypeDetails';
        $this->SP_UPDATE_NAME = 'UPDATE_CalcWorkTypeDetails';
        $this->SP_DELETE_NAME = 'DELETE_CalcWorkTypeDetails';

        $Select = "\nSelect 
                        cwdt.cwdt_id, 
                        cwdt.name, 
                        cwdt.Price";
        
        $From = "\nFrom CalcWorkTypeDetails cwdt left join CalcWorkTypes cw on (cw.cwrt_id = cw.cwrt_id)";
        
        $Where = "\nWhere cw.DelDate is null
                        and cwdt.DelDate is null
                        and dbo.truncdate(getdate()) between cw.date_start and cw.date_end
                        and (cwdt_id <> 1324 and cwdt_id <> 1326 and cwdt_id <> 1325)";
        
        $Order = "\nOrder by cwdt.name";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'cwdt.cwdt_id';
        $this->PrimaryKey = 'cwdt_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'CalcWorkTypeDetails';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('', 'required'),
            array('cwdt_id', 'integerOnly'=>true),
            array('cwdt_id, name, Price', 'safe'),
        );
    }


    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'cwdt_id' => 'cwdt_id',
            'name' => 'name',
            'Price' => 'Price',
        );
    }

}
