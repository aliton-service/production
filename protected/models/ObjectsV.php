	<?php

/**
 * This is the model class for table "Objects_v".
 *
 * The followings are the available columns in table 'Objects_v':
 * @property integer $Object_id
 * @property integer $ObjectGr_id
 * @property integer $Address_id
 * @property string $Condition
 * @property string $Addr
 * @property string $MasterName
 * @property string $Servicetype
 * @property integer $status
 * @property integer $ContrS_id
 * @property integer $Master
 * @property string $JuridicalPerson
 * @property string $Refusers
 * @property string $FullName
 * @property string $ClientGroup
 * @property string $year_construction
 * @property string $AreaName
 * @property string $GroupDep
 * @property string $SalesManager
 * @property integer $Street_id
 * @property string $House
 * @property string $VIP
 * @property string $Territ_Name
 */
class ObjectsV extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Objects_v';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Object_id, year_construction, GroupDep, VIP', 'required'),
			array('Object_id, ObjectGr_id, Address_id, status, ContrS_id, Master, Street_id', 'numerical', 'integerOnly'=>true),
			array('Condition', 'length', 'max'=>500),
			array('Addr', 'length', 'max'=>295),
			array('MasterName, SalesManager', 'length', 'max'=>80),
			array('Servicetype, AreaName, Territ_Name', 'length', 'max'=>50),
			array('JuridicalPerson, ClientGroup', 'length', 'max'=>250),
			array('Refusers', 'length', 'max'=>1073741823),
			array('FullName', 'length', 'max'=>86),
			array('year_construction', 'length', 'max'=>11),
			array('GroupDep', 'length', 'max'=>2),
			array('House', 'length', 'max'=>10),
			array('VIP', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Object_id, ObjectGr_id, Address_id, Condition, Addr, MasterName, Servicetype, status, ContrS_id, Master, JuridicalPerson, Refusers, FullName, ClientGroup, year_construction, AreaName, GroupDep, SalesManager, Street_id, House, VIP, Territ_Name', 'safe', 'on'=>'search'),
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
			'Object_id' => 'Object',
			'ObjectGr_id' => 'Object Gr',
			'Address_id' => 'AddressId',
			'Condition' => 'Условия',
			'Addr' => 'Адрес',
			'MasterName' => 'Мастер',
			'Servicetype' => 'Тариф',
			'status' => 'Статус',
			'ContrS_id' => 'Contr S',
			'Master' => 'Master',
			'JuridicalPerson' => 'Юр. лицо',
			'Refusers' => 'Отказники',
			'FullName' => 'Организация',
			'ClientGroup' => 'Отдел',
			'year_construction' => 'Новостройка',
			'AreaName' => 'Район',
			'GroupDep' => 'Group Dep',
			'SalesManager' => 'Менеджер',
			'Street_id' => 'Street',
			'House' => 'House',
			'VIP' => 'ВИи',
			'Territ_Name' => 'Участок',
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
                
		$criteria->compare('Object_id',$this->Object_id);
		$criteria->compare('ObjectGr_id',$this->ObjectGr_id);
		$criteria->compare('Address_id',$this->Address_id);
		$criteria->compare('Condition',$this->Condition,true);
		$criteria->compare('Addr',$this->Addr,true);
		$criteria->compare('MasterName',$this->MasterName,true);
		$criteria->compare('Servicetype',$this->Servicetype,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('ContrS_id',$this->ContrS_id);
		$criteria->compare('Master',$this->Master);
		$criteria->compare('JuridicalPerson',$this->JuridicalPerson,true);
		$criteria->compare('Refusers',$this->Refusers,true);
		$criteria->compare('FullName',$this->FullName,true);
		$criteria->compare('ClientGroup',$this->ClientGroup,true);
		$criteria->compare('year_construction',$this->year_construction,true);
		$criteria->compare('AreaName',$this->AreaName,true);
		$criteria->compare('GroupDep',$this->GroupDep,true);
		$criteria->compare('SalesManager',$this->SalesManager,true);
		$criteria->compare('Street_id',$this->Street_id);
		$criteria->compare('House',$this->House,true);
		$criteria->compare('VIP',$this->VIP,true);
		$criteria->compare('Territ_Name',$this->Territ_Name,true);
                $criteria->order = 'Addr';
                
                
                
                
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        'pagination'=>array(
                            'pageSize'=>55,
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ObjectsV the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}


	static function getData() {
		$q = new SQLQuery();
		$q->setSelect("Select Addr, Object_id");
		$q->setFrom("\nFrom Objects_v");

		return $q->QueryAll();
	}

}
