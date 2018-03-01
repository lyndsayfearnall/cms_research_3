<?php
	ini_set('display_errors');
	error_reporting(E_ALL);
	require_once('phpscripts/config.php');
	//confirm_logged_in();
	$id = $_SESSION['user_id'];
	//echo $id;
	$tbl= "tbl_user";
	$col = "user_id";
	$popForm = getSingle($tbl, $col, $id);
	//returns object, need to read as an array
	$found_user = mysqli_fetch_array($popForm, MYSQLI_ASSOC);
	//echo $found_user;

	 if(isset($_POST['submit'])){
	 	$fname = trim($_POST['fname']);
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$email = trim($_POST['email']);
	 	$userlvl = $_POST['userlvl'];
	 	$result = editUser($id, $fname, $username, $password, $email);
			$message = $result;
	}
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>CMS Portal</title>
</head>
<body>
	<h1>Welcome to your edit user page</h1>
	<?php if(!empty($message)){echo $message;} ?>

	<?php if ($found_user['first_login'] == 0){ //if this is your first login, you must change your password
		echo "<p>* Please change your password</p>";
	}?>

	<form action="admin_edituser.php" method="post">
		<label>First Name:</label>
		<input type="text" name="fname" value="<?php echo $found_user['user_fname'];?>"><br><br>

		<label>Username:</label>
		<input type="text" name="username" value="<?php echo $found_user['user_name'];?>"><br><br>

		<label>Password:</label>
		<input type="password" name="password" value="<?php echo $found_user['user_pass'];?>"><br><br>

		<label>Email:</label>
		<input type="text" name="email" value="<?php echo $found_user['user_email'];?>"><br><br>

		<input type="submit" name="submit" value="Edit User Info"><br>
	</form>
</body>
</html>
