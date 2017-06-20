<?php

class TestController extends MainController {
    
    public $layout='//layouts/dx_column';
    
    public function actionIndex() {
        $this->render('index');
    }
    
    public function actionTest2() {
        $this->layout = '//layouts/jqx-column';
        $this->render('test2');
    }
}



