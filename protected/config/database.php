<?php

// This is the database connection configuration.
return array(
	//'connectionString' => 'sqlite:'.dirname(__FILE__).'/../data/testdrive.db',
	// uncomment the following lines to use a MySQL database
	'class'=>'CDbConnection',
	'connectionString' => 'sqlsrv:server=esrvsql01;database=sqleltonsql',
	//'connectionString' => 'dblib:host=sqleltonsql;dbname=sqleltonsql2',
	//'emulatePrepare' => true,
	'username' => 'root',
	'password' => 'root',
	'charset' => 'utf8',
);
