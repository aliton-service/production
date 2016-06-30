<?php

/**
 * This is the model class for table "Juridicals".
 *
 * The followings are the available columns in table 'Juridicals':
 * @property integer $Jrdc_Id
 * @property string $JuridicalPerson
 * @property string $Identification
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
 * @property string $ogrn
 * @property string $okpo
 * @property string $telephone
 * @property string $post_index
 * @property integer $empl_id
 * @property integer $bank_id
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property string $DelDate
 * @property integer $EmplDel
 */
class Juridicals extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Juridicals';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('JuridicalPerson', 'required'),
			array('jregion, jarea, jstreet, fregion, farea, fstreet, empl_id, bank_id, EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('JuridicalPerson', 'length', 'max'=>250),
			array('Identification', 'length', 'max'=>500),
			array('jhouse, fhouse', 'length', 'max'=>55),
			array('jcorp, fcorp', 'length', 'max'=>15),
			array('inn', 'length', 'max'=>10),
			array('kpp', 'length', 'max'=>9),
			array('account', 'length', 'max'=>20),
			array('ogrn', 'length', 'max'=>13),
			array('okpo', 'length', 'max'=>8),
			array('telephone, post_index', 'length', 'max'=>50),
			array('Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Jrdc_Id, JuridicalPerson, Identification, jregion, jarea, jstreet, jhouse, jcorp, fregion, farea, fstreet, fhouse, fcorp, inn, kpp, account, ogrn, okpo, telephone, post_index, empl_id, bank_id, Lock, EmplLock, DateLock, EmplChange, DateChange, DelDate, EmplDel', 'safe', 'on'=>'search'),
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
			'region'   => array(self::BELONGS_TO, 'Regions', 'jregion'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'Jrdc_Id' => 'Jrdc',
			'JuridicalPerson' => 'Juridical Person',
			'Identification' => 'Identification',
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
			'ogrn' => 'Ogrn',
			'okpo' => 'Okpo',
			'telephone' => 'Telephone',
			'post_index' => 'Post Index',
			'empl_id' => 'Empl',
			'bank_id' => 'Bank',
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

		$criteria->compare('Jrdc_Id',$this->Jrdc_Id);
		$criteria->compare('JuridicalPerson',$this->JuridicalPerson,true);
		$criteria->compare('Identification',$this->Identification,true);
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
		$criteria->compare('ogrn',$this->ogrn,true);
		$criteria->compare('okpo',$this->okpo,true);
		$criteria->compare('telephone',$this->telephone,true);
		$criteria->compare('post_index',$this->post_index,true);
		$criteria->compare('empl_id',$this->empl_id);
		$criteria->compare('bank_id',$this->bank_id);
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
	 * @return Juridicals the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Juridicals SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Jrdc_Id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
