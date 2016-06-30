<?php

class PersonalizationController extends Controller 
{
    function actionLoad(){
        if (isset($_POST["Key"]))
        {
            $filename = getcwd()."/personalization/" .Yii::app()->user->Employee_id . ".conf";
            if (file_exists($filename))
            {
                $file = fopen($filename, "r");
                $str = fread($file, filesize($filename));
                $array = unserialize($str);
                fclose($file);
                
                if (isset($array[$_POST["Key"]]))
                {    
                    $Result = $array[$_POST["Key"]];
                    $Result["Id"] = $_POST["Id"];
                    print_r (json_encode($Result));
                }
                
            }
        }
    }
    
    function actionJqxLoad(){
        if (isset($_POST["Key"]))
        {
            $Filename = getcwd()."/personalization/" .Yii::app()->user->Employee_id . "_Jqx.conf";
            if (file_exists($Filename))
            {
                $File = fopen($Filename, "r");
                $Str = fread($File, filesize($Filename));
                $Array = unserialize($Str);
                fclose($File);
                
                if (isset($Array[$_POST["Key"]]))
                {    
                    $Result = $Array[$_POST["Key"]];
                    echo json_encode($Result);
                }
            }
        }
    }
    
    function actionJqxSave(){
        if (isset($_POST) && isset($_POST['Key']) && isset($_POST['Columns']))
        {
            $Object = array(
                $_POST['Key'] => array(
                    'Columns' => array($_POST['Columns']),
                )
            );
            
            $Filename = getcwd()."/personalization/" .Yii::app()->user->Employee_id . "_Jqx.conf";
            
            if (file_exists($Filename))
            {
                $File = fopen($Filename, "r");
                $Str = fread($File, filesize($Filename));
                $Array = unserialize($Str);
                fclose($File);
            }
            else
                $Array = array();
            
            $Array = array_merge($Array, $Object);
            
            $File = fopen($Filename, "w");
            fwrite($File, serialize($Array));
            fclose($File);
        }
    }
    
    function actionSave(){
        if (isset($_POST))
        {
            $object = $_POST;
            $object = array($object["Key"] => $object);
            
            
            $filename = getcwd()."/personalization/" .Yii::app()->user->Employee_id . ".conf";
            if (file_exists($filename))
            {
                $file = fopen($filename, "r");
                $str = fread($file, filesize($filename));
                $array = unserialize($str);
                fclose($file);
            }
            else
                $array = array();
            
            $array = array_merge($array, $object);
            
            $file=fopen(getcwd()."/personalization/" .Yii::app()->user->Employee_id. ".conf","w");
            fwrite($file, serialize($array));
            fclose($file);
            //print_r(json_encode($Object));
            //print_r($array);
            
        }
    }
}

