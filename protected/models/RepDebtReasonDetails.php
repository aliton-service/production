<?php


class RepDebtReasonDetails extends MainFormModel
{
	public $rpdt_id = null;
	public $rpdr_id = null;
	public $form_id = null;
	public $sum = null;
	public $period = null;
	public $cont_id = null;
	public $territ_id = null;
	public $DateCreate = null;

	public $KeyFiled = 'r.rpdt_id';
	public $PrimaryKey = 'rpdt_id';

	public $SP_INSERT_NAME = '';
	public $SP_UPDATE_NAME = '';
	public $SP_DELETE_NAME = '';


	public $select = '';
	public $from = '';
	public $where = '';
	public $order = '';


	function __construct($scenario='')
	{
		parent::__construct($scenario);

		$this->select = "
		select
			o.fullname ,
			dt.period ,
			round(isnull(dt.[sum], 0), 2) debt,
			c.date,
			c.next_date,
			case when datediff(dd, r.date, c.next_date) < 0 then 0 else datediff(dd, r.date, c.next_date) end as overday,
			c.name,
			t.territ_name,
				dt.rpdt_id,
			r.rpdr_id,
			dt.form_id,
				c.objectgr_id
		";
		$this->from = "
		from repdebtreasons r inner join repdebtreasondetails dt on (r.rpdr_id = dt.rpdr_id)
		left join organizations_v o on (dt.form_id = o.form_id)
		left join contacts_v c on (dt.cont_id = c.cont_id)
		left join territory t on (dt.territ_id = t.territ_id)
		";
		$this->where = "";
		$this->order = " order by isnull(dt.[sum], 0) desc ";

		$this->setQuery();
	}

	public function rules()
	{
		return array(
			array('rpdr_id, form_id', 'required'),
			array('rpdr_id, form_id, period, cont_id, territ_id', 'numerical', 'integerOnly'=>true),
			array('sum', 'numerical'),
			array('DateCreate', 'safe'),
			array('rpdt_id, rpdr_id, form_id, sum, period, cont_id, territ_id, DateCreate', 'safe'),
		);
	}

	public function attributeLabels()
	{
		return array(
			'rpdt_id' => 'Rpdt',
			'rpdr_id' => 'Rpdr',
			'form_id' => 'Form',
			'sum' => 'Sum',
			'period' => 'Period',
			'cont_id' => 'Cont',
			'territ_id' => 'Territ',
			'DateCreate' => 'Date Create',
		);
	}

	public function setQuery() {
		$this->Query->setSelect($this->select);
		$this->Query->setFrom($this->from);
		$this->Query->setOrder($this->order);
		$this->Query->setWhere($this->where);
	}

	public function getRdrDetails($id) {
		$this->where = " where  r.rpdr_id = $id ";
		$this->setQuery();

		return Yii::app()->db->createCommand($this->Query->text)->queryAll();

	}


}
