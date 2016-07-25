<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
error_reporting(E_ALL);

return array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Эльтон - корпоративный портал',
        'language'=>'ru',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
		'application.helpers.*',
	),
        
        
        
	'modules'=>array(
		// uncomment the following to enable the Gii tool
		'admin',
                
		'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'root',
			// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('192.168.5.39','192.168.5.83','127.0.0.1','::1'),
		),
		
	),

	// application components
	'components'=>array(
                
                'LockManager' => array(
                    'class' => 'LockManager',
                ),
            
                'clientScript' => array(
                    'packages' => array(
                        'jquery_js' => array(
                            'baseUrl' => '/js',
                            'js' => array(
                                'jquery-1.11.3.min.js',
                                'jquery-ui-stable.js',
                                'jquery.mask.js',
                                'aliton-widgets.js',
                                '/jqwidgets/localization.js',
                                'aliton-sources.js',
                                'aliton-settings.js',
                                '/jqwidgets/jqx-all.js',
                                '/jqwidgets/globalization/globalize.js',
                                '/jqwidgets/globalization/globalize.culture.ru-RU.js',
                            ),
                            'css' => array(
                                '/jqwidgets/styles/jqx.base.css',
                                '../css/aliton.css',
                            ),
                        ),
                        'jquery_ui_css' => array(
                            'baseUrl' => '/css',
                            'css' => array(
                                'jquery-ui.css',
                                
                            ),
                        ),
                        'widgets_css' => array(
                            'baseUrl' => '/css',
                            'css' => array(
                                    'aliton-widgets.css',
                            ),
                        ),
                        'widgets' => array(
                                'baseUrl' => '/js',
                                
                                'js' => array(
                                        //'widgets.js',
                                        'aliton.js',
                                        'new_main.js',
                                        //'aliton-widgets.js',
                                ),
                        ),
                        'graj' => array(
                                'baseUrl' => '/js',
                                'js' => array(

                                        //'algridajax.js',
                                ),
                        ),
                    ),
                ),
            
                'authManager' => array(
                    // Будем использовать свой менеджер авторизации
                    'class' => 'PhpAuthManager',
                    // Роль по умолчанию. Все, кто не админы, модераторы и юзеры — гости.
                    'defaultRoles' => array('guest'),
                ),
		'user'=>array(
			'class' => 'WebUser',
                        // enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
                
            
                'ldap' => array(
                        'class' => 'LdapComponent',
                        'baseDn' => 'dc=aliton,dc=net', //example.org
                        'accountSuffix' => '@aliton.net',
                        'domainControllers' => array('aliton.net'),
                        'adminUsername' => 'rpy',
                        'adminPassword' => 'd13f15ff'
                ),
            
		// uncomment the following to enable URLs in path-format
		/*
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
			),
		),
		*/

		// database settings are configured in database.php
		'db'=>require(dirname(__FILE__).'/database.php'),

		'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		),
                
                'enableProfiling'=>true,
                'enableParamLogging' => true,
            
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),

	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'p.rogov@aliton.ru',
	),
);
