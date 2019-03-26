<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

include_once 'restframe/web.php';

include_once 'handlers_class.php';




$handlers = array(
				'/' => new indexHandler(),
				'/user/add' => new userAdd(),

			);

$app = new WebApplication($handlers);
$app->run();




?>