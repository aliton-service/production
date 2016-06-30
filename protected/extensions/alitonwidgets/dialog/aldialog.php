<?php

class aldialog extends CWidget {
    public $id;
    public $ContentUrl = "";
    public $Width = 400;
    public $Height = 400;
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('aldialog.css');
    }
    
    public function registerAssetCss($cssFile, $media = '') {
        // Регистрация css файлов
        Yii::app()->getClientScript()->registerCssFile($this->getAssetsUrl() . "/css/{$cssFile}", $media);
    }
    
    public function getAssetsUrl() {
        // Возвращает путь к alias
        if (isset($this->_assetsUrl))
            return $this->_assetsUrl;
        else {
            $assetsPath = Yii::getPathOfAlias('aldialog.assets');
            $assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
            return $this->_assetsUrl = $assetsUrl;
        }
    }
    
    public function registerJS($jsFile, $position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($this->getAssetsUrl() . "/js/{$jsFile}", $position);
    }
    
    public function registerCoreJs() {
        Yii::app()->clientScript->registerPackage('jquery_js');
    }
    
    
    public function init() {
        // Регистрируем alias
        if (Yii::getPathOfAlias('aldialog') === false)
            Yii::setPathOfAlias('aldialog', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        echo '<div id='.$this->id.' style=""></div>';
        
        $id = $this->id;
        $options =  array(
            'id' => $this->id,
            'Width' => $this->Width,
            'Height' => $this->Height,
            'ContentUrl' => $this->ContentUrl,
        );
        
        $options=CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$id,"jQuery('#$id').aldialog($options);");
        
        parent::run();
    }
}




