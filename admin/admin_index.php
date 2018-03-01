<?php
	require_once('phpscripts/config.php');
	confirm_logged_in();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Welcome to your admin panel</title>
</head>
<body>
	<h1>Welcome to Your Admin Page</h1>
	<?php echo "<h2>Hi {$_SESSION['user_name']}</h2>" ?>
	<a href = "admin_createuser.php">Create User</a><br>
	<a href="admin_edituser.php">Edit Account</a><br>
	<a href="admin_deleteuser.php">FIRED</a><br>
	<a href = "phpscripts/caller.php?caller_id=logout">Sign Out</a> <!--need html to trigger function within php-->
</body>
</html>
