<?php

include 'db_connection.php';

$sql = "SELECT * FROM mobil";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_array($query);

var_dump($siswa);