<?php

class alcomboboxajax extends CWidget {
    public $id;
    public $Width = 200;
    public $Height = 200;
    public $Stretch = false;
    public $Columns = array();
    public $ModelName = '';
    public $AjaxData = '';
    public $ShowFilters = false;
    public $OnDblClick = '';
    public $OnAfterClick = '';
    public $PopupWidth = 300;
    public $PopupHeight = 300;
    public $Key = '';
    public $Name = '';
    public $KeyField = '';
    public $FieldName = '';
    public $KeyValue = null;
    public $KeyFieldPrefix = '';
    public $FilterCondition = '';
    public $OnAfterChange = '';
    public $ShowPager = false;
    public $Type = 'Filter';
    public $FilterControls = array();
    public $Filters = array();
    public $LightingLine = true;
    public $params = array();
    public $ReadOnly = false;
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        $this->registerAssetCss('alcomboboxajax.css');
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
            $assetsPath = Yii::getPathOfAlias('alcomboboxajax.assets');
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
        if (Yii::getPathOfAlias('alcomboboxajax') === false)
            Yii::setPathOfAlias('alcomboboxajax', realpath(dirname(__FILE__) . '/'));
        
        if ($this->AjaxData == '')
            $this->AjaxData = Yii::app()->createUrl('AjaxData/LoadData');
        
        $this->registerCoreCss();
        
        parent::init();
    }
    
    public function run() {
        $id = $this->id;
        
        echo '<table id='.$id.' class="alcomboboxajax" style="width: ' . $this->Width . 'px; height: 24px;"></table>';
        
        
        
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => $id . '_PopupGrid',
            'Stretch' => false,
            'Key' => $id . '_PopupGrid',
            'ModelName' => $this->ModelName,
            'ShowFilters' => $this->ShowFilters,
            'Height' => $this->PopupHeight,
            'Width' => $this->PopupWidth,
            'Columns' => $this->Columns,
            'Visible' => false,
            'ShowPager' => $this->ShowPager,
            'FirstLoad' => false,
            'Filters' => $this->Filters,
            'LightingLine' => $this->LightingLine,
        ));
        
        $options =  array(
			'id' => $this->id,
                        'Width' => $this->Width,
                        'Height' => $this->Height,
                        'Stretch' => $this->Stretch,
                        'Columns' => $this->Columns,
                        'ModelName' => $this->ModelName,
                        'AjaxUrl' => $this->AjaxData,
                        'Key' => $this->Key,
                        'ShowFilters' => $this->ShowFilters,
                        'OnDblClick' => $this->OnDblClick,
                        'OnAfterClick' => $this->OnAfterClick,
                        'Name' => $this->Name,
                        'PopupControl' => $id . '_PopupGrid',
                        'KeyField' => $this->KeyField,
                        'FieldName' => $this->FieldName,
                        'FilterCondition' => $this->FilterCondition,
                        'OnAfterChange' => $this->OnAfterChange,
                        'Type' => $this->Type,
                        'FilterControls' => $this->FilterControls,
                        'KeyValue' => $this->KeyValue,
                        'KeyFieldPrefix' => $this->KeyFieldPrefix,
                        'Filters' => $this->Filters,
                        'ReadOnly' => $this->ReadOnly,
                    );
        
        $options=CJavaScript::encode($options);
        $this->registerCoreJs();
        
        $cs=Yii::app()->getClientScript();
        $cs->registerScript(__CLASS__.'#'.$id,"jQuery('#$id').alcomboboxajax($options);");
        
        parent::run();
    }
}








