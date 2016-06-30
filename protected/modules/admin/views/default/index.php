<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	'Администрирование',
);

    $host = 'sqleltonsql';
    $username = 'root';
    $password = 'root';

    $db = mssql_connect($host,$username,$password);
    
    if (!$db) {
      
        
        
    } else {
        
        $sdb = mssql_select_db('Aliton');
        
        echo '<br>sdb:' . $sdb .'<br>';
        
        $stmt = mssql_init('INSERT_ObjectsGroupSystems', $db);
        
        /*
        $Cmd->bindParam(':ObjectsGroupSystem_id', $ObjectsGroupSystem_id);
            $Cmd->bindParam(':ObjectGr_id', $ObjectGr_id);
            $Cmd->bindParam(':Sttp_id', $Sttp_id);
            $Cmd->bindParam(':Desc', $Desc);
            $Cmd->bindParam(':Condition', $Condition);
            $Cmd->bindParam(':Availability_id', $Availability_id);
            $Cmd->bindParam(':Count', $Count);
            $Cmd->bindParam(':EmplCreate', $EmplCreate);
        */
        
            $ObjectsGroupSystem_id = NULL;
            $ObjectGr_id = 9633;
            $Sttp_id = 3;
            $Desc = 'TTTTT';
            $Condition = 'TTTT';
            $EmplCreate = 1;
            $Availability_id = 1;
            $Count  = 20;
            
        mssql_bind($stmt, '@ObjectsGroupSystem_id',  $ObjectsGroupSystem_id,  SQLINT4,  TRUE,  false,  3);
        mssql_bind($stmt, '@ObjectGr_id',      $ObjectGr_id,  SQLINT4,  false,  false,  3);
        mssql_bind($stmt, '@Sttp_id',       $Sttp_id,       SQLINT4,     false,  false,   3);
        mssql_bind($stmt, '@Desc',       $Desc,       SQLVARCHAR,     false,  false,   500);
        mssql_bind($stmt, '@Condition',       $Condition,       SQLVARCHAR,     false,  false,  500);
        mssql_bind($stmt, '@Availability_id',       $Availability_id,       SQLINT4,     false,  false,   3);
        mssql_bind($stmt, '@Count',      $Count,       SQLINT4,     false,  false,   3);
        mssql_bind($stmt, '@EmplCreate',       $EmplCreate,       SQLINT4,     false,  false,   3);

        // Execute
        
        echo 
        mssql_execute($stmt);
        
        echo $ObjectsGroupSystem_id;
        
        echo '<br>stmt:' . print_r($stmt);
        
        
        
      echo("есть контакт !!!!!!!!!!!!!!!!!!!");
    }

echo phpinfo();

?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>



<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>