<?php

class TestController extends MainController {
    
    public $layout='//layouts/dx_column';
    
    public function actionIndex() {
        $this->render('index');
    }
}



