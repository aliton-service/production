<?php

class algridajax extends CWidget {
    public $id;
    public $Width = 200;
    public $Height = 200;
    public $Stretch = false;
    public $Columns = array();
    public $ModelName = '';
    public $AjaxData = '';
    public $Key = null;
    public $ShowFilters = false;
    public $OnDblClick = '';
    public $OnAfterClick = '';
    public $Visible = true;
    public $LocateUrl = '';
    public $ShowPager = true;
    public $Filters = array();
    public $Sort = array();
    public $Combobox = false;
    public $FirstLoad = true;
    public $FilterControls = array();
    public $LightingLine = false;
    public $params = array();
    public $OnDrawRow = '';
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        $this->registerAssetCss('algridajax.css');
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
            $assetsPath = Yii::getPathOfAlias('algridajax.assets');
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
        if (Yii::getPathOfAlias('algridajax') === false)
            Yii::setPathOfAlias('algridajax', realpath(dirname(__FILE__) . '/'));
        
        if ($this->AjaxData == '')
            $this->AjaxData = Yii::app()->createUrl('AjaxData/LoadData');
        
        if ($this->LocateUrl == '')
            $this->LocateUrl = Yii::app()->createUrl('AjaxData/LoadFirst');
        
        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        $id = $this->id;
        
        
        
        if (!$this->Visible)
            echo '<table style="position: absolute; top: -9999px; left: -9999px;" id="'.$id.'" class="algridajax"><tbody><tr><td id="alContent_'.$id.'" style="padding-left: 0px"></td></tr></tbody></table>';
        else
            echo '<table id='.$id.' class="algridajax"><tbody><tr><td id="alContent_'.$id.'" style="padding-left: 0px"></td></tr></tbody></table>';
        
        $i = 0;        
        foreach ($this->Columns as $key => $value) {
            if (!isset($this->Columns[$key]['Index']))
                $this->Columns[$key]['Index'] = $i;
            $i++;
        }
        
        $options =  array(
			'id' => $this->id,
                        'Width' => $this->Width,
                        'Height' => $this->Height,
                        'Stretch' => $this->Stretch,
                        'Columns' => $this->Columns,
                        'ModelName' => $this->ModelName,
                        'AjaxUrl' => $this->AjaxData,
                        'LocateUrl' => $this->LocateUrl,
                        'Key' => $this->Key,
                        'ShowFilters' => $this->ShowFilters,
                        'OnDblClick' => $this->OnDblClick,
                        'OnAfterClick' => $this->OnAfterClick,
                        'Visible' => $this->Visible,
                        'ShowPager' => $this->ShowPager,
                        'Filters' => $this->Filters,
                        'Sort' => $this->Sort,
                        'Combobox' => $this->Combobox,
                        'FilterControls' => $this->FilterControls,
                        'FirstLoad' => $this->FirstLoad,
                        'LightingLine' => $this->LightingLine,
                        'params' => $this->params,
                        'OnDrawRow' => $this->OnDrawRow,
                    );
        
        $options=CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$id,"jQuery('#$id').algridajax($options);");
        
        parent::run();
    }
}






