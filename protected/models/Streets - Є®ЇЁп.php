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
class Streets extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Streets';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Region_id, StreetType_id, EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('StreetName', 'length', 'max'=>100),
			array('user_change', 'length', 'max'=>5),
			array('date_change, Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Street_id, Region_id, StreetType_id, StreetName, user_change, date_change, Lock, EmplLock, DateLock, EmplChange, DateChange, DelDate, EmplDel', 'safe', 'on'=>'search'),
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
			'region'   => array(self::BELONGS_TO, 'Regions', 'Region_id'),
			'streetType' => array(self::BELONGS_TO, 'StreetTypes', 'StreetType_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Street_id' => 'Street',
			'Region_id' => 'Region',
			'StreetType_id' => 'Street Type',
			'StreetName' => 'Street Name',
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

		$criteria->compare('Street_id',$this->Street_id);
		$criteria->compare('Region_id',$this->Region_id);
		$criteria->compare('StreetType_id',$this->StreetType_id);
		$criteria->compare('StreetName',$this->StreetName,true);
		$criteria->compare('user_change',$this->user_change,true);
		$criteria->compare('date_change',$this->date_change,true);
		$criteria->compare('Lock',$this->Lock);
		$criteria->compare('EmplLock',$this->EmplLock);
		$criteria->compare('DateLock',$this->DateLock,true);
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
	 * @return Streets the static model class
	 */
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
        
        public static function all()
        {
            return CHtml::listData(self::model()->findAll(), 'Street_id', 'StreetName');
        }
}
