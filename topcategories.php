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
				<h1>Welcome to the knowledge room</h1>
				<h5>Your personal knowledge base</h5>
				<a class="btn btn-warning" href="admin.php?action=addItem">INCREASES!!</a>
			</div>
		</div>

		<div class="col-md-12 contentDisplayer">
			<br>
			<h4 class="text-center" style="color: #F60;">Click on one of the
				category below to know more about something...or add a new item!!</h4>
			<hr>

			<!-- Breadcrumbs Navigation -->
			<!--<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li><a href="#">Library</a></li>
				<li class="active">Data</li>
			</ol>-->

			<div class="row">
				<!--/span-->
				<?php
				$queryText = "SELECT * FROM topcategory ORDER BY categoryName ASC";
				$query = dbUtility::queryToDB ( $dbConn, $queryText );
				while ( $row = mysqli_fetch_array ( $query ) ) :
					?>
					<div class="col-md-4 catBox">
					<?php
					echo "<h2>" . $row ['categoryName'] . "</h2>";
					echo "<p>" . $row ['categoryDescription'] . "</p>";
					?>
					<p>
						<a class="btn btn-default"
							href="<?php echo"subcategories.php?cat=" . $row ['categoryName'] . "";?>"
							role="button">View more... &raquo;</a>
					</p>
				</div>
				<?php
				endwhile
				;
				dbUtility::freeMemoryAfterQuery ( $query );
				?>
				
			</div>
			<!--/row-->

			<br>
			<br>
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
