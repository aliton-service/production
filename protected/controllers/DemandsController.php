<?php

class DemandsController extends Controller
{
    public $layout='//layouts/column2';
    public $defaultAction  = 'index';
    public $gridFilters = null;
    public $filterDefaultValues = null;
    
	public $title = 'Заявки';
	/**
	 * @return array action filters
	 */
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
                'actions' => array('index', 'view', 'SalesView', 'FindDemand', 'equipAnalog', 'tabGeneral', 'tabAdministration', 'DemandFilters','DemandExec','Tomaster','RepGeneral', 'Report', 'Message', 'UndoWorkedOut'),
                'roles' => array(
                    'ViewDemands',
                ),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create'),
                'roles' => array(
                    'CreateDemands',
                ),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'UpdateDetails'),
                'roles' => array(
                    'UpdateDemands',
                ),
            ),
       
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('WorkedOut'),
                'roles' => array(
                    'WorkedOut',
                ),

            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('Undo'),
                'roles' => array(
                    'UndoDemands',
                ),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array(
                    'DeleteDemands',
                ),

            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }
        
        public function actionTabGeneral(){
            $this->renderPartial('TabGeneral',array(), false, true);
        }
        
        public function actionTabAdministration(){
            if (isset($_GET['Demand_id']))
                $this->renderPartial('TabAdministration',array('Demand_id' => $_GET['Demand_id']), false, true);
            else
                $this->renderPartial('TabAdministration',array(), false, true);
        }
	
        public function GetFilters($Array) {
            
            $Filters2 = array(
                'NoDateMaster' => false,
                'NoDateExec' => false,
                'Object_id' => null,
                'ObjectGr_id' => null,
                'Master' => null,
                'Demand_id' => null,
                'DateReg' => null,
                'DemandType_id' => null,
                'Executor' => null,
                'Street_id' => null,
                'House' => null,
            );
            
            if (isset($Array['All']))
                if ($Array['All'] === "true") 
                    return $Filters2;
                
            
            if (isset($Array['NoDateMaster']))
                if ($Array['NoDateMaster'] === "true")
                    $Filters2['NoDateMaster'] = $Array['NoDateMaster'];
            
            
            if (isset($Array['DemObject'])) {
                if ($Array['DemObject'] === "true")
                    $Filters2['Object_id'] = $Array['Object_id'];
            }
            
            if (isset($Array['DemObjectGroup'])) {
                if ($Array['DemObjectGroup'] === "true") {
                    //$Filters2['ObjectGr_id'] = $Array['ObjectGr_id'];
                    if (isset($Array['Street_id']))
                        if ($Array['Street_id'] !== '')
                            $Filters2['Street_id'] = $Array['Street_id'];
            
                    if (isset($Array['House']))
                        if ($Array['House'] !== '')
                            $Filters2['House'] = $Array['House'];

                }
            }
            
            if (isset($Array['Master']))
                if ($Array['Master'] !== '')
                    $Filters2['Master'] = $Array['Master'];
                
            if (isset($Array['Demand_id']))
                if ($Array['Demand_id'] !== '')
                    $Filters2['Demand_id'] = $Array['Demand_id'];
                
            if (isset($Array['DateReg']))
                if ($Array['DateReg'] !== '')
                    $Filters2['DateReg'] = $Array['DateReg'];
            
            if (isset($Array['DemandType_id']))
                if ($Array['DemandType_id'] !== '')
                    $Filters2['DemandType_id'] = $Array['DemandType_id'];
                
            if (isset($Array['Executor']))
                if ($Array['Executor'] !== '')
                    $Filters2['Executor'] = $Array['Executor'];
                
                
                
            return $Filters2;
        }
        
	public function actionIndex($ajax=false)
	{
            $Filters2 = array();
//            $this->title = 'Заявки';
            $this->setPageTitle('Заявки');
            
            $this->gridFilters = '_filters';
            
            
            if (isset($_POST['DemFilters'])) {
                $Filters2 = $this->GetFilters($_POST['DemFilters']);
            }
            else {
                if (isset($_GET['DemFilters']))
                    $Filters2 = $this->GetFilters($_GET['DemFilters']);
                else
                    $Filters2 = $this->GetFilters(array());
            }
            
            $this->filterDefaultValues = $Filters2;
            
            $this->render('index2', array(
                'Filters2' => $Filters2,
            ));
	}

	public function actionCreate() {
            $model = new Demands;
            
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
            
            $model->setScenario('Insert');
            $this->title = 'Создание новой заявки';
            $ReadOnly = false;
            
            if(isset($_POST['Demands']))
            {
                $model->attributes=$_POST['Demands'];
                $model->EmplCreate = Yii::app()->user->Employee_id;
                $model->User = Yii::app()->user->Employee_id;
                
                if ($model->validate()) {
                    $Result = $model->insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Result['Demand_id'];
                    echo json_encode($ObjectResult);
                    return;
                }
                else
                {
                    $ObjectsGroup = new ObjectsGroup();
                    $ObjectsGroup->getModelPk($model->ObjectGr_id);
                    $Objects = new ListObjects();
                    $Objects->getModelPk($model->Object_id);

                    $ObjectResult['html'] = $this->renderPartial('create', array(
                            'model'=>$model,
                            'ObjectsGroup' => $ObjectsGroup,
                            'ReadOnly' => $ReadOnly,
                            'Objects' => $Objects,
                        ), true);
                    echo json_encode($ObjectResult);
                    return;
                }
                return;
            }
            
            if (isset($_GET["Object_id"]))
            {
                $Object = new ListObjects();
                if (isset($_GET["ContrS_id"]))
                    if ($_GET["ContrS_id"] !== "null")
                        $Result = $Object->Find(array('o.Object_id' => $_GET["Object_id"], 'c.ContrS_id' => $_GET["ContrS_id"]));
                    else
                        $Result = $Object->Find(array('o.Object_id' => $_GET["Object_id"]));
                else
                    $Result = $Object->Find(array('o.Object_id' => $_GET["Object_id"]));
                $Result = $Result[0];

                $model->Object_id = $Result['Object_id'];
                $model->ObjectGr_id = $Result['ObjectGr_id'];
                $model->ContrS_id = $Result['ContrS_id'];
                $model->Address = $Result['Addr'];
                $model->Master = $Result['Master'];
                $model->MasterName = $Result['MasterName'];
                $model->ServiceType = $Result['ServiceType'];        
                $model->DateReg = date("Y-m-d H:i:s");
            


                }
            
            $ObjectsGroup = new ObjectsGroup();
            $ObjectsGroup->getModelPk($model->ObjectGr_id);

            $Objects = new ListObjects();
            $Objects->getModelPk($model->Object_id);

            $this->render('create', array(
                    'model'=>$model,
                    'ObjectsGroup' => $ObjectsGroup,
                    'ReadOnly' => $ReadOnly,
                    'Objects' => $Objects,
                    )
            );
	}
        
        public function actionView($Demand_id){
            $this->title = 'Заявка №' . $Demand_id;
            $this->setPageTitle('Заявка №' . $Demand_id);
            
            $Demand = new Demands();
            $Demand->getModelPk($Demand_id);
            
            $Object = new Objects();
            $Object->getModelPk($Demand->Object_id);
            
            $this->render('view2', array(
			'model'=>$Demand,
                        'SpecCondition' => $Object->Condition,
                    )
		);
        }
        
        public function actionSalesView($Demand_id){
            $this->title = 'Заявка №' . $Demand_id;
            $this->setPageTitle('Заявка №' . $Demand_id);
            
            $Demand = new SalesDemand();
            $Demand->getModelPk($Demand_id);
            
            $Object = new Objects();
            $Object->getModelPk($Demand->Object_id);
            
            $this->render('sales_view', array(
			'model'=>$Demand,
                        'SpecCondition' => $Object->Condition,
                    )
		);
        }

	public function actionUpdate($id, $Exec = false, $ToMaster = false) {
		$this->title = 'Редактирование заявки №' . $id;
                $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
                
                $Scenario = 'Update';
                
                $model = new Demands;
                $model->setScenario($Scenario);
                    
                
                $ReadOnly = true;
                $ReadOnly = !Yii::app()->user->checkAccess('ChangeType');
                
		if ($id == null)
                        throw new CHttpException(404, 'Не выбрана запись.');
                
                
                
		if(isset($_POST['Demands']))
		{
                    $model->attributes=$_POST['Demands'];
                    $model->Demand_id = $id;
                    $model->EmplChange = Yii::app()->user->Employee_id;

                    if (!is_null($model->DateExec) && ($model->DateExec !== '')) 
                        $Scenario = 'Exec';

                    $model->setScenario($Scenario);

                    if ($model->validate()) {
                        $model->update();
                        $ObjectResult['result'] = 1;
                        $ObjectResult['id'] = $model->Demand_id;
                        echo json_encode($ObjectResult);
                        return;
                    } else {
                        $ObjectsGroup = new ObjectsGroup();
                        if ($model->ObjectGr_id !== null) {
                            $ObjectsGroup->getModelPk($model->ObjectGr_id);
                        }
                        $Objects = new ListObjects();
                        $Objects->getModelPk($model->Object_id);
                
                        $ObjectResult['html'] = $this->renderPartial('create', array(
                            'model'=>$model,
                            'ObjectsGroup' => $ObjectsGroup,
                            'ReadOnly' => $ReadOnly,
                            'Objects' => $Objects,
                        ), true);
                        echo json_encode($ObjectResult);
                        return;
                    }
                    return;     
		}
                
                $model->getmodelPk($id);

                if ($Exec) {
                    $model->EmplChange = Yii::app()->user->Employee_id;
                    $model->DateExec = date('d.m.Y H:i');
                    $model->setScenario('Exec');
                    $model->validate();
                }

                if ($ToMaster) {
                    $model->EmplChange = Yii::app()->user->Employee_id;
                    $model->DateMaster = date('d.m.Y H:i');
                    $model->validate();
                }
                
                
                $ObjectsGroup = new ObjectsGroup();
                if ($model->ObjectGr_id !== null) {
                    $ObjectsGroup->getModelPk($model->ObjectGr_id);
                }
                
                $Objects = new ListObjects();
                $Objects->getModelPk($model->Object_id);
                
		$this->render('update', array(
			'model'=>$model,
                        'ObjectsGroup' => $ObjectsGroup,
                        'ReadOnly' => $ReadOnly,
                        'Objects' => $Objects,
                    )
		);
	}

	public function actionProcessInfo($id=null) {
		$id == null ? die() : '';
		$model = new ExecutorReports;
		$model->demand_id = $id;

		header('Content-Type: application/json');
        echo CJSON::encode($model->search()->data);
	}

	public function actionContactsInfo($obj_id=null) {
		$model = new Demands;

		header('Content-Type: application/json');
        echo CJSON::encode($model->contactsInfo($obj_id));
	}

	public function actionExecutorsInfo($id=null) {
		$id == null ? die() : '';
		// $model = new DemandsExecutors;
		// $model->Demand_id = $id;
		$model = new Demands;

		header('Content-Type: application/json');
        echo CJSON::encode($model->executorsInfo($id));
	}

	public function actionGetDataJson($ajax=true) {
		$model = new Demands;
		$filter = array();

		if($ajax) {

			isset($_GET['Demands']) ? $filter = $_GET['Demands'] : '';
			//var_dump($filter);
			$model->setFilter($filter);
		}

		 $DataRow = $model->Find(array());
           // var_dump($DataRow);
           $Data = $model->filter($DataRow);
        //var_dump($Data);

        header('Content-Type: application/json');
        echo CJSON::encode($Data);
            
	}
        
        public function actionSend($Demand_id, $Employee_id, $PlanDate, $Message) {
            
            $sp = new StoredProc();
            $sp->ProcedureName = 'INSERT_EXECUTORREPORTS';
            $sp->ParametersRefresh();
            $sp->Parameters["exrp_id"] = null;
            $sp->Parameters["empl_id"] = $Employee_id;
            $sp->Parameters["Demand_id"] = $Demand_id;
            $sp->Parameters["PlanDateExec"] = $PlanDate;
            $sp->Parameters["report"] = $Message;
            $sp->Execute();
        }


	public function actionAddReport() {
		$request = new CHttpRequest;
        $data = $request->getParam('d',false);

        var_dump($data);

		$model = new Demands;
		$model->exrp_id = null;
		$model->empl_id = Yii::app()->user->Employee_id;
		$model->Demand_id = $data['dm_id'];
		$model->PlanDateExec = $data['pdate'];
		$model->report = $data['report'];

		$model->callProc('INSERT_EXECUTORREPORTS');
	}


	public function actionGetSystemTypes($id=false) {
		$model = new Demands;
		
		header('Content-Type: application/json');
        echo CJSON::encode($model->getSystemTypes($id));
	}

	public function actionGetEquipTypes($id=false, $parent_id=null) {
		$model = new Demands;
		
		header('Content-Type: application/json');
        echo CJSON::encode($model->getEquipTypes($id,$parent_id));
	}

	public function actionGetFault($id=false, $parent_id=null, $parent_parent_id=null) {
		$model = new Demands;
		
		header('Content-Type: application/json');
        echo CJSON::encode($model->getFault($id,$parent_id,$parent_parent_id));
	}

	public function actionGetPriors($id=false, $parent_id=null, $parent_parent_id=null, $parent_parent_parent_id=null) {
		$model = new Demands;
		
		header('Content-Type: application/json');
        echo CJSON::encode($model->getPriors($id,$parent_id,$parent_parent_id, $parent_parent_parent_id));
	}

	public function actionGetHouse($id=false) {
		$model = new Demands;

		header('Content-Type: application/json');
		echo CJSON::encode($model->getHouse($id));
	}

	public function actionGetDeadline($time, $id){
		$sql = "select [dbo].[get_dem_deadline]('{$time}', {$id}) as d";
		$query = Yii::app()->db->createCommand($sql);
		$q = $query->queryAll();
		echo $q[0]['d'];
	}
	
        
        
        public function actionTomaster($id) {
            $model = new Demands();
            $model->getModelPk($id);
                
            if (($model->DateMaster === "") || ($model->DateMaster === null)) {
                $model->EmplChange = Yii::app()->user->Employee_id;
                $model->DateMaster = date('d.m.Y H:i:s');

                $model->setScenario('Update');

                if ($model->validate()) {
                    $model->callProc('TO_MASTER');
                    $this->redirect($_SERVER['HTTP_REFERER']);
                }
                else {
                    $ObjectsGroup = new ObjectsGroup();
                    if ($model->ObjectGr_id !== null) {
                        $ObjectsGroup->getModelPk($model->ObjectGr_id);
                    }
                    
                    $Objects = new ListObjects();
                    $Objects->getModelPk($model->Object_id);
                    
                    
                    $this->redirect(Yii::app()->createUrl('Demands/update', array(
                        'id'=> $model->Demand_id,
                        'model' => $model,
                        'ObjectsGroup' => $ObjectsGroup,
                        'Objects' => $Objects,
                        'ReadOnly'=>'true',
                        'ToMaster'=>'true',
                    )));
                    
                     
                    
                }
            }
            else {
                $Object = new Objects();
                $Object->getModelPk($Demand->Object_id);
                
                $this->render('view2', array(
                    'model' => $model,
                    'SpecCondition' => $Object->Condition,
                    ));
            }
	}

	public function actionRepGeneral() {
		$request = new CHttpRequest;
		$d = $request->getParam('d', false);
		$renderRep =false;
		$model = new Demands;
		$data = $model->getReportGeneral();

		if($d['date']) {

			$renderRep = true;
		}

		$this->render('repGeneral', array(
			'model'=>$model,
			'data'=>$data,
			'renderRep'=>$renderRep,
		));

	}

	public function actionGetAdditionDemand($id) {

		$data = Demands::getAdditionDemand($id);
		$this->renderPartial('addition', array(
			'data' => $data[0]
		));
	}
        
        
	public function actionDemandExec($id) {
            $model = new Demands();
            $model->getModelPk($id);
            $Object = new Objects();
            $Object->getModelPk($model->Object_id);
            
            $DE = null;
            if (isset($_GET['DateExec'])) {
                $DE = $_GET['DateExec'];
            }
            
            if (($model->DateExec === "") || ($model->DateExec === null)) {
                
                $model->setScenario('Exec');
                $model->EmplChange = Yii::app()->user->Employee_id;
                
                if ($DE !== null)
                    $model->DateExec = $DE;
                else
                    $model->DateExec = date('d.m.Y H:i');
                
                if ($model->validate()) {
                    $model->callProc('DEMAND_EXEC');
                    $this->render('view2', array('model' => $model, 'SpecCondition' => $Object->Condition,));
                    
                }
                else {
                    $ObjectsGroup = new ObjectsGroup();
                    if ($model->ObjectGr_id !== null) {
                        $ObjectsGroup->getModelPk($model->ObjectGr_id);
                    }
                    
                    $Objects = new ListObjects();
                    $Objects->getModelPk($model->Object_id);
                    
                    $this->redirect(Yii::app()->createUrl('Demands/Update', array(
                        'id' => $model->Demand_id,
                        'Exec' => true, 
                    )));
                }    
            }
            else {
                $this->render('view2', array(
                    'model' => $model,
                    'SpecCondition' => $Object->Condition,
                ));
            }
            
	}

	public function actionDemandFilters() {
            
            if (isset($_GET['Object_id']))
                $Object_id = $_GET['Object_id'];
            else
                $Object_id = "";
            
            if (isset($_GET['ObjectGr_id']))
                $ObjectGr_id = $_GET['ObjectGr_id'];
            else
                $ObjectGr_id = "";
            
            if (isset($_GET['Street_id']))
                $Street_id = $_GET['Street_id'];
            else
                $Street_id = "";
            
            if (isset($_GET['House']))
                $House = $_GET['House'];
            else
                $House = "";
            
            $this->renderPartial('DemandFilters', array(
                'Object_id' => $Object_id,
                'ObjectGr_id' => $ObjectGr_id,
                'Street_id' => $Street_id,
                'House' => $House,
            ), null, true);
        }
        
	protected function performAjaxValidation($model)
	{
            if(isset($_POST['ajax']) && $_POST['ajax']==='Demands')
            {
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
            }
	}


    public function actionReport() {
        $model = new Demands();
        header("Content-type: application/json");
        die(str_replace(":null,",":\"\",",json_encode($model->report())));
    }
    
    public function actionWorkedOut($Demand_id = 0) {
        
        if ($Demand_id == 0) {
            echo 1;
            return;
        }
        
        $model = new Demands();
        $model->getModelPk($Demand_id);
            
        if (($model->WorkedOut === "") || ($model->WorkedOut === null)) {

            $model->EmplChange = Yii::app()->user->Employee_id;
            $model->callProc('DEMAND_WorkedOut');
            echo 0;
            return;
        }
        
        echo 1;
        
    }
    
    public function actionMessage($message, $ok = '', $no = '') {
        $this->renderPartial('message', array(
                'message' => $message,
                'ok' => $ok,
                'no' => $no,
            ), null, true);
    }
    
    public function actionUndoWorkedOut($Demand_id = 0) {
        
        if ($Demand_id == 0) {
            echo 1;
            return;
        }
        
        $model = new Demands();
        $model->getModelPk($Demand_id);
            
        if (($model->WorkedOut !== "") || ($model->WorkedOut !== null)) {

            $model->EmplChange = Yii::app()->user->Employee_id;
            $model->callProc('DEMAND_UndoWorkedOut');
            echo 0;
            return;
        }
        
        echo 1;
        return;
    }
    
    public function actionFindDemand() {
        $Demand_id = 0;
        $Object_id = 0;
        
        if (isset($_POST['Demand_id'])) {
            $Demand_id = $_POST['Demand_id'];
        }
        
        if (isset($_POST['Object_id'])) {
            $Object_id = $_POST['Object_id'];
        }
        
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        $ObjectResult['html'] = $this->renderPartial('_find', array(
                'Demand_id' => $Demand_id,
                'Object_id' => $Object_id,
            ), true);
        
        echo json_encode($ObjectResult);
    }
        
    public function actionUpdateDetails() {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['DemandsDetails'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UPDATE_DEMANDDETAILS';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['DemandsDetails']['Demand_id'];
            $sp->Parameters[1]['Value'] = $_POST['DemandsDetails']['GoCalc'];
            $sp->Parameters[2]['Value'] = $_POST['DemandsDetails']['WorkExec'];
            $sp->Parameters[3]['Value'] = $_POST['DemandsDetails']['ngtv_id'];
            $sp->Parameters[4]['Value'] = $_POST['DemandsDetails']['Rvrs_id'];
            $sp->Parameters[5]['Value'] = $_POST['DemandsDetails']['DateContract'];
            $sp->Parameters[6]['Value'] = $_POST['DemandsDetails']['CalcSum'];
            $sp->Parameters[7]['Value'] = $_POST['DemandsDetails']['DateSurvey'];
            $sp->Parameters[8]['Value'] = $_POST['DemandsDetails']['offer'];
            $sp->Parameters[9]['Value'] = $_POST['DemandsDetails']['competitive'];
            $sp->Parameters[10]['Value'] = $_POST['DemandsDetails']['initiative'];
            $sp->Parameters[11]['Value'] = $_POST['DemandsDetails']['clrs_id'];
            $sp->Parameters[12]['Value'] = $_POST['DemandsDetails']['upg_note'];
            $sp->Parameters[13]['Value'] = $_POST['DemandsDetails']['date_calc'];
            $sp->Parameters[14]['Value'] = $_POST['DemandsDetails']['calc_accept'];
            $sp->Parameters[15]['Value'] = $_POST['DemandsDetails']['StatusOP'];
            $sp->Parameters[16]['Value'] = $_POST['DemandsDetails']['Initiator_id'];
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $_POST['DemandsDetails']['Demand_id'];
        }
        
        echo json_encode($ObjectResult);
    }

    public function actionUndo() {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Demand_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UNDO_ExecDemand';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Demand_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $_POST['Demand_id'];
        }
        
        echo json_encode($ObjectResult);
    }     
}


