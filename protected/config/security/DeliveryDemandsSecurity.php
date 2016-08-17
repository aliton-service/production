<?php
    return array(
        // Роли для заявок
        'AdminDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Админ',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'Delivery/index',
            'children' => array(
                'ViewDeliveryDemands',
                'EditDeliveryDemands',
                'InsertDeliveryDemands',
                'DeleteDeliveryDemands',
                'LogDeliveryDemands',
                'ToLogistDeliveryDemands',
            ),
        ),
        
        'UserDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр заявок на доставку',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryDemands/index',
            'children' => array(
                'ViewDeliveryDemands',
                'InsertDeliveryDemands',
                'EditDeliveryDemands',
            ),
        ),
        
        'ManagerDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр заявок на доставку',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryDemands/index',
            'children' => array(
                'ViewDeliveryDemands',
                'EditDeliveryDemands',
                'InsertDeliveryDemands',
                'LogDeliveryDemands',
                'ToLogistDeliveryDemands',
            ),
        ),
        
        'ViewDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'EditDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Редактирование',
            'bizRule' => null,
            'data' => null,
        ),
        'InsertDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
        'LogDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
            'children' => array(
                'EditDeliveryDemands',
            ),
        ),
        'ToLogistDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Передать логисту',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>
