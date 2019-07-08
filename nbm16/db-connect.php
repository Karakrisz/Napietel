<?php

define("HOST", "localhost");
define("DB_USER", "napietel_krisz");
define("DB_PASS", "mualim13");
define("DB_NAME", "napietel_crud");

//define("HOST", "localhost");
//define("DB_USER", "root");
//define("DB_PASS", "root");
//define("DB_NAME", "napietel_crud");


// Adatbázis csatlakozás
$dbc = mysqli_connect(HOST, DB_USER, DB_PASS, DB_NAME);
$sql = "set names utf8";
mysqli_query($dbc, $sql);

if (!$dbc) {
    die('Connect Error: ' . mysqli_connect_error());
}