<?php

class albutton extends CWidget {
    public $id;
    public $Width;
    public $Height;
    public $Text;
    public $ShowGlyph = false;
    public $Href = '';
    public $FormName = '';
    public $Type = 'NewWindow';
    public $Params = array();
    public $OnAfterClick = '';
    public $OnAfterAjaxSuccess = '';
    public $Visible = true;
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('albutton.css');
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
            $assetsPath = Yii::getPathOfAlias('albutton.assets');
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
        if (Yii::getPathOfAlias('albutton') === false)
            Yii::setPathOfAlias('albutton', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        
        $id = $this->id;
        
        $options = array(
            'id' => $this->id,
            'Width' => $this->Width,
            'Height' => $this->Height,
            'Text' => $this->Text,
            'ShowGlyph' => $this->ShowGlyph,
            'Href' => $this->Href,
            'FormName' => $this->FormName,
            'Type' => $this->Type,
            'Params' => $this->Params,
            'OnAfterClick' => $this->OnAfterClick,
            'OnAfterAjaxSuccess' => $this->OnAfterAjaxSuccess,
            'Visible' => $this->Visible,
        );
        
        $img = '';
        if ($this->ShowGlyph)
        {
            $img = '<div class="albuttonimg" style="margin-right:4px;" id="ContentHolder_btnImageAndTextImg"><div>';
        }
            
        if (!$this->Visible) 
            echo '<div class="albutton" id="'.$this->id.'" style="width:'.$this->Width.'px;-khtml-user-select:none; display: none;">';
        else
            echo '<div class="albutton" id="'.$this->id.'" style="width:'.$this->Width.'px;-khtml-user-select:none;">';
        
        echo '    <div class="alb" id="alb_'.$this->id.'">' .
        '        <div class="alb_h">' .
        '            <input class="alb_i" value="'.$this->Text.'" type="submit" name="'.$this->FormName.'">' .
        '        </div>' . $img .
        
        '        <span class="albutton-span">'.$this->Text.'</span>' .
        '    </div>' .
        '</div>';
        
        $options=CJavaScript::encode($options);
        $this->registerCoreJs();

        $cs=Yii::app()->getClientScript();
        
        //$cs->registerScript(__CLASS__.'#'.$id,"jQuery('#$id').albutton($options);");
        $cs->registerScript(__CLASS__.'#'.$id,"$('#$id').albutton($options);");

        parent::run();
    }
}

