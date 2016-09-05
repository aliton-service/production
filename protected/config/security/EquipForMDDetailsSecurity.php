<?php
    return array(
        // Роли для контактных лиц
        'UserEquipForMDDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipForMDDetails/index',
            'children' => array(
                'ViewEquipForMDDetails',
            ),
        ),
        'ManagerEquipForMDDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipForMDDetails/index',
            'children' => array(
                'ViewEquipForMDDetails',
                'InsretEquipForMDDetails',
                'UpdateEquipForMDDetails',
            ),
        ),
        'AdminEquipForMDDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'EquipForMDDetails/index',
            'children' => array(
                'ViewEquipForMDDetails',
                'InsretEquipForMDDetails',
                'UpdateEquipForMDDetails',
                'DeleteEquipForMDDetails',
                'AcceptEquipForMDDetails',
            ),
        ),
        
        
        'ViewEquipForMDDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretEquipForMDDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateEquipForMDDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteEquipForMDDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

