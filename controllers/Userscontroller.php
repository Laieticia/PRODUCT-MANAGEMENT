<?php
  require_once "./Controller.php";

  $action = $_GET["action"];

  if($action == "create"){
    $Name= $_POST['Name'];
    $Surname= $_POST['Surname'];
    $Telephone= $_POST['Telephone'];
    $login= $_POST['login'];
    $Password= $_POST['Password'];
    $Email= $_POST['Email'];
    $Role= $_POST['Role'];
    $user= $Usersdb->readCompte($login, $Password);
    if ($user == false){
      $Usersdb->create($Name, $Surname,  $Telephone, $login, $Password, $Email, $Role);
      //condition
    }else{
      //condition
    }

  }

  if($action == "update"){
    $Id= $_POST['Id'];
    $Name= $_POST['Name'];
    $Surname= $_POST['Surname'];
    $Telephone= $_POST['Telephone'];
    $login= $_POST['login'];
    $Password= $_POST['Password'];
    $Email= $_POST['Email'];
    $Role= $_POST['Role'];
    
   
    $Usersdb->update($Id, $Name, $Surname,  $Telephone, $login, $Password);
    //header("location:../views/ListProduct.php?update_success=true");
  }

  if($action == "delete"){
    $Id= $_GET['Id'];
    $Usersdb->delete($Id);
    //header("location:../views/ListProduct.php?delete_success=true");
  }

