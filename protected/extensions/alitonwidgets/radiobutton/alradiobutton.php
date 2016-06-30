<?php

class alradiobutton extends CWidget {
    
    public $id;
    public $Checked = false;
    public $Label = '';
    public $GroupName = '';
    public $OnAfterClick = '';
    public $Value = false;
    public $Name = '';
    public $Visible = true;
            
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('alradiobutton.css');
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
            $assetsPath = Yii::getPathOfAlias('alradiobutton.assets');
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
        if (Yii::getPathOfAlias('alradiobutton') === false)
            Yii::setPathOfAlias('alradiobutton', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        
        $id = $this->id;
        
        if ($this->Visible)
            echo '<table class="alradiobutton" id="'.$this->id.'"></table>';
        else
            echo '<table style="display: none;" class="alradiobutton" id="'.$this->id.'"></table>';
        
        $options = array(
            'id' => $this->id,
            'Checked' => $this->Checked,
            'Label' => $this->Label,
            'GroupName' => $this->GroupName,
            'Name' => $this->Name,
            'OnAfterClick' => $this->OnAfterClick,
            'Value' => $this->Value,
            'Name' => $this->Name,
            'Visible' => $this->Visible,
        );
        
        $options=CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$id,"$('#$id').alradiobutton($options);");
        
        parent::run();
    }
}


