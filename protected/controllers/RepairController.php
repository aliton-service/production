<?php

class RepairController extends Controller {
	
    public $layout='//layouts/column2';
    public $defaultAction  = 'index';
    public $title = '';

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
            
            array('allow', 
                    'actions'=>array('UndoAccept'),
                    'roles'=>array('UndoAcceptRepairs'),
            ),
            array('allow', 
                    'actions'=>array('Accept'),
                    'roles'=>array('AcceptRepairs'),
            ),
            array('allow', 
                    'actions'=>array(   'CreateActDefectations',
                                        'CreateCostCalc',
                                        'SendAgreeActDefectations',
                                        'Exec', 'Profit', 'Monitoring',
                                        'WorkStart', 'WorkEnd',
                                        'GetProfit', 'GetInfo',
                                        'CreateRepairSRM', 'Return', 'CreateRepairWarrantys',
                                        'CreateRepairUtil', 'CreateWHDocType2',
                                        'CreateBtnWHAct', 'CreateWHDocType7',
                                        'GetDefectExecTime', 'CreateDocuments'),
                    'users'=>array('*'),
            ),
            array('allow', 
                    'actions'=>array('RepairEngineerInformation', 'GetDocuments'),
                    'roles'=>array('ViewRepairEngineerInformation'),
            ),
            array('allow', 
                    'actions'=>array('index', 'RepaisForEngineer'),
                    'roles'=>array('ViewRepairs'),
            ),
            array('allow', 
                    'actions'=>array('SetTask'),
                    'roles'=>array('SetTask'),
            ),
            array('allow', 
                    'actions'=>array('SortTask'),
                    'roles'=>array('SortTask'),
            ),
            array('allow', 
                    'actions'=>array('Create'),
                    'roles'=>array('CreateRepairs'),
            ),
            
            array('allow', 
                    'actions'=>array('Update', 'Update2'),
                    'roles'=>array('UpdateRepairs'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }

    public function actionReturn() {
        $this->renderPartial('return', null, null, true);
    }
    
    public function actionIndex(){
        $this->title = 'Форма для менеджера по ремонту';
        $this->render('index');
    }
    
    public function actionRepaisForEngineer(){
        $this->title = 'Форма для иженера ПРЦ';
        $this->render('repairs_for_engineer');
    }
    
    public function actionSetTask() {
        if (isset($_POST['RepairTasks'])) {
            $model = new RepairTasks();
            $model->attributes = $_POST['RepairTasks'];
            
            $model->insert();
        }
        
    }
    
    public function actionSortTask() {
        if (isset($_POST['RepairTasks'])) {
            $model = new RepairTasks();
            $model->attributes = $_POST['RepairTasks'];
            
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'SORT_RepairTasks';
            $StoredProc->ParametersRefresh();
            $StoredProc->SetStoredProcParams($model);
            $StoredProc->SetParamValue('@Step', $_POST['RepairTasks']['Step']);
            
            $Result = $StoredProc->Execute();
            echo $Result['TaskSequence'];
        }
        
    }
    
    public function actionCreate() {
        $this->title = 'Создание новой заявки на ремонт';
        $model = new Repairs();
        
        //$model->setScenario('Insert');

        if(isset($_POST['Repairs'])) {
            $model->attributes=$_POST['Repairs'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $Res = $model->insert();
                $this->redirect(Yii::app()->createUrl('Repair/RepairEngineerInformation', array(
                    'Repr_id' => $Res['Repr_id'],
                )));
            }    
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate2($Repr_id) {
        $this->title = 'Редактирование заявки на ремонт';
        $model = new Repairs();
        $model->getModelPk($Repr_id);
        //$model->setScenario('Insert');

        if(isset($_POST['Repairs'])) {
            $model->attributes=$_POST['Repairs'];
            
            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
                
                $this->redirect(Yii::app()->createUrl('Repair/RepairEngineerInformation', array(
                    'Repr_id' => $model->Repr_id,
                )));
            }    
        }
        
            
        $this->render('update2',array(
            'model'=>$model,
        ));
    }
    
    public function actionUpdate($Repr_id) {
        $this->title = 'Редактирование заявки на ремонт';
        $model = new Repairs();
        
        //$model->setScenario('Insert');

        if(isset($_POST['Repairs'])) {
            $model->attributes=$_POST['Repairs'];
            
            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
                
                $this->redirect(Yii::app()->createUrl('Repair/RepairEngineerInformation', array(
                    'Repr_id' => $model->Repr_id,
                )));
            }    
        }
        else {
            $model->getModelPk($Repr_id);
        }
            
        if ($model->Status_id < 2) 
            $this->render('update',array(
                'model'=>$model,
            ));
        
        
    }
    
    public function actionRepairEngineerInformation($Repr_id) {
        $model = new Repairs();
        $model->getModelPk($Repr_id);
        
        $this->title = 'Заяка на ремнот №' . $model->Number . ' от ' . DateTimeManager::YiiDateToAliton($model->Date);
        
        $Params = array(
            'BtnAccept' => false,
            'BtnUndoAccept' => false,
            'BtnSendAgreeActDefectation' => false,
            'BtnExec' => false,
            'BtnProfit' => false,
            'BtnMonitoring' => true,
            'BtnWorkStart' => false,
            'BtnWorkEnd' => false,
        );
        
        if ($model->Status_id == 0 || $model->Status_id == 1)
            $Params['BtnAccept'] = true;
        if ($model->Status_id > 1)
            $Params['BtnUndoAccept'] = true;
        
        /* Неремонтопригодно*/
        if ($model->Status_id == 5) {
            if ($model->RepairStage_id == 3)
                $Params['BtnSendAgreeActDefectation'] = true;
            if ($model->RepairStage_id == 6)
                $Params['BtnExec'] = true;
        }
        
        /* Ремонт в ПРЦ */
        if ($model->Status_id == 3) {
            if ($model->RepairStage_id == 8)
                $Params['BtnProfit'] = true;
            if ($model->RepairStage_id == 9)
                $Params['BtnWorkStart'] = true;
            if ($model->RepairStage_id == 10)
                $Params['BtnWorkEnd'] = true;
            if ($model->RepairStage_id == 12)
                $Params['BtnExec'] = true;
        }
        
        /* Ремонт в СРМ */
        if ($model->Status_id == 4) {
            if ($model->RepairStage_id == 16)
                $Params['BtnProfit'] = true;
            if ($model->RepairStage_id == 17)
                $Params['BtnWorkStart'] = true;
            if ($model->RepairStage_id == 18)
                $Params['BtnWorkEnd'] = true;
            if ($model->RepairStage_id == 20)
                $Params['BtnExec'] = true;
        } 
        
        /* Оборудование исправно */
        if ($model->Status_id == 6) {
            if ($model->RepairStage_id == 24)
                $Params['BtnExec'] = true;
        }
        
        $this->render('repair_engineer_information',array(
            'model' => $model,
            'Params' => $Params,
        ));
    }
    
    public function actionAccept($Repr_id = 0) {
        if ($Repr_id != 0) {
            
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'ACCEPT_Repairs';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Repr_id'];
        }
        else
            echo 0;
    }
    
    public function actionUndoAccept($Repr_id = 0) {
        if ($Repr_id != 0) {
            
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'UNDO_AcceptRepairs';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Repr_id'];
        }
        else
            echo 0;
    }
    
    public function actionGetDocuments($Repr_id) {
        $this->renderPartial('documents', array(
            'Repr_id' => $Repr_id,
        ), null, true);
    }
    
    public function actionCreateActDefectations($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToActDefectations';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', Null);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo 0;
    }
    
    public function actionCreateCostCalc($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToCostCalculations';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@Calc_id', Null);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Calc_id'];
        }
        else
            echo 0;
    }
    
    public function actionCreateRepairSRM($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToSRM';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', Null);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo 0;
    }
    
    public function actionCreateRepairWarrantys($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToWarrantys';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', Null);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo 0;
    }
    
    public function actionCreateRepairUtil($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToUtilizations';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', Null);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo 0;
    }
    
    public function actionCreateWHDocType2($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToWHDocType9';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', Null);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo 0;
    }
    
    public function actionCreateBtnWHAct($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToWHDocType5';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', Null);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo 0;
    }
    
    public function actionCreateWHDocType7($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToWHDocType7';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', Null);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo 0;
    }
    
    public function actionSendAgreeActDefectations($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'SEND_AgreeActDefectations';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Error', 0);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Error'];
        }
        else
            echo 100;
    }
    
    public function actionExec($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'EXEC_Repairs';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Error', 0);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Error'];
        }
        else
            echo 100;
    }
    
    public function actionProfit($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'UPDATE_RepairsProfit';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Error', 0);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Error'];
        }
        else
            echo 100;
    }
    
    public function actionMonitoring($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'COPY_RepairToMonitoring';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Docm_id', 0);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['Docm_id'];
        }
        else
            echo -1;
    }
    
    public function actionWorkStart($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'INSERT_RepairWorkings';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@RepairWorking_id', 0);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@Empl_id', 0);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['RepairWorking_id'];
        }
        else
            echo -1;
    }
    
    public function actionWorkEnd($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'UPDATE_RepairWorkings';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@RepairWorking_id', 0);
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplChange', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo $Result['RepairWorking_id'];
        }
        else
            echo -1;
    }
    
    public function actionCreateDocuments($Repr_id = 0) {
        if ($Repr_id != 0) {
            $StoredProc = new StoredProc();
            $StoredProc->ProcedureName = 'CREATE_RepairDocuments';
            $StoredProc->ParametersRefresh();
            
            $StoredProc->SetParamValue('@Repr_id', $Repr_id);
            $StoredProc->SetParamValue('@EmplCreate', Yii::app()->user->Employee_id);
            
            $Result = $StoredProc->Execute();
            echo 1;
        }
        else
            echo -1;
    }
    
    public function actionGetProfit($Repr_id = 0) {
        if ($Repr_id != 0) {
            $Result = Yii::app()->db->createCommand('Select * From dbo.get_repair_profit(' . $Repr_id . ')')->queryAll();
            echo json_encode($Result);
        }
    }
    
    public function actionGetInfo() {
        if (isset($_POST['Params'])) {
            $Object_id = $_POST['Params']['Object_id'];
            $Date = Date('d.m.Y');
            $Equip_id = $_POST['Params']['Equip_id'];
            $SN = $_POST['Params']['SN'];
            $Repr_id = $_POST['Params']['Repr_id'];
            $Storage_id = $_POST['Params']['Storage_id'];
            
            if ($Repr_id == '')
                $Repr_id = 'null';
            
            if ($Storage_id == '')
                $Storage_id = 'null';
            
            $Result = Yii::app()->db->createCommand('Select * From dbo.get_equip_info_repairs(' . $Repr_id . ', ' . $Object_id . ', \'' . $Date . '\', ' . $Equip_id . ', \'' . $SN . '\', ' . $Storage_id . ')')->queryAll();
            $Result[0]['LastDateMonitoring'] = DateTimeManager::YiiDateToAliton($Result[0]['LastDateMonitoring']);
            echo json_encode($Result);
        }
    }
    
    
    public function actionGetDefectExecTime($Equip_id = 0, $Defect_id = 0) {
        $ExecTime = -1;
        
        if ($Equip_id != 0 && $Defect_id != 0) {
            $Model = new RepairDefectsTime();
            $Result = $Model->Find(array(
                'd.Equip_id' => $Equip_id,
                'd.Defect_id' => $Defect_id,
            ));
            $ExecTime = $Result[0]['ExecTime'];
        }
        echo $ExecTime;
    }
}