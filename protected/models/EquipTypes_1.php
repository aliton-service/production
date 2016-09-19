<?php

/**
 * This is the model class for table "EquipTypes".
 *
 * The followings are the available columns in table 'EquipTypes':
 * @property integer $EquipType_id
 * @property string $EquipType
 * @property integer $SystemType_id
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class EquipTypes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EquipTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EquipType, SystemType_id', 'required'),
			array('SystemType_id, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('EquipType', 'length', 'max'=>150),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('EquipType_id, EquipType, SystemType_id, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
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
			'EquipType_id' => 'Equip Type',
			'EquipType' => 'Equip Type',
			'SystemType_id' => 'System Type',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
			'EmplCreate' => 'Empl Create',
			'DateCreate' => 'Date Create',
			'EmplChange' => 'Empl Change',
			'DateChange' => 'Date Change',
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

		$criteria->compare('EquipType_id',$this->EquipType_id);
		$criteria->compare('EquipType',$this->EquipType,true);
		$criteria->compare('SystemType_id',$this->SystemType_id);
		$criteria->compare('Lock',$this->Lock);
		$criteria->compare('EmplLock',$this->EmplLock);
		$criteria->compare('DateLock',$this->DateLock,true);
		$criteria->compare('EmplCreate',$this->EmplCreate);
		$criteria->compare('DateCreate',$this->DateCreate,true);
		$criteria->compare('EmplChange',$this->EmplChange);
		$criteria->compare('DateChange',$this->DateChange,true);
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
	 * @return EquipTypes the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE EquipTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE EquipType_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function all() {
		return CHtml::listData(self::model()->findAll(), 'EquipType_id', 'EquipType');

	}
        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select EquipType_id, EquipType");
            $q->setFrom("\nFrom EquipTypes");
            $q->setWhere("\nWhere DelDate is Null");
            $q->setOrder("\nOrder by EquipType");
            return $q->QueryAll();
        }
        
        public function getDataForDemandEdit() {
            $q = new SQLQuery();
            $q->setSelect("Select p.DemandType_id, p.SystemType_id, p.EquipType_id, e.EquipType");
            $q->setFrom("\nFrom DemandsExecTime p left join EquipTypes e on (p.EquipType_id = e.EquipType_id)");
            $q->setWhere("\nWhere p.DelDate is null");
            $q->setGroupby("\nGroup by p.DemandType_id, p.Systemtype_id, p.EquipType_id, e.EquipType");
            $q->setOrder("\nOrder by e.EquipType");
            return $q->QueryAll();
        }
}
