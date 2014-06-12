<?php
if (@$_SESSION ['role'] != 1  & @$_SESSION['role']!=10)
	echo "<li><a href='signin.php'>Sign in</a></li>";

if (@$_SESSION ['role'] == 1 | @$_SESSION['role']==10) {
	echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown'>" . $_SESSION ['user'] . " <b class='caret'></b></a>
		<ul class='dropdown-menu'>
		<li class='dropdown-header'>Hi " . $_SESSION ['user'] . "</li>
		<li><a href='user.php'><img src='" . $_SESSION ['userImg'] . "' class='img-circle avatar'>My profile</a></li>
		<li class='divider'></li>
		<li><a href='signin.php?login=false'><div class='fa fa-sign-out'></div> Logout</a></li>
		</ul></li>";
}
