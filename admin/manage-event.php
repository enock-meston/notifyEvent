<?php
include 'includes/config.php';
if (isset($_POST['savebtn'])) {
    $title =mysqli_real_escape_string($con,$_POST['title']);
    $schedule =mysqli_real_escape_string($con,$_POST['schedule']);
    $description =mysqli_real_escape_string($con,$_POST['description']);
    $checkquery = mysqli_query($con,"SELECT * FROM `eventtbl` WHERE title='".mysqli_real_escape_string($con,$_POST['title'])."'") or die(mysqli_error($con));
     if (mysqli_num_rows($checkquery) > 0) {
        message("Title is Aleady Added..","message");
    }else {
        $status =1;
        $sql= mysqli_query($con,"INSERT INTO `eventtbl`(`title`, `Description`, `schedule`,`status`) 
        VALUES ('$title','$description','$schedule','$status')") or die(mysqli_error($con));
        message("Title is Added..","message");
        if ($sql) {
            # code...
            message("Title is Added..","message");
        }else {
            message("There is samething went wrong","Error");
        }
    }

}

if(isset($_POST['addbtnev'])){ // save records
$event_id=$_POST['event_id'];
// php insert queries
$users=$_POST['users'];
$count_users=count($users);
// Here you might pu the forign keys here.... or other for vartiables

//
 
if(count($users) > 0){ // lets check if user have selected any person

for($i=0; $i<$count_users; $i++){
	//lets get user_id to be inseeted in the database
$user_id=$_POST['users'][$i]; // thid is the user id for the user   // the error from array list

/////////////////////////////?INSERT QUERY GOUES HERE
    $status =1;
$insert =mysqli_query($con,"INSERT INTO `settingtbl`(`user_id`, `event_id`, `status`) 
VALUES ('$user_id','$event_id','1')");
if (!$insert) {
    message("successful setted","message");
redirect($_SERVER['REQUEST_URI']) or die(mysqli_error($con));
exit();
}
} 
message("successful setted","message");
redirect($_SERVER['REQUEST_URI']) or die(mysqli_error($con));
exit();
}else{
	// user have not selected any record....
    message("No record selected, Please try again later!","error");
    redirect($_SERVER['REQUEST_URI']);
    exit();
}


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
    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup> PAGE</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Events</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Events:</h6>
                        <a class="collapse-item" href="manage-event.php">Manage Event</a>
                    </div>
                </div>
            </li>


            <!-- Divider -->
            <hr class="sidebar-divider">

        
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Events Table</h1>
                    <p class="mb-4">All Events registered Here</p>
                    <span class="login100-form-title p-b-43">
                                <?php check_message(); ?>
                            </span>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#addEventModal">
                        Add New Event
                    </button>
                    <hr class="sidebar-divider">


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Events</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Event Title</th>
                                            <th>Event Schedule</th>
                                            <th>Event Added Date</th>
                                            <th>Event Description</th>
                                            <th>Settings</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>No</th>
                                            <th>Event Title</th>
                                            <th>Event Schedule</th>
                                            <th>Event Added Date</th>
                                            <th>Event Description</th>
                                            <th>Settings</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                            $query =mysqli_query($con,"SELECT * FROM `eventtbl` WHERE 1");
                                            $number=1;
                                            while ($row = mysqli_fetch_array($query)) {
                                                ?>
                                    <tbody>
                                        <tr>
                                            <td><?php echo $number?></td>
                                            <td><?php echo $row['title']?></td>
                                            <td><?php echo $row['schedule']?></td>
                                            <td><?php echo $row['dateDate']?></td>
                                            <td><?php echo $row['Description']?></td>
                                            <td>
                       <a href="#" data-toggle="modal" title="Click to add participants" data-toggle="modal" 
                       data-target="#AddParticipantModal" data-id="<?php echo $row['id']; ?>"> AddParticipant</a>
                                                
                                             <!--Add Event Modal-->
                                   
                                            </td>
                                        </tr>
                                        
                                    </tbody>

                                    <?php
                                        $number+=1;
                                    }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                
               









                <div class="modal fade" id="AddParticipantModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Add Participant</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>          
            <div class="modal-body">

      <div class="fetched-data-AddParticipant"></div> 
            </div>
          </div>
          </div>
        </div> 
        <script>

 
$(document).ready(function(){
     $('#AddParticipantModal').on('show.bs.modal', function (e) {
         var rowid = $(e.relatedTarget).data('id');
          
         $.ajax({
             type : 'post',
             url : 'event_form.php', //Here you will fetch records 
             data :  'rowid='+ rowid, //Pass $id
             success : function(data){
             $('.fetched-data-AddParticipant').html(data);//Show fetched data from database
             }
         });
      });
 });
// all
</script>





                <!--Add Event Modal-->
    <div class="modal fade" id="addEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Evant</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <form class="user" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="" class="control-label">Title</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="Event Title" required  name="title">
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="" class="control-label">Schedule</label>
                                        <input type="datetime-local" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Schedule" required name="schedule">
                                    </div>
                                    
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label">Description</label>
                                <textarea name="description" 
                                class="form-control jqte" cols="30" rows="5" required name="description"></textarea>
                                </div>
                                <input class="btn btn-primary" type="submit" value="Save Event" name="savebtn">
                            </form>

                </div>
                
                
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

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

    <script>
        $(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
    </script>

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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

</body>

</html>