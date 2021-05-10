<?php

use App\App;
use App\Database\DBConnection;
use App\Database\QueryBuilder;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

require 'vendor/autoload.php';
// require 'app/App.php';
// require 'app/Database/DBConnection.php';
// require 'app/Database/QueryBuilder.php';
// require 'app/Core/Router.php';
// require 'app/Core/Request.php';
// require 'app/Controllers/TaskController.php';
// require 'app/helpers.php';

App::set('config', require 'config.php');

$log = new Logger('PHP_BASICS');
$log->pushHandler(new StreamHandler('queries.log', Logger::INFO));

QueryBuilder::make(
    DBConnection::make(App::get('config')['database']),
    $log
);
