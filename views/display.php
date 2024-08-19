<?php
$images=$name='';
$db = new PDO('mysql:host=localhost;dbname=image','root','');
if(isset($_POST['submit'])){
    $name=htmlspecialchars($_POST['name']);
    $images= $_FILES['images']['name'];
    $destination = 'images/'.$images;
    $imagePath = pathinfo($destination,PATHINFO_EXTENSION);
    $valid_extension =array("jpg","png", "gif");
    // if(!in_array(strtolower( $imagePath),$valid_extension)){
    //    //codition 
    // }
    // if(!move_uploaded_file( $_FILES['images']['name'],$destination)){
    //     //condition
    // }
    // else{

    // }
    $req = $db->prepare("INSERT INTO tablesss (images,name) values (:images,:name)");
    $req->bindParam(":images", $images);
    $req->bindParam(":name", $destination);
    $req->execute();
    echo "image enregistre";

}




?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>display image</title>
</head>
<body>
<form  method="POST" action="" enctype="multipart/form-data">
                                        <div class="mb-3">
                                            <div id="emailHelp" class="form-text">Product</div>
                                          
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputPassword1" class="form-label">name</label>
                                          <input type="text" name="name" class="form-control" id="exampleInputName">
                                        </div>
                                        
                                       
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">images</label>
                                            <input class="form-control" name="images" type="file" id="formFile">
                                          </div>
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
 
                                      </form>
       
</body>
</html>


