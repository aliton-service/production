<?php


class CostCalculations_v extends MainFormModel
{
    public $Calc_id;
    public $Type;
    public $TypeName;
    public $Date;
    public $Sum_High_Full;
    public $SumPay;
    public $Treb_id;
    public $Name;
    public $Addr;
    public $Territ_id;
    public $MngrShortName;
    public $Date_Ready;
    public $Demand_id;
    public $Date_Agreed;
    public $AgreedShortName;
    public $PaymentTypeName;
    public $JuridicalPerson;
    public $BuhAct_id;
    public $Sum_Works_Low;
    public $TrebShortName;
    public $TrebDate;
    public $Number;
    public $ProcPay;
    public $ObjectGr_id;
                
    public function rules()
    {
        return array(
            array('Calc_id,
                    Type,
                    TypeName,
                    Date,
                    Sum_High_Full,
                    SumPay,
                    Treb_id,
                    Name,
                    Addr,
                    MngrShortName,
                    Date_Ready,
                    Demand_id,
                    Date_Agreed,
                    AgreedShortName,
                    PaymentTypeName,
                    JuridicalPerson,
                    BuhAct_id,
                    Sum_Works_Low,
                    TrebShortName,
                    Date,
                    Number,
                    ProcPay,', 'safe'),
        );
            
    }
	
    function __construct($scenario = '') {

        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = '';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        c.Calc_id,
                        c.Type,
                        Case	When c.Type = 0 Then 'Комм. предложение'
                            When c.Type = 1 Then 'Смета'
                            When c.Type = 2 Then 'Доп. смета' End TypeName,
                        c.Date,
                        c.Sum_High_Full,
                        c.SumPay,
                        c.Treb_id,
                        c.Name,
                        c.Addr,
                        c.Territ_id,
                        c.MngrShortName,
                        c.Date_Ready,
                        c.Demand_id,
                        c.Date_Agreed,
                        c.AgreedShortName,
                        c.PaymentTypeName,
                        c.JuridicalPerson,
                        c.BuhAct_id,
                        c.Sum_Works_Low,
                        e.ShortName as TrebShortName,
                        d.Date as TrebDate,
                        d.Number,
                        c.ObjectGr_id,
                        Case When c.Sum_High_Full > 0 Then round(c.SumPay/c.Sum_High_Full*100, 2) Else 0 End as ProcPay";
        $From = "\nFrom CostCalculations_v c left join WHDocuments d on (c.Treb_id = d.Docm_id)
                        left join Employees e on (e.Employee_id = d.Empl_id)";
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        // Инициализация первичного ключа
        $this->KeyFiled = 'c.Calc_id';
        $this->PrimaryKey = 'Calc_id';
    }
    
    public function attributeLabels()
    {
            return array(
                    'Calc_id' => '',
                    'Type' => '',
                    'TypeName' => '',
                    'Date' => '',
                    'Sum_High_Full' => '',
                    'SumPay' => '',
                    'Treb_id' => '',
                    'Name' => '',
                    'Addr' => '',
                    'MngrShortName' => '',
                    'Date_Ready' => '',
                    'Demand_id' => '',
                    'Date_Agreed' => '',
                    'AgreedShortName' => '',
                    'PaymentTypeName' => '',
                    'JuridicalPerson' => '',
                    'BuhAct_id' => '',
                    'Sum_Works_Low' => '',
                    'TrebShortName' => '',
                    'Date' => '',
                    'Number' => '',
                    'ProcPay' => '',
            );
    }
    
    public function attributeFilters()
    {
        return array(
            'Calc_id' => 'cast(c.Calc_id as nvarchar)',
            'Territ_id' => 'c.Territ_id',
            'Date' => 'c.Date',
        );
        
        
    }
    
    public function attributeSotrs() {
        return array(
            'Calc_id' => 'c.Calc_id'
        );
    }
	
}
