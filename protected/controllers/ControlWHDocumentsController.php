<?php
/**
 * Created by PhpStorm.
 * User: meg
 * Date: 19.01.2016
 * Time: 14:11
 */

class ControlWHDocumentsController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    public $title = '';
    public $gridFilters = null;
    public $filterDefaultValues = null;

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
                'actions' => array('index'),
                'roles' => array('ViewControlWHDocuments'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create'),
                'roles' => array('CreateControlWHDocuments'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update'),
                'roles' => array('UpdateControlWHDocuments'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'roles' => array('DeleteControlWHDocuments'),
            ),
            array('deny',  // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex()
    {
        $this->title = 'Контроль возвратов';
        $this->setPageTitle('Контроль возвратов');
        
        $Filters = array();
        $this->gridFilters = '_filters';
        $this->filterDefaultValues = $Filters;
        
        $this->render('index', array());
    }
}

