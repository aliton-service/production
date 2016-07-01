<div style="float: left;">Требуется возврат?</div>
<div style="clear: both;"></div>
<div style="clear: both; margin-top: 20px;"></div>
<div style="float: left;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'Yes',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Да',
            'Type' => 'None',
            'OnAfterClick' => '$("#Dialog").aldialog("HideContent");',
        ));
    ?>
</div>

<div style="float: right;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'Cancel',
            'Width' => 124,
            'Height' => 30,
            'Text' => 'Нет',
            'FormName' => 'Repairs',
            'Type' => 'Form',
        ));
    ?>
</div>
