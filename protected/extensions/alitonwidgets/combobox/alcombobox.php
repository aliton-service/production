<?php

class alcombobox extends CWidget {
    public $id;
    public $data;
    public $columns;
    public $fieldname;
    public $width = 300;
    public $popupwidth = -1;
    public $popupheight = 250;
    public $popupid;
    public $label = '';
    public $showcolumns = false;
    public $keyfield;
    public $locate;
    public $filter;
    public $name;
    public $keyvalue;
    public $cascade;
    public $filterajax = array();
    public $script = '';
    public $onafterchange;
    
    protected $_assetsUrl;
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('alcombobox.css');
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
            $assetsPath = Yii::getPathOfAlias('alcombobox.assets');
            $assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
            return $this->_assetsUrl = $assetsUrl;
        }
    }
    
    public function registerCoreJs() {
//        $this->registerJS('jquery-1.11.3.min.js');
//        $this->registerJS('jquery-ui.js');
        $this->registerJS('alcombobox.js');
    }
    
    public function registerJS($jsFile, $position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($this->getAssetsUrl() . "/js/{$jsFile}", $position);
    }
    
    public function init() {
        // Регистрируем alias
        if (Yii::getPathOfAlias('alcombobox') === false)
            Yii::setPathOfAlias('alcombobox', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        
        if ($this->id == "")
            $this->id = "cmb1";
        
        if ($this->popupid == "")
            $this->popupid = "cmbgrid1";
        
        if ($this->popupwidth == -1)
            $this->popupwidth = $this->width + 17;
        
        parent::init();
    }
    
    public function run() {
        
        $array = array(
            'id' => $this->id,
            'label' => $this->label,
            'popupid' => $this->popupid,
            'fieldname' => $this->fieldname,
            'keyfield' => $this->keyfield,
            'locate' => $this->locate,
            'filter' => $this->filter,
            'keyvalue' => $this->keyvalue,
            'cascade' => $this->cascade,
            'filterajax' => $this->filterajax,
            'onafterchange' => $this->onafterchange,
        );
        
        
        
        $object = json_encode($array);
        
        if ($this->width == -1)
        {
            $width = '100%';
        }
        else
            $width = $this->width . 'px';
        
        
        if ($this->label != '')
            echo '<div style="float: left; margin-right: 4px; padding-top: 2px;">' . $this->label . ': ' . '</div>';
        else
            echo '<div style="float: left;"></div>';
        
        echo '<div style="float:left">';
        
        echo '<table class="alcombobox" id="' . $this->id . '" style="width:'.$width.';" grid="' . $this->popupid . '" fieldname="' . $this->fieldname . '" keyfield="'.$this->keyfield.'">';
	echo '  <tbody>';
        echo '      <tr>';
	echo '          <td style="display:none;"><input class="form-control" id="" name="'.$this->name.'" type="hidden" value="">';
        
        foreach ($this->filterajax as $key => $value) {
            echo '<input class="filterajax" control="'.$value["grid"].'" condition="'.$value["condition"].'" type="hidden" typefilter="'.$value["typefilter"].'" value="">';
        }
        
        echo '<div class="json" style="width:0%; display:none">' . $object . '</div>';
        echo '</td>';
        echo '          <td class="dxic" style="width:100%;"><input id="alcomboboxedit_'.$this->id.'" class="alcomboboxedit" id="" type="text" autocomplete="off" spellcheck="false" style="padding-left: 4px"></td>';
        echo '          <td id="alcomboboxeditbuttom_'.$this->id.'" class="alcomboboxeditbuttom" style="-khtml-user-select:none;">';
        echo '          <div id="alcomboboxeditimg_'.$this->id.'" class="alcomboboxeditimg" src="/images/grid/sprites1.png" alt="v"></div></td>';
        echo '      </tr>';
        echo '</tbody></table>';
        
        echo '<div id="popupcontrol_'.$this->id.'" class="popupcontrol" popup="'.$this->id.'" style="display: none;">';
            $this->widget('application.extensions.alitonwidgets.grid.algrid', array(
                'id' => $this->popupid,
                'width' => $this->popupwidth,
                'height' => $this->popupheight,
                'visible' => true,
                'stretch' => false,
                'showpager' => false,
                'data' => $this->data,
                'columns' => $this->columns,
                'showfilters' => false,
                'showcolumns' => $this->showcolumns
                
            ));
        echo '</div></div>';
        //echo '</table>';
        $this->registerCoreJs();
        parent::run();
    }
}

