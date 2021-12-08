
<?php require_once('includes/config.php'); 
session_start();
if (isset($_POST['loginbtn'])) {
	$emailtxt = $_POST['email'];
	$passtxt = $_POST['password'];
	$hashespas = password_hash($passtxt, PASSWORD_BCRYPT);

		$select = mysqli_query($con,"SELECT * FROM usertbl WHERE email='".trim($emailtxt)."'") or die(mysqli_error($con));
	
		if(mysqli_num_rows($select) ==1) {
			$row=mysqli_fetch_array($select);
			$db_password=$row['password'];
			if (password_verify(mysqli_real_escape_string($con, trim($_POST['password'])),$db_password)){
				// lest set the sessions here!!!
			$_SESSION['user_id']=$row['uid'];
			$_SESSION['email']=$row['email'];
			$_SESSION['lname']=$row['Lastname'];

			// then after creating sessions lests redirect
			redirect('dashboard.php');
			exit();		
			}else{
				// password does not match
					message("Password does not match with any of account , Please try again later!!", "alert");
					redirect($_SERVER['REQUEST_URI']); // redirect to current urls
			exit();

			}
		
		}else{
			// password does not match
			message("Invalid user credintials , Please try again later!!", "alert");
			redirect($_SERVER['REQUEST_URI']); // redirect to current urls
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

    <title>user Login</title>

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
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                    <span class="login100-form-title p-b-43">
                                Register to continue Login
                                <?php check_message(); ?>
                            </span>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" name="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
                                        
                                        <input type="submit" value="Login" name="loginbtn" class="btn btn-primary btn-user btn-block">
                                        <br>
                                        <hr>
                                        <br>
                                        <a href="register.php" class="btn btn-primary btn-user btn-block"> New Account</a>
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