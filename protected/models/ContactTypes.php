<?php

/**
 * This is the model class for table "ContactTypes".
 *
 * The followings are the available columns in table 'ContactTypes':
 * @property integer $Contact_id
 * @property string $ContactName
 * @property boolean $Visible
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelDate
 */
class ContactTypes extends CActiveRecord
{

	public $id_dropList = 'Contact_id';
	public $name_dropList = 'ContactName';
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'ContactTypes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('EmplLock, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
			array('ContactName', 'length', 'max'=>50),
			array('Visible, Lock, DateLock, DateChange, DelDate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Contact_id, ContactName, Visible, Lock, EmplLock, DateLock, EmplChange, DateChange, EmplDel, DelDate', 'safe', 'on'=>'search'),
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
			'Contact_id' => 'Contact',
			'ContactName' => 'Contact Name',
			'Visible' => 'Visible',
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

		$criteria->compare('Contact_id',$this->Contact_id);
		$criteria->compare('ContactName',$this->ContactName,true);
		$criteria->compare('Visible',$this->Visible);
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
	 * @return ContactTypes the static model class
	 */
	 public function deleteCount($id, $empl_id) {
	 
		$Command = Yii::app()->db->createCommand(''
                . "UPDATE ContactTypes SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE Contact_id = {$id}
                ");
        
        return $Command->queryAll();
	}
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	static function all() {
		return CHtml::listData(self::model()->findAll(), 'Contact_id', 'ContactName');
	
	}
        
        public function getData() {
            $q = new SQLQuery();
            $q->setSelect("Select Contact_id, ContactName");
            $q->setFrom("\nFrom ContactTypes");
            $q->setWhere("\nWhere DelDate is Null");
            return $q->QueryAll();
        }
}
