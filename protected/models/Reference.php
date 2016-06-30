<?php

class Reference extends CActiveRecord
{

   /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Regions';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('Sort, EmplLock, EmplDel, EmplChange', 'numerical', 'integerOnly'=>true),
            array('RegionName', 'length', 'max'=>50),
            array('Lock, DateLock, DateChange', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('Region_id, RegionName, Sort, Lock, EmplLock, DateLock, EmplDel, DateChange, EmplChange', 'safe', 'on'=>'search'),
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
            'region' => array(self::BELONGS_TO, 'Regions', 'Region_id'),
            'regions' => array(self::HAS_ONE, 'Regions', 'Region_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'Region_id' => 'Region',
            'RegionName' => 'Region Name',
            'Sort' => 'Sort',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'DateLock' => 'Date Lock',
            'EmplDel' => 'Empl Del',
            'DateChange' => 'Date Change',
            'EmplChange' => 'Empl Change',
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

        $criteria->compare('Region_id',$this->Region_id);
        $criteria->compare('RegionName',$this->RegionName,true);
        $criteria->compare('Sort',$this->Sort);
        $criteria->compare('Lock',$this->Lock);
        $criteria->compare('EmplLock',$this->EmplLock);
        $criteria->compare('DateLock',$this->DateLock,true);
        $criteria->compare('EmplDel',$this->EmplDel);
        $criteria->compare('DateChange',$this->DateChange,true);
        $criteria->compare('EmplChange',$this->EmplChange);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Regions the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}

