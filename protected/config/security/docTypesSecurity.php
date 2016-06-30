<?php
return array(
	/** Роли для таблицы DocTypes (регионы) **/
        'ManagerDocTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDocTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DocTypes/index',
            'children' => array(
                'ViewDocTypes',
                'CreateDocTypes',
                'UpdateDocTypes',
                ),
        ),

        'UserDocTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDocTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DocTypes/index',
            'children' => array(
                'ViewDocTypes',
                ),
        ),
        'AdminDocTypes' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDocTypes',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'DocTypes/index',
            'children' => array(
                'ViewDocTypes',
                'CreateDocTypes',
                'UpdateDocTypes',
                'DeleteDocTypes',
                ),

        ),

        'ViewDocTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDocTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDocTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDocTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDocTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDocTypes',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDocTypes' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDocTypes',
            'bizRule' => null,
            'data' => null,
        ),
);