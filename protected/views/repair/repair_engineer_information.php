<script>
    var Repr_id = <?php echo $model->Repr_id ?>;
    
    $(document).ready(function(){
        GetProfit();
        GetInfo();
    });
    
    
    
    function GetProfit() {
        $.ajax({
            url: '/index.php?r=Repair/GetProfit' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                Res = JSON.parse(Res);
                $("#EquipPriceLow").html(parseFloat(Res[0]['EquipPrice']).toFixed(2));
                $("#MaterialsPriceLow").html(parseFloat(Res[0]['MaterialPrice']).toFixed(2));
                $("#PriceSRM").html(parseFloat(Res[0]['RepairSum']).toFixed(2));
                $("#ProfitPRC").html(parseFloat(Res[0]['PRC_Profability_2']).toFixed(2));
                $("#ProfitSRM").html(parseFloat(Res[0]['SRM_Profability']).toFixed(2));
            }
        });
    }
    
    function GetInfo() {
        var Data = {
            Params: {
                Repr_id: null,
                Object_id: null,
                Equip_id: null,
                SN: null,
                Storage_id: null,
            },
        };
        
        Data.Params.Repr_id = <?php echo $model->Repr_id; ?>;
        Data.Params.Object_id = <?php echo $model->Objc_id; ?>;
        Data.Params.Date = "<?php echo Date('d.m.Y'); ?>";
        Data.Params.Equip_id = <?php echo $model->Eqip_id; ?>;
        Data.Params.SN = "<?php echo $model->SN; ?>";
        Data.Params.Storage_id = "<?php echo $model->Storage_id; ?>";
        
        
        
        $.ajax({
            url: '/index.php?r=Repair/GetInfo',
            type: 'POST',
            data: Data, 
            async: true,
            success: function(Res){
                Res = JSON.parse(Res);
                
                if (parseInt(Res[0].ExternalGuarantee) == 1)
                    $("#ExternalGuarantee").html('Есть');
                else
                    $("#ExternalGuarantee").html('Нет');
                
                if (parseInt(Res[0].InternalGuarantee) == 1)
                    $("#InternalGuarantee").html('Есть');
                else
                    $("#InternalGuarantee").html('Нет');
                
                if (Res[0].LastDatePurchase !=  '' && Res[0].LastDatePurchase != null)
                    $("#LastDatePurchase").html(Res[0].LastDatePurchase);
                
                if (Res[0].LastSupplierPurchase !=  '' && Res[0].LastSupplierPurchase != null)
                    $("#LastSupplierPurchase").html(Res[0].LastSupplierPurchase);
                else
                    $("#LastSupplierPurchase").html('');
                
                if (Res[0].PriceLow !=  '' && Res[0].PriceLow != null)
                    $("#PriceLow").html(parseFloat(Res[0].PriceLow).toFixed(2));
                else
                    $("#PriceLow").html('');
                
                if (Res[0].PriceLowWHDoc !=  '' && Res[0].PriceLowWHDoc != null)
                    $("#PriceLowWHDoc").html(parseFloat(Res[0].PriceLowWHDoc).toFixed(2));
                else
                    $("#PriceLowWHDoc").html('');
                
                if (Res[0].LastDateMonitoring !=  '' && Res[0].LastDateMonitoring != null)
                    $("#LastDateMonitoring").html(Res[0].LastDateMonitoring);
                else
                    $("#LastDateMonitoring").html('');
                
                if (Res[0].EquipRepeated !=  '' && Res[0].EquipRepeated != null)
                    $("#EquipRepeated").html(Res[0].EquipRepeated);
                else
                    $("#EquipRepeated").html('');
                
                if (Res[0].AddrRepeated !=  '' && Res[0].AddrRepeated != null)
                    $("#AddrRepeated").html(Res[0].AddrRepeated);
                else
                    $("#AddrRepeated").html('');
                
                if (Res[0].EquipQuant !=  '' && Res[0].EquipQuant != null)
                    $("#EquipQuant").html(parseFloat(Res[0].EquipQuant).toFixed(2));
                else
                    $("#EquipQuant").html('');
                
                if (Res[0].EquipQuantUsed !=  '' && Res[0].EquipQuantUsed != null)
                    $("#EquipQuantUsed").html(parseFloat(Res[0].EquipQuantUsed).toFixed(2));
                else
                    $("#EquipQuantUsed").html('');
                
                if (Res[0].EquipReserv !=  '' && Res[0].EquipReserv != null)
                    $("#EquipReserv").html(parseFloat(Res[0].EquipReserv).toFixed(2));
                else
                    $("#EquipReserv").html('');
                
                if (Res[0].EquipReady !=  '' && Res[0].EquipReady != null)
                    $("#EquipReady").html(parseFloat(Res[0].EquipReady).toFixed(2));
                else
                    $("#EquipReady").html('');
            }
        });
        
    };
    
    function Accept() {
        Repr_id = <?php echo $model->Repr_id ?>;
        $.ajax({
            url: '/index.php?r=Repair/Accept' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                if (Res != '0')
                    location.reload();
            }
        });
    }
    
    function UndoAccept() {
        Repr_id = <?php echo $model->Repr_id ?>;
        $.ajax({
            url: '/index.php?r=Repair/UndoAccept' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                if (Res != '0')
                    location.reload();
            }
        });
    }
    
    function SendAgreeActDefectation() {
        Repr_id = <?php echo $model->Repr_id ?>;
        $.ajax({
            url: '/index.php?r=Repair/SendAgreeActDefectations' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                if (Res == '1')
                    $("#alMessage").html('Требуется создать акт дефектации');
                        
                if (Res == '0')
                    location.reload();
                    
                
            }
        });
    }
    
    function Exec() {
        Repr_id = <?php echo $model->Repr_id ?>;
        $.ajax({
            url: '/index.php?r=Repair/Exec' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                if (Res == '50')
                    $("#alMessage").html('Требуется согласованный акт дефектации');
                
                if (Res == '51')
                    $("#alMessage").html('Требуется накладная на возврат мастеру');
                
                if (Res == '52')
                    $("#alMessage").html('Требуется акт утилизации');
                
                if (Res == '31')
                    $("#alMessage").html('Требуется накладная на возврат мастеру');
                
                if (Res == '32')
                    $("#alMessage").html('Требуется накладная на перемещение из ПРЦ на СКЛАД');
                
                if (Res == '33')
                    $("#alMessage").html('Требуется акт списания');
                
                if (Res == '0')
                    location.reload();
            }
        });
    }
    
    function Profit() {
        Repr_id = <?php echo $model->Repr_id ?>;
        $.ajax({
            url: '/index.php?r=Repair/Profit' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                if (Res == '1')
                    $("#alMessage").html('Требуется сделать мониторинг цены ремонтируемого оборудования');
                else if (Res == '2')
                    $("#alMessage").html('Требуется сделать мониторинг используемых материалов');
                else if (Res == '3')
                    $("#alMessage").html('Ремонт не рентабелен');
                else if (Res == '4')
                    $("#alMessage").html('Ремонт не рентабелен');
                else if (Res == '5')
                    $("#alMessage").html('Требуется подтвержденная сопроводительная накладная');
                                
                if (Res == '0')
                    location.reload();
            }
        });
    };
    
    function WorkStarting() {
        Repr_id = <?php echo $model->Repr_id ?>;
        $.ajax({
            url: '/index.php?r=Repair/WorkStart' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                if (Res != '0')
                   location.reload();
            }
        });
    }
    
    function WorkEnd() {
        Repr_id = <?php echo $model->Repr_id ?>;
        $.ajax({
            url: '/index.php?r=Repair/WorkEnd' + '&Repr_id=' + Repr_id,
            type: 'POST',
            data: null, 
            async: true,
            success: function(Res){
                if (Res != '0')
                    location.reload();
            }
        });
    }
    
</script>

<style>
    .data-form {
        float: left;
        width: 900px;
        padding: 10px;
        border: 1px solid #e5e5e5;
    }
    
       
    .data-row {
        float: left;
        width: 890px;
        margin-bottom: 8px;
    }
    
    
    
    .data-column {
        float: left;
        margin-left: 12px;
    }
    
    .data-column:first-child {
        margin-left: 0px;
    }
    
</style>


<?php
    $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
        'id' => 'edRepr_id',
        'Width' => 100,
        'Type' => 'String',
        'Value' => $model->Repr_id,
        'ReadOnly' => true,
        'Visible' => false,
    ));
?>
<div class="data-form">
    <div class="data-row">
        <div class="data-column"><b>Статус:</b></div>
        <div class="data-column"><b><?php echo $model->StatusName; ?></b></div>
        <div class="data-column"><b>Стадия:</b></div>
        <div class="data-column"><b><?php echo $model->RepairStageName; ?></b></div>
    </div>
    <div class="data-row">
        <div class="data-column">Номер</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edNumber',
                    'Width' => 100,
                    'Type' => 'String',
                    'Name' => 'Repairs[number]',
                    'Value' => $model->Number,
                    'ReadOnly' => true,
                    'PlaceHolder' => '-НОМЕР-'
                ));
            ?>
        </div>
        <div class="data-column">Дата прих. оборудования</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDate',
                    'Name' => 'Repairs[Date]',
                    'Width' => 130,
                    'Value' => DateTimeManager::YiiDateToAliton($model->Date),
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Срочность</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edRepairPrior',
                    'Width' => 100,
                    'Type' => 'String',
                    'Name' => 'Repairs[RepairPrior]',
                    'Value' => $model->RepairPrior,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">Заявка №</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edDemand',
                    'Width' => 150,
                    'Type' => 'String',
                    'Name' => 'Repairs[Demand_id]',
                    'Value' => $model->Demand_id,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                        'id' => 'cbRepairPay',
                        'Label' => 'Ремонт платный',
                        'Checked' => $model->RepairPay,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                        'id' => 'cbRepairPayByCompany',
                        'Label' => 'Платный ремонт за счет Эльтона',
                        'Checked' => $model->RepairPayByCompany,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Желаемая дата</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDateBest',
                    'Name' => 'Repairs[DateBest]',
                    'Width' => 130,
                    'Value' => DateTimeManager::YiiDateToAliton($model->DateBest),
                    'ReadOnly' => false,
                ));
            ?>
        </div>
        <div class="data-column">Предельная дата</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDeadline',
                    'Name' => 'Repairs[Deadline]',
                    'Width' => 130,
                    'Value' => DateTimeManager::YiiDateToAliton($model->Deadline),
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Адрес объекта</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edAddr',
                    'Width' => 300,
                    'Type' => 'String',
                    'Name' => 'Repairs[Addr]',
                    'Value' => $model->Addr,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">Юр. лицо</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edJuridicalPerson',
                    'Width' => 150,
                    'Type' => 'String',
                    'Name' => 'Repairs[JuridicalPerson]',
                    'Value' => $model->JuridicalPerson,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Оборудование</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edEquipName',
                    'Width' => 300,
                    'Type' => 'String',
                    'Name' => 'Repairs[EquipName]',
                    'Value' => $model->EquipName,
                    'ReadOnly' => true,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbUsed',
                    'Label' => 'Б\у',
                    'Checked' => $model->Used,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column">Серийный номер</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edSN',
                    'Width' => 300,
                    'Type' => 'String',
                    'Name' => 'Repairs[SN]',
                    'Value' => $model->SN, 
                    'ReadOnly' => false,
                    'OnChange' => '',
                ));
            ?>
        </div>
        <div class="data-column">Физ. состояние</div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                    'id' => 'edEvaluation',
                    'Width' => 70,
                    'Type' => 'String',
                    'Name' => 'Repairs[Evaluation]',
                    'Value' => $model->Evaluation, 
                    'ReadOnly' => false,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.comboboxajax.alcomboboxajax', array(
                        'id' => 'cmbEvaluations',
                        'ModelName' => 'RepairEvaluations',
                        'FieldName' => 'RepairEvaluation',
                        'KeyField' => 'RepairEvaluation_id',
                        'Type' => array(
                                'Mode' => 'Filter',
                                'Condition' => "r.RepairEvaluation like ':Value%'",
                        ),
                        'Width' => 22,
                        'Columns' => array(
                                'RepairEvaluation' => array(
                                        'Name' => 'Оценка',
                                        'Width' => 140,
                                        'FieldName' => 'RepairEvaluation',
                                ),
                                'Evaluation' => array(
                                        'Name' => 'Средний балл',
                                        'Width' => 110,
                                        'FieldName' => 'Evaluation',
                                ),
                            
                                'Desc' => array(
                                        'Name' => 'Хар-ка',
                                        'Width' => 310,
                                        'FieldName' => 'Desc',
                                ),
                        ),
                ));

            ?>
        </div>
        <div class="data-column">(Подсказка по оценкам)</div>
    </div>
    <div class="data-row" style="border: 1px solid #e5e5e5; padding: 4px;">
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbSubstitution',
                    'Label' => 'Обор. с подмены',
                    'Checked' => $model->Substitution,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbNoService',
                    'Label' => 'Обор. не на обслуж.',
                    'Checked' => $model->Substitution,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbEquipReturn',
                    'Label' => 'Требуется возврат',
                    'Checked' => $model->EquipReturn,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbEquipGood',
                    'Label' => 'Оборудование исправно',
                    'Checked' => $model->EquipGood,
                ));
            ?>
        </div>
        <div class="data-column">
            <?php
                $this->widget('application.extensions.alitonwidgets.checkbox.alcheckbox', array(
                    'id' => 'cbEquipWrnt',
                    'Label' => 'Оборудование на гарантии',
                    'Checked' => $model->EquipWrnt,
                ));
            ?>
        </div>
    </div>
    <div class="data-row">
        <div class="data-column" style="width: 400px">Комплектность</div>
        <div class="data-column" style="width: 400px">Неисправность</div>
    </div>
    <div class="data-row">
        <div class="data-column" style="width: 400px">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'cbEquipSet',
                    'Name' => 'Repairs[EquipSet]',
                    'Value' => $model->EquipSet,
                    'Width' => 390,
                    'Height' => 50,
                    
                ));
            ?>
        </div>
        <div class="data-column" style="width: 400px">
            <?php
                $this->widget('application.extensions.alitonwidgets.memo.almemo', array(
                    'id' => 'cbEquipDefects',
                    'Name' => 'Repairs[EquipDefects]',
                    'Value' => $model->EquipDefects,
                    'Width' => 390,
                    'Height' => 50,

                ));
            ?>
        </div>
    </div>
</div>

<div style="float: left; overflow-y: scroll; height: 360px;">
    <div id='alMessage' style="padding: 4px; color: red; font-weight: 400;"></div>
    <table style="border: 1px solid #e5e5e5; width: 400px;">
        <tbody>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Себестоимость оборудования</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipPriceLow"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Себестоимость материалов</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="MaterialsPriceLow"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Стоимость ремонта в СРМ</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="PriceSRM"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Рентабильность (ПРЦ)</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="ProfitPRC"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Рентабильность (СРМ)</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="ProfitSRM"></td>
            </tr>
        </tbody>
    </table>
    
    <table style="border: 1px solid #e5e5e5; width: 400px;">
        <tbody>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Внешняя гарантия:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="ExternalGuarantee"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Внутренняя гарантия:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="InternalGuarantee"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Дата закупки:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="LastDatePurchase"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Поставщик:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="LastSupplierPurchase"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Цена из прайса:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="PriceLow"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Цена из  послед. прих. накладной:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="PriceLowWHDoc"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Дата послед. обновл. цены:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="LastDateMonitoring"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Повторный ремонт оборуд.:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipRepeated"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Повторный ремонт на адресе:</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="AddrRepeated"></td>
            </tr>
            <tr>
                <td colspan="2" style="width: 200px; border: 1px solid #e5e5e5;">Наличие на складе:</td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Новое</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipQuant"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Б\У</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipQuantUsed"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Зарезервированно</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipReserv"></td>
            </tr>
            <tr>
                <td style="width: 200px; border: 1px solid #e5e5e5;">Готово к выдаче</td>
                <td style="width: 200px; border: 1px solid #e5e5e5;" id="EquipReady"></td>
            </tr>
            
        </tbody>
    </table>
</div>

<div style="clear: both; margin-top: 6px;"></div>
<div style="float: left; width: 100%">
    <div style="float: left;">
        <?php
            $Url = '';
            
            if  ($model->Status_id < 2)
                $Url = Yii::app()->createUrl('Repair/Update', array(
                    'Repr_id' => $model->Repr_id, 
                ));
            else
                $Url = Yii::app()->createUrl('Repair/Update2', array(
                    'Repr_id' => $model->Repr_id, 
                ));
            
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'EditRepair',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Изменить',
                'Type' => 'Window',
                'Href' => $Url,
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 10px;">
        <?php
            $Enabled = true;
            if ($model->Demand_id == '' || $model->Demand_id == null)
                $Enabled = false;
            
                    
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'DemandView',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Заявка',
                'Type' => 'NewWindow',
                'Enabled' => $Enabled,
                'Href' => Yii::app()->createUrl('Demands/View', array(
                    'Demand_id' => $model->Demand_id, 
                )),
            ));
        ?>
    </div>
    <div style="float: left;">
        <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'ObjcView',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Карточка',
                'Type' => 'NewWindow',
                'Href' => Yii::app()->createUrl('ObjectsGroup/Index', array(
                    'ObjectGr_id' => $model->ObjectGr_id, 
                )),
            ));
        ?>
    </div>
    <div style="float: left;">
        <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'ActView',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Реестр актов',
                'Type' => 'NewWindow',
                'Href' => Yii::app()->createUrl('WHActs/Index', array(
                    'Object_id' => $model->Objc_id, 
                )),
            ));
        ?>
    </div>
    <div style="float: right;">
        <?php
            $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'Parameters',
                    'action' => Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Ремонт/Приходная_накладная_в_ПРЦ')),
                    'htmlOptions'=>array(
                            'class'=>'form-inline'
                            ),
             ));
            
            $this->widget('application.extensions.alitonwidgets.edit.aledit', array(
                'id' => 'edRepr',
                'Width' => 70,
                'Type' => 'String',
                'Name' => 'Parameters[Repr_id]',
                'Value' => $model->Repr_id, 
                'ReadOnly' => true,
                'Visible' => false,
            ));
        
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'Print',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Печать',
                'FormName' => 'Parameters',
                'Type' => 'Form',
                'Href' => '',//Yii::app()->createUrl('Reports/ReportOpen', array('ReportName' => '/Ремонт/Приходная_накладная_в_ПРЦ')),
            ));
            
            
        ?>
        <?php $this->endWidget(); ?>
    </div>
</div>

<div style="clear: both; margin-top: 6px;"></div>
<div style="float: left; width: 100%">
    <?php
        $this->widget('application.extensions.alitonwidgets.tabs.altabs', array(
            'reload' => false,
            'header' => array(
                array(
                    'name'=>'Ход работы',
                    'ajax'=>true,
                    'options'=>array(
                        'url'=>$this->createUrl('RepairComments/Index', array(
                            'Repr_id' => $model->Repr_id,
                        ))
                    ),

                ),
                array(
                    'name'=>'Материалы',
                    'ajax'=>true,
                    'options'=>array(
                        'url'=>$this->createUrl('RepairMaterials/Index', array(
                            'Repr_id' => $model->Repr_id,
                        ))
                    ),

                ),
                array(
                    'name'=>'Документы',
                    'ajax'=>true,
                    'options'=>array(
                        'url'=>$this->createUrl('Repair/GetDocuments', array(
                            'Repr_id' => $model->Repr_id,
                        ))
                    ),

                ),
                array(
                    'name'=>'Работы',
                    'ajax'=>true,
                    'options'=>array(
                        'url'=>$this->createUrl('RepairWorkings/Index', array(
                            'Repr_id' => $model->Repr_id,
                        ))
                    ),

                ),
            ),
            'content'=> array(
                array(
                    'id'=>'rep_comments',
                ),
                array(
                    'id'=>'rep_materials',
                ),
                array(
                    'id'=>'rep_documents',
                ),
                array(
                    'id'=>'rep_workings',
                ),
                
            ),
        ));
    ?>
</div>
<div style="clear: both; margin-top: 6px;"></div>
<div style="float: left">
    <div style="float: left">
        <div style="float: left">Дата принятия</div>
        <div style="float: left; margin-left: 6px;">
            <?php
                $this->widget('application.extensions.alitonwidgets.dateedit.aldateedit', array(
                    'id' => 'edDateAccept',
                    'Name' => 'Repairs[DateAccept]',
                    'Width' => 130,
                    'Value' => DateTimeManager::YiiDateToAliton($model->DateAccept),
                    'ReadOnly' => false,
                ));
            ?>
        </div>
    </div>
    <div style="clear: both; margin-top: 6px;"></div>
    <div style="float: left">
        <?php    
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnAccept',
                'Width' => 124,
                'Height' => 30,
                'Text' => 'Принять',
                'Type' => 'None',
                'OnAfterClick' => 'Accept();',
                'Enabled' => $Params['BtnAccept'],
                'Href' => Yii::app()->createUrl('Repair/Accept', array('Repr_id'=>$model->Repr_id)),
            ));
        ?>
    </div>
    <div style="float: left; margin-left: 6px;">
        <?php            
            $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                'id' => 'BtnUndoAccept',
                'Width' => 160,
                'Height' => 30,
                'Text' => 'Отменить принятие',
                'Type' => 'None',
                'Enabled' => $Params['BtnUndoAccept'],
                'OnAfterClick' => 'UndoAccept();',
                'Href' => Yii::app()->createUrl('Repair/UndoAccept', array('Repr_id'=>$model->Repr_id)),
            ));
        ?>
    </div>
</div>


<div style="float: left; margin-left: 12px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnSendAgreeActDefection',
            'Width' => 240,
            'Height' => 30,
            'Text' => 'Отправить на согласование',
            'Type' => 'None',
            'Enabled' => $Params['BtnSendAgreeActDefectation'],
            'Visible' => $Params['BtnSendAgreeActDefectation'],
            'OnAfterClick' => 'SendAgreeActDefectation();',
            'Href' => '',
        ));
    ?>
</div>

<div style="float: left; margin-left: 12px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnExec',
            'Width' => 144,
            'Height' => 30,
            'Text' => 'Выполнено',
            'Type' => 'None',
            'Enabled' => $Params['BtnExec'],
            'Visible' => $Params['BtnExec'],
            'OnAfterClick' => 'Exec();',
        ));
    ?>
</div>

<div style="float: left; margin-left: 12px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnProfit',
            'Width' => 144,
            'Height' => 30,
            'Text' => 'Ремонт рентабелен',
            'Type' => 'None',
            'Enabled' => $Params['BtnProfit'],
            'Visible' => $Params['BtnProfit'],
            'OnAfterClick' => 'Profit();',
        ));
    ?>
</div>

<div style="float: left; margin-left: 12px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnWorkStart',
            'Width' => 144,
            'Height' => 30,
            'Text' => 'Приступить к ремонту',
            'Type' => 'None',
            'Enabled' => $Params['BtnWorkStart'],
            'Visible' => $Params['BtnWorkStart'],
            'OnAfterClick' => 'WorkStarting();',
        ));
    ?>
</div>

<div style="float: left; margin-left: 12px;">
    <?php
        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
            'id' => 'BtnWorkEnd',
            'Width' => 144,
            'Height' => 30,
            'Text' => 'Закончить ремонт',
            'Type' => 'None',
            'Enabled' => $Params['BtnWorkEnd'],
            'Visible' => $Params['BtnWorkEnd'],
            'OnAfterClick' => 'WorkEnd();',
        ));
    ?>
</div>

