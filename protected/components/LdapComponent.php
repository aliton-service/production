<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Yii::import('application.vendor.adLDAP.adLDAP');

class LdapComponent extends adLDAP {

    public $baseDn;
    public $accountSuffix;
    public $domainControllers;
    public $adminUsername;
    public $adminPassword;

    public function __construct() {

    }

    public function init() {
        parent::__construct();
    }
}
