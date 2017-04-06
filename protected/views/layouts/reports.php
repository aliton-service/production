<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="/js/jqwidgets/styles/jqx.base.css" type="text/css" />
	<meta name="language" content="en">
        <?php 
            if (!Yii::app()->user->isGuest) {

                $UserSettings = new UserSettings();
                $R =  $UserSettings->Find(array(), array(
                    's.Empl_id = ' . Yii::app()->user->Employee_id,
                ));


                if (count($R) > 0) {
                    if ($R[0]['Theme'] == 'fresh') {
                        echo '<link rel="stylesheet" href="/js/jqwidgets/styles/jqx.fresh.css" type="text/css" />';
                        echo '<meta id="ID_THEME" value="' . $R[0]['Theme'] .'">' ;
                    }else if ($R[0]['Theme'] == 'fresh2') {
                        echo '<link rel="stylesheet" href="/js/jqwidgets/styles/jqx.fresh2.css" type="text/css" />';
                        echo '<meta id="ID_THEME" value="' . $R[0]['Theme'] .'">' ;
                    }
                    else {
                        echo '<meta id="ID_THEME" style="display: \'none\'"></div>';
                    }

                }
            }
        
    
        ?>
        
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
                $('#edView').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 240}));
                $('#edExportExcel').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                $('#edExportPDF').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                $('#edSiteInex').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                $('#edPrint').jqxButton($.extend(true, {}, ButtonDefaultSettings, {width: 160}));
                $('#edPrint').on('click', function() {
                    window.print();
                });
                
                
                $('#edView').on('click', function() {
                    var Data = null;
                    
                    if ($('#Parameters').length>0)
                        Data = $('#Parameters').serialize();
                    
                    window.open(<?php echo json_encode(Yii::app()->createUrl('Reports/ReportOpenNewWindow')); ?> + '&ReportName=' + ReportName + '&Ajax=' + true);
                });
                
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
                    FileName = <?php if (isset($_GET['FileName'])) echo json_encode('&FileName=' . $_GET['FileName']); else echo json_encode('') ?>;
                    
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
                    var FileName = '';
                    Params = <?php if (isset($_GET['Parameters'])) echo json_encode($_GET['Parameters']); else echo json_encode(''); ?>;
                    FileName = <?php if (isset($_GET['FileName'])) echo json_encode('&FileName=' . $_GET['FileName']); else echo json_encode('') ?>;
                    if ($('#Parameters').length>0)
                        Data = $('#Parameters').serialize();
                    
                    for (var key in Params) {
                        Str += '&Parameters[' + key + ']=' + Params[key];
                    }
                    
                    location.href = <?php echo json_encode(Yii::app()->createUrl('Reports/ReportExportPDF')); ?> + '&ReportName=' + ReportName + '&' + Data + Str + FileName;
                    
                });
                
                $('#edSiteInex').on('click', function() {
                    location.href = <?php echo json_encode(Yii::app()->createUrl('Site/Index')); ?>;
                });
                
            });
        </script>
    </head>

    <body>
        <div id="panel_controls" class="head_report" style="float: left; width: 100%; min-width: 1024px">
            <div style="float: left; overflow: auto;">
                <div style="float: left">
                    <input type="button" id='edRefresh' value='Просмотр отчета'/>
                </div>
                
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edExportExcel' value='Экспорт EXCEL'/>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edExportPDF' value='Экспорт PDF'/>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edSiteInex' value='На главную'/>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edView' value='Просмотр отчета в новой вкладке'/>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <input type="button" id='edPrint' value='Печать'/>
                </div>
                <div style="clear: both"></div>
                <div style="float: left">
                    
                    <a href="http://esrvsql01/ReportServer/Pages/ReportViewer.aspx?<?php echo urlencode($this->ReportName)?>&rs:Command=Render">Если отчет отображается некорректно, нажмите здесь.</a>
                </div>
            </div>
        </div>
        <div id="content_report" class="content" style="float: left; width: 100%;margin-top: 10px;"><?php echo $content ?></div>
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
