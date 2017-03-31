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
    
    public function actionGetListFiles() {
        $Result = array();
        
        if (Yii::app()->user->Employee_id == 274)
            $Number = '113';
        
        $Patch = "\\\\CHZ\\records2\\" . $Number;

        if ($Handle = opendir($Patch)) {
            /* Именно этот способ чтения элементов каталога является правильным. */
            while (false !== ($File = readdir($Handle))) { 
                if (is_file($Patch . "\\" . $File)) {
                    $LastChange = filemtime($Patch . "\\" . $File);
                    array_push($Result, array(
                        'SoundName' => $File,
                        'SoundPatch' => $Patch,
                        'FullFileName' => $Patch . "\\" . $File,
                        'LastChange' => date ("d.m.Y H:i", $LastChange) ,
                        ));
                }
            }

            closedir($Handle); 
        }
        
        $Data = array();
        
        $Data[] = array(
            'TotalRows' => count($Result),
            'Rows' => $Result
        );
        echo json_encode($Data);
        
        
    }
    
}

