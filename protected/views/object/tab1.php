<?php

    echo 'Клиент: '.CHtml::textField('Клиент', $model->FullName);
    echo '<br>';
    echo 'Адрес:'.CHtml::textField('Адрес', $model->Address);
    echo '<br>';
    echo 'Отказники:'.CHtml::textField('Адрес', $model->Refusers);

