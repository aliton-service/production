<?php
    return array(
        // Роли для контактных лиц
        'UserContractSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractSystems/index',
            'children' => array(
                'ViewContractSystems',
            ),
        ),
        'ManagerContractSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractSystems/index',
            'children' => array(
                'ViewContractSystems',
                'InsretContractSystems',
                'UpdateContractSystems',
            ),
        ),
        'AdminContractSystems' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractSystems/index',
            'children' => array(
                'ViewContractSystems',
                'InsretContractSystems',
                'UpdateContractSystems',
                'DeleteContractSystems',
            ),
        ),
        
        
        'ViewContractSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretContractSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateContractSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteContractSystems' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

