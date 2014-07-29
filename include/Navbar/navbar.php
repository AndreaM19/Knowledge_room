<ul class="nav navbar-nav">
	<li><a href="index.php"><div class="fa fa-home"></div> Home</a></li>
                        
   	<!-- Favourite -->
	<?php //if(@$_SESSION['role']==1 | @$_SESSION['role']==10)include("navbar-components/favourite.php")?>
                        
   	<!-- Categories -->
	<?php include("navbar-components/categories.php")?>
				
    <!-- New Item -->
	<?php if(@$_SESSION['role']==1 | @$_SESSION['role']==10)include("navbar-components/newitem.php")?>
     
    <!-- Admin -->
    <?php if(@$_SESSION['role']==1)include("navbar-components/admin.php")?>
	</ul>

<ul class="nav navbar-nav navbar-right">
	<?php include("navbar-components/search.php")?>
    <?php include("navbar-components/login.php")?>
<ul>