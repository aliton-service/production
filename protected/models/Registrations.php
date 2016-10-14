<?php

class Registrations extends MainFormModel
{
    public $Registration_id = null;

    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_Registrations';
        $this->SP_UPDATE_NAME = 'UPDATE_Registrations';
        $this->SP_DELETE_NAME = 'DELETE_Registrations';

        $Select = "\nSelect 
                       r.Registration_id,
                       r.RegistrationName";
        
        $From = "\nFrom Registrations r";
        
        $Where = "\nWhere r.DelDate is Null";
        
        $Order = "\nOrder by r.RegistrationName";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);

        $this->KeyFiled = 'r.Registration_id';
        $this->PrimaryKey = 'Registration_id';
    }
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'Registrations';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            array('RegistrationName', 'required'),
            array('Registration_id', 'integerOnly'=>true),
            array('Registration_id, RegistrationName', 'safe'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'Registration_id' => 'Registration_id',
            'RegistrationName' => 'RegistrationName',
        );
    }

}
