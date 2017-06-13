<?php

class EqipGroups extends MainFormModel
{
    public $group_id = null;
    public $parent_group_id = 1;
    public $code = null;
    public $group_name = null;
    public $full_group_name = null;
    public $Lock = null;
    public $EmplLock = null;
    public $DateLock = null;
    public $EmplCreate = null;
    public $DateCreate = null;
    public $EmplChange = null;
    public $DateChange = null;
    public $EmplDel = null;
    public $DelDate = null;

    public $KeyFiled = 'eg.group_id';
    public $PrimaryKey = 'group_id';

    public $SP_INSERT_NAME = 'INSERT_EqipGroups2';
    public $SP_UPDATE_NAME = 'UPDATE_EqipGroups';
    public $SP_DELETE_NAME = 'DELETE_EqipGroups';


    function __construct($scenario='')
    {
        parent::__construct($scenario);

        $select = "\nSelect
                        eg.group_id,
                        eg.parent_group_id,
                        eg.code,
                        eg.group_name,
                        eg.full_group_name";
        $from = "\nFrom EqipGroups eg ";
        $where = "\nWhere eg.DelDate Is Null ";
        $order = "\nOrder By eg.code ";

        $this->Query->setSelect($select);
        $this->Query->setFrom($from);
        $this->Query->setOrder($order);
        $this->Query->setWhere($where);
    }

    public function rules()
    {
        return array(
            array('group_id, parent_group_id, code, group_name, full_group_name', 'safe'),
        );
    }


    public function attributeLabels()
    {
        return array(
            'group_id' => 'Group',
            'parent_group_id' => 'Parent Group',
            'code' => 'Code',
            'group_name' => 'Наименвоание',
            'full_group_name' => 'Full Group Name',
            'Lock' => 'Lock',
            'EmplLock' => 'Empl Lock',
            'DateLock' => 'Date Lock',
            'EmplCreate' => 'Empl Create',
            'DateCreate' => 'Date Create',
            'EmplChange' => 'Empl Change',
            'DateChange' => 'Date Change',
            'EmplDel' => 'Empl Del',
            'DelDate' => 'Del Date',
        );
    }
	
}
