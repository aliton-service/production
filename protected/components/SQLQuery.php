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
    
    public function AddParam($ParamName, $Value)
    {
         $Idx = count($this->$Parameters);
         
         $this->$Parameters[$Idx + 1] = array('ParamName' => $ParamName, 'ParamValue' => $Value);
    }
    
    protected function ParamParser($Text)
    {
        $Idx = 0;
        
        while (!strpos($Text, $Idx) === FALSE)
        {
            $ParamName = '';
            $Idx = strpos($Text, ':', $Idx);
            $IdxEnd = strpos($Text, ' ', $Idx);
            if ($IdxEnd === FALSE)
                $IdxEnd = strpos($Text, ',', $Idx);
            if ($IdxEnd === FALSE)
                $IdxEnd = strlen ($Text);
            
            $ParamName = substr($Text, $Idx, $IdxEnd);
            
            if ($ParamName <> '')
                $this->AddParam ($ParamName, NULL);
        }
    }
    
    public function ParametersRefresh()
    {
        $this->$Parameters = array();
               
        $this->ParamParser($this->Select);
        $this->ParamParser($this->From);
        $this->ParamParser($this->Where);
        $this->ParamParser($this->Order);
        $this->ParamParser($this->groupby);
    }
    
    public function bindParam($ParamName, $Value)
    {
        for ($i = 0; $i < $this->Parameters; ++$i)
        {
            if (mb_strtoupper($ParamName) === mb_strtoupper($this->Parameters[$i]['ParamName']))
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
        return Yii::app()->db->createCommand($this->text)->queryAll();
        
    }
    
    public function QueryRow()
    {
        $c = Yii::app()->db->createCommand($this->text);
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

