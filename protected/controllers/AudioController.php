<?php

class AudioController extends Controller
{
    public function actionLoad() {
        if (isset($_POST['Parameters'])) {
            $out_file = $_POST['Parameters']['out_patch'] . "\\" . $_POST['Parameters']['out_filename'];
            $in_file =  getcwd() . "\\audio\\" . Yii::app()->user->Employee_id . "_sound.wav";
            copy($out_file, $in_file);
            
            echo json_encode(array(
                'FileName' => "/audio/" . Yii::app()->user->Employee_id . "_sound.wav",
            ));
        }
    }
    
    public function GetFiles($Patch) {
        $Result = array();
        $CurrentDate = getdate(time());
        $CD = mktime(0, 0, 0, $CurrentDate['mon'], $CurrentDate['mday'], $CurrentDate['year']);
        
        if ($Handle = opendir($Patch)) {
            /* Именно этот способ чтения элементов каталога является правильным. */
            while (false !== ($File = readdir($Handle))) { 
//                if (is_file($Patch . "\\" . $File)) {
//                    $LastChange = filemtime($Patch . "\\" . $File);
//                    if ($CD <= $LastChange) 
                        array_push($Result, array(
                            'SoundName' => $File,
                            'SoundPatch' => $Patch,
                            'FullFileName' => $Patch . "\\" . $File,
//                            'LastChange' => date ("d.m.Y H:i", $LastChange) ,
                            ));
//                }
            }

            closedir($Handle); 
        }
        
        return $Result;
    }
    
    public function actionGetListFiles() {
        $Result = array();
        
        if (Yii::app()->user->Employee_id == 981)
            $Number = '118';
        if (Yii::app()->user->Employee_id == 56)
            $Number = '205';
        if (Yii::app()->user->Employee_id == 506)
            $Number = '204';
        if (Yii::app()->user->Employee_id == 856)
            $Number = '148';
        if (Yii::app()->user->Employee_id == 1059)
            $Number = '113';
        
        if (Yii::app()->user->Employee_id == 274) 
        {    
            $Result = array_merge($Result, $this->GetFiles("\\\\CHZ\\records2\\118")); 
            $Result = array_merge($Result, $this->GetFiles("\\\\CHZ\\records2\\205")); 
            $Result = array_merge($Result, $this->GetFiles("\\\\CHZ\\records2\\204")); 
            $Result = array_merge($Result, $this->GetFiles("\\\\CHZ\\records2\\148")); 
            $Result = array_merge($Result, $this->GetFiles("\\\\CHZ\\records2\\113")); 
            
        } else {
            $Patch = "\\\\CHZ\\records2\\" . $Number;
            $Result = $this->GetFiles($Patch); 
        }
            
                
        $Data = array();
        
        $Data[] = array(
            'TotalRows' => count($Result),
            'Rows' => $Result
        );
        echo json_encode($Data);
        
        
    }
    
}

