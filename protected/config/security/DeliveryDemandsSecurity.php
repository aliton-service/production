<?php
    return array(
        // Роли для заявок
        'UserDeliveryDemands' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр заявок на доставку',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DeliveryDemands/index',
            'children' => array(
                'ViewDeliveryDemands',
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
    );
?>
