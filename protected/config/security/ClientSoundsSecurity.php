<?php
return array(
	
         /** Роли для таблицы ClientSounds (Подразделения) **/
        'ManagerClientSounds' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerClientSounds',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
             'children' => array(
                'ViewClientSounds',
                'CreateClientSounds',
                'UpdateClientSounds',
                ),
        ),

        'AdminClientSounds' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminClientSounds',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewClientSounds',
                'CreateClientSounds',
                'UpdateClientSounds',
                'DeleteClientSounds',
                ),
        ),

        'UserClientSounds' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserClientSounds',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'sections/index',
            'children' => array(
                'ViewClientSounds'
                ),
        ),

        'ViewClientSounds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewClientSounds',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateClientSounds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateClientSounds',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateClientSounds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateClientSounds',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteClientSounds' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteClientSounds',
            'bizRule' => null,
            'data' => null,
        ),
);




