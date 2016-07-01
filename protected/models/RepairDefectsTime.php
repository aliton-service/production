<?php

class RepairDefectsTime extends MainFormModel {
	
    public $Code_id;
    public $Equip_id;
    public $Defect_id;
    public $ExecTime;

    function __construct() {
        parent::__construct();

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';    

        $Select = "\nSelect
                        d.Code_id,
                        d.Equip_id,
                        d.Defect_id,
                        Cast(Round(d.ExecTime, 0) as Int) as ExecTime";
        $From = "\nFrom RepairDefectsTime d";
        $Where = "\nWhere d.DelDate is Null";
        $Order = " Order By d.Code_id";

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        $this->Query->setWhere($Where);
        $this->Query->setOrder($Order);
    }
	
    public function rules() {
            return array(
                    array('Code_id', 'required'),
                    array('Code_id, Equip_id, Defect_id, ExecTime', 'safe'),
            );
    }

    public function attributeLabels() {
            return array(
                'Code_id' => '',
                'Equip_id' => '',
                'Defect_id' => '',
                'ExecTime' => '',
            );
    }
}
