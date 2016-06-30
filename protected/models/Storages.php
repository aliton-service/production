<?php

/**
 * This is the model class for table "Storages".
 *
 * The followings are the available columns in table 'Storages':
 * @property integer $storage_id
 * @property string $storage
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
class Storages extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Storages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('storage', 'length', 'max'=>50),
			array('Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('storage_id, storage, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
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
			'storage_id' => 'Storage',
			'storage' => 'Storage',
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

		$criteria->compare('storage_id',$this->storage_id);
		$criteria->compare('storage',$this->storage,true);
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
	 * @return Storages the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Storages SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE storage_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select storage_id, storage ");
		$q->setFrom("\nFrom Storages  ");
		$q->setWhere("\nWhere DelDate is null");
		$q->setOrder("\nOrder by storage");
		return $q->QueryAll();
	}


	public function getAvailableEquip($id) {
		$sql = "
		declare
        @equip_id int,
        @date datetime

		set @equip_id = :eqip_id
		set @date = getdate()

		select
			   s.storage_id,
			   s.storage,
			   dbo.get_wh_inventory(@equip_id, @date, 0, s.storage_id) quant,
			   dbo.get_wh_inventory(@equip_id, @date, 1, s.storage_id) quant_used
		from storages s
		where s.deldate is null
		order by s.storage
		";

		$query = Yii::app()->db->createCommand($sql);
		$query->bindParam(':eqip_id', $id);
		return $query->queryAll();
	}

}
