<?php
    return array(
        // Роли для контактных лиц
        'UserContractEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractEquips/index',
            'children' => array(
                'ViewContractEquips',
            ),
        ),
        'ManagerContractEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractEquips/index',
            'children' => array(
                'ViewContractEquips',
                'InsretContractEquips',
                'UpdateContractEquips',
            ),
        ),
        'AdminContractEquips' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractEquips/index',
            'children' => array(
                'ViewContractEquips',
                'InsretContractEquips',
                'UpdateContractEquips',
                'DeleteContractEquips',
            ),
        ),
        
        
        'ViewContractEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretContractEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateContractEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteContractEquips' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

