<?php

class CostCalculationsController extends Controller
{
    public $layout = '//layouts/column2';
    public $title = '';

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
                'actions'=>array('index', 'view', 'GetModel', 'GetDetails'),
                'roles'=>array('ViewCostCalculations'),
            ),
            array('allow', 
                'actions'=>array('create', 'Add'),
                'roles'=>array('CreateCostCalculations'),
            ),
            array('allow', 
                'actions'=>array('update', 'updatedetails', 'updatekoef'),
                'roles'=>array('UpdateCostCalculations'),
            ),
            array('allow', 
                'actions'=>array('delete'),
                'roles'=>array('DeleteCostCalculations'),
            ),
            array('allow',
                'actions'=>array('Agreed'),
                'roles'=>array('AgreedCostCalculations'),
            ),
            array('allow',
                'actions'=>array('UndoAgreed'),
                'roles'=>array('UndoAgreedCostCalculations'),
            ),
            array('allow',
                'actions'=>array('Ready'),
                'roles'=>array('ReadyCostCalculations'),
            ),
            array('allow',
                'actions'=>array('UndoReady'),
                'roles'=>array('UndoReadyCostCalculations'),
            ),
            array('allow',
                'actions'=>array('copy'),
                'roles'=>array('CopyCostCalculations'),
            ),
            array('allow',
                'actions'=>array('annul'),
                'roles'=>array('AnnulCostCalculations'),
            ),
            
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionGetModel()
    {
        $model = array();
        if (isset($_POST['Calc_id'])) {
            if (isset($_POST['Calc_id'])) {
                $model = new CostCalculations();
                $model->getModelPk($_POST['Calc_id']);
            }
        }
        
        echo json_encode($model);
    }

    public function actionCreate()
    {
        $model = new CostCalculations();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Params']))
            $model->attributes = $_POST['Params'];
        
        if (isset($_POST['ObjectGr_id']))
            $model->ObjectGr_id = $_POST['ObjectGr_id'];
        
        if (isset($_POST['CostCalculations'])) {
            $model->attributes = $_POST['CostCalculations'];
            if ($model->validate()) {
                $Res = $model->Insert();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $Res['calc_id'];
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
        $model = new CostCalculations();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        if (isset($_POST['calc_id']))
            $model->getModelPk($_POST['calc_id']);

        if (isset($_POST['CostCalculations'])) {
            $model->getModelPk($_POST['CostCalculations']['calc_id']);
            $model->attributes = $_POST['CostCalculations'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->calc_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_form', array(
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
        
        if (isset($_POST['calc_id'])) {
            $model = new CostCalculations();
            $model->getModelPk($_POST['calc_id']);
            $model->Delete();
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $model->calc_id;
            echo json_encode($ObjectResult);
            return;
        }
        echo json_encode($ObjectResult);
    }
    
    public function actionAnnul()
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['calc_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'ANNUL_CostCalculations';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['calc_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }

    public function actionGetDetails() {
        $Result = array(
            'StartingWork' => 0,
            'Expences' => 0,
            'TotalWork' => 0,
            'StartingWorkLow' => 0,
            'Koef' => 0,
            'SumLowFull' => 0,
            'SumHighFull' => 0,
            'Discount' => 0,
            'SumMarj' => 0,
            'ProcMarj' => 0,
            'SumEquipsLow' => 0,
            'SumEquipsHigh' => 0,
            'SumWorkLow' => 0,
            'SumWorkHigh' => 0,
            'SumMaterialsLow' => 0,
            'SumMaterialsHigh' => 0,
            'SumEquipsHighDefault' => 0,
            'SumPay' => 0,
        );
        
        if (isset($_POST['calc_id'])) {
            $Query = new SQLQuery();
            $Query->text = "Select
                                  t.*,
                                  isnull(t.sum_equips_low, 0) + isnull(t.sum_materials_low, 0) + isnull(t.sum_works_low, 0) sum_low_full,
                                  (t.sum_works_high + t.sum_equips_high + t.sum_materials_high) sum_high_full_no_discount,
                                  (t.sum_works_high + t.sum_equips_high + t.sum_materials_high)*(1-t.discount/100) sum_high_full,
                                  (t.sum_works_high + t.sum_equips_high + t.sum_materials_high)*(1-t.discount/100) - (t.sum_works_low + t.sum_equips_low + t.sum_materials_low) sum_marj,
                                  case when ((t.sum_works_high + t.sum_equips_high + t.sum_materials_high)*(1-t.discount/100)) > 0 then ((t.sum_works_high + t.sum_equips_high + t.sum_materials_high)*(1-t.discount/100) - (t.sum_works_low + t.sum_equips_low + t.sum_materials_low))/((t.sum_works_high + t.sum_equips_high + t.sum_materials_high)*(1-t.discount/100))*100 else 0 end as proc_marj
                                From (
                                Select
                                  c.sum_works_low,
                                  c.total_work,
                                  c.sum_works_high,
                                  isnull(c.starting_work, 0) starting_work,
                                  c.sum_equips_low,
                                  c.sum_equips_high,
                                  c.starting_work_low,
                                  c.starting_work_high,
                                  isNull(c.expences, 0) expences,
                                  isnull(c.sum_materials_low, 0) sum_materials_low,
                                  isnull(c.sum_materials_high, isnull(c.sum_materials_low, 0) * isnull(dbo.get_price_expences(getdate(), c.sum_materials_low), 0)) sum_materials_high,
                                  c.koef_indirect,
                                  c.discount,
                                  Round((Select
                                   Sum(isNull(ph.sum, 0))
                                  From PaymentHistory ph inner join Contracts_v cntr on (cntr.ContrS_id = ph.cntr_id)
                                  Where ph.DelDate is Null
                                    and cntr.calc_id = c.Calc_id), 2) SumPay,
                                  isnull((select Sum(isnull(t.sum_price_high, 0)) from costcalcequips_v t where t.calc_id = c.calc_id), 0) sum_equips_high_standart,
                                  (select top 1 t.contrnums from contractss t where t.calc_id = c.calc_id and t.doctype_id in (3, 8)) contrnums 
                                From CostCalculations c
                                Where c.calc_id = " . $_POST['calc_id']  . "
                                ) t";
            $Res = $Query->QueryRow();
            $Result['StartingWork'] = $Res['starting_work'];
            $Result['Expences'] = $Res['expences'];
            $Result['TotalWork'] = $Res['total_work'];
            $Result['StartingWorkLow'] = $Res['starting_work_low'];
            $Result['Koef'] = $Res['koef_indirect'];
            $Result['SumLowFull'] = $Res['sum_low_full'];
            $Result['SumHighFull'] = $Res['sum_high_full'];
            $Result['Discount'] = $Res['discount'];
            $Result['SumMarj'] = $Res['sum_marj'];
            $Result['ProcMarj'] = $Res['proc_marj'];
            
            $Result['SumEquipsLow'] = $Res['sum_equips_low'];
            $Result['SumEquipsHigh'] = $Res['sum_equips_high'];
            $Result['SumWorkLow'] = $Res['sum_works_low'];
            $Result['SumWorkHigh'] = $Res['sum_works_high'];
            $Result['SumMaterialsLow'] = $Res['sum_materials_low'];
            $Result['SumMaterialsHigh'] = $Res['sum_materials_high'];
            $Result['SumEquipsHighDefault'] = $Res['sum_equips_high_standart'];
            $Result['SumPay'] = $Res['SumPay'];
            
        }
        
        echo json_encode($Result);
        
    }
    
    public function actionIndex()
    {
        if (isset($_GET['calc_id']))
        {
            $model = new CostCalculations();
            $model->getModelPk($_GET['calc_id']);
            
            $query = new SQLQuery();
            $query->text = "  Select
                                sum(case when type = 0 and date_annul is null and date_ready is not null then 1 else 0 end) over(partition by ccg.cgrp_id) count_type0,
                                sum(case when type = 1 and date_annul is null then 1 else 0 end) over(partition by ccg.cgrp_id) count_type1
                            From CostCalcGroups ccg left join CostCalculations c on (ccg.cgrp_id = c.cgrp_id)
                            Where ccg.cgrp_id = " . $model->cgrp_id;
            $Res = $query->QueryRow();
            
            $this->title = $model->CostCalcType;
            
            $this->render('index', array(
                'model' => $model,
                'count_type0' => $Res['count_type0'],
                'count_type1' => $Res['count_type1'],
            ));
        }
    }
    
    public function actionReady() 
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Calc_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'READY_CostCalculations';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Calc_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['Calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }
    
    public function actionUndoReady() 
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Calc_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UNDO_ReadyCostCalculations';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Calc_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['Calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }
    
    
    public function actionAgreed() 
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Calc_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'AGREED_CostCalculations';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Calc_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }
    
    public function actionUndoAgreed() 
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Calc_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UNDO_AgreedCostCalculations';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Calc_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->CheckParam = true;
            $Res = $sp->Execute();

            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['Calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }
    
    public function actionCopy() 
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['cgrp_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'ADD_CostCalculations';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['cgrp_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->Parameters[2]['Value'] = 0;
            $sp->Parameters[3]['Value'] = 0;
            $sp->Parameters[4]['Value'] = null;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }
    
    public function actionAdd() 
    {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['Params'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'ADD_CostCalculations';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['Params']['cgrp_id'];
            $sp->Parameters[1]['Value'] = Yii::app()->user->Employee_id;
            $sp->Parameters[2]['Value'] = $_POST['Params']['type'];;
            $sp->Parameters[3]['Value'] = null;
            $sp->Parameters[4]['Value'] = null;
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }
    
    public function actionUpdateDetails()
    {
        $model = new CostCalculations();
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        $sum_full = 0;
        if (isset($_POST['sum_full']))
            $sum_full = $_POST['sum_full'];
        
        if (isset($_POST['calc_id']))
            $model->getModelPk($_POST['calc_id']);

        if (isset($_POST['CostCalculations'])) {
            $model->getModelPk($_POST['CostCalculations']['calc_id']);
            $model->attributes = $_POST['CostCalculations'];
            $model->EmplChange = Yii::app()->user->Employee_id;
            if ($model->validate()) {
                $model->Update();
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $model->calc_id;
                echo json_encode($ObjectResult);
                return;
            }
        }

        $ObjectResult['html'] = $this->renderPartial('_form_details', array(
            'model' => $model,
            'sum_full' => $sum_full
        ), true);
        echo json_encode($ObjectResult);
    }
    
    public function actionUpdateKoef() {
        $ObjectResult = array(
            'result' => 0,
            'id' => 0,
            'html' => '',
        );
        
        if (isset($_POST['koef']) && isset($_POST['calc_id'])) {
            $sp = new StoredProc();
            $sp->ProcedureName = 'UPDATE_CostCalcKoefIndirect';
            $sp->ParametersRefresh();
            $sp->Parameters[0]['Value'] = $_POST['calc_id'];
            $sp->Parameters[1]['Value'] = $_POST['koef'];
            $sp->CheckParam = true;
            $Res = $sp->Execute();
            
            $ObjectResult['result'] = 1;
            $ObjectResult['id'] = $Res['calc_id'];
        }
        
        echo json_encode($ObjectResult);
    }
}

