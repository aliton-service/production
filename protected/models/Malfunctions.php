<?php

/**
 * This is the model class for table "Malfunctions".
 *
 * The followings are the available columns in table 'Malfunctions':
 * @property integer $Malfunction_id
 * @property string $Malfunction
 * @property integer $EquipType_id
 * @property string $DateCreate
 * @property string $EmplCreate
 * @property string $DateChange
 * @property string $EmplChange
 * @property string $DelDate
 * @property integer $Sort
 * @property string $EmplDel
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 */
class Malfunctions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Malfunctions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Malfunction, DateCreate, EmplCreate', 'required'),
			array('EquipType_id, Sort, EmplLock', 'numerical', 'integerOnly'=>true),
			array('Malfunction', 'length', 'max'=>150),
			array('EmplCreate, EmplChange', 'length', 'max'=>50),
			array('EmplDel', 'length', 'max'=>10),
			array('DateChange, DelDate, Lock, DateLock', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Malfunction_id, Malfunction, EquipType_id, DateCreate, EmplCreate, DateChange, EmplChange, DelDate, Sort, EmplDel, Lock, EmplLock, DateLock', 'safe', 'on'=>'search'),
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
			'Malfunction_id' => 'Malfunction',
			'Malfunction' => 'Malfunction',
			'EquipType_id' => 'Equip Type',
			'DateCreate' => 'Date Create',
			'EmplCreate' => 'Empl Create',
			'DateChange' => 'Date Change',
			'EmplChange' => 'Empl Change',
			'DelDate' => 'Del Date',
			'Sort' => 'Sort',
			'EmplDel' => 'Empl Del',
			'Lock' => 'Lock',
			'EmplLock' => 'Empl Lock',
			'DateLock' => 'Date Lock',
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

		$criteria->compare('Malfunction_id',$this->Malfunction_id);
		$criteria->compare('Malfunction',$this->Malfunction,true);
		$criteria->compare('EquipType_id',$this->EquipType_id);
		$criteria->compare('DateCreate',$this->DateCreate,true);
		$criteria->compare('EmplCreate',$this->EmplCreate,true);
		$criteria->compare('DateChange',$this->DateChange,true);
		$criteria->compare('EmplChange',$this->EmplChange,true);
		$criteria->compare('DelDate',$this->DelDate,true);
		$criteria->compare('Sort',$this->Sort);
		$criteria->compare('EmplDel',$this->EmplDel,true);
		$criteria->compare('Lock',$this->Lock);
		$criteria->compare('EmplLock',$this->EmplLock);
		$criteria->compare('DateLock',$this->DateLock,true);
		$criteria->compare('EmplDel', array(null));
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Malfunctions the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE Malfunctions SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Malfunction_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function all() {
		return CHtml::listData(self::model()->findAll(), 'Malfunction_id', 'Malfunction');

	}
        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select Malfunction_id, Malfunction");
            $q->setFrom("\nFrom Malfunctions");
            $q->setWhere("\nWhere DelDate is Null");
            $q->setOrder("\nOrder by Malfunction");
            return $q->QueryAll();
        }
        
        public function getDataForDemandEdit() {
            $q = new SQLQuery();
            $q->setSelect("Select p.DemandType_id, p.SystemType_id, p.EquipType_id, p.Malfunction_id, m.Malfunction");
            $q->setFrom("\nFrom DemandsExecTime p left join Malfunctions m on (p.Malfunction_id = m.Malfunction_id)");
            $q->setWhere("\nWhere p.DelDate is null");
            $q->setGroupBy("\nGroup by p.DemandType_id, p.SystemType_id, p.EquipType_id, p.Malfunction_id, m.Malfunction");
            $q->setOrder("\nOrder by m.Malfunction");
            return $q->QueryAll();
        }
}
