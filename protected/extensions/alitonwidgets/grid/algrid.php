<?php

class algrid extends CWidget {
    
    public $id = '';
    public $columns = array();
    public $bands = array();
    public $object = array();    
    public $data = array();
    public $buttons = array();
    public $lookup = array();
    public $cascade = array();
    public $ajax = array();
    
    protected $_assetsUrl;
    
    // Опции
    public $width = 300;
    public $height = 300;
    public $pagesize = 50;
    public $showbands = false;
    public $showcolumns = true;
    public $showgroupanel = false;
    public $showfilters = true;
    public $keyfield = '';
    public $stretch = false;
    public $visible = true;
    public $showpager = true;
    public $locatecontrol = '';
    public $heightcolumns = 28;
    public $dblclick = '';
    public $onafterclick = '';
            
    public $focusedindex = 0;
    public $currentpage = 1;
    
    
    
    public $url = '';
    
    public function registerCoreCss() {
        // Регистрация css alias
        $this->registerAssetCss('algrid.css');
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
            $assetsPath = Yii::getPathOfAlias('algrid.assets');
            $assetsUrl = Yii::app()->assetManager->publish($assetsPath, false, -1, true);
            return $this->_assetsUrl = $assetsUrl;
        }
    }
    
    public function registerCoreJs() {
        //$this->registerJS('jquery-1.11.3.min.js');
        //$this->registerJS('jquery-ui.js');
        Yii::app()->clientScript->registerPackage('jquery_js');
        $this->registerJS('algrid.js');
        //$this->registerJS('algrid2.js');
        
    }
    
    public function registerJS($jsFile, $position = CClientScript::POS_HEAD) {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile($this->getAssetsUrl() . "/js/{$jsFile}", $position);
    }
    
    public function newJsonObject($array) {
        // Создание JSON объекта
        $object = json_encode($array);
        echo '<div class="json" style="width:0%; display:none">' . $object . '</div>';
        
        
        
    }
    
    public function init() {
        // Регистрируем alias
        if (Yii::getPathOfAlias('algrid') === false)
            Yii::setPathOfAlias('algrid', realpath(dirname(__FILE__) . '/'));

        $this->registerCoreCss();
        //$this->registerCoreJs();
        
        parent::init();
    }
    
    protected function getOptions() {
        if ($this->id == '')
            $this->id = 'algrid' . rand(0, 100);
        
        $pagesizevariants = array_unique(array(50, 100, 200, 500, $this->pagesize));
        sort($pagesizevariants);
        
        $options = array(
            'id' => $this->id,
            'width' => $this->width,
            'height' => $this->height,
            'pagesize' => $this->pagesize,
            'showbands' => $this->showbands,
            'showcolumns' => $this->showcolumns,
            'showgroupanel' => $this->showgroupanel,
            'keyfield' => $this->keyfield,
            'showfilters' => $this->showfilters,
            'pagesizevariants' => $pagesizevariants,
            'stretch' => $this->stretch,
            'showpager' => $this->showpager,
        );
        
        return $options;
    }
    
    protected function getColumnConfig($config, $column) {
        $section;
        foreach ($config as $key => $value)
        {
            //echo '<br><br> Col:' . Yii::app()->request->hostInfo . Yii::app()->request->requestUri . '\\' . $this->id . '\\columns\\' . $column['id'] . ' key=' . $key;
            if ($this->url != '')
                $keyurl = $this->url;
            else
                $keyurl = Yii::app()->request->hostInfo . Yii::app()->request->requestUri;
                
            $k = $keyurl . '\\' . $this->id . '\\columns\\' . $column['id'];
            
            if ($key == $k)
            {
                foreach ($value as $key2 => $value2) {
                    if (isset($column[$key2]))
                    {   
                        $column[$key2] = (int)$value2;
                        //echo '<br>';
                        //print_r($column);
                        //echo '<br>' . $key2 . ' - ' . $value2;
                    }
                }
            }
        }
        return $column;
    }
    
    protected function sort($columns) {
        
        for ($i = 0; $i <= count($columns) - 1; $i++)
        {
            $min = $i;
            
            for ($j = $i; $j <= count($columns) - 1; $j++)
            {
                if ((int)$columns[$j]['index'] < (int)$columns[$i]['index'])
                {
                    $min = $j;
                    
                }
                //echo '<br>'. 'count=' . count($columns) . ' i=' . $i . ' min=' . $min . ' j=' . $j . ' index(i)=' . $columns[$i]['index'] . ' index(j)=' . $columns[$j]['index'];
            }
            
            $t = $columns[$i];
            $columns[$i] = $columns[$min];
            $columns[$min] = $t;
        }
        
        return $columns;
    }
    
    protected function getColumns() {
        $columns = array();
        $i = 0;
        if (!Yii::app()->user->isGuest)
        {
            $filename = getcwd().'/personalization/' . Yii::app()->user->Employee_id .  '.ini';
            if (file_exists($filename))
                $config = parse_ini_file($filename, true);
        }
        
        //print_r($config);

        foreach ($this->columns as $key => $value) {
            $columns[$i]['index'] = $i;
            $columns[$i]['id'] = $key;
            foreach($value as $optKey => $optVal) {
                $columns[$i][$optKey] = $optVal;
            }
            if (!isset($columns[$i]['width'])) $columns[$i]['width'] = 100; else $columns[$i]['width'] = $value['width'];
            if (!isset($columns[$i]['height'])) $columns[$i]['height'] = 28; else $columns[$i]['height'] = $value['height'];
            
//            if (!isset($value['name'])) $name = 'columns' . $i; else $name = $value['name'];
//            if (!isset($value['width'])) $width = 100; else $width = $value['width'];
//            if (!isset($value['height'])) $height = 28; else $height = $value['height'];
//            if (!isset($value['fieldname'])) $fieldname = ''; else $fieldname = $value['fieldname'];
//            if (!isset($value['role'])) $role = ''; else $role = $value['role'];
//
//            $columns[$i] = array(
//                'index' => $i,
//                'name' => $name,
//                'width' => $width,
//                'height' => $height,
//                'fieldname' => $fieldname,
//                'id' => $key,
//                's' => 'none',
//                'fltr' => '',
//                'role' => $role,
//            );
            
            //echo '<br><br>';
            //echo print_r($columns[$i]) . ' - ';
            //print_r($this->getColumnConfig($config, $columns[$i]));
            
            if (isset($config))
                $columns[$i] = $this->getColumnConfig($config, $columns[$i]);
            $i++;
        }
        
        //echo '<br>';
        
        //print_r($columns);
        
        $columns = $this->sort($columns);

        return $columns;
    }
    
    public function getHeader(){
        $header = array();
        
        $header = array(
            ''
        );
    }
    
    public function newObject() {
        // Создаем перечень свойств
        $options = $this->getOptions();
        // Создаем перечень колонок
        $columns = $this->getColumns();
        
        // Создание массива для передачи в JS
        $object = array(
            'options' => $options,
            'columns' => $columns,
            'data' => $this->data,
            'currentpage' => $this->currentpage,
            'focusedindex' => $this->focusedindex,
            'name' => $options['id'],
            'buttons' => $this->buttons,
            'lookup' => $this->lookup,
            'cascade' => $this->cascade,
            'ajax' => $this->ajax,
            'dblclick' => $this->dblclick,
            'onafterclick' => $this->onafterclick,
        );
        
        return $object;
    }
    
    public function run() {
        // Формируем объект для передачи в JS
        $object = $this->newObject();
        // Отрисовываем главную таблицу
        if ($this->stretch)
            if ($this->visible)
                echo '<table class="algrid" id="'.$this->id.'"><tbody><tr><td>';
            else
                echo '<table style="display: none" class="algrid" id="'.$this->id.'"><tbody><tr><td>';
        else
            if ($this->visible)
                echo '<table class="algrid" id="'.$this->id.'"><tbody><tr><td>';
            else
                echo '<table style="display: none" class="algrid" id="'.$this->id.'"><tbody><tr><td>';
        
        // Создание JSON объекта
        $this->newJsonObject($object);
        
        // Pзакрываем трисовку главной таблицы
        echo '</td></tr></tbody></table>';
        $this->registerCoreJs();
        // new
        /*
        echo '<script>'
        . ' $(function(){'
                . 'console.log("include script for algrid.js");'
                . ' if (typeof $array != "undefined")'
                . ' {'
                . '     var '.$this->id.' = {};'
                . '     '.$this->id.' = ' . json_encode($object) . ';'
                //. '     $.extend(true, '.$this->id.', algridobject, '.$this->id.');'
                . '     '.$this->id.'.algrid = $("#'.$this->id.'");'
                . '     '.$this->id.' = $.extend(true, {}, '.$this->id.', algridobject);'
                
                . '     $array.push('.$this->id.');'
                . '     '.$this->id.'.draw();'
                . '     console.log($array);'
                . ' }'
                . ' else'
                . '     console.log("array is undefined");'
                . ''
                . '   '
                . '});'
                . '</script>'; 
         
         */
        parent::run();
    }
}

