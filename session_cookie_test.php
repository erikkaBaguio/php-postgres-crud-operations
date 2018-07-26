<?php
	session_start();

	include 'includes/functions/db.func.php';
	include 'includes/functions/user.func.php';
	
	
	$dbConn = dbConnect("host=localhost dbname=hms user=postgres password=password");
	$msg = "";
	$newToken='';


	if(isset($_POST["btn-login"])) {
		// var_dump($_POST);
		// var_dump($_SESSION);
		if (verifyFormToken('form1')) {

		   // ... more security testing
		   // if pass, send email
			$login = login($_POST);
			
			if($login){
				// $_SESSION['authentication'] = md5($_POST["username"].'1234567890');
				setcookie("authentication", md5($_POST["username"].'1234567890'), time()+3600); 
				header('location:page1.php');
			} else {
				$msg = "Invalid username or password";
			}
			

		} else {
		   
		   $msg = "Hack-Attempt detected. Got ya!.";
		}
	}

	$newToken = generateFormToken('form1');

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Bootstrap 4 Login Form</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
        <div class="container">
        	<br>
        	<br>
        	<br>
        <form class="form-horizontal" role="form" method="POST" action="" name="form1">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2>Please Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                	<div class="alert alert-danger" role="alert">
					  <?php echo $msg; ?>
					</div>
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">Username</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="username" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        <!-- Put password error message here -->    
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">

                    <!-- PREVENT FLOOD QUERY -->
                    <input type="hidden" name="token" value="<?php echo $newToken;?>">
                    <button type="submit" class="btn btn-success" name="btn-login"><i class="fa fa-sign-in"></i> Login</button>
                    
                    <a class="btn btn-link" href="/password/reset">Forgot Your Password?</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>