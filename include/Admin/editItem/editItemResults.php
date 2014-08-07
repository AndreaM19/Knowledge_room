<?php
$data=NULL;
$itemSelected=$_GET['item'];
$queryText = "SELECT * FROM resource INNER JOIN link ON title=resource INNER JOIN linktype ON linkType=type WHERE resourceId=".$itemSelected."";
$query = dbUtility::queryToDB ( $dbConn, $queryText );
$data = mysqli_fetch_assoc ( $query );

?>
    <form action="admin.php?action=editItem&editElement=1" method="post">

    <div class="input-group">   
        <span class="input-group-addon">Title</span>
        <input type="text" size="70" value="<?php echo $data['title'] ?>" name="title" class="form-control">  
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
				if($row ['categoryName']==$_GET ['top']) echo "<option value='" . $row ['categoryName'] . "' selected>" . $row ['categoryName'] . "</option>";
                else echo "<option value='" . $row ['categoryName'] . "'>" . $row ['categoryName'] . "</option>";
            endwhile
            ;
            dbUtility::freeMemoryAfterQuery ( $query );

            ?>
        </select>  
    </div>
    <br /> 
    <div class="input-group">  
        <span class="input-group-addon"><div class="fa fa-list-ul"></div> Sub category</span>
        <select id="subCat" name="subCategory" class="form-control">
        	<option value="-">--</option>
        </select>        
    </div>
    <hr />
    <div class="input-group">   
        <span class="input-group-addon"><div class="fa fa-link"></div> Link</span>
        <input type="text" size="70" value="<?php echo $data['linkPath'] ?>" name="link" class="form-control">
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
				if($row['linkType']=$data['linkType'])echo "<option value='" . $row ['type'] . "' selected>" . $row ['type'] . "</option>";
                else echo "<option value='" . $row ['type'] . "'>" . $row ['type'] . "</option>";
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
        	<option value="-">-- Select a language --</option>
            <?php 
				if($data['language']=="Italian"){
					echo "<option value='".$data['language']."' selected>".$data['language']."</option>";
					echo "<option value='English'>English</option>";
				}
				else if($data['language']=="English"){
					echo "<option value='Italian'>Italian</option>";
					echo "<option value='".$data['language']."' selected>".$data['language']."</option>";
				}
				else if($data['language']==NULL){
					echo "<option value='Italian'>Italian</option>";
					echo "<option value='English'>English</option>";
				}
			 ?>
        </select>
    </div>
    <hr />
    <div class="input-group">    
        <h4>Some comments? :-D</h4>
        <textarea rows="10" cols="120" name="comment" class="form-control"><?php echo $data['description'] ?></textarea>
   	</div>
    <hr />
    <div class="input-group">      
        <button class="btn btn-warning" type="submit" class="form-control">Save changes</button>  
    </div>
        
    </form>