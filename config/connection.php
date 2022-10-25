<?php
/* .EnvHelper */
require_once "../app/Helpers/EnvHelper.php";
use EnvHelper\DotEnv;
/*(new DotEnv(__DIR__ . '/.env'))->load();*/
(new DotEnv('../.env'))->load();

$host = getenv('DB_HOST');
$port = getenv('DB_PORT');
$user = getenv('DB_USER');
$password = getenv('DB_PASS');
$dbname = getenv('DB_NAME');

$connection = new mysqli($host, $user, $password, $dbname, $port)
or die ('Could not connect to the database server' . mysqli_connect_error());

mysqli_set_charset($connection,"utf8");

//$connection->close();
