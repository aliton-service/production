<div style="float: left; width: 100%">
    <?php
        $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
            'id' => 'RepairWorkingsGrid',
            'Stretch' => true,
            'Key' => 'RepairWorkings_Index_RepairWorkingsGrid',
            'ModelName' => 'RepairWorkings',
            'ShowFilters' => true,
            'Height' => 200,
            'Width' => 500,
            'Columns' => array(
                    'WorkStart' => array(
                            'Name' => 'Начало работ',
                            'FieldName' => 'WorkStart',
                            'Width' => 250,
                            'Filter' => array(
                                    'Condition' => 'rw.WorkStart Like \':Value%\'',
                            ),
                            'Sort' => array(
                                    'Up' => 'rw.WorkStart desc',
                                    'Down' => 'rw.WorkStart',
                            ),
                    ),
                    'WorkEnd' => array(
                            'Name' => 'Конец работ',
                            'FieldName' => 'WorkEnd',
                            'Width' => 250,
                            'Filter' => array(
                                    'Condition' => 'rw.WorkEnd Like \':Value%\'',
                            ),
                            'Sort' => array(
                                    'Up' => 'rw.WorkEnd desc',
                                    'Down' => 'rw.WorkEnd',
                            ),
                    ),
            ),
        ));
    ?>
</div>

<div style="clear: both; margin-top: 6px;"></div>