<?php

/**
 * This is the model class for table "Streets".
 *
 * The followings are the available columns in table 'Streets':
 * @property integer $Street_id
 * @property integer $Region_id
 * @property integer $StreetType_id
 * @property string $StreetName
 * @property string $user_change
 * @property string $date_change
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property string $DelDate
 * @property integer $EmplDel
 */
class Streets extends MainFormModel
{ 

	public $Street_id;
	public $Region_id;
	public $StreetType_id;
	public $StreetName;
	public $user_change;
	public $date_change;
	public $Lock;
	public $EmplLock;
	public $DateLock;
        public $EmplCreate;
        public $DateCreate;
	public $EmplChange;
	public $DateChange;
	public $DelDate;
	public $EmplDel;
	public $RegionName;
	public $StreetType;
 	public $id_dropList = 'Street_id'; 
	public $name_dropList = 'StreetName';


	public function __construct($scenario = '') {
            parent::__construct($scenario);

            $this->SP_INSERT_NAME = 'INSERT_STREETS';
            $this->SP_UPDATE_NAME = 'UPDATE_STREETS';
            $this->SP_DELETE_NAME = 'DELETE_STREETS';

            $select = "Select 
                                    st.Street_id,
                                    st.StreetName,
                                    rg.RegionName,
                                    rg.Region_id,
                                    stype.StreetType_id,
                                    stype.StreetType
                                    ";
            $from = "From Streets st
                            Left Join Regions rg
                                    On rg.Region_id = st.Region_id
                            Left Join StreetTypes stype
                                    On stype.StreetType_id = st.StreetType_id        		
                                    ";

            $this->Query->setSelect($select);
            $this->Query->setFrom($from);
            $this->Query->setOrder("\nOrder by st.StreetName");
            $this->Query->AddWhere('st.EmplDel is null');

            // Инициализация первичного ключа
            $this->KeyFiled = 'st.Street_id';
            $this->PrimaryKey = 'Street_id';
	}

	public function rules()
	{
            return array(
                array('StreetName, Region_id, StreetType_id', 'required'),
                array('Street_id,
                        Region_id,
                        StreetType_id,
                        StreetName,
                        user_change,
                        date_change,
                        Lock,
                        EmplLock,
                        DateLock,
                        EmplChange,
                        DateChange,
                        DelDate,
                        EmplDel,
                        RegionName,
                        StreetType', 'safe'),
            );
	}


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Street_id' => 'Street',
			'Region_id' => 'Регион',
			'StreetType_id' => 'Тип улицы',
			'StreetName' => 'Название улицы',
			'user_change' => 'User Change',
			'date_change' => 'Date Change',
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

	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Streets SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Street_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        // public static function all()
        // {
        //     return CHtml::listData(self::model()->Find(array()), 'Street_id', 'StreetName');
        // }

	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select Street_id, StreetName");
		$q->setFrom("\nFrom Streets");
		$q->setOrder("\nOrder by StreetName");
		return $q->QueryAll();
	}
        
}
