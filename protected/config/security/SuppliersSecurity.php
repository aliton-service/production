<?php
    return array(
        'UserSuppliers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewSuppliers',
                'AssortmentSuppliers',
            ),
        ),
        
        'ManagerSuppliers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewSuppliers',
                'UpdateSuppliers',
                'InsertSuppliers',
                'AssortmentSuppliers',
            ),
        ),
        
        'AdminSuppliers' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование + Удаление',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewSuppliers',
                'UpdateSuppliers',
                'InsertSuppliers',
                'DeleteSuppliers',
                'AssortmentSuppliers',
            ),
        ),
        
        'ViewSuppliers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр поставщиков',
            'bizRule' => null,
            'data' => null,
        ),
        
        'UpdateSuppliers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Редактирование поставщиков',
            'bizRule' => null,
            'data' => null,
        ),
        
        'InsertSuppliers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Создание поставщиков',
            'bizRule' => null,
            'data' => null,
        ),
        
        'DeleteSuppliers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление поставщиков',
            'bizRule' => null,
            'data' => null,
        ),
        
        'AssortmentSuppliers' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Ассортимент',
            'bizRule' => null,
            'data' => null,
        ),
        
    );
?>





