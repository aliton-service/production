<style>
    #cont {
        border: 1px solid;
        width: 100%;
        min-width: 1000px;
    }
</style>

<div id="cont">
<?php

    $this->widget('application.extensions.alitonwidgets.grid.algrid', array(
        'id' => 'grid',
        'stretch' => true,
        'width' => 1000,
        'height' => 500,
        'data' => $array,
        'columns' => array(
            'Address' => array(
                'name' => 'Адрес',
                'fieldname' => 'Addr',
                'width' => 300,
            ),
            'FullName' => array(
                'name' => 'Организация',
                'fieldname' => 'FullName',
                'width' => 200,
            ),
            'JuridicalPerson' => array(
                'name' => 'Юр. лицо',
                'fieldname' => 'JuridicalPerson',
                'width' => 100,
            ),
            'AreaName' => array(
                'name' => 'Район',
                'fieldname' => 'AreaName',
                'width' => 100,
            ),
            'Servicetype' => array(
                'name' => 'Тип обслуживания',
                'fieldname' => 'Servicetype',
                'width' => 100,
            ),
            'MasterName' => array(
                'name' => 'Имя мастера',
                'fieldname' => 'MasterName',
                'width' => 100,
            ),
            'MasterName' => array(
                'name' => 'Имя мастера',
                'fieldname' => 'MasterName',
                'width' => 100,
            ),
            'year_construction' => array(
                'name' => 'Новостройка',
                'fieldname' => 'year_construction',
                'width' => 100,
            ),
            'VIP' => array(
                'name' => 'ВИП',
                'fieldname' => 'VIP',
                'width' => 100,
            ),
            'Territ_Name' => array(
                'name' => 'Участок',
                'fieldname' => 'Territ_Name',
                'width' => 100,
            ),
        ),
    ));
?>
</div>
