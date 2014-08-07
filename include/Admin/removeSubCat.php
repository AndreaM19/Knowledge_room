<h1>Remove sub category</h1>
<div class="col-md-8 admin-form">
	<br />
    <form class="form-addItem" action="admin.php?action=addSub&add=1" method="post">
    
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
        
        <div class="admin-select-results">
        	<h4>Sub categories for top category :</h4>
            <br />
        </div>
        
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



<!--
<div class="col-md-12 form-box">
				<h2>
					<div class="fa fa-trash-o" style="font-size: 40px;"></div>
					Remove a sub category
				</h2>
				<form class="form-addItem" action="newitem.php?addItem=1"
					method="post">
					<br />
                    <h4>
							<div class="fa fa-list-ul"></div>
							Select one from the top category list <select id="topCat" name="topCategory">
								<option value="-">-- Select a top category --</option>
			                <?php
							/*
																			$queryText = "SELECT categoryName FROM topcategory";
																			$query = dbUtility::queryToDB ( $dbConn, $queryText );
																			while ( $row = mysqli_fetch_array ( $query ) ) :
																				echo "<option value='" . $row ['categoryName'] . "'>" . $row ['categoryName'] . "</option>";
																			endwhile
																			;
																			dbUtility::freeMemoryAfterQuery ( $query );
																			*/
																			?>
			                </select>
						</h4>
						<br />
					

					<div class="col-md-12">
						<button class="btn btn-warning" type="submit">Proceed</button>
						<br> <br>
					</div>

				</form>
			</div>
            -->