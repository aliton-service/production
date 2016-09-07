<?php
    return array(
        // Роли для контактных лиц
        'UserMonitoringDemandDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'MonitoringDemandDetails/index',
            'children' => array(
                'ViewMonitoringDemandDetails',
            ),
        ),
        'ManagerMonitoringDemandDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Просмотр + Редактирование',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'MonitoringDemandDetails/index',
            'children' => array(
                'ViewMonitoringDemandDetails',
                'InsretMonitoringDemandDetails',
                'UpdateMonitoringDemandDetails',
            ),
        ),
        'AdminMonitoringDemandDetails' => array(
            'type' => CAuthItem::TYPE_ROLE,
            'description' => 'Все права',
            'bizRule' => null,
            'data' => null,
            'defaultIndex' => 'MonitoringDemandDetails/index',
            'children' => array(
                'ViewMonitoringDemandDetails',
                'InsretMonitoringDemandDetails',
                'UpdateMonitoringDemandDetails',
                'DeleteMonitoringDemandDetails',
            ),
        ),
        
        
        'ViewMonitoringDemandDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Просмотр',
            'bizRule' => null,
            'data' => null,
        ),
        'InsretMonitoringDemandDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Вставка',
            'bizRule' => null,
            'data' => null,
        ),
        'UpdateMonitoringDemandDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Изменение',
            'bizRule' => null,
            'data' => null,
        ),
        'DeleteMonitoringDemandDetails' => array(
            'type' => CAuthItem::TYPE_OPERATION,
            'description' => 'Удаление',
            'bizRule' => null,
            'data' => null,
        ),
    );
?>

