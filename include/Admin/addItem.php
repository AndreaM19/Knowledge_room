<h1>New item</h1>
<div class="col-md-8 admin-form">
	<br />
    <form action="admin.php?action=addItem&addElement=1" method="post">

    <div class="input-group">   
        <span class="input-group-addon">Title</span>
        <input type="text" size="70" value="Insert item title here" autofocus name="title" class="form-control">  
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
    <br /> 
    <div class="input-group">  
        <span class="input-group-addon"><div class="fa fa-list-ul"></div> Sub category</span>
        <select id="subCat" name="subCategory" class="form-control" disabled>
        	<option value="-">--</option>
        </select>        
    </div>
    <hr />
    <div class="input-group">   
        <span class="input-group-addon"><div class="fa fa-link"></div> Link</span>
        <input type="text" size="70" value="Insert item link here" name="link" class="form-control">
    </div>
    <br />
    <div class="input-group">           
        <span class="input-group-addon"><div class="fa fa-link"></div> Link Type</span>
        <select name="linkType" class="form-control">
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
    </div>
    <hr />
    <div class="input-group">
        <span class="input-group-addon"><div class="fa fa-flag"></div> Language</span>    
       	<select name="lang" class="form-control">
        	<option value="-">-- Select a Link Type --</option>
            <option value="Italian">Italian</option>
            <option value="English">English</option>
        </select>
    </div>
    <hr />
    <div class="input-group">    
        <h4>Some comments? :-D</h4>
        <textarea rows="10" cols="120" name="comment" class="form-control"></textarea>
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


<!-- Insert items into the DB -->
<?php
$success_1 = false;
$success_2 = false;
if (isset ( $_GET ['addElement'] ) & @$_GET ['addElement'] == 1) {
	
	//set the date for the insert
	$date=new DateManager();
	
	$queryText_1 = "INSERT INTO resource (resourceId, title, annotationDate, description, subCategory, language) VALUES (NULL, '" . $_POST ['title'] . "', '".$date->getDate()."', '" . $_POST ['comment'] . "', '" . $_POST ['subCategory'] . "', '" . $_POST ['lang'] . "')";
	
	$queryText_2 = "INSERT INTO link (linkId, linkPath, linkType, resource) VALUES (NULL, '" . $_POST ['link'] . "', '" . $_POST ['linkType'] . "', '" . $_POST ['title'] . "')";
	
	if (dbUtility::queryToDB ( $dbConn, $queryText_1 ))
		$success_1 = true;
	if (dbUtility::queryToDB ( $dbConn, $queryText_2 ))
		$success_2 = true;
	//dbUtility::freeMemoryAfterQuery ( $queryText_1 );
	//dbUtility::freeMemoryAfterQuery ( $queryText_2 );
	
	if ($success_1 & $success_2) {
		echo "<script type='text/javascript'>showModalBox('#successBox');</script>";
	} else {
		echo "<script type='text/javascript'>showModalBox('#errorBox');</script>";
	}
}
?>
                    
                  