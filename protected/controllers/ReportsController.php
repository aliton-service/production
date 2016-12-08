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
        
        $ResultHtml = str_ireplace('<div style="HEIGHT:100%;WIDTH:100%;" class="ap">', '<div class="ap">', $ResultHtml);
        
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
        if (isset($_GET['Parameters'])) {
            foreach ($_GET['Parameters'] as $key => $value) {
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
        if ($ReportName == '/Склад/Приход на склад от поставщиков')
            return 'wh_report3';
        if ($ReportName == '/Склад/Приход на склад от поставщиков (детальный)')
            return 'wh_report3';
        if ($ReportName == '/Склад/Приход товара за период')
            return 'wh_report3';
        if ($ReportName == '/Склад/Расход товара за период')
            return 'wh_report4';
        if ($ReportName == '/Склад/Выданное оборудование (детальный)')
            return 'wh_report1';
        if ($ReportName == '/Склад/Оборудование числящееся за мастерами')
            return 'wh_report2';
        else if ($ReportName == '/Заявки/Отчет по заявкам Call-центра')
            return 'demand_report1';
        else if ($ReportName == '/Заявки/Чужие и удаленные заявки СЦ')
            return 'demand_report2';
        else if ($ReportName == '/Кадры/Сотрудники')
            return 'employee1';
        else if ($ReportName == '/Кадры/Сотрудники (детальный)')
            return 'employee1';
        else if ($ReportName == '/Кадры/Дни рождения')
            return 'employee2';
        else if ($ReportName == '/Объекты/Объекты по мастерам')
            return 'objectmaster';
        else if ($ReportName == '/Объекты/Объекты по тарифам')
            return 'objectServiceType';
        else if ($ReportName == '/Объекты/Объекты по тарифам (Оборудование)')
            return 'objectServiceTypeEquips';
        else if ($ReportName == '/Объекты/Ушедшие клиенты')
            return 'departedCustomers';
        else if ($ReportName == '/Объекты/Контактные лица')
            return 'contacts';
        else if ($ReportName == '/Объекты/Повышение расценок')
            return 'pricesIncrease';
        else if ($ReportName == '/Заявки/Заявки по объектам')
            return 'demandsReportForm';
        else if ($ReportName == '/Заявки/Заявки по мастерам')
            return 'demandsReportFormMaster';
        else if ($ReportName == '/Заявки/Заявки (общий отчет)')
            return 'demandsReportFormList';
        else if ($ReportName == '/Заявки/Заявки (общий отчет) без хода работ')
            return 'demandsReportFormList';
        else if ($ReportName == '/Заявки/Нарушение сроков выполнения')
            return 'demandsReportFormBrokenDeadlines';
        else if ($ReportName == '/Заявки/Нарушение сроков выполнения (детальный)')
            return 'demandsReportForm';
        else if ($ReportName == '/Дебиторка/Причина долга')
            return 'debt';
        else if ($ReportName == '/Договора/Список договоров обслуживания')
            return 'contract1';
        else if ($ReportName == '/Объекты/Установленные системы')
            return 'objsystems';
        else if ($ReportName == '/Заявки/Заявки переданные не вовремя')
            return 'DemandsSubmittedTooLate';
        else if ($ReportName == '/Заявки/Отчет по модернизациям')
            return 'DemandsForUpgrades';
        else if ($ReportName == '/Заявки/Универсальный отчет')
            return 'DemandsUniversalReport';
        else if ($ReportName == '/Объекты/Оборудование на объектах')
            return 'objectequips';
        else if ($ReportName == '/Объекты/Оборудование на объектах (по оборудованию)')
            return 'objectequips';
        else if ($ReportName == '/Объекты/Объекты по организациям')
            return 'formobjects';
        else if ($ReportName == '/Контакты/Контакты')
            return 'contacts2';
        else if ($ReportName == '/Заявки на доставку/Заявки на доставку')
            return 'DeliveryDemands';
        else if ($ReportName == '/Заявки на доставку/Нарушение сроков выполнения')
            return 'DeliveryDemandsBrokenDeadlines';
        else if ($ReportName == '/Графики/Графики')
            return 'Events';
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
    
    public function actionUpLoadFileGrid() {
        if (isset($_POST['filename']) && isset($_POST['format']) && isset($_POST['content'])) {
            ob_clean();
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . $_POST['filename'] . '.' . $_POST['format']);
            echo $_POST['content'];
        }
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

