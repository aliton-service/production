<?php

class ObjectsGroupSystems extends MainFormModel
{    
    public $ObjectsGroupSystem_id;
    public $SystemTypeName;
    public $Sttp_id;
    public $ObjectGr_id;
    public $Desc;
    public $Condition;
    public $Availability_id;
    public $Availability;
    public $Count;
    public $EmplCreate;
    public $Competitors;

    public function rules() {
        return array(
            /* обязательные поля*/
            array('Sttp_id, ObjectGr_id, Availability_id', 'required'),
            array('ObjectsGroupSystem_id,'
                . 'SystemTypeName,'
                . 'CustomerName,'
                . 'Desc,'
                . 'Condition,'
                . 'Availability,'
                . 'Count,'
                . 'EmplCreate,'
                . 'Competitors', 'safe'),
        );
    }
    
    public function __construct($scenario = '') {
        
        parent::__construct($scenario);
        
        $this->SP_INSERT_NAME = 'INSERT_ObjectsGroupSystems';
        $this->SP_UPDATE_NAME = 'UPDATE_ObjectsGroupSystems';
        $this->SP_DELETE_NAME = 'DELETE_ObjectsGroupSystems';
        
        $Select =   "\nSelect"
                    ."  s.ObjectsGroupSystem_id,"
                    ."  st.SystemTypeName,"
                    ."  s.Sttp_id,"
                    ."  s.ObjectGr_id,"
                    ."  s.[Desc],"
                    ."  s.Condition,"
                    ."  s.Availability_id,"
                    ."  a.Availability,"
                    ."  s.[Count],"
                    ."  s.EmplCreate,"
                    ."  cast(dbo.get_competitor_info(s.ObjectsGroupSystem_id) as nvarchar(50)) as Competitors";
        $From =     "\nFrom ObjectsGroupSystems s left join SystemTypes st on (s.Sttp_id = st.SystemType_id)"
                    ."  left join SystemAvailabilitys a on (s.Availability_id = a.code_id)";
        $Where =    "\nWhere s.DelDate is Null";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->KeyFiled = 's.ObjectsGroupSystem_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'ObjectsGroupSystem_id' => 'ObjectsGroupSystem_id',
                    'SystemTypeName' => 'Тип системы',
                    'Sttp_id' => 'Тип системы',
                    'ObjectGr_id' => 'ObjectGr_id',
                    'Desc' => 'Описание',
                    'Condition' => 'Условия',
                    'Availability_id' => 'Наличие',
                    'Availability' => 'Наличие',
                    'Count' => 'Кол-во',
            );
    }
}

