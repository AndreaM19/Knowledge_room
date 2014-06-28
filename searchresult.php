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
			<br>
			<h4 class="text-center" style="color: #F60;">With the Knowledge room
				you can:</h4>
			<hr>

			<div class="col-md-3 text-center">
				<br> <img src="img/icon/home/search.png" class="home-icons"> <br>
				<br>
				<br>
				<br>
			</div>

			<div class="col-md-6">
				<h2>Search what you want...</h2>
				<h5>Insert a keyword in the search field</h5>
				<form class="navbar-form navbar-left" role="search"
					action="searchresult.php?showResult=1" method="post">
					<div class="form-group">
						<input type="text" class="form-control"
							placeholder="write something..." name="keyword"
							style="height: 50px; width: 440px; font-size: 24px; margin-left: -20px;">
					</div>
					<button type="submit" class="btn btn-warning" style="height: 50px;">Search</button>
				</form>
			</div>


			<div class="col-md-3 text-center">
				<br>
				<h4>Most used keywords:</h4>
			</div>

			<div class="col-md-12">
				<?php
				if (@$_GET ['showResult'] != 1)
					echo "<br><br><br><br>";
				
				else if (@$_GET ['showResult'] == 1) {
					echo "<hr>";
					echo "<h3>Search results for keyword " . $_POST ['keyword'] . ":</h3>";
					echo "<br><br>";
				}
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
