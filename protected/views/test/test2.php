<script>
    $(document).ready(function(){
        
        $("#chbTest1").jqxCheckBox($.extend(true, {}, CheckBoxDefaultSettings, { width: 160, height: 25 }));
//        $("#rbTest2").jqxRadioButton({ width: 250, height: 25, checked: true});
        $("#edTest3").jqxInput($.extend(true, {}, CheckBoxDefaultSettings, {width: '150px'}));
    });
</script>

<div style="margin-left: 50%; margin-top: 300px">
    <div id="chbTest1">Тест 1</div>
    <!--<div id="chbTest1" tabindex="0" class="jqx-widget jqx-checkbox" role="checkbox" aria-checked="false" aria-disabled="false" style="width: 160px; height: 25px; cursor: pointer; line-height: 25px;"><div class="jqx-checkbox-default jqx-fill-state-normal jqx-rc-all" style="margin-top: 5px;"><div style="width: 13px; height: 13px;"><span style="width: 13px; height: 13px; opacity: 0;"></span></div></div>Тест 1<div style="clear: both;"></div><input type="hidden" value="false"></div>-->

    <!--<div id="rbTest2">Тест 2</div>-->
    <!--<div id="rbTest2" role="radio" tabindex="0" class="jqx-widget jqx-radiobutton" aria-checked="true" aria-disabled="false" style="width: 250px; height: 25px; cursor: pointer; line-height: 25px;"><div class="jqx-fill-state-normal jqx-radiobutton-default" style="width: 13px; height: 13px; margin-top: 5px;"><div style="width: 13px; height: 13px;"><span style="width: 6.5px; height: 6.5px; opacity: 1;" class="jqx-fill-state-pressed jqx-radiobutton-check-checked"></span></div></div>Тест 2<div style="clear: both;"></div><input type="hidden" value="true"></div>-->
    <input type="text" id="edTest3" />
</div>

