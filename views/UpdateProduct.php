<?php

session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../index.php');
}
?>


<?php 
require_once "../model/Categorydb.php";
require_once "../model/Productdb.php";

$Categorydb = new Categorydb();
$Productdb = new Productdb();

$Category = null;
$Product = null;
$Categories = $Categorydb->readAll();

if(isset($_GET['Id'])){
  $Product = $Productdb->read($_GET['Id']);
  $Category = $Categorydb->read($Product->CategoryId);
}else{
  header("Location:ListProduct.php");
}
?>




<?php
  include './Layouts/sidebar.php';
  include './Layouts/navbar.php';
  ?>
        
   
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-center mb-4">
                        <h1 class="h3 mb-0 text-gray-800">UpdateProduct</h1>
                    </div>

                    <!-- Content Row -->
                           <!-- Collapsable Card Example -->
                           
                           <div class="card shadow col-md-8 offset-2">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Tap to update the product</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                            <?php 
                              if($Product != null){
                              ?>
                                <div class="card-body">
                                    <form method="POST" enctype="multipart/form-data" action="../controllers/Productcontroller.php?action=update">
                                        <div class="mb-3">
                                            <div id="emailHelp" class="form-text">Product</div>
                                          <input type="hidden" name="Id" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $Product->Id ?>">
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputPassword1" class="form-label">Name</label>
                                          <input type="text" name="Name" class="form-control" id="exampleInputName"  value="<?php echo $Product->Name ?>">
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputid"  class="form-label" >Price</label>
                                          <input type="number" name="Price" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $Product->Price ?>">
                                        </div>
                                        <div class="mb-3">
                                        <label for="exampleInputid"  class="form-label" >Quantity</label>
                                        <input type="number" name="Quantity" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $Product->Quantity ?>">
                                          </div>
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Image</label>
                                            <input class="form-control" name="Image" type="file" id="formFile"   value="<?php echo $Product->Image ?>">
                                            <?php if (!empty($Product->Image)):?>
                                            <div>
                                            <img src="images/<?php echo $Product->Image; ?>" alt="image of product" width="50" height="50" />
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                          
                                          
                                          <div class="mb-3">
                                            <div id="emailHelp" class="form-text">CategoryId</div>
                                            <select  type="text" name="CategoryId" class="form-control" id="exampleInputName">
                                         <option value="<?php echo $Category->CategoryId ?>" >
                                         <?php echo $Category->Libelle ?>
                                         </option>
                                         <?php
                                           
                                                foreach($Categories as $Cat){
                                                  
                                                    ?>
                                                    <option value="<?php echo $Cat->Id; ?>">
                                                    <?php echo $Cat->Libelle;?>
                                                    </option>
                                           
                                                  
                                                      
                                           <?php                   
                                        }

                                      ?>
                                          
                                          </option> 
                                            </select> 
                                          </div> 
                                          
                                        <div class="mb-3 form-check">
                                          <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                          <label class="form-check-label" for="exampleCheck1">Check out</label>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                      </form>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                        </div>
                      

                </div>
                <!-- /.container-fluid -->
                <?php
  include './Layouts/footer.php';
  ?>

        
