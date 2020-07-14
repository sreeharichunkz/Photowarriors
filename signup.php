<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

					 require_once('pdo.php');
	session_start();
if(isset($_POST['signup'])){

		if(isset($_POST['uname']) && strlen($_POST['uname']) > 0 && isset($_POST['psw']) && strlen($_POST['psw']) > 0 ){
		 $uname=$_POST['uname'];
				$pwd=$_POST['psw'];
				$mbno=$_POST['mbno'];
				$email=$_POST['email'];


				if(is_numeric($mbno)){
					if(strpos( $_POST['email'], '@') == true){
					require_once('pdo.php');
					 $stmt = $pdo->prepare('INSERT INTO login
						(username,password, mobno, email) VALUES ( :uname, :pwd, :mb, :em)');
						$stmt->execute(array(
										':uname' => $uname,
										':pwd' => $pwd,
										':mb' => $mbno,
										':em' => $email)
								);

						$_SESSION['success']="Record added";


$_SESSION['uname']=$uname;
 $_SESSION['pwd']=$pwd;
 $_SESSION['mbno']=$mbno;
$_SESSION['email']=$email;

}
else{  $_SESSION['failure'] = "Email is invalid";}
				} else{
						$_SESSION['failure'] = "year must be numeric";
				}
		} else{
		$_SESSION['failure']  = "All fields are required";
		}
}
//  if(isset($_POST['verify'])){


 ?>
<h1>Sign Up</h1>

<?php

if ( isset($_SESSION['failure']) ) {
		echo('<p style="color: red;">'.htmlentities($_SESSION['failure'])."</p>\n");
		unset($_SESSION['failure']);
}
if ( isset($_SESSION['success']) ) {
		echo('<p style="color: red;">'.htmlentities($_SESSION['success'])."</p>\n");
		unset($_SESSION['success']);
}
?>
<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from netgon.net/artstyles/oliver/new/dark/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 28 Jun 2020 15:24:44 GMT -->
<head>
    <meta charset="utf-8" />
    <title>Photowarriors</title>

	<!-- Meta Data -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Team" />
    <meta name="keywords" content="Photo Competions and Events" />
    <meta name="description" content="Participate in the event and win exciting prizes." />

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="144x144" href="images/favicons/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="114x114" href="images/favicons/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="72x72" href="images/favicons/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="57x57" href="images/favicons/apple-touch-icon-57x57.png">
	<link rel="shortcut icon" href="images/favicons/favicon.png" type="image/png">

    <!-- Styles -->
	<link rel="stylesheet" type="text/css" href="style/style.css"/>

	<!-- Modernizr -->
	<script src="js/modernizr.custom.js" type="text/javascript"></script>

</head>
<form id="contact-form" data-toggle="validator">
			    <div class="container container_md">
			        <div class="row">
				        <div class="col-lg-6">
                            <div class="form-group">
						        <label for="firstName" class="label">First Name *</label>
                                <input type="text" class="form-control input" id="firstName" name="uname" required data-error="Please, enter your first name." autocomplete="off">
						    </div>
				        </div>
				        <div class="col-lg-6">
															<div class="form-group">
											<label for="password" class="label">Password *</label>
																	<input type="tel" class="form-control input" id="password" name="psw" required data-error="Please, enter your password." autocomplete="off">

									</div>
				        </div>
			        </div>
			        <div class="row">
				        <div class="col-lg-6">
                            <div class="form-group">
						        <label for="email" class="label">Email *</label>
                                <input type="email" class="form-control input" id="email" name="email" required data-error="Please, enter your email." autocomplete="off">
						    </div>
				        </div>
				        <div class="col-lg-6">
                            <div class="form-group">
						        <label for="phone" class="label">Phone *</label>
                                <input type="tel" class="form-control input" id="phone" name="mbno" required data-error="Please, enter your phone." autocomplete="off">

						    </div>
				        </div>
			        </div>

			    </div>
            </form>