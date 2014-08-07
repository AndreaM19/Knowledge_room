<br>
<br>
<!-- Breadcrumbs Navigation -->
<ol class="breadcrumb">
	<li><a href="topcategories.php">Top categories</a></li>
	<li><a href="<?php echo"subcategories.php?cat=".$_GET ['top']."";?>"><?php echo $_GET ['top'];?></a></li>
	<li><a href="<?php echo"resource.php?cat=".$_GET ['top']."&subCat=".$_GET ['sub']."";?>"><?php echo"" . $_GET ['sub'] . "";?></a></li>
    <li class="active">Item Edit</li>
</ol>

<h1>Edit item</h1>
<div class="col-md-8 admin-form">
	<br />
    
      
    <?php	
	//Show item selected details
	if(isset($_GET['top']) & isset($_GET['sub']) & isset($_GET['item'])){
		include ("editItem/editItemResults.php");
	}
	?>
   
    <br />
</div>

<div class="col-md-4">
    <h3>Istructions:</h3>
    <br />
    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <br />
    <div class="text-center hidable">
    	<img src="img/icon/home/pencil.gif" class="home-icons">
    </div>
</div>


<!-- Modal Boxes -->

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



                    
                  