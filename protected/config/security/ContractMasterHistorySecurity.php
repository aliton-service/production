<?php
    return array(
        // Роли для контактных лиц
        'UserContractMasterHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractMasterHistory/index',
            'children' => array(
                'ViewContractMasterHistory',
            ),
        ),
        'ManagerContractMasterHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractMasterHistory/index',
            'children' => array(
                'ViewContractMasterHistory',
                'InsretContractMasterHistory',
                'UpdateContractMasterHistory',
            ),
        ),
        'AdminContractMasterHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContractMasterHistory/index',
            'children' => array(
                'ViewContractMasterHistory',
                'InsretContractMasterHistory',
                'UpdateContractMasterHistory',
                'DeleteContractMasterHistory',
            ),
        ),
        
        
        'ViewContractMasterHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretContractMasterHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateContractMasterHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteContractMasterHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

