<?php

if (!$ajax)
    $this->breadcrumbs=array(
            'Справочники'=>array('/reference/index'),
            'Подразделения'=>array('index'),
            'Создать',
    );

?>

<div class='span-left'>

<?php
    if (!$ajax)
        $this->setPageTitle('Дети - создание');
?>
    
<?php $this->renderPartial('_form', array('model'=>$model)); ?></div>

