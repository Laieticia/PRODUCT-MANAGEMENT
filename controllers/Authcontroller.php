<?php
require_once './Controller.php';
$action = $_GET['action'];
if ($action == 'login') {
    session_start();
    $login =$_POST['login'];
    $Password =$_POST['Password'];
    $user = $Usersdb->readcompte($login, $Password);

    if ($user != null) {
        $_SESSION['user'] = $user;
        if ($user->Role == 'administrator') {
            header('location:../views/index.php');
        } else {
            header('location:../views/index.php');
        }
    } else {
        header('location:../index.php');
    }
}
if ($action == 'logout') {
    session_start();
    $user = $_SESSION['user'];
    session_destroy();
    if ($user->Role == 'administrator') {
        header('location:../index.php');
    } else {
        header('location:../index.php');
    }
}
?>
