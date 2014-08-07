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
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="img/icon/favicon/favicon.ico">

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
		<div class="navbar navbar-default navbar-orange" level="navigation">
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
				<h1>Welcome to the knowledge room</h1>
				<h5>Your personal knowledge base</h5>
				<a class="btn btn-warning" href="newitem.php">INCREASES!!</a>
			</div>
		</div>

		<div class="col-md-12 contentDisplayer">
			<h2>User profile details</h2>
			<br>
			<div class="col-md-3">
            <?php
												$queryText = "SELECT email, password, name, surname, role, userDescription FROM user WHERE email='" . $_SESSION ['userMail'] . "'";
												$query = dbUtility::queryToDB ( $dbConn, $queryText );
												while ( $row = mysqli_fetch_array ( $query ) ) {
													$name = $row ['name'];
													$surname = $row ['surname'];
													$email = $row ['email'];
													$role = $row ['role'];
													$desc = $row ['userDescription'];
												}
												dbUtility::freeMemoryAfterQuery ( $query );
												
												echo "<img src='" . $_SESSION ['userImg'] . "' class='img-circle img-responsive' style='width:180px;' alt'" . $name . " " . $surname . "' title'" . $name . " " . $surname . "'>";
												?>
            <br>
				<br>
			</div>

			<div class="col-md-6">
			<?php
			echo "<h3>Name: " . $name . "</h3>";
			echo "<h3>Surname: " . $surname . "</h3>";
			echo "<br>";
			echo "<h4>Registered mail: " . $email . "</h4>";
			echo "<br>";
			echo "<h4>Description:</h4>";
			echo "<p>" . $desc . "</p>";
			echo "<br><br>";
			?>
            </div>

			<div class="col-md-3 text-center">
            <?php
			echo "<img src='img/icon/role/" . $role . ".png' style='width:50px;' alt'" . $role . "'>";
			echo "<h4>Role: " . $role . "</h4>";
			?>
            </div>
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
