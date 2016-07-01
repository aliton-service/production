<script type="text/javascript">
        
        $(document).ready(function ()
        {
            var url = '<?php echo Yii::app()->createUrl('AjaxData/Data', array(
                    'ModelName' => 'AddressList',
                    'Virtual' => 'false',
                )) ?>';
                        
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'Object_id' },
                    { name: 'Addr' }
                ],
                url: url,
                async: false
            };
            
            var dataAdapter = new $.jqx.dataAdapter(source);
                
            $("#jqxComboBoxAddr").jqxComboBox({ placeHolder: 'OLOLOL', selectedIndex: 0, source: dataAdapter, displayMember: "Addr", valueMember: "Object_id", width: 350, height: 25});
            //$("#jqxComboBoxAddr").jqxComboBox('val', 12950);
            $("#jqxComboBoxAddr").on('bindingComplete', function (event) {
                console.log('!!!');
            });
            
            
                    //console.log($("#jqxComboBoxAddr").jqxComboBox('getItemByValue', "5843'"));
            
            var url = '<?php echo Yii::app()->createUrl('AjaxData/Data', array(
                    'ModelName' => 'Equips',
                    'Virtual' => 'false',
                )) ?>';
                        
            var source =
            {
                datatype: "json",
                datafields: [
                    { name: 'Equip_id' },
                    { name: 'EquipName' }
                ],
                url: url,
                async: true,
            };
            
            var dataAdapter = new $.jqx.dataAdapter(source);
                
            $("#jqxComboBoxEquip").jqxComboBox({ selectedIndex: 12950, source: dataAdapter, displayMember: "EquipName", valueMember: "Equip_id", width: 350, height: 25});
            
            var url = '<?php echo Yii::app()->createUrl('AjaxData/Data', array(
                    'ModelName' => 'Repairs',
                    'Virtual' => 'false',
                )) ?>';
                        
            var source =
            {
                datatype: "json",
                datafields: [
					 { name: 'Repr_id'},
					 { name: 'Date', type: 'date'},
					 { name: 'Number' },
					 { name: 'Addr' },
					 { name: 'StatusName' }
                ],
                url: url,
                root: 'data',
                async: true,
            };
            
            var dataadapter = new $.jqx.dataAdapter(source);
            
            $("#jqxgrid").jqxGrid(
            {
                source: dataadapter,
                height: '100%',
                pageable: true,
                columnsresize: true,
                showfilterrow: true,
                filterable: true,
                columns: [
                        { text: 'Статус', filtertype: 'checkedlist', datafield: 'StatusName', width: 100 },
                        { text: 'Код', datafield: 'Repr_id', width: 100 },      
                        { text: 'Дата', datafield: 'Date', filtertype: 'range', cellsformat: 'dd.MM.yyyy', width: 200 },
                        { text: 'Номер', datafield: 'Number', width: 100 },
                        { text: 'Адрес', datafield: 'Addr', width: 180 },
                        
                  ]
            });
        });
</script>
<div style="float: left;">
    <div id='jqxComboBoxAddr' style="float: left">
        
    </div>
    <div id='jqxComboBoxEquip' style="float: left">
        
    </div>
</div>
<div style="clear: both;"></div>
<div style="width: 100%; height: 100%; float: left; margin-top: 6px;">
    <div style="float: left; width: 800px; height: 100%">
        <div id="jqxgrid"></div>
    </div>
</div>
 
<!--
<div id="jqxComboBoxAddr" style="float: left; width: 350px; height: 25px;" role="combobox" aria-autocomplete="both" aria-disabled="false" aria-owns="listBoxjqxWidget0db0c5fa" aria-haspopup="true" aria-multiline="false" class="jqx-combobox-state-normal jqx-combobox jqx-rc-all jqx-widget jqx-widget-content" aria-readonly="false" aria-activedescendant="listitem0innerListBoxjqxWidget0db0c5fa" aria-expanded="false">
    <div style="background-color: transparent; -webkit-appearance: none; outline: none; width:100%; height: 100%; padding: 0px; margin: 0px; border: 0px; position: relative;">
        <div id="dropdownlistWrapperjqxComboBoxAddr" style="padding: 0; margin: 0; border: none; background-color: transparent; float: left; width:100%; height: 100%; position: relative;">
            <div id="dropdownlistContentjqxComboBoxAddr" style="padding: 0px; margin: 0px; border-top-style: none; border-bottom-style: none; float: left; position: absolute; width: 331px; height: 25px; left: 0px; top: 0px;" class="jqx-combobox-content jqx-widget-content">
                <input autocomplete="off" style="box-sizing: border-box; margin: 0px; padding: 0px 3px; border: 0px; width: 100%; height: 25px;" type="textarea" class="jqx-combobox-input jqx-widget-content jqx-rc-all" placeholder="" value="1 Советская ул., д.6, корп. А, СПб, п. 0">
            </div>
            <div id="dropdownlistArrowjqxComboBoxAddr" role="button" style="padding: 0px; margin: 0px; border-width: 0px 0px 0px 1px; float: right; position: absolute; width: 19px; height: 25px; left: 332px;" class="jqx-combobox-arrow-normal jqx-fill-state-normal jqx-rc-r">
                <div class="jqx-icon-arrow-down jqx-icon"></div>
                    
            </div>
                
        </div>
            
    </div>
    <input type="hidden" value="12950">
</div>
-->


