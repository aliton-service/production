<?php

/**
 * This is the model class for table "ReturnReasons".
 *
 * The followings are the available columns in table 'ReturnReasons':
 * @property integer $rtrs_id
 * @property string $name
 * @property string $user_create
 * @property string $date_create
 * @property string $user_change
 * @property string $date_change
 */
class ReturnReasons extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ReturnReasons';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('name', 'length', 'max'=>30),
			array('user_create, user_change', 'length', 'max'=>50),
			array('date_create, date_change', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('rtrs_id, name, user_create, date_create, user_change, date_change', 'safe', 'on'=>'search'),
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
			'rtrs_id' => 'Rtrs',
			'name' => 'Name',
			'user_create' => 'User Create',
			'date_create' => 'Date Create',
			'user_change' => 'User Change',
			'date_change' => 'Date Change',
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

		$criteria->compare('rtrs_id',$this->rtrs_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('user_create',$this->user_create,true);
		$criteria->compare('date_create',$this->date_create,true);
		$criteria->compare('user_change',$this->user_change,true);
		$criteria->compare('date_change',$this->date_change,true);
		$criteria->compare('EmplDel', array(null));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ReturnReasons the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE ReturnReasons SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE rtrs_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select rtrs_id, name");
		$q->setFrom("\nFrom ReturnReasons  ");
		$q->setOrder("\norder by name");
		return $q->QueryAll();
	}
}
