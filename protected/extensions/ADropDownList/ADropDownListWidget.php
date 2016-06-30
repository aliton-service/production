<?php

class ADropDownListWidget extends CWidget
{
    
    public $id = 'list'; /* Название идентификатора виджета */
    public $query; /* Запрос */
    public $keyfield = ''; /* Название столбца идентификатора */
    public $items = array(); /* Список столбцов для вывода */
    public $countrow = 0; /* Кол-во записей в выпадающем списке */
    public $mas = array();
    public $filter = ''; /* Текст для фильтрации */
    
    public $width_input = '300px';
    public $width_dropdownlist = '500px';
    public $height_dropdownlist = '100px';
    
    
    public $js = '/js/adropdownlist/adropdownlist.js'; /* Скрипт виджета */
    public $css = '/css/adropdownlist/adropdownlist.css'; /* Стили для виджета */
    
    public function registerScript()
    {
        echo '<script src="'.$this->js.'"></script>';
        echo '<link rel="stylesheet" type="text/css" href="'.$this->css.'">';
    }
    
    public function initVar()
    {
        // Инициализация переменных в javascript
        $str = '<script>';
        $str = $str. 'var $id="'.$this->id.'";';
        $str = $str. ' var $url="'. Yii::app()->request->url.'";';
        $str = $str. '</script>';
        echo $str;
        
    }
    
    public function renderItems()
    {
                
        echo '<div id="drop" style="width:'.$this->width_dropdownlist.'; height:'.$this->height_dropdownlist.'">';
        
        echo '<table>';
        
        if ($this->countrow != 0)
        {
            if ($this->countrow > count($this->mas))
                $count = count($this->mas);
            else $count = $this->countrow;
        } else $count = count($this->mas);
        
        for ($i = 0; $i < $count; ++$i)
        {
            echo '<tr id="'.$this->mas[$i]['Object_id'].'" name="'.$this->mas[$i]['Addr'].'">';
            
            echo '<td>'.$this->mas[$i]['Addr'].'</td>';
            
            echo '</tr>';
        }
        
        echo '</table>';
        echo '</div>';
    }
    
    public function getData()
    {
        /* Функция чтения данных, возвращает массив */
        
        if ($this->filter != '')
        {
            
            //$this->query->setWhere(" and a.Addr like '".$this->filter."%')";
            $this->query->setWhere($this->query->where . "  and a.Addr like '". $this->filter ."%'");
        }
        return $this->query->queryAll();
    }
    
    public function run()
    {
        $this->initVar();
        $this->registerScript();
        $this->mas = $this->getData();
                
                
        echo '<div class="adropdownlist" id="'.$this->id.'" style="width:'.$this->width_dropdownlist.'">'; // Наичнаем отрисовку виджета
        echo '<div id="input" style="width:'.$this->width_input.'">';
        echo '<input type="text">'; // Поля поиска
        echo '</div>';
        
        $this->renderItems(); // Выводим выпадающий список
        
        echo '</div>'; // Заканчиваем отрисовку виджета
    }
}
