<?php

session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../index.php');
}
?>

<?php
    require_once "../model/Productdb.php";
    require_once "../model/Categorydb.php";
  $Productdb = new Productdb();
  $Categorydb = new Categorydb();
  $Products = $Productdb->readAll();

?>
<?php
  include './Layouts/sidebar.php';
  include './Layouts/navbar.php';
  ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">List Product</h1>   <button onclick="window.exportToExcel();" class="btn btn-primary" >Export To Excel</button>
                        <button class="btn btn-primary" id="" onclick="window.location.href='generate_pdfprod.php'">print</button>
                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Image</th>
                                                <th>CategoryId</th>
                                                

                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            if($Products != null && (sizeof($Products)!=0)){
                                                $i=1;
                                                foreach($Products as $Pro){
                                                    $delete='../controllers/Productcontroller.php?action=delete&Id=' .  $Pro->Id;
                                                    $update='UpdateProduct.php?Id=' .  $Pro->Id;
                                                    $Category=$Categorydb->read($Pro->CategoryId)

                                            ?>
                                            
                                            <tr>
                                            <td><?php echo $i++ ;?></td>
                                                <td><?php echo $Pro->Name; ?></td>
                                                <td><?php echo $Pro->Price; ?> </td> 
                                                <td><?php echo $Pro->Quantity; ?></td>
                                                <td> <img src="images/<?php echo $Pro->Image; ?>" alt="image of product" width="50" height="50" ></td>
                                                <td><?php echo $Category->Libelle; ?> </td>
                                             
                                                <td>
                                                    <div class="text-center">
                                                        <a href="#" class="btn btn-success btn-circle" style="align-items: center;" onclick="document.location.href='<?php echo $update; ?>'">
                                                            <i class="fas fa-pen" ></i>
                                                        </a>
                                                        <a href="#" class="btn btn-warning btn-circle">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-circle" onclick="document.location.href='<?php echo $delete; ?>'">
                                                            <i class="fas fa-trash"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php 
                                                }
                                            }
                                            ?>
                                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                    

                </div>
                <!-- /.container-fluid -->
                <?php
  include './Layouts/footer.php';
  ?>