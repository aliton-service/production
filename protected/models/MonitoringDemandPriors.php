<?php

/**
 * This is the model class for table "MonitoringDemandPriors".
 *
 * The followings are the available columns in table 'MonitoringDemandPriors':
 * @property integer $DemandPrior_id
 * @property string $Prior
 * @property integer $ExceedDays
 * @property string $Time
 * @property boolean $OffDay
 */
class MonitoringDemandPriors extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'MonitoringDemandPriors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Prior, ExceedDays, Time, OffDay', 'required'),
			array('ExceedDays', 'numerical', 'integerOnly'=>true),
			array('Prior', 'length', 'max'=>150),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('DemandPrior_id, Prior, ExceedDays, Time, OffDay', 'safe', 'on'=>'search'),
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
			'DemandPrior_id' => 'Demand Prior',
			'Prior' => 'Prior',
			'ExceedDays' => 'Exceed Days',
			'Time' => 'Time',
			'OffDay' => 'Off Day',
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

		$criteria->compare('DemandPrior_id',$this->DemandPrior_id);
		$criteria->compare('Prior',$this->Prior,true);
		$criteria->compare('ExceedDays',$this->ExceedDays);
		$criteria->compare('Time',$this->Time,true);
		$criteria->compare('OffDay',$this->OffDay);
		$criteria->compare('EmplDel', array(null));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MonitoringDemandPriors the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE MonitoringDemandPriors SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE DemandPrior_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function getData($filter=array()) {
		$q = new SQLQuery();
		$q->setSelect("Select DemandPrior_id, Prior");
		$q->setFrom("\nFrom MonitoringDemandPriors");

		$q->setFilter($filter);
		return $q->QueryAll();
	}
}
