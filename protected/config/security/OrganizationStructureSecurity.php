<?php
return array(
	
        /** Роли для таблицы OrganizationStructure  **/
        'ManagerOrganizationStructure' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'ManagerOrganizationStructure',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'OrganizationStructure/index',
             'children' => array(
                'ViewOrganizationStructure',
                'CreateOrganizationStructure',
                'UpdateOrganizationStructure',
                ),
        ),

        'AdminOrganizationStructure' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'AdminOrganizationStructure',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'OrganizationStructure/index',
            'children' => array(
                'ViewOrganizationStructure',
                'CreateOrganizationStructure',
                'UpdateOrganizationStructure',
                'DeleteOrganizationStructure',
                ),
        ),

        'UserOrganizationStructure' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'UserOrganizationStructure',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'OrganizationStructure/index',
            'children' => array(
                'ViewOrganizationStructure'
                ),
        ),

        'ViewOrganizationStructure' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'ViewOrganizationStructure',
            'bizRule' => null,
            'data' => null,
        ),

        'CreateOrganizationStructure' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'CreateOrganizationStructure',
            'bizRule' => null,
            'data' => null,
        ),

        'UpdateOrganizationStructure' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'UpdateOrganizationStructure',
            'bizRule' => null,
            'data' => null,
        ),

        'DeleteOrganizationStructure' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'DeleteOrganizationStructure',
            'bizRule' => null,
            'data' => null,
        ),

);

