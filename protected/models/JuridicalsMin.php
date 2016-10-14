<?php

/**
 * This is the model class for table "Juridicals".
 *
 * The followings are the available columns in table 'Juridicals':
 * @property integer $Jrdc_Id
 * @property string $JuridicalPerson
 */
class JuridicalsMin extends MainFormModel
{ 
	public $Jrdc_Id;
	public $JuridicalPerson;
	

	public function __construct($scenario = '') {
            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_Juridicals';
            $this->SP_UPDATE_NAME = 'UPDATE_Juridicals';
            $this->SP_DELETE_NAME = 'DELETE_Juridicals';

            $select = "Select 
                            jur.Jrdc_Id,
                            jur.JuridicalPerson ";
            $from = "From Juridicals jur";
            $Order = "\nOrder by jur.JuridicalPerson";
            
            $this->Query->setSelect($select);
            $this->Query->setFrom($from);
            $this->Query->setOrder($Order);

            // Инициализация первичного ключа
            $this->KeyFiled = 'jur.Jrdc_Id';
            $this->PrimaryKey = 'Jrdc_Id';
        }
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Juridicals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JuridicalPerson', 'required'),
			array('jregion, jarea, jstreet, fregion, farea, fstreet, empl_id, bank_id, EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('JuridicalPerson', 'length', 'max'=>250),
			array('Identification', 'length', 'max'=>500),
			array('jhouse, fhouse', 'length', 'max'=>55),
			array('jcorp, fcorp', 'length', 'max'=>15),
			array('inn', 'length', 'max'=>10),
			array('kpp', 'length', 'max'=>9),
			array('account', 'length', 'max'=>20),
			array('ogrn', 'length', 'max'=>13),
			array('okpo', 'length', 'max'=>8),
			array('telephone, post_index', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Jrdc_Id, JuridicalPerson, Identification, jregion, jarea, jstreet, jhouse, jcorp, fregion, farea, fstreet, fhouse, fcorp, inn, kpp, account, ogrn, okpo, telephone, post_index, empl_id, bank_id, Lock, EmplLock, DateLock, EmplChange, DateChange, DelDate, EmplDel', 'safe', 'on'=>'search'),
		);
	}

	
	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Jrdc_Id' => 'Jrdc',
			'JuridicalPerson' => 'Juridical Person',
			'Identification' => 'Identification',
			'jregion' => 'Jregion',
			'jarea' => 'Jarea',
			'jstreet' => 'Jstreet',
			'jhouse' => 'Jhouse',
			'jcorp' => 'Jcorp',
			'fregion' => 'Fregion',
			'farea' => 'Farea',
			'fstreet' => 'Fstreet',
			'fhouse' => 'Fhouse',
			'fcorp' => 'Fcorp',
			'inn' => 'Inn',
			'kpp' => 'Kpp',
			'account' => 'Account',
			'ogrn' => 'Ogrn',
			'okpo' => 'Okpo',
			'telephone' => 'Telephone',
			'post_index' => 'Post Index',
			'empl_id' => 'Empl',
			'bank_id' => 'Bank',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'DelDate' => 'Del Date',
			'EmplDel' => 'Empl Del',
		);
	}

	public function search() {

	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Juridicals the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Juridicals SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Jrdc_Id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select Jrdc_Id, JuridicalPerson");
		$q->setFrom("\nFrom Juridicals ");
		$q->setWhere("\nWhere DelDate is Null");
		return $q->QueryAll();
	}

	static function getDataWHDoc() {
		$q = new SQLQuery();
		$q->setSelect("Select 0 Sort, 0 Jrdc_id, 'Все' JuridicalPerson
Union All
Select 1 Sort, Jrdc_id, JuridicalPerson");
		$q->setFrom("\nFrom Juridicals ");
		$q->setOrder("\nOrder by Sort, JuridicalPerson");
		return $q->QueryAll();
	}
}
