<?php
include 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/sweetalert2/sweetalert2.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>User Data</h2>
                <table border="1px" class="table" style="border-collapse: collapse;" >
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>user</th>
                            <th>email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $id=1;
                        $user_qry= "SELECT * from user";
                        $user_res=mysqli_query($con, $user_qry);
                        while($user_data=mysqli_fetch_assoc(  $user_res))
                        {
                            ?>
                            <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $user_data['name'] ?></td>
                            <td><?php echo $user_data['email'] ?></td>
                            </tr>

                            <?php
                            $id++;
                        }
                        ?>
                    </tbody>
                </table>
                <div class="text-center">
                    <a href="user_print.php" class="btn btn-primary">print</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <script src="./css/dataTables.js"></script>
    <script src="./css/dataTables.bootstrap5.js"></script>
</body>
</html>