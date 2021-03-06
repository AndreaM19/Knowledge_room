<?php
@ require 'include/DB/dbUtility.php';
@ require 'include/DB/dbData.php';
require_once 'include/Auth/LoginSessions.php';
@require 'include/Utility/kick-out.php';
@require 'include/Utility/DateManager.php';
require_once 'include/Admin/Summary.php';
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

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="js/jQuery/jquery.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/custom/customFunctions.js"></script>

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
				<h1>Admin</h1>
				<h5>The knowledge room settings</h5>
			</div>
		</div>

		<div class="col-md-12 contentDisplayer">
        	
            <?php
			switch (@$_GET['action']) {
				case "":
					include ("include/Admin/adminMenu.php");
					break;
				case "addItem":
					include ("include/Admin/addItem.php");
					break;
				case "editItem":
					include ("include/Admin/editItem.php");
					break;
				case "addSub":
					include ("include/Admin/addSubCat.php");
					break;
				case "removeSub":
					include ("include/Admin/removeSubCat.php");
					break;
				case "addTop":
					include ("include/Admin/addTopCat.php");
					break;
				case "removeTop":
					include ("include/Admin/removeTopCat.php");
					break;
				default:
					echo "<h1>ERROR - Unknow URL</h1><br />";
					break;
			}
			?>
	
		</div>

		<footer>
			<?php
			include ("include/Footer/footer.php");
			?>
		</footer>

		<!-- End of container -->
	</div>



	

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
