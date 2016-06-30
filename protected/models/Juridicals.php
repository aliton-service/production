<?php

/**
 * This is the model class for table "Juridicals".
 *
 * The followings are the available columns in table 'Juridicals':
 * @property integer $Jrdc_Id
 * @property string $JuridicalPerson
 * @property string $Identification
 * @property integer $jregion
 * @property integer $jarea
 * @property integer $jstreet
 * @property string $jhouse
 * @property string $jcorp
 * @property integer $fregion
 * @property integer $farea
 * @property integer $fstreet
 * @property string $fhouse
 * @property string $fcorp
 * @property string $inn
 * @property string $kpp
 * @property string $account
 * @property string $ogrn
 * @property string $okpo
 * @property string $telephone
 * @property string $post_index
 * @property integer $empl_id
 * @property integer $bank_id
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property string $DelDate
 * @property integer $EmplDel
 */
class Juridicals extends MainFormModel
{ 

	public $Jrdc_Id;
	public $JuridicalPerson;
	public $Identification;
	public $jregion;
	public $jarea;
	public $jstreet;
	public $jhouse;
	public $jcorp;
	public $fregion;
	public $farea;
	public $fstreet;
	public $fhouse;
	public $fcorp;
	public $inn;
	public $kpp;
	public $account;
	public $ogrn;
	public $okpo;
	public $telephone;
	public $post_index;
	public $empl_id;
	public $bank_id;
	public $Lock;
	public $EmplLock;
	public $DateLock;
	public $EmplChange;
	public $DateChange;
	public $DelDate;
	public $EmplDel;
	public $RegionName;
	public $freg;
	public $AreaName;
	public $far;
	public $StreetName;
	public $Region_id;
	public $freg_id;
	public $Area_id;
	public $Street_id;

	public function __construct($scenario = '') {
		parent::__construct($scenario);

		$this->SP_INSERT_NAME = 'INSERT_Juridicals';
        $this->SP_UPDATE_NAME = 'UPDATE_Juridicals';
        $this->SP_DELETE_NAME = 'DELETE_Juridicals';

        $select = "Select 
        			jur.*,
        			rg.Region_id, rg.RegionName,
        			st.Street_id, st.StreetName,
        			rg_f.RegionName As freg, rg_f.Region_id As freg_id,
        			ar.AreaName,
        			ar_f.AreaName As far
        			
        			";
        $from = "From Juridicals jur
        		Left Join Streets st
        			On st.Street_id = jur.jstreet
        		Left Join Regions rg
        			On rg.Region_id = jur.jregion
        		Left Join Areas ar
        			On ar.Area_id = jur.jarea
        		Left Join Regions rg_f
        			On rg_f.Region_id = jur.fregion
        		Left Join Areas ar_f
        			On ar_f.Area_id = jur.farea
        			";

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->AddWhere('st.EmplDel is null');
        
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
