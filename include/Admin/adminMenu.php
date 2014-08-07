<h1>Admin menu</h1>
<div class="col-md-8 admin-menu">
	<hr />
    <h4>Top categories</h4>
    <a href="admin.php?action=addTop" class="btn btn-info actionButton">
        Add top category
        <br /><div class="fa fa-plus icon"></div>
    </a>
    <a href="admin.php?action=editTop" class="btn btn-info actionButton">
        Edit top category
         <br /><div class="fa fa-pencil icon"></div>
    </a>
    <a href="admin.php?action=removeTop" class="btn btn-info actionButton">
        Remove top category
        <br /><div class="fa fa-trash-o icon"></div>
    </a>
	<hr />
    <h4>Sub categories</h4>
    <a href="admin.php?action=addSub" class="btn btn-warning actionButton">
    	Add sub category
        <br /><div class="fa fa-plus icon"></div>
    </a>
    <a href="admin.php?action=editSub" class="btn btn-warning actionButton">
        Edit sub category
         <br /><div class="fa fa-pencil icon"></div>
    </a>
    <a href="admin.php?action=removeSub" class="btn btn-warning actionButton">
        Remove sub category
        <br /><div class="fa fa-trash-o icon"></div>
    </a>
    <hr />
    <h4>Items</h4>
    <a href="admin.php?action=addItem" class="btn btn-success actionButton">
    	Add item
        <br /><div class="fa fa-plus icon"></div>
    </a>
    <!--<a href="admin.php?action=editItem" class="btn btn-success actionButton">-->
	<a href="topcategories.php" class="btn btn-success actionButton">
    	Edit item
        <br /><div class="fa fa-pencil icon"></div>
    </a>
    <a href="admin.php?action=removeItem" class="btn btn-success actionButton">
    	Remove item
        <br /><div class="fa fa-eraser icon"></div>
    </a>
    <hr />
    <h4>User profile</h4>
    <a href="admin.php?action=editProfile" class="btn btn-danger actionButton">
    	Edit profile info
        <br /><div class="fa fa-pencil icon"></div>
    </a>
    <hr />
    
    
</div>

<div class="col-md-4">
    <h3>Istructions:</h3>
    <br />
    <p class="text-justify">This is the admin section. Here you can manage categories (Top or Sub), items and other infos about your personal profile.</p>
    <hr />
    <h3 class="admin-date">
    <?php
	$date=new DateManager();
	echo "Today is: ".$date->getDate();
	?>
    </h3>
    <hr />
    <h3>Knowledge summary</h3>
    <?php
	$summary=new Summary($dbConn);
	?>
    <div class="col-md-6"><h1 class="admin-summary"><?php echo $summary->getItemTot();?> Items</h1></div>
    <div class="col-md-6">
	    <h4 class="admin-summary"><?php echo $summary->getTopCatTot()?> Top categories</h4>
    	<h4 class="admin-summary"><?php echo $summary->getSubCatTot();?> Sub categories</h4>
    </div>
    <br /><br /><br /><hr />
    <h3>Other options</h3>
    <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
</div>


                    
                  