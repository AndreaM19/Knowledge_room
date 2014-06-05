
<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
?>

<?php
$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );
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
					<ul class="nav navbar-nav">
						<li><a href="index.php"><div class="fa fa-home"></div> Home</a></li>
						<li><a href="newitem.php"><div class="fa fa-pencil"></div> New item</a></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Favourite <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="#"><div class="fa fa-star"></div> Most important</a></li>
								<li><a href="#"><div class="fa fa-eye"></div> To watch</a></li>
							</ul></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Categories <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">Top categories</li>
								<li><a href="#"><div class="fa fa-list-ul"></div> Top category
										list</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Sub categories</li>
								<li><a href="#"><div class="fa fa-list"></div> Sub category list</a></li>
							</ul></li>
						<li class="dropdown"><a href="#" class="dropdown-toggle"
							data-toggle="dropdown">Admin <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li class="dropdown-header">Top categories</li>
								<li><a href="#"><div class="fa fa-plus"></div> Add new top
										category</a></li>
								<li><a href="#"><div class="fa fa-trash-o"></div> Remove a top
										category</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Sub categories</li>
								<li><a href="#"><div class="fa fa-plus"></div> Add new sub
										category</a></li>
								<li><a href="#"><div class="fa fa-trash-o"></div> Remove a sub
										category</a></li>
								<li class="divider"></li>
								<li class="dropdown-header">Items</li>
								<li><a href="#"><div class="fa fa-pencil"></div> Add new item</a></li>
								<li><a href="#"><div class="fa fa-eraser"></div> Remove item</a></li>
							</ul></li>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<li><a href="signin.php">Sign in</a></li>
					</ul>
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
				<br>
				<h5>You are in:</h5>
				<h1><?php echo"" . $_GET ['cat'] . "";?></h1>
			</div>
		</div>

		<div class="col-md-12 contentDisplayer">
			<br><br>

			<!-- Breadcrumbs Navigation -->
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li class="active"><?php echo"" . $_GET ['cat'] . "";?></li>
			</ol>

			<div class="row">
				<!--/span-->
				<?php
				$queryText = "SELECT * FROM subCategory WHERE topCategory='" . $_GET ['cat'] . "'";
				$query = dbUtility::queryToDB ( $dbConn, $queryText );
				$count = 0;
				while ( $row = mysqli_fetch_array ( $query ) ) :
					?>
					<div class="col-md-4">
					<?php
					echo "<h2>" . $row ['subCategoryName'] . "</h2>";
					echo "<p>" . $row ['subCategoryDescription'] . "</p>";
					?>
					<p>
						<a class="btn btn-default"
							href="<?php echo"resource.php?cat=".$_GET ['cat']."&subCat=" . $row ['subCategoryName'] . "";?>"
							role="button">View items... &raquo;</a>
					</p>
					<br>
				</div>
				<?php
					$count ++;
				endwhile
				;
				dbUtility::freeMemoryAfterQuery ( $query );
				if ($count == 0)
					echo "<div class='text-center'><h3>Sorry this is an empty set!!</h3><h2>:-(</h2><br><br></div>";
				?>
				
			</div>
			<!--/row-->
		</div>

		<footer>
			<div class="col-md-12 footerContainer text-left">
				<h6>
					&copy; Knowledge room: your personal web knowledge base - Design by
					<a href="">Andrea Marchetti</a>
				</h6>
			</div>
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
