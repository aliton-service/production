<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
        
        
        <?php Yii::app()->clientScript->registerPackage('jquery_js'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets'); ?>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <style>
            @media print {
                #panel_controls {
                    display: none;
                }
            }
            
            .al-data {
                float: left;
                border: 1px solid #e0e0e0;
                padding: 10px;
                width: calc(100% - 22px);
            }

            .al-data-nb {
                float: left;
                overflow: auto;
                width: 100%
            }
            .al-row {
                width: 100%;
                padding: 4px 0px 4px 0px;
            }
            .al-row-label {
                width: 100%;
                padding: 0px;
            }
            .al-row-column {
                float: left;
                margin-left: 6px;
            }

            .al-row-column:first-child {
                margin-left: 0px;
            }

            .al-data, .al-data-nb, .al-row, .al-row-column {
                font: 14px 'Segoe UI', Helvetica, 'Droid Sans', Tahoma, Geneva, sans-serif;
            }

            .al-data .al-row:first-child {
                padding-top: 0px;
            }

            .al-data .al-row:last-child {
                padding-bottom: 0px;
            }
            
        </style>
        <script>
            $(document).ready(function() {
                var ReportName =  <?php echo json_encode(urlencode($this->ReportName)); ?>;
                $('#edRefresh').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                $('#edExportExcel').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                $('#edExportPDF').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                $('#edSiteInex').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                
                $('#edRefresh').on('click', function() {
                    var Data = null;
                    
                    if ($('#Parameters').length>0)
                        Data = $('#Parameters').serialize();
                    
                    $.ajax({
                        
                        url: <?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpen')); ?> + '&ReportName=' + ReportName + '&Ajax=' + true,
                        type: 'GET',
                        data: Data,
                        success: function(Res) {
                            if ($("#res_cont").length>0)
                                $("#res_cont").html(Res);
                        },
                        error: function(Res) {
                            Aliton.ShowErrorMessage(Aliton.Message['ERROR_LOAD_PAGE'], Res.responseText);
                        }
                    });
                    
                });
                
                $('#edExportExcel').on('click', function() {
                    var Data = null;
                    var Params = {};
                    var Str = '';
                    var FileName = '';
                    Params = <?php if (isset($_GET['Parameters'])) echo json_encode($_GET['Parameters']); else echo json_encode(''); ?>;
                    FileName = <?php if (isset($_GET['FileName'])) echo json_encode('&FileName=' . urlencode (json_decode ($_GET['FileName']))); else echo json_encode('') ?>;
                    
                    if ($('#Parameters').length>0)
                        Data = $('#Parameters').serialize();
                    
                    for (var key in Params) {
                        Str += '&Parameters[' + key + ']=' + Params[key];
                    }
                    
                    //window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportExportXLS')); ?> + '&ReportName=' + ReportName + '&' + Data + Str + FileName);
                    location.href =<?php echo json_encode(Yii::app()->createUrl('Reports/ReportExportXLS')); ?> + '&ReportName=' + ReportName + '&' + Data + Str + FileName;
                });
                
                $('#edExportPDF').on('click', function() {
                    var Data = null;
                    var Params = {};
                    var Str = '';
                    Params = <?php if (isset($_GET['Parameters'])) echo json_encode($_GET['Parameters']); else echo json_encode(''); ?>;
                    if ($('#Parameters').length>0)
                        Data = $('#Parameters').serialize();
                    
                    for (var key in Params) {
                        Str += '&Parameters[' + key + ']=' + Params[key];
                    }
                    
                    window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportExportPDF')); ?> + '&ReportName=' + ReportName + '&' + Data + Str);
                    
                });
                
                $('#edSiteInex').on('click', function() {
                    location.href = <?php echo json_encode(Yii::app()->createUrl('Site/Index')); ?>;
                });
                
            });
        </script>
    </head>

    <body>
        <div id="panel_controls" class="head_report" style="float: left; width: 100%; min-width: 1024px">
            <div style="float: left; width: 300px; overflow: auto; min-height: 21px;"></div>
            <div style="float: left; width: 900px; overflow: auto;">
                <div style="float: left">
                    <input type="button" id='edRefresh' value='Просмотр отчета'/>
                    <?php 
//                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
//                            'id' => 'Refresh',
//                            'Width' => 144,
//                            'Height' => 30,
//                            'Text' => 'Просмотр отчета',
//                            'Type' => 'AjaxForm',
//                            'Href' => Yii::app()->createUrl('Reports/ReportOpen', array(
//                                'ReportName' => urlencode($this->ReportName),
//                                'Ajax' => true)
//                             ),
//                            'FormName' => 'Parameters',
//                            'OnAfterClick' => '$("#res_cont").html("Загрузка...");',
//                            'OnAfterAjaxSuccess' => '$("#res_cont").html(Res);',
//                        ));
                        
                    ?>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edExportExcel' value='Экспорт EXCEL'/>
                    <?php
                        
//                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
//                            'id' => 'ExportEXCEL',
//                            'Width' => 124,
//                            'Height' => 30,
//                            'Text' => 'Экспорт EXCEL',
//                            'Type' => 'Form',
//                            'FormName' => 'Parameters',
//                            'Href' => Yii::app()->createUrl('Reports/ReportExportXLS', array('ReportName' => $this->ReportName)),
//                        ));
                    ?>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edExportPDF' value='Экспорт PDF'/>
                    <?php 
//                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
//                            'id' => 'ExportPDF',
//                            'Width' => 124,
//                            'Height' => 30,
//                            'Text' => 'Экспорт PDF',
//                            'Type' => 'Form',
//                            'FormName' => 'Parameters',
//                            'Href' => Yii::app()->createUrl('Reports/ReportExportPDF', array('ReportName' => $this->ReportName)),
//                        ));
                    ?>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edSiteInex' value='На главную'/>
                    <?php 
//                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
//                            'id' => 'Aliton',
//                            'Width' => 124,
//                            'Height' => 30,
//                            'Text' => 'На главную',
//                            'Type' => 'Window',
//                            'Href' => Yii::app()->createUrl('site/index'),
//                        ));
                    ?>
                </div>
                <div style="clear: both"></div>
                <div style="float: left">
                    
                    <a href="http://esrvsql01/ReportServer/Pages/ReportViewer.aspx?<?php echo urlencode($this->ReportName)?>&rs:Command=Render">Если отчет отображается некорректно, нажмите здесь.</a>
                </div>
            </div>
        </div>
        <div id="content_report" class="content" style="float: left; width: 100%; overflow: auto; margin-top: 10px;"><?php echo $content ?></div>
        <div id="MainDialog" style="display: none;">
            <div id="MainDialogHeader">
                <span id="MainDialogHeaderText">Вставка\Редактирование записи</span>
            </div>
            <div style="padding: 10px;" id="DialogMainContent">
                <!-- <div style="" id="BodyMainDialog"></div> -->
                <textarea id="BodyMainDialog"></textarea>
                <div style="margin-top: 10px;"><input type="button" value="Закрыть" id='MainDialogBtnClose'/></div>
            </div>
        </div>
    </body>
</html>
