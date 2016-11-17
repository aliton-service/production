<?php

class ObjectsGroupSystemsController extends Controller
{
    protected $title = '';
    protected $action_url = '';
    
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
                    'actions'=>array('Index', 'GetCompetitor', 'GetSystemComplexitys'),
                    'roles'=>array('ViewObjectsGroupSystems'),
                ),
            array('allow',
                    'actions'=>array('Insert'),
                    'roles'=>array('InsretObjectsGroupSystems'),
                ),
            array('allow',
                    'actions'=>array('Update'),
                    'roles'=>array('UpdateObjectsGroupSystems'),
                ),
            array('allow',
                    'actions'=>array('Delete'),
                    'roles'=>array('DeleteObjectsGroupSystems'),
                ),
            array('deny',  // deny all users
			'users'=>array('*'),
                ),
        );
    }
    
    public function actionIndex()
    {
        // Выводим грид
        if (isset($_GET['ObjectGr_id']))
        {
            $ObjectGr_id = $_GET['ObjectGr_id'];
            $model = new ObjectsGroupSystems();
//            $model = $model->Find(array('ObjectGr_id' => $ObjectGr_id));
            
            $this->renderPartial('index', array(
                'model' => $model,
                'ObjectGr_id' => $ObjectGr_id,
            ), false, true);
        }
    }
    
    public function actionInsert()
    {
        $this->title = 'Добавление системы';
        
        $model = new ObjectsGroupSystems();
        
        if (isset($_POST['ObjectGr_id'])) {
            $model->ObjectGr_id = $_POST['ObjectGr_id'];
        }
                
        if (isset($_POST['ObjectsGroupSystems']))
        {
            $model->attributes = $_POST['ObjectsGroupSystems'];
            
            if ($model->validate())
            {
                $model->Insert();
                echo '1';
                return;
            }

        }
        
        
            
        $this->renderPartial('_form', array(
            'model' => $model
        ));
        
    }
    
    public function actionUpdate()
    {
        $this->title = 'Редактирование системы';
        
        if (isset($_POST['ObjectsGroupSystem_id'])) 
            $ObjectsGroupSystem_id = $_POST['ObjectsGroupSystem_id'];
        
        $model = new ObjectsGroupSystems();
        
        if (isset($_POST['ObjectsGroupSystems']))
        {
            $model->getModelPk($_POST['ObjectsGroupSystems']['ObjectsGroupSystem_id']);
            $model->attributes = $_POST['ObjectsGroupSystems'];
            $ObjectsGroupSystem_id = $model->ObjectsGroupSystem_id;
            
            if ($model->validate())
            {
                $model->Update();
                echo '1';
                return;
            }

        }
        
        $model->getModelPk($ObjectsGroupSystem_id);
        $this->renderPartial('_form', array(
            'model' => $model
        ));
        
    }
    
    public function actionDelete()
    {
        if(isset($_POST['ObjectsGroupSystem_id'])) {
            $ObjectsGroupSystem_id = $_POST['ObjectsGroupSystem_id'];
        }
        $model = new ObjectsGroupSystems;
        $model->getModelPk($ObjectsGroupSystem_id);

        if(!is_null($ObjectsGroupSystem_id)){
            $model->delete();
        }

        $this->redirect($this->createUrl('ObjectsGroupSystems/Index'));
    }
    
    public function actionGetCompetitor() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['ObjectsGroupSystem_id'])) {
            $Query = new SQLQuery();
            $Query->setSelect("Select cast(dbo.get_competitor_info(:#ObjectsGroupSystem_id) as nvarchar(250)) as Name");
            $Query->bindParam('ObjectsGroupSystem_id', $_POST['ObjectsGroupSystem_id']);
            $Row = $Query->QueryRow();
            $ObjectResult['result'] = 1;
            $ObjectResult['html'] = $Row['Name'];
        }
        
        echo json_encode($ObjectResult);
    }   
    
    public function actionGetSystemComplexitys() {
        $ObjectResult = array(
                'result' => 0,
                'id' => 0,
                'html' => '',
            );
        
        if (isset($_POST['ObjectsGroupSystem_id'])) {
            $Query = new SQLQuery();
            $Query->setSelect("Select SystemComplexityFull From ObjectsGroupSystems Where ObjectsGroupSystem_id = :#ObjectsGroupSystem_id");
            $Query->bindParam('ObjectsGroupSystem_id', $_POST['ObjectsGroupSystem_id']);
            $Row = $Query->QueryRow();
            $ObjectResult['result'] = 1;
            $ObjectResult['html'] = $Row['SystemComplexityFull'];
        }
        
        echo json_encode($ObjectResult);
    }   
}

