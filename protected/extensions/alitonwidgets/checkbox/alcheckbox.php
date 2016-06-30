<?php

class alcheckbox extends CWidget {
    public $id;
    public $Width;
    public $Label = "";
    public $Checked = false;
    public $Name = "";
    public $Visible = true;
    public $OnAfterClick = "";
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('alcheckbox.css');
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
            $assetsPath = Yii::getPathOfAlias('alcheckbox.assets');
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
        if (Yii::getPathOfAlias('alcheckbox') === false)
            Yii::setPathOfAlias('alcheckbox', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        
        $options = array(
            'id' => $this->id,
            'Width' => $this->Width,
            'Checked' => $this->Checked,
            'Label' => $this->Label,
            'Name' => $this->Name,
            'Visible' => $this->Visible,
            'OnAfterClick' => $this->OnAfterClick,
        );
        
        if ($this->Visible)
            echo '<table class="alcheckbox" id="'.$this->id.'"></table>';
        else
            echo '<table class="alcheckbox" id="'.$this->id.'" style="display: none"></table>';
        
        $options = CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$this->id,"jQuery('#$this->id').alcheckbox($options);");
        
        parent::run();

    }
}



