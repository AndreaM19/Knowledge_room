<div class="col-md-12 form-box">
				<h2>
					<div class="fa fa-plus" style="font-size: 40px;"></div>
					Insert a new sub category
				</h2>
				<form class="form-addItem" action="manageCategory.php?action=addSub&add=1"
					method="post">
					<div class="col-md-6">
						<h4>Sub category Name</h4>
						<input type="text" size="70" value="Insert sub category name here"
							autofocus name="subCatName"> <br>

						<br>
						<h4>Sub category description</h4>
						<textarea rows="10" cols="80" name="subCatDescription"></textarea>
						<br> <br> <br>
					</div>

					<div class="col-md-6">
                    <br><br>
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
						
					</div>

					<div class="col-md-12">
						<button class="btn btn-warning" type="submit">Proceed</button>
						<br> <br>
					</div>

				</form>
			</div>
            
            
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
    
    <?php
	$queryText = "INSERT INTO subcategory (subCategoryId, subCategoryName, subCategoryDescription, topCategory) VALUES (NULL, '" . @$_POST ['subCatName'] . "', '" . @$_POST ['subCatDescription'] . "', '" . @$_POST ['topCategory'] . "')";
    ?>