<?php

/**
 * This is the model class for table "PropForms".
 *
 * The followings are the available columns in table 'PropForms':
 * @property integer $Form_id
 * @property string $FormName
 * @property integer $fown_id
 * @property integer $lph_id
 * @property string $TaxNumber
 * @property string $SettlementAccount
 * @property string $City
 * @property integer $bank_id
 * @property integer $jregion
 * @property integer $jarea
 * @property integer $jstreet
 * @property string $jhouse
 * @property string $jcorp
 * @property integer $fregion
 * @property integer $farea
 * @property integer $fstreet
 * @property string $fhouse
 * @property string $fcorp
 * @property string $inn
 * @property string $kpp
 * @property string $account
 * @property string $telephone
 * @property string $post_index
 * @property string $region_name
 * @property string $froom
 * @property string $jroom
 * @property string $DEBT
 * @property boolean $VIP
 * @property double $sum_price
 * @property double $sum_appz_price
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class PropForms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'PropForms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fown_id, lph_id, bank_id, jregion, jarea, jstreet, fregion, farea, fstreet, EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('sum_price, sum_appz_price', 'numerical'),
			array('FormName, TaxNumber, SettlementAccount, telephone, region_name, jroom', 'length', 'max'=>50),
			array('City', 'length', 'max'=>100),
			array('jhouse, jcorp, fhouse, fcorp', 'length', 'max'=>15),
			array('inn', 'length', 'max'=>12),
			array('kpp', 'length', 'max'=>9),
			array('account, froom', 'length', 'max'=>20),
			array('post_index', 'length', 'max'=>10),
			array('DEBT', 'length', 'max'=>19),
			array('VIP, Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Form_id, FormName, fown_id, lph_id, TaxNumber, SettlementAccount, City, bank_id, jregion, jarea, jstreet, jhouse, jcorp, fregion, farea, fstreet, fhouse, fcorp, inn, kpp, account, telephone, post_index, region_name, froom, jroom, DEBT, VIP, sum_price, sum_appz_price, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
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
			'Form_id' => 'Form',
			'FormName' => 'Form Name',
			'fown_id' => 'Fown',
			'lph_id' => 'Lph',
			'TaxNumber' => 'Tax Number',
			'SettlementAccount' => 'Settlement Account',
			'City' => 'City',
			'bank_id' => 'Bank',
			'jregion' => 'Jregion',
			'jarea' => 'Jarea',
			'jstreet' => 'Jstreet',
			'jhouse' => 'Jhouse',
			'jcorp' => 'Jcorp',
			'fregion' => 'Fregion',
			'farea' => 'Farea',
			'fstreet' => 'Fstreet',
			'fhouse' => 'Fhouse',
			'fcorp' => 'Fcorp',
			'inn' => 'Inn',
			'kpp' => 'Kpp',
			'account' => 'Account',
			'telephone' => 'Telephone',
			'post_index' => 'Post Index',
			'region_name' => 'Region Name',
			'froom' => 'Froom',
			'jroom' => 'Jroom',
			'DEBT' => 'Debt',
			'VIP' => 'Vip',
			'sum_price' => 'Sum Price',
			'sum_appz_price' => 'Sum Appz Price',
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

		$criteria->compare('Form_id',$this->Form_id);
		$criteria->compare('FormName',$this->FormName,true);
		$criteria->compare('fown_id',$this->fown_id);
		$criteria->compare('lph_id',$this->lph_id);
		$criteria->compare('TaxNumber',$this->TaxNumber,true);
		$criteria->compare('SettlementAccount',$this->SettlementAccount,true);
		$criteria->compare('City',$this->City,true);
		$criteria->compare('bank_id',$this->bank_id);
		$criteria->compare('jregion',$this->jregion);
		$criteria->compare('jarea',$this->jarea);
		$criteria->compare('jstreet',$this->jstreet);
		$criteria->compare('jhouse',$this->jhouse,true);
		$criteria->compare('jcorp',$this->jcorp,true);
		$criteria->compare('fregion',$this->fregion);
		$criteria->compare('farea',$this->farea);
		$criteria->compare('fstreet',$this->fstreet);
		$criteria->compare('fhouse',$this->fhouse,true);
		$criteria->compare('fcorp',$this->fcorp,true);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('kpp',$this->kpp,true);
		$criteria->compare('account',$this->account,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('post_index',$this->post_index,true);
		$criteria->compare('region_name',$this->region_name,true);
		$criteria->compare('froom',$this->froom,true);
		$criteria->compare('jroom',$this->jroom,true);
		$criteria->compare('DEBT',$this->DEBT,true);
		$criteria->compare('VIP',$this->VIP);
		$criteria->compare('sum_price',$this->sum_price);
		$criteria->compare('sum_appz_price',$this->sum_appz_price);
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
	 * @return PropForms the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE PropForms SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Form_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
