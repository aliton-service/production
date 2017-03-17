<script>
    $(document).ready(function () {
        var StateInsert = <?php if (Yii::app()->controller->action->id == 'Insert') echo 'true'; else echo 'false'; ?>;
        
        Acts2 = {
            Docm_id: <?php echo json_encode($model->docm_id); ?>,
            Date: Aliton.DateConvertToJs(<?php echo json_encode($model->date); ?>),
            Achs_id: <?php echo json_encode($model->achs_id); ?>,
            Object_id: <?php echo json_encode($model->objc_id); ?>,
            Address: <?php echo json_encode($model->Address); ?>,
            Client: <?php echo json_encode($model->org_name); ?>,
            Service: <?php echo json_encode($model->ServiceType); ?>,
            DcknName: <?php echo json_encode($model->dckn_name); ?>,
            SignedYn: Boolean(Number(<?php echo json_encode($model->signed_yn); ?>)),
            CstmName: <?php echo json_encode($model->cstm_name); ?>,
            Cstm_id: <?php echo json_encode($model->cstm_id); ?>,
            Note: <?php echo json_encode($model->note); ?>,
            Sum: <?php echo json_encode($model->sum); ?>,
            Pmtp_id: <?php echo json_encode($model->pmtp_id); ?>,
            PaymentType: <?php echo json_encode($model->pmtp_name); ?>,
            Bill: <?php echo json_encode($model->bill); ?>,
            DatePay: Aliton.DateConvertToJs(<?php echo json_encode($model->date_payment); ?>),
            NotePayment: <?php echo json_encode($model->note_payment); ?>,
            WorkType: <?php echo json_encode($model->wrtp_name); ?>,
            Wrtp_id: <?php echo json_encode($model->wrtp_id); ?>,
            Jbtp_id: <?php echo json_encode($model->jbtp_id); ?>,
            JobType: <?php echo json_encode($model->jbtp_name); ?>,
            WorkList: <?php echo json_encode($model->work_list); ?>,
            Juridical: <?php echo json_encode($model->work_list); ?>,
            
            edMaster: <?php echo json_encode($model->master); ?>,
            Cntr_id: <?php echo json_encode($model->cntr_id); ?>,
            Dckn_id: <?php echo json_encode($model->dckn_id); ?>,
            Jrdc_id: <?php echo json_encode($model->jrdc_id); ?>,
            Dmnd_empl_id: <?php echo json_encode($model->dmnd_empl_id); ?>,
        };

        var DataAddress = new $.jqx.dataAdapter(Sources.SourceListAddresses);
        var DataClient = new $.jqx.dataAdapter(Sources.SourceOrganizationsVMin);
        var DataWHDocKinds = new $.jqx.dataAdapter(Sources.SourceWHDocKinds);
        var DataCustomers = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceCustomers, {}));
        var DataPaymentTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourcePaymentTypes, {}));
        var DataWorkTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceWorkTypes, {}));
        var DataJobTypes = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceJobTypes, {}));
        var DataJuridicals = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceJuridicalsMin, {}));
        var DataEmployees = new $.jqx.dataAdapter($.extend(true, {}, Sources.SourceListEmployees, {}));
        
        
        $("#edAddressEdit").on('select', function(event){
            var args = event.args;
            if (args) {
                var item = args.item;
                var value = item.value;
            }
            else {return; }
            var ObjectGr_id = Aliton.FindArray(DataAddress.records, 'Object_id', value);
            ObjectGr_id = ObjectGr_id['ObjectGr_id'];
            
            if ($("#edDateEdit").val() != '')
                var Date = $("#edDateEdit").val();
            else {
                var DateS = new window.Date();
                var Date = DateS.getDate() + '.' + (DateS.getMonth() + 1) + '.' + DateS.getFullYear();
            }
            
            $.ajax({
                url: <?php echo json_encode(Yii::app()->createUrl('WhActs/GetContracts')); ?>,
                type: 'POST',
                async: false,
                data: {
                    ObjectGr_id: ObjectGr_id,
                    Date: Date
                },
                success: function(Res) {
                    Res = JSON.parse(Res);
                    if (Res.result == 1) {
                        console.log(Res.html[0]);
                        $("#edServiceEdit").jqxComboBox({source: Res.html});
                        if (Acts2.Cntr_id != null)
                            $("#edServiceEdit").jqxComboBox('val', Acts2.Cntr_id);
                        else
                            $("#edServiceEdit").jqxComboBox({source: Res.html, selectedIndex: 0});
                        
                        $("#edJuridicalEdit").jqxComboBox('val', Res.html[0].Jrdc_id);
                        $('#edClientEdit').jqxInput('val', Res.html[0].FullName);
                    }
                        
                }
            });
        });
        
        $("#edAddressEdit").on('bindingComplete', function(){
            $('#btnSave').jqxButton({disabled: false});
            if (Acts2.Object_id !== null) $("#edAddressEdit").jqxComboBox('val', Acts2.Object_id);
        });
        $("#edAddressEdit").jqxComboBox({ source: DataAddress, width: '525', height: '25px', displayMember: "Addr", valueMember: "Object_id"});
        $("#edClientEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 250, minLength: 1, value: Acts2.Client}));
        $("#edServiceEdit").jqxComboBox({ width: '203', height: '25', displayMember: "ServiceType", valueMember: "ContrS_id", autoDropDownHeight: true});
        $("#edDcknNameEdit").jqxComboBox({source: DataWHDocKinds, width: '182', height: '25px', displayMember: "name", valueMember: "dckn_id", autoDropDownHeight: true});
        $("#edSignedYnEdit").jqxCheckBox($.extend(true, CheckBoxDefaultSettings, {width: 100, checked: Acts2.SignedYn}));
        $("#edCstmNameEdit").jqxComboBox({source: DataCustomers, width: '240', height: '25px', displayMember: "CustomerName", valueMember: "Customer_Id"});
        $('#edNoteEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edSumEdit").jqxNumberInput($.extend(true, {}, NumberInputDefaultSettings, {width: '80px', value: Acts2.Sum}));
        $("#edPaymentTypeEdit").jqxComboBox({source: DataPaymentTypes, width: '182', height: '25px', displayMember: "PaymentTypeName", valueMember: "PaymentType_Id", autoDropDownHeight: true});
        $("#edBillEdit").jqxInput($.extend(true, InputDefaultSettings, {height: 25, width: 180, minLength: 1, value: Acts2.Bill}));
        $("#edDatePayEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: Acts2.DatePay}));
        $('#edNotePaymentEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 32, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edDateEdit").jqxDateTimeInput($.extend(true, {}, DateTimeDefaultSettings, { value: new Date(), width: 160 }));
        $("#edWorkTypeEdit").jqxComboBox({source: DataWorkTypes, width: '182', height: '25px', displayMember: "name", valueMember: "wrtp_id", autoDropDownHeight: true });
        $("#edJobTypeEdit").jqxComboBox({source: DataJobTypes, width: '245', height: '25px', displayMember: "JobType_Name", valueMember: "JobType_Id", autoDropDownHeight: true });
        $('#edWorkListEdit').jqxTextArea($.extend(true, TextAreaDefaultSettings, { height: 60, width: 'calc(100% - 2px)', minLength: 1}));
        $("#edJuridicalEdit").jqxComboBox({source: DataJuridicals, width: '220', height: '25px', displayMember: "JuridicalPerson", valueMember: "Jrdc_Id", dropDownVerticalAlignment: 'top'});
        $("#edMasterEdit").jqxComboBox({source: DataEmployees, width: '430', height: '25px', displayMember: "EmployeeName", valueMember: "Employee_id", dropDownVerticalAlignment: 'top'});
        
        $('#btnSave').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30, disabled: true }));
        $('#btnCancel').jqxButton($.extend(true, {}, ButtonDefaultSettings, { width: 120, height: 30 }));
        $('#btnCancel').on('click', function() {
            if ($('#WHDocumentsDialog').length>0)
                $('#WHDocumentsDialog').jqxWindow('close');
            if ($('#CostCalculationsDialog').length>0)
                $('#CostCalculationsDialog').jqxWindow('close');
            if ($('#RepairsDialog').length>0)
                $('#RepairsDialog').jqxWindow('close');
        });
        $('#btnSave').on('click', function(){
            var Url = <?php echo json_encode(Yii::app()->createUrl('WHActs/Update')); ?>;
            if (StateInsert)
                Url = <?php echo json_encode(Yii::app()->createUrl('WHActs/Insert')); ?>;
            
            var Model = $('#WhActs').serialize();
            
            $.ajax({
                url: Url,
                data: Model,
                
                type: 'POST',
                success: function(Res) {
                    var Res = JSON.parse(Res);
                    if (Res.result == 1) {
//                        console.log(Res);
                        if (!StateInsert) {
                            if (typeof(Acts.Refresh) != 'undefined')
                                Acts.Refresh();
                        }
                        if (StateInsert) {
                            if (typeof(WHReestr) != 'undefined') {
                                WHReestr.Docm_id = Res.id;
                                $('#ActsGrid').jqxGrid('updatebounddata');
                                window.open(<?php echo json_encode(Yii::app()->createUrl('WHActs/View'))?> + '&docm_id=' + Res.id);
                            }
                            if ($('#GridDocuments').length>0)
                                $('#GridDocuments').jqxGrid('updatebounddata');
                            if ($('#CostCalcDocumentsGrid').length>0)
                                $('#CostCalcDocumentsGrid').jqxGrid('updatebounddata');
                            
                        }
                        if ($('#WHDocumentsDialog').length>0)
                            $('#WHDocumentsDialog').jqxWindow('close');
                        if ($('#CostCalculationsDialog').length>0)
                            $('#CostCalculationsDialog').jqxWindow('close');
                        if ($('#RepairsDialog').length>0)
                            $('#RepairsDialog').jqxWindow('close');
                    }
                    else {
                        if ($('#WHDocumentsDialog').length>0)
                            $('#BodyWHDocumentsDialog').html(Res.html);
                        if ($('#CostCalculationsDialog').length>0)
                            $('#BodyCostCalculationsDialog').html(Res.html);
                        if ($('#RepairsDialog').length>0)
                            $('#BodyRepairsDialog').html(Res.html);
                    };
                },
                error: function(Res) {
                    Aliton.ShowErrorMessage(Aliton.Message['ERROR_EDIT'], Res.responseText);
                }
            });
        });
        
        if (Acts2.Note != null) $('#edNoteEdit').val(Acts2.Note);
        if (Acts2.NotePayment != null) $('#edNotePayment').val(Acts2.NotePayment);
        if (Acts2.WorkList != null) $('#edWorkListEdit').val(Acts2.WorkList);
        if (Acts2.Dckn_id != null) $('#edDcknNameEdit').val(Acts2.Dckn_id);
        if (Acts2.Cstm_id != null) $('#edCstmNameEdit').val(Acts2.Cstm_id);
        if (Acts2.Pmtp_id != null) {
            $('#edPaymentTypeEdit').val(Acts2.Pmtp_id);
        } else {
//            $("#edPaymentTypeEdit").jqxComboBox({selectedIndex: 0 });
        }    
        if (Acts2.Wrtp_id != null) $('#edWorkTypeEdit').val(Acts2.Wrtp_id);
        if (Acts2.Jbtp_id != null) $('#edJobTypeEdit').val(Acts2.Jbtp_id);
        if (Acts2.Jrdc_id != null) $('#edJuridicalEdit').val(Acts2.Jrdc_id);
        if (Acts2.Dmnd_empl_id != null) $('#edMasterEdit').val(Acts2.Dmnd_empl_id);
        
    });
</script>

<?php 
    $form=$this->beginWidget('CActiveForm', array(
        'id'=>'WhActs',
        'htmlOptions'=>array(
            'class'=>'form-inline'
        ),
    )); 
?>

<input type="hidden" name="WhActs[docm_id]" value="<?php echo $model->docm_id; ?>"/>
<input type="hidden" name="WhActs[calc_id]" value="<?php echo $model->calc_id; ?>"/>
<input type="hidden" name="WhActs[repr_id]" value="<?php echo $model->repr_id; ?>"/>

<div class="al-data-nb">
    <div class="al-row-column">
        <div class="al-row">
            <div class="al-data">
                <!--<div class="al-row-label"><b>Объект</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Адрес</div>
                    <div class="al-row-column"><div id="edAddressEdit" name="WhActs[objc_id]"></div><?php echo $form->error($model, 'objc_id'); ?></div>
                </div>
                <div style="clear: both"></div>
                <div style="margin-top: 4px;">
                    <div class="row-column">Клиент</div>
                    <div class="row-column"><input readonly id="edClientEdit" /></div>
                    <div class="row-column">Тариф</div>
                    <div class="row-column"><div id="edServiceEdit" name="WhActs[cntr_id]"></div><?php echo $form->error($model, 'cntr_id'); ?></div>
                </div>
                
            </div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row">
            <div class="al-data">
                <!--<div class="al-row-label"><b>Документ</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Тип</div>
                    <div class="al-row-column"><div id="edDcknNameEdit" name="WhActs[dckn_id]"></div><?php echo $form->error($model, 'dckn_id'); ?></div>
                    <div class="al-row-column"><div id="edSignedYnEdit" name="WhActs[signed_yn]">Подписан</div></div>
                    <div class="al-row-column"><div id="edCstmNameEdit" name="WhActs[cstm_id]"></div><?php echo $form->error($model, 'cstm_id'); ?></div>
                </div>
                <div class="al-row">
                    <div class="al-row-label">Примечание</div>
                    <div class="al-row"><textarea id="edNoteEdit" name="WhActs[note]"></textarea><?php echo $form->error($model, 'note'); ?></div>
                </div>
            </div>
            <div style="clear: both"></div>
        </div>
    </div>
    <div class="al-row-column">
        <div class="al-row">
            <div class="al-data" style="width: 298px; height: 200px;">
                <!--<div class="al-row-label"><b>Оплата</b></div>-->
                <div class="al-row">
                    <div class="al-row-column">Сумма по акту</div>
                    <div class="al-row-column"><div id="edSumEdit" name="WhActs[sum]"></div><?php echo $form->error($model, 'sum'); ?></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Форма оплаты</div>
                    <div class="al-row-column"><div id="edPaymentTypeEdit" name="WhActs[pmtp_id]"></div><?php echo $form->error($model, 'pmtp_id'); ?></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Счет</div>
                    <div class="al-row-column"><input id="edBillEdit" name="WhActs[bill]" /><?php echo $form->error($model, 'bill'); ?></div>
                    <div style="clear: both"></div>
                </div>
                <div class="al-row">
                    <div class="al-row-column">Дата оплаты</div>
                    <div class="al-row-column"><div id="edDatePayEdit" name="WhActs[date_payment]"></div><?php echo $form->error($model, 'date_payment'); ?></div>
                    <div style="clear: both"></div>
                </div>
               <div class="al-row">
                    <div class="al-row-label">Примечание</div>
                    <div class="al-row"><textarea id="edNotePaymentEdit" name="WhActs[note_payment]"></textarea><?php echo $form->error($model, 'note_payment'); ?></div>
                    <div style="clear: both"></div>
                </div> 
            </div>
            <div style="clear: both"></div>
        </div>
        <div style="clear: both"></div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-data-nb" style="width: 920px;">
    <div class="al-data">
        <!--<div class="al-row-label"><b>Выполненные работы</b></div>-->
        <div class="al-row">
            <div class="al-row-column">Дата выпонения работ</div>
            <div class="al-row-column"><div id="edDateEdit" name="WhActs[date]"></div><?php echo $form->error($model, 'date'); ?></div>
            <div class="al-row-column">Тип работ</div>
            <div class="al-row-column"><div id="edWorkTypeEdit" name="WhActs[wrtp_id]"></div><?php echo $form->error($model, 'wrtp_id'); ?></div>
            <div class="al-row-column">Вид работ</div>
            <div class="al-row-column"><div id="edJobTypeEdit" name="WhActs[jbtp_id]"></div><?php echo $form->error($model, 'jbtp_id'); ?></div>
            <div style="clear: both"></div>
        </div>
        <div class="al-row-label">Перечень работ</div>
        <div class="al-row"><textarea id="edWorkListEdit" name="WhActs[work_list]"></textarea><?php echo $form->error($model, 'work_list'); ?></div>
        <div class="al-row">
            <div class="al-row-column">Юр. лицо</div>
            <div class="al-row-column"><div id="edJuridicalEdit" name="WhActs[jrdc_id]"></div><?php echo $form->error($model, 'jrdc_id'); ?></div>
            <div class="al-row-column">Исполнитель</div>
            <div class="al-row-column"><div id="edMasterEdit" name="WhActs[dmnd_empl_id]"></div><?php echo $form->error($model, 'dmnd_empl_id'); ?></div>
        </div>
    </div>
</div>
<div style="clear: both"></div>
<div class="al-data-nb" style="width: 100%; height: 38px;">
    <div class="al-row">
        <div class="al-row-column"><input type="button" id="btnSave" value="Сохранить"/></div>
        <div class="al-row-column" style="float: right; margin-right: 20px;"><input type="button" id="btnCancel" value="Отмена"/></div>
        <div style="clear: both"></div>
    </div>
</div>

<?php $this->endWidget(); ?>