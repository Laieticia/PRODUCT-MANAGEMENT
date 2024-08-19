<?php

session_start();
if (!isset($_SESSION['user'])){
    header('Location: ../index.php');
}
?>

<?php
  require_once "../model/Categorydb.php";
  $Categorydb = new Categorydb();
$Categories = $Categorydb->readAll();
?>




<?php
  include './Layouts/sidebar.php';
  include './Layouts/navbar.php';
  ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">List Category</h1>  <button onclick="window.exportToExcel();" class="btn btn-primary" >Export To Excel</button> 
                    </div>

                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <form action="generate_pdf.php" method="post">
                                    <table id="example" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Description</th>
                                                                                               
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           if ($Categories != null && (sizeof($Categories)!=0)){
                                                $i=1;
                                                foreach($Categories as $Cat){
                                                    $delete='../controllers/Categorycontroller.php?action=delete&Id=' .  $Cat->Id;
                                                    $update='UpdateCategory.php?Id=' .  $Cat->Id;

                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ;?></td>
                                                <td><?php echo $Cat->Libelle; ?></td>
                                                <td><?php echo $Cat-> Description; ?> </td>
                                                <td>
                                                    <div class="text-center">
                                                        <a href="#" class="btn btn-success btn-circle" style="align-items: center;" onclick="document.location.href='<?php echo $update; ?>'">
                                                            <i class="fas fa-pen"  ></i>
                                                        </a>
                                                        <a href="#" class="btn btn-warning btn-circle">
                                                            <i class="fas fa-eye"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-danger btn-circle"  onclick="document.location.href='<?php echo $delete; ?>'">
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
                    <button class="btn btn-primary" id="print-btn"><a  href="generate_pdf.php"></a>print</button>
                    </form>
                </div>
                <!-- /.container-fluid -->
                <?php
  include './Layouts/footer.php';
  ?>
          
