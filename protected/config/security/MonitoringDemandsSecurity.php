<?php
    return array(
        // Роли для контактных лиц
        'UserMonitoringDemands' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'MonitoringDemands/index',
            'children' => array(
                'ViewMonitoringDemands',
            ),
        ),
        'ManagerMonitoringDemands' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'MonitoringDemands/index',
            'children' => array(
                'ViewMonitoringDemands',
                'InsretMonitoringDemands',
                'UpdateMonitoringDemands',
            ),
        ),
        'AdminMonitoringDemands' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'MonitoringDemands/index',
            'children' => array(
                'ViewMonitoringDemands',
                'InsretMonitoringDemands',
                'UpdateMonitoringDemands',
                'DeleteMonitoringDemands',
            ),
        ),
        
        
        'ViewMonitoringDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretMonitoringDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateMonitoringDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteMonitoringDemands' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

