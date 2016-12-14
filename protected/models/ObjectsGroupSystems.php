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
    public $count;
    public $EmplCreate;
    public $Competitors;
    public $SysCmplxt_id;
    public $SysSttmnt_id;
    public $SystemComplexitysName;
    public $SystemStatementsName;
    public $Coefficient;
    public $Coefficient2;
    public $SystemComplexityFull;
    
    public function rules() {
        return array(
            /* обязательные поля*/
            array('Sttp_id, ObjectGr_id, Availability_id, count', 'required'),
            array('ObjectsGroupSystem_id,'
                . 'SystemTypeName,'
                . 'CustomerName,'
                . 'Desc,'
                . 'Condition,'
                . 'Availability,'
                . 'count,'
                . 'EmplCreate,'
                . 'Competitors,'
                . 'SysCmplxt_id,'
                . 'SysSttmnt_id,'
                . 'SystemComplexitysName,'
                . 'SystemStatementsName,'
                . 'Coefficient,'
                . 'Coefficient2,'
                . 'SystemComplexityFull', 'safe'),
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
                    ."  s.count,"
                    ."  s.EmplCreate,"
                    ."  cast(dbo.get_competitor_info(s.ObjectsGroupSystem_id) as nvarchar(50)) as Competitors,"
                    ."  sc.SystemComplexitysName,
                        sc.Coefficient,
                        s.SysSttmnt_id,
                        ss.SystemStatementsName,
                        ss.Coefficient as Coefficient2,
                        s.SystemComplexityFull";
        $From =     "\nFrom ObjectsGroupSystems s left join SystemTypes st on (s.Sttp_id = st.SystemType_id)"
                    ."  left join SystemAvailabilitys a on (s.Availability_id = a.code_id)"
                    ."  left join SystemComplexitys sc on (sc.SystemComplexitys_id = s.SysCmplxt_id)
                        left join SystemStatements ss on (ss.SystemStatements_id = s.SysSttmnt_id)";
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
                    'SysCmplxt_id' => '',
                    'SysSttmnt_id' => '',
                    'SystemComplexitysName' => '',
                    'SystemStatementsName' => '',
                    'Coefficient' => '',
                    'Coefficient2' => '',
                    'SystemComplexityFull' => '',
            );
    }
}

