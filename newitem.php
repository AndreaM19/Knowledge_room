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
						<li><a href="newitem.php"><div class="fa fa-pencil"></div> New
								item</a></li>
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
				<h1>New knowledge item</h1>
				<h5>Tell me about something...</h5>
			</div>
		</div>

		<div class="col-md-12 contentDisplayer">
			<div class="col-md-12 form-box">
				<h2>
					<div class="fa fa-pencil" style="font-size: 40px;"></div>
					Write a new item
				</h2>
				<form class=" form-addItem">
					<div class="col-md-6">
						<h4>Title</h4>
						<input type="text" size="70" value="Insert item title here"
							autofocus> <br>
						<h4>
							<div class="fa fa-link"></div>
							Link
						</h4>
						<input type="text" size="70" value="Insert item link here"> <br> <br>
						<br>
						<h4>Some comments? :-D</h4>
						<textarea rows="10" cols="80"></textarea>
						<br> <br> <br>
					</div>
					<div class="col-md-6">
						<br>
						<h4>
							<div class="fa fa-list-ul"></div>
							Top category <select id="topCat">
								<option value="-">-- Select a top category --</option>
                <?php
																$queryText = "SELECT categoryName FROM topCategory";
																$query = dbUtility::queryToDB ( $dbConn, $queryText );
																while ( $row = mysqli_fetch_array ( $query ) ) :
																	echo "<option value='" . $row ['categoryName'] . "'>" . $row ['categoryName'] . "</option>";
																endwhile
																;
																dbUtility::freeMemoryAfterQuery ( $query );
																?>
                </select>
						</h4>

						<br>
						<h4>
							<div class="fa fa-list-ul"></div>
							Sub category <select id="subCat" disabled>
								<option value="-"> -- </option>

							</select>
						</h4>
					</div>
				</form>
			</div>
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
                $('#topCat').change(function(event){
                    $.ajax({
                        type: 'GET',
                        url: 'include/Ajax/subCatQuery.php',
                        data: "cat=" + $('#topCat').val(),
                        dataType: 'json',
                        success: setSubCat //If success call setSubCat function with param "data"
                    });
                });
            });
            
            function setSubCat(data){
            	selectActivator();
                $('#subCat').find('option').remove();
                $('#subCat').append('<option selected> -- Select a sub category -- </option>');
                $.each(data, function(key, val){
                    $('#subCat').append('<option>' + val + '</option>');
                });
            }

            //Active or disable the subCat select
            function selectActivator(){
            	selectValue=$('select#topCat').val();//get select value
            	if(selectValue!='-'){
            		$('select#subCat').removeAttr('disabled');
            	}
            	else {
            		$('select#subCat').attr('disabled','disabled');
            	}
            }
        </script>

</body>
</html>

<?php
dbUtility::disconnectFromDB ( $dbConn );
?>
