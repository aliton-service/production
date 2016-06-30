<?php

class DSystems extends MainFormModel
{
    public $DSystem_id;
    public $DType_id;
    public $SystemType_id;
    public $SystemType;
    public $Sort;

    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "Select
                        d.DSystem_id,
                        d.DType_id,
                        d.SystemType_id,
                        isNull(st.SystemTypeName, '(Пусто)') as SystemType,
                        d.Sort";
        $From = "\nFrom DSystems d Left join SystemTypes st on (d.SystemType_id = st.SystemType_Id)";
        $Order = "\nOrder by d.Sort";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setOrder($Order);

        // Инициализация первичного ключа
        $this->KeyFiled = 'd.DSystem_id';
        $this->PrimaryKey = 'DSystem_id';
    }
        
    public function rules()
    {
        return array(
            array('DSystem_id,
                    DType_id,
                    SystemType_id,
                    SystemType,
                    Sort', 'safe'),
        );
    }

    public function attributeLabels()
    {
        return array(
            'DSystem_id' => '',
            'DType_id' => '',
            'SystemType_id' => '',
            'SystemType' => '',
            'Sort' => '',
        );
    }
}




