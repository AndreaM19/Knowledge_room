<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
@require 'include/Utility/kick-out.php';
?>

<?php
$dbConn = dbUtility::connectToDB ( $HOST, $USER, $PASSWORD, $DB );
?>

<?php
LoginSessions::startSession ();
?>

<?php
kickOut ( $_SESSION ['role'], true );
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
				<form class="form-addItem" action="newitem.php?addItem=1"
					method="post">
					<div class="col-md-6">
						<h4>Title</h4>
						<input type="text" size="70" value="Insert item title here"
							autofocus name="title"> <br> <br>

						<h4>
							<div class="fa fa-list-ul"></div>
							Top category <select id="topCat" name="topCategory">
								<option value="-">-- Select a top category --</option>
			                <?php
																			$queryText = "SELECT categoryName FROM topcategory";
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
							Sub category <select id="subCat" name="subCategory" disabled>
								<option value="-">--</option>
							</select>
						</h4>
						<br>
						<h4>Some comments? :-D</h4>
						<textarea rows="10" cols="80" name="comment"></textarea>
						<br> <br> <br>
					</div>

					<div class="col-md-6">
						<h4>
							<div class="fa fa-link"></div>
							Link
						</h4>
						<input type="text" size="70" value="Insert item link here"
							name="link"> <br> <br> <br>
						<h4><div class="fa fa-link"></div>
						Link Type <select name="linkType">
							<option value="-">-- Select a Link Type --</option>
		                <?php
																		$queryText = "SELECT type FROM linktype ORDER BY type ASC";
																		$query = dbUtility::queryToDB ( $dbConn, $queryText );
																		while ( $row = mysqli_fetch_array ( $query ) ) :
																			echo "<option value='" . $row ['type'] . "'>" . $row ['type'] . "</option>";
																		endwhile
																		;
																		dbUtility::freeMemoryAfterQuery ( $query );
																		?>
						</select>
						</h4>
						<br> <br>
                        
                        <h4>
							<div class="fa fa-flag"></div>
							Language					
						<select name="lang">
							<option value="-">-- Select a Link Type --</option>
                            <option value="Italian">Italian</option>
                            <option value="English">English</option>
						</select>
						</h4>
					</div>

					<div class="col-md-12">
						<button class="btn btn-warning" type="submit">Proceed</button>
						<br> <br>
					</div>

				</form>
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
	<script src="js/custom/customFunctions.js"></script>

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


	<!-- Success -->
	<div class="modal fade" id="successBox" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h3 class="modal-title" id="myModalLabel">Item added with success</h3>
				</div>
				<div class="modal-body">
					<h4>Data inserts:</h4>
					<h5>Title: <?php echo $_POST['title']?></h5>
					<h5>Link: <?php echo $_POST['link']?></h5>
					<h5>Top category: <?php echo $_POST['topCategory']?></h5>
					<h5>Sub category: <?php echo $_POST['subCategory']?></h5>
                    <h5>Language: <?php echo $_POST['lang']?></h5>
					<h5>Comments:</h5>
					<p><?php echo $_POST['comment']?></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>

	<!-- Error -->
	<div class="modal fade" id="errorBox" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h3 class="modal-title" id="myModalLabel">Error</h3>
				</div>
				<div class="modal-body">
					<h4>An error occourred</h4>
					<h5>Unable to insert data in the Knowledge Room</h5>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php
$success_1 = false;
$success_2 = false;
if (isset ( $_GET ['addItem'] ) & @$_GET ['addItem'] == 1) {
	$queryText_1 = "INSERT INTO resource (resourceId, title, annotationDate, description, subCategory, language) VALUES (NULL, '" . $_POST ['title'] . "', '00-00-0000', '" . $_POST ['comment'] . "', '" . $_POST ['subCategory'] . "', '" . $_POST ['lang'] . "')";
	
	$queryText_2 = "INSERT INTO link (linkId, linkPath, linkType, resource) VALUES (NULL, '" . $_POST ['link'] . "', '" . $_POST ['linkType'] . "', '" . $_POST ['title'] . "')";
	
	if (dbUtility::queryToDB ( $dbConn, $queryText_1 ))
		$success_1 = true;
	if (dbUtility::queryToDB ( $dbConn, $queryText_2 ))
		$success_2 = true;
	dbUtility::freeMemoryAfterQuery ( $queryText_1 );
	dbUtility::freeMemoryAfterQuery ( $queryText_2 );
	
	if ($success_1 & $success_2) {
		echo "<script type='text/javascript'>showModalBox('#successBox');</script>";
	} else {
		echo "<script type='text/javascript'>showModalBox('#errorBox');</script>";
	}
}
?>

<?php
dbUtility::disconnectFromDB ( $dbConn );
?>
