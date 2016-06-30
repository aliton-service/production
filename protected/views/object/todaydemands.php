<script>
    Aliton.Links.push({
        Out: "ListObjectsGrid",
        In: "edTodayObject_id",
        TypeControl: "Grid",
        Condition: ":Value",
        Field: "Object_id",
        Name: "FilteredTodayObject_id",
        isNullRun: false,
        TypeFilter: "Internal",
        TypeLink: "Filter",
    });
</script>


<?php
    echo 'По данному объекту сегодня уже зарегистрированы заявки. Просмотреть?';
?>

<?php
    $this->beginWidget('CActiveForm', array(
            'id'=>'DemFilters',
            'htmlOptions'=>array(
                'class'=>'form-inline',
                'target'=>'blank',
                ),
            'action'=> Yii::app()->createUrl('Demands/index'),
    ));
    
    
?>

<?php
    $this->widget('application.extensions.alitonwidgets.radiobutton.alradiobutton', array(
        'id' => 'rbTodayDemObject',
        'Label' => 'По выбранному объекту',
        'Name' => 'DemFilters[DemObject]',
        'Visible' => false,
        'Checked' => true,
    ));
?>

<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edTodayObject_id',
        'Name' => 'DemFilters[Object_id]',
        'Value' => $Object_id,
        'Width' => 150,
        'Visible' => false,
    ));
?>

<div style="clear: both"></div>
<div style="float: left; width: 100%; margin-top: 12px">
    <div style="float: left; ">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'ViewTodayDemandsObject',
                'Width' => 114,
                'Height' => 30,
                'Text' => 'Да',
                'Type' => 'Form',
                'FormName' => 'DemFilters',
                'OnAfterClick' => '$("#Dialog2").aldialog("HideContent");',
            ));
        ?>
    </div>
    <div style="float: right;">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'CloseTodayDemandsDialog',
                'Width' => 114,
                'Height' => 30,
                'Text' => 'Отмена',
                'Type' => 'None',
                'OnAfterClick' => '$("#Dialog2").aldialog("HideContent"); $("#NoVisibleNewDemand").albutton("BtnClick");',
            ));
        ?>
    </div>
</div>    

<?php $this->endWidget(); ?>

