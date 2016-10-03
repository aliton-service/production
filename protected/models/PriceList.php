<?php

class PriceList extends MainFormModel
{
    public $prlt_id = null;
    public $date = null;
    public $note = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_PriceList';
        $this->SP_UPDATE_NAME = 'UPDATE_PriceList';
        $this->SP_DELETE_NAME = 'DELETE_PriceList';

        $Select = "\nSelect 
                        pl.prlt_id, 
                        pl.date, 
                        pl.note";
        $From = "\nFrom PriceList pl";
        $Where = "\nWhere pl.DelDate is null
                        and dbo.truncdate(pl.date) between dateadd(yyyy, -1, getdate()) and getdate()+1";
        $Order = "\nOrder by pl.date desc";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'pl.prlt_id';
        $this->PrimaryKey = 'prlt_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
            return 'PriceList';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
            // NOTE: you should only define rules for those attributes that
            // will receive user inputs.
            return array(
//			array('date, strg_id', 'required'),
                    array('prlt_id', 'numerical', 'integerOnly'=>true),
                    array('prlt_id, date, note', 'safe'),
            );
    }



    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
            return array(
                'prlt_id' => 'Invn',
                'date' => 'Date',
                'note' => 'note',
            );
    }

}
