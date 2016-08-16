<?php
    return array(
        // Роли для контактных лиц
        'UserContractsDetails_v' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractsDetails_v/index',
            'children' => array(
                'ViewContractsDetails_v',
            ),
        ),
        'ManagerContractsDetails_v' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractsDetails_v/index',
            'children' => array(
                'ViewContractsDetails_v',
                'InsretContractsDetails_v',
                'UpdateContractsDetails_v',
            ),
        ),
        'AdminContractsDetails_v' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractsDetails_v/index',
            'children' => array(
                'ViewContractsDetails_v',
                'InsretContractsDetails_v',
                'UpdateContractsDetails_v',
                'DeleteContractsDetails_v',
            ),
        ),
        
        
        'ViewContractsDetails_v' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretContractsDetails_v' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateContractsDetails_v' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteContractsDetails_v' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

