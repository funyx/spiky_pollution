<?php

use Atk4\Ui\App;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/..');
$dotenv->load();

$app = new App([
	'title' => 'Atk4',
	'callExit' => (bool) ($_GET['APP_CALL_EXIT'] ?? true),
	'catchExceptions' => (bool) ($_GET['APP_CATCH_EXCEPTIONS'] ?? true),
	'alwaysRun' => (bool) ($_GET['APP_ALWAYS_RUN'] ?? true),
	'cdn' => [
		'atk' => 'https://cdn.jsdelivr.net/gh/atk4/ui@4.0.0/public/',
		'jquery' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/',
		'fomantic-ui' => 'https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.9.2/',
		'flatpickr' => 'https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/',
		'chart.js' => 'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/', // for atk4/chart
	]
]);

$db = new Atk4\Data\Persistence\Sql("mysql:dbname={$_ENV['DB_DATABASE']};host=mysql",$_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
$app = $app->initLayout([\Atk4\Ui\Layout\Centered::class]);

$view = new \Atk4\Ui\View();
$model = new \Atk4\Data\Model($db, ['table' => 'user']);
$model->addField('name');
$model->addField('email');
$model->addField('email_verified_at', ['type' => 'datetime']);

\Atk4\Ui\Crud::addTo($app, ['ipp' => 10])
	->setModel($model, ['id', 'name', 'email', 'email_verified_at', 'created_at', 'updated_at']);
