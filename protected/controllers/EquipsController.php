<?php

class EquipsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout = '//layouts/column2';
	public $title = '';

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
				'actions' => array('index', 'view', 'equipAnalog', 'merge'),
				'roles' => array(
					'ViewEquips',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('create'),
				'roles' => array(

					'CreateEquips',

				),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions' => array('update'),
				'roles' => array(

					'UpdateEquips',

				),
			),
                        array('allow', 
				'actions' => array('EquipInfo', 'EquipInfoStorage', 'GetInvInfo', 'Inventory', 'Reserve'),
				'users' => array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions' => array('delete'),
				'roles' => array(

					'DeleteEquips',

				),

			),
			array('deny',  // deny all users
				'users' => array('*'),
			),
		);
	}

	
        public function actionEquipInfo() {
            $Info = array(
                'Check' => 0,
                'Quant' => 0,
                'QuantUsed' => 0,
                'QuantReserv' => 0,
            );
            
            if (isset($_POST['Equip_id'])) {
                $Query = new SQLQuery();
                $Query->setSelect("\nSelect
                                        dbo.get_wh_inventory(t.eqip_id, getdate(), 0, 1) quant,
                                        dbo.get_wh_inventory(t.eqip_id, getdate(), 1, 1) quant_used,
                                        dbo.get_wh_reserv(t.eqip_id, getdate(), 1) quant_reserv");
                $Query->setWhere("\nFrom (Select " . $_POST['Equip_id'] . " as eqip_id) t");
                $Result = $Query->QueryRow();
                $Info['Quant'] = $Result['quant'];
                $Info['QuantUsed'] = $Result['quant_used'];
                $Info['QuantReserv'] = $Result['quant_reserv'];
                $Info['Check'] = 1;
            }
            echo json_encode($Info);
        }
        
        public function actionEquipInfoStorage() {
            $Info = array(
                'Check' => 0,
                'Quant' => 0,
                'QuantUsed' => 0,
                'QuantReserv' => 0,
            );
            
            if (isset($_POST['Equip_id'])) {
                $Query = new SQLQuery();
                $Query->setSelect("\nSelect
                                        dbo.get_wh_inventory(t.eqip_id, getdate(), 0, 1) quant,
                                        dbo.get_wh_inventory(t.eqip_id, getdate(), 1, 1) quant_used,
                                        dbo.get_wh_inventory(t.eqip_id, getdate(), 0, 2) quant2,
                                        dbo.get_wh_inventory(t.eqip_id, getdate(), 1, 2) quant_used2
                                        ");
                $Query->setWhere("\nFrom (Select " . $_POST['Equip_id'] . " as eqip_id) t");
                $Result = $Query->QueryRow();
                $Info['Storage1Quant'] = $Result['quant'];
                $Info['Storage1QuantUsed'] = $Result['quant_used'];
                $Info['Storage2Quant'] = $Result['quant2'];
                $Info['Storage2QuantUsed'] = $Result['quant_used2'];
                $Info['Check'] = 1;
            }
            echo json_encode($Info);
        }
        
        public function actionGetInvInfo() {
            $Result = array(
                'result' => 0,
                'inv_quant' => 0,
                'inv_quant_used' => 0,
                'res_quant' => 0,
                'ready_quant' => 0,
                'min_quant' => 0,
            );
            if (isset($_POST['Equip_id']) && isset($_POST['Strg_id'])) {
                $Query = new SQLQuery();
                $Query->setSelect("\ndeclare
                                        \n@date datetime,
                                        \n@eqip_id int,
                                        \n@strg_id int

                                        \nset @eqip_id = " . $_POST['Equip_id'] . "
                                        \nset @strg_id = " . $_POST['Strg_id'] . "
                                        \nset @date = getdate()
                                    \nSelect
                                        \nisnull(dbo.get_wh_inventory(@eqip_id, @date, 0, @strg_id), 0) inv_quant,
                                        \nisnull(dbo.get_wh_inventory(@eqip_id, @date, 1, @strg_id), 0) inv_quant_used,
                                        \nisnull(dbo.get_wh_reserv(@eqip_id, @date, @strg_id), 0) res_quant,
                                        \nisnull(dbo.get_wh_ready(@eqip_id, @date, @strg_id), 0) ready_quant,
                                        \nisnull(dbo.get_reserv(@eqip_id, @date), 0) min_quant");
                $Res = $Query->QueryRow();
                $Result['result'] = 1;
                $Result['inv_quant'] = $Res['inv_quant'];
                $Result['inv_quant_used'] = $Res['inv_quant_used'];
                $Result['res_quant'] = $Res['res_quant'];
                $Result['ready_quant'] = $Res['ready_quant'];
                $Result['min_quant'] = $Res['min_quant'];
            }
            
            echo json_encode($Result);
        }
        
	public function actionView($id)
	{
		$this->render('view', array(
			'model' => $this->loadModel($id),
		));
	}

	public function actionCreate()
	{
            $model = new Equips();
            $ObjectResult = array(
                    'result' => 0,
                    'id' => 0,
                    'html' => '',
                );
            if (isset($_POST['Equips'])) {
                $model->attributes = $_POST['Equips'];
                if ($model->validate()) {
                    $Res = $model->Insert();
                    $ObjectResult['result'] = 1;
                    $ObjectResult['id'] = $Res['Equip_id'];
                    echo json_encode($ObjectResult);
                    return;
                } 
            }

            $ObjectResult['html'] = $this->renderPartial('_form', array(
                'model' => $model,
            ), true);
            echo json_encode($ObjectResult);

	}

	public function actionUpdate($id)
	{
		$model = new Equips;
		if ($id == null)
			throw new CHttpException(404, 'Не выбран сотрудник.');

//		if (!Yii::app()->LockManager->LockRecord('Equips', $model->tableSchema->primaryKey, $id))
//			throw new CHttpException(404, 'Запись заблокирована другим пользователем');

		if($id && (int)$id > 0 && isset($_POST['Equips'])) {
			$model->attributes = $_POST['Equips'];
			$model->Equip_id = (int)$id;
			$model->EmplChange = Yii::app()->user->Employee_id;
			if ($model->validate()) {
				$model->update();
				if ($this->isAjax()) {
					die(json_encode(array('status' => 'ok', 'data' => array('msg' => 'Запись о оборудовании успешно изменена'))));
				} else {

					$this->redirect('/?r=Equips');
				}
			}
		} else {
			$model->getModelPk($id);
		}
		if($this->isAjax()) {
			$this->renderPartial('update', array('model'=>$model), false, true);
		} else {
			$this->render('update', array('model'=>$model));
		}


	}

	public function actionDelete($id)
	{
		//$this->loadModel($id)->delete();

		$model = new Equips;
		$model->Equip_id = $id;
		$model->EmplDel = Yii::app()->user->Employee_id;
		$model->delete();
		if($this->isAjax()) {
			die(json_encode(array('status'=>'ok','data'=>array('msg'=>'Запись о оборудовании успешно удалена'))));
		}
		else {
			$this->redirect('/?r=Equips');
		}

	}

	public function actionIndex() {
            $this->title = 'Оборудование';
            $this->pageTitle = 'Оборудование';
            $this->render('index');
	}

	public function actionAdmin()
	{
		$model = new Equips('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Equips']))
			$model->attributes = $_GET['Equips'];

		$this->render('admin', array(
			'model' => $model,
		));
	}

	public function actionEquipAnalog($id, $ajax = false)
	{
		$model = new Equips();
		$info = $model->getInfoForAnalog($id);
		$analog = $model->getAnalog($id);

		if ($ajax) {
			$this->renderPartial('analog', array('info' => $info, 'analog' => $analog));
			return false;
		}
		$this->render('analog', array('info' => $info, 'analog' => $analog));

	}


	public function actionMerge($id = false) {
		$model = new Equips();
		if(isset($_POST['Equips'])) {
			$model->attributes = $_POST['Equips'];
			$model->callProc('MergeEquips');
		}
		if(!$id > 0) {
			return false;
		}

		$model->getModelPk($id);

		$this->render('merge', array('model'=>$model));
	}
        
        public function actionInventory() {
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
            if (isset($_GET['Equip_id'])) {
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $_GET['Equip_id'];
                $ObjectResult['html'] = $this->renderPartial('equipinventory', array(
                        'Equip_id' => $_GET['Equip_id'],
                    ), true);
                
            }
            
            echo json_encode($ObjectResult);
        }
        
        public function actionReserve() {
            $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
            if (isset($_GET['Equip_id'])) {
                $ObjectResult['result'] = 1;
                $ObjectResult['id'] = $_GET['Equip_id'];
                $ObjectResult['html'] = $this->renderPartial('equipreserve', array(
                        'Equip_id' => $_GET['Equip_id'],
                    ), true);
                
            }
            
            echo json_encode($ObjectResult);
        }

}

