<?php

$config = (include 'config.php')['db'];

$db = mysqli_connect($config['host'], $config['user'], $config['password'], $config['database']);

if( !$db ){
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}

return $db;

// EOF