<?php

class almemo extends CWidget {
    public $id;
    public $Width;
    public $Height;
    public $Value = '';
    public $ReadOnly = false;
    public $Name = '';
    public $Type = 'String';
    public $Mode = 'Standart';
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('almemo.css');
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
            $assetsPath = Yii::getPathOfAlias('almemo.assets');
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
        if (Yii::getPathOfAlias('almemo') === false)
            Yii::setPathOfAlias('almemo', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        
        $options = array(
            'id' => $this->id,
            'Width' => $this->Width,
            'Height' => $this->Height,
            'Value' => $this->Value,
            'ReadOnly' => $this->ReadOnly,
            'Name' => $this->Name, 
            'Type' => $this->Type,
            'Mode' => $this->Mode,
        );
        
        echo '<table class="almemo" id="'.$this->id.'" style="width:'.$this->Width.'px; height:'.$this->Height.'px;"></table>';
                
        $options = CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$this->id,"jQuery('#$this->id').almemo($options);");
        
        parent::run();
        
    }
}







