<?php

class PriceMarkups extends MainFormModel
{

	public $mrkp_id = null;
	public $date_start = null;
	public $date_end = null;
        
	function __construct($scenario = '') {
            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_PriceMarkups';
            $this->SP_UPDATE_NAME = 'UPDATE_PriceMarkups';
            $this->SP_DELETE_NAME = 'DELETE_PriceMarkups';

            $Select = "\nSelect
                            p.mrkp_id, 
                            p.date_start, 
                            p.date_end";
            
            $From = "\nFrom PriceMarkups p";
            
            $Where = "\nWhere p.DelDate is null";
            
            $Order = "\nOrder by p.date_start desc";

            $this->Query->setSelect($Select);
            $this->Query->setFrom($From);
            $this->Query->setWhere($Where);
            $this->Query->setOrder($Order);

            $this->KeyFiled = 'p.mrkp_id';
            $this->PrimaryKey = 'mrkp_id';
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PriceMarkups';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
            return array(
                array('mrkp_id, date_start, date_end', 'safe'),
            );
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'mrkp_id' => 'mrkp_id',
			'date_start' => 'Дата начала',
			'date_end' => 'Дата окончания',
		);
	}



	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


}
