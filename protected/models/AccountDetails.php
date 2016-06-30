<?php

/**
 * This is the model class for table "AccountDetails".
 *
 * The followings are the available columns in table 'AccountDetails':
 * @property integer $accd_id
 * @property integer $acc_id
 * @property integer $eqip_id
 * @property integer $ecount
 * @property double $price
 * @property double $sum
 * @property string $deldate
 */
class AccountDetails extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'AccountDetails';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('acc_id, eqip_id, ecount, price, sum', 'required'),
			array('acc_id, eqip_id, ecount', 'numerical', 'integerOnly'=>true),
			array('price, sum', 'numerical'),
			array('deldate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('accd_id, acc_id, eqip_id, ecount, price, sum, deldate', 'safe', 'on'=>'search'),
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
			'accd_id' => 'Accd',
			'acc_id' => 'Acc',
			'eqip_id' => 'Eqip',
			'ecount' => 'Ecount',
			'price' => 'Price',
			'sum' => 'Sum',
			'deldate' => 'Deldate',
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

		$criteria->compare('accd_id',$this->accd_id);
		$criteria->compare('acc_id',$this->acc_id);
		$criteria->compare('eqip_id',$this->eqip_id);
		$criteria->compare('ecount',$this->ecount);
		$criteria->compare('price',$this->price);
		$criteria->compare('sum',$this->sum);
		$criteria->compare('deldate',$this->deldate,true);
		$criteria->compare('EmplDel', array(null));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return AccountDetails the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE AccountDetails SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE accd_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
