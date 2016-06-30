

<div class="grid-select" style="padding-left: 6px">


    <?php

    $this->widget('application.extensions.alitonwidgets.gridajax.algridajax', array(
	'id'=>'AdministrationGrid',
	'Width' => 600,
	'Height' => 200,
	'Stretch' => true,
	//'KeyField' => 'exrp_id',
        'Key' => 'Demands_TabAdmGrid1',
        'ModelName' => 'ExecutorReports',
        'Columns' => array(
            'Date' => array(
                    'Name' => 'Дата сообщение',
                    'FieldName' => 'date',
                    'Width' => 100,
                    'Format' => 'd.m.Y H:i',
            ),
            'Employee' => array(
                    'Name' => 'Администрирующий',
                    'FieldName' => 'EmployeeName',
                    'Width' => 100,
            ),
            'plandateexec' => array(
                    'Name' => 'План. дата вып.',
                    'FieldName' => 'plandateexec',
                    'Width' => 100,
                    'Format' => 'd.m.Y H:i',
            ),
            'dateexec' => array(
                    'Name' => 'Дата вып.',
                    'FieldName' => 'dateexec',
                    'Width' => 100,
                    'Format' => 'd.m.Y H:i',
            ),
            'report' => array(
                    'Name' => 'Действие',
                    'FieldName' => 'report',
                    'Width' => 100,
            ),
            'othername' => array(
                    'Name' => 'Исполнитель',
                    'FieldName' => 'othername',
                    'Width' => 100,
            ),
        ),
//        'OnAfterClick' => 'id_del = settings.CurrentRow["exrp_id"]',
    ));

?>
    </div>
    <div style="margin-top: 6px"></div>
    
<!--    <form id="send-note"> -->
<!--        <input class="hidden" name="ExecutorReports[demand_id]">-->

    <?php
        $this->beginWidget('CActiveForm', array(
                'id'=>'ExecutorReports',
                'action'=> Yii::app()->createUrl('ExecutorReports/Create'),
                'htmlOptions'=>array(
                    'class'=>'form-inline'
                    ),
                'enableClientValidation'=>false,
                'enableAjaxValidation'=>false,
        ));
    ?>

    <div style="float: left">
        <?php
            if (!isset($Demand_id))
                $Demand_id = null;
        
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'Edit1',
                'Width' => 200,
                'Type' => 'String',
                'Name' => 'ExecutorReports[demand_id]',
                'Value' => $Demand_id,
                'ReadOnly' => true,
                'Visible' => false,
            ));
        ?>
    </div>
    
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'Report',
                'Width' => 430,
                'Name' => 'ExecutorReports[report]',
                'OnKeyUpEnter' => '$("#BtnSave").albutton("BtnClick");'
                
            ));
        ?>
    </div>

    <div style="float: left"><label>План. дата выполнения</label></div>
    
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'PlanDateExec',
                'Width' => 130,
                'Name' => 'ExecutorReports[plandateexec]'
            ));
        ?>
    </div> 
    

<?php $this->endWidget(); ?>
    
    <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnSave',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Написать',
                'Type' => 'AjaxForm',
                'Href' => Yii::app()->createUrl('ExecutorReports/Create'),
                'FormName' => 'ExecutorReports',
                'OnAfterAjaxSuccess' => '$("#AdministrationGrid").algridajax("Load");',
            ));
        ?>
    </div>

    <div class="pull-left">
        <?php
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnDel',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Удалить',
                'Type'=>'none'
            ));
        ?>
    </div>


<div class="clearfix"></div>

<script>
    /*
    $('#send-note').ajaxSender({
        url: '/?r=executorReports/create',
        type: 'post',
        params: {
            action: 'call_sp',
            table: 'ExecutorReports',
            SP: 'INSERT_EXECUTORREPORTS'
        },
        success: function() {
            $('#AdministrationGrid').algridajax('Load')
        }
    })

    */
    $('#BtnDel').on('click', function (e) {
        e.preventDefault()
//        if(!id_del) {
//            alert('Выберите запись')
//            return false
//        }
        $.ajax({
            url: '/?r=executorReports/delete',
            data: 'id='+algridajaxSettings['AdministrationGrid'].CurrentRow.exrp_id,
            type:'post',
            success: function () {
                $('#AdministrationGrid').algridajax('Load')
            },
            error: function (r) {
                alert(r.responseText)
            }
        })
    })
</script>

