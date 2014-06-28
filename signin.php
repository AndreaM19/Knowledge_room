<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
?>

<?php
$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );
?>

<?php
LoginSessions::startSession ();
if (isset ( $_SESSION ['role'] ) & @$_GET ['login'] != "false")
	header ( "location:index.php" );

if (@$_GET ['login'] == "true") {
	
	$queryText = "SELECT email, password, name, role FROM user";
	$query = dbUtility::queryToDB ( $dbConn, $queryText );
	while ( $row = mysqli_fetch_array ( $query ) ) {
		if ($row ['password'] == md5 ( $_POST ['password'] ) && $row ['email'] == $_POST ['email']) {
			echo "<script>alert('" . $_POST ['email'] . " - " . $_POST ['password'] . "')</script>";
			$_SESSION ['role'] = $row ['role'];
			$_SESSION ['user'] = $row ['name'];
			$_SESSION ['userMail'] = $row ['email'];
			$_SESSION ['userImg'] = "user_data/" . $row ['name'] . "/avatar.jpg";
			header ( "location:index.php" );
		}
	}
	dbUtility::freeMemoryAfterQuery ( $query );
} else if (@$_GET ['login'] == "false") {
	LoginSessions::stopSession ( "index.php" );
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="shortcut icon" href="img/ico/favicon.ico">

<title>Welcome to Knowledge Room</title>

<!-- Reset CSS -->
<link href="css/reset/reset.css" rel="stylesheet">
<!-- Bootstrap core CSS -->
<link href="css/bootstrap/bootstrap.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/custom/style.css" rel="stylesheet">
<link href="css/custom/navbar-orange.css" rel="stylesheet">
<!-- Font awesome CSS -->
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


	<!-- Container -->
	<div class="container">
		<!-- Static navbar -->
		<div class="navbar navbar-default navbar-orange" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse"
						data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<!-- <a class="navbar-brand" href="#">Knowledge Room</a> -->
				</div>
				<div class="navbar-collapse collapse">
					<?php
					include ("include/Navbar/navbar.php");
					?>
				</div>
				<!--/.nav-collapse -->
			</div>
			<!--/.container-fluid -->
		</div>

		<div class="col-md-12">
			<!-- Top Banner -->
			<div class="col-md-8 topBanner">
				<img src="img/gear.jpg" class="img-responsive">
			</div>

			<!-- Right side menu -->
			<div class="col-md-4 topSlogan text-center">
				<h1>Reserved area</h1>
				<h5>Manage contents</h5>
			</div>
		</div>

		<div class="col-md-12 contentDisplayer">
			<br>
			<h4 class="text-center" style="color: #F60;">
            <?php
												if (@$_GET ['msg'] == "auth required")
													echo "Autentication is required to use this function!";
												else
													echo "Sign in for discover reserved functions!";
												?>
            </h4>
			<hr>

			<div class="col-md-1"></div>

			<div class="col-md-4">
				<br> <br>
				<form class="form-signin" style="margin-top: -40px;" role="form"
					action="signin.php?login=true" method="post">
					<h4 class="form-signin-heading">Please sign in</h4>
					<input type="email" class="form-control"
						placeholder="Email address" required autofocus name="email"> <br>
					<input type="password" class="form-control" placeholder="Password"
						required name="password"> <label class="checkbox"> <input
						type="checkbox" value="remember-me"> Remember me
					</label>
					<button class="btn btn-warning btn-primary btn-block" type="submit">Sign
						in</button>
				</form>
				<br> <br>
			</div>

			<div class="col-md-2"></div>

			<div class="col-md-4">
				<h3>This is the reserved door for the knowledge...</h3>
				<h5>Sign in for add and manage contents from the Knowledge room</h5>
				<div class="fa fa-sign-in" style="font-size: 60px;"></div>
			</div>
			<div class="col-md-1"></div>

		</div>

		<footer>
			<?php
			include ("include/Footer/footer.php");
			?>
		</footer>

		<!-- End of container -->
	</div>



	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/jQuery/jquery.min.js"></script>
	<script src="js/bootstrap/bootstrap.min.js"></script>
</body>
</html>

<?php
dbUtility::disconnectFromDB ( $dbConn );
?>
