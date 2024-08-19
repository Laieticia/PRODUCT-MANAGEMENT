<?php
  require_once "./Controller.php";
  require_once "../model/Upload.php";

  $action = $_GET["action"];
  if($action == "create"){
    $Name= $_POST['Name'];
    $Price= $_POST['Price'];
    $Quantity= $_POST['Quantity'];
    $Image= $Upload->upload_image($_FILES['Image'],'img-',800,700,'../views/images/');
    $CategoryId= $_POST['CategoryId'];
   


    $Productdb->create($Name, $Price,  $Quantity, $Image, $CategoryId);
    header("location:../views/ListProduct.php?success=true");
  }

  if($action == "update"){
    $Id= $_POST['Id'];
    $Name= $_POST['Name'];
    $Price= $_POST['Price'];
    $Quantity= $_POST['Quantity'];
    $Image= $_FILES['Image'];
    //$Image= $Upload->upload_image($_FILES['Image'],'img-',800,700,'../views/images/');
    $CategoryId= $_POST['CategoryId'];
 


    $Productdb->update($Id, $Name, $Price,  $Quantity, $Image, $CategoryId);
    header("location:../views/ListProduct.php?update_success=true");
  }

  if($action == "delete"){
    $Id= $_GET['Id'];
    $Productdb->delete($Id);
    header("location:../views/ListProduct.php?delete_success=true");
  }





?>