<?php

    
class ReportsController extends Controller
{
    public $layout='//layouts/reports';
    public $ReportName = '';
    
    public function filters()
    {
        return array(
                'accessControl', 
        );
    }
    
    public function accessRules()
    {
        return array(
            array('allow', 
                    'actions'=>array('ReportOpen'),
                    'users'=>array('*'),
            ),
        );
    }
    
    public function actionReportOpen($ReportName = '', $Ajax = false, $Render = true) {
        
        if ($ReportName == '') {
            $ResultHtml = 'Не выбран отчет.';
            $this->render('standart', array(
                'ResultHtml' => $ResultHtml,
            ));
            return;
        }
        else
            $ReportName = urldecode ($ReportName);
        
        $ResultHtml = '';
        if ($Render)  {
        
            require_once 'SSRSReport.php';
            define("REPORT", $ReportName);
            $Settings = parse_ini_file("/protected/config/app.config", 1);

            $RS = new SSRSReport(new Credentials($Settings["UID"], $Settings["PASWD"]),$Settings["SERVICE_URL"]);
            $ExecutionInfo = $RS->LoadReport2(REPORT, NULL);

            $RS->SetExecutionParameters2($this->SetParameters());

            $renderAsHTML = new RenderAsHTML();

            $ResultHtml = $RS->Render2($renderAsHTML,
                             PageCountModeEnum::$Estimate,
                             $Extension,
                             $MimeType,
                             $Encoding,
                             $Warnings,
                             $StreamIds);
       
        }
        
        if (!$Ajax)
            $this->render($this->GetViewForReport($ReportName), array(
                'ResultHtml' => $ResultHtml,
                'ReportName' => $ReportName,
                'Ajax' => $Ajax,
            ));
        else
            $this->renderPartial($this->GetViewForReport($ReportName), array(
                'ResultHtml' => $ResultHtml,
                'ReportName' => $ReportName,
                'Ajax' => $Ajax,
            ));
    }
    
    public function SetParameters() {
        $Parameters = array();
        $i = 0;
        if (isset($_POST['Parameters'])) {
            foreach ($_POST['Parameters'] as $key => $value) {
                if ($value == '') $value = null;
                $Parameters[$i] = new ParameterValue();
                $Parameters[$i]->Name = $key;
                $Parameters[$i]->Value = $value;
                $i++;
            }
        }
        return $Parameters;
    }
    
    public function GetViewForReport($ReportName = '') {
        if ($ReportName == '/Склад/Выданное оборудование (детальный)')
            return 'wh_report1';
        else if ($ReportName == '/Заявки/Отчет по заявкам Call-центра')
            return 'demand_report1';
        else if ($ReportName == '/Заявки/Чужие и удаленные заявки СЦ')
            return 'demand_report2';
        else
            return 'standart';
    }
    
    public function UpLoadFile($FileName='', $File = '', $FileType = '') {
        ob_clean();
            
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . $FileName . '.' . $FileType);
        echo $File;
    }
    
    public function actionReportExportXLS($ReportName = '') {
        if ($ReportName != '') {
            
            require_once 'SSRSReport.php';
            
            define("REPORT", $ReportName);
            $Settings = parse_ini_file("/protected/config/app.config", 1);

            $RS = new SSRSReport(new Credentials($Settings["UID"], $Settings["PASWD"]),$Settings["SERVICE_URL"]);
            $ExecutionInfo = $RS->LoadReport2(REPORT, NULL);
            $RS->SetExecutionParameters2($this->SetParameters());
            $renderAsEXCEL = new RenderAsEXCEL();
            
            $ResultExcel = $RS->Render2($renderAsEXCEL,
                                 PageCountModeEnum::$Estimate,
                                 $Extension,
                                 $MimeType,
                                 $Encoding,
                                 $Warnings,
                                 $StreamIds);
            
            $this->UpLoadFile($ReportName, $ResultExcel, '.xls');
            
        }
    }
    
    public function actionReportExportPDF($ReportName = '') {
        if ($ReportName != '') {
            
            require_once 'SSRSReport.php';
            
            define("REPORT", $ReportName);
            $Settings = parse_ini_file("/protected/config/app.config", 1);

            $RS = new SSRSReport(new Credentials($Settings["UID"], $Settings["PASWD"]),$Settings["SERVICE_URL"]);
            $ExecutionInfo = $RS->LoadReport2(REPORT, NULL);
            $RS->SetExecutionParameters2($this->SetParameters());
            $renderAsPDF = new RenderAsPDF();
            
            $ResultPDF = $RS->Render2($renderAsPDF,
                                 PageCountModeEnum::$Estimate,
                                 $Extension,
                                 $MimeType,
                                 $Encoding,
                                 $Warnings,
                                 $StreamIds);
            
            $this->UpLoadFile($ReportName, $ResultPDF, '.pdf');
        }
    }
}

