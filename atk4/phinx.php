<?php

declare(strict_types=1);
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

return [
	'paths' => [
		'migrations' => '%%PHINX_CONFIG_DIR%%/db/migrations',
		'seeds' => '%%PHINX_CONFIG_DIR%%/db/seeds',
		'bootstrap' => '%%PHINX_CONFIG_DIR%%/db/bootstrap.php',
	],
	'environments' => [
		'default_environment' => 'local',
		'local' => [
			'adapter' => 'mysql',
			'port' => 3306,
			'host' => 'mysql',
			'name' => $_ENV['DB_DATABASE'],
			'user' => $_ENV['DB_USERNAME'],
			'pass' => $_ENV['DB_PASSWORD'],
			'charset' => 'utf8mb4',
			'collation' => 'utf8mb4_unicode_ci',
		],
		'test' => [
			'adapter' => 'sqlite',
			'name' => './db/database',
		],
	],
	'version_order' => 'creation',
];
