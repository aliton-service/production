<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
        // Будем хранить id.
        protected $_id;
        protected $_fullname;
        const ERROR_USER_NOTROLE = 3;
        
        
        public function authenticate()
	{
		/*
                $ldap = Yii::app()->ldap;
                $result = $ldap->authenticate($this->username, $this->password);
                
                $ldapUserInfo = $ldap->user()->infoCollection($this->username, array("mail", "displayname"));
                    */
                $result = true;
                                
                if (!$result)
                {
                    $this->errorCode = self::ERROR_USERNAME_INVALID;
                    return 10;//$this->errorCode;
                    
                }
                else {
                    $Employees = new Employees();
                    $Result = $Employees->Find(array(), array(
                        '((e.Alias = \'' . $this->username . '\') or (e.RemoteAlias = \'' . $this->username . '\'))',
                        
                    ));
                    
                    if (Count($Result) == 0) 
                    {
                        $this->errorCode = self::ERROR_PASSWORD_INVALID;
                        return $this->errorCode;
                    }
                    else {
                        if ($Result[0]["Role_id"] === NULL)
                        {
                            $this->errorCode = self::ERROR_USER_NOTROLE;
                            return $this->errorCode;
                        }
                        else
                        {
                            $this->_id = $Result[0]["Employee_id"];
                            $this->setState('fullname', $Result[0]["ShortName"]);
                            $this->setState('Employee_id', $Result[0]["Employee_id"]);
                            $this->setState('Position_id', $Result[0]["Position_id"]);
                            $this->errorCode = self::ERROR_NONE;
                            return $this->errorCode;
                        }
                    }
                    
                }
                
            //return !$this->errorCode;
	}
}