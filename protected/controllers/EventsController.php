<?php

class EventsController extends Controller
{

    public $layout = '//layouts/column2';
    public $title = '';
    public $gridFilters = null;
    public $filterDefaultValues = null;

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'equipAnalog', 'clients', 'autoevents', 'ShowHide', 'Clients'),
                'roles' => array('ViewEvents'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create'),
                'roles' => array('CreateEvents'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update'),
                'roles' => array('UpdateEvents',),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array('DeleteEvents'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }


    public function actionCreate()
    {
        $model = new Events;
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['Events'])) {
            $model->attributes = $_POST['Events'];
            $model->EmplCreate = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->evnt_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_form', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionUpdate()
    {
        $model = new Events();

        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['evnt_id']))
            $model->getModelPk($_POST['evnt_id']);

        if (isset($_POST['Events'])) {
            $model->getModelPk($_POST['Events']['evnt_id']);
            $model->attributes = $_POST['Events'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->evnt_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_formEdit', array(
            'model' => $model,
        ), true);
        echo json_encode($ObjectResult);
    }

    public function actionDelete()
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );

        if (isset($_POST['evnt_id'])) {
            $model = new Events();
            $model->getModelPk($_POST['evnt_id']);
            $model->EmplDel = Yii::app()->user->Employee_id;
            $model->Delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->evnt_id;
            echo json_encode($ObjectResult);
            return;
        }
        echo json_encode($ObjectResult);
    }

    public function actionIndex()
    {
        $this->title = 'Графики';
        $this->gridFilters = '_filters';
        $this->filterDefaultValues = array(
            'Master' => '',
        );

        $this->render('index');
    }

    public function actionAutoEvents($objgr_id = false) {
        if($this->isAjax()) {
            $objgr_id || die('Не выбран объект');
            $this->renderPartial('autoevents',array('objgr_id'=>$objgr_id), false, true);
        } else {
            if(!$objgr_id) throw new CHttpException(404, 'Не выбран объект.');
            $this->render('autoevents',array('objgr_id'=>$objgr_id));
        }
    }

    public function actionShowHide() {
        if (isset($_POST['ObjectGr_id']) && isset($_POST['Evtp_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'HideOrShowObjectsGroup';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['ObjectGr_id'];
            $sp->Parameters[1]['Value'] = $_POST['Evtp_id'];
            $sp->CheckParam = true;
            $sp->Execute();
        }
    }

    public function actionClients() {
        $Query = new SQLQuery();
        $Query->setSelect(" Select
                                o.Form_id,
                                o.Fullname,
                                Case when o.sum_price > 7500 then 1 else 0 end VIP,
                                og.ObjectGr_id,
                                a.Addr,
                                Count(e.Evnt_id) as EventCount,
                                Sum(Case When e.evnt_id is not null and e.date_exec is null then 1 else 0 end) as NoExecEventCount
                            From Organizations_v o inner join ObjectsGroup og on (o.Form_id = og.PropForm_id and og.Deldate is null)
                                    inner join Addresses_v a on (og.address_id = a.address_id)
                                    left join Contracts_v c on (c.ObjectGr_id = og.ObjectGr_id and c.DocType_id = 4 and dbo.truncdate(GETDATE()) between c.ContrSDateStart and c.ContrSDateEnd)
                                    left join Events e on (og.ObjectGr_id = e.Objectgr_id and e.DelDate is Null
                                        :#EventNoExec 
                                        :#EventExec 
                                    )
                            Where o.Lph_id = 1
                                    and isnull(c.Servicetype_id, 0) <> 1
                                    and isnull(c.Servicetype_id, 0) <> 2
                                    and isnull(c.Servicetype_id, 0) <> 37
                                    and isnull(c.Servicetype_id, 0) <> 42
                                    and isnull(c.Servicetype_id, 0) <> 45
                                    :#Master 
                                    :#Vip 
                            Group by
                                    o.Form_id,
                                    o.FullName,
                                    o.sum_price,
                                    og.ObjectGr_id,
                                    a.Addr
                            Having (1 = 1)
                            Order by o.FullName, a.Addr");
        
        $Variables = array();
        if (isset($_GET['Variables']))
            $Variables = $_GET['Variables'];
        
        foreach ($Variables as $Key => $Value) {
            $Query->bindParam($Key, $Value);
        }
  
        $Result = $Query->QueryAll();
        $CountRow = count($Result);
        
        $Data = array();
        
        $Data[] = array(
            'TotalRows' => $CountRow,
            'Rows' => $Result,
        );
        echo json_encode($Data);
        
    }

}

