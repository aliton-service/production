<?php
/**
 *
 * @var TasksController $this
 * @var \Tasks $model
 */
$this->title = "Создать задачу";
$this->renderPartial('_form', array('model'=>$model));