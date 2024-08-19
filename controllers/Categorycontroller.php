<?php
  require_once "./Controller.php";

  $action = $_GET["action"];

  if($action == "create"){
    $Libelle= $_POST['Libelle'];
    $Description= $_POST['Description'];

    $Categorydb->create($Libelle, $Description);
    header("location:../views/ListCategory.php?success=true");
  }

  if($action == "update"){
    $Id= $_POST['Id'];
    $Libelle= $_POST['Libelle'];
    $Description= $_POST['Description'];

    $Categorydb->update($Id, $Libelle, $Description);

    header("location:../views/ListCategory.php?update_success=true");
  }

  if($action == "delete"){
    $Id= $_GET['Id'];
    $Categorydb->delete($Id);
    header("location:../views/ListCategory.php?delete_success=true");
  }





?>