<?php
    return array(
        // Роли для склада
        'ManagerWHDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerWHDocuments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHDocuments/index',
            'children' => array(
                'WHDocumentsView',
                'CreateWHDocuments',
                'UpdateWHDocuments',
                'AuditEquipsWHDocuments',
                'Action1WHDocuments',
                'PurchaseWHDocuments',
                'Confirm1WHDocuments',
                'AddNoteWHDocuments',
            ),
        ),

        'AdminWHDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminWHDocuments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHDocuments/index',
            'children' => array(
                'WHDocumentsView',
                'CreateWHDocuments',
                'UpdateWHDocuments',
                'DeleteWHDocuments',
                'AuditEquipsWHDocuments',
                'Action1WHDocuments',
                'PurchaseWHDocuments',
                'Confirm1WHDocuments',
                'AddNoteWHDocuments',
            ),
        ),
        
        'MSWHDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserWHDocuments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHDocuments/index',
            'children' => array(
                'WHDocumentsView',
                'CreateWHDocuments',
                'AddNoteWHDocuments',
                'UpdateWHDocuments',
            ),
        ),
        
        'UserWHDocuments' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserWHDocuments',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WHDocuments/index',
            'children' => array(
                'WHDocumentsView'
            ),
        ),

        'WHDocumentsView' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'WHDocumentsView',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateWHDocuments',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateWHDocuments',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteWHDocuments',
            'bizRule' => null,
            'data' => null,
        ),
        
        'AuditEquipsWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'AuditEquipsWHDocuments',
            'bizRule' => null,
            'data' => null,
        ),
        
        // Подтверждение Накладной на приход
        'Action1WHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Action1WHDocuments',
            'bizRule' => null,
            'data' => null,
        ),
        
        // Требуется закупка
        'PurchaseWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'PurchaseWHDocuments',
            'bizRule' => null,
            'data' => null,
        ),
        
        // Отмена подтверждения Накладная на приход
        'Confirm1WHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Confirm1WHDocuments',
            'bizRule' => null,
            'data' => null,
        ),
        
        'AddNoteWHDocuments' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'AddNoteWHDocuments',
            'bizRule' => null,
            'data' => null,
        ),
        
        
    );
?>

