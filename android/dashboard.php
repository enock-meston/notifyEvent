<?php require_once('includes/config.php'); 
error_reporting(0);
if ($_GET['idyes']) {
    $id = intval($_GET['idyes']);
    $query = mysqli_query($con, "UPDATE settingtbl set status='2' where sid='$id'"); // 2 yes
     message("now you said yes ! ","message");
}

if ($_GET['idno']) {
    $id = intval($_GET['idno']);
    $query = mysqli_query($con, "UPDATE settingtbl set status='3' where sid='$id'"); // 3 no
     message("now you said No ! ","message");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

            

                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- Content Row -->
                    <div class="row">

                        <!-- My Event Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            
                                <div class="card-body">
                                <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                                    <div class="row no-gutters align-items-center">
                                                    <!-- Basic Card Example -->
                                                    <?php
                                                    $userid= $_SESSION['user_id'];
                                                    $query =mysqli_query($con,"SELECT * FROM settingtbl,usertbl,eventtbl WHERE 
                                                    settingtbl.user_id = usertbl.uid AND settingtbl.event_id=eventtbl.id 
                                                    AND usertbl.uid='$userid' AND settingtbl.status=1");
                                                    $number=1;
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        ?>
                                        <div class="card shadow mb-4">
                                            <div class="card-header py-3">
                                                <h6 class="m-0 font-weight-bold text-primary"><?php echo $row['title']; ?> At 
                                                <?php echo $row['schedule']; ?></h6>
                                            </div>
                                            <div class="card-body">
                                            <?php echo $row['Description']; ?> 
                                            <hr>
                                            <a href="dashboard.php?idyes=<?php echo $row['sid']?>" class="btn btn-primary">yes i will Attend</a> 
                                            <a href="dashboard.php?idno=<?php echo $row['sid']?>" class="btn btn-danger">No Attend</a>
                                            </div>
                                           
                                        </div>
                                        <?php
                                            $number+=1;
                                            }
                                        ?>
                                    </div>
                            </div>
                        </div>

                        
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-lg-6 mb-4">

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
                                        