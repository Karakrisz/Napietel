<?php
session_start();
$mysqli = new mysqli ('localhost', 'napietel_krisz', 'mualim13', 'napietel_crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
  $ar = $_POST['ar'];
  $leves = $_POST['leves'];
  $mysqli->query("INSERT INTO data (ar,leves) VALUES ('$ar','$leves')") or
  die($mysqli->error);

  $_SESSION['message'] = "Sikeres mentés!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");

}

if (isset($_POST['save_01'])) {
  $ar_01 = $_POST['ar_01'];
  $foetel = $_POST['foetel'];
  $mysqli->query("INSERT INTO foetel (ar_01,foetel) VALUES ('$ar_01','$foetel')") or
  die($mysqli->error);

  $_SESSION['message'] = "Sikeres mentés!";
  $_SESSION['msg_type'] = "success";

  header("location: index.php");

}
if (isset($_POST['save_02'])) {
  $ar_02 = $_POST['ar_02'];
  $desszert = $_POST['desszert'];
  $mysqli->query("INSERT INTO desszert (ar_02,desszert) VALUES ('$ar_02','$desszert')") or
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


