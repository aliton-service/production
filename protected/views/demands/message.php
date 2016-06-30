<div style="float: left; width: 100%; height: 100%">
    <div><?php echo $message?></div>
    <div style="clear: both"></div>
    <div style="float: left; width: 100%; margin-top: 20px;">
        <div style="float: left;">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'BtnOK_DIALOG',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Да',
                    'Type' => 'None',
                    'OnAfterClick' => $ok,
                ));
            ?>
        </div>
        <div style="float: right;">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'BtnNO_DIALOG',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Нет',
                    'Type' => 'None',
                    'OnAfterClick' => $no,
                ));
            ?> 
        </div>
    </div>
</div>    



