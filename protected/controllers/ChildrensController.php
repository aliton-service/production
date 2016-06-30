<?php

class ChildrensController extends Controller
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
                    'actions'=>array('index', 'view'),
                    'roles'=>array('ViewPositions'),
            ),
            array('allow', 
                    'actions'=>array('create'),
                    'roles'=>array('CreatePositions'),
            ),
            array('allow', 
                    'actions'=>array('update'),
                    'roles'=>array('UpdatePositions'),
            ),
            array('allow', 
                    'actions'=>array('delete'),
                    'roles'=>array('DeletePositions'),
            ),
            array('deny',  // deny all users
                    'users'=>array('*'),
            ),
        );
    }

    public function actionCreate($Ajax = false, $Employee_id = null)
    {
        $this->title = 'Создание новой должности';
        $model = new Childrens();
        $model->Employee_id = $Employee_id;
        $model->setScenario('Insert');

        if(isset($_POST['Childrens'])) {
            $model->attributes=$_POST['Childrens'];
            $model->EmplCreate = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->insert();
                //$this->redirect(Yii::app()->createUrl('Childrens/index'));
            }    
        }
        
        if ($Ajax)
            $this->renderPartial('create',array(
                'model'=>$model,
                'ajax'=>$Ajax,
            ), false, true);
        else
            $this->render('create',array(
                    'model'=>$model,
                    'ajax'=>$Ajax,
            ));
    }


    public function actionUpdate($Children_id)
    {
        $this->title = 'Редактирование должности';

        $model = new Childrens();
        $model->setScenario('Update');
        
        
        if ($Children_id == null)
                throw new CHttpException(404, 'Не выбрана запись.');

        if(isset($_POST['Childrens']))
        {
            $model->attributes=$_POST['Childrens'];

            $model->EmplChange = Yii::app()->user->Employee_id;

            if ($model->validate()) {
                $model->update();
            }
        }
        else
        {
            $model->getmodelPk($Children_id);
            $this->title .= ' ' . $model->ChildrenName;
        }

        $this->render('update', array(
                'model'=>$model,
                'ajax'=>false,
            )
        );
    }

    public function actionDelete($Children_id)
    {
        $model = new Childrens();
        $model->getmodelPk($Children_id);
        $model->delete();

        $this->redirect($this->createUrl('Employees/Index'));
    }

    public function actionIndex($Ajax = true)
    {
        $this->title = 'Просмотр детей';
        $this->renderPartial('index', null, null, true);
        
    }
}



