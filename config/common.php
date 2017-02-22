<?php
$params = require(__DIR__ . '/params.php');

$config = [
	'id' => 'app',
	'basePath' => dirname(__DIR__),
	'bootstrap' => ['log'],
	'components' => [
		'cache' => [
			'class' => 'yii\caching\FileCache',
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
		'db' => [
			'class' => 'yii\db\Connection',
			'dsn' => 'pgsql:host=localhost;dbname=baas',
			'username' => 'kasutaja',
			'password' => 'parool',
			'charset' => 'utf8',
		]
	],
	'params' => $params,
];



return $config;
