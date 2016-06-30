<?php

class LockManager 
{
    protected $DefaultLockTime = 10;
    
    protected $LockTime = array(
        'Employees' => 5,
        'Users' => 5
    );
    
    public function __construct() {
        $this->DefaultLockTime = 10;
    }
    
    public function init()
    {
        
    }
    
    public function getLockTime($TableName)
    {
        if (isset($this->LockTime[$TableName]))
        {        
            if ($this->LockTime[$TableName] == 0)
                return $this->DefaultLockTime;
            else
                return $this->LockTime[$TableName];
        }
        else
            return $this->DefaultLockTime;
    }
    
    protected function Lock($TableName, $Id, $Value)
    {

        $connection = Yii::app()->db;
        $sql = 'Update '.$TableName.' set';
        $sql = $sql.' Lock = 1,';
        $sql = $sql.' EmplLock = '.Yii::app()->user->Employee_id.',';
        $sql = $sql." DateLock = '".date('d.m.y H:i:s') ."'";
        $sql = $sql.' Where '.$Id.' = '.$Value;
            
        $command = $connection->createCommand($sql);
        $result = $command->execute();
        return $result;
    }
    
    public function UnLockRecord($TableName, $Id, $Value)
    {
        $connection = Yii::app()->db;
        $sql = 'Update '.$TableName.' set';
        $sql = $sql.' Lock = 0,';
        $sql = $sql.' EmplLock = Null,';
        $sql = $sql.' DateLock = Null';
        $sql = $sql.' Where '.$Id.' = '.$Value;
            
        $command = $connection->createCommand($sql);
        $result = $command->execute();
        return $result;
    }
    
    protected function LockInfo($TableName, $Id, $Value)
    {
        $connection = Yii::app()->db;
        $sql = 'Select Lock, EmplLock, DateLock From '.$TableName.' Where '.$Id.' = '.$Value; 
        $command = $connection->createCommand($sql);
        $result = $command->queryRow();
        return $result;
    }
        
    public function LockRecord($TableName, $Id, $Value)
    {
            
        $Info = $this->LockInfo($TableName, $Id, $Value);
        
        //$model = Employees::model()->findByPk($Value);       
        
        /* Переводим дату в Unix формат */
        $DateLock = DateTimeManager::StrDateToUnix($Info['DateLock']);
                
        if ($Info['Lock'] == 1)
        {
            /* если запись залочена, проверяем если залочил,
               пользователь который редактирует, разрешаем редактирование
            */
            
            if ($Info['EmplLock'] == Yii::app()->user->Employee_id)
                return true;
            else {
                /* если прошло больше минут, чем отведено на редактировние,
                   перелочиваем другим пользователем
                */
                
                if (DateTimeManager::DateTimeDiffMinute($DateLock, time()) > $this->getLockTime($TableName))
                    return $this->Lock($TableName, $Id, $Value);
                else
                    return false;
            }
        }
        else
            return $this->Lock($TableName, $Id, $Value);
    }
}
