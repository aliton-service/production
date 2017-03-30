<?php

class UserSettings extends MainFormModel
{
    public $Setting_id;
    public $Empl_id;
    public $Theme;
    public $Hide_page_header;
    
    function __construct($scenario = '') {
        parent::__construct($scenario);

        $this->SP_UPDATE_NAME = 'CHANGE_UserSettings';

        $Select = "\nSelect
                        s.Setting_id,
                        s.Empl_id,
                        s.Theme,
                        s.Hide_page_header";
        $From = "\nFrom UserSettings s";
        

        $this->Query->setSelect($Select);
        $this->Query->setFrom($From);
        
        $this->KeyFiled = 's.Setting_id';
        $this->PrimaryKey = 'Setting_id';
    }
    
    public function rules()
    {
        return array(
            array('Theme', 'required'),
            array('Setting_id,
                    Empl_id,
                    Theme,
                    Hide_page_header', 'safe'),
        );
    }
    
    public function attributeLabels()
    {
        return array(
            'Setting_id' => 'Setting_id',
            'Theme' => 'Theme',
            'Empl_id' => 'Empl_id',
            'Hide_page_header' => 'Hide_page_header',
        );
    }
}




