<?php

class InspectionActs_v extends MainFormModel
{
    public $Inspection_id;
    public $Date;
    public $ObjectGr_id;
    public $Demand_id;
    public $Addr;
    public $SystemType_id;
    public $SystemTypeName;
    public $Empl_id;
    public $EmployeeName;
    public $Info_id;
    public $FIO;
    public $Territ_id;
    public $Territ_Name;
    public $LiveAreaSize;
    public $SystemComplexity_id;
    public $SystemComplexitysName;
    public $CountEntrance;
    public $CountFloors;
    public $CountApartments;
    public $Perimetr;
    public $Feature;
    public $Statement_id;
    public $SystemStatementsName;
    public $ServiceCompetitor_id;
    public $ServiceCompetitor;
    public $MontageCompetitor_id;
    public $MontageCompetitor;
    public $Claims;
    public $DateMontage;
    public $Documentations;
    public $CountRiser;
    public $PreparationVideo;
    public $StateTrails;
    public $BoxInfo;
    public $ResultEngineer;
    public $ResultHead;
    public $DateAgreeROMTO;
    public $DateAgreeRGI;
    public $EmplCreate;
    public $DateCreate;
    public $EmplChange;
    public $DateChange;
    public $AgreeShortName;
            
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = 'INSERT_InspectionActs';
        $this->SP_UPDATE_NAME = 'UPDATE_InspectionActs';
        $this->SP_DELETE_NAME = 'DELETE_InspectionActs';

        $Select = "\nSelect
                        i.Inspection_id,
                        i.Date,
                        i.ObjectGr_id,
                        i.Demand_id,
                        i.Addr,
                        i.SystemType_id,
                        i.SystemTypeName,
                        i.Empl_id,
                        i.EmployeeName,
                        i.Info_id,
                        i.FIO,
                        i.Territ_id,
                        i.Territ_Name,
                        i.LiveAreaSize,
                        i.SystemComplexity_id,
                        i.SystemComplexitysName,
                        i.CountEntrance,
                        i.CountFloors,
                        i.CountApartments,
                        i.Perimetr,
                        i.Feature,
                        i.Statement_id,
                        i.SystemStatementsName,
                        i.ServiceCompetitor_id,
                        i.ServiceCompetitor,
                        i.MontageCompetitor_id,
                        i.MontageCompetitor,
                        i.Claims,
                        i.DateMontage,
                        i.Documentations,
                        i.CountRiser,
                        i.PreparationVideo,
                        i.StateTrails,
                        i.BoxInfo,
                        i.ResultEngineer,
                        i.ResultHead,
                        i.DateAgreeROMTO,
                        i.DateAgreeRGI,
                        i.AgreeShortName";
        $From = "\nFrom InspectionActs_v i";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        $this->KeyFiled = 'i.Inspection_id';
        $this->PrimaryKey = 'Inspection_id';
    }
    
    public function rules()
    {
        return array(
            array('Date, ObjectGr_id, SystemType_id, Empl_id', 'required'),
            array('Inspection_id,
                    Date,
                    ObjectGr_id,
                    Demand_id,
                    Addr,
                    SystemType_id,
                    SystemTypeName,
                    Empl_id,
                    EmployeeName,
                    Info_id,
                    FIO,
                    Territ_id,
                    Territ_Name,
                    LiveAreaSize,
                    SystemComplexity_id,
                    SystemComplexitysName,
                    CountEntrance,
                    CountFloors,
                    CountApartments,
                    Perimetr,
                    Feature,
                    Statement_id,
                    SystemStatementsName,
                    ServiceCompetitor_id,
                    ServiceCompetitor,
                    MontageCompetitor_id,
                    MontageCompetitor,
                    Claims,
                    DateMontage,
                    Documentations,
                    CountRiser,
                    PreparationVideo,
                    StateTrails,
                    BoxInfo,
                    ResultEngineer,
                    ResultHead,
                    DateAgreeROMTO,
                    DateAgreeRGI,
                    AgreeShortName', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Inspection_id' => '',
            'Date' => 'Дата',
            'ObjectGr_id' => '',
            'Demand_id' => '',
            'Addr' => '',
            'SystemType_id' => 'Система',
            'SystemTypeName' => '',
            'Empl_id' => 'Инженер',
            'EmployeeName' => '',
            'Info_id' => '',
            'FIO' => '',
            'Territ_id' => '',
            'Territ_Name' => '',
            'LiveAreaSize' => '',
            'SystemComplexity_id' => '',
            'SystemComplexitysName' => '',
            'CountEntrance' => '',
            'CountFloors' => '',
            'CountApartments' => '',
            'Perimetr' => '',
            'Feature' => '',
            'Statement_id' => '',
            'SystemStatementsName' => '',
            'ServiceCompetitor_id' => '',
            'ServiceCompetitor' => '',
            'MontageCompetitor_id' => '',
            'MontageCompetitor' => '',
            'Claims' => '',
            'DateMontage' => '',
            'Documentations' => '',
            'CountRiser' => '',
            'PreparationVideo' => '',
            'StateTrails' => '',
            'BoxInfo' => '',
            'ResultEngineer' => '',
            'ResultHead' => '',
            'DateAgreeROMTO' => '',
            'DateAgreeRGI' => '',
            'AgreeShortName' => '',
        );
    }
}




