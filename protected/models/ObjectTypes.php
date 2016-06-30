<?php

/**
 * This is the model class for table "ObjectTypes".
 *
 * The followings are the available columns in table 'ObjectTypes':
 * @property integer $ObjectType_Id
 * @property string $ObjectType
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplDel
 * @property string $DelDate
 */
class ObjectTypes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ObjectTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmplLock, EmplChange, EmplCreate, EmplDel', 'numerical', 'integerOnly'=>true),
			array('ObjectType', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DateCreate, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ObjectType_Id, ObjectType, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplCreate, DateCreate, EmplDel, DelDate', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ObjectType_Id' => 'Object Type',
			'ObjectType' => 'Object Type',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplDel' => 'Empl Del',
			'DelDate' => 'Del Date',
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

		$criteria->compare('ObjectType_Id',$this->ObjectType_Id);
		$criteria->compare('ObjectType',$this->ObjectType,true);
		$criteria->compare('Lock',$this->Lock);
		$criteria->compare('EmplLock',$this->EmplLock);
		$criteria->compare('DateLock',$this->DateLock,true);
		$criteria->compare('EmplChange',$this->EmplChange);
		$criteria->compare('DateChange',$this->DateChange,true);
		$criteria->compare('EmplCreate',$this->EmplCreate);
		$criteria->compare('DateCreate',$this->DateCreate,true);
		$criteria->compare('EmplDel',$this->EmplDel);
		$criteria->compare('DelDate',$this->DelDate,true);
		$criteria->compare('EmplDel', array(null));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObjectTypes the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE ObjectTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE ObjectType_Id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public static function all()
        {
            return CHtml::listData(self::model()->findAll(), 'ObjectType_Id', 'ObjectType');
        }
        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select ObjectType_Id, ObjectType");
            $q->setFrom("\nFrom ObjectTypes");
            $q->setWhere("\nWhere DelDate is Null");
            return $q->QueryAll();
        }
}
