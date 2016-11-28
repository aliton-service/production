<script type="text/javascript">
    $(document).ready(function () {
        /* Текущая выбранная строка данных */
        var CurrentRowData;
        
        var initWidgets = function (tab) {
            switch (tab) {
                case 0:
                    break;
            }
        };
        
        $('#jqxTabs').jqxTabs({ width: 'calc(100% - 2px)', height: 'calc(100% - 2px)',  initTabContent: initWidgets });
        
    });
</script>
<div class="al-row" style="height: calc(100% - 40px)">
    <div id='jqxTabs' style="">
        <ul>
            <li style="margin-left: 20px;">
                <div style="height: 15px; margin-top: 3px;">
                    <div style="vertical-align: middle; text-align: center; float: left; margin-left: 4px">
                        Сметы
                    </div>
                </div>
            </li>
            <li>
                <div style="height: 15px; margin-top: 3px;">
                    <div style="vertical-align: middle; text-align: center; float: left; margin-left: 4px">
                        Документы
                    </div>
                </div>
            </li>
        </ul>
        <div style="overflow: auto; height: calc(100% - 2px); background-color: #F2F2F2;">
            <div style="overflow: auto; padding: 10px;">
                
            </div>
        </div>
        <div style="overflow: auto; height: calc(100% - 2px); background-color: #F2F2F2;">
            <div style="overflow: auto; padding: 10px;"></div>
        </div>
    </div>
</div>

