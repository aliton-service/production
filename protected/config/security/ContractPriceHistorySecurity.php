<?php
    return array(
        // Роли для контактных лиц
        'UserContractPriceHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractPriceHistory/index',
            'children' => array(
                'ViewContractPriceHistory',
            ),
        ),
        'ManagerContractPriceHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractPriceHistory/index',
            'children' => array(
                'ViewContractPriceHistory',
                'InsretContractPriceHistory',
                'UpdateContractPriceHistory',
            ),
        ),
        'AdminContractPriceHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractPriceHistory/index',
            'children' => array(
                'ViewContractPriceHistory',
                'InsretContractPriceHistory',
                'UpdateContractPriceHistory',
                'DeleteContractPriceHistory',
            ),
        ),
        
        
        'ViewContractPriceHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretContractPriceHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateContractPriceHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteContractPriceHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

