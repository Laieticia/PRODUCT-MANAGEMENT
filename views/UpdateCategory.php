<?php

session_start();
if (!isset($_SESSION['user'])){
    header('Location:../index.php');
}
?>


<?php
  require_once "../model/Categorydb.php";
  $Categorydb = new Categorydb();
  $Category = null;


  if(isset($_GET['Id'])){
    $Category = $Categorydb->read($_GET['Id']);
  }else{
    header("Location:ListCategory.php");
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
                        <h1 class="h3 mb-0 text-gray-800">UpdateCategory</h1>
                    </div>

                    <!-- Content Row -->
                           <!-- Collapsable Card Example -->
                           
                           <div class="card shadow col-md-8 offset-2">
                            <!-- Card Header - Accordion -->
                            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
                                role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                <h6 class="m-0 font-weight-bold text-primary">Tap to update the category</h6>
                            </a>
                            <!-- Card Content - Collapse -->
                            <div class="collapse show" id="collapseCardExample">
                              <?php 
                              if($Category != null){
                              ?>
                               <div class="card-body">
                                    <form method="POST" action="../controllers/Categorycontroller.php?action=update">
                                        <div class="mb-3">
                                            <div id="emailHelp" class="form-text">Category</div>
                                            <input type="hidden" class="form-control" name="Id" value="<?php echo $Category->Id ?>">
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputPassword1" class="form-label">Name</label>
                                          <input type="text" name="Libelle" class="form-control" id="exampleInputName"  value="<?php echo $Category->Libelle ?>">
                                        </div>
                                        <div class="mb-3">
                                          <label for="exampleInputid"  class="form-label" >Description</label>
                                          <input type="text" class="form-control" name="Description" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $Category->Description ?>" >
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
