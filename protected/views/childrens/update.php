<?php

if (!$ajax)
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Подразделения'=>array('index'),
            'Редактировать',
    );

?>

<div class='span-left'>

<?php
    if (!$ajax)
        $this->setPageTitle('Дети - редактирование');
?>
    
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

