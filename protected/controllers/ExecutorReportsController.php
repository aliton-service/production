<?php

class ExecutorReportsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'roles'=>array(
					'ViewExecuteReports',
					'CreateExecuteReports',
					'UpdateExecuteReports',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'Insert'),
				'roles'=>array(
					
					'CreateExecuteReports',
					
				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array(
					
					'UpdateExecuteReports',
					
				),
			),
			/* array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'roles'=>array(
					'AdminExecutorReports',
					
					
				),

			), */
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
				'roles'=>array(
					'DeleteExecuteReports',
										
				),

			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $model=new ExecutorReports;
            if(isset($_POST['ExecutorReports']))
            {
                $model->setProp($_POST['ExecutorReports']);
                $model->empl_id = Yii::app()->user->Employee_id;
                $model->insert();
                echo 0;
                return;
            }
            echo 1;
            return;
	}

	public function actionInsert() {
            $model = new ClientActions();
            
            $LastAction = array(
                'Address' => null,
                'StageName' => null,
                'Date' => null,
                'ResultName' => null,
                'NextAction' => null
            );
            
            $MarketingSolutions = new MarketingSolutions();
            $SystemOffers = new SystemOffers();
            $ClientSolutions = new ClientSolutions();
            $ContactInfo = array();
            if (isset($_POST['Demand_id'])) {
                $model->Demand_id = $_POST['Demand_id'];
            }
            
            $Form_id = 0;
            if (isset($_POST['Form_id']))
                $Form_id = $_POST['Form_id'];
            if (isset($_POST['ClientActions']))
                $Form_id = $_POST['ClientActions']['Form_id'];
            
            
            
            if ($Form_id != 0) {
                $model->Form_id = $Form_id;
                $Query = new SQLQuery();
                $Query->setSelect("\nSelect
                                        er.Exrp_id,
                                        d.[Address],
                                        s.StageName,
                                        er.[Date],
                                        r.ActionResultName,
                                        er.NextAction,
                                        ms.Solution_id,
                                        so.SystemOffer_id,
                                        cs.ClientSolution_id,
                                        er.Responsible_id,
                                        er.ActionStage_id,
                                        d.StatusOP");
                $Query->setFrom("\nFrom PropForms p left join ExecutorReports er on (p.LastAction_id = er.Exrp_id)
                                        left join FullDemands d on (er.Demand_id = d.Demand_id)
                                        left join ActionStages s on (er.ActionStage_id = s.Stage_id)
                                        left join ActionResults r on (er.ActionResult_id = r.Result_id)
                                        left join MarketingSolutions ms on (er.Exrp_id = ms.Action_id)
                                        left join SystemOffers so on (er.Exrp_id = so.Action_id)
                                        left join ClientSolutions cs on (er.Exrp_id = cs.Action_id)");
                $Query->setWhere("\nWhere p.Form_id = " . $Form_id);
                $Result = $Query->QueryRow();
                
                $LastAction['Address'] = $Result['Address'];
                $LastAction['StageName'] = $Result['StageName'];
                $LastAction['Date'] = $Result['Date'];
                $LastAction['ResultName'] = $Result['ActionResultName'];
                $LastAction['NextAction'] = $Result['NextAction'];
                
                $ContactInfo = new ContactInfo();
                $ContactInfo = $ContactInfo->Find(array(), array(
                    'og.PropForm_id = ' . $Form_id,
                ));
                
                if ($Result['Solution_id'] != '')
                    $MarketingSolutions->getModelPk ($Result['Solution_id']);
                if ($Result['SystemOffer_id'] != '')
                    $SystemOffers->getModelPk ($Result['SystemOffer_id']);
                if ($Result['ClientSolution_id'] != '')
                    $ClientSolutions->getModelPk ($Result['ClientSolution_id']);
                
                // Значения по умолчанию
                if (!isset($_POST['ClientActions'])) {
                    if ($Result['Responsible_id'] != '')
                        $model->Responsible_id = $Result['Responsible_id'];
                    else $model->Responsible_id = Yii::app()->user->Employee_id;
                    
                    $model->ActionStage_id = $Result['ActionStage_id'];
                    $model->StatusOP = $Result['StatusOP'];
                    
                }
                    
                    
            }
            else {
                
            }
            
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            
            
            
            
            
            if (isset($_POST['ClientActions'])) {
                $model->attributes = $_POST['ClientActions'];
                $model->Empl_id = Yii::app()->user->Employee_id;
                $model->Date = date('d.m.Y H:i');
                if ($model->Demand_id == '')
                    $model->Demand_id = 0;
                
                if ($model->validate()) {
                    $Res = $model->Insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['Exrp_id'];
                    
                    if (isset($_POST['MarketingSolutions'])) {
                        $MarketingSolutions->attributes = $_POST['MarketingSolutions'];
                        $MarketingSolutions->Action_id = $Res['Exrp_id'];
                        $MarketingSolutions->Update();
                    }
                    
                    if (isset($_POST['SystemOffers'])) {
                        $SystemOffers->attributes = $_POST['SystemOffers'];
                        $SystemOffers->Action_id = $Res['Exrp_id'];
                        $SystemOffers->Update();
                    }

                    if (isset($_POST['ClientSolutions'])) {
                        $ClientSolutions->attributes = $_POST['ClientSolutions'];
                        $ClientSolutions->Action_id = $Res['Exrp_id'];
                        $ClientSolutions->Update();
                    }
                    
                    echo json_encode($ObjectResult);
                    
                    
                    
                    return;
                } 
                
            }
            
            

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
                'LastAction' => $LastAction,
                'ContactInfo' => $ContactInfo,
                'MarketingSolutions' => $MarketingSolutions,
                'SystemOffers' => $SystemOffers,
                'ClientSolutions' => $ClientSolutions,
            ), true);
            echo json_encode($ObjectResult);
        }
        
        
	public function actionUpdate()
	{
            $model = new ClientActions();
            
            $Solution_id = '';
            $SystemOffer_id = '';
            $ClientSolution_id = '';
            $Exrp_id = 0;
            if (isset($_POST['Exrp_id']))
                $Exrp_id = $_POST['Exrp_id'];
            if (isset($_POST['ClientActions']))
                $Exrp_id = $_POST['ClientActions']['Exrp_id'];    
            
            if ($Exrp_id != 0) { 
                $model->getModelPk ($Exrp_id);
                
                $Q = new SQLQuery();
                $Q->setSelect("\nSelect
                                    ms.Solution_id,
                                    so.SystemOffer_id,
                                    co.ClientSolution_id");
                $Q->setFrom("\nFrom ExecutorReports er left join MarketingSolutions ms on (ms.Action_id = er.Exrp_id)"
                        . "         left join SystemOffers so on (so.Action_id = er.Exrp_id)"
                        . "         left join ClientSolutions co on (co.Action_id = er.Exrp_id)");
                $Q->setWhere("\nWhere er.Exrp_id = " . $Exrp_id);
                $Q = $Q->QueryRow(); 
                $Solution_id = $Q['Solution_id'];
                $SystemOffer_id = $Q['SystemOffer_id'];
                $ClientSolution_id = $Q['ClientSolution_id'];
            }
            
            $LastAction = array(
                'Address' => null,
                'StageName' => null,
                'Date' => null,
                'ResultName' => null,
                'NextAction' => null
            );
            
            $MarketingSolutions = new MarketingSolutions();
            if ($Solution_id != '')
                $MarketingSolutions->getModelPk ($Solution_id);
            
            $SystemOffers = new SystemOffers();
            if ($SystemOffer_id != '')
                $SystemOffers->getModelPk($SystemOffer_id);
            
            $ClientSolutions = new ClientSolutions();
            if ($ClientSolution_id != '')
                $ClientSolutions->getModelPk ($ClientSolution_id);
            
            if (isset($_POST['Demand_id']))
                $model->Demand_id = $_POST['Demand_id'];
            
            $Form_id = 0;
            if (isset($_POST['Form_id']))
                $Form_id = $_POST['Form_id'];
            if (isset($_POST['ClientActions']))
                $Form_id = $_POST['ClientActions']['Form_id'];
            
            if ($Form_id != 0) {
                $model->Form_id = $Form_id;
                $Query = new SQLQuery();
                $Query->setSelect("\nSelect
                                        er.Exrp_id,
                                        d.[Address],
                                        s.StageName,
                                        er.[Date],
                                        r.ActionResultName,
                                        er.NextAction,
                                        ms.Solution_id,
                                        so.SystemOffer_id,
                                        cs.ClientSolution_id");
                $Query->setFrom("\nFrom PropForms p left join ExecutorReports er on (p.LastAction_id = er.Exrp_id)
                                        left join FullDemands d on (er.Demand_id = d.Demand_id)
                                        left join ActionStages s on (er.ActionStage_id = s.Stage_id)
                                        left join ActionResults r on (er.ActionResult_id = r.Result_id)
                                        left join MarketingSolutions ms on (er.Exrp_id = ms.Action_id)
                                        left join SystemOffers so on (p.Form_id = so.Form_id)
                                        left join ClientSolutions cs on (p.Form_id = cs.Form_id)");
                $Query->setWhere("\nWhere p.Form_id = " . $Form_id);
                $Result = $Query->QueryRow();
                $LastAction['Address'] = $Result['Address'];
                $LastAction['StageName'] = $Result['StageName'];
                $LastAction['Date'] = $Result['Date'];
                $LastAction['ResultName'] = $Result['ActionResultName'];
                $LastAction['NextAction'] = $Result['NextAction'];
                
                $ContactInfo = new ContactInfo();
                $ContactInfo = $ContactInfo->Find(array(), array(
                    'og.PropForm_id = ' . $Form_id,
                ));
                
                //if ($Result['Solution_id'] != '')
                //    $MarketingSolutions->getModelPk ($model->Exrp_id);
//                if ($Result['SystemOffer_id'] != '')
//                    $SystemOffers->getModelPk ($Result['SystemOffer_id']);
//                if ($Result['ClientSolution_id'] != '')
//                    $ClientSolutions->getModelPk ($Result['ClientSolution_id']);
                    
            }
            
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            
            if (isset($_POST['MarketingSolutions'])) {
                $MarketingSolutions->attributes = $_POST['MarketingSolutions'];
                $MarketingSolutions->Update();
            }
            
            if (isset($_POST['SystemOffers'])) {
                $SystemOffers->attributes = $_POST['SystemOffers'];
                $SystemOffers->Update();
            }
            
            if (isset($_POST['ClientSolutions'])) {
                $ClientSolutions->attributes = $_POST['ClientSolutions'];
                $ClientSolutions->Update();
            }
            
            if (isset($_POST['ClientActions'])) {
                $model->getModelPk($_POST['ClientActions']['Exrp_id']);
                $model->attributes = $_POST['ClientActions'];
                $model->Empl_id = Yii::app()->user->Employee_id;
                
                $model->Date = date('d.m.Y H:i');
                if ($model->Demand_id == '')
                    $model->Demand_id = 0;
                
                if ($model->validate()) {
                    $Res = $model->Update();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $model->Exrp_id;
                    echo json_encode($ObjectResult);
                    return;
                } 
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
                'LastAction' => $LastAction,
                'ContactInfo' => $ContactInfo,
                'MarketingSolutions' => $MarketingSolutions,
                'SystemOffers' => $SystemOffers,
                'ClientSolutions' => $ClientSolutions,
            ), true);
            echo json_encode($ObjectResult);
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id = false)
	{
		$model=new ExecutorReports;
		if(isset($_POST['id']) && (int)$_POST['id'] > 0) {
			$model->exrp_id = (int)$_POST['id'];
			$model->delete();
                        echo 0;
                        return;
		}
                
                echo 1;
                return;
                    
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
            $Form_id = null;
            $Demand_id = null;
            
            $model = new SalesDemand();
            
            if (isset($_POST['Form_id']))
                $Form_id = $_POST['Form_id'];
            if (isset($_POST['Demand_id'])) {
                $Demand_id = $_POST['Demand_id'];
                $model->getModelPk($Demand_id);
            }
            
            $ObjectResult['html'] = $this->renderPartial('index', array(
                    'Form_id' => $Form_id,
                    'Demand_id' => $model->Demand_id,
                    'model' => $model,
                ), true);
            
            echo json_encode($ObjectResult);
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ExecutorReports('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ExecutorReports']))
			$model->attributes=$_GET['ExecutorReports'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ExecutorReports the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ExecutorReports::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ExecutorReports $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='executor-reports-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
