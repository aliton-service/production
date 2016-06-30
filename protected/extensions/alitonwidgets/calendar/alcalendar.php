<?php

class alcalendar extends CWidget {
    public $id;
    public $Width;
    public $Value = null;
    public $Name = "";
    public $Visible = true;
    public $Border = "";
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('alcalendar.css');
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
            $assetsPath = Yii::getPathOfAlias('alcalendar.assets');
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
        if (Yii::getPathOfAlias('alcalendar') === false)
            Yii::setPathOfAlias('alcalendar', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        
        $options = array(
            'id' => $this->id,
            'Width' => $this->Width,
            'Value' => $this->Value,
            'Name' => $this->Name,
            'Visible' => $this->Visible,
            'Border' => $this->Border,
        );
        
        echo '<div id="alcalendarcontent_'.$this->id.'" style="border:'.$this->Border.'"><table class="alcalendar" id="'.$this->id.'"></table></div>';
        
        $options = CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$this->id,"jQuery('#$this->id').alcalendar($options);");
        
        parent::run();
    }
}





