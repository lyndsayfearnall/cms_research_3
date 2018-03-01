<?php

	function logIn($username, $password, $ip) {
		require_once('connect.php');
		$username = mysqli_real_escape_string($link, $username);
		$password = mysqli_real_escape_string($link, $password);
		$loginstring = "SELECT * FROM tbl_user WHERE user_name='{$username}' AND user_pass='{$password}'";
		$user_set = mysqli_query($link, $loginstring);
		//echo mysqli_num_rows($user_set);
		if(mysqli_num_rows($user_set)){
			$founduser = mysqli_fetch_array($user_set, MYSQLI_ASSOC);
			$id = $founduser['user_id'];
			$_SESSION['user_id'] = $id;
			$_SESSION['user_name']= $founduser['user_fname'];
			$_SESSION['first_login']= $founduser['first_login'];
			if(mysqli_query($link, $loginstring)){
				$update = "UPDATE tbl_user SET user_ip='{$ip}' WHERE user_id={$id}";
				$updatequery = mysqli_query($link, $update);
			}// check to see if it's the user's first login (0 = true), if YES, send to edit user page.
				if($_SESSION['first_login'] == 0){
					//update table to set first login to false (1) so that user will now be redirected to admin page on login
					//... the problem with this method is that the user doesn't actually have to change any login information to "edit" their account
					$update = "UPDATE tbl_USER SET first_login=1 WHERE user_id={$id}";
					$updatequery = mysqli_query($link, $update);
					redirect_to("admin_edituser.php");

				}//if it isn't the user's first login (1 = false), send user to admin index page
					redirect_to("admin_index.php");
		}else{
			$message = "Learn how to type you dumba&*.";
			return $message;
		}

		mysqli_close($link);
	}
?>
