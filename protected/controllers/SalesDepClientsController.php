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
                    'actions'=>array('index, StatisticsInfo'),
                    'roles'=>array('ViewSalesDepClients'),
            ),
            array('allow',
                    'actions'=>array('SelectObjects'),
                    'roles'=>array('SelectObjects'),
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
}
