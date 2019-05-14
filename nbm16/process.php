<?php
session_start();
//$mysqli = new mysqli ('localhost', 'napietel_krisz', 'mualim13', 'napietel_crud') or die(mysqli_error($mysqli));
$mysqli = new mysqli ('localhost', 'dev', '', 'crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
  $ar = $_POST['ar'];
  $leves = $_POST['leves'];
  $kiemelt = $_POST['kiemelt'] ? $_POST['kiemelt'] : 0;
  $mysqli->query("INSERT INTO data (ar,leves,kiemelt) VALUES ('$ar','$leves','$kiemelt')") or
  die($mysqli->error);

  // INSERT INTO data (ar,leves,kiemelt) VALUES ('345','leves','0')
  // INSERT INTO data (ar,leves,kiemelt) VALUES ('
  // ', '', '');drop table teszt;-- 
  // 345','leves','0')
  //https://www.php.net/manual/en/mysqli.prepare.php

  $_SESSION['message'] = "Sikeres mentés!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");

}

if (isset($_POST['save_01'])) {
  $ar_01 = $_POST['ar_01'];
  $foetel = $_POST['foetel'];
  $kiemelt = $_POST['kiemelt'] ? $_POST['kiemelt'] : 0;
  $mysqli->query("INSERT INTO foetel (ar_01,foetel,kiemelt) VALUES ('$ar_01','$foetel','$kiemelt')") or
  die($mysqli->error);

  $_SESSION['message'] = "Sikeres mentés!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");

}
if (isset($_POST['save_02'])) {
  $ar_02 = $_POST['ar_02'];
  $desszert = $_POST['desszert'];
  $kiemelt = $_POST['kiemelt'] ? $_POST['kiemelt'] : 0;
  $mysqli->query("INSERT INTO desszert (ar_02,desszert,kiemelt) VALUES ('$ar_02','$desszert','$kiemelt')") or
  die($mysqli->error);

  $_SESSION['message'] = "Sikeres mentés!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");

}

if (isset($_POST['save_03'])) {
  $ar_03 = $_POST['ar_03'];
  $napi_leves = $_POST['napi_leves'];
  $napi_menu = $_POST['napi_menu'];
  $mysqli->query("INSERT INTO napi_menu (ar_03,napi_menu,napi_leves) VALUES ('$ar_03','$napi_menu','$napi_leves')") or
  die($mysqli->error);

  $_SESSION['message'] = "Sikeres mentés!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");

}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $mysqli->query("DELETE FROM data WHERE id=$id") or die ($mysqli->error());

  $_SESSION['message'] = "Sikeres törlés!";
  $_SESSION['msg_type'] = "danger";

  header("location: index.php");

}
if (isset($_GET['delete_01'])) {
  $id = $_GET['delete_01'];
  $mysqli->query("DELETE FROM foetel WHERE id=$id") or die ($mysqli->error());

  $_SESSION['message'] = "Sikeres törlés!";
  $_SESSION['msg_type'] = "danger";

  header("location: index.php");

}

if (isset($_GET['delete_02'])) {
  $id = $_GET['delete_02'];
  $mysqli->query("DELETE FROM desszert WHERE id=$id") or die ($mysqli->error());

  $_SESSION['message'] = "Sikeres törlés!";
  $_SESSION['msg_type'] = "danger";

  header("location: index.php");

}

if (isset($_GET['delete_03'])) {
  $id = $_GET['delete_03'];
  $mysqli->query("DELETE FROM napi_menu WHERE id=$id") or die ($mysqli->error());

  $_SESSION['message'] = "Sikeres törlés!";
  $_SESSION['msg_type'] = "danger";

  header("location: index.php");

}


