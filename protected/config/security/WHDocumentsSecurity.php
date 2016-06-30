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
    );
?>

