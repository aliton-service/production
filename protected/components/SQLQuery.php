<?php

class SQLQuery
{
    public $select = '';
    public $from = '';
    public $where = '';
    public $groupby = '';
    public $order = '';
    public $text = '';
    
    public $Fields = array();
    public $Parameters = array();
    public $Data = array();
           
    public function __construct() {
        
    }
    
    public function AddParam($ParamName, $Value) {
        $Idx = count($this->Parameters);
        array_push($this->Parameters, array(
            'ParamName' => $ParamName,
            'ParamValue' => $Value,
            ));
    }
    
    protected function ParamParser($Text)
    {
        $Idx = 0;
        
        while (strpos($Text, ':#', $Idx) !== false)
        {
            $Idx = strpos($Text, ':#', $Idx);
            $IdxEnd = strpos($Text, ')', $Idx);
            if ($IdxEnd === false)
                $IdxEnd = strpos($Text, ',', $Idx);
            if ($IdxEnd === false)
                $IdxEnd = strpos($Text, ' ', $Idx);
            if ($IdxEnd === false)
                $IdxEnd = strlen ($Text);
            $ParamName = substr($Text, $Idx, ($IdxEnd - $Idx));
            $Idx++;
            if ($ParamName <> '') {
                $this->AddParam ($ParamName, NULL);
            }
        }
    }
    
    public function ParametersRefresh()
    {
        $this->Parameters = array();
               
        $this->ParamParser($this->select);
        $this->ParamParser($this->from);
        $this->ParamParser($this->where);
        $this->ParamParser($this->order);
        $this->ParamParser($this->groupby);
    }
    
    public function bindParam($ParamName, $Value)
    {
        for ($i = 0; $i < count($this->Parameters); $i++)
        {
            if (mb_strtoupper(':#' . $ParamName) === mb_strtoupper($this->Parameters[$i]['ParamName']))
            {
                $this->Parameters[$i]['ParamValue'] = quotemeta($Value);
                break; 
            }
        }
    }
       
    
    public function Open()
    {
        $command = Yii::app()->db->createCommand($this->text);
        
        
        $array = $command->queryAll(false);
        return $array;
        
    }
    
    
    public function createText()
    {
        $this->text = $this->select . $this->from . $this->where . $this->groupby . $this->order;
        $this->ParametersRefresh();
    }
    
    public function setSelect($sql)
    {
        $this->select = $sql;
        $this->createText();
    }
    
    public function setFrom($sql)
    {
        $this->from = $sql;
        $this->createText();
    }
    
    public function setWhere($sql)
    {
        $this->where = $sql;
        $this->createText();
    }
    
     public function setGroupBy($sql)
    {
        $this->groupby = $sql;
        $this->createText();
    }
    
    public function AddOrder($sql)
    {
        if ($this->order === '')
            $this->setOrder("\nOrder by " . $sql);
        else
        {
            $this->order = $this->order . ", " . $sql;
        }
    }
    
    public function AddWhere($sql, $operator='and')
    {
        if ($this->where === '')
            $this->setWhere("\nWhere " . $sql);
        else
        {           
            switch (mb_strtolower($operator,'utf-8')) {
                case 'and':
                case 'or':
                    $this->where = $this->where . " {$operator} " . $sql;
                    $this->createText();
                    break;
                
                default:
                     throw new CException("ONLY 'AND' OR 'OR'!");
                    break;
            }
           
        }
    }
    
    public function setOrder($sql)
    {
        $this->order = $sql;
        $this->createText();
    }
    
    public function QueryAll()
    {
        $SQLText = $this->text;
        foreach ($this->Parameters as $key => $value) {
            $SQLText = str_ireplace($value['ParamName'], $value['ParamValue'], $SQLText);
        }
        return Yii::app()->db->createCommand($SQLText)->queryAll();
        
    }
    
    public function QueryRow()
    {
        $SQLText = $this->text;
        foreach ($this->Parameters as $key => $value) {
            $SQLText = str_ireplace(':#' . $value['ParamName'], $value['ParamValue'], $SQLText);
        }
        $c = Yii::app()->db->createCommand($SQLText);
        return $c->queryRow();
    }
    
    public function setFilter($filter=array()) {
        if(!is_array($filter)) {
            return false;
        }

        foreach($filter as $key  => $value) {
            $this->AddWhere($key.' = '.$value);
        }
    }
    

}

