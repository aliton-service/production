<?php

class ObjectsAndEquipsController extends Controller
{
    
    public $ObjectGr_id;
    
    public function actionAjaxView($Common_id = 0)
    {
        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];
            $Objects = new Objects();
            $Objects = $Objects->Find(array(
                'o.ObjectGr_id' => $ObjectGr_id,
                'o.Doorway' => '\'Общее\'',
            ));
            
            if (count($Objects) > 0)
                $Object_id = $Objects[0]['Object_id'];
            else
                $Object_id = 0;
            
            $this->renderPartial('view', array(
                'ObjectGr_id' => $_GET['ObjectGr_id'],
                'CommonObject_id' => $Object_id,
            ), FALSE, TRUE);
        }
    }
    
    public function actionView()
    {
        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];
            $Objects = new Objects();
            $Objects = $Objects->Find(array(
                'o.ObjectGr_id' => $ObjectGr_id,
                'o.Doorway' => '\'Общее\'',
            ));
            
            if (count($Objects) > 0)
                $Object_id = $Objects[0]['Object_id'];
            else
                $Object_id = 0;
            
            $this->render('view', array(
                'ObjectGr_id' => $_GET['ObjectGr_id'],
                'CommonObject_id' => $Object_id,
            ));
        }
    }
    
    public function actionObjectEquips() {
        $this->renderPartial('_grid', array(), false, true);
    }
    
    public function actionCommonEquips($ObjectGr_id = null) {
        if (isset($ObjectGr_id)) {
            
            $Objects = new Objects();
            $Data = $Objects->Find(array(
                'o.ObjectGr_id' => $ObjectGr_id,
                'o.Doorway' => '\'Общее\'',
            ));
            
            $Object_id = -1;
            
            if (count($Data) > 0 ) {
                $Object_id = $Data[0]['Object_id'];
            }
            
            $this->renderPartial('_grid_common', array(
                'Object_id' => $Object_id,
                'ObjectGr_id' => $ObjectGr_id,
            ), false, true);
        }
    }
            
}

