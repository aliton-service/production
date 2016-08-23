<?php
return array(

    /**  Documents  **/

    'AdminDocuments' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'AdminDocuments',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Documents/index',
        'children' => array(
            'ViewDocuments',
            'InsertDocuments',
            'UpdateDocuments',
            'DeleteDocuments',
            'CheckupDocuments',
        ),
    ),

    'ManagerDocuments' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'ManagerDocuments',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Documents/index',
        'children' => array(
            'ViewDocuments',
            'InsertDocuments',
            'UpdateDocuments',
        ),
    ),

    'UserDocuments' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'UserDocuments',
        'bizRule' => null,
        'data' => null,
        'defaultIndex' => 'Documents/index',
        'children' => array(
            'ViewDocuments'
        ),
    ),

    'ViewDocuments' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'ViewDocuments',
        'bizRule' => null,
        'data' => null,
    ),

    'InsertDocuments' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'InsertDocuments',
        'bizRule' => null,
        'data' => null,
    ),

    'UpdateDocuments' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'UpdateDocuments',
        'bizRule' => null,
        'data' => null,
    ),

    'DeleteDocuments' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'DeleteDocuments',
        'bizRule' => null,
        'data' => null,
    ),

    'CheckupDocuments' => array(
        'type' => CAuthItem::TYPE_OPERATION,
        'description' => 'CheckupDocuments',
        'bizRule' => null,
        'data' => null,
    ),

);