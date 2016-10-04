<?php
return array(
	
         /** Роли для таблицы DocmAchsDetails (Подразделения) **/
        'ManagerDocmAchsDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerDocmAchsDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewDocmAchsDetails',
                'CreateDocmAchsDetails',
                'UpdateDocmAchsDetails',
                ),
        ),

        'AdminDocmAchsDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminDocmAchsDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewDocmAchsDetails',
                'CreateDocmAchsDetails',
                'UpdateDocmAchsDetails',
                'DeleteDocmAchsDetails',
                ),
        ),

        'UserDocmAchsDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserDocmAchsDetails',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewDocmAchsDetails'
                ),
        ),

        'ViewDocmAchsDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewDocmAchsDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateDocmAchsDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateDocmAchsDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateDocmAchsDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateDocmAchsDetails',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteDocmAchsDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteDocmAchsDetails',
            'bizRule' => null,
            'data' => null,
        ),
);




