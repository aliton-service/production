<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends MainController
{
	static function isAjax() {
		return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
	}


	public function disableProfilers() {
		if (Yii::app()->getComponent('log')) {
			foreach (Yii::app()->getComponent('log')->routes as $route) {
				if (in_array(get_class($route), array('CProfileLogRoute', 'CWebLogRoute', 'YiiDebugToolbarRoute','DbProfileLogRoute'))) {
					$route->enabled = false;
				}
			}
		}
	}


	public function actionDownloadFile($file)
	{
		is_string($file) || die;
		file_exists($file) || die;
		$this->disableProfilers();
		Yii::app()->request->sendFile(basename($file),file_get_contents($file));
	}


}