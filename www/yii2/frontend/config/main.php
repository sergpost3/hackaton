<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'components' => [
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
			'rules'=>array(
				''=>'index/index',
                'events'=>'events/index',
                '/events/add' => 'events/add',
                '/events/<eventname>' => 'events/show',
                '/events/edit/<eventname>' => 'events/edit',
                'services'=>'services/index',
                '/services/<servicename>'=>'services/show',
				'<action>'=>'index/<action>',
				'/users/<useremail:[a-z0-9\-\_]+\.[a-z0-9\-\_]+[\.\d]{0,}>' => 'users/show',
			),
        ],
    ],
    'params' => $params,
	'modules'=>array(
        'gii'=>array(
            'class'=>'system.gii.GiiModule',
            'password'=>'задайте свой пароль',
            // 'ipFilters'=>array(…список IP…),
            // 'newFileMode'=>0666,
            // 'newDirMode'=>0777,
        ),
    ),
];
