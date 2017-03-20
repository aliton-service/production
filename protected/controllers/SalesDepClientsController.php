<?php

class SalesDepClientsController extends Controller
{
    public $layout = '//layouts/column2';
    public $title = '';
    public $gridFilters;

    public function filters()
    {
        return array(
                'accessControl', // perform access control for CRUD operations
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',
                    'actions'=>array('Diary', 'Statistics', 'History'),
                    'roles'=>array('DiarySalesDepClients'),
            ),
            array('allow',
                    'actions'=>array('ViewDemands'),
                    'roles'=>array('ViewDemands'),
            ),
            array('allow',
                    'actions'=>array('index', 'StatisticsInfo'),
                    'roles'=>array('ViewSalesDepClients'),
            ),
            array('allow',
                    'actions'=>array('SelectObjects'),
                    'roles'=>array('SelectObjects'),
            ),
            array('allow',
                    'actions'=>array('SetSalesManager'),
                    'roles'=>array('SetSalesManager'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionStatisticsInfo() {
        $Statistics = array(
            'Statistics1' => 0,
            'Statistics2' => 0,
            'Statistics3' => 0,
            'Statistics4' => 0,
        );
        
        $Query = new SQLQuery();
        $Query->setSelect("\nSelect
                                sum(case when cs.StatusName = 'Актуализация' then 1 else 0 end) as Info1,
                                sum(case when cs.StatusName = 'Сотрудничаем' then 1 else 0 end) as Info2,
                                sum(case when cs.StatusName = 'В процессе переговоров' then 1 else 0 end) as Info3,
                                sum(case when cs.StatusName = 'Отказ' then 1 else 0 end) as Info4");
        $Query->setWhere("\nFrom PropForms p left join ClientStatus cs on (p.Status_id = cs.Status_id)");
        $Result = $Query->QueryRow();
        $Statistics['Statistics1'] = $Result['Info1'];
        $Statistics['Statistics2'] = $Result['Info2'];
        $Statistics['Statistics3'] = $Result['Info3'];
        $Statistics['Statistics4'] = $Result['Info4'];
        
        echo json_encode($Statistics);
    }
    
    public function actionIndex()
    {
        $this->title = 'Клиенты - реестр';
        $this->gridFilters = '_filters';
        $this->render('index');
    }
    
    public function actionHistory()
    {
        if (isset($_GET['Form_id'])) {
            $History = new SQLQuery();
            $History->setSelect("\nSelect
                                        h.*");
            $History->setFrom("\nFrom HistoryClients_v h");
            $History->setWhere("\nWhere h.Form_id = " . $_GET['Form_id']);
            $History->setOrder("\nOrder by h.Date");
            $History = $History->QueryAll();
            
            $this->renderPartial('history', array(
                'Form_id' => $_GET['Form_id'],
                'History' => $History,
            ));
        }
    }
    
    public function actionSetSalesManager() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Params'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'SET_SALES_MANAGER';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Params']['Form_id'];
            $sp->Parameters[1]['Value'] = $_POST['Params']['Empl_id'];
            $sp->Parameters[2]['Value'] = $_POST['Params']['Date'];
            $sp->Parameters[3]['Value'] = $_POST['Params']['Flag'];
            $sp->Parameters[4]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    public function actionSelectObjects() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Form_id']))
            $ObjectResult['html'] = $this->renderPartial('obj_select', array(
                    'Form_id' => $_POST['Form_id'],
                ), true);
        
        echo json_encode($ObjectResult);
    }
    
    public function actionAttachObjects() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['Params'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'ATTACH_Object';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Params']['Form_id'];
            $sp->Parameters[1]['Value'] = $_POST['Params']['ObjectGr_id'];
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = 0;
            echo json_encode($ObjectResult);
            return;
        }

        echo json_encode($ObjectResult);
    }
    
    public function actionViewDemands()
    {
        $this->title = 'Заявки клиента';
        if (isset($_GET['FullName']))
            $this->title = $this->title . ' ' . $_GET['FullName'];
        $this->gridFilters = '_filters2';
        
        
        // Последнее действие по клиенту
        $Query = new SQLQuery();
        $Query->setSelect("\nSelect
                                p.LastAction_id,
                                er.[Date],
                                o.ActionOperationName,
                                ar.ActionResultName,
                                er.NextAction,
                                er.NextDate,
                                er.OtherName,
                                er.Report");
        $Query->setFrom("\nFrom PropForms p left join ExecutorReports er on (p.LastAction_id = er.Exrp_id)
                                left join ActionOperations o on (er.ActionOperation_id = o.Operation_id)
                                left join ActionResults ar on (er.ActionResult_id = ar.Result_id)");
        $Query->setWhere("\nWhere p.Form_id = " . $_GET['Form_id']);
        $LastContact = $Query->QueryRow();
        
        $this->render('view_demands', array(
            'Form_id' => $_GET['Form_id'],
            'FullName' => $_GET['FullName'],
            'LastContact' => $LastContact,
        ));
    }
    
    public function actionDiary(){
        $this->title = 'Ежедневник';
        $this->gridFilters = '_filters3';
        $this->render('diary', array());
    }
    
    
    public function actionStatistics() {
        $Statistics = array(
            'Statistics1' => 0,
            'Statistics2' => 0,
            'Statistics3' => 0,
            'Statistics4' => 0,
        );
        
        $Query = new SQLQuery();
        $Query->setSelect("\nSelect
                                SUM(CASE WHEN d.StatusOP = 3 Then 1 ELSE 0 END) as StatisticsInfo1,
                                SUM(CASE WHEN d.StatusOP = 2 Then 1 ELSE 0 END) as StatisticsInfo2,
                                SUM(CASE WHEN d.StatusOP = 1 Then 1 ELSE 0 END) as StatisticsInfo3,
                                SUM(CASE WHEN d.StatusOP = 4 Then 1 ELSE 0 END) as StatisticsInfo4");
        $Query->setWhere("\nFrom PropForms p inner join ExecutorReports er on (p.LastAction_id = er.Exrp_id)
                                inner join FullDemands d on (er.Demand_id = d.Demand_id)");
        $Result = $Query->QueryRow();
        $Statistics['Statistics1'] = $Result['StatisticsInfo1'];
        $Statistics['Statistics2'] = $Result['StatisticsInfo2'];
        $Statistics['Statistics3'] = $Result['StatisticsInfo3'];
        $Statistics['Statistics4'] = $Result['StatisticsInfo4'];
        
        echo json_encode($Statistics);
    }
}
