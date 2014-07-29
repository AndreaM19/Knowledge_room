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
						<br />
					

					<div class="col-md-12">
						<button class="btn btn-warning" type="submit">Proceed</button>
						<br> <br>
					</div>

				</form>
			</div>