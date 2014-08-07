<h1>New sub category</h1>
<div class="col-md-8 admin-form">
	<br />
    <form class="form-addItem" action="admin.php?action=addSub&add=1" method="post">
    
    	<div class="input-group">   
    	    <span class="input-group-addon">Title</span>
        	<input type="text" size="70" value="Insert sub category name here" autofocus name="subCatName" class="form-control">  
	   	</div>
        
        <hr />
        <div class="input-group">
            <span class="input-group-addon"><div class="fa fa-list-ul"></div> Top category</span>
          
            <select id="topCat" name="topCategory" class="form-control">
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
        </div>
        
        <hr />
        <div class="input-group">    
            <h4>Sub category description</h4>
            <textarea rows="10" cols="120" name="subCatDescription" class="form-control"></textarea>
        </div>
        
        <hr />
        <div class="input-group">      
            <button class="btn btn-warning" type="submit" class="form-control">Proceed</button>  
        </div>
    
    </form>
	<br />
</div>

<div class="col-md-4">
    <h3>Istructions:</h3>
    <br />
    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <br />
    <div class="text-center hidable">
    	<img src="img/icon/home/categories.jpg" class="home-icons">
    </div>
</div>


<!-- Modal boxes -->
<!-- Success -->
	<div class="modal fade" id="successBox" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">&times;</button>
					<h3 class="modal-title" id="myModalLabel">Sub category added with success</h3>
				</div>
				<div class="modal-body">
					<h4>Data inserts:</h4>
					<h5>Title: <?php echo $_POST['subCatName']?></h5>
					<h5>Top category: <?php echo $_POST['topCategory']?></h5>
					<h5>Description:</h5>
					<p><?php echo $_POST['subCatDescription']?></p>
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
    
<!-- Query Text -->
<?php
$queryText = "INSERT INTO subcategory (subCategoryId, subCategoryName, subCategoryDescription, topCategory) VALUES (NULL, '" . @$_POST ['subCatName'] . "', '" . @$_POST ['subCatDescription'] . "', '" . @$_POST ['topCategory'] . "')";
?>
    
    <!-- Manage top categories and sub catgories -->
<?php
$success = false;
if (isset ( $_GET ['add'] ) & @$_GET ['add'] == 1) {
	
	if (dbUtility::queryToDB ( $dbConn, $queryText ))
		$success = true;
	//dbUtility::freeMemoryAfterQuery ( $queryText );
	
	if ($success) {
		echo "<script type='text/javascript'>showModalBox('#successBox');</script>";
	} else {
		echo "<script type='text/javascript'>showModalBox('#errorBox');</script>";
	}
}
?>


                    
                  