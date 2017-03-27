<?php

class ClientSolutions extends MainFormModel
{
    public $ClientSolution_id;
    public $Form_id;
    public $Action_id;
    public $Solution1Result_id;
    public $Solution1Date;
    public $Solution1Note;
    public $Solution2Result_id;
    public $Solution2Date;
    public $Solution2Note;
    public $Solution3Result_id;
    public $Solution3Date;
    public $Solution3Note;
    public $Solution4Result_id;
    public $Solution4Date;
    public $Solution4Note;
    public $Solution5Result_id;
    public $Solution5Date;
    public $Solution5Note;
    public $Solution6Result_id;
    public $Solution6Date;
    public $Solution6Note;
    public $Solution7Result_id;
    public $Solution7Date;
    public $Solution7Note;
    public $Solution8Result_id;
    public $Solution8Date;
    public $Solution8Note;
    public $Solution9Result_id;
    public $Solution9Date;
    public $Solution9Note;
    public $Solution10Result_id;
    public $Solution10Date;
    public $Solution10Note;
    public $Solution11Result_id;
    public $Solution11Date;
    public $Solution11Note;
    public $Solution12Result_id;
    public $Solution12Date;
    public $Solution12Note;
    public $Solution13Result_id;
    public $Solution13Date;
    public $Solution13Note;
    public $Solution14Result_id;
    public $Solution14Date;
    public $Solution14Note;
    public $Solution15Result_id;
    public $Solution15Date;
    public $Solution15Note;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_INSERT_NAME = '';
        $this->SP_UPDATE_NAME = 'UPDATE_ClientSolutions';
        $this->SP_DELETE_NAME = '';

        $Select = "\nSelect
                        ms.ClientSolution_id,
                        ms.Form_id,
                        ms.Action_id,
                        ms.Solution1Result_id,
                        ms.Solution1Date,
                        ms.Solution1Note,
                        ms.Solution2Result_id,
                        ms.Solution2Date,
                        ms.Solution2Note,
                        ms.Solution3Result_id,
                        ms.Solution3Date,
                        ms.Solution3Note,
                        ms.Solution4Result_id,
                        ms.Solution4Date,
                        ms.Solution4Note,
                        ms.Solution5Result_id,
                        ms.Solution5Date,
                        ms.Solution5Note,
                        ms.Solution6Result_id,
                        ms.Solution6Date,
                        ms.Solution6Note,
                        ms.Solution7Result_id,
                        ms.Solution7Date,
                        ms.Solution7Note,
                        ms.Solution8Result_id,
                        ms.Solution8Date,
                        ms.Solution8Note,
                        ms.Solution9Result_id,
                        ms.Solution9Date,
                        ms.Solution9Note,
                        ms.Solution10Result_id,
                        ms.Solution10Date,
                        ms.Solution10Note,
                        ms.Solution11Result_id,
                        ms.Solution11Date,
                        ms.Solution11Note,
                        ms.Solution12Result_id,
                        ms.Solution12Date,
                        ms.Solution12Note,
                        ms.Solution13Result_id,
                        ms.Solution13Date,
                        ms.Solution13Note,
                        ms.Solution14Result_id,
                        ms.Solution14Date,
                        ms.Solution14Note,
                        ms.Solution15Result_id,
                        ms.Solution15Date,
                        ms.Solution15Note";
        $From = "\nFrom ClientSolutions ms";
        
        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        $this->KeyFiled = 'ms.ClientSolution_id';
        $this->PrimaryKey = 'ClientSolution_id';
    }
    
    public function rules()
    {
        return array(
            array('ClientSolution_id,
                    Form_id,
                    Action_id,
                    Solution1Result_id,
                    Solution1Date,
                    Solution1Note,
                    Solution2Result_id,
                    Solution2Date,
                    Solution2Note,
                    Solution3Result_id,
                    Solution3Date,
                    Solution3Note,
                    Solution4Result_id,
                    Solution4Date,
                    Solution4Note,
                    Solution5Result_id,
                    Solution5Date,
                    Solution5Note,
                    Solution6Result_id,
                    Solution6Date,
                    Solution6Note,
                    Solution7Result_id,
                    Solution7Date,
                    Solution7Note,
                    Solution8Result_id,
                    Solution8Date,
                    Solution8Note,
                    Solution9Result_id,
                    Solution9Date,
                    Solution9Note,
                    Solution10Result_id,
                    Solution10Date,
                    Solution10Note,
                    Solution11Result_id,
                    Solution11Date,
                    Solution11Note,
                    Solution12Result_id,
                    Solution12Date,
                    Solution12Note,
                    Solution13Result_id,
                    Solution13Date,
                    Solution13Note,
                    Solution14Result_id,
                    Solution14Date,
                    Solution14Note,
                    Solution15Result_id,
                    Solution15Date,
                    Solution15Note', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'ClientSolution_id' => '',
            'Form_id' => '',
            'Action_id' => '',
            'Solution1Result_id' => '',
            'Solution1Date' => '',
            'Solution1Note' => '',
            'Solution2Result_id' => '',
            'Solution2Date' => '',
            'Solution2Note' => '',
            'Solution3Result_id' => '',
            'Solution3Date' => '',
            'Solution3Note' => '',
            'Solution4Result_id' => '',
            'Solution4Date' => '',
            'Solution4Note' => '',
            'Solution5Result_id' => '',
            'Solution5Date' => '',
            'Solution5Note' => '',
            'Solution6Result_id' => '',
            'Solution6Date' => '',
            'Solution6Note' => '',
            'Solution7Result_id' => '',
            'Solution7Date' => '',
            'Solution7Note' => '',
            'Solution8Result_id' => '',
            'Solution8Date' => '',
            'Solution8Note' => '',
            'Solution9Result_id' => '',
            'Solution9Date' => '',
            'Solution9Note' => '',
            'Solution10Result_id' => '',
            'Solution10Date' => '',
            'Solution10Note' => '',
            'Solution11Result_id' => '',
            'Solution11Date' => '',
            'Solution11Note' => '',
            'Solution12Result_id' => '',
            'Solution12Date' => '',
            'Solution12Note' => '',
            'Solution13Result_id' => '',
            'Solution13Date' => '',
            'Solution13Note' => '',
            'Solution14Result_id' => '',
            'Solution14Date' => '',
            'Solution14Note' => '',
            'Solution15Result_id' => '',
            'Solution15Date' => '',
            'Solution15Note' => '',
        );
    }
}




