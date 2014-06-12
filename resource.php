<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
?>

<?php
$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );
?>

<?php
LoginSessions::startSession();
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
					include("include/Navbar/navbar.php");
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
				<br>
				<h5>You are in:</h5>
				<h1><?php echo"" . $_GET ['cat'] . "";?></h1>
				<h4>Subsection: <?php echo"" . $_GET ['subCat'] . "";?></h4>
                
                <?php
				$queryText = "SELECT count(resourceId) AS total FROM resource WHERE subCategory='" . $_GET ['subCat'] . "'";
				$query = dbUtility::queryToDB ( $dbConn, $queryText );
				$data=mysqli_fetch_assoc($query);
				echo"<h5>".$data['total']." Elements in this subcategory</h5>";
				dbUtility::freeMemoryAfterQuery ( $query );
				?>
			</div>
		</div>

		<div class="col-md-12 contentDisplayer">
			<br><br>
			

			<!-- Breadcrumbs Navigation -->
			<ol class="breadcrumb">
				<li><a href="index.php">Home</a></li>
				<li><a href="<?php echo"subcategories.php?cat=" . $_GET ['cat'] . "";?>"><?php echo"" . $_GET ['cat'] . "";?></a></li>
				<li class="active"><?php echo"" . $_GET ['subCat'] . "";?></li>
			</ol>
            
			<div class="row">
				<!--/span-->
				<?php
				$queryText = "SELECT * FROM resource INNER JOIN link ON title=resource INNER JOIN linkType ON linkType=type WHERE subCategory='" . $_GET ['subCat'] . "'";
				$query = dbUtility::queryToDB ( $dbConn, $queryText );
				$count = 0;
				while ( $row = mysqli_fetch_array ( $query ) ) :
					?>
					<div class="col-md-1 favourite">
					<br>
					<a href="#" id="star"><div class="fa fa-star"></div></a>
					<a href="#" id="eye"><div class="fa fa-eye"></div></a>
					</div>
					<div class="col-md-11">
					<?php
					echo "<h3>" . $row ['title'] . "</h3><h4>" . $row ['annotationDate'] . "</h4>";
					echo "<p class='text-justify'>" . $row ['description'] . "</p>";
					echo "<h5><div class='fa ".$row ['linkIconName']."'></div> &nbsp;link: <a href='".$row ['linkPath']."' target='_blank' rel='nofollow'>".$row ['linkPath']."</a></h5>";
					echo"<input type='hidden' name='title_".$count."' value='".$row ['title']."'>"
					?>
					<hr>
					<br>
				</div>
				<?php
					$count ++;
				endwhile
				;
				dbUtility::freeMemoryAfterQuery ( $query );
				if ($count == 0)
					echo "<div class='text-center'><h3>Sorry no item in this sub set!!</h3><h2>:-(</h2><br><br></div>";
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
	<!-- Ajax select -->
	<script language="JavaScript" type="text/javascript">
            $(function(){
                $('#star').change(function(event){
                    $.ajax({
                        type: 'PUT',
                        url: 'include/Ajax/favouriteQuery.php',
                        data: "resourceTitle=" + $('#star').val(),
                        success: setFavourite //If success call setFavourite function with param "data"
                    });
                });
            });
            
            function setFavourite(data){
                alert('Well done');
                //$('#subCat').find('option').remove();
                //$('#subCat').append('<option selected> -- Select a sub category -- </option>');
                //$.each(data, function(key, val){
                //    $('#subCat').append('<option>' + val + '</option>');
                //});
            }
        </script>
	
	
</body>
</html>

<?php
dbUtility::disconnectFromDB ( $dbConn );
?>
