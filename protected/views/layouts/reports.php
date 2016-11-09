<html>
    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">
        
        <?php Yii::app()->clientScript->registerPackage('jquery_js'); ?>
        <?php Yii::app()->clientScript->registerPackage('widgets'); ?>
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body>
        <div class="head_report" style="float: left; width: 100%; min-width: 1024px">
            <div style="float: left; width: 300px; overflow: auto; min-height: 21px;"></div>
            <div style="float: left; width: 900px; overflow: auto;">
                <div style="float: left">
                    <?php 
                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                            'id' => 'Refresh',
                            'Width' => 144,
                            'Height' => 30,
                            'Text' => 'Просмотр отчета',
                            'Type' => 'AjaxForm',
                            'Href' => Yii::app()->createUrl('Reports/ReportOpen', array(
                                'ReportName' => urlencode($this->ReportName),
                                'Ajax' => true)
                             ),
                            'FormName' => 'Parameters',
                            'OnAfterClick' => '$("#res_cont").html("Загрузка...");',
                            'OnAfterAjaxSuccess' => '$("#res_cont").html(Res);',
                        ));
                        
                    ?>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <?php 
                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                            'id' => 'ExportEXCEL',
                            'Width' => 124,
                            'Height' => 30,
                            'Text' => 'Экспорт EXCEL',
                            'Type' => 'Form',
                            'FormName' => 'Parameters',
                            'Href' => Yii::app()->createUrl('Reports/ReportExportXLS', array('ReportName' => $this->ReportName)),
                        ));
                    ?>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <?php 
                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                            'id' => 'ExportPDF',
                            'Width' => 124,
                            'Height' => 30,
                            'Text' => 'Экспорт PDF',
                            'Type' => 'Form',
                            'FormName' => 'Parameters',
                            'Href' => Yii::app()->createUrl('Reports/ReportExportPDF', array('ReportName' => $this->ReportName)),
                        ));
                    ?>
                </div>
                <div style="float: left; margin-left: 6px;">
                    <?php 
                        $this->widget('application.extensions.alitonwidgets.button.albutton', array(
                            'id' => 'Aliton',
                            'Width' => 124,
                            'Height' => 30,
                            'Text' => 'На главную',
                            'Type' => 'Window',
                            'Href' => Yii::app()->createUrl('site/index'),
                        ));
                    ?>
                </div>
                <div style="clear: both"></div>
                <div style="float: left">
                    
                    <a href="http://esrvsql01/ReportServer/Pages/ReportViewer.aspx?<?php echo urlencode($this->ReportName)?>&rs:Command=Render">Если отчет отображается некорректно, нажмите здесь.</a>
                </div>
            </div>
        </div>
        <div id="content_report" class="content" style="float: left; width: 100%; overflow: auto; margin-top: 10px;"><?php echo $content ?></div>
    </body>
</html>
