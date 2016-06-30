<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class WebUser extends CWebUser {
    
    
    private $_model = null;
    protected $_groups = null;
    
    public function getGroups() {
        if ($this->_groups === null) {
            if ($user = $this->getModel()) {
                $this->_groups = Yii::app()->ldap->user()->groups($user->username);
            }
        }
        return $this->_groups;
    }
    
    function getRole($type) {
        if($user = $this->getModel()){
            $role = Roles::model()->findByPk($user->Role_id);
            
            if ($type == 'Yii')
                return $role->YiiRoleName;
            else
                return $role->RoleName;
        }
    }
 
    public function getModel(){
        if (!$this->isGuest && $this->_model === null){
            //$this->_model = Employees::model()->findByPk($this->id, array('select' => 'Role_id'));
            //$this->_model = Employees::model()->findByPk($this->Employee_id);
            $Employees = new Employees();
            $Employees->getModelPk($this->Employee_id); 
            $this->_model = $Employees;
        }
        return $this->_model;
    }
}
