<?php

/**
 * This is the model class for table "EquipsHistory".
 *
 * The followings are the available columns in table 'EquipsHistory':
 * @property integer $eqhs_id
 * @property integer $equip_id
 * @property integer $achs_id
 * @property string $ac_date
 * @property integer $objc_id
 * @property integer $docm_id
 * @property integer $dctp_id
 * @property integer $quant
 * @property boolean $used
 * @property integer $mstr_id
 * @property integer $direct
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
class EquipsHistory extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'EquipsHistory';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('equip_id, achs_id, objc_id, docm_id, dctp_id, quant, mstr_id, direct, EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('ac_date, used, Lock, DateLock, DateCreate, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('eqhs_id, equip_id, achs_id, ac_date, objc_id, docm_id, dctp_id, quant, used, mstr_id, direct, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
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
			'eqhs_id' => 'Eqhs',
			'equip_id' => 'Equip',
			'achs_id' => 'Achs',
			'ac_date' => 'Ac Date',
			'objc_id' => 'Objc',
			'docm_id' => 'Docm',
			'dctp_id' => 'Dctp',
			'quant' => 'Quant',
			'used' => 'Used',
			'mstr_id' => 'Mstr',
			'direct' => 'Direct',
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

		$criteria->compare('eqhs_id',$this->eqhs_id);
		$criteria->compare('equip_id',$this->equip_id);
		$criteria->compare('achs_id',$this->achs_id);
		$criteria->compare('ac_date',$this->ac_date,true);
		$criteria->compare('objc_id',$this->objc_id);
		$criteria->compare('docm_id',$this->docm_id);
		$criteria->compare('dctp_id',$this->dctp_id);
		$criteria->compare('quant',$this->quant);
		$criteria->compare('used',$this->used);
		$criteria->compare('mstr_id',$this->mstr_id);
		$criteria->compare('direct',$this->direct);
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
	 * @return EquipsHistory the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE EquipsHistory SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE eqhs_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
