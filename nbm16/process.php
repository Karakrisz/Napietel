<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once("db-connect.php");
//$mysqli = new mysqli ('localhost', 'napietel_krisz', 'mualim13', 'napietel_crud') or die(mysqli_error($mysqli));
//$mysqli = new mysqli ('localhost', 'root', '', 'napietel_crud') or die(mysqli_error($mysqli));

if (isset($_POST['save'])) {
    $ar = $_POST['ar'];
    $leves = $_POST['leves'];
    $kiemelt = $_POST['kiemelt'] ? $_POST['kiemelt'] : 0;
    $dbc->query("INSERT INTO data (ar,leves,kiemelt) VALUES ('$ar','$leves','$kiemelt')") or
    die($dbc->error);

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
    $dbc->query("INSERT INTO foetel (ar_01,foetel,kiemelt) VALUES ('$ar_01','$foetel','$kiemelt')") or
    die($dbc->error);

    $_SESSION['message'] = "Sikeres mentés!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}
if (isset($_POST['save_02'])) {
    $ar_02 = $_POST['ar_02'];
    $desszert = $_POST['desszert'];
    $kiemelt = $_POST['kiemelt'] ? $_POST['kiemelt'] : 0;
    $dbc->query("INSERT INTO desszert (ar_02,desszert,kiemelt) VALUES ('$ar_02','$desszert','$kiemelt')") or
    die($dbc->error);

    $_SESSION['message'] = "Sikeres mentés!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if (isset($_POST['save_03'])) {
    $ar_03 = $_POST['ar_03'];
    $napi_leves = $_POST['napi_leves'];
    $napi_menu = $_POST['napi_menu'];
    $dbc->query("INSERT INTO napi_menu (ar_03,napi_menu,napi_leves) VALUES ('$ar_03','$napi_menu','$napi_leves')") or
    die($dbc->error);

    $_SESSION['message'] = "Sikeres mentés!";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");

}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $dbc->query("DELETE FROM data WHERE id=$id") or die ($dbc->error());

    $_SESSION['message'] = "Sikeres törlés!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");

}
if (isset($_GET['delete_01'])) {
    $id = $_GET['delete_01'];
    $dbc->query("DELETE FROM foetel WHERE id=$id") or die ($dbc->error());

    $_SESSION['message'] = "Sikeres törlés!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");

}

if (isset($_GET['delete_02'])) {
    $id = $_GET['delete_02'];
    $dbc->query("DELETE FROM desszert WHERE id=$id") or die ($dbc->error());

    $_SESSION['message'] = "Sikeres törlés!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");

}

if (isset($_GET['delete_03'])) {
    $id = $_GET['delete_03'];
    $dbc->query("DELETE FROM napi_menu WHERE id=$id") or die ($dbc->error());

    $_SESSION['message'] = "Sikeres törlés!";
    $_SESSION['msg_type'] = "danger";

    header("location: index.php");

}


$pEvent = filter_input(INPUT_POST, "event", FILTER_SANITIZE_SPECIAL_CHARS);
$gEvent = filter_input(INPUT_GET, "event", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_SPECIAL_CHARS);
$jelszo = filter_input(INPUT_POST, "jelszo", FILTER_SANITIZE_SPECIAL_CHARS);
$nev = filter_input(INPUT_POST, "nev", FILTER_SANITIZE_SPECIAL_CHARS);
$jelszo2 = filter_input(INPUT_POST, "jelszo2", FILTER_SANITIZE_SPECIAL_CHARS);
$uid = filter_input(INPUT_GET, "uid", FILTER_SANITIZE_SPECIAL_CHARS);


if ($pEvent == "bejelentkezés") {
    $sql = "select uid, nev from userek where email = '$email' and jelszo = md5('$jelszo')";
    $tabla = @mysqli_query($dbc, $sql);
    list($uid, $nev) = @mysqli_fetch_row($tabla);
    if (@mysqli_num_rows($tabla) == 1) { // Beléphet
        $_SESSION["uid"] = $uid;
        $_SESSION["nev"] = $nev;
        $_SESSION["email"] = $email;
        mysqli_query($dbc, $sql);
        //$uzenet = "Sikeres belépés!";
        header("Location: index.php");
        exit;
    } else { // Nem léphet be
        $uzenet = "Sikertelen belépés!";
    }
} else

    if ($gEvent == "kilépés") {
        unset($_SESSION["uid"]);
        unset($_SESSION["nev"]);
        unset($_SESSION["email"]);
        $uzenet = "Sikeres kilépés!";
    } else

        if ($pEvent == "regisztráció") {
            if ($jelszo != $jelszo2) {
                $uzenet = "A két jelszónak meg kell egyeznie!";
            } else {
                $sql = "select count(*) as db from userek where email = '$email'";
                $tabla = mysqli_query($dbc, $sql);
                list($db) = mysqli_fetch_row($tabla);
                if ($db > 0) {
                    $uzenet = "Ez az e-mail cím már regisztrálva van!<br>Adjon meg másik e-mail címet!";
                } else {
                    $sql = "insert into userek (nev, email, jelszo) values ('$nev', '$email', md5('$jelszo'))";
                    mysqli_query($dbc, $sql);
                    $uzenet = "Felhasználó létrehozása sikeres!";
                }
            }
        }
