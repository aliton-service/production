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
    
    public function actionLoad2() {
        if (isset($_GET['Parameters'])) {
            $out_file = $_GET['Parameters']['out_patch'] . "\\" . $_GET['Parameters']['out_filename'];
            $f = file_get_contents($out_file);
            echo $f;
        }
    }
}

