<?php

include 'includes/config.php';
// include 'send-email.php';
$error = "";
$msg = "";
$subject="Proof of registration";
if (isset($_POST['savebtn'])) {
    $firstname = $_POST['fn'];
    $lastname = $_POST['ln'];
    $phone = $_POST['ph'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pass=password_hash($password, PASSWORD_BCRYPT);
    $select_chech = mysqli_query($con, "SELECT * FROM usertbl WHERE email='$email'");
    if (strpos($password,'@')==false && strpos($password,'%')== false) {
        $error = "Please use Either a @ or % symbol";
        // echo "<script>alert('Please use Either a @ or % symbol...');</script>";
        // return false;
    }
    else if (strlen($password) < 8) {
        // echo "<script>alert('Password must be at least 8 characters long!...');</script>";
        $error = "Password must be at least 8 characters long!";
        // return false;
    } 
    else if (mysqli_num_rows($select_chech) > 0) {
        echo "<script>alert('email is areald used! try again...');</script>";
    } else{
        $status=1;
        $query = mysqli_query($con, "INSERT INTO `usertbl`(`Firstname`, `Lastname`, `phoneNumber`, `email`, `password`, `Status`) 
        VALUES ('$firstname','$lastname','$phone','$email','$pass','$status')");
        if ($query) {
        $subject="User Account creation";
     	$msg="Dear '".mysqli_real_escape_string($con, trim($_POST['fn']))."',<br><br> Your account was created successfully!<br> Regards,<br>,<br>ITSINDA PROGRAM ";
     	send_mail($subject,$msg,trim($_POST['email']));
     		$msg="Message was sent to ".mysqli_real_escape_string($con,trim($_POST['email']))."";
     	
        message("Account password created  successfully. Please login to continue!,<br>".$msg."", "success");
        redirect($_SERVER['REQUEST_URI']);
       exit();
       $msg="check your email";
        } else {
            $error = "Something went wrong . Please try again.";
        }
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

    <title>User Registration</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register To Notify Event </h1>
                                    </div>
                                    <div class="row">
                                <div class="col-sm-6">
                                    <!---Success Message--->
                                    <?php if ($msg) { ?>
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                        </div>
                                    <?php } ?>

                                    <!---Error Message--->
                                    <?php if ($error) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                                    <form class="user" method="POST">
                            <span class="login100-form-title p-b-43">
                                Register to continue Login
                                <?php check_message(); ?>
                            </span>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="" class="control-label">First Name</label>
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="fn">
                                    </div>
                                    <div class="col-sm-6">
                                    <label for="" class="control-label">Last Name</label>
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="ln">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label">Phone Number</label>
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Phone Number" name="ph">
                                </div>
                                <div class="form-group">
                                <label for="" class="control-label">Email Address</label>
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email">
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                    <label for="" class="control-label">Password</label>
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" name="password" placeholder="Password">
                                    </div>
                                </div>
                                <input type="submit" name="savebtn" value="Register Me" class="btn btn-primary btn-user btn-block">
                                    
                            
                            </form>
                                </div>
                            </div>
                        </div>
                    </div>
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

</body>

</html>