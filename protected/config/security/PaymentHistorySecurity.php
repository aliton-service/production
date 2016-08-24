<?php
    return array(
        // Роли для контактных лиц
        'UserPaymentHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PaymentHistory/index',
            'children' => array(
                'ViewPaymentHistory',
            ),
        ),
        'ManagerPaymentHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PaymentHistory/index',
            'children' => array(
                'ViewPaymentHistory',
                'InsretPaymentHistory',
                'UpdatePaymentHistory',
            ),
        ),
        'AdminPaymentHistory' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'PaymentHistory/index',
            'children' => array(
                'ViewPaymentHistory',
                'InsretPaymentHistory',
                'UpdatePaymentHistory',
                'DeletePaymentHistory',
            ),
        ),
        
        
        'ViewPaymentHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretPaymentHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdatePaymentHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeletePaymentHistory' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

