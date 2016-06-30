<?php

/**
 * This is the model class for table "ConfirmCancels".
 *
 * The followings are the available columns in table 'ConfirmCancels':
 * @property integer $ConfirmCancel_id
 * @property string $ConfirmCancelName
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class ConfirmCancels extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ConfirmCancels';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('ConfirmCancelName', 'required'),
			array('EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('ConfirmCancelName', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ConfirmCancel_id, ConfirmCancelName, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
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
			'ConfirmCancel_id' => 'Confirm Cancel',
			'ConfirmCancelName' => 'Confirm Cancel Name',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
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

		$criteria->compare('ConfirmCancel_id',$this->ConfirmCancel_id);
		$criteria->compare('ConfirmCancelName',$this->ConfirmCancelName,true);
		$criteria->compare('Lock',$this->Lock);
		$criteria->compare('EmplLock',$this->EmplLock);
		$criteria->compare('DateLock',$this->DateLock,true);
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
	 * @return ConfirmCancels the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE ConfirmCancels SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE ConfirmCancel_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function getData($filter=array()) {
		$q = new SQLQuery();
		$q->setSelect("Select ConfirmCancel_id, ConfirmCancelName");
		$q->setFrom("\nFrom ConfirmCancels");
		$q->setWhere("\nWhere DelDate is Null");
		$q->setFilter($filter);
		return $q->QueryAll();
	}
}
