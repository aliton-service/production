<script>
    Aliton.Links.push({
        Out: "edDemand_id",
        In: "AdministrationGrid",
        TypeControl: "Grid",
        Condition: "ex.Demand_id = :Value",
        Field: "Demand_id",
        //ConditionFalse: "",
        Name: "edDemand_id_Filter10",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
     Aliton.Links.push({
        Out: "edDemand_id",
        In: "DemandExecutorsGrid",
        TypeControl: "Grid",
        Condition: "de.Demand_id = :Value",
        Field: "Demand_id",
        //ConditionFalse: "",
        Name: "edDemand_id_Filter10",
        TypeFilter: "Internal",
        TypeLink: "Filter",
        isNullRun: false
    });
    
    function WorkedOut() {
            var Demand_id = <?php echo $model->Demand_id; ?>;
            
            $.ajax({
		url: '/?r=demands/workedout&Demand_id=' + Demand_id,
                success: function(r) {
                    console.log(r);
                    if (r === '0')
                        $("#MessOk").html('<b>Заявка отработана!</b>');
                }
                
            });
            $('#DialogMessage').aldialog('HideContent');
        }
        
        function NoWorkedOut() {
            var Demand_id = <?php echo $model->Demand_id; ?>;
            $('#DialogMessage').aldialog('HideContent');
            //document.location = '/index.php?r=Demands/View&Demand_id=' + Demand_id;
        }
    
    function UndoWorkedOut() {
        var Demand_id = <?php echo $model->Demand_id; ?>;
            
        $.ajax({
            url: '/?r=demands/undoworkedout&Demand_id=' + Demand_id,
            success: function(r) {
                console.log(r);
                if (r === '0')
                    $("#MessOk").html('<b>Отработка снята!</b>');
            }

        });
    }
</script>

<div style="padding-bottom: 4px;margin-bottom: 6px">
    
    <div style="float: left">Номер</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edDemand_id',
                'Width' => 120,
                'Value' => $model->Demand_id,
                'ReadOnly' => true,
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px">Адрес</div>
    <div style="float: left; margin-left: 6px">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edAddress',
                'Width' => 420,
                'Value' => $model->Address,
                'ReadOnly' => true,
            ));
        ?>
    </div>
    <div style="clear: both; margin-bottom: 6px"></div>
    <div style="float: left">
        <div style="float: left">Дата и время заявки</div>
        <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                'id' => 'edDate',
                'Width' => 140,
                'Value' => DateTimeManager::YiiDateToAliton($model->DateReg),
                //'ReadOnly' => true,
            ));
        ?>    
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Тариф обслуживания</div>
        <div style="float: left">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edServiceType',
                'Width' => 220,
                'Value' => $model->ServiceType,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Мастер</div>
        <div style="float: left">
         <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edMaster',
                'Width' => 220,
                'Value' => $model->MasterName,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="clear: both; margin-bottom: 6px"></div>            
    <div style="float: left;">
        <div style="float: left">Тип заявки</div>
        <div style="clear: both">
         <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edDemandType',
                'Width' => 220,
                'Value' => $model->DemandType,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Тип системы</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edSystemType',
                'Width' => 220,
                'Value' => $model->SystemType,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Тип оборудования</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edEquipType',
                'Width' => 220,
                'Value' => $model->EquipType,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Неисправность</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edMalfunction',
                'Width' => 220,
                'Value' => $model->Malfunction,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>            
    <div style="clear: both; margin-bottom: 6px"></div>            
    <div style="float: left;">
        <div style="float: left">Приоритет</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edPrior',
                'Width' => 160,
                'Value' => $model->DemandPrior,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Контактное лицо</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edContactInfo',
                'Width' => 420,
                'Value' => $model->Contacts,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Причина несвоевременного закрытия заявки</div>
        <div style="clear: both">
        <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edCloseReason',
                'Width' => 220,
                'Value' => $model->CloseReason,
                'ReadOnly' => true,
            ));
        ?>
        </div>
    </div>            
    <div style="clear: both; margin-bottom: 6px"></div>             
    <div style="float: left; border: 1px solid; padding: 6px">
        <div style="float: left; margin-left: 6px">
            <div style="float: left">Предельная дата</div>
            <div style="clear: both">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDeadline',
                        'Width' => 140,
                        'Value' => DateTimeManager::YiiDateToAliton($model->Deadline),
                        //'ReadOnly' => true,
                    ));
                ?>
            </div>
        </div>
        <div style="float: left; margin-left: 6px">
            <div style="float: left">Согласованная дата</div>
            <div style="clear: both">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edAgreeDate',
                        'Width' => 140,
                        'Value' => DateTimeManager::YiiDateToAliton($model->AgreeDate),
                        //'ReadOnly' => true,
                    ));
                ?>
            </div>
        </div>
        <div style="clear: both"></div>
        <div style="float: left; margin-left: 6px">
            <div style="float: left">Передано мастеру</div>
            <div style="clear: both">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateMaster',
                        'Width' => 140,
                        'Value' => DateTimeManager::YiiDateToAliton($model->DateMaster),
                        //'ReadOnly' => true,
                    ));
                ?>
            </div>
        </div>
        
        <div style="float: left; margin-left: 6px">
            <div style="float: left">Выполнено</div>
            <div style="clear: both">
                <?php
                    $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                        'id' => 'edDateExec',
                        'Width' => 140,
                        'Value' => DateTimeManager::YiiDateToAliton($model->DateExec),
                        //'Value' => DateTimeManager::YiiDateToAliton(date('d.m.Y H:i')),
                        //'ReadOnly' => true,
                    ));
                ?>
            </div>
        </div>
        
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Отчет мастера</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'edRepMaster',
                    'Width' => 420,
                    'Height' => 82,
                    'Value' => $model->RepMaster,
                    //'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div style="clear: both"></div>
    <div style="float: left;">
        <div style="float: left">Дата перевода заявки</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDateOfTrans',
                    'Width' => 220,
                    'Value' => DateTimeManager::YiiDateToAliton($model->DateOfTransfer),
                    //'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Причина перевода заявки</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edTransfReason',
                    'Width' => 220,
                    'Value' => $model->TransferReason,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Причина просрочки</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDelayReason',
                    'Width' => 220,
                    'Value' => $model->DelayReason,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>   
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Результат</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edResult',
                    'Width' => 220,
                    'Value' => $model->ResultName,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>            
    <div style="clear: both"></div>            
    <div style="float: left;">
        <div style="float: left">Неисправность</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'edDemandText',
                    'Width' => 800,
                    'Height' => 70,
                    'Value' => $model->DemandText,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>            
    <div style="float: left; margin-left: 6px">
        <div style="float: left">Зарегистрировал</div>
        <div style="clear: both">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edUserReg',
                    'Width' => 250,
                    'Value' => $model->UCreateName,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div>Последний изменивший</div>
        <div>
            <?php
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edUserChange',
                'Width' => 250,
                'Value' => $model->UChangeName,
                'ReadOnly' => true,
            ));
            ?>
        </div>
    </div>
    <div style="clear: both"></div>

</div>

<div style="float: left">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'EditDemand',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Изменить',
            'Type' => 'Window',
            'Href' => Yii::app()->createUrl('Demands/update', array('id' => $model->Demand_id)),

        ));
    ?>
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'ObjectInfo',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Карточка',
            'Href' => Yii::app()->createUrl('ObjectsGroup/index', array('ObjectGr_id'=>$model->ObjectGr_id)),

        ));
    ?>
    <?php
    if(!$model->DateMaster && $model->DateMaster == null)
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnDateMaster',
            'Width' => 124,
            'Height' => 30,
            'Type' => 'none',
            'Text' => 'Передать мастеру',
            'OnAfterClick' => 'toMaster()',
              'Href' => Yii::app()->createUrl('Demands/Tomaster', array('id'=>$model->Demand_id)),
        ));
    ?>
    <?php
    

    $this->widget('application.extensions.alitonwidgets.button.albutton', array(
        'id' => 'BtnSmsText',
        'Width' => 114,
        'Height' => 30,
        'Text' => 'Текст СМС',
        'Type' => 'none',
        'OnAfterClick' => 'getSmsText()',
//            'Href' => Yii::app()->createUrl('Demands/DemandExec', array('id'=>$model->Demand_id)),
    ));
    ?>
<style>
    #BtnSmsText {
        margin-left: 30px;
    }
</style>
</div>
<div style="float: left; margin-left: 150px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnUnoWorkedOut',
            'Width' => 164,
            'Height' => 30,
            'Text' => 'Отмена отработки',
            'Type' => 'None',
            'OnAfterClick' => 'UndoWorkedOut();',
        ));
    ?>    
</div>
<div class="btn-worked" style="float: left; margin-left: 12px;">
            <?php
                $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                    'id' => 'BtnWorkedOut',
                    'Width' => 114,
                    'Height' => 30,
                    'Text' => 'Отработано',
                    'Type' => 'None',
                    'OnAfterClick' => '$("#DialogMessage").aldialog("Show");',
                ));
            ?>    
        </div>
<div id="MessOk" style="float: left; margin-left: 12px;">
    <?php 
        if ($model->WorkedOut !== null && $model->WorkedOut !== '') {
            echo '<b>Заявка отработана</b>';
        }
    ?>
</div>
<div class="btn-exec" style="margin-left: 50px; float: left">

    
<?php
    if(!$model->DateExec && $model->DateExec == null)
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnDateExec',
            'Width' => 114,
            'Height' => 30,
            'Text' => 'Выполнено',
            'Type' => 'none',
            'OnAfterClick' => 'demandExec()',
//            'Href' => Yii::app()->createUrl('Demands/DemandExec', array('id'=>$model->Demand_id)),
        ));

?>
   </div>
<div style="clear: both"></div>

<?php
    
    $this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
        'reload' => false,
        'header' => array(
            array(
                'name' => 'Ход работы',
                'ajax'=>true,
                'options'=>array(
                    'url'=>$this->createUrl('Demands/TabAdministration', array('Demand_id' => $model->Demand_id)),
                ),
            ),
            array(
                'name' => 'Исполнители',
                'ajax'=>true,
                'options'=>array(
                    'url'=>$this->createUrl('DemandsExecutors/ViewAjax', array('Demand_id' => $model->Demand_id)),
                ),
            ),
        ),
        'content' => array(
            array(
                'id' => 'TabGeneral',
            ),
        ),
    ));
?>
<div id="sms-text" class="hidden">
    <div id="sms-text-copy" class="all-select"></div>
</div>
<script>
    function demandExec() {
       confirm("Заявка точно выполнена?") ?
            location.href='<?php echo Yii::app()->createUrl('Demands/DemandExec', array('id'=>$model->Demand_id))?>' : ''
    }
    function toMaster() {
        confirm("Передать мастеру?") ?
            location.href='<?php echo Yii::app()->createUrl('Demands/Tomaster', array('id'=>$model->Demand_id))?>' : ''
    }

    function getSmsText() {
        var type = aleditSettings.edDemandType.Value === "Снят с обслуживания" ? aleditSettings.edDemandType.Value + '; ' : '';
        var addr = aleditSettings.edAddress.Value ? aleditSettings.edAddress.Value + '; ' : ''
        var eqp_t =  aleditSettings.edEquipType.Value ? aleditSettings.edEquipType.Value + '; ' : ''
        var fault = aleditSettings.edMalfunction.Value ? aleditSettings.edMalfunction.Value + '; ' : ''
        fault += almemoSettings.edDemandText.Value + '; '
        var contact = aleditSettings.edContactInfo.Value ? aleditSettings.edContactInfo.Value + '; ' : ''
        var prior = aleditSettings.edPrior.Value ? aleditSettings.edPrior.Value : ''

        var sms = type + addr + eqp_t + fault + contact + prior


        $('#sms-text .all-select').html(sms)
        $('#sms-text').dialog({
            minWidth: 400
        })

        var target = document.getElementById('sms-text-copy');
        var rng, sel;
        if ( document.createRange ) {
            rng = document.createRange();
            rng.selectNode( target )
            sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange( rng );
        } else {
            var rng = document.body.createTextRange();
            rng.moveToElementText( target );
            rng.select();
        }
    }


</script>

<?php
    $this->widget('application.extensions.alitonwidgets.dialog.aldialog', array(
        'id' => 'DialogMessage',
        'Width' => 400,
        'Height' => 80,
        'ContentUrl' => Yii::app()->createUrl('Demands/Message', array(
            'message' => 'Вы уверены, что заявка полностью проадминистрирована?',
            'ok' => 'WorkedOut();',
            'no' => 'NoWorkedOut();',
        )),
    ));
?>