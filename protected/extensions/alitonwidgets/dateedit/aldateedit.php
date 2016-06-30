<?php

class aldateedit extends CWidget {
    public $id;
    public $Width = 200;
    public $Value = null;
    public $Name = "";
    public $ReadOnly = false;
    public $Format = '';
    public $OnAfterChange = '';
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('aldateedit.css');
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
            $assetsPath = Yii::getPathOfAlias('aldateedit.assets');
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
        if (Yii::getPathOfAlias('aldateedit') === false)
            Yii::setPathOfAlias('aldateedit', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        
        $options = array(
            'id' => $this->id,
            'Width' => $this->Width,
            'Value' => $this->Value,
            'Name' => $this->Name,
            'Format' => $this->Format,
            'ReadOnly' => $this->ReadOnly,
            'OnAfterChange' => $this->OnAfterChange,
        );
        
        $this->widget('application.extensions.alitonwidgets.calendar.alcalendar', array(
            'id' => $this->id . '_PopupCalendar',
            'Value' => $this->Value,
            'Name' => $this->Name,
            'Visible' => false,
            'Border' => "1px solid #c0c0c0",
        ));
        
        echo '<table class="aldateedit" id="'.$this->id.'" style="width:' . $this->Width . 'px"></table>';
        
        $options = CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$this->id,"jQuery('#$this->id').aldateedit($options);");
        
        parent::run();
    }
}







