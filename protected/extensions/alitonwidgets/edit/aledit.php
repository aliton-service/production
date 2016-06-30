<?php

class aledit extends CWidget {
    public $id;
    public $Width;
    public $Value = '';
    public $ReadOnly = false;
    public $Name = '';
    public $Type = 'String';
    public $Mode = 'Standart';
    public $Visible = true;
    public $OnKeyUpEnter = '';
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('aledit.css');
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
            $assetsPath = Yii::getPathOfAlias('aledit.assets');
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
        if (Yii::getPathOfAlias('aledit') === false)
            Yii::setPathOfAlias('aledit', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        
        $options = array(
            'id' => $this->id,
            'Width' => $this->Width,
            'Value' => $this->Value,
            'ReadOnly' => $this->ReadOnly,
            'Name' => $this->Name, 
            'Type' => $this->Type,
            'Mode' => $this->Mode,
            'Visible' => $this->Visible,
            'OnKeyUpEnter' => $this->OnKeyUpEnter,
        );
        
        if ($this->Visible)
            echo '<table class="aledit" id="'.$this->id.'" style="width:'.$this->Width.'px;"></table>';
        else
            echo '<table class="aledit" id="'.$this->id.'" style="width:'.$this->Width.'px; display: none"></table>';
                
        $options = CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$this->id,"jQuery('#$this->id').aledit($options);");
        
        parent::run();
        
    }
}





