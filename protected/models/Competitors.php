<?php

/**
 * This is the model class for table "Competitors".
 *
 * The followings are the available columns in table 'Competitors':
 * @property integer $cmtr_id
 * @property string $Competitor
 * @property boolean $Lock
 * @property integer $EmplLock
 * @property string $DateLock
 * @property integer $EmplCreate
 * @property string $DateCreate
 * @property integer $EmplChange
 * @property string $DateChange
 * @property integer $EmplDel
 * @property string $DelData
 */
class Competitors extends MainFormModel
{
    public $cmtr_id;
    public $Competitor;
    public $Lock;
    public $EmplLock;
    public $DateLock;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $EmplDel;
    public $DelDate;
    
    
    
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Competitors';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Competitor', 'required'),
            array('EmplLock, EmplCreate, EmplChange, EmplDel', 'numerical', 'integerOnly'=>true),
            array('Competitor', 'length', 'max'=>250),
            array('Lock, DateLock, DateCreate, DateChange, DelData', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('cmtr_id, Competitor, Lock, EmplLock, DateLock, EmplCreate, DateCreate, EmplChange, DateChange, EmplDel, DelData', 'safe', 'on'=>'search'),
        );
    }
    
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Competitors';
        $this->SP_UPDATE_NAME = 'UPDATE_Competitors';
        $this->SP_DELETE_NAME = 'DELETE_Competitors';

        $Select = "Select
                        cmts.cmtr_id,
                        cmts.Competitor,
                        cmts.Lock,
                        cmts.EmplLock,
                        cmts.DateLock,
                        cmts.EmplCreate,
                        cmts.DateCreate,
                        cmts.EmplChange,
                        cmts.DateChange,
                        cmts.EmplDel,
                        cmts.DelDate";
        $From = "\nFrom Competitors cmts";
        $Where = "\nWhere cmts.DelDate is null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'cmts.cmtr_id';
        $this->PrimaryKey = 'cmtr_id';
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
            'cmtr_id' => 'Cmtr',
            'Competitor' => 'Competitor',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'DateLock' => 'Date Lock',
            'EmplCreate' => 'Empl Create',
            'DateCreate' => 'Date Create',
            'EmplChange' => 'Empl Change',
            'DateChange' => 'Date Change',
            'EmplDel' => 'Empl Del',
            'DelData' => 'Del Data',
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

        $criteria->compare('cmtr_id',$this->cmtr_id);
        $criteria->compare('Competitor',$this->Competitor,true);
        $criteria->compare('Lock',$this->Lock);
        $criteria->compare('EmplLock',$this->EmplLock);
        $criteria->compare('DateLock',$this->DateLock,true);
        $criteria->compare('EmplCreate',$this->EmplCreate);
        $criteria->compare('DateCreate',$this->DateCreate,true);
        $criteria->compare('EmplChange',$this->EmplChange);
        $criteria->compare('DateChange',$this->DateChange,true);
        $criteria->compare('EmplDel',$this->EmplDel);
        $criteria->compare('DelData',$this->DelData,true);
        $criteria->compare('EmplDel', array(null));
        return new CActiveDataProvider($this, array(
                'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Competitors the static model class
     */
     public function deleteCount($id, $empl_id) {

        $Command = Yii::app()->db->createCommand(''
        . "UPDATE Competitors SET EmplDel = {$empl_id}, DelDate = '".date('m.d.y H:i:s')."' WHERE cmtr_id = {$id}
        ");

    return $Command->queryAll();
    }
    public static function model($className=__CLASS__)
    {
            return parent::model($className);
    }
}
