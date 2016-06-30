<?php
    return array(
        'WhActsView' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Реестр актов',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'WhActs/index',
            'children' => array(
                'ViewWhActs',
            ),
        ),
        
        'ManagerWhActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewWhActs',
                'InsertWhActs',
                'UpdateWhActs',
                'ConfirmWhActs',
                'AddTrebWhActs',
                'UndoWhActs',
            ),
        ),
        
        'AdminWhActs' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'ContactInfo/index',
            'children' => array(
                'ViewWhActs',
                'InsertWhActs',
                'UpdateWhActs',
                'ConfirmWhActs',
                'AddTrebWhActs',
                'DeleteWhActs',
                'UndoWhActs',
            ),
        ),
        
        'ViewWhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр актов',
            'bizRule' => null,
            'data' => null,
        ),
        
        'UpdateWhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Редактирование акта',
            'bizRule' => null,
            'data' => null,
        ),
        
        'InsertWhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Создание акта',
            'bizRule' => null,
            'data' => null,
        ),
        
        'DeleteWhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление акта',
            'bizRule' => null,
            'data' => null,
        ),
        
        'ConfirmWhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Подтверждение акта',
            'bizRule' => null,
            'data' => null,
        ),
        
        'UndoWhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Подтверждение акта',
            'bizRule' => null,
            'data' => null,
        ),
        
        'AddTrebWhActs' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Добавление требования к аткту',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>



