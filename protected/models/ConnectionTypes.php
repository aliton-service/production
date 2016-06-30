<?php

/**
 * This is the model class for table "ConnectionTypes".
 *
 * The followings are the available columns in table 'ConnectionTypes':
 * @property integer $ConnectionType_id
 * @property string $ConnectionType
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property string $DelDate
 * @property integer $EmplDel
 *
 * The followings are the available model relations:
 * @property Objects[] $objects
 */
class ConnectionTypes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ConnectionTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ConnectionType_id, ConnectionType', 'required'),
			array('ConnectionType_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('ConnectionType', 'length', 'max'=>50),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ConnectionType_id, ConnectionType, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, DelDate, EmplDel', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'objects' => array(self::HAS_MANY, 'Objects', 'cntp_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ConnectionType_id' => 'Connection Type',
			'ConnectionType' => 'Connection Type',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'DelDate' => 'Del Date',
			'EmplDel' => 'Empl Del',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ConnectionType_id',$this->ConnectionType_id);
		$criteria->compare('ConnectionType',$this->ConnectionType,true);
		$criteria->compare('Lock',$this->Lock);
		$criteria->compare('EmplLock',$this->EmplLock);
		$criteria->compare('DateLock',$this->DateLock,true);
		$criteria->compare('EmplCreate',$this->EmplCreate);
		$criteria->compare('DateCreate',$this->DateCreate,true);
		$criteria->compare('EmplChange',$this->EmplChange);
		$criteria->compare('DateChange',$this->DateChange,true);
		$criteria->compare('DelDate',$this->DelDate,true);
		$criteria->compare('EmplDel',$this->EmplDel);
		$criteria->compare('EmplDel', array(null));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ConnectionTypes the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE ConnectionTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE ConnectionType_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        public static function all()
        {
            return CHtml::listData(self::model()->findAll(), 'ConnectionType_id', 'ConnectionType');
        }
        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select ConnectionType_id, ConnectionType");
            $q->setFrom("\nFrom ConnectionTypes");
            $q->setWhere("\nWhere DelDate is Null");
            return $q->QueryAll();
        }
}
